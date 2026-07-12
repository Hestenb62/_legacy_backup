/**
 * Hesten's Learning - Accessibility & Global Settings
 * Consolidates all A11y features into one standardized controller.
 */

const STORAGE_KEY = 'hl_accessibility_settings';

const defaultSettings = {
    theme: 'light',
    fontSize: 1.0,
    lineHeight: 1.6,
    fontFamily: 'Outfit',
    letterSpacing: 0,
    wordSpacing: 0,
    saturation: 100,
    readingMask: false,
    maskOpacity: 0.7,
    cursorSize: 'normal',
    hideImages: false,
    focusMode: false,
    teacherMode: false,
    highlightLinks: false,
    highlightHeadings: false,
    textToSpeech: false, // NEW: TTS Toggle
    textAlign: 'left',
    stopAnimations: false,
    showPermalinks: false,
    spotlightMode: false, // NEW
    acousticTicks: false, // NEW
    curriculum: 'engageny' // NEW: Curriculum Selection Toggle
};

let currentSettings = defaultSettings;
let speechUtterance = null; // For TTS

(function init() {
    try {
        const stored = localStorage.getItem(STORAGE_KEY);
        if (stored) currentSettings = {
            ...defaultSettings,
            ...JSON.parse(stored)
        };
        // Expose settings to window
        window.currentSettings = currentSettings;

        // Init toolbar immediately
        initSelectionToolbar();
    } catch (e) {
        console.warn('LocalStorage access denied', e);
    }
})();

// Define functions globally
function updateGlobalSetting(key, value) {
    currentSettings[key] = value;
    window.currentSettings = currentSettings;
    saveSettingsInternal();
    applySettings(currentSettings);
    
    // Play toggle sound if acoustic ticks are active
    if (currentSettings.acousticTicks) {
        playA11yTick('toggle');
    }
}

function saveSettingsInternal() {
    try {
        localStorage.setItem(STORAGE_KEY, JSON.stringify(currentSettings));
        window.dispatchEvent(new CustomEvent('settings-changed', {
            detail: currentSettings
        }));
    } catch (e) {
        console.warn('Could not save settings', e);
    }
}

