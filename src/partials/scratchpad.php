<!-- src/partials/scratchpad.php -->
<div id="scratchpad-panel" class="scratchpad-panel-overlay" aria-modal="true" role="dialog" aria-labelledby="scratchpad-modal-title">
    <!-- Backdrop (clickable to close in modal mode, disabled in docked split mode) -->
    <div class="scratchpad-backdrop" id="scratchpad-backdrop-close" aria-label="Close Scratchpad"></div>

    <!-- Modal / Docked Content Window -->
    <div class="scratchpad-content" role="document">
        <!-- Header -->
        <header class="scratchpad-header">
            <div class="scratchpad-title-group">
                <div class="scratchpad-icon-box" aria-hidden="true">
                    <i class="fas fa-pencil-ruler"></i>
                </div>
                <div>
                    <h3 class="scratchpad-title" id="scratchpad-modal-title">Interactive Study & Math Scratchpad</h3>
                    <p class="scratchpad-subtitle" id="scratchpad-active-note-title">Unified Multi-Page Notes & Digital Whiteboard Studio</p>
                </div>
            </div>

            <!-- Notebook Manager Bar -->
            <div class="scratchpad-notebook-bar" role="group" aria-label="Notebook Controls">
                <label for="scratchpad-note-select" class="sr-only">Select Note</label>
                <select id="scratchpad-note-select" class="scratchpad-note-select" title="Switch active note page" aria-label="Active Note Page">
                    <!-- Populated dynamically via JS -->
                </select>
                <button type="button" id="scratchpad-new-note-btn" class="scratchpad-btn-sm" title="Create New Note (Alt+N)" aria-label="Create New Note">
                    <i class="fas fa-plus" aria-hidden="true"></i> <span>New</span>
                </button>
                <button type="button" id="scratchpad-rename-note-btn" class="scratchpad-btn-sm" title="Rename Current Note" aria-label="Rename Current Note">
                    <i class="fas fa-edit" aria-hidden="true"></i> <span class="hide-mobile">Rename</span>
                </button>
                <button type="button" id="scratchpad-delete-note-btn" class="scratchpad-btn-sm scratchpad-btn-danger" title="Delete Current Note" aria-label="Delete Current Note">
                    <i class="fas fa-trash-alt" aria-hidden="true"></i>
                </button>
            </div>

            <!-- Window State Controls -->
            <div class="scratchpad-window-controls">
                <button type="button" id="scratchpad-dock-btn" class="scratchpad-header-btn" title="Toggle Docked Sidebar Split-View (study while reading)" aria-label="Toggle Docked Split View">
                    <i class="fas fa-columns" aria-hidden="true"></i>
                </button>
                <button type="button" id="scratchpad-expand-btn" class="scratchpad-header-btn" title="Toggle Fullscreen Canvas" aria-label="Toggle Fullscreen">
                    <i class="fas fa-expand" aria-hidden="true"></i>
                </button>
                <button type="button" id="scratchpad-close" class="scratchpad-close-btn" title="Close Notes (Esc)" aria-label="Close Notes">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
            </div>
        </header>

        <!-- Mode Navigation Tabs -->
        <nav class="scratchpad-nav-tabs" role="tablist" aria-label="Scratchpad Modes">
            <button type="button" role="tab" id="scratchpad-tab-notes" class="scratchpad-tab active" aria-selected="true" aria-controls="scratchpad-pane-notes" tabindex="0">
                <i class="fas fa-file-alt" aria-hidden="true"></i> <span>Notes & Drafting</span>
            </button>
            <button type="button" role="tab" id="scratchpad-tab-whiteboard" class="scratchpad-tab" aria-selected="false" aria-controls="scratchpad-pane-whiteboard" tabindex="-1">
                <i class="fas fa-paint-brush" aria-hidden="true"></i> <span>Whiteboard & Math Canvas</span>
            </button>
            <button type="button" role="tab" id="scratchpad-tab-math" class="scratchpad-tab" aria-selected="false" aria-controls="scratchpad-pane-math" tabindex="-1">
                <i class="fas fa-square-root-alt" aria-hidden="true"></i> <span>Formulas & Live MathJax</span>
            </button>
        </nav>

        <!-- Workspace Panes -->
        <div class="scratchpad-body">
            <!-- PANE 1: Text Notes & Templates -->
            <section id="scratchpad-pane-notes" class="scratchpad-pane active" role="tabpanel" aria-labelledby="scratchpad-tab-notes">
                <!-- Sidebar / Study Templates & Typography -->
                <aside class="scratchpad-sidebar" aria-label="Study Templates and Formatting">
                    <div class="sidebar-block">
                        <h4 class="sidebar-section-title">Study Templates</h4>
                        <div class="scratchpad-templates-list">
                            <button type="button" class="template-btn active" data-template="blank">
                                <i class="fas fa-file" aria-hidden="true"></i> <span>Blank Page</span>
                            </button>
                            <button type="button" class="template-btn" data-template="cornell">
                                <i class="fas fa-columns" aria-hidden="true"></i> <span>Cornell Notes</span>
                            </button>
                            <button type="button" class="template-btn" data-template="kwl">
                                <i class="fas fa-question-circle" aria-hidden="true"></i> <span>K-W-L Chart</span>
                            </button>
                            <button type="button" class="template-btn" data-template="study-guide">
                                <i class="fas fa-graduation-cap" aria-hidden="true"></i> <span>Study Guide</span>
                            </button>
                            <button type="button" class="template-btn" data-template="lecture">
                                <i class="fas fa-sticky-note" aria-hidden="true"></i> <span>Lecture Notes</span>
                            </button>
                        </div>
                    </div>

                    <div class="sidebar-block">
                        <h4 class="sidebar-section-title">Essay Formats</h4>
                        <div class="scratchpad-templates-list">
                            <button type="button" class="template-btn" data-template="mla">
                                <i class="fas fa-file-alt" aria-hidden="true"></i> <span>MLA Format</span>
                            </button>
                            <button type="button" class="template-btn" data-template="apa">
                                <i class="fas fa-file-signature" aria-hidden="true"></i> <span>APA Format</span>
                            </button>
                            <button type="button" class="template-btn" data-template="chicago">
                                <i class="fas fa-book-open" aria-hidden="true"></i> <span>Chicago Style</span>
                            </button>
                            <button type="button" class="template-btn" data-template="harvard">
                                <i class="fas fa-university" aria-hidden="true"></i> <span>Harvard Style</span>
                            </button>
                        </div>
                    </div>

                    <!-- Accessibility & Typography Presets -->
                    <div class="sidebar-block">
                        <h4 class="sidebar-section-title">Typography & A11y</h4>
                        <div class="scratchpad-a11y-tools">
                            <div class="scratchpad-font-select-group">
                                <button type="button" class="font-pref-btn active" data-font="default" title="Standard Clean Font">Default</button>
                                <button type="button" class="font-pref-btn" data-font="dyslexic" title="OpenDyslexic / Lexend Font">Dyslexic</button>
                                <button type="button" class="font-pref-btn" data-font="mono" title="Monospaced Code / Math Font">Mono</button>
                            </div>
                            <div class="scratchpad-fontsize-group">
                                <button type="button" id="scratchpad-font-decrease" class="scratchpad-icon-btn" title="Decrease Font Size" aria-label="Decrease Font Size">
                                    <i class="fas fa-font" style="font-size: 0.75rem;" aria-hidden="true"></i>-
                                </button>
                                <span id="scratchpad-font-size-display" class="font-size-indicator" aria-live="polite">100%</span>
                                <button type="button" id="scratchpad-font-increase" class="scratchpad-icon-btn" title="Increase Font Size" aria-label="Increase Font Size">
                                    <i class="fas fa-font" style="font-size: 0.95rem;" aria-hidden="true"></i>+
                                </button>
                            </div>
                        </div>
                    </div>
                </aside>

                <!-- Textarea Editor & Formatting Bar -->
                <div class="scratchpad-editor-column">
                    <!-- Quick Markdown / Text Helper Bar -->
                    <div class="scratchpad-format-bar" role="toolbar" aria-label="Text Formatting Tools">
                        <div class="format-btn-group">
                            <button type="button" class="format-btn" data-format="bold" title="Bold Text (**text**)" aria-label="Bold"><i class="fas fa-bold" aria-hidden="true"></i></button>
                            <button type="button" class="format-btn" data-format="italic" title="Italic Text (*text*)" aria-label="Italic"><i class="fas fa-italic" aria-hidden="true"></i></button>
                            <button type="button" class="format-btn" data-format="h2" title="Heading 2 (## Title)" aria-label="Heading 2"><i class="fas fa-heading" aria-hidden="true"></i><sub>2</sub></button>
                            <button type="button" class="format-btn" data-format="bullet" title="Bullet List (- Item)" aria-label="Bullet List"><i class="fas fa-list-ul" aria-hidden="true"></i></button>
                            <button type="button" class="format-btn" data-format="numlist" title="Numbered List (1. Item)" aria-label="Numbered List"><i class="fas fa-list-ol" aria-hidden="true"></i></button>
                            <button type="button" class="format-btn" data-format="quote" title="Blockquote (> Quote)" aria-label="Blockquote"><i class="fas fa-quote-left" aria-hidden="true"></i></button>
                            <button type="button" class="format-btn" data-format="code" title="Code / Formula Block" aria-label="Code Block"><i class="fas fa-code" aria-hidden="true"></i></button>
                            <button type="button" class="format-btn" data-format="math" title="Math LaTeX ($x$)" aria-label="Inline Math"><i class="fas fa-square-root-alt" aria-hidden="true"></i></button>
                        </div>
                        <div class="scratchpad-search-wrap">
                            <i class="fas fa-search" aria-hidden="true"></i>
                            <label for="scratchpad-search-input" class="sr-only">Search notes</label>
                            <input type="text" id="scratchpad-search-input" class="scratchpad-search-input" placeholder="Search in note..." aria-label="Search within active note">
                            <span id="scratchpad-search-count" class="search-match-badge" aria-live="polite"></span>
                        </div>
                    </div>

                    <!-- Textarea Editor (Retaining #quick-notes-area for backward compatibility) -->
                    <div class="scratchpad-textarea-wrap">
                        <label for="quick-notes-area" class="sr-only">Scratchpad text notes</label>
                        <textarea id="quick-notes-area" class="scratchpad-textarea" placeholder="Start typing notes, essays, or math formulas here (supports LaTeX e.g. $E=mc^2$)..." spellcheck="true"></textarea>
                    </div>
                </div>
            </section>

            <!-- PANE 2: Whiteboard & Math Drawing Canvas -->
            <section id="scratchpad-pane-whiteboard" class="scratchpad-pane" role="tabpanel" aria-labelledby="scratchpad-tab-whiteboard" hidden>
                <!-- Whiteboard Tools Ribbon -->
                <div class="scratchpad-canvas-toolbar" role="toolbar" aria-label="Whiteboard and Drawing Tools">
                    <!-- Tool Selectors -->
                    <div class="canvas-tool-group" role="group" aria-label="Drawing Tools">
                        <button type="button" class="canvas-tool-btn active" data-tool="pen" title="Drawing Pen" aria-label="Pen tool"><i class="fas fa-pen" aria-hidden="true"></i> <span>Pen</span></button>
                        <button type="button" class="canvas-tool-btn" data-tool="highlighter" title="Highlighter" aria-label="Highlighter tool"><i class="fas fa-highlighter" aria-hidden="true"></i> <span>Highlight</span></button>
                        <button type="button" class="canvas-tool-btn" data-tool="eraser" title="Eraser" aria-label="Eraser tool"><i class="fas fa-eraser" aria-hidden="true"></i> <span>Eraser</span></button>
                        <button type="button" class="canvas-tool-btn" data-tool="line" title="Straight Line" aria-label="Line tool"><i class="fas fa-slash" aria-hidden="true"></i></button>
                        <button type="button" class="canvas-tool-btn" data-tool="arrow" title="Arrow" aria-label="Arrow tool"><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></button>
                        <button type="button" class="canvas-tool-btn" data-tool="rect" title="Rectangle" aria-label="Rectangle tool"><i class="far fa-square" aria-hidden="true"></i></button>
                        <button type="button" class="canvas-tool-btn" data-tool="circle" title="Circle" aria-label="Circle tool"><i class="far fa-circle" aria-hidden="true"></i></button>
                    </div>

                    <!-- Color Swatches -->
                    <div class="canvas-tool-group color-swatches" role="group" aria-label="Drawing Colors">
                        <button type="button" class="canvas-color-btn active" data-color="#2563eb" style="background:#2563eb;" title="Blue" aria-label="Blue color"></button>
                        <button type="button" class="canvas-color-btn" data-color="#0f172a" style="background:#0f172a;" title="Dark" aria-label="Dark color"></button>
                        <button type="button" class="canvas-color-btn" data-color="#dc2626" style="background:#dc2626;" title="Red" aria-label="Red color"></button>
                        <button type="button" class="canvas-color-btn" data-color="#16a34a" style="background:#16a34a;" title="Green" aria-label="Green color"></button>
                        <button type="button" class="canvas-color-btn" data-color="#d97706" style="background:#d97706;" title="Amber" aria-label="Amber color"></button>
                        <button type="button" class="canvas-color-btn" data-color="#9333ea" style="background:#9333ea;" title="Purple" aria-label="Purple color"></button>
                        <button type="button" class="canvas-color-btn" data-color="#ffffff" style="background:#ffffff; border:1px solid #94a3b8;" title="White" aria-label="White color"></button>
                    </div>

                    <!-- Line Width -->
                    <div class="canvas-tool-group" role="group" aria-label="Stroke Width">
                        <label for="canvas-line-width" class="sr-only">Line Width</label>
                        <select id="canvas-line-width" class="canvas-select-control" title="Stroke Thickness" aria-label="Stroke Thickness">
                            <option value="2">Fine (2px)</option>
                            <option value="4" selected>Medium (4px)</option>
                            <option value="8">Bold (8px)</option>
                            <option value="16">Marker (16px)</option>
                        </select>
                    </div>

                    <!-- Grid Paper Toggle -->
                    <div class="canvas-tool-group" role="group" aria-label="Background Grid Paper">
                        <button type="button" class="canvas-action-btn" id="canvas-toggle-grid" title="Switch Grid Paper (Blank, Dots, Cartesian Math, Isometric)" aria-label="Toggle Grid Paper Style">
                            <i class="fas fa-border-all" aria-hidden="true"></i> <span id="canvas-grid-name">Grid: Math</span>
                        </button>
                    </div>

                    <!-- Canvas History & Actions -->
                    <div class="canvas-tool-group actions-group" role="group" aria-label="Canvas Actions">
                        <button type="button" class="canvas-action-btn" id="canvas-undo-btn" title="Undo Stroke (Ctrl+Z)" aria-label="Undo"><i class="fas fa-undo" aria-hidden="true"></i></button>
                        <button type="button" class="canvas-action-btn" id="canvas-redo-btn" title="Redo Stroke (Ctrl+Y)" aria-label="Redo"><i class="fas fa-redo" aria-hidden="true"></i></button>
                        <button type="button" class="canvas-action-btn" id="canvas-insert-note-btn" title="Insert Canvas Drawing Snapshot into Active Note" aria-label="Insert Drawing into Note">
                            <i class="fas fa-file-import" aria-hidden="true"></i> <span>Insert in Note</span>
                        </button>
                        <button type="button" class="canvas-action-btn" id="canvas-download-btn" title="Download Canvas as High-Res PNG" aria-label="Download Drawing as PNG">
                            <i class="fas fa-camera" aria-hidden="true"></i> <span>Snapshot</span>
                        </button>
                        <button type="button" class="canvas-action-btn btn-danger-soft" id="canvas-clear-btn" title="Clear Canvas Drawing" aria-label="Clear Canvas">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i> <span>Clear</span>
                        </button>
                    </div>
                </div>

                <!-- Canvas Viewport -->
                <div class="scratchpad-canvas-wrap grid-math" id="scratchpad-canvas-wrap">
                    <canvas id="scratchpad-studio-canvas" aria-label="Interactive drawing canvas for math calculations and sketches" role="img"></canvas>
                </div>
            </section>

            <!-- PANE 3: Math Formulas & Live MathJax Preview -->
            <section id="scratchpad-pane-math" class="scratchpad-pane" role="tabpanel" aria-labelledby="scratchpad-tab-math" hidden>
                <div class="scratchpad-math-container">
                    <!-- Quick-Insert Math Palette -->
                    <div class="math-palette-panel">
                        <h4 class="math-section-title"><i class="fas fa-calculator" aria-hidden="true"></i> Formula Quick-Insert Palette (Click to Insert)</h4>
                        
                        <!-- Algebra & Arithmetic -->
                        <div class="math-category-card">
                            <h5 class="math-cat-name">Arithmetic & Fractions</h5>
                            <div class="math-chips-grid">
                                <button type="button" class="math-chip-btn" data-latex="\frac{a}{b}" title="Fraction">\(\frac{a}{b}\)</button>
                                <button type="button" class="math-chip-btn" data-latex="x^{2}" title="Power / Exponent">\(x^{2}\)</button>
                                <button type="button" class="math-chip-btn" data-latex="x_{1}" title="Subscript">\(x_{1}\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\sqrt{x}" title="Square Root">\(\sqrt{x}\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\sqrt[n]{x}" title="Nth Root">\(\sqrt[n]{x}\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\pm" title="Plus-Minus">\(\pm\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\times" title="Multiplication">\(\times\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\div" title="Division">\(\div\)</button>
                            </div>
                        </div>

                        <!-- Core Equations -->
                        <div class="math-category-card">
                            <h5 class="math-cat-name">Standard Equations</h5>
                            <div class="math-chips-grid">
                                <button type="button" class="math-chip-btn" data-latex="x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}" title="Quadratic Formula">\(x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}\)</button>
                                <button type="button" class="math-chip-btn" data-latex="a^2 + b^2 = c^2" title="Pythagorean Theorem">\(a^2 + b^2 = c^2\)</button>
                                <button type="button" class="math-chip-btn" data-latex="A = \pi r^2" title="Area of a Circle">\(A = \pi r^2\)</button>
                                <button type="button" class="math-chip-btn" data-latex="m = \frac{y_2 - y_1}{x_2 - x_1}" title="Slope Formula">\(m = \frac{y_2 - y_1}{x_2 - x_1}\)</button>
                                <button type="button" class="math-chip-btn" data-latex="E = mc^2" title="Mass-Energy Equivalence">\(E = mc^2\)</button>
                            </div>
                        </div>

                        <!-- Calculus & Advanced -->
                        <div class="math-category-card">
                            <h5 class="math-cat-name">Calculus & Sequences</h5>
                            <div class="math-chips-grid">
                                <button type="button" class="math-chip-btn" data-latex="\int_{a}^{b} f(x)\,dx" title="Definite Integral">\(\int_{a}^{b} f(x)\,dx\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\sum_{i=1}^{n} x_i" title="Summation">\(\sum_{i=1}^{n} x_i\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\lim_{x \to \infty} f(x)" title="Limit">\(\lim_{x \to \infty}\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\frac{dy}{dx}" title="Derivative">\(\frac{dy}{dx}\)</button>
                            </div>
                        </div>

                        <!-- Trigonometry & Greek Symbols -->
                        <div class="math-category-card">
                            <h5 class="math-cat-name">Trigonometry & Greek Symbols</h5>
                            <div class="math-chips-grid">
                                <button type="button" class="math-chip-btn" data-latex="\sin(\theta)" title="Sine">\(\sin(\theta)\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\cos(\theta)" title="Cosine">\(\cos(\theta)\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\tan(\theta)" title="Tangent">\(\tan(\theta)\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\theta" title="Theta">\(\theta\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\pi" title="Pi">\(\pi\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\alpha" title="Alpha">\(\alpha\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\beta" title="Beta">\(\beta\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\Delta" title="Delta">\(\Delta\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\lambda" title="Lambda">\(\lambda\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\sigma" title="Sigma">\(\sigma\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\infty" title="Infinity">\(\infty\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\approx" title="Approximately">\(\approx\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\le" title="Less than or equal">\(\le\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\ge" title="Greater than or equal">\(\ge\)</button>
                                <button type="button" class="math-chip-btn" data-latex="\neq" title="Not equal">\(\neq\)</button>
                            </div>
                        </div>
                    </div>

                    <!-- Live MathJax Preview Display -->
                    <div class="math-preview-panel">
                        <div class="math-preview-header">
                            <h4 class="math-section-title"><i class="fas fa-eye" aria-hidden="true"></i> Live MathJax Formatted Preview</h4>
                            <button type="button" id="scratchpad-refresh-mathjax" class="scratchpad-btn-sm" title="Refresh Equation Typesetting" aria-label="Refresh MathJax Equations">
                                <i class="fas fa-sync-alt" aria-hidden="true"></i> Refresh
                            </button>
                        </div>
                        <div id="scratchpad-mathjax-preview" class="mathjax-live-box" aria-live="polite">
                            <!-- Populated dynamically by MathJax engine -->
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <footer class="scratchpad-footer">
            <div class="scratchpad-meta">
                <span id="scratchpad-status" class="scratchpad-status" aria-live="polite">
                    <i class="fas fa-check-circle" aria-hidden="true"></i> Saved locally
                </span>
                <span id="scratchpad-stats" class="scratchpad-stats">
                    0 words • 0 chars • 0 min read
                </span>
            </div>

            <div class="scratchpad-actions">
                <button type="button" id="scratchpad-dictate-btn" class="scratchpad-dictate-btn" title="Toggle Voice Dictation (Speech-to-Text) (Alt+D)" aria-label="Toggle Voice Dictation">
                    <i class="fas fa-microphone" aria-hidden="true"></i> <span>Dictate</span>
                </button>
                <button type="button" id="scratchpad-copy-btn" class="scratchpad-footer-btn" title="Copy all notes to clipboard" aria-label="Copy Notes">
                    <i class="fas fa-copy" aria-hidden="true"></i> <span>Copy</span>
                </button>
                <button type="button" id="scratchpad-print-btn" class="scratchpad-footer-btn" title="Print notes formatted for paper" aria-label="Print Notes">
                    <i class="fas fa-print" aria-hidden="true"></i> <span class="hide-mobile">Print</span>
                </button>
                <button type="button" id="download-notes-md" class="scratchpad-footer-btn" title="Download Notes as Markdown (.md)" aria-label="Download Notes as Markdown">
                    <i class="fab fa-markdown" aria-hidden="true"></i> <span>Markdown</span>
                </button>
                <button type="button" id="download-notes" class="scratchpad-download-btn" title="Download Notes as Plain Text (.txt)" aria-label="Download Notes as Text">
                    <i class="fas fa-file-download" aria-hidden="true"></i> <span>Text (.txt)</span>
                </button>
                <button type="button" id="clear-notes-btn" class="scratchpad-clear-btn" title="Clear current note contents" aria-label="Clear Current Note">
                    <i class="fas fa-trash-alt" aria-hidden="true"></i> <span class="hide-mobile">Clear</span>
                </button>
            </div>
        </footer>
    </div>
</div>
