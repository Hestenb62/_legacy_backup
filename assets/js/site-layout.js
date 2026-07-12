
// --- GTranslate Config ---
window.gtranslateSettings = {
    default_language: "en",
    native_language_names: true,
    wrapper_selector: ".gtranslate_wrapper",
    flag_style: "3d",
    alt_flags: {
        en: "usa",
    },
};

// --- INIT GLOBAL ---
window.addEventListener("load", () => {
    const loader = document.getElementById("initial-loader");
    if (loader) {
        loader.style.opacity = "0";
        setTimeout(() => loader.remove(), 500);
    }
});

document.addEventListener("DOMContentLoaded", () => {
    loadSettings();
    loadScratchpad();
    const yearEl = document.getElementById("year");
    if (yearEl) yearEl.textContent = new Date().getFullYear();

    // Mobile Nav
    document.getElementById("nav-toggle")?.addEventListener("click", () => {
        document.getElementById("nav-content").classList.toggle("hidden");
    });

    // FAB Toggle
    const fabMainToggle = document.getElementById("fab-main-toggle");
    const fabMenu = document.getElementById("fab-menu");
    const fabIcon = document.getElementById("fab-icon");

    if (fabMainToggle && fabMenu && fabIcon) {
        fabMainToggle.addEventListener("click", () => {
            const isExpanded = fabMainToggle.getAttribute("aria-expanded") === "true";

            if (isExpanded) {
                // Close menu
                fabMenu.classList.remove("active");
                fabIcon.classList.remove("active");
                fabMainToggle.setAttribute("aria-expanded", "false");
            } else {
                // Open menu
                fabMenu.classList.add("active");
                fabIcon.classList.add("active");
                fabMainToggle.setAttribute("aria-expanded", "true");
            }
        });
    }

    // A11y Focus
    setupPanelFocus(
        "scratchpad-toggle",
        "scratchpad-panel",
        "scratchpad-close"
    );
    setupPanelFocus(
        "a11y-toggle-button",
        "a11y-settings-panel",
        "a11y-close-button"
    );
    setupPanelFocus(
        "timer-toggle",
        "timer-panel",
        "timer-close"
    );
    setupPanelFocus(
        "citation-toggle",
        "citation-panel",
        "citation-close"
    );

    // Quick Notes Auto-save (Global Feature)
    const notesArea = document.getElementById("quick-notes-area");
    if (notesArea) {
        const saveNotes = debounce((val) => {
            localStorage.setItem("hl_scratchpad", val);
            const status = document.getElementById("scratchpad-status");
            if (status) {
                status.textContent = "Saving...";
                setTimeout(() => (status.textContent = "Saved"), 1000);
            }
        }, 500);

        notesArea.addEventListener("input", (e) => {
            saveNotes(e.target.value);
        });
    }
});

// --- UTILS ---
function debounce(func, wait) {
    let timeout;
    return (...args) => {
        clearTimeout(timeout);
        timeout = setTimeout(() => func.apply(this, args), wait);
    };
}
function setupPanelFocus(triggerId, panelId, closeId) {
    const trigger = document.getElementById(triggerId);
    const panel = document.getElementById(panelId);
    const close = document.getElementById(closeId);

    if (!trigger || !panel) return;

    const toggle = () => {
        const isOpen = panel.classList.contains("active");
        if (isOpen) {
            panel.classList.remove("active");
            trigger.setAttribute("aria-expanded", "false");
            trigger.focus();
        } else {
            panel.classList.add("active");
            trigger.setAttribute("aria-expanded", "true");
            setTimeout(() => close?.focus(), 100);
        }
    };
    trigger.onclick = toggle;
    if (close) close.onclick = toggle;
}

// Consolidated Confetti Logic (Safe Loading)
function triggerConfetti(origin) {
    if (typeof confetti === "function") {
        confetti({
            particleCount: 100,
            spread: 70,
            origin: origin || {
                y: 0.6,
            },
        });
    } else {
        // Check if script is already added
        if (!document.querySelector('script[src*="canvas-confetti"]')) {
            const script = document.createElement("script");
            script.src =
                "/src/canvas-confetti-1.9.4/package/dist/confetti.browser.js";
            script.onload = () =>
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: origin || {
                        y: 0.6,
                    },
                });
            document.body.appendChild(script);
        }
    }
}

