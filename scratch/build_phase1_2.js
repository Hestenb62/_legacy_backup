const fs = require('fs');
const path = require('path');

function ensureDir(dir) {
  if (!fs.existsSync(dir)) {
    fs.mkdirSync(dir, { recursive: true });
  }
}

// Ensure asset directories exist
ensureDir('assets/js');
ensureDir('assets/css');
ensureDir('assets/js/reader');
ensureDir('assets/css/reader');
ensureDir('assets/js/assessment');
ensureDir('assets/css/assessment');
ensureDir('assets/js/gamification');
ensureDir('assets/js/labs');
ensureDir('assets/css/labs');
ensureDir('assets/js/teacher');
ensureDir('assets/css/teacher');
ensureDir('assets/js/standards');
ensureDir('assets/css/standards');
ensureDir('src/partials');

// 1. assets/js/profile-switcher.js
const profileSwitcherJs = `/**
 * assets/js/profile-switcher.js
 * Multi-Profile Family & Classroom Switcher for Hesten's Learning.
 * Enables switching between student siblings, teacher, and parent profiles
 * with isolated data namespaces, seamless cross-role sync, and instant UI updates.
 */

(function () {
  'use strict';

  const DEFAULT_PROFILES = [
    {
      id: 'student-primary',
      name: 'Alex',
      role: 'student',
      grade: '5',
      avatar: '/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png',
      level: 12,
      xp: 1450
    },
    {
      id: 'student-early',
      name: 'Maya',
      role: 'student',
      grade: 'K',
      avatar: '/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png',
      level: 4,
      xp: 380
    },
    {
      id: 'parent-hub',
      name: 'Family Guardian',
      role: 'parent',
      grade: 'All Grades',
      avatar: '/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png',
      level: null,
      xp: null
    },
    {
      id: 'teacher-hub',
      name: 'Ms. Hesten',
      role: 'teacher',
      grade: 'Classroom',
      avatar: '/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png',
      level: null,
      xp: null
    }
  ];

  function getProfiles() {
    try {
      const stored = localStorage.getItem('hl_multi_profiles');
      if (stored) {
        return JSON.parse(stored);
      }
    } catch (e) {}
    saveProfiles(DEFAULT_PROFILES);
    return DEFAULT_PROFILES;
  }

  function saveProfiles(profiles) {
    try {
      localStorage.setItem('hl_multi_profiles', JSON.stringify(profiles));
    } catch (e) {}
  }

  function getActiveProfileId() {
    return localStorage.getItem('hl_active_profile_id') || 'student-primary';
  }

  function snapshotActiveProfile(currentId) {
    if (!currentId) return;
    const snapshot = {
      profile: localStorage.getItem('hesten-user-profile'),
      gamification: localStorage.getItem('hl_gamification_profile'),
      mastery: localStorage.getItem('hesten_standards_mastery'),
      bookmarks: localStorage.getItem('library-bookmarks'),
      accommodations: localStorage.getItem('hesten_parent_accommodations')
    };
    try {
      localStorage.setItem('hl_profile_data_' + currentId, JSON.stringify(snapshot));
    } catch (e) {}
  }

  function switchProfile(targetId) {
    const currentId = getActiveProfileId();
    if (currentId === targetId) {
      closeProfileModal();
      return;
    }

    snapshotActiveProfile(currentId);

    try {
      const rawData = localStorage.getItem('hl_profile_data_' + targetId);
      if (rawData) {
        const data = JSON.parse(rawData);
        if (data.profile) localStorage.setItem('hesten-user-profile', data.profile);
        if (data.gamification) localStorage.setItem('hl_gamification_profile', data.gamification);
        if (data.mastery) localStorage.setItem('hesten_standards_mastery', data.mastery);
        if (data.bookmarks) localStorage.setItem('library-bookmarks', data.bookmarks);
        if (data.accommodations) localStorage.setItem('hesten_parent_accommodations', data.accommodations);
      } else {
        const profiles = getProfiles();
        const p = profiles.find(x => x.id === targetId);
        if (p) {
          const newProfile = {
            firstName: p.name,
            role: p.role,
            grade: p.grade,
            avatarData: p.avatar,
            xp: p.xp || 0,
            level: p.level || 1
          };
          localStorage.setItem('hesten-user-profile', JSON.stringify(newProfile));
        }
      }
      localStorage.setItem('hl_active_profile_id', targetId);
    } catch (e) {}

    window.dispatchEvent(new CustomEvent('hl:profile-updated', { detail: { profileId: targetId } }));
    window.dispatchEvent(new CustomEvent('hl:data-sync', { detail: { source: 'profile-switch' } }));

    if (window.HLSound) {
      window.HLSound.playLevelUp();
    }

    closeProfileModal();

    const profiles = getProfiles();
    const target = profiles.find(p => p.id === targetId);
    if (target) {
      if (target.role === 'teacher' && !window.location.pathname.includes('/pages/teachers.php')) {
        window.location.href = '/pages/teachers.php';
      } else if (target.role === 'parent' && !window.location.pathname.includes('/pages/parents.php')) {
        window.location.href = '/pages/parents.php';
      } else {
        window.location.reload();
      }
    }
  }

  function updateHeaderProfileBadge() {
    const activeId = getActiveProfileId();
    const profiles = getProfiles();
    const active = profiles.find(p => p.id === activeId) || profiles[0];

    const nameEls = document.querySelectorAll('.header-user-name, [data-profile-field="name"]');
    nameEls.forEach(el => el.textContent = active.name);

    const roleEls = document.querySelectorAll('[data-profile-field="role"]');
    roleEls.forEach(el => el.textContent = active.role.toUpperCase());
  }

  function openProfileModal() {
    const modal = document.getElementById('profile-switcher-modal');
    if (!modal) return;

    renderProfileList();
    modal.style.display = 'flex';
    modal.setAttribute('aria-hidden', 'false');

    const closeBtn = document.getElementById('profile-switcher-close');
    if (closeBtn) closeBtn.focus();
  }

  function closeProfileModal() {
    const modal = document.getElementById('profile-switcher-modal');
    if (!modal) return;
    modal.style.display = 'none';
    modal.setAttribute('aria-hidden', 'true');
  }

  function renderProfileList() {
    const container = document.getElementById('profile-switcher-list');
    if (!container) return;

    const profiles = getProfiles();
    const activeId = getActiveProfileId();

    container.innerHTML = profiles.map(p => {
      const isActive = p.id === activeId;
      return '<div class="profile-switcher-item ' + (isActive ? 'active' : '') + '" data-profile-id="' + p.id + '" tabindex="0" role="button" aria-pressed="' + isActive + '">' +
        '<div class="profile-item-avatar-wrap">' +
          '<img src="' + p.avatar + '" alt="" class="profile-item-avatar">' +
          (isActive ? '<span class="profile-active-check"><i class="fas fa-check"></i></span>' : '') +
        '</div>' +
        '<div class="profile-item-details">' +
          '<div class="profile-item-name">' + p.name + '</div>' +
          '<div class="profile-item-badges">' +
            '<span class="profile-pill-role role-' + p.role + '">' + p.role.toUpperCase() + '</span>' +
            (p.grade ? '<span class="profile-pill-grade">Grade ' + p.grade + '</span>' : '') +
            (p.xp ? '<span class="profile-pill-xp">' + p.xp + ' XP</span>' : '') +
          '</div>' +
        '</div>' +
        '<button type="button" class="profile-action-btn ' + (isActive ? 'btn-active' : '') + '">' +
          (isActive ? '<i class="fas fa-check"></i> Current' : 'Select') +
        '</button>' +
      '</div>';
    }).join('');

    container.querySelectorAll('.profile-switcher-item').forEach(item => {
      item.addEventListener('click', () => {
        switchProfile(item.dataset.profileId);
      });
      item.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          switchProfile(item.dataset.profileId);
        }
      });
    });
  }

  window.HLProfileSwitcher = {
    open: openProfileModal,
    close: closeProfileModal,
    switchProfile: switchProfile,
    getProfiles: getProfiles,
    getActiveProfileId: getActiveProfileId
  };

  document.addEventListener('DOMContentLoaded', () => {
    updateHeaderProfileBadge();

    document.querySelectorAll('[data-action="switch-profile"], .user-profile-trigger').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        openProfileModal();
      });
    });

    const closeBtn = document.getElementById('profile-switcher-close');
    if (closeBtn) closeBtn.addEventListener('click', closeProfileModal);

    window.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        const modal = document.getElementById('profile-switcher-modal');
        if (modal && modal.style.display === 'flex') {
          closeProfileModal();
        }
      }
    });
  });

})();
`;

