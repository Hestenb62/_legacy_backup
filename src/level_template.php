<?php

/**
 * Hesten's Learning - Level Page Template
 * This file provides the standardized structure for all level pages (A-O).
 */

// Global Header
if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// Dynamic Single-Lesson Router: Check if a lesson is requested via query string on ANY level page
$requestedLesson = null;
if (!empty($_GET['lesson'])) {
    $requestedLesson = preg_replace('/[^a-zA-Z0-9\-_]/', '', trim($_GET['lesson']));
} elseif (!empty($_SERVER['QUERY_STRING'])) {
    $rawQuery = trim(explode('&', $_SERVER['QUERY_STRING'])[0]);
    if (!empty($rawQuery) && !str_contains($rawQuery, '=')) {
        $requestedLesson = preg_replace('/[^a-zA-Z0-9\-_]/', '', $rawQuery);
    }
}

if (!empty($requestedLesson)) {
    $lessonFile = rtrim(ABSPATH, '/\\') . '/lessons/' . $requestedLesson . '.php';
    $levelUrl = basename($_SERVER['PHP_SELF']);
    $levelTitle = $levelTitle ?? ('Level ' . strtoupper($levelId ?? ''));
    if (str_contains($requestedLesson, 'math')) {
        $requiresMathJax = true;
    }
    if (file_exists($lessonFile)) {
        include $lessonFile;
        exit;
    } else {
        $lessonRenderer = rtrim(ABSPATH, '/\\') . '/src/lesson_renderer.php';
        if (file_exists($lessonRenderer)) {
            $lessonId = $requestedLesson;
            include $lessonRenderer;
            exit;
        }
    }
}

include ABSPATH . 'src/header.php';

// Default falling values
if (!isset($themeColor)) $themeColor = 'rose';
if (!isset($levelId)) $levelId = 'k';
if (!isset($levelTitle)) $levelTitle = 'Level K';
if (!isset($gradeText)) $gradeText = '9th Grade';
if (!isset($pageDescription)) $pageDescription = '';
if (!isset($initialSubject)) $initialSubject = 'math';
if (!isset($initialSubjectName)) $initialSubjectName = 'Math';
if (!isset($initialSubjectDesc)) $initialSubjectDesc = '';
if (!isset($modules)) $modules = [];

/**
 * Hydrates module list from official standards datasets if current list is empty or minimal.
 */
if (!function_exists('hydrateLevelModules')) {
    function hydrateLevelModules(string $levelId, string $subject, array $existingModules): array {
        $skillCount = 0;
        foreach ($existingModules as $m) {
            if (!empty($m['topics'])) {
                foreach ($m['topics'] as $t) {
                    $skillCount += count($t['skills'] ?? []);
                }
            }
        }
        if ($skillCount > 2) {
            return $existingModules;
        }

        $gradeMap = [
            'a' => 'Pre-K',
            'b' => 'Kindergarten',
            'c' => '1st Grade',
            'd' => '2nd Grade',
            'e' => '3rd Grade',
            'f' => '4th Grade',
            'g' => '5th Grade',
            'h' => '6th Grade',
            'i' => '7th Grade',
            'j' => '8th Grade',
            'k' => '9th Grade',
            'l' => '10th Grade',
            'm' => '11th Grade',
            'n' => '12th Grade',
            'o' => 'Advanced Placement'
        ];

        $gradeName = $gradeMap[strtolower($levelId)] ?? null;
        if (!$gradeName) return $existingModules;

        $baseDir = defined('ABSPATH') ? ABSPATH : (dirname(__DIR__) . '/');
        $dataDir = rtrim($baseDir, '/\\') . '/assets/data/';

        // Check for dedicated EngageNY Math curriculum outline for Grade 9 (Level K)
        if ($subject === 'math' && strtolower($levelId) === 'k') {
            $engPath = $dataDir . 'curriculum-engageny-math.json';
            if (file_exists($engPath)) {
                $raw = json_decode(file_get_contents($engPath), true);
                $gData = $raw['grades'][$gradeName] ?? null;
                if ($gData && !empty($gData['modules'])) {
                    $out = [];
                    foreach ($gData['modules'] as $mod) {
                        $topics = [];
                        foreach ($mod['topics'] ?? [] as $top) {
                            $skills = [];
                            foreach ($top['lessons'] ?? [] as $les) {
                                $skills[] = [
                                    'id' => $les['id'] ?? ('k-math-' . strtolower($les['code'] ?? '')),
                                    'code' => $les['code'] ?? '',
                                    'name' => $les['title'] ?? '',
                                    'url' => $les['url'] ?? ('/levels/k.php?' . ($les['id'] ?? ''))
                                ];
                            }
                            $topics[] = [
                                'letter' => $top['letter'] ?? 'A',
                                'name' => $top['title'] ?? 'Core Topic',
                                'skills' => $skills
                            ];
                        }
                        $out[] = [
                            'title' => $mod['title'] ?? ('Module ' . ($mod['moduleNumber'] ?? 1)),
                            'description' => $mod['description'] ?? '',
                            'topics' => $topics
                        ];
                    }
                    if (!empty($out)) return $out;
                }
            }
        }

        // Standard datasets by subject
        $fileMap = [
            'math' => 'standards-ccss-math.json',
            'ela' => 'standards-ccss-ela.json',
            'science' => 'standards-ngss-science.json',
            'social' => 'standards-c3-social.json'
        ];

        $targetFile = $fileMap[$subject] ?? null;
        if (!$targetFile) return $existingModules;

        $fullPath = $dataDir . $targetFile;
        if (!file_exists($fullPath)) return $existingModules;

        $data = json_decode(file_get_contents($fullPath), true);
        if (!$data || !isset($data[$subject]['grades'][$gradeName])) return $existingModules;

        $gradeData = $data[$subject]['grades'][$gradeName];
        $rawStandards = $gradeData['ccss']['standards'] ?? ($gradeData['ngss']['standards'] ?? ($gradeData['c3']['standards'] ?? []));
        $allHtml = is_array($rawStandards) ? implode("\n", $rawStandards) : (string)$rawStandards;
        if (empty(trim($allHtml))) return $existingModules;

        // Extract each standard item block (<div class="curr-standard-item">...</div>)
        if (preg_match_all('/<div\s+class=["\']curr-standard-item["\'][^>]*>(.*?)<\/div>/is', $allHtml, $itemMatches)) {
            $standardItems = $itemMatches[1];
        } else {
            $standardItems = [$allHtml];
        }

        $topics = [];
        $topicLetterOrd = 65; // ASCII 'A'

        foreach ($standardItems as $itemHtml) {
            preg_match('/<h4[^>]*>(.*?)<\/h4>/i', $itemHtml, $titleMatch);
            $domainTitle = isset($titleMatch[1]) ? strip_tags($titleMatch[1]) : 'Core Concepts';

            preg_match_all('/<p[^>]*>(?:<strong[^>]*>(.*?)<\/strong>)?(.*?)(?:<\/p>|$)/is', $itemHtml, $descMatches, PREG_SET_ORDER);

            $skills = [];
            foreach ($descMatches as $dm) {
                $code = trim(strip_tags($dm[1] ?? ''));
                $code = rtrim($code, ':');
                $desc = trim(strip_tags($dm[2] ?? ''));
                if (empty($code) && empty($desc)) continue;

                if (empty($code)) {
                    $code = strtoupper($levelId) . '.' . strtoupper(substr($subject, 0, 3));
                }

                $skillSlug = strtolower(preg_replace('/[^a-zA-Z0-9]/', '-', $code));
                $skillId = strtolower($levelId) . '-' . $subject . '-' . $skillSlug;

                $skills[] = [
                    'id' => $skillId,
                    'code' => $code,
                    'name' => $desc ?: $code,
                    'url' => '/pages/standards.php?code=' . urlencode($code)
                ];
            }

            if (!empty($skills)) {
                $topics[] = [
                    'letter' => chr($topicLetterOrd++),
                    'name' => $domainTitle,
                    'skills' => $skills
                ];
            }
        }

        if (empty($topics)) return $existingModules;

        $topicChunks = array_chunk($topics, 3);
        $generatedModules = [];
        foreach ($topicChunks as $idx => $chunk) {
            $generatedModules[] = [
                'title' => ucfirst($subject) . ' Standards & Skills - Module ' . ($idx + 1),
                'description' => 'Comprehensive academic competencies for ' . $gradeName . ' aligned with national frameworks.',
                'topics' => $chunk
            ];
        }

        return $generatedModules;
    }
}