function loadScratchpad() {
    try {
        const content = localStorage.getItem("hl_scratchpad");
        if (content && document.getElementById("quick-notes-area")) {
            document.getElementById("quick-notes-area").value = content;
        }
    } catch (e) { }
}

// --- MODALS ---
const messageBox = document.getElementById("message-box");
const messageText = document.getElementById("message-text");
const messageOkButton = document.getElementById("message-ok-button");

window.showMessageBox = function (message) {
    if (!messageBox || !messageText || !messageOkButton) return;
    messageText.textContent = message;
    messageBox.classList.remove("hidden");
    messageBox.style.display = "flex";

    messageOkButton.onclick = () => {
        messageBox.classList.add("hidden");
        messageBox.style.display = "none";
    };
};

// --- SETTINGS / ACCESSIBILITY ---
const defaultSettings = {
    theme: "light",
    fontSize: 1.0,
    lineHeight: 1.6,
    fontFamily: "Inter",
    focusMode: false,
};
const STORAGE_KEY = "hl_accessibility_settings";
let currentSettings = defaultSettings;

function loadSettings() {
    try {
        const stored = localStorage.getItem(STORAGE_KEY);
        currentSettings = stored
            ? {
                ...defaultSettings,
                ...JSON.parse(stored),
            }
            : defaultSettings;
        applySettings(currentSettings);
        initSettingsUI();
    } catch (e) { }
}

function saveSettings(settings) {
    localStorage.setItem(STORAGE_KEY, JSON.stringify(settings));
    applySettings(settings);
    currentSettings = settings;
}

function applySettings(settings) {
    document.documentElement.style.setProperty(
        "--site-font-size",
        `${settings.fontSize}rem`
    );
    document.documentElement.style.setProperty(
        "--site-line-height",
        settings.lineHeight
    );
    let fontName = settings.fontFamily;
    if (fontName.includes(" ") || fontName === "Open Dyslexic")
        fontName = `"${fontName}"`;
    document.documentElement.style.setProperty(
        "--site-font-family",
        fontName
    );

    document.body.classList.remove("light", "dark", "high-contrast");
    document.body.classList.add(settings.theme);

    // Focus Mode
    if (settings.focusMode) document.body.classList.add("focus-mode");
    else document.body.classList.remove("focus-mode");
}

function initSettingsUI() {
    document.getElementById("theme-light")?.addEventListener("click", () =>
        saveSettings({
            ...currentSettings,
            theme: "light",
        })
    );
    document.getElementById("theme-dark")?.addEventListener("click", () =>
        saveSettings({
            ...currentSettings,
            theme: "dark",
        })
    );
    document
        .getElementById("theme-contrast")
        ?.addEventListener("click", () =>
            saveSettings({
                ...currentSettings,
                theme: "high-contrast",
            })
        );

    const focusToggle = document.getElementById("toggle-focus-mode");
    if (focusToggle) {
        focusToggle.checked = currentSettings.focusMode;
        focusToggle.onchange = (e) =>
            saveSettings({
                ...currentSettings,
                focusMode: e.target.checked,
            });
    }

    document.querySelectorAll(".font-selector").forEach((btn) => {
        btn.onclick = (e) => {
            const font = e.target.dataset.font;
            saveSettings({
                ...currentSettings,
                fontFamily: font,
            });
            document.querySelectorAll(".font-selector").forEach((b) => {
                b.classList.remove("bg-primary", "text-white");
                if (b.dataset.font === font)
                    b.classList.add("bg-primary", "text-white");
            });
        };
    });

    const fontSlider = document.getElementById("font-size-slider");
    if (fontSlider) {
        fontSlider.value = currentSettings.fontSize;
        fontSlider.oninput = (e) => {
            document.getElementById("font-size-value").textContent = Math.round(
                e.target.value * 100
            );
            saveSettings({
                ...currentSettings,
                fontSize: e.target.value,
            });
        };
    }
}

// Optimized Scroll To Top
const scrollBtn = document.getElementById("scroll-to-top");
if (scrollBtn) {
    let lastScrollY = window.scrollY;
    let ticking = false;

    window.addEventListener(
        "scroll",
        () => {
            lastScrollY = window.scrollY;
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    if (lastScrollY > 300)
                        scrollBtn.classList.add("visible");
                    else scrollBtn.classList.remove("visible");
                    ticking = false;
                });
                ticking = true;
            }
        },
        {
            passive: true,
        }
    );
    scrollBtn.onclick = () =>
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
}

