<!-- src/partials/flashcard-studio.php -->
<div id="flashcard-studio-modal" class="flashcard-panel-overlay" aria-modal="true" role="dialog" aria-labelledby="flashcard-modal-title" style="display: none;">
    <!-- Backdrop -->
    <div class="flashcard-backdrop" id="flashcard-backdrop-close"></div>

    <!-- Modal Dialog -->
    <div class="flashcard-dialog-box" role="document">
        <!-- Header -->
        <div class="scratchpad-header">
            <div class="scratchpad-title-group">
                <div class="scratchpad-icon-box" style="background: rgba(99, 102, 241, 0.15); color: #6366f1;">
                    <i class="fas fa-layer-group" aria-hidden="true"></i>
                </div>
                <div>
                    <h3 class="scratchpad-title" id="flashcard-modal-title">Flashcard Studio &amp; Leitner SRS</h3>
                    <p class="scratchpad-subtitle">Spaced Repetition &bull; Multisensory Cognitive Mastery</p>
                </div>
            </div>
            <div style="display: flex; align-items: center; gap: 0.5rem;">
                <button type="button" class="a11y-action-chip" id="btn-flashcard-import-notes" title="Import highlighted reader vocabulary into a new deck">
                    <i class="fas fa-file-import" aria-hidden="true"></i> <span>Import Highlights</span>
                </button>
                <button id="flashcard-modal-close" class="scratchpad-close-btn" aria-label="Close Flashcard Studio">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="flashcard-body-content">
            <!-- Deck Selector & Leitner Stats Bar -->
            <div class="flashcard-control-row">
                <div style="display: flex; align-items: center; gap: 0.5rem; flex-wrap: wrap;">
                    <label for="flashcard-deck-select" style="font-size: 0.85rem; font-weight: 700;">Deck:</label>
                    <select id="flashcard-deck-select" class="benchmark-mode-select" aria-label="Select Flashcard Deck">
                        <option value="biology">Cellular Biology &amp; Photosynthesis</option>
                        <option value="algebra">Algebra &amp; Coordinate Geometry</option>
                        <option value="history">Civics &amp; Constitutional History</option>
                        <option value="custom">Custom Student Deck</option>
                    </select>
                </div>

                <!-- Study Mode Pills -->
                <div class="flashcard-mode-pills" role="tablist" aria-label="Study Mode Selection">
                    <button type="button" class="flashcard-mode-btn active" id="btn-mode-flip" role="tab" aria-selected="true">
                        <i class="fas fa-clone" aria-hidden="true"></i> <span>Classic Flip</span>
                    </button>
                    <button type="button" class="flashcard-mode-btn" id="btn-mode-cloze" role="tab" aria-selected="false">
                        <i class="fas fa-pencil-alt" aria-hidden="true"></i> <span>Cloze Recall</span>
                    </button>
                    <button type="button" class="flashcard-mode-btn" id="btn-mode-spelling" role="tab" aria-selected="false">
                        <i class="fas fa-volume-up" aria-hidden="true"></i> <span>Spelling Bee</span>
                    </button>
                </div>
            </div>

            <!-- Leitner Boxes Progress Bar -->
            <div class="leitner-boxes-bar" aria-label="Leitner Spaced Repetition Mastery Stages">
                <div class="leitner-box-item active" data-box="1" title="Daily Review">
                    <span class="leitner-box-label">Box 1 (Daily)</span>
                    <span class="leitner-box-count" id="leitner-count-1">0</span>
                </div>
                <div class="leitner-box-item" data-box="2" title="Every 3 Days">
                    <span class="leitner-box-label">Box 2 (3 Days)</span>
                    <span class="leitner-box-count" id="leitner-count-2">0</span>
                </div>
                <div class="leitner-box-item" data-box="3" title="Weekly Review">
                    <span class="leitner-box-label">Box 3 (Weekly)</span>
                    <span class="leitner-box-count" id="leitner-count-3">0</span>
                </div>
                <div class="leitner-box-item" data-box="4" title="Bi-weekly Review">
                    <span class="leitner-box-label">Box 4 (2 Weeks)</span>
                    <span class="leitner-box-count" id="leitner-count-4">0</span>
                </div>
                <div class="leitner-box-item" data-box="5" title="Mastered / Long-Term">
                    <span class="leitner-box-label">Box 5 (Mastered)</span>
                    <span class="leitner-box-count" id="leitner-count-5">0</span>
                </div>
            </div>

            <!-- Card Study Stage -->
            <div class="flashcard-stage-area">
                <!-- Mode 1: Classic 3D Flip Card -->
                <div id="pane-mode-flip" class="flashcard-interactive-pane active">
                    <div class="flashcard-3d-scene" id="flashcard-card-scene" tabindex="0" role="button" aria-label="Flashcard. Click or press Space to flip.">
                        <div class="flashcard-3d-card" id="flashcard-flipper">
                            <!-- Front -->
                            <div class="flashcard-face flashcard-front">
                                <span class="flashcard-cue-label"><i class="fas fa-question-circle" aria-hidden="true"></i> Question / Term</span>
                                <div class="flashcard-prompt-text" id="flashcard-front-text">Loading card...</div>
                                <span class="flashcard-tap-hint"><i class="fas fa-sync-alt" aria-hidden="true"></i> Click or press Space to flip</span>
                            </div>
                            <!-- Back -->
                            <div class="flashcard-face flashcard-back">
                                <span class="flashcard-cue-label" style="color: #10b981;"><i class="fas fa-lightbulb" aria-hidden="true"></i> Definition / Answer</span>
                                <div class="flashcard-prompt-text" id="flashcard-back-text">Answer text</div>
                                <div class="flashcard-example-text" id="flashcard-example-text"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Leitner Grading Buttons -->
                    <div class="leitner-rating-bar" id="leitner-rating-bar">
                        <button type="button" class="leitner-grade-btn grade-again" data-grade="again" title="Repeat today (Reset to Box 1)">
                            <i class="fas fa-undo" aria-hidden="true"></i> <span>Again (&lt;1d)</span>
                        </button>
                        <button type="button" class="leitner-grade-btn grade-hard" data-grade="hard" title="Difficult recall (+1 day)">
                            <i class="fas fa-brain" aria-hidden="true"></i> <span>Hard (1d)</span>
                        </button>
                        <button type="button" class="leitner-grade-btn grade-good" data-grade="good" title="Successful recall (Advance +1 Box)">
                            <i class="fas fa-check" aria-hidden="true"></i> <span>Good (3d)</span>
                        </button>
                        <button type="button" class="leitner-grade-btn grade-easy" data-grade="easy" title="Effortless recall (Advance +2 Boxes)">
                            <i class="fas fa-bolt" aria-hidden="true"></i> <span>Easy (7d)</span>
                        </button>
                    </div>
                </div>

                <!-- Mode 2: Cloze Deletion Fill-in-the-Blank -->
                <div id="pane-mode-cloze" class="flashcard-interactive-pane" style="display: none;">
                    <div class="cloze-study-card">
                        <span class="flashcard-cue-label"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Fill in the Missing Concept</span>
                        <p class="cloze-sentence-display" id="cloze-sentence-display">Loading cloze challenge...</p>
                        <div class="cloze-input-row">
                            <input type="text" id="cloze-user-input" class="cloze-input-field" placeholder="Type missing word here..." autocomplete="off">
                            <button type="button" id="btn-check-cloze" class="a11y-action-chip" style="background: var(--color-primary); color: #fff; font-weight: 700;">
                                <span>Check Answer</span>
                            </button>
                        </div>
                        <div id="cloze-feedback-msg" class="cloze-feedback" style="display: none;"></div>
                    </div>
                </div>

                <!-- Mode 3: Audio Spelling Bee -->
                <div id="pane-mode-spelling" class="flashcard-interactive-pane" style="display: none;">
                    <div class="spelling-study-card">
                        <span class="flashcard-cue-label"><i class="fas fa-headphones" aria-hidden="true"></i> Listen &amp; Spell</span>
                        <div style="margin: 1.5rem 0;">
                            <button type="button" id="btn-spelling-listen" class="a11y-action-chip" style="background: #6366f1; color: #fff; font-size: 1.1rem; padding: 0.75rem 1.5rem; font-weight: 700;">
                                <i class="fas fa-volume-up" aria-hidden="true"></i> <span>Pronounce Word</span>
                            </button>
                            <button type="button" id="btn-spelling-slow" class="a11y-action-chip" style="margin-left: 0.5rem;">
                                <i class="fas fa-tachometer-alt" aria-hidden="true"></i> <span>Slow (0.6x)</span>
                            </button>
                        </div>
                        <div class="cloze-input-row">
                            <input type="text" id="spelling-user-input" class="cloze-input-field" placeholder="Spell the word you heard..." autocomplete="off">
                            <button type="button" id="btn-check-spelling" class="a11y-action-chip" style="background: var(--color-success, #10b981); color: #fff; font-weight: 700;">
                                <span>Verify Spelling</span>
                            </button>
                        </div>
                        <p id="spelling-hint-text" style="font-size: 0.85rem; color: var(--color-text-muted); margin-top: 0.75rem;"></p>
                        <div id="spelling-feedback-msg" class="cloze-feedback" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="scratchpad-footer">
            <div style="display: flex; align-items: center; gap: 1rem; font-size: 0.85rem; color: var(--color-text-muted);">
                <span>Card <strong id="flashcard-card-index">1</strong> of <strong id="flashcard-card-total">1</strong></span>
                <span>&bull;</span>
                <span>Retention: <strong id="flashcard-retention-rate" style="color: var(--color-success, #10b981);">100%</strong></span>
            </div>
            <div class="scratchpad-actions">
                <button type="button" id="btn-flashcard-prev" class="scratchpad-clear-btn" title="Previous card">
                    <i class="fas fa-chevron-left" aria-hidden="true"></i> Prev
                </button>
                <button type="button" id="btn-flashcard-next" class="scratchpad-clear-btn" title="Next card">
                    Next <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </button>
                <button type="button" id="btn-flashcard-export" class="scratchpad-download-btn" title="Export this deck to JSON">
                    <i class="fas fa-file-export" aria-hidden="true"></i> Export Deck
                </button>
            </div>
        </div>
    </div>
</div>
