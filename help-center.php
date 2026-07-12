<?php
// --- Page Configuration ---
$pageTitle       = "Help Center & User Guide";
$pageDescription = "Learn how to use Hesten's Learning. Guides for students, parents, and teachers on accessibility, curriculum, and progress tracking.";
$pageKeywords    = "help center, user guide, how to use, accessibility tools, special education resources";
$pageAuthor      = "Hesten's Learning";

include 'src/header.php';
?>

<!-- Hero Section with Search -->
<div class="page-hero">
    <!-- Animated Background Elements -->
    <div class="page-hero-bg" style="opacity: 0.1;">
        <i class="fas fa-question-circle" style="position: absolute; top: 2.5rem; left: 2.5rem; font-size: 8rem; animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;"></i>
        <i class="fas fa-hands-helping" style="position: absolute; bottom: 2.5rem; right: 2.5rem; font-size: 10rem; transform: rotate(12deg);"></i>
        <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 37.5rem; height: 37.5rem; background-color: rgba(255, 255, 255, 0.1); border-radius: 50%; filter: blur(48px);">
        </div>
    </div>

    <div class="page-hero-content">
        <span class="page-hero-badge">
            Support & Documentation
        </span>
        <h1 class="page-hero-title">How can we help?</h1>
        <p class="page-hero-subtitle" style="margin-bottom: 2.5rem;">
            Guides, tips, and answers for everyone in the Hesten's Learning community.
        </p>

        <!-- Search Bar -->
        <div style="position: relative; max-width: 36rem; margin: 0 auto;" class="help-search-group">
            <div style="position: absolute; top: 0; bottom: 0; left: 0; padding-left: 1.25rem; display: flex; align-items: center; pointer-events: none;">
                <i class="fas fa-search" style="color: rgba(156, 163, 175, 1); transition: color 0.3s;" id="search-icon"></i>
            </div>
            <input type="text" id="help-search" onkeyup="filterFAQ()"
                style="width: 100%; padding: 1rem 1rem 1rem 3rem; border-radius: 9999px; color: rgba(17, 24, 39, 1); background-color: white; border: none; outline: none; box-shadow: var(--shadow-2xl); transition: all 0.3s;"
                placeholder="Search for answers (e.g., 'progress', 'dyslexia font')..."
                onfocus="document.getElementById('search-icon').style.color='var(--color-primary)'; this.style.boxShadow='0 0 0 4px rgba(255, 255, 255, 0.3)';"
                onblur="document.getElementById('search-icon').style.color='rgba(156, 163, 175, 1)'; this.style.boxShadow='var(--shadow-2xl)';">
        </div>
    </div>
</div>