// Hydrate subjects with standards data if not populated
$modules = hydrateLevelModules($levelId, 'math', $modules ?? []);
$ela_modules = hydrateLevelModules($levelId, 'ela', $ela_modules ?? []);
$science_modules = hydrateLevelModules($levelId, 'science', $science_modules ?? []);
$social_modules = hydrateLevelModules($levelId, 'social', $social_modules ?? []);

/**
 * Renders module UI elements for a given subject.
 *
 * @param array $modulesList
 * @param string $subjectId
 * @param string $subjectIcon
 * @param string $themeColor
 * @return bool
 */
function renderSubjectModules(array $modulesList, string $subjectId, string $subjectIcon, string $themeColor): bool
{
    if (empty($modulesList)) {
        return false;
    }
    foreach ($modulesList as $mIndex => $module): ?>
        <!-- Module <?php echo ($mIndex + 1); ?> Header & Overview -->
        <div style="margin-bottom: 3rem; <?php echo ($mIndex > 0) ? 'margin-top: 4rem;' : ''; ?>">
            <h2 class="module-number">
                <i class="fas fa-layer-group"></i> Module <?php echo ($mIndex + 1); ?>
            </h2>
            <div class="module-header">
                <div class="module-info">
                    <div class="module-icon">
                        <i class="fas <?php echo $subjectIcon; ?>"></i>
                    </div>
                    <div>
                        <h3 class="module-title"><?php echo $module['title']; ?></h3>
                        <p class="module-desc"><?php echo $module['description']; ?></p>
                    </div>
                </div>

                <!-- Mastery Metric with Live Radial Ring -->
                <div class="mastery-container">
                    <div class="mastery-header-row" style="display: flex; align-items: center; justify-content: space-between; gap: 0.75rem;">
                        <div class="module-radial-wrap" aria-hidden="true" style="flex-shrink: 0;">
                            <svg class="module-radial-svg" viewBox="0 0 44 44" width="44" height="44" style="display: block;">
                                <circle class="radial-bg" cx="22" cy="22" r="18" fill="none" stroke="var(--color-border, #e2e8f0)" stroke-width="3.5" />
                                <circle class="radial-ring module-radial-ring" data-subject="<?php echo $subjectId; ?>" data-module="<?php echo $mIndex; ?>" cx="22" cy="22" r="18" fill="none" stroke="var(--color-primary, #e11d48)" stroke-width="3.5" stroke-linecap="round" stroke-dasharray="113.1" stroke-dashoffset="113.1" transform="rotate(-90 22 22)" style="transition: stroke-dashoffset 0.6s cubic-bezier(0.4, 0, 0.2, 1);" />
                            </svg>
                        </div>
                        <div style="flex-grow: 1;">
                            <div class="mastery-stats">
                                <div class="mastery-label">Module Mastery</div>
                                <div class="mastery-value module-progress-text" data-subject="<?php echo $subjectId; ?>" data-module="<?php echo $mIndex; ?>">0%</div>
                            </div>
                            <div class="progress-track">
                                <div class="progress-fill module-progress-bar" data-subject="<?php echo $subjectId; ?>" data-module="<?php echo $mIndex; ?>" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="module-progress-subtext" data-subject="<?php echo $subjectId; ?>" data-module="<?php echo $mIndex; ?>">
                        <span class="mod-stat-skills">0 / 0 Lessons</span>
                        <span class="mod-stat-mastery">0 Mastered (80%+)</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-16">
            <?php foreach ($module['topics'] as $topic): ?>
                <!-- Category <?php echo $topic['letter']; ?>: <?php echo $topic['name']; ?> -->
                <div class="topic-section">
                    <div class="topic-header">
                        <span class="topic-letter"><?php echo $topic['letter']; ?></span>
                        <h3 class="topic-title"><?php echo $topic['name']; ?></h3>
                    </div>

                    <!-- Topic Milestone Honors Celebration -->
                    <div class="topic-milestone-honors" id="honors-topic-<?php echo $subjectId; ?>-<?php echo $mIndex; ?>-<?php echo $topic['letter']; ?>" style="display: none;">
                        <div class="honors-ribbon-content">
                            <div class="honors-left">
                                <i class="fas fa-medal honors-medal-icon"></i>
                                <div>
                                    <strong class="honors-title">Topic <?php echo $topic['letter']; ?> Honors Achieved!</strong>
                                    <p class="honors-subtext">All skills in <?php echo htmlspecialchars($topic['name']); ?> completed or mastered!</p>
                                </div>
                            </div>
                            <button type="button" class="honors-claim-btn" onclick="claimTopicCertificate('<?php echo addslashes($topic['name']); ?>', '<?php echo $subjectId; ?>', '<?php echo $topic['letter']; ?>')">
                                <i class="fas fa-certificate"></i> Claim Honors Certificate
                            </button>
                        </div>
                    </div>

                    <div class="skills-grid">
                        <?php foreach ($topic['skills'] as $skill): ?>
                            <!-- Skill <?php echo $skill['code']; ?> -->
                            <div class="skill-card" id="skill-<?php echo str_replace('.', '-', strtolower($skill['id'])); ?>" data-skill-id="<?php echo htmlspecialchars($skill['id']); ?>" data-skill-code="<?php echo htmlspecialchars($skill['code']); ?>">
                                <div class="skill-info">
                                    <span class="skill-code"><?php echo $skill['code']; ?></span>
                                    <span class="skill-name">
                                        <?php 
                                            $currPage = basename($_SERVER['PHP_SELF']);
                                            $skillTargetUrl = $currPage . '?' . urlencode($skill['id']);
                                        ?>
                                        <a href="<?php echo htmlspecialchars($skillTargetUrl); ?>"><?php echo htmlspecialchars($skill['name']); ?></a>
                                    </span>
                                    <span class="skill-mastery-slot"></span>
                                </div>
                                <div class="skill-actions">
                                    <button type="button" class="skill-bookmark-btn" onclick="toggleSkillBookmark('<?php echo htmlspecialchars($skill['id']); ?>', '<?php echo addslashes($skill['name']); ?>', '<?php echo addslashes($skill['code']); ?>', '<?php echo addslashes($skillTargetUrl); ?>', this)" title="Bookmark this skill" aria-label="Bookmark skill <?php echo htmlspecialchars($skill['name']); ?>">
                                        <i class="far fa-bookmark"></i>
                                    </button>
                                    <a href="/assessment/#standard=<?php echo urlencode($skill['code']); ?>" class="skill-quick-test-btn" title="Practice or test this standard" aria-label="Test standard <?php echo htmlspecialchars($skill['code']); ?>">
                                        <i class="fas fa-bullseye"></i>
                                    </a>
                                    <button onclick="toggleLesson('<?php echo $skill['id']; ?>', this)"
                                        class="check-btn lesson-check-btn"
                                        aria-label="Mark as complete">
                                        <div class="check-icon"><i class="fas fa-check"></i></div>
                                    </button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
<?php endforeach;
    return true;
}
?>

