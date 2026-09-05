<?php
  // Define page-specific variables for the header
  $pageTitle = 'Standards & Outlines | Hesten\'s Learning';
  $pageDescription = 'In-depth curriculum outlines and standards alignment for Math, ELA, Science, and Social Studies across all grade levels.';
  
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
                    <option value="engageny">EngageNY/Common Core</option>
                    <option value="teks">Texas TEKS</option>
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
                <div class="curr-header-top-row">
                    <div>
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
                    </div>
                </div>

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

                <!-- Quick Stats Counter Bar -->
                <div class="curr-stats-bar" id="curr-stats-bar">
                    <div class="curr-stat-item">
                        <span class="curr-stat-value" id="stat-domains-count">-</span>
                        <span class="curr-stat-label">Domains / Strands</span>
                    </div>
                    <div class="curr-stat-item">
                        <span class="curr-stat-value" id="stat-standards-count">-</span>
                        <span class="curr-stat-label">Standards Focus</span>
                    </div>
                    <div class="curr-stat-item">
                        <span class="curr-stat-value" id="stat-competencies-count">-</span>
                        <span class="curr-stat-label">Key Competencies</span>
                    </div>
                    <div class="curr-stat-item">
                        <span class="curr-stat-value" id="stat-level-code">Level B</span>
                        <span class="curr-stat-label">Curriculum Level</span>
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
                            <div class="curr-search-box">
                                <i class="fas fa-search curr-search-icon"></i>
                                <input type="text" id="standards-search-input" placeholder="Search standards by code, keyword, or domain..." autocomplete="off" oninput="handleStandardsSearch()" />
                                <button type="button" id="standards-search-clear" class="curr-search-clear" title="Clear search" style="display: none;" onclick="clearStandardsSearch()">
                                    <i class="fas fa-times"></i>
                                </button>
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

    // Deep-linking helper: sync subject & grade with URL query params
    function syncUrlParams() {
        const url = new URL(window.location);
        url.searchParams.set('subject', currentSubject);
        url.searchParams.set('grade', currentGrade);
        window.history.replaceState(null, '', url);
    }

    // Initialize state from URL params
    function initFromUrl() {
        const params = new URLSearchParams(window.location.search);
        const subjParam = params.get('subject');
        const gradeParam = params.get('grade');

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

    function switchGrade(gradeName, level, syncUrl = true) {
        currentGrade = gradeName;
        
        document.querySelectorAll('.curr-chip').forEach(chip => {
            chip.classList.toggle('active', chip.dataset.grade === gradeName);
        });

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
            standardsContainer.innerHTML = gradeData.standards || '<p>Standards data coming soon.</p>';
            
            // Process standard items: add copy badges and assign domain tags
            const standardItems = standardsContainer.querySelectorAll('.curr-standard-item');
            const domainSet = new Set();
            let totalStandardCodesCount = 0;

            standardItems.forEach(item => {
                const titleEl = item.querySelector('.curr-standard-title');
                const domainTitle = titleEl ? titleEl.innerText.trim() : 'General';
                item.dataset.domain = domainTitle;
                domainSet.add(domainTitle);

                // Enhance standard description codes with interactive badges
                const descElements = item.querySelectorAll('.curr-standard-desc');
                descElements.forEach(descEl => {
                    let html = descEl.innerHTML;
                    // Match <strong>CODE:</strong> or <strong>CODE</strong>
                    html = html.replace(/<strong>([A-Za-z0-9\.\-_ ]+?):?<\/strong>/g, (match, code) => {
                        totalStandardCodesCount++;
                        const cleanCode = code.trim();
                        return `<button type="button" class="std-code-badge" data-code="${cleanCode}" title="Click to copy standard code"><i class="far fa-copy"></i> ${cleanCode}</button>`;
                    });
                    descEl.innerHTML = html;
                });
            });

            // If no codes were in <strong> tags, count items as standards
            if (totalStandardCodesCount === 0) {
                totalStandardCodesCount = standardItems.length;
            }

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

            // Reset search input
            const searchInput = document.getElementById('standards-search-input');
            const searchClear = document.getElementById('standards-search-clear');
            if (searchInput) searchInput.value = '';
            if (searchClear) searchClear.style.display = 'none';

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
        applyStandardsFilters();
    }

    function clearStandardsSearch() {
        const searchInput = document.getElementById('standards-search-input');
        const clearBtn = document.getElementById('standards-search-clear');
        if (searchInput) searchInput.value = '';
        if (clearBtn) clearBtn.style.display = 'none';
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
                item.querySelectorAll('.curr-standard-desc').forEach(p => p.style.display = 'block');
                visibleDomainCount++;
                matchCount += item.querySelectorAll('.curr-standard-desc').length || 1;
                return;
            }

            const titleText = item.querySelector('.curr-standard-title')?.innerText.toLowerCase() || '';
            const titleMatches = titleText.includes(query);
            let matchingParas = 0;

            item.querySelectorAll('.curr-standard-desc').forEach(p => {
                const pText = p.innerText.toLowerCase();
                if (titleMatches || pText.includes(query)) {
                    p.style.display = 'block';
                    matchingParas++;
                } else {
                    p.style.display = 'none';
                }
            });

            if (titleMatches || matchingParas > 0) {
                item.style.display = 'block';
                visibleDomainCount++;
                matchCount += matchingParas || 1;
            } else {
                item.style.display = 'none';
            }
        });

        // Empty state
        let noResultsEl = document.getElementById('curr-standards-no-results');
        const standardsContainer = document.getElementById('view-standards');
        if (matchCount === 0 && items.length > 0 && standardsContainer) {
            if (!noResultsEl) {
                noResultsEl = document.createElement('div');
                noResultsEl.id = 'curr-standards-no-results';
                noResultsEl.className = 'curr-no-results';
                standardsContainer.appendChild(noResultsEl);
            }
            noResultsEl.innerHTML = `
                <i class="fas fa-search-minus curr-no-results-icon"></i>
                <h4 class="curr-no-results-title">No matching standards found</h4>
                <p class="curr-no-results-desc">No standards matched "<strong>${escapeHtml(query)}</strong>" in ${escapeHtml(currentGrade)} ${escapeHtml(currentSubject.toUpperCase())}.</p>
                <button type="button" class="curr-btn-reset-filter" onclick="clearStandardsSearch(); filterByDomain('all');">
                    <i class="fas fa-undo"></i> Reset Search & Filters
                </button>
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
        updateView();

        // Browser back/forward navigation support
        window.addEventListener('popstate', () => {
            const params = new URLSearchParams(window.location.search);
            const s = params.get('subject') || 'math';
            const g = params.get('grade') || 'Kindergarten';
            if (s !== currentSubject) switchSubject(s, false);
            if (g !== currentGrade) switchGrade(g, null, false);
        });

        // Click delegation on standards container for copy badges
        const stdContainer = document.getElementById('view-standards');
        if (stdContainer) {
            stdContainer.addEventListener('click', (e) => {
                const badge = e.target.closest('.std-code-badge');
                if (badge && badge.dataset.code) {
                    e.preventDefault();
                    e.stopPropagation();
                    copyStandardCode(badge.dataset.code);
                }
            });
        }
        
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