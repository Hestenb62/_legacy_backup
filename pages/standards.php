<?php
  // Define page-specific variables for the header
  $pageTitle = 'Standards & Outlines | Hesten\'s Learning';
  $pageDescription = 'In-depth curriculum outlines and standards alignment for Math, ELA, Science, and Social Studies across all grade levels.';
  $requiresMathJax = true;
  
  include '../src/header.php';
  ?>
  <link rel="stylesheet" href="/assets/css/pages/curriculum.css">
  <?php
  // include 'assets/js/standards-ccss-math-ela.js';
  // include 'assets/js/curriculum-teks.js';

  // Define the grades and their corresponding levels
  $grades = [
    ['name' => 'Pre-K', 'level' => 'A', 'color' => 'teal'],
    ['name' => 'Kindergarten', 'level' => 'B', 'color' => 'indigo'],
    ['name' => '1st Grade', 'level' => 'C', 'color' => 'rose'],
    ['name' => '2nd Grade', 'level' => 'D', 'color' => 'sky'],
    ['name' => '3rd Grade', 'level' => 'E', 'color' => 'emerald'],
    ['name' => '4th Grade', 'level' => 'F', 'color' => 'amber'],
    ['name' => '5th Grade', 'level' => 'G', 'color' => 'violet'],
    ['name' => '6th Grade', 'level' => 'H', 'color' => 'pink'],
    ['name' => '7th Grade', 'level' => 'I', 'color' => 'cyan'],
    ['name' => '8th Grade', 'level' => 'J', 'color' => 'orange'],
    ['name' => '9th Grade', 'level' => 'K', 'color' => 'blue'],
    ['name' => '10th Grade', 'level' => 'L', 'color' => 'purple'],
    ['name' => '11th Grade', 'level' => 'M', 'color' => 'fuchsia'],
    ['name' => '12th Grade', 'level' => 'N', 'color' => 'slate'],
  ];

  // Define expandable grade groups
  $gradeGroups = [
    'elementary' => [
      'id' => 'elementary',
      'name' => 'Grade School',
      'subtitle' => 'Pre-K – 5th Grade',
      'icon' => 'fa-shapes',
      'grades' => [
        ['name' => 'Pre-K', 'level' => 'A'],
        ['name' => 'Kindergarten', 'level' => 'B'],
        ['name' => '1st Grade', 'level' => 'C'],
        ['name' => '2nd Grade', 'level' => 'D'],
        ['name' => '3rd Grade', 'level' => 'E'],
        ['name' => '4th Grade', 'level' => 'F'],
        ['name' => '5th Grade', 'level' => 'G'],
      ]
    ],
    'middle' => [
      'id' => 'middle',
      'name' => 'Middle School',
      'subtitle' => '6th – 8th Grade',
      'icon' => 'fa-school',
      'grades' => [
        ['name' => '6th Grade', 'level' => 'H'],
        ['name' => '7th Grade', 'level' => 'I'],
        ['name' => '8th Grade', 'level' => 'J'],
      ]
    ],
    'high' => [
      'id' => 'high',
      'name' => 'High School',
      'subtitle' => '9th – 12th Grade',
      'icon' => 'fa-graduation-cap',
      'grades' => [
        ['name' => '9th Grade', 'level' => 'K'],
        ['name' => '10th Grade', 'level' => 'L'],
        ['name' => '11th Grade', 'level' => 'M'],
        ['name' => '12th Grade', 'level' => 'N'],
      ]
    ]
  ];

  $subjects = [
    'math' => ['name' => 'Mathematics', 'icon' => 'fa-calculator', 'color' => 'indigo'],
    'ela' => ['name' => 'Language Arts', 'icon' => 'fa-book-open', 'color' => 'rose'],
    'science' => ['name' => 'Science', 'icon' => 'fa-flask', 'color' => 'emerald'],
    'social' => ['name' => 'Social Studies', 'icon' => 'fa-globe-americas', 'color' => 'amber'],
  ];
?>

<!-- Subject Navigation (Sticky Frosted Glass) -->
<div class="curr-nav-container">
    <div class="curr-nav-inner">
        <div class="curr-nav-flex">
            <div class="curr-tabs" role="tablist" aria-label="Subject tabs">
                <?php foreach ($subjects as $id => $subj): ?>
                <button onclick="switchSubject('<?php echo $id; ?>')" id="tab-<?php echo $id; ?>"
                    class="curr-tab-btn <?php echo ($id === 'math') ? 'active tab-color-' . $subj['color'] : ''; ?>"
                    data-subject="<?php echo $id; ?>"
                    data-color="<?php echo $subj['color']; ?>"
                    role="tab" aria-selected="<?php echo ($id === 'math') ? 'true' : 'false'; ?>">
                    <span class="curr-tab-icon-wrap"><i class="fas <?php echo $subj['icon']; ?>"></i></span>
                    <span class="curr-tab-label"><?php echo strtoupper($subj['name']); ?></span>
                </button>
                <?php endforeach; ?>
            </div>

            <!-- Curriculum Selector -->
            <div class="curr-select-container">
                <span class="curr-select-icon"><i class="fas fa-layer-group"></i></span>
                <span class="curr-select-label">Curriculum:</span>
                <select id="curriculum-select" onchange="updateGlobalSetting('curriculum', this.value)" 
                    class="curr-select" aria-label="Select curriculum framework">
                    <option value="engageny">CCSS / EngageNY</option>
                    <!-- <option value="teks">Texas TEKS</option> -->
                </select>
                <i class="fas fa-chevron-down curr-select-chevron"></i>
            </div>
        </div>
    </div>
</div>