<link rel="stylesheet" href="/assets/css/level-style.css">

<!-- Level Navigation & Subject Tabs -->
<div class="level-nav-container">
    <!-- Live Skill Search Filter -->
    <div class="level-search-wrapper" role="search" aria-label="Filter skills by keyword or standard code">
        <i class="fas fa-search level-search-icon" aria-hidden="true"></i>
        <input type="search" id="level-skill-search" class="level-search-input" placeholder="Search skills, topics, standards (e.g. algebra, HSA-SSE)..." aria-label="Search skills in this level" oninput="filterLevelSkills(this.value)">
        <button type="button" id="level-search-clear" class="level-search-clear" onclick="clearLevelSkillSearch()" aria-label="Clear skill search" style="display: none;">
            <i class="fas fa-times"></i>
        </button>
    </div>

    <div class="subject-tabs" role="tablist" aria-label="Subject navigation tabs">
        <button onclick="switchTab('math')" id="tab-math"
            class="subject-tab <?php echo ($initialSubject == 'math') ? 'active' : ''; ?>"
            aria-selected="true" role="tab" aria-controls="content-math">
            MATH
        </button>
        <button onclick="switchTab('ela')" id="tab-ela"
            class="subject-tab <?php echo ($initialSubject == 'ela') ? 'active' : ''; ?>"
            aria-selected="false" role="tab" aria-controls="content-ela">
            LANGUAGE ARTS
        </button>
        <button onclick="switchTab('science')" id="tab-science"
            class="subject-tab <?php echo ($initialSubject == 'science') ? 'active' : ''; ?>"
            aria-selected="false" role="tab" aria-controls="content-science">
            SCIENCE
        </button>
        <button onclick="switchTab('social')" id="tab-social"
            class="subject-tab <?php echo ($initialSubject == 'social') ? 'active' : ''; ?>"
            aria-selected="false" role="tab" aria-controls="content-social">
            SOCIAL STUDIES
        </button>
    </div>
</div>

<!-- IXL-Style Clean Header -->
<header class="level-hero">
    <!-- Aurora Mesh Background -->
    <div class="level-aurora-bg" aria-hidden="true">
        <div class="level-aurora-blob blob-1"></div>
        <div class="level-aurora-blob blob-2"></div>
        <div class="level-aurora-blob blob-3"></div>
    </div>
    <div class="hero-inner">
        <div>
            <div class="hero-title-group">
                <span class="hero-indicator"></span>
                <h1 class="hero-title">
                    <?php echo $levelTitle; ?> <span id="header-subject" class="hero-subject"><?php echo $initialSubjectName; ?></span>
                </h1>
                <span id="level-curriculum-badge" class="hero-badge">
                    ENGAGENY / CC
                </span>
                <span id="level-mastery-badge" class="hero-mastery-pill">
                    <i class="fas fa-award"></i> 0 Mastered
                </span>
            </div>
            <p id="header-description" class="hero-description">
                <?php echo $initialSubjectDesc; ?>
            </p>
        </div>

        <!-- Assessment CTA -->
        <div style="animation: fadeUp 0.6s ease-out 0.1s backwards;">
            <a href="/assessment/index.php" class="diagnostic-btn">
                <i class="fas fa-star" style="margin-right: 0.5rem; font-size: 10px;"></i> SKILL DIAGNOSTIC
            </a>
        </div>
    </div>
</header>

<!-- Targeted Standard Notification Banner -->
<div id="standard-deep-link-banner" class="standard-deep-link-banner" style="display: none;">
    <div class="std-banner-inner">
        <div class="std-banner-left">
            <div class="std-banner-icon">
                <i class="fas fa-bullseye"></i>
            </div>
            <div>
                <div class="std-banner-tags">
                    <span class="std-banner-badge">Targeted Standard Practice</span>
                    <span id="std-banner-subject-pill" class="std-banner-badge badge-subtle">Core Subject</span>
                </div>
                <div class="std-banner-title">
                    Focusing on: <span id="std-banner-code" class="std-banner-code-text">Standard Code</span>
                </div>
                <div id="std-banner-desc" class="std-banner-desc-text">
                    Lessons and skill practice exercises matching this academic benchmark are highlighted below.
                </div>
            </div>
        </div>
        <div class="std-banner-actions">
            <a id="std-banner-assess-link" href="/assessment/#standard=" class="std-banner-btn std-banner-btn-test">
                <i class="fas fa-tasks"></i> Test This Standard
            </a>
            <button type="button" class="std-banner-btn std-banner-btn-dismiss" onclick="dismissStandardDeepLink()">
                <i class="fas fa-times"></i> Dismiss
            </button>
        </div>
    </div>
