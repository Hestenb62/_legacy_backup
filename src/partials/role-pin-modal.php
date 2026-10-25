<?php
// src/partials/role-pin-modal.php
// Modal dialog for Role & Persona Mode PIN protection and mode selection.
?>
<!-- Role Mode & PIN Security Modal -->
<div id="role-pin-modal" class="shortcuts-modal-backdrop hidden" role="dialog" aria-modal="true" aria-labelledby="role-pin-modal-title" style="z-index: 1300;">
    <div class="shortcuts-modal-panel role-pin-panel" style="max-width: 440px;">
        <div class="shortcuts-modal-header">
            <div class="shortcuts-header-title" style="display: flex; align-items: center; gap: 0.6rem;">
                <i class="fas fa-shield-alt shortcuts-title-icon" id="role-pin-icon" style="color: var(--color-primary);" aria-hidden="true"></i>
                <h2 id="role-pin-modal-title" style="font-size: 1.15rem; font-weight: 700; margin: 0;">Switch Mode</h2>
            </div>
            <button type="button" class="shortcuts-close-btn" id="role-pin-modal-close" aria-label="Close mode modal">
                <i class="fas fa-times" aria-hidden="true"></i>
            </button>
        </div>

        <div class="shortcuts-modal-body" style="padding: 1.25rem;">
            <!-- Setup State: Prompted when switching to Teacher/Parent for the first time without a PIN -->
            <div id="role-pin-setup-view" class="role-modal-subview">
                <div class="role-modal-badge" id="role-modal-target-badge">
                    <i class="fas fa-chalkboard-teacher"></i> <span id="role-setup-target-text">Switching to Teacher Mode</span>
                </div>
                <p class="role-modal-desc" style="font-size: 0.9rem; color: var(--color-text-muted); margin-bottom: 1rem; line-height: 1.45;">
                    Educator and Parent modes grant full access to lesson planning, pacing guides, diagnostic rosters, and student accommodations.
                </p>
                <div class="role-pin-setup-box" style="background: var(--color-bg-surface); border: 1px solid var(--color-border); border-radius: var(--radius-lg); padding: 1rem; margin-bottom: 1.25rem;">
                    <label for="role-new-pin" style="display: block; font-weight: 700; font-size: 0.85rem; margin-bottom: 0.35rem; color: var(--color-text-main);">
                        <i class="fas fa-lock" style="color: var(--color-primary); margin-right: 0.3rem;"></i> Set a 4-Digit PIN (Optional)
                    </label>
                    <p style="font-size: 0.78rem; color: var(--color-text-muted); margin-bottom: 0.75rem; line-height: 1.4;">
                        Setting a PIN prevents students from switching back out of Student mode into Teacher or Parent mode.
                    </p>
                    <div style="display: flex; gap: 0.75rem; align-items: center;">
                        <input type="password" id="role-new-pin" inputmode="numeric" pattern="[0-9]*" maxlength="4" placeholder="••••"
                            style="width: 130px; font-size: 1.35rem; letter-spacing: 0.3em; text-align: center; padding: 0.45rem; border-radius: var(--radius-md); border: 2px solid var(--color-border); background: var(--color-bg); color: var(--color-text-main);"
                            autocomplete="off">
                        <span id="role-pin-hint" style="font-size: 0.75rem; color: var(--color-text-muted);">Enter 4 numbers</span>
                    </div>
                </div>
                <div class="role-modal-actions" style="display: flex; gap: 0.5rem; justify-content: flex-end; flex-wrap: wrap;">
                    <button type="button" class="btn btn-secondary" id="role-pin-skip-btn" style="padding: 0.45rem 0.85rem; font-size: 0.85rem; border-radius: var(--radius-md); background: transparent; border: 1px solid var(--color-border); cursor: pointer; color: var(--color-text-main);">
                        Skip PIN &amp; Switch
                    </button>
                    <button type="button" class="btn btn-primary" id="role-pin-set-btn" style="padding: 0.45rem 1rem; font-size: 0.85rem; border-radius: var(--radius-md); background: var(--color-primary); color: #ffffff; border: none; font-weight: 600; cursor: pointer;">
                        Set PIN &amp; Switch
                    </button>
                </div>
            </div>

            <!-- Unlock State: Shown when a PIN is set and user switches out of Student mode -->
            <div id="role-pin-unlock-view" class="role-modal-subview hidden">
                <div class="role-modal-badge" id="role-modal-unlock-badge">
                    <i class="fas fa-lock"></i> <span>Protected Mode</span>
                </div>
                <p class="role-modal-desc" style="font-size: 0.9rem; color: var(--color-text-muted); margin-bottom: 1.25rem; line-height: 1.45;">
                    Enter your 4-digit PIN to switch to <strong id="role-unlock-target-name" style="color: var(--color-text-main);">Teacher Mode</strong>.
                </p>
                <div style="margin-bottom: 1.25rem; text-align: center;">
                    <input type="password" id="role-unlock-pin" inputmode="numeric" pattern="[0-9]*" maxlength="4" placeholder="••••"
                        style="width: 160px; font-size: 1.6rem; letter-spacing: 0.35em; text-align: center; padding: 0.6rem; border-radius: var(--radius-lg); border: 2px solid var(--color-border); background: var(--color-bg); color: var(--color-text-main); margin: 0 auto; display: block;"
                        autocomplete="off">
                    <div id="role-unlock-error" class="hidden" style="color: var(--color-error, #ef4444); font-size: 0.85rem; margin-top: 0.6rem; font-weight: 600;" role="alert">
                        Incorrect PIN. Please try again.
                    </div>
                </div>
                <div class="role-modal-actions" style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                    <button type="button" class="btn btn-secondary" id="role-unlock-cancel-btn" style="padding: 0.45rem 0.85rem; font-size: 0.85rem; border-radius: var(--radius-md); background: transparent; border: 1px solid var(--color-border); cursor: pointer; color: var(--color-text-main);">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-primary" id="role-unlock-submit-btn" style="padding: 0.45rem 1rem; font-size: 0.85rem; border-radius: var(--radius-md); background: var(--color-primary); color: #ffffff; border: none; font-weight: 600; cursor: pointer;">
                        Unlock Mode
                    </button>
                </div>
            </div>

            <!-- Manage PIN State: Allows editing or removing the PIN -->
            <div id="role-pin-manage-view" class="role-modal-subview hidden">
                <div class="role-modal-badge">
                    <i class="fas fa-key"></i> <span>Mode Security Settings</span>
                </div>
                <p class="role-modal-desc" style="font-size: 0.85rem; color: var(--color-text-muted); margin-bottom: 1rem; line-height: 1.45;">
                    Change or remove the 4-digit PIN that protects Teacher and Parent modes.
                </p>
                <div style="display: flex; flex-direction: column; gap: 0.85rem; margin-bottom: 1.25rem;">
                    <div>
                        <label for="role-manage-current-pin" style="display: block; font-size: 0.8rem; font-weight: 700; margin-bottom: 0.25rem; color: var(--color-text-main);">
                            Current PIN
                        </label>
                        <input type="password" id="role-manage-current-pin" inputmode="numeric" pattern="[0-9]*" maxlength="4" placeholder="••••"
                            style="width: 130px; font-size: 1.25rem; letter-spacing: 0.25em; text-align: center; padding: 0.4rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg); color: var(--color-text-main);">
                    </div>
                    <div>
                        <label for="role-manage-new-pin" style="display: block; font-size: 0.8rem; font-weight: 700; margin-bottom: 0.25rem; color: var(--color-text-main);">
                            New PIN <span style="font-weight: 400; color: var(--color-text-muted);">(Leave blank to remove PIN)</span>
                        </label>
                        <input type="password" id="role-manage-new-pin" inputmode="numeric" pattern="[0-9]*" maxlength="4" placeholder="••••"
                            style="width: 130px; font-size: 1.25rem; letter-spacing: 0.25em; text-align: center; padding: 0.4rem; border-radius: var(--radius-md); border: 1px solid var(--color-border); background: var(--color-bg); color: var(--color-text-main);">
                    </div>
                    <div id="role-manage-error" class="hidden" style="color: var(--color-error, #ef4444); font-size: 0.85rem; font-weight: 600;" role="alert"></div>
                    <div id="role-manage-success" class="hidden" style="color: var(--color-success, #10b981); font-size: 0.85rem; font-weight: 600;" role="status"></div>
                </div>
                <div class="role-modal-actions" style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                    <button type="button" class="btn btn-secondary" id="role-manage-close-btn" style="padding: 0.45rem 0.85rem; font-size: 0.85rem; border-radius: var(--radius-md); background: transparent; border: 1px solid var(--color-border); cursor: pointer; color: var(--color-text-main);">
                        Close
                    </button>
                    <button type="button" class="btn btn-primary" id="role-manage-save-btn" style="padding: 0.45rem 1rem; font-size: 0.85rem; border-radius: var(--radius-md); background: var(--color-primary); color: #ffffff; border: none; font-weight: 600; cursor: pointer;">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
