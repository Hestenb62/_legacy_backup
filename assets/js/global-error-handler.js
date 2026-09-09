/**
 * Global Error Handler
 * Displays a robust, self-contained modal popup when an unhandled error occurs,
 * providing an error code, location, copy button, mailto report, and full close controls.
 */

(function() {
    let modalAdded = false;

    function injectStyles() {
        if (document.getElementById('global-error-styles')) return;

        const style = document.createElement('style');
        style.id = 'global-error-styles';
        style.textContent = `
            #global-error-modal {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                right: 0 !important;
                bottom: 0 !important;
                width: 100vw !important;
                height: 100vh !important;
                background: rgba(15, 23, 42, 0.78) !important;
                backdrop-filter: blur(8px) !important;
                -webkit-backdrop-filter: blur(8px) !important;
                z-index: 999999 !important;
                display: none;
                align-items: center !important;
                justify-content: center !important;
                padding: 1.25rem !important;
                box-sizing: border-box !important;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.25s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.25s ease;
            }
            #global-error-modal.is-visible {
                display: flex !important;
                opacity: 1 !important;
                visibility: visible !important;
            }
            #global-error-card {
                background: #ffffff;
                color: #0f172a;
                border-radius: 1.25rem;
                max-width: 480px;
                width: 100%;
                padding: 1.85rem;
                box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.45), 0 0 0 1px rgba(239, 68, 68, 0.25);
                position: relative;
                text-align: center;
                transform: scale(0.92) translateY(16px);
                transition: transform 0.28s cubic-bezier(0.16, 1, 0.3, 1);
                font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
                box-sizing: border-box;
            }
            #global-error-modal.is-visible #global-error-card {
                transform: scale(1) translateY(0);
            }
            #global-error-close {
                position: absolute;
                top: 1rem;
                right: 1rem;
                width: 36px;
                height: 36px;
                border-radius: 50%;
                border: none;
                background: rgba(148, 163, 184, 0.15);
                color: #64748b;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.15rem;
                line-height: 1;
                transition: all 0.2s ease;
                z-index: 10;
            }
            #global-error-close:hover {
                background: rgba(239, 68, 68, 0.15);
                color: #ef4444;
                transform: rotate(90deg);
            }
            .global-error-icon-box {
                width: 60px;
                height: 60px;
                background: rgba(239, 68, 68, 0.12);
                color: #ef4444;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.2rem;
                font-size: 1.75rem;
                box-shadow: 0 0 20px rgba(239, 68, 68, 0.25);
            }
            .global-error-title {
                font-size: 1.35rem;
                font-weight: 800;
                margin: 0 0 0.4rem;
                color: inherit;
                line-height: 1.25;
            }
            .global-error-desc {
                font-size: 0.9rem;
                color: #64748b;
                margin: 0 0 1.2rem;
                line-height: 1.45;
            }
            .global-error-box {
                background: rgba(239, 68, 68, 0.05);
                border: 1px solid rgba(239, 68, 68, 0.2);
                border-radius: 0.75rem;
                padding: 0.9rem 1rem;
                text-align: left;
                margin-bottom: 1.4rem;
                word-break: break-word;
            }
            .global-error-box-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 0.4rem;
            }
            .global-error-tag {
                font-size: 0.7rem;
                font-weight: 800;
                text-transform: uppercase;
                letter-spacing: 0.05em;
                color: #dc2626;
            }
            .global-error-copy-btn {
                background: none;
                border: none;
                color: #64748b;
                font-size: 0.75rem;
                font-weight: 600;
                cursor: pointer;
                display: inline-flex;
                align-items: center;
                gap: 0.3rem;
                padding: 0.2rem 0.4rem;
                border-radius: 0.35rem;
                transition: background 0.15s, color 0.15s;
            }
            .global-error-copy-btn:hover {
                background: rgba(0, 0, 0, 0.05);
                color: #1e293b;
            }
            #global-error-message {
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
                font-size: 0.85rem;
                color: #b91c1c;
                font-weight: 600;
                margin: 0 0 0.35rem;
                line-height: 1.4;
            }
            #global-error-code {
                font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace;
                font-size: 0.75rem;
                color: #64748b;
                margin: 0;
                font-style: italic;
            }
            .global-error-actions {
                display: flex;
                gap: 0.65rem;
                flex-wrap: wrap;
            }
            .global-error-btn {
                padding: 0.65rem 1rem;
                border-radius: 0.75rem;
                font-size: 0.875rem;
                font-weight: 700;
                cursor: pointer;
                transition: all 0.2s ease;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 0.4rem;
                text-decoration: none;
                box-sizing: border-box;
            }
            #global-error-dismiss {
                flex: 1 1 auto;
                background: #f1f5f9;
                color: #475569;
                border: 1px solid #e2e8f0;
            }
            #global-error-dismiss:hover {
                background: #e2e8f0;
                color: #1e293b;
            }
            #global-error-reload {
                flex: 1 1 auto;
                background: #e2e8f0;
                color: #1e293b;
                border: 1px solid #cbd5e1;
            }
            #global-error-reload:hover {
                background: #cbd5e1;
            }
            #global-error-mailto {
                flex: 2 1 auto;
                background: linear-gradient(135deg, #ef4444, #dc2626);
                color: #ffffff;
                border: none;
                box-shadow: 0 4px 14px rgba(239, 68, 68, 0.35);
            }
            #global-error-mailto:hover {
                background: linear-gradient(135deg, #dc2626, #b91c1c);
                box-shadow: 0 6px 18px rgba(239, 68, 68, 0.45);
            }

            /* Dark theme overrides */
            html[data-theme="dark"] #global-error-card,
            html.dark #global-error-card,
            body.theme-dark #global-error-card,
            body.theme-midnight #global-error-card,
            body.dark #global-error-card {
                background: #1e293b !important;
                color: #f8fafc !important;
                box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.8), 0 0 0 1px rgba(239, 68, 68, 0.4) !important;
            }
            html[data-theme="dark"] .global-error-desc,
            body.theme-dark .global-error-desc,
            body.theme-midnight .global-error-desc {
                color: #94a3b8 !important;
            }
            html[data-theme="dark"] #global-error-dismiss,
            body.theme-dark #global-error-dismiss,
            body.theme-midnight #global-error-dismiss {
                background: #334155 !important;
                color: #cbd5e1 !important;
                border-color: #475569 !important;
            }
            html[data-theme="dark"] #global-error-reload,
            body.theme-dark #global-error-reload,
            body.theme-midnight #global-error-reload {
                background: #475569 !important;
                color: #f1f5f9 !important;
                border-color: #64748b !important;
            }
            html[data-theme="dark"] #global-error-message,
            body.theme-dark #global-error-message,
            body.theme-midnight #global-error-message {
                color: #f87171 !important;
            }
            html[data-theme="dark"] #global-error-code,
            body.theme-dark #global-error-code,
            body.theme-midnight #global-error-code {
                color: #94a3b8 !important;
            }
            html[data-theme="dark"] .global-error-copy-btn,
            body.theme-dark .global-error-copy-btn,
            body.theme-midnight .global-error-copy-btn {
                color: #94a3b8 !important;
            }
            html[data-theme="dark"] .global-error-copy-btn:hover,
            body.theme-dark .global-error-copy-btn:hover,
            body.theme-midnight .global-error-copy-btn:hover {
                background: rgba(255, 255, 255, 0.1) !important;
                color: #f8fafc !important;
            }
        `;
        document.head.appendChild(style);
    }

    function createErrorModalHTML() {
        return `
            <div id="global-error-modal" role="alertdialog" aria-modal="true" aria-labelledby="global-error-heading">
                <div id="global-error-card">
                    <button type="button" id="global-error-close" aria-label="Close Error Modal" title="Close (Esc)">
                        <i class="fas fa-times"></i>
                    </button>
                    <div class="global-error-icon-box" aria-hidden="true">
                        <i class="fas fa-bug"></i>
                    </div>
                    <h4 id="global-error-heading" class="global-error-title">Oops! We hit a snag.</h4>
                    <p class="global-error-desc">
                        An unexpected error occurred on this page. Help us fix it!
                    </p>
                    <div class="global-error-box">
                        <div class="global-error-box-header">
                            <span class="global-error-tag">Error Details:</span>
                            <button type="button" id="global-error-copy" class="global-error-copy-btn" title="Copy error details to clipboard">
                                <i class="far fa-copy"></i> <span id="global-error-copy-label">Copy</span>
                            </button>
                        </div>
                        <p id="global-error-message"></p>
                        <p id="global-error-code"></p>
                    </div>
                    <div class="global-error-actions">
                        <button type="button" id="global-error-dismiss" class="global-error-btn">
                            <i class="fas fa-times mr-1"></i> Dismiss
                        </button>
                        <button type="button" id="global-error-reload" class="global-error-btn">
                            <i class="fas fa-sync-alt mr-1"></i> Reload
                        </button>
                        <a id="global-error-mailto" href="#" class="global-error-btn">
                            <i class="fas fa-envelope mr-1"></i> Report to Admin
                        </a>
                    </div>
                </div>
            </div>
        `;
    }

    function closeErrorModal() {
        const modal = document.getElementById('global-error-modal');
        if (!modal) return;
        modal.classList.remove('is-visible');
        document.body.style.overflow = '';
        setTimeout(() => {
            if (!modal.classList.contains('is-visible')) {
                modal.style.display = 'none';
            }
        }, 260);
    }

    function initErrorModal() {
        injectStyles();

        if (!modalAdded) {
            document.body.insertAdjacentHTML('beforeend', createErrorModalHTML());
            modalAdded = true;

            const modal = document.getElementById('global-error-modal');
            const closeBtn = document.getElementById('global-error-close');
            const dismissBtn = document.getElementById('global-error-dismiss');
            const reloadBtn = document.getElementById('global-error-reload');
            const copyBtn = document.getElementById('global-error-copy');

            // 1. Close Button
            if (closeBtn) {
                closeBtn.addEventListener('click', closeErrorModal);
            }

            // 2. Dismiss Button
            if (dismissBtn) {
                dismissBtn.addEventListener('click', closeErrorModal);
            }

            // 3. Backdrop Click
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeErrorModal();
                    }
                });
            }

            // 4. Keyboard Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    const m = document.getElementById('global-error-modal');
                    if (m && m.classList.contains('is-visible')) {
                        closeErrorModal();
                    }
                }
            });

            // 5. Reload Button
            if (reloadBtn) {
                reloadBtn.addEventListener('click', function() {
                    window.location.reload();
                });
            }

            // 6. Copy Error Details Button
            if (copyBtn) {
                copyBtn.addEventListener('click', function() {
                    const msg = document.getElementById('global-error-message')?.innerText || '';
                    const code = document.getElementById('global-error-code')?.innerText || '';
                    const copyLabel = document.getElementById('global-error-copy-label');
                    const text = `${msg}\n${code}\nURL: ${window.location.href}`;

                    navigator.clipboard.writeText(text).then(() => {
                        if (copyLabel) copyLabel.innerText = 'Copied!';
                        setTimeout(() => {
                            if (copyLabel) copyLabel.innerText = 'Copy';
                        }, 2000);
                    }).catch(() => {
                        if (copyLabel) copyLabel.innerText = 'Copied!';
                    });
                });
            }
        }
    }

    window.closeSiteErrorModal = closeErrorModal;

    window.showSiteError = function(message, source, lineno, colno, errorObj) {
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => displayError(message, source, lineno, colno, errorObj));
        } else {
            displayError(message, source, lineno, colno, errorObj);
        }
    };

    function displayError(message, source, lineno, colno, errorObj) {
        initErrorModal();

        const modal = document.getElementById('global-error-modal');
        const mailtoLink = document.getElementById('global-error-mailto');
        const errorMsgEl = document.getElementById('global-error-message');
        const errorCodeEl = document.getElementById('global-error-code');

        const displayMessage = message || 'Unknown Error';
        let locationInfo = '';

        if (source) {
            try {
                const url = new URL(source);
                locationInfo = url.pathname.split('/').pop() || '/' + window.location.pathname.split('/').pop();
            } catch(e) {
                locationInfo = source.substring(source.lastIndexOf('/') + 1) || source;
            }
            if (!locationInfo) locationInfo = 'script';

            locationInfo += (lineno ? `:${lineno}` : '') + (colno ? `:${colno}` : '');
        }

        const errorCode = 'ERR-' + Date.now().toString(16).toUpperCase().slice(-6) + '-' + Math.floor(Math.random() * 16777215).toString(16).padStart(6, '0').toUpperCase();

        if (errorMsgEl) errorMsgEl.innerText = displayMessage;
        if (errorCodeEl) errorCodeEl.innerText = `Code: ${errorCode} ${locationInfo ? '| Loc: ' + locationInfo : ''}`;

        const subject = encodeURIComponent(`Site Error Report: ${errorCode}`);

        const bodyArr = [
            "Hello Admin,",
            "",
            "I encountered an error on the site. Below are the details:",
            "",
            `Error Code: ${errorCode}`,
            `Message: ${displayMessage}`,
            `Location: ${locationInfo || 'N/A'}`,
            `URL: ${window.location.href}`,
            `User Agent: ${navigator.userAgent}`,
            "",
            "Additional Context (What I was doing when it happened):",
            "..."
        ];

        if (mailtoLink) {
            mailtoLink.href = `mailto:error@hestena62.com?subject=${subject}&body=${encodeURIComponent(bodyArr.join('\n'))}`;
        }

        // Open modal as real viewport popup
        modal.style.display = 'flex';
        // Force reflow for CSS transition
        void modal.offsetWidth;
        modal.classList.add('is-visible');
        document.body.style.overflow = 'hidden';

        // Accessibility focus
        const closeBtn = document.getElementById('global-error-close');
        if (closeBtn) closeBtn.focus();
    }

    window.addEventListener('error', function(event) {
        if (event.message && typeof event.message === 'string') {
            if (event.message.includes('Script error.') || event.message.includes('ResizeObserver')) return;
        } else if (event.target && (event.target.tagName === 'IMG' || event.target.tagName === 'SCRIPT' || event.target.tagName === 'LINK')) {
            return;
        }

        const msg = event.message || 'Unknown Object Error';
        showSiteError(msg, event.filename, event.lineno, event.colno, event.error);
    });

    window.addEventListener('unhandledrejection', function(event) {
        const message = event.reason ? (event.reason.message || event.reason.toString()) : 'Unhandled Promise Rejection';
        showSiteError(message, 'PromiseRejection', null, null, event.reason);
    });

})();