</div>

<!-- Main Content Area -->
<main id="main-content" class="main-container" tabindex="-1">
    <div>
        <?php if (!empty($customLevelHeader)) { echo $customLevelHeader; } ?>
        <!-- MATH SECTION -->
        <section id="content-math" class="tab-content <?php echo ($initialSubject == 'math') ? 'block' : ''; ?>" role="tabpanel">
            <?php if (!renderSubjectModules($modules, 'math', 'fa-calculator', $themeColor)): ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <h2 class="empty-title">Mathematics</h2>
                    <p class="empty-desc">Math modules are currently being prepared for <?php echo $levelTitle; ?>.</p>
                    <div class="empty-badge">Coming Soon</div>
                </div>
            <?php endif; ?>
        </section>

        <!-- LANGUAGE ARTS SECTION -->
        <section id="content-ela" class="tab-content <?php echo ($initialSubject == 'ela') ? 'block' : ''; ?>" role="tabpanel">
            <?php if (!renderSubjectModules($ela_modules ?? [], 'ela', 'fa-book-open', $themeColor)): ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h2 class="empty-title">English Language Arts</h2>
                    <p class="empty-desc">Literary theory, comprehensive research papers, and classical literature analysis for <?php echo $levelTitle; ?>.</p>
                    <div class="empty-badge">Coming Soon</div>
                </div>
            <?php endif; ?>
        </section>

        <!-- SCIENCE SECTION -->
        <section id="content-science" class="tab-content <?php echo ($initialSubject == 'science') ? 'block' : ''; ?>" role="tabpanel">
            <?php if (!renderSubjectModules($science_modules ?? [], 'science', 'fa-flask', $themeColor)): ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-flask"></i>
                    </div>
                    <h2 class="empty-title">Science</h2>
                    <p class="empty-desc">Explore nature, the environment, and physical laws customized for <?php echo $levelTitle; ?>.</p>
                    <div class="empty-badge">Coming Soon</div>
                </div>
            <?php endif; ?>
        </section>

        <!-- SOCIAL STUDIES SECTION -->
        <section id="content-social" class="tab-content <?php echo ($initialSubject == 'social') ? 'block' : ''; ?>" role="tabpanel">
            <?php if (!renderSubjectModules($social_modules ?? [], 'social', 'fa-globe-americas', $themeColor)): ?>
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="fas fa-globe-americas"></i>
                    </div>
                    <h2 class="empty-title">Social Studies</h2>
                    <p class="empty-desc">History, citizenship, and community study modules for <?php echo $levelTitle; ?>.</p>
                    <div class="empty-badge">Coming Soon</div>
                </div>
            <?php endif; ?>
        </section>
    </div>

    <!-- Recommendations Sidebar -->
    <aside class="sidebar">
        <!-- Skill of the Day -->
        <div id="side-skill-day" class="sidebar-card skill-of-day">
            <i class="fas fa-calendar-star skill-of-day-bg-icon"></i>
            <div style="position: relative; z-index: 10;">
                <div>
                    <span class="skill-of-day-badge">Skill of the Day</span>
                </div>
                <div id="day-skill-id" class="skill-of-day-id">...</div>
                <h4 id="day-skill-name" class="skill-of-day-name">Loading recommendation...</h4>
                <button class="skill-of-day-btn">
                    PRACTICE NOW
                </button>
            </div>
        </div>

        <!-- Recent Activity -->
        <div id="side-recent-activity" class="sidebar-card recent-activity">
            <h4 class="recent-activity-title">
                <i class="fas fa-history"></i> Recent Activity
            </h4>
            <div id="recent-activity-list">
                <div style="font-size: 0.875rem; color: var(--text-muted); font-weight: 500; font-style: italic; padding: 1rem 0; text-align: center;">No recent activity</div>
            </div>
        </div>

        <!-- Aligned Library Books & Literature -->
        <div id="side-aligned-library" class="sidebar-card library-aligned-card" style="background: var(--bg-secondary); border: 1px solid var(--glass-border); border-radius: 1.25rem; padding: 1.25rem; box-shadow: var(--shadow-sm); text-align: left;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 0.75rem;">
                <h4 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 0.95rem; font-weight: 800; margin: 0; color: var(--color-text-default); display: flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-book-reader" style="color: var(--color-primary);"></i> Curriculum Literature
                </h4>
                <a href="/library/" style="font-size: 0.75rem; font-weight: 700; color: var(--color-primary); text-decoration: none;">Browse Hub &rarr;</a>
            </div>
            <p style="font-size: 0.8rem; color: var(--text-muted); margin: 0 0 0.85rem 0; line-height: 1.4;">
                Primary documents & classic texts aligned to <?php echo htmlspecialchars($levelTitle); ?>:
            </p>
            <div class="aligned-books-list" style="display: flex; flex-direction: column; gap: 0.5rem;">
                <a href="/library/read/index.php?book=1984&chapter=chapter-1" style="display: flex; align-items: center; gap: 0.6rem; padding: 0.5rem 0.75rem; background: var(--color-base-bg); border: 1px solid var(--color-border); border-radius: 0.6rem; text-decoration: none; color: var(--color-text-default); font-size: 0.82rem; font-weight: 700; transition: all 0.2s;">
                    <i class="fas fa-book-open" style="color: var(--color-primary); font-size: 0.85rem;"></i>
                    <div style="flex-grow: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        <span>1984</span>
                        <span style="font-size: 0.7rem; font-weight: 500; color: var(--text-muted); display: block;">George Orwell • ELA</span>
                    </div>
                </a>
                <a href="/library/read/index.php?book=frankenstein&chapter=chapter-1" style="display: flex; align-items: center; gap: 0.6rem; padding: 0.5rem 0.75rem; background: var(--color-base-bg); border: 1px solid var(--color-border); border-radius: 0.6rem; text-decoration: none; color: var(--color-text-default); font-size: 0.82rem; font-weight: 700; transition: all 0.2s;">
                    <i class="fas fa-book-open" style="color: var(--color-secondary); font-size: 0.85rem;"></i>
                    <div style="flex-grow: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        <span>Frankenstein</span>
                        <span style="font-size: 0.7rem; font-weight: 500; color: var(--text-muted); display: block;">Mary Shelley • Literature</span>
                    </div>
                </a>
                <a href="/library/read/index.php?book=federalist-papers&chapter=chapter-1" style="display: flex; align-items: center; gap: 0.6rem; padding: 0.5rem 0.75rem; background: var(--color-base-bg); border: 1px solid var(--color-border); border-radius: 0.6rem; text-decoration: none; color: var(--color-text-default); font-size: 0.82rem; font-weight: 700; transition: all 0.2s;">
                    <i class="fas fa-landmark" style="color: #f59e0b; font-size: 0.85rem;"></i>
                    <div style="flex-grow: 1; min-width: 0; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        <span>The Federalist Papers</span>
                        <span style="font-size: 0.7rem; font-weight: 500; color: var(--text-muted); display: block;">Hamilton & Madison • Civics</span>
                    </div>
                </a>
            </div>
        </div>

        <!-- Study Tip -->
        <div class="sidebar-card study-tip">
            <i class="fas fa-lightbulb study-tip-bg-icon"></i>
            <div style="position: relative; z-index: 10;">
                <h4 class="study-tip-label">Study Tip</h4>
                <p class="study-tip-text">Active learning is key! Try to explain topics to others.</p>
                <div class="study-tip-bar"></div>
            </div>
        </div>
    </aside>
