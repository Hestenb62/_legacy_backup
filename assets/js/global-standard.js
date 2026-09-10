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
        } else if (e.key === 'hesten-user-profile' || e.key === 'hesten_user_profile') {
            const profile = safeGetJson(e.key);
            window.dispatchEvent(new CustomEvent('hl:profile-updated', { detail: profile }));
        } else if (e.key === 'hesten_teacher_roster') {
            const roster = safeGetJson('hesten_teacher_roster');
            window.dispatchEvent(new CustomEvent('hl:roster-updated', { detail: roster }));
        }
    });

    // Expose Global Sync Dispatcher for Modules
    window.hlBroadcastSync = function(topic, data) {
        if (topic === 'mastery') {
            syncMasteryToTeacherRoster(data);
        } else if (topic === 'accommodations') {
            syncAccommodationsAcrossRoles(data);
        }
        window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { topic, data } }));
    };
})();