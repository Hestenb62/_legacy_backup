<!-- FULL FOOTER -->
<footer class="footer-main noise-filter">
    <!-- Decoration -->
    <div class="footer-decor-top"></div>
    <div class="footer-decor-blob"></div>
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Column 1: About -->
            <div>
                <h4 class="footer-heading">
                    <i class="fas fa-graduation-cap" style="color: var(--color-blue)"></i> About
                </h4>
                <div class="footer-about-brand">
                    <div class="footer-brand-logo">
                        <img src="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="Hesten's Learning Logo"
                            width="40" height="40" loading="lazy">
                    </div>
                    <div class="footer-brand-text">
                        <span class="footer-brand-title">Hesten's Learning</span>
                        <span class="footer-brand-subtitle">Education for All</span>
                    </div>
                </div>
                <p class="footer-about-desc">
                    Empowering students with learning disabilities through personalized learning experiences. <a
                        href="/pages/about.php">Learn more about our mission</a>
                </p>

                <div class="footer-social-icons">
                    <a href="https://github.com/Hestenb62/_legacy_backup" target="_blank" rel="noopener noreferrer"
                        aria-label="GitHub" class="social-icon-btn github"><i class="fab fa-github"></i></a>
                    <a href="https://blog.hestena62.com" target="_blank" rel="noopener noreferrer" aria-label="Blog"
                        class="social-icon-btn blog"><i class="fas fa-blog"></i></a>
                    <a href="https://orcid.org/0009-0004-7981-9568" target="_blank" rel="noopener noreferrer"
                        aria-label="ORCID" class="social-icon-btn orcid"><i class="fab fa-orcid"></i></a>
                    <a href="https://youtube.com/@hestena62" target="_blank" rel="noopener noreferrer"
                        aria-label="YouTube" class="social-icon-btn youtube"><i class="fab fa-youtube"></i></a>
                    <button type="button" class="social-icon-btn keyboard-shortcuts-btn"
                        onclick="if(window.openShortcutsModal){window.openShortcutsModal();}else{const m=document.getElementById('shortcuts-modal');if(m)m.classList.remove('hidden');}"
                        aria-label="Keyboard Shortcuts Guide (Press Shift + ?)"
                        title="Keyboard Shortcuts Guide (Press Shift + ?)"><i class="fa fa-keyboard"
                            aria-hidden="true"></i></button>
                </div>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="links-teal">
                <h4 class="footer-heading" style="opacity: 0.9">
                    <i class="fas fa-link" style="color: var(--color-teal)"></i> Quick Links
                </h4>
                <ul class="footer-links">
                    <li class="footer-link-item"><a href="/pages/skills.php"><i
                                class="fas fa-project-diagram footer-link-icon"></i> Skills Tree</a></li>
                    <li class="footer-link-item"><a href="/pages/manipulatives.php"><i
                                class="fas fa-cubes-stacked footer-link-icon"></i> Manipulatives</a></li>
                    <li class="footer-link-item"><a href="/pages/standards.php"><i
                                class="fas fa-book footer-link-icon"></i> Standards</a></li>
                    <li class="footer-link-item"><a href="/pages/math-vocab.php"><i
                                class="fas fa-brain footer-link-icon"></i> Math Vocab Hub</a></li>
                    <li class="footer-link-item"><a href="/updates/"><i class="fas fa-newspaper footer-link-icon"></i>
                            Updates</a></li>
                    <li class="footer-link-item"><a href="/pages/help-center.php"><i
                                class="fas fa-question-circle footer-link-icon"></i> Help Center</a></li>
                </ul>
            </div>

            <!-- Column 3: Support -->
            <div class="links-purple">
                <h4 class="footer-heading" style="opacity: 0.9">
                    <i class="fas fa-hand-holding-heart" style="color: var(--color-purple)"></i> Support
                </h4>
                <ul class="footer-links">
                    <li class="footer-link-item"><a href="/pages/contact.php"><i
                                class="fas fa-envelope footer-link-icon"></i> Contact Us</a></li>
                    <li class="footer-link-item"><a href="/student/index.php"><i
                                class="fas fa-home footer-link-icon"></i> For Students</a></li>
                    <li class="footer-link-item"><a href="/pages/parents.php"><i
                                class="fas fa-users footer-link-icon"></i> For Parents</a></li>
                    <li class="footer-link-item"><a href="/pages/teachers.php"><i
                                class="fas fa-chalkboard-teacher footer-link-icon"></i> For Teachers</a></li>
                </ul>
            </div>

            <!-- Column 4: Legal -->
            <div class="links-rose">
                <h4 class="footer-heading" style="opacity: 0.9">
                    <i class="fas fa-balance-scale" style="color: var(--color-rose)"></i> Legal & Settings
                </h4>
                <ul class="footer-links">
                    <li class="footer-link-item"><a href="/pages/privacy.php"><i
                                class="fas fa-shield-alt footer-link-icon"></i> Privacy Policy</a></li>
                    <li class="footer-link-item"><a href="/pages/terms-of-use.php"><i
                                class="fas fa-file-contract footer-link-icon"></i> Terms of Use</a></li>
                    <li class="footer-link-item"><a href="/pages/accessibility.php"><i
                                class="fas fa-universal-access footer-link-icon"></i> Accessibility</a></li>
                    <li class="footer-link-item"><a href="/pages/about.php"><i
                                class="fas fa-info-circle footer-link-icon"></i> About Us</a></li>
                </ul>
            </div>
        </div>

        <!-- Version Status & Release Info Strip (WCAG Operable) -->
        <?php
        $siteVersion = defined('HL_SITE_VERSION') ? HL_SITE_VERSION : 'v2.8.0';
        $siteVersionLabel = defined('HL_SITE_VERSION_LABEL') ? HL_SITE_VERSION_LABEL : 'September 2026 Grade 9 Algebra I Complete Curriculum Release';
        $siteVersionSummary = defined('HL_SITE_VERSION_SUMMARY') ? HL_SITE_VERSION_SUMMARY : 'Complete 105-Lesson Grade 9 Algebra I Curriculum (Modules 1–5) with Embedded Problem Sets, Verbatim Exit Ticket Keys, and Unified Mathematics Codex';
        ?>
        <div class="footer-version-strip" role="region" aria-label="Platform Version Information">
            <div class="footer-version-info">
                <span class="footer-version-pill">
                    <span class="footer-version-pulse-dot" aria-hidden="true"></span>
                    <span>Version <?= htmlspecialchars($siteVersion) ?></span>
                </span>
                <span class="footer-version-meta">
                    <span class="footer-version-highlight"><?= htmlspecialchars($siteVersionLabel) ?></span> &bull;
                    <?= htmlspecialchars($siteVersionSummary) ?>
                </span>
            </div>
            <div class="footer-version-actions">
                <button type="button" class="footer-version-btn" id="footer-version-modal-trigger"
                    aria-haspopup="dialog" aria-controls="footer-version-modal">
                    <i class="fas fa-sparkles" aria-hidden="true"></i>
                    <span>What's New in <?= htmlspecialchars($siteVersion) ?></span>
                </button>
            </div>
        </div>

        <div class="footer-divider"></div>

        <div class="footer-bottom">
            <div class="footer-bottom-text">
                <p>
                    &copy; <span id="year"><?= date('Y') ?></span> <span
                        style="font-weight: 800; color: var(--footer-heading)">Hesten's Learning</span>. All rights
                    reserved. |
                    Made with <i class="fas fa-heart footer-heart"></i> for education
                </p>
                <p class="footer-license">
                    <a href="/">Hesten's Learning</a> by <a href="/pages/about-me.php"
                        style="font-weight: 800; color: var(--footer-heading)">Hesten Allison</a> is licensed under
                    <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/?ref=chooser-v1" target="_blank"
                        rel="license noopener noreferrer" class="license-badge-link">
                        CC BY-NC-SA 4.0
                        <img style="height:16px!important;width:16px!important;margin-left:3px;vertical-align:text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1"
                            alt="Creative Commons" width="16" height="16">
                        <img style="height:16px!important;width:16px!important;margin-left:3px;vertical-align:text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1"
                            alt="Attribution" width="16" height="16">
                        <img style="height:16px!important;width:16px!important;margin-left:3px;vertical-align:text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/nc.svg?ref=chooser-v1"
                            alt="NonCommercial" width="16" height="16">
                        <img style="height:16px!important;width:16px!important;margin-left:3px;vertical-align:text-bottom;"
                            src="https://mirrors.creativecommons.org/presskit/icons/sa.svg?ref=chooser-v1"
                            alt="ShareAlike" width="16" height="16">
                    </a>
                </p>
            </div>

            <div class="footer-bottom-actions">
                <div class="gtranslate_wrapper" style="position: relative; z-index: 50;"></div>
                <a href="https://www.buymeacoffee.com/hestena62l" target="_blank" rel="noopener noreferrer"
                    class="coffee-btn">
                    <img src="https://cdn.buymeacoffee.com/buttons/bmc-new-btn-logo.svg" alt="Buy Me A Coffee"
                        class="coffee-icon" width="20" height="28" loading="lazy">
                    <span>Buy me a coffee</span>
                </a>
            </div>
        </div>
    </div>
