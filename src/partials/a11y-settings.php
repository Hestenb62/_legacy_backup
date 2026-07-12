    <div id="a11y-settings-panel" class="settings-panel">
        <div class="settings-header">
            <h2 class="settings-title">
                <i class="fas fa-sliders-h settings-title-icon"></i> Settings
            </h2>
            <button id="a11y-close-button" class="settings-close-btn">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="settings-content">
            <div class="settings-section">
                <h3 class="settings-section-title">Theme</h3>
                <div class="settings-theme-grid">
                    <button class="settings-theme-btn theme-light" onclick="updateGlobalSetting('theme', 'light')">Light</button>
                    <button class="settings-theme-btn theme-dark" onclick="updateGlobalSetting('theme', 'dark')">Dark</button>
                    <button class="settings-theme-btn theme-contrast" onclick="updateGlobalSetting('theme', 'high-contrast')">Contrast</button>
                    <button class="settings-theme-btn theme-sepia" onclick="updateGlobalSetting('theme', 'sepia')">Sepia</button>
                    <button class="settings-theme-btn theme-midnight" onclick="updateGlobalSetting('theme', 'midnight')">Midnight</button>
                </div>
            </div>
            
            <div class="settings-section">
                <h3 class="settings-section-title">Font</h3>
                <select id="panel-font" onchange="updateGlobalSetting('fontFamily', this.value)" class="settings-select">
                    <option value="Outfit">Outfit (Modern)</option>
                    <option value="Inter">Inter (Standard)</option>
                    <option value="Open Dyslexic">Open Dyslexic</option>
                    <option value="Lexend">Lexend</option>
                    <option value="Comic Neue">Comic Neue</option>
                    <option value="Comic Sans MS">Comic Sans MS</option>
                    <option value="Roboto Mono">Monospace</option>
                </select>
            </div>

            <div class="settings-section">
                <label class="settings-label">Text Size</label>
                <div class="settings-size-actions">
                    <button class="settings-action-btn" onclick="const s = document.getElementById('panel-size'); s.value = Math.max(0.8, parseFloat(s.value) - 0.1); updateGlobalSetting('fontSize', s.value)"><i class="fas fa-search-minus"></i> A-</button>
                    <button class="settings-action-btn" onclick="const s = document.getElementById('panel-size'); s.value = Math.min(2.0, parseFloat(s.value) + 0.1); updateGlobalSetting('fontSize', s.value)"><i class="fas fa-search-plus"></i> A+</button>
                </div>
                <input type="range" id="panel-size" class="settings-range" min="0.8" max="2.0" step="0.1" oninput="updateGlobalSetting('fontSize', this.value)">
            </div>

            <div class="settings-section">
                <label class="settings-label">Line Height</label>
                <input type="range" id="panel-line" class="settings-range" min="1.0" max="2.5" step="0.1" oninput="updateGlobalSetting('lineHeight', this.value)">
            </div>
            <div class="settings-section">
                <label class="settings-label">Letter Spacing</label>
                <input type="range" id="panel-letter-spacing" class="settings-range" min="-0.05" max="0.5" step="0.05" oninput="updateGlobalSetting('letterSpacing', this.value)">
            </div>
            <div class="settings-section">
                <label class="settings-label">Word Spacing</label>
                <input type="range" id="panel-word-spacing" class="settings-range" min="-0.1" max="1.0" step="0.1" oninput="updateGlobalSetting('wordSpacing', this.value)">
            </div>
            <div class="settings-section">
                <label class="settings-label">Saturation</label>
                <input type="range" id="panel-saturation" class="settings-range" min="0" max="200" step="10" oninput="updateGlobalSetting('saturation', this.value)">
            </div>
            <div class="settings-section">
                <label class="settings-label">Reading Mask Opacity</label>
                <input type="range" id="panel-mask-opacity" class="settings-range" min="0.1" max="0.95" step="0.05" oninput="updateGlobalSetting('maskOpacity', this.value)">
            </div>
            
            <div class="settings-section">
                <h3 class="settings-section-title">Color Overlay</h3>
                <select id="panel-color-overlay" onchange="updateGlobalSetting('colorOverlay', this.value)" class="settings-select">
                    <option value="none">None</option>
                    <option value="rgba(255, 255, 0, 0.15)">Pale Yellow</option>
                    <option value="rgba(173, 216, 230, 0.15)">Pale Blue</option>
                    <option value="rgba(144, 238, 144, 0.15)">Pale Green</option>
                    <option value="rgba(255, 182, 193, 0.15)">Pale Pink</option>
                    <option value="rgba(216, 191, 216, 0.15)">Pale Purple</option>
                </select>
            </div>
            
            <div class="settings-section">
                <h3 class="settings-section-title">Text Alignment</h3>
                <div class="settings-align-grid">
                    <button class="settings-action-btn" onclick="updateGlobalSetting('textAlign', 'left')"><i class="fas fa-align-left"></i></button>
                    <button class="settings-action-btn" onclick="updateGlobalSetting('textAlign', 'center')"><i class="fas fa-align-center"></i></button>
                    <button class="settings-action-btn" onclick="updateGlobalSetting('textAlign', 'justify')"><i class="fas fa-align-justify"></i></button>
                </div>
            </div>

            <div class="settings-toggles-container">
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Reading Mask</span>
                    <input type="checkbox" id="panel-mask" onchange="updateGlobalSetting('readingMask', this.checked)" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Large Cursor</span>
                    <input type="checkbox" id="panel-cursor" onchange="updateGlobalSetting('cursorSize', this.checked ? 'large' : 'normal')" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Hide Images</span>
                    <input type="checkbox" id="panel-images" onchange="updateGlobalSetting('hideImages', this.checked)" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Teacher Mode</span>
                    <input type="checkbox" id="panel-teacher" onchange="updateGlobalSetting('teacherMode', this.checked)" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Focus Mode</span>
                    <input type="checkbox" id="panel-focus" onchange="updateGlobalSetting('focusMode', this.checked)" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Highlight Links</span>
                    <input type="checkbox" id="panel-links" onchange="updateGlobalSetting('highlightLinks', this.checked)" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Highlight Headings</span>
                    <input type="checkbox" id="panel-headings" onchange="updateGlobalSetting('highlightHeadings', this.checked)" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Text to Speech</span>
                    <input type="checkbox" id="panel-tts" onchange="updateGlobalSetting('textToSpeech', this.checked)" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Show Permalinks</span>
                    <input type="checkbox" id="panel-permalinks" onchange="updateGlobalSetting('showPermalinks', this.checked)" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Stop Animations</span>
                    <input type="checkbox" id="panel-stop-animations" onchange="updateGlobalSetting('stopAnimations', this.checked)" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Spotlight Mode</span>
                    <input type="checkbox" id="panel-spotlight" onchange="updateGlobalSetting('spotlightMode', this.checked)" class="settings-checkbox">
                </label>
                <label class="settings-toggle-row">
                    <span class="settings-toggle-label">Acoustic Ticks</span>
                    <input type="checkbox" id="panel-ticks" onchange="updateGlobalSetting('acousticTicks', this.checked)" class="settings-checkbox">
                </label>
            </div>
            
            <button onclick="localStorage.removeItem('hl_accessibility_settings'); location.reload()" class="settings-reset-btn">Reset</button>
            <div class="settings-footer">
                <a href="/settings.php" class="settings-link">Full Settings Page</a>
            </div>
        </div>
    </div>
