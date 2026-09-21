<?php
/**
 * library/how-to.php - Library Documentation & User Guide Hub
 * Comprehensive guide and reference manual for all digital library features:
 * searching, call numbers, reading controls, typography, UDL accommodations,
 * study notebooks, academic citations, offline caching, and keyboard hotkeys.
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// --- Page-Specific SEO & Meta Variables ---
$pageTitle = 'Library Documentation & User Guide - How to Use Hesten\'s Digital Library';
$pageDescription = 'Complete guide to navigating Hesten\'s Digital Library: searching, call numbers, reader customization, study notes, citations, and accessibility tools.';
$pageKeywords = 'library guide, how to use library, digital reader docs, call numbers guide, academic citations, dyslexia reader, bionic reading';
$pageAuthor = 'Hesten\'s Learning';

// Current page indicator for navigation
$currentLibraryPage = 'howto';

// Include Global Site Header
include ABSPATH . 'src/header.php';
?>

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/library-main.css') : '/assets/css/library-main.css' ?>">

<!-- AURORA MESH BACKGROUND -->
<div class="library-aurora-bg" aria-hidden="true">
    <div class="library-aurora-blob blob-1"></div>
    <div class="library-aurora-blob blob-2"></div>
    <div class="library-aurora-blob blob-3"></div>
</div>

<!-- REUSABLE LIBRARY SUBNAV -->
<?php include __DIR__ . '/library_header_nav.php'; ?>

<main id="main-content" class="library-main" style="padding-top: 0.5rem;">
    <div class="library-workspace" style="max-width: 1360px; margin: 0 auto; padding: 0 1.25rem;">

        <!-- Docs Hero Header -->
        <header class="catalog-page-hero library-animate-reveal">
            <div class="catalog-hero-card">
                <div class="catalog-hero-top">
                    <div class="catalog-title-group">
                        <div class="hero-pill" style="margin-bottom: 0.85rem;">
                            <i class="fas fa-book-open-reader" aria-hidden="true"></i>
                            <span>Comprehensive Scholar Documentation</span>
                        </div>
                        <h1>Library User Guide &amp; <span class="hero-title-highlight">Documentation Hub</span></h1>
                        <p>Learn how to discover books using Library of Congress call numbers, customize your reading environment with Universal Design for Learning (UDL) tools, take interactive study notes, and export publication-grade academic citations.</p>
                    </div>
                    <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
                        <a href="/library/cataloge.php" class="btn-premium btn-primary">
                            <i class="fas fa-barcode"></i> <span>Master Catalog</span>
                        </a>
                        <a href="/library/" class="btn-premium btn-secondary">
                            <i class="fas fa-compass"></i> <span>Explore Desks</span>
                        </a>
                    </div>
                </div>

                <!-- Docs Live Filter Search -->
                <div style="margin-top: 0.5rem;">
                    <div class="library-search-input-container" style="max-width: 600px;">
                        <input type="text" id="docs-quick-filter" 
                               placeholder="Filter documentation topics (e.g., call numbers, citations, dyslexia, offline)..." 
                               class="library-search-input library-glass-shine"
                               aria-label="Filter documentation topics">
                        <i class="fas fa-search library-search-icon" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Two-Column Documentation Layout -->
        <div class="howto-layout">

            <!-- Sticky Sidebar Table of Contents -->
            <aside class="howto-sticky-nav" aria-label="Documentation Table of Contents">
                <div class="howto-nav-title">
                    <i class="fas fa-list-check" aria-hidden="true"></i> Guide Contents
                </div>
                <nav>
                    <ul class="howto-nav-list" id="docs-toc-list">
                        <li class="howto-nav-item">
                            <a href="#finding-books">
                                <i class="fas fa-magnifying-glass text-indigo-500" aria-hidden="true"></i>
                                <span>1. Finding Books</span>
                            </a>
                        </li>
                        <li class="howto-nav-item">
                            <a href="#call-numbers">
                                <i class="fas fa-barcode text-blue-500" aria-hidden="true"></i>
                                <span>2. Call Numbers</span>
                            </a>
                        </li>
                        <li class="howto-nav-item">
                            <a href="#digital-reader">
                                <i class="fas fa-book-open text-emerald-500" aria-hidden="true"></i>
                                <span>3. The Digital Reader</span>
                            </a>
                        </li>
                        <li class="howto-nav-item">
                            <a href="#accessibility">
                                <i class="fas fa-universal-access text-amber-500" aria-hidden="true"></i>
                                <span>4. Accessibility &amp; UDL</span>
                            </a>
                        </li>
                        <li class="howto-nav-item">
                            <a href="#study-tools">
                                <i class="fas fa-highlighter text-purple-500" aria-hidden="true"></i>
                                <span>5. Highlights &amp; Notes</span>
                            </a>
                        </li>
                        <li class="howto-nav-item">
                            <a href="#citations">
                                <i class="fas fa-quote-right text-rose-500" aria-hidden="true"></i>
                                <span>6. Academic Citations</span>
                            </a>
                        </li>
                        <li class="howto-nav-item">
                            <a href="#goals-gamification">
                                <i class="fas fa-bullseye text-orange-500" aria-hidden="true"></i>
                                <span>7. Reading Streaks</span>
                            </a>
                        </li>
                        <li class="howto-nav-item">
                            <a href="#offline-sync">
                                <i class="fas fa-cloud-arrow-down text-cyan-500" aria-hidden="true"></i>
                                <span>8. Offline &amp; Cloud Sync</span>
                            </a>
                        </li>
                        <li class="howto-nav-item">
                            <a href="#keyboard-shortcuts">
                                <i class="fas fa-keyboard text-slate-500" aria-hidden="true"></i>
                                <span>9. Keyboard Hotkeys</span>
                            </a>
                        </li>
                        <li class="howto-nav-item">
                            <a href="#faq">
                                <i class="fas fa-circle-question text-teal-500" aria-hidden="true"></i>
                                <span>10. Common FAQs</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Documentation Modules Column -->
            <div class="howto-content-column" id="docs-modules-container">

                <!-- Module 1: Finding Books -->
                <section id="finding-books" class="howto-module-card library-animate-reveal">
                    <div class="howto-module-header">
                        <div class="howto-module-number">1</div>
                        <div>
                            <h2 class="howto-module-title">Finding &amp; Filtering Books</h2>
                            <p style="color: var(--color-text-muted); margin: 0; font-size: 0.9rem;">Mastering search, reading levels, and view modes.</p>
                        </div>
                    </div>
                    <div style="font-size: 0.95rem; line-height: 1.7; color: var(--color-text-muted);">
                        <p>Hesten's Learning digital library offers multi-facet search across the entire collection. You can locate volumes using titles, authors, keywords, ISBNs, or Library of Congress call numbers.</p>
                    </div>
                    <div class="howto-step-grid">
                        <div class="howto-step-box">
                            <h4><i class="fas fa-filter text-indigo-500"></i> Lexile Level Filter</h4>
                            <p>Filter books by reading difficulty: <strong>Elementary (&lt;500L)</strong>, <strong>Middle School (500L–900L)</strong>, and <strong>High School / Advanced (&gt;900L)</strong>.</p>
                        </div>
                        <div class="howto-step-box">
                            <h4><i class="fas fa-table-columns text-blue-500"></i> Ledger vs Card Views</h4>
                            <p>Switch between the <strong>Academic Ledger</strong> (compact table view displaying call numbers and metadata) and the <strong>Virtual Shelf</strong> (visual book covers with spine badges).</p>
                        </div>
                        <div class="howto-step-box">
                            <h4><i class="fas fa-bookmark text-emerald-500"></i> Personal Reading List</h4>
                            <p>Click the bookmark ribbon on any book card to save it to your local reading queue. Access your saved books instantly via the "⭐ My Reading List" filter chip.</p>
                        </div>
                    </div>
                </section>

                <!-- Module 2: Deciphering Call Numbers -->
                <section id="call-numbers" class="howto-module-card library-animate-reveal">
                    <div class="howto-module-header">
                        <div class="howto-module-number">2</div>
                        <div>
                            <h2 class="howto-module-title">Deciphering Library of Congress Call Numbers</h2>
                            <p style="color: var(--color-text-muted); margin: 0; font-size: 0.9rem;">Understanding intellectual addresses and shelf organization.</p>
                        </div>
                    </div>
                    <div style="font-size: 0.95rem; line-height: 1.7; color: var(--color-text-muted);">
                        <p>Every work in our library is assigned an authentic <strong>Library of Congress Classification (LCC)</strong> call number. Unlike arbitrary numbering, LCC codes place books with similar subjects together.</p>
                        
                        <!-- Visual Call Number Anatomy Box -->
                        <div style="background: rgba(15, 23, 42, 0.04); border: 1px solid rgba(15, 23, 42, 0.1); border-radius: var(--radius-xl); padding: 1.5rem; margin: 1.25rem 0;">
                            <div style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap; margin-bottom: 1rem;">
                                <span style="font-family: monospace; font-size: 1.3rem; font-weight: 800; background: #0f172a; color: #38bdf8; padding: 0.4rem 0.8rem; border-radius: 0.5rem;">
                                    KF4527 .C66 1787
                                </span>
                                <span style="font-weight: 700; color: var(--color-text-main);">United States Constitution</span>
                            </div>
                            <ul style="margin: 0; padding-left: 1.25rem; display: flex; flex-direction: column; gap: 0.4rem; font-size: 0.9rem;">
                                <li><strong>KF:</strong> Law of the United States (K = Law, F = United States Federal).</li>
                                <li><strong>4527:</strong> Specific classification section for constitutional treaties and organic laws.</li>
                                <li><strong>.C66:</strong> Cutter identifier for Constitutional Convention.</li>
                                <li><strong>1787:</strong> Publication year of the original document.</li>
                            </ul>
                        </div>
                        <p><strong>Copying Call Numbers:</strong> In the Master Catalog (<a href="/library/cataloge.php" style="color: var(--color-primary); font-weight: 600;">cataloge.php</a>), click the copy icon next to any call number to paste it directly into your notes or citations.</p>
                    </div>
                </section>

                <!-- Module 3: The Digital Reader -->
                <section id="digital-reader" class="howto-module-card library-animate-reveal">
                    <div class="howto-module-header">
                        <div class="howto-module-number">3</div>
                        <div>
                            <h2 class="howto-module-title">The Digital Reader &amp; Customization</h2>
                            <p style="color: var(--color-text-muted); margin: 0; font-size: 0.9rem;">Tailoring your reading environment for optimal focus and comfort.</p>
                        </div>
                    </div>
                    <div style="font-size: 0.95rem; line-height: 1.7; color: var(--color-text-muted);">
                        <p>When reading online, open the Reader Settings drawer (<i class="fas fa-sliders"></i>) to personalize your visual layout:</p>
                    </div>
                    <div class="howto-step-grid">
                        <div class="howto-step-box">
                            <h4><i class="fas fa-palette text-indigo-500"></i> Five Reading Themes</h4>
                            <p>Select between <strong>Light</strong> (classic paper), <strong>Dark</strong> (slate gray), <strong>Midnight</strong> (deep space navy), <strong>Sepia</strong> (warm eye-friendly cream), or <strong>High Contrast</strong> (pure black &amp; white).</p>
                        </div>
                        <div class="howto-step-box">
                            <h4><i class="fas fa-text-height text-purple-500"></i> Typography Scaling</h4>
                            <p>Adjust the font size from 14px to 28px. Modify line height and paragraph margin spacing to eliminate crowding and optimize reading speed.</p>
                        </div>
                        <div class="howto-step-box">
                            <h4><i class="fas fa-expand text-emerald-500"></i> Zen Focus Mode</h4>
                            <p>Click the Zen Focus button (<i class="fas fa-compress"></i>) to hide headers, sidebars, and navigational elements for distraction-free reading.</p>
                        </div>
                    </div>
                </section>

                <!-- Module 4: Accessibility & UDL -->
                <section id="accessibility" class="howto-module-card library-animate-reveal">
                    <div class="howto-module-header">
                        <div class="howto-module-number">4</div>
                        <div>
                            <h2 class="howto-module-title">Universal Design for Learning (UDL) &amp; Accessibility</h2>
                            <p style="color: var(--color-text-muted); margin: 0; font-size: 0.9rem;">Assistive technologies for neurodiverse scholars and diverse learners.</p>
                        </div>
                    </div>
                    <div style="font-size: 0.95rem; line-height: 1.7; color: var(--color-text-muted);">
                        <p>Hesten's Learning incorporates specialized reading accommodations built directly into the reading engine:</p>
                    </div>
                    <div class="howto-step-grid">
                        <div class="howto-step-box">
                            <h4><i class="fas fa-font text-amber-500"></i> OpenDyslexic Typography</h4>
                            <p>Switch to weighted OpenDyslexic font designed with heavy baseline gravity to prevent letter flipping and rotation.</p>
                        </div>
                        <div class="howto-step-box">
                            <h4><i class="fas fa-brain text-rose-500"></i> Bionic Reading Mode</h4>
                            <p>Automatically bolds the first 2-3 characters of each word (e.g. <strong>Rea</strong>ding <strong>fac</strong>ilitates <strong>foc</strong>us), guiding your eyes rapidly down the line.</p>
                        </div>
                        <div class="howto-step-box">
                            <h4><i class="fas fa-glasses text-cyan-500"></i> Irlen Optical Tints</h4>
                            <p>Apply soft color overlays (Rose, Mint, Lavender, Amber, Ice Blue) to dramatically reduce visual stress and scotopic sensitivity syndrome.</p>
                        </div>
                        <div class="howto-step-box">
                            <h4><i class="fas fa-volume-high text-emerald-500"></i> Text-to-Speech (TTS)</h4>
                            <p>Listen to any chapter with synthesized read-aloud. Control speed (0.75x to 1.5x), pause, or resume at any point.</p>
                        </div>
                    </div>
                </section>

                <!-- Module 5: Study Tools & Notebook -->
                <section id="study-tools" class="howto-module-card library-animate-reveal">
                    <div class="howto-module-header">
                        <div class="howto-module-number">5</div>
                        <div>
                            <h2 class="howto-module-title">Highlighting &amp; The Global Study Notebook</h2>
                            <p style="color: var(--color-text-muted); margin: 0; font-size: 0.9rem;">Annotating texts, saving reflections, and creating study guides.</p>
                        </div>
                    </div>
                    <div style="font-size: 0.95rem; line-height: 1.7; color: var(--color-text-muted);">
                        <ol style="padding-left: 1.25rem; display: flex; flex-direction: column; gap: 0.75rem;">
                            <li><strong>Highlighting Text:</strong> Highlight any sentence or paragraph in a book reader. A floating palette appears allowing you to select Yellow, Green, Cyan, or Pink.</li>
                            <li><strong>Attaching Notes:</strong> Click any highlight to add an analytical note, question, or study reflection.</li>
                            <li><strong>Opening the Study Notebook:</strong> Click the "Notebook" button in the library navigation ribbon (or press the stat card on the library home) to open your global Study Notebook.</li>
                            <li><strong>Searching &amp; Reviewing:</strong> Filter all your highlights and notes across all books by color or keyword, or export them for essays and revision.</li>
                        </ol>
                    </div>
                </section>

                <!-- Module 6: Academic Citations -->
                <section id="citations" class="howto-module-card library-animate-reveal">
                    <div class="howto-module-header">
                        <div class="howto-module-number">6</div>
                        <div>
                            <h2 class="howto-module-title">Generating Academic Citations (MLA, APA, Chicago)</h2>
                            <p style="color: var(--color-text-muted); margin: 0; font-size: 0.9rem;">Exporting publication-grade bibliographic references in seconds.</p>
                        </div>
                    </div>
                    <div style="font-size: 0.95rem; line-height: 1.7; color: var(--color-text-muted);">
                        <p>Never worry about manual citation formatting. Hesten's Learning includes an automatic Academic Citation Generator supporting three major styles:</p>
                        <div class="howto-step-grid">
                            <div class="howto-step-box">
                                <h4>MLA 9th Edition</h4>
                                <p>Standard for English literature, humanities, and cultural studies. Formatted with authors, title in italics, and container details.</p>
                            </div>
                            <div class="howto-step-box">
                                <h4>APA 7th Edition</h4>
                                <p>Standard for sciences, psychology, and education. Features author-date format and sentence-case title rules.</p>
                            </div>
                            <div class="howto-step-box">
                                <h4>Chicago 17th Edition</h4>
                                <p>Standard for historical research, primary source archives, and political science papers.</p>
                            </div>
                        </div>
                        <p style="margin-top: 1rem;">To generate a citation, open any book overview modal and click <strong>"Cite Book"</strong>, or trigger the citation generator inside the reader. Click <strong>"Copy Citation"</strong> to copy the text with hanging indent styling.</p>
                    </div>
                </section>

                <!-- Module 7: Reading Goals & Gamification -->
                <section id="goals-gamification" class="howto-module-card library-animate-reveal">
                    <div class="howto-module-header">
                        <div class="howto-module-number">7</div>
                        <div>
                            <h2 class="howto-module-title">Daily Reading Goals &amp; Streaks</h2>
                            <p style="color: var(--color-text-muted); margin: 0; font-size: 0.9rem;">Building consistent reading habits through positive gamification.</p>
                        </div>
                    </div>
                    <div style="font-size: 0.95rem; line-height: 1.7; color: var(--color-text-muted);">
                        <p>Stay motivated with built-in daily habit tracking:</p>
                        <ul style="padding-left: 1.25rem; display: flex; flex-direction: column; gap: 0.5rem;">
                            <li><strong>Setting Daily Goals:</strong> Click the goal card in your Scholar Dashboard to select a daily target (5 min, 15 min, 30 min, or 60 min).</li>
                            <li><strong>Live Progress Ring:</strong> As you read chapters in the reader, your timer automatically records active reading and updates your circular progress ring.</li>
                            <li><strong>Day Streaks:</strong> Reading at least once each calendar day maintains your fire streak (<i class="fas fa-fire text-amber-500"></i>) and earns Scholar XP.</li>
                        </ul>
                    </div>
                </section>

                <!-- Module 8: Offline & Cloud Sync -->
                <section id="offline-sync" class="howto-module-card library-animate-reveal">
                    <div class="howto-module-header">
                        <div class="howto-module-number">8</div>
                        <div>
                            <h2 class="howto-module-title">Offline Resiliency &amp; Google Drive Cloud Sync</h2>
                            <p style="color: var(--color-text-muted); margin: 0; font-size: 0.9rem;">Seamless multi-device synchronization and zero network dropouts.</p>
                        </div>
                    </div>
                    <div style="font-size: 0.95rem; line-height: 1.7; color: var(--color-text-muted);">
                        <p>Hesten's Learning is built with an offline-first architecture:</p>
                        <div class="howto-step-grid">
                            <div class="howto-step-box">
                                <h4><i class="fas fa-wifi text-emerald-500"></i> Offline Reading</h4>
                                <p>Once you open a book or fact repository, it caches locally. If you lose internet connection, you can continue reading uninterrupted.</p>
                            </div>
                            <div class="howto-step-box">
                                <h4><i class="fab fa-google-drive text-blue-500"></i> Auto-Sync to Google Drive</h4>
                                <p>Enable Google Drive Auto-Sync in your platform settings to synchronize your reading streaks, bookmarks, highlights, and notes across all your school or home devices.</p>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Module 9: Keyboard Shortcuts -->
                <section id="keyboard-shortcuts" class="howto-module-card library-animate-reveal">
                    <div class="howto-module-header">
                        <div class="howto-module-number">9</div>
                        <div>
                            <h2 class="howto-module-title">Power Scholar Keyboard Shortcuts</h2>
                            <p style="color: var(--color-text-muted); margin: 0; font-size: 0.9rem;">Navigate at lightning speed without ever touching your mouse.</p>
                        </div>
                    </div>
                    <div style="font-size: 0.95rem; line-height: 1.7; color: var(--color-text-muted);">
                        <table class="shortcut-table" aria-label="Keyboard shortcuts list">
                            <thead>
                                <tr>
                                    <th style="text-align: left; padding: 0.5rem 1rem; color: var(--color-text-muted);">Key</th>
                                    <th style="text-align: left; padding: 0.5rem 1rem; color: var(--color-text-muted);">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><span class="kbd-pill">/</span></td>
                                    <td>Focus Search Bar instantly from anywhere on catalog pages</td>
                                </tr>
                                <tr>
                                    <td><span class="kbd-pill">?</span></td>
                                    <td>Open Keyboard Shortcuts cheatsheet modal</td>
                                </tr>
                                <tr>
                                    <td><span class="kbd-pill">Esc</span></td>
                                    <td>Close active modal, search dropdown, or reader drawer</td>
                                </tr>
                                <tr>
                                    <td><span class="kbd-pill">Tab</span> / <span class="kbd-pill">Shift + Tab</span></td>
                                    <td>Navigate forward and backward through books and interactive controls</td>
                                </tr>
                                <tr>
                                    <td><span class="kbd-pill">Enter</span> or <span class="kbd-pill">Space</span></td>
                                    <td>Open book overview, activate filters, or trigger action buttons</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

                <!-- Module 10: Common FAQs -->
                <section id="faq" class="howto-module-card library-animate-reveal">
                    <div class="howto-module-header">
                        <div class="howto-module-number">10</div>
                        <div>
                            <h2 class="howto-module-title">Frequently Asked Questions</h2>
                            <p style="color: var(--color-text-muted); margin: 0; font-size: 0.9rem;">Common questions about our digital holdings and formats.</p>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 1rem; margin-top: 1rem;">
                        <details style="background: rgba(15, 23, 42, 0.03); border: 1px solid rgba(15, 23, 42, 0.08); border-radius: var(--radius-xl); padding: 1rem 1.25rem;">
                            <summary style="font-weight: 700; cursor: pointer; color: var(--color-text-main);">
                                Can I download books to my Kindle, Kobo, or e-reader?
                            </summary>
                            <p style="margin-top: 0.75rem; color: var(--color-text-muted); font-size: 0.92rem; line-height: 1.6;">
                                Yes! In the Book Overview modal, books provide direct download buttons for <strong>EPUB</strong>, <strong>PDF</strong>, and clean <strong>Plain Text (TXT)</strong> files. You can load these onto any standard e-reader device.
                            </p>
                        </details>

                        <details style="background: rgba(15, 23, 42, 0.03); border: 1px solid rgba(15, 23, 42, 0.08); border-radius: var(--radius-xl); padding: 1rem 1.25rem;">
                            <summary style="font-weight: 700; cursor: pointer; color: var(--color-text-main);">
                                Are these texts approved for classroom teaching?
                            </summary>
                            <p style="margin-top: 0.75rem; color: var(--color-text-muted); font-size: 0.92rem; line-height: 1.6;">
                                Absolutely. All primary documents and textbooks are unabridged and aligned with high school, AP, and collegiate standards. Books featuring the <span class="call-tag"><i class="fas fa-graduation-cap"></i> Teacher Resources</span> badge include curricular study guides.
                            </p>
                        </details>

                        <details style="background: rgba(15, 23, 42, 0.03); border: 1px solid rgba(15, 23, 42, 0.08); border-radius: var(--radius-xl); padding: 1rem 1.25rem;">
                            <summary style="font-weight: 700; cursor: pointer; color: var(--color-text-main);">
                                How do I suggest a new public domain book for inclusion?
                            </summary>
                            <p style="margin-top: 0.75rem; color: var(--color-text-muted); font-size: 0.92rem; line-height: 1.6;">
                                You can submit requests through our Feedback &amp; Suggestions portal or contact the editorial guild. We prioritize historical primary documents, science reference handbooks, and classic world literature.
                            </p>
                        </details>
                    </div>
                </section>

            </div>
        </div>

    </div>
</main>

<!-- Modals & Scripts -->
<?php include __DIR__ . '/modals.php'; ?>

<script>
    // Live Filter for Docs Topics
    document.addEventListener('DOMContentLoaded', () => {
        const filterInput = document.getElementById('docs-quick-filter');
        const cards = document.querySelectorAll('.howto-module-card');
        const tocItems = document.querySelectorAll('#docs-toc-list .howto-nav-item');

        if (filterInput) {
            filterInput.addEventListener('input', () => {
                const q = filterInput.value.trim().toLowerCase();
                cards.forEach(card => {
                    const text = card.textContent.toLowerCase();
                    const match = text.includes(q);
                    card.style.display = match ? '' : 'none';
                });

                tocItems.forEach(item => {
                    const text = item.textContent.toLowerCase();
                    const match = text.includes(q);
                    item.style.display = match ? '' : 'none';
                });
            });
        }
    });
</script>

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-bookmarks.js') : '/assets/js/library/lib-bookmarks.js' ?>" defer></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-study-notebook.js') : '/assets/js/library/lib-study-notebook.js' ?>" defer></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-keyboard-shortcuts.js') : '/assets/js/library/lib-keyboard-shortcuts.js' ?>" defer></script>

<?php include ABSPATH . 'src/footer.php'; ?>
