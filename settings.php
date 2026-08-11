<?php
$pageTitle       = "Accessibility Settings - Hesten's Learning";
$pageDescription = "Customize your learning experience with advanced accessibility tools, fonts, and themes.";
include 'src/header.php';
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
                                <i class="fas fa-save"></i>
                            </div>
                            Data & Reset
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

            <!-- SECTION: DATA -->
            <section id="data" class="settings-section" style="animation-delay: 0.5s;">
                <h2 class="settings-section-title">
                    <i class="fas fa-save text-primary"></i> Data & Reset
                </h2>
                
                <div class="settings-actions-group">
                    <button onclick="localStorage.removeItem('hl_accessibility_settings'); window.location.reload();"
                        class="settings-btn settings-btn-reset">
                        <i class="fas fa-undo"></i> Reset to Defaults
                    </button>
                    <!-- Simulated Export feature -->
                    <button onclick="exportSettings()"
                        class="settings-btn settings-btn-export">
                        <i class="fas fa-download"></i> Export Settings
                    </button>
                </div>

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

<!-- Google API Scripts -->
<script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
<script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>

<script>
    // --- GOOGLE DRIVE SYNC LOGIC ---
    // IMPORTANT: Replace 'YOUR_GOOGLE_CLIENT_ID_HERE' with your actual Google Cloud Project Client ID for this to work natively!
    const CLIENT_ID = '988211241767-n13gda92d0t48la0ibou2jl5cir723nc.apps.googleusercontent.com'; 
    const DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];
    const SCOPES = 'https://www.googleapis.com/auth/drive.file'; // drive.file scope so users can actually see the file in their Drive

    let tokenClient;
    let gapiInited = false;
    let gisInited = false;

    function gapiLoaded() {
        gapi.load('client', initializeGapiClient);
    }

    async function initializeGapiClient() {
        await gapi.client.init({
            discoveryDocs: DISCOVERY_DOCS,
        });
        gapiInited = true;
        maybeEnableButtons();
    }

    function gisLoaded() {
        tokenClient = google.accounts.oauth2.initTokenClient({
            client_id: CLIENT_ID,
            scope: SCOPES,
            callback: '', // defined at request time
        });
        gisInited = true;
        maybeEnableButtons();
    }

    function maybeEnableButtons() {
        if (gapiInited && gisInited) {
            document.getElementById('gdrive-save-btn').disabled = false;
            document.getElementById('gdrive-load-btn').disabled = false;
        }
    }

    function getAllSiteData() {
        let data = {};
        for (let i = 0; i < localStorage.length; i++) {
            let key = localStorage.key(i);
            data[key] = localStorage.getItem(key);
        }
        return JSON.stringify(data);
    }

    function restoreSiteData(jsonString) {
        try {
            let data = typeof jsonString === 'string' ? JSON.parse(jsonString) : jsonString;
            for (let key in data) {
                localStorage.setItem(key, data[key]);
            }
            alert('Data restored successfully from Google Drive! The page will now reload.');
            window.location.reload();
        } catch (e) {
            alert('Error parsing site data from Drive.');
            console.error(e);
        }
    }

    async function saveToGoogleDrive() {
        if (CLIENT_ID === 'YOUR_GOOGLE_CLIENT_ID_HERE') {
            alert('Setup Required: Please edit settings.php and replace YOUR_GOOGLE_CLIENT_ID_HERE with a valid Google Client ID from the Google Cloud Console.');
            return;
        }
        
        tokenClient.callback = async (resp) => {
            if (resp.error !== undefined) {
                console.error(resp);
                return;
            }
            try {
                // Show loading state
                const saveBtn = document.getElementById('gdrive-save-btn');
                const originalText = saveBtn.innerHTML;
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
                saveBtn.disabled = true;

                let fileContent = getAllSiteData();
                const accessToken = gapi.client.getToken().access_token;

                // 1. Check if file already exists in user's drive
                const response = await gapi.client.drive.files.list({
                    fields: 'files(id, name)',
                    pageSize: 10,
                    q: "name='hestens_learning_data.json' and trashed=false"
                });
                const files = response.result.files;
                
                let fileId;

                if (files && files.length > 0) {
                    fileId = files[0].id;
                } else {
                    // 2. Create the file metadata first
                    const metaResponse = await fetch('https://www.googleapis.com/drive/v3/files', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer ' + accessToken,
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            name: 'hestens_learning_data.json'
                        })
                    });
                    const metaData = await metaResponse.json();
                    fileId = metaData.id;
                }

                // 3. Upload the content to the fileId
                await fetch('https://www.googleapis.com/upload/drive/v3/files/' + fileId + '?uploadType=media', {
                    method: 'PATCH',
                    headers: {
                        'Authorization': 'Bearer ' + accessToken,
                        'Content-Type': 'application/json'
                    },
                    body: fileContent
                });
                
                saveBtn.innerHTML = originalText;
                saveBtn.disabled = false;
                alert('Site data backed up to your Google Drive seamlessly! You should see hestens_learning_data.json in your Drive.');
            } catch (err) {
                alert('Error saving to Google Drive: ' + err.message);
                console.error(err);
                const saveBtn = document.getElementById('gdrive-save-btn');
                saveBtn.innerHTML = '<i class="fas fa-cloud-upload-alt"></i> Backup to Drive';
                saveBtn.disabled = false;
            }
        };

        if (gapi.client.getToken() === null) {
            tokenClient.requestAccessToken({prompt: 'consent'});
        } else {
            tokenClient.requestAccessToken({prompt: ''});
        }
    }

    async function loadFromGoogleDrive() {
        if (CLIENT_ID === 'YOUR_GOOGLE_CLIENT_ID_HERE') {
            alert('Setup Required: Please edit settings.php and replace YOUR_GOOGLE_CLIENT_ID_HERE with a valid Google Client ID from the Google Cloud Console.');
            return;
        }

        tokenClient.callback = async (resp) => {
            if (resp.error !== undefined) {
                console.error(resp);
                return;
            }
            try {
                // Show loading state
                const loadBtn = document.getElementById('gdrive-load-btn');
                const originalText = loadBtn.innerHTML;
                loadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                loadBtn.disabled = true;

                const response = await gapi.client.drive.files.list({
                    fields: 'files(id, name)',
                    pageSize: 10,
                    q: "name='hestens_learning_data.json' and trashed=false"
                });
                const files = response.result.files;
                
                if (files && files.length > 0) {
                    const fileResponse = await gapi.client.drive.files.get({
                        fileId: files[0].id,
                        alt: 'media'
                    });
                    restoreSiteData(fileResponse.body);
                } else {
                    alert('No saved data found in your Google Drive. Try backing it up first!');
                }
                loadBtn.innerHTML = originalText;
                loadBtn.disabled = false;
            } catch (err) {
                alert('Error loading from Google Drive: ' + err.message);
                console.error(err);
                const loadBtn = document.getElementById('gdrive-load-btn');
                loadBtn.innerHTML = '<i class="fas fa-cloud-download-alt"></i> Restore from Drive';
                loadBtn.disabled = false;
            }
        };

        if (gapi.client.getToken() === null) {
            tokenClient.requestAccessToken({prompt: 'consent'});
        } else {
            tokenClient.requestAccessToken({prompt: ''});
        }
    }

    // --- SETTINGS PAGE SYNC LOGIC ---

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
    }

    function exportSettings() {
        const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(loadSettings()));
        const downloadAnchorNode = document.createElement('a');
        downloadAnchorNode.setAttribute("href", dataStr);
        downloadAnchorNode.setAttribute("download", "hesten-settings.json");
        document.body.appendChild(downloadAnchorNode);
        downloadAnchorNode.click();
        downloadAnchorNode.remove();
        alert('Settings downloaded as hesten-settings.json');
    }

    // Initialize UI on Load
    document.addEventListener('DOMContentLoaded', () => {
        syncPageUI();

        // Listen for internal updates (from header a11y panel)
        window.addEventListener('settings-changed', (e) => {
            syncPageUI(e.detail);
        });
    });
</script>

<?php include 'src/footer.php'; ?>
