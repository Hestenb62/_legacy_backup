<!-- Multi-Profile Switcher Modal -->
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
