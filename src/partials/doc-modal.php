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
                    <button type="button" onclick="printActiveCurriculumSubject()" class="doc-modal-print-btn doc-modal-print-subject-btn" id="modal-print-subject-btn" title="Print the current subject syllabus">
                        <i class="fas fa-print"></i> 
                        <span id="modal-print-subject-label">Print Subject</span>
                    </button>
                    <button type="button" onclick="printCurriculum()" class="doc-modal-print-btn doc-modal-print-all-btn" title="Print all subjects in this grade">
                        <i class="fas fa-file-invoice"></i> 
                        <span class="print-text-full">Print All</span>
                        <span class="print-text-short">All</span>
                    </button>
                    <button type="button" onclick="closeDocModal()" class="doc-modal-close-btn">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
