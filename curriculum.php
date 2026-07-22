<?php
  // Define page-specific variables for the header
  $pageTitle = 'Curriculum Standards & Outlines | Hesten\'s Learning';
  $pageDescription = 'In-depth curriculum outlines and standards alignment for Math, ELA, Science, and Social Studies across all grade levels.';
  
  // Include the header
  include 'src/header.php';
  // include 'assets/js/curriculum-php-engageny.js';
  // include 'assets/js/curriculum-php-teks.js';

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

  $subjects = [
    'math' => ['name' => 'Mathematics', 'icon' => 'fa-calculator', 'color' => 'indigo'],
    'ela' => ['name' => 'Language Arts', 'icon' => 'fa-book-open', 'color' => 'rose'],
    'science' => ['name' => 'Science', 'icon' => 'fa-flask', 'color' => 'emerald'],
    'social' => ['name' => 'Social Studies', 'icon' => 'fa-globe-americas', 'color' => 'amber'],
  ];
?>

<!-- Subject Navigation (Sticky) -->
<div class="curr-nav-container">
    <div class="curr-nav-inner">
        <div class="curr-nav-flex">
            <div class="curr-tabs" role="tablist" aria-label="Subject tabs">
                <?php foreach ($subjects as $id => $subj): ?>
                <button onclick="switchSubject('<?php echo $id; ?>')" id="tab-<?php echo $id; ?>"
                    class="curr-tab-btn <?php echo ($id === 'math') ? 'active tab-color-' . $subj['color'] : ''; ?>"
                    data-color="<?php echo $subj['color']; ?>"
                    role="tab" aria-selected="<?php echo ($id === 'math') ? 'true' : 'false'; ?>">
                    <i class="fas <?php echo $subj['icon']; ?> curr-tab-icon"></i>
                    <?php echo strtoupper($subj['name']); ?>
                </button>
                <?php endforeach; ?>
            </div>

            <!-- Curriculum Selector -->
            <div class="curr-select-container">
                <span class="curr-select-label">Curriculum:</span>
                <select id="curriculum-select" onchange="updateGlobalSetting('curriculum', this.value)" 
                    class="curr-select">
                    <option value="engageny">EngageNY / Common Core</option>
                    <option value="teks">Texas TEKS</option>
                    <option value="custom">Hesten's Custom Path</option>
                </select>
            </div>
        </div>
    </div>
</div>

<!-- Page Content -->
<main id="main-content" class="curr-main">
    
    <!-- Grade Level Switcher (Header) -->
    <header class="curr-header">
        <div class="curr-header-inner">
            <div class="curr-header-content">
                <h1 class="curr-header-title">
                    Curriculum <span id="display-subject-name" class="color-indigo">Mathematics</span>
                </h1>
                <p id="display-subject-desc" class="curr-header-desc">
                    Detailed learning paths, state standards alignment, and core competencies for every stage of development.
                </p>

                <!-- Grade Selection Chips -->
                <div class="curr-chips">
                    <?php foreach ($grades as $index => $grade): ?>
                    <button onclick="switchGrade('<?php echo $grade['name']; ?>', '<?php echo $grade['level']; ?>')" 
                        class="curr-chip <?php echo ($index === 1) ? 'active' : ''; ?>"
                        data-grade="<?php echo $grade['name']; ?>">
                        <?php echo $grade['name']; ?>
                    </button>
                    <?php endforeach; ?>
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
                        <h2 class="curr-card-badge badge-emerald">
                            <i class="fas fa-check-double"></i> Standards Alignment
                        </h2>
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
</main>

<script src="assets/js/curriculum-php-engageny.js"></script>
<script>
    let currentSubject = 'math';
    let currentGrade = 'Kindergarten';

    function switchSubject(id) {
        currentSubject = id;
        const data = curriculumData[id] || { name: id, color: 'primary', icon: 'fa-info-circle', desc: 'Curriculum details.' };
        
        // Update Tabs
        document.querySelectorAll('.curr-tab-btn').forEach(btn => {
            btn.classList.remove('active');
            // Remove any tab-color-* class
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
        const nameEl = document.getElementById('display-subject-name');
        nameEl.innerText = activeBtn ? activeBtn.innerText.trim() : id;
        nameEl.className = `color-${data.color}`;
        document.getElementById('display-subject-desc').innerText = data.desc;

        updateView();
    }

    function switchGrade(gradeName, level) {
        currentGrade = gradeName;
        
        document.querySelectorAll('.curr-chip').forEach(chip => {
            chip.classList.remove('active');
        });
        
        const activeChip = document.querySelector(`[data-grade="${gradeName}"]`);
        if (activeChip) {
            activeChip.classList.add('active');
        }

        updateView();
    }

    function updateView() {
        const view = document.getElementById('curriculum-view');
        if (!view) return;
        view.style.opacity = '0';
        view.style.transform = 'translateY(10px)';
        
        setTimeout(() => {
            const subject = curriculumData[currentSubject];
            let gradeData = (subject && subject.grades && subject.grades[currentGrade]) ? subject.grades[currentGrade] : null;
            
            const activeCurr = (window.currentSettings && window.currentSettings.curriculum) || 'engageny';
            
            // Resolve curriculum-specific structure if available
            if (gradeData && (gradeData.engageny || gradeData.teks || gradeData.custom)) {
                gradeData = gradeData[activeCurr] || gradeData.engageny;
            }

            if (!gradeData) {
                gradeData = {
                    title: `${currentGrade} ${currentSubject.toUpperCase()} Outline`,
                    overview: `<p>Outline and detailed curriculum for ${currentGrade} ${currentSubject} is being updated. Please check back soon or visit the specific level page.</p>`,
                    standards: '<p>Standards data coming soon.</p>',
                    competencies: ['Information Pending'],
                    level: 'A' // Default fallback
                };
            }

            document.getElementById('view-title').innerText = gradeData.title;
            document.getElementById('view-overview').innerHTML = gradeData.overview;
            document.getElementById('view-standards').innerHTML = gradeData.standards;
            
            const compList = document.getElementById('view-competencies');
            compList.innerHTML = gradeData.competencies.map(c => `
                <li class="curr-comp-item">
                    <i class="fas fa-check-circle curr-comp-icon"></i>
                    <span class="curr-comp-text">${c}</span>
                </li>
            `).join('');

            const levelLink = document.getElementById('view-level-link');
            levelLink.href = `/levels/${gradeData.level.toLowerCase()}.php`;
            levelLink.innerHTML = `GO TO LEVEL ${gradeData.level.toUpperCase()} <i class="fas fa-arrow-right ml-2"></i>`;

            document.getElementById('content-icon').innerHTML = `<i class="fas ${subject ? subject.icon : 'fa-info-circle'}"></i>`;

            view.style.opacity = '1';
            view.style.transform = 'translateY(0)';
        }, 200);
    }

    // Initialize Select Dropdown and Listeners
    function syncCurriculumSelect() {
        const select = document.getElementById('curriculum-select');
        if (select && window.currentSettings) {
            select.value = window.currentSettings.curriculum || 'engageny';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        syncCurriculumSelect();
        updateView();
        
        window.addEventListener('settings-changed', (e) => {
            syncCurriculumSelect();
            updateView();
        });
    });
</script>

<?php
  // Include the footer
  include 'src/footer.php';
?>