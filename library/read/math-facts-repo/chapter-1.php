<div class="cdn-book-reader-content">
    <h2>Chapter 1: Arithmetic, Primes &amp; Number Systems</h2>

    <div class="content-content">
        <p>Mathematics begins with the properties of numbers — how they are classified, how they interact, and what rules govern their behavior. This chapter is a reference compendium for core arithmetic laws, prime number theory, divisibility rules, and the full hierarchy of the number system. All formulas are typeset with MathJax for precision.</p>

        <h3>1.1 The Number System Hierarchy</h3>
        <table class="ref-table">
            <thead><tr><th>Set</th><th>Symbol</th><th>Definition</th><th>Examples</th></tr></thead>
            <tbody>
                <tr><td>Natural Numbers</td><td>\(\mathbb{N}\)</td><td>Positive integers used for counting</td><td>\(1, 2, 3, 4, \ldots\)</td></tr>
                <tr><td>Whole Numbers</td><td>\(\mathbb{W}\)</td><td>Natural numbers plus zero</td><td>\(0, 1, 2, 3, \ldots\)</td></tr>
                <tr><td>Integers</td><td>\(\mathbb{Z}\)</td><td>All whole numbers and their negatives</td><td>\(\ldots, -2, -1, 0, 1, 2, \ldots\)</td></tr>
                <tr><td>Rational Numbers</td><td>\(\mathbb{Q}\)</td><td>Numbers expressible as \(\frac{p}{q}\), \(q \neq 0\)</td><td>\(\frac{1}{2}, 0.75, -3\)</td></tr>
                <tr><td>Irrational Numbers</td><td>\(\mathbb{I}\)</td><td>Non-terminating, non-repeating decimals</td><td>\(\pi, \sqrt{2}, e\)</td></tr>
                <tr><td>Real Numbers</td><td>\(\mathbb{R}\)</td><td>All rational and irrational numbers</td><td>All points on the number line</td></tr>
                <tr><td>Complex Numbers</td><td>\(\mathbb{C}\)</td><td>Numbers of the form \(a + bi\)</td><td>\(3+2i, -1+0i\)</td></tr>
            </tbody>
        </table>

        <h3>1.2 Properties of Real Numbers</h3>
        <table class="ref-table">
            <thead><tr><th>Property</th><th>Addition</th><th>Multiplication</th></tr></thead>
            <tbody>
                <tr><td><strong>Commutative</strong></td><td>\(a + b = b + a\)</td><td>\(a \cdot b = b \cdot a\)</td></tr>
                <tr><td><strong>Associative</strong></td><td>\((a+b)+c = a+(b+c)\)</td><td>\((ab)c = a(bc)\)</td></tr>
                <tr><td><strong>Distributive</strong></td><td colspan="2">\(a(b+c) = ab + ac\)</td></tr>
                <tr><td><strong>Identity</strong></td><td>\(a + 0 = a\)</td><td>\(a \cdot 1 = a\)</td></tr>
                <tr><td><strong>Inverse</strong></td><td>\(a + (-a) = 0\)</td><td>\(a \cdot \frac{1}{a} = 1 \quad (a \neq 0)\)</td></tr>
                <tr><td><strong>Zero Product</strong></td><td colspan="2">\(a \cdot 0 = 0\)</td></tr>
            </tbody>
        </table>

        <h3>1.3 Order of Operations (PEMDAS / BODMAS)</h3>
        <p>When evaluating an expression, always apply operations in this order:</p>
        <ol>
            <li><strong>P</strong>arentheses / Brackets: \((\ )\), \([\ ]\), \(\{\ \}\)</li>
            <li><strong>E</strong>xponents / Orders: \(a^n\), \(\sqrt{a}\)</li>
            <li><strong>M</strong>ultiplication &amp; <strong>D</strong>ivision — left to right</li>
            <li><strong>A</strong>ddition &amp; <strong>S</strong>ubtraction — left to right</li>
        </ol>
        <p><em>Example:</em> \(3 + 6 \times (5 + 4) \div 3 - 7 = 3 + 6 \times 9 \div 3 - 7 = 3 + 18 - 7 = 14\)</p>

        <h3>1.4 Divisibility Rules</h3>
        <table class="ref-table">
            <thead><tr><th>Divisible by</th><th>Rule</th><th>Example</th></tr></thead>
            <tbody>
                <tr><td>2</td><td>Last digit is even (0, 2, 4, 6, 8)</td><td>128 ✓</td></tr>
                <tr><td>3</td><td>Sum of digits is divisible by 3</td><td>123 → 1+2+3=6 ✓</td></tr>
                <tr><td>4</td><td>Last two digits divisible by 4</td><td>316 → 16÷4=4 ✓</td></tr>
                <tr><td>5</td><td>Last digit is 0 or 5</td><td>205 ✓</td></tr>
                <tr><td>6</td><td>Divisible by both 2 and 3</td><td>114 ✓</td></tr>
                <tr><td>7</td><td>Double last digit, subtract from rest; repeat</td><td>203 → 20−6=14 ✓</td></tr>
                <tr><td>8</td><td>Last three digits divisible by 8</td><td>1,024 → 024÷8=3 ✓</td></tr>
                <tr><td>9</td><td>Sum of digits divisible by 9</td><td>729 → 7+2+9=18 ✓</td></tr>
                <tr><td>10</td><td>Last digit is 0</td><td>340 ✓</td></tr>
                <tr><td>11</td><td>Alternating digit sum is divisible by 11</td><td>121 → 1−2+1=0 ✓</td></tr>
            </tbody>
        </table>

        <h3>1.5 Prime Numbers &amp; Prime Factorization</h3>
        <p>A <strong>prime number</strong> is a natural number greater than 1 that has no positive divisors other than 1 and itself.</p>
        <p><strong>First 25 primes:</strong> 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97</p>
        <p><strong>Fundamental Theorem of Arithmetic:</strong> Every integer greater than 1 can be represented uniquely as a product of prime numbers (ignoring order).</p>
        <p><em>Example:</em> \(360 = 2^3 \times 3^2 \times 5\)</p>

        <h3>1.6 GCF &amp; LCM</h3>
        <p><strong>Greatest Common Factor (GCF)</strong> — largest factor shared by two or more numbers.<br>
        <em>Method:</em> List prime factorizations, multiply common prime factors at their lowest powers.</p>
        <p>\(\gcd(48, 36) = 2^2 \times 3 = 12\)</p>
        <p><strong>Least Common Multiple (LCM)</strong> — smallest multiple shared by two or more numbers.<br>
        <em>Method:</em> Multiply all prime factors at their highest powers.</p>
        <p>\(\text{lcm}(48, 36) = 2^4 \times 3^2 = 144\)</p>
        <p><strong>Key relationship:</strong> \(\gcd(a,b) \times \text{lcm}(a,b) = a \times b\)</p>

        <h3>1.7 Absolute Value &amp; Integers</h3>
        <p>\(|a| = a \text{ if } a \geq 0, \quad |a| = -a \text{ if } a &lt; 0\)</p>
        <p>Properties: \(|ab| = |a||b|\), \(\left|\dfrac{a}{b}\right| = \dfrac{|a|}{|b|}\), \(|a+b| \leq |a| + |b|\) (Triangle Inequality)</p>

        <h3>1.8 Fractions, Decimals &amp; Percents</h3>
        <p><strong>Converting:</strong> Fraction → Decimal: divide numerator by denominator.<br>
        Decimal → Percent: multiply by 100.<br>
        Percent → Decimal: divide by 100.</p>
        <table class="ref-table">
            <thead><tr><th>Fraction</th><th>Decimal</th><th>Percent</th></tr></thead>
            <tbody>
                <tr><td>\(\frac{1}{4}\)</td><td>0.25</td><td>25%</td></tr>
                <tr><td>\(\frac{1}{3}\)</td><td>0.333…</td><td>33.3̄%</td></tr>
                <tr><td>\(\frac{1}{2}\)</td><td>0.5</td><td>50%</td></tr>
                <tr><td>\(\frac{2}{3}\)</td><td>0.666…</td><td>66.6̄%</td></tr>
                <tr><td>\(\frac{3}{4}\)</td><td>0.75</td><td>75%</td></tr>
                <tr><td>\(\frac{1}{8}\)</td><td>0.125</td><td>12.5%</td></tr>
                <tr><td>\(\frac{1}{5}\)</td><td>0.2</td><td>20%</td></tr>
            </tbody>
        </table>
    </div>
</div>