function applySettings(s) {
    if (!s) s = defaultSettings;
    const r = document.documentElement;
    const b = document.body;

    // --- CSS Variables ---
    b.style.setProperty('--site-font-size', `${s.fontSize}rem`);
    b.style.setProperty('--site-line-height', s.lineHeight);
    b.style.setProperty('--site-letter-spacing', `${s.letterSpacing}em`);
    b.style.setProperty('--site-word-spacing', `${s.wordSpacing}em`);

    // Font family mapped to Tailwind classes
    const fontClassMap = {
        'Outfit': 'font-outfit',
        'Inter': 'font-inter',
        'Open Dyslexic': 'font-dyslexic',
        'Lexend': 'font-lexend',
        'Comic Neue': 'font-comicneue',
        'Comic Sans MS': 'font-comicsans',
        'Roboto Mono': 'font-mono'
    };
    
    const allFontClasses = ['font-outfit', 'font-inter', 'font-dyslexic', 'font-lexend', 'font-comicneue', 'font-comicsans', 'font-mono', 'font-sans'];
    b.classList.remove(...allFontClasses);
    r.classList.remove(...allFontClasses);

    const fontClass = fontClassMap[s.fontFamily] || 'font-sans';
    b.classList.add(fontClass);
    r.classList.add(fontClass);

    // Saturation
    r.style.filter = `saturate(${s.saturation}%)`;

    // --- Themes ---
    const themes = ['light', 'dark', 'high-contrast', 'sepia', 'midnight'];
    r.classList.remove(...themes);
    b.classList.remove(...themes);
    r.classList.add(s.theme);
    b.classList.add(s.theme);

    // --- Toggles ---
    const toggleClass = (el, cls, cond) => {
        if (cond) el.classList.add(cls);
        else el.classList.remove(cls);
    };

    toggleClass(b, 'focus-mode', !!s.focusMode);
    toggleClass(b, 'teacher-mode', !!s.teacherMode);
    toggleClass(b, 'cursor-large', s.cursorSize === 'large');
    toggleClass(b, 'hide-images', !!s.hideImages);

    // New Toggles
    toggleClass(b, 'highlight-links', !!s.highlightLinks);
    toggleClass(b, 'highlight-headings', !!s.highlightHeadings);
    toggleClass(b, 'show-permalinks', !!s.showPermalinks);

    // Dynamic Spotlight isolation mode
    updateSpotlightModeState(!!s.spotlightMode);

    // Also apply to HTML for consistency if needed for Tailwind
    toggleClass(r, 'focus-mode', !!s.focusMode);

    // Reading Mask
    const m = document.getElementById('reading-mask');
    if (m) {
        m.classList.toggle('hidden', !s.readingMask);
        m.style.backgroundColor = `rgba(0, 0, 0, ${s.maskOpacity})`;
    }

    // Toolbar is managed centrally; just ensure it's initialized
    initSelectionToolbar();

    // Text Align
    b.style.setProperty('--site-text-align', s.textAlign);
    
    // Stop Animations
    toggleClass(b, 'stop-animations', !!s.stopAnimations);
    
    // Color Overlay (Irlen Syndrome/Reading Tints)
    let overlay = document.getElementById('a11y-color-overlay');
    if (s.colorOverlay && s.colorOverlay !== 'none') {
        if (!overlay) {
            overlay = document.createElement('div');
            overlay.id = 'a11y-color-overlay';
            overlay.style.position = 'fixed';
            overlay.style.top = '0';
            overlay.style.left = '0';
            overlay.style.width = '100vw';
            overlay.style.height = '100vh';
            overlay.style.pointerEvents = 'none';
            overlay.style.zIndex = '9998'; // Just below highest interactive elements
            document.body.appendChild(overlay);
        }
        overlay.style.backgroundColor = s.colorOverlay;
        overlay.style.display = 'block';
    } else if (overlay) {
        overlay.style.display = 'none';
    }

    // Sync Panel UI
    syncPanelInputs(s);
}

function syncPanelInputs(s) {
    const el = (id) => document.getElementById(id);
    if (el('panel-font')) el('panel-font').value = s.fontFamily;
    if (el('panel-size')) el('panel-size').value = s.fontSize;
    if (el('panel-line')) el('panel-line').value = s.lineHeight;
    if (el('panel-saturation')) el('panel-saturation').value = s.saturation;

    if (el('panel-mask')) el('panel-mask').checked = !!s.readingMask;
    if (el('panel-cursor')) el('panel-cursor').checked = (s.cursorSize === 'large');
    if (el('panel-images')) el('panel-images').checked = !!s.hideImages;
    if (el('panel-teacher')) el('panel-teacher').checked = !!s.teacherMode;
    if (el('panel-focus')) el('panel-focus').checked = !!s.focusMode;

    // New Inputs
    if (el('panel-links')) el('panel-links').checked = !!s.highlightLinks;
    if (el('panel-headings')) el('panel-headings').checked = !!s.highlightHeadings;
    if (el('panel-tts')) el('panel-tts').checked = !!s.textToSpeech;
    if (el('panel-permalinks')) el('panel-permalinks').checked = !!s.showPermalinks;
    if (el('panel-spotlight')) el('panel-spotlight').checked = !!s.spotlightMode;
    if (el('panel-ticks')) el('panel-ticks').checked = !!s.acousticTicks;
    
    if (el('panel-letter-spacing')) el('panel-letter-spacing').value = s.letterSpacing;
    if (el('panel-word-spacing')) el('panel-word-spacing').value = s.wordSpacing;
    if (el('panel-mask-opacity')) el('panel-mask-opacity').value = s.maskOpacity;
    if (el('panel-stop-animations')) el('panel-stop-animations').checked = !!s.stopAnimations;
    if (el('panel-color-overlay')) el('panel-color-overlay').value = s.colorOverlay || 'none';
}

