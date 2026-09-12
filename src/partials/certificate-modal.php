<!-- Universal Certificate of Academic Mastery Modal -->
<div id="hl-certificate-modal" class="cert-modal-backdrop hidden" role="dialog" aria-modal="true" aria-labelledby="cert-modal-title">
    <div class="cert-modal-container">
        <!-- Modal Toolbar (Hidden during print) -->
        <div class="cert-toolbar print-hidden">
            <div class="cert-toolbar-info">
                <span class="cert-toolbar-badge"><i class="fas fa-award"></i> Official Credential</span>
                <span class="cert-toolbar-hint">Print or save as a PDF for student portfolios and homeschool transcripts.</span>
            </div>
            <div class="cert-toolbar-actions">
                <button type="button" class="cert-btn-print" onclick="window.printCertificate && window.printCertificate()">
                    <i class="fas fa-print"></i> Print Diploma
                </button>
                <button type="button" class="cert-btn-close" onclick="window.closeCertificateModal && window.closeCertificateModal()" aria-label="Close certificate">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>

        <!-- Printable Certificate Canvas -->
        <div class="cert-diploma-sheet" id="cert-diploma-sheet">
            <!-- Ornate Outer Border -->
            <div class="cert-border-outer">
                <div class="cert-border-inner">
                    <!-- Corner Flourishes -->
                    <div class="cert-corner corner-tl">✦</div>
                    <div class="cert-corner corner-tr">✦</div>
                    <div class="cert-corner corner-bl">✦</div>
                    <div class="cert-corner corner-br">✦</div>

                    <!-- Header -->
                    <header class="cert-header">
                        <div class="cert-crest-wrap">
                            <i class="fas fa-graduation-cap cert-crest-icon"></i>
                        </div>
                        <span class="cert-institution">Hesten's Learning Platform</span>
                        <h2 class="cert-title" id="cert-modal-title">Certificate of Academic Mastery</h2>
                        <span class="cert-subtitle">This official honors certificate is proudly awarded to</span>
                    </header>

                    <!-- Student Name -->
                    <div class="cert-recipient-section">
                        <div class="cert-recipient-name" id="cert-recipient-name" contenteditable="true" spellcheck="false" title="Click to edit name">
                            Student Scholar
                        </div>
                        <div class="cert-name-underline"></div>
                    </div>

                    <!-- Commendation Statement -->
                    <p class="cert-statement">
                        For demonstrating exemplary proficiency, analytical dedication, and rigorous competency in
                    </p>
                    <div class="cert-course-name" id="cert-course-name" contenteditable="true" spellcheck="false" title="Click to edit subject or standard">
                        Algebra I Foundations & Mathematical Reasoning (Level K)
                    </div>

                    <!-- Seal & Verification Grid -->
                    <div class="cert-footer-grid">
                        <!-- Left: Instructor / Proctor Signature -->
                        <div class="cert-sig-box">
                            <div class="cert-sig-line"></div>
                            <span class="cert-sig-label">Certified Proctor / Educator</span>
                        </div>

                        <!-- Center: Gold Official Seal -->
                        <div class="cert-seal-wrap">
                            <div class="cert-gold-seal">
                                <div class="cert-seal-star">★</div>
                                <span class="cert-seal-text">OFFICIAL</span>
                                <span class="cert-seal-sub">MASTERY</span>
                            </div>
                        </div>

                        <!-- Right: Parent / Guardian Signature -->
                        <div class="cert-sig-box">
                            <div class="cert-sig-line"></div>
                            <span class="cert-sig-label">Parent / Learning Coach</span>
                        </div>
                    </div>

                    <!-- Meta & Credential Hash -->
                    <footer class="cert-meta-row">
                        <span><strong>Date Issued:</strong> <span id="cert-issue-date">September 10, 2026</span></span>
                        <span><strong>Credential ID:</strong> <code id="cert-doc-id">HL-CERT-892410</code></span>
                        <span><strong>Standards Aligned:</strong> Common Core & NGSS</span>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Certificate Modal Backdrop & Responsive Overlay */
.cert-modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(15, 23, 42, 0.85);
    backdrop-filter: blur(10px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10000;
    padding: 1.5rem;
    overflow-y: auto;
    opacity: 1;
    transition: opacity 0.25s ease;
}

.cert-modal-backdrop.hidden {
    display: none !important;
}

