<div class="cdn-book-reader-content">
    <div class="math-section-badge"><i class="fas fa-square-root-alt"></i> Part IV: Calculus &amp; Constants</div>
    <h2>Chapter 4: Calculus Essentials, Series &amp; Fundamental Mathematical Constants</h2>

    <div class="content-content">
        <p>Calculus provides the mathematical framework for analyzing continuous change, instantaneous rates of variation, accumulated quantities, and asymptotic behavior. This chapter serves as a comprehensive reference compendium for limits, derivative rules, integration formulas, key differential theorems, power series expansions, the fundamental constants of the universe, and mathematical Greek notation. Rendered in responsive MathJax SVG.</p>

        <!-- Quick Section Navigation -->
        <nav class="math-toc-pills" aria-label="Chapter 4 Quick Navigation">
            <a href="#sec-4-1" class="math-toc-pill"><i class="fas fa-arrow-right"></i> 4.1 Limits &amp; Continuity</a>
            <a href="#sec-4-2" class="math-toc-pill"><i class="fas fa-calculator"></i> 4.2 Derivative Rules</a>
            <a href="#sec-4-3" class="math-toc-pill"><i class="fas fa-award"></i> 4.3 Key Theorems</a>
            <a href="#sec-4-4" class="math-toc-pill"><i class="fas fa-integral"></i> 4.4 Integrals Table</a>
            <a href="#sec-4-5" class="math-toc-pill"><i class="fas fa-stream"></i> 4.5 Taylor Series</a>
            <a href="#sec-4-6" class="math-toc-pill"><i class="fas fa-atom"></i> 4.6 Math Constants</a>
            <a href="#sec-4-7" class="math-toc-pill"><i class="fas fa-font"></i> 4.7 Greek Alphabet</a>
            <a href="#sec-4-8" class="math-toc-pill"><i class="fas fa-pen-fancy"></i> 4.8 Worked Solutions</a>
            <a href="#sec-4-9" class="math-toc-pill"><i class="fas fa-clipboard-list"></i> 4.9 Summary Sheet</a>
        </nav>

        <!-- 4.1 Limits & Continuity -->
        <h3 id="sec-4-1">4.1 Limits, Continuity &amp; Asymptotic Behavior</h3>

        <div class="math-def-box">
            <div class="math-def-header">
                <h4 class="math-def-title"><i class="fas fa-crosshairs"></i> Definition 4.1: Rigorous Limit of a Function (\(\varepsilon\)-\(\delta\))</h4>
                <span class="math-def-chip">Real Analysis</span>
            </div>
            <p>We write \(\displaystyle\lim_{x \to c} f(x) = L\) if and only if for every real number \(\varepsilon > 0\), there exists a corresponding \(\delta > 0\) such that whenever \(0 < |x - c| < \delta\), it follows that \(|f(x) - L| < \varepsilon\).</p>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr><th scope="col">Limit Law / Theorem</th><th scope="col">Mathematical Formulation</th><th scope="col">Operational Precondition</th></tr>
                </thead>
                <tbody>
                    <tr><td><strong>Sum / Difference Rule</strong></td><td>\(\lim_{x\to c}[f(x) \pm g(x)] = \lim f(x) \pm \lim g(x)\)</td><td>Both limits exist and are finite</td></tr>
                    <tr><td><strong>Product Rule</strong></td><td>\(\lim_{x\to c}[f(x) \cdot g(x)] = \lim f(x) \cdot \lim g(x)\)</td><td>Both limits exist and are finite</td></tr>
                    <tr><td><strong>Quotient Rule</strong></td><td>\(\lim_{x\to c}\left[\frac{f(x)}{g(x)}\right] = \frac{\lim f(x)}{\lim g(x)}\)</td><td>\(\lim g(x) \neq 0\)</td></tr>
                    <tr><td><strong>Power / Radical Rule</strong></td><td>\(\lim_{x\to c}[f(x)]^n = [\lim f(x)]^n\)</td><td>\(f(x) > 0\) for even roots</td></tr>
                    <tr><td><strong>The Squeeze (Sandwich) Theorem</strong></td><td>If \(g(x) \leq f(x) \leq h(x)\) and \(\lim g = \lim h = L\), then \(\lim f = L\)</td><td>Holds on deleted neighborhood of \(c\)</td></tr>
                    <tr><td><strong>Fundamental Trig Limit</strong></td><td>\(\displaystyle\lim_{x \to 0} \frac{\sin x}{x} = 1 \qquad \text{and} \qquad \displaystyle\lim_{x \to 0} \frac{1 - \cos x}{x} = 0\)</td><td>\(x\) measured in radians</td></tr>
                    <tr><td><strong>Euler Exponential Limit</strong></td><td>\(\displaystyle\lim_{x \to \infty} \left(1 + \frac{1}{x}\right)^x = e \approx 2.71828\dots\)</td><td>Compound growth definition</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 4.2 Derivative Rules -->
        <h3 id="sec-4-2">4.2 Differential Calculus &amp; Comprehensive Derivative Rules</h3>

        <div class="math-def-box">
            <div class="math-def-header">
                <h4 class="math-def-title"><i class="fas fa-chart-line"></i> Definition 4.2: The Derivative as a Limit of Difference Quotients</h4>
                <span class="math-def-chip">Differentiation</span>
            </div>
            <p>\[f'(x) = \frac{df}{dx} = \lim_{h \to 0} \frac{f(x + h) - f(x)}{h} = \lim_{z \to x} \frac{f(z) - f(x)}{z - x}\]</p>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr><th scope="col">Rule Name</th><th scope="col">General Functional Differentiation Formula</th><th scope="col">Demonstration</th></tr>
                </thead>
                <tbody>
                    <tr><td><strong>Constant Rule</strong></td><td>\(\frac{d}{dx}[c] = 0\)</td><td>\(\frac{d}{dx}[\pi] = 0\)</td></tr>
                    <tr><td><strong>Power Rule</strong></td><td>\(\frac{d}{dx}[x^n] = n x^{n-1} \quad (n \in \mathbb{R})\)</td><td>\(\frac{d}{dx}[x^{-3/2}] = -\frac{3}{2}x^{-5/2}\)</td></tr>
                    <tr><td><strong>Constant Multiple</strong></td><td>\(\frac{d}{dx}[c \cdot f(x)] = c \cdot f'(x)\)</td><td>\(\frac{d}{dx}[7x^4] = 28x^3\)</td></tr>
                    <tr><td><strong>Sum &amp; Difference</strong></td><td>\(\frac{d}{dx}[f(x) \pm g(x)] = f'(x) \pm g'(x)\)</td><td>Linearity of derivative</td></tr>
                    <tr><td><strong>Product Rule</strong></td><td>\(\frac{d}{dx}[f \cdot g] = f' g + f g'\)</td><td>\(\frac{d}{dx}[x^2 e^x] = 2x e^x + x^2 e^x\)</td></tr>
                    <tr><td><strong>Quotient Rule</strong></td><td>\(\frac{d}{dx}\left[\frac{f}{g}\right] = \frac{f' g - f g'}{g^2}\)</td><td>\(\frac{d}{dx}\left[\frac{\sin x}{x}\right] = \frac{x\cos x - \sin x}{x^2}\)</td></tr>
                    <tr><td><strong>The Chain Rule</strong></td><td>\(\frac{d}{dx}[f(g(x))] = f'(g(x)) \cdot g'(x) \iff \frac{df}{dx} = \frac{df}{dg} \cdot \frac{dg}{dx}\)</td><td>\(\frac{d}{dx}[\sin(x^3)] = 3x^2 \cos(x^3)\)</td></tr>
                    <tr><td><strong>Natural Exponential</strong></td><td>\(\frac{d}{dx}[e^x] = e^x \quad \text{and} \quad \frac{d}{dx}[a^x] = a^x \ln a\)</td><td>\(\frac{d}{dx}[2^x] = 2^x \ln 2\)</td></tr>
                    <tr><td><strong>Logarithms</strong></td><td>\(\frac{d}{dx}[\ln x] = \frac{1}{x} \quad (x > 0) \quad \text{and} \quad \frac{d}{dx}[\log_a x] = \frac{1}{x \ln a}\)</td><td>\(\frac{d}{dx}[\ln|x|] = \frac{1}{x}\)</td></tr>
                    <tr><td><strong>Sine &amp; Cosine</strong></td><td>\(\frac{d}{dx}[\sin x] = \cos x \qquad \text{and} \qquad \frac{d}{dx}[\cos x] = -\sin x\)</td><td>Periodic phase shift of \(\frac{\pi}{2}\)</td></tr>
                    <tr><td><strong>Tangent &amp; Cotangent</strong></td><td>\(\frac{d}{dx}[\tan x] = \sec^2 x \qquad \text{and} \qquad \frac{d}{dx}[\cot x] = -\csc^2 x\)</td><td>Discontinuous at asymptotes</td></tr>
                    <tr><td><strong>Secant &amp; Cosecant</strong></td><td>\(\frac{d}{dx}[\sec x] = \sec x \tan x \qquad \text{and} \qquad \frac{d}{dx}[\csc x] = -\csc x \cot x\)</td><td>Trigonometric rates</td></tr>
                    <tr><td><strong>Inverse Sine / Cosine</strong></td><td>\(\frac{d}{dx}[\arcsin x] = \frac{1}{\sqrt{1-x^2}} \qquad \frac{d}{dx}[\arccos x] = -\frac{1}{\sqrt{1-x^2}}\)</td><td>\(|x| < 1\)</td></tr>
                    <tr><td><strong>Inverse Tangent</strong></td><td>\(\frac{d}{dx}[\arctan x] = \frac{1}{1 + x^2}\)</td><td>Defined for all \(x \in \mathbb{R}\)</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 4.3 Key Theorems -->
        <h3 id="sec-4-3">4.3 Key Theorems of Differential &amp; Integral Calculus</h3>

        <div class="math-theorem-box">
            <div class="math-theorem-header">
                <h4 class="math-theorem-title"><i class="fas fa-crown"></i> Theorem 4.1: The Fundamental Theorem of Calculus (FTC)</h4>
                <span class="math-theorem-badge">Core Theorem</span>
            </div>
            <p><strong>Part 1 (Differentiation of Accumulation Function):</strong> If \(f\) is continuous on \([a, b]\) and \(F(x) = \displaystyle\int_a^x f(t)\,dt\), then \(F\) is differentiable on \((a, b)\) and: \[F'(x) = \frac{d}{dx}\left[\int_a^x f(t)\,dt\right] = f(x)\]</p>
            <p><strong>Part 2 (Evaluation of Definite Integrals):</strong> If \(f\) is continuous on \([a, b]\) and \(F\) is any antiderivative of \(f\) (such that \(F' = f\)), then: \[\int_a^b f(x)\,dx = F(b) - F(a) = \Big[F(x)\Big]_a^b\]</p>
        </div>

        <div class="math-formula-grid">
            <div class="math-grid-card">
                <h4><i class="fas fa-balance-scale-right"></i> Mean Value Theorem (MVT)</h4>
                <p>If \(f\) is continuous on \([a, b]\) and differentiable on \((a, b)\), there exists at least one \(c \in (a, b)\) such that: \[f'(c) = \frac{f(b) - f(a)}{b - a}\]</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-divide"></i> L'Hôpital's Rule</h4>
                <p>If \(\lim \frac{f(x)}{g(x)}\) produces an indeterminate form \(\frac{0}{0}\) or \(\frac{\pm\infty}{\pm\infty}\), and \(\lim \frac{f'(x)}{g'(x)}\) exists: \[\lim_{x \to c} \frac{f(x)}{g(x)} = \lim_{x \to c} \frac{f'(x)}{g'(x)}\]</p>
            </div>
        </div>

        <!-- 4.4 Integrals Table -->
        <h3 id="sec-4-4">4.4 Standard Table of Antiderivatives &amp; Integrals</h3>
        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr><th scope="col">Integrand Function \(f(x)\)</th><th scope="col">Indefinite Integral \(\int f(x)\,dx\)</th><th scope="col">Integration Technique / Domain</th></tr>
                </thead>
                <tbody>
                    <tr><td>\(x^n \quad (n \neq -1)\)</td><td>\(\frac{x^{n+1}}{n+1} + C\)</td><td>Power Rule for Integration</td></tr>
                    <tr><td>\(\frac{1}{x}\)</td><td>\(\ln|x| + C\)</td><td>\(x \neq 0\) (Natural Logarithm)</td></tr>
                    <tr><td>\(e^{kx}\)</td><td>\(\frac{1}{k}e^{kx} + C\)</td><td>Exponential rule</td></tr>
                    <tr><td>\(a^x \quad (a > 0, a \neq 1)\)</td><td>\(\frac{a^x}{\ln a} + C\)</td><td>General exponential</td></tr>
                    <tr><td>\(\cos(kx)\)</td><td>\(\frac{1}{k}\sin(kx) + C\)</td><td>Trigonometric antiderivative</td></tr>
                    <tr><td>\(\sin(kx)\)</td><td>\(-\frac{1}{k}\cos(kx) + C\)</td><td>Trigonometric antiderivative</td></tr>
                    <tr><td>\(\sec^2 x\)</td><td>\(\tan x + C\)</td><td>Trigonometric antiderivative</td></tr>
                    <tr><td>\(\csc^2 x\)</td><td>\(-\cot x + C\)</td><td>Trigonometric antiderivative</td></tr>
                    <tr><td>\(\sec x \tan x\)</td><td>\(\sec x + C\)</td><td>Trigonometric antiderivative</td></tr>
                    <tr><td>\(\tan x\)</td><td>\(\ln|\sec x| + C = -\ln|\cos x| + C\)</td><td>Log-cosine formulation</td></tr>
                    <tr><td>\(\frac{1}{\sqrt{a^2 - x^2}}\)</td><td>\(\arcsin\left(\frac{x}{a}\right) + C\)</td><td>Inverse trigonometric (\(|x| < a\))</td></tr>
                    <tr><td>\(\frac{1}{a^2 + x^2}\)</td><td>\(\frac{1}{a}\arctan\left(\frac{x}{a}\right) + C\)</td><td>Inverse trigonometric</td></tr>
                    <tr><td>\(u\,dv\) (Parts)</td><td>\(\int u\,dv = uv - \int v\,du\)</td><td>Integration by Parts</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 4.5 Taylor Series -->
        <h3 id="sec-4-5">4.5 Taylor &amp; Maclaurin Power Series Expansions</h3>
        <p>The Taylor series of a smooth infinitely differentiable function \(f(x)\) centered at \(x = a\) is defined as: \[f(x) = \sum_{n=0}^\infty \frac{f^{(n)}(a)}{n!}(x - a)^n = f(a) + f'(a)(x-a) + \frac{f''(a)}{2!}(x-a)^2 + \dots\]</p>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr><th scope="col">Function</th><th scope="col">Maclaurin Series Expansion (centered at \(a = 0\))</th><th scope="col">Radius of Convergence \(R\)</th></tr>
                </thead>
                <tbody>
                    <tr><td>\(e^x\)</td><td>\(\sum_{n=0}^\infty \frac{x^n}{n!} = 1 + x + \frac{x^2}{2!} + \frac{x^3}{3!} + \dots\)</td><td>\(R = \infty \quad (-\infty, \infty)\)</td></tr>
                    <tr><td>\(\sin x\)</td><td>\(\sum_{n=0}^\infty \frac{(-1)^n x^{2n+1}}{(2n+1)!} = x - \frac{x^3}{3!} + \frac{x^5}{5!} - \dots\)</td><td>\(R = \infty \quad (-\infty, \infty)\)</td></tr>
                    <tr><td>\(\cos x\)</td><td>\(\sum_{n=0}^\infty \frac{(-1)^n x^{2n}}{(2n)!} = 1 - \frac{x^2}{2!} + \frac{x^4}{4!} - \dots\)</td><td>\(R = \infty \quad (-\infty, \infty)\)</td></tr>
                    <tr><td>\(\frac{1}{1 - x}\)</td><td>\(\sum_{n=0}^\infty x^n = 1 + x + x^2 + x^3 + \dots\)</td><td>\(R = 1 \quad (|x| < 1)\)</td></tr>
                    <tr><td>\(\ln(1 + x)\)</td><td>\(\sum_{n=1}^\infty \frac{(-1)^{n-1} x^n}{n} = x - \frac{x^2}{2} + \frac{x^3}{3} - \dots\)</td><td>\(R = 1 \quad (-1 < x \leq 1)\)</td></tr>
                    <tr><td>\(\arctan x\)</td><td>\(\sum_{n=0}^\infty \frac{(-1)^n x^{2n+1}}{2n+1} = x - \frac{x^3}{3} + \frac{x^5}{5} - \dots\)</td><td>\(R = 1 \quad (|x| \leq 1)\)</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 4.6 Math Constants -->
        <h3 id="sec-4-6">4.6 Fundamental Mathematical Constants Compendium</h3>
        <div class="math-constant-grid">
            <div class="math-constant-card">
                <span class="constant-sym">\(\pi\)</span>
                <span class="constant-name">Archimedes' Constant (Pi)</span>
                <span class="constant-val">3.14159 26535 89793 23846…</span>
                <p style="font-size: 0.88rem; color: var(--color-text-secondary); margin: 0;">Ratio of a circle's circumference to its diameter. Transcendental and irrational.</p>
            </div>
            <div class="math-constant-card">
                <span class="constant-sym">\(e\)</span>
                <span class="constant-name">Euler's Number</span>
                <span class="constant-val">2.71828 18284 59045 23536…</span>
                <p style="font-size: 0.88rem; color: var(--color-text-secondary); margin: 0;">Base of the natural logarithm; uniquely satisfies \(\frac{d}{dx}[e^x] = e^x\).</p>
            </div>
            <div class="math-constant-card">
                <span class="constant-sym">\(\varphi\)</span>
                <span class="constant-name">The Golden Ratio (Phi)</span>
                <span class="constant-val">1.61803 39887 49894 84820…</span>
                <p style="font-size: 0.88rem; color: var(--color-text-secondary); margin: 0;">\(\varphi = \frac{1+\sqrt{5}}{2}\); limiting ratio of consecutive Fibonacci numbers.</p>
            </div>
            <div class="math-constant-card">
                <span class="constant-sym">\(i\)</span>
                <span class="constant-name">Imaginary Unit</span>
                <span class="constant-val">i = \sqrt{-1} \quad (i^2 = -1)</span>
                <p style="font-size: 0.88rem; color: var(--color-text-secondary); margin: 0;">Algebraic foundation of the complex plane \(\mathbb{C}\) and fundamental theorem of algebra.</p>
            </div>
        </div>

        <div class="math-formula-card">
            <div class="math-formula-title"><i class="fas fa-star"></i> Euler's Identity: The Most Beautiful Equation in Mathematics</div>
            <div class="math-equation-display">
                \[e^{i\pi} + 1 = 0 \iff e^{i\theta} = \cos\theta + i\sin\theta \quad (\text{Euler's Formula at } \theta = \pi)\]
            </div>
            <p style="text-align: center; color: var(--color-text-secondary); font-size: 0.9rem; margin: 0;">Unites the five fundamental constants of all mathematics: \(e, i, \pi, 1,\) and \(0\).</p>
        </div>

        <!-- 4.7 Greek Alphabet -->
        <h3 id="sec-4-7">4.7 Comprehensive Greek Alphabet &amp; Notation Dictionary</h3>
        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Upper / Lower</th>
                        <th scope="col">Greek Name</th>
                        <th scope="col">LaTeX Code</th>
                        <th scope="col">Standard Mathematical / Physical Application</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>\(A, \; \alpha\)</td><td>Alpha</td><td><code>\alpha</code></td><td>Angles, angular acceleration, significance levels in statistics</td></tr>
                    <tr><td>\(B, \; \beta\)</td><td>Beta</td><td><code>\beta</code></td><td>Angles, beta function, regression coefficients</td></tr>
                    <tr><td>\(\Gamma, \; \gamma\)</td><td>Gamma</td><td><code>\Gamma, \gamma</code></td><td>Euler-Mascheroni constant (\(\gamma \approx 0.57721\)), Gamma function</td></tr>
                    <tr><td>\(\Delta, \; \delta\)</td><td>Delta</td><td><code>\Delta, \delta</code></td><td>Finite difference (\(\Delta\)), discriminant, Dirac delta (\(\delta\)), \(\varepsilon\)-\(\delta\) limits</td></tr>
                    <tr><td>\(E, \; \varepsilon\)</td><td>Epsilon</td><td><code>\varepsilon</code></td><td>Infinitesimal positive error tolerances in analysis, permittivity</td></tr>
                    <tr><td>\(\Theta, \; \theta\)</td><td>Theta</td><td><code>\Theta, \theta</code></td><td>General plane angle variable, polar coordinates, big-O bound</td></tr>
                    <tr><td>\(\Lambda, \; \lambda\)</td><td>Lambda</td><td><code>\Lambda, \lambda</code></td><td>Matrix eigenvalues, Poisson distribution rate, wavelength</td></tr>
                    <tr><td>\(M, \; \mu\)</td><td>Mu</td><td><code>\mu</code></td><td>Population mean in statistics, coefficient of friction, micro- prefix</td></tr>
                    <tr><td>\(\Pi, \; \pi\)</td><td>Pi</td><td><code>\Pi, \pi</code></td><td>Circle constant (\(\pi\)), product operator notation (\(\prod\))</td></tr>
                    <tr><td>\(\Sigma, \; \sigma\)</td><td>Sigma</td><td><code>\Sigma, \sigma</code></td><td>Summation operator (\(\sum\)), standard deviation (\(\sigma\)), stress tensor</td></tr>
                    <tr><td>\(\Phi, \; \varphi\)</td><td>Phi</td><td><code>\Phi, \varphi</code></td><td>Golden ratio (\(\varphi\)), normal CDF (\(\Phi(z)\)), Euler's totient function</td></tr>
                    <tr><td>\(\Omega, \; \omega\)</td><td>Omega</td><td><code>\Omega, \omega</code></td><td>Angular frequency (\(\omega\)), sample space probability (\(\Omega\)), Ohm unit</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 4.8 Worked Solutions -->
        <h3 id="sec-4-8">4.8 Worked Step-by-Step Problem Walkthroughs</h3>

        <div class="math-example-box">
            <div class="math-example-header"><i class="fas fa-pencil-ruler"></i> Example 4.1: Integration by Parts Walkthrough</div>
            <p>Evaluate the definite integral: \[I = \int_0^1 x e^{2x}\,dx\]</p>
            <div class="math-example-steps">
                <div><strong>Step 1 (Choose \(u\) and \(dv\)):</strong> Let \(u = x\) and \(dv = e^{2x}\,dx\).</div>
                <div><strong>Step 2 (Compute Differentials):</strong> \(du = dx\) and \(v = \int e^{2x}\,dx = \frac{1}{2}e^{2x}\).</div>
                <div><strong>Step 3 (Apply Formula \(\int u\,dv = uv - \int v\,du\)):</strong>
                    \[I = \left[ \frac{1}{2}x e^{2x} \right]_0^1 - \int_0^1 \frac{1}{2}e^{2x}\,dx\]
                </div>
                <div><strong>Step 4 (Evaluate Antiderivative):</strong>
                    \[I = \left(\frac{1}{2}(1)e^2 - 0\right) - \left[ \frac{1}{4}e^{2x} \right]_0^1 = \frac{1}{2}e^2 - \left(\frac{1}{4}e^2 - \frac{1}{4}e^0\right) = \frac{1}{4}e^2 + \frac{1}{4}\]
                </div>
            </div>
            <div class="math-example-result"><i class="fas fa-check"></i> Exact Integral Value: \(I = \frac{e^2 + 1}{4} \approx 2.09726\)</div>
        </div>

        <!-- 4.9 Summary Sheet -->
        <section class="math-summary-sheet" id="sec-4-9">
            <div class="math-summary-header">
                <i class="fas fa-star" style="color: var(--color-primary, #6366f1); font-size: 1.5rem;"></i>
                <div>
                    <h3>Chapter 4 Reference Quick Sheet</h3>
                    <p style="margin: 0; font-size: 0.88rem; color: var(--color-text-secondary);">Core calculus derivatives, integrals, series, and constants</p>
                </div>
            </div>
            <div class="math-summary-grid">
                <div class="math-summary-col">
                    <h4>Derivatives</h4>
                    <ul>
                        <li>\(\frac{d}{dx}[x^n] = n x^{n-1}\)</li>
                        <li>\((fg)' = f'g + fg'\)</li>
                        <li>\((f/g)' = \frac{f'g-fg'}{g^2}\)</li>
                        <li>\([f(g(x))]' = f'(g(x))g'(x)\)</li>
                    </ul>
                </div>
                <div class="math-summary-col">
                    <h4>Integrals &amp; Theorems</h4>
                    <ul>
                        <li>FTC: \(\frac{d}{dx}\int_a^x f(t)dt = f(x)\)</li>
                        <li>\(\int_a^b f(x)dx = F(b)-F(a)\)</li>
                        <li>\(\int \frac{1}{x}dx = \ln|x|+C\)</li>
                        <li>\(\int u dv = uv - \int v du\)</li>
                    </ul>
                </div>
                <div class="math-summary-col">
                    <h4>Series &amp; Constants</h4>
                    <ul>
                        <li>\(e^x = \sum_{n=0}^\infty \frac{x^n}{n!}\)</li>
                        <li>\(e^{i\pi} + 1 = 0\)</li>
                        <li>\(\pi \approx 3.14159, \; e \approx 2.71828\)</li>
                        <li>\(\varphi = \frac{1+\sqrt{5}}{2} \approx 1.61803\)</li>
                    </ul>
                </div>
            </div>
        </section>

    </div>
</div>
