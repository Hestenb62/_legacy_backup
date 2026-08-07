<!-- Book Modal (Refined as Knowledge Portal) -->
<div id="bookModal" class="library-modal hidden" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    
    <!-- Backdrop -->
    <div class="library-modal-backdrop" onclick="closeModal()"></div>

    <!-- Modal Content -->
    <div class="library-modal-content" onclick="event.stopPropagation()">

        <!-- Close Button Top -->
        <button onclick="closeModal()" id="book-modal-close" class="library-modal-close-btn" aria-label="Close overview">
            <i class="fas fa-times"></i>
        </button>

        <div class="library-modal-body-wrapper">
            <!-- Book Cover Side -->
            <div class="library-modal-cover-pane">
                <!-- Subtle background glow -->
                <div class="library-modal-cover-glow"></div>
                <img id="modal-img" src="" alt="Book Cover" class="library-modal-cover-img">
            </div>

            <!-- Details Side -->
            <div class="library-modal-info-pane">
                <!-- Titles -->
                <div class="library-modal-title-section">
                    <div class="library-modal-badge-row">
                         <span class="library-modal-badge-line"></span>
                         <span class="library-modal-badge-text">Library Access</span>
                    </div>
                    <h2 id="modal-title" class="library-modal-title"></h2>
                    <p id="modal-author" class="library-modal-author"></p>
                </div>

                <!-- Specs Grid -->
                <div class="library-modal-specs-grid">
                    <div class="library-modal-specs-decor"></div>
                    <div>
                        <span class="spec-label">Published</span>
                        <span id="modal-date" class="spec-value spec-val-mono"></span>
                    </div>
                    <div>
                        <span class="spec-label">ISBN</span>
                        <span id="modal-isbn" class="spec-value spec-val-mono spec-val-break"></span>
                    </div>
                    <div id="modal-lexile-container" class="library-modal-spec-half hidden">
                        <span class="spec-label">Lexile / Reading Level</span>
                        <span id="modal-lexile" class="spec-value spec-val-highlight-emerald"></span>
                    </div>
                    <div id="modal-dewey-container" class="library-modal-spec-half hidden">
                        <span class="spec-label">Dewey Decimal</span>
                        <span id="modal-dewey" class="spec-value spec-val-highlight-purple"></span>
                    </div>
                </div>

                <!-- Description -->
                <div class="library-modal-desc-section">
                    <p id="modal-description" class="library-modal-description"></p>
                </div>

                <!-- Action Buttons Area -->
                <div class="library-modal-footer-section">
                    
                    <!-- Single Book Actions -->
                    <div id="modal-single-actions" class="library-modal-actions-row">
                        <a id="modal-read-online-link" href="#" target="_blank" rel="noopener noreferrer" class="library-modal-read-btn">
                            <i class="fas fa-book-open"></i> <span>Read Online</span>
                        </a>

                        <div class="library-modal-downloads-row">
                             <a id="modal-pdf-link" href="#" target="_blank" rel="noopener noreferrer" class="library-download-icon-btn pdf-btn" title="Download PDF" aria-label="Download PDF">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <a id="modal-epub-link" href="#" target="_blank" rel="noopener noreferrer" class="library-download-icon-btn epub-btn" title="Download ePUB" aria-label="Download ePUB">
                                <i class="fas fa-book"></i>
                            </a>
                            <a id="modal-mobi-link" href="#" target="_blank" rel="noopener noreferrer" class="library-download-icon-btn mobi-btn" title="Download MOBI" aria-label="Download MOBI">
                                <i class="fas fa-tablet-alt"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Collection List Container -->
                    <div id="modal-collection-actions" class="library-modal-collection-list hidden">
                        <!-- Dynamically populated in JS -->
                    </div>

                    <!-- Disclaimer Button -->
                    <div class="library-modal-disclaimer-row">
                        <button onclick="openDisclaimerModal()" class="library-disclaimer-trigger-btn">
                            <i class="fas fa-exclamation-circle"></i> Content Disclaimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Disclaimer Modal -->
<div id="disclaimerModal" class="library-disclaimer-modal hidden" role="alertdialog" aria-modal="true" onclick="closeDisclaimerModal()">
    <div class="library-disclaimer-modal-backdrop"></div>
    <div class="library-disclaimer-content" onclick="event.stopPropagation()">

        <button onclick="closeDisclaimerModal()" id="disclaimer-modal-close" class="library-disclaimer-close-btn" aria-label="Close disclaimer">
            <i class="fas fa-times"></i>
        </button>

        <div class="library-disclaimer-header">
            <div class="library-disclaimer-icon-box">
                 <i class="fas fa-exclamation-triangle"></i>
            </div>
            <h3 class="library-disclaimer-title">Disclaimer</h3>
        </div>
        
        <div class="library-disclaimer-body-box">
            <p class="library-disclaimer-text">
                 The books and materials in this digital library are provided for educational and informational purposes
                 only. Hesten's Learning makes no claims of ownership over third-party content. Please ensure your use of
                 these materials complies with applicable copyright laws before downloading.
            </p>
        </div>
        
        <div class="library-disclaimer-footer">
            <button onclick="closeDisclaimerModal()" class="library-disclaimer-action-btn">
                I Understand
            </button>
        </div>
    </div>
</div>
