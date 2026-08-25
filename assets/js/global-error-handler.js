/**
 * Global Error Handler
 * Displays a modal on the screen when an error occurs, providing
 * an error code, a description, and a mailto link for support.
 */

(function() {
    let modalAdded = false;

    function createErrorModalHTML() {
        return `
            <div id="global-error-modal" class="fixed inset-0 bg-black/80 backdrop-blur-sm hidden items-center justify-center z-[9999]" role="alertdialog" aria-modal="true">
                <div class="bg-content-bg rounded-2xl shadow-2xl p-6 max-w-md w-full text-center border border-red-500/30 animate-bounce-short mx-4 relative flex-col">
                    <button id="global-error-close" class="absolute top-4 right-4 text-gray-400 hover:text-red-500 transition-colors" aria-label="Close Error Modal">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                    <div class="w-16 h-16 bg-red-100 dark:bg-red-900/30 rounded-full flex items-center justify-center mx-auto mb-4 text-red-500 dark:text-red-400 text-3xl shadow-[0_0_15px_rgba(239,68,68,0.3)]">
                        <i class="fas fa-bug"></i>
                    </div>
                    <h4 class="text-xl font-bold mb-2 text-text-default">Oops! We hit a snag.</h4>
                    <p class="mb-4 text-sm text-text-secondary leading-relaxed">
                        An unexpected error occurred on this page. Help us fix it!
                    </p>
                    <div class="bg-red-50 dark:bg-red-500/10 border border-red-200 dark:border-red-500/20 rounded-lg p-3 mb-5 text-left overflow-hidden">
                        <p class="text-xs font-semibold text-red-700 dark:text-red-400 mb-1 uppercase tracking-wider">Error Details:</p>
                        <p id="global-error-message" class="text-sm font-mono text-red-600 dark:text-red-300 break-words mb-2"></p>
                        <p id="global-error-code" class="text-xs font-mono text-gray-600 dark:text-gray-400 break-words italic"></p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <button id="global-error-reload" class="flex-none bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-4 py-2.5 rounded-xl font-bold hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors shadow-sm text-sm">
                            <i class="fas fa-sync-alt mr-2"></i> Reload
                        </button>
                        <a id="global-error-mailto" href="#" class="flex-1 bg-gradient-to-r from-red-500 to-rose-600 text-white px-4 py-2.5 rounded-xl font-bold hover:from-red-600 hover:to-rose-700 transition-all shadow-md hover:shadow-lg text-sm flex items-center justify-center">
                            <i class="fas fa-envelope mr-2"></i> Report to Admin
                        </a>
                    </div>
                </div>
            </div>
        `;
    }

    function initErrorModal() {
        if (!modalAdded) {
            document.body.insertAdjacentHTML('beforeend', createErrorModalHTML());
            modalAdded = true;
            
            document.getElementById('global-error-close').addEventListener('click', function() {
                const modal = document.getElementById('global-error-modal');
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            });
            document.getElementById('global-error-reload').addEventListener('click', function() {
                window.location.reload();
            });
        }
    }

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

        errorMsgEl.innerText = displayMessage;
        errorCodeEl.innerText = `Code: ${errorCode} ${locationInfo ? '| Loc: ' + locationInfo : ''}`;

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

        mailtoLink.href = `mailto:error@hestena62.com?subject=${subject}&body=${encodeURIComponent(bodyArr.join('\n'))}`;

        modal.classList.remove('hidden');
        modal.classList.add('flex');
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
