<div class="cdn-book-reader-content">
    <h2>Chapter 4: Calculus Essentials &amp; Mathematical Constants</h2>

    <div class="content-content">
        <p>Calculus studies how quantities change (differentiation) and how accumulated change is measured (integration). This chapter provides a complete reference for derivative rules, integral formulas, key theorems, and the fundamental mathematical constants used throughout all of mathematics and science.</p>

        <h3>4.1 Limits</h3>
        <p><strong>Definition:</strong> \(\displaystyle\lim_{x \to a} f(x) = L\) means \(f(x)\) approaches \(L\) as \(x\) approaches \(a\).</p>
        <table class="ref-table">
            <thead><tr><th>Limit Rule</th><th>Formula</th></tr></thead>
            <tbody>
                <tr><td>Sum / Difference</td><td>\(\lim[f \pm g] = \lim f \pm \lim g\)</td></tr>
                <tr><td>Product</td><td>\(\lim[fg] = \lim f \cdot \lim g\)</td></tr>
                <tr><td>Quotient</td><td>\(\lim\dfrac{f}{g} = \dfrac{\lim f}{\lim g} \quad (\lim g \neq 0)\)</td></tr>
                <tr><td>Squeeze Theorem</td><td>If \(g(x) \leq f(x) \leq h(x)\) and \(\lim g = \lim h = L\), then \(\lim f = L\)</td></tr>
                <tr><td>Special</td><td>\(\displaystyle\lim_{x\to 0}\frac{\sin x}{x} = 1\) &nbsp;&nbsp; \(\displaystyle\lim_{x\to 0}\frac{1-\cos x}{x} = 0\)</td></tr>
                <tr><td>Special</td><td>\(\displaystyle\lim_{x\to\infty}\left(1+\frac{1}{x}\right)^x = e\)</td></tr>
            </tbody>
        </table>

        <h3>4.2 Derivative Rules</h3>
        <p><strong>Definition:</strong> \(f'(x) = \displaystyle\lim_{h\to 0}\frac{f(x+h)-f(x)}{h}\)</p>
        <table class="ref-table">
            <thead><tr><th>Rule</th><th>Formula</th></tr></thead>
            <tbody>
                <tr><td>Constant</td><td>\(\dfrac{d}{dx}[c] = 0\)</td></tr>
                <tr><td>Power Rule</td><td>\(\dfrac{d}{dx}[x^n] = nx^{n-1}\)</td></tr>
                <tr><td>Sum / Difference</td><td>\((f \pm g)' = f' \pm g'\)</td></tr>
                <tr><td>Constant Multiple</td><td>\((cf)' = cf'\)</td></tr>
                <tr><td>Product Rule</td><td>\((fg)' = f'g + fg'\)</td></tr>
                <tr><td>Quotient Rule</td><td>\(\left(\dfrac{f}{g}\right)' = \dfrac{f'g - fg'}{g^2}\)</td></tr>
                <tr><td>Chain Rule</td><td>\(\dfrac{d}{dx}[f(g(x))] = f'(g(x))\cdot g'(x)\)</td></tr>
                <tr><td>Exponential</td><td>\(\dfrac{d}{dx}[e^x] = e^x\) &nbsp;&nbsp; \(\dfrac{d}{dx}[a^x] = a^x \ln a\)</td></tr>
                <tr><td>Natural Log</td><td>\(\dfrac{d}{dx}[\ln x] = \dfrac{1}{x}\)</td></tr>
                <tr><td>sin / cos</td><td>\(\dfrac{d}{dx}[\sin x] = \cos x\) &nbsp;&nbsp; \(\dfrac{d}{dx}[\cos x] = -\sin x\)</td></tr>
                <tr><td>tan / cot</td><td>\(\dfrac{d}{dx}[\tan x] = \sec^2 x\) &nbsp;&nbsp; \(\dfrac{d}{dx}[\cot x] = -\csc^2 x\)</td></tr>
                <tr><td>sec / csc</td><td>\(\dfrac{d}{dx}[\sec x] = \sec x\tan x\) &nbsp;&nbsp; \(\dfrac{d}{dx}[\csc x] = -\csc x\cot x\)</td></tr>
                <tr><td>Inverse Trig</td><td>\(\dfrac{d}{dx}[\arcsin x] = \dfrac{1}{\sqrt{1-x^2}}\) &nbsp;&nbsp; \(\dfrac{d}{dx}[\arctan x] = \dfrac{1}{1+x^2}\)</td></tr>
            </tbody>
        </table>

        <h3>4.3 Key Calculus Theorems</h3>
        <p><strong>Fundamental Theorem of Calculus (Part 1):</strong> If \(F(x) = \displaystyle\int_a^x f(t)\,dt\), then \(F'(x) = f(x)\).</p>
        <p><strong>Fundamental Theorem of Calculus (Part 2):</strong> \(\displaystyle\int_a^b f(x)\,dx = F(b) - F(a)\)</p>
        <p><strong>Mean Value Theorem:</strong> If \(f\) is continuous on \([a,b]\) and differentiable on \((a,b)\), then \(\exists\, c \in (a,b)\) such that \(f'(c) = \dfrac{f(b)-f(a)}{b-a}\).</p>
        <p><strong>Rolle's Theorem:</strong> If \(f(a)=f(b)\), then \(\exists\, c\) where \(f'(c)=0\).</p>
        <p><strong>L'Hôpital's Rule:</strong> If \(\dfrac{f}{g} \to \dfrac{0}{0}\) or \(\dfrac{\pm\infty}{\pm\infty}\), then \(\displaystyle\lim\frac{f}{g} = \lim\frac{f'}{g'}\).</p>

        <h3>4.4 Common Integral Formulas</h3>
        <table class="ref-table">
            <thead><tr><th>Function</th><th>Integral</th></tr></thead>
            <tbody>
                <tr><td>\(x^n \quad (n\neq -1)\)</td><td>\(\dfrac{x^{n+1}}{n+1} + C\)</td></tr>
                <tr><td>\(\dfrac{1}{x}\)</td><td>\(\ln|x| + C\)</td></tr>
                <tr><td>\(e^x\)</td><td>\(e^x + C\)</td></tr>
                <tr><td>\(a^x\)</td><td>\(\dfrac{a^x}{\ln a} + C\)</td></tr>
                <tr><td>\(\sin x\)</td><td>\(-\cos x + C\)</td></tr>
                <tr><td>\(\cos x\)</td><td>\(\sin x + C\)</td></tr>
                <tr><td>\(\tan x\)</td><td>\(-\ln|\cos x| + C = \ln|\sec x| + C\)</td></tr>
                <tr><td>\(\sec^2 x\)</td><td>\(\tan x + C\)</td></tr>
                <tr><td>\(\dfrac{1}{\sqrt{1-x^2}}\)</td><td>\(\arcsin x + C\)</td></tr>
                <tr><td>\(\dfrac{1}{1+x^2}\)</td><td>\(\arctan x + C\)</td></tr>
                <tr><td>\(\dfrac{1}{a^2+x^2}\)</td><td>\(\dfrac{1}{a}\arctan\dfrac{x}{a} + C\)</td></tr>
            </tbody>
        </table>

        <h3>4.5 Fundamental Mathematical Constants</h3>
        <table class="ref-table">
            <thead><tr><th>Constant</th><th>Symbol</th><th>Value</th><th>Significance</th></tr></thead>
            <tbody>
                <tr><td>Pi</td><td>\(\pi\)</td><td>3.14159 26535 89793…</td><td>Ratio of circle circumference to diameter; appears in geometry, analysis, statistics</td></tr>
                <tr><td>Euler's Number</td><td>\(e\)</td><td>2.71828 18284 59045…</td><td>Base of natural logarithm; fundamental to growth, decay, and complex analysis</td></tr>
                <tr><td>Golden Ratio</td><td>\(\varphi\)</td><td>1.61803 39887 49894…</td><td>\(\varphi = \dfrac{1+\sqrt{5}}{2}\); appears in art, architecture, Fibonacci sequences</td></tr>
                <tr><td>Imaginary Unit</td><td>\(i\)</td><td>\(\sqrt{-1}\)</td><td>Foundation of complex numbers; \(i^2=-1\)</td></tr>
                <tr><td>Euler's Identity</td><td>—</td><td>\(e^{i\pi}+1=0\)</td><td>Unites the five most important constants in mathematics</td></tr>
                <tr><td>Square Root of 2</td><td>\(\sqrt{2}\)</td><td>1.41421 35623 73095…</td><td>First known irrational number; diagonal of unit square</td></tr>
                <tr><td>Natural Log of 2</td><td>\(\ln 2\)</td><td>0.69314 71805 59945…</td><td>Appears in binary logarithms, half-life formulas</td></tr>
                <tr><td>Apéry's Constant</td><td>\(\zeta(3)\)</td><td>1.20205 69031 59594…</td><td>Value of the Riemann zeta function at 3; appears in quantum mechanics</td></tr>
            </tbody>
        </table>

        <h3>4.6 Greek Alphabet Used in Mathematics</h3>
        <table class="ref-table">
            <thead><tr><th>Letter</th><th>Name</th><th>Common Use</th></tr></thead>
            <tbody>
                <tr><td>\(\alpha\)</td><td>Alpha</td><td>Angles, significance levels in statistics</td></tr>
                <tr><td>\(\beta\)</td><td>Beta</td><td>Angles, regression coefficients</td></tr>
                <tr><td>\(\gamma\)</td><td>Gamma</td><td>Euler–Mascheroni constant, angles</td></tr>
                <tr><td>\(\delta,\, \Delta\)</td><td>Delta</td><td>Small change (δ), finite difference (Δ), discriminant</td></tr>
                <tr><td>\(\varepsilon\)</td><td>Epsilon</td><td>Small positive quantities in limits</td></tr>
                <tr><td>\(\theta\)</td><td>Theta</td><td>General angle measure</td></tr>
                <tr><td>\(\lambda\)</td><td>Lambda</td><td>Eigenvalues, wavelength, rate parameter</td></tr>
                <tr><td>\(\mu\)</td><td>Mu</td><td>Mean in statistics, coefficient of friction</td></tr>
                <tr><td>\(\pi\)</td><td>Pi</td><td>Circle constant 3.14159…</td></tr>
                <tr><td>\(\sigma,\, \Sigma\)</td><td>Sigma</td><td>Standard deviation (σ), summation (Σ)</td></tr>
                <tr><td>\(\phi,\, \varphi\)</td><td>Phi</td><td>Golden ratio, angles, Euler's totient function</td></tr>
                <tr><td>\(\omega,\, \Omega\)</td><td>Omega</td><td>Angular velocity (ω), sample space (Ω)</td></tr>
            </tbody>
        </table>
    </div>
</div>
