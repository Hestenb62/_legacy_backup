/**
 * assets/js/global-shortcuts.js
 * Universal Keyboard Navigation & Shortcuts Hub
 * Hesten's Learning Platform
 */

(function () {
    'use strict';

    let lastFocusedElement = null;

    function isInputElement(el) {
        if (!el) return false;
        const tag = el.tagName ? el.tagName.toLowerCase() : '';
        return (
            tag === 'input' ||
            tag === 'textarea' ||
            tag === 'select' ||
            el.isContentEditable
        );
    }

    function openShortcutsModal() {
        const modal = document.getElementById('shortcuts-modal');
        if (!modal) return;
        lastFocusedElement = document.activeElement;
        modal.classList.remove('hidden');
        
        // Focus close or done button
        const closeBtn = document.getElementById('shortcuts-modal-close');
        if (closeBtn) {
            setTimeout(() => closeBtn.focus(), 50);
        }

        if (typeof window.announceA11y === 'function') {
            window.announceA11y('Keyboard shortcuts guide opened. Press Escape to close.');
        }
    }

    function closeShortcutsModal() {
        const modal = document.getElementById('shortcuts-modal');
        if (!modal || modal.classList.contains('hidden')) return;
        modal.classList.add('hidden');

        if (lastFocusedElement && typeof lastFocusedElement.focus === 'function') {
            try {
                lastFocusedElement.focus();
            } catch (e) {}
        }

        if (typeof window.announceA11y === 'function') {
            window.announceA11y('Keyboard shortcuts guide closed.');
        }
    }

    function toggleShortcutsModal() {
        const modal = document.getElementById('shortcuts-modal');
        if (!modal) return;
        if (modal.classList.contains('hidden')) {
            openShortcutsModal();
        } else {
            closeShortcutsModal();
        }
    }

    // Expose globally
    window.openShortcutsModal = openShortcutsModal;
    window.closeShortcutsModal = closeShortcutsModal;
    window.toggleShortcutsModal = toggleShortcutsModal;

    // Attach button events once DOM is loaded
    function initShortcutsDOM() {
        const closeBtn = document.getElementById('shortcuts-modal-close');
        const doneBtn = document.getElementById('shortcuts-done-btn');
        const modal = document.getElementById('shortcuts-modal');

        if (closeBtn) closeBtn.addEventListener('click', closeShortcutsModal);
        if (doneBtn) doneBtn.addEventListener('click', closeShortcutsModal);

        if (modal) {
            modal.addEventListener('click', function (e) {
                if (e.target === modal) {
                    closeShortcutsModal();
                }
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initShortcutsDOM);
    } else {
        initShortcutsDOM();
    }

    // Global Key Listener
    window.addEventListener('keydown', function (e) {
        const active = document.activeElement;
        const inInput = isInputElement(active);

        // 1. Escape key handling (works regardless of focus)
        if (e.key === 'Escape' || e.keyCode === 27) {
            const modal = document.getElementById('shortcuts-modal');
            if (modal && !modal.classList.contains('hidden')) {
                e.preventDefault();
                closeShortcutsModal();
                return;
            }

            // Close search autocomplete if open
            const acDropdown = document.getElementById('header-search-autocomplete');
            if (acDropdown && !acDropdown.classList.contains('hidden')) {
                acDropdown.classList.add('hidden');
                return;
            }

            // If in an input, blur it
            if (inInput) {
                active.blur();
                return;
            }
        }

        // If currently focused on an editable input, do not trigger single-key actions
        if (inInput) {
            return;
        }

        // 2. Open shortcuts modal: '?' (Shift + '/')
        if (e.key === '?' || (e.shiftKey && e.key === '/')) {
            e.preventDefault();
            toggleShortcutsModal();
            return;
        }

        // 3. Focus Search: '/'
        if (e.key === '/' && !e.ctrlKey && !e.altKey && !e.metaKey) {
            const searchInput = document.getElementById('header-search') || document.querySelector('.search-input');
            if (searchInput) {
                e.preventDefault();
                searchInput.focus();
                searchInput.select();
                if (typeof window.announceA11y === 'function') {
                    window.announceA11y('Search input focused. Type your search query.');
                }
            }
            return;
        }

        // 4. Alt Shortcuts (Navigation & Global Tools)
        if (e.altKey && !e.ctrlKey && !e.metaKey) {
            const key = e.key.toLowerCase();

            // Alt + H -> Home
            if (key === 'h') {
                e.preventDefault();
                window.location.href = '/';
                return;
            }

            // Alt + L -> Library
            if (key === 'l') {
                e.preventDefault();
                window.location.href = '/library/';
                return;
            }

            // Alt + U -> Updates & Planning
            if (key === 'u') {
                e.preventDefault();
                window.location.href = '/updates/';
                return;
            }

            // Alt + A -> Toggle Accessibility Panel
            if (key === 'a') {
                e.preventDefault();
                const a11yBtn = document.getElementById('a11y-toggle-button');
                if (a11yBtn) {
                    a11yBtn.click();
                } else if (typeof window.toggleA11ySettings === 'function') {
                    window.toggleA11ySettings();
                }
                return;
            }

            // Alt + T -> Toggle Study Timer
            if (key === 't') {
                e.preventDefault();
                const timerBtn = document.getElementById('timer-toggle');
                if (timerBtn) {
                    timerBtn.click();
                } else if (typeof window.toggleStudyTimer === 'function') {
                    window.toggleStudyTimer();
                }
                return;
            }

            // Alt + S -> Toggle Scratchpad
            if (key === 's') {
                e.preventDefault();
                const scratchpadBtn = document.getElementById('scratchpad-toggle');
                if (scratchpadBtn) {
                    scratchpadBtn.click();
                } else if (typeof window.toggleScratchpad === 'function') {
                    window.toggleScratchpad();
                }
                return;
            }

            // Alt + C -> Toggle Citation
            if (key === 'c') {
                e.preventDefault();
                const citationBtn = document.getElementById('citation-toggle');
                if (citationBtn) {
                    citationBtn.click();
                } else if (typeof window.toggleCitationModal === 'function') {
                    window.toggleCitationModal();
                }
                return;
            }
        }
    });
})();