</main>

<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
    const LEVEL_ID = '<?php echo $levelId; ?>';
    const THEME_COLOR = '<?php echo $themeColor; ?>';
    let completedLessons = [];

    // Initialize CSS Variables based on Theme
    const root = document.documentElement;
    const colors = {
        'teal': '#0d9488',
        'rose': '#e11d48',
        'indigo': '#4f46e5',
        'blue': '#2563eb',
        'cyan': '#0891b2',
        'green': '#16a34a',
        'orange': '#ea580c',
        'violet': '#7c3aed'
    };
    if (colors[THEME_COLOR]) {
        root.style.setProperty('--theme-color', colors[THEME_COLOR]);
    }

    // Load progress from localStorage
    function loadLessonProgress() {
        try {
            const stored = localStorage.getItem(`hl_progress_${LEVEL_ID}`);
            if (stored) completedLessons = JSON.parse(stored);
        } catch (e) {}
    }

    function toggleLesson(lessonId, btn) {
        const index = completedLessons.indexOf(lessonId);
        if (index > -1) {
            completedLessons.splice(index, 1);
        } else {
            completedLessons.push(lessonId);
            triggerWinEffect();
        }
        localStorage.setItem(`hl_progress_${LEVEL_ID}`, JSON.stringify(completedLessons));
        updateAllUI();
    }

    window.toggleSkillBookmark = function(id, name, code, url, btn) {
        if (!window.UniversalBookmarks) return;
        const nowBookmarked = window.UniversalBookmarks.toggle({
            id: id,
            title: `${code}: ${name}`,
            type: 'skill',
            url: url || (window.location.pathname + `#skill-${id.replace(/[^a-zA-Z0-9]/g, '-').toLowerCase()}`),
            category: 'Skill: ' + code,
            icon: 'fa-bullseye'
        });
        updateAllUI();
        if (typeof window.announceA11y === 'function') {
            window.announceA11y(nowBookmarked ? `Skill ${code} saved to bookmarks` : `Skill ${code} removed from bookmarks`);
        }
    };

    function triggerWinEffect() {
        confetti({
            particleCount: 100,
            spread: 70,
            origin: {
                y: 0.6
            },
            colors: [colors[THEME_COLOR] || '#e11d48']
        });
    }

    function switchTab(tabName) {
        const subjectData = {
            'math': {
                name: 'Math',
                desc: '<?php echo $initialSubjectDesc; ?>'
            },
            'ela': {
                name: 'Language Arts',
                desc: 'Developing strong literacy and communication skills for <?php echo $levelTitle; ?>.'
            },
            'science': {
                name: 'Science',
                desc: 'Exploring natural phenomena and scientific inquiry for <?php echo $levelTitle; ?>.'
            },
            'social': {
                name: 'Social Studies',
                desc: 'Understanding society, history, and civic responsibility for <?php echo $levelTitle; ?>.'
            }
        };

        const headerSubject = document.getElementById('header-subject');
        const headerDesc = document.getElementById('header-description');
        if (subjectData[tabName]) {
            if (headerSubject) headerSubject.innerText = subjectData[tabName].name;
            if (headerDesc) headerDesc.innerText = subjectData[tabName].desc;
        }

        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('block'));
        document.querySelectorAll('.subject-tab').forEach(b => {
            b.classList.remove('active');
            b.setAttribute('aria-selected', 'false');
        });

        const target = document.getElementById(`content-${tabName}`);
        if (target) target.classList.add('block');

        const btn = document.getElementById(`tab-${tabName}`);
        if (btn) {
            btn.classList.add('active');
            btn.setAttribute('aria-selected', 'true');
        }

        // Keep browser URL query in sync so direct sharing, back button, and reload remember the active subject
        try {
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('subject', tabName);
            window.history.replaceState(null, '', currentUrl.toString());
        } catch (e) {}
    }

    const allSkills = <?php echo json_encode(array_merge(...array_column($modules, 'topics'))['skills'] ?? []); ?>;
    // Flattening skills for sidebar
    const flatSkills = [];
    <?php
    $all_subject_modules = [
        $modules,
        $ela_modules ?? [],
        $science_modules ?? [],
        $social_modules ?? []
    ];
    ?>
    <?php foreach ($all_subject_modules as $subModules): ?>
        <?php foreach ($subModules as $m): foreach ($m['topics'] as $t): foreach ($t['skills'] as $s): ?>
                    flatSkills.push(<?php echo json_encode($s); ?>);
        <?php endforeach;
            endforeach;
        endforeach; ?>
    <?php endforeach; ?>

    const modulesData = {
        math: <?php echo json_encode($modules); ?>,
        ela: <?php echo json_encode($ela_modules ?? []); ?>,
        science: <?php echo json_encode($science_modules ?? []); ?>,
        social: <?php echo json_encode($social_modules ?? []); ?>
    };

    function updateRecentActivity() {
        const list = document.getElementById('recent-activity-list');
        if (!list) return;
        const recent = [...completedLessons].reverse().slice(0, 2);
        if (recent.length === 0) {
            list.innerHTML = '<div style="font-size: 0.75rem; color: var(--text-muted); font-weight: 500; font-style: italic; padding: 0.5rem 0; text-align: center;">No recent activity yet</div>';
            return;
        }
        list.innerHTML = recent.map(id => {
            const skill = flatSkills.find(s => s.id === id) || {
                name: 'Unknown Skill',
                code: '??'
            };
            return `
                <div class="recent-item">
                    <div class="recent-icon">
                        <i class="fas fa-check"></i>
                    </div>
                    <div>
                        <div class="recent-code">${skill.code}</div>
                        <div class="recent-name">${skill.name}</div>
                    </div>
                </div>
            `;
        }).join('');
    }

    function updateSkillOfTheDay() {
        const dayId = document.getElementById('day-skill-id');
        const dayName = document.getElementById('day-skill-name');
        if (!dayId || !dayName || flatSkills.length === 0) return;
        const available = flatSkills.filter(s => !completedLessons.includes(s.id));
        const pool = available.length > 0 ? available : flatSkills;
        const dateSeed = new Date().toDateString();
        let hash = 0;
        for (let i = 0; i < dateSeed.length; i++) hash = dateSeed.charCodeAt(i) + ((hash << 5) - hash);
        const index = Math.abs(hash) % pool.length;
        const skill = pool[index];
        dayId.innerText = skill.code;
        dayName.innerText = skill.name;
    }

    function updateAllUI() {
        updateRecentActivity();
        updateSkillOfTheDay();

        let standardsMastery = {};
        try {
            const raw = localStorage.getItem('hesten_standards_mastery');
            if (raw) standardsMastery = JSON.parse(raw);
        } catch (e) {}

        document.querySelectorAll('.skill-card').forEach(card => {
            const id = card.getAttribute('data-skill-id');
            const code = card.getAttribute('data-skill-code') || '';
            const slot = card.querySelector('.skill-mastery-slot');
            const isDone = completedLessons.includes(id);

            if (isDone) {
                card.classList.add('completed');
            } else {
                card.classList.remove('completed');
            }

            // Check if standard or code is recorded in mastery
            let masteryRec = null;
            const cleanCode = code.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
            for (const [key, rec] of Object.entries(standardsMastery)) {
                const cleanKey = key.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                if (cleanKey === cleanCode || (cleanCode && cleanKey.includes(cleanCode)) || (cleanKey && cleanCode.includes(cleanKey))) {
                    masteryRec = rec;
                    break;
                }
            }

            if (slot) {
                if (masteryRec) {
                    const pct = masteryRec.percentage ?? (masteryRec.bestScore ?? (masteryRec.score ?? 0));
                    if (pct >= 80) {
                        slot.innerHTML = `<span class="skill-mastery-tag mastery-tag-mastered" title="Mastered on assessment (${pct}%)"><i class="fas fa-star"></i> Mastered ${pct}%</span>`;
                    } else if (pct >= 60) {
                        slot.innerHTML = `<span class="skill-mastery-tag mastery-tag-proficient" title="Proficient on assessment (${pct}%)"><i class="fas fa-chart-line"></i> ${pct}%</span>`;
                    } else {
                        slot.innerHTML = `<span class="skill-mastery-tag mastery-tag-developing" title="Needs practice (${pct}%)"><i class="fas fa-redo"></i> ${pct}%</span>`;
                    }
                } else if (isDone) {
                    slot.innerHTML = `<span class="skill-mastery-tag mastery-tag-completed" title="Lesson completed"><i class="fas fa-check"></i> Completed</span>`;
                } else {
                    slot.innerHTML = '';
                }
            }

            // Sync bookmark button status
            const bmBtn = card.querySelector('.skill-bookmark-btn');
            if (bmBtn && window.UniversalBookmarks) {
                const isBm = window.UniversalBookmarks.isBookmarked(id);
                const bmIcon = bmBtn.querySelector('i');
                if (isBm) {
                    bmBtn.classList.add('bookmarked');
                    bmBtn.title = 'Skill saved in Bookmarks';
                    if (bmIcon) bmIcon.className = 'fas fa-bookmark';
                } else {
                    bmBtn.classList.remove('bookmarked');
                    bmBtn.title = 'Bookmark this skill';
                    if (bmIcon) bmIcon.className = 'far fa-bookmark';
                }
            }
        });

        // Update overall level mastery pill
        const levelMasteryBadge = document.getElementById('level-mastery-badge');
        if (levelMasteryBadge) {
            const totalSkills = flatSkills.length;
            const completedCount = flatSkills.filter(s => completedLessons.includes(s.id)).length;
            const masteredCount = flatSkills.filter(s => {
                const cleanCode = (s.code || '').replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                return Object.entries(standardsMastery).some(([k, r]) => {
                    const cleanKey = k.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                    return (cleanKey === cleanCode || (cleanCode && cleanKey.includes(cleanCode))) && ((r.percentage || r.bestScore || 0) >= 80);
                });
            }).length;
            levelMasteryBadge.innerHTML = `<i class="fas fa-award"></i> ${masteredCount} Mastered · ${completedCount}/${totalSkills} Lessons`;
        }

        updateMetrics();
    }

    function updateMetrics() {
        let standardsMastery = {};
        try {
            const raw = localStorage.getItem('hesten_standards_mastery');
            if (raw) standardsMastery = JSON.parse(raw);
        } catch (e) {}

        document.querySelectorAll('.module-progress-text').forEach((el) => {
            const subject = el.getAttribute('data-subject') || 'math';
            const mIndex = parseInt(el.getAttribute('data-module'), 10);
            const moduleData = modulesData[subject] ? modulesData[subject][mIndex] : null;
            if (!moduleData) return;
            const skillIds = [].concat(...moduleData.topics.map(t => t.skills.map(s => s.id)));
            const doneCount = skillIds.filter(id => completedLessons.includes(id)).length;
            const totalSkills = skillIds.length;
            const percent = totalSkills > 0 ? Math.round((doneCount / totalSkills) * 100) : 0;
            el.innerText = percent + '%';

            const bar = document.querySelector(`.module-progress-bar[data-subject="${subject}"][data-module="${mIndex}"]`);
            if (bar) {
                bar.style.width = percent + '%';
            }

            const radialRing = document.querySelector(`.module-radial-ring[data-subject="${subject}"][data-module="${mIndex}"]`);
            if (radialRing) {
                const circumference = 113.1;
                const offset = circumference - (percent / 100) * circumference;
                radialRing.style.strokeDashoffset = Math.max(0, offset);
                if (percent === 100) {
                    radialRing.style.stroke = '#10b981'; // Success emerald
                } else if (percent > 0) {
                    radialRing.style.stroke = 'var(--color-primary, #e11d48)';
                }
            }

            // Subtext metrics
            const subtext = document.querySelector(`.module-progress-subtext[data-subject="${subject}"][data-module="${mIndex}"]`);
            if (subtext) {
                const skillsSpan = subtext.querySelector('.mod-stat-skills');
                const masterySpan = subtext.querySelector('.mod-stat-mastery');
                if (skillsSpan) skillsSpan.textContent = `${doneCount} / ${totalSkills} Lessons`;

                // Calculate standards mastered in this module
                const modSkills = [].concat(...moduleData.topics.map(t => t.skills));
                const modMasteredCount = modSkills.filter(s => {
                    const cleanCode = (s.code || '').replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                    return Object.entries(standardsMastery).some(([k, r]) => {
                        const cleanKey = k.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                        return (cleanKey === cleanCode || (cleanCode && cleanKey.includes(cleanCode))) && ((r.percentage || r.bestScore || 0) >= 80);
                    });
                }).length;
                if (masterySpan) masterySpan.textContent = `${modMasteredCount} Mastered (80%+)`;
            }
        });

        // Topic Honors Check
        Object.entries(modulesData).forEach(([subj, mList]) => {
            if (!mList || !Array.isArray(mList)) return;
            mList.forEach((mod, mIdx) => {
                if (!mod || !mod.topics) return;
                mod.topics.forEach((topic) => {
                    const honorsEl = document.getElementById(`honors-topic-${subj}-${mIdx}-${topic.letter}`);
                    if (!honorsEl) return;
                    const topicSkillIds = (topic.skills || []).map(s => s.id);
                    if (topicSkillIds.length === 0) {
                        honorsEl.style.display = 'none';
                        return;
                    }
                    const allDone = topicSkillIds.every(id => completedLessons.includes(id));
                    const allMastered = (topic.skills || []).every(s => {
                        const cleanCode = (s.code || '').replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                        return Object.entries(standardsMastery).some(([k, r]) => {
                            const cleanKey = k.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
                            return (cleanKey === cleanCode || (cleanCode && cleanKey.includes(cleanCode))) && ((r.percentage || r.bestScore || 0) >= 80);
                        });
                    });

                    if (allDone || allMastered) {
                        honorsEl.style.display = 'block';
                    } else {
                        honorsEl.style.display = 'none';
                    }
                });
            });
        });
    }

    window.claimTopicCertificate = function(topicName, subjectId, topicLetter) {
        triggerWinEffect();
        const subjectNames = {
            'math': 'Mathematics',
            'ela': 'Language Arts',
            'science': 'Science',
            'social': 'Social Studies'
        };
        const subjDisplay = subjectNames[subjectId] || subjectId.toUpperCase();
        if (typeof window.openCertificateModal === 'function') {
            window.openCertificateModal({
                courseTitle: `${LEVEL_ID.toUpperCase()} ${subjDisplay} • Topic ${topicLetter}: ${topicName}`
            });
        }
    };

    window.filterLevelSkills = function(query) {
        const q = (query || '').trim().toLowerCase();
        const clearBtn = document.getElementById('level-search-clear');
        if (clearBtn) clearBtn.style.display = q ? 'flex' : 'none';

        document.querySelectorAll('.tab-content').forEach(section => {
            const cards = section.querySelectorAll('.skill-card');
            const topicSections = section.querySelectorAll('.topic-section');

            if (!q) {
                cards.forEach(c => c.style.display = '');
                topicSections.forEach(t => t.style.display = '');
                return;
            }

            cards.forEach(card => {
                const text = (card.textContent || '').toLowerCase();
                const code = (card.getAttribute('data-skill-code') || '').toLowerCase();
                const id = (card.getAttribute('data-skill-id') || '').toLowerCase();
                if (text.includes(q) || code.includes(q) || id.includes(q)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });

            topicSections.forEach(topic => {
                const visibleCards = topic.querySelectorAll('.skill-card:not([style*="display: none"])');
                topic.style.display = visibleCards.length > 0 ? '' : 'none';
            });
        });
    };

    window.clearLevelSkillSearch = function() {
        const input = document.getElementById('level-skill-search');
        if (input) {
            input.value = '';
            window.filterLevelSkills('');
            input.focus();
        }
    };

    function updateCurriculumBadge() {
        const badge = document.getElementById('level-curriculum-badge');
        if (badge) {
            const curr = (window.currentSettings && window.currentSettings.curriculum) || 'engageny';
            const names = {
                'engageny': 'EngageNY/CC',
                'teks': 'Texas TEKS'
            };
            badge.innerText = names[curr] || 'EngageNY/CC';
        }
    }

    // Initialize
    loadLessonProgress();
    updateAllUI();
    updateCurriculumBadge();
    window.addEventListener('settings-changed', updateCurriculumBadge);
    window.addEventListener('bookmarks-updated', updateAllUI);

    // Auto-switch active subject tab if query parameter ?tab= exists
    try {
        const urlParams = new URLSearchParams(window.location.search);
        const activeTab = urlParams.get('tab');
        if (activeTab && ['math', 'ela', 'science', 'social'].includes(activeTab)) {
            switchTab(activeTab);
        }
    } catch (e) {
        console.warn("Failed to auto-switch tab:", e);
    }

    // Standard Deep-Linking & Skill Highlighting Logic
    function inferSubjectFromStandard(code) {
        if (!code) return 'math';
        const c = code.trim().toUpperCase();
        if (/\b(OA|NBT|NF|MD|RP|NS|EE|HSN|HSA|HSF|HSG|HSS)\b/.test(c) || /^(K|\d+)\.(OA|NBT|NF|MD|G|RP|NS|EE|SP)/.test(c)) {
            return 'math';
        }
        if (/\b(RL|RI|RF|W|SL|L)\b/.test(c) || /^(RL|RI|RF|W|SL|L)\./.test(c)) {
            return 'ela';
        }
        if (/(PS|LS|ESS|ETS)/.test(c) || /NGSS/i.test(c)) {
            return 'science';
        }
        if (/(HIST|GEO|GOV|ECON|CIV|NCSS|SOC)/.test(c)) {
            return 'social';
        }
        return 'math';
    }

    function getStandardKeywords(code) {
        const c = code.trim().toUpperCase();
        if (/\bOA\b/.test(c)) return ['multiplication', 'division', 'operations', 'algebraic', 'fluency'];
        if (/\bNBT\b/.test(c)) return ['base ten', 'place value', 'addition', 'subtraction', 'number'];
        if (/\bNF\b/.test(c)) return ['fraction', 'equivalent', 'numerator', 'denominator'];
        if (/\bMD\b/.test(c)) return ['measurement', 'data', 'area', 'perimeter', 'time', 'volume'];
        if (/\bG\b/.test(c)) return ['geometry', 'shape', 'angle', 'polygon'];
        if (/\b(RL|RI|RF)\b/.test(c)) return ['reading', 'comprehension', 'phonics', 'literary', 'text'];
        if (/\b(W|SL|L)\b/.test(c)) return ['writing', 'grammar', 'vocabulary', 'conventions'];
        if (/PS/.test(c)) return ['physical', 'matter', 'force', 'energy'];
        if (/LS/.test(c)) return ['life', 'ecosystem', 'organism', 'cell'];
        if (/ESS/.test(c)) return ['earth', 'space', 'climate', 'solar'];
        if (/HIST/.test(c)) return ['history', 'historical', 'timeline'];
        if (/GEO/.test(c)) return ['geography', 'map', 'continent'];
        if (/CIV/.test(c)) return ['civics', 'government', 'community'];
        return [];
    }

    function handleStandardDeepLink() {
        const hash = window.location.hash || '';
        const match = hash.match(/standard=([^&]+)/i);
        const urlParams = new URLSearchParams(window.location.search);
        const standardCode = match ? decodeURIComponent(match[1]).trim() : (urlParams.get('standard') ? urlParams.get('standard').trim() : null);

        if (!standardCode) return;

        const subjectKey = inferSubjectFromStandard(standardCode);
        const subjectNames = {
            'math': 'Mathematics',
            'ela': 'Language Arts',
            'science': 'Science',
            'social': 'Social Studies'
        };

        // Auto-switch to the corresponding subject tab
        switchTab(subjectKey);

        // Update banner details
        const banner = document.getElementById('standard-deep-link-banner');
        const bannerCode = document.getElementById('std-banner-code');
        const bannerSubj = document.getElementById('std-banner-subject-pill');
        const assessLink = document.getElementById('std-banner-assess-link');

        if (bannerCode) bannerCode.textContent = standardCode;
        if (bannerSubj) bannerSubj.textContent = subjectNames[subjectKey] || 'Core Subject';
        if (assessLink) assessLink.href = `/assessment/#standard=${encodeURIComponent(standardCode)}`;
        if (banner) banner.style.display = 'block';

        // Find matching skill card within active tab
        setTimeout(() => {
            const activeSection = document.getElementById(`content-${subjectKey}`);
            if (!activeSection) return;

            const cards = Array.from(activeSection.querySelectorAll('.skill-card'));
            if (cards.length === 0) return;

            const cleanCode = standardCode.toLowerCase().replace(/[^a-z0-9]/g, '');
            const keywords = getStandardKeywords(standardCode);

            let targetCard = null;

            // 1. Exact or partial code match
            targetCard = cards.find(card => {
                const cardText = (card.textContent || '').toLowerCase().replace(/[^a-z0-9]/g, '');
                return cardText.includes(cleanCode);
            });

            // 2. Keyword match
            if (!targetCard && keywords.length > 0) {
                targetCard = cards.find(card => {
                    const text = (card.textContent || '').toLowerCase();
                    return keywords.some(kw => text.includes(kw));
                });
            }

            // 3. Fallback to first card in active section
            if (!targetCard) {
                targetCard = cards[0];
            }

            if (targetCard) {
                // Clear any previous highlights
                document.querySelectorAll('.standard-targeted-skill').forEach(c => {
                    c.classList.remove('standard-targeted-skill');
                    const oldPill = c.querySelector('.standard-targeted-pill');
                    if (oldPill) oldPill.remove();
                });

                // Attach highlight and pill
                targetCard.classList.add('standard-targeted-skill');
                const infoContainer = targetCard.querySelector('.skill-info') || targetCard;
                if (!infoContainer.querySelector('.standard-targeted-pill')) {
                    const pill = document.createElement('div');
                    pill.className = 'standard-targeted-pill';
                    pill.innerHTML = `<i class="fas fa-bullseye"></i> Aligned: ${standardCode}`;
                    infoContainer.insertBefore(pill, infoContainer.firstChild);
                }

                targetCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }, 150);
    }

    function dismissStandardDeepLink() {
        const banner = document.getElementById('standard-deep-link-banner');
        if (banner) banner.style.display = 'none';

        document.querySelectorAll('.standard-targeted-skill').forEach(c => {
            c.classList.remove('standard-targeted-skill');
            const pill = c.querySelector('.standard-targeted-pill');
            if (pill) pill.remove();
        });

        // Clean hash without causing a page jump
        if (window.location.hash.includes('standard=')) {
            history.replaceState(null, null, window.location.pathname + window.location.search);
        }
    }

    window.dismissStandardDeepLink = dismissStandardDeepLink;
    window.handleStandardDeepLink = handleStandardDeepLink;

    // Handle direct skill query deep links (e.g. ?a-math-m1-a-1 or ?skill=...)
    function handleSkillQueryDeepLink() {
        try {
            const search = window.location.search ? window.location.search.substring(1) : '';
            if (!search) return;
            let targetSkillId = null;
            if (search.includes('=')) {
                const params = new URLSearchParams(window.location.search);
                targetSkillId = params.get('skill') || params.get('id') || params.get('lesson');
            } else {
                targetSkillId = search.split('&')[0];
            }
            if (!targetSkillId || targetSkillId.includes('tab=') || targetSkillId.includes('standard=')) return;

            const cleanId = decodeURIComponent(targetSkillId).trim().toLowerCase();
            const matchingCard = document.querySelector(`.skill-card[data-skill-id="${cleanId}"]`) ||
                                 document.querySelector(`.skill-card[data-skill-code="${cleanId}"]`) ||
                                 document.getElementById(`skill-${cleanId.replace(/[^a-zA-Z0-9]/g, '-')}`);

            if (matchingCard) {
                // Find parent tab panel
                const parentSection = matchingCard.closest('.tab-content');
                if (parentSection && parentSection.id) {
                    const subj = parentSection.id.replace('content-', '');
                    if (typeof switchTab === 'function') switchTab(subj);
                }
                setTimeout(() => {
                    matchingCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    matchingCard.classList.remove('standard-targeted-skill');
                    void matchingCard.offsetWidth;
                    matchingCard.classList.add('standard-targeted-skill');
                }, 200);
            }
        } catch (e) {
            console.debug('handleSkillQueryDeepLink note:', e);
        }
    }

    // Check on startup
    handleStandardDeepLink();
    handleSkillQueryDeepLink();

    // Listen for hash change
    window.addEventListener('hashchange', () => {
        handleStandardDeepLink();
        handleSkillQueryDeepLink();
    });
</script>

<?php if (!empty($customLevelFooter)) { echo $customLevelFooter; } ?>

<?php include ABSPATH . 'src/footer.php'; ?>