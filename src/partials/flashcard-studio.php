<!-- src/partials/flashcard-studio.php -->
<div id="flashcard-studio-modal" class="flashcard-panel-overlay" aria-modal="true" role="dialog" aria-labelledby="flashcard-modal-title" style="display: none;">
    <!-- Backdrop -->
    <div class="flashcard-backdrop" id="flashcard-backdrop-close" tabindex="-1" aria-hidden="true"></div>

    <!-- Modal Dialog -->
    <div class="flashcard-dialog-box" role="document">
        <!-- Header -->
        <div class="flashcard-header">
            <div class="flashcard-title-group">
                <div class="flashcard-icon-box">
                    <i class="fas fa-layer-group" aria-hidden="true"></i>
                </div>
                <div>
                    <h3 class="flashcard-title" id="flashcard-modal-title">Flashcard Studio &amp; Leitner SRS</h3>
                    <p class="flashcard-subtitle">Spaced Repetition &bull; Multisensory Cognitive Mastery</p>
                </div>
            </div>
            <div class="flashcard-header-actions">
                <button type="button" class="flashcard-chip-btn" id="btn-flashcard-import-notes" title="Import highlighted reader vocabulary into a new deck">
                    <i class="fas fa-file-import" aria-hidden="true"></i> <span>Import Highlights</span>
                </button>
                <button id="flashcard-modal-close" class="flashcard-close-btn" aria-label="Close Flashcard Studio (Esc)">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </div>

        <!-- Body -->
        <div class="flashcard-body-content">
            <!-- Deck Selector & Leitner Stats Bar -->
            <div class="flashcard-control-row">
                <div class="flashcard-deck-picker">
                    <label for="flashcard-deck-select" class="flashcard-deck-label"><i class="fas fa-folder-open"></i> Deck:</label>
                    <select id="flashcard-deck-select" class="flashcard-select" aria-label="Select Flashcard Deck">
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
                <div class="leitner-box-item active" data-box="1" title="Box 1: Daily Review">
                    <span class="leitner-box-label">Box 1 &bull; Daily</span>
                    <span class="leitner-box-count" id="leitner-count-1">0</span>
                </div>
                <div class="leitner-box-item" data-box="2" title="Box 2: Every 3 Days">
                    <span class="leitner-box-label">Box 2 &bull; 3 Days</span>
                    <span class="leitner-box-count" id="leitner-count-2">0</span>
                </div>
                <div class="leitner-box-item" data-box="3" title="Box 3: Weekly Review">
                    <span class="leitner-box-label">Box 3 &bull; Weekly</span>
                    <span class="leitner-box-count" id="leitner-count-3">0</span>
                </div>
                <div class="leitner-box-item" data-box="4" title="Box 4: Bi-weekly Review">
                    <span class="leitner-box-label">Box 4 &bull; 2 Weeks</span>
                    <span class="leitner-box-count" id="leitner-count-4">0</span>
                </div>
                <div class="leitner-box-item" data-box="5" title="Box 5: Mastered / Long-Term">
                    <span class="leitner-box-label">Box 5 &bull; Mastered</span>
                    <span class="leitner-box-count" id="leitner-count-5">0</span>
                </div>
            </div>

            <!-- Card Study Stage -->
            <div class="flashcard-stage-area">
                <!-- Mode 1: Classic 3D Flip Card -->
                <div id="pane-mode-flip" class="flashcard-interactive-pane active">
                    <div class="flashcard-3d-scene" id="flashcard-card-scene" tabindex="0" role="button" aria-label="Flashcard. Click or press Space to flip front and back.">
                        <div class="flashcard-3d-card" id="flashcard-flipper">
                            <!-- Front -->
                            <div class="flashcard-face flashcard-front">
                                <div class="flashcard-face-header">
                                    <span class="flashcard-cue-label"><i class="fas fa-question-circle" aria-hidden="true"></i> Term / Question</span>
                                    <button type="button" class="flashcard-audio-icon-btn" id="btn-front-audio" title="Pronounce word" aria-label="Pronounce word">
                                        <i class="fas fa-volume-up"></i>
                                    </button>
                                </div>
                                <div class="flashcard-prompt-text" id="flashcard-front-text">Loading card...</div>
                                <div class="flashcard-face-footer">
                                    <span class="flashcard-tap-hint"><i class="fas fa-sync-alt" aria-hidden="true"></i> Click or press <kbd>Space</kbd> to flip</span>
                                </div>
                            </div>
                            <!-- Back -->
                            <div class="flashcard-face flashcard-back">
                                <div class="flashcard-face-header">
                                    <span class="flashcard-cue-label flashcard-cue-back"><i class="fas fa-lightbulb" aria-hidden="true"></i> Definition / Answer</span>
                                    <button type="button" class="flashcard-audio-icon-btn" id="btn-back-audio" title="Pronounce word" aria-label="Pronounce word">
                                        <i class="fas fa-volume-up"></i>
                                    </button>
                                </div>
                                <div class="flashcard-prompt-text flashcard-back-text" id="flashcard-back-text">Answer text</div>
                                <div class="flashcard-example-text" id="flashcard-example-text"></div>
                                <div class="flashcard-face-footer">
                                    <span class="flashcard-tap-hint"><i class="fas fa-undo" aria-hidden="true"></i> Click or press <kbd>Space</kbd> to flip back</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Leitner Grading Buttons -->
                    <div class="leitner-rating-bar" id="leitner-rating-bar">
                        <button type="button" class="leitner-grade-btn grade-again" data-grade="again" title="Repeat today (Reset to Box 1) [Key 1]">
                            <i class="fas fa-undo" aria-hidden="true"></i> <span>Again</span> <kbd class="grade-key">1</kbd>
                        </button>
                        <button type="button" class="leitner-grade-btn grade-hard" data-grade="hard" title="Difficult recall (+1 day) [Key 2]">
                            <i class="fas fa-brain" aria-hidden="true"></i> <span>Hard</span> <kbd class="grade-key">2</kbd>
                        </button>
                        <button type="button" class="leitner-grade-btn grade-good" data-grade="good" title="Successful recall (Advance +1 Box) [Key 3]">
                            <i class="fas fa-check" aria-hidden="true"></i> <span>Good</span> <kbd class="grade-key">3</kbd>
                        </button>
                        <button type="button" class="leitner-grade-btn grade-easy" data-grade="easy" title="Effortless recall (Advance +2 Boxes) [Key 4]">
                            <i class="fas fa-bolt" aria-hidden="true"></i> <span>Easy</span> <kbd class="grade-key">4</kbd>
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
                            <button type="button" id="btn-check-cloze" class="flashcard-action-btn primary">
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
                        <div class="spelling-audio-row">
                            <button type="button" id="btn-spelling-listen" class="flashcard-action-btn primary large">
                                <i class="fas fa-volume-up" aria-hidden="true"></i> <span>Pronounce Word</span>
                            </button>
                            <button type="button" id="btn-spelling-slow" class="flashcard-action-btn secondary">
                                <i class="fas fa-tachometer-alt" aria-hidden="true"></i> <span>Phonics Slow (0.6x)</span>
                            </button>
                        </div>
                        <div class="cloze-input-row">
                            <input type="text" id="spelling-user-input" class="cloze-input-field" placeholder="Spell the word you heard..." autocomplete="off">
                            <button type="button" id="btn-check-spelling" class="flashcard-action-btn success">
                                <span>Verify Spelling</span>
                            </button>
                        </div>
                        <p id="spelling-hint-text" class="spelling-hint-text"></p>
                        <div id="spelling-feedback-msg" class="cloze-feedback" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="flashcard-footer">
            <div class="flashcard-meta-stat">
                <span>Card <strong id="flashcard-card-index">1</strong> of <strong id="flashcard-card-total">1</strong></span>
                <span class="flashcard-meta-dot">&bull;</span>
                <span>Retention: <strong id="flashcard-retention-rate" class="flashcard-retention-val">100%</strong></span>
            </div>
            <div class="flashcard-nav-actions">
                <button type="button" id="btn-flashcard-prev" class="flashcard-btn-outline" title="Previous card (Left Arrow)">
                    <i class="fas fa-chevron-left" aria-hidden="true"></i> <span>Prev</span>
                </button>
                <button type="button" id="btn-flashcard-flip-action" class="flashcard-btn-outline" title="Flip card (Space)">
                    <i class="fas fa-sync-alt" aria-hidden="true"></i> <span>Flip</span>
                </button>
                <button type="button" id="btn-flashcard-next" class="flashcard-btn-outline" title="Next card (Right Arrow)">
                    <span>Next</span> <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </button>
                <button type="button" id="btn-flashcard-export" class="flashcard-btn-outline" title="Export this deck to JSON">
                    <i class="fas fa-file-export" aria-hidden="true"></i> <span>Export</span>
                </button>
            </div>
        </div>
    </div>
</div>
