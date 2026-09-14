<div class="math-reference-content">
    <!-- Archival Cataloging Header -->
    <div class="math-book-callout-header">
        <span class="math-catalog-seal"><i class="fas fa-landmark"></i> HESTEN ACADEMIC REFERENCE ARCHIVE</span>
        <span class="math-catalog-callno">CALL NO: QA152.H47 2026 &bull; DEWEY: 512.9 &bull; VOL. IX</span>
    </div>

    <!-- Chapter 9 Bookplate Frontispiece -->
    <header class="math-chapter-hero">
        <div class="math-hero-badge"><i class="fas fa-bookmark"></i> Volume IX &bull; Classical Algebra I Compendium</div>
        <h1 class="math-hero-title">Ninth Grade Mathematics Reference Codex (Algebra I)</h1>
        <div class="math-hero-subtitle">The Complete Scholastic Guide to Polynomial Arithmetic, Master $ac$-Factoring, Quadratic Theory &amp; Discriminant ($\Delta$), Parabolic Geometry, Exponential Models, Sequences &amp; Synoptic Concordance</div>
        <div class="math-book-divider"><span class="math-fleuron">&#10086;</span></div>
        <p class="math-hero-desc">An exhaustive reference codex for secondary algebra scholars, instructors, and pre-collegiate mathematicians. Systematizing polynomial ring operations, prime quadratic factorization algorithms, the general quadratic formula, parabolic axis and extrema theorems, discrete arithmetic/geometric progressions, and computational mental algebra heuristics.</p>
    </header>

    <!-- Quick Navigation Pills -->
    <nav class="math-toc-pills" aria-label="Chapter sections">
        <a href="#sec-9-1" class="math-pill"><i class="fas fa-cubes"></i> &sect; 9.1 Polynomial Operations</a>
        <a href="#sec-9-2" class="math-pill"><i class="fas fa-th"></i> &sect; 9.2 $ac$-Method Factoring</a>
        <a href="#sec-9-3" class="math-pill"><i class="fas fa-equals"></i> &sect; 9.3 Special Identities</a>
        <a href="#sec-9-4" class="math-pill"><i class="fas fa-calculator"></i> &sect; 9.4 Quadratic Formula &amp; $\Delta$</a>
        <a href="#sec-9-5" class="math-pill"><i class="fas fa-chart-area"></i> &sect; 9.5 Parabola Vertex Form</a>
        <a href="#sec-9-6" class="math-pill"><i class="fas fa-chart-line"></i> &sect; 9.6 Exponential Growth</a>
        <a href="#sec-9-7" class="math-pill"><i class="fas fa-sort-numeric-up"></i> &sect; 9.7 Sequences ($a_n$)</a>
        <a href="#sec-9-8" class="math-pill"><i class="fas fa-project-diagram"></i> &sect; 9.8 Systems by Elimination</a>
        <a href="#sec-9-9" class="math-pill"><i class="fas fa-chart-bar"></i> &sect; 9.9 Statistics &amp; Correlation</a>
        <a href="#sec-9-10" class="math-pill"><i class="fas fa-brain"></i> &sect; 9.10 Speed Hacks</a>
        <a href="#sec-9-11" class="math-pill"><i class="fas fa-scroll"></i> &sect; 9.11 Synoptic Tables</a>
    </nav>

    <!-- ==========================================================================
         Section 9.1: Polynomial Operations & FOIL
         ========================================================================== -->
    <section id="sec-9-1" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.1</span>
            <h2 class="math-section-title">Polynomial Arithmetic &amp; Binomial FOIL Expansion</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">BINOMIAL EXPANSION</div>
                <div class="math-formula-title">FOIL Expansion Law</div>
                <div class="math-formula-latex">$$(a + b)(c + d) = \underbrace{ac}_{\text{First}} + \underbrace{ad}_{\text{Outer}} + \underbrace{bc}_{\text{Inner}} + \underbrace{bd}_{\text{Last}}$$</div>
                <div class="math-formula-desc">$(2x + 3)(x - 4) = 2x^2 - 8x + 3x - 12 = 2x^2 - 5x - 12$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">CLASSIFICATION</div>
                <div class="math-formula-title">Degree &amp; Polynomial Type</div>
                <div class="math-formula-latex">$$\text{deg}(P(x)) = \text{Highest Exponent Power of Variable}$$</div>
                <div class="math-formula-desc">Deg 0: Constant &bull; Deg 1: Linear &bull; Deg 2: Quadratic &bull; Deg 3: Cubic &bull; Deg 4: Quartic.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 9.2: Factoring Trinomials (ac-Method)
         ========================================================================== -->
    <section id="sec-9-2" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.2</span>
            <h2 class="math-section-title">Factoring Quadratic Trinomials: The Master $ac$-Method</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-th"></i> ALGORITHM 9.2.1</span>
                <span class="math-def-domain">Topic: The Complete $ac$-Method Algorithm</span>
            </div>
            <div class="math-def-body">
                To factor general trinomial $ax^2 + bx + c$:
                <ol>
                    <li>Factor out any common greatest common factor ($\text{GCF}$).</li>
                    <li>Compute product $P = a \cdot c$ and target sum $S = b$.</li>
                    <li>Find two numbers $m, n$ such that $m \cdot n = a \cdot c$ and $m + n = b$.</li>
                    <li>Rewrite middle term: $ax^2 + mx + nx + c$, then factor by grouping!</li>
                </ol>
                $$\text{Example: } 2x^2 + 7x + 3 \implies ac = 6, \ b = 7 \implies (6, 1) \implies 2x(x + 3) + 1(x + 3) = \mathbf{(2x + 1)(x + 3)}$$
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 9.3: Special Factoring Identities
         ========================================================================== -->
    <section id="sec-9-3" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.3</span>
            <h2 class="math-section-title">Special Factoring Identities &amp; Conjugate Pairs</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">SPECIAL IDENTITY I</div>
                <div class="math-formula-title">Difference of Two Squares</div>
                <div class="math-formula-latex">$$a^2 - b^2 = (a + b)(a - b)$$</div>
                <div class="math-formula-desc">$9x^2 - 49 = (3x + 7)(3x - 7)$. (Sum of squares $a^2+b^2$ is prime over reals).</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">SPECIAL IDENTITY II</div>
                <div class="math-formula-title">Perfect Square Trinomial (+)</div>
                <div class="math-formula-latex">$$a^2 + 2ab + b^2 = (a + b)^2$$</div>
                <div class="math-formula-desc">$x^2 + 12x + 36 = (x + 6)^2$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">SPECIAL IDENTITY III</div>
                <div class="math-formula-title">Perfect Square Trinomial (-)</div>
                <div class="math-formula-latex">$$a^2 - 2ab + b^2 = (a - b)^2$$</div>
                <div class="math-formula-desc">$4x^2 - 20x + 25 = (2x - 5)^2$.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 9.4: Quadratic Formula & Discriminant Theory
         ========================================================================== -->
    <section id="sec-9-4" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.4</span>
            <h2 class="math-section-title">The Quadratic Formula &amp; Discriminant ($\Delta$) Analysis</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-calculator"></i> THEOREM 9.4.1</span>
                <span class="math-def-domain">Topic: The General Quadratic Resolution</span>
            </div>
            <div class="math-def-body">
                For any quadratic equation $ax^2 + bx + c = 0$ with $a \neq 0$:
                $$x = \frac{-b \pm \sqrt{\Delta}}{2a} \quad \text{where Discriminant } \Delta = b^2 - 4ac$$
            </div>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Discriminant Value ($\Delta$)</th>
                        <th>Nature of Roots</th>
                        <th>Parabola Real $x$-Intercepts</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>$\Delta &gt; 0$ (Perfect Square)</strong></td><td>Two distinct rational roots</td><td>Crosses $x$-axis twice at rational integers/fractions</td></tr>
                    <tr><td><strong>$\Delta &gt; 0$ (Non-Square)</strong></td><td>Two distinct irrational conjugate roots</td><td>Crosses $x$-axis twice at real radical values</td></tr>
                    <tr><td><strong>$\Delta = 0$ (Zero)</strong></td><td>Exactly one repeated real root (double root)</td><td>Parabola vertex touches $x$-axis tangentially</td></tr>
                    <tr><td><strong>$\Delta &lt; 0$ (Negative)</strong></td><td>Two complex conjugate roots ($a \pm bi$)</td><td>Parabola floats entirely above or below $x$-axis</td></tr>
                </tbody>
            </table>
        </div>

        <div class="math-example-box">
            <div class="math-ex-header">
                <span class="math-ex-badge"><i class="fas fa-pencil-alt"></i> EXEMPLUM 9.4</span>
                <span class="math-ex-title">Quadratic Equation Resolution</span>
            </div>
            <div class="math-ex-body">
                <p class="math-ex-problem"><strong>Problem:</strong> Solve $2x^2 - 5x - 3 = 0$ using the Quadratic Formula.</p>
                <div class="math-ex-solution">
                    <div class="math-sol-step"><strong>Step 1 (Identify Coefficients):</strong> $a = 2, b = -5, c = -3$.</div>
                    <div class="math-sol-step"><strong>Step 2 (Compute Discriminant):</strong> $\Delta = (-5)^2 - 4(2)(-3) = 25 - (-24) = 49 = 7^2$ (Two rational roots!).</div>
                    <div class="math-sol-step"><strong>Step 3 (Evaluate Roots):</strong> $x = \frac{-(-5) \pm \sqrt{49}}{2(2)} = \frac{5 \pm 7}{4}$.</div>
                    <div class="math-sol-step"><strong>Step 4 (Separate Branches):</strong> $x_1 = \frac{5 + 7}{4} = \frac{12}{4} = 3 \quad \vert \quad x_2 = \frac{5 - 7}{4} = \frac{-2}{4} = -\frac{1}{2}$.</div>
                </div>
                <div class="math-ex-result">
                    <span><i class="fas fa-check-circle" style="color: #059669;"></i> <strong>Result:</strong> $x = \left\{3, -\frac{1}{2}\right\}$.</span>
                    <span class="math-qed">&#9632; Q.E.D.</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 9.5: Parabola Vertex Form & Graphing
         ========================================================================== -->
    <section id="sec-9-5" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.5</span>
            <h2 class="math-section-title">Parabolic Geometry: Vertex Form &amp; Extrema</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">VERTEX FORM</div>
                <div class="math-formula-title">Form $y = a(x - h)^2 + k$</div>
                <div class="math-formula-latex">$$\text{Vertex } V = (h, k)$$</div>
                <div class="math-formula-desc">Opens upwards (minimum) if $a > 0$; opens downwards (maximum) if $a < 0$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">AXIS OF SYMMETRY</div>
                <div class="math-formula-title">Vertical Axis of Symmetry</div>
                <div class="math-formula-latex">$$x = -\frac{b}{2a}$$</div>
                <div class="math-formula-desc">Vertical line passing directly through the vertex coordinate $h$.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 9.6: Exponential Growth & Decay Models
         ========================================================================== -->
    <section id="sec-9-6" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.6</span>
            <h2 class="math-section-title">Exponential Growth, Decay &amp; Compound Interest</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">GROWTH MODEL</div>
                <div class="math-formula-title">Exponential Growth ($r > 0$)</div>
                <div class="math-formula-latex">$$y = a(1 + r)^t$$</div>
                <div class="math-formula-desc">Population expansions, viral propagation, price inflation.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">DECAY MODEL</div>
                <div class="math-formula-title">Exponential Decay ($r > 0$)</div>
                <div class="math-formula-latex">$$y = a(1 - r)^t$$</div>
                <div class="math-formula-desc">Radioactive half-life ($y = a(0.5)^{t/h}$), asset depreciation.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">FINANCE MODEL</div>
                <div class="math-formula-title">Compound Interest</div>
                <div class="math-formula-latex">$$A = P\left(1 + \frac{r}{n}\right)^{nt}$$</div>
                <div class="math-formula-desc">$P = \text{Principal}, r = \text{Annual rate}, n = \text{Compounds per yr}, t = \text{Years}$.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 9.7: Sequences & Progressions
         ========================================================================== -->
    <section id="sec-9-7" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.7</span>
            <h2 class="math-section-title">Arithmetic &amp; Geometric Sequences ($a_n$)</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">ARITHMETIC (LINEAR)</div>
                <div class="math-formula-title">Arithmetic Sequence ($n^{\text{th}}$ Term)</div>
                <div class="math-formula-latex">$$a_n = a_1 + (n - 1)d$$</div>
                <div class="math-formula-desc">$d = \text{common difference } (a_{k+1} - a_k)$. Constant linear slope.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">GEOMETRIC (EXPONENTIAL)</div>
                <div class="math-formula-title">Geometric Sequence ($n^{\text{th}}$ Term)</div>
                <div class="math-formula-latex">$$a_n = a_1 \cdot r^{n-1}$$</div>
                <div class="math-formula-desc">$r = \text{common ratio } \left(\frac{a_{k+1}}{a_k}\right)$. Exponential growth factor.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 9.8: Systems by Elimination & Linear Inequalities
         ========================================================================== -->
    <section id="sec-9-8" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.8</span>
            <h2 class="math-section-title">Linear Systems by Elimination &amp; 2D Inequalities</h2>
        </div>

        <div class="math-howto-box">
            <div class="math-howto-header"><i class="fas fa-crosshairs"></i> Linear Elimination Protocol</div>
            <p>Multiply one or both equations by non-zero constants so that coefficients of one variable are exact additive opposites ($+k$ and $-k$). Add equations together to eliminate the variable!</p>
            <ul>
                <li><strong>Graphing 2D Inequalities:</strong> Solid boundary line for $\le, \ge$; Dashed line for $&lt;, &gt;$.</li>
                <li><strong>Test Point:</strong> Plug in $(0, 0)$ to decide which half-plane to shade.</li>
            </ul>
        </div>
    </section>

    <!-- ==========================================================================
         Section 9.9: Statistics & Correlation
         ========================================================================== -->
    <section id="sec-9-9" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.9</span>
            <h2 class="math-section-title">Statistics: Standard Deviation ($\sigma$) &amp; Correlation ($r$)</h2>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Metric</th>
                        <th>Range</th>
                        <th>Statistical Meaning</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Correlation ($r$)</strong></td><td>$-1 \le r \le +1$</td><td>Strength and direction of linear association ($+1$ perfect positive, $-1$ perfect negative, $0$ none)</td></tr>
                    <tr><td><strong>Standard Deviation ($\sigma$)</strong></td><td>$\sigma \ge 0$</td><td>Measure of typical data spread dispersion around the mean $\bar{x}$</td></tr>
                    <tr><td><strong>Residual</strong></td><td>$\mathbb{R}$</td><td>$\text{Residual} = \text{Observed } y - \text{Predicted } \hat{y}$ (Random scatter indicates good linear fit)</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- ==========================================================================
         Section 9.10: Computational Mental Math Speed Hacks
         ========================================================================== -->
    <section id="sec-9-10" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.10</span>
            <h2 class="math-section-title">Scholia &amp; Computational Mental Math Speed Hacks</h2>
        </div>

        <div class="math-constant-grid">
            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-bolt" style="color: #b45309;"></i> HACK I</div>
                <div class="math-const-name">Vieta's Formula Root Shortcuts</div>
                <div class="math-const-val">$$r_1 + r_2 = -\frac{b}{a} \quad \vert \quad r_1 \cdot r_2 = \frac{c}{a}$$</div>
                <div class="math-const-desc">Never solve a quadratic just to find the sum or product of its roots on an exam. Read them off coefficients in 1 second!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-times" style="color: #1e3a8a;"></i> HACK II</div>
                <div class="math-const-name">The Diamond X-Factoring Hack</div>
                <div class="math-const-val">$$\text{Top: } a \cdot c \quad \vert \quad \text{Bottom: } b \implies \text{Wings: } m, n$$</div>
                <div class="math-const-desc">Draw a big X. Top is product $ac$, bottom is sum $b$. Filling left and right gives your binomial factors instantly.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-eye" style="color: #065f46;"></i> HACK III</div>
                <div class="math-const-name">Quick Discriminant Mental Check</div>
                <div class="math-const-val">$$\text{If } a \text{ and } c \text{ have opposite signs} \implies \Delta > 0 \text{ ALWAYS!}$$</div>
                <div class="math-const-desc">Because $-4ac$ will be positive, $b^2 + \text{positive} > 0$. Guaranteed 2 real roots without computing!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-chart-line" style="color: #9d174d;"></i> HACK IV</div>
                <div class="math-const-name">Parabola Step Pattern (1a, 3a, 5a)</div>
                <div class="math-const-val">$$\text{From vertex: Over } 1 \to \text{Up } 1a, \ \text{Over } 1 \to \text{Up } 3a, \ \text{Over } 1 \to \text{Up } 5a$$</div>
                <div class="math-const-desc">Graph any parabola instantaneously without making an input-output table!</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 9.11: The Grand Synoptic Tables & Student Cheat Sheet
         ========================================================================== -->
    <section id="sec-9-11" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 9.11</span>
            <h2 class="math-section-title">The Grand Synoptic Tables &amp; Complete Grade 9 / Algebra I Student Cheat Sheet</h2>
        </div>

        <div class="math-summary-sheet">
            <div class="math-summary-header">
                <div>
                    <h3><i class="fas fa-scroll"></i> Grade 9 / Algebra I Master Reference Concordance</h3>
                    <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: var(--reader-muted);">Authorized curriculum reference concordance &bull; Algebra I Standards Complete</p>
                </div>
                <div class="math-summary-actions">
                    <button type="button" class="math-print-btn" onclick="printSynopticTables()" aria-label="Print or Save Synoptic Tables as PDF">
                        <i class="fas fa-print"></i> Print / Save PDF
                    </button>
                    <button type="button" class="math-print-btn" onclick="downloadSynopticMarkdown()" aria-label="Download Synoptic Tables as Text File">
                        <i class="fas fa-download"></i> Download Text File
                    </button>
                </div>
            </div>

            <div class="math-summary-grid">
                <!-- Concordance 1 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-calculator" style="color: #f59e0b;"></i> Quadratic Formula</h4>
                    <ul>
                        <li>$x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}$</li>
                        <li>$\Delta = b^2 - 4ac$</li>
                        <li>$\Delta &gt; 0$: 2 Real roots</li>
                        <li>$\Delta = 0$: 1 Repeated root</li>
                        <li>$\Delta &lt; 0$: 2 Complex roots</li>
                        <li>Vieta: $r_1+r_2 = -b/a, r_1 r_2 = c/a$</li>
                    </ul>
                </div>

                <!-- Concordance 2 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-th" style="color: #3b82f6;"></i> Factoring Identities</h4>
                    <ul>
                        <li>$a^2 - b^2 = (a+b)(a-b)$</li>
                        <li>$(a+b)^2 = a^2 + 2ab + b^2$</li>
                        <li>$(a-b)^2 = a^2 - 2ab + b^2$</li>
                        <li>$ac$-Method: Split middle term</li>
                        <li>Always factor out GCF first!</li>
                    </ul>
                </div>

                <!-- Concordance 3 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-chart-area" style="color: #10b981;"></i> Parabola Features</h4>
                    <ul>
                        <li>Axis of Symmetry: $x = -\frac{b}{2a}$</li>
                        <li>Vertex: $(h, k)$ in $y=a(x-h)^2+k$</li>
                        <li>$a &gt; 0$: Opens up (Minimum)</li>
                        <li>$a &lt; 0$: Opens down (Maximum)</li>
                        <li>Step pattern: $1a, 3a, 5a$</li>
                    </ul>
                </div>

                <!-- Concordance 4 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-chart-line" style="color: #ec4899;"></i> Exponentials</h4>
                    <ul>
                        <li>Growth: $y = a(1+r)^t$</li>
                        <li>Decay: $y = a(1-r)^t$</li>
                        <li>Compound: $A = P(1 + \frac{r}{n})^{nt}$</li>
                        <li>Half-life: $y = a(0.5)^{t/h}$</li>
                        <li>Horizontal asymptote: $y = 0$</li>
                    </ul>
                </div>

                <!-- Concordance 5 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-sort-numeric-up" style="color: #8b5cf6;"></i> Sequences</h4>
                    <ul>
                        <li>Arithmetic: $a_n = a_1 + (n-1)d$</li>
                        <li>Arithmetic Difference: $d = a_k - a_{k-1}$</li>
                        <li>Geometric: $a_n = a_1 \cdot r^{n-1}$</li>
                        <li>Geometric Ratio: $r = a_{k} / a_{k-1}$</li>
                    </ul>
                </div>

                <!-- Concordance 6 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-chart-bar" style="color: #6366f1;"></i> Statistics</h4>
                    <ul>
                        <li>Correlation $r$: $[-1, +1]$</li>
                        <li>$r \approx \pm 1$: Strong linear</li>
                        <li>Residual: $y - \hat{y}$</li>
                        <li>Standard Deviation: $\sigma$</li>
                        <li>Linear regression line: $\hat{y} = mx + b$</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Script for Printing and Downloading Synoptic Tables -->
    <script>
        function printSynopticTables() {
            document.body.classList.add('printing-math-synoptic');
            window.print();
            setTimeout(function () {
                document.body.classList.remove('printing-math-synoptic');
            }, 1000);
        }

        function downloadSynopticMarkdown() {
            var textContent = "========================================================================\n" +
                "HESTEN ACADEMIC REFERENCE ARCHIVE - ALGEBRA I (GRADE 9) MATHEMATICS CONCORDANCE\n" +
                "CALL NO: QA152.H47 2026 | DEWEY: 512.9 | VOLUME IX\n" +
                "========================================================================\n\n" +
                "1. THE QUADRATIC FORMULA & DISCRIMINANT:\n" +
                "   x = [-b +/- sqrt(b^2 - 4ac)] / (2a)\n" +
                "   Discriminant Delta = b^2 - 4ac\n" +
                "   Delta > 0: 2 distinct real roots (rational if Delta is perfect square)\n" +
                "   Delta = 0: 1 repeated real root (parabola vertex on x-axis)\n" +
                "   Delta < 0: 2 complex conjugate roots (no real x-intercepts)\n" +
                "   Vieta's Formulas: Root Sum = -b/a | Root Product = c/a\n\n" +
                "2. SPECIAL FACTORING IDENTITIES:\n" +
                "   Difference of Two Squares: a^2 - b^2 = (a + b)(a - b)\n" +
                "   Perfect Square (+)       : a^2 + 2ab + b^2 = (a + b)^2\n" +
                "   Perfect Square (-)       : a^2 - 2ab + b^2 = (a - b)^2\n" +
                "   Master ac-Method         : Split middle term b into factors of a*c, factor by grouping\n\n" +
                "3. PARABOLA PROPERTIES & VERTEX FORM:\n" +
                "   Standard Form    : y = ax^2 + bx + c\n" +
                "   Vertex Form      : y = a(x - h)^2 + k  => Vertex at (h, k)\n" +
                "   Axis of Symmetry : x = -b / (2a)\n" +
                "   Extrema          : Minimum if a > 0; Maximum if a < 0\n" +
                "   Step Pattern     : Over 1 -> Up 1a; Over 1 -> Up 3a; Over 1 -> Up 5a\n\n" +
                "4. EXPONENTIAL MODELS & FINANCE:\n" +
                "   Exponential Growth: y = a(1 + r)^t (r > 0)\n" +
                "   Exponential Decay : y = a(1 - r)^t (r > 0)\n" +
                "   Compound Interest : A = P(1 + r/n)^(nt)\n" +
                "   Half-Life Model   : y = a(0.5)^(t/h)\n\n" +
                "5. ARITHMETIC & GEOMETRIC SEQUENCES:\n" +
                "   Arithmetic (Common Diff d) : a_n = a_1 + (n - 1)d\n" +
                "   Geometric  (Common Ratio r): a_n = a_1 * r^(n - 1)\n\n" +
                "6. STATISTICS & LINEAR REGRESSION:\n" +
                "   Correlation Coefficient r : -1 <= r <= +1\n" +
                "   Residual                 : Observed y - Predicted y_hat\n" +
                "   Standard Deviation sigma : Average dispersion of values from mean\n\n" +
                "========================================================================\n" +
                "Hesten's Learning Platform - Curated Reference Codex\n";

            var blob = new Blob([textContent], { type: 'text/plain;charset=utf-8' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'Algebra-1-Grade-9-Synoptic-Tables.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    </script>
</div>
