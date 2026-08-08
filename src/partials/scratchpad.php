<!-- src/partials/scratchpad.php -->
<div id="scratchpad-panel" class="scratchpad-panel-overlay" aria-modal="true" role="dialog" aria-labelledby="scratchpad-modal-title">
    <!-- Backdrop -->
    <div class="scratchpad-backdrop" id="scratchpad-backdrop-close"></div>

    <!-- Modal Content -->
    <div class="scratchpad-content">
        <!-- Header -->
        <div class="scratchpad-header">
            <div class="scratchpad-title-group">
                <div class="scratchpad-icon-box">
                    <i class="fas fa-edit"></i>
                </div>
                <div>
                    <h3 class="scratchpad-title" id="scratchpad-modal-title">Interactive Study Notes</h3>
                    <p class="scratchpad-subtitle">Personalized Scratchpad & Study Templates</p>
                </div>
            </div>
            <button id="scratchpad-close" class="scratchpad-close-btn" aria-label="Close Notes">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="scratchpad-body">
            <!-- Sidebar / Template Selector -->
            <div class="scratchpad-sidebar">
                <h4 class="sidebar-section-title">Study Templates</h4>
                <div class="scratchpad-templates-list">
                    <button class="template-btn active" data-template="blank">
                        <i class="fas fa-file"></i>
                        <span>Blank Page</span>
                    </button>
                    <button class="template-btn" data-template="cornell">
                        <i class="fas fa-columns"></i>
                        <span>Cornell Notes</span>
                    </button>
                    <button class="template-btn" data-template="kwl">
                        <i class="fas fa-question-circle"></i>
                        <span>K-W-L Chart</span>
                    </button>
                    <button class="template-btn" data-template="study-guide">
                        <i class="fas fa-graduation-cap"></i>
                        <span>Study Guide</span>
                    </button>
                    <button class="template-btn" data-template="lecture">
                        <i class="fas fa-sticky-note"></i>
                        <span>Lecture Notes</span>
                    </button>
                </div>

                <h4 class="sidebar-section-title" style="margin-top: 1rem;">Essay Formats</h4>
                <div class="scratchpad-templates-list">
                    <button class="template-btn" data-template="mla">
                        <i class="fas fa-file-alt"></i>
                        <span>MLA Format</span>
                    </button>
                    <button class="template-btn" data-template="apa">
                        <i class="fas fa-file-signature"></i>
                        <span>APA Format</span>
                    </button>
                    <button class="template-btn" data-template="chicago">
                        <i class="fas fa-book-open"></i>
                        <span>Chicago Style</span>
                    </button>
                    <button class="template-btn" data-template="harvard">
                        <i class="fas fa-university"></i>
                        <span>Harvard Style</span>
                    </button>
                </div>
            </div>

            <!-- Textarea Editor -->
            <div class="scratchpad-editor">
                <textarea id="quick-notes-area" class="scratchpad-textarea" placeholder="Start typing your notes here..."></textarea>
            </div>
        </div>

        <!-- Footer -->
        <div class="scratchpad-footer">
            <span id="scratchpad-status" class="scratchpad-status">
                <i class="fas fa-check-circle"></i> Saved locally
            </span>
            <div class="scratchpad-actions">
                <button id="clear-notes-btn" class="scratchpad-clear-btn" aria-label="Clear Notes">
                    <i class="fas fa-trash-alt"></i> Clear All
                </button>
                <button id="download-notes" class="scratchpad-download-btn">
                    <i class="fas fa-download"></i> Download Notes (.txt)
                </button>
            </div>
        </div>
    </div>
</div>
