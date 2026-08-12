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
                        <span class="spec-label">Lexile / Reading Level <i class="fas fa-info-circle" style="cursor: pointer; opacity: 0.7;" onclick="openLexileInfoModal()"></i></span>
                        <span id="modal-lexile" class="spec-value spec-val-highlight-emerald"></span>
                    </div>
                    <div id="modal-dewey-container" class="library-modal-spec-half hidden">
                        <span class="spec-label">Dewey Decimal <i class="fas fa-info-circle" style="cursor: pointer; opacity: 0.7;" onclick="openDdcInfoModal()"></i></span>
                        <span id="modal-dewey" class="spec-value spec-val-highlight-purple"></span>
                    </div>
                    <div id="modal-lc-container" class="library-modal-spec-half hidden">
                        <span class="spec-label">LC Class</span>
                        <span id="modal-lc" class="spec-value spec-val-highlight-blue" style="background-color: rgba(59, 130, 246, 0.1); color: #3b82f6; border: 1px solid rgba(59, 130, 246, 0.2); padding: 0.25rem 0.75rem; border-radius: 9999px; font-weight: 700; font-size: 0.85rem; display: inline-block;"></span>
                    </div>
                    <div id="modal-grade-container" class="library-modal-spec-half hidden">
                        <span class="spec-label">Grade Level</span>
                        <span id="modal-grade" class="spec-value spec-val-highlight-pink"></span>
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

<!-- Lexile Info Modal -->
<div id="lexileInfoModal" class="library-modal hidden" role="dialog" aria-modal="true" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeLexileInfoModal()"></div>
    <div class="library-modal-content" style="max-width: 32rem; padding: 2rem;" onclick="event.stopPropagation()">
        <button onclick="closeLexileInfoModal()" class="library-modal-close-btn" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
        <h3 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.5rem; font-weight: 800; color: var(--color-primary); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;"><i class="fas fa-info-circle"></i> Lexile Measure</h3>
        <p style="font-size: 0.9rem; line-height: 1.6; color: var(--color-text-secondary); margin-bottom: 1.5rem; text-align: left;">
            A Lexile measure represents a text's difficulty. It helps readers find books at an appropriate reading level. Scores range from 200L (beginning) to 1600L+ (advanced).
        </p>
        <h4 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.75rem; text-align: left;">Catalog Comparison:</h4>
        <div style="max-height: 200px; overflow-y: auto; border: 1px solid var(--color-border); border-radius: 0.75rem; padding: 0.5rem 1rem; background: var(--color-base-bg);">
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>The Midnight Library</span><strong>850L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>The Fellowship of the Ring</span><strong>920L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>The Two Towers</span><strong>940L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>The Return of the King</span><strong>960L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>The Hobbit / LOTR Collection</span><strong>1000L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>Pride and Prejudice</span><strong>1070L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>Dune</span><strong>1080L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>1984</span><strong>1090L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>The Art of War</span><strong>1140L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>Frankenstein</span><strong>1170L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>Meditations</span><strong>1200L</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; font-size: 0.85rem;"><span>Euclid's Elements / Relativity</span><strong>1300L</strong></div>
        </div>
    </div>
</div>

<!-- DDC Info Modal -->
<div id="ddcInfoModal" class="library-modal hidden" role="dialog" aria-modal="true" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeDdcInfoModal()"></div>
    <div class="library-modal-content" style="max-width: 32rem; padding: 2rem;" onclick="event.stopPropagation()">
        <button onclick="closeDdcInfoModal()" class="library-modal-close-btn" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
        <h3 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.5rem; font-weight: 800; color: var(--color-primary); margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;"><i class="fas fa-info-circle"></i> Dewey Decimal System</h3>
        <p style="font-size: 0.9rem; line-height: 1.6; color: var(--color-text-secondary); margin-bottom: 1.5rem; text-align: left;">
            The Dewey Decimal Classification (DDC) organizes library materials by subject discipline into ten main categories. It makes finding specific subjects easy.
        </p>
        <h4 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.75rem; text-align: left;">Catalog Comparison:</h4>
        <div style="max-height: 200px; overflow-y: auto; border: 1px solid var(--color-border); border-radius: 0.75rem; padding: 0.5rem 1rem; background: var(--color-base-bg);">
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>100s Philosophy & Psychology (Meditations)</span><strong>180</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>300s Social Sciences (The Art of War)</span><strong>355.02</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border); font-size: 0.85rem;"><span>800s Literature (The Midnight Library)</span><strong>823.92</strong></div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; font-size: 0.85rem;"><span>800s Literature (Dune)</span><strong>813.54</strong></div>
        </div>
    </div>
</div>