// --- Selection Toolbar (Define & TTS) ---
let toolbarInitialized = false;
function initSelectionToolbar() {
    if (toolbarInitialized) return;
    toolbarInitialized = true;
    
    let toolbar = document.getElementById('selection-toolbar');
    if (!toolbar) {
        toolbar = document.createElement('div');
        toolbar.id = 'selection-toolbar';
        toolbar.className = 'fixed z-[100] hidden flex-row gap-2 bg-white dark:bg-gray-800 shadow-lg p-2 rounded-lg border border-gray-200 dark:border-gray-700 animate-fade-in-up';
        
        const btnSpeak = document.createElement('button');
        btnSpeak.id = 'btn-speak';
        btnSpeak.innerHTML = '<i class="fas fa-volume-up"></i> Speak';
        btnSpeak.className = 'bg-primary text-white px-3 py-1 rounded-md text-sm font-bold flex items-center gap-2 hover:bg-primary-dark transition-colors';
        btnSpeak.onclick = () => {
             const text = toolbar.dataset.selectedText;
             if (text) speakText(text);
             toolbar.classList.add('hidden');
             window.getSelection().removeAllRanges();
        };

        const btnDefine = document.createElement('button');
        btnDefine.id = 'btn-define';
        btnDefine.innerHTML = '<i class="fas fa-book"></i> Define';
        btnDefine.className = 'bg-secondary text-white px-3 py-1 rounded-md text-sm font-bold flex items-center gap-2 hover:bg-neutral-600 transition-colors bg-teal-600';
        btnDefine.onclick = () => {
             const text = toolbar.dataset.selectedText;
             const cx = parseFloat(toolbar.dataset.clientX) || window.innerWidth / 2;
             const cy = parseFloat(toolbar.dataset.clientY) || window.innerHeight / 2;
             if (text) fetchDefinition(text, cx, cy);
             toolbar.classList.add('hidden');
        };

        toolbar.appendChild(btnSpeak);
        toolbar.appendChild(btnDefine);
        document.body.appendChild(toolbar);
    }

    document.addEventListener('mouseup', handleTextSelection);
    
    // Hide toolbar when clicking outside of selection
    document.addEventListener('mousedown', (e) => {
        if (!toolbar.contains(e.target)) {
            setTimeout(() => {
                const selection = window.getSelection();
                if (!selection.toString().trim() && !toolbar.contains(document.activeElement)) {
                    toolbar.classList.add('hidden');
                    toolbar.classList.remove('flex');
                }
            }, 10);
        }
    });
}

function handleTextSelection(e) {
    const selection = window.getSelection();
    const text = selection.toString().trim();
    const toolbar = document.getElementById('selection-toolbar');
    if (!toolbar) return;

    if (text.length > 0) {
        // Only show TTS if enabled
        const btnSpeak = document.getElementById('btn-speak');
        if (btnSpeak) btnSpeak.style.display = window.currentSettings.textToSpeech ? 'flex' : 'none';

        // Only show Define if it's a single word (roughly)
        const btnDefine = document.getElementById('btn-define');
        const isSingleWord = text.length <= 30 && !text.includes(' ') && text.length > 0;
        if (btnDefine) btnDefine.style.display = isSingleWord ? 'flex' : 'none';

        // If neither is visible, hide
        if (!window.currentSettings.textToSpeech && !isSingleWord) {
            toolbar.classList.add('hidden');
            toolbar.classList.remove('flex');
            return;
        }

        let top = e.clientY - 50;
        let left = e.clientX;

        if (top < 0) top = e.clientY + 20;
        if (left + 150 > window.innerWidth) left = window.innerWidth - 150;

        toolbar.style.top = `${top}px`;
        toolbar.style.left = `${left}px`;
        toolbar.classList.remove('hidden');
        toolbar.classList.add('flex');

        toolbar.dataset.selectedText = text;
        toolbar.dataset.clientX = e.clientX;
        toolbar.dataset.clientY = e.clientY;
    } else {
        toolbar.classList.add('hidden');
        toolbar.classList.remove('flex');
    }
}

