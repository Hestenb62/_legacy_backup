<div class="math-reference-content">
    <!-- Chapter 11 Banner -->
    <div class="math-chapter-hero">
        <div class="math-hero-badge"><i class="fas fa-infinity"></i> Level: Grade 11 (Algebra 2 &amp; Pre-Calculus)</div>
        <h1 class="math-hero-title">Grade 11: Complex Numbers, Logarithms, Unit Circle &amp; Series</h1>
        <p class="math-hero-desc">The master Grade 11 Algebra 2 and Pre-Calculus compendium covering the complex field ($\mathbb{C}$), polynomial division &amp; synthetic division, rational functions &amp; asymptotes, logarithm &amp; exponential laws, the complete Unit Circle, trigonometric identities, infinite geometric series ($S_\infty = \frac{a_1}{1-r}$), and synthetic speed calculation hacks.</p>
    </div>

    <!-- Quick Navigation Pills -->
    <nav class="math-toc-pills" aria-label="Chapter sections">
        <a href="#sec-11-1" class="math-pill"><i class="fas fa-i-cursor"></i> 11.1 Complex Numbers &amp; $i$</a>
        <a href="#sec-11-2" class="math-pill"><i class="fas fa-divide"></i> 11.2 Synthetic Division &amp; Remainder Theorem</a>
        <a href="#sec-11-3" class="math-pill"><i class="fas fa-chart-line"></i> 11.3 Logarithm Laws &amp; Natural Log ($\ln$)</a>
        <a href="#sec-11-4" class="math-pill"><i class="fas fa-compass"></i> 11.4 The Complete Unit Circle</a>
        <a href="#sec-11-5" class="math-pill"><i class="fas fa-wave-square"></i> 11.5 Trigonometric Identities &amp; Formulas</a>
        <a href="#sec-11-6" class="math-pill"><i class="fas fa-list-ol"></i> 11.6 Arithmetic &amp; Geometric Series ($\Sigma$)</a>
        <a href="#sec-11-7" class="math-pill"><i class="fas fa-brain"></i> 11.7 Mental Math &amp; Study Hacks</a>
        <a href="#sec-11-8" class="math-pill"><i class="fas fa-file-invoice"></i> 11.8 Grade 11 Cheat Sheet</a>
    </nav>

    <!-- Section 11.1 -->
    <section id="sec-11-1" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">11.1</span>
            <h2 class="math-section-title">The Field of Complex Numbers ($\mathbb{C}$)</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-book"></i> Definition 11.1.1</span>
                <span class="math-def-domain">Complex Numbers</span>
            </div>
            <div class="math-def-body">
                The imaginary unit $i$ is defined as $i = \sqrt{-1}$ such that $i^2 = -1$.
                $$\text{Complex Number: } z = a + bi \quad (a, b \in \mathbb{R}, \ a = \text{Real Part}, \ b = \text{Imaginary Part})$$
                $$\text{Complex Conjugate: } \bar{z} = a - bi \implies z \cdot \bar{z} = a^2 + b^2 \in \mathbb{R}$$
            </div>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Powers of $i$ Cycle (Period 4)</div>
                <div class="math-formula-latex">$$i^1 = i, \quad i^2 = -1, \quad i^3 = -i, \quad i^4 = 1$$</div>
                <div class="math-formula-desc">Divide exponent by 4: remainder $0 \to 1, \ 1 \to i, \ 2 \to -1, \ 3 \to -i$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Modulus / Absolute Value ($|z|$)</div>
                <div class="math-formula-latex">$$|z| = |a + bi| = \sqrt{a^2 + b^2}$$</div>
                <div class="math-formula-desc">Distance from the origin in the Argand complex plane.</div>
            </div>
        </div>
    </section>

    <!-- Section 11.2 -->
    <section id="sec-11-2" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">11.2</span>
            <h2 class="math-section-title">Synthetic Division &amp; The Remainder / Factor Theorems</h2>
        </div>

        <div class="math-theorem-box">
            <div class="math-thm-header">
                <span class="math-thm-badge"><i class="fas fa-award"></i> Theorem 11.2</span>
                <span class="math-thm-title">The Polynomial Remainder &amp; Factor Theorems</span>
            </div>
            <div class="math-thm-body">
                <ul>
                    <li><strong>Polynomial Remainder Theorem:</strong> When a polynomial $P(x)$ is divided by $(x - c)$, the remainder is $R = P(c)$.</li>
                    <li><strong>Factor Theorem:</strong> A linear binomial $(x - c)$ is a factor of $P(x) \iff P(c) = 0$.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Section 11.3 -->
    <section id="sec-11-3" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">11.3</span>
            <h2 class="math-section-title">Logarithm Laws &amp; Natural Logarithms ($\ln x$)</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Definition of Logarithm</div>
                <div class="math-formula-latex">$$\log_b(x) = y \iff b^y = x \quad (b > 0, b \neq 1, x > 0)$$</div>
                <div class="math-formula-desc">Inverse function of base-$b$ exponentiation.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Product Law</div>
                <div class="math-formula-latex">$$\log_b(xy) = \log_b x + \log_b y$$</div>
                <div class="math-formula-desc">Multiplication inside becomes addition outside.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Quotient Law</div>
                <div class="math-formula-latex">$$\log_b\left(\frac{x}{y}\right) = \log_b x - \log_b y$$</div>
                <div class="math-formula-desc">Division inside becomes subtraction outside.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Power / Exponent Law</div>
                <div class="math-formula-latex">$$\log_b(x^k) = k \cdot \log_b x$$</div>
                <div class="math-formula-desc">Powers jump to the front as multipliers!</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Change of Base Formula</div>
                <div class="math-formula-latex">$$\log_b x = \frac{\ln x}{\ln b} = \frac{\log_{10} x}{\log_{10} b}$$</div>
                <div class="math-formula-desc">Evaluate any base on standard calculators.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Natural Logarithm ($\ln x$)</div>
                <div class="math-formula-latex">$$\ln x = \log_e x \quad (e \approx 2.718281828)$$</div>
                <div class="math-formula-desc">$\ln(e) = 1, \quad \ln(1) = 0, \quad e^{\ln x} = x$.</div>
            </div>
        </div>
    </section>

    <!-- Section 11.4 -->
    <section id="sec-11-4" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">11.4</span>
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
                    <tr><td>$270^\circ$</td><td>$\frac{3\pi}{2}$</td><td>$(0, -1)$</td><td>$\text{Undefined}$</td><td>Axis</td></tr>
                    <tr><td>$360^\circ$</td><td>$2\pi$</td><td>$(1, 0)$</td><td>$0$</td><td>Full Circle</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Section 11.5 -->
    <section id="sec-11-5" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">11.5</span>
            <h2 class="math-section-title">Advanced Trigonometric Identities</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Pythagorean Identities</div>
                <div class="math-formula-latex">$$\sin^2\theta + \cos^2\theta = 1 \quad | \quad 1 + \tan^2\theta = \sec^2\theta \quad | \quad 1 + \cot^2\theta = \csc^2\theta$$</div>
                <div class="math-formula-desc">The core foundation of all trigonometry.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Double-Angle Identities</div>
                <div class="math-formula-latex">$$\sin(2\theta) = 2\sin\theta\cos\theta \quad | \quad \cos(2\theta) = \cos^2\theta - \sin^2\theta$$</div>
                <div class="math-formula-desc">Also: $\cos(2\theta) = 2\cos^2\theta - 1 = 1 - 2\sin^2\theta$.</div>
            </div>
        </div>
    </section>

    <!-- Section 11.6 -->
    <section id="sec-11-6" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">11.6</span>
            <h2 class="math-section-title">Sequences &amp; Infinite Series ($\Sigma$)</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Arithmetic Sequence &amp; Sum</div>
                <div class="math-formula-latex">$$a_n = a_1 + (n - 1)d \quad | \quad S_n = \frac{n(a_1 + a_n)}{2}$$</div>
                <div class="math-formula-desc">$d = \text{common difference}$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Geometric Sequence &amp; Finite Sum</div>
                <div class="math-formula-latex">$$a_n = a_1 \cdot r^{n-1} \quad | \quad S_n = \frac{a_1(1 - r^n)}{1 - r} \quad (r \neq 1)$$</div>
                <div class="math-formula-desc">$r = \text{common ratio}$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Infinite Geometric Series Sum</div>
                <div class="math-formula-latex">$$S_\infty = \frac{a_1}{1 - r} \quad \text{converges} \iff |r| < 1$$</div>
                <div class="math-formula-desc">If $|r| \geq 1$, the infinite series diverges to $\pm\infty$.</div>
            </div>
        </div>
    </section>

    <!-- Section 11.7: Math Hacks & Study Hacks -->
    <section id="sec-11-7" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">11.7</span>
            <h2 class="math-section-title">Grade 11 Mental Math &amp; Pre-Calculus Hacks</h2>
        </div>

        <div class="math-constant-grid">
            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-bolt" style="color: #f59e0b;"></i> Hack #1</div>
                <div class="math-const-name">Synthetic Division 10-Second Speed Run</div>
                <div class="math-const-val">$$\text{Root } c \ \ \begin{array}{|cccc} a_n & a_{n-1} & \dots & a_0 \\ \downarrow & + & + & + \\ \hline \end{array}$$</div>
                <div class="math-const-desc">Never use bulky polynomial long division for linear divisors $(x - c)$. Synthetic division evaluates $P(c)$ and quotients in 3 lines!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-sun" style="color: #6366f1;"></i> Hack #2</div>
                <div class="math-const-name">"All Students Take Calculus" (ASTC) Quadrant Signs</div>
                <div class="math-const-val">$$\mathbf{A} \text{ (All +)} \quad | \quad \mathbf{S} \text{ (Sin +)} \quad | \quad \mathbf{T} \text{ (Tan +)} \quad | \quad \mathbf{C} \text{ (Cos +)}$$</div>
                <div class="math-const-desc">QI: All positive. QII: Sine positive. QIII: Tangent positive. QIV: Cosine positive. Instant sign checking on Unit Circle exams.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-frog" style="color: #10b981;"></i> Hack #3</div>
                <div class="math-const-name">Logarithm Power Jumping Hack</div>
                <div class="math-const-val">$$\ln(x^7) = 7\ln(x) \quad | \quad e^{\ln(42)} = 42$$</div>
                <div class="math-const-desc">Whenever an unknown variable is stuck in an exponent, take the $\ln$ of both sides to drop the exponent down to ground level!</div>
            </div>
        </div>
    </section>

    <!-- Section 11.8: Summary Cheat Sheet -->
    <section id="sec-11-8" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">11.8</span>
            <h2 class="math-section-title">Grade 11 Comprehensive Summary Cheat Sheet</h2>
        </div>

        <div class="math-summary-sheet">
            <div class="math-summary-col">
                <h4>Complex &amp; Logarithms</h4>
                <ul>
                    <li>$i = \sqrt{-1}, \ i^2 = -1, \ i^3 = -i, \ i^4 = 1$</li>
                    <li>$\log_b(xy) = \log_b x + \log_b y$</li>
                    <li>$\log_b(x/y) = \log_b x - \log_b y$</li>
                    <li>$\log_b(x^k) = k\log_b x$</li>
                    <li>Change of Base: $\frac{\ln x}{\ln b}$</li>
                </ul>
            </div>

            <div class="math-summary-col">
                <h4>Trig &amp; Unit Circle</h4>
                <ul>
                    <li>$\sin^2\theta + \cos^2\theta = 1$</li>
                    <li>$\sin(2\theta) = 2\sin\theta\cos\theta$</li>
                    <li>$\cos(2\theta) = \cos^2\theta - \sin^2\theta$</li>
                    <li>ASTC: Q1 All, Q2 Sin, Q3 Tan, Q4 Cos</li>
                    <li>$x = \cos\theta, \ y = \sin\theta$ on $r=1$</li>
                </ul>
            </div>

            <div class="math-summary-col">
                <h4>Series &amp; Polynomials</h4>
                <ul>
                    <li>Arithmetic: $S_n = \frac{n(a_1+a_n)}{2}$</li>
                    <li>Geometric: $S_n = \frac{a_1(1-r^n)}{1-r}$</li>
                    <li>Infinite: $S_\infty = \frac{a_1}{1-r}$ ($|r| < 1$)</li>
                    <li>Remainder: $P(c) = R$</li>
                </ul>
            </div>
        </div>
    </section>
</div>