<main class="page-content-wrapper" id="main-content" style="max-width: 80rem;">

    <!-- Role Selection Tabs -->
    <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem; margin-bottom: 3rem;" role="tablist" aria-label="User Guides">
        <button onclick="switchTab('student')" id="tab-student"
            class="help-role-tab active"
            aria-selected="true" aria-controls="panel-student">
            <i class="fas fa-user-graduate"></i> I'm a Student
        </button>
        <button onclick="switchTab('parent')" id="tab-parent"
            class="help-role-tab"
            aria-selected="false" aria-controls="panel-parent">
            <i class="fas fa-user-friends"></i> I'm a Parent
        </button>
        <button onclick="switchTab('teacher')" id="tab-teacher"
            class="help-role-tab"
            aria-selected="false" aria-controls="panel-teacher">
            <i class="fas fa-chalkboard-teacher"></i> I'm a Teacher
        </button>
    </div>

    <!-- CONTENT PANELS -->

    <!-- 1. STUDENT PANEL -->
    <section id="panel-student" class="help-role-panel" style="animation: fade-in-up 0.5s ease-out forwards;">
        <div style="display: grid; grid-template-columns: 1fr; gap: 2rem; margin-bottom: 3rem; @media (min-width: 768px) { grid-template-columns: repeat(2, minmax(0, 1fr)); }">
            <!-- Guide Card 1 -->
            <div class="help-guide-card" style="border-left-color: var(--color-primary);">
                <div class="help-guide-bg-icon">
                    <i class="fas fa-universal-access" style="color: var(--color-primary);"></i>
                </div>
                <h3 class="help-guide-title">
                    <span class="help-guide-number" style="background-color: var(--color-primary);">1</span>
                    Customize Your View
                </h3>
                <p class="help-guide-text">
                    Make the site easier to read. Click the <i class="fas fa-universal-access mx-1" style="color: var(--color-primary); margin: 0 0.25rem;"></i>
                    icon in the bottom right corner to:
                </p>
                <ul class="help-guide-list">
                    <li><i class="fas fa-font list-icon" style="color: var(--color-accent);"></i> Change the font (try Open Dyslexic!)</li>
                    <li><i class="fas fa-adjust list-icon" style="color: var(--color-accent);"></i> Switch to Dark Mode or High Contrast</li>
                    <li><i class="fas fa-ruler-vertical list-icon" style="color: var(--color-accent);"></i> Make text bigger or add line spacing</li>
                </ul>
            </div>

            <!-- Guide Card 2 -->
            <div class="help-guide-card" style="border-left-color: rgba(34, 197, 94, 1);">
                <div class="help-guide-bg-icon">
                    <i class="fas fa-check-circle" style="color: rgba(34, 197, 94, 1);"></i>
                </div>
                <h3 class="help-guide-title">
                    <span class="help-guide-number" style="background-color: rgba(34, 197, 94, 1);">2</span>
                    Track Your Progress
                </h3>
                <p class="help-guide-text">
                    When you finish a lesson or grade level, click the <i class="fas fa-check" style="color: rgba(34, 197, 94, 1); margin: 0 0.25rem;"></i>
                    checkmark button.
                </p>
                <ul class="help-guide-list">
                    <li><i class="fas fa-magic list-icon" style="color: rgba(34, 197, 94, 1);"></i> You'll see confetti when you finish!</li>
                    <li><i class="fas fa-save list-icon" style="color: rgba(34, 197, 94, 1);"></i> Your progress saves automatically on this device.</li>
                    <li><i class="fas fa-undo list-icon" style="color: rgba(34, 197, 94, 1);"></i> You can uncheck it anytime if you want to practice again.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- 2. PARENT PANEL -->
    <section id="panel-parent" class="help-role-panel" style="display: none;">
        <div style="background-color: rgba(37, 99, 235, 0.05); border-radius: 1.5rem; padding: 2rem; margin-bottom: 2.5rem; border: 1px solid rgba(37, 99, 235, 0.1);">
            <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--color-primary); margin-bottom: 1rem;"><i class="fas fa-shield-alt" style="margin-right: 0.5rem;"></i>
                Privacy & Safety First</h3>
            <p style="color: var(--color-text-main); line-height: 1.625; font-size: 1.125rem;">
                Hesten's Learning is designed to be completely safe for children. <strong style="font-weight: 700;">We do not require accounts,
                    emails, or passwords.</strong> All progress is stored locally in your browser's memory
                (LocalStorage). This means no personal data is ever sent to a server or shared with third parties.
            </p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
            <div class="help-feature-card">
                <div class="help-feature-icon" style="background-color: rgba(168, 85, 247, 0.1); color: rgba(147, 51, 234, 1);">
                    <i class="fas fa-book-reader"></i>
                </div>
                <h4 class="help-feature-title">Reading Support</h4>
                <p class="help-feature-desc">Use the "Reading Guide" (mask) in the accessibility menu to help
                    your child focus on one line at a time. Text-to-Speech is available on most lessons.</p>
            </div>
            <div class="help-feature-card">
                <div class="help-feature-icon" style="background-color: rgba(249, 115, 22, 0.1); color: rgba(234, 88, 12, 1);">
                    <i class="fas fa-list-ol"></i>
                </div>
                <h4 class="help-feature-title">Standard Alignment</h4>
                <p class="help-feature-desc">Check our <a href="standard.php"
                        style="color: var(--color-primary); text-decoration: underline;">Standards Page</a> to see how our content aligns with Common Core
                    (CCSS) requirements for your child's grade.</p>
            </div>
            <div class="help-feature-card">
                <div class="help-feature-icon" style="background-color: rgba(236, 72, 153, 0.1); color: rgba(219, 39, 119, 1);">
                    <i class="fas fa-mobile-alt"></i>
                </div>
                <h4 class="help-feature-title">Any Device</h4>
                <p class="help-feature-desc">Our site works on iPads, Chromebooks, and phones. You can switch
                    devices, but note that progress doesn't sync between them (for privacy).</p>
            </div>
        </div>
    </section>

    <!-- 3. TEACHER PANEL -->
    <section id="panel-teacher" class="help-role-panel" style="display: none;">
        <div style="display: flex; flex-direction: column; gap: 2rem; @media (min-width: 768px) { flex-direction: row; }">
            <div style="flex: 1;">
                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--color-text-main); margin-bottom: 1rem;">In the Classroom</h3>
                <p style="color: var(--color-text-muted); margin-bottom: 1.5rem; line-height: 1.625;">
                    Hesten's Learning is a free tool for your "Response to Intervention" (RTI) or special education
                    toolkit. Because there are no logins, you can get students started instantly.
                </p>

                <div style="display: flex; flex-direction: column; gap: 1rem;">
                    <div class="help-teacher-point">
                        <div class="help-teacher-number">1</div>
                        <div>
                            <h5 style="font-weight: 700; color: var(--color-text-main);">Differentiation</h5>
                            <p style="font-size: 0.875rem; color: var(--color-text-muted);">Direct students to specific grade levels regardless
                                of their actual grade. A 5th grader can practice Grade 2 math without stigma, as the
                                interface looks consistent.</p>
                        </div>
                    </div>
                    <div class="help-teacher-point">
                        <div class="help-teacher-number">2</div>
                        <div>
                            <h5 style="font-weight: 700; color: var(--color-text-main);">Smart Board Friendly</h5>
                            <p style="font-size: 0.875rem; color: var(--color-text-muted);">Use "High Contrast" mode when projecting on a
                                whiteboard to ensure visibility from the back of the room.</p>
                        </div>
                    </div>
                    <div class="help-teacher-point">
                        <div class="help-teacher-number">3</div>
                        <div>
                            <h5 style="font-weight: 700; color: var(--color-text-main);">No Setup Time</h5>
                            <p style="font-size: 0.875rem; color: var(--color-text-muted);">Since there are no rosters to import or passwords to
                                reset, it's perfect for station rotations or independent work time.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div style="width: 100%; max-width: 24rem; background-color: var(--color-bg-base); padding: 1.5rem; border-radius: 1rem; box-shadow: var(--shadow-lg); border: 1px solid var(--color-border);">
                <h4 style="font-weight: 700; font-size: 1.125rem; margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">Quick Resources
                </h4>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 0.75rem;">
                    <li><a href="standard.php"
                            class="help-resource-link"><i class="fas fa-file-alt" style="margin-right: 0.5rem;"></i> CCSS Standards Guide</a></li>
                    <li><a href="#"
                            class="help-resource-link"><i class="fas fa-print" style="margin-right: 0.5rem;"></i> Printable Worksheets (Coming Soon)</a></li>
                    <li><a href="mailto:admin@hestena62.com"
                            class="help-resource-link"><i class="fas fa-envelope" style="margin-right: 0.5rem;"></i> Request a Feature</a></li>
                </ul>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <div style="margin-top: 6rem; max-width: 56rem; margin-left: auto; margin-right: auto;">
        <h2 style="font-size: 1.875rem; font-weight: 700; text-align: center; color: var(--color-text-main); margin-bottom: 2.5rem;">Frequently Asked Questions</h2>

        <div style="display: flex; flex-direction: column; gap: 1rem;" id="faq-container">
            <!-- FAQ 1 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>Is this site really free?</span>
                    <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    Yes. Hesten's Learning is a personal project dedicated to accessible education. There are no
                    paywalls, subscriptions, or hidden fees.
                </div>
            </details>

            <!-- FAQ 2 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>How do I save my progress?</span>
                    <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    Progress is saved automatically to the device and browser you are currently using. If you clear your
                    browser history/cookies, progress may be reset. We recommend not clearing "Local Storage" if you
                    want to keep your checkmarks.
                </div>
            </details>

            <!-- FAQ 3 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>What is the "Open Dyslexic" font?</span>
                    <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    Open Dyslexic is a font designed to mitigate some of the common reading errors caused by dyslexia.
                    The letters have heavy weighted bottoms to indicate direction and help reinforce the line of text.
                    You can enable it in the accessibility menu (bottom right).
                </div>
            </details>

            <!-- FAQ 4 -->
            <details class="help-faq-item">
                <summary class="help-faq-summary">
                    <span>Can I use this offline?</span>
                    <span class="faq-icon"><i class="fas fa-chevron-down"></i></span>
                </summary>
                <div class="help-faq-content">
                    Currently, an internet connection is required to load the lessons and resources.
                </div>
            </details>
        </div>

        <!-- No Results Message -->
        <p id="faq-no-results" style="display: none; text-align: center; color: var(--color-text-muted); margin-top: 2rem;">No matching questions found.</p>
    </div>