function speakText(text) {
    window.speechSynthesis.cancel();
    speechUtterance = new SpeechSynthesisUtterance(text);
    speechUtterance.rate = 1.0;
    speechSynthesis.speak(speechUtterance);
}

// --- MASK MOVEMENT ---
function updateMaskPosition(yPos) {
    if (!currentSettings.readingMask) return;
    const guide = document.getElementById('reading-guide');
    if (guide) {
        const centerOffset = 24;
        guide.style.top = (yPos - centerOffset) + 'px';
    }
}

document.addEventListener('mousemove', (e) => {
    updateMaskPosition(e.clientY);
});

// Follow keyboard focus
document.addEventListener('focusin', (e) => {
    if (e.target && typeof e.target.getBoundingClientRect === 'function') {
        const rect = e.target.getBoundingClientRect();
        const absoluteY = rect.top; // Relative to viewport, same as clientY
        updateMaskPosition(absoluteY + (rect.height / 2));
    }
});

// Arrow keys for basic moving without focus
let lastMaskY = window.innerHeight / 2;
document.addEventListener('keydown', (e) => {
    if (!currentSettings.readingMask) return;
    
    // Check if the user is typing in an input, don't hijack arrows
    if (document.activeElement && ['INPUT', 'TEXTAREA'].includes(document.activeElement.tagName)) {
        return;
    }

    const step = 40;
    if (e.key === 'ArrowUp') {
        lastMaskY = Math.max(0, lastMaskY - step);
        updateMaskPosition(lastMaskY);
    } else if (e.key === 'ArrowDown') {
        lastMaskY = Math.min(window.innerHeight, lastMaskY + step);
        updateMaskPosition(lastMaskY);
    }
});


// Expose API
window.loadSettings = () => currentSettings;
window.saveSettings = (s) => {
    currentSettings = { ...currentSettings, ...s };
    window.currentSettings = currentSettings;
    saveSettingsInternal();
    applySettings(currentSettings);
};
window.updateGlobalSetting = updateGlobalSetting;
window.syncPanelInputs = syncPanelInputs;

// Apply immediately on load
// Wait for DOM
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        applySettings(currentSettings);
        initSelectionToolbar();
        initPermalinks();
    });
} else {
    applySettings(currentSettings);
    initSelectionToolbar();
    initPermalinks();
}

// Listen for internal system updates
window.addEventListener('settings-changed', (e) => {
    currentSettings = e.detail;
    window.currentSettings = currentSettings;
    applySettings(currentSettings);
});

// --- Dictionary API Fetcher ---
async function fetchDefinition(word, x, y) {
    try {
        const res = await fetch(`https://api.dictionaryapi.dev/api/v2/entries/en/${encodeURIComponent(word)}`);
        if (!res.ok) return; // Word not found or API error
        
        const data = await res.json();
        if (data && data.length > 0 && data[0].meanings && data[0].meanings.length > 0) {
            const meaning = data[0].meanings[0];
            const def = meaning.definitions[0].definition;
            const partOfSpeech = meaning.partOfSpeech;
            
            showDictionaryTooltip(x, y, word, partOfSpeech, def);
        }
    } catch (err) {
        console.error('Dictionary fetch failed:', err);
    }
}

