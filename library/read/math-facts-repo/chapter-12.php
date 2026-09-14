<div class="math-reference-content">
    <!-- Archival Cataloging Header -->
    <div class="math-book-callout-header">
        <span class="math-catalog-seal"><i class="fas fa-landmark"></i> HESTEN ACADEMIC REFERENCE ARCHIVE</span>
        <span class="math-catalog-callno">CALL NO: QA303.H47 2026 &bull; DEWEY: 515.15 &bull; VOL. XII</span>
    </div>

    <!-- Chapter 12 Bookplate Frontispiece -->
    <header class="math-chapter-hero">
        <div class="math-hero-badge"><i class="fas fa-bookmark"></i> Volume XII &bull; Infinitesimal Calculus &amp; Advanced Analysis Codex</div>
        <h1 class="math-hero-title">Twelfth Grade Mathematics Reference Codex (Calculus &amp; Advanced Analysis)</h1>
        <div class="math-hero-subtitle">The Complete Scholastic Guide to Limits, Differential Calculus, The Fundamental Theorem of Calculus, Integration Techniques, Polar Coordinates, Vectors, Conics &amp; Synoptic Concordance</div>
        <div class="math-book-divider"><span class="math-fleuron">&#10086;</span></div>
        <p class="math-hero-desc">The crowning capstone reference manual of the Hesten Academic Archive for twelfth-grade scholars, collegiate mathematicians, and theoretical physicists. Codifying real analysis limits, Leibnizian differential operators, Riemann-Newtonian integral calculus, Euclidean vector spaces, analytic conics, and transcendental universal mathematical constants.</p>
    </header>

    <!-- Quick Navigation Pills -->
    <nav class="math-toc-pills" aria-label="Chapter sections">
        <a href="#sec-12-1" class="math-pill"><i class="fas fa-compress-arrows-alt"></i> &sect; 12.1 Limits &amp; Continuity</a>
        <a href="#sec-12-2" class="math-pill"><i class="fas fa-subscript"></i> &sect; 12.2 Derivative Rules</a>
        <a href="#sec-12-3" class="math-pill"><i class="fas fa-tachometer-alt"></i> &sect; 12.3 Extrema &amp; Optimization</a>
        <a href="#sec-12-4" class="math-pill"><i class="fas fa-gem"></i> &sect; 12.4 Fundamental Theorem (FTC)</a>
        <a href="#sec-12-5" class="math-pill"><i class="fas fa-stream"></i> &sect; 12.5 Integration Techniques</a>
        <a href="#sec-12-6" class="math-pill"><i class="fas fa-compass"></i> &sect; 12.6 Polar Coordinates</a>
        <a href="#sec-12-7" class="math-pill"><i class="fas fa-location-arrow"></i> &sect; 12.7 Vectors &amp; Dot Product</a>
        <a href="#sec-12-8" class="math-pill"><i class="fas fa-shapes"></i> &sect; 12.8 Conic Sections</a>
        <a href="#sec-12-9" class="math-pill"><i class="fas fa-infinity"></i> &sect; 12.9 Universal Constants</a>
        <a href="#sec-12-10" class="math-pill"><i class="fas fa-brain"></i> &sect; 12.10 Speed Hacks</a>
        <a href="#sec-12-11" class="math-pill"><i class="fas fa-scroll"></i> &sect; 12.11 Synoptic Tables</a>
    </nav>

    <!-- ==========================================================================
         Section 12.1: Limits, Continuity & L'Hopital
         ========================================================================== -->
    <section id="sec-12-1" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.1</span>
            <h2 class="math-section-title">Limits, Continuity &amp; L'Hôpital's Rule</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-scroll"></i> DEFINITION 12.1.1</span>
                <span class="math-def-domain">Topic: The Real Analysis Limit</span>
            </div>
            <div class="math-def-body">
                The limit $\lim_{x \to c} f(x) = L$ exists if and only if both one-sided limits are finite and congruent:
                $$\lim_{x \to c^-} f(x) = \lim_{x \to c^+} f(x) = L$$
                <strong>The Three Conditions of Continuity at $x = c$:</strong>
                $$1. \ f(c) \text{ is defined} \quad \vert \quad 2. \ \lim_{x \to c} f(x) \text{ exists} \quad \vert \quad 3. \ \lim_{x \to c} f(x) = f(c)$$
            </div>
        </div>

        <div class="math-theorem-box">
            <div class="math-thm-header">
                <span class="math-thm-badge"><i class="fas fa-award"></i> THEOREM 12.1.2</span>
                <span class="math-thm-title">L'Hôpital's Indeterminate Limit Rule</span>
            </div>
            <div class="math-thm-body">
                If $\lim_{x \to c} \frac{f(x)}{g(x)}$ yields indeterminate form $\left[\frac{0}{0}\right]$ or $\left[\frac{\pm\infty}{\pm\infty}\right]$, and $g'(x) \neq 0$ near $c$:
                $$\lim_{x \to c} \frac{f(x)}{g(x)} = \lim_{x \to c} \frac{f'(x)}{g'(x)}$$
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 12.2: Comprehensive Derivative Rules
         ========================================================================== -->
    <section id="sec-12-2" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.2</span>
            <h2 class="math-section-title">Differential Calculus: Definition &amp; Core Derivative Rules</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-subscript"></i> DEFINITION 12.2.1</span>
                <span class="math-def-domain">Topic: The Difference Quotient</span>
            </div>
            <div class="math-def-body">
                The instantaneous rate of change of $f(x)$ at $x$ is defined as the limit of the secant slopes:
                $$f'(x) = \frac{df}{dx} = \lim_{h \to 0} \frac{f(x + h) - f(x)}{h}$$
            </div>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Rule Name</th>
                        <th>Function $f(x)$</th>
                        <th>Derivative Formula $f'(x) = \frac{df}{dx}$</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Power Rule</strong></td><td>$x^n$</td><td>$n \cdot x^{n-1}$</td></tr>
                    <tr><td><strong>Product Rule</strong></td><td>$u \cdot v$</td><td>$u'v + uv'$</td></tr>
                    <tr><td><strong>Quotient Rule</strong></td><td>$\frac{u}{v}$</td><td>$\frac{u'v - uv'}{v^2}$ ("Low d-High minus High d-Low over Low-Low")</td></tr>
                    <tr><td><strong>Chain Rule</strong></td><td>$f(g(x))$</td><td>$f'(g(x)) \cdot g'(x)$</td></tr>
                    <tr><td><strong>Exponential ($e^x$)</strong></td><td>$e^x$</td><td>$e^x$ (Self-replicating transcendental)</td></tr>
                    <tr><td><strong>General Exponential</strong></td><td>$a^x$</td><td>$a^x \cdot \ln(a) \quad (a > 0)$</td></tr>
                    <tr><td><strong>Natural Logarithm</strong></td><td>$\ln(x)$</td><td>$\frac{1}{x} \quad (x > 0)$</td></tr>
                    <tr><td><strong>Sine &amp; Cosine</strong></td><td>$\sin x, \ \cos x$</td><td>$\frac{d}{dx}[\sin x] = \cos x, \quad \frac{d}{dx}[\cos x] = -\sin x$</td></tr>
                    <tr><td><strong>Tangent &amp; Secant</strong></td><td>$\tan x, \ \sec x$</td><td>$\frac{d}{dx}[\tan x] = \sec^2 x, \quad \frac{d}{dx}[\sec x] = \sec x\tan x$</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- ==========================================================================
         Section 12.3: Extrema, Concavity & Optimization
         ========================================================================== -->
    <section id="sec-12-3" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.3</span>
            <h2 class="math-section-title">Applications: Extrema, Concavity &amp; Optimization</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">CRITICAL NUMBERS</div>
                <div class="math-formula-title">Fermat's Stationary Points</div>
                <div class="math-formula-latex">$$f'(c) = 0 \quad \text{or} \quad f'(c) \text{ is undefined}$$</div>
                <div class="math-formula-desc">Potential candidate locations for local relative extrema.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">SECOND DERIVATIVE TEST</div>
                <div class="math-formula-title">Concavity &amp; Inflection Points</div>
                <div class="math-formula-latex">$$f''(c) > 0 \implies \text{Local MIN } (\cup), \quad f''(c) < 0 \implies \text{Local MAX } (\cap)$$</div>
                <div class="math-formula-desc">Point of Inflection occurs strictly where $f''(x)$ changes sign ($f''(x) = 0$).</div>
            </div>
        </div>

        <div class="math-example-box">
            <div class="math-ex-header">
                <span class="math-ex-badge"><i class="fas fa-pencil-alt"></i> EXEMPLUM 12.3</span>
                <span class="math-ex-title">Optimization of Enclosed Rectangular Area</span>
            </div>
            <div class="math-ex-body">
                <p class="math-ex-problem"><strong>Problem:</strong> A farmer has $120\text{ meters}$ of fencing to enclose a rectangular pasture against a straight river (requiring fencing on only 3 sides). Maximize the enclosed area.</p>
                <div class="math-ex-solution">
                    <div class="math-sol-step"><strong>Step 1 (Primary &amp; Constraint Equations):</strong> Area $A = x \cdot y$. Fencing constraint: $2x + y = 120 \implies y = 120 - 2x$.</div>
                    <div class="math-sol-step"><strong>Step 2 (Single-Variable Objective Function):</strong> $A(x) = x(120 - 2x) = 120x - 2x^2$.</div>
                    <div class="math-sol-step"><strong>Step 3 (Differentiate &amp; Set to 0):</strong> $A'(x) = 120 - 4x = 0 \implies 4x = 120 \implies x = 30\text{ meters}$.</div>
                    <div class="math-sol-step"><strong>Step 4 (Second Derivative Test):</strong> $A''(x) = -4 &lt; 0 \implies$ Strictly concave down (absolute maximum!).</div>
                    <div class="math-sol-step"><strong>Step 5 (Evaluate Dimensions &amp; Area):</strong> $y = 120 - 2(30) = 60\text{ m} \implies A_{\text{max}} = 30 \times 60 = 1,800\text{ m}^2$.</div>
                </div>
                <div class="math-ex-result">
                    <span><i class="fas fa-check-circle" style="color: #059669;"></i> <strong>Result:</strong> Maximum Area $= \mathbf{1,800\text{ m}^2}$ (Dimensions: $30\text{ m} \times 60\text{ m}$).</span>
                    <span class="math-qed">&#9632; Q.E.D.</span>
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 12.4: The Fundamental Theorem of Calculus
         ========================================================================== -->
    <section id="sec-12-4" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.4</span>
            <h2 class="math-section-title">The Fundamental Theorem of Calculus (FTC)</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-gem"></i> THE MASTER THEOREM</span>
                <span class="math-def-domain">Topic: Unification of Derivatives &amp; Integrals</span>
            </div>
            <div class="math-def-body">
                $$\text{\textbf{FTC Part 1 (Derivative of Accumulation Function):} } \frac{d}{dx}\left[\int_a^x f(t)\,dt\right] = f(x)$$
                $$\text{\textbf{FTC Part 2 (Net Definite Evaluation):} } \int_a^b f(x)\,dx = F(b) - F(a) \quad \text{where } F'(x) = f(x)$$
                The integral of a rate of change gives the net change of the total quantity over $[a, b]$.
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 12.5: Integration Techniques
         ========================================================================== -->
    <section id="sec-12-5" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.5</span>
            <h2 class="math-section-title">Integration Techniques: U-Substitution &amp; By Parts</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">INVERSE CHAIN RULE</div>
                <div class="math-formula-title">U-Substitution</div>
                <div class="math-formula-latex">$$\int f(g(x))g'(x)\,dx = \int f(u)\,du$$</div>
                <div class="math-formula-desc">Let $u = g(x) \implies du = g'(x)dx$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">INVERSE PRODUCT RULE</div>
                <div class="math-formula-title">Integration by Parts</div>
                <div class="math-formula-latex">$$\int u \, dv = u \cdot v - \int v \, du$$</div>
                <div class="math-formula-desc">Choose $u$ by <strong>LIATE</strong>: Log, Inverse trig, Algebraic, Trig, Exponential.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 12.6: Polar Coordinates & Parametric Equations
         ========================================================================== -->
    <section id="sec-12-6" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.6</span>
            <h2 class="math-section-title">Polar Coordinates &amp; Parametric Calculus</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">COORDINATE CONVERSION</div>
                <div class="math-formula-title">Polar $\leftrightarrow$ Cartesian</div>
                <div class="math-formula-latex">$$\begin{aligned} x &= r\cos\theta, \quad y = r\sin\theta \\ r^2 &= x^2 + y^2, \quad \tan\theta = \frac{y}{x} \end{aligned}$$</div>
                <div class="math-formula-desc">Converts radial distance $r$ and angle $\theta$ to $(x, y)$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">PARAMETRIC TANGENT</div>
                <div class="math-formula-title">Parametric Slope</div>
                <div class="math-formula-latex">$$\frac{dy}{dx} = \frac{dy/dt}{dx/dt} \quad \left(\frac{dx}{dt} \neq 0\right)$$</div>
                <div class="math-formula-desc">Evaluates slope of plane trajectory parameterized by time $t$.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 12.7: Vectors in 2D & 3D
         ========================================================================== -->
    <section id="sec-12-7" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.7</span>
            <h2 class="math-section-title">Euclidean Vectors &amp; The Dot Product</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">VECTOR MAGNITUDE</div>
                <div class="math-formula-title">Norm $|\mathbf{v}|$</div>
                <div class="math-formula-latex">$$|\mathbf{v}| = \sqrt{v_1^2 + v_2^2 + v_3^2}$$</div>
                <div class="math-formula-desc">Euclidean length in $\mathbb{R}^3$. Unit vector: $\mathbf{\hat{u}} = \frac{\mathbf{v}}{|\mathbf{v}|}$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">INNER PRODUCT</div>
                <div class="math-formula-title">Dot Product &amp; Orthogonality</div>
                <div class="math-formula-latex">$$\mathbf{u} \cdot \mathbf{v} = u_1 v_1 + u_2 v_2 + u_3 v_3 = |\mathbf{u}||\mathbf{v}|\cos\theta$$</div>
                <div class="math-formula-desc"><strong>Orthogonality Test:</strong> Two vectors are perpendicular ($\perp$) $\iff \mathbf{u} \cdot \mathbf{v} = 0$.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 12.8: Conic Sections
         ========================================================================== -->
    <section id="sec-12-8" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.8</span>
            <h2 class="math-section-title">Conic Sections: Parabolas, Ellipses &amp; Hyperbolas</h2>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Conic Section</th>
                        <th>Standard Canonical Equation (Centered at Origin)</th>
                        <th>Eccentricity ($e$)</th>
                        <th>Key Defining Geometric Property</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Circle</strong></td><td>$x^2 + y^2 = r^2$</td><td>$e = 0$</td><td>Equidistant from center point</td></tr>
                    <tr><td><strong>Ellipse</strong></td><td>$\frac{x^2}{a^2} + \frac{y^2}{b^2} = 1 \quad (c^2 = a^2 - b^2)$</td><td>$0 &lt; e &lt; 1$</td><td>Sum of distances to two foci is constant ($2a$)</td></tr>
                    <tr><td><strong>Parabola</strong></td><td>$y^2 = 4px \quad \text{or} \quad x^2 = 4py$</td><td>$e = 1$</td><td>Equidistant from focus and directrix line</td></tr>
                    <tr><td><strong>Hyperbola</strong></td><td>$\frac{x^2}{a^2} - \frac{y^2}{b^2} = 1 \quad (c^2 = a^2 + b^2)$</td><td>$e &gt; 1$</td><td>Difference of distances to two foci is constant ($2a$)</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- ==========================================================================
         Section 12.9: The Canon of Universal Mathematical Constants
         ========================================================================== -->
    <section id="sec-12-9" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.9</span>
            <h2 class="math-section-title">The Canon of Universal Mathematical Constants</h2>
        </div>

        <div class="math-constant-grid">
            <div class="math-constant-card">
                <div class="math-const-sym">&pi;</div>
                <div class="math-const-name">Archimedes' Constant (Pi)</div>
                <div class="math-const-val">$$\pi \approx 3.141592653589793$$</div>
                <div class="math-const-desc">Ratio of a circle's circumference to its diameter; omnipresent in trigonometry, Fourier analysis, and normal distributions.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym">e</div>
                <div class="math-const-name">Euler's Number</div>
                <div class="math-const-val">$$e \approx 2.718281828459045$$</div>
                <div class="math-const-desc">Base of the natural logarithm; limit $\lim_{n \to \infty} \left(1 + \frac{1}{n}\right)^n$; unique function whose derivative equals itself.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym">&phi;</div>
                <div class="math-const-name">The Golden Ratio (Phi)</div>
                <div class="math-const-val">$$\phi = \frac{1 + \sqrt{5}}{2} \approx 1.6180339887$$</div>
                <div class="math-const-desc">Divine proportion; limit ratio of consecutive Fibonacci numbers ($F_{n+1}/F_n \to \phi$); unique number where $\phi^2 = \phi + 1$.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym">i</div>
                <div class="math-const-name">The Imaginary Unit</div>
                <div class="math-const-val">$$i^2 = -1 \implies e^{i\pi} + 1 = 0$$</div>
                <div class="math-const-desc">Unites analysis, algebra, and geometry through Euler's Identity, linking the five fundamental constants $e, i, \pi, 1,$ and $0$.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 12.10: Computational Mental Math Speed Hacks
         ========================================================================== -->
    <section id="sec-12-10" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.10</span>
            <h2 class="math-section-title">Scholia &amp; Computational Calculus Speed Hacks</h2>
        </div>

        <div class="math-constant-grid">
            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-table" style="color: #b45309;"></i> HACK I</div>
                <div class="math-const-name">Tabular DI Method for By-Parts</div>
                <div class="math-const-val">$$\int x^3 e^{2x} dx \implies \text{D column (diff to 0), I column (integrate)}$$</div>
                <div class="math-const-desc">Draw alternating $+ / -$ signs and multiply diagonally. Solves repeated integration by parts in 20 seconds without messy algebra!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-shield-alt" style="color: #1e3a8a;"></i> HACK II</div>
                <div class="math-const-name">The Outside-Inside Chain Rule Mantra</div>
                <div class="math-const-val">$$\frac{d}{dx}[f(g(x))] = f'(\text{keep inside}) \times g'(x)$$</div>
                <div class="math-const-desc">Differentiate the outer shell, leave the inside alone, then multiply by derivative of inside. Never differentiate inside first!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-arrow-up" style="color: #065f46;"></i> HACK III</div>
                <div class="math-const-name">Polynomial Limit at Infinity Inspection</div>
                <div class="math-const-val">$$\lim_{x\to\infty} \frac{ax^n}{bx^m} \implies \begin{cases} 0 & n < m \\ a/b & n = m \\ \pm\infty & n > m \end{cases}$$</div>
                <div class="math-const-desc">Ignore all lower-degree terms! Look only at highest powers to determine horizontal asymptotes instantly.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-circle-notch" style="color: #9d174d;"></i> HACK IV</div>
                <div class="math-const-name">Orthogonal Dot Product Zero Test</div>
                <div class="math-const-val">$$\mathbf{u} \perp \mathbf{v} \iff u_1 v_1 + u_2 v_2 + u_3 v_3 = 0$$</div>
                <div class="math-const-desc">Verify perpendicular lines and planes in 2 seconds by checking if dot product is zero.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 12.11: The Grand Synoptic Tables & Student Cheat Sheet
         ========================================================================== -->
    <section id="sec-12-11" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 12.11</span>
            <h2 class="math-section-title">The Grand Synoptic Tables &amp; Complete Grade 12 / Calculus Student Cheat Sheet</h2>
        </div>

        <div class="math-summary-sheet">
            <div class="math-summary-header">
                <div>
                    <h3><i class="fas fa-scroll"></i> Grade 12 / Calculus Master Reference Concordance</h3>
                    <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: var(--reader-muted);">Authorized curriculum reference concordance &bull; Calculus &amp; Advanced Mathematics Complete</p>
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
                    <h4><i class="fas fa-subscript" style="color: #f59e0b;"></i> Derivative Rules</h4>
                    <ul>
                        <li>$\frac{d}{dx}[x^n] = n x^{n-1}$</li>
                        <li>$(uv)' = u'v + uv'$</li>
                        <li>$\left(\frac{u}{v}\right)' = \frac{u'v - uv'}{v^2}$</li>
                        <li>$[f(g(x))]' = f'(g(x))g'(x)$</li>
                        <li>$\frac{d}{dx}[e^x] = e^x, \ \frac{d}{dx}[\ln x] = 1/x$</li>
                        <li>$\frac{d}{dx}[\sin x] = \cos x, \ \frac{d}{dx}[\cos x] = -\sin x$</li>
                    </ul>
                </div>

                <!-- Concordance 2 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-stream" style="color: #3b82f6;"></i> Integral Calculus</h4>
                    <ul>
                        <li>$\int x^n dx = \frac{x^{n+1}}{n+1} + C \ (n \neq -1)$</li>
                        <li>$\int \frac{1}{x} dx = \ln|x| + C$</li>
                        <li>$\int e^x dx = e^x + C$</li>
                        <li>$\int \cos x dx = \sin x + C$</li>
                        <li>$\int u dv = uv - \int v du$ (LIATE)</li>
                        <li>FTC: $\int_a^b f(x)dx = F(b) - F(a)$</li>
                    </ul>
                </div>

                <!-- Concordance 3 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-tachometer-alt" style="color: #10b981;"></i> Extrema &amp; Limits</h4>
                    <ul>
                        <li>L'Hôpital: $\lim \frac{f}{g} = \lim \frac{f'}{g'}$</li>
                        <li>Critical points: $f'(c) = 0$ or undefined</li>
                        <li>$f''(c) &gt; 0$: Local Minimum ($\cup$)</li>
                        <li>$f''(c) &lt; 0$: Local Maximum ($\cap$)</li>
                        <li>Inflection Point: $f''(c) = 0$ sign change</li>
                    </ul>
                </div>

                <!-- Concordance 4 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-compass" style="color: #ec4899;"></i> Polar &amp; Vectors</h4>
                    <ul>
                        <li>$x = r\cos\theta, \ y = r\sin\theta$</li>
                        <li>$r = \sqrt{x^2+y^2}, \ \tan\theta = y/x$</li>
                        <li>Parametric Slope: $\frac{dy}{dx} = \frac{dy/dt}{dx/dt}$</li>
                        <li>Dot Product: $\mathbf{u} \cdot \mathbf{v} = |\mathbf{u}||\mathbf{v}|\cos\theta$</li>
                        <li>Orthogonal: $\mathbf{u} \cdot \mathbf{v} = 0$</li>
                    </ul>
                </div>

                <!-- Concordance 5 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-shapes" style="color: #8b5cf6;"></i> Conic Sections</h4>
                    <ul>
                        <li>Circle: $x^2 + y^2 = r^2$ ($e=0$)</li>
                        <li>Ellipse: $\frac{x^2}{a^2} + \frac{y^2}{b^2} = 1$ ($c^2 = a^2-b^2$)</li>
                        <li>Hyperbola: $\frac{x^2}{a^2} - \frac{y^2}{b^2} = 1$ ($c^2 = a^2+b^2$)</li>
                        <li>Parabola: $y^2 = 4px$ ($e=1$)</li>
                    </ul>
                </div>

                <!-- Concordance 6 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-infinity" style="color: #6366f1;"></i> Fundamental Constants</h4>
                    <ul>
                        <li>$\pi \approx 3.1415926535$</li>
                        <li>$e \approx 2.7182818284$</li>
                        <li>$\phi = \frac{1+\sqrt{5}}{2} \approx 1.6180339887$</li>
                        <li>Euler Identity: $e^{i\pi} + 1 = 0$</li>
                        <li>$i = \sqrt{-1} \implies i^2 = -1$</li>
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
                "HESTEN ACADEMIC REFERENCE ARCHIVE - CALCULUS & ADVANCED MATH (GRADE 12)\n" +
                "CALL NO: QA303.H47 2026 | DEWEY: 515.15 | VOLUME XII\n" +
                "========================================================================\n\n" +
                "1. LIMITS & CONTINUITY:\n" +
                "   Definition of Limit : lim(x->c) f(x) = L <=> Left limit = Right limit = L\n" +
                "   Continuity at c     : f(c) defined, limit exists, limit = f(c)\n" +
                "   L'Hopital's Rule    : lim [f(x) / g(x)] = lim [f'(x) / g'(x)] for [0/0] or [inf/inf]\n\n" +
                "2. DERIVATIVE CALCULUS LAWS:\n" +
                "   Definition    : f'(x) = lim(h->0) [f(x+h) - f(x)] / h\n" +
                "   Power Rule    : d/dx [x^n] = n * x^(n-1)\n" +
                "   Product Rule  : (u * v)' = u'v + uv'\n" +
                "   Quotient Rule : (u / v)' = (u'v - uv') / v^2\n" +
                "   Chain Rule    : d/dx [f(g(x))] = f'(g(x)) * g'(x)\n" +
                "   Transcendental: d/dx [e^x] = e^x | d/dx [ln x] = 1/x\n" +
                "   Trigonometric : d/dx [sin x] = cos x | d/dx [cos x] = -sin x | d/dx [tan x] = sec^2 x\n\n" +
                "3. EXTREMA, CONCAVITY & OPTIMIZATION:\n" +
                "   Critical Points       : f'(c) = 0 or f'(c) undefined\n" +
                "   Second Derivative Test: f''(c) > 0 => Local Min | f''(c) < 0 => Local Max\n" +
                "   Point of Inflection   : f''(c) = 0 with concavity sign change\n\n" +
                "4. INTEGRAL CALCULUS & FTC:\n" +
                "   FTC Part 1   : d/dx [Integral_a^x f(t)dt] = f(x)\n" +
                "   FTC Part 2   : Integral_a^b f(x)dx = F(b) - F(a) where F'(x) = f(x)\n" +
                "   Power Rule   : Integral x^n dx = [x^(n+1) / (n+1)] + C (n != -1)\n" +
                "   Integral 1/x : Integral (1/x) dx = ln|x| + C\n" +
                "   U-Sub        : Integral f(g(x))g'(x)dx = Integral f(u)du\n" +
                "   Parts (LIATE): Integral u dv = u*v - Integral v du\n\n" +
                "5. POLAR COORDINATES & VECTORS:\n" +
                "   Polar-Cartesian : x = r*cos(theta), y = r*sin(theta) | r^2 = x^2 + y^2\n" +
                "   Parametric Slope: dy/dx = (dy/dt) / (dx/dt)\n" +
                "   Vector Norm     : |v| = sqrt(v1^2 + v2^2 + v3^2)\n" +
                "   Dot Product     : u . v = u1*v1 + u2*v2 + u3*v3 = |u||v|cos(theta)\n" +
                "   Orthogonal Test : u . v = 0 <=> Perpendicular\n\n" +
                "6. UNIVERSAL MATHEMATICAL CONSTANTS:\n" +
                "   Pi (pi)             : 3.1415926535...\n" +
                "   Euler's Number (e)  : 2.7182818284...\n" +
                "   Golden Ratio (phi)  : (1 + sqrt(5)) / 2 = 1.6180339887...\n" +
                "   Euler's Identity    : e^(i * pi) + 1 = 0\n\n" +
                "========================================================================\n" +
                "Hesten's Learning Platform - Curated Reference Codex\n";

            var blob = new Blob([textContent], { type: 'text/plain;charset=utf-8' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'Calculus-Grade-12-Synoptic-Tables.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    </script>
</div>
