<!-- src/partials/citation.php -->
<div id="citation-panel" class="citation-panel-overlay" aria-modal="true" role="dialog" aria-labelledby="citation-modal-title">
    <!-- Backdrop -->
    <div class="citation-backdrop" id="citation-backdrop-close"></div>

    <!-- Modal Content -->
    <div class="citation-content">
        <!-- Header -->
        <div class="scratchpad-header">
            <div class="scratchpad-title-group">
                <div class="scratchpad-icon-box" style="background-color: color-mix(in srgb, var(--color-secondary) 10%, transparent); color: var(--color-secondary);">
                    <i class="fas fa-quote-right"></i>
                </div>
                <div>
                    <h3 class="scratchpad-title" id="citation-modal-title">Academic Citation Generator</h3>
                    <p class="scratchpad-subtitle">Generate formatted citations instantly</p>
                </div>
            </div>
            <button id="citation-close" class="scratchpad-close-btn" aria-label="Close Citation Generator">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="scratchpad-body" style="padding: 1.5rem; overflow-y: auto; display: flex; flex-direction: column; gap: 1.5rem;">
            <!-- Inputs Grid -->
            <div class="citation-inputs-grid">
                <div class="citation-field">
                    <label class="citation-label" for="cite-title">Page / Article Title</label>
                    <input type="text" id="cite-title" placeholder="e.g. Fractions Mastery Guide" class="citation-page-input" style="border-radius: var(--radius-md); padding: 0.75rem 1rem;">
                </div>
                <div class="citation-field">
                    <label class="citation-label" for="cite-author">Author / Organization</label>
                    <input type="text" id="cite-author" value="Hesten's Learning" placeholder="e.g. Hesten's Learning" class="citation-page-input" style="border-radius: var(--radius-md); padding: 0.75rem 1rem;">
                </div>
                <div class="citation-field">
                    <label class="citation-label" for="cite-publisher">Website Name</label>
                    <input type="text" id="cite-publisher" value="Hesten's Learning" placeholder="e.g. Hesten's Learning" class="citation-page-input" style="border-radius: var(--radius-md); padding: 0.75rem 1rem;">
                </div>
                <div class="citation-field">
                    <label class="citation-label" for="cite-year">Year Published</label>
                    <input type="text" id="cite-year" value="2026" placeholder="e.g. 2026" class="citation-page-input" style="border-radius: var(--radius-md); padding: 0.75rem 1rem;">
                </div>
            </div>

            <!-- Action Button -->
            <button id="cite-gen" class="scratchpad-download-btn" style="background-color: var(--color-secondary); color: white; border-radius: var(--radius-md); padding: 0.875rem; font-weight: 700; width: 100%; justify-content: center; box-shadow: var(--shadow-md); text-decoration: none;">
                <i class="fas fa-magic"></i> Generate Citations
            </button>

            <!-- Results Section -->
            <div class="citation-results-container">
                <h4 class="sidebar-section-title" style="margin-bottom: 1rem;">Formatted Citations</h4>
                <div class="citation-results-list">
                    <!-- APA -->
                    <div class="citation-result-item">
                        <div class="citation-result-header">
                            <span class="citation-format-tag">APA Style</span>
                            <button class="copy-cite-btn" data-target="cite-apa-text">
                                <i class="fas fa-copy"></i> Copy
                            </button>
                        </div>
                        <div class="citation-text-box" id="cite-apa-text">Click generate above...</div>
                    </div>
                    <!-- MLA -->
                    <div class="citation-result-item">
                        <div class="citation-result-header">
                            <span class="citation-format-tag">MLA Style</span>
                            <button class="copy-cite-btn" data-target="cite-mla-text">
                                <i class="fas fa-copy"></i> Copy
                            </button>
                        </div>
                        <div class="citation-text-box" id="cite-mla-text">Click generate above...</div>
                    </div>
                    <!-- Chicago -->
                    <div class="citation-result-item">
                        <div class="citation-result-header">
                            <span class="citation-format-tag">Chicago Style</span>
                            <button class="copy-cite-btn" data-target="cite-chicago-text">
                                <i class="fas fa-copy"></i> Copy
                            </button>
                        </div>
                        <div class="citation-text-box" id="cite-chicago-text">Click generate above...</div>
                    </div>
                    <!-- Harvard -->
                    <div class="citation-result-item">
                        <div class="citation-result-header">
                            <span class="citation-format-tag">Harvard Style</span>
                            <button class="copy-cite-btn" data-target="cite-harvard-text">
                                <i class="fas fa-copy"></i> Copy
                            </button>
                        </div>
                        <div class="citation-text-box" id="cite-harvard-text">Click generate above...</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="scratchpad-footer" style="justify-content: flex-end;">
            <button id="citation-close-footer" class="scratchpad-close-btn" style="background-color: var(--color-text-main); color: var(--color-bg-base); font-size: 0.875rem; padding: 0.75rem 2rem; width: auto; height: auto;">
                Close
            </button>
        </div>
    </div>
</div>
