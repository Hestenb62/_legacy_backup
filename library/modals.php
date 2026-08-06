<!-- Book Modal (Refined as Knowledge Portal) -->
<div id="bookModal"
    class="modal-overlay opacity-0 pointer-events-none hidden"
    role="dialog" aria-modal="true" aria-labelledby="modal-title">
    
    <!-- Backdrop -->
    <div class="modal-backdrop" onclick="closeModal()"></div>

    <!-- Modal Content -->
    <div class="modal-content-box scale-95 opacity-0 book-modal-content custom-modal-scrollbar"
        onclick="event.stopPropagation()">

        <!-- Close Button Top -->
        <button onclick="closeModal()" id="book-modal-close"
            class="modal-close-btn">
            <i class="fas fa-times text-lg"></i>
        </button>

        <div class="modal-layout-flex">
            <!-- Book Cover Side -->
            <div class="modal-left-side">
                <!-- Subtle background glow -->
                <div class="modal-left-glow"></div>
                <img id="modal-img" src="" alt="Book Cover" class="modal-cover-img">
            </div>

            <!-- Details Side -->
            <div class="modal-right-side">
                <!-- Titles -->
                <div style="margin-bottom: 2rem;">
                    <div class="modal-tag-header">
                         <span class="modal-tag-line"></span>
                         <span class="modal-tag-text">Library Access</span>
                    </div>
                    <h2 id="modal-title" class="modal-title"></h2>
                    <p id="modal-author" class="modal-author"></p>
                </div>

                <!-- Specs Grid -->
                <div class="modal-specs-grid">
                    <div class="modal-specs-glow"></div>
                    <div>
                        <span class="spec-label">Published</span>
                        <span id="modal-date" class="spec-value"></span>
                    </div>
                    <div>
                        <span class="spec-label">ISBN</span>
                        <span id="modal-isbn" class="spec-value" style="word-break: break-all;"></span>
                    </div>
                    <div id="modal-lexile-container" class="modal-spec-full-row hidden">
                        <span class="spec-label">Lexile / Reading Level</span>
                        <span id="modal-lexile" class="lexile-val"></span>
                    </div>
                    <div id="modal-dewey-container" class="modal-spec-full-row hidden">
                        <span class="spec-label">Dewey Decimal</span>
                        <span id="modal-dewey" class="dewey-val"></span>
                    </div>
                </div>

                <!-- Description -->
                <div class="modal-desc-block">
                    <p id="modal-description" class="modal-desc-text"></p>
                </div>

                <!-- Action Buttons Area -->
                <div class="modal-actions-container">
                    
                    <!-- Single Book Actions -->
                    <div id="modal-single-actions" class="modal-single-actions-layout">
                        <a id="modal-read-online-link" href="#" target="_blank" rel="noopener noreferrer" class="read-online-btn">
                            <i class="fas fa-book-open"></i> <span>Read Online</span>
                        </a>

                        <div class="download-btn-container">
                             <a id="modal-pdf-link" href="#" target="_blank" rel="noopener noreferrer"
                                class="download-btn"
                                title="Download PDF" aria-label="Download PDF">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <a id="modal-epub-link" href="#" target="_blank" rel="noopener noreferrer"
                                class="download-btn"
                                title="Download ePUB" aria-label="Download ePUB">
                                <i class="fas fa-book"></i>
                            </a>
                            <a id="modal-mobi-link" href="#" target="_blank" rel="noopener noreferrer"
                                class="download-btn"
                                title="Download MOBI" aria-label="Download MOBI">
                                <i class="fas fa-tablet-alt"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Collection List Container -->
                    <div id="modal-collection-actions" class="collection-actions-list custom-modal-scrollbar">
                        <!-- Dynamically populated in JS -->
                    </div>

                    <!-- Disclaimer Button -->
                    <div class="disclaimer-wrapper">
                        <button onclick="openDisclaimerModal()" class="disclaimer-btn">
                            <i class="fas fa-exclamation-circle text-amber-500/80"></i> Content Disclaimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Disclaimer Modal -->
<div id="disclaimerModal"
    class="disclaimer-modal-overlay opacity-0 pointer-events-none hidden"
    role="alertdialog" aria-modal="true" onclick="closeDisclaimerModal()">
    <div class="modal-backdrop"></div>
    <div class="disclaimer-modal-content scale-95" onclick="event.stopPropagation()">

        <button onclick="closeDisclaimerModal()" id="disclaimer-modal-close" class="disclaimer-close-btn">
            <i class="fas fa-times"></i>
        </button>

        <div style="text-align: center; margin-bottom: 1.5rem; margin-top: 0.5rem;">
            <div class="disclaimer-icon-wrapper">
                 <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="no-results-title" style="font-size: 1.875rem;">Disclaimer</h3>
        </div>
        <div class="disclaimer-body-box">
            <p>
                 The books and materials in this digital library are provided for educational and informational purposes
                 only. Hesten's Learning makes no claims of ownership over third-party content. Please ensure your use of
                 these materials complies with applicable copyright laws before downloading.
            </p>
        </div>
        <div style="display: flex; justify-content: center;">
            <button onclick="closeDisclaimerModal()" class="disclaimer-submit-btn">
                I Understand
            </button>
        </div>
    </div>
</div>
