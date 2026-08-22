<!-- Book Knowledge Modal -->
<div id="bookModal" class="library-modal hidden" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <!-- Backdrop -->
    <div class="library-modal-backdrop" onclick="closeModal()"></div>

    <!-- Modal Content Window -->
    <div class="library-modal-content" onclick="event.stopPropagation()">

        <!-- Close Button -->
        <button onclick="closeModal()" id="book-modal-close" class="library-modal-close-btn" aria-label="Close overview modal">
            <i class="fas fa-times"></i>
        </button>

        <div class="library-modal-body-wrapper">
            <!-- Book Cover Pane -->
            <div class="library-modal-cover-pane">
                <div class="library-modal-cover-glow"></div>
                <img id="modal-img" src="" alt="Book Cover" class="library-modal-cover-img" onerror="this.onerror=null; this.src='https://placehold.co/300x450/1e293b/ffffff?text=No+Cover';">
                
                <!-- Star (Bookmark) and Cite Buttons Under Cover Image -->
                <div class="library-modal-cover-actions">
                    <button id="modal-bookmark-btn" onclick="toggleModalBookmark()" class="modal-cover-btn bookmark-btn" title="Save to My Reading List" aria-label="Save to My Reading List">
                        <i class="far fa-star"></i> <span>Save to List</span>
                    </button>
                    <button type="button" id="modal-citation-btn" onclick="openBookCitationModal()" class="modal-cover-btn cite-btn" title="Generate Citations" aria-label="Generate Citation">
                        <i class="fas fa-quote-right"></i> <span>Cite Book</span>
                    </button>
                </div>
            </div>

            <!-- Details Pane -->
            <div class="library-modal-info-pane">
                <!-- Titles -->
                <div class="library-modal-title-section">
                    <h2 id="modal-title" class="library-modal-title"></h2>
                    <p id="modal-author" class="library-modal-author"></p>
                </div>

                <!-- Specs Grid -->
                <div class="library-modal-specs-grid">
                    <div class="library-modal-specs-decor"></div>
                    <div id="modal-date-container">
                        <span class="spec-label">Published</span>
                        <span id="modal-date" class="spec-value spec-val-mono"></span>
                    </div>
                    <div id="modal-isbn-container">
                        <span class="spec-label">ISBN</span>
                        <span id="modal-isbn" class="spec-value spec-val-mono spec-val-break"></span>
                    </div>
                    <div id="modal-lexile-container" class="library-modal-spec-half hidden">
                        <span class="spec-label">Lexile Measure <button type="button" class="spec-info-btn" onclick="openLexileInfoModal()" title="What is Lexile?"><i class="fas fa-info-circle"></i></button></span>
                        <div class="spec-value-flex">
                            <span id="modal-lexile" class="spec-value spec-val-highlight-emerald"></span>
                            
                            <div id="modal-lexile-edit-container" class="hidden" style="display: none;">
                                <input type="text" id="modal-lexile-input" class="spec-edit-input" placeholder="e.g. 1050L" aria-label="Edit Lexile">
                                <button type="button" id="save-lexile-btn" class="spec-action-icon-btn save-btn" title="Save Lexile"><i class="fas fa-check"></i></button>
                                <button type="button" id="cancel-lexile-btn" class="spec-action-icon-btn cancel-btn" title="Cancel"><i class="fas fa-times"></i></button>
                            </div>
                            
                            <button type="button" id="edit-lexile-btn" class="spec-action-icon-btn edit-btn" title="Edit Reading Level"><i class="fas fa-edit"></i></button>
                        </div>
                    </div>
                    <div id="modal-dewey-container" class="library-modal-spec-half hidden">
                        <span class="spec-label">Dewey Decimal <button type="button" class="spec-info-btn" onclick="openDdcInfoModal()" title="What is DDC?"><i class="fas fa-info-circle"></i></button></span>
                        <span id="modal-dewey" class="spec-value spec-val-highlight-purple"></span>
                    </div>
                    <div id="modal-lc-container" class="library-modal-spec-half hidden">
                        <span class="spec-label">Library of Congress</span>
                        <span id="modal-lc" class="spec-value spec-val-highlight-blue"></span>
                    </div>
                    <div id="modal-grade-container" class="library-modal-spec-half hidden">
                        <span class="spec-label">Grade Band</span>
                        <span id="modal-grade" class="spec-value spec-val-highlight-pink"></span>
                    </div>
                    <div id="modal-curriculum-container" class="library-modal-spec-full hidden">
                        <span class="spec-label"><i class="fas fa-graduation-cap text-primary"></i> Aligned Curriculum Tracks</span>
                        <div id="modal-curriculum-content" class="spec-val-curriculum-links"></div>
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
                        <a id="modal-read-online-link" href="#" class="library-modal-read-btn">
                            <i class="fas fa-book-open"></i> <span>Read Online</span>
                        </a>

                        <div class="library-modal-downloads-row">
                            <span class="downloads-label">Formats:</span>
                            <a id="modal-pdf-link" href="#" target="_blank" rel="noopener noreferrer" class="library-download-icon-btn pdf-btn" title="Download PDF" aria-label="Download PDF">
                                <i class="fas fa-file-pdf"></i> <span>PDF</span>
                            </a>
                            <a id="modal-epub-link" href="#" target="_blank" rel="noopener noreferrer" class="library-download-icon-btn epub-btn" title="Download ePUB" aria-label="Download ePUB">
                                <i class="fas fa-book"></i> <span>ePUB</span>
                            </a>
                            <a id="modal-mobi-link" href="#" target="_blank" rel="noopener noreferrer" class="library-download-icon-btn mobi-btn" title="Download MOBI" aria-label="Download MOBI">
                                <i class="fas fa-tablet-alt"></i> <span>MOBI</span>
                            </a>
                            <a id="modal-txt-link" href="#" target="_blank" rel="noopener noreferrer" class="library-download-icon-btn txt-btn" title="Download Plain Text" aria-label="Download Plain Text">
                                <i class="fas fa-file-alt"></i> <span>TXT</span>
                            </a>
                        </div>
                    </div>

                    <!-- Collection List Container -->
                    <div id="modal-collection-actions" class="library-modal-collection-list hidden">
                        <!-- Dynamically populated in library.js -->
                    </div>

                    <!-- Sourcing & Disclaimer Button -->
                    <div class="library-modal-disclaimer-row">
                        <button type="button" onclick="openDisclaimerModal()" class="library-disclaimer-trigger-btn">
                            <i class="fas fa-exclamation-circle"></i> Sourcing & Content Disclaimer
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
        <button type="button" onclick="closeDisclaimerModal()" id="disclaimer-modal-close" class="library-disclaimer-close-btn" aria-label="Close disclaimer">
            <i class="fas fa-times"></i>
        </button>

        <div class="library-disclaimer-header">
            <div class="library-disclaimer-icon-box">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h3 class="library-disclaimer-title">Content Sourcing & Terms</h3>
        </div>
        
        <!-- Tabs Row -->
        <div class="disclaimer-tabs-row" id="disclaimer-tabs">
            <button type="button" class="disclaimer-tab-btn active" id="tab-disc-standard" onclick="switchDisclaimerTab('standard')">Overview</button>
            <button type="button" class="disclaimer-tab-btn" id="tab-disc-license" onclick="switchDisclaimerTab('license')">License & Sourcing</button>
        </div>
        
        <div class="library-disclaimer-body-box" id="disclaimer-standard-view">
            <p class="library-disclaimer-text">
                The books, primary documents, and educational materials in this digital library are provided exclusively for educational, historical research, and classroom instruction purposes. Hesten's Learning makes no claims of ownership over third-party materials or public domain historical texts.
            </p>
        </div>

        <div class="library-disclaimer-body-box hidden" id="disclaimer-license-view" style="display: none;">
            <p class="library-disclaimer-license-text" id="modal-license-text">
                <!-- Populated dynamically by library.js -->
            </p>
        </div>
        
        <div class="library-disclaimer-footer">
            <button type="button" onclick="closeDisclaimerModal()" class="library-disclaimer-action-btn">
                Got It
            </button>
        </div>
    </div>
