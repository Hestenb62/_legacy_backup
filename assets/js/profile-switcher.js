/**
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
