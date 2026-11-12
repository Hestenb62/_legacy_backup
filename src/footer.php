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
                    <li class="footer-link-item"><a href="/research/index.php"><i
                                class="fas fa-graduation-cap footer-link-icon"></i> Research</a></li>
                    <li class="footer-link-item"><a href="/pages/standards.php"><i
                                class="fas fa-book footer-link-icon"></i> Standards</a></li>
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
                    <li class="footer-link-item"><a href="/pages/community.php"><i
                                class="fas fa-users-cog footer-link-icon"></i> Community Hub</a></li>
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
        $siteVersion = defined('HL_SITE_VERSION') ? HL_SITE_VERSION : 'v2.39.0';
        $siteVersionLabel = defined('HL_SITE_VERSION_LABEL') ? HL_SITE_VERSION_LABEL : 'November 2026 Wave Playbook & Differentiation Engine Release';
        $siteVersionSummary = defined('HL_SITE_VERSION_SUMMARY') ? HL_SITE_VERSION_SUMMARY : 'Wave Week Playbook Modals with Daily Monday–Friday Plans, Pacing Rhythms, Lexile-Aligned Library Resources, and Printable Lesson Blueprints';
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
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/core/global-error-handler.js') : '/assets/js/core/global-error-handler.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/accessibility/audio-feedback.js') : '/assets/js/accessibility/audio-feedback.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/accessibility/sensory-chamber.js') : '/assets/js/accessibility/sensory-chamber.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/gamification/daily-quests.js') : '/assets/js/gamification/daily-quests.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/components/scratchpad-studio.js') : '/assets/js/components/scratchpad-studio.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/components/global-study-tools.js') : '/assets/js/components/global-study-tools.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/components/flashcard-studio.js') : '/assets/js/components/flashcard-studio.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/gamification/quest-manager.js') : '/assets/js/gamification/quest-manager.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/accessibility/accommodation-engine.js') : '/assets/js/accessibility/accommodation-engine.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/components/certificate-generator.js') : '/assets/js/components/certificate-generator.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/components/command-palette.js') : '/assets/js/components/command-palette.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/core/global-standard.js') : '/assets/js/core/global-standard.js' ?>"></script>
<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/components/practice-notebook.js') : '/assets/js/components/practice-notebook.js' ?>"></script>

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
                s1.src = '<?= function_exists('assetVersion') ? assetVersion('/assets/js/core/gdrive-sync.js') : '/assets/js/core/gdrive-sync.js' ?>';
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
                Version <?= htmlspecialchars($siteVersion) ?> introduces interactive <strong>Wave Week Playbook &amp; Differentiation Modals</strong> for every week of the 48-week Year-Round Wave Structure, delivering daily Monday–Friday actionable targets, tailored pacing rhythms, Lexile-aligned digital library literature, and 1-click printable PDF weekly lesson packets.
            </p>
            <ul class="footer-vmodal-features">
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(79, 70, 229, 0.15); color: #4f46e5;">
                        <i class="fas fa-compass"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Wave Week Playbook &amp; Differentiation Engine (v2.39.0):</strong> Comprehensive instructional popups for all 48 weeks at <code>/pages/teachers.php#pacing</code>:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Detailed "What Should Be Done":</strong> Daily Monday–Friday lesson plans distinguishing Weeks 1–7 (Core Instructional Immersion: Concept Launch, Guided Practice, STEM Lab, Speed Sprint, Exit Ticket) from Week 8 (Synthesis: Work Audit, Remediation Clinic, Milestone Exam, Gradebook Scoring, Next Wave Prep).</li>
                            <li><strong>Pedagogical Pacing Suggestions:</strong> 4 selectable pacing rhythms (Standard Spiral, Accelerated Deep-Dive, Scaffolded &amp; Low-Anxiety, and Intensive Tier 3 Intervention) with tailored time blocks and UDL accommodations.</li>
                            <li><strong>Curated Digital Library Resources:</strong> Dynamically loads authentic literature and decodable books matching the selected reading Lexile range (BR through 1200L+), linking directly into the digital reader.</li>
                            <li><strong>On-the-Fly Customization:</strong> Real-time toolbar controls allow educators and parents to instantly change the active Grade Level, Reading Lexile, and Pacing Rhythm, dynamically recalibrating the playbook in real time.</li>
                            <li><strong>1-Click Printable Weekly Blueprint:</strong> Generates a clean, monochrome 8.5" x 11" printable lesson plan and student checklist sheet for homeschool reporting and student binders.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(225, 29, 72, 0.15); color: #e11d48;">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Resource Provider &amp; Law Firm Disclosures (v2.38.3):</strong> Transparent attribution across resource hubs:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Corner Info (i) Trigger:</strong> Prominently positioned on the Cerebral Palsy Toolkit card in both the Parent Hub (<code>/pages/parents.php</code>) and Community Hub (<code>/pages/community.php</code>).</li>
                            <li><strong>Accessible Disclosure Popover:</strong> One-click and keyboard-accessible modal disclosure clarifying that the guide is provided by Levin &amp; Perconti Law Firm, outlining Section 504 / IEP coverage, assistive technology references, and family therapy resources.</li>
                            <li><strong>WCAG AA/AAA Compliance:</strong> Fully keyboard operable (<code>Enter</code>, <code>Space</code>, <code>Esc</code>), click-outside dismissal, visible focus indicators, and screen reader semantic attributes (<code>aria-expanded</code>, <code>aria-haspopup</code>, <code>role="dialog"</code>).</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(99, 102, 241, 0.15); color: #4f46e5;">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Universal Multi-Grade Pacing Suite (Pre-K through High School • v2.38.2):</strong> Comprehensive curriculum pacing for all grade bands at <code>/pages/teachers.php#pacing</code>:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 11 Grade Levels Supported:</strong> Pre-K, Kindergarten, Grades 1 through 8, and High School each have dedicated, standard-aligned scope and sequences spanning CCSS Math, CCSS ELA, NGSS Science, and C3 Social Studies.</li>
                            <li><strong>Dual Structural Models for Every Grade:</strong> Seamless toggle between the 36-Week Traditional 4-Quarter schedule and the 48-Week Year-Round 6-Wave fiscal schedule with 7+1 learning cycles (7 weeks instructional immersion + 1 week synthesis testing &amp; next wave planning).</li>
                            <li><strong>Independent Grade-Namespaced Progress Tracking:</strong> Progress checkboxes are isolated per grade and per model in <code>localStorage</code>, allowing educators to track multi-grade classrooms or individual homeschool learners without cross-grade state interference.</li>
                            <li><strong>Dynamic Classroom Syllabus Printing:</strong> 1-click print output dynamically generates grade-specific and model-specific document titles and layout headers for print syllabi and offline planning binders.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(13, 148, 136, 0.15); color: #0d9488;">
                        <i class="fas fa-water"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Year-Round Wave Pacing Structure (6 Waves • 48 Weeks • v2.38.1):</strong> Independent fiscal-year pacing option at <code>/pages/teachers.php#pacing</code>:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Fully Separate from 36-Week Traditional Schedule:</strong> A distinct 48-week curriculum progression running July 1 through June 30 across 6 dedicated 8-week waves, each with separate progress tracking in <code>localStorage</code>.</li>
                            <li><strong>7+1 Immersion &amp; Synthesis Cycle:</strong> Weeks 1–7 of each wave deliver uninterrupted instructional units, while Week 8 is dedicated to formative/summative testing, finishing incomplete assignments, and planning for the next wave.</li>
                            <li><strong>Multi-Wave Filtering &amp; Syllabus Printing:</strong> 1-click filter pills for All 6 Waves or individual Waves 1 through 6, with clean print styling for classroom syllabi and parent planning binders.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Parent Home Observations Bridge to Teacher Dossier (v2.38.1):</strong>
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Parent Hub Field:</strong> Parents can record behavioral observations, sensory triggers, and home accommodation successes directly in the IEP/504 Brief modal (<code>pages/parents.php</code>).</li>
                            <li><strong>Teacher Dossier Display:</strong> These observations dynamically sync across tabs to the Teacher Diagnostic Dossier with a dedicated "Synced from Parent Hub" badge, uniting educators and parents.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(79, 70, 229, 0.15); color: #4f46e5;">
                        <i class="fas fa-users-cog"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Community Hub &amp; Resources Repository (v2.38.0):</strong> Dedicated collaboration portal at <code>/pages/community.php</code>:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Curated Directory &amp; Instant Filtering:</strong> Searchable repository spanning Homeschool Co-ops &amp; Networks, Educator Exchanges, Special Education &amp; Neurodiversity Coalitions, and STEAM Circles.</li>
                            <li><strong>Interactive Feedback &amp; Ideas Studio:</strong> Comprehensive feedback mechanism featuring category selection, learning role attribution, honeypot anti-spam protection, and offline-saved submission history (<code>localStorage</code>).</li>
                            <li><strong>Community Roadmap Upvote Board:</strong> Live upvoting board for community-suggested feature ideas with reactive counters and screen reader announcements (<code>aria-live="polite"</code>).</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-sync-alt"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Tripartite Role Data Synchronization Enhancements:</strong> Seamless bidirectional data flow between Student, Teacher, and Parent hubs:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Parent-to-Teacher Live Sync:</strong> Parent accommodation toggles (<code>hesten_parent_accommodations</code>) now reflect directly inside the Teacher Diagnostic Dossier with distinctive parent-configured indicators.</li>
                            <li><strong>Teacher-to-Parent Live Sync:</strong> Educator diagnostic notes and instructional recommendations saved in the Educator Suite automatically bridge to student profile data and render on the official parent IEP/504 Accommodation &amp; Progress Brief.</li>
                            <li><strong>Cross-Tab Event Reactivity:</strong> Hardened event listeners for <code>hl:roster-updated</code>, <code>hl:accommodations-updated</code>, <code>hl:profile-updated</code>, and <code>hl:teacher-notes-updated</code> preventing state staleness across open tabs.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(14, 165, 233, 0.15); color: #0284c7;">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade 9 ELA Complete 153-Lesson Curriculum Milestone (v2.37.0):</strong> Comprehensive conversion and universal deployment of authentic EngageNY ELA materials across all 4 Grade 9 modules:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 4 Modules Built Out (153 Total Lessons):</strong> Module 1 (Reading Closely &amp; Character, 48 lessons), Module 2 (Perspectives &amp; Tragedy, 46 lessons), Module 3 (Inquiry &amp; Research Paper Drafting, 30 lessons), and Module 4 (Sugar Changed the World &amp; Argument Writing, 29 lessons).</li>
                            <li><strong>10 Standalone Digital Library Reading Pages:</strong> Dedicated non-book reading views in <code>/library/?page=&lt;slug&gt;</code> with numbered paragraph anchor IDs, Web Speech read-aloud TTS, typography zoom, OpenDyslexic mode, and 1-click clean printing.</li>
                            <li><strong>Authentic Close-Reading Worksheets &amp; Quick Writes:</strong> Formative text-dependent analysis questions, evidence-based inquiry tools, and synthesizing Quick Writes with auto-saving textareas (<code>localStorage</code>), expandable teacher keys, and 1-click printing.</li>
                            <li><strong>Universal Catalogs Synchronized:</strong> All 153 lessons indexed in <code>curriculum-engageny-ela.json</code>, <code>lessons.json</code>, and Level K router in <code>levels/k.php</code>.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(168, 85, 247, 0.15); color: #9333ea;">
                        <i class="fas fa-feather-pointed"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade 9 ELA Module 2: Understanding Perspectives (v2.36.0):</strong> Comprehensive conversion of authentic EngageNY ELA materials into modular JSON datasets with full literature integration:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 3 Units Built Out (46 Lessons):</strong> Unit 1 (<em>The Tell-Tale Heart</em> &amp; <em>I felt a Funeral, in my Brain</em>, 13 lessons), Unit 2 (<em>Oedipus the King</em>, 20 lessons), and Unit 3 (<em>True Crime: The Roots of an American Obsession</em>, 13 lessons).</li>
                            <li><strong>Dedicated Library Reading Pages:</strong> Standalone literature pages in <code>/library/?page=&lt;slug&gt;</code> with paragraph anchor IDs, read-aloud speech synthesis, font scaling, and OpenDyslexic accessibility—free from catalog book shelf clutter.</li>
                            <li><strong>Streamlined Close-Reading Worksheets:</strong> Text-dependent analysis questions and synthesizing Quick Writes with auto-saving textareas (`localStorage`), expandable teacher keys, and 1-click printing.</li>
                            <li><strong>Master Registries Synchronized:</strong> All 46 lessons registered in <code>curriculum-engageny-ela.json</code>, <code>lessons.json</code>, and Level K router in <code>levels/k.php</code>.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(236, 72, 153, 0.15); color: #db2777;">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade 9 ELA Module 1: Reading Closely &amp; Writing to Learn (v2.35.0):</strong> Comprehensive conversion of authentic EngageNY ELA materials into modular JSON datasets with full literature integration:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 3 Units Built Out (48 Lessons):</strong> Unit 1 (<em>St. Lucy's Home for Girls Raised by Wolves</em>, 17 lessons), Unit 2 (<em>Letters to a Young Poet</em> &amp; <em>Black Swan Green</em>, 11 lessons), and Unit 3 (<em>The Tragedy of Romeo and Juliet</em>, 20 lessons).</li>
                            <li><strong>Dedicated Library Reading Pages (Non-Book):</strong> Standalone literature pages in <code>/library/?page=&lt;slug&gt;</code> with paragraph anchor IDs, read-aloud speech synthesis, font scaling, and OpenDyslexic accessibility—free from catalog book shelf clutter.</li>
                            <li><strong>Streamlined Close-Reading Worksheets:</strong> Text-dependent analysis questions and synthesizing Quick Writes with auto-saving textareas (`localStorage`), expandable teacher keys, and 1-click printing.</li>
                            <li><strong>Master Registries Synchronized:</strong> All 48 lessons registered in <code>curriculum-engageny-ela.json</code>, <code>lessons.json</code>, and Level K router in <code>levels/k.php</code>.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(234, 88, 12, 0.15); color: #c2410c;">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Complete P-12 Mathematics Curriculum Milestone (v2.34.0):</strong> Comprehensive conversion and universal deployment of authentic EngageNY / Eureka Math materials across all 13 grade levels (76 modules, 1,772 lessons):
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Elementary &amp; Early Childhood Buildout Complete:</strong> Grade 3 (Level E, 7 modules, 152 lessons), Grade 2 (Level D, 8 modules, 149 lessons), Grade 1 (Level C, 6 modules, 153 lessons), Kindergarten (Level B, 6 modules, 152 lessons), and Pre-K (Level A, 5 modules, 146 lessons).</li>
                            <li><strong>Full Spectrum P-12:</strong> Pre-K through Grade 12 (Levels A through N) fully unified with modular datasets, dynamic module outlines, interactive problem sets, and individual lesson query routing.</li>
                            <li><strong>Worksheet-First Focus:</strong> Eliminated distracting research links to present pure, distraction-free problem sets with auto-saving textareas (`localStorage`), expandable teacher solution keys, and 1-click printing (blank worksheet or student solved work).</li>
                            <li><strong>Universal Standards &amp; Search Integration:</strong> All 1,772 lessons registered in <code>curriculum-engageny-math.json</code> and <code>lessons.json</code>, enabling instant cross-grade search and progress tracking.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(34, 197, 94, 0.15); color: #15803d;">
                        <i class="fas fa-divide"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade 4 Mathematics Complete 153-Lesson Buildout (v2.33.0):</strong> Comprehensive conversion of authentic EngageNY / Eureka Math materials into modular JSON datasets:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 7 Modules Built Out:</strong> Module 1 (Place Value &amp; Addition/Subtraction Algorithms, 19 lessons), Module 2 (Metric Conversions &amp; Problem Solving, 5 lessons), Module 3 (Multi-Digit Multiplication &amp; Division, 38 lessons), Module 4 (Angle Measure &amp; Plane Figures, 16 lessons), Module 5 (Fraction Equivalence &amp; Operations, 41 lessons), Module 6 (Decimal Fractions, 16 lessons), and Module 7 (Measurement with Multiplication, 18 lessons).</li>
                            <li><strong>Streamlined Worksheet-First UI:</strong> Focused on authentic problem sets with digital student scratchpads, expandable teacher solution keys, and 1-click browser printing (blank or solved work).</li>
                            <li><strong>Universal Registries &amp; Level F Integration:</strong> All 153 lessons registered in <code>assets/data/lessons.json</code>, <code>curriculum-engageny-math.json</code>, and native single-lesson query routing in <code>levels/f.php</code>.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-cubes"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade 5 Mathematics Complete 149-Lesson Buildout (v2.32.0):</strong> Comprehensive conversion of authentic EngageNY / Eureka Math materials into modular JSON datasets:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 6 Modules Built Out:</strong> Module 1 (Place Value &amp; Decimal Fractions, 16 lessons), Module 2 (Multi-Digit Operations &amp; Decimals, 29 lessons), Module 3 (Addition &amp; Subtraction of Fractions, 16 lessons), Module 4 (Multiplication &amp; Division of Fractions, 33 lessons), Module 5 (Volume &amp; Area, 21 lessons), and Module 6 (Coordinate Plane Problem Solving, 34 lessons).</li>
                            <li><strong>Streamlined Worksheet-First UI:</strong> Focused on authentic problem sets with digital student scratchpads, expandable teacher solution keys, and 1-click browser printing (blank or solved work).</li>
                            <li><strong>Universal Registries &amp; Level G Integration:</strong> All 149 lessons registered in <code>assets/data/lessons.json</code>, <code>curriculum-engageny-math.json</code>, and native single-lesson query routing in <code>levels/g.php</code>.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(139, 92, 246, 0.15); color: #7c3aed;">
                        <i class="fas fa-shapes"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade 6 Mathematics Complete 143-Lesson Buildout (v2.31.0):</strong> Comprehensive conversion of authentic EngageNY / Eureka Math materials into modular JSON datasets:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 6 Modules Built Out:</strong> Module 1 (Ratios &amp; Unit Rates, 29 lessons), Module 2 (Arithmetic Operations &amp; Division of Fractions, 19 lessons), Module 3 (Rational Numbers &amp; Coordinate Plane, 19 lessons), Module 4 (Expressions &amp; Equations, 34 lessons), Module 5 (Area, Surface Area &amp; Volume, 20 lessons), and Module 6 (Statistics &amp; Distributions, 22 lessons).</li>
                            <li><strong>Streamlined Worksheet-First UI:</strong> Focused on authentic problem sets with digital student scratchpads, expandable teacher solution keys, and 1-click browser printing (blank or solved work).</li>
                            <li><strong>Universal Registries &amp; Level H Integration:</strong> All 143 lessons registered in <code>assets/data/lessons.json</code>, <code>curriculum-engageny-math.json</code>, and native single-lesson query routing in <code>levels/h.php</code>.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(217, 70, 239, 0.15); color: #c026d3;">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade 8 Mathematics Complete 122-Lesson Buildout (v2.30.0):</strong> Comprehensive conversion of authentic EngageNY / Eureka Math materials into modular JSON datasets:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 7 Modules Built Out:</strong> Module 1 (Integer Exponents &amp; Scientific Notation, 13 lessons), Module 2 (The Concept of Congruence, 16 lessons), Module 3 (Similarity, 14 lessons), Module 4 (Linear Equations, 31 lessons), Module 5 (Examples of Functions from Geometry, 11 lessons), Module 6 (Linear Functions, 14 lessons), and Module 7 (Introduction to Irrational Numbers Using Geometry, 23 lessons).</li>
                            <li><strong>Streamlined Worksheet-First UI:</strong> Direct on-page problem sets with digital student scratchpads, expandable teacher solution keys, and 1-click browser printing (blank or solved work).</li>
                            <li><strong>Universal Registries &amp; Level J Integration:</strong> All 122 lessons registered in <code>assets/data/lessons.json</code>, <code>curriculum-engageny-math.json</code>, and native single-lesson query routing in <code>levels/j.php</code>.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(236, 72, 153, 0.15); color: #db2777;">
                        <i class="fas fa-infinity"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade 12 Precalculus Complete 111-Lesson Buildout (v2.29.0):</strong> Capstone conversion of authentic EngageNY / Eureka Math materials into modular JSON datasets:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 5 Modules Built Out:</strong> Module 1 (Complex Numbers &amp; Transformations, 30 lessons), Module 2 (Vectors &amp; Matrices, 27 lessons), Module 3 (Rational &amp; Exponential Functions, 21 lessons), Module 4 (Trigonometry &amp; Law of Sines/Cosines, 14 lessons), and Module 5 (Probability Distributions &amp; Decision Analysis, 19 lessons).</li>
                            <li><strong>Streamlined Worksheet-First UI:</strong> Removed research links and external distractions to deliver pure, focused problem set worksheets with digital scratchpads, print controls, and teacher solution keys.</li>
                            <li><strong>Vector &amp; Matrix Geometry:</strong> Dot products, 2D/3D coordinate transformations, matrix inverses ($Ax = b$), and 3D computer game projection matrices formatted with MathJax SVG.</li>
                            <li><strong>Complete Registries &amp; Help Guides:</strong> 111 lessons synchronized into <code>assets/data/lessons.json</code>, <code>curriculum-engageny-math.json</code>, Level N outline hydration, and advanced terms added to <code>assets/data/math-vocab.json</code>.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(245, 158, 11, 0.15); color: #d97706;">
                        <i class="fas fa-square-root-variable"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade 11 Algebra II Complete 120-Lesson Buildout (v2.28.0):</strong> Comprehensive conversion of authentic EngageNY / Eureka Math materials into modular JSON datasets:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 4 Modules Built Out:</strong> Module 1 (Polynomial, Rational &amp; Radical Relationships, 40 lessons), Module 2 (Trigonometric Functions &amp; Radians, 17 lessons), Module 3 (Exponential &amp; Logarithmic Functions &amp; Financial Literacy, 33 lessons), and Module 4 (Inferences &amp; Conclusions from Data &amp; Normal Distributions, 30 lessons).</li>
                            <li><strong>High-Performance JSON Datasets:</strong> Compiled into <code>assets/data/lessons/m-math-m1.json</code> through <code>m-math-m4.json</code> (3.48 MB total) with instantaneous single-lesson routing in <code>levels/m.php</code> and <code>src/lesson_renderer.php</code>.</li>
                            <li><strong>Interactive Worked Examples &amp; Proofs:</strong> Complex polynomial divisions, trigonometric identities ($\sin^2\theta + \cos^2\theta = 1$), logarithmic equation derivations, and normal curve z-score models formatted with MathJax SVG.</li>
                            <li><strong>Embedded Problem Sets &amp; Teacher Solution Keys:</strong> Over 1,500 authentic problem set practice questions with step-by-step teacher solutions and 1-click browser printing via <code>printProblemSet()</code>.</li>
                            <li><strong>Unified Platform Registries &amp; Codex:</strong> All 120 lessons registered into <code>assets/data/lessons.json</code>, <code>curriculum-engageny-math.json</code>, and advanced Algebra II concepts compiled into <code>assets/data/math-vocab.json</code>.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(234, 88, 12, 0.15); color: #ea580c;">
                        <i class="fas fa-shapes"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade 10 Geometry Complete 117-Lesson Buildout (v2.27.0):</strong> Complete conversion of authentic EngageNY / Eureka Math materials into modular JSON datasets:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>All 5 Modules Built Out:</strong> Module 1 (Congruence &amp; Proofs, 34 lessons), Module 2 (Similarity &amp; Trigonometry, 34 lessons), Module 3 (Three Dimensions &amp; Volume, 13 lessons), Module 4 (Coordinate Geometry, 15 lessons), and Module 5 (Circles &amp; Ptolemy's Theorem, 21 lessons).</li>
                            <li><strong>Modular High-Speed JSON Architecture:</strong> Packaged into <code>assets/data/lessons/l-math-m1.json</code> through <code>l-math-m5.json</code> with tiered resolution in <code>src/lesson_renderer.php</code>.</li>
                            <li><strong>Interactive Proofs &amp; Worked Classwork:</strong> Step-by-step Euclidean deductions, angle chase calculations, coordinate slope equations, and 3D Cavalieri derivations rendered via MathJax SVG.</li>
                            <li><strong>Embedded Problem Sets &amp; Verbatim Exit Tickets:</strong> Over 1,200 authentic problem set practice questions with expandable full teacher solution keys and 1-click browser printing.</li>
                            <li><strong>Unified Master Registry &amp; Codex:</strong> 117 lessons synchronized into <code>assets/data/lessons.json</code>, <code>curriculum-engageny-math.json</code>, and geometric terms compiled into <code>assets/data/math-vocab.json</code>.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(14, 165, 233, 0.15); color: #0284c7;">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Grade-Level Alignment &amp; Custom Curriculum Resources (v2.26.0):</strong> Comprehensive upgrade to all curriculum level pages:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Specific Grade Nomenclature:</strong> Every level page now clearly identifies its developmental grade level (e.g., Level H = 6th Grade, Level I = 7th Grade, Level J = 8th Grade, Level K = 9th Grade, Level L = 10th Grade, Level M = 11th Grade, Level N = 12th Grade, Level O = AP &amp; College Prep) with prominent hero badges.</li>
                            <li><strong>Custom Grade Literature:</strong> Replaced uniform high school literature with age-appropriate classics from the library (e.g. *Alice in Wonderland* and *Wizard of Oz* for primary/early elementary, *Anne of Green Gables* and *The Time Machine* for upper elementary, *A Tale of Two Cities* and *Dracula* for middle school, *Romeo &amp; Juliet*, *1984*, and *The Republic* for high school).</li>
                            <li><strong>Interactive Grade Tools &amp; Manipulatives:</strong> Customized sidebar tools featuring ten-frames and counters for early learners, base-10 clocks and number lines for Grade 1–2, fraction bars and geoboards for Grade 3–5, middle school ratio workbenches for Grade 6–8, and graphing workbenches with primary source readers for Grade 9–12.</li>
                            <li><strong>Grade Developmental Study Tips:</strong> Custom pedagogical tips for every grade level addressing tactile counting, phonemic awareness, friendly number bonds, fraction visualization, unit rates, and deductive proofs.</li>
                            <li><strong>Accessible Dynamic Subject Breadcrumbs:</strong> Compliant breadcrumb navigation hierarchy reflecting both the current grade level and active subject (e.g., <code>Home / Levels / Level K (9th Grade) / Math</code>), updating dynamically on subject tab switches.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(79, 70, 229, 0.15); color: #4f46e5;">
                        <i class="fas fa-book-bookmark"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Digital Library Master Punctuation Repository &amp; Extensible Pages (v2.24.0):</strong> Built out a dedicated subject repository architecture powered by external JSON datasets:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Extensible Page Routing:</strong> Accessible via <code>/library/index.php?pages=punctuation</code>, dynamically loading modular page content from <code>library/assets/pages/punctuation.json</code>.</li>
                            <li><strong>Comprehensive 16-Mark Punctuation Directory:</strong> Canonical rules, linguistic rationales, Unicode codepoints, contrasting exemplars (correct vs. incorrect with explanations), pro-tips, and historical etymologies from 200 BCE to modern Unicode.</li>
                            <li><strong>Academic Style Guide Divergence Matrix &amp; Cheat Sheet:</strong> Side-by-side comparative table for Chicago (CMOS), MLA 9th, APA 7th, and AP Style conventions, plus high-density quick reference cheat sheet.</li>
                            <li><strong>Curated Study Modal Bridges:</strong> Updated curated reference links across Comma Usage, Semicolons &amp; Colons, Apostrophes &amp; Quotation Marks, Hyphens &amp; Dashes, and Parentheses &amp; Ellipses popups.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(2, 132, 199, 0.15); color: #0284c7;">
                        <i class="fas fa-spell-check"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Native Normal-Text ELA Syntax Rules &amp; Structural Formulations (v2.23.2):</strong> Decoupled MathJax from all English Language Arts &amp; Literature study modals:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Clean Native Typography:</strong> All 162 grammar formulations, concord rules, and narratological mappings now render directly as clean, human-readable normal text with Unicode directional arrows (➔, ⟹, ⟺, ≠).</li>
                            <li><strong>Zero MathJax on ELA:</strong> MathJax execution and background scripts are completely disabled on ELA pages and modals, eliminating syntax artifacts and script compilation lag.</li>
                            <li><strong>High Contrast &amp; Responsive Layout:</strong> Rules are styled in accessible, high-contrast cards that seamlessly adapt across light and dark themes.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(2, 132, 199, 0.15); color: #0284c7;">
                        <i class="fas fa-square-root-variable"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Universal MathJax Delimiter Wrapping &amp; Automated Typesetting (v2.23.1):</strong> Resolved raw LaTeX formatting across all study popup modals:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Automated TeX Delimiter Enclosure:</strong> Equation renderer in <code>src/resource-modal.php</code> now dynamically encloses raw formula strings in display math delimiters (<code>$$...$$</code>) so MathJax immediately recognizes and typesets them.</li>
                            <li><strong>Proactive Background Priming:</strong> MathJax bundle is pre-primed on page initialization, guaranteeing zero latency when students open modals.</li>
                            <li><strong>Active Modal Sequential Typesetting:</strong> Typesetting promises execute seamlessly when the modal enters the active DOM layout, producing high-contrast, scalable SVG typography.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-atom"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Comprehensive Science Resource Popups (v2.23.0):</strong> All 24 Science topics across 6 major domains (Biology Resources, Chemistry Resources, Physics Resources, Earth Science Resources, Science Experiments, and Science Articles &amp; News) now launch comprehensive study modals featuring:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Scientific Laws &amp; Mathematical Principles:</strong> Canonical formulas including cellular respiration/photosynthesis, Hardy-Weinberg equilibrium, Ideal Gas Law, Nernst equation, Newton's Laws, Maxwell equations, Kepler's orbital laws, and radiative forcing rendered in high-contrast MathJax SVG typography.</li>
                            <li><strong>Scientific Models &amp; Systemic Diagrams:</strong> Handcrafted accessible vector diagrams including eukaryotic cell architecture, Bohr electron orbitals, Snell's law refraction, the geological rock cycle, global atmospheric circulation cells, and mRNA immunological pathways.</li>
                            <li><strong>Dual-Lexile Readability:</strong> Seamless toggling between standard academic Lexile descriptions and simplified Basic English explanations.</li>
                            <li><strong>Curated Academic References:</strong> Verified deep links to Next Generation Science Standards (NGSS), NASA JPL, NOAA, USGS, NCBI PubMed, and PhET Interactive Simulations.</li>
                            <li><strong>Formative Practice Checks:</strong> Dynamic self-assessment quizzes with instant validation and explanatory breakdowns.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(168, 85, 247, 0.15); color: #7e22ce;">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Comprehensive ELA Literature Resource Popups (v2.22.0):</strong> All 24 English Language Arts &amp; Literature topics across 6 major domains (Literary Devices, Character Analysis, Theme Exploration, Genre Studies, Plot &amp; Structure, and Author's Craft) now launch comprehensive study modals featuring:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Master Syntax Rules &amp; Structural Formulations:</strong> Canonical narratological formulas, tenor-vehicle mappings, Freytag tension equations, Genette pacing ratios, and Campbellian monomyth vectors rendered in high-contrast MathJax SVG typography.</li>
                            <li><strong>Visual Maps &amp; Structural Diagrams:</strong> Handcrafted vector diagrams including Freytag's Pyramid, Monomyth Archetypal Wheel, Conflict Matrix, Symbolic Iceberg, Point of View Vantage Points, and Sensory Immersion Wheel.</li>
                            <li><strong>Dual-Lexile Instruction:</strong> Seamless toggling between rigorous analytical definitions and simplified accessible explanations.</li>
                            <li><strong>Curated Academic References:</strong> Verified deep links to Common Core Standards, Folger Shakespeare Library, Poetry Foundation, Joseph Campbell Foundation, and Purdue OWL.</li>
                            <li><strong>Formative Practice Checks:</strong> Dynamic self-assessment quizzes with instant validation and explanatory breakdowns.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(99, 102, 241, 0.15); color: #4f46e5;">
                        <i class="fas fa-spell-check"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Comprehensive ELA Grammar Resource Popups (v2.21.0):</strong> All 30 English Language Arts &amp; Grammar topics across 6 major domains (Parts of Speech, Punctuation Rules, Vocabulary Building, Common Errors Guide, Sentence Structure, and Figurative Language) now launch comprehensive study modals featuring:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Master Syntax Rules &amp; Structural Formulations:</strong> Canonical grammatical formulas, phonetic selection rules, and morphological expansion laws rendered in high-contrast MathJax SVG typography.</li>
                            <li><strong>Visual Maps &amp; Structural Diagrams:</strong> Handcrafted vector flowcharts, pronoun agreement trees, adjective hierarchy ladders, comma quadrant cards, morpheme assembly conveyors, and clause architecture blueprints.</li>
                            <li><strong>Dual-Lexile Instruction:</strong> Seamless toggling between standard analytical definitions and simplified accessible explanations.</li>
                            <li><strong>Curated Academic References:</strong> Verified deep links to Common Core Standards, Purdue OWL, Oxford Dictionaries, Cambridge Grammar, and Hesten's Learning Library.</li>
                            <li><strong>Formative Practice Checks:</strong> Dynamic self-assessment quizzes with instant validation and step-by-step explanatory breakdowns.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(14, 165, 233, 0.15); color: #0284c7;">
                        <i class="fas fa-calculator"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Comprehensive Mathematics Practice Popups:</strong> All 24 mathematics disciplines on <code>/student/math-practice.php</code> now launch comprehensive study modals featuring:
                        <ul style="margin: 0.35rem 0 0 1rem; padding: 0; font-size: 0.85rem; color: var(--color-text-secondary, #475569); line-height: 1.5;">
                            <li><strong>Master Equation &amp; Formula Vaults:</strong> Canonical mathematical formulas, general forms, and identities rendered in high-contrast MathJax SVG typography.</li>
                            <li><strong>Mathematical Visualizations &amp; Graphs:</strong> Handcrafted vector coordinate graphs, balance models, parabolas, and Riemann sum geometric figures.</li>
                            <li><strong>Dual-Lexile Instruction:</strong> Seamless toggling between rigorous Academic English and Simplified Basic English.</li>
                            <li><strong>Curated Academic References:</strong> Verified deep links to Common Core Standards, GeoGebra simulations, Desmos graphing tools, and Hesten's Learning Library.</li>
                            <li><strong>Formative Practice Checks:</strong> Dynamic self-assessment quizzes with real-time feedback and step-by-step explanatory breakdowns.</li>
                        </ul>
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(99, 102, 241, 0.15); color: #4f46e5;">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Student Academic Hub &amp; Scholar Command Console:</strong> Rebuilt <code>/student/index.php</code> with personalized scholar avatar badges, dynamic first-name greeting, daily study minutes counter, 4-gateway Academic Quick Bar (Digital Library, Adaptive Diagnostic, State Standards, Learning Arcade), and an upgraded "Jump Back In" recent reading shelf.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Dynamic Standards Mastery Competency Widget:</strong> Real-time display of earned competency badges from <code>hesten_standards_mastery</code>, formatting concise standard codes (<code>HSF.IF.B.4</code>, <code>K.CC.1</code>), score percentages, color-coded mastery rings, and direct shortcuts to the Standards Explorer.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(245, 158, 11, 0.15); color: #d97706;">
                        <i class="fas fa-book-reader"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Glassmorphic Subject Gateways &amp; MathJax Drawers:</strong> Four modern academic discipline cards (Mathematics, ELA, Science, Social Studies) with domain badges, tactile action buttons, and accessible accordion drawers that automatically typeset LaTeX formulas ($A = \pi r^2$) upon expansion.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(2, 132, 199, 0.15); color: #0284c7;">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Hesten's Learning Library Catalog Redesign:</strong> Institutional catalog search console with targeted scope filtering (All Fields, Title, Author, Subject, Call Number, ISBN), real-time collection record counters, trending topic pills, and reading level tags.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-link"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Deep-Linked Full-Page Bibliographic Record Overlays:</strong> Every library record functions as its own dedicated page overlay powered by URL hash routing (e.g. <code>#book-dracula</code>). Supports browser back and forward button navigation, direct URL deep-linking on initial load, one-click shareable link copying, and instant hash clearing upon closing.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(245, 158, 11, 0.15); color: #d97706;">
                        <i class="fas fa-table-list"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Academic MARC Metadata &amp; Digital Holdings Stacks:</strong> Full-page detail views provide interactive tabbed navigation between Bibliographic Information (GMD, Publisher, Dewey Decimal, LC, ISBN, Language, Lexile measure), Abstract / Notes, Item Copies &amp; Holdings table with barcode IDs (<code>HL-ID-01</code>) and availability badges, and Author Biography &amp; Context.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(168, 85, 247, 0.15); color: #9333ea;">
                        <i class="fas fa-venus"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>History of Woman Suffrage (Complete Volumes I–VI, 1881–1922):</strong> Complete historical primary source archive of the American women's voting rights movement. Spanning all six massive volumes (eBooks #28020, #28039, #28556, #29870, #29878, #30051) with 271 chapterized proceedings: the 1848 Seneca Falls Convention, the Civil War loyal leagues, NWSA and AWSA conventions, Congressional hearings, western campaigns, and the state-by-state ratification of the 19th Amendment.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>The Journal of Negro History (Volumes 1–7, 1916–1922):</strong> Complete academic archive founded by Dr. Carter G. Woodson and the Association for the Study of Negro Life and History. Features 232 chapterized monographs and primary records spanning Volumes 1 through 7 (eBooks #13642, #20752, #20906, #21093, #23200, #22149, #24484), exploring early Black churches, Revolutionary and Civil War soldiers, Josiah Henson, Benjamin Banneker, Reconstruction legislators, Supreme Court citizenship jurisprudence, and the Great Migration.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(147, 51, 234, 0.15); color: #9333ea;">
                        <i class="fas fa-book-sparkles"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Classic Literature &amp; Canonical Scripture:</strong> Complete chapterized digital reader editions of Emily Brontë's Gothic masterpiece <em>Wuthering Heights</em> (34 chapters, eBook #768) and the Authorized <em>King James Version of the Bible</em> (complete 66-book canonical editions across Old and New Testaments, eBook #10).
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(14, 165, 233, 0.15); color: #0284c7;">
                        <i class="fas fa-mountain"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Vermont Geological State Parks &amp; Forests Collection:</strong> Six illustrated geological field guides by Harry W. Dodge and Robert A. Christman covering <em>The Geology of Button Bay State Park</em> (eBook #61230), <em>Calvin Coolidge State Forest</em> (eBook #61400), <em>Darling State Park &amp; Burke Mountain</em> (eBook #60730), <em>D.A.R., Mt. Philo, and Sand Bar State Parks</em> (eBook #60989), <em>Groton State Forest</em> (eBook #60710), and <em>Mount Mansfield State Forest</em> (eBook #62053) with responsive maps and geological cross-sections.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(234, 88, 12, 0.15); color: #c2410c;">
                        <i class="fas fa-flag-usa"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Vermont Early Republic &amp; Civil War Histories:</strong> Authoritative historical works including Philip H. Smith's <em>The Green Mountain Boys: or, Vermont and the New York land jobbers</em> (13 chapters, eBook #74334), Rowland E. Robinson's comprehensive <em>Vermont: A Study of Independence</em> (25 chapters, eBook #35573), and Lt. Col. William Y. W. Ripley's firsthand regimental account <em>Vermont riflemen in the war for the union, 1861 to 1865: A history of Company F, First United States sharp shooters</em> (8 chapters, eBook #35088).
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(225, 29, 72, 0.15); color: #e11d48;">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>American Civics &amp; Historic Freedom Classics:</strong> Complete digital library ingestion of foundational American historical texts: <em>The Declaration of Independence</em> (eBook #1), <em>The United States Bill of Rights</em> (eBook #2), <em>The United States Constitution</em> (eBook #5), and Patrick Henry's <em>"Give Me Liberty or Give Me Death"</em> oration (eBook #6 &amp; #20046).
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-books"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>31 Top Downloaded Project Gutenberg Classics:</strong> Complete digital library integration of the top 31 works from the Project Gutenberg archive, including <em>Pride and Prejudice</em>, <em>Frankenstein</em>, <em>Moby Dick</em>, <em>Alice's Adventures in Wonderland</em>, <em>Dracula</em>, <em>The Complete Works of William Shakespeare</em>, <em>The Great Gatsby</em>, <em>War and Peace</em>, <em>The Odyssey</em>, and <em>The Republic</em>.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(79, 70, 229, 0.15); color: #4f46e5;">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Unified Chapter Reader &amp; High-Speed TOC:</strong> Full in-browser digital reading with multi-chapter pagination, precomputed chapter word counts and reading minutes, and an interactive Table of Contents drawer modal.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(245, 158, 11, 0.15); color: #d97706;">
                        <i class="fas fa-universal-access"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Universal Design for Learning (UDL) Accessibility:</strong> Every newly added classic includes Text-to-Speech audio narration, OpenDyslexic and Atkinson Hyperlegible font scalers, Bionic reading fixations, and distraction-free Zen mode.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-sparkles"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Streamlined Home Page Landing Experience:</strong> Removed the legacy Platform Guide popup banner and header trigger button from the index page, decluttering the initial viewport and directing immediate learner focus toward the Academic Path curriculum modules and quick study tools.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(79, 70, 229, 0.15); color: #4f46e5;">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>American Yawp Dual-Volume Online Readers:</strong> Added distinct "Read Online: Vol 1" (Before 1877, Chapters 1–14) and "Read Online: Vol 2" (After 1877, Chapters 15–28) buttons to the Book Overview modal, the Academic Ledger table, and the dedicated reader portal with 1-click access to official open-access texts.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Multi-Volume Modal &amp; Download Architecture:</strong> Upgraded <code>lib-book-overview-modal.js</code> and <code>modals.php</code> to detect multi-volume titles automatically, dynamically rendering dual reading actions, individual Volume 1 and Volume 2 PDF download buttons, and maintaining smart resume tracking for single titles.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(245, 158, 11, 0.15); color: #d97706;">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Unified American Yawp Reader &amp; Chapter Directory:</strong> Launched a dedicated, fully responsive reading hub at <code>/library/read/american-yawp/</code> featuring complete chapter directories for both volumes, primary source documents, flashcard study decks, and Stanford University Press citations.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(79, 70, 229, 0.15); color: #4f46e5;">
                        <i class="fas fa-arrows-left-right-to-line"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Library Index Layout Overflow Resolution:</strong> Eliminated horizontal document overflow on <code>/library/index.php</code>. Clamped <code>.library-main</code>, <code>.library-workspace</code>, and <code>.library-content-container</code> with <code>min-width: 0</code> and <code>overflow-x: clip</code>, preventing flex child blowouts caused by unconstrained book carousel rows, subnav ribbons, and desktop grid columns.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(99, 102, 241, 0.15); color: #6366f1;">
                        <i class="fas fa-pen-nib"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Parent &amp; Teacher Crossword Puzzle Studio:</strong> Interlocking crossword puzzle generator with automatic Across and Down numbering, custom and curriculum vocabulary presets (Math, ELA, Science, Civics, Phonics), auto-advancing keyboard input, clue highlighting, check letter validation, and Web Audio synthesizers.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(225, 29, 72, 0.15); color: #e11d48;">
                        <i class="fas fa-th"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Parent &amp; Teacher Word Search Studio:</strong> Interactive generator with 8-directional placement, custom word lists, and curated academic vocabulary presets across Math, ELA, Science, Civics, and Phonics. Features hint assistance, solution revealing, and Web Audio synthesizers.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(16, 185, 129, 0.15); color: #059669;">
                        <i class="fas fa-print"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Dual-Mode 8.5" &times; 11" PDF Worksheet Printing:</strong> 1-click printable student practice sheets with Student Name, Date, and Score lines, alongside dedicated Educator Answer Keys with coordinate indexing matrices.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true" style="background: rgba(79, 70, 229, 0.15); color: #4f46e5;">
                        <i class="fas fa-universal-access"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Universal Design for Learning (UDL):</strong> Built-in OpenDyslexic font switcher, lowercase letter mode for early elementary learners, untimed low-anxiety mode, screen reader live regions, and 100% keyboard grid navigation.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-books"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Unified Digital Library Catalog (30 Volumes):</strong> Synchronized the complete 30-volume master academic collection across both <code>/library/index.php</code> and <code>/library/cataloge.php</code>. All 11 literature, history, STEM, and civics categories now render directly on the main library landing page with real-time multi-facet filtering and seamless subject research desk integration.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Research Portal Elevation:</strong> Fully integrated peer-reviewed journals (<em>Dyslexia &amp; Learning Disabilities Research</em> and <em>Dysgraphia Studies &amp; Motor Skills</em>) into the PWA service worker offline cache, Command Palette (<code>Ctrl+K</code>), header instant search, and lesson pedagogical connections.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Interactive Student Practice Notebook:</strong> Embedded interactive workspaces across all curriculum Problem Sets with debounced local storage auto-save (<code>hl_practice_notebook_${lessonId}</code>), real-time progress meters, solved status toggles, and Google Drive auto-sync.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-pen-nib"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>1-Click Super Scratchpad Problem Stamping:</strong> Students can launch the digital scratchpad or whiteboard canvas directly from any problem card with pre-formatted problem prompts for handwritten mathematical calculations.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-print"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Dual-Mode Homework Printing:</strong> Print clean blank worksheets with handwriting guidelines for pencil-and-paper assignments, or print solved work sheets containing student typed reasoning for homework submission.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-broom"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Legacy Lesson Stub Retirement:</strong> Cleaned up 95 obsolete PHP stub files from the root directory, streamlining the Level K and Level Template routers to dispatch directly to the Universal Lesson Renderer and module JSON datasets.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-sitemap"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Modular JavaScript Architecture:</strong> Relocated all 34 loose scripts into domain-specific subdirectories (<code>pages/</code>, <code>assessment/</code>, <code>standards/</code>, <code>labs/</code>, <code>accessibility/</code>, <code>components/</code>, <code>core/</code>) with synchronized references across all templates and partials.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-folder-open"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Curriculum Pop-Ups Reorganization:</strong> Relocated all 56 dedicated Pre-K through Grade 12 scope &amp; sequence datasets into <code>assets/data/curr pop-ups/</code> with robust URL path resolution, decluttering the root data directory while maintaining instant on-demand modal loading.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Module-Level JSON Architecture:</strong> Replaced 105 fragmented individual lesson files with 5 clean, cohesive module datasets (<code>k-math-m1.json</code> to <code>k-math-m5.json</code>), reducing directory clutter and optimizing filesystem indexing.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-route"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Tiered Dynamic Router Resolution:</strong> <code>levels/k.php</code> and <code>src/lesson_renderer.php</code> dynamically resolve lessons using a fast tiered pipeline: Module JSON &rarr; Standalone JSON &rarr; Master Registry &rarr; Intelligent Scaffolder.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Complete 105-Lesson Grade 9 Curriculum:</strong> Full coverage across Modules 1–5 with authentic Eureka Math student outcomes, teacher insights, and guided multi-step exercises.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-file-signature"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Authentic Embedded Problem Sets:</strong> Full student practice worksheets embedded directly on-page with expandable teacher answer keys and 1-click browser printing. Zero external file download links.
                    </div>
                </li>
                <li class="footer-vmodal-feature-item">
                    <div class="footer-vmodal-feature-icon" aria-hidden="true">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                    <div class="footer-vmodal-feature-text">
                        <strong>Verbatim Exit Ticket Keys &amp; Check Understanding:</strong> Formative Exit Ticket prompts and worked teacher keys directly integrated into the interactive modal assessment runner.
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