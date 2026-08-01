<?php
// TailwindCSS to VanillaCSS Migration Notification Popup
?>

<div id="migration-modal" class="migration-overlay hidden" aria-modal="true" role="dialog" aria-labelledby="migration-title">
    <!-- Backdrop -->
    <div class="migration-backdrop" onclick="dismissMigrationModal()"></div>

    <!-- Content Card -->
    <div class="migration-card" id="migration-card-element" tabindex="-1">
        <!-- Top Gradient Border -->
        <div class="migration-gradient-bar"></div>

        <!-- Close Button -->
        <button onclick="dismissMigrationModal()" class="migration-close-btn" aria-label="Close message" id="migration-close-btn-top">
            <i class="fas fa-times"></i>
        </button>

        <!-- Body -->
        <div class="migration-body">
            <!-- Icon/Visual Header -->
            <div class="migration-icon-container">
                <div class="migration-icon-shield">
                    <i class="fas fa-tools migration-icon-main"></i>
                    <div class="migration-icon-badge">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                </div>
            </div>

            <!-- Title -->
            <h3 class="migration-title" id="migration-title">
                Style Migration in Progress
            </h3>

            <!-- Subtitle/Badges -->
            <div class="migration-badges">
                <span class="migration-badge badge-tailwind">
                    <i class="fab fa-css3-alt"></i> TailwindCSS
                </span>
                <span class="migration-arrow-icon">
                    <i class="fas fa-long-arrow-alt-right"></i>
                </span>
                <span class="migration-badge badge-vanilla">
                    <i class="fas fa-code"></i> VanillaCSS
                </span>
            </div>

            <!-- Description -->
            <div class="migration-desc">
                <p>We are currently migrating our user interface styling from <strong>TailwindCSS</strong> to a high-performance <strong>Vanilla CSS</strong> architecture to improve page speeds and codebase maintainability.</p>
                
                <p class="migration-alert-box">
                    <i class="fas fa-exclamation-triangle alert-icon"></i>
                    <span><strong>Note:</strong> Some layout or style inconsistencies may occur during this process. The site administrator is actively working to resolve these errors. Thank you for your patience!</span>
                </p>
            </div>
        </div>

        <!-- Footer / Actions -->
        <div class="migration-footer">
            <button onclick="dismissMigrationModal()" class="migration-confirm-btn" id="migration-confirm-btn">
                Got it, thanks!
            </button>
        </div>
    </div>
</div>

<style>
/* Migration Popup Styles */
.migration-overlay {
    position: fixed;
    inset: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: var(--spacing-4);
    opacity: 0;
    visibility: hidden;
    transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.4s;
}

.migration-overlay.active {
    opacity: 1;
    visibility: visible;
}

.migration-backdrop {
    position: absolute;
    inset: 0;
    background: rgba(15, 23, 42, 0.4);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
}

