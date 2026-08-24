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
        initTypographyAndTheme(PREFS_KEY);

        // --- 2. Scroll Progress & Resume Toast ---
        initScrollProgress(SCROLL_POS_KEY, COMPLETION_KEY, currentChapter, totalChapters);

        // --- 3. Text-to-Speech (TTS) Narration Engine ---
        initTextToSpeech(bookContent);

        // --- 4. Study Suite (Vocab, Flashcards, Quizzes, Highlights) ---
        initStudySuite(bookId, currentChapter, HIGHLIGHTS_KEY);

        // --- 5. Inline Highlighting & Annotation Floating Toolbar ---
        initHighlightToolbar(bookContent, HIGHLIGHTS_KEY);

        // --- 6. Table of Contents & Info Modals ---
        initModalsAndDrawers();

        // --- 7. Chapter Citation Generator ---
        initChapterCitationGenerator(meta);

        // --- 8. Realistic Single-Page Book Mode & Page-Flip Engine ---
        initSinglePageBookMode(meta, PREFS_KEY);
    });

    /* ==========================================================================
       1. Typography & Theme Engine
       ========================================================================== */
    function initTypographyAndTheme(prefsKey) {
        const bookContent = document.getElementById("book-content");
        const openSettingsBtn = document.getElementById("open-settings-btn");
        const settingsPanel = document.getElementById("settings-panel");

        let defaultPrefs = {
            font: "font-sans",
            size: "prose-lg",
            lh: "lh-wide",
            theme: "theme-light"
        };

        try {
            const saved = localStorage.getItem(prefsKey);
            if (saved) {
                defaultPrefs = Object.assign(defaultPrefs, JSON.parse(saved));
            }
        } catch (e) {}

        function applyPrefs(prefs) {
            if (!bookContent) return;

            // Reset fonts
            bookContent.classList.remove("font-sans", "font-serif", "font-dyslexic");
            bookContent.classList.add(prefs.font);

            // Reset sizes
            bookContent.classList.remove("prose-base", "prose-lg", "prose-2xl");
            bookContent.classList.add(prefs.size);

            // Reset line height
            bookContent.classList.remove("lh-normal", "lh-wide", "lh-extra");
            bookContent.classList.add(prefs.lh);

            // Reset theme
            document.body.classList.remove("theme-light", "theme-sepia", "theme-dark", "theme-midnight");
            document.body.classList.add(prefs.theme);
            const cleanTheme = prefs.theme.replace("theme-", "");
            document.documentElement.setAttribute("data-theme", cleanTheme);
            document.documentElement.classList.remove("theme-light", "theme-sepia", "theme-dark", "theme-midnight");
            document.documentElement.classList.add(prefs.theme);

            // Sync settings panel buttons
            document.querySelectorAll(".settings-font").forEach(b => b.classList.toggle("active", b.dataset.font === prefs.font));
            document.querySelectorAll(".settings-size").forEach(b => b.classList.toggle("active", b.dataset.size === prefs.size));
            document.querySelectorAll(".settings-lh").forEach(b => b.classList.toggle("active", b.dataset.lh === prefs.lh));
            document.querySelectorAll(".settings-theme").forEach(b => b.classList.toggle("active", b.dataset.theme === prefs.theme));

            try {
                localStorage.setItem(prefsKey, JSON.stringify(prefs));
            } catch (e) {}

            if (window.recalculateReaderPages) {
                setTimeout(window.recalculateReaderPages, 60);
            }
        }

        applyPrefs(defaultPrefs);

        // Toggle panel
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
            });
        });

        document.querySelectorAll(".settings-size").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.size = btn.dataset.size;
                applyPrefs(defaultPrefs);
            });
        });

        document.querySelectorAll(".settings-lh").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.lh = btn.dataset.lh;
                applyPrefs(defaultPrefs);
            });
        });

        document.querySelectorAll(".settings-theme").forEach(btn => {
            btn.addEventListener("click", () => {
                defaultPrefs.theme = btn.dataset.theme;
                applyPrefs(defaultPrefs);
            });
        });
    }
