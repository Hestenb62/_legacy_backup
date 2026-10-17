<?php
// Load Full Project Gutenberg License from assets/text/library-gutenburg.md
$gutenbergLicenseFile = __DIR__.'/../assets/text/library-gutenburg.md';
$gutenbergMarkdown = is_file($gutenbergLicenseFile) ? file_get_contents($gutenbergLicenseFile) : '';

if (! function_exists('renderGutenbergLicenseHtml')) {
    function renderGutenbergLicenseHtml($md)
        {
        if (empty($md))
            return '<p class="library-disclaimer-text">License documentation unavailable.</p>';
        $lines = explode("\n", $md);
        $html = '';
        $inList = false;
        $inBlockquote = false;

        foreach ($lines as $line) {
            $trimmed = rtrim($line);
            if (strpos($trimmed, '# ') === 0) {
                if ($inList) {
                    $html .= "</ul>\n";
                    $inList = false;
                    }
                if ($inBlockquote) {
                    $html .= "</blockquote>\n";
                    $inBlockquote = false;
                    }
                $html .= '<h4 class="gutenberg-h1">'.htmlspecialchars(substr($trimmed, 2))."</h4>\n";
                } elseif (strpos($trimmed, '## ') === 0) {
                if ($inList) {
                    $html .= "</ul>\n";
                    $inList = false;
                    }
                if ($inBlockquote) {
                    $html .= "</blockquote>\n";
                    $inBlockquote = false;
                    }
                $html .= '<h5 class="gutenberg-h2">'.htmlspecialchars(substr($trimmed, 3))."</h5>\n";
                } elseif (strpos($trimmed, '### ') === 0) {
                if ($inList) {
                    $html .= "</ul>\n";
                    $inList = false;
                    }
                if ($inBlockquote) {
                    $html .= "</blockquote>\n";
                    $inBlockquote = false;
                    }
                $html .= '<h6 class="gutenberg-h3">'.htmlspecialchars(substr($trimmed, 4))."</h6>\n";
                } elseif ($trimmed === '---') {
                if ($inList) {
                    $html .= "</ul>\n";
                    $inList = false;
                    }
                if ($inBlockquote) {
                    $html .= "</blockquote>\n";
                    $inBlockquote = false;
                    }
                $html .= '<hr class="gutenberg-divider">'."\n";
                } elseif (strpos($trimmed, '> ') === 0) {
                if ($inList) {
                    $html .= "</ul>\n";
                    $inList = false;
                    }
                if (! $inBlockquote) {
                    $html .= '<blockquote class="gutenberg-quote">';
                    $inBlockquote = true;
                    }
                $text = substr($trimmed, 2);
                $formatted = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', htmlspecialchars($text));
                $formatted = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2" target="_blank" rel="noopener noreferrer" style="color: var(--lib-primary); text-decoration: underline;">$1</a>', $formatted);
                $html .= '<p>'.$formatted."</p>\n";
                } elseif (strpos($trimmed, '* ') === 0 || strpos($trimmed, '- ') === 0 || preg_match('/^\d+\.\s/', $trimmed)) {
                if ($inBlockquote) {
                    $html .= "</blockquote>\n";
                    $inBlockquote = false;
                    }
                if (! $inList) {
                    $html .= '<ul class="gutenberg-list">';
                    $inList = true;
                    }
                $content = preg_replace('/^(\*|-|\d+\.)\s+/', '', $trimmed);
                $formatted = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', htmlspecialchars($content));
                $formatted = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2" target="_blank" rel="noopener noreferrer" style="color: var(--lib-primary); text-decoration: underline;">$1</a>', $formatted);
                $html .= '<li>'.$formatted."</li>\n";
                } elseif (trim($trimmed) === '') {
                if ($inList) {
                    $html .= "</ul>\n";
                    $inList = false;
                    }
                if ($inBlockquote) {
                    $html .= "</blockquote>\n";
                    $inBlockquote = false;
                    }
                } else {
                if ($inList) {
                    $html .= "</ul>\n";
                    $inList = false;
                    }
                if ($inBlockquote) {
                    $html .= "</blockquote>\n";
                    $inBlockquote = false;
                    }
                $formatted = preg_replace('/\*\*(.*?)\*\*/', '<strong>$1</strong>', htmlspecialchars($trimmed));
                $formatted = preg_replace('/\[(.*?)\]\((.*?)\)/', '<a href="$2" target="_blank" rel="noopener noreferrer" style="color: var(--lib-primary); text-decoration: underline;">$1</a>', $formatted);
                $html .= '<p class="library-disclaimer-text">'.$formatted."</p>\n";
                }
            }
        if ($inList)
            $html .= "</ul>\n";
        if ($inBlockquote)
            $html .= "</blockquote>\n";
        return $html;
        }
    }