.migration-card {
    position: relative;
    width: 100%;
    max-width: 480px;
    background: var(--color-bg-surface, #ffffff);
    border-radius: var(--radius-2xl, 1rem);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    border: 1px solid var(--color-border, #e2e8f0);
    overflow: hidden;
    transform: scale(0.9) translateY(20px);
    transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    z-index: 10;
}

.migration-overlay.active .migration-card {
    transform: scale(1) translateY(0);
}

.migration-gradient-bar {
    height: 6px;
    background: linear-gradient(90deg, #3b82f6, #ec4899, #10b981);
}

.migration-close-btn {
    position: absolute;
    top: 1rem;
    right: 1rem;
    width: 2rem;
    height: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: var(--radius-full, 9999px);
    background: var(--color-bg-base, #f8fafc);
    color: var(--color-text-muted, #64748b);
    border: 1px solid var(--color-border, #e2e8f0);
    transition: all 0.2s ease;
    z-index: 20;
}

.migration-close-btn:hover {
    color: var(--color-text-main, #0f172a);
    background: var(--color-border, #e2e8f0);
    transform: rotate(90deg);
}

.migration-close-btn:focus-visible,
.migration-confirm-btn:focus-visible {
    outline: 3px solid var(--color-primary, #4f46e5);
    outline-offset: 2px;
}

.migration-body {
    padding: var(--spacing-6) var(--spacing-6) var(--spacing-4) var(--spacing-6);
    text-align: center;
}

.migration-icon-container {
    display: flex;
    justify-content: center;
    margin-bottom: var(--spacing-4);
}

.migration-icon-shield {
    position: relative;
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.1), rgba(236, 72, 153, 0.1));
    border-radius: var(--radius-2xl, 1rem);
    display: flex;
    align-items: center;
    justify-content: center;
}

.migration-icon-main {
    font-size: 2.25rem;
    color: var(--color-primary, #4f46e5);
}

.migration-icon-badge {
    position: absolute;
    bottom: -5px;
    right: -5px;
    background: var(--color-warning, #f59e0b);
    color: #ffffff;
    width: 28px;
    height: 28px;
    border-radius: var(--radius-full, 9999px);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.8rem;
    border: 2px solid var(--color-bg-surface, #ffffff);
    box-shadow: var(--shadow-sm);
    animation: pulse-ring 2s infinite;
}

.migration-title {
    font-family: 'Outfit', sans-serif;
    font-size: 1.5rem;
    font-weight: 800;
    color: var(--color-text-main, #0f172a);
    margin-bottom: var(--spacing-2);
}

.migration-badges {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: var(--spacing-2);
    margin-bottom: var(--spacing-6);
}

.migration-badge {
    font-size: 0.75rem;
    font-weight: 700;
    padding: 0.35rem 0.75rem;
    border-radius: var(--radius-full, 9999px);
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
}

.badge-tailwind {
    background: rgba(56, 189, 248, 0.12);
    color: #0284c7;
}

.badge-vanilla {
    background: rgba(99, 102, 241, 0.12);
    color: #4f46e5;
}

.migration-arrow-icon {
    color: var(--color-text-muted, #64748b);
    font-size: 0.875rem;
}

.migration-desc {
    font-size: 0.95rem;
    color: var(--color-text-muted, #64748b);
    line-height: 1.6;
    text-align: left;
}

.migration-desc p {
    margin-bottom: var(--spacing-3);
}

.migration-desc p strong {
    color: var(--color-text-main, #0f172a);
}

.migration-alert-box {
    background: rgba(245, 158, 11, 0.08);
    border-left: 4px solid var(--color-warning, #f59e0b);
    padding: var(--spacing-3);
    border-radius: 0 var(--radius-lg) var(--radius-lg) 0;
    display: flex;
    align-items: flex-start;
    gap: var(--spacing-2);
    font-size: 0.875rem;
    margin-top: var(--spacing-4);
    color: var(--color-text-main, #0f172a);
}

.migration-alert-box .alert-icon {
    color: var(--color-warning, #f59e0b);
    margin-top: 2px;
    flex-shrink: 0;
}

.migration-footer {
    padding: var(--spacing-4) var(--spacing-6) var(--spacing-6) var(--spacing-6);
    display: flex;
    justify-content: center;
}

.migration-confirm-btn {
    width: 100%;
    max-width: 240px;
    padding: 0.8rem 1.5rem;
    background: linear-gradient(135deg, var(--color-primary, #4f46e5), var(--color-primary-hover, #4338ca));
    color: white;
    font-weight: 700;
    font-size: 0.95rem;
    border-radius: var(--radius-xl, 0.75rem);
    box-shadow: 0 4px 14px rgba(79, 70, 229, 0.3);
    transition: all 0.25s ease;
    text-align: center;
}

.migration-confirm-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(79, 70, 229, 0.4);
    background: linear-gradient(135deg, var(--color-primary-hover, #4338ca), #3730a3);
}

.migration-confirm-btn:active {
    transform: translateY(0);
}

/* Animations */
@keyframes pulse-ring {
    0% {
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0.6);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(245, 158, 11, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(245, 158, 11, 0);
    }
}

/* Dark Mode Theme Overrides */
@media (prefers-color-scheme: dark) {
    .migration-card {
        background: #151c2c;
        border-color: #1e293b;
    }
    .migration-close-btn {
        background: #1e293b;
        border-color: #334155;
        color: #94a3b8;
    }
    .migration-close-btn:hover {
        background: #334155;
        color: #f8fafc;
    }
    .migration-desc p strong {
        color: #f8fafc;
    }
    .migration-alert-box {
        background: rgba(245, 158, 11, 0.12);
        color: #f8fafc;
    }
}

/* Fallback for explicit body class theme triggers */
.dark .migration-card {
    background: #151c2c;
    border-color: #1e293b;
}
.dark .migration-close-btn {
    background: #1e293b;
    border-color: #334155;
    color: #94a3b8;
}
.dark .migration-close-btn:hover {
    background: #334155;
    color: #f8fafc;
}
.dark .migration-desc p strong {
    color: #f8fafc;
}
.dark .migration-alert-box {
    background: rgba(245, 158, 11, 0.12);
    color: #f8fafc;
}
</style>

<script>
// Migration Dialog Logic
let previousActiveElement;

function showMigrationModal() {
    const modal = document.getElementById('migration-modal');
    if (!modal) return;

    // Track active element to return focus later
    previousActiveElement = document.activeElement;

    // Remove hidden class and trigger transitions
    modal.classList.remove('hidden');
    
    // Tiny delay to trigger CSS transition smoothly
    setTimeout(() => {
        modal.classList.add('active');
        const card = document.getElementById('migration-card-element');
        if (card) {
            card.focus();
        }
    }, 50);

    // Prevent body scrolling
    document.body.style.overflow = 'hidden';

    // Focus trap setup
    modal.addEventListener('keydown', handleMigrationFocusTrap);
}

function dismissMigrationModal() {
    const modal = document.getElementById('migration-modal');
    if (!modal) return;

    modal.classList.remove('active');
    document.body.style.overflow = '';

    // Remove focus trap listener
    modal.removeEventListener('keydown', handleMigrationFocusTrap);

    // Set localStorage flag so it doesn't show again
    try {
        localStorage.setItem('hl_css_migration_acknowledged', 'true');
    } catch (e) {
        console.error('LocalStorage not supported', e);
    }

    // Wait for transition to complete before hiding fully
    setTimeout(() => {
        modal.classList.add('hidden');
        if (previousActiveElement && typeof previousActiveElement.focus === 'function') {
            previousActiveElement.focus();
        }
    }, 400);
}

function handleMigrationFocusTrap(e) {
    if (e.key === 'Escape') {
        dismissMigrationModal();
        return;
    }

    if (e.key === 'Tab') {
        const modal = document.getElementById('migration-modal');
        const focusableElements = modal.querySelectorAll('button, [tabindex="0"], [tabindex="-1"]');
        const firstElement = focusableElements[0];
        const lastElement = focusableElements[focusableElements.length - 1];

        if (e.shiftKey) { // Shift + Tab
            if (document.activeElement === firstElement || document.activeElement === modal) {
                lastElement.focus();
                e.preventDefault();
            }
        } else { // Tab
            if (document.activeElement === lastElement) {
                firstElement.focus();
                e.preventDefault();
            }
        }
    }
}

// Auto-trigger on page load if not previously dismissed
document.addEventListener("DOMContentLoaded", () => {
    try {
        const dismissed = localStorage.getItem('hl_css_migration_acknowledged');
        if (!dismissed) {
            // Delay showing slightly so it does not interfere with the initial layout paint
            setTimeout(showMigrationModal, 800);
        }
    } catch (e) {
        // Fallback: show it if localStorage fails
        setTimeout(showMigrationModal, 800);
    }
});
</script>