.cert-modal-container {
    max-width: 960px;
    width: 100%;
    margin: auto;
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

/* Toolbar */
.cert-toolbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: var(--color-bg-surface, #1e293b);
    border: 1px solid var(--color-border, #334155);
    border-radius: var(--radius-xl, 1rem);
    padding: 0.75rem 1.25rem;
    gap: 1rem;
    flex-wrap: wrap;
}

.cert-toolbar-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.25rem 0.75rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 800;
    background: rgba(245, 158, 11, 0.15);
    color: #f59e0b;
    border: 1px solid rgba(245, 158, 11, 0.3);
}

.cert-toolbar-hint {
    font-size: 0.8rem;
    color: var(--color-text-secondary, #94a3b8);
    margin-left: 0.5rem;
}

.cert-toolbar-actions {
    display: flex;
    gap: 0.6rem;
    align-items: center;
}

.cert-btn-print {
    background: linear-gradient(135deg, #f59e0b, #d97706);
    color: white;
    font-weight: 800;
    font-size: 0.875rem;
    padding: 0.5rem 1.25rem;
    border-radius: 9999px;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
    transition: all 0.2s ease;
}

.cert-btn-print:hover {
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(245, 158, 11, 0.4);
}

.cert-btn-close {
    background: transparent;
    border: 1px solid var(--color-border, #334155);
    color: var(--color-text-secondary, #94a3b8);
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
}

.cert-btn-close:hover {
    background: rgba(239, 68, 68, 0.15);
    color: #ef4444;
    border-color: rgba(239, 68, 68, 0.3);
}

/* Printable Diploma Sheet (8.5x11 landscape aspect ratio) */
.cert-diploma-sheet {
    background: #ffffff;
    color: #1e293b;
    border-radius: 0.75rem;
    padding: 1.5rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    position: relative;
}

.cert-border-outer {
    border: 3px solid #b45309;
    padding: 6px;
    background: #fffbeb;
    border-radius: 4px;
}

.cert-border-inner {
    border: 2px dashed #d97706;
    padding: 2.5rem 2rem;
    position: relative;
    text-align: center;
    background: #ffffff;
}

.cert-corner {
    position: absolute;
    font-size: 1.25rem;
    color: #d97706;
}
.corner-tl { top: 6px; left: 8px; }
.corner-tr { top: 6px; right: 8px; }
.corner-bl { bottom: 6px; left: 8px; }
.corner-br { bottom: 6px; right: 8px; }

.cert-header {
    margin-bottom: 1.5rem;
}

.cert-crest-wrap {
    width: 3.5rem;
    height: 3.5rem;
    margin: 0 auto 0.75rem auto;
    border-radius: 50%;
    background: linear-gradient(135deg, #fef3c7, #fde68a);
    border: 2px solid #d97706;
    display: flex;
    align-items: center;
    justify-content: center;
}

.cert-crest-icon {
    font-size: 1.6rem;
    color: #b45309;
}

.cert-institution {
    display: block;
    font-size: 0.85rem;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.15em;
    color: #b45309;
    margin-bottom: 0.25rem;
}

.cert-title {
    font-family: 'Times New Roman', Times, serif;
    font-size: 2.25rem;
    font-weight: 700;
    color: #1e293b;
    margin: 0 0 0.5rem 0;
    letter-spacing: 0.02em;
}

.cert-subtitle {
    font-size: 0.95rem;
    font-style: italic;
    color: #64748b;
}

.cert-recipient-section {
    margin: 1.5rem 0 1rem 0;
}

.cert-recipient-name {
    font-family: 'Georgia', serif;
    font-size: 2.15rem;
    font-weight: 700;
    color: #0f172a;
    display: inline-block;
    padding: 0.2rem 1.5rem;
    border-bottom: 2px solid #d97706;
    outline: none;
    min-width: 280px;
}

.cert-recipient-name:hover,
.cert-recipient-name:focus {
    background: #fef3c7;
    border-radius: 4px;
}

.cert-statement {
    font-size: 0.95rem;
    color: #475569;
    margin: 0 auto;
    max-width: 600px;
}

.cert-course-name {
    font-family: 'Georgia', serif;
    font-size: 1.35rem;
    font-weight: 700;
    color: #b45309;
    margin: 0.75rem auto 2rem auto;
    padding: 0.25rem 0.75rem;
    outline: none;
    display: inline-block;
}

.cert-footer-grid {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    margin-top: 2rem;
    padding: 0 1.5rem;
}

.cert-sig-box {
    width: 200px;
    text-align: center;
}

.cert-sig-line {
    border-bottom: 1px solid #94a3b8;
    height: 35px;
    margin-bottom: 0.4rem;
}

.cert-sig-label {
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: #64748b;
}

.cert-seal-wrap {
    display: flex;
    justify-content: center;
    align-items: center;
}

.cert-gold-seal {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: radial-gradient(circle, #fde047, #ca8a04);
    border: 3px double #78350f;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(202, 138, 4, 0.35);
    color: #78350f;
    font-weight: 900;
}

.cert-seal-star { font-size: 0.9rem; line-height: 1; }
.cert-seal-text { font-size: 0.65rem; letter-spacing: 0.1em; line-height: 1.1; }
.cert-seal-sub { font-size: 0.6rem; letter-spacing: 0.12em; line-height: 1.1; }

.cert-meta-row {
    margin-top: 2rem;
    padding-top: 1rem;
    border-top: 1px solid #e2e8f0;
    display: flex;
    justify-content: space-between;
    font-size: 0.75rem;
    color: #64748b;
}

/* Print Styles - Scoped strictly to Certificate Printing */
@media print {
    body.printing-certificate > :not(#hl-certificate-modal) {
        display: none !important;
    }
    body.printing-certificate #hl-certificate-modal {
        display: block !important;
        position: static !important;
        width: 100% !important;
        height: auto !important;
        background: none !important;
        padding: 0 !important;
    }
    body.printing-certificate .cert-toolbar {
        display: none !important;
    }
    body.printing-certificate .cert-modal-container {
        max-width: 100% !important;
        margin: 0 !important;
        box-shadow: none !important;
    }
    body.printing-certificate .cert-diploma-sheet {
        box-shadow: none !important;
        padding: 0 !important;
        border-radius: 0 !important;
    }
    body:not(.printing-certificate) #hl-certificate-modal {
        display: none !important;
    }
}
</style>