</div>

<!-- Lexile Info Modal -->
<div id="lexileInfoModal" class="library-modal hidden" role="dialog" aria-modal="true" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeLexileInfoModal()"></div>
    <div class="library-modal-content info-explainer-content" onclick="event.stopPropagation()">
        <button type="button" onclick="closeLexileInfoModal()" class="library-modal-close-btn" aria-label="Close Lexile Explainer">
            <i class="fas fa-times"></i>
        </button>
        <h3 class="explainer-modal-title emerald-title">
            <i class="fas fa-chart-line mr-2"></i> The Lexile® Framework for Reading
        </h3>
        
        <div class="explainer-modal-body">
            <p>
                <strong>What is a Lexile Measure?</strong><br>
                A Lexile reader measure represents a student's reading comprehension ability, while a Lexile text measure represents the complexity of a book or article. Both are calibrated on a unified scale developed by <em>MetaMetrics®</em>.
            </p>
            <p>
                <strong>How it Works:</strong><br>
                Measures range from <strong>200L</strong> for beginning readers to <strong>1600L+</strong> for advanced and collegiate literature. Matching a student's score with a book's measure places them in the optimal comprehension zone (75% comprehension range).
            </p>
        </div>

        <h4 class="explainer-table-heading">Typical Lexile Grade Bands:</h4>
        <div class="explainer-table-wrap">
            <table class="explainer-table">
                <thead>
                    <tr>
                        <th>Grade Level</th>
                        <th>Lexile Range</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Kindergarten</td><td>BR (Beginning Reader) - 275L</td></tr>
                    <tr><td>Grade 1</td><td>190L to 530L</td></tr>
                    <tr><td>Grade 2</td><td>420L to 650L</td></tr>
                    <tr><td>Grade 3</td><td>520L to 820L</td></tr>
                    <tr><td>Grade 4</td><td>740L to 940L</td></tr>
                    <tr><td>Grade 5</td><td>830L to 1010L</td></tr>
                    <tr><td>Grades 6 - 8</td><td>925L to 1185L</td></tr>
                    <tr><td>Grades 9 - 10</td><td>1050L to 1335L</td></tr>
                    <tr><td>Grades 11 - 12</td><td>1185L to 1385L+</td></tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- DDC Info Modal -->
