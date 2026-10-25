/**
 * assets/js/core/role-mode-manager.js
 * Universal Role & Persona Mode Manager for Hesten's Learning
 * Supports: All (General), Student (Focused), Teacher (Educator), Parent (Homeschool)
 * Provides 4-digit PIN setup, unlocking, multi-tab sync, and accessible live announcements.
 */
(function () {
    'use strict';

    const STORAGE_KEY_ROLE = 'hl_active_role';
    const STORAGE_KEY_PIN = 'hl_role_pin';
    const VALID_ROLES = ['all', 'student', 'teacher', 'parent'];

    let pendingTargetRole = null;

    /**
     * Get current active role from localStorage
     * @returns {string} 'all' | 'student' | 'teacher' | 'parent'
     */
    function getActiveRole() {
        try {
            const role = localStorage.getItem(STORAGE_KEY_ROLE);
            return VALID_ROLES.includes(role) ? role : 'all';
        } catch (e) {
            return 'all';
        }
    }

    /**
     * Get configured PIN or null
     * @returns {string|null}
     */
    function getStoredPin() {
        try {
            const pin = localStorage.getItem(STORAGE_KEY_PIN);
            return (pin && pin.trim().length === 4) ? pin.trim() : null;
        } catch (e) {
            return null;
        }
    }

    /**
     * Announces a message to screen readers via the global live region
     * @param {string} message
     */
    function announce(message) {
        const liveRegion = document.getElementById('a11y-live-region');
        if (liveRegion) {
            liveRegion.textContent = '';
            setTimeout(() => {
                liveRegion.textContent = message;
            }, 50);
        }
    }

    /**
     * Get human-readable title for a role
     * @param {string} role
     * @returns {string}
     */
    function getRoleTitle(role) {
        switch (role) {
            case 'student': return 'Student';
            case 'teacher': return 'Teacher';
            case 'parent': return 'Parent';
            default: return 'All Modes';
        }
    }

    /**
     * Sync UI elements across the page with current role
     * @param {string} role
     */
    function syncRoleUI(role) {
        // Set root document attribute
        document.documentElement.setAttribute('data-active-role', role);

        // Update pill role badge
        const badgeEl = document.getElementById('user-role-badge');
        if (badgeEl) {
            badgeEl.textContent = getRoleTitle(role);
            badgeEl.setAttribute('data-role', role);
        }

        // Update radio buttons in dropdown
        const buttons = document.querySelectorAll('.role-switch-btn');
        buttons.forEach(btn => {
            const btnRole = btn.getAttribute('data-role');
            const isActive = btnRole === role;
            btn.classList.toggle('active', isActive);
            btn.setAttribute('aria-checked', isActive ? 'true' : 'false');
        });

        // Update PIN indicator in dropdown
        const pinBadge = document.getElementById('role-pin-indicator');
        const hasPin = Boolean(getStoredPin());
        if (pinBadge) {
            pinBadge.classList.toggle('hidden', !hasPin);
        }

        const pinSettingsItem = document.getElementById('role-manage-pin-item');
        if (pinSettingsItem) {
            pinSettingsItem.classList.toggle('hidden', !hasPin);
        }
    }

    /**
     * Apply and save a role
     * @param {string} role
     */
    function applyRole(role) {
        if (!VALID_ROLES.includes(role)) return;

        try {
            localStorage.setItem(STORAGE_KEY_ROLE, role);
        } catch (e) {
            console.warn('Unable to persist role preference:', e);
        }

        syncRoleUI(role);

        // Announce change
        announce(`View mode set to ${getRoleTitle(role)}.`);

        // Close user dropdown if open
        const userMenu = document.getElementById('user-dropdown-menu');
        const userBtn = document.getElementById('user-pill-btn');
        if (userMenu && userMenu.classList.contains('active')) {
            userMenu.classList.remove('active');
            if (userBtn) userBtn.setAttribute('aria-expanded', 'false');
        }

        // Close modal
        closeModal();

        // Broadcast events
        window.dispatchEvent(new CustomEvent('hl:role-changed', { detail: { role } }));
        window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { key: STORAGE_KEY_ROLE, value: role } }));
    }

    /**
     * Open PIN Modal with a specific subview
     * @param {'setup'|'unlock'|'manage'} view
     */
    function openModal(view) {
        const modal = document.getElementById('role-pin-modal');
        if (!modal) return;

        // Close user dropdown menu if open
        const userMenu = document.getElementById('user-dropdown-menu');
        const userBtn = document.getElementById('user-pill-btn');
        if (userMenu && userMenu.classList.contains('active')) {
            userMenu.classList.remove('active');
            if (userBtn) userBtn.setAttribute('aria-expanded', 'false');
        }

        const setupView = document.getElementById('role-pin-setup-view');
        const unlockView = document.getElementById('role-pin-unlock-view');
        const manageView = document.getElementById('role-pin-manage-view');

        if (setupView) setupView.classList.toggle('hidden', view !== 'setup');
        if (unlockView) unlockView.classList.toggle('hidden', view !== 'unlock');
        if (manageView) manageView.classList.toggle('hidden', view !== 'manage');

        modal.classList.remove('hidden');

        if (view === 'setup') {
            const targetText = document.getElementById('role-setup-target-text');
            if (targetText && pendingTargetRole) {
                targetText.textContent = `Switching to ${getRoleTitle(pendingTargetRole)} Mode`;
            }
            const input = document.getElementById('role-new-pin');
            if (input) {
                input.value = '';
                setTimeout(() => input.focus(), 80);
            }
        } else if (view === 'unlock') {
            const unlockTargetName = document.getElementById('role-unlock-target-name');
            if (unlockTargetName && pendingTargetRole) {
                unlockTargetName.textContent = `${getRoleTitle(pendingTargetRole)} Mode`;
            }
            const unlockErr = document.getElementById('role-unlock-error');
            if (unlockErr) unlockErr.classList.add('hidden');
            const input = document.getElementById('role-unlock-pin');
            if (input) {
                input.value = '';
                setTimeout(() => input.focus(), 80);
            }
        } else if (view === 'manage') {
            const manageErr = document.getElementById('role-manage-error');
            const manageSucc = document.getElementById('role-manage-success');
            if (manageErr) manageErr.classList.add('hidden');
            if (manageSucc) manageSucc.classList.add('hidden');
            const curInput = document.getElementById('role-manage-current-pin');
            const newInput = document.getElementById('role-manage-new-pin');
            if (curInput) curInput.value = '';
            if (newInput) newInput.value = '';
            setTimeout(() => { if (curInput) curInput.focus(); }, 80);
        }
    }

    /**
     * Close PIN Modal
     */
    function closeModal() {
        const modal = document.getElementById('role-pin-modal');
        if (modal) {
            modal.classList.add('hidden');
        }
        pendingTargetRole = null;
    }

    /**
     * Request a role switch (evaluates PIN requirements)
     * @param {string} targetRole
     */
    function requestRoleSwitch(targetRole) {
        if (!VALID_ROLES.includes(targetRole)) return;

        const currentRole = getActiveRole();
        if (targetRole === currentRole) {
            const userMenu = document.getElementById('user-dropdown-menu');
            if (userMenu) userMenu.classList.remove('active');
            return;
        }

        // Switching to 'all' or 'student' is always immediate
        if (targetRole === 'all' || targetRole === 'student') {
            applyRole(targetRole);
            return;
        }

        // Target is 'teacher' or 'parent'
        const storedPin = getStoredPin();

        // If no PIN set yet, show setup prompt so user can choose to set one or skip
        if (!storedPin) {
            pendingTargetRole = targetRole;
            openModal('setup');
            return;
        }

        // If PIN is set, check current role
        if (currentRole === 'student' || currentRole === 'all') {
            // Require PIN unlock
            pendingTargetRole = targetRole;
            openModal('unlock');
            return;
        }

        // If already in adult mode ('teacher' or 'parent'), switch between them directly
        applyRole(targetRole);
    }

    /**
     * Initialize DOM Event Listeners
     */
    function initListeners() {
        // Dropdown role switch buttons
        const roleBtns = document.querySelectorAll('.role-switch-btn');
        roleBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const target = btn.getAttribute('data-role');
                requestRoleSwitch(target);
            });
        });

        // Manage PIN item in dropdown
        const managePinBtn = document.getElementById('role-manage-pin-item');
        if (managePinBtn) {
            managePinBtn.addEventListener('click', (e) => {
                e.preventDefault();
                openModal('manage');
            });
        }

        // Modal Close Button
        const modalClose = document.getElementById('role-pin-modal-close');
        if (modalClose) {
            modalClose.addEventListener('click', closeModal);
        }

        // Modal Backdrop Click
        const modal = document.getElementById('role-pin-modal');
        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal();
            });
        }

        // Setup View Buttons
        const setupSkipBtn = document.getElementById('role-pin-skip-btn');
        if (setupSkipBtn) {
            setupSkipBtn.addEventListener('click', () => {
                if (pendingTargetRole) applyRole(pendingTargetRole);
            });
        }

        const setupSetBtn = document.getElementById('role-pin-set-btn');
        const setupPinInput = document.getElementById('role-new-pin');
        const handleSetupSubmit = () => {
            if (!setupPinInput) return;
            const val = setupPinInput.value.trim();
            if (val.length === 4 && /^\d{4}$/.test(val)) {
                try {
                    localStorage.setItem(STORAGE_KEY_PIN, val);
                } catch (e) {
                    console.warn('Error saving PIN:', e);
                }
                if (pendingTargetRole) applyRole(pendingTargetRole);
            } else {
                setupPinInput.focus();
                setupPinInput.style.borderColor = 'var(--color-error, #ef4444)';
                setTimeout(() => {
                    setupPinInput.style.borderColor = 'var(--color-border)';
                }, 1500);
            }
        };

        if (setupSetBtn) setupSetBtn.addEventListener('click', handleSetupSubmit);
        if (setupPinInput) {
            setupPinInput.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') handleSetupSubmit();
            });
        }

        // Unlock View Buttons
        const unlockCancelBtn = document.getElementById('role-unlock-cancel-btn');
        if (unlockCancelBtn) unlockCancelBtn.addEventListener('click', closeModal);

        const unlockSubmitBtn = document.getElementById('role-unlock-submit-btn');
        const unlockPinInput = document.getElementById('role-unlock-pin');
        const unlockErr = document.getElementById('role-unlock-error');

        const handleUnlockSubmit = () => {
            if (!unlockPinInput) return;
            const val = unlockPinInput.value.trim();
            const storedPin = getStoredPin();

            if (val === storedPin) {
                if (unlockErr) unlockErr.classList.add('hidden');
                if (pendingTargetRole) applyRole(pendingTargetRole);
            } else {
                if (unlockErr) unlockErr.classList.remove('hidden');
                unlockPinInput.value = '';
                unlockPinInput.focus();
                unlockPinInput.style.borderColor = 'var(--color-error, #ef4444)';
                setTimeout(() => {
                    unlockPinInput.style.borderColor = 'var(--color-border)';
                }, 1500);
            }
        };

        if (unlockSubmitBtn) unlockSubmitBtn.addEventListener('click', handleUnlockSubmit);
        if (unlockPinInput) {
            unlockPinInput.addEventListener('keydown', (e) => {
                if (e.key === 'Enter') handleUnlockSubmit();
            });
        }

        // Manage View Buttons
        const manageCloseBtn = document.getElementById('role-manage-close-btn');
        if (manageCloseBtn) manageCloseBtn.addEventListener('click', closeModal);

        const manageSaveBtn = document.getElementById('role-manage-save-btn');
        const curPinInput = document.getElementById('role-manage-current-pin');
        const newPinInput = document.getElementById('role-manage-new-pin');
        const manageErr = document.getElementById('role-manage-error');
        const manageSucc = document.getElementById('role-manage-success');

        const handleManageSave = () => {
            const storedPin = getStoredPin();
            const curVal = curPinInput ? curPinInput.value.trim() : '';
            const newVal = newPinInput ? newPinInput.value.trim() : '';

            // Verify current PIN if one is set
            if (storedPin && curVal !== storedPin) {
                if (manageErr) {
                    manageErr.textContent = 'Current PIN is incorrect.';
                    manageErr.classList.remove('hidden');
                }
                if (curPinInput) curPinInput.focus();
                return;
            }

            if (newVal === '') {
                // Remove PIN
                try {
                    localStorage.removeItem(STORAGE_KEY_PIN);
                } catch (e) {}
                if (manageSucc) {
                    manageSucc.textContent = 'Mode PIN removed successfully.';
                    manageSucc.classList.remove('hidden');
                }
                if (manageErr) manageErr.classList.add('hidden');
                syncRoleUI(getActiveRole());
                setTimeout(closeModal, 1200);
            } else if (newVal.length === 4 && /^\d{4}$/.test(newVal)) {
                // Update PIN
                try {
                    localStorage.setItem(STORAGE_KEY_PIN, newVal);
                } catch (e) {}
                if (manageSucc) {
                    manageSucc.textContent = 'PIN updated successfully.';
                    manageSucc.classList.remove('hidden');
                }
                if (manageErr) manageErr.classList.add('hidden');
                syncRoleUI(getActiveRole());
                setTimeout(closeModal, 1200);
            } else {
                if (manageErr) {
                    manageErr.textContent = 'New PIN must be exactly 4 numbers.';
                    manageErr.classList.remove('hidden');
                }
                if (newPinInput) newPinInput.focus();
            }
        };

        if (manageSaveBtn) manageSaveBtn.addEventListener('click', handleManageSave);

        // Escape Key Listener to dismiss modal
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                const modal = document.getElementById('role-pin-modal');
                if (modal && !modal.classList.contains('hidden')) {
                    closeModal();
                }
            }
        });

        // Multi-Tab & Event Synchronization
        window.addEventListener('storage', (e) => {
            if (e.key === STORAGE_KEY_ROLE && e.newValue) {
                syncRoleUI(e.newValue);
            } else if (e.key === STORAGE_KEY_PIN) {
                syncRoleUI(getActiveRole());
            }
        });
    }

    // Initialize immediately if DOM is ready, or on DOMContentLoaded
    const initialRole = getActiveRole();
    document.documentElement.setAttribute('data-active-role', initialRole);

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            syncRoleUI(initialRole);
            initListeners();
        });
    } else {
        syncRoleUI(initialRole);
        initListeners();
    }

    // Public API
    window.HLRoleManager = {
        getRole: getActiveRole,
        setRole: requestRoleSwitch,
        hasPin: () => Boolean(getStoredPin()),
        openPinManager: () => openModal('manage')
    };
})();