<!-- Page Content -->
<main id="main-content" class="curr-main">
    
    <!-- Grade Level Switcher (Header with Dynamic Ambient Glow) -->
    <header class="curr-header" id="curr-header" data-subject="math">
        <div class="curr-header-ambient-glow" aria-hidden="true"></div>
        <div class="curr-header-inner">
            <div class="curr-header-content">
                <div class="curr-header-top-row">
                    <div class="curr-header-info">
                        <div class="curr-badge-pill" id="curr-subject-badge">
                            <i class="fas fa-calculator"></i>
                            <span>Standards & Curriculum Alignment</span>
                        </div>
                        <h1 class="curr-header-title">
                            Standards <span id="display-subject-name" class="color-indigo">Mathematics</span>
                        </h1>
                        <p id="display-subject-desc" class="curr-header-desc">
                            Detailed learning paths, state standards alignment, and core competencies for every stage of development.
                        </p>
                    </div>
                    <div class="curr-header-actions">
                        <button type="button" class="curr-btn-print" onclick="window.print()" title="Print Standards Guide">
                            <i class="fas fa-print"></i> Print Guide
                        </button>
                        <div class="curr-export-dropdown" id="curr-export-dropdown">
                            <button type="button" class="curr-btn-export" onclick="toggleExportMenu(event)" title="Export standards data">
                                <i class="fas fa-file-export"></i> Export <i class="fas fa-caret-down curr-caret"></i>
                            </button>
                            <div class="curr-export-menu" id="curr-export-menu">
                                <button type="button" class="curr-export-item" onclick="exportStandardsCSV()">
                                    <i class="fas fa-file-csv"></i> Export as CSV
                                </button>
                                <button type="button" class="curr-export-item" onclick="exportStandardsJSON()">
                                    <i class="fas fa-file-code"></i> Export as JSON
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Expandable Grade Groups (Grade School, Middle, High) -->
                <div class="curr-grade-groups-container">
                    <!-- Group Tabs / Triggers -->
                    <div class="curr-group-tabs" role="tablist" aria-label="Grade group selection">
                        <?php foreach ($gradeGroups as $gid => $group): ?>
                        <button type="button" 
                            onclick="toggleGradeGroup('<?php echo $gid; ?>', false)" 
                            id="group-btn-<?php echo $gid; ?>"
                            class="curr-group-btn <?php echo ($gid === 'elementary') ? 'active' : ''; ?>"
                            data-group="<?php echo $gid; ?>"
                            role="tab" 
                            aria-expanded="false"
                            aria-controls="group-panel-<?php echo $gid; ?>">
                            <div class="curr-group-btn-left">
                                <span class="curr-group-icon-wrap"><i class="fas <?php echo $group['icon']; ?>"></i></span>
                                <div class="curr-group-text">
                                    <span class="curr-group-name"><?php echo $group['name']; ?></span>
                                    <span class="curr-group-sub"><?php echo $group['subtitle']; ?></span>
                                </div>
                            </div>
                            <div class="curr-group-btn-right">
                                <span class="curr-group-active-badge" id="group-badge-<?php echo $gid; ?>" style="<?php echo ($gid === 'elementary') ? '' : 'display: none;'; ?>">
                                    <?php echo ($gid === 'elementary') ? 'Kindergarten' : ''; ?>
                                </span>
                                <i class="fas fa-chevron-down curr-group-chevron"></i>
                            </div>
                        </button>
                        <?php endforeach; ?>
                    </div>

                    <!-- Expandable Group Panels -->
                    <div class="curr-group-panels">
                        <?php foreach ($gradeGroups as $gid => $group): ?>
                        <div id="group-panel-<?php echo $gid; ?>" 
                            class="curr-group-panel"
                            data-group="<?php echo $gid; ?>"
                            role="region" 
                            aria-labelledby="group-btn-<?php echo $gid; ?>">
                            <div class="curr-group-panel-inner">
                                <div class="curr-panel-header">
                                    <span class="curr-panel-label">
                                        <i class="fas <?php echo $group['icon']; ?>"></i> 
                                        <?php echo $group['name']; ?> (<?php echo $group['subtitle']; ?>)
                                    </span>
                                    <button type="button" class="curr-panel-close-btn" onclick="closeAllGradeGroups()" aria-label="Close <?php echo $group['name']; ?> selection" title="Close grade selection">
                                        <i class="fas fa-check"></i> Done
                                    </button>
                                </div>
                                <div class="curr-chips">
                                    <?php foreach ($group['grades'] as $grade): ?>
                                    <button onclick="switchGrade('<?php echo $grade['name']; ?>', '<?php echo $grade['level']; ?>', true, true)" 
                                        class="curr-chip curr-grade-card <?php echo ($grade['name'] === 'Kindergarten') ? 'active' : ''; ?>"
                                        data-grade="<?php echo $grade['name']; ?>"
                                        data-level="<?php echo $grade['level']; ?>"
                                        data-parent-group="<?php echo $gid; ?>"
                                        role="tab" 
                                        aria-selected="<?php echo ($grade['name'] === 'Kindergarten') ? 'true' : 'false'; ?>">
                                        <span class="curr-grade-name"><?php echo $grade['name']; ?></span>
                                        <span class="curr-grade-level">Level <?php echo $grade['level']; ?></span>
                                    </button>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Modern Quick Stats Counter Grid -->
                <div class="curr-stats-bar" id="curr-stats-bar">
                    <div class="curr-stat-card">
                        <div class="curr-stat-icon-wrap stat-icon-domains">
                            <i class="fas fa-shapes"></i>
                        </div>
                        <div class="curr-stat-info">
                            <span class="curr-stat-value" id="stat-domains-count">-</span>
                            <span class="curr-stat-label">Domains & Strands</span>
                        </div>
                    </div>
                    <div class="curr-stat-card">
                        <div class="curr-stat-icon-wrap stat-icon-standards">
                            <i class="fas fa-list-check"></i>
                        </div>
                        <div class="curr-stat-info">
                            <span class="curr-stat-value" id="stat-standards-count">-</span>
                            <span class="curr-stat-label">Standards Focus</span>
                        </div>
                    </div>
                    <div class="curr-stat-card">
                        <div class="curr-stat-icon-wrap stat-icon-competencies">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <div class="curr-stat-info">
                            <span class="curr-stat-value" id="stat-competencies-count">-</span>
                            <span class="curr-stat-label">Key Competencies</span>
                        </div>
                    </div>
                    <div class="curr-stat-card">
                        <div class="curr-stat-icon-wrap stat-icon-level">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="curr-stat-info">
                            <span class="curr-stat-value" id="stat-level-code">Level B</span>
                            <span class="curr-stat-label">Curriculum Level</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Detailed Content Area -->
    <div class="curr-content-area">
        <div id="curriculum-view" class="curr-view-wrapper">
            <div class="curr-grid">
                
                <!-- Left: Detailed Outline (2/3) -->
                <div class="curr-col-main">
                    <!-- Overview Card -->
                    <section class="curr-card curr-card-overview">
                        <div class="curr-card-bg-icon" id="content-icon">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <h2 class="curr-card-badge">
                            <i class="fas fa-info-circle"></i> Curriculum Overview
                        </h2>
                        <h3 id="view-title" class="curr-card-title">Kindergarten Math Foundations</h3>
                        <div id="view-overview" class="curr-card-text">
                            <p>Our Kindergarten math curriculum focus is based on the <strong>EngageNY</strong> framework, specifically designed to build strong number sense and foundational geometric thinking. Students engage with "Number of the Day" activities, hands-on manipulatives, and interactive story problems.</p>
                            <p class="curr-mt">Key focus areas include counting and cardinality, operations and algebraic thinking, and measurement and data.</p>
                        </div>
                    </section>

                    <!-- Standards Alignment -->
                    <section class="curr-card curr-card-standards">
                        <div class="curr-standards-header-row">
                            <h2 class="curr-card-badge badge-emerald">
                                <i class="fas fa-check-double"></i> Standards Alignment
                            </h2>
                            <span class="curr-standards-counter" id="standards-results-counter"></span>
                        </div>

                        <!-- Standards Search & Domain Filters Toolbar -->
                        <div class="curr-standards-toolbar">
                            <div class="curr-toolbar-row">
                                <div class="curr-search-box">
                                    <i class="fas fa-search curr-search-icon"></i>
                                    <input type="text" id="standards-search-input" placeholder="Search standards by code, keyword, or domain..." autocomplete="off" oninput="handleStandardsSearch()" />
                                    <span class="curr-search-kbd-hint"><kbd>Ctrl</kbd> <kbd>K</kbd></span>
                                    <button type="button" id="standards-search-clear" class="curr-search-clear" title="Clear search" style="display: none;" onclick="clearStandardsSearch()">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div class="curr-toolbar-actions">
                                    <label class="curr-progress-toggle-wrap" title="Overlay your tested mastery scores and checkmarks onto standards">
                                        <input type="checkbox" id="toggle-standards-progress" onchange="toggleStandardsProgressOverlay(this.checked)">
                                        <span class="curr-progress-slider"></span>
                                        <span class="curr-progress-label"><i class="fas fa-award"></i> Show My Progress</span>
                                    </label>
                                    <button type="button" id="btn-toggle-accordions" class="curr-btn-accordion-toggle" onclick="toggleAllAccordions()" title="Expand or collapse all domain sections">
                                        <i class="fas fa-compress-alt"></i> <span id="toggle-accordions-text">Collapse All</span>
                                    </button>
                                </div>
                            </div>
                            <div class="curr-domain-filters" id="domain-filters-bar">
                                <!-- Populated dynamically via JS -->
                            </div>
                        </div>

                        <div id="view-standards" class="curr-standards-list">
                            <div class="curr-standard-item">
                                <h4 class="curr-standard-title">CCSS.MATH.CONTENT.K.CC.A.1</h4>
                                <p class="curr-standard-desc">Count to 100 by ones and by tens. Students learn to recognize patterns in the number system and develop fluencies with number sequences.</p>
                            </div>
                            <div class="curr-standard-item">
                                <h4 class="curr-standard-title">CCSS.MATH.CONTENT.K.OA.A.1</h4>
                                <p class="curr-standard-desc">Represent addition and subtraction with objects, fingers, mental images, drawings, sounds, acting out situations, verbal explanations, expressions, or equations.</p>
                            </div>
                        </div>
                    </section>
                </div>

                <!-- Right: Highlights & Quick Links (1/3) -->
                <aside class="curr-col-side">
                    <!-- Key Competencies Card -->
                    <div class="curr-competencies-card">
                        <h4 class="curr-card-badge">Key Competencies</h4>
                        <ul id="view-competencies" class="curr-comp-list">
                            <li class="curr-comp-item">
                                <i class="fas fa-check-circle curr-comp-icon"></i>
                                <span class="curr-comp-text">Number Recognition to 100</span>
                            </li>
                            <li class="curr-comp-item">
                                <i class="fas fa-check-circle curr-comp-icon"></i>
                                <span class="curr-comp-text">Basic Shapes Identification</span>
                            </li>
                            <li class="curr-comp-item">
                                <i class="fas fa-check-circle curr-comp-icon"></i>
                                <span class="curr-comp-text">Simple Addition/Subtraction</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Mathematical Practices Card -->
                    <div id="view-practices-card" class="curr-competencies-card" style="display: none; margin-top: 1.5rem;">
                        <h4 class="curr-card-badge badge-indigo">
                            <i class="fas fa-brain"></i> Mathematical Practices
                        </h4>
                        <ol id="view-practices" class="curr-comp-list" style="list-style-type: decimal; padding-left: 1.5rem;">
                        </ol>
                    </div>

                    <!-- Level Link -->
                    <div class="curr-card curr-link-card">
                        <h4 class="curr-card-badge badge-gray">Practice Skills</h4>
                        <p class="curr-link-desc">Ready to test these skills? Head over to the interactive Level page.</p>
                        <a id="view-level-link" href="/levels/b.php" class="curr-btn-primary">
                            GO TO LEVEL B <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>

    <!-- Standard Mastery Dossier Modal (Large Detail Popup) -->
    <div id="std-dossier-modal" class="std-dossier-modal" role="dialog" aria-modal="true" aria-labelledby="dossier-standard-code" style="display: none;">
        <div class="std-dossier-backdrop" onclick="closeStandardDossier()"></div>
        <div class="std-dossier-dialog card-surface">
            <!-- Modal Header -->
            <div class="std-dossier-header">
                <div class="std-dossier-header-info">
                    <div class="std-dossier-badges">
                        <span id="dossier-subject-badge" class="std-dossier-pill pill-indigo">Mathematics</span>
                        <span id="dossier-grade-badge" class="std-dossier-pill pill-emerald">Kindergarten • Level B</span>
                        <span id="dossier-domain-badge" class="std-dossier-pill pill-slate">Domain</span>
                    </div>
                    <h2 id="dossier-standard-code" class="std-dossier-code-title">CCSS.MATH.CONTENT.K.CC.A.1</h2>
                </div>
                <button type="button" class="std-dossier-close-btn" onclick="closeStandardDossier()" aria-label="Close Standard Details">&times;</button>
            </div>

            <!-- Modal Scrollable Body -->
            <div class="std-dossier-body">
                <!-- 1. Official Standard Statement -->
                <section class="std-dossier-section">
                    <h3 class="std-dossier-section-title">
                        <i class="fas fa-bookmark color-indigo"></i> Official Standard Statement & Description
                    </h3>
                    <div id="dossier-standard-statement" class="std-dossier-statement-box"></div>
                </section>

                <!-- 2. Two-Column Grid: Objectives & Prerequisites -->
                <div class="std-dossier-grid">
                    <!-- Core Objectives -->
                    <section class="std-dossier-section">
                        <h3 class="std-dossier-section-title">
                            <i class="fas fa-bullseye color-emerald"></i> Key Competencies & Mastery Focus
                        </h3>
                        <ul id="dossier-objectives-list" class="std-dossier-list"></ul>
                    </section>

                    <!-- Learning Trajectory / Prerequisites -->
                    <section class="std-dossier-section">
                        <h3 class="std-dossier-section-title">
                            <i class="fas fa-stream color-amber"></i> Learning Continuum & Progression
                        </h3>
                        <div id="dossier-progression-box" class="std-dossier-progression-box"></div>
                    </section>
                </div>

                <!-- 3. Pedagogical Scaffolding & Neurodivergent Supports -->
                <section class="std-dossier-section">
                    <h3 class="std-dossier-section-title">
                        <i class="fas fa-hands-helping color-rose"></i> Pedagogical & Neurodivergent Scaffolding
                    </h3>
                    <div id="dossier-scaffolding-box" class="std-dossier-scaffolding-box"></div>
                </section>
            </div>

            <!-- Modal Footer with Lesson & Test Buttons -->
            <div class="std-dossier-footer">
                <div class="std-dossier-footer-left">
                    <button type="button" id="dossier-copy-btn" class="std-dossier-btn-secondary" onclick="copyCurrentDossierCode()">
                        <i class="far fa-copy"></i> Copy Code
                    </button>
                </div>
                <div class="std-dossier-footer-actions">
                    <a id="dossier-lesson-btn" href="/levels/b.php" class="std-dossier-btn-lesson">
                        <i class="fas fa-book-open"></i> Go to Lesson / Practice
                    </a>
                    <a id="dossier-test-btn" href="/assessment/#standard=3.OA.A.1" class="std-dossier-btn-test">
                        <i class="fas fa-tasks"></i> Test This Standard <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification for Standard Copy -->
    <div id="std-copy-toast" class="std-copy-toast" role="alert" aria-live="polite">
        <i class="fas fa-check-circle"></i> <span id="std-copy-toast-text">Standard copied to clipboard!</span>
    </div>