</footer>


<!-- GTranslate Settings -->
<script>
    window.gtranslateSettings = {
        default_language: "en",
        native_language_names: true,
        wrapper_selector: ".gtranslate_wrapper",
        flag_style: "3d",
        alt_flags: { en: "usa" }
    };
</script>
<script src="https://cdn.gtranslate.net/widgets/latest/popup.js" defer></script>

<!-- Certificate of Academic Mastery Modal -->
<?php include __DIR__.'/partials/certificate-modal.php'; ?>

<!-- Sensory Breathe & Reset Modal -->
<?php include __DIR__.'/partials/sensory-chamber-modal.php'; ?>

<!-- Footer Scripts -->
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/global-error-handler.js') : '/assets/js/global-error-handler.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/audio-feedback.js') : '/assets/js/audio-feedback.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/sensory-chamber.js') : '/assets/js/sensory-chamber.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/gamification/daily-quests.js') : '/assets/js/gamification/daily-quests.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/scratchpad-studio.js') : '/assets/js/scratchpad-studio.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/global-study-tools.js') : '/assets/js/global-study-tools.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/flashcard-studio.js') : '/assets/js/flashcard-studio.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/gamification/quest-manager.js') : '/assets/js/gamification/quest-manager.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/accessibility/accommodation-engine.js') : '/assets/js/accessibility/accommodation-engine.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/certificate-generator.js') : '/assets/js/certificate-generator.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/command-palette.js') : '/assets/js/command-palette.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/global-standard.js') : '/assets/js/global-standard.js' ?>"></script>

