<div class="math-reference-content">
    <!-- Archival Cataloging Header -->
    <div class="math-book-callout-header">
        <span class="math-catalog-seal"><i class="fas fa-landmark"></i> HESTEN ACADEMIC REFERENCE ARCHIVE</span>
        <span class="math-catalog-callno">CALL NO: QA154.H47 2026 &bull; DEWEY: 512.9042 &bull; VOL. XI</span>
    </div>

    <!-- Chapter 11 Bookplate Frontispiece -->
    <header class="math-chapter-hero">
        <div class="math-hero-badge"><i class="fas fa-bookmark"></i> Volume XI &bull; Advanced Algebra &amp; Trigonometry Codex</div>
        <h1 class="math-hero-title">Eleventh Grade Mathematics Reference Codex (Algebra II &amp; Trigonometry)</h1>
        <div class="math-hero-subtitle">The Complete Scholastic Guide to Complex Numbers ($\mathbb{C}$), Polynomial Division, Logarithmic Laws, The Full Unit Circle, Analytic Trigonometry, Infinite Series &amp; Synoptic Concordance</div>
        <div class="math-book-divider"><span class="math-fleuron">&#10086;</span></div>
        <p class="math-hero-desc">An exhaustive collegiate-preparatory reference compendium designed for eleventh-grade scholars, advanced mathematics educators, and STEM practitioners. Codifying field operations over the complex numbers, polynomial ring factorization, transcendental logarithmic functions, circular periodic metrics, convergent geometric series, and computational algebra heuristics.</p>
    </header>

    <!-- Quick Navigation Pills -->
    <nav class="math-toc-pills" aria-label="Chapter sections">
        <a href="#sec-11-1" class="math-pill"><i class="fas fa-i-cursor"></i> &sect; 11.1 Complex Numbers ($\mathbb{C}$)</a>
        <a href="#sec-11-2" class="math-pill"><i class="fas fa-divide"></i> &sect; 11.2 Polynomial Theorems</a>
        <a href="#sec-11-3" class="math-pill"><i class="fas fa-chart-line"></i> &sect; 11.3 Rational Asymptotes</a>
        <a href="#sec-11-4" class="math-pill"><i class="fas fa-calculator"></i> &sect; 11.4 Logarithm Laws</a>
        <a href="#sec-11-5" class="math-pill"><i class="fas fa-compass"></i> &sect; 11.5 The Unit Circle</a>
        <a href="#sec-11-6" class="math-pill"><i class="fas fa-wave-square"></i> &sect; 11.6 Trig Identities</a>
        <a href="#sec-11-7" class="math-pill"><i class="fas fa-bezier-curve"></i> &sect; 11.7 Periodic Graphs</a>
        <a href="#sec-11-8" class="math-pill"><i class="fas fa-infinity"></i> &sect; 11.8 Series ($\Sigma$)</a>
        <a href="#sec-11-9" class="math-pill"><i class="fas fa-chart-pie"></i> &sect; 11.9 Binomial &amp; Normal</a>
        <a href="#sec-11-10" class="math-pill"><i class="fas fa-brain"></i> &sect; 11.10 Speed Hacks</a>
        <a href="#sec-11-11" class="math-pill"><i class="fas fa-scroll"></i> &sect; 11.11 Synoptic Tables</a>
    </nav>

    <!-- ==========================================================================
         Section 11.1: Complex Numbers & i
         ========================================================================== -->
    <section id="sec-11-1" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.1</span>
            <h2 class="math-section-title">The Field of Complex Numbers ($\mathbb{C}$)</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-scroll"></i> DEFINITION 11.1.1</span>
                <span class="math-def-domain">Topic: The Imaginary Unit &amp; Argand Plane</span>
            </div>
            <div class="math-def-body">
                The imaginary unit $i$ satisfies $i = \sqrt{-1} \implies i^2 = -1$.
                $$\text{Complex Number: } z = a + bi \quad (a, b \in \mathbb{R}, \ a = \text{Re}(z), \ b = \text{Im}(z))$$
                $$\text{Complex Conjugate: } \bar{z} = a - bi \implies z \cdot \bar{z} = a^2 + b^2 \in \mathbb{R}^+$$
                $$\text{Modulus (Magnitude): } |z| = \sqrt{a^2 + b^2}$$
            </div>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">CYCLIC ARITHMETIC</div>
                <div class="math-formula-title">Powers of $i$ Modulo 4</div>
                <div class="math-formula-latex">$$i^1 = i, \quad i^2 = -1, \quad i^3 = -i, \quad i^4 = 1$$</div>
                <div class="math-formula-desc">Divide power $k$ by $4$: remainder determines power ($i^{27} \implies 27 \equiv 3 \pmod 4 \implies -i$).</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">FRACTION REALIZATION</div>
                <div class="math-formula-title">Complex Division via Conjugate</div>
                <div class="math-formula-latex">$$\frac{z_1}{z_2} = \frac{a + bi}{c + di} \times \frac{c - di}{c - di} = \frac{(ac + bd) + (bc - ad)i}{c^2 + d^2}$$</div>
                <div class="math-formula-desc">Multiply numerator and denominator by denominator's conjugate to clear $i$ from denominator.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 11.2: Polynomial Theorems & Synthetic Division
         ========================================================================== -->
    <section id="sec-11-2" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.2</span>
            <h2 class="math-section-title">Polynomial Theorems &amp; Synthetic Division</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-award"></i> THEOREM 11.2.1</span>
                <span class="math-def-domain">Topic: The Remainder &amp; Rational Root Theorems</span>
            </div>
            <div class="math-def-body">
                <ul>
                    <li><strong>Polynomial Remainder Theorem:</strong> Dividing $P(x)$ by $(x - c)$ yields remainder $R = P(c)$.</li>
                    <li><strong>Factor Theorem:</strong> Binomial $(x - c)$ is a factor of $P(x) \iff P(c) = 0$.</li>
                    <li><strong>Rational Root Theorem:</strong> Any rational root of $a_n x^n + \dots + a_0 = 0$ must have form $\pm \frac{p}{q}$, where $p \mid a_0$ and $q \mid a_n$.</li>
                    <li><strong>Fundamental Theorem of Algebra:</strong> Every degree-$n$ polynomial has exactly $n$ roots in $\mathbb{C}$ (counting multiplicity).</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 11.3: Rational Functions & Asymptotes
         ========================================================================== -->
    <section id="sec-11-3" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.3</span>
            <h2 class="math-section-title">Rational Functions &amp; Asymptotes</h2>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Asymptote Type</th>
                        <th>Condition on $f(x) = \frac{P(x)}{Q(x)}$</th>
                        <th>Behavior &amp; Equation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Vertical Asymptote (VA)</strong></td><td>$Q(c) = 0$ and $P(c) \neq 0$</td><td>Line $x = c$ (Infinite discontinuity)</td></tr>
                    <tr><td><strong>Removable Hole</strong></td><td>$P(c) = 0$ and $Q(c) = 0$ (Common factor cancels)</td><td>Point hole at $(c, \lim_{x\to c} f(x))$</td></tr>
                    <tr><td><strong>Horizontal (Degree Top &lt; Bottom)</strong></td><td>$\text{deg}(P) &lt; \text{deg}(Q)$</td><td>Line $y = 0$ ($x$-axis)</td></tr>
                    <tr><td><strong>Horizontal (Equal Degrees)</strong></td><td>$\text{deg}(P) = \text{deg}(Q)$</td><td>Line $y = \frac{a_{\text{lead}}}{b_{\text{lead}}}$</td></tr>
                    <tr><td><strong>Slant / Oblique Asymptote</strong></td><td>$\text{deg}(P) = \text{deg}(Q) + 1$</td><td>Line $y = mx + b$ obtained via polynomial division quotient</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- ==========================================================================
         Section 11.4: Logarithm Laws & Natural Log
         ========================================================================== -->
    <section id="sec-11-4" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.4</span>
            <h2 class="math-section-title">Logarithm Laws &amp; Natural Logarithms ($\ln x$)</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">PRODUCT LAW</div>
                <div class="math-formula-title">Product to Sum</div>
                <div class="math-formula-latex">$$\log_b(xy) = \log_b x + \log_b y$$</div>
                <div class="math-formula-desc">Multiplication inside turns into addition outside.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">QUOTIENT LAW</div>
                <div class="math-formula-title">Quotient to Difference</div>
                <div class="math-formula-latex">$$\log_b\left(\frac{x}{y}\right) = \log_b x - \log_b y$$</div>
                <div class="math-formula-desc">Division inside turns into subtraction outside.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">POWER LAW</div>
                <div class="math-formula-title">Exponent Jumping</div>
                <div class="math-formula-latex">$$\log_b(x^k) = k \cdot \log_b x$$</div>
                <div class="math-formula-desc">Brings down variables stuck in exponents!</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">CHANGE OF BASE</div>
                <div class="math-formula-title">Base Conversion</div>
                <div class="math-formula-latex">$$\log_b x = \frac{\ln x}{\ln b} = \frac{\log_{10} x}{\log_{10} b}$$</div>
                <div class="math-formula-desc">Computes logs of arbitrary bases on standard calculators.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 11.5: The Complete Unit Circle
         ========================================================================== -->
    <section id="sec-11-5" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.5</span>
            <h2 class="math-section-title">The Complete Unit Circle ($x = \cos\theta, \ y = \sin\theta$)</h2>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Degrees</th>
                        <th>Radians</th>
                        <th>Coordinate $(x, y) = (\cos\theta, \sin\theta)$</th>
                        <th>$\tan\theta = y/x$</th>
                        <th>Quadrant</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>$0^\circ$</td><td>$0$</td><td>$(1, 0)$</td><td>$0$</td><td>Axis</td></tr>
                    <tr><td>$30^\circ$</td><td>$\frac{\pi}{6}$</td><td>$\left(\frac{\sqrt{3}}{2}, \frac{1}{2}\right)$</td><td>$\frac{\sqrt{3}}{3}$</td><td>QI</td></tr>
                    <tr><td>$45^\circ$</td><td>$\frac{\pi}{4}$</td><td>$\left(\frac{\sqrt{2}}{2}, \frac{\sqrt{2}}{2}\right)$</td><td>$1$</td><td>QI</td></tr>
                    <tr><td>$60^\circ$</td><td>$\frac{\pi}{3}$</td><td>$\left(\frac{1}{2}, \frac{\sqrt{3}}{2}\right)$</td><td>$\sqrt{3}$</td><td>QI</td></tr>
                    <tr><td>$90^\circ$</td><td>$\frac{\pi}{2}$</td><td>$(0, 1)$</td><td>$\text{Undefined}$</td><td>Axis</td></tr>
                    <tr><td>$120^\circ$</td><td>$\frac{2\pi}{3}$</td><td>$\left(-\frac{1}{2}, \frac{\sqrt{3}}{2}\right)$</td><td>$-\sqrt{3}$</td><td>QII</td></tr>
                    <tr><td>$135^\circ$</td><td>$\frac{3\pi}{4}$</td><td>$\left(-\frac{\sqrt{2}}{2}, \frac{\sqrt{2}}{2}\right)$</td><td>$-1$</td><td>QII</td></tr>
                    <tr><td>$150^\circ$</td><td>$\frac{5\pi}{6}$</td><td>$\left(-\frac{\sqrt{3}}{2}, \frac{1}{2}\right)$</td><td>$-\frac{\sqrt{3}}{3}$</td><td>QII</td></tr>
                    <tr><td>$180^\circ$</td><td>$\pi$</td><td>$(-1, 0)$</td><td>$0$</td><td>Axis</td></tr>
                    <tr><td>$210^\circ$</td><td>$\frac{7\pi}{6}$</td><td>$\left(-\frac{\sqrt{3}}{2}, -\frac{1}{2}\right)$</td><td>$\frac{\sqrt{3}}{3}$</td><td>QIII</td></tr>
                    <tr><td>$225^\circ$</td><td>$\frac{5\pi}{4}$</td><td>$\left(-\frac{\sqrt{2}}{2}, -\frac{\sqrt{2}}{2}\right)$</td><td>$1$</td><td>QIII</td></tr>
                    <tr><td>$240^\circ$</td><td>$\frac{4\pi}{3}$</td><td>$\left(-\frac{1}{2}, -\frac{\sqrt{3}}{2}\right)$</td><td>$\sqrt{3}$</td><td>QIII</td></tr>
                    <tr><td>$270^\circ$</td><td>$\frac{3\pi}{2}$</td><td>$(0, -1)$</td><td>$\text{Undefined}$</td><td>Axis</td></tr>
                    <tr><td>$300^\circ$</td><td>$\frac{5\pi}{3}$</td><td>$\left(\frac{1}{2}, -\frac{\sqrt{3}}{2}\right)$</td><td>$-\sqrt{3}$</td><td>QIV</td></tr>
                    <tr><td>$315^\circ$</td><td>$\frac{7\pi}{4}$</td><td>$\left(\frac{\sqrt{2}}{2}, -\frac{\sqrt{2}}{2}\right)$</td><td>$-1$</td><td>QIV</td></tr>
                    <tr><td>$330^\circ$</td><td>$\frac{11\pi}{6}$</td><td>$\left(\frac{\sqrt{3}}{2}, -\frac{1}{2}\right)$</td><td>$-\frac{\sqrt{3}}{3}$</td><td>QIV</td></tr>
                    <tr><td>$360^\circ$</td><td>$2\pi$</td><td>$(1, 0)$</td><td>$0$</td><td>Axis</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- ==========================================================================
         Section 11.6: Advanced Trigonometric Identities
         ========================================================================== -->
    <section id="sec-11-6" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.6</span>
            <h2 class="math-section-title">Advanced Trigonometric Identities</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">PYTHAGOREAN TRIAD</div>
                <div class="math-formula-title">Pythagorean Identities</div>
                <div class="math-formula-latex">$$\begin{aligned} \sin^2\theta + \cos^2\theta &= 1 \\ 1 + \tan^2\theta &= \sec^2\theta \\ 1 + \cot^2\theta &= \csc^2\theta \end{aligned}$$</div>
                <div class="math-formula-desc">Fundamental relations derived from unit circle circle equation $x^2 + y^2 = 1$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">DOUBLE ANGLE</div>
                <div class="math-formula-title">Double-Angle Formulas</div>
                <div class="math-formula-latex">$$\begin{aligned} \sin(2\theta) &= 2\sin\theta\cos\theta \\ \cos(2\theta) &= \cos^2\theta - \sin^2\theta \\ &= 2\cos^2\theta - 1 = 1 - 2\sin^2\theta \end{aligned}$$</div>
                <div class="math-formula-desc">Expands multiple-angle arguments into single-angle factors.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 11.7: Periodic Trigonometric Graphing
         ========================================================================== -->
    <section id="sec-11-7" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.7</span>
            <h2 class="math-section-title">Periodic Function Graphing: Sinusoidal Waves</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">SINUSOIDAL MODEL</div>
                <div class="math-formula-title">General Wave Equation</div>
                <div class="math-formula-latex">$$y = A \sin(Bx - C) + D$$</div>
                <div class="math-formula-desc">
                    <strong>Amplitude:</strong> $|A|$ &bull; 
                    <strong>Period ($T$):</strong> $\frac{2\pi}{B}$ &bull; 
                    <strong>Phase Shift:</strong> $\frac{C}{B}$ &bull; 
                    <strong>Midline:</strong> $y = D$.
                </div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 11.8: Sequences & Infinite Series (Sigma)
         ========================================================================== -->
    <section id="sec-11-8" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.8</span>
            <h2 class="math-section-title">Sequences &amp; Infinite Geometric Series ($\Sigma$)</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">ARITHMETIC SUM</div>
                <div class="math-formula-title">Finite Arithmetic Series</div>
                <div class="math-formula-latex">$$S_n = \frac{n(a_1 + a_n)}{2} = \frac{n}{2}[2a_1 + (n-1)d]$$</div>
                <div class="math-formula-desc">Sum of first $n$ terms with common difference $d$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">FINITE GEOMETRIC</div>
                <div class="math-formula-title">Finite Geometric Series</div>
                <div class="math-formula-latex">$$S_n = \frac{a_1(1 - r^n)}{1 - r} \quad (r \neq 1)$$</div>
                <div class="math-formula-desc">Sum of first $n$ terms with common ratio $r$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">INFINITE CONVERGENCE</div>
                <div class="math-formula-title">Infinite Geometric Series Sum</div>
                <div class="math-formula-latex">$$S_\infty = \sum_{k=1}^\infty a_1 r^{k-1} = \frac{a_1}{1 - r} \iff |r| < 1$$</div>
                <div class="math-formula-desc">If $|r| \ge 1$, the infinite series diverges strictly to $\pm\infty$.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 11.9: Binomial Theorem & Normal Distribution
         ========================================================================== -->
    <section id="sec-11-9" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.9</span>
            <h2 class="math-section-title">Combinatorics, Binomial Expansion &amp; Normal Distribution</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">COMBINATORICS</div>
                <div class="math-formula-title">Combinations ($nCr$)</div>
                <div class="math-formula-latex">$$\binom{n}{r} = \frac{n!}{r!(n - r)!}$$</div>
                <div class="math-formula-desc">Pascal's Triangle coefficients for binomial expansion.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">BINOMIAL THEOREM</div>
                <div class="math-formula-title">Binomial Expansion Formula</div>
                <div class="math-formula-latex">$$(a + b)^n = \sum_{k=0}^n \binom{n}{k} a^{n-k} b^k$$</div>
                <div class="math-formula-desc">Expands $(a+b)^n$ into $n+1$ distinct terms.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">NORMAL EMPIRICAL RULE</div>
                <div class="math-formula-title">68-95-99.7 Rule &amp; $z$-Scores</div>
                <div class="math-formula-latex">$$z = \frac{x - \mu}{\sigma}$$</div>
                <div class="math-formula-desc">$68.2\%$ within $1\sigma$, $95.4\%$ within $2\sigma$, $99.7\%$ within $3\sigma$.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 11.10: Computational Mental Math Speed Hacks
         ========================================================================== -->
    <section id="sec-11-10" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.10</span>
            <h2 class="math-section-title">Scholia &amp; Computational Mental Math Speed Hacks</h2>
        </div>

        <div class="math-constant-grid">
            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-sun" style="color: #b45309;"></i> HACK I</div>
                <div class="math-const-name">"All Students Take Calculus" (ASTC)</div>
                <div class="math-const-val">$$\mathbf{A} \text{ (All +)} \quad \vert \quad \mathbf{S} \text{ (Sin +)} \quad \vert \quad \mathbf{T} \text{ (Tan +)} \quad \vert \quad \mathbf{C} \text{ (Cos +)}$$</div>
                <div class="math-const-desc">QI: All positive &bull; QII: Sine only &bull; QIII: Tangent only &bull; QIV: Cosine only. Instant sign check!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-bolt" style="color: #1e3a8a;"></i> HACK II</div>
                <div class="math-const-name">Synthetic Division 10-Second Speed Run</div>
                <div class="math-const-val">$$\text{Divisor } (x - c) \implies \text{Run synthetic with root } c$$</div>
                <div class="math-const-desc">Never use bulky long division for linear divisors $(x-c)$. Synthetic division yields $P(c)$ in 3 rapid rows.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-frog" style="color: #065f46;"></i> HACK III</div>
                <div class="math-const-name">Log Power Dropping Shortcut</div>
                <div class="math-const-val">$$b^x = C \implies x = \frac{\ln C}{\ln b}$$</div>
                <div class="math-const-desc">Take natural log of both sides to instantly pop unknown powers down to the base line.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-infinity" style="color: #9d174d;"></i> HACK IV</div>
                <div class="math-const-name">Infinite Series Convergence Sanity Test</div>
                <div class="math-const-val">$$\text{If } |r| \ge 1 \implies \text{Diverges immediately! Do not apply } \frac{a_1}{1-r}$$</div>
                <div class="math-const-desc">Formula $\frac{a_1}{1-r}$ is valid ONLY when $|r| < 1$. Check ratio first!</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 11.11: The Grand Synoptic Tables & Student Cheat Sheet
         ========================================================================== -->
    <section id="sec-11-11" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 11.11</span>
            <h2 class="math-section-title">The Grand Synoptic Tables &amp; Complete Grade 11 / Algebra II Student Cheat Sheet</h2>
        </div>

        <div class="math-summary-sheet">
            <div class="math-summary-header">
                <div>
                    <h3><i class="fas fa-scroll"></i> Grade 11 / Algebra II Master Reference Concordance</h3>
                    <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: var(--reader-muted);">Authorized curriculum reference concordance &bull; Algebra II &amp; Trigonometry Complete</p>
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
                    <h4><i class="fas fa-i-cursor" style="color: #f59e0b;"></i> Complex Numbers</h4>
                    <ul>
                        <li>$i = \sqrt{-1}, \ i^2 = -1, \ i^3 = -i, \ i^4 = 1$</li>
                        <li>$z = a + bi \quad \vert \quad \bar{z} = a - bi$</li>
                        <li>$|z| = \sqrt{a^2 + b^2}$</li>
                        <li>$z \cdot \bar{z} = a^2 + b^2$</li>
                        <li>Divide: Multiply by $\frac{\bar{z}}{\bar{z}}$</li>
                    </ul>
                </div>

                <!-- Concordance 2 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-calculator" style="color: #3b82f6;"></i> Logarithm Laws</h4>
                    <ul>
                        <li>$\log_b(xy) = \log_b x + \log_b y$</li>
                        <li>$\log_b(x/y) = \log_b x - \log_b y$</li>
                        <li>$\log_b(x^k) = k\log_b x$</li>
                        <li>Change of base: $\frac{\ln x}{\ln b}$</li>
                        <li>$\ln(e) = 1, \ \ln(1) = 0, \ e^{\ln x} = x$</li>
                    </ul>
                </div>

                <!-- Concordance 3 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-compass" style="color: #10b981;"></i> Unit Circle &amp; ASTC</h4>
                    <ul>
                        <li>$(x, y) = (\cos\theta, \sin\theta)$ on $r=1$</li>
                        <li>ASTC: Q1 All, Q2 Sin, Q3 Tan, Q4 Cos</li>
                        <li>$\pi \text{ rad} = 180^\circ$</li>
                        <li>$30^\circ = \frac{\pi}{6}, 45^\circ = \frac{\pi}{4}, 60^\circ = \frac{\pi}{3}$</li>
                        <li>$\tan\theta = \frac{\sin\theta}{\cos\theta}$</li>
                    </ul>
                </div>

                <!-- Concordance 4 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-wave-square" style="color: #ec4899;"></i> Trig Identities</h4>
                    <ul>
                        <li>$\sin^2\theta + \cos^2\theta = 1$</li>
                        <li>$1 + \tan^2\theta = \sec^2\theta$</li>
                        <li>$\sin(2\theta) = 2\sin\theta\cos\theta$</li>
                        <li>$\cos(2\theta) = \cos^2\theta - \sin^2\theta$</li>
                        <li>Period $T = \frac{2\pi}{B}$</li>
                    </ul>
                </div>

                <!-- Concordance 5 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-infinity" style="color: #8b5cf6;"></i> Sequences &amp; Series</h4>
                    <ul>
                        <li>Arithmetic: $S_n = \frac{n(a_1+a_n)}{2}$</li>
                        <li>Geometric: $S_n = \frac{a_1(1-r^n)}{1-r}$</li>
                        <li>Infinite Sum: $S_\infty = \frac{a_1}{1-r} \ (|r| &lt; 1)$</li>
                        <li>Remainder Thm: $P(c) = R$</li>
                        <li>Factor Thm: $P(c) = 0 \iff (x-c) \text{ factor}$</li>
                    </ul>
                </div>

                <!-- Concordance 6 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-chart-pie" style="color: #6366f1;"></i> Combinatorics &amp; Stats</h4>
                    <ul>
                        <li>Combinations: $\binom{n}{r} = \frac{n!}{r!(n-r)!}$</li>
                        <li>$(a+b)^n = \sum \binom{n}{k}a^{n-k}b^k$</li>
                        <li>$z$-score: $z = \frac{x - \mu}{\sigma}$</li>
                        <li>Empirical: $68\% - 95\% - 99.7\%$</li>
                        <li>Asymptote: $\text{deg}(P) = \text{deg}(Q) \implies y = \frac{a_n}{b_n}$</li>
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
                "HESTEN ACADEMIC REFERENCE ARCHIVE - ALGEBRA II & TRIGONOMETRY (GRADE 11) CONCORDANCE\n" +
                "CALL NO: QA154.H47 2026 | DEWEY: 512.9042 | VOLUME XI\n" +
                "========================================================================\n\n" +
                "1. COMPLEX NUMBER FIELD (C):\n" +
                "   i = sqrt(-1) | i^2 = -1 | i^3 = -i | i^4 = 1 (Period 4)\n" +
                "   Complex Number    : z = a + bi\n" +
                "   Complex Conjugate : z_bar = a - bi => z * z_bar = a^2 + b^2 (Real)\n" +
                "   Modulus (Magnitude): |z| = sqrt(a^2 + b^2)\n\n" +
                "2. POLYNOMIAL THEOREMS & ASYMPTOTES:\n" +
                "   Remainder Theorem      : Dividing P(x) by (x - c) yields R = P(c)\n" +
                "   Factor Theorem         : (x - c) is a factor <=> P(c) = 0\n" +
                "   Rational Root Theorem  : Possible roots are +/- factors of a_0 / factors of a_n\n" +
                "   Horizontal Asymptotes  : Top < Bottom => y = 0 | Equal Deg => y = a_n / b_n\n" +
                "   Slant Asymptote        : Top = Bottom + 1 => Polynomial division quotient\n\n" +
                "3. LOGARITHM & EXPONENTIAL LAWS:\n" +
                "   Definition    : log_b(x) = y <=> b^y = x (b > 0, b != 1, x > 0)\n" +
                "   Product Law   : log_b(xy) = log_b(x) + log_b(y)\n" +
                "   Quotient Law  : log_b(x/y) = log_b(x) - log_b(y)\n" +
                "   Power Law     : log_b(x^k) = k * log_b(x)\n" +
                "   Change of Base: log_b(x) = ln(x) / ln(b) = log10(x) / log10(b)\n\n" +
                "4. THE UNIT CIRCLE & ASTC:\n" +
                "   Unit Circle Equation: x^2 + y^2 = 1 => (x, y) = (cos theta, sin theta)\n" +
                "   ASTC Quadrant Rule  : Q1 (All +) | Q2 (Sin +) | Q3 (Tan +) | Q4 (Cos +)\n" +
                "   Key Coordinates     : 0 rad -> (1, 0)\n" +
                "                         pi/6  -> (sqrt(3)/2, 1/2)\n" +
                "                         pi/4  -> (sqrt(2)/2, sqrt(2)/2)\n" +
                "                         pi/3  -> (1/2, sqrt(3)/2)\n" +
                "                         pi/2  -> (0, 1)\n\n" +
                "5. TRIGONOMETRIC IDENTITIES:\n" +
                "   Pythagorean ID: sin^2(theta) + cos^2(theta) = 1 | 1 + tan^2 = sec^2 | 1 + cot^2 = csc^2\n" +
                "   Double-Angle  : sin(2 theta) = 2*sin(theta)*cos(theta)\n" +
                "                   cos(2 theta) = cos^2 - sin^2 = 2*cos^2 - 1 = 1 - 2*sin^2\n" +
                "   Periodic Wave : y = A * sin(Bx - C) + D => Period = 2*pi / B\n\n" +
                "6. SEQUENCES, SERIES & STATS:\n" +
                "   Arithmetic Sum      : S_n = n(a_1 + a_n) / 2\n" +
                "   Finite Geometric    : S_n = a_1(1 - r^n) / (1 - r)\n" +
                "   Infinite Geometric  : S_infinity = a_1 / (1 - r) (Valid ONLY when |r| < 1)\n" +
                "   Binomial Theorem    : (a + b)^n = Sum [n! / (k!(n-k)!)] * a^(n-k) * b^k\n" +
                "   Normal Distribution : z = (x - mu) / sigma (68% - 95% - 99.7% Empirical Rule)\n\n" +
                "========================================================================\n" +
                "Hesten's Learning Platform - Curated Reference Codex\n";

            var blob = new Blob([textContent], { type: 'text/plain;charset=utf-8' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'Algebra-2-Grade-11-Synoptic-Tables.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    </script>
</div>
