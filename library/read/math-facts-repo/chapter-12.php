<div class="math-reference-content">
    <!-- Chapter 12 Banner -->
    <div class="math-chapter-hero">
        <div class="math-hero-badge"><i class="fas fa-chart-area"></i> Level: Grade 12 (Calculus &amp; Advanced Math)</div>
        <h1 class="math-hero-title">Grade 12: Limits, Derivatives, Integrals &amp; Advanced Constants</h1>
        <p class="math-hero-desc">The crowning Grade 12 capstone reference manual covering $\varepsilon$-$\delta$ limits, differentiation rules (Power, Product, Quotient, Chain), derivative applications (optimization, related rates), integral calculus (FTC, U-Substitution, Tabular Integration by Parts), combinatorics, and the fundamental mathematical constants ($\pi, e, \varphi, i, \gamma$).</p>
    </div>

    <!-- Quick Navigation Pills -->
    <nav class="math-toc-pills" aria-label="Chapter sections">
        <a href="#sec-12-1" class="math-pill"><i class="fas fa-compress-arrows-alt"></i> 12.1 Limits &amp; Continuity</a>
        <a href="#sec-12-2" class="math-pill"><i class="fas fa-subscript"></i> 12.2 Derivative Rules (Power, Product, Chain)</a>
        <a href="#sec-12-3" class="math-pill"><i class="fas fa-tachometer-alt"></i> 12.3 Applications (Optimization &amp; Related Rates)</a>
        <a href="#sec-12-4" class="math-pill"><i class="fas fa-gem"></i> 12.4 Fundamental Theorem of Calculus</a>
        <a href="#sec-12-5" class="math-pill"><i class="fas fa-stream"></i> 12.5 Integration Techniques (U-Sub &amp; By Parts)</a>
        <a href="#sec-12-6" class="math-pill"><i class="fas fa-dice"></i> 12.6 Combinatorics &amp; Probability ($P, C$)</a>
        <a href="#sec-12-7" class="math-pill"><i class="fas fa-brain"></i> 12.7 Mental Math &amp; Calculus Hacks</a>
        <a href="#sec-12-8" class="math-pill"><i class="fas fa-file-invoice"></i> 12.8 Grade 12 Cheat Sheet</a>
    </nav>

    <!-- Section 12.1 -->
    <section id="sec-12-1" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">12.1</span>
            <h2 class="math-section-title">Limits, Continuity &amp; L'Hôpital's Rule</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-book"></i> Definition 12.1.1</span>
                <span class="math-def-domain">Real Analysis Limit</span>
            </div>
            <div class="math-def-body">
                $\lim_{x \to c} f(x) = L$ if and only if both one-sided limits exist and are equal:
                $$\lim_{x \to c^-} f(x) = \lim_{x \to c^+} f(x) = L$$
                <strong>Continuity Condition at $x = c$:</strong> $f(c)$ is defined, $\lim_{x\to c} f(x)$ exists, and $\lim_{x\to c} f(x) = f(c)$.
            </div>
        </div>

        <div class="math-theorem-box">
            <div class="math-thm-header">
                <span class="math-thm-badge"><i class="fas fa-award"></i> Theorem 12.1</span>
                <span class="math-thm-title">L'Hôpital's Indeterminate Rule</span>
            </div>
            <div class="math-thm-body">
                If $\lim_{x \to c} \frac{f(x)}{g(x)}$ yields an indeterminate form $\left[\frac{0}{0}\right]$ or $\left[\frac{\pm\infty}{\pm\infty}\right]$, then:
                $$\lim_{x \to c} \frac{f(x)}{g(x)} = \lim_{x \to c} \frac{f'(x)}{g'(x)}$$
            </div>
        </div>
    </section>

    <!-- Section 12.2 -->
    <section id="sec-12-2" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">12.2</span>
            <h2 class="math-section-title">Comprehensive Derivative Rules</h2>
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
                    <tr><td><strong>Quotient Rule</strong></td><td>$\frac{u}{v}$</td><td>$\frac{u'v - uv'}{v^2} \quad (\text{"Low d-High minus High d-Low over Low-Low"})$</td></tr>
                    <tr><td><strong>Chain Rule</strong></td><td>$f(g(x))$</td><td>$f'(g(x)) \cdot g'(x)$</td></tr>
                    <tr><td><strong>Exponential ($e^x$)</strong></td><td>$e^x$</td><td>$e^x$ (Self-replicating)</td></tr>
                    <tr><td><strong>General Exponential</strong></td><td>$a^x$</td><td>$a^x \cdot \ln(a)$</td></tr>
                    <tr><td><strong>Natural Logarithm</strong></td><td>$\ln(x)$</td><td>$\frac{1}{x} \quad (x > 0)$</td></tr>
                    <tr><td><strong>Sine &amp; Cosine</strong></td><td>$\sin(x), \ \cos(x)$</td><td>$\frac{d}{dx}[\sin x] = \cos x, \quad \frac{d}{dx}[\cos x] = -\sin x$</td></tr>
                    <tr><td><strong>Tangent &amp; Secant</strong></td><td>$\tan(x), \ \sec(x)$</td><td>$\frac{d}{dx}[\tan x] = \sec^2 x, \quad \frac{d}{dx}[\sec x] = \sec x\tan x$</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Section 12.3 -->
    <section id="sec-12-3" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">12.3</span>
            <h2 class="math-section-title">Applications: Extreme Value Theorem &amp; Optimization</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Critical Points ($x_c$)</div>
                <div class="math-formula-latex">$$f'(x_c) = 0 \quad \text{or} \quad f'(x_c) \text{ is undefined}$$</div>
                <div class="math-formula-desc">Potential locations for local maxima, minima, or plateaus.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Second Derivative Concavity Test</div>
                <div class="math-formula-latex">$$f''(x) > 0 \implies \text{Concave UP } (\cup), \quad f''(x) < 0 \implies \text{Concave DOWN } (\cap)$$</div>
                <div class="math-formula-desc">Inflection Point occurs where concavity changes sign ($f''(x) = 0$).</div>
            </div>
        </div>
    </section>

    <!-- Section 12.4 -->
    <section id="sec-12-4" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">12.4</span>
            <h2 class="math-section-title">The Fundamental Theorem of Calculus (FTC)</h2>
        </div>

        <div class="math-theorem-box">
            <div class="math-thm-header">
                <span class="math-thm-badge"><i class="fas fa-crown"></i> The Master Theorem</span>
                <span class="math-thm-title">Fundamental Theorem of Calculus (Parts 1 &amp; 2)</span>
            </div>
            <div class="math-thm-body">
                $$\text{\textbf{Part 1 (Derivatives of Integrals):} } \frac{d}{dx}\left[\int_a^x f(t)dt\right] = f(x)$$
                $$\text{\textbf{Part 2 (Net Evaluation):} } \int_a^b f(x)dx = F(b) - F(a) \quad \text{where } F'(x) = f(x)$$
                Unites differential calculus (slopes) and integral calculus (areas) into one single mathematical architecture.
            </div>
        </div>
    </section>

    <!-- Section 12.5 -->
    <section id="sec-12-5" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">12.5</span>
            <h2 class="math-section-title">Integration Techniques: U-Substitution &amp; By Parts</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Power Rule for Integrals</div>
                <div class="math-formula-latex">$$\int x^n dx = \frac{x^{n+1}}{n+1} + C \quad (n \neq -1)$$</div>
                <div class="math-formula-desc">For $n = -1$: $\int \frac{1}{x} dx = \ln|x| + C$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Integration by Parts Formula</div>
                <div class="math-formula-latex">$$\int u \, dv = u \cdot v - \int v \, du$$</div>
                <div class="math-formula-desc">Choose $u$ using the <strong>LIATE</strong> rule: Log, Inverse trig, Algebraic, Trig, Exponential.</div>
            </div>
        </div>
    </section>

    <!-- Section 12.6 -->
    <section id="sec-12-6" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">12.6</span>
            <h2 class="math-section-title">Discrete Math: Permutations &amp; Combinations</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Permutations (Order Matters!)</div>
                <div class="math-formula-latex">$$P(n, r) = {}_n P_r = \frac{n!}{(n - r)!}$$</div>
                <div class="math-formula-desc">Selecting $r$ ordered items from $n$ distinct choices (races, passwords).</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Combinations (Order Does NOT Matter)</div>
                <div class="math-formula-latex">$$C(n, r) = \binom{n}{r} = \frac{n!}{r!(n - r)!}$$</div>
                <div class="math-formula-desc">Selecting a group/committee of $r$ from $n$ without ranking order.</div>
            </div>
        </div>
    </section>

    <!-- Section 12.7: Math Hacks & Study Hacks -->
    <section id="sec-12-7" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">12.7</span>
            <h2 class="math-section-title">Grade 12 Mental Math &amp; Calculus Speed Hacks</h2>
        </div>

        <div class="math-constant-grid">
            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-table" style="color: #f59e0b;"></i> Hack #1</div>
                <div class="math-const-name">Tabular DI Method for Integration by Parts</div>
                <div class="math-const-val">$$\begin{array}{c|c|c} \text{Sign} & \text{D (Differentiate)} & \text{I (Integrate)} \\ \hline + & x^3 & e^{2x} \\ - & 3x^2 & \frac{1}{2}e^{2x} \\ + & 6x & \frac{1}{4}e^{2x} \\ - & 6 & \frac{1}{8}e^{2x} \\ + & 0 & \frac{1}{16}e^{2x} \end{array}$$</div>
                <div class="math-const-desc">Solve repeated integration by parts polynomial products in 20 seconds by drawing D and I columns with alternating signs!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-infinity" style="color: #6366f1;"></i> Hack #2</div>
                <div class="math-const-name">Euler's Formula &amp; Identity</div>
                <div class="math-const-val">$$e^{i\theta} = \cos\theta + i\sin\theta \implies \mathbf{e^{i\pi} + 1 = 0}$$</div>
                <div class="math-const-desc">The most beautiful equation in mathematics, connecting $e, i, \pi, 1,$ and $0$ in one line.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-ring" style="color: #10b981;"></i> Hack #3</div>
                <div class="math-const-name">Chain Rule "Outside-Inside" Mantra</div>
                <div class="math-const-val">$$\frac{d}{dx}[f(g(x))] = f'(\text{keep inside}) \times (\text{derivative of inside})$$</div>
                <div class="math-const-desc">Never differentiate the inside first! Differentiate the outer shell, leave the inside alone, then multiply by the derivative of the inside.</div>
            </div>
        </div>
    </section>

    <!-- Section 12.8: Summary Cheat Sheet -->
    <section id="sec-12-8" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">12.8</span>
            <h2 class="math-section-title">Grade 12 Comprehensive Summary Cheat Sheet</h2>
        </div>

        <div class="math-summary-sheet">
            <div class="math-summary-col">
                <h4>Core Derivatives</h4>
                <ul>
                    <li>$\frac{d}{dx}[x^n] = nx^{n-1}$</li>
                    <li>$\frac{d}{dx}[e^x] = e^x, \ \frac{d}{dx}[\ln x] = 1/x$</li>
                    <li>$\frac{d}{dx}[\sin x] = \cos x$</li>
                    <li>$\frac{d}{dx}[\cos x] = -\sin x$</li>
                    <li>$\frac{d}{dx}[\tan x] = \sec^2 x$</li>
                    <li>L'Hôpital: $\lim \frac{f}{g} = \lim \frac{f'}{g'}$</li>
                </ul>
            </div>

            <div class="math-summary-col">
                <h4>Core Integrals</h4>
                <ul>
                    <li>$\int x^n dx = \frac{x^{n+1}}{n+1} + C$</li>
                    <li>$\int \frac{1}{x} dx = \ln|x| + C$</li>
                    <li>$\int e^x dx = e^x + C$</li>
                    <li>$\int \cos x dx = \sin x + C$</li>
                    <li>$\int \sin x dx = -\cos x + C$</li>
                    <li>$\int u dv = uv - \int v du$</li>
                </ul>
            </div>

            <div class="math-summary-col">
                <h4>Fundamental Constants</h4>
                <ul>
                    <li>$\pi \approx 3.1415926535$</li>
                    <li>$e \approx 2.7182818284$</li>
                    <li>$\varphi = \frac{1+\sqrt{5}}{2} \approx 1.6180339887$</li>
                    <li>$i = \sqrt{-1} \implies i^2 = -1$</li>
                    <li>Euler Identity: $e^{i\pi} + 1 = 0$</li>
                </ul>
            </div>
        </div>
    </section>
</div>
