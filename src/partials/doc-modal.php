    <!-- Documentation Modal (Knowledge Portal) -->
    <div id="doc-modal" class="doc-modal-overlay hidden" aria-modal="true" role="dialog" aria-labelledby="modal-title">
        <!-- Backdrop -->
        <div class="doc-modal-backdrop" onclick="closeDocModal()"></div>

        <!-- Modal Content -->
        <div class="doc-modal-content" id="modal-container">
            <!-- Header -->
            <div class="doc-modal-header">
                <div class="doc-modal-title-group">
                    <div id="modal-icon-container" class="doc-modal-icon-box">
                        <i id="modal-icon" class="fas fa-info-circle"></i>
                    </div>
                    <div>
                        <h3 class="doc-modal-title" id="modal-title">Curriculum Details</h3>
                        <div class="doc-modal-subtitle-group">
                            <span class="doc-modal-subtitle-line"></span>
                            <span class="doc-modal-subtitle" id="modal-subtitle">Learning Path</span>
                        </div>
                    </div>
                </div>
                <button onclick="closeDocModal()" class="doc-modal-close" aria-label="Close Portal">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Body -->
            <div class="doc-modal-body custom-modal-scrollbar">
                <div class="doc-modal-desc-box" id="modal-desc-container">
                    <p id="modal-desc" class="doc-modal-desc"></p>
                </div>
                <div id="modal-docs" class="doc-modal-docs-container">
                    <!-- Redesigned Pills & Content injected here -->
                </div>
            </div>

            <!-- Footer -->
            <div class="doc-modal-footer">
                <p class="doc-modal-copyright">Hesten's Learning &copy; 2026</p>
                <div class="doc-modal-actions">
                    <button onclick="window.print()" class="doc-modal-print-btn">
                        <i class="fas fa-print"></i> 
                        <span class="print-text-full">Print Path</span>
                        <span class="print-text-short">Print</span>
                    </button>
                    <button onclick="closeDocModal()" class="doc-modal-close-btn">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