</main>

<script src="/assets/js/standards-ccss-math-ela.js"></script>
<!-- 
<script src="/assets/js/curriculum-teks.js"></script>
-->
<script>
    let currentSubject = 'math';
    let currentGrade = 'Kindergarten';
    let currentDomainFilter = 'all';

    const subjectsMap = {
        'math': { name: 'Mathematics', color: 'indigo', icon: 'fa-calculator', desc: 'Detailed learning paths, state standards alignment, and core competencies for Mathematics.' },
        'ela': { name: 'Language Arts', color: 'rose', icon: 'fa-book-open', desc: 'Detailed learning paths, state standards alignment, and core competencies for English Language Arts.' },
        'science': { name: 'Science', color: 'emerald', icon: 'fa-flask', desc: 'Detailed learning paths, state standards alignment, and core competencies for Next Generation Science Standards.' },
        'social': { name: 'Social Studies', color: 'amber', icon: 'fa-globe-americas', desc: 'Detailed learning paths, state standards alignment, and core competencies for C3 Framework Social Studies.' }
    };

    // Deep-linking helper: sync subject, grade & query with URL query params
    function syncUrlParams() {
        const url = new URL(window.location);
        url.searchParams.set('subject', currentSubject);
        url.searchParams.set('grade', currentGrade);
        const searchInput = document.getElementById('standards-search-input');
        const q = searchInput ? searchInput.value.trim() : '';
        if (q) {
            url.searchParams.set('q', q);
        } else {
            url.searchParams.delete('q');
        }
        window.history.replaceState(null, '', url);
    }

    // Initialize state from URL params
    function initFromUrl() {
        const params = new URLSearchParams(window.location.search);
        const subjParam = params.get('subject');
        const gradeParam = params.get('grade');
        const qParam = params.get('q');

        if (subjParam && ['math', 'ela', 'science', 'social'].includes(subjParam.toLowerCase())) {
            currentSubject = subjParam.toLowerCase();
        }

        if (gradeParam) {
            const matchingChip = Array.from(document.querySelectorAll('.curr-chip')).find(
                c => c.dataset.grade.toLowerCase() === gradeParam.toLowerCase()
            );
            if (matchingChip) {
                currentGrade = matchingChip.dataset.grade;
            }
        }

        if (qParam) {
            const searchInput = document.getElementById('standards-search-input');
            const clearBtn = document.getElementById('standards-search-clear');
            if (searchInput) {
                searchInput.value = qParam;
                if (clearBtn) clearBtn.style.display = 'inline-flex';
            }
        }
    }

    function switchSubject(id, syncUrl = true) {
        currentSubject = id;
        const data = (typeof curriculumData !== 'undefined' && curriculumData[id]) || subjectsMap[id] || { name: id, color: 'primary', icon: 'fa-info-circle', desc: 'Curriculum details.' };
        
        // Update Tabs
        document.querySelectorAll('.curr-tab-btn').forEach(btn => {
            btn.classList.remove('active');
            btn.className = btn.className.replace(/tab-color-\S+/g, '');
            btn.setAttribute('aria-selected', 'false');
        });
        
        const activeBtn = document.getElementById(`tab-${id}`);
        if(activeBtn) {
            activeBtn.classList.add('active');
            activeBtn.classList.add(`tab-color-${data.color}`);
            activeBtn.setAttribute('aria-selected', 'true');
        }

        // Update Header
        const headerEl = document.getElementById('curr-header');
        if (headerEl) {
            headerEl.setAttribute('data-subject', id);
        }
        const badgeEl = document.getElementById('curr-subject-badge');
        if (badgeEl) {
            const iconClass = data.icon || subjectsMap[id]?.icon || 'fa-graduation-cap';
            badgeEl.innerHTML = `<i class="fas ${iconClass}"></i> <span>${data.name || subjectsMap[id]?.name || 'Curriculum'} Standards Alignment</span>`;
        }

        const nameEl = document.getElementById('display-subject-name');
        if (nameEl) {
            nameEl.innerText = activeBtn ? activeBtn.innerText.trim() : (data.name || id);
            nameEl.className = `color-${data.color}`;
        }
        const descEl = document.getElementById('display-subject-desc');
        if (descEl) {
            descEl.innerText = data.desc || subjectsMap[id]?.desc || 'Curriculum details.';
        }

        if (syncUrl) syncUrlParams();
        updateView();
    }

    function getGroupForGrade(gradeName) {
        const chip = document.querySelector(`.curr-chip[data-grade="${gradeName}"]`);
        if (chip && chip.dataset.parentGroup) return chip.dataset.parentGroup;
        if (['Pre-K', 'Kindergarten', '1st Grade', '2nd Grade', '3rd Grade', '4th Grade', '5th Grade'].includes(gradeName)) {
            return 'elementary';
        }
        if (['6th Grade', '7th Grade', '8th Grade'].includes(gradeName)) {
            return 'middle';
        }
        return 'high';
    }

    function toggleGradeGroup(groupId, autoSelect = false) {
        const panel = document.getElementById(`group-panel-${groupId}`);
        const isCurrentlyOpen = panel && panel.classList.contains('open');
        if (isCurrentlyOpen) {
            closeAllGradeGroups();
        } else {
            expandGradeGroup(groupId, autoSelect);
        }
    }

    function closeAllGradeGroups() {
        document.querySelectorAll('.curr-group-btn').forEach(btn => {
            btn.classList.remove('expanded');
            btn.setAttribute('aria-expanded', 'false');
        });
        document.querySelectorAll('.curr-group-panel').forEach(panel => {
            panel.classList.remove('open');
        });
    }

    function expandGradeGroup(groupId, autoSelect = false) {
        // Update group buttons
        document.querySelectorAll('.curr-group-btn').forEach(btn => {
            const isTarget = (btn.dataset.group === groupId);
            btn.classList.toggle('active', isTarget);
            btn.classList.toggle('expanded', isTarget);
            btn.setAttribute('aria-expanded', isTarget ? 'true' : 'false');
        });

        // Update group panels
        document.querySelectorAll('.curr-group-panel').forEach(panel => {
            panel.classList.toggle('open', panel.dataset.group === groupId);
        });

        // If autoSelect is true and currentGrade is not in this group, switch to first grade in this group
        if (autoSelect) {
            const panel = document.getElementById(`group-panel-${groupId}`);
            const currentInGroup = panel?.querySelector(`.curr-chip[data-grade="${currentGrade}"]`);
            if (!currentInGroup) {
                const firstChip = panel?.querySelector('.curr-chip');
                if (firstChip) {
                    switchGrade(firstChip.dataset.grade, firstChip.dataset.level, true, false);
                }
            }
        }
    }

    function switchGrade(gradeName, level, syncUrl = true, shouldClose = false) {
        currentGrade = gradeName;
        
        document.querySelectorAll('.curr-chip').forEach(chip => {
            const isActive = chip.dataset.grade === gradeName;
            chip.classList.toggle('active', isActive);
            chip.setAttribute('aria-selected', isActive ? 'true' : 'false');
        });

        // Update parent group button active indicator and badge
        const parentGroupId = getGroupForGrade(gradeName);
        document.querySelectorAll('.curr-group-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.group === parentGroupId);
        });

        document.querySelectorAll('.curr-group-active-badge').forEach(badge => {
            badge.innerText = '';
            badge.style.display = 'none';
        });
        const activeBadge = document.getElementById(`group-badge-${parentGroupId}`);
        if (activeBadge) {
            activeBadge.innerText = gradeName;
            activeBadge.style.display = 'inline-flex';
        }

        // Close dropdown when requested (e.g. user selected grade)
        if (shouldClose) {
            setTimeout(closeAllGradeGroups, 180);
        }

        if (syncUrl) syncUrlParams();
        updateView();
    }

    function updateView() {
        const view = document.getElementById('curriculum-view');
        if (!view) return;
        view.style.opacity = '0';
        view.style.transform = 'translateY(10px)';
        
        setTimeout(() => {
            const subject = (typeof curriculumData !== 'undefined' && curriculumData[currentSubject]) ? curriculumData[currentSubject] : subjectsMap[currentSubject];
            
            // Resolve grade data, mapping high school grades (9th-12th) to 'High School' if not individually keyed
            let gradeData = null;
            if (subject && subject.grades) {
                gradeData = subject.grades[currentGrade] || (
                    ['9th Grade', '10th Grade', '11th Grade', '12th Grade'].includes(currentGrade) ? subject.grades['High School'] : null
                );
            }
            
            const activeCurr = (window.currentSettings && window.currentSettings.curriculum) || 'engageny';
            const resolvedCurr = (activeCurr === 'engageny') ? 'ccss' : activeCurr;
            if (gradeData && (gradeData.ccss || gradeData.teks || gradeData.custom)) {
                gradeData = gradeData[resolvedCurr];
            }

            if (!gradeData) {
                const currNames = {
                    'ccss': 'Common Core / EngageNY',
                    'teks': 'Texas TEKS',
                    'custom': "Hesten's Custom"
                };
                const activeCurrName = currNames[resolvedCurr] || activeCurr;
                
                gradeData = {
                    title: `${currentGrade} ${(subject ? subject.name : currentSubject).toUpperCase()} Outline (${activeCurrName})`,
                    overview: `<p>Outline and detailed curriculum for ${currentGrade} ${currentSubject} (${activeCurrName}) is being updated. Please check back soon or visit the specific level page.</p>`,
                    standards: '<p>Standards data coming soon.</p>',
                    competencies: ['Information Pending'],
                    level: 'A'
                };
            }

            // Update Titles & Overview
            document.getElementById('view-title').innerText = gradeData.title;
            document.getElementById('view-overview').innerHTML = gradeData.overview;
            
            // Format and Inject Standards with Copy Badges
            const standardsContainer = document.getElementById('view-standards');
            const rawStandards = Array.isArray(gradeData.standards) ? gradeData.standards.join('\n') : gradeData.standards;
            standardsContainer.innerHTML = rawStandards || '<p>Standards data coming soon.</p>';
            
            // Process standard items: add copy badges, wrap in accordion cards, and assign domain tags
            const standardItems = standardsContainer.querySelectorAll('.curr-standard-item');
            const domainSet = new Set();
            let totalStandardCodesCount = 0;

            standardItems.forEach(item => {
                const titleEl = item.querySelector('.curr-standard-title');
                const domainTitle = titleEl ? titleEl.innerText.trim() : 'General';
                item.dataset.domain = domainTitle;
                domainSet.add(domainTitle);

                const currentLevelLetter = (gradeData.level || 'a').toLowerCase();

                // Enhance standard description codes with copy badge and info (i) popup trigger
                const descElements = Array.from(item.querySelectorAll('.curr-standard-desc'));
                descElements.forEach(descEl => {
                    if (!descEl.dataset.originalHtml) {
                        descEl.dataset.originalHtml = descEl.innerHTML;
                    }
                    let html = descEl.dataset.originalHtml;
                    // Match <strong>CODE:</strong> or <strong>CODE</strong>
                    html = html.replace(/<strong>([A-Za-z0-9\.\-_ ]+?):?<\/strong>/g, (match, code) => {
                        totalStandardCodesCount++;
                        const cleanCode = code.trim();
                        return `<span class="std-code-wrap" data-std-code="${cleanCode}">` +
                            `<button type="button" class="std-code-badge" data-code="${cleanCode}" title="Click to copy standard code"><i class="far fa-copy"></i> ${cleanCode}</button>` +
                            `<button type="button" class="std-info-btn" data-code="${cleanCode}" aria-label="View Standard Details for ${cleanCode}" title="View detailed standard mastery dossier"><i class="fas fa-info-circle"></i></button>` +
                            `<span class="std-progress-badge" data-code="${cleanCode}" style="display: none;"></span>` +
                        `</span>`;
                    });
                    descEl.innerHTML = html;
                    descEl.dataset.processedHtml = html;
                });

                const descCount = descElements.length || 1;

                // Wrap into Accordion card if title exists
                if (titleEl && !item.querySelector('.curr-accordion-header')) {
                    const bodyNodes = [];
                    let next = titleEl.nextSibling;
                    while (next) {
                        const current = next;
                        next = next.nextSibling;
                        bodyNodes.push(current);
                    }

                    const headerDiv = document.createElement('div');
                    headerDiv.className = 'curr-accordion-header';
                    headerDiv.setAttribute('role', 'button');
                    headerDiv.setAttribute('aria-expanded', 'true');
                    headerDiv.setAttribute('tabindex', '0');
                    headerDiv.innerHTML = `
                        <div class="curr-accordion-title-wrap">
                            <h4 class="curr-standard-title">${escapeHtml(domainTitle)}</h4>
                            <span class="curr-accordion-count">${descCount} standard${descCount === 1 ? '' : 's'}</span>
                        </div>
                        <i class="fas fa-chevron-down curr-accordion-chevron"></i>
                    `;

                    const bodyDiv = document.createElement('div');
                    bodyDiv.className = 'curr-accordion-body';
                    bodyNodes.forEach(node => bodyDiv.appendChild(node));

                    titleEl.remove();
                    item.appendChild(headerDiv);
                    item.appendChild(bodyDiv);

                    headerDiv.addEventListener('click', (e) => {
                        if (e.target.closest('button')) return;
                        item.classList.toggle('collapsed');
                        headerDiv.setAttribute('aria-expanded', !item.classList.contains('collapsed'));
                        updateAccordionToggleBtnState();
                    });

                    headerDiv.addEventListener('keydown', (e) => {
                        if (e.key === 'Enter' || e.key === ' ') {
                            e.preventDefault();
                            headerDiv.click();
                        }
                    });
                }
            });

            // If no codes were in <strong> tags, count items as standards
            if (totalStandardCodesCount === 0) {
                totalStandardCodesCount = standardItems.length;
            }

            // Reset accordion toggle button state
            allAccordionsExpanded = true;
            updateAccordionToggleBtnState();

            // Build Domain Filter Pills
            const filterBar = document.getElementById('domain-filters-bar');
            currentDomainFilter = 'all';
            if (filterBar) {
                if (domainSet.size > 1) {
                    let pillsHtml = `<button type="button" class="curr-domain-pill active" data-domain="all" onclick="filterByDomain('all')">All (${standardItems.length})</button>`;
                    domainSet.forEach(domain => {
                        pillsHtml += `<button type="button" class="curr-domain-pill" data-domain="${escapeAttr(domain)}" onclick="filterByDomain('${escapeAttr(domain)}')" title="${escapeAttr(domain)}">${escapeHtml(domain)}</button>`;
                    });
                    filterBar.innerHTML = pillsHtml;
                    filterBar.style.display = 'flex';
                } else {
                    filterBar.innerHTML = '';
                    filterBar.style.display = 'none';
                }
            }

            // Synchronize search input and clear button state without wiping user query
            const searchInput = document.getElementById('standards-search-input');
            const searchClear = document.getElementById('standards-search-clear');
            if (searchInput && searchInput.value.trim().length > 0) {
                if (searchClear) searchClear.style.display = 'inline-flex';
            } else {
                if (searchClear) searchClear.style.display = 'none';
            }

            // Update Quick Stats Bar
            const statDomains = document.getElementById('stat-domains-count');
            const statStandards = document.getElementById('stat-standards-count');
            const statCompetencies = document.getElementById('stat-competencies-count');
            const statLevel = document.getElementById('stat-level-code');

            if (statDomains) statDomains.innerText = domainSet.size || (standardItems.length ? standardItems.length : '-');
            if (statStandards) statStandards.innerText = totalStandardCodesCount || '-';
            if (statCompetencies) statCompetencies.innerText = (gradeData.competencies && gradeData.competencies.length) || '0';
            if (statLevel) statLevel.innerText = `Level ${gradeData.level ? gradeData.level.toUpperCase() : 'A'}`;

            // Update Competencies list
            const compList = document.getElementById('view-competencies');
            if (compList && gradeData.competencies) {
                compList.innerHTML = gradeData.competencies.map(c => `
                    <li class="curr-comp-item">
                        <i class="fas fa-check-circle curr-comp-icon"></i>
                        <span class="curr-comp-text">${escapeHtml(c)}</span>
                    </li>
                `).join('');
            }

            // Mathematical Practices (if present for this grade)
            const practicesCard = document.getElementById('view-practices-card');
            const practicesList = document.getElementById('view-practices');
            if (practicesCard && practicesList) {
                if (gradeData.practices && gradeData.practices.length > 0) {
                    practicesList.innerHTML = gradeData.practices.map(p => `
                        <li class="curr-comp-item" style="display: list-item; margin-bottom: 0.5rem;">
                            <span class="curr-comp-text">${escapeHtml(p.replace(/^\d+\.\s*/, ''))}</span>
                        </li>
                    `).join('');
                    practicesCard.style.display = 'block';
                } else {
                    practicesCard.style.display = 'none';
                }
            }

            // Update Practice Skills / Level Link
            const levelLink = document.getElementById('view-level-link');
            if (levelLink && gradeData.level) {
                levelLink.href = `/levels/${gradeData.level.toLowerCase()}.php`;
                levelLink.innerHTML = `GO TO LEVEL ${gradeData.level.toUpperCase()} <i class="fas fa-arrow-right ml-2"></i>`;
            }

            // Content icon
            const contentIcon = document.getElementById('content-icon');
            if (contentIcon) {
                contentIcon.innerHTML = `<i class="fas ${(subject && subject.icon) ? subject.icon : 'fa-info-circle'}"></i>`;
            }

            // Apply filter and animate view
            applyStandardsFilters();
            view.style.opacity = '1';
            view.style.transform = 'translateY(0)';

            // Render MathJax equations if present
            if (typeof window.ensureMathJax === 'function') {
                window.ensureMathJax().then(mj => {
                    if (mj && mj.typesetPromise) {
                        mj.typesetPromise([standardsContainer]).catch(err => console.debug('MathJax typeset:', err));
                    }
                }).catch(e => console.debug('MathJax ensure:', e));
            }
        }, 200);
    }

    // Domain Filtering
    function filterByDomain(domain) {
        currentDomainFilter = domain;
        document.querySelectorAll('.curr-domain-pill').forEach(pill => {
            pill.classList.toggle('active', pill.dataset.domain === domain);
        });
        applyStandardsFilters();
    }

    // Real-time Standards Search & Filters
    function handleStandardsSearch() {
        const searchInput = document.getElementById('standards-search-input');
        const clearBtn = document.getElementById('standards-search-clear');
        if (searchInput && clearBtn) {
            clearBtn.style.display = searchInput.value.trim().length > 0 ? 'inline-flex' : 'none';
        }
        syncUrlParams();
        applyStandardsFilters();
    }

    function clearStandardsSearch() {
        const searchInput = document.getElementById('standards-search-input');
        const clearBtn = document.getElementById('standards-search-clear');
        if (searchInput) searchInput.value = '';
        if (clearBtn) clearBtn.style.display = 'none';
        syncUrlParams();
        applyStandardsFilters();
    }

    function applyStandardsFilters() {
        const searchInput = document.getElementById('standards-search-input');
        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
        const items = document.querySelectorAll('#view-standards .curr-standard-item');
        const counter = document.getElementById('standards-results-counter');
        let matchCount = 0;
        let visibleDomainCount = 0;

        items.forEach(item => {
            const domain = item.dataset.domain || '';
            const domainMatches = (currentDomainFilter === 'all' || domain === currentDomainFilter);

            if (!domainMatches) {
                item.style.display = 'none';
                return;
            }

            if (!query) {
                item.style.display = 'block';
                item.querySelectorAll('.curr-standard-desc').forEach(p => {
                    p.style.display = 'block';
                    if (p.dataset.processedHtml) p.innerHTML = p.dataset.processedHtml;
                });
                visibleDomainCount++;
                matchCount += item.querySelectorAll('.curr-standard-desc').length || 1;
                return;
            }

            const titleText = item.querySelector('.curr-standard-title')?.innerText.toLowerCase() || '';
            const titleMatches = titleText.includes(query);
            let matchingParas = 0;

            item.querySelectorAll('.curr-standard-desc').forEach(p => {
                const baseHtml = p.dataset.processedHtml || p.innerHTML;
                const pText = p.innerText.toLowerCase();
                if (titleMatches || pText.includes(query)) {
                    p.style.display = 'block';
                    matchingParas++;
                    // Dynamic query highlighting (avoiding breaking HTML tags)
                    if (query.length >= 2) {
                        try {
                            const escapedQuery = query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                            const regex = new RegExp(`(?![^<]*>)(${escapedQuery})`, 'gi');
                            p.innerHTML = baseHtml.replace(regex, '<mark class="std-highlight">$1</mark>');
                        } catch(e) {
                            p.innerHTML = baseHtml;
                        }
                    } else {
                        p.innerHTML = baseHtml;
                    }
                } else {
                    p.style.display = 'none';
                    p.innerHTML = baseHtml;
                }
            });

            if (titleMatches || matchingParas > 0) {
                item.style.display = 'block';
                // Auto-expand card if search query matches
                if (query) {
                    item.classList.remove('collapsed');
                    const header = item.querySelector('.curr-accordion-header');
                    if (header) header.setAttribute('aria-expanded', 'true');
                }
                visibleDomainCount++;
                matchCount += matchingParas || 1;
            } else {
                item.style.display = 'none';
            }
        });

        // Update accordion toggle button state
        updateAccordionToggleBtnState();

        // Empty state & Cross-Grade Discovery
        let noResultsEl = document.getElementById('curr-standards-no-results');
        const standardsContainer = document.getElementById('view-standards');
        if (matchCount === 0 && items.length > 0 && standardsContainer) {
            if (!noResultsEl) {
                noResultsEl = document.createElement('div');
                noResultsEl.id = 'curr-standards-no-results';
                noResultsEl.className = 'curr-no-results';
                standardsContainer.appendChild(noResultsEl);
            }

            // Cross-Grade Standards Discovery
            let crossGradeMatchesHtml = '';
            if (query.length >= 2 && typeof curriculumData !== 'undefined') {
                const subjData = curriculumData[currentSubject];
                if (subjData && subjData.grades) {
                    const crossMatches = [];
                    Object.entries(subjData.grades).forEach(([gName, gVal]) => {
                        if (gName.toLowerCase() === currentGrade.toLowerCase()) return;
                        const resolved = (gVal.ccss || gVal.teks || gVal);
                        if (resolved && resolved.standards) {
                            const tempDiv = document.createElement('div');
                            tempDiv.innerHTML = Array.isArray(resolved.standards) ? resolved.standards.join('\n') : resolved.standards;
                            let count = 0;
                            tempDiv.querySelectorAll('.curr-standard-desc, .curr-standard-title').forEach(el => {
                                if (el.innerText.toLowerCase().includes(query)) count++;
                            });
                            if (count > 0) {
                                crossMatches.push({
                                    grade: gName,
                                    level: resolved.level || 'A',
                                    count: count
                                });
                            }
                        }
                    });

                    if (crossMatches.length > 0) {
                        crossGradeMatchesHtml = `
                            <div class="curr-cross-grade-alert">
                                <div class="curr-cross-grade-title">
                                    <i class="fas fa-compass"></i>
                                    <span>Standards matching "<strong>${escapeHtml(query)}</strong>" found in other grades:</span>
                                </div>
                                <div class="curr-cross-grade-chips">
                                    ${crossMatches.map(m => `
                                        <button type="button" class="curr-cross-grade-chip-btn" onclick="jumpToGrade('${escapeAttr(m.grade)}', '${escapeAttr(m.level)}')">
                                            <i class="fas fa-layer-group"></i> ${escapeHtml(m.grade)} (Level ${escapeHtml(m.level.toUpperCase())}) &bull; ${m.count} match${m.count === 1 ? '' : 'es'} &rarr;
                                        </button>
                                    `).join('')}
                                </div>
                            </div>
                        `;
                    }
                }
            }

            noResultsEl.innerHTML = `
                <i class="fas fa-search-minus curr-no-results-icon"></i>
                <h4 class="curr-no-results-title">No matching standards found</h4>
                <p class="curr-no-results-desc">No standards matched "<strong>${escapeHtml(query)}</strong>" in ${escapeHtml(currentGrade)} ${escapeHtml(currentSubject.toUpperCase())}.</p>
                ${crossGradeMatchesHtml}
                <div style="margin-top: 1.25rem;">
                    <button type="button" class="curr-btn-reset-filter" onclick="clearStandardsSearch(); filterByDomain('all');">
                        <i class="fas fa-undo"></i> Reset Search & Filters
                    </button>
                </div>
            `;
            noResultsEl.style.display = 'block';
        } else if (noResultsEl) {
            noResultsEl.style.display = 'none';
        }

        // Update counter badge
        if (counter) {
            if (query || currentDomainFilter !== 'all') {
                counter.innerText = `${matchCount} standard${matchCount === 1 ? '' : 's'} (${visibleDomainCount} domain${visibleDomainCount === 1 ? '' : 's'})`;
                counter.style.display = 'inline-block';
            } else {
                counter.innerText = '';
                counter.style.display = 'none';
            }
        }

        // Apply mastery progress overlay onto visible items
        applyProgressOverlay();
    }

    // ==========================================
    // Standards Progress Mastery Overlay
    // ==========================================
    let showProgressOverlay = (localStorage.getItem('hesten_show_standards_progress') === 'true');

    function toggleStandardsProgressOverlay(enabled) {
        showProgressOverlay = enabled;
        localStorage.setItem('hesten_show_standards_progress', enabled ? 'true' : 'false');
        const toggleEl = document.getElementById('toggle-standards-progress');
        if (toggleEl) toggleEl.checked = enabled;
        applyProgressOverlay();
    }

    function applyProgressOverlay() {
        const stdContainer = document.getElementById('view-standards');
        if (!stdContainer) return;

        if (!showProgressOverlay) {
            stdContainer.classList.remove('show-mastery-overlay');
            document.querySelectorAll('.std-progress-badge').forEach(el => el.style.display = 'none');
            document.querySelectorAll('.curr-standard-item').forEach(el => {
                el.classList.remove('std-item-mastered', 'std-item-proficient', 'std-item-developing');
            });
            return;
        }

        stdContainer.classList.add('show-mastery-overlay');
        let masteryData = {};
        try {
            const raw = localStorage.getItem('hesten_standards_mastery');
            if (raw) masteryData = JSON.parse(raw);
        } catch(e){}

        document.querySelectorAll('.std-code-wrap').forEach(wrap => {
            const code = wrap.dataset.stdCode;
            if (!code) return;

            let item = masteryData[code];
            if (!item) {
                // Check if any key in masteryData matches this code or vice versa
                const codeClean = code.toLowerCase().replace(/[^a-z0-9]/g, '');
                for (const k in masteryData) {
                    const kClean = k.toLowerCase().replace(/[^a-z0-9]/g, '');
                    if (kClean === codeClean || codeClean.includes(kClean) || kClean.includes(codeClean)) {
                        item = masteryData[k];
                        break;
                    }
                }
            }

            const badge = wrap.querySelector('.std-progress-badge');
            const parentCard = wrap.closest('.curr-standard-item');

            if (badge) {
                if (item) {
                    const score = item.bestScore !== undefined ? item.bestScore : (item.score || 0);
                    let statusClass = 'developing';
                    let statusIcon = 'fa-redo';
                    let statusLabel = `${score}%`;

                    if (item.status === 'mastered' || score >= 80) {
                        statusClass = 'mastered';
                        statusIcon = 'fa-check-circle';
                        if (parentCard) parentCard.classList.add('std-item-mastered');
                    } else if (item.status === 'proficient' || score >= 60) {
                        statusClass = 'proficient';
                        statusIcon = 'fa-chart-line';
                        if (parentCard) parentCard.classList.add('std-item-proficient');
                    } else {
                        if (parentCard) parentCard.classList.add('std-item-developing');
                    }

                    badge.className = `std-progress-badge ${statusClass}`;
                    badge.innerHTML = `<i class="fas ${statusIcon}"></i> ${statusLabel}`;
                    badge.title = `Your Highest Mastery: ${score}% (${item.totalAttempts || 1} attempt${(item.totalAttempts || 1) === 1 ? '' : 's'})`;
                    badge.style.display = 'inline-flex';
                } else {
                    badge.className = 'std-progress-badge untested';
                    badge.innerHTML = `<i class="far fa-circle"></i> Untested`;
                    badge.title = 'Standard has not been tested yet — click (i) to test';
                    badge.style.display = 'inline-flex';
                }
            }
        });
    }

    // Cross-Grade Jump Action
    function jumpToGrade(gradeName, level) {
        currentGrade = gradeName;
        document.querySelectorAll('.curr-chip').forEach(chip => {
            chip.classList.toggle('active', chip.dataset.grade === gradeName);
        });
        syncUrlParams();
        updateView();
    }

    // Accordion Controls
    let allAccordionsExpanded = true;
    function toggleAllAccordions() {
        const items = document.querySelectorAll('#view-standards .curr-standard-item');
        allAccordionsExpanded = !allAccordionsExpanded;
        items.forEach(item => {
            item.classList.toggle('collapsed', !allAccordionsExpanded);
            const header = item.querySelector('.curr-accordion-header');
            if (header) header.setAttribute('aria-expanded', allAccordionsExpanded);
        });
        updateAccordionToggleBtnState();
    }

    function updateAccordionToggleBtnState() {
        const items = Array.from(document.querySelectorAll('#view-standards .curr-standard-item'));
        if (!items.length) return;
        const collapsedCount = items.filter(i => i.classList.contains('collapsed')).length;
        const btn = document.getElementById('btn-toggle-accordions');
        const text = document.getElementById('toggle-accordions-text');
        const icon = btn?.querySelector('i');

        if (collapsedCount > items.length / 2) {
            allAccordionsExpanded = false;
            if (text) text.innerText = 'Expand All';
            if (icon) icon.className = 'fas fa-expand-alt';
        } else {
            allAccordionsExpanded = true;
            if (text) text.innerText = 'Collapse All';
            if (icon) icon.className = 'fas fa-compress-alt';
        }
    }

    // Data Export Functionality (CSV & JSON)
    function toggleExportMenu(e) {
        if (e) e.stopPropagation();
        const menu = document.getElementById('curr-export-menu');
        menu?.classList.toggle('show');
    }

    function csvEscape(val) {
        if (val === null || val === undefined) return '""';
        const str = String(val).replace(/"/g, '""').trim();
        return `"${str}"`;
    }

    function exportStandardsCSV() {
        const levelCode = document.getElementById('stat-level-code')?.innerText || '';
        const rows = [
            ['Subject', 'Grade Level', 'Curriculum Level', 'Domain / Strand', 'Standard Code', 'Description']
        ];

        const items = document.querySelectorAll('#view-standards .curr-standard-item');
        items.forEach(item => {
            const domain = item.dataset.domain || 'General';
            const descs = item.querySelectorAll('.curr-standard-desc');
            if (descs.length > 0) {
                descs.forEach(p => {
                    const badge = p.querySelector('.std-code-badge');
                    const code = badge ? (badge.dataset.code || badge.innerText.trim()) : '';
                    const clone = p.cloneNode(true);
                    clone.querySelectorAll('.std-action-btn, .std-code-badge').forEach(el => el.remove());
                    let descText = clone.innerText.replace(/^\s*[:\-–]\s*/, '').trim();
                    rows.push([
                        subjectsMap[currentSubject]?.name || currentSubject,
                        currentGrade,
                        levelCode,
                        domain,
                        code,
                        descText
                    ]);
                });
            } else {
                rows.push([
                    subjectsMap[currentSubject]?.name || currentSubject,
                    currentGrade,
                    levelCode,
                    domain,
                    '',
                    item.innerText.trim()
                ]);
            }
        });

        const csvString = rows.map(r => r.map(csvEscape).join(',')).join('\r\n');
        const blob = new Blob(['\uFEFF' + csvString], { type: 'text/csv;charset=utf-8;' });
        const cleanGrade = currentGrade.toLowerCase().replace(/\s+/g, '-');
        downloadFile(blob, `standards-${currentSubject}-${cleanGrade}.csv`);
        document.getElementById('curr-export-menu')?.classList.remove('show');
    }

    function exportStandardsJSON() {
        const levelCode = document.getElementById('stat-level-code')?.innerText || '';
        const exportData = {
            metadata: {
                generator: "Hesten's Learning Standards & Outlines",
                exportedAt: new Date().toISOString(),
                subject: currentSubject,
                subjectName: subjectsMap[currentSubject]?.name || currentSubject,
                grade: currentGrade,
                level: levelCode
            },
            title: document.getElementById('view-title')?.innerText || '',
            overview: document.getElementById('view-overview')?.innerText || '',
            competencies: Array.from(document.querySelectorAll('#view-competencies .curr-comp-text')).map(el => el.innerText.trim()),
            domains: []
        };

        const items = document.querySelectorAll('#view-standards .curr-standard-item');
        items.forEach(item => {
            const domain = item.dataset.domain || 'General';
            const standards = [];
            item.querySelectorAll('.curr-standard-desc').forEach(p => {
                const badge = p.querySelector('.std-code-badge');
                const code = badge ? (badge.dataset.code || badge.innerText.trim()) : '';
                const clone = p.cloneNode(true);
                clone.querySelectorAll('.std-action-btn, .std-code-badge').forEach(el => el.remove());
                let descText = clone.innerText.replace(/^\s*[:\-–]\s*/, '').trim();
                standards.push({
                    code: code,
                    description: descText
                });
            });
            exportData.domains.push({
                domain: domain,
                standardsCount: standards.length,
                standards: standards
            });
        });

        const jsonString = JSON.stringify(exportData, null, 2);
        const blob = new Blob([jsonString], { type: 'application/json;charset=utf-8;' });
        const cleanGrade = currentGrade.toLowerCase().replace(/\s+/g, '-');
        downloadFile(blob, `standards-${currentSubject}-${cleanGrade}.json`);
        document.getElementById('curr-export-menu')?.classList.remove('show');
    }

    function downloadFile(blob, filename) {
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);
        showCopyToast(`Exported ${filename}`);
    }

    // 1-Click Copy Standard Code to Clipboard
    function copyStandardCode(code) {
        if (!code) return;
        if (navigator.clipboard && navigator.clipboard.writeText) {
            navigator.clipboard.writeText(code).then(() => {
                showCopyToast(`Copied ${code} to clipboard!`);
            }).catch(() => fallbackCopy(code));
        } else {
            fallbackCopy(code);
        }
    }

    function fallbackCopy(text) {
        const ta = document.createElement('textarea');
        ta.value = text;
        ta.style.position = 'fixed';
        ta.style.opacity = '0';
        document.body.appendChild(ta);
        ta.select();
        try {
            document.execCommand('copy');
            showCopyToast(`Copied ${text} to clipboard!`);
        } catch (err) {
            console.error('Failed to copy', err);
        }
        document.body.removeChild(ta);
    }

    let toastTimer = null;
    function showCopyToast(message) {
        const toast = document.getElementById('std-copy-toast');
        const toastText = document.getElementById('std-copy-toast-text');
        if (!toast) return;
        if (toastText) toastText.innerText = message;
        toast.classList.add('visible');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(() => {
            toast.classList.remove('visible');
        }, 2200);
    }

    // Helper functions
    function escapeHtml(str) {
        return (str || '').replace(/[&<>"']/g, m => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        }[m]));
    }

    function escapeAttr(str) {
        return (str || '').replace(/["'\\]/g, '\\$&');
    }

    let currentDossierCode = '';

    function openStandardDossier(code, itemEl) {
        if (!code) return;
        currentDossierCode = code;

        const modal = document.getElementById('std-dossier-modal');
        if (!modal) return;

        const domain = itemEl?.dataset?.domain || 'General';
        const subjInfo = subjectsMap[currentSubject] || { name: 'Curriculum', color: 'indigo' };
        const gradeLetter = (document.getElementById('stat-level-code')?.innerText || 'Level A').replace('Level ', '').toLowerCase();

        // Header Badges
        const subjBadge = document.getElementById('dossier-subject-badge');
        if (subjBadge) {
            subjBadge.innerText = subjInfo.name;
            subjBadge.className = `std-dossier-pill pill-${subjInfo.color || 'indigo'}`;
        }

        const gradeBadge = document.getElementById('dossier-grade-badge');
        if (gradeBadge) {
            gradeBadge.innerText = `${currentGrade} • Level ${gradeLetter.toUpperCase()}`;
        }

        const domainBadge = document.getElementById('dossier-domain-badge');
        if (domainBadge) {
            domainBadge.innerText = domain;
        }

        const codeTitle = document.getElementById('dossier-standard-code');
        if (codeTitle) {
            codeTitle.innerText = code;
        }

        // Find standard description text
        let descText = "";
        if (itemEl) {
            const descs = Array.from(itemEl.querySelectorAll('.curr-standard-desc'));
            const matchingDesc = descs.find(d => d.innerText.includes(code)) || descs[0];
            if (matchingDesc) {
                const clone = matchingDesc.cloneNode(true);
                clone.querySelectorAll('.std-code-wrap, .std-code-badge, .std-info-btn').forEach(el => el.remove());
                descText = clone.innerText.replace(/^\s*[:\-–]\s*/, '').trim();
            }
        }
        if (!descText) {
            descText = `Core standard requirements aligned with the ${currentGrade} ${subjInfo.name} curriculum.`;
        }

        const stmtBox = document.getElementById('dossier-standard-statement');
        if (stmtBox) {
            stmtBox.innerHTML = `<p>${escapeHtml(descText)}</p>`;
        }

        // Objectives
        const objList = document.getElementById('dossier-objectives-list');
        if (objList) {
            let objectives = [];
            if (currentSubject === 'math') {
                objectives = [
                    `Master foundational understanding of <strong>${escapeHtml(domain)}</strong> principles.`,
                    `Apply problem-solving strategies using multiple concrete, pictorial, and symbolic representations.`,
                    `Demonstrate procedural fluency and communicate mathematical reasoning clearly.`
                ];
            } else if (currentSubject === 'ela') {
                objectives = [
                    `Cite key textual evidence and analyze core ideas within grade-level literature or informational texts.`,
                    `Develop vocabulary acquisition and contextual word analysis skills.`,
                    `Construct coherent spoken and written responses adhering to standard conventions.`
                ];
            } else if (currentSubject === 'science') {
                objectives = [
                    `Formulate testable scientific questions and engage in inquiry-based investigations.`,
                    `Construct evidence-based explanations connecting cause and effect.`,
                    `Analyze patterns across physical, life, and earth systems.`
                ];
            } else {
                objectives = [
                    `Evaluate primary and secondary sources to examine chronological and spatial perspectives.`,
                    `Analyze civic roles, democratic institutions, and economic interactions.`,
                    `Communicate informed conclusions through reasoned discourse and evidence.`
                ];
            }
            objList.innerHTML = objectives.map(obj => `
                <li class="std-dossier-list-item">
                    <i class="fas fa-check-circle"></i>
                    <span>${obj}</span>
                </li>
            `).join('');
        }

        // Progression Continuum
        const progBox = document.getElementById('dossier-progression-box');
        if (progBox) {
            progBox.innerHTML = `
                <div style="display: flex; flex-direction: column; gap: 0.75rem;">
                    <div>
                        <strong style="color: var(--color-primary); display: flex; align-items: center; gap: 0.35rem; font-size: 0.8rem; text-transform: uppercase;">
                            <i class="fas fa-arrow-circle-down"></i> Foundational Precursor Skills
                        </strong>
                        <p style="margin: 0.25rem 0 0 0; color: var(--color-text-muted); font-size: 0.85rem;">
                            Draws upon foundational readiness and intuitive exploration developed in earlier levels.
                        </p>
                    </div>
                    <div style="padding-top: 0.5rem; border-top: 1px dashed var(--color-border);">
                        <strong style="color: var(--color-success); display: flex; align-items: center; gap: 0.35rem; font-size: 0.8rem; text-transform: uppercase;">
                            <i class="fas fa-arrow-circle-up"></i> Future Progression & Extension
                        </strong>
                        <p style="margin: 0.25rem 0 0 0; color: var(--color-text-muted); font-size: 0.85rem;">
                            Prepares students for higher-order synthesis and multi-step applications in subsequent grade progressions.
                        </p>
                    </div>
                </div>
            `;
        }

        // Pedagogical & Neurodivergent Scaffolding
        const scafBox = document.getElementById('dossier-scaffolding-box');
        if (scafBox) {
            scafBox.innerHTML = `
                <div style="display: grid; grid-template-columns: 1fr; gap: 0.75rem;">
                    <div style="background: var(--color-bg-surface); padding: 0.75rem 1rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
                        <strong style="color: var(--color-primary); font-size: 0.8125rem;">
                            <i class="fas fa-eye mr-1"></i> Visual & Tactile Scaffolding:
                        </strong>
                        <span style="font-size: 0.8125rem; color: var(--color-text-muted); margin-left: 0.35rem;">
                            Employ color-coding, manipulatives, graphic organizers, and step-by-step visual models.
                        </span>
                    </div>
                    <div style="background: var(--color-bg-surface); padding: 0.75rem 1rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
                        <strong style="color: var(--color-secondary); font-size: 0.8125rem;">
                            <i class="fas fa-brain mr-1"></i> Working Memory & ADHD Supports:
                        </strong>
                        <span style="font-size: 0.8125rem; color: var(--color-text-muted); margin-left: 0.35rem;">
                            Chunk multi-step problems into modular milestones with self-checking checklists and acoustic focus aids.
                        </span>
                    </div>
                    <div style="background: var(--color-bg-surface); padding: 0.75rem 1rem; border-radius: var(--radius-lg); border: 1px solid var(--color-border);">
                        <strong style="color: var(--color-warning); font-size: 0.8125rem;">
                            <i class="fas fa-book-reader mr-1"></i> Dyslexia & Universal Design (UDL):
                        </strong>
                        <span style="font-size: 0.8125rem; color: var(--color-text-muted); margin-left: 0.35rem;">
                            Provide synthesized text-to-speech, adjustable font kerning, and multiple modalities for expressing comprehension.
                        </span>
                    </div>
                </div>
            `;
        }

        // Footer Action Buttons
        const lessonBtn = document.getElementById('dossier-lesson-btn');
        if (lessonBtn) {
            lessonBtn.href = `/levels/${gradeLetter}.php#standard=${encodeURIComponent(code)}`;
            lessonBtn.innerHTML = `<i class="fas fa-book-open"></i> Go to Level ${gradeLetter.toUpperCase()} Practice`;
        }

        const testBtn = document.getElementById('dossier-test-btn');
        if (testBtn) {
            testBtn.href = `/assessment/#standard=${encodeURIComponent(code)}`;
            testBtn.innerHTML = `<i class="fas fa-tasks"></i> Test This Standard <i class="fas fa-arrow-right"></i>`;
        }

        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeStandardDossier() {
        const modal = document.getElementById('std-dossier-modal');
        if (modal) modal.style.display = 'none';
        document.body.style.overflow = '';
    }

    function copyCurrentDossierCode() {
        if (currentDossierCode) {
            copyStandardCode(currentDossierCode);
        }
    }

    // Initialize Select Dropdown and Listeners
    function syncCurriculumSelect() {
        const select = document.getElementById('curriculum-select');
        if (select && window.currentSettings) {
            select.value = window.currentSettings.curriculum || 'engageny';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        initFromUrl();
        switchSubject(currentSubject, false);
        switchGrade(currentGrade, null, false);
        syncCurriculumSelect();
        const toggleEl = document.getElementById('toggle-standards-progress');
        if (toggleEl) {
            toggleEl.checked = showProgressOverlay;
        }
        updateView();

        // Browser back/forward navigation support
        window.addEventListener('popstate', () => {
            const params = new URLSearchParams(window.location.search);
            const s = params.get('subject') || 'math';
            const g = params.get('grade') || 'Kindergarten';
            if (s !== currentSubject) switchSubject(s, false);
            if (g !== currentGrade) switchGrade(g, null, false);
        });

        // Click delegation on standards container for copy badges and info (i) dossier triggers
        const stdContainer = document.getElementById('view-standards');
        if (stdContainer) {
            stdContainer.addEventListener('click', (e) => {
                const infoBtn = e.target.closest('.std-info-btn');
                if (infoBtn && infoBtn.dataset.code) {
                    e.preventDefault();
                    e.stopPropagation();
                    openStandardDossier(infoBtn.dataset.code, infoBtn.closest('.curr-standard-item'));
                    return;
                }

                const badge = e.target.closest('.std-code-badge');
                if (badge && badge.dataset.code) {
                    e.preventDefault();
                    e.stopPropagation();
                    copyStandardCode(badge.dataset.code);
                }
            });
        }

        // Escape key closes dossier modal or open grade drawer
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                closeStandardDossier();
                closeAllGradeGroups();
            } else if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'k') {
                e.preventDefault();
                const searchInput = document.getElementById('standards-search-input');
                if (searchInput) {
                    searchInput.focus();
                    searchInput.select();
                }
            } else if (e.key === '/' && !['INPUT', 'TEXTAREA'].includes(document.activeElement?.tagName)) {
                e.preventDefault();
                const searchInput = document.getElementById('standards-search-input');
                if (searchInput) {
                    searchInput.focus();
                    searchInput.select();
                }
            }
        });
        
        // Close export menu and grade drawers when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('#curr-export-dropdown')) {
                document.getElementById('curr-export-menu')?.classList.remove('show');
            }
            if (!e.target.closest('.curr-grade-groups-container')) {
                closeAllGradeGroups();
            }
        });

        window.addEventListener('settings-changed', (e) => {
            syncCurriculumSelect();
            updateView();
        });

        window.addEventListener('curriculum-loaded', () => {
            updateView();
        });
    });
</script>

<?php
  // Include the footer
  include '../src/footer.php';
?>