</main>

<script>
    // --- Role Tab Logic ---
    function switchTab(role) {
        // 1. Update Buttons
        document.querySelectorAll('.help-role-tab').forEach(btn => {
            if (btn.id === `tab-${role}`) {
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');
            } else {
                btn.classList.remove('active');
                btn.setAttribute('aria-selected', 'false');
            }
        });

        // 2. Update Panels
        document.querySelectorAll('.help-role-panel').forEach(panel => {
            if (panel.id === `panel-${role}`) {
                panel.style.display = 'block';
                // Trigger animation replay
                panel.style.animation = 'none';
                void panel.offsetWidth; // trigger reflow
                panel.style.animation = 'fade-in-up 0.5s ease-out forwards';
            } else {
                panel.style.display = 'none';
            }
        });
    }

    // --- FAQ Search Logic ---
    function filterFAQ() {
        const input = document.getElementById('help-search').value.toLowerCase();
        const items = document.querySelectorAll('.help-faq-item');
        let hasResults = false;

        items.forEach(item => {
            const question = item.querySelector('summary span').textContent.toLowerCase();
            const answer = item.querySelector('div').textContent.toLowerCase();

            if (question.includes(input) || answer.includes(input)) {
                item.style.display = 'block';
                if (input !== '') item.setAttribute('open', 'true'); // Auto-open on search
                hasResults = true;
            } else {
                item.style.display = 'none';
                item.removeAttribute('open');
            }
        });

        const msg = document.getElementById('faq-no-results');
        if (!hasResults) msg.style.display = 'block';
        else msg.style.display = 'none';
    }
</script>

<?php include 'src/footer.php'; ?>