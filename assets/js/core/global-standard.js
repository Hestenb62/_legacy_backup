/**
 * Hesten's Learning - Standard Functionality
 * Handles Mobile Menu and Dynamic Copyright
 */

document.addEventListener('DOMContentLoaded', function () {

    // --- Mobile Navigation Toggle ---
    const menuToggle = document.getElementById('nav-toggle') || document.querySelector('.mobile-menu-toggle');
    const navContent = document.getElementById('nav-content') || document.querySelector('.navbar-nav');

    if (menuToggle && navContent) {
        menuToggle.addEventListener('click', function () {
            // Toggle 'hidden' class for Tailwind, or 'active' for custom CSS
            if (navContent.classList.contains('hidden')) {
                navContent.classList.remove('hidden');
            } else {
                navContent.classList.add('hidden');
            }

            // Also toggle 'active' for legacy support
            navContent.classList.toggle('active');

            // Optional: Toggle icon between bars and times (X)
            const icon = menuToggle.querySelector('i');
            if (icon) {
                // Check if open (not hidden)
                if (!navContent.classList.contains('hidden') || navContent.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }
        });
    }

    // --- Dynamic Copyright Year ---
    const yearSpan = document.querySelector('.copyright-year');
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }
});

// --- Tripartite Data Synchronization Bus (Student, Teacher, Parent) ---
(function() {
    'use strict';

    // Helper: Safely parse JSON from localStorage
    function safeGetJson(key, fallback = null) {
        try {
            const val = localStorage.getItem(key);
            return val ? JSON.parse(val) : fallback;
        } catch (e) {
            return fallback;
        }
    }

    // Helper: Safely save JSON to localStorage
    function safeSetJson(key, val) {
        try {
            localStorage.setItem(key, JSON.stringify(val));
        } catch (e) {}
    }

    // Synchronize student mastery achievements into teacher classroom roster
    function syncMasteryToTeacherRoster(standardsMap) {
        if (!standardsMap || typeof standardsMap !== 'object') return;
        const roster = safeGetJson('hesten_teacher_roster');
        if (!Array.isArray(roster) || roster.length === 0) return;

        const profile = safeGetJson('hesten-user-profile') || safeGetJson('hesten_user_profile') || {};
        const studentName = profile.firstName || profile.displayName || profile.name;
        if (!studentName) return;

        const idx = roster.findIndex(s => s && s.name && s.name.toLowerCase() === studentName.toLowerCase());
        if (idx >= 0) {
            const current = roster[idx];
            const updatedStandards = { ...(current.standards || {}), ...standardsMap };
            
            // Recalculate subject mastery averages if standard codes are mapped
            let mathSum = 0, mathCount = 0, elaSum = 0, elaCount = 0;
            for (const [code, score] of Object.entries(updatedStandards)) {
                const num = Number(score) || 0;
                if (/^(K|1|2|3|4|5|6|7|8|HS)\.(CC|OA|NBT|NF|MD|G|RP|NS|EE|F|SP|A|S)/i.test(code) || /math/i.test(code)) {
                    mathSum += num; mathCount++;
                } else if (/^(PK|K|1|2|3|4|5|6|7|8|HS)\.(RL|RI|RF|W|SL|L)/i.test(code) || /ela|read/i.test(code)) {
                    elaSum += num; elaCount++;
                }
            }

            if (mathCount > 0) current.math = Math.round(mathSum / mathCount);
            if (elaCount > 0) current.ela = Math.round(elaSum / elaCount);
            current.standards = updatedStandards;
            current.lastCheck = 'Just now';

            roster[idx] = current;
            safeSetJson('hesten_teacher_roster', roster);
            window.dispatchEvent(new CustomEvent('hl:roster-updated', { detail: roster }));
        }
    }

    // Synchronize parent accommodations into student experience and teacher roster
    function syncAccommodationsAcrossRoles(accommodationsList) {
        if (!Array.isArray(accommodationsList)) return;
        
        // Notify any active reader or layout components
        window.dispatchEvent(new CustomEvent('hl:accommodations-updated', { detail: accommodationsList }));

        // Check and sync to matching student in teacher roster
        const roster = safeGetJson('hesten_teacher_roster');
        if (!Array.isArray(roster) || roster.length === 0) return;

        const profile = safeGetJson('hesten-user-profile') || safeGetJson('hesten_user_profile') || {};
        const studentName = profile.firstName || profile.displayName || profile.name;
        if (!studentName) return;

        const idx = roster.findIndex(s => s && s.name && s.name.toLowerCase() === studentName.toLowerCase());
        if (idx >= 0) {
            roster[idx].accommodations = accommodationsList;
            safeSetJson('hesten_teacher_roster', roster);
            window.dispatchEvent(new CustomEvent('hl:roster-updated', { detail: roster }));
        }
    }

    // Synchronize teacher notes & observations into active student profile
    function syncTeacherNotesToStudentProfile(studentName, notes, teacherAccoms = null) {
        if (!studentName) return;
        const profileKey = localStorage.getItem('hesten-user-profile') ? 'hesten-user-profile' : 'hesten_user_profile';
        const profile = safeGetJson(profileKey) || {};
        const activeName = profile.firstName || profile.displayName || profile.name;
        
        if (activeName && activeName.toLowerCase() === studentName.toLowerCase()) {
            profile.educatorNotes = notes || '';
            profile.educatorNotesUpdatedAt = new Date().toISOString();
            if (Array.isArray(teacherAccoms)) {
                profile.teacherAccommodations = teacherAccoms;
            }
            safeSetJson(profileKey, profile);
            window.dispatchEvent(new CustomEvent('hl:profile-updated', { detail: profile }));
            window.dispatchEvent(new CustomEvent('hl:teacher-notes-updated', { detail: { studentName, notes, teacherAccoms } }));
        }
    }

    // Check teacher roster updates to bridge notes/accommodations to student profile
    function syncRosterToStudentProfile(roster) {
        if (!Array.isArray(roster) || roster.length === 0) return;
        const profileKey = localStorage.getItem('hesten-user-profile') ? 'hesten-user-profile' : 'hesten_user_profile';
        const profile = safeGetJson(profileKey) || {};
        const activeName = profile.firstName || profile.displayName || profile.name;
        if (!activeName) return;

        const match = roster.find(s => s && s.name && s.name.toLowerCase() === activeName.toLowerCase());
        if (match) {
            let changed = false;
            if (match.notes !== undefined && match.notes !== profile.educatorNotes) {
                profile.educatorNotes = match.notes;
                profile.educatorNotesUpdatedAt = new Date().toISOString();
                changed = true;
            }
            if (Array.isArray(match.accommodations) && JSON.stringify(match.accommodations) !== JSON.stringify(profile.teacherAccommodations)) {
                profile.teacherAccommodations = match.accommodations;
                changed = true;
            }
            if (changed) {
                safeSetJson(profileKey, profile);
                window.dispatchEvent(new CustomEvent('hl:profile-updated', { detail: profile }));
            }
        }
    }

    // Synchronize parent home observations & insights into teacher classroom roster
    function syncParentNotesToTeacherRoster(studentName, notes) {
        if (!studentName || !notes) return;
        const roster = safeGetJson('hesten_teacher_roster');
        if (!Array.isArray(roster) || roster.length === 0) return;

        const idx = roster.findIndex(s => s && s.name && s.name.toLowerCase() === studentName.toLowerCase());
        if (idx >= 0) {
            roster[idx].parentNotes = notes;
            safeSetJson('hesten_teacher_roster', roster);
            window.dispatchEvent(new CustomEvent('hl:roster-updated', { detail: roster }));
            window.dispatchEvent(new CustomEvent('hl:parent-notes-updated', { detail: { studentName, notes } }));
        }
    }

    // Real-Time Cross-Tab Storage Listener
    window.addEventListener('storage', function(e) {
        if (!e.key) return;

        if (e.key === 'hesten_standards_mastery') {
            const mastery = safeGetJson('hesten_standards_mastery');
            syncMasteryToTeacherRoster(mastery);
            window.dispatchEvent(new CustomEvent('hl:mastery-updated', { detail: mastery }));
        } else if (e.key === 'hesten_parent_accommodations') {
            const accoms = safeGetJson('hesten_parent_accommodations');
            syncAccommodationsAcrossRoles(accoms);
        } else if (e.key === 'hesten_parent_iep_notes') {
            const profile = safeGetJson('hesten-user-profile') || safeGetJson('hesten_user_profile') || {};
            const studentName = profile.firstName || profile.displayName || profile.name;
            const notes = localStorage.getItem('hesten_parent_iep_notes');
            if (studentName && notes) {
                syncParentNotesToTeacherRoster(studentName, notes);
            }
        } else if (e.key === 'hesten-user-profile' || e.key === 'hesten_user_profile') {
            const profile = safeGetJson(e.key);
            window.dispatchEvent(new CustomEvent('hl:profile-updated', { detail: profile }));
        } else if (e.key === 'hesten_teacher_roster') {
            const roster = safeGetJson('hesten_teacher_roster');
            syncRosterToStudentProfile(roster);
            window.dispatchEvent(new CustomEvent('hl:roster-updated', { detail: roster }));
        }
    });

    // Expose Global Sync Dispatcher for Modules
    window.hlBroadcastSync = function(topic, data) {
        if (topic === 'mastery') {
            syncMasteryToTeacherRoster(data);
        } else if (topic === 'accommodations') {
            syncAccommodationsAcrossRoles(data);
        } else if (topic === 'teacher-notes' && data) {
            syncTeacherNotesToStudentProfile(data.student || data.studentName, data.notes, data.accommodations);
        } else if (topic === 'parent-notes' && data) {
            syncParentNotesToTeacherRoster(data.student || data.studentName, data.notes);
        } else if (topic === 'roster' && Array.isArray(data)) {
            syncRosterToStudentProfile(data);
        }
        window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { topic, data } }));
    };

    // --- Universal Resource Provider & Law Firm Disclosure Popovers ---
    window.toggleResourceDisclosure = function (triggerBtn, event) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }
        const wrap = triggerBtn.closest('.resource-disclosure-wrap');
        if (!wrap) return;
        const popover = wrap.querySelector('.resource-disclosure-popover');
        if (!popover) return;

        const isExpanded = triggerBtn.getAttribute('aria-expanded') === 'true';
        if (isExpanded) {
            window.closeResourceDisclosure(triggerBtn, event);
        } else {
            // Close any open popovers first
            document.querySelectorAll('.resource-disclosure-popover.active').forEach(p => {
                p.classList.remove('active');
                const btn = p.closest('.resource-disclosure-wrap')?.querySelector('.resource-disclosure-btn');
                if (btn) btn.setAttribute('aria-expanded', 'false');
            });

            popover.classList.add('active');
            triggerBtn.setAttribute('aria-expanded', 'true');
        }
    };

    window.closeResourceDisclosure = function (element, event) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }
        const wrap = element.closest('.resource-disclosure-wrap');
        if (!wrap) return;
        const popover = wrap.querySelector('.resource-disclosure-popover');
        const triggerBtn = wrap.querySelector('.resource-disclosure-btn');
        if (popover) popover.classList.remove('active');
        if (triggerBtn) {
            triggerBtn.setAttribute('aria-expanded', 'false');
            triggerBtn.focus();
        }
    };

    // Global click-outside listener to dismiss resource disclosures
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.resource-disclosure-wrap')) {
            document.querySelectorAll('.resource-disclosure-popover.active').forEach(p => {
                p.classList.remove('active');
                const btn = p.closest('.resource-disclosure-wrap')?.querySelector('.resource-disclosure-btn');
                if (btn) btn.setAttribute('aria-expanded', 'false');
            });
        }
    });

    // Global Escape key listener to dismiss active resource disclosures
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' || e.key === 'Esc') {
            const activePopover = document.querySelector('.resource-disclosure-popover.active');
            if (activePopover) {
                window.closeResourceDisclosure(activePopover, e);
            }
        }
    });

    // --- Universal Platform Active Development Notice Dismissal ---
    window.dismissHlDevNotice = function (closeBtn) {
        const banner = closeBtn ? closeBtn.closest('.hl-dev-notice-banner') : document.getElementById('hl-dev-notice-banner');
        if (banner) {
            banner.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
            banner.style.opacity = '0';
            banner.style.transform = 'translateY(-6px)';
            setTimeout(() => {
                banner.style.display = 'none';
            }, 250);
            try {
                sessionStorage.setItem('hl_dev_notice_dismissed', 'true');
            } catch (e) {}
        }
    };

    // Auto-hide development notice if dismissed in this session
    try {
        if (sessionStorage.getItem('hl_dev_notice_dismissed') === 'true') {
            const banner = document.getElementById('hl-dev-notice-banner');
            if (banner) {
                banner.style.display = 'none';
            }
        }
    } catch (e) {}
})();