fs.writeFileSync('assets/js/profile-switcher.js', profileSwitcherJs, 'utf8');

// 2. assets/css/profile-switcher.css
const profileSwitcherCss = `/* ==========================================================================
   assets/css/profile-switcher.css
   Multi-Profile Switcher Modal Styling
   ========================================================================== */

.profile-switcher-backdrop {
  position: fixed;
  inset: 0;
  z-index: 100000;
  display: none;
  align-items: center;
  justify-content: center;
  background: rgba(10, 15, 29, 0.85);
  backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  padding: 1rem;
}

.profile-switcher-modal {
  position: relative;
  width: 100%;
  max-width: 520px;
  background: var(--bg-card, #ffffff);
  border: 1px solid var(--border-color, rgba(0, 0, 0, 0.1));
  border-radius: 20px;
  box-shadow: 0 20px 45px -10px rgba(0, 0, 0, 0.35);
  padding: 1.75rem;
  display: flex;
  flex-direction: column;
  gap: 1.25rem;
  color: var(--text-color, #1e293b);
  animation: profileModalIn 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}

[data-theme="dark"] .profile-switcher-modal {
  background: #111827;
  border-color: rgba(255, 255, 255, 0.12);
  color: #f3f4f6;
}

@keyframes profileModalIn {
  from { opacity: 0; transform: scale(0.96) translateY(8px); }
  to { opacity: 1; transform: scale(1) translateY(0); }
}

.profile-switcher-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-bottom: 1px solid var(--border-color, rgba(0, 0, 0, 0.08));
  padding-bottom: 0.75rem;
}

.profile-switcher-title {
  margin: 0;
  font-size: 1.25rem;
  font-weight: 800;
  display: flex;
  align-items: center;
  gap: 0.5rem;
  color: var(--color-blue, #2563eb);
}

.profile-switcher-close {
  background: transparent;
  border: none;
  font-size: 1.25rem;
  cursor: pointer;
  color: #64748b;
  padding: 0.25rem 0.5rem;
  border-radius: 8px;
  transition: all 0.2s ease;
}

.profile-switcher-close:hover,
.profile-switcher-close:focus-visible {
  color: #0f172a;
  background: rgba(0, 0, 0, 0.06);
  outline: 2px solid #2563eb;
}

[data-theme="dark"] .profile-switcher-close:hover {
  color: #ffffff;
  background: rgba(255, 255, 255, 0.1);
}

.profile-switcher-list {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
  max-height: 380px;
  overflow-y: auto;
  padding-right: 0.25rem;
}

.profile-switcher-item {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 0.85rem 1rem;
  border-radius: 14px;
  border: 2px solid transparent;
  background: var(--bg-hover, #f8fafc);
  cursor: pointer;
  transition: all 0.2s ease;
}

[data-theme="dark"] .profile-switcher-item {
  background: #1f2937;
}

.profile-switcher-item:hover,
.profile-switcher-item:focus-visible {
  transform: translateY(-2px);
  border-color: #3b82f6;
  outline: none;
  box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
}

.profile-switcher-item.active {
  border-color: #2563eb;
  background: rgba(37, 99, 235, 0.06);
}

[data-theme="dark"] .profile-switcher-item.active {
  background: rgba(37, 99, 235, 0.18);
}

.profile-item-avatar-wrap {
  position: relative;
  width: 46px;
  height: 46px;
  flex-shrink: 0;
}

.profile-item-avatar {
  width: 100%;
  height: 100%;
  border-radius: 50%;
  object-fit: cover;
  border: 2px solid #3b82f6;
}

.profile-active-check {
  position: absolute;
  bottom: -2px;
  right: -2px;
  width: 18px;
  height: 18px;
  border-radius: 50%;
  background: #10b981;
  color: #ffffff;
  font-size: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 2px solid #ffffff;
}

.profile-item-details {
  flex: 1;
  min-width: 0;
}

.profile-item-name {
  font-weight: 700;
  font-size: 1rem;
  margin-bottom: 0.25rem;
}

.profile-item-badges {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  flex-wrap: wrap;
}

.profile-pill-role {
  font-size: 0.7rem;
  font-weight: 800;
  padding: 0.15rem 0.45rem;
  border-radius: 6px;
  text-transform: uppercase;
  letter-spacing: 0.04em;
}

.role-student { background: rgba(59, 130, 246, 0.15); color: #2563eb; }
.role-teacher { background: rgba(16, 185, 129, 0.15); color: #059669; }
.role-parent { background: rgba(236, 72, 153, 0.15); color: #db2777; }

.profile-pill-grade,
.profile-pill-xp {
  font-size: 0.75rem;
  color: #64748b;
  font-weight: 600;
}

[data-theme="dark"] .profile-pill-grade,
[data-theme="dark"] .profile-pill-xp {
  color: #9ca3af;
}

.profile-action-btn {
  padding: 0.4rem 0.85rem;
  border-radius: 8px;
  font-size: 0.85rem;
  font-weight: 700;
  border: 1px solid rgba(0, 0, 0, 0.1);
  background: #ffffff;
  color: #1e293b;
  cursor: pointer;
  transition: all 0.15s ease;
}

[data-theme="dark"] .profile-action-btn {
  background: #374151;
  color: #f3f4f6;
  border-color: rgba(255, 255, 255, 0.1);
}

.profile-action-btn.btn-active {
  background: #2563eb;
  color: #ffffff;
  border-color: #2563eb;
}
`;

