<?php
/**
 * Hesten's Learning - Level Page Template
 * This file provides the standardized structure for all level pages (A-O).
 */

// Global Header
include '../src/header.php';

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

function renderSubjectModules($modulesList, $subjectId, $subjectIcon, $themeColor) {
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

            <!-- Mastery Metric -->
            <div class="mastery-container">
                <div class="mastery-stats">
                    <div class="mastery-label">Mastery</div>
                    <div class="mastery-value module-progress-text" data-subject="<?php echo $subjectId; ?>" data-module="<?php echo $mIndex; ?>">0%</div>
                </div>
                <div class="progress-track">
                    <div class="progress-fill module-progress-bar" data-subject="<?php echo $subjectId; ?>" data-module="<?php echo $mIndex; ?>" style="width: 0%"></div>
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

            <div class="skills-grid">
                <?php foreach ($topic['skills'] as $skill): ?>
                <!-- Skill <?php echo $skill['code']; ?> -->
                <div class="skill-card" id="skill-<?php echo str_replace('.', '-', strtolower($skill['id'])); ?>">
                     <div class="skill-info">
                        <span class="skill-code"><?php echo $skill['code']; ?></span>
                        <span class="skill-name">
                            <?php if (isset($skill['url'])): ?>
                                <a href="<?php echo htmlspecialchars($skill['url']); ?>"><?php echo htmlspecialchars($skill['name']); ?></a>
                            <?php else: ?>
                                <?php echo htmlspecialchars($skill['name']); ?>
                            <?php endif; ?>
                        </span>
                     </div>
                     <button onclick="toggleLesson('<?php echo $skill['id']; ?>', this)" 
                             class="check-btn lesson-check-btn"
                             aria-label="Mark as complete">
                         <div class="check-icon"><i class="fas fa-check"></i></div>
                     </button>
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

<link rel="stylesheet" href="../src/level_style.css">

<!-- Level Breadcrumb & Subject Navigation -->
<div class="level-nav-container">
    <div class="level-breadcrumb" aria-label="Breadcrumb">
        <a href="../index.php">Home</a>
        <i class="fas fa-chevron-right" style="font-size: 8px; opacity: 0.3;"></i>
        <span style="color: var(--theme-color); opacity: 0.7;"><?php echo $gradeText; ?></span>
        <i class="fas fa-chevron-right" style="font-size: 8px; opacity: 0.3;"></i>
        <span class="breadcrumb-active"><?php echo $levelTitle; ?></span>
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
            </div>
            <p id="header-description" class="hero-description">
                <?php echo $initialSubjectDesc; ?>
            </p>
        </div>
        
        <!-- Assessment CTA -->
        <div style="animation: fadeUp 0.6s ease-out 0.1s backwards;">
             <a href="../assessment/index.php" class="diagnostic-btn">
                <i class="fas fa-star" style="margin-right: 0.5rem; font-size: 10px;"></i> SKILL DIAGNOSTIC
            </a>
        </div>
    </div>
</header>

<!-- Main Content Area -->
<main id="main-content" class="main-container" tabindex="-1">
    <div>
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
        } catch (e) { }
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

    function triggerWinEffect() {
        confetti({
            particleCount: 100,
            spread: 70,
            origin: { y: 0.6 },
            colors: [colors[THEME_COLOR] || '#e11d48']
        });
    }

    function switchTab(tabName) {
        const subjectData = {
            'math': { name: 'Math', desc: '<?php echo $initialSubjectDesc; ?>' },
            'ela': { name: 'Language Arts', desc: 'Developing strong literacy and communication skills for <?php echo $levelTitle; ?>.' },
            'science': { name: 'Science', desc: 'Exploring natural phenomena and scientific inquiry.' },
            'social': { name: 'Social Studies', desc: 'Understanding society, history, and civic responsibility.' }
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
    <?php foreach($all_subject_modules as $subModules): ?>
        <?php foreach($subModules as $m): foreach($m['topics'] as $t): foreach($t['skills'] as $s): ?>
            flatSkills.push(<?php echo json_encode($s); ?>);
        <?php endforeach; endforeach; endforeach; ?>
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
            const skill = flatSkills.find(s => s.id === id) || { name: 'Unknown Skill', code: '??' };
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
        document.querySelectorAll('.skill-card').forEach(card => {
            const btn = card.querySelector('.lesson-check-btn');
            const onclickText = btn.getAttribute('onclick');
            const id = onclickText.match(/'([^']+)'/)[1];
            const isDone = completedLessons.includes(id);
            if (isDone) {
                card.classList.add('completed');
            } else {
                card.classList.remove('completed');
            }
        });
        updateMetrics();
    }

    function updateMetrics() {
        document.querySelectorAll('.module-progress-text').forEach((el) => {
            const subject = el.getAttribute('data-subject') || 'math';
            const mIndex = parseInt(el.getAttribute('data-module'), 10);
            const moduleData = modulesData[subject] ? modulesData[subject][mIndex] : null;
            if (!moduleData) return;
            const skillIds = [].concat(...moduleData.topics.map(t => t.skills.map(s => s.id)));
            const doneCount = skillIds.filter(id => completedLessons.includes(id)).length;
            const percent = Math.round((doneCount / skillIds.length) * 100) || 0;
            el.innerText = percent + '%';
            
            const bar = document.querySelector(`.module-progress-bar[data-subject="${subject}"][data-module="${mIndex}"]`);
            if (bar) {
                bar.style.width = percent + '%';
            }
        });
    }

    function updateCurriculumBadge() {
        const badge = document.getElementById('level-curriculum-badge');
        if (badge) {
            const curr = (window.currentSettings && window.currentSettings.curriculum) || 'engageny';
            const names = {
                'engageny': 'EngageNY / CC',
                'teks': 'Texas TEKS',
                'custom': "Hesten's Custom"
            };
            badge.innerText = names[curr] || 'EngageNY / CC';
        }
    }

    // Initialize
    loadLessonProgress();
    updateAllUI();
    updateCurriculumBadge();
    window.addEventListener('settings-changed', updateCurriculumBadge);
    
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
</script>

<?php include '../src/footer.php'; ?>
