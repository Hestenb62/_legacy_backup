<?php
$pageTitle       = "Accessibility Settings - Hesten's Learning";
$pageDescription = "Customize your learning experience with advanced accessibility tools, fonts, and themes.";
include '../src/header.php';
?>
<link rel="stylesheet" href="/assets/css/pages/settings.css">

<main id="main-content" class="page-content-wrapper settings-page py-12">

    <header class="settings-header">
        <h1 class="page-title">
            <i class="fas fa-sliders-h text-primary mr-3"></i> Accessibility & Preferences
        </h1>
        <p class="page-subtitle">
            Customize Hesten's Learning to match your unique needs. Your preferences are saved automatically.
        </p>
    </header>

    <div class="settings-layout">

        <!-- SETTINGS SIDEBAR (Navigation) -->
        <aside class="settings-sidebar" style="animation-delay: 0.1s;">
            <nav class="settings-nav-panel">
                <ul class="settings-nav-list">
                    <li>
                        <a href="#visuals" class="settings-nav-link">
                            <div class="settings-nav-icon settings-nav-icon-blue">
                                <i class="fas fa-eye"></i>
                            </div>
                            Visuals & Themes
                        </a>
                    </li>
                    <li>
                        <a href="#academic" class="settings-nav-link">
                            <div class="settings-nav-icon settings-nav-icon-emerald">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            Curriculum & Path
                        </a>
                    </li>
                    <li>
                        <a href="#typography" class="settings-nav-link">
                            <div class="settings-nav-icon settings-nav-icon-purple">
                                <i class="fas fa-font"></i>
                            </div>
                            Typography
                        </a>
                    </li>
                    <li>
                        <a href="#tools" class="settings-nav-link">
                            <div class="settings-nav-icon settings-nav-icon-teal">
                                <i class="fas fa-toolbox"></i>
                            </div>
                            Cognitive Tools
                        </a>
                    </li>
                    <li>
                        <a href="#data" class="settings-nav-link">
                            <div class="settings-nav-icon settings-nav-icon-rose">
                                <i class="fas fa-database"></i>
                            </div>
                            Data & Offline Storage
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- MAIN SETTINGS AREA -->
        <div class="settings-main-area">

            <!-- SECTION: VISUALS -->
            <section id="visuals" class="settings-section" style="animation-delay: 0.2s;">
                <h2 class="settings-section-title">
                    <i class="fas fa-eye text-primary"></i> Visuals & Themes
                </h2>

                <div class="mb-8">
                    <label class="settings-label">Color Theme</label>
                    <div class="settings-grid-3">
                        <button onclick="updateGlobalSetting('theme', 'light')" class="settings-card-btn theme-light-btn">
                            <i class="fas fa-sun"></i>
                            <span>Light</span>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'dark')" class="settings-card-btn theme-dark-btn">
                            <i class="fas fa-moon"></i>
                            <span>Dark</span>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'midnight')" class="settings-card-btn theme-midnight-btn">
                            <i class="fas fa-star"></i>
                            <span>Midnight</span>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'sepia')" class="settings-card-btn theme-sepia-btn">
                            <i class="fas fa-coffee"></i>
                            <span>Sepia</span>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'high-contrast')" class="settings-card-btn theme-contrast-btn">
                            <i class="fas fa-adjust"></i>
                            <span>Contrast</span>
                        </button>
                    </div>
                </div>

                <div class="settings-slider-panel">
                    <label for="saturation-slider" class="settings-slider-label">
                        <span>Color Saturation</span>
                        <span id="page-saturation-display" class="settings-slider-badge">100%</span>
                    </label>
                    <input type="range" id="saturation-slider" min="0" max="200" step="10"
                        class="settings-slider-input"
                        oninput="updateGlobalSetting('saturation', this.value); document.getElementById('page-saturation-display').innerText = this.value + '%'">
                    <div class="settings-slider-ticks">
                        <span>Grayscale (0%)</span>
                        <span>Normal</span>
                        <span>Vivid (200%)</span>
                    </div>
                </div>
            </section>

            <!-- SECTION: ACADEMIC & CURRICULUM -->
            <section id="academic" class="settings-section" style="animation-delay: 0.25s;">
                <h2 class="settings-section-title">
                    <i class="fas fa-graduation-cap text-primary"></i> Curriculum & Path
                </h2>

                <div class="mb-8">
                    <label class="settings-label">Active Curriculum</label>
                    <div class="settings-grid-3">
                        <button onclick="updateGlobalSetting('curriculum', 'engageny')" id="curriculum-engageny-btn" class="settings-curriculum-btn">
                            <div class="settings-curriculum-header">
                                <div class="settings-curriculum-icon curr-icon-indigo">
                                    <i class="fas fa-calculator"></i>
                                </div>
                                <span class="settings-curriculum-title">EngageNY / CC</span>
                            </div>
                            <p class="settings-curriculum-desc">Standard Common Core learning path focused on number structures and models.</p>
                        </button>

                        <button onclick="updateGlobalSetting('curriculum', 'teks')" id="curriculum-teks-btn" class="settings-curriculum-btn">
                            <div class="settings-curriculum-header">
                                <div class="settings-curriculum-icon curr-icon-rose">
                                    <i class="fas fa-star"></i>
                                </div>
                                <span class="settings-curriculum-title">Texas TEKS</span>
                            </div>
                            <p class="settings-curriculum-desc">Texas Essential Knowledge and Skills (TEKS) alignment and progression.</p>
                        </button>

                        <button onclick="updateGlobalSetting('curriculum', 'custom')" id="curriculum-custom-btn" class="settings-curriculum-btn">
                            <div class="settings-curriculum-header">
                                <div class="settings-curriculum-icon curr-icon-emerald">
                                    <i class="fas fa-gamepad"></i>
                                </div>
                                <span class="settings-curriculum-title">Hesten's Custom</span>
                            </div>
                            <p class="settings-curriculum-desc">A highly interactive, game-first path designed specifically for learning accessibility.</p>
                        </button>
                    </div>
                </div>
            </section>

            <!-- SECTION: TYPOGRAPHY -->
            <section id="typography" class="settings-section" style="animation-delay: 0.3s;">
                <h2 class="settings-section-title">
                    <i class="fas fa-font text-primary"></i> Typography
                </h2>

                <div class="mb-8">
                    <label class="settings-label">Typeface</label>
                    <div class="settings-grid-2">
                        <button onclick="updateGlobalSetting('fontFamily', 'Outfit')" class="settings-font-btn">
                            <span class="settings-font-name">Outfit</span>
                            <span class="settings-font-desc">Modern, clean, and friendly.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Inter')" class="settings-font-btn" style="font-family: 'Inter', sans-serif">
                            <span class="settings-font-name">Inter</span>
                            <span class="settings-font-desc">Standard geometric sans-serif.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Lexend')" class="settings-font-btn" style="font-family: 'Lexend', sans-serif">
                            <span class="settings-font-name">Lexend</span>
                            <span class="settings-font-desc">Proven to improve reading speed.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Open Dyslexic')" class="settings-font-btn" style="font-family: 'Open Dyslexic', sans-serif">
                            <span class="settings-font-name">Open Dyslexic</span>
                            <span class="settings-font-desc">Weighted bottoms for dyslexia.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Comic Neue')" class="settings-font-btn" style="font-family: 'Comic Neue', cursive">
                            <span class="settings-font-name">Comic Neue</span>
                            <span class="settings-font-desc">Playful and easy to read.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Roboto Mono')" class="settings-font-btn" style="font-family: 'Roboto Mono', monospace">
                            <span class="settings-font-name">Monospace</span>
                            <span class="settings-font-desc">Good for coding and differentiation.</span>
                        </button>
                    </div>
                </div>

                <div class="settings-grid-2-gap">
                    <div class="settings-slider-panel">
                        <label for="page-size-slider" class="settings-slider-label">Text Size</label>
                        <input type="range" id="page-size-slider" min="0.8" max="2.0" step="0.1"
                            class="settings-slider-input"
                            oninput="updateGlobalSetting('fontSize', this.value)">
                    </div>
                    <div class="settings-slider-panel">
                        <label for="page-line-slider" class="settings-slider-label">Line Height</label>
                        <input type="range" id="page-line-slider" min="1.0" max="2.5" step="0.1"
                            class="settings-slider-input"
                            oninput="updateGlobalSetting('lineHeight', this.value)">
                    </div>
                    <div class="settings-slider-panel">
                        <label for="page-letter-slider" class="settings-slider-label">Letter Spacing</label>
                        <input type="range" id="page-letter-slider" min="0" max="0.3" step="0.01"
                            class="settings-slider-input"
                            oninput="updateGlobalSetting('letterSpacing', this.value)">
                    </div>
                    <div class="settings-slider-panel">
                        <label for="page-word-slider" class="settings-slider-label">Word Spacing</label>
                        <input type="range" id="page-word-slider" min="0" max="0.5" step="0.05"
                            class="settings-slider-input"
                            oninput="updateGlobalSetting('wordSpacing', this.value)">
                    </div>
                </div>
            </section>

            <!-- SECTION: TOOLS -->
            <section id="tools" class="settings-section" style="animation-delay: 0.4s;">
                <h2 class="settings-section-title">
                    <i class="fas fa-toolbox text-primary"></i> Cognitive Tools
                </h2>

                <div class="flex flex-col gap-4">
                    <!-- Reading Guide -->
                    <div class="settings-toggle-card">
                        <div class="settings-toggle-info">
                            <div class="settings-toggle-icon icon-blue">
                                <i class="fas fa-align-justify"></i>
                            </div>
                            <div>
                                <span class="settings-toggle-title">Reading Guide</span>
                                <span class="settings-toggle-desc">A focus bar that follows your mouse.</span>
                            </div>
                        </div>
                        <label class="settings-switch">
                            <input type="checkbox" id="page-mask-toggle" class="settings-switch-input"
                                onchange="updateGlobalSetting('readingMask', this.checked)">
                            <div class="settings-switch-slider"></div>
                        </label>
                    </div>

                    <!-- Large Cursor -->
                    <div class="settings-toggle-card">
                        <div class="settings-toggle-info">
                            <div class="settings-toggle-icon icon-purple">
                                <i class="fas fa-mouse-pointer"></i>
                            </div>
                            <div>
                                <span class="settings-toggle-title">Extra Large Cursor</span>
                                <span class="settings-toggle-desc">Easier to track on screen.</span>
                            </div>
                        </div>
                        <label class="settings-switch">
                            <input type="checkbox" id="page-cursor-toggle" class="settings-switch-input"
                                onchange="updateGlobalSetting('cursorSize', this.checked ? 'large' : 'normal')">
                            <div class="settings-switch-slider"></div>
                        </label>
                    </div>

                    <!-- Hide Images -->
                    <div class="settings-toggle-card">
                        <div class="settings-toggle-info">
                            <div class="settings-toggle-icon icon-rose">
                                <i class="fas fa-image"></i>
                            </div>
                            <div>
                                <span class="settings-toggle-title">Hide Images</span>
                                <span class="settings-toggle-desc">Remove visual distractions.</span>
                            </div>
                        </div>
                        <label class="settings-switch">
                            <input type="checkbox" id="page-images-toggle" class="settings-switch-input"
                                onchange="updateGlobalSetting('hideImages', this.checked)">
                            <div class="settings-switch-slider"></div>
                        </label>
                    </div>
                    
                    <!-- Highlight Links -->
                    <div class="settings-toggle-card">
                        <div class="settings-toggle-info">
                            <div class="settings-toggle-icon icon-yellow">
                                <i class="fas fa-link"></i>
                            </div>
                            <div>
                                <span class="settings-toggle-title">Highlight Links</span>
                                <span class="settings-toggle-desc">Make links easier to spot.</span>
                            </div>
                        </div>
                        <label class="settings-switch">
                            <input type="checkbox" id="page-links-toggle" class="settings-switch-input"
                                onchange="updateGlobalSetting('highlightLinks', this.checked)">
                            <div class="settings-switch-slider"></div>
                        </label>
                    </div>

                    <!-- Highlight Headings -->
                    <div class="settings-toggle-card">
                        <div class="settings-toggle-info">
                            <div class="settings-toggle-icon icon-orange">
                                <i class="fas fa-heading"></i>
                            </div>
                            <div>
                                <span class="settings-toggle-title">Highlight Headings</span>
                                <span class="settings-toggle-desc">Emphasize structure.</span>
                            </div>
                        </div>
                        <label class="settings-switch">
                            <input type="checkbox" id="page-headings-toggle" class="settings-switch-input"
                                onchange="updateGlobalSetting('highlightHeadings', this.checked)">
                            <div class="settings-switch-slider"></div>
                        </label>
                    </div>

                    <!-- Text to Speech -->
                    <div class="settings-toggle-card">
                        <div class="settings-toggle-info">
                            <div class="settings-toggle-icon icon-green">
                                <i class="fas fa-volume-up"></i>
                            </div>
                            <div>
                                <span class="settings-toggle-title">Text to Speech</span>
                                <span class="settings-toggle-desc">Select text to read aloud.</span>
                            </div>
                        </div>
                        <label class="settings-switch">
                            <input type="checkbox" id="page-tts-toggle" class="settings-switch-input"
                                onchange="updateGlobalSetting('textToSpeech', this.checked)">
                            <div class="settings-switch-slider"></div>
                        </label>
                    </div>

                    <!-- Show Permalinks -->
                    <div class="settings-toggle-card">
                        <div class="settings-toggle-info">
                            <div class="settings-toggle-icon icon-indigo">
                                <i class="fas fa-link"></i>
                            </div>
                            <div>
                                <span class="settings-toggle-title">Show Permalinks</span>
                                <span class="settings-toggle-desc">Show links next to headings.</span>
                            </div>
                        </div>
                        <label class="settings-switch">
                            <input type="checkbox" id="page-permalinks-toggle" class="settings-switch-input"
                                onchange="updateGlobalSetting('showPermalinks', this.checked)">
                            <div class="settings-switch-slider"></div>
                        </label>
                    </div>
                </div>
            </section>

            <!-- SECTION: DATA & OFFLINE SOVEREIGNTY -->
            <section id="data" class="settings-section" style="animation-delay: 0.5s;">
                <h2 class="settings-section-title">
                    <i class="fas fa-database text-primary"></i> Data Sovereignty, Portability & Offline PWA
                </h2>
                
                <!-- 1. Student Portfolio Data Sovereignty Card -->
                <div class="settings-sovereignty-card mb-8">
                    <div class="sovereignty-card-header">
                        <div class="sovereignty-icon-wrap" style="background: rgba(99, 102, 241, 0.12); color: #6366f1;">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div>
                            <h3 class="sovereignty-card-title">Complete Student Portfolio Sovereignty</h3>
                            <p class="sovereignty-card-desc">
                                You own 100% of your student data. Export your entire academic profile, standard mastery benchmarks, completed achievements, homeschool accommodations, and teacher rosters as an open JSON archive. Restore or migrate to any device with zero server dependency.
                            </p>
                        </div>
                    </div>

                    <div class="settings-actions-group">
                        <button type="button" onclick="exportCompletePortfolio()" class="settings-btn settings-btn-export" style="background: linear-gradient(135deg, #4f46e5, #6366f1); color: #ffffff; border: none; font-weight: 700;">
                            <i class="fas fa-file-export"></i> Export Complete Portfolio (.json)
                        </button>
                        <button type="button" onclick="document.getElementById('import-portfolio-input').click()" class="settings-btn settings-btn-restore" style="border-color: #6366f1; color: #4f46e5; font-weight: 700;">
                            <i class="fas fa-file-import"></i> Restore Portfolio from File
                        </button>
                        <input type="file" id="import-portfolio-input" accept=".json,application/json" style="display: none;" onchange="handlePortfolioFileSelect(event)">
                        
                        <button type="button" onclick="exportAccommodationSheet()" class="settings-btn settings-btn-export" style="background: linear-gradient(135deg, #059669, #10b981); color: #ffffff; border: none; font-weight: 700;">
                            <i class="fas fa-file-medical-alt"></i> Export IEP / 504 Sheet
                        </button>
                        <button type="button" onclick="resetPlatformDefaults()" class="settings-btn settings-btn-reset">
                            <i class="fas fa-undo"></i> Reset Preferences
                        </button>
                    </div>

                    <!-- Import Confirmation Modal / Preview Info -->
                    <div id="portfolio-restore-preview" class="portfolio-restore-preview" style="display: none;">
                        <div class="restore-preview-header">
                            <i class="fas fa-check-circle" style="color: #10b981; font-size: 1.25rem;"></i>
                            <h4 id="restore-preview-title">Portfolio Archive Validated</h4>
                        </div>
                        <div class="restore-preview-meta" id="restore-preview-meta"></div>
                        <div class="restore-preview-actions">
                            <button type="button" id="btn-confirm-restore" onclick="applyPortfolioRestore()" class="settings-btn" style="background: #10b981; color: #ffffff; border: none; font-weight: 700;">
                                <i class="fas fa-sync-alt"></i> Merge & Restore All Data
                            </button>
                            <button type="button" onclick="cancelPortfolioRestore()" class="settings-btn" style="background: var(--color-bg-surface); color: var(--color-text-main); border: 1px solid var(--color-border);">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>

                <!-- 2. Offline PWA & Storage Quota Manager -->
                <div class="settings-storage-panel mb-8">
                    <div class="sovereignty-card-header">
                        <div class="sovereignty-icon-wrap" style="background: rgba(16, 185, 129, 0.12); color: #10b981;">
                            <i class="fas fa-hdd"></i>
                        </div>
                        <div>
                            <h3 class="sovereignty-card-title">Offline PWA Storage & Road Trip Pre-Caching</h3>
                            <p class="sovereignty-card-desc">
                                Monitor your local browser cache quota and pre-cache entire grade curriculum modules or digital library readers for flights, road trips, and rural areas without internet.
                            </p>
                        </div>
                    </div>

                    <!-- Live Storage Stats Grid -->
                    <div class="settings-storage-grid">
                        <div class="storage-stat-card">
                            <span class="storage-stat-label"><i class="fas fa-database"></i> Storage Used</span>
                            <span class="storage-stat-value" id="storage-stat-used">Calculating...</span>
                            <span class="storage-stat-sub" id="storage-stat-total">of browser quota</span>
                        </div>
                        <div class="storage-stat-card">
                            <span class="storage-stat-label"><i class="fas fa-copy"></i> Cached Files</span>
                            <span class="storage-stat-value" id="storage-stat-assets">--</span>
                            <span class="storage-stat-sub">across active caches</span>
                        </div>
                        <div class="storage-stat-card">
                            <span class="storage-stat-label"><i class="fas fa-bolt"></i> Offline Shell</span>
                            <span class="storage-stat-value" id="storage-stat-sw" style="color: #10b981;">Active</span>
                            <span class="storage-stat-sub">Service worker ready</span>
                        </div>
                        <div class="storage-stat-card">
                            <span class="storage-stat-label"><i class="fas fa-book"></i> Literature Books</span>
                            <span class="storage-stat-value" id="storage-stat-books">5 Available</span>
                            <span class="storage-stat-sub">Frankenstein, 1984, etc.</span>
                        </div>
                    </div>

                    <!-- Visual Storage Meter Bar -->
                    <div class="storage-meter-wrapper mt-4">
                        <div class="storage-meter-label-row">
                            <span>Browser Quota Allocation</span>
                            <span id="storage-meter-pct">0%</span>
                        </div>
                        <div class="storage-meter-track">
                            <div class="storage-meter-fill" id="storage-meter-fill" style="width: 2%;"></div>
                        </div>
                    </div>

                    <!-- Pre-Cache Curriculum Suite -->
                    <div class="precache-suite-box mt-6">
                        <h4 class="precache-title">
                            <i class="fas fa-cloud-download-alt text-indigo-600"></i> Pre-Cache Curriculum Package for Road Trips
                        </h4>
                        <p class="precache-desc">
                            Select a grade level to download all core HTML shells, CSS stylesheets, and diagnostic assessment assets directly into your browser's persistent cache:
                        </p>
                        <div class="precache-controls-row">
                            <select id="precache-target-select" class="settings-dropdown" style="max-width: 320px; padding: 0.65rem 1rem; border-radius: 0.75rem; border: 1px solid var(--color-border); font-weight: 600; background: var(--color-bg-base); color: var(--color-text-main);">
                                <option value="k">Level K (Kindergarten & Grade 9 Math/ELA)</option>
                                <option value="a">Level A (Grade 1 Foundations)</option>
                                <option value="b">Level B (Grade 2 Math & Reading)</option>
                                <option value="c">Level C (Grade 3 Spiral Curriculum)</option>
                                <option value="d">Level D (Grade 4 Core Mastery)</option>
                                <option value="e">Level E (Grade 5 Advanced Concepts)</option>
                                <option value="library">Digital Library Classics (All 5 Readers)</option>
                                <option value="stem">Interactive STEM & Chemistry Labs</option>
                            </select>
                            <button type="button" id="btn-precache-now" onclick="startCurriculumPreCache()" class="settings-btn" style="background: var(--color-primary); color: #ffffff; border: none; font-weight: 700;">
                                <i class="fas fa-download"></i> Pre-Cache for Road Trip
                            </button>
                            <button type="button" onclick="purgeOfflineCaches()" class="settings-btn" style="background: rgba(239, 68, 68, 0.1); color: #ef4444; border: 1px solid rgba(239, 68, 68, 0.3); font-weight: 700;" title="Purge Cache Storage without losing student progress">
                                <i class="fas fa-trash-alt"></i> Purge Offline Cache
                            </button>
                        </div>

                        <!-- Pre-cache animated progress bar -->
                        <div id="precache-progress-box" class="precache-progress-box" style="display: none; margin-top: 1rem;">
                            <div class="precache-progress-status">
                                <span id="precache-progress-label"><i class="fas fa-spinner fa-spin"></i> Caching assets...</span>
                                <span id="precache-progress-count">0%</span>
                            </div>
                            <div class="precache-progress-track">
                                <div id="precache-progress-fill" class="precache-progress-fill" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- 3. Google Drive Cloud Sync -->
                <div class="settings-sync-container">
                    <h3 class="settings-sync-title">
                        <i class="fab fa-google-drive" style="color: #1FA463; margin-right: 0.75rem;"></i> Google Drive Cloud Sync
                    </h3>
                    <p class="settings-sync-desc">
                        Take full control of your data. Connect your Google account to securely backup and sync all your 
                        site data directly to your own personal Google Drive, keeping it completely private from our servers.
                    </p>
                    <div class="settings-actions-group">
                        <button id="gdrive-save-btn" onclick="saveToGoogleDrive()" disabled
                            class="settings-btn settings-btn-backup">
                            <i class="fas fa-cloud-upload-alt"></i> Backup to Drive
                        </button>
                        <button id="gdrive-load-btn" onclick="loadFromGoogleDrive()" disabled
                            class="settings-btn settings-btn-restore">
                            <i class="fas fa-cloud-download-alt"></i> Restore from Drive
                        </button>
                    </div>
                    <div class="mt-4" style="display: flex; align-items: center; justify-content: space-between; padding: 1rem; background: var(--color-bg-surface); border: 1px solid var(--color-border); border-radius: var(--radius-lg); box-shadow: var(--shadow-sm);">
                        <div>
                            <div style="display: flex; align-items: center; gap: 0.5rem; margin-bottom: 0.25rem;">
                                <span class="settings-toggle-title" style="margin-bottom: 0;">Auto-Sync to Google Drive</span>
                                <span id="gdrive-sync-status" class="sync-status-badge disabled">Checking...</span>
                            </div>
                            <span class="settings-toggle-desc">Automatically backup changes in the background when settings or progress change.</span>
                        </div>
                        <label class="settings-switch">
                            <input type="checkbox" id="gdrive-autosync-toggle" class="settings-switch-input"
                                onchange="toggleAutoSync(this.checked)">
                            <div class="settings-switch-slider"></div>
                        </label>
                    </div>
                </div>
            </section>

        </div>

        <!-- LIVE PREVIEW SIDEBAR (Desktop) -->
        <aside class="settings-preview-sidebar" style="animation-delay: 0.6s;">
            <div class="settings-sticky-wrapper">
                <div class="settings-preview-card">
                    <h3 class="settings-preview-label">Live Preview</h3>
                    <div class="settings-preview-content">
                        <h4 class="settings-preview-heading">Alligators and crocodiles are distinct.</h4>
                        <p class="settings-preview-body">
                            This text demonstrates your current typography settings. Notice how the spacing, font
                            weight, and size change to help you read better.
                        </p>
                        <div class="settings-preview-link-box">
                            <a href="#" class="settings-preview-link">
                                <i class="fas fa-link"></i> Sample Link
                            </a>
                        </div>
                    </div>
                </div>
                <div class="settings-preview-status">
                    <i class="fas fa-check-circle"></i> Changes saved automatically
                </div>
            </div>
        </aside>
    </div>

