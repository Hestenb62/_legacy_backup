/**
 * assets/js/certificate-generator.js
 * Universal Certificate of Academic Mastery Controller
 * Hesten's Learning Platform
 */

(function () {
    'use strict';

    function openCertificateModal(config) {
        config = config || {};
        const modal = document.getElementById('hl-certificate-modal');
        if (!modal) return;

        // 1. Student Name
        let studentName = config.studentName;
        if (!studentName) {
            try {
                const profileRaw = localStorage.getItem('hesten_user_profile');
                if (profileRaw) {
                    const prof = JSON.parse(profileRaw);
                    if (prof.firstName) studentName = prof.firstName;
                }
            } catch (e) {}
        }
        if (!studentName) studentName = 'Student Scholar';

        const nameEl = document.getElementById('cert-recipient-name');
        if (nameEl) nameEl.textContent = studentName;

        // 2. Course / Standard Title
        const courseEl = document.getElementById('cert-course-name');
        if (courseEl) {
            courseEl.textContent = config.courseTitle || 'Algebra I Foundations & Mathematical Reasoning (Level K)';
        }

        // 3. Issue Date
        const dateEl = document.getElementById('cert-issue-date');
        if (dateEl) {
            const now = new Date();
            dateEl.textContent = now.toLocaleDateString(undefined, { year: 'numeric', month: 'long', day: 'numeric' });
        }

        // 4. Credential ID
        const idEl = document.getElementById('cert-doc-id');
        if (idEl) {
            const seed = Math.abs(Date.now() % 900000) + 100000;
            idEl.textContent = `HL-CERT-${seed}`;
        }

        // Reveal Modal
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }

    function closeCertificateModal() {
        const modal = document.getElementById('hl-certificate-modal');
        if (modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    }

    function printCertificate() {
        window.print();
    }

    // Keyboard shortcut Escape closes certificate
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            const modal = document.getElementById('hl-certificate-modal');
            if (modal && !modal.classList.contains('hidden')) {
                closeCertificateModal();
            }
        }
    });

    // Expose globals
    window.openCertificateModal = openCertificateModal;
    window.closeCertificateModal = closeCertificateModal;
    window.printCertificate = printCertificate;
})();