<!-- Google API Scripts for Global Auto-Sync (Loaded when sync is active or on settings/profile) -->
<script>
    window.gapiLoaded = window.gapiLoaded || function () { window._gapiLoaded = true; };
    window.gisLoaded = window.gisLoaded || function () { window._gisLoaded = true; };
    (function () {
        try {
            const isAutoSyncActive = localStorage.getItem('auto_sync_gdrive') === 'true' ||
                localStorage.getItem('gdrive_autosync_enabled') === 'true';
            const needsSync = isAutoSyncActive ||
                document.getElementById('gdrive-save-btn') ||
                document.getElementById('gdrive-sync-status') ||
                window.hlNeedsDriveSync;
            if (needsSync) {
                const s1 = document.createElement('script');
                s1.src = '<?= function_exists('assetVersion') ? assetVersion('/assets/js/gdrive-sync.js') : '/assets/js/gdrive-sync.js' ?>';
                document.body.appendChild(s1);

                const s2 = document.createElement('script');
                s2.async = true; s2.defer = true;
                s2.src = 'https://apis.google.com/js/api.js';
                s2.onload = () => { if (typeof window.gapiLoaded === 'function') window.gapiLoaded(); else window._gapiLoaded = true; };
                document.body.appendChild(s2);

                const s3 = document.createElement('script');
                s3.async = true; s3.defer = true;
                s3.src = 'https://accounts.google.com/gsi/client';
                s3.onload = () => { if (typeof window.gisLoaded === 'function') window.gisLoaded(); else window._gisLoaded = true; };
                document.body.appendChild(s3);
            }
        } catch (e) { }
    })();
</script>