</main>

<script>    // --- SETTINGS PAGE SYNC LOGIC ---

    function syncPageUI(s) {
        if (!s) s = loadSettings(); // Default to global load if not provided

        // Sliders
        if (document.getElementById('saturation-slider')) {
            document.getElementById('saturation-slider').value = s.saturation || 100;
            document.getElementById('page-saturation-display').innerText = (s.saturation || 100) + '%';
        }
        if (document.getElementById('page-size-slider')) document.getElementById('page-size-slider').value = s.fontSize;
        if (document.getElementById('page-line-slider')) document.getElementById('page-line-slider').value = s.lineHeight;
        if (document.getElementById('page-letter-slider')) document.getElementById('page-letter-slider').value = s.letterSpacing || 0;
        if (document.getElementById('page-word-slider')) document.getElementById('page-word-slider').value = s.wordSpacing || 0;

        // Toggles
        if (document.getElementById('page-mask-toggle')) document.getElementById('page-mask-toggle').checked = !!s.readingMask;
        if (document.getElementById('page-cursor-toggle')) document.getElementById('page-cursor-toggle').checked = (s.cursorSize === 'large');
        if (document.getElementById('page-images-toggle')) document.getElementById('page-images-toggle').checked = !!s.hideImages;
        if (document.getElementById('page-links-toggle')) document.getElementById('page-links-toggle').checked = !!s.highlightLinks;
        if (document.getElementById('page-headings-toggle')) document.getElementById('page-headings-toggle').checked = !!s.highlightHeadings;
        if (document.getElementById('page-tts-toggle')) document.getElementById('page-tts-toggle').checked = !!s.textToSpeech;
        if (document.getElementById('page-permalinks-toggle')) document.getElementById('page-permalinks-toggle').checked = !!s.showPermalinks;

        // Theme Selection UI Sync
        const activeTheme = s.theme || 'light';
        const themeMap = {
            'light': 'light',
            'dark': 'dark',
            'midnight': 'midnight',
            'sepia': 'sepia',
            'high-contrast': 'contrast'
        };
        Object.keys(themeMap).forEach(themeKey => {
            const btn = document.querySelector(`.theme-${themeMap[themeKey]}-btn`);
            if (btn) {
                btn.setAttribute('aria-selected', themeKey === activeTheme ? 'true' : 'false');
            }
        });

        // Font Selection UI Sync
        const activeFont = s.fontFamily || 'Outfit';
        document.querySelectorAll('.settings-font-btn').forEach(btn => {
            const onclickAttr = btn.getAttribute('onclick');
            if (onclickAttr && onclickAttr.includes(activeFont)) {
                btn.setAttribute('aria-selected', 'true');
            } else {
                btn.setAttribute('aria-selected', 'false');
            }
        });

        // Curriculum Selection UI Sync
        const activeCurriculum = s.curriculum || 'engageny';
        ['engageny', 'teks', 'custom'].forEach(c => {
            const btn = document.getElementById(`curriculum-${c}-btn`);
            if (btn) {
                btn.setAttribute('aria-selected', c === activeCurriculum ? 'true' : 'false');
            }
        });

        // Sync Auto-Sync Toggle
        if (document.getElementById('gdrive-autosync-toggle')) {
            document.getElementById('gdrive-autosync-toggle').checked = localStorage.getItem('auto_sync_gdrive') === 'true';
        }
    }

    // --- PORTFOLIO DATA SOVEREIGNTY SUITE ---
    function exportCompletePortfolio() {
        let profile = { firstName: 'Student', lastName: '' };
        try {
            const rawProfile = localStorage.getItem('hesten-user-profile');
            if (rawProfile) profile = { ...profile, ...JSON.parse(rawProfile) };
        } catch (e) {}
        const studentName = (profile.firstName + ' ' + (profile.lastName || '')).trim() || 'Student';

        // Collect all localStorage data
        const localData = {};
        for (let i = 0; i < localStorage.length; i++) {
            const k = localStorage.key(i);
            if (k) localData[k] = localStorage.getItem(k);
        }

        const payload = {
            meta: {
                platform: "Hesten's Learning Platform",
                version: "2.0",
                exportedAt: new Date().toISOString(),
                student: studentName,
                totalKeys: Object.keys(localData).length
            },
            data: localData
        };

        const dateStr = new Date().toISOString().slice(0, 10);
        const filename = `hestens_learning_portfolio_${studentName.toLowerCase().replace(/[^a-z0-9]/g, '_')}_${dateStr}.json`;
        const blob = new Blob([JSON.stringify(payload, null, 2)], { type: 'application/json;charset=utf-8;' });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
        URL.revokeObjectURL(url);

        alert(`Complete student portfolio exported successfully (${Object.keys(localData).length} learning records saved)!`);
    }

    function handlePortfolioFileSelect(event) {
        const file = event.target.files && event.target.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function(e) {
            try {
                const parsed = JSON.parse(e.target.result);
                let recordsData = null;
                let studentName = 'Student';
                let exportDate = 'Unknown Date';
                let totalRecords = 0;

                if (parsed.meta && parsed.data) {
                    recordsData = parsed.data;
                    studentName = parsed.meta.student || 'Student';
                    exportDate = parsed.meta.exportedAt ? new Date(parsed.meta.exportedAt).toLocaleDateString() : 'Recent';
                    totalRecords = Object.keys(recordsData).length;
                } else if (typeof parsed === 'object') {
                    recordsData = parsed;
                    totalRecords = Object.keys(parsed).length;
                }

                if (!recordsData || totalRecords === 0) {
                    alert('Invalid portfolio file: No valid student records found.');
                    return;
                }

                window.__pendingPortfolioData = recordsData;

                const previewEl = document.getElementById('portfolio-restore-preview');
                const metaEl = document.getElementById('restore-preview-meta');
                if (previewEl && metaEl) {
                    metaEl.innerHTML = `
                        <span><i class="fas fa-user-graduate"></i> Learner: ${escapeHtmlSetting(studentName)}</span>
                        <span><i class="fas fa-calendar-alt"></i> Backup Date: ${escapeHtmlSetting(exportDate)}</span>
                        <span><i class="fas fa-layer-group"></i> ${totalRecords} Records</span>
                        <span><i class="fas fa-check"></i> Verified Integrity</span>
                    `;
                    previewEl.style.display = 'block';
                    previewEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            } catch (err) {
                alert('Error parsing portfolio file: Ensure it is a valid .json export.');
                console.error(err);
            }
        };
        reader.readAsText(file);
    }

    function applyPortfolioRestore() {
        if (!window.__pendingPortfolioData) return;
        const records = window.__pendingPortfolioData;
        const count = Object.keys(records).length;

        for (const k in records) {
            try {
                localStorage.setItem(k, records[k]);
            } catch (e) {}
        }

        window.__pendingPortfolioData = null;
        alert(`Successfully restored and merged ${count} student portfolio records!`);
        window.dispatchEvent(new CustomEvent('settings-changed', { detail: loadSettings() }));
        window.dispatchEvent(new CustomEvent('hl:profile-updated'));
        window.location.reload();
    }

    function cancelPortfolioRestore() {
        window.__pendingPortfolioData = null;
        const previewEl = document.getElementById('portfolio-restore-preview');
        if (previewEl) previewEl.style.display = 'none';
        const fileInput = document.getElementById('import-portfolio-input');
        if (fileInput) fileInput.value = '';
    }

    function resetPlatformDefaults() {
        if (confirm('Reset your local accessibility and display preferences to default? Your student learning progress and high scores will be preserved.')) {
            localStorage.removeItem('hl_accessibility_settings');
            window.location.reload();
        }
    }

    function escapeHtmlSetting(str) {
        if (!str) return '';
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }

    // --- OFFLINE PWA STORAGE QUOTA INSPECTOR ---
    async function inspectStorageQuota() {
        // 1. Quota estimation
        if (navigator.storage && navigator.storage.estimate) {
            try {
                const est = await navigator.storage.estimate();
                const usedMB = (est.usage / (1024 * 1024)).toFixed(1);
                const totalGB = (est.quota / (1024 * 1024 * 1024)).toFixed(1);
                const pct = est.quota ? Math.min(100, Math.max(1, Math.round((est.usage / est.quota) * 100))) : 1;

                const usedEl = document.getElementById('storage-stat-used');
                const totalEl = document.getElementById('storage-stat-total');
                const pctEl = document.getElementById('storage-meter-pct');
                const fillEl = document.getElementById('storage-meter-fill');

                if (usedEl) usedEl.textContent = `${usedMB} MB`;
                if (totalEl) totalEl.textContent = `of ${totalGB} GB browser quota`;
                if (pctEl) pctEl.textContent = `${pct}%`;
                if (fillEl) fillEl.style.width = `${pct}%`;
            } catch (e) {}
        }

        // 2. Cache inspection
        if (window.caches) {
            try {
                const keys = await caches.keys();
                let totalItems = 0;
                for (const k of keys) {
                    const cache = await caches.open(k);
                    const requests = await cache.keys();
                    totalItems += requests.length;
                }
                const assetsEl = document.getElementById('storage-stat-assets');
                if (assetsEl) assetsEl.textContent = `${totalItems} files`;
            } catch (e) {}
        }
    }

    // --- CURRICULUM PRE-CACHE ENGINE ---
    async function startCurriculumPreCache() {
        const select = document.getElementById('precache-target-select');
        const target = select ? select.value : 'k';
        const progressBox = document.getElementById('precache-progress-box');
        const labelEl = document.getElementById('precache-progress-label');
        const countEl = document.getElementById('precache-progress-count');
        const fillEl = document.getElementById('precache-progress-fill');
        const btn = document.getElementById('btn-precache-now');

        if (!window.caches) {
            alert('CacheStorage is not supported in this browser environment.');
            return;
        }

        if (btn) btn.disabled = true;
        if (progressBox) progressBox.style.display = 'block';

        // Map targets to essential URLs
        const targetManifests = {
            'k': ['/levels/k.php', '/levels/k-math.php', '/levels/k-ela.php', '/assets/css/global-tokens.css', '/assets/css/global-components.css', '/offline.php'],
            'a': ['/levels/a.php', '/levels/a-math.php', '/levels/a-ela.php', '/assets/css/global-tokens.css', '/assets/css/global-components.css', '/offline.php'],
            'b': ['/levels/b.php', '/levels/b-math.php', '/levels/b-ela.php', '/assets/css/global-tokens.css', '/assets/css/global-components.css', '/offline.php'],
            'c': ['/levels/c.php', '/levels/c-math.php', '/levels/c-ela.php', '/assets/css/global-tokens.css', '/assets/css/global-components.css', '/offline.php'],
            'd': ['/levels/d.php', '/levels/d-math.php', '/levels/d-ela.php', '/assets/css/global-tokens.css', '/assets/css/global-components.css', '/offline.php'],
            'e': ['/levels/e.php', '/levels/e-math.php', '/levels/e-ela.php', '/assets/css/global-tokens.css', '/assets/css/global-components.css', '/offline.php'],
            'library': ['/library/', '/library/read/frankenstein/', '/library/read/1984/', '/library/read/usa-constitution/', '/library/read/federalist-papers/', '/library/read/american-yawp/'],
            'stem': ['/student/interactive-labs.php', '/student/periodic-table.php', '/student/', '/assets/css/global-components.css']
        };

        const urlsToCache = targetManifests[target] || targetManifests['k'];
        const cacheName = 'hl-curriculum-offline-cache';

        try {
            const cache = await caches.open(cacheName);
            let done = 0;

            for (const url of urlsToCache) {
                if (labelEl) labelEl.innerHTML = `<i class="fas fa-spinner fa-spin"></i> Caching: ${url.slice(0, 30)}...`;
                try {
                    const resp = await fetch(url, { cache: 'reload' });
                    if (resp && resp.ok) {
                        await cache.put(url, resp);
                    }
                } catch (fetchErr) {
                    console.warn('Precache skip on fetch err:', url);
                }
                done++;
                const pct = Math.round((done / urlsToCache.length) * 100);
                if (countEl) countEl.textContent = `${pct}%`;
                if (fillEl) fillEl.style.width = `${pct}%`;
            }

            if (labelEl) labelEl.innerHTML = '<i class="fas fa-check-circle text-emerald-500"></i> Curriculum pre-cached successfully!';
            setTimeout(() => {
                if (btn) btn.disabled = false;
                inspectStorageQuota();
            }, 1200);
            alert(`Curriculum package for ${target.toUpperCase()} pre-cached for offline road trips!`);
        } catch (err) {
            console.error('Pre-cache error:', err);
            if (labelEl) labelEl.textContent = 'Pre-caching encountered an error.';
            if (btn) btn.disabled = false;
        }
    }

    async function purgeOfflineCaches() {
        if (!window.caches) return;
        if (confirm('Purge offline cached curriculum and book files? This frees disk space without deleting any of your saved progress or settings.')) {
            try {
                const keys = await caches.keys();
                for (const k of keys) {
                    await caches.delete(k);
                }
                alert('Offline cache purged successfully.');
                inspectStorageQuota();
            } catch (e) {
                console.error('Purge error:', e);
            }
        }
    }

    function exportAccommodationSheet() {
        const s = window.currentSettings || {};
        let profile = { firstName: 'Student', lastName: '' };
        try {
            const rawProfile = localStorage.getItem('hesten-user-profile');
            if (rawProfile) profile = { ...profile, ...JSON.parse(rawProfile) };
        } catch (e) {}

        const studentName = (profile.firstName + ' ' + (profile.lastName || '')).trim() || 'Student';
        const dateStr = new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

        const html = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>IEP & 504 Accommodation Profile - ${studentName}</title>
    <style>
        @page { size: letter; margin: 0.75in; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            color: #1e293b;
            line-height: 1.5;
            background: #ffffff;
            margin: 0;
            padding: 24px;
        }
        .header {
            border-bottom: 3px solid #4f46e5;
            padding-bottom: 16px;
            margin-bottom: 24px;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .title { font-size: 24px; font-weight: 800; color: #0f172a; margin: 0 0 4px; }
        .subtitle { font-size: 14px; color: #64748b; margin: 0; }
        .badge {
            display: inline-block;
            background: #eef2ff;
            color: #4338ca;
            padding: 6px 12px;
            border-radius: 9999px;
            font-weight: 700;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .student-info {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
        }
        .info-item { display: flex; flex-direction: column; }
        .info-label { font-size: 11px; font-weight: 700; text-transform: uppercase; color: #64748b; }
        .info-value { font-size: 15px; font-weight: 600; color: #0f172a; }
        .section-heading {
            font-size: 16px;
            font-weight: 700;
            color: #1e293b;
            border-bottom: 1px solid #e2e8f0;
            padding-bottom: 6px;
            margin-top: 20px;
            margin-bottom: 12px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 16px;
        }
        .table th, .table td {
            text-align: left;
            padding: 8px 12px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 13px;
        }
        .table th {
            background: #f1f5f9;
            font-weight: 700;
            color: #334155;
        }
        .tag-active {
            color: #047857;
            background: #ecfdf5;
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 700;
            font-size: 11px;
            display: inline-block;
        }
        .tag-inactive {
            color: #64748b;
            font-size: 11px;
        }
        .footer {
            margin-top: 32px;
            padding-top: 16px;
            border-top: 1px solid #e2e8f0;
            font-size: 11px;
            color: #94a3b8;
            display: flex;
            justify-content: space-between;
        }
        @media print {
            .no-print { display: none !important; }
            body { padding: 0; }
        }
    </style>
</head>
<body>
    <div class="no-print" style="margin-bottom: 16px; text-align: right;">
        <button onclick="window.print()" style="background: #4f46e5; color: #fff; border: none; padding: 10px 20px; border-radius: 6px; font-weight: 700; cursor: pointer;">
            Print / Save to PDF
        </button>
    </div>

    <div class="header">
        <div>
            <h1 class="title">Digital Accessibility & Learning Accommodations</h1>
            <p class="subtitle">Individualized Education Program (IEP) & Section 504 Recommendation Profile</p>
        </div>
        <div class="badge">Hesten's Learning</div>
    </div>

    <div class="student-info">
        <div class="info-item">
            <span class="info-label">Learner</span>
            <span class="info-value">${studentName}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Date Generated</span>
            <span class="info-value">${dateStr}</span>
        </div>
        <div class="info-item">
            <span class="info-label">Curriculum Track</span>
            <span class="info-value">${(s.curriculum || 'EngageNY').toUpperCase()}</span>
        </div>
    </div>

    <h2 class="section-heading">1. Visual & Cognitive Presentation Accommodations</h2>
    <table class="table">
        <thead>
            <tr><th>Accommodation Feature</th><th>Target Value / Setting</th><th>Classroom / Device Recommendation</th></tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Dyslexic / Accessible Font</strong></td>
                <td>${s.fontFamily || 'Outfit'}</td>
                <td>Ensure high letter-differentiation font is configured on student reading terminals.</td>
            </tr>
            <tr>
                <td><strong>Font Size & Scale</strong></td>
                <td>${s.fontSize || 1.0}x Scale (${Math.round((s.fontSize || 1.0) * 16)}px base)</td>
                <td>Provide magnified test prints or enable 125%+ browser display zoom.</td>
            </tr>
            <tr>
                <td><strong>Line & Word Spacing</strong></td>
                <td>Line: ${s.lineHeight || 1.6}, Word: +${s.wordSpacing || 0}em</td>
                <td>Use increased line and character leading to prevent visual crowding.</td>
            </tr>
            <tr>
                <td><strong>Theme & Contrast</strong></td>
                <td>${(s.theme || 'light').toUpperCase()}</td>
                <td>${s.theme === 'sepia' ? 'Warm tint reduces glare (Irlen sensitivity).' : (s.theme === 'high-contrast' ? 'Maximum contrast for low-vision clarity.' : 'Standard light/dark accommodation.')}</td>
            </tr>
        </tbody>
    </table>

    <h2 class="section-heading">2. Focus & Attention Assistance (ADHD / Executive Function)</h2>
    <table class="table">
        <thead>
            <tr><th>Assistive Tool</th><th>Status</th><th>Recommended Classroom Application</th></tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Reading Mask / Line Tracker</strong></td>
                <td>${s.readingMask ? '<span class="tag-active">ACTIVE (' + Math.round((s.maskOpacity || 0.7) * 100) + '% Shading)</span>' : '<span class="tag-inactive">Not Active</span>'}</td>
                <td>Provide physical reading ruler or digital cursor tracking guide during testing.</td>
            </tr>
            <tr>
                <td><strong>Spotlight Focus Mode</strong></td>
                <td>${s.spotlightMode ? '<span class="tag-active">ACTIVE</span>' : '<span class="tag-inactive">Not Active</span>'}</td>
                <td>Block peripheral page clutter and isolate one exercise item at a time.</td>
            </tr>
            <tr>
                <td><strong>Distraction Reduction (Hide Images)</strong></td>
                <td>${s.hideImages ? '<span class="tag-active">ACTIVE</span>' : '<span class="tag-inactive">Not Active</span>'}</td>
                <td>Provide text-first worksheets without non-essential decorative graphics.</td>
            </tr>
            <tr>
                <td><strong>Vestibular Support (Reduced Motion)</strong></td>
                <td>${s.stopAnimations ? '<span class="tag-active">ACTIVE</span>' : '<span class="tag-inactive">Not Active</span>'}</td>
                <td>Disable auto-playing UI transitions and flashing graphic stimuli.</td>
            </tr>
        </tbody>
    </table>

    <h2 class="section-heading">3. Auditory & Sensory Supports</h2>
    <table class="table">
        <thead>
            <tr><th>Support Tool</th><th>Status</th><th>Notes</th></tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Text-to-Speech (TTS)</strong></td>
                <td>${s.textToSpeech ? '<span class="tag-active">ACTIVE</span>' : '<span class="tag-inactive">Standard</span>'}</td>
                <td>Permit audio read-aloud headset support during independent reading & exams.</td>
            </tr>
            <tr>
                <td><strong>Acoustic Audio Ticks</strong></td>
                <td>${s.acousticTicks ? '<span class="tag-active">ACTIVE</span>' : '<span class="tag-inactive">Standard</span>'}</td>
                <td>Auditory confirmation for button activations and navigation events.</td>
            </tr>
            <tr>
                <td><strong>Large Cursor Tracking</strong></td>
                <td>${s.cursorSize === 'large' ? '<span class="tag-active">LARGE</span>' : '<span class="tag-inactive">Standard</span>'}</td>
                <td>Enlarged high-visibility pointer for motor coordination tracking.</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <span>Prepared via Hesten\\'s Learning Platform Accessibility Engine</span>
        <span>Valid for educational accommodation discussions under IDEA / Section 504</span>
    </div>
</body>
</html>`;

        const printWindow = window.open('', '_blank');
        if (printWindow) {
            printWindow.document.write(html);
            printWindow.document.close();
        } else {
            const blob = new Blob([html], { type: 'text/html;charset=utf-8' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `IEP_Accommodation_Profile_${studentName.replace(/\\s+/g, '_')}.html`;
            document.body.appendChild(a);
            a.click();
            a.remove();
            URL.revokeObjectURL(url);
        }
    }

    // Initialize UI on Load
    document.addEventListener('DOMContentLoaded', () => {
        syncPageUI();
        inspectStorageQuota();

        // Listen for internal updates (from header a11y panel)
        window.addEventListener('settings-changed', (e) => {
            syncPageUI(e.detail);
        });
    });
</script>

<?php include '../src/footer.php'; ?>
