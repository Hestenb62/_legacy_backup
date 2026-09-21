<?php
/**
 * library/about.php - About Hesten's Digital Library
 * Detailed overview of the digital library's philosophy, collections,
 * provenance, fair-use policies, call number classification system,
 * and universal accessibility (UDL & WCAG 2.2 AAA) standards.
 */

if (!defined('ABSPATH')) {
    define('ABSPATH', dirname(__DIR__) . '/');
}

// --- Page-Specific SEO & Meta Variables ---
$pageTitle = 'About the Digital Library - Mission, Collections & Access - Hesten\'s Learning';
$pageDescription = 'Discover the mission, curatorial standards, Library of Congress classification, and universal accessibility powering Hesten\'s Learning Digital Library.';
$pageKeywords = 'about library, digital archive, open access, public domain, UDL, WCAG AAA, Library of Congress call numbers, educational fair use';
$pageAuthor = 'Hesten\'s Learning';

// Current page indicator for navigation
$currentLibraryPage = 'about';

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
    <div class="library-workspace" style="max-width: 1200px; margin: 0 auto; padding: 0 1.25rem;">

        <!-- Hero Section -->
        <header class="about-hero-section library-animate-reveal">
            <div class="about-hero-pill">
                <i class="fas fa-landmark" aria-hidden="true"></i>
                <span>Universal Knowledge Archive</span>
            </div>
            <h1 class="about-hero-title">About Hesten's <span class="hero-title-highlight">Digital Library</span></h1>
            <p class="about-hero-lead">
                An open-access digital athenaeum engineered for lifelong scholars, classroom educators, and curious minds. Built on open standards, authentic academic cataloging, and an uncompromising commitment to Universal Design for Learning (UDL).
            </p>
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="/library/cataloge.php" class="btn-premium btn-primary">
                    <i class="fas fa-barcode"></i> <span>Master Catalog (Call #s)</span>
                </a>
                <a href="/library/how-to.php" class="btn-premium btn-secondary">
                    <i class="fas fa-circle-question"></i> <span>User Guide &amp; Docs</span>
                </a>
            </div>
        </header>

        <!-- The Four Pillars -->
        <section aria-labelledby="pillars-heading" style="margin-bottom: 3.5rem;">
            <div style="text-align: center; margin-bottom: 2rem;">
                <h2 id="pillars-heading" style="font-size: 2rem; font-weight: 800; color: var(--color-text-main);">The Pillars of Our Archive</h2>
                <p style="color: var(--color-text-muted); max-width: 600px; margin: 0.5rem auto 0 auto;">Architected from the ground up to preserve human knowledge with zero barriers.</p>
            </div>

            <div class="about-grid-3">
                <article class="about-card">
                    <div class="about-card-icon icon-blue">
                        <i class="fas fa-lock-open" aria-hidden="true"></i>
                    </div>
                    <h3>100% Free &amp; Open Access</h3>
                    <p>No paywalls, subscriptions, or intrusive advertisements. We believe high-caliber literature and academic primary sources should be freely accessible to every learner regardless of geographic or socioeconomic standing.</p>
                </article>

                <article class="about-card">
                    <div class="about-card-icon icon-purple">
                        <i class="fas fa-scale-balanced" aria-hidden="true"></i>
                    </div>
                    <h3>Scholarly Rigor &amp; Provenance</h3>
                    <p>Every text is derived from authoritative, verified public domain editions and academic repositories. We preserve original historical spelling, contextual prefaces, and formal author biographical dossiers.</p>
                </article>

                <article class="about-card">
                    <div class="about-card-icon icon-emerald">
                        <i class="fas fa-barcode" aria-hidden="true"></i>
                    </div>
                    <h3>Authentic LCC Call Numbers</h3>
                    <p>We classify all holdings using the Library of Congress Classification (LCC) system. Students develop authentic bibliographic literacy, preparing them for collegiate research and university archives.</p>
                </article>

                <article class="about-card">
                    <div class="about-card-icon icon-amber">
                        <i class="fas fa-universal-access" aria-hidden="true"></i>
                    </div>
                    <h3>Universal Design for Learning</h3>
                    <p>Engineered to exceed WCAG 2.2 AA &amp; AAA standards. Includes OpenDyslexic typography, bionic reading acceleration, Irlen optical tints, untimed reading modes, and synthesized text-to-speech read-aloud.</p>
                </article>

                <article class="about-card">
                    <div class="about-card-icon icon-rose">
                        <i class="fas fa-cloud-arrow-down" aria-hidden="true"></i>
                    </div>
                    <h3>Offline Resiliency &amp; Sync</h3>
                    <p>Our progressive web application architecture caches your books locally. Your reading streaks, highlights, and study notes automatically sync to Google Drive whenever network connectivity is active.</p>
                </article>

                <article class="about-card">
                    <div class="about-card-icon icon-cyan">
                        <i class="fas fa-square-root-variable" aria-hidden="true"></i>
                    </div>
                    <h3>Living Reference Repositories</h3>
                    <p>In addition to historical volumes, our editorial guild authors comprehensive 12-volume reference handbooks for mathematics, science, and linguistics rendered in crisp, responsive MathJax LaTeX typography.</p>
                </article>
            </div>
        </section>

        <!-- Deep Dive: Call Number Classification System -->
        <section class="lcc-feature-box library-animate-reveal" aria-labelledby="lcc-heading">
            <div style="max-width: 800px;">
                <div class="hero-pill" style="margin-bottom: 0.75rem;">
                    <i class="fas fa-tags" aria-hidden="true"></i>
                    <span>Classification Standards</span>
                </div>
                <h2 id="lcc-heading" style="font-size: 1.85rem; font-weight: 800; color: var(--color-text-main); margin-bottom: 0.75rem;">
                    The Library of Congress Classification System
                </h2>
                <p style="color: var(--color-text-muted); font-size: 1rem; line-height: 1.65;">
                    Rather than using proprietary or simplified shelving codes, Hesten's Learning adopts the standard <strong>Library of Congress Classification (LCC)</strong> system used by premier research universities and the United States Congress. Each call number acts as a unique intellectual address for a work.
                </p>
            </div>

            <!-- Interactive Diagram -->
            <div class="lcc-diagram-grid" role="region" aria-label="Call Number Anatomy Diagram">
                <div class="lcc-node">
                    <div class="node-value">PR</div>
                    <div class="node-role">Broad Subject Class</div>
                    <div class="node-desc">Letters indicate the major discipline. <em>PR</em> corresponds to English Literature.</div>
                </div>
                <div class="lcc-node">
                    <div class="node-value">6029</div>
                    <div class="node-role">Topical Subclass</div>
                    <div class="node-desc">Numbers specify period or topic. <em>6029</em> denotes English authors active 1900–1960.</div>
                </div>
                <div class="lcc-node">
                    <div class="node-value">.R8 N56</div>
                    <div class="node-role">Cutter &amp; Work #</div>
                    <div class="node-desc">Alpha-numeric codes identifying the specific author (.R8 = Orwell) and work (N56 = 1984).</div>
                </div>
                <div class="lcc-node">
                    <div class="node-value">1949</div>
                    <div class="node-role">Publication Date</div>
                    <div class="node-desc">The specific year of original publication, ensuring chronological edition precision.</div>
                </div>
            </div>

            <div style="background: rgba(15, 23, 42, 0.04); border-radius: 0.75rem; padding: 1.25rem 1.5rem; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 1rem;">
                <div style="font-size: 0.92rem; color: var(--color-text-muted);">
                    Explore every volume organized by its exact call number in our Master Catalog:
                </div>
                <a href="/library/cataloge.php" class="btn-premium btn-primary" style="padding: 0.5rem 1.1rem; font-size: 0.85rem;">
                    <i class="fas fa-barcode"></i> <span>Open Call Number Shelf</span>
                </a>
            </div>
        </section>

        <!-- Curatorial Scope & Collection Overview -->
        <section aria-labelledby="collections-heading" style="margin-bottom: 3.5rem;">
            <h2 id="collections-heading" style="font-size: 2rem; font-weight: 800; color: var(--color-text-main); margin-bottom: 1.5rem; text-align: center;">
                Curatorial Scope &amp; Collections
            </h2>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.75rem;">
                <!-- Category Box 1 -->
                <div class="about-card">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <i class="fas fa-landmark-dome" style="font-size: 1.5rem; color: #ef4444;"></i>
                        <h3 style="margin: 0; font-size: 1.3rem;">Historical Primary Sources</h3>
                    </div>
                    <p>The foundational charters, treaties, debates, and declarations that defined human rights and constitutional democracy. Unabridged transcripts of the <em>United States Constitution</em>, the <em>Declaration of Independence</em>, the <em>Bill of Rights</em>, and the <em>Federalist Papers</em>.</p>
                </div>

                <!-- Category Box 2 -->
                <div class="about-card">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <i class="fas fa-book-bookmark" style="font-size: 1.5rem; color: #3b82f6;"></i>
                        <h3 style="margin: 0; font-size: 1.3rem;">Classic Literature &amp; Fiction</h3>
                    </div>
                    <p>Literary cornerstones exploring human nature, ethical dilemmas, and social transformation. Featuring timeless works such as Jane Austen's <em>Pride and Prejudice</em>, Mary Shelley's <em>Frankenstein</em>, and George Orwell's prophetic <em>1984</em>.</p>
                </div>

                <!-- Category Box 3 -->
                <div class="about-card">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <i class="fas fa-graduation-cap" style="font-size: 1.5rem; color: #10b981;"></i>
                        <h3 style="margin: 0; font-size: 1.3rem;">Open Academic Textbooks</h3>
                    </div>
                    <p>Comprehensive college-prep and high school curricula exploring history and civics through working-class and diverse perspectives. Includes <em>Who Built America?</em> and Stanford University Press's open-source <em>The American Yawp</em>.</p>
                </div>

                <!-- Category Box 4 -->
                <div class="about-card">
                    <div style="display: flex; align-items: center; gap: 0.75rem; margin-bottom: 1rem;">
                        <i class="fas fa-atom" style="font-size: 1.5rem; color: #8b5cf6;"></i>
                        <h3 style="margin: 0; font-size: 1.3rem;">Scientific &amp; Mathematical Handbooks</h3>
                    </div>
                    <p>Exacting scientific and mathematical reference manuals spanning Grades 1 through 12. Complete with axiomatic theorems, geometric proofs, physical constants, taxonomic keys, and reactive LaTeX equation rendering.</p>
                </div>
            </div>
        </section>

        <!-- Provenance & Fair Use Policy -->
        <section class="about-card" style="margin-bottom: 3.5rem; border-left: 4px solid var(--color-primary);" aria-labelledby="policy-heading">
            <h2 id="policy-heading" style="font-size: 1.6rem; font-weight: 800; color: var(--color-text-main); margin-bottom: 1rem;">
                <i class="fas fa-shield-halved text-indigo-500" aria-hidden="true"></i> Provenance, Public Domain &amp; Educational Fair Use
            </h2>
            <div style="font-size: 0.95rem; color: var(--color-text-muted); line-height: 1.7; display: flex; flex-direction: column; gap: 1rem;">
                <p>
                    <strong>Public Domain Preservation:</strong> The vast majority of historical and literary works in Hesten's Learning archive reside in the public domain in the United States, having been published prior to January 1, 1929, or released under open public licenses. Digital facsimiles and clean text transcriptions are sourced from reputable public preservation initiatives including <em>Project Gutenberg</em>, the <em>Internet Archive</em>, <em>Open Library</em>, and the <em>US National Archives and Records Administration (NARA)</em>.
                </p>
                <p>
                    <strong>Educational Fair Use Notice:</strong> Limited selections of contemporary educational materials and literary critiques are curated strictly for non-profit educational study, research analysis, and scholarly commentary under the Fair Use provisions of Title 17, United States Code, Section 107.
                </p>
                <p>
                    <strong>Original Reference Content:</strong> The <em>Mathematical Facts, Constants &amp; Formulas</em>, <em>Scientific Laws &amp; Taxonomy</em>, and <em>Language Compendium</em> reference series are original educational materials developed by Hesten's Learning and are provided under open educational commons guidelines.
                </p>
            </div>
        </section>

        <!-- Bottom Navigation Ribbon Card -->
        <div style="background: linear-gradient(135deg, rgba(79, 70, 229, 0.1), rgba(124, 58, 237, 0.1)); border: 1px solid rgba(79, 70, 229, 0.25); border-radius: var(--radius-2xl); padding: 2.5rem 2rem; text-align: center; margin-bottom: 3rem;">
            <h3 style="font-size: 1.6rem; font-weight: 800; color: var(--color-text-main); margin-bottom: 0.75rem;">Ready to Start Exploring?</h3>
            <p style="color: var(--color-text-muted); max-width: 580px; margin: 0 auto 1.5rem auto;">Visit our Master Catalog to browse by call number, or check out our How-To Docs Hub for comprehensive tutorials on highlighters, reading goals, and citation generation.</p>
            <div style="display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap;">
                <a href="/library/cataloge.php" class="btn-premium btn-primary">
                    <i class="fas fa-barcode"></i> <span>Open Master Catalog</span>
                </a>
                <a href="/library/how-to.php" class="btn-premium btn-secondary">
                    <i class="fas fa-book-reader"></i> <span>Documentation &amp; User Guide</span>
                </a>
                <a href="/library/" class="btn-premium btn-secondary">
                    <i class="fas fa-compass"></i> <span>Library Home</span>
                </a>
            </div>
        </div>

    </div>
</main>

<!-- Include Modals & Core Scripts -->
<?php include __DIR__ . '/modals.php'; ?>

<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-bookmarks.js') : '/assets/js/library/lib-bookmarks.js' ?>" defer></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-study-notebook.js') : '/assets/js/library/lib-study-notebook.js' ?>" defer></script>
<script src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/library/lib-keyboard-shortcuts.js') : '/assets/js/library/lib-keyboard-shortcuts.js' ?>" defer></script>

<?php include ABSPATH . 'src/footer.php'; ?>