<!-- Interactive What's New in Version Modal -->
<div id="footer-version-modal" class="footer-vmodal" role="dialog" aria-modal="true"
    aria-labelledby="footer-version-modal-title" aria-hidden="true">
    <div class="footer-vmodal-backdrop" id="footer-version-modal-backdrop"></div>
    <div class="footer-vmodal-dialog">
        <div class="footer-vmodal-header">
            <div class="footer-vmodal-header-title">
                <i class="fas fa-rocket" aria-hidden="true"></i>
                <h3 id="footer-version-modal-title">What's in Version <?= htmlspecialchars($siteVersion) ?></h3>
            </div>
            <button type="button" class="footer-vmodal-close-btn" id="footer-version-modal-close-btn"
                aria-label="Close version details">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>
        <div class="footer-vmodal-body">
            <div class="footer-vmodal-badge-row">
                <span class="footer-vmodal-badge">
                    <i class="fas fa-code-branch" aria-hidden="true"></i> Platform <?= htmlspecialchars($siteVersion) ?>
                </span>
                <span class="footer-vmodal-badge success">
                    <i class="fas fa-check-circle" aria-hidden="true"></i> Active
                    <?= htmlspecialchars($siteVersionLabel) ?>
                </span>
            </div>
            <p class="footer-vmodal-lead">
                Version <?= htmlspecialchars($siteVersion) ?> delivers the complete, authoritative <strong>105-Lesson Grade 9 Algebra I Curriculum</strong> across all five modules (Module 1 through Module 5), integrating authentic Eureka Math Problem Set worksheets with teacher keys, verbatim Exit Ticket solutions, and the unified <strong>Mathematics Codex &amp; Vocab Review Hub</strong> (<code>/pages/math-vocab.php</code>).
            </p>
            <ul class="footer-vmodal-features">
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Complete 105-Lesson Grade 9 Algebra I Curriculum:</strong> Full buildout of Modules 1–5 (Module 1: Relationships &amp; Equations, Module 2: Descriptive Statistics, Module 3: Linear &amp; Exponential Functions, Module 4: Polynomial &amp; Quadratic Expressions, Module 5: Synthesis of Modeling).
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Authentic Embedded Problem Sets:</strong> Full student practice worksheets embedded directly into every lesson card with expandable teacher answer keys and 1-click browser printing. Zero external file download links.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Verbatim Exit Ticket Keys &amp; Check Understanding:</strong> Formative Exit Ticket assessment prompts and teacher sample solutions with step-by-step mathematical justifications directly integrated into the interactive quiz runner.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Unified Mathematics Codex &amp; Interactive Sandbox:</strong> Seamlessly merged <code>/pages/math.php</code> into <code>/pages/math-vocab.php</code> with 195 cross-curriculum terms, 3D active recall flashcards, and step-by-step formula solvers.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>JSON-First Modular Architecture:</strong> 105 standalone schema-validated JSON lesson modules in <code>assets/data/lessons/</code> rendered dynamically by <code>levels/k.php</code> with MathJax SVG rendering.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-universal-access"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Universal WCAG &amp; UDL Compliance:</strong> 100% keyboard accessibility, screen-reader friendly equations, tactile shortcuts, and multimodal accommodations (OpenDyslexic, Irlen overlays, text-to-speech).
                    </div>
                </li>
            </ul>
        </div>
        <div class="footer-vmodal-footer">
            <button type="button" class="footer-vmodal-btn-secondary"
                id="footer-version-modal-cancel-btn">Close</button>
            <a href="/updates/" class="footer-vmodal-btn-primary">
                <i class="fas fa-newspaper" aria-hidden="true"></i>
                <span>Explore Full Engineering Logs</span>
            </a>
        </div>
    </div>
</div>

<script>
    (function () {
        const trigger = document.getElementById('footer-version-modal-trigger');
        const modal = document.getElementById('footer-version-modal');
        if (!trigger || !modal) return;

        const backdrop = document.getElementById('footer-version-modal-backdrop');
        const closeBtn = document.getElementById('footer-version-modal-close-btn');
        const cancelBtn = document.getElementById('footer-version-modal-cancel-btn');
        let previousFocus = null;

        function openModal() {
            previousFocus = document.activeElement;
            modal.classList.add('active');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            setTimeout(() => { if (closeBtn) closeBtn.focus(); }, 60);
        }

        function closeModal() {
            modal.classList.remove('active');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            if (previousFocus && typeof previousFocus.focus === 'function') {
                previousFocus.focus();
            }
        }

        trigger.addEventListener('click', openModal);
        if (backdrop) backdrop.addEventListener('click', closeModal);
        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal.classList.contains('active')) {
                closeModal();
            }
        });
    })();
</script>
</body>

</html>