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
                        <span class="spec-label">Lexile/Reading Level <i class="fas fa-info-circle" style="cursor: pointer; opacity: 0.7;" onclick="openLexileInfoModal()"></i></span>
                        <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                            <span id="modal-lexile" class="spec-value spec-val-highlight-emerald"></span>
                            
                            <div id="modal-lexile-edit-container" class="hidden" style="display: none; align-items: center; gap: 0.25rem;">
                                <input type="text" id="modal-lexile-input" style="width: 75px; padding: 0.15rem 0.35rem; border-radius: 0.35rem; border: 1px solid var(--color-border); font-size: 0.85rem; font-weight: 700; color: var(--color-text-default); background: var(--color-content-bg);">
                                <button id="save-lexile-btn" class="library-drawer-close-btn" style="width: 1.75rem; height: 1.75rem; border-radius: 0.25rem; padding: 0;" title="Save"><i class="fas fa-check"></i></button>
                                <button id="cancel-lexile-btn" class="library-drawer-close-btn" style="width: 1.75rem; height: 1.75rem; border-radius: 0.25rem; padding: 0;" title="Cancel"><i class="fas fa-times"></i></button>
                            </div>
                            
                            <button id="edit-lexile-btn" class="library-drawer-close-btn" style="width: 1.75rem; height: 1.75rem; border-radius: 0.25rem; padding: 0;" title="Edit Lexile Level"><i class="fas fa-edit"></i></button>
                        </div>
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
        
        <!-- Tabs Row -->
        <div class="disclaimer-tabs-row hidden" id="disclaimer-tabs">
            <button class="disclaimer-tab-btn active" id="tab-disc-standard" onclick="switchDisclaimerTab('standard')">Disclaimer</button>
            <button class="disclaimer-tab-btn" id="tab-disc-license" onclick="switchDisclaimerTab('license')">License</button>
        </div>
        
        <div class="library-disclaimer-body-box" id="disclaimer-standard-view">
            <p class="library-disclaimer-text">
                 The books and materials in this digital library are provided for educational and informational purposes
                 only. Hesten's Learning makes no claims of ownership over third-party content. Please ensure your use of
                 these materials complies with applicable copyright laws before downloading.
            </p>
        </div>

        <div class="library-disclaimer-body-box hidden" id="disclaimer-license-view" style="display: none;">
            <p class="library-disclaimer-license-text">
                 <!-- Populated dynamically by library.js -->
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
    <div class="library-modal-content" style="max-width: 38rem; padding: 2rem; max-height: 85vh; overflow-y: auto;" onclick="event.stopPropagation()">
        <button onclick="closeLexileInfoModal()" class="library-modal-close-btn" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
        <h3 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.5rem; font-weight: 800; color: #10b981; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-chart-line"></i> The Lexile® Framework
        </h3>
        
        <div style="font-size: 0.9rem; line-height: 1.6; color: var(--color-text-secondary); text-align: left;">
            <p style="margin-bottom: 1rem;">
                <strong>What is a Lexile Measure?</strong><br>
                A Lexile reader measure represents a student's reading ability, while a Lexile text measure represents the difficulty of a text (such as a book or article). Both are placed on a single scale developed by <em>MetaMetrics®</em>, allowing readers to easily find books that match their current reading level.
            </p>
            <p style="margin-bottom: 1.5rem;">
                <strong>How it Works:</strong><br>
                Lexile measures range from <strong>200L</strong> for beginning readers to <strong>1600L+</strong> for advanced texts. When a reader's score matches a book's measure (for example, a 600L reader reading a 600L book), they are in their "sweet spot" (75% comprehension range)—challenging enough to grow their vocabulary without causing frustration.
            </p>
        </div>

        <h4 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.75rem; text-align: left; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">Typical Lexile Grade Bands:</h4>
        <div style="max-height: 250px; overflow-y: auto; border: 1px solid var(--color-border); border-radius: 0.75rem; background: var(--color-base-bg);">
            <table style="width: 100%; border-collapse: collapse; font-size: 0.85rem; text-align: left;">
                <thead>
                    <tr style="border-bottom: 1px solid var(--color-border); background-color: rgba(0,0,0,0.02); font-weight: 700;">
                        <th style="padding: 0.75rem 1rem;">Grade Level</th>
                        <th style="padding: 0.75rem 1rem;">Lexile Range</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid var(--color-border);">
                        <td style="padding: 0.5rem 1rem;">Kindergarten</td>
                        <td style="padding: 0.5rem 1rem;">BR (Beginning Reader) - 275L</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--color-border);">
                        <td style="padding: 0.5rem 1rem;">Grade 1</td>
                        <td style="padding: 0.5rem 1rem;">190L to 530L</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--color-border);">
                        <td style="padding: 0.5rem 1rem;">Grade 2</td>
                        <td style="padding: 0.5rem 1rem;">420L to 650L</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--color-border);">
                        <td style="padding: 0.5rem 1rem;">Grade 3</td>
                        <td style="padding: 0.5rem 1rem;">520L to 820L</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--color-border);">
                        <td style="padding: 0.5rem 1rem;">Grade 4</td>
                        <td style="padding: 0.5rem 1rem;">740L to 940L</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--color-border);">
                        <td style="padding: 0.5rem 1rem;">Grade 5</td>
                        <td style="padding: 0.5rem 1rem;">830L to 1010L</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--color-border);">
                        <td style="padding: 0.5rem 1rem;">Grades 6 - 8</td>
                        <td style="padding: 0.5rem 1rem;">925L to 1185L</td>
                    </tr>
                    <tr style="border-bottom: 1px solid var(--color-border);">
                        <td style="padding: 0.5rem 1rem;">Grades 9 - 10</td>
                        <td style="padding: 0.5rem 1rem;">1050L to 1335L</td>
                    </tr>
                    <tr>
                        <td style="padding: 0.5rem 1rem;">Grades 11 - 12</td>
                        <td style="padding: 0.5rem 1rem;">1185L to 1385L+</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- DDC Info Modal -->