fs.writeFileSync('assets/css/profile-switcher.css', profileSwitcherCss, 'utf8');

// 3. src/partials/profile-switcher-modal.php
const profileSwitcherModalPhp = `<!-- Multi-Profile Switcher Modal -->
<link rel="stylesheet" href="/assets/css/profile-switcher.css">

<div id="profile-switcher-modal" class="profile-switcher-backdrop" role="dialog" aria-modal="true" aria-labelledby="profile-modal-title" style="display: none;">
  <div class="profile-switcher-modal">
    <div class="profile-switcher-header">
      <h3 id="profile-modal-title" class="profile-switcher-title">
        <i class="fas fa-users-cog" aria-hidden="true"></i> Switch Learner Profile
      </h3>
      <button type="button" id="profile-switcher-close" class="profile-switcher-close" aria-label="Close profile switcher">
        <i class="fas fa-times" aria-hidden="true"></i>
      </button>
    </div>

    <p style="margin: 0; font-size: 0.88rem; color: var(--text-muted, #64748b); line-height: 1.4;">
      Select an active student sibling, parent oversight, or educator dossier. Your progress and preferences stay cleanly separated.
    </p>

    <div id="profile-switcher-list" class="profile-switcher-list" role="listbox" aria-label="Profiles list">
      <!-- Dynamically populated by assets/js/profile-switcher.js -->
    </div>
  </div>
</div>
`;

fs.writeFileSync('src/partials/profile-switcher-modal.php', profileSwitcherModalPhp, 'utf8');

console.log('Phase 1 core assets created successfully.');
