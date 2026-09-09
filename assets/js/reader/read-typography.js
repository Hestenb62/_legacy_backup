/**
 * library/read/reader.js - Unified Digital Reader Client Engine
 * Pure Vanilla ES6+: Typography & Themes, SpeechSynthesis (TTS) with Synchronized
 * Sentence Highlighting, Flashcard Flip Drill, Chapter Quizzes, Persistent Text
 * Highlighting & Notes, Table of Contents Slide Drawer, and Citations.
 */



    document.addEventListener("DOMContentLoaded", () => {
        const bookContent = document.getElementById("book-content");
        if (!bookContent) return;

        const meta = window.BOOK_METADATA || {};
        const bookId = meta.id || 'default';
        const currentChapter = meta.chapterNum || 1;
        const totalChapters = meta.totalChapters || 1;

        // --- Storage Keys ---
        const PREFS_KEY = 'hesten_reader_prefs';
        const PROGRESS_KEY = `hesten_progress_${bookId}_lastChapter`;
        const SCROLL_POS_KEY = `hesten_scroll_pos_${bookId}_chapter_${currentChapter}`;
        const COMPLETION_KEY = `hesten_completion_pct_${bookId}`;
        const HIGHLIGHTS_KEY = `hesten_highlights_${bookId}_chapter_${currentChapter}`;

        // Save last active chapter
        try {
            localStorage.setItem(PROGRESS_KEY, currentChapter);
        } catch (e) {}

        // --- 1. Typography & Theme Settings ---
        if (typeof initTypographyAndTheme === 'function') initTypographyAndTheme(PREFS_KEY);

        // --- 2. Scroll Progress & Resume Toast ---
        if (typeof initScrollProgress === 'function') initScrollProgress(SCROLL_POS_KEY, COMPLETION_KEY, currentChapter, totalChapters);

        // --- 3. Text-to-Speech (TTS) Narration Engine ---
        if (typeof initTextToSpeech === 'function') initTextToSpeech(bookContent);

        // --- 4. Study Suite (Vocab, Flashcards, Quizzes, Highlights) ---
        if (typeof initStudySuite === 'function') initStudySuite(bookId, currentChapter, HIGHLIGHTS_KEY);

        // --- 5. Inline Highlighting & Annotation Floating Toolbar ---
        if (typeof initHighlightToolbar === 'function') initHighlightToolbar(bookContent, HIGHLIGHTS_KEY);

        // --- 6. Table of Contents & Info Modals ---
        if (typeof initModalsAndDrawers === 'function') initModalsAndDrawers();

        // --- 7. Chapter Citation Generator ---
        if (typeof initChapterCitationGenerator === 'function') {
            initChapterCitationGenerator(meta);
        } else if (typeof window.initChapterCitationGenerator === 'function') {
            window.initChapterCitationGenerator(meta);
        }

        // --- 8. Realistic Single-Page Book Mode & Page-Flip Engine ---
        if (typeof initSinglePageBookMode === 'function') {
            initSinglePageBookMode(meta, PREFS_KEY);
        } else if (typeof window.initSinglePageBookMode === 'function') {
            window.initSinglePageBookMode(meta, PREFS_KEY);
        }
    });

    /* ==========================================================================
       1. Typography & Theme Engine
       ========================================================================== */
    function initTypographyAndTheme(prefsKey) {
        const bookContent = document.getElementById("book-content");
        const openSettingsBtn = document.getElementById("open-settings-btn");
        const settingsPanel = document.getElementById("settings-panel");
        const fontDecBtn = document.getElementById("reader-font-dec");
        const fontIncBtn = document.getElementById("reader-font-inc");
        const fontPctLabel = document.getElementById("reader-font-pct");
        const scaleSlider = document.getElementById("reader-scale-slider");

        let defaultPrefs = {
            font: "font-sans",
            size: "prose-lg",
            lh: "lh-wide",
            theme: "theme-light",
            scalePct: 100,
            tracking: "tracking-normal",
            readingWidth: "standard"
        };

        try {
            const saved = localStorage.getItem(prefsKey);
            if (saved) {
                defaultPrefs = Object.assign(defaultPrefs, JSON.parse(saved));
            }
        } catch (e) {}

        // Ensure scalePct is valid
        if (typeof defaultPrefs.scalePct !== 'number' || isNaN(defaultPrefs.scalePct)) {
            if (defaultPrefs.size === 'prose-base') defaultPrefs.scalePct = 90;
            else if (defaultPrefs.size === 'prose-2xl') defaultPrefs.scalePct = 130;
            else defaultPrefs.scalePct = 100;
        }

        function applyPrefs(prefs) {
            if (!bookContent) return;

            // Reset and apply fonts
            bookContent.classList.remove("font-sans", "font-serif", "font-dyslexic", "font-hyperlegible", "font-mono");
            bookContent.classList.add(prefs.font);

            // Dynamic Font Scale calculation (base: 1.15rem = 100%)
            const remVal = (1.15 * (prefs.scalePct / 100)).toFixed(2) + 'rem';
            bookContent.style.setProperty('--reader-font-size', remVal);

            // Also keep classes in sync for fallback
            bookContent.classList.remove("prose-sm", "prose-base", "prose-lg", "prose-xl", "prose-2xl", "prose-3xl");
            if (prefs.scalePct <= 85) bookContent.classList.add("prose-sm");
            else if (prefs.scalePct <= 95) bookContent.classList.add("prose-base");
            else if (prefs.scalePct <= 115) bookContent.classList.add("prose-lg");
            else if (prefs.scalePct <= 135) bookContent.classList.add("prose-xl");
            else if (prefs.scalePct <= 160) bookContent.classList.add("prose-2xl");
            else bookContent.classList.add("prose-3xl");

            // Update on-screen scale labels and slider
            if (fontPctLabel) {
                fontPctLabel.textContent = `${prefs.scalePct}%`;
            }
            if (scaleSlider && parseInt(scaleSlider.value, 10) !== prefs.scalePct) {
                scaleSlider.value = prefs.scalePct;
            }

            // Reset and apply line height
            bookContent.classList.remove("lh-tight", "lh-normal", "lh-wide", "lh-extra");
            bookContent.classList.add(prefs.lh);

            // Reset and apply tracking / kerning
            bookContent.classList.remove("tracking-normal", "tracking-spaced", "tracking-wide");
            bookContent.classList.add(prefs.tracking || "tracking-normal");

            // Reset and apply theme
            document.body.classList.remove("theme-light", "theme-sepia", "theme-dark", "theme-midnight");
            document.body.classList.add(prefs.theme);
            const cleanTheme = prefs.theme.replace("theme-", "");
            document.documentElement.setAttribute("data-theme", cleanTheme);
            document.documentElement.classList.remove("theme-light", "theme-sepia", "theme-dark", "theme-midnight");
            document.documentElement.classList.add(prefs.theme);

            // Apply reading width to outer layout
            const readerLayout = document.querySelector('.reader-main-layout');
            if (readerLayout) {
                readerLayout.classList.remove('width-compact', 'width-standard', 'width-wide', 'width-full');
                const rw = prefs.readingWidth || 'standard';
                readerLayout.classList.add(`width-${rw}`);
            }

            // Sync settings panel buttons
            document.querySelectorAll(".settings-font").forEach(b => b.classList.toggle("active", b.dataset.font === prefs.font));
            document.querySelectorAll(".settings-lh").forEach(b => b.classList.toggle("active", b.dataset.lh === prefs.lh));
            document.querySelectorAll(".settings-tracking").forEach(b => b.classList.toggle("active", b.dataset.tracking === (prefs.tracking || "tracking-normal")));
            document.querySelectorAll(".settings-theme").forEach(b => b.classList.toggle("active", b.dataset.theme === prefs.theme));
            document.querySelectorAll(".settings-scale-chip").forEach(b => b.classList.toggle("active", parseInt(b.dataset.scale, 10) === prefs.scalePct));
            document.querySelectorAll(".settings-width").forEach(b => b.classList.toggle("active", b.dataset.width === (prefs.readingWidth || "standard")));

            try {
                localStorage.setItem(prefsKey, JSON.stringify(prefs));
            } catch (e) {}

            // Reflow single page book mode if active
            if (window.recalculateReaderPages) {
                setTimeout(window.recalculateReaderPages, 60);
            }
        }

        applyPrefs(defaultPrefs);

        // Quick Scaler Buttons
        if (fontDecBtn) {
            fontDecBtn.addEventListener("click", (e) => {
                e.preventDefault();
                defaultPrefs.scalePct = Math.max(75, defaultPrefs.scalePct - 10);
                applyPrefs(defaultPrefs);
                if (window.announceA11y) window.announceA11y(`Font size reduced to ${defaultPrefs.scalePct}%`);
            });
        }

        if (fontIncBtn) {
            fontIncBtn.addEventListener("click", (e) => {
                e.preventDefault();
                defaultPrefs.scalePct = Math.min(200, defaultPrefs.scalePct + 10);
                applyPrefs(defaultPrefs);
                if (window.announceA11y) window.announceA11y(`Font size increased to ${defaultPrefs.scalePct}%`);
            });
        }

        // Font Scale Slider
        if (scaleSlider) {
            scaleSlider.addEventListener("input", (e) => {
                defaultPrefs.scalePct = parseInt(e.target.value, 10);
                applyPrefs(defaultPrefs);
            });
            scaleSlider.addEventListener("change", (e) => {
                if (window.announceA11y) window.announceA11y(`Font size set to ${defaultPrefs.scalePct}%`);
            });
        }

        // Toggle settings dropdown panel
        if (openSettingsBtn && settingsPanel) {
            openSettingsBtn.addEventListener("click", (e) => {
                e.stopPropagation();
                settingsPanel.classList.toggle("hidden");
            });

            document.addEventListener("click", (e) => {
                if (!settingsPanel.contains(e.target) && e.target !== openSettingsBtn) {
                    settingsPanel.classList.add("hidden");
                }
            });
        }

        // Settings Buttons Click Handlers
        document.querySelectorAll(".settings-font").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.font = btn.dataset.font;
                applyPrefs(defaultPrefs);
                const fontNames = {
                    'font-sans': 'Sans-Serif',
                    'font-serif': 'Editorial Serif',
                    'font-dyslexic': 'OpenDyslexic',
                    'font-hyperlegible': 'Atkinson Hyperlegible',
                    'font-mono': 'Monospace'
                };
                if (window.announceA11y) window.announceA11y(`Font family set to ${fontNames[btn.dataset.font] || btn.dataset.font}`);
            });
        });

        document.querySelectorAll(".settings-scale-chip").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.scalePct = parseInt(btn.dataset.scale, 10);
                applyPrefs(defaultPrefs);
                if (window.announceA11y) window.announceA11y(`Font size set to ${defaultPrefs.scalePct}%`);
            });
        });

        document.querySelectorAll(".settings-lh").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.lh = btn.dataset.lh;
                applyPrefs(defaultPrefs);
            });
        });

        document.querySelectorAll(".settings-tracking").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.tracking = btn.dataset.tracking;
                applyPrefs(defaultPrefs);
            });
        });

        document.querySelectorAll(".settings-theme").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.theme = btn.dataset.theme;
                applyPrefs(defaultPrefs);
                if (window.announceA11y) window.announceA11y(`Theme set to ${btn.dataset.theme.replace('theme-', '')}`);
            });
        });

        document.querySelectorAll(".settings-width").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.readingWidth = btn.dataset.width;
                applyPrefs(defaultPrefs);
                if (window.announceA11y) window.announceA11y(`Reading width set to ${btn.dataset.width}`);
            });
        });
    }