<div id="ddcInfoModal" class="library-modal hidden" role="dialog" aria-modal="true" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeDdcInfoModal()"></div>
    <div class="library-modal-content" style="max-width: 38rem; padding: 2rem; max-height: 85vh; overflow-y: auto;" onclick="event.stopPropagation()">
        <button onclick="closeDdcInfoModal()" class="library-modal-close-btn" aria-label="Close">
            <i class="fas fa-times"></i>
        </button>
        <h3 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.5rem; font-weight: 800; color: #a25afd; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
            <i class="fas fa-sitemap"></i> The Dewey Decimal Classification
        </h3>
        
        <div style="font-size: 0.9rem; line-height: 1.6; color: var(--color-text-secondary); text-align: left;">
            <p style="margin-bottom: 1rem;">
                <strong>What is the Dewey Decimal System?</strong><br>
                The Dewey Decimal Classification (DDC) is a proprietary library classification system first published in the United States by Melvil Dewey in 1876. It organizes a library's books onto shelves in a structured, logical order based on subject matter.
            </p>
            <p style="margin-bottom: 1.5rem;">
                <strong>How it Works:</strong><br>
                The DDC divides all human knowledge into <strong>10 Main Classes</strong>, each represented by a three-digit number. These classes are subdivided into divisions, sections, and further decimal divisions (e.g., <code>500</code> for Science, <code>510</code> for Mathematics, <code>516</code> for Geometry) to keep related topics grouped together.
            </p>
        </div>

        <h4 style="font-size: 1rem; font-weight: 700; margin-bottom: 0.75rem; text-align: left; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">The 10 Core DDC Classes:</h4>
        <div style="max-height: 250px; overflow-y: auto; border: 1px solid var(--color-border); border-radius: 0.75rem; background: var(--color-base-bg); font-size: 0.85rem; text-align: left; padding: 0.5rem 1rem;">
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border);">
                <strong>000 - 099</strong>
                <span style="flex-grow: 1; margin-left: 1.5rem;">Computer Science, Information & General Works</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border);">
                <strong>100 - 199</strong>
                <span style="flex-grow: 1; margin-left: 1.5rem;">Philosophy & Psychology</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border);">
                <strong>200 - 299</strong>
                <span style="flex-grow: 1; margin-left: 1.5rem;">Religion</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border);">
                <strong>300 - 399</strong>
                <span style="flex-grow: 1; margin-left: 1.5rem;">Social Sciences</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border);">
                <strong>400 - 499</strong>
                <span style="flex-grow: 1; margin-left: 1.5rem;">Language</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border);">
                <strong>500 - 599</strong>
                <span style="flex-grow: 1; margin-left: 1.5rem;">Science</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border);">
                <strong>600 - 699</strong>
                <span style="flex-grow: 1; margin-left: 1.5rem;">Technology & Applied Science</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border);">
                <strong>700 - 799</strong>
                <span style="flex-grow: 1; margin-left: 1.5rem;">Arts & Recreation</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0; border-bottom: 1px solid var(--color-border);">
                <strong>800 - 899</strong>
                <span style="flex-grow: 1; margin-left: 1.5rem;">Literature & Rhetoric</span>
            </div>
            <div style="display: flex; justify-content: space-between; padding: 0.5rem 0;">
                <strong>900 - 999</strong>
                <span style="flex-grow: 1; margin-left: 1.5rem;">History & Geography</span>
            </div>
        </div>
    </div>
</div>
