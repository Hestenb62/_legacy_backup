<div class="cdn-book-reader-content">
    <div class="math-section-badge"><i class="fas fa-square-root-alt"></i> Part I: Foundational Mathematics</div>
    <h2>Chapter 1: Number Systems, Arithmetic Laws &amp; Number Theory</h2>

    <div class="content-content">
        <p>Mathematics begins with numbers — their formal axiomatic classifications, operational properties, and the structural rules governing prime numbers, divisibility, and common factors. This chapter serves as a rigorous, publication-grade mathematical reference compendium. All mathematical formulas and notations are rendered dynamically via MathJax SVG with full accessibility and responsive font scaling.</p>

        <!-- Quick Section Navigation -->
        <nav class="math-toc-pills" aria-label="Chapter 1 Quick Navigation">
            <a href="#sec-1-1" class="math-toc-pill"><i class="fas fa-layer-group"></i> 1.1 Number Sets</a>
            <a href="#sec-1-2" class="math-toc-pill"><i class="fas fa-balance-scale"></i> 1.2 Field Axioms</a>
            <a href="#sec-1-3" class="math-toc-pill"><i class="fas fa-sort-numeric-down"></i> 1.3 PEMDAS Order</a>
            <a href="#sec-1-4" class="math-toc-pill"><i class="fas fa-divide"></i> 1.4 Divisibility Rules</a>
            <a href="#sec-1-5" class="math-toc-pill"><i class="fas fa-hashtag"></i> 1.5 Prime Numbers</a>
            <a href="#sec-1-6" class="math-toc-pill"><i class="fas fa-link"></i> 1.6 GCF &amp; LCM</a>
            <a href="#sec-1-7" class="math-toc-pill"><i class="fas fa-arrows-alt-h"></i> 1.7 Absolute Value</a>
            <a href="#sec-1-8" class="math-toc-pill"><i class="fas fa-percentage"></i> 1.8 Fractions &amp; Decimals</a>
            <a href="#sec-1-9" class="math-toc-pill"><i class="fas fa-pen-fancy"></i> 1.9 Worked Solutions</a>
            <a href="#sec-1-10" class="math-toc-pill"><i class="fas fa-clipboard-list"></i> 1.10 Summary Sheet</a>
        </nav>

        <!-- 1.1 Number System Hierarchy -->
        <h3 id="sec-1-1">1.1 The Formal Number System Hierarchy</h3>
        <p>Numbers are categorized into nested sets, each expanding the algebraic operations that can be performed without leaving the domain. The set inclusion relation is strictly ordered as: \[\mathbb{N} \subset \mathbb{W} \subset \mathbb{Z} \subset \mathbb{Q} \subset \mathbb{R} \subset \mathbb{C}\]</p>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Number Set</th>
                        <th scope="col">Symbol</th>
                        <th scope="col">Formal Definition / Set-Builder Notation</th>
                        <th scope="col">Representative Elements</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Natural Numbers</strong></td>
                        <td>\(\mathbb{N}\)</td>
                        <td>Positive counting integers: \(\{n \in \mathbb{Z} \mid n > 0\}\)</td>
                        <td>\(1, 2, 3, 4, 5, \ldots\)</td>
                    </tr>
                    <tr>
                        <td><strong>Whole Numbers</strong></td>
                        <td>\(\mathbb{W}\)</td>
                        <td>Non-negative integers: \(\mathbb{N} \cup \{0\}\)</td>
                        <td>\(0, 1, 2, 3, 4, \ldots\)</td>
                    </tr>
                    <tr>
                        <td><strong>Integers</strong></td>
                        <td>\(\mathbb{Z}\)</td>
                        <td>Whole numbers and additive inverses: \(\{\ldots, -2, -1, 0, 1, 2, \ldots\}\)</td>
                        <td>\(-340, -3, 0, 17, 1024\)</td>
                    </tr>
                    <tr>
                        <td><strong>Rational Numbers</strong></td>
                        <td>\(\mathbb{Q}\)</td>
                        <td>Quotients of integers: \(\left\{\frac{p}{q} \;\middle|\; p, q \in \mathbb{Z}, q \neq 0\right\}\)</td>
                        <td>\(\frac{3}{4}, -\frac{22}{7}, 0.375, 4.\bar{6}\)</td>
                    </tr>
                    <tr>
                        <td><strong>Irrational Numbers</strong></td>
                        <td>\(\mathbb{I} \text{ or } \mathbb{R} \setminus \mathbb{Q}\)</td>
                        <td>Real numbers with non-repeating, non-terminating expansions</td>
                        <td>\(\pi \approx 3.14159, \sqrt{2}, e \approx 2.71828, \varphi\)</td>
                    </tr>
                    <tr>
                        <td><strong>Real Numbers</strong></td>
                        <td>\(\mathbb{R}\)</td>
                        <td>The complete topological continuum: \(\mathbb{Q} \cup \mathbb{I}\)</td>
                        <td>All points on the continuous number line</td>
                    </tr>
                    <tr>
                        <td><strong>Complex Numbers</strong></td>
                        <td>\(\mathbb{C}\)</td>
                        <td>Pairs with imaginary unit: \(\{a + bi \mid a, b \in \mathbb{R}, i^2 = -1\}\)</td>
                        <td>\(3 + 4i, -2.5i, \frac{1}{\sqrt{2}} - \frac{i}{\sqrt{2}}\)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 1.2 Field Axioms -->
        <h3 id="sec-1-2">1.2 Algebraic Field Axioms of Real Numbers</h3>
        <p>The set of real numbers \(\mathbb{R}\) equipped with addition \((+)\) and multiplication \((\cdot)\) constitutes a complete ordered mathematical field obeying the fundamental axioms below for all \(a, b, c \in \mathbb{R}\):</p>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Axiom / Property</th>
                        <th scope="col">Additive Formulation</th>
                        <th scope="col">Multiplicative Formulation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Closure</strong></td>
                        <td>\(a + b \in \mathbb{R}\)</td>
                        <td>\(a \cdot b \in \mathbb{R}\)</td>
                    </tr>
                    <tr>
                        <td><strong>Commutativity</strong></td>
                        <td>\(a + b = b + a\)</td>
                        <td>\(a \cdot b = b \cdot a\)</td>
                    </tr>
                    <tr>
                        <td><strong>Associativity</strong></td>
                        <td>\((a + b) + c = a + (b + c)\)</td>
                        <td>\((a \cdot b) \cdot c = a \cdot (b \cdot c)\)</td>
                    </tr>
                    <tr>
                        <td><strong>Distributivity</strong></td>
                        <td colspan="2" style="text-align: center;">\(a \cdot (b + c) = (a \cdot b) + (a \cdot c) \quad \text{and} \quad (a + b) \cdot c = ac + bc\)</td>
                    </tr>
                    <tr>
                        <td><strong>Identity Element</strong></td>
                        <td>\(a + 0 = a \quad (\text{Additive Identity: } 0)\)</td>
                        <td>\(a \cdot 1 = a \quad (\text{Multiplicative Identity: } 1)\)</td>
                    </tr>
                    <tr>
                        <td><strong>Inverse Element</strong></td>
                        <td>\(a + (-a) = 0 \quad (\text{Opposite})\)</td>
                        <td>\(a \cdot \frac{1}{a} = 1 \quad (a \neq 0, \text{ Reciprocal})\)</td>
                    </tr>
                    <tr>
                        <td><strong>Zero Product Law</strong></td>
                        <td colspan="2" style="text-align: center;">\(a \cdot 0 = 0 \quad \text{and} \quad a \cdot b = 0 \iff a = 0 \lor b = 0\)</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 1.3 Order of Operations -->
        <h3 id="sec-1-3">1.3 Order of Operations (PEMDAS / BODMAS)</h3>
        <p>To eliminate ambiguity in multi-operator mathematical expressions, evaluate operations in strict sequential precedence from highest to lowest rank:</p>

        <div class="math-formula-grid">
            <div class="math-grid-card">
                <h4><i class="fas fa-parentheses"></i> 1. Parentheses &amp; Grouping</h4>
                <p>Innermost to outermost: \((\;)\), \([\;\], \{\;\}\), radical bars \(\sqrt{\dots}\), and fractional dividing bars \(\frac{\text{num}}{\text{den}}\).</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-superscript"></i> 2. Exponents &amp; Roots</h4>
                <p>Powers, indices, and radical extraction from right to left: \(x^n\), \(\sqrt[n]{x}\), \(e^x\).</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-times"></i> 3. Multiplication &amp; Division</h4>
                <p>Equal operator precedence; evaluate strictly from <strong>left to right</strong> across the expression.</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-plus"></i> 4. Addition &amp; Subtraction</h4>
                <p>Equal operator precedence; evaluate strictly from <strong>left to right</strong> across the expression.</p>
            </div>
        </div>

        <div class="math-example-box">
            <div class="math-example-header"><i class="fas fa-calculator"></i> Example 1.1: Multi-Step Expression Evaluation</div>
            <p>Evaluate the expression: \[E = 48 \div 2(9 + 3) - \sqrt{16} \times 2^3\]</p>
            <div class="math-example-steps">
                <div><strong>Step 1 (Parentheses):</strong> \(9 + 3 = 12 \implies E = 48 \div 2(12) - \sqrt{16} \times 2^3\)</div>
                <div><strong>Step 2 (Exponents &amp; Roots):</strong> \(\sqrt{16} = 4\) and \(2^3 = 8 \implies E = 48 \div 2 \times 12 - 4 \times 8\)</div>
                <div><strong>Step 3 (Multiplication &amp; Division Left-to-Right):</strong> \(48 \div 2 = 24\), then \(24 \times 12 = 288\), then \(4 \times 8 = 32\)</div>
                <div><strong>Step 4 (Subtraction):</strong> \(288 - 32 = 256\)</div>
            </div>
            <div class="math-example-result"><i class="fas fa-check"></i> Final Solution: \(E = 256\)</div>
        </div>

        <!-- 1.4 Divisibility Rules -->
        <h3 id="sec-1-4">1.4 Divisibility Theorems &amp; Modular Congruence</h3>
        <p>An integer \(n\) is divisible by integer \(d\) (written \(d \mid n\)) if there exists an integer \(k\) such that \(n = d \cdot k\) with remainder \(r = 0\).</p>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Divisor \(d\)</th>
                        <th scope="col">Analytical Divisibility Condition</th>
                        <th scope="col">Worked Demonstration</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>\(2\)</td><td>The terminal digit is even: \(d_0 \in \{0, 2, 4, 6, 8\}\)</td><td>\(1\,498 \to 8\) is even \(\implies 2 \mid 1498\)</td></tr>
                    <tr><td>\(3\)</td><td>The digit sum is congruent to \(0 \pmod 3\): \(\sum d_i \equiv 0 \pmod 3\)</td><td>\(7\,431 \to 7+4+3+1 = 15 \to 3 \mid 15\) ✓</td></tr>
                    <tr><td>\(4\)</td><td>The last two digits form a number divisible by \(4\): \(10d_1 + d_0 \equiv 0 \pmod 4\)</td><td>\(5\,316 \to 16 \div 4 = 4\) ✓</td></tr>
                    <tr><td>\(5\)</td><td>The terminal digit is \(0\) or \(5\): \(d_0 \in \{0, 5\}\)</td><td>\(8\,245 \to d_0 = 5\) ✓</td></tr>
                    <tr><td>\(6\)</td><td>Simultaneously divisible by both \(2\) and \(3\)</td><td>\(924 \to \text{even and } 9+2+4=15\) ✓</td></tr>
                    <tr><td>\(7\)</td><td>Double the last digit and subtract from the truncated number: \(n' - 2d_0 \equiv 0 \pmod 7\)</td><td>\(2\,429 \to 242 - 2(9) = 224 \to 22 - 2(4) = 14 = 7 \times 2\) ✓</td></tr>
                    <tr><td>\(8\)</td><td>The last three digits form a number divisible by \(8\)</td><td>\(15\,104 \to 104 \div 8 = 13\) ✓</td></tr>
                    <tr><td>\(9\)</td><td>The digit sum is congruent to \(0 \pmod 9\): \(\sum d_i \equiv 0 \pmod 9\)</td><td>\(8\,739 \to 8+7+3+9 = 27 = 9 \times 3\) ✓</td></tr>
                    <tr><td>\(10\)</td><td>The terminal digit is zero: \(d_0 = 0\)</td><td>\(4\,950 \to d_0 = 0\) ✓</td></tr>
                    <tr><td>\(11\)</td><td>Alternating sum of digits is divisible by \(11\): \(\sum (-1)^i d_i \equiv 0 \pmod{11}\)</td><td>\(91\,839 \to 9 - 3 + 8 - 1 + 9 = 22 = 11 \times 2\) ✓</td></tr>
                    <tr><td>\(12\)</td><td>Simultaneously divisible by both \(3\) and \(4\)</td><td>\(1\,536 \to 3 \mid 15 \text{ and } 4 \mid 36\) ✓</td></tr>
                    <tr><td>\(13\)</td><td>Multiply the last digit by \(4\) and add to the truncated number: \(n' + 4d_0 \equiv 0 \pmod{13}\)</td><td>\(845 \to 84 + 4(5) = 104 \to 10 + 4(4) = 26 = 13 \times 2\) ✓</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 1.5 Prime Numbers -->
        <h3 id="sec-1-5">1.5 Prime Numbers &amp; Prime Factorization</h3>
        
        <div class="math-def-box">
            <div class="math-def-header">
                <h4 class="math-def-title"><i class="fas fa-cube"></i> Definition 1.1: Prime &amp; Composite Numbers</h4>
                <span class="math-def-chip">Number Theory</span>
            </div>
            <p>An integer \(p > 1\) is a <strong>prime number</strong> if its only positive divisors are \(1\) and \(p\). An integer \(n > 1\) that is not prime is termed a <strong>composite number</strong>. The integer \(1\) is by definition neither prime nor composite.</p>
        </div>

        <div class="math-theorem-box">
            <div class="math-theorem-header">
                <h4 class="math-theorem-title"><i class="fas fa-award"></i> Theorem 1.1: Fundamental Theorem of Arithmetic</h4>
                <span class="math-theorem-badge">Prime Factorization</span>
            </div>
            <p>Every integer \(n \geq 2\) can be uniquely expressed as a finite product of prime powers up to the ordering of the factors: \[n = p_1^{a_1} \cdot p_2^{a_2} \cdot p_3^{a_3} \cdots p_k^{a_k} = \prod_{i=1}^k p_i^{a_i}\] where \(p_1 < p_2 < \dots < p_k\) are distinct prime numbers and each exponent \(a_i \in \mathbb{N}\).</p>
        </div>

        <div class="math-formula-card">
            <div class="math-formula-title"><i class="fas fa-list-ol"></i> Compendium of the First 50 Prime Numbers</div>
            <p style="line-height: 2.2; font-family: 'JetBrains Mono', monospace; font-size: 0.95rem;">
                <strong>1–25:</strong> 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97<br>
                <strong>26–50:</strong> 101, 103, 107, 109, 113, 127, 131, 137, 139, 149, 151, 157, 163, 167, 173, 179, 181, 191, 193, 197, 199, 211, 223, 227, 229
            </p>
        </div>

        <!-- 1.6 GCF & LCM -->
        <h3 id="sec-1-6">1.6 Greatest Common Divisor (GCD) &amp; Least Common Multiple (LCM)</h3>
        <p>Given prime canonical factorizations \(a = \prod p_i^{\alpha_i}\) and \(b = \prod p_i^{\beta_i}\):</p>

        <div class="math-formula-grid">
            <div class="math-grid-card">
                <h4><i class="fas fa-compress-arrows-alt"></i> Greatest Common Divisor</h4>
                <p>\[\gcd(a, b) = \prod_{i=1}^k p_i^{\min(\alpha_i, \beta_i)}\]</p>
                <p>The largest integer dividing both \(a\) and \(b\).</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-expand-arrows-alt"></i> Least Common Multiple</h4>
                <p>\[\text{lcm}(a, b) = \prod_{i=1}^k p_i^{\max(\alpha_i, \beta_i)}\]</p>
                <p>The smallest positive integer divisible by both \(a\) and \(b\).</p>
            </div>
        </div>

        <div class="math-theorem-box">
            <div class="math-theorem-header">
                <h4 class="math-theorem-title"><i class="fas fa-exchange-alt"></i> Theorem 1.2: GCD-LCM Duality Identity</h4>
                <span class="math-theorem-badge">Fundamental Identity</span>
            </div>
            <p>For all positive integers \(a, b \in \mathbb{Z}^+\): \[\gcd(a, b) \times \text{lcm}(a, b) = a \cdot b\]</p>
        </div>

        <!-- 1.7 Absolute Value -->
        <h3 id="sec-1-7">1.7 Absolute Value &amp; Metric Norms</h3>
        <p>The absolute value function \(|x|: \mathbb{R} \to [0, \infty)\) represents the geometric Euclidean distance from \(x\) to the origin on the real line.</p>

        <div class="math-def-box">
            <div class="math-def-header">
                <h4 class="math-def-title"><i class="fas fa-ruler-combined"></i> Definition 1.2: Piecewise Absolute Value</h4>
                <span class="math-def-chip">Analysis</span>
            </div>
            <p>\[|x| = \begin{cases} x & \text{if } x \geq 0 \\ -x & \text{if } x < 0 \end{cases}\]</p>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr><th scope="col">Property Name</th><th scope="col">Mathematical Formulation</th><th scope="col">Analytical Description</th></tr>
                </thead>
                <tbody>
                    <tr><td><strong>Non-Negativity</strong></td><td>\(|a| \geq 0\) and \(|a| = 0 \iff a = 0\)</td><td>Distance is strictly positive for non-zero points</td></tr>
                    <tr><td><strong>Multiplicativity</strong></td><td>\(|a \cdot b| = |a| \cdot |b|\)</td><td>The norm of a product equals the product of norms</td></tr>
                    <tr><td><strong>Quotient Rule</strong></td><td>\(\left|\frac{a}{b}\right| = \frac{|a|}{|b|} \quad (b \neq 0)\)</td><td>Preserved under division</td></tr>
                    <tr><td><strong>Triangle Inequality</strong></td><td>\(|a + b| \leq |a| + |b|\)</td><td>Direct metric path cannot exceed indirect paths</td></tr>
                    <tr><td><strong>Reverse Triangle</strong></td><td>\(||a| - |b|| \leq |a - b|\)</td><td>Lower bound on difference of distances</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 1.8 Fractions & Decimals -->
        <h3 id="sec-1-8">1.8 Fraction, Decimal, Ratio &amp; Percentage Reference</h3>
        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Fraction \(\frac{p}{q}\)</th>
                        <th scope="col">Decimal Expansion</th>
                        <th scope="col">Percentage</th>
                        <th scope="col">Unit Fraction Type</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>\(\frac{1}{2}\)</td><td>\(0.5\)</td><td>\(50\%\)</td><td>Terminating (Halves)</td></tr>
                    <tr><td>\(\frac{1}{3}\)</td><td>\(0.\bar{3} = 0.3333\dots\)</td><td>\(33.\bar{3}\%\)</td><td>Repeating (Thirds)</td></tr>
                    <tr><td>\(\frac{2}{3}\)</td><td>\(0.\bar{6} = 0.6666\dots\)</td><td>\(66.\bar{6}\%\)</td><td>Repeating (Thirds)</td></tr>
                    <tr><td>\(\frac{1}{4}\)</td><td>\(0.25\)</td><td>\(25\%\)</td><td>Terminating (Fourths)</td></tr>
                    <tr><td>\(\frac{3}{4}\)</td><td>\(0.75\)</td><td>\(75\%\)</td><td>Terminating (Fourths)</td></tr>
                    <tr><td>\(\frac{1}{5}\)</td><td>\(0.2\)</td><td>\(20\%\)</td><td>Terminating (Fifths)</td></tr>
                    <tr><td>\(\frac{1}{6}\)</td><td>\(0.1\bar{6} = 0.1666\dots\)</td><td>\(16.\bar{6}\%\)</td><td>Mixed Repeating (Sixths)</td></tr>
                    <tr><td>\(\frac{1}{7}\)</td><td>\(0.\overline{142857}\)</td><td>\(14.2857\%\)</td><td>Full Period Repeating (Sevenths)</td></tr>
                    <tr><td>\(\frac{1}{8}\)</td><td>\(0.125\)</td><td>\(12.5\%\)</td><td>Terminating (Eighths)</td></tr>
                    <tr><td>\(\frac{3}{8}\)</td><td>\(0.375\)</td><td>\(37.5\%\)</td><td>Terminating (Eighths)</td></tr>
                    <tr><td>\(\frac{1}{9}\)</td><td>\(0.\bar{1} = 0.1111\dots\)</td><td>\(11.\bar{1}\%\)</td><td>Single Period Repeating (Ninths)</td></tr>
                    <tr><td>\(\frac{1}{10}\)</td><td>\(0.1\)</td><td>\(10\%\)</td><td>Terminating (Tenths)</td></tr>
                    <tr><td>\(\frac{1}{12}\)</td><td>\(0.08\bar{3} = 0.08333\dots\)</td><td>\(8.3\bar{3}\%\)</td><td>Mixed Repeating (Twelfths)</td></tr>
                    <tr><td>\(\frac{1}{16}\)</td><td>\(0.0625\)</td><td>\(6.25\%\)</td><td>Terminating (Sixteenths)</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 1.9 Worked Solutions -->
        <h3 id="sec-1-9">1.9 Worked Step-by-Step Solutions &amp; Common Pitfalls</h3>

        <div class="math-caution-box">
            <div class="math-caution-header"><i class="fas fa-exclamation-triangle"></i> Caution 1.1: Division by Zero is Undefined</div>
            <p>In any algebraic field, the operation \(\frac{a}{0}\) has no valid definition. If \(\frac{a}{0} = x\), then \(a = 0 \cdot x = 0\), which is impossible for \(a \neq 0\), and indeterminate \(\frac{0}{0}\) for \(a = 0\).</p>
        </div>

        <div class="math-example-box">
            <div class="math-example-header"><i class="fas fa-cogs"></i> Example 1.2: Euclidean Algorithm for GCF</div>
            <p>Compute \(\gcd(1071, 462)\) using successive division:</p>
            <div class="math-example-steps">
                <div>\(1071 = 462 \times 2 + 147\)</div>
                <div>\(462 = 147 \times 3 + 21\)</div>
                <div>\(147 = 21 \times 7 + 0\)</div>
            </div>
            <div class="math-example-result"><i class="fas fa-check"></i> Last Non-Zero Remainder: \(\gcd(1071, 462) = 21\)</div>
        </div>

        <!-- 1.10 Summary Cheat Sheet -->
        <section class="math-summary-sheet" id="sec-1-10">
            <div class="math-summary-header">
                <i class="fas fa-star" style="color: var(--color-primary, #6366f1); font-size: 1.5rem;"></i>
                <div>
                    <h3>Chapter 1 Reference Quick Sheet</h3>
                    <p style="margin: 0; font-size: 0.88rem; color: var(--color-text-secondary);">Core formulas, axioms, and identities at a glance</p>
                </div>
            </div>
            <div class="math-summary-grid">
                <div class="math-summary-col">
                    <h4>Sets &amp; Notation</h4>
                    <ul>
                        <li>\(\mathbb{N} \subset \mathbb{W} \subset \mathbb{Z} \subset \mathbb{Q} \subset \mathbb{R} \subset \mathbb{C}\)</li>
                        <li>Natural: \(\{1, 2, 3, \dots\}\)</li>
                        <li>Integers: \(\{\dots, -1, 0, 1, \dots\}\)</li>
                        <li>Rationals: \(p/q, q \neq 0\)</li>
                    </ul>
                </div>
                <div class="math-summary-col">
                    <h4>Field Axioms</h4>
                    <ul>
                        <li>\(a+b = b+a\) (Commutative)</li>
                        <li>\((ab)c = a(bc)\) (Associative)</li>
                        <li>\(a(b+c) = ab + ac\) (Distributive)</li>
                        <li>\(a \cdot \frac{1}{a} = 1 \quad (a \neq 0)\)</li>
                    </ul>
                </div>
                <div class="math-summary-col">
                    <h4>Prime &amp; GCD Laws</h4>
                    <ul>
                        <li>Fundamental Thm: \(n = \prod p_i^{a_i}\)</li>
                        <li>\(\gcd(a,b) \times \text{lcm}(a,b) = ab\)</li>
                        <li>Triangle Ineq: \(|a+b| \leq |a|+|b|\)</li>
                        <li>Euclidean Algorithm: \(\gcd(a,b) = \gcd(b, r)\)</li>
                    </ul>
                </div>
            </div>
        </section>

    </div>
</div>
