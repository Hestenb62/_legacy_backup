<div class="cdn-book-reader-content">
    <div class="math-section-badge"><i class="fas fa-square-root-alt"></i> Part II: Algebra &amp; Functions</div>
    <h2>Chapter 2: Algebraic Identities, Equations &amp; Functions</h2>

    <div class="content-content">
        <p>Algebra is the foundational language of mathematical relations, functions, and transformations. This chapter compiles the complete set of algebraic laws of exponents, polynomial factoring formulas, quadratic and polynomial equation techniques, logarithm theorems, matrix determinants, and sequence summations. Rendered with publication-grade MathJax typography.</p>

        <!-- Quick Section Navigation -->
        <nav class="math-toc-pills" aria-label="Chapter 2 Quick Navigation">
            <a href="#sec-2-1" class="math-toc-pill"><i class="fas fa-superscript"></i> 2.1 Exponents &amp; Radicals</a>
            <a href="#sec-2-2" class="math-toc-pill"><i class="fas fa-cubes"></i> 2.2 Polynomial Identities</a>
            <a href="#sec-2-3" class="math-toc-pill"><i class="fas fa-project-diagram"></i> 2.3 Linear Systems</a>
            <a href="#sec-2-4" class="math-toc-pill"><i class="fas fa-bezier-curve"></i> 2.4 Quadratic Theory</a>
            <a href="#sec-2-5" class="math-toc-pill"><i class="fas fa-wave-square"></i> 2.5 Logarithms</a>
            <a href="#sec-2-6" class="math-toc-pill"><i class="fas fa-less-than-equal"></i> 2.6 Inequalities</a>
            <a href="#sec-2-7" class="math-toc-pill"><i class="fas fa-infinity"></i> 2.7 Sequences &amp; Series</a>
            <a href="#sec-2-8" class="math-toc-pill"><i class="fas fa-pen-fancy"></i> 2.8 Worked Solutions</a>
            <a href="#sec-2-9" class="math-toc-pill"><i class="fas fa-clipboard-list"></i> 2.9 Summary Sheet</a>
        </nav>

        <!-- 2.1 Exponents & Radicals -->
        <h3 id="sec-2-1">2.1 Axiomatic Laws of Exponents &amp; Radical Simplification</h3>
        <p>For non-zero real bases \(a, b \in \mathbb{R} \setminus \{0\}\) and rational exponents \(m, n \in \mathbb{Q}\), the fundamental exponent rules are defined as follows:</p>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Exponent Law</th>
                        <th scope="col">Algebraic Formulation</th>
                        <th scope="col">Domain / Preconditions</th>
                        <th scope="col">Exemplary Evaluation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Product Rule</strong></td><td>\(a^m \cdot a^n = a^{m+n}\)</td><td>Same base</td><td>\(x^4 \cdot x^7 = x^{11}\)</td></tr>
                    <tr><td><strong>Quotient Rule</strong></td><td>\(\frac{a^m}{a^n} = a^{m-n}\)</td><td>\(a \neq 0\)</td><td>\(\frac{2^8}{2^3} = 2^5 = 32\)</td></tr>
                    <tr><td><strong>Power of a Power</strong></td><td>\((a^m)^n = a^{m \cdot n}\)</td><td>Nested powers</td><td>\((y^3)^4 = y^{12}\)</td></tr>
                    <tr><td><strong>Power of a Product</strong></td><td>\((ab)^n = a^n b^n\)</td><td>Distributive over multiplication</td><td>\((3x)^3 = 27x^3\)</td></tr>
                    <tr><td><strong>Power of a Quotient</strong></td><td>\(\left(\frac{a}{b}\right)^n = \frac{a^n}{b^n}\)</td><td>\(b \neq 0\)</td><td>\(\left(\frac{2}{5}\right)^3 = \frac{8}{125}\)</td></tr>
                    <tr><td><strong>Zero Exponent</strong></td><td>\(a^0 = 1\)</td><td>\(a \neq 0\) (\(0^0\) is indeterminate)</td><td>\((-15.7)^0 = 1\)</td></tr>
                    <tr><td><strong>Negative Exponent</strong></td><td>\(a^{-n} = \frac{1}{a^n}\)</td><td>\(a \neq 0\)</td><td>\(4^{-2} = \frac{1}{16}\)</td></tr>
                    <tr><td><strong>Fractional Exponent</strong></td><td>\(a^{m/n} = \sqrt[n]{a^m} = (\sqrt[n]{a})^m\)</td><td>\(n \in \mathbb{Z}^+, a \geq 0\) for even \(n\)</td><td>\(27^{2/3} = (\sqrt[3]{27})^2 = 3^2 = 9\)</td></tr>
                </tbody>
            </table>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <h4 class="math-def-title"><i class="fas fa-square-root-alt"></i> Definition 2.1: Radical Properties &amp; Conjugate Rationalization</h4>
                <span class="math-def-chip">Radicals</span>
            </div>
            <p>For \(a, b \geq 0\): \[\sqrt[n]{ab} = \sqrt[n]{a} \cdot \sqrt[n]{b} \qquad \text{and} \qquad \sqrt[n]{\frac{a}{b}} = \frac{\sqrt[n]{a}}{\sqrt[n]{b}} \quad (b > 0)\]</p>
            <p><strong>Conjugate Multiplication:</strong> To rationalize a binomial denominator containing square roots, multiply numerator and denominator by its conjugate: \[\frac{1}{\sqrt{a} \pm \sqrt{b}} \times \frac{\sqrt{a} \mp \sqrt{b}}{\sqrt{a} \mp \sqrt{b}} = \frac{\sqrt{a} \mp \sqrt{b}}{a - b}\]</p>
        </div>

        <!-- 2.2 Polynomial Identities -->
        <h3 id="sec-2-2">2.2 Polynomial Identities, Special Products &amp; Binomial Theorem</h3>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Algebraic Identity Name</th>
                        <th scope="col">Expansion / Factoring Formula</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Square of a Sum</strong></td><td>\((a + b)^2 = a^2 + 2ab + b^2\)</td></tr>
                    <tr><td><strong>Square of a Difference</strong></td><td>\((a - b)^2 = a^2 - 2ab + b^2\)</td></tr>
                    <tr><td><strong>Difference of Squares</strong></td><td>\(a^2 - b^2 = (a + b)(a - b)\)</td></tr>
                    <tr><td><strong>Sum of Squares (Complex)</strong></td><td>\(a^2 + b^2 = (a + bi)(a - bi)\)</td></tr>
                    <tr><td><strong>Sum of Cubes</strong></td><td>\(a^3 + b^3 = (a + b)(a^2 - ab + b^2)\)</td></tr>
                    <tr><td><strong>Difference of Cubes</strong></td><td>\(a^3 - b^3 = (a - b)(a^2 + ab + b^2)\)</td></tr>
                    <tr><td><strong>Cube of a Sum</strong></td><td>\((a + b)^3 = a^3 + 3a^2b + 3ab^2 + b^3\)</td></tr>
                    <tr><td><strong>Cube of a Difference</strong></td><td>\((a - b)^3 = a^3 - 3a^2b + 3ab^2 - b^3\)</td></tr>
                    <tr><td><strong>Square of a Trinomial</strong></td><td>\((a + b + c)^2 = a^2 + b^2 + c^2 + 2ab + 2bc + 2ca\)</td></tr>
                </tbody>
            </table>
        </div>

        <div class="math-theorem-box">
            <div class="math-theorem-header">
                <h4 class="math-theorem-title"><i class="fas fa-layer-group"></i> Theorem 2.1: The Binomial Theorem</h4>
                <span class="math-theorem-badge">Combinatorics &amp; Algebra</span>
            </div>
            <p>For any integer \(n \geq 0\) and real numbers \(a, b\): \[(a + b)^n = \sum_{k=0}^n \binom{n}{k} a^{n-k} b^k = \binom{n}{0}a^n + \binom{n}{1}a^{n-1}b + \dots + \binom{n}{n}b^n\] where the binomial coefficient is defined as: \[\binom{n}{k} = \frac{n!}{k!(n-k)!} = \frac{n(n-1)\cdots(n-k+1)}{k(k-1)\cdots 1}\]</p>
        </div>

        <!-- 2.3 Linear Systems -->
        <h3 id="sec-2-3">2.3 Linear Equations, Systems &amp; Matrix Determinants</h3>
        <p>A linear equation in two variables represents a straight geometric line on the Cartesian coordinate plane:</p>

        <div class="math-formula-grid">
            <div class="math-grid-card">
                <h4><i class="fas fa-chart-line"></i> Slope-Intercept Form</h4>
                <p>\[y = mx + b\]</p>
                <p>Slope \(m = \frac{\Delta y}{\Delta x}\), y-intercept \((0, b)\).</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-dot-circle"></i> Point-Slope Form</h4>
                <p>\[y - y_1 = m(x - x_1)\]</p>
                <p>Through point \((x_1, y_1)\) with slope \(m\).</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-sliders-h"></i> Standard Form</h4>
                <p>\[Ax + By = C\]</p>
                <p>Integers \(A, B, C\), slope \(m = -\frac{A}{B}\).</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-arrows-alt-v"></i> Parallel &amp; Perpendicular</h4>
                <p>Parallel: \(m_1 = m_2\)<br>Perpendicular: \(m_1 \cdot m_2 = -1\)</p>
            </div>
        </div>

        <div class="math-formula-card">
            <div class="math-formula-title"><i class="fas fa-table"></i> Cramer's Rule for \(2 \times 2\) Linear Systems</div>
            <p>For the system \(\begin{cases} a_1 x + b_1 y = c_1 \\ a_2 x + b_2 y = c_2 \end{cases}\) with coefficient determinant \(D \neq 0\):</p>
            <div class="math-equation-display">
                \[D = \begin{vmatrix} a_1 & b_1 \\ a_2 & b_2 \end{vmatrix} = a_1 b_2 - a_2 b_1 \qquad D_x = \begin{vmatrix} c_1 & b_1 \\ c_2 & b_2 \end{vmatrix} = c_1 b_2 - c_2 b_1 \qquad D_y = \begin{vmatrix} a_1 & c_1 \\ a_2 & c_2 \end{vmatrix} = a_1 c_2 - a_2 c_1\]
                \[x = \frac{D_x}{D} \qquad \text{and} \qquad y = \frac{D_y}{D}\]
            </div>
        </div>

        <!-- 2.4 Quadratic Theory -->
        <h3 id="sec-2-4">2.4 Quadratic Theory, Parabolic Functions &amp; Vieta's Relations</h3>

        <div class="math-theorem-box">
            <div class="math-theorem-header">
                <h4 class="math-theorem-title"><i class="fas fa-calculator"></i> Theorem 2.2: The Quadratic Formula</h4>
                <span class="math-theorem-badge">Exact Roots</span>
            </div>
            <p>For any second-degree polynomial equation \(ax^2 + bx + c = 0\) with \(a \neq 0\), the exact roots are given by: \[x = \frac{-b \pm \sqrt{\Delta}}{2a} \qquad \text{where } \Delta = b^2 - 4ac \text{ is the Discriminant}\]</p>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Discriminant Value</th>
                        <th scope="col">Nature of Roots</th>
                        <th scope="col">Geometric Parabolic Intercepts</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>\(\Delta > 0\) (and a perfect square)</td><td>Two distinct rational roots</td><td>Two distinct x-intercepts</td></tr>
                    <tr><td>\(\Delta > 0\) (not a perfect square)</td><td>Two distinct irrational conjugate roots</td><td>Two distinct irrational x-intercepts</td></tr>
                    <tr><td>\(\Delta = 0\)</td><td>One real root with multiplicity 2 (repeated)</td><td>Vertex is tangent to the x-axis</td></tr>
                    <tr><td>\(\Delta < 0\)</td><td>Two complex conjugate roots: \(x = \frac{-b \pm i\sqrt{|\Delta|}}{2a}\)</td><td>No real x-intercepts (curve lies strictly above/below axis)</td></tr>
                </tbody>
            </table>
        </div>

        <div class="math-formula-grid">
            <div class="math-grid-card">
                <h4><i class="fas fa-arrows-alt"></i> Vertex &amp; Axis of Symmetry</h4>
                <p>Axis: \(x = -\frac{b}{2a}\)<br>Vertex: \((h, k) = \left(-\frac{b}{2a}, \; f\left(-\frac{b}{2a}\right)\right)\)<br>Standard Vertex Form: \(y = a(x - h)^2 + k\)</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-link"></i> Vieta's Formulas</h4>
                <p>For roots \(r_1, r_2\):<br>Sum of roots: \(r_1 + r_2 = -\frac{b}{a}\)<br>Product of roots: \(r_1 \cdot r_2 = \frac{c}{a}\)</p>
            </div>
        </div>

        <!-- 2.5 Logarithms -->
        <h3 id="sec-2-5">2.5 Exponential &amp; Logarithmic Functions</h3>
        <p>The logarithm \(\log_b x = y\) is the inverse operation to exponentiation, stating that \(b^y = x\) (for base \(b > 0, b \neq 1\) and argument \(x > 0\)).</p>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Logarithmic Law</th>
                        <th scope="col">Mathematical Identity</th>
                        <th scope="col">Explanation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Product Rule</strong></td><td>\(\log_b(xy) = \log_b x + \log_b y\)</td><td>Converts multiplication to addition</td></tr>
                    <tr><td><strong>Quotient Rule</strong></td><td>\(\log_b\!\left(\frac{x}{y}\right) = \log_b x - \log_b y\)</td><td>Converts division to subtraction</td></tr>
                    <tr><td><strong>Power Rule</strong></td><td>\(\log_b(x^k) = k \log_b x\)</td><td>Brings power to coefficient multiplier</td></tr>
                    <tr><td><strong>Change of Base</strong></td><td>\(\log_b x = \frac{\ln x}{\ln b} = \frac{\log_{10} x}{\log_{10} b}\)</td><td>Enables computation in any standard base</td></tr>
                    <tr><td><strong>Inverse Identity</strong></td><td>\(b^{\log_b x} = x \quad \text{and} \quad \log_b(b^x) = x\)</td><td>Cancellation of inverse operations</td></tr>
                    <tr><td><strong>Base Constants</strong></td><td>\(\log_b 1 = 0 \quad \text{and} \quad \log_b b = 1\)</td><td>Zero and unity log values</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 2.6 Inequalities -->
        <h3 id="sec-2-6">2.6 Inequalities &amp; Absolute Value Intervals</h3>
        <div class="math-caution-box">
            <div class="math-caution-header"><i class="fas fa-exclamation-circle"></i> Caution 2.1: Reversing Inequality Direction</div>
            <p>Whenever multiplying or dividing both sides of an inequality by a negative quantity, the inequality symbol must be strictly reversed: \[a < b \iff -a > -b\]</p>
        </div>

        <div class="math-formula-grid">
            <div class="math-grid-card">
                <h4><i class="fas fa-compress"></i> Bounded Intersection</h4>
                <p>\[|x - c| \leq r \iff c - r \leq x \leq c + r \iff x \in [c-r, c+r]\]</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-expand"></i> Unbounded Union</h4>
                <p>\[|x - c| \geq r \iff x \leq c - r \text{ or } x \geq c + r\]</p>
            </div>
        </div>

        <!-- 2.7 Sequences & Series -->
        <h3 id="sec-2-7">2.7 Sequences, Series &amp; Summation Formulas</h3>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Type of Sequence</th>
                        <th scope="col">General \(n\)-th Term \(a_n\)</th>
                        <th scope="col">Sum of First \(n\) Terms \(S_n\)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Arithmetic Progression</strong></td>
                        <td>\(a_n = a_1 + (n - 1)d\)</td>
                        <td>\(S_n = \frac{n}{2}(a_1 + a_n) = \frac{n}{2}[2a_1 + (n-1)d]\)</td>
                    </tr>
                    <tr>
                        <td><strong>Finite Geometric Progression</strong></td>
                        <td>\(a_n = a_1 \cdot r^{n-1}\)</td>
                        <td>\(S_n = a_1 \frac{1 - r^n}{1 - r} \quad (r \neq 1)\)</td>
                    </tr>
                    <tr>
                        <td><strong>Infinite Geometric Series</strong></td>
                        <td>\(a_n = a_1 \cdot r^{n-1} \quad (|r| < 1)\)</td>
                        <td>\(S_\infty = \frac{a_1}{1 - r} \quad (\text{Convergent if } |r| < 1)\)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="math-formula-card">
            <div class="math-formula-title"><i class="fas fa-sigma"></i> Closed-Form Summation Formulas</div>
            <div class="math-equation-display">
                \[\sum_{k=1}^n 1 = n \qquad \sum_{k=1}^n k = \frac{n(n+1)}{2} \qquad \sum_{k=1}^n k^2 = \frac{n(n+1)(2n+1)}{6} \qquad \sum_{k=1}^n k^3 = \left[\frac{n(n+1)}{2}\right]^2\]
            </div>
        </div>

        <!-- 2.8 Worked Solutions -->
        <h3 id="sec-2-8">2.8 Worked Step-by-Step Problem Walkthroughs</h3>

        <div class="math-example-box">
            <div class="math-example-header"><i class="fas fa-pencil-alt"></i> Example 2.1: Solving a Quadratic with Complex Roots</div>
            <p>Solve the quadratic equation: \[2x^2 - 6x + 5 = 0\]</p>
            <div class="math-example-steps">
                <div><strong>Step 1 (Identify Coefficients):</strong> \(a = 2, b = -6, c = 5\)</div>
                <div><strong>Step 2 (Compute Discriminant):</strong> \(\Delta = b^2 - 4ac = (-6)^2 - 4(2)(5) = 36 - 40 = -4\)</div>
                <div><strong>Step 3 (Apply Quadratic Formula):</strong> \(x = \frac{-(-6) \pm \sqrt{-4}}{2(2)} = \frac{6 \pm 2i}{4}\)</div>
                <div><strong>Step 4 (Simplify Fractions):</strong> \(x = \frac{3}{2} \pm \frac{1}{2}i\)</div>
            </div>
            <div class="math-example-result"><i class="fas fa-check"></i> Exact Solutions: \(x = \frac{3}{2} + \frac{1}{2}i, \quad x = \frac{3}{2} - \frac{1}{2}i\)</div>
        </div>

        <!-- 2.9 Summary Sheet -->
        <section class="math-summary-sheet" id="sec-2-9">
            <div class="math-summary-header">
                <i class="fas fa-star" style="color: var(--color-primary, #6366f1); font-size: 1.5rem;"></i>
                <div>
                    <h3>Chapter 2 Reference Quick Sheet</h3>
                    <p style="margin: 0; font-size: 0.88rem; color: var(--color-text-secondary);">Core algebraic identities, equations, and series formulas</p>
                </div>
            </div>
            <div class="math-summary-grid">
                <div class="math-summary-col">
                    <h4>Factoring &amp; Powers</h4>
                    <ul>
                        <li>\(a^2 - b^2 = (a+b)(a-b)\)</li>
                        <li>\(a^3 \pm b^3 = (a \pm b)(a^2 \mp ab + b^2)\)</li>
                        <li>\((a+b)^n = \sum \binom{n}{k} a^{n-k}b^k\)</li>
                        <li>\(a^{-n} = 1/a^n, \; a^{m/n} = \sqrt[n]{a^m}\)</li>
                    </ul>
                </div>
                <div class="math-summary-col">
                    <h4>Quadratics &amp; Logarithms</h4>
                    <ul>
                        <li>\(x = \frac{-b \pm \sqrt{b^2-4ac}}{2a}\)</li>
                        <li>Vieta: \(r_1+r_2 = -b/a, \; r_1 r_2 = c/a\)</li>
                        <li>\(\log(xy) = \log x + \log y\)</li>
                        <li>\(\log_b x = \frac{\ln x}{\ln b}\)</li>
                    </ul>
                </div>
                <div class="math-summary-col">
                    <h4>Sequences &amp; Sums</h4>
                    <ul>
                        <li>Arithmetic: \(a_n = a_1 + (n-1)d\)</li>
                        <li>Geometric: \(S_n = a_1 \frac{1-r^n}{1-r}\)</li>
                        <li>Infinite: \(S_\infty = \frac{a_1}{1-r} \quad (|r|<1)\)</li>
                        <li>\(\sum_{k=1}^n k = \frac{n(n+1)}{2}\)</li>
                    </ul>
                </div>
            </div>
        </section>

    </div>
</div>