?>
<!-- SLiMS Bibliographic Record Detail Page / Closable Overlay -->
<div id="bookModal" class="library-modal slims-page-modal hidden" role="dialog" aria-modal="true" aria-labelledby="modal-title">
    <!-- Backdrop -->
    <div class="library-modal-backdrop" onclick="closeModal()"></div>

    <!-- Modal Content Window: Styled as full-view bibliographic record page -->
    <div class="library-modal-content slims-record-container" onclick="event.stopPropagation()">

        <!-- Sticky Header Navigation Bar (Page Header) -->
        <header class="slims-record-nav-header">
            <div class="slims-record-nav-left">
                <button type="button" onclick="closeModal()" id="slims-back-catalog-btn" class="slims-back-btn" aria-label="Back to Library Catalog">
                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                    <span>Back to Catalog</span>
                    <kbd class="slims-kbd-hint">Esc</kbd>
                </button>
                <div class="slims-breadcrumb-trail" aria-label="Breadcrumb">
                    <span id="modal-breadcrumb-category" class="slims-crumb-cat">Catalog</span>
                    <span class="slims-crumb-sep">/</span>
                    <span id="modal-breadcrumb-title" class="slims-crumb-active">Book Title</span>
                </div>
            </div>

            <div class="slims-record-nav-right">
                <!-- Copy Direct Link Button (# id) -->
                <button type="button" id="slims-share-link-btn" onclick="copyBookShareLink()" class="slims-nav-tool-btn" title="Copy direct link to this book" aria-label="Copy direct link to this book">
                    <i class="fas fa-link"></i> <span id="slims-share-link-text">Share Link</span>
                </button>

                <!-- Bookmark Button in Header -->
                <button type="button" id="modal-bookmark-btn" onclick="toggleModalBookmark()" class="slims-nav-tool-btn bookmark-btn" title="Save to My Reading List" aria-label="Save to My Reading List">
                    <i class="far fa-star"></i> <span>Save to List</span>
                </button>

                <!-- Close Button -->
                <button type="button" onclick="closeModal()" id="book-modal-close" class="slims-record-close-btn" aria-label="Close bibliographic record">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </header>

        <!-- Scrollable Bibliographic Body -->
        <div class="library-modal-body-wrapper slims-record-body">

            <!-- Left Media & Circulation Column -->
            <aside class="library-modal-cover-pane slims-media-column">
                <div class="slims-cover-display-box">
                    <div class="slims-cover-3d-wrap">
                        <img id="modal-img" src="" alt="Book Cover" class="library-modal-cover-img slims-book-cover-img"
                            onerror="this.onerror=null; this.src='https://placehold.co/300x450/1e293b/ffffff?text=No+Cover';">
                        <div id="modal-spine-call-tag" class="slims-cover-call-spine" title="Item Call Number"></div>
                    </div>
                </div>

                <!-- Primary Reading Action -->
                <div class="slims-media-actions-block">
                    <a id="modal-read-online-link" href="#" class="btn-slims-read-primary" title="Launch online reader">
                        <i class="fas fa-book-open"></i> <span>Read Online</span>
                    </a>

                    <!-- Dual Volume Online Readers (e.g. The American Yawp Vol 1 & Vol 2) -->
                    <div id="modal-dual-volume-actions" class="library-modal-vol-group hidden">
                        <a id="modal-read-vol1-link" href="#"
                            class="library-modal-read-btn library-modal-vol1-btn"
                            title="Read Volume 1 Online"
                            aria-label="Read Volume 1 Online">
                            <i class="fas fa-book-open"></i> <span>Read: Vol 1</span>
                        </a>
                        <a id="modal-read-vol2-link" href="#"
                            class="library-modal-read-btn library-modal-vol2-btn"
                            title="Read Volume 2 Online"
                            aria-label="Read Volume 2 Online">
                            <i class="fas fa-book-open"></i> <span>Read: Vol 2</span>
                        </a>
                    </div>
                </div>

                <!-- Tools & Sourcing Row -->
                <div class="slims-media-tools-row">
                    <button type="button" id="modal-citation-btn" onclick="openBookCitationModal()"
                        class="modal-cover-btn cite-btn" title="Generate Citation" aria-label="Generate Citation">
                        <i class="fas fa-quote-right"></i> <span>Cite Record</span>
                    </button>
                    <button type="button" onclick="openDisclaimerModal()" class="library-disclaimer-trigger-btn"
                        aria-label="View sourcing and content disclaimer">
                        <i class="fas fa-shield-halved"></i> <span>Sourcing / License</span>
                    </button>
                </div>
            </aside>

            <!-- Right Bibliographic Record Information Column -->
            <main class="library-modal-info-pane slims-record-info-column">

                <!-- Title & Authorship Section -->
                <div class="slims-record-title-banner">
                    <div class="slims-meta-top-tags">
                        <span id="modal-category-tag" class="slims-tag-category">Catalog</span>
                        <span id="modal-grade-tag" class="slims-tag-grade hidden"><i class="fas fa-graduation-cap"></i> <span id="modal-grade-text"></span></span>
                        <span id="modal-lexile-tag" class="slims-tag-lexile hidden">
                            <i class="fas fa-brain" aria-hidden="true"></i>
                            <span id="modal-lexile"></span>
                            <button type="button" class="slims-lexile-info-trigger" onclick="openLexileInfoModal()" title="What is Lexile?" aria-label="What is Lexile?">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        </span>
                    </div>
                    <h1 id="modal-title" class="slims-record-h1"></h1>
                    <p id="modal-author" class="slims-record-author-line"></p>
                </div>

                <!-- SLiMS Tabbed Record Sections -->
                <div class="slims-record-tabs-bar" role="tablist" aria-label="Bibliographic Record Views">
                    <button type="button" id="tab-btn-biblio" class="slims-tab-btn active" role="tab" aria-selected="true" aria-controls="slims-tab-content-biblio" onclick="switchSlimsModalTab('biblio')">
                        <i class="fas fa-table-list"></i> <span>Bibliographic Information</span>
                    </button>
                    <button type="button" id="tab-btn-synopsis" class="slims-tab-btn" role="tab" aria-selected="false" aria-controls="slims-tab-content-synopsis" onclick="switchSlimsModalTab('synopsis')">
                        <i class="fas fa-align-left"></i> <span>Abstract / Notes</span>
                    </button>
                    <button type="button" id="tab-btn-barcode" class="slims-tab-btn" role="tab" aria-selected="false" aria-controls="slims-tab-content-barcode" onclick="switchSlimsModalTab('barcode')">
                        <i class="fas fa-barcode"></i> <span>Barcode</span>
                    </button>
                </div>

                <!-- Tab 1: Bibliographic Information (SLiMS Detail Bibliografi) -->
                <div id="slims-tab-content-biblio" class="slims-tab-panel active" role="tabpanel" aria-labelledby="tab-btn-biblio">
                    <div class="slims-metadata-table-wrapper">
                        <table class="slims-table-biblio" aria-label="Bibliographic Details">
                            <tbody>
                                <tr>
                                    <th scope="row">Call Number</th>
                                    <td id="modal-td-callno" class="slims-val-highlight-amber slims-val-mono"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Standard Number (ISBN)</th>
                                    <td id="modal-td-isbn" class="slims-val-mono"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Publication / Release Date</th>
                                    <td id="modal-td-date"></td>
                                </tr>
                                <tr>
                                    <th scope="row">Digital Sourcing &amp; Repository</th>
                                    <td id="modal-td-source">Hesten's Learning Archive &bull; Project Gutenberg</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tab 2: Synopsis / Abstract -->
                <div id="slims-tab-content-synopsis" class="slims-tab-panel hidden" role="tabpanel" aria-labelledby="tab-btn-synopsis">
                    <div class="slims-abstract-card">
                        <h3 class="slims-section-subtitle"><i class="fas fa-book-bookmark text-primary"></i> Abstract &amp; Content Overview</h3>
                        <p id="modal-description" class="slims-abstract-text"></p>
                    </div>

                    <!-- Curriculum Alignment Links (if available) -->
                    <div id="modal-curriculum-container" class="slims-curriculum-box hidden">
                        <h4 class="slims-curriculum-title"><i class="fas fa-graduation-cap"></i> Aligned Curriculum Tracks</h4>
                        <div id="modal-curriculum-content" class="spec-val-curriculum-links"></div>
                    </div>
                </div>

                <!-- Tab 3: Barcode / Inventory (Prepared for Upcoming Revisions) -->
                <div id="slims-tab-content-barcode" class="slims-tab-panel hidden" role="tabpanel" aria-labelledby="tab-btn-barcode">
                    <div class="slims-barcode-wrapper">
                        <!-- SLiMS Physical & Digital Item Barcode Label -->
                        <div class="slims-barcode-card">
                            <div class="slims-barcode-header">
                                <div class="slims-barcode-header-left">
                                    <span class="slims-barcode-lib-name">HESTEN'S LEARNING &bull; OPEN REPOSITORY</span>
                                    <span class="slims-barcode-subhead">Item Circulation &amp; Shelf Label</span>
                                </div>
                                <span class="slims-barcode-rev-badge"><i class="fas fa-clock-rotate-left"></i> Revision Staging</span>
                            </div>

                            <!-- Book Information on Label -->
                            <div class="slims-barcode-book-info">
                                <h4 id="modal-barcode-book-title" class="slims-barcode-book-title">Selected Title</h4>
                                <p id="modal-barcode-book-author" class="slims-barcode-book-author"></p>
                            </div>

                            <!-- Crisp SVG Barcode Graphic -->
                            <div class="slims-barcode-display" id="modal-barcode-display" aria-label="Item Barcode Visual">
                                <svg id="modal-barcode-svg" class="slims-barcode-svg" viewBox="0 0 320 80" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Code 128 Barcode">
                                    <!-- Rendered dynamically via lib-book-overview-modal.js -->
                                </svg>
                                <div class="slims-barcode-human-code" id="modal-barcode-val">HL-000000-01</div>
                            </div>

                            <!-- Barcode Metadata Footer -->
                            <div class="slims-barcode-card-footer">
                                <div class="slims-barcode-item-meta">
                                    <span class="meta-label">Call Number:</span>
                                    <strong id="modal-barcode-callno" class="meta-val">--</strong>
                                </div>
                                <div class="slims-barcode-item-meta">
                                    <span class="meta-label">Collection Location:</span>
                                    <span class="meta-val">Main Digital Stacks &bull; Unit 1</span>
                                </div>
                            </div>
                        </div>

                        <!-- Barcode Inventory & System Details Table -->
                        <div class="slims-metadata-table-wrapper">
                            <table class="slims-table-biblio" aria-label="Barcode and Inventory Details">
                                <tbody>
                                    <tr>
                                        <th scope="row">Item Barcode Code</th>
                                        <td>
                                            <div class="slims-copyable-code-row">
                                                <code id="modal-barcode-table-code" class="slims-val-mono slims-val-highlight-amber">HL-000000-01</code>
                                                <button type="button" class="slims-copy-barcode-btn" onclick="copyBarcodeToClipboard()" title="Copy Barcode Value" aria-label="Copy Barcode Value">
                                                    <i class="fas fa-copy"></i> <span id="barcode-copy-text">Copy Code</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Inventory Call Number</th>
                                        <td id="modal-barcode-table-callno" class="slims-val-mono">--</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Symbology Standard</th>
                                        <td>Code-128 / GS1-128 High Density Barcode Standard (Hesten's Learning Library Standard)</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Repository Location</th>
                                        <td>Hesten's Learning Open Archive &bull; Digital Repository Unit 1</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Circulation Status</th>
                                        <td><span class="slims-holdings-avail-badge"><i class="fas fa-check-circle"></i> Available (Electronic Access)</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Revision Feature Readiness</th>
                                        <td>Automated Circulation Scanner, Batch Label Printing &amp; Shelf Audit</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Barcode Actions Row -->
                        <div class="slims-barcode-actions-row">
                            <button type="button" class="slims-barcode-btn-secondary" onclick="printBarcodeLabel()" title="Print single-page barcode and bibliographic record slip" aria-label="Print single-page barcode and bibliographic record slip">
                                <i class="fas fa-print" aria-hidden="true"></i> <span>Print Barcode &amp; Record Slip</span>
                            </button>
                            <button type="button" class="slims-barcode-btn-secondary" onclick="copyBarcodeToClipboard()" title="Copy item barcode identifier" aria-label="Copy item barcode identifier">
                                <i class="fas fa-clipboard-check" aria-hidden="true"></i> <span>Copy Item Identifier</span>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Collection List Container (for multi-book anthologies) -->
                <div id="modal-collection-actions" class="library-modal-collection-list hidden">
                    <!-- Dynamically populated in library.js -->
                </div>

            </main>
        </div>
    </div>
</div>

<!-- Sourcing & Disclaimer Modal -->
<div id="disclaimerModal" class="library-disclaimer-modal hidden" role="alertdialog" aria-modal="true"
    onclick="closeDisclaimerModal()">
    <div class="library-disclaimer-modal-backdrop"></div>
    <div class="library-disclaimer-content" onclick="event.stopPropagation()">
        <button type="button" onclick="closeDisclaimerModal()" id="disclaimer-modal-close"
            class="library-disclaimer-close-btn" aria-label="Close disclaimer">
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
            <button type="button" class="disclaimer-tab-btn active" id="tab-disc-license" role="tab"
                aria-selected="true" aria-controls="disclaimer-license-view" onclick="switchDisclaimerTab('license')">
                <i class="fas fa-book-open mr-1"></i> Book License &amp; Source
            </button>
            <button type="button" class="disclaimer-tab-btn" id="tab-disc-standard" role="tab" aria-selected="false"
                aria-controls="disclaimer-standard-view" onclick="switchDisclaimerTab('standard')">
                <i class="fas fa-balance-scale mr-1"></i> General Terms &amp; Full License
            </button>
        </div>

        <!-- Tab 1: Book Specific License & Sourcing View -->
        <div class="library-disclaimer-body-box" id="disclaimer-license-view" role="tabpanel"
            aria-labelledby="tab-disc-license">
            <!-- Book Context Summary -->
            <div id="modal-disc-book-context" class="disclaimer-book-card">
                <div class="disc-book-info">
                    <span class="disc-book-label">Resource</span>
                    <h4 id="modal-disc-book-title" class="disc-book-title">Selected Title</h4>
                    <p id="modal-disc-book-author" class="disc-book-author"></p>
                </div>
            </div>

            <!-- Sourcing Text Box (Dynamic Volume Attribution) -->
            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-info-circle"></i> License &amp; Attribution Statement
                </h5>
                <p class="library-disclaimer-license-text" id="modal-license-text">
                    <!-- Populated dynamically by library.js -->
                </p>
            </div>
        </div>

        <!-- Tab 2: General Terms & Full License View -->
        <div class="library-disclaimer-body-box" id="disclaimer-standard-view" role="tabpanel"
            aria-labelledby="tab-disc-standard" style="display: none;">
            <!-- Full Project Gutenberg License Pulled from assets/text/library-gutenburg.md -->
            <div class="disclaimer-text-card" id="modal-gutenberg-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-file-contract"></i> Project Gutenberg™ Full License
                    Agreement</h5>
                <div id="modal-gutenberg-content" class="gutenberg-rendered-text">
                    <?php echo renderGutenbergLicenseHtml($gutenbergMarkdown); ?>
                </div>
            </div>
            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-university"></i> 1. Educational Fair Use &amp; Open
                    Access Policy</h5>
                <p class="library-disclaimer-text">
                    The books, textbooks, primary source documents, historical treatises, and pedagogical materials in
                    this digital library are assembled exclusively for academic instruction, scholarly research,
                    non-commercial education, and personal historical study under Section 107 of the United States
                    Copyright Act (17 U.S.C. § 107) and international fair dealing doctrines.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-landmark"></i> 2. Public Domain Verification &amp;
                    Dedication</h5>
                <p class="library-disclaimer-text">
                    Literary and historical works published prior to January 1, 1928, or explicitly dedicated to the
                    worldwide public domain, are free of known copyright restrictions within the United States. Titles
                    originating from <strong>Project Gutenberg</strong>, the <strong>Internet Archive</strong>, and
                    <strong>Open Library</strong> are provided in compliance with their open-access distribution
                    mandates. Users residing outside the United States are solely responsible for verifying copyright
                    term lengths and local laws prior to downloading or distributing works.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-creative-commons"></i> 3. Open Educational Licensing
                    (Creative Commons)</h5>
                <p class="library-disclaimer-text">
                    Textbooks and reference curricula designated under Creative Commons frameworks—including
                    <strong>OpenStax (CC BY 4.0)</strong>, <strong>The American Yawp (CC BY-SA 4.0)</strong>, and
                    <strong>Public Domain Dedication (CC0 1.0)</strong>—remain protected by their respective licenses.
                    Users are entitled to share, adapt, and distribute these materials in accordance with the
                    attribution and share-alike conditions stipulated by each license deed.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-shield-alt"></i> 4. Intellectual Property &amp;
                    Trademarks</h5>
                <p class="library-disclaimer-text">
                    Hesten's Learning asserts no proprietary copyright or commercial ownership over third-party
                    materials, open-source repositories, historical manuscripts, or publisher-issued cover artwork. All
                    authorial rights, trademarks, and associated intellectual property remain the exclusive property of
                    their respective creators, estates, and original publishers.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-graduation-cap"></i> 5. Academic Integrity &amp;
                    Mandatory Citation</h5>
                <p class="library-disclaimer-text">
                    Users, educators, and scholars are expected to maintain the highest standards of academic integrity.
                    When utilizing materials from this repository in academic papers, coursework, or curriculum guides,
                    users must provide proper scholarly attribution. Built-in citation generators (MLA 9th, APA 7th, and
                    Chicago 17th) are provided in each volume's overview portal.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-exclamation-triangle"></i> 6. Disclaimer of
                    Warranties &amp; Limitation of Liability</h5>
                <p class="library-disclaimer-text">
                    All texts and digital assets are provided strictly on an <em>"AS IS"</em> and <em>"AS
                        AVAILABLE"</em> basis without warranties of any kind, whether express, statutory, or implied.
                    Hesten's Learning makes no warranty that digital transcriptions are error-free or that historical
                    content reflects contemporary scientific, medical, or legal consensus.
                </p>
            </div>

            <div class="disclaimer-text-card">
                <h5 class="disclaimer-card-title"><i class="fas fa-envelope-open-text"></i> 7. DMCA Compliance &amp;
                    Rights Inquiries</h5>
                <p class="library-disclaimer-text">
                    If you are a copyright holder or authorized representative who believes that any material hosted in
                    this digital library infringes your rights, please submit a formal takedown notice to our compliance
                    administration at <a href="mailto:admin@hestena62.com"
                        style="color: var(--lib-primary); font-weight: 700; text-decoration: underline;">admin@hestena62.com</a>
                    including the specific work, URL location, and verified proof of ownership for immediate
                    remediation.
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
        <button type="button" onclick="closeLexileInfoModal()" class="library-modal-close-btn"
            aria-label="Close Lexile Explainer">
            <i class="fas fa-times"></i>
        </button>
        <h3 class="explainer-modal-title emerald-title">
            <i class="fas fa-chart-line mr-2"></i> The Lexile® Framework for Reading
        </h3>

        <div class="explainer-modal-body">
            <p>
                <strong>What is a Lexile Measure?</strong><br>
                A Lexile reader measure represents a student's reading comprehension ability, while a Lexile text
                measure represents the complexity of a book or article. Both are calibrated on a unified scale developed
                by <em>MetaMetrics®</em>.
            </p>
            <p>
                <strong>How it Works:</strong><br>
                Measures range from <strong>200L</strong> for beginning readers to <strong>1600L+</strong> for advanced
                and collegiate literature. Matching a student's score with a book's measure places them in the optimal
                comprehension zone (75% comprehension range).
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
                    <tr>
                        <td>Kindergarten</td>
                        <td>BR (Beginning Reader) - 275L</td>
                    </tr>
                    <tr>
                        <td>Grade 1</td>
                        <td>190L to 530L</td>
                    </tr>
                    <tr>
                        <td>Grade 2</td>
                        <td>420L to 650L</td>
                    </tr>
                    <tr>
                        <td>Grade 3</td>
                        <td>520L to 820L</td>
                    </tr>
                    <tr>
                        <td>Grade 4</td>
                        <td>740L to 940L</td>
                    </tr>
                    <tr>
                        <td>Grade 5</td>
                        <td>830L to 1010L</td>
                    </tr>
                    <tr>
                        <td>Grades 6 - 8</td>
                        <td>925L to 1185L</td>
                    </tr>
                    <tr>
                        <td>Grades 9 - 10</td>
                        <td>1050L to 1335L</td>
                    </tr>
                    <tr>
                        <td>Grades 11 - 12</td>
                        <td>1185L to 1385L+</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- DDC Info Modal -->
<div id="ddcInfoModal" class="library-modal hidden" role="dialog" aria-modal="true" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeDdcInfoModal()"></div>
    <div class="library-modal-content info-explainer-content" onclick="event.stopPropagation()">
        <button type="button" onclick="closeDdcInfoModal()" class="library-modal-close-btn"
            aria-label="Close DDC Explainer">
            <i class="fas fa-times"></i>
        </button>
        <h3 class="explainer-modal-title purple-title">
            <i class="fas fa-sitemap mr-2"></i> The Dewey Decimal Classification
        </h3>

        <div class="explainer-modal-body">
            <p>
                <strong>What is the Dewey Decimal System?</strong><br>
                The Dewey Decimal Classification (DDC) is a library classification system first conceived by Melvil
                Dewey in 1876. It organizes human knowledge into a structured, numerical shelf order based on subject
                matter.
            </p>
        </div>

        <h4 class="explainer-table-heading">The 10 Core DDC Classes:</h4>
        <div class="explainer-classes-list">
            <div class="ddc-class-row"><strong>000 - 099</strong><span>Computer Science, Information & General
                    Works</span></div>
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
        <button type="button" onclick="closeBookCitationModal()" class="library-modal-close-btn"
            aria-label="Close Citation Modal">
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
<div id="libraryGuideModal" class="library-modal hidden" role="dialog" aria-modal="true"
    aria-labelledby="guide-modal-title" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeLibraryGuideModal()"></div>
    <div class="library-modal-content info-explainer-content library-guide-modal-content"
        onclick="event.stopPropagation()">
        <button type="button" onclick="closeLibraryGuideModal()" class="library-modal-close-btn"
            aria-label="Close Library Guide">
            <i class="fas fa-times"></i>
        </button>
        <h3 id="guide-modal-title" class="explainer-modal-title primary-title">
            <i class="fas fa-compass mr-2"></i> How Hesten's Digital Library Works
        </h3>
        <p class="explainer-subtitle">A comprehensive scholar's guide to navigating catalogs, research desks, and
            accessible study tools.</p>

        <div class="library-guide-grid">
            <div class="library-guide-card">
                <div class="guide-card-icon" style="color: #6366f1; background: rgba(99, 102, 241, 0.12);">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="guide-card-content">
                    <h4>1. Finding &amp; Reading Books</h4>
                    <p>Browse categorized shelves for classic literature, science fiction, and historical narratives.
                        Open any book card to read online immediately, download EPUB/PDF files, or view detailed
                        summaries, historical context, and curriculum alignment.</p>
                </div>
            </div>

            <div class="library-guide-card">
                <div class="guide-card-icon" style="color: #ec4899; background: rgba(236, 72, 153, 0.12);">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="guide-card-content">
                    <h4>2. Subject Research Desks</h4>
                    <p>Click the <strong>"More Resources"</strong> button on any shelf header to enter dedicated
                        Research Desks for US History, Math, ELA, Science, Civics, and World Wars. Explore primary
                        sources, open textbooks, and verified external academic archives.</p>
                </div>
            </div>

            <div class="library-guide-card">
                <div class="guide-card-icon" style="color: #10b981; background: rgba(16, 185, 129, 0.12);">
                    <i class="fas fa-filter"></i>
                </div>
                <div class="guide-card-content">
                    <h4>3. Smart Search &amp; View Modes</h4>
                    <p>Search in real-time by title, author, grade band, or topic. Filter by Lexile reading band
                        (Elementary, Middle, High School), and switch seamlessly between <strong>Carousel</strong>,
                        <strong>Grid</strong>, and <strong>Academic Table</strong> view modes.</p>
                </div>
            </div>

            <div class="library-guide-card">
                <div class="guide-card-icon" style="color: #f59e0b; background: rgba(245, 158, 11, 0.12);">
                    <i class="fas fa-star"></i>
                </div>
                <div class="guide-card-content">
                    <h4>4. Personal Reading List &amp; Sync</h4>
                    <p>Star any book to save it to your <strong>My Reading List</strong>. The <strong>Jump Back
                            In</strong> shelf tracks your latest reading progress automatically, syncing securely across
                        devices via Google Drive cloud auto-sync and offline storage.</p>
                </div>
            </div>

            <div class="library-guide-card">
                <div class="guide-card-icon" style="color: #06b6d4; background: rgba(6, 182, 212, 0.12);">
                    <i class="fas fa-universal-access"></i>
                </div>
                <div class="guide-card-content">
                    <h4>5. Accessibility &amp; Citations</h4>
                    <p>Built with full Universal Design for Learning (UDL) support: OpenDyslexic typography, Irlen color
                        overlays, screen reader optimization, MathJax formula rendering, and 1-click academic citation
                        generation (MLA, APA, Chicago, Harvard).</p>
                </div>
            </div>
        </div>

        <div class="library-guide-footer">
            <button type="button" onclick="closeLibraryGuideModal()" class="btn-primary-glow"
                style="width: 100%; justify-content: center; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-check-circle"></i> <span>Got It — Start Exploring!</span>
            </button>
        </div>
    </div>
</div>

<!-- Reading Goal Setting Modal -->
<div id="readingGoalModal" class="library-modal hidden" role="dialog" aria-modal="true"
    aria-labelledby="goal-modal-title" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeGoalModal()"></div>
    <div class="library-modal-content info-explainer-content goal-modal-content" onclick="event.stopPropagation()">
        <button type="button" onclick="closeGoalModal()" class="library-modal-close-btn" aria-label="Close Goal Modal">
            <i class="fas fa-times"></i>
        </button>
        <h3 id="goal-modal-title" class="explainer-modal-title primary-title">
            <i class="fas fa-bullseye mr-2"></i> Daily Reading Goal
        </h3>
        <p class="explainer-subtitle">Set your daily reading target to maintain your streak and earn scholar XP rewards.
        </p>

        <div class="goal-setting-body">
            <div class="goal-input-wrap">
                <label for="goal-minutes-input" class="goal-input-label">Target Minutes Per Day:</label>
                <div class="goal-input-row">
                    <input type="number" id="goal-minutes-input" min="5" max="180" step="5" value="15"
                        class="goal-number-input">
                    <span class="goal-input-unit">minutes</span>
                </div>
            </div>

            <div class="goal-preset-buttons">
                <button type="button" class="goal-preset-btn"
                    onclick="document.getElementById('goal-minutes-input').value = 10;">10 min</button>
                <button type="button" class="goal-preset-btn"
                    onclick="document.getElementById('goal-minutes-input').value = 20;">20 min</button>
                <button type="button" class="goal-preset-btn"
                    onclick="document.getElementById('goal-minutes-input').value = 30;">30 min</button>
                <button type="button" class="goal-preset-btn"
                    onclick="document.getElementById('goal-minutes-input').value = 45;">45 min</button>
                <button type="button" class="goal-preset-btn"
                    onclick="document.getElementById('goal-minutes-input').value = 60;">60 min</button>
            </div>

            <div class="goal-reward-banner">
                <i class="fas fa-bolt text-amber-400"></i>
                <span>Completing your daily goal awards <strong>+50 Scholar XP</strong> toward your profile
                    level!</span>
            </div>
        </div>

        <div class="goal-modal-footer">
            <button type="button" onclick="saveReadingGoal()" class="btn-primary-glow" style="width: 100%;">
                <i class="fas fa-check"></i> <span>Save Reading Goal</span>
            </button>
        </div>
    </div>
</div>

<!-- Centralized Study Notebook Modal -->
<div id="studyNotebookModal" class="library-modal hidden" role="dialog" aria-modal="true"
    aria-labelledby="notebook-modal-title" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeStudyNotebookModal()"></div>
    <div class="library-modal-content info-explainer-content notebook-modal-content" onclick="event.stopPropagation()">
        <button type="button" onclick="closeStudyNotebookModal()" class="library-modal-close-btn"
            aria-label="Close Study Notebook">
            <i class="fas fa-times"></i>
        </button>

        <div class="notebook-header-row">
            <div>
                <h3 id="notebook-modal-title" class="explainer-modal-title primary-title">
                    <i class="fas fa-book-reader mr-2"></i> Scholar Study Notebook
                </h3>
                <p class="explainer-subtitle">All your highlights, marginal notes, and citations in one central binder.
                </p>
            </div>
            <span id="notebook-total-count" class="notebook-badge">0 Entries</span>
        </div>

        <!-- Notebook Toolbar -->
        <div class="notebook-toolbar">
            <button type="button" class="notebook-tool-btn" onclick="exportNotebookMarkdown()"
                title="Export all notes to a Markdown file">
                <i class="fab fa-markdown"></i> <span>Export .MD</span>
            </button>
            <button type="button" class="notebook-tool-btn" onclick="exportNotebookFlashcards()"
                title="Export flashcards for Anki / Quizlet">
                <i class="fas fa-layer-group"></i> <span>Flashcards CSV</span>
            </button>
            <button type="button" class="notebook-tool-btn" onclick="printStudyNotebook()" title="Print study sheet">
                <i class="fas fa-print"></i> <span>Print Sheet</span>
            </button>
        </div>

        <!-- Notebook Entries List -->
        <div id="notebook-entries-list" class="notebook-entries-list">
            <!-- Dynamically populated by lib-study-notebook.js -->
        </div>
    </div>
</div>

<!-- Classroom & Assignment Share Modal -->
<div id="classroomShareModal" class="library-modal hidden" role="dialog" aria-modal="true"
    aria-labelledby="share-modal-title" style="z-index: 3000;">
    <div class="library-modal-backdrop" onclick="closeClassroomShareModal()"></div>
    <div class="library-modal-content info-explainer-content share-modal-content" onclick="event.stopPropagation()">
        <button type="button" onclick="closeClassroomShareModal()" class="library-modal-close-btn"
            aria-label="Close Share Modal">
            <i class="fas fa-times"></i>
        </button>

        <h3 id="share-modal-title" class="explainer-modal-title primary-title">
            <i class="fas fa-share-nodes mr-2"></i> Assign &amp; Share Resource
        </h3>
        <p class="explainer-subtitle">Generate a custom classroom link with pre-configured student accommodations:</p>

        <div class="share-options-grid">
            <label class="share-opt-toggle">
                <input type="checkbox" id="share-opt-dyslexic" onchange="updateShareLinkPreview()">
                <span><i class="fas fa-font"></i> OpenDyslexic Font</span>
            </label>
            <label class="share-opt-toggle">
                <input type="checkbox" id="share-opt-tint" onchange="updateShareLinkPreview()">
                <span><i class="fas fa-eye"></i> Irlen Reading Tint</span>
            </label>
            <label class="share-opt-toggle">
                <input type="checkbox" id="share-opt-untimed" onchange="updateShareLinkPreview()">
                <span><i class="fas fa-hourglass-start"></i> Untimed Practice</span>
            </label>
            <label class="share-opt-toggle">
                <input type="checkbox" id="share-opt-mathjax" checked onchange="updateShareLinkPreview()">
                <span><i class="fas fa-square-root-variable"></i> MathJax Math</span>
            </label>
        </div>

        <div class="share-link-box">
            <input type="text" id="share-link-input" readonly class="share-link-input">
            <button type="button" id="share-copy-btn" class="btn-primary-glow" onclick="copyClassroomLink()">
                <i class="fas fa-copy"></i> <span>Copy Link</span>
            </button>
        </div>

        <div class="share-qr-section">
            <p class="share-qr-caption">Or scan QR code to open directly on student tablets:</p>
            <div class="share-qr-wrapper">
                <img id="share-qr-preview-img" src="" alt="Classroom Assignment QR Code" class="share-qr-img">
            </div>
        </div>
    </div>
</div>