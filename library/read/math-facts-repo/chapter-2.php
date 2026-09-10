<div class="cdn-book-reader-content">
    <h2>Chapter 2: Algebraic Identities &amp; Equations</h2>

    <div class="content-content">
        <p>Algebra provides the language for describing relationships between quantities. This chapter compiles the essential algebraic identities, factoring formulas, equation-solving techniques, and function rules used across all levels of mathematics.</p>

        <h3>2.1 Laws of Exponents</h3>
        <table class="ref-table">
            <thead><tr><th>Law</th><th>Formula</th><th>Example</th></tr></thead>
            <tbody>
                <tr><td>Product Rule</td><td>\(a^m \cdot a^n = a^{m+n}\)</td><td>\(x^3 \cdot x^4 = x^7\)</td></tr>
                <tr><td>Quotient Rule</td><td>\(\dfrac{a^m}{a^n} = a^{m-n}\)</td><td>\(\dfrac{x^5}{x^2} = x^3\)</td></tr>
                <tr><td>Power Rule</td><td>\((a^m)^n = a^{mn}\)</td><td>\((x^2)^3 = x^6\)</td></tr>
                <tr><td>Product to Power</td><td>\((ab)^n = a^n b^n\)</td><td>\((2x)^3 = 8x^3\)</td></tr>
                <tr><td>Zero Exponent</td><td>\(a^0 = 1 \quad (a \neq 0)\)</td><td>\(7^0 = 1\)</td></tr>
                <tr><td>Negative Exponent</td><td>\(a^{-n} = \dfrac{1}{a^n}\)</td><td>\(x^{-3} = \dfrac{1}{x^3}\)</td></tr>
                <tr><td>Fractional Exponent</td><td>\(a^{m/n} = \sqrt[n]{a^m}\)</td><td>\(8^{2/3} = (\sqrt[3]{8})^2 = 4\)</td></tr>
            </tbody>
        </table>

        <h3>2.2 Radical Rules</h3>
        <p>\(\sqrt{ab} = \sqrt{a}\cdot\sqrt{b}\) &nbsp;&nbsp; \(\sqrt{\dfrac{a}{b}} = \dfrac{\sqrt{a}}{\sqrt{b}}\) &nbsp;&nbsp; \((\sqrt{a})^2 = a\) &nbsp;&nbsp; \(\sqrt{a^2} = |a|\)</p>
        <p><strong>Rationalizing:</strong> \(\dfrac{1}{\sqrt{a}} = \dfrac{\sqrt{a}}{a}\) &nbsp;&nbsp; \(\dfrac{1}{\sqrt{a}+\sqrt{b}} = \dfrac{\sqrt{a}-\sqrt{b}}{a-b}\)</p>

        <h3>2.3 Polynomial Identities &amp; Factoring</h3>
        <table class="ref-table">
            <thead><tr><th>Name</th><th>Identity</th></tr></thead>
            <tbody>
                <tr><td>Square of a Sum</td><td>\((a+b)^2 = a^2 + 2ab + b^2\)</td></tr>
                <tr><td>Square of a Difference</td><td>\((a-b)^2 = a^2 - 2ab + b^2\)</td></tr>
                <tr><td>Difference of Squares</td><td>\(a^2 - b^2 = (a+b)(a-b)\)</td></tr>
                <tr><td>Sum of Cubes</td><td>\(a^3 + b^3 = (a+b)(a^2 - ab + b^2)\)</td></tr>
                <tr><td>Difference of Cubes</td><td>\(a^3 - b^3 = (a-b)(a^2 + ab + b^2)\)</td></tr>
                <tr><td>Cube of a Sum</td><td>\((a+b)^3 = a^3 + 3a^2b + 3ab^2 + b^3\)</td></tr>
                <tr><td>Cube of a Difference</td><td>\((a-b)^3 = a^3 - 3a^2b + 3ab^2 - b^3\)</td></tr>
                <tr><td>Perfect Square Trinomial</td><td>\(a^2 \pm 2ab + b^2 = (a \pm b)^2\)</td></tr>
            </tbody>
        </table>

        <h3>2.4 The Quadratic Formula</h3>
        <p>For any quadratic equation \(ax^2 + bx + c = 0\) where \(a \neq 0\):</p>
        <p>\[x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}\]</p>
        <p><strong>Discriminant \(\Delta = b^2 - 4ac\):</strong></p>
        <ul>
            <li>\(\Delta > 0\): Two distinct real roots</li>
            <li>\(\Delta = 0\): One real root (repeated) — the vertex touches the x-axis</li>
            <li>\(\Delta < 0\): Two complex conjugate roots — no real x-intercepts</li>
        </ul>
        <p><strong>Vieta's Formulas:</strong> For roots \(r_1\) and \(r_2\): &nbsp; \(r_1 + r_2 = -\dfrac{b}{a}\) &nbsp;&nbsp; \(r_1 \cdot r_2 = \dfrac{c}{a}\)</p>

        <h3>2.5 Logarithm Laws</h3>
        <p>The logarithm \(\log_b x = y\) means \(b^y = x\). <br><strong>Special values:</strong> \(\log_b 1 = 0\), \(\log_b b = 1\), \(\log_b 0\) is undefined.</p>
        <table class="ref-table">
            <thead><tr><th>Rule</th><th>Formula</th></tr></thead>
            <tbody>
                <tr><td>Product Rule</td><td>\(\log_b(xy) = \log_b x + \log_b y\)</td></tr>
                <tr><td>Quotient Rule</td><td>\(\log_b\!\left(\dfrac{x}{y}\right) = \log_b x - \log_b y\)</td></tr>
                <tr><td>Power Rule</td><td>\(\log_b(x^n) = n \log_b x\)</td></tr>
                <tr><td>Change of Base</td><td>\(\log_b x = \dfrac{\ln x}{\ln b} = \dfrac{\log x}{\log b}\)</td></tr>
                <tr><td>Inverse</td><td>\(b^{\log_b x} = x\) &nbsp; and &nbsp; \(\log_b(b^x) = x\)</td></tr>
                <tr><td>Natural Log</td><td>\(\ln x = \log_e x\) where \(e \approx 2.71828\)</td></tr>
            </tbody>
        </table>

        <h3>2.6 Linear Equations &amp; Systems</h3>
        <p><strong>Slope-Intercept Form:</strong> \(y = mx + b\) &nbsp; (slope \(m\), y-intercept \(b\))</p>
        <p><strong>Point-Slope Form:</strong> \(y - y_1 = m(x - x_1)\)</p>
        <p><strong>Standard Form:</strong> \(Ax + By = C\)</p>
        <p><strong>Slope between two points:</strong> \(m = \dfrac{y_2 - y_1}{x_2 - x_1}\)</p>
        <p><strong>Parallel lines:</strong> same slope, \(m_1 = m_2\) &nbsp;&nbsp; <strong>Perpendicular lines:</strong> \(m_1 \cdot m_2 = -1\)</p>
        <p><strong>System Solution Methods:</strong> Substitution, Elimination, Graphing, Cramer's Rule (for \(2\times2\)): \(x = \dfrac{D_x}{D}\), \(y = \dfrac{D_y}{D}\)</p>

        <h3>2.7 Inequalities</h3>
        <p>Key rule: <strong>when multiplying or dividing by a negative number, reverse the inequality sign.</strong></p>
        <p>\(|x| < a \Rightarrow -a < x < a\) &nbsp;&nbsp; \(|x| > a \Rightarrow x < -a \text{ or } x > a\)</p>

        <h3>2.8 Sequences &amp; Series</h3>
        <p><strong>Arithmetic Sequence:</strong> \(a_n = a_1 + (n-1)d\) &nbsp;&nbsp; Sum: \(S_n = \dfrac{n}{2}(a_1 + a_n) = \dfrac{n}{2}[2a_1 + (n-1)d]\)</p>
        <p><strong>Geometric Sequence:</strong> \(a_n = a_1 \cdot r^{n-1}\) &nbsp;&nbsp; Sum: \(S_n = a_1\dfrac{1-r^n}{1-r}\) &nbsp; \((r \neq 1)\)</p>
        <p><strong>Infinite Geometric Series</strong> \((|r| &lt; 1)\): \(S = \dfrac{a_1}{1-r}\)</p>
        <p><strong>Sum of first \(n\) integers:</strong> \(1+2+\cdots+n = \dfrac{n(n+1)}{2}\)</p>
        <p><strong>Sum of first \(n\) squares:</strong> \(\displaystyle\sum_{k=1}^n k^2 = \dfrac{n(n+1)(2n+1)}{6}\)</p>
    </div>
</div>
