/**
 * library/assets/lib-classroom-share.js - Teacher & Parent Classroom Assignment Link & QR Generator
 */

(function () {
    let currentShareBookId = '';

    window.openClassroomShareModal = function (bookId) {
        currentShareBookId = bookId || window.currentBookId || 'usa-constitution';
        const modal = document.getElementById('classroomShareModal');
        if (!modal) return;

        updateShareLinkPreview();
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    };

    window.closeClassroomShareModal = function () {
        const modal = document.getElementById('classroomShareModal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    };

    window.updateShareLinkPreview = function () {
        const dyslexic = document.getElementById('share-opt-dyslexic')?.checked;
        const tint = document.getElementById('share-opt-tint')?.checked;
        const untimed = document.getElementById('share-opt-untimed')?.checked;
        const mathjax = document.getElementById('share-opt-mathjax')?.checked;

        const baseUrl = window.location.origin + '/library/read/index.php';
        const params = new URLSearchParams();
        params.set('book', currentShareBookId);
        if (dyslexic) params.set('dyslexic', '1');
        if (tint) params.set('tint', 'peach');
        if (untimed) params.set('untimed', '1');
        if (mathjax) params.set('mathjax', '1');

        const fullUrl = `${baseUrl}?${params.toString()}`;
        const input = document.getElementById('share-link-input');
        if (input) input.value = fullUrl;

        // Generate QR code preview using public SVG qr API
        const qrImg = document.getElementById('share-qr-preview-img');
        if (qrImg) {
            qrImg.src = `https://api.qrserver.com/v1/create-qr-code/?size=180x180&data=${encodeURIComponent(fullUrl)}&bgcolor=ffffff&color=1e293b`;
        }
    };

    window.copyClassroomLink = function () {
        const input = document.getElementById('share-link-input');
        if (!input) return;
        input.select();
        navigator.clipboard.writeText(input.value).then(() => {
            const btn = document.getElementById('share-copy-btn');
            if (btn) {
                const oldHtml = btn.innerHTML;
                btn.innerHTML = `<i class="fas fa-check"></i> Copied!`;
                btn.classList.add('copied');
                setTimeout(() => {
                    btn.innerHTML = oldHtml;
                    btn.classList.remove('copied');
                }, 2000);
            }
        });
    };
})();