function showDictionaryTooltip(x, y, word, partOfSpeech, definition) {
    // Remove existing
    const existing = document.getElementById('dict-tooltip');
    if (existing) existing.remove();

    const tooltip = document.createElement('div');
    tooltip.id = 'dict-tooltip';
    tooltip.className = 'fixed z-[100] bg-white dark:bg-gray-800 text-gray-900 dark:text-gray-100 p-4 rounded-lg shadow-2xl max-w-sm border border-gray-200 dark:border-gray-700 animate-fade-in-up';
    
    // Position it
    let top = y + 20;
    let left = x;
    
    // Bounds check
    if (left + 300 > window.innerWidth) left = window.innerWidth - 320;
    if (top + 150 > window.innerHeight) top = y - 160;
    
    tooltip.style.top = `${top}px`;
    tooltip.style.left = `${left}px`;
    
    tooltip.innerHTML = `
        <div class="flex justify-between items-start mb-2">
            <div>
                <h4 class="font-bold text-lg text-primary capitalize">${word}</h4>
                <span class="text-xs text-text-secondary italic">${partOfSpeech}</span>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="text-gray-400 hover:text-red-500"><i class="fas fa-times"></i></button>
        </div>
        <p class="text-sm leading-relaxed">${definition}</p>
    `;
    
    document.body.appendChild(tooltip);

    // Click outside to close
    setTimeout(() => {
        document.addEventListener('click', function closeTooltip(e) {
            if (!tooltip.contains(e.target)) {
                tooltip.remove();
                document.removeEventListener('click', closeTooltip);
            }
        });
    }, 100);
}

// --- PERMALINKS ---
function initPermalinks() {
    if (!document.getElementById('permalink-style')) {
        const style = document.createElement('style');
        style.id = 'permalink-style';
        style.textContent = `
            body:not(.show-permalinks) .permalink { display: none !important; }
            .permalink {
                margin-left: 0.5rem;
                color: var(--site-primary, #4F46E5);
                text-decoration: none;
                opacity: 0.5;
                transition: opacity 0.2s;
                font-size: 0.8em;
                vertical-align: middle;
            }
            .permalink:hover { opacity: 1; }
            h1:hover .permalink, h2:hover .permalink, h3:hover .permalink, h4:hover .permalink, h5:hover .permalink, h6:hover .permalink { opacity: 0.8; }
        `;
        document.head.appendChild(style);
    }

    const headings = document.querySelectorAll('h1, h2, h3, h4, h5, h6');
    headings.forEach(h => {
        if (h.closest('.hidden:not(#main-content *)') || h.classList.contains('sr-only')) return;
        
        if (!h.id) {
            h.id = h.textContent.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-').replace(/(^-|-$)/g, '');
        }

        if (h.id && !h.querySelector('.permalink')) {
            const a = document.createElement('a');
            a.href = '#' + h.id;
            a.className = 'permalink';
            a.innerHTML = '<i class="fas fa-link"></i>';
            a.title = 'Link to this section';
            h.appendChild(document.createTextNode(' '));
            h.appendChild(a);
        }
    });
}

// --- DYNAMIC SPOTLIGHT MODE CONTROLLER ---
let spotlightActive = false;
let spotlightOverlay = null;

function updateSpotlightModeState(active) {
    const b = document.body;
    if (active) {
        b.classList.add('spotlight-mode-active');
        if (!spotlightOverlay) {
            spotlightOverlay = document.createElement('div');
            spotlightOverlay.id = 'a11y-spotlight-overlay';
            b.appendChild(spotlightOverlay);
        }
        
        if (!spotlightActive) {
            spotlightActive = true;
            document.addEventListener('mousemove', handleSpotlightMove);
            document.addEventListener('mouseover', handleSpotlightOver);
            document.addEventListener('focusin', handleSpotlightFocus);
        }
    } else {
        b.classList.remove('spotlight-mode-active');
        if (spotlightOverlay) {
            spotlightOverlay.remove();
            spotlightOverlay = null;
        }
        
        if (spotlightActive) {
            spotlightActive = false;
            document.removeEventListener('mousemove', handleSpotlightMove);
            document.removeEventListener('mouseover', handleSpotlightOver);
            document.removeEventListener('focusin', handleSpotlightFocus);
            
            // Clear all spotlight target highlighting
            document.querySelectorAll('.spotlight-focused').forEach(el => {
                el.classList.remove('spotlight-focused');
            });
        }
    }
}

