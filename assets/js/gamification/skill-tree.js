/**
 * assets/js/gamification/skill-tree.js
 * Interactive SVG/Canvas Skill & Knowledge Tree Engine with Bloom's Taxonomy Mastery
 * Hesten's Learning Platform
 */

(function () {
    'use strict';

    // Skill Tree Curriculum Node Datasets
    const SKILL_DATA = {
        math: [
            {
                id: 'm-1',
                name: 'Foundational Arithmetic & Place Value',
                code: 'K.CC / 1.NBT',
                discipline: 'Mathematics',
                desc: 'Count to 100, understand place value of ones and tens, and master basic addition and subtraction concepts.',
                x: 150,
                y: 450,
                icon: 'fa-cubes',
                prereqs: [],
                bloomTier: 4,
                practiceUrl: '/student/math-practice.php'
            },
            {
                id: 'm-2',
                name: 'Multiplication, Division & Arrays',
                code: '3.OA.A.1',
                discipline: 'Mathematics',
                desc: 'Interpret products of whole numbers, understand equal groups and division relationships.',
                x: 420,
                y: 300,
                icon: 'fa-times',
                prereqs: ['m-1'],
                bloomTier: 3,
                practiceUrl: '/student/math-practice.php'
            },
            {
                id: 'm-3',
                name: 'Fractions & Rational Numbers',
                code: '4.NF.A.1',
                discipline: 'Mathematics',
                desc: 'Explain equivalence of fractions and compare fractions with different numerators and denominators.',
                x: 420,
                y: 600,
                icon: 'fa-pie-chart',
                prereqs: ['m-1'],
                bloomTier: 3,
                practiceUrl: '/student/math-practice.php'
            },
            {
                id: 'm-4',
                name: 'Pre-Algebra & Expressions',
                code: '6.EE.A.2',
                discipline: 'Mathematics',
                desc: 'Write, read, and evaluate expressions in which letters stand for numbers.',
                x: 750,
                y: 450,
                icon: 'fa-square-root-alt',
                prereqs: ['m-2', 'm-3'],
                bloomTier: 2,
                practiceUrl: '/student/math-practice.php'
            },
            {
                id: 'm-5',
                name: 'Linear Equations & Slope-Intercept',
                code: '8.EE.B.5',
                discipline: 'Mathematics',
                desc: 'Graph proportional relationships, interpreting the unit rate as the slope of the line (y = mx + b).',
                x: 1100,
                y: 300,
                icon: 'fa-chart-line',
                prereqs: ['m-4'],
                bloomTier: 2,
                practiceUrl: '/student/math-practice.php'
            },
            {
                id: 'm-6',
                name: 'Geometric Reasoning & Pythagorean Theorem',
                code: '8.G.B.7',
                discipline: 'Mathematics',
                desc: 'Apply the Pythagorean Theorem (a^2 + b^2 = c^2) to determine unknown side lengths in right triangles.',
                x: 1100,
                y: 600,
                icon: 'fa-shapes',
                prereqs: ['m-4'],
                bloomTier: 1,
                practiceUrl: '/student/math-practice.php'
            },
            {
                id: 'm-7',
                name: 'Quadratic Functions & Parabolic Modeling',
                code: 'HSA-REI.B.4',
                discipline: 'Mathematics',
                desc: 'Solve quadratic equations by inspection, taking square roots, factoring, and the quadratic formula.',
                x: 1450,
                y: 450,
                icon: 'fa-project-diagram',
                prereqs: ['m-5', 'm-6'],
                bloomTier: 1,
                practiceUrl: '/student/math-practice.php'
            }
        ],
        ela: [
            {
                id: 'e-1',
                name: 'Phonemic Awareness & Syllables',
                code: 'RF.K.2',
                discipline: 'English Language Arts',
                desc: 'Demonstrate understanding of spoken words, syllables, and sounds (phonemes).',
                x: 150,
                y: 450,
                icon: 'fa-volume-up',
                prereqs: [],
                bloomTier: 4,
                practiceUrl: '/library/index.php'
            },
            {
                id: 'e-2',
                name: 'Lexile Vocabulary & Morphemes',
                code: 'L.3.4',
                discipline: 'English Language Arts',
                desc: 'Determine the meaning of unknown words using root words, prefixes, and suffixes.',
                x: 450,
                y: 320,
                icon: 'fa-book-open',
                prereqs: ['e-1'],
                bloomTier: 3,
                practiceUrl: '/library/index.php'
            },
            {
                id: 'e-3',
                name: 'Literal & Inferential Comprehension',
                code: 'RL.4.1',
                discipline: 'English Language Arts',
                desc: 'Refer to details and examples in a text when explaining what the text says explicitly and when drawing inferences.',
                x: 450,
                y: 580,
                icon: 'fa-search-plus',
                prereqs: ['e-1'],
                bloomTier: 3,
                practiceUrl: '/library/index.php'
            },
            {
                id: 'e-4',
                name: 'Text Structure & Author Craft',
                code: 'RI.6.5',
                discipline: 'English Language Arts',
                desc: 'Analyze how a particular sentence, paragraph, chapter, or section fits into the overall structure of a text.',
                x: 800,
                y: 450,
                icon: 'fa-align-left',
                prereqs: ['e-2', 'e-3'],
                bloomTier: 2,
                practiceUrl: '/library/index.php'
            },
            {
                id: 'e-5',
                name: 'Literary Analysis & Theme Synthesis',
                code: 'RL.8.2',
                discipline: 'English Language Arts',
                desc: 'Determine a theme or central idea of a text and analyze its development over the course of the text.',
                x: 1150,
                y: 350,
                icon: 'fa-feather-alt',
                prereqs: ['e-4'],
                bloomTier: 2,
                practiceUrl: '/library/index.php'
            },
            {
                id: 'e-6',
                name: 'Rhetorical Synthesis & Argumentation',
                code: 'W.11-12.1',
                discipline: 'English Language Arts',
                desc: 'Write arguments to support claims in an analysis of substantive topics or texts, using valid reasoning and relevant evidence.',
                x: 1450,
                y: 450,
                icon: 'fa-scroll',
                prereqs: ['e-5'],
                bloomTier: 1,
                practiceUrl: '/library/index.php'
            }
        ],
        science: [
            {
                id: 's-1',
                name: 'Scientific Method & Observation',
                code: 'MS-ETS1-1',
                discipline: 'Natural Science',
                desc: 'Define the criteria and constraints of a design problem and practice empirical inquiry.',
                x: 150,
                y: 450,
                icon: 'fa-flask',
                prereqs: [],
                bloomTier: 4,
                practiceUrl: '/student/science-articles.php'
            },
            {
                id: 's-2',
                name: 'Cellular Biology & Photosynthesis',
                code: 'MS-LS1-2',
                discipline: 'Natural Science',
                desc: 'Develop and use a model to describe the function of a cell and its specialized parts.',
                x: 500,
                y: 320,
                icon: 'fa-dna',
                prereqs: ['s-1'],
                bloomTier: 3,
                practiceUrl: '/student/science-articles.php'
            },
            {
                id: 's-3',
                name: 'Earth Systems & Biogeochemical Cycles',
                code: 'MS-ESS2-1',
                discipline: 'Natural Science',
                desc: 'Model the cycling of Earth\'s materials and the flow of energy that drives these processes.',
                x: 500,
                y: 580,
                icon: 'fa-globe-americas',
                prereqs: ['s-1'],
                bloomTier: 3,
                practiceUrl: '/student/science-articles.php'
            },
            {
                id: 's-4',
                name: 'Forces, Motion & Energy Transfer',
                code: 'MS-PS2-2',
                discipline: 'Natural Science',
                desc: 'Plan an investigation to provide evidence that the change in an object’s motion depends on the sum of forces.',
                x: 900,
                y: 450,
                icon: 'fa-bolt',
                prereqs: ['s-2', 's-3'],
                bloomTier: 2,
                practiceUrl: '/student/science-articles.php'
            },
            {
                id: 's-5',
                name: 'Genetics, Evolution & Ecosystems',
                code: 'HS-LS4-1',
                discipline: 'Natural Science',
                desc: 'Communicate scientific information that common ancestry and biological evolution are supported by empirical lines of evidence.',
                x: 1350,
                y: 450,
                icon: 'fa-tree',
                prereqs: ['s-4'],
                bloomTier: 1,
                practiceUrl: '/student/science-articles.php'
            }
        ],
        social: [
            {
                id: 'so-1',
                name: 'Community, Geography & Maps',
                code: 'C3.GEO.1',
                discipline: 'Civics & History',
                desc: 'Construct maps and other graphic representations of both familiar and unfamiliar places.',
                x: 150,
                y: 450,
                icon: 'fa-map-marked-alt',
                prereqs: [],
                bloomTier: 4,
                practiceUrl: '/student/social-history.php'
            },
            {
                id: 'so-2',
                name: 'Ancient Civilizations & Trade Networks',
                code: 'C3.HIST.2',
                discipline: 'Civics & History',
                desc: 'Analyze how cultural diffusion, agricultural innovation, and trade shaped early societies.',
                x: 500,
                y: 320,
                icon: 'fa-landmark',
                prereqs: ['so-1'],
                bloomTier: 3,
                practiceUrl: '/student/social-history.php'
            },
            {
                id: 'so-3',
                name: 'Constitutional Democracy & Rights',
                code: 'C3.CIV.1',
                discipline: 'Civics & History',
                desc: 'Distinguish the powers and responsibilities of citizens, political parties, and government officials.',
                x: 500,
                y: 580,
                icon: 'fa-balance-scale',
                prereqs: ['so-1'],
                bloomTier: 3,
                practiceUrl: '/student/social-civics.php'
            },
            {
                id: 'so-4',
                name: 'Global Revolutions & Modern Economics',
                code: 'C3.ECON.1',
                discipline: 'Civics & History',
                desc: 'Explain how economic institutions and market systems impact resource allocation and historical development.',
                x: 950,
                y: 450,
                icon: 'fa-coins',
                prereqs: ['so-2', 'so-3'],
                bloomTier: 2,
                practiceUrl: '/student/social-civics.php'
            },
            {
                id: 'so-5',
                name: 'Human Rights, Law & Global Governance',
                code: 'C3.CIV.8',
                discipline: 'Civics & History',
                desc: 'Evaluate social and political systems in terms of their defense of universal human rights and the rule of law.',
                x: 1350,
                y: 450,
                icon: 'fa-university',
                prereqs: ['so-4'],
                bloomTier: 1,
                practiceUrl: '/student/social-civics.php'
            }
        ]
    };

    const BLOOM_TIERS = {
        1: { name: 'Remember (Bronze)', class: 'tier-1', color: '#cd7f32', progress: 25 },
        2: { name: 'Understand (Silver)', class: 'tier-2', color: '#94a3b8', progress: 50 },
        3: { name: 'Apply (Gold)', class: 'tier-3', color: '#f59e0b', progress: 75 },
        4: { name: 'Mastery (Diamond)', class: 'tier-4', color: '#06b6d4', progress: 100 }
    };

    let activeDiscipline = 'math';
    let selectedNode = null;

    // Viewport zoom & pan transform state
    let zoomLevel = 1.0;
    let panX = 0;
    let panY = 0;
    let isDragging = false;
    let dragStartX = 0;
    let dragStartY = 0;

    function renderTree(disciplineKey) {
        activeDiscipline = disciplineKey;
        const nodes = SKILL_DATA[disciplineKey] || [];
        const svg = document.getElementById('skill-tree-svg');
        const connectionsLayer = document.getElementById('svg-connections-layer');
        const nodesLayer = document.getElementById('svg-nodes-layer');

        if (!svg || !connectionsLayer || !nodesLayer) return;

        connectionsLayer.innerHTML = '';
        nodesLayer.innerHTML = '';

        const nodeMap = {};
        nodes.forEach(n => nodeMap[n.id] = n);

        // 1. Draw Bezier Curved Connection Lines
        nodes.forEach(node => {
            if (node.prereqs && node.prereqs.length > 0) {
                node.prereqs.forEach(pId => {
                    const parent = nodeMap[pId];
                    if (parent) {
                        const path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
                        const startX = parent.x + 80;
                        const startY = parent.y;
                        const endX = node.x - 80;
                        const endY = node.y;
                        const dx = (endX - startX) / 2;

                        const d = `M ${startX} ${startY} C ${startX + dx} ${startY}, ${endX - dx} ${endY}, ${endX} ${endY}`;
                        path.setAttribute('d', d);
                        path.setAttribute('class', 'skill-connection-line');
                        connectionsLayer.appendChild(path);
                    }
                });
            }
        });

        // 2. Draw Interactive Nodes
        nodes.forEach(node => {
            const tierInfo = BLOOM_TIERS[node.bloomTier] || BLOOM_TIERS[1];
            const group = document.createElementNS('http://www.w3.org/2000/svg', 'g');
            group.setAttribute('class', `skill-node-group ${tierInfo.class} ${selectedNode && selectedNode.id === node.id ? 'selected' : ''}`);
            group.setAttribute('transform', `translate(${node.x}, ${node.y})`);
            group.setAttribute('tabindex', '0');
            group.setAttribute('role', 'button');
            group.setAttribute('aria-label', `${node.name}. Mastery: ${tierInfo.name}`);

            // Outer Card Background
            const rect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
            rect.setAttribute('x', '-75');
            rect.setAttribute('y', '-45');
            rect.setAttribute('width', '150');
            rect.setAttribute('height', '90');
            rect.setAttribute('rx', '14');
            rect.setAttribute('class', 'skill-node-card');
            group.appendChild(rect);

            // Tier Color Border Glow
            const borderRect = document.createElementNS('http://www.w3.org/2000/svg', 'rect');
            borderRect.setAttribute('x', '-75');
            borderRect.setAttribute('y', '-45');
            borderRect.setAttribute('width', '150');
            borderRect.setAttribute('height', '90');
            borderRect.setAttribute('rx', '14');
            borderRect.setAttribute('class', 'skill-node-border');
            borderRect.setAttribute('stroke', tierInfo.color);
            group.appendChild(borderRect);

            // Node Title Text
            const text = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            text.setAttribute('x', '0');
            text.setAttribute('y', '-10');
            text.setAttribute('class', 'skill-node-title');
            text.textContent = node.name.length > 18 ? node.name.slice(0, 16) + '...' : node.name;
            group.appendChild(text);

            // Node Code Subtitle
            const codeText = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            codeText.setAttribute('x', '0');
            codeText.setAttribute('y', '12');
            codeText.setAttribute('class', 'skill-node-code');
            codeText.textContent = node.code;
            group.appendChild(codeText);

            // Tier Badge Bottom Pill
            const tierText = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            tierText.setAttribute('x', '0');
            tierText.setAttribute('y', '30');
            tierText.setAttribute('class', 'skill-node-tier-label');
            tierText.setAttribute('fill', tierInfo.color);
            tierText.textContent = tierInfo.name.split(' ')[0];
            group.appendChild(tierText);

            // Interaction Click & Keyboard Enter
            group.addEventListener('click', (e) => {
                e.stopPropagation();
                openNodeDrawer(node);
            });
            group.addEventListener('keydown', (e) => {
                if (e.key === ' ' || e.key === 'Enter') {
                    e.preventDefault();
                    openNodeDrawer(node);
                }
            });

            nodesLayer.appendChild(group);
        });

        updateSvgTransform();
    }

    function updateSvgTransform() {
        const connectionsLayer = document.getElementById('svg-connections-layer');
        const nodesLayer = document.getElementById('svg-nodes-layer');
        const transformStr = `translate(${panX}, ${panY}) scale(${zoomLevel})`;

        if (connectionsLayer) connectionsLayer.setAttribute('transform', transformStr);
        if (nodesLayer) nodesLayer.setAttribute('transform', transformStr);
    }

    function openNodeDrawer(node) {
        selectedNode = node;
        const drawer = document.getElementById('node-detail-drawer');
        if (!drawer) return;

        const tierInfo = BLOOM_TIERS[node.bloomTier] || BLOOM_TIERS[1];

        document.getElementById('drawer-discipline-tag').textContent = node.discipline;
        document.getElementById('drawer-node-title').textContent = node.name;
        document.getElementById('drawer-code-badge').textContent = node.code;
        document.getElementById('drawer-desc').textContent = node.desc;
        document.getElementById('drawer-bloom-value').textContent = tierInfo.name;
        document.getElementById('drawer-bloom-progress-fill').style.width = `${tierInfo.progress}%`;
        document.getElementById('drawer-bloom-progress-fill').style.backgroundColor = tierInfo.color;

        // Render Prerequisites list
        const prereqList = document.getElementById('drawer-prereq-list');
        if (prereqList) {
            prereqList.innerHTML = '';
            if (node.prereqs && node.prereqs.length > 0) {
                const nodes = SKILL_DATA[activeDiscipline] || [];
                node.prereqs.forEach(pId => {
                    const pNode = nodes.find(n => n.id === pId);
                    if (pNode) {
                        const chip = document.createElement('span');
                        chip.className = 'prereq-chip unlocked';
                        chip.innerHTML = `<i class="fas fa-check-circle"></i> ${pNode.name} (${pNode.code})`;
                        prereqList.appendChild(chip);
                    }
                });
            } else {
                prereqList.innerHTML = '<span class="prereq-chip root"><i class="fas fa-seedling"></i> Foundational Core (No Prerequisites)</span>';
            }
        }

        // Action Buttons
        const practiceBtn = document.getElementById('btn-drawer-practice');
        if (practiceBtn) {
            practiceBtn.onclick = () => {
                if (window.HL_Gamification) {
                    window.HL_Gamification.updateQuestProgress('skill-tree', 1);
                    window.HL_Gamification.addXP(40, `Practicing Skill: ${node.name}`);
                }
                window.location.href = node.practiceUrl || '/student/index.php';
            };
        }

        const flashcardBtn = document.getElementById('btn-drawer-flashcards');
        if (flashcardBtn) {
            flashcardBtn.onclick = () => {
                if (window.toggleFlashcardStudio) {
                    window.toggleFlashcardStudio(true, activeDiscipline === 'math' ? 'algebra' : (activeDiscipline === 'science' ? 'biology' : (activeDiscipline === 'social' ? 'history' : 'custom')));
                }
            };
        }

        drawer.style.display = 'block';
        drawer.setAttribute('aria-hidden', 'false');

        // Re-render tree nodes to update selected state
        renderTree(activeDiscipline);

        if (typeof window.announceA11y === 'function') {
            window.announceA11y(`Selected skill node: ${node.name}. Mastery: ${tierInfo.name}.`);
        }
    }

    function closeNodeDrawer() {
        const drawer = document.getElementById('node-detail-drawer');
        if (drawer) {
            drawer.style.display = 'none';
            drawer.setAttribute('aria-hidden', 'true');
        }
        selectedNode = null;
        renderTree(activeDiscipline);
    }

    function initSkillTree() {
        const viewport = document.getElementById('skill-tree-viewport');
        const drawerCloseBtn = document.getElementById('btn-close-drawer');

        if (drawerCloseBtn) drawerCloseBtn.addEventListener('click', closeNodeDrawer);

        // Discipline Tab Switching
        document.querySelectorAll('.discipline-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.discipline-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const disc = btn.dataset.discipline || 'math';
                panX = 0;
                panY = 0;
                zoomLevel = 1.0;
                renderTree(disc);
            });
        });

        // Zoom Controls
        const zoomInBtn = document.getElementById('btn-zoom-in');
        const zoomOutBtn = document.getElementById('btn-zoom-out');
        const zoomResetBtn = document.getElementById('btn-zoom-reset');

        if (zoomInBtn) zoomInBtn.addEventListener('click', () => {
            zoomLevel = Math.min(2.0, zoomLevel + 0.2);
            updateSvgTransform();
        });
        if (zoomOutBtn) zoomOutBtn.addEventListener('click', () => {
            zoomLevel = Math.max(0.5, zoomLevel - 0.2);
            updateSvgTransform();
        });
        if (zoomResetBtn) zoomResetBtn.addEventListener('click', () => {
            zoomLevel = 1.0;
            panX = 0;
            panY = 0;
            updateSvgTransform();
        });

        // Mouse Pan Dragging on Viewport
        if (viewport) {
            viewport.addEventListener('mousedown', (e) => {
                if (e.target.closest('.skill-node-group')) return;
                isDragging = true;
                dragStartX = e.clientX - panX;
                dragStartY = e.clientY - panY;
                viewport.style.cursor = 'grabbing';
            });

            window.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                panX = e.clientX - dragStartX;
                panY = e.clientY - dragStartY;
                updateSvgTransform();
            });

            window.addEventListener('mouseup', () => {
                isDragging = false;
                if (viewport) viewport.style.cursor = 'grab';
            });

            // Wheel zoom
            viewport.addEventListener('wheel', (e) => {
                e.preventDefault();
                const delta = e.deltaY > 0 ? -0.1 : 0.1;
                zoomLevel = Math.min(2.0, Math.max(0.5, zoomLevel + delta));
                updateSvgTransform();
            }, { passive: false });
        }

        renderTree(activeDiscipline);
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initSkillTree);
    } else {
        initSkillTree();
    }
})();
