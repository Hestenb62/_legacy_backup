<?php
// Load Full Project Gutenberg License from assets/text/library-gutenburg.md
$gutenbergLicenseFile = __DIR__ . '/../assets/text/library-gutenburg.md';
$gutenbergMarkdown = is_file($gutenbergLicenseFile) ? file_get_contents($gutenbergLicenseFile) : '';

if (!function_exists('renderGutenbergLicenseHtml')) {
    function renderGutenbergLicenseHtml($md) {
        if (empty($md)) return '<p class="library-disclaimer-text">License documentation unavailable.</p>';
        $lines = explode("\n", $md);
        $html = '';
        $inList = false;
        $inBlockquote = false;

        foreach ($lines as $line) {
            $trimmed = rtrim($line);
            if (strpos($trimmed, '# ') === 0) {
                if ($inList) { $html .= "</ul>\n"; $inList = false; }
                if ($inBlockquote) { $html .= "</blockquote>\n"; $inBlockquote = false; }
                $html .= '<h4 class="gutenberg-h1">' . htmlspecialchars(substr($trimmed, 2)) . "</h4>\n";
            } elseif (strpos($trimmed, '## ') === 0) {
                if ($inList) { $html .= "</ul>\n"; $inList = false; }
                if ($inBlockquote) { $html .= "</blockquote>\n"; $inBlockquote = false; }
                $html .= '<h5 class="gutenberg-h2">' . htmlspecialchars(substr($trimmed, 3)) . "</h5>\n";
            } elseif (strpos($trimmed, '### ') === 0) {
                if ($inList) { $html .= "</ul>\n"; $inList = false; }
                if ($inBlockquote) { $html .= "</blockquote>\n"; $inBlockquote = false; }
                $html .= '<h6 class="gutenberg-h3">' . htmlspecialchars(substr($trimmed, 4)) . "</h6>\n";
            } elseif ($trimmed === '---') {
                if ($inList) { $html .= "</ul>\n"; $inList = false; }
                if ($inBlockquote) { $html .= "</blockquote>\n"; $inBlockquote = false; }
                $html .= '<hr class="gutenberg-divider">' . "\n";
            } elseif (strpos($trimmed, '> ') === 0) {
                if ($inList) { $html .= "</ul>\n"; $inList = false; }
                if (!$inBlockquote) { $html .= '<blockquote class="gutenberg-quote">'; $inBlockquote = true; }
                $text = substr($trimmed, 2);
                $formatted = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', htmlspecialchars($text));
                $formatted = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2" target="_blank" rel="noopener noreferrer" style="color: var(--lib-primary); text-decoration: underline;">$1</a>', $formatted);
                $html .= '<p>' . $formatted . "</p>\n";
            } elseif (strpos($trimmed, '* ') === 0 || strpos($trimmed, '- ') === 0 || preg_match('/^\d+\.\s/', $trimmed)) {
                if ($inBlockquote) { $html .= "</blockquote>\n"; $inBlockquote = false; }
                if (!$inList) { $html .= '<ul class="gutenberg-list">'; $inList = true; }
                $content = preg_replace('/^(\*|-|\d+\.)\s+/', '', $trimmed);
                $formatted = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', htmlspecialchars($content));
                $formatted = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2" target="_blank" rel="noopener noreferrer" style="color: var(--lib-primary); text-decoration: underline;">$1</a>', $formatted);
                $html .= '<li>' . $formatted . "</li>\n";
            } elseif (trim($trimmed) === '') {
                if ($inList) { $html .= "</ul>\n"; $inList = false; }
                if ($inBlockquote) { $html .= "</blockquote>\n"; $inBlockquote = false; }
            } else {
                if ($inList) { $html .= "</ul>\n"; $inList = false; }
                if ($inBlockquote) { $html .= "</blockquote>\n"; $inBlockquote = false; }
                $formatted = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', htmlspecialchars($trimmed));
                $formatted = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2" target="_blank" rel="noopener noreferrer" style="color: var(--lib-primary); text-decoration: underline;">$1</a>', $formatted);
                $html .= '<p class="library-disclaimer-text">' . $formatted . "</p>\n";
            }
        }
        if ($inList) $html .= "</ul>\n";
        if ($inBlockquote) $html .= "</blockquote>\n";
        return $html;
    }
}
?>
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

                <!-- Sourcing & Disclaimer Button Under Cite and Save Buttons -->
                <div class="library-modal-disclaimer-row">
                    <button type="button" onclick="openDisclaimerModal()" class="library-disclaimer-trigger-btn" aria-label="View sourcing and content disclaimer">
                        <i class="fas fa-exclamation-circle"></i> <span>Sourcing Disclaimer</span>
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
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Sourcing & Disclaimer Modal -->
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
            <div>
                <h3 class="library-disclaimer-title">Content Sourcing & Terms</h3>
                <p class="library-disclaimer-subtitle">Open Educational Resources & Historical Preservation</p>
            </div>
        </div>
        
        <!-- Tabs Row -->
        <div class="disclaimer-tabs-row" id="disclaimer-tabs" role="tablist" aria-label="Disclaimer Categories">
            <button type="button" class="disclaimer-tab-btn active" id="tab-disc-license" role="tab" aria-selected="true" aria-controls="disclaimer-license-view" onclick="switchDisclaimerTab('license')">
                <i class="fas fa-book-open mr-1"></i> Book License &amp; Source
            </button>
            <button type="button" class="disclaimer-tab-btn" id="tab-disc-standard" role="tab" aria-selected="false" aria-controls="disclaimer-standard-view" onclick="switchDisclaimerTab('standard')">
                <i class="fas fa-balance-scale mr-1"></i> General Terms &amp; Full License
            </button>
        </div>
        
        <!-- Tab 1: Book Specific License & Sourcing View -->
        <div class="library-disclaimer-body-box" id="disclaimer-license-view" role="tabpanel" aria-labelledby="tab-disc-license">
            <!-- Book Context Summary -->
            <div id="modal-disc-book-context" class="disclaimer-book-card">
                <div class="disc-book-info">
                    <span class="disc-book-label">Resource</span>
                    <h4 id="modal-disc-book-title" class="disc-book-title">Selected Title</h4>
                    <p id="modal-disc-book-author" class="disc-book-author"></p>
                </div>
            </div>

            <!-- Sourcing Text Box (Dynamic Volume Attribution) Under Book License & Source Tab -->
            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-info-circle"></i> License &amp; Attribution Statement</h5>
                <p class="library-disclaimer-license-text" id="modal-license-text">
                    <!-- Populated dynamically by library.js -->
                </p>
            </div>
        </div>

        <!-- Tab 2: General Terms & Full License View -->
        <div class="library-disclaimer-body-box" id="disclaimer-standard-view" role="tabpanel" aria-labelledby="tab-disc-standard" style="display: none;">
            <!-- Full Project Gutenberg License Pulled from assets/text/library-gutenburg.md -->
            <div class="disclaimer-text-card" id="modal-gutenberg-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-file-contract"></i> Project Gutenberg™ Full License Agreement</h5>
                <div id="modal-gutenberg-content" class="gutenberg-rendered-text">
                    <?php echo renderGutenbergLicenseHtml($gutenbergMarkdown); ?>
                </div>
            </div>
            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-university"></i> 1. Educational Fair Use &amp; Open Access Policy</h5>
                <p class="library-disclaimer-text">
                    The books, textbooks, primary source documents, historical treatises, and pedagogical materials in this digital library are assembled exclusively for academic instruction, scholarly research, non-commercial education, and personal historical study under Section 107 of the United States Copyright Act (17 U.S.C. § 107) and international fair dealing doctrines.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-landmark"></i> 2. Public Domain Verification &amp; Dedication</h5>
                <p class="library-disclaimer-text">
                    Literary and historical works published prior to January 1, 1928, or explicitly dedicated to the worldwide public domain, are free of known copyright restrictions within the United States. Titles originating from <strong>Project Gutenberg</strong>, the <strong>Internet Archive</strong>, and <strong>Open Library</strong> are provided in compliance with their open-access distribution mandates. Users residing outside the United States are solely responsible for verifying copyright term lengths and local laws prior to downloading or distributing works.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-creative-commons"></i> 3. Open Educational Licensing (Creative Commons)</h5>
                <p class="library-disclaimer-text">
                    Textbooks and reference curricula designated under Creative Commons frameworks—including <strong>OpenStax (CC BY 4.0)</strong>, <strong>The American Yawp (CC BY-SA 4.0)</strong>, and <strong>Public Domain Dedication (CC0 1.0)</strong>—remain protected by their respective licenses. Users are entitled to share, adapt, and distribute these materials in accordance with the attribution and share-alike conditions stipulated by each license deed.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-shield-alt"></i> 4. Intellectual Property &amp; Trademarks</h5>
                <p class="library-disclaimer-text">
                    Hesten's Learning asserts no proprietary copyright or commercial ownership over third-party materials, open-source repositories, historical manuscripts, or publisher-issued cover artwork. All authorial rights, trademarks, and associated intellectual property remain the exclusive property of their respective creators, estates, and original publishers.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-graduation-cap"></i> 5. Academic Integrity &amp; Mandatory Citation</h5>
                <p class="library-disclaimer-text">
                    Users, educators, and scholars are expected to maintain the highest standards of academic integrity. When utilizing materials from this repository in academic papers, coursework, or curriculum guides, users must provide proper scholarly attribution. Built-in citation generators (MLA 9th, APA 7th, and Chicago 17th) are provided in each volume's overview portal.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-exclamation-triangle"></i> 6. Disclaimer of Warranties &amp; Limitation of Liability</h5>
                <p class="library-disclaimer-text">
                    All texts and digital assets are provided strictly on an <em>"AS IS"</em> and <em>"AS AVAILABLE"</em> basis without warranties of any kind, whether express, statutory, or implied. Hesten's Learning makes no warranty that digital transcriptions are error-free or that historical content reflects contemporary scientific, medical, or legal consensus.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-envelope-open-text"></i> 7. DMCA Compliance &amp; Rights Inquiries</h5>
                <p class="library-disclaimer-text">
                    If you are a copyright holder or authorized representative who believes that any material hosted in this digital library infringes your rights, please submit a formal takedown notice to our compliance administration at <a href="mailto:admin@hestena62.com" style="color: var(--lib-primary); font-weight: 700; text-decoration: underline;">admin@hestena62.com</a> including the specific work, URL location, and verified proof of ownership for immediate remediation.
                </p>
            </div>
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