function handleSpotlightMove(e) {
    const r = document.documentElement;
    r.style.setProperty('--spotlight-x', e.clientX);
    r.style.setProperty('--spotlight-y', e.clientY);
}

function handleSpotlightOver(e) {
    const target = e.target.closest('p, h1, h2, h3, h4, h5, h6, li, label, button, a, input, select, textarea, .question-card, .skill-card, .stats-card');
    if (!target) return;
    
    // Clear previous focus highlight classes
    document.querySelectorAll('.spotlight-focused').forEach(el => {
        if (el !== target) el.classList.remove('spotlight-focused');
    });
    
    target.classList.add('spotlight-focused');
    
    // Smooth spotlight position coordinates targeting the center of target
    const rect = target.getBoundingClientRect();
    const centerX = rect.left + rect.width / 2;
    const centerY = rect.top + rect.height / 2;
    
    const r = document.documentElement;
    r.style.setProperty('--spotlight-x', centerX);
    r.style.setProperty('--spotlight-y', centerY);
    
    // Sizing radius mapping to target dimensions
    const radius = Math.max(140, Math.sqrt(rect.width * rect.width + rect.height * rect.height) / 2 + 24);
    r.style.setProperty('--spotlight-radius', Math.min(320, radius));
}

function handleSpotlightFocus(e) {
    const target = e.target.closest('p, h1, h2, h3, h4, h5, h6, li, label, button, a, input, select, textarea, .question-card, .skill-card, .stats-card');
    if (!target) return;
    
    document.querySelectorAll('.spotlight-focused').forEach(el => {
        if (el !== target) el.classList.remove('spotlight-focused');
    });
    
    target.classList.add('spotlight-focused');
    
    const rect = target.getBoundingClientRect();
    const centerX = rect.left + rect.width / 2;
    const centerY = rect.top + rect.height / 2;
    
    const r = document.documentElement;
    r.style.setProperty('--spotlight-x', centerX);
    r.style.setProperty('--spotlight-y', centerY);
    
    const radius = Math.max(140, Math.sqrt(rect.width * rect.width + rect.height * rect.height) / 2 + 24);
    r.style.setProperty('--spotlight-radius', Math.min(320, radius));
}

// --- ACOUSTIC UI TICK FEEDBACK SYNTHESIZER ---
let a11yAudioCtx = null;
function playA11yTick(type) {
    try {
        if (!a11yAudioCtx) {
            a11yAudioCtx = new (window.AudioContext || window.webkitAudioContext)();
        }
        if (a11yAudioCtx.state === 'suspended') {
            a11yAudioCtx.resume();
        }
        
        const osc = a11yAudioCtx.createOscillator();
        const gain = a11yAudioCtx.createGain();
        
        osc.connect(gain);
        gain.connect(a11yAudioCtx.destination);
        
        const now = a11yAudioCtx.currentTime;
        if (type === 'toggle') {
            osc.type = 'sine';
            osc.frequency.setValueAtTime(380, now);
            osc.frequency.exponentialRampToValueAtTime(700, now + 0.08);
            gain.gain.setValueAtTime(0.06, now);
            gain.gain.exponentialRampToValueAtTime(0.001, now + 0.08);
            osc.start(now);
            osc.stop(now + 0.08);
        } else {
            osc.type = 'sine';
            osc.frequency.setValueAtTime(800, now);
            gain.gain.setValueAtTime(0.03, now);
            gain.gain.exponentialRampToValueAtTime(0.001, now + 0.025); // ultra brief 25ms tick
            osc.start(now);
            osc.stop(now + 0.025);
        }
    } catch (err) {
        console.warn('Acoustic tick playback error:', err);
    }
}

// Global click event dispatcher for dynamic navigation ticks
document.addEventListener('click', (e) => {
    if (window.currentSettings && window.currentSettings.acousticTicks) {
        const target = e.target.closest('button, a, input, select, textarea, label, [role="button"]');
        if (target) {
            // Delay slightly to match visual click events
            playA11yTick('click');
        }
    }
});

