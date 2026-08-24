    /* ==========================================================================
       6. Modals & Drawers (TOC, Vocab, License)
       ========================================================================== */
    function initModalsAndDrawers() {
        const tocModal = document.getElementById("toc-modal");
        const vocabModal = document.getElementById("vocab-modal");
        const licenseModal = document.getElementById("license-modal");
        const citeModal = document.getElementById("chapterCitationModal");
        const settingsPanel = document.getElementById("settings-panel");

        window.openTocModal = function () {
            if (tocModal) {
                tocModal.classList.remove("hidden");
                tocModal.style.display = "flex";
            }
        };

        window.closeTocModal = function () {
            if (tocModal) {
                tocModal.classList.add("hidden");
                tocModal.style.display = "none";
            }
        };

        window.openVocabModal = function () {
            if (vocabModal) {
                vocabModal.classList.remove("hidden");
                vocabModal.style.display = "flex";
            }
        };

        window.closeVocabModal = function () {
            if (vocabModal) {
                vocabModal.classList.add("hidden");
                vocabModal.style.display = "none";
            }
        };

        window.openLicenseModal = function () {
            if (licenseModal) {
                licenseModal.classList.remove("hidden");
                licenseModal.style.display = "flex";
            }
        };

        window.closeLicenseModal = function () {
            if (licenseModal) {
                licenseModal.classList.add("hidden");
                licenseModal.style.display = "none";
            }
        };

        window.openChapterCitationModal = function () {
            if (citeModal) {
                renderReaderCitation(window.BOOK_METADATA || {});
                citeModal.classList.remove("hidden");
                citeModal.style.display = "flex";
            }
        };

        window.closeChapterCitationModal = function () {
            if (citeModal) {
                citeModal.classList.add("hidden");
                citeModal.style.display = "none";
            }
        };

        // DOM Click bindings
        const openTocBtn = document.getElementById("open-toc-modal");
        const closeTocBtn = document.getElementById("close-toc-modal");
        if (openTocBtn) openTocBtn.addEventListener("click", window.openTocModal);
        if (closeTocBtn) closeTocBtn.addEventListener("click", window.closeTocModal);
        if (tocModal) {
            tocModal.addEventListener("click", (e) => {
                if (e.target === tocModal) window.closeTocModal();
            });
        }

        const openVocabBtn = document.getElementById("open-vocab-btn");
        const closeVocabBtn = document.getElementById("close-vocab-modal");
        if (openVocabBtn) openVocabBtn.addEventListener("click", window.openVocabModal);
        if (closeVocabBtn) closeVocabBtn.addEventListener("click", window.closeVocabModal);
        if (vocabModal) {
            vocabModal.addEventListener("click", (e) => {
                if (e.target === vocabModal) window.closeVocabModal();
            });
        }

        const closeLicenseBtn = document.getElementById("close-license-modal");
        if (closeLicenseBtn) closeLicenseBtn.addEventListener("click", window.closeLicenseModal);
        if (licenseModal) {
            licenseModal.addEventListener("click", (e) => {
                if (e.target === licenseModal) window.closeLicenseModal();
            });
        }

        const closeCiteBtn = document.getElementById("close-chapter-cite-modal");
        if (closeCiteBtn) closeCiteBtn.addEventListener("click", window.closeChapterCitationModal);
        if (citeModal) {
            citeModal.addEventListener("click", (e) => {
                if (e.target === citeModal) window.closeChapterCitationModal();
            });
        }

        // Global ESC key to close all modals & panels
        document.addEventListener("keydown", (e) => {
            if (e.key === "Escape") {
                window.closeTocModal();
                window.closeVocabModal();
                window.closeLicenseModal();
                window.closeChapterCitationModal();
                if (settingsPanel) settingsPanel.classList.add("hidden");
            }
        });
    }