<!-- Library User Guide / How It Works Modal -->
<div id="libraryGuideModal" class="library-modal hidden" role="dialog" aria-modal="true" aria-labelledby="guide-modal-title" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeLibraryGuideModal()"></div>
    <div class="library-modal-content info-explainer-content library-guide-modal-content" onclick="event.stopPropagation()">
        <button type="button" onclick="closeLibraryGuideModal()" class="library-modal-close-btn" aria-label="Close Library Guide">
            <i class="fas fa-times"></i>
        </button>
        <h3 id="guide-modal-title" class="explainer-modal-title primary-title">
            <i class="fas fa-compass mr-2"></i> How Hesten's Digital Library Works
        </h3>
        <p class="explainer-subtitle">A comprehensive scholar's guide to navigating catalogs, research desks, and accessible study tools.</p>
        
        <div class="library-guide-grid">
            <div class="library-guide-card">
                <div class="guide-card-icon" style="color: #6366f1; background: rgba(99, 102, 241, 0.12);">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="guide-card-content">
                    <h4>1. Finding &amp; Reading Books</h4>
                    <p>Browse categorized shelves for classic literature, science fiction, and historical narratives. Open any book card to read online immediately, download EPUB/PDF files, or view detailed summaries, historical context, and curriculum alignment.</p>
                </div>
            </div>

            <div class="library-guide-card">
                <div class="guide-card-icon" style="color: #ec4899; background: rgba(236, 72, 153, 0.12);">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="guide-card-content">
                    <h4>2. Subject Research Desks</h4>
                    <p>Click the <strong>"More Resources"</strong> button on any shelf header to enter dedicated Research Desks for US History, Math, ELA, Science, Civics, and World Wars. Explore primary sources, open textbooks, and verified external academic archives.</p>
                </div>
            </div>

            <div class="library-guide-card">
                <div class="guide-card-icon" style="color: #10b981; background: rgba(16, 185, 129, 0.12);">
                    <i class="fas fa-filter"></i>
                </div>
                <div class="guide-card-content">
                    <h4>3. Smart Search &amp; View Modes</h4>
                    <p>Search in real-time by title, author, grade band, or topic. Filter by Lexile reading band (Elementary, Middle, High School), and switch seamlessly between <strong>Carousel</strong>, <strong>Grid</strong>, and <strong>Academic Table</strong> view modes.</p>
                </div>
            </div>

            <div class="library-guide-card">
                <div class="guide-card-icon" style="color: #f59e0b; background: rgba(245, 158, 11, 0.12);">
                    <i class="fas fa-star"></i>
                </div>
                <div class="guide-card-content">
                    <h4>4. Personal Reading List &amp; Sync</h4>
                    <p>Star any book to save it to your <strong>My Reading List</strong>. The <strong>Jump Back In</strong> shelf tracks your latest reading progress automatically, syncing securely across devices via Google Drive cloud auto-sync and offline storage.</p>
                </div>
            </div>

            <div class="library-guide-card">
                <div class="guide-card-icon" style="color: #06b6d4; background: rgba(6, 182, 212, 0.12);">
                    <i class="fas fa-universal-access"></i>
                </div>
                <div class="guide-card-content">
                    <h4>5. Accessibility &amp; Citations</h4>
                    <p>Built with full Universal Design for Learning (UDL) support: OpenDyslexic typography, Irlen color overlays, screen reader optimization, MathJax formula rendering, and 1-click academic citation generation (MLA, APA, Chicago, Harvard).</p>
                </div>
            </div>
        </div>

        <div class="library-guide-footer">
            <button type="button" onclick="closeLibraryGuideModal()" class="btn-primary-glow" style="width: 100%; justify-content: center; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-check-circle"></i> <span>Got It — Start Exploring!</span>
            </button>
        </div>
    </div>
</div>