<div id="ddcInfoModal" class="library-modal hidden" role="dialog" aria-modal="true" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeDdcInfoModal()"></div>
    <div class="library-modal-content info-explainer-content" onclick="event.stopPropagation()">
        <button type="button" onclick="closeDdcInfoModal()" class="library-modal-close-btn" aria-label="Close DDC Explainer">
            <i class="fas fa-times"></i>
        </button>
        <h3 class="explainer-modal-title purple-title">
            <i class="fas fa-sitemap mr-2"></i> The Dewey Decimal Classification
        </h3>
        
        <div class="explainer-modal-body">
            <p>
                <strong>What is the Dewey Decimal System?</strong><br>
                The Dewey Decimal Classification (DDC) is a library classification system first conceived by Melvil Dewey in 1876. It organizes human knowledge into a structured, numerical shelf order based on subject matter.
            </p>
        </div>

        <h4 class="explainer-table-heading">The 10 Core DDC Classes:</h4>
        <div class="explainer-classes-list">
            <div class="ddc-class-row"><strong>000 - 099</strong><span>Computer Science, Information & General Works</span></div>
            <div class="ddc-class-row"><strong>100 - 199</strong><span>Philosophy & Psychology</span></div>
            <div class="ddc-class-row"><strong>200 - 299</strong><span>Religion</span></div>
            <div class="ddc-class-row"><strong>300 - 399</strong><span>Social Sciences</span></div>
            <div class="ddc-class-row"><strong>400 - 499</strong><span>Language</span></div>
            <div class="ddc-class-row"><strong>500 - 599</strong><span>Science</span></div>
            <div class="ddc-class-row"><strong>600 - 699</strong><span>Technology & Applied Science</span></div>
            <div class="ddc-class-row"><strong>700 - 799</strong><span>Arts & Recreation</span></div>
            <div class="ddc-class-row"><strong>800 - 899</strong><span>Literature & Rhetoric</span></div>
            <div class="ddc-class-row"><strong>900 - 999</strong><span>History & Geography</span></div>
        </div>
    </div>
</div>

<!-- Citation Generator Modal -->
<div id="bookCitationModal" class="library-modal hidden" role="dialog" aria-modal="true" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeBookCitationModal()"></div>
    <div class="library-modal-content info-explainer-content" onclick="event.stopPropagation()">
        <button type="button" onclick="closeBookCitationModal()" class="library-modal-close-btn" aria-label="Close Citation Modal">
            <i class="fas fa-times"></i>
        </button>
        <h3 class="explainer-modal-title primary-title">
            <i class="fas fa-quote-right mr-2"></i> Academic Citation Generator
        </h3>
        <p class="explainer-subtitle">Copy standard academic citations for this source:</p>

        <div class="citation-format-tabs">
            <button type="button" class="citation-tab-btn active" onclick="switchCitationStyle('mla')">MLA 9</button>
            <button type="button" class="citation-tab-btn" onclick="switchCitationStyle('apa')">APA 7</button>
            <button type="button" class="citation-tab-btn" onclick="switchCitationStyle('chicago')">Chicago 17</button>
            <button type="button" class="citation-tab-btn" onclick="switchCitationStyle('harvard')">Harvard</button>
        </div>

        <div class="citation-preview-box">
            <div id="citation-text" class="citation-text-render"></div>
            <button type="button" id="citation-copy-btn" class="citation-copy-btn" onclick="copyCitationText()">
                <i class="fas fa-copy"></i> <span>Copy Citation</span>
            </button>
        </div>
    </div>
</div>
