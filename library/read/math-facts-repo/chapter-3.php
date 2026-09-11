<div class="cdn-book-reader-content">
    <div class="math-section-badge"><i class="fas fa-square-root-alt"></i> Part III: Geometry &amp; Trigonometry</div>
    <h2>Chapter 3: Geometry Theorems, Trigonometric Identities &amp; Analytic Geometry</h2>

    <div class="content-content">
        <p>Geometry and trigonometry formalize spatial reasoning, measurement, angles, vectors, and coordinate transformations. This chapter provides a rigorous reference for 2D/3D Euclidean geometric mensuration, fundamental triangle and circle theorems, exact trigonometric ratios, analytic conic sections, and vector algebra. All notation is typeset with MathJax SVG.</p>

        <!-- Quick Section Navigation -->
        <nav class="math-toc-pills" aria-label="Chapter 3 Quick Navigation">
            <a href="#sec-3-1" class="math-toc-pill"><i class="fas fa-shapes"></i> 3.1 2D Plane Geometry</a>
            <a href="#sec-3-2" class="math-toc-pill"><i class="fas fa-cube"></i> 3.2 3D Solid Geometry</a>
            <a href="#sec-3-3" class="math-toc-pill"><i class="fas fa-draw-polygon"></i> 3.3 Triangle Theorems</a>
            <a href="#sec-3-4" class="math-toc-pill"><i class="fas fa-circle-notch"></i> 3.4 Circle Geometry</a>
            <a href="#sec-3-5" class="math-toc-pill"><i class="fas fa-drafting-compass"></i> 3.5 Trig Ratios &amp; Table</a>
            <a href="#sec-3-6" class="math-toc-pill"><i class="fas fa-link"></i> 3.6 Trig Identities</a>
            <a href="#sec-3-7" class="math-toc-pill"><i class="fas fa-crosshairs"></i> 3.7 Coordinate Conics</a>
            <a href="#sec-3-8" class="math-toc-pill"><i class="fas fa-location-arrow"></i> 3.8 Vector Algebra</a>
            <a href="#sec-3-9" class="math-toc-pill"><i class="fas fa-pen-fancy"></i> 3.9 Worked Solutions</a>
            <a href="#sec-3-10" class="math-toc-pill"><i class="fas fa-clipboard-list"></i> 3.10 Summary Sheet</a>
        </nav>

        <!-- 3.1 2D Plane Geometry -->
        <h3 id="sec-3-1">3.1 2D Plane Geometry Mensuration Reference</h3>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Planar Geometric Figure</th>
                        <th scope="col">Perimeter / Circumference \(P\)</th>
                        <th scope="col">Area Formula \(A\)</th>
                        <th scope="col">Geometric Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Square</strong> (side \(s\))</td><td>\(P = 4s\)</td><td>\(A = s^2\)</td><td>Diagonal \(d = s\sqrt{2}\)</td></tr>
                    <tr><td><strong>Rectangle</strong> (length \(l\), width \(w\))</td><td>\(P = 2(l + w)\)</td><td>\(A = l \cdot w\)</td><td>Diagonal \(d = \sqrt{l^2 + w^2}\)</td></tr>
                    <tr><td><strong>General Triangle</strong> (sides \(a,b,c\), height \(h\))</td><td>\(P = a + b + c\)</td><td>\(A = \frac{1}{2}b h\)</td><td>\(A = \frac{1}{2}ab\sin C\)</td></tr>
                    <tr><td><strong>Equilateral Triangle</strong> (side \(s\))</td><td>\(P = 3s\)</td><td>\(A = \frac{\sqrt{3}}{4}s^2\)</td><td>Altitude \(h = \frac{\sqrt{3}}{2}s\)</td></tr>
                    <tr><td><strong>Parallelogram</strong> (base \(b\), height \(h\))</td><td>\(P = 2(a + b)\)</td><td>\(A = b \cdot h\)</td><td>\(A = ab\sin\theta\)</td></tr>
                    <tr><td><strong>Trapezoid</strong> (parallel bases \(b_1, b_2\))</td><td>\(P = a + b_1 + b_2 + c\)</td><td>\(A = \frac{b_1 + b_2}{2} h\)</td><td>Midsegment \(m = \frac{b_1 + b_2}{2}\)</td></tr>
                    <tr><td><strong>Rhombus / Kite</strong> (diagonals \(d_1, d_2\))</td><td>\(P = 4s\)</td><td>\(A = \frac{1}{2}d_1 d_2\)</td><td>Diagonals are perpendicular bisectors</td></tr>
                    <tr><td><strong>Circle</strong> (radius \(r\), diameter \(d\))</td><td>\(C = 2\pi r = \pi d\)</td><td>\(A = \pi r^2\)</td><td>Ratio \(\frac{C}{d} = \pi \approx 3.14159\)</td></tr>
                    <tr><td><strong>Circular Sector</strong> (\(\theta\) in radians)</td><td>\(P = 2r + r\theta\)</td><td>\(A = \frac{1}{2}r^2\theta\)</td><td>Arc length \(s = r\theta\)</td></tr>
                    <tr><td><strong>Ellipse</strong> (semi-major \(a\), semi-minor \(b\))</td><td>\(P \approx \pi[3(a+b) - \sqrt{(3a+b)(a+3b)}]\)</td><td>\(A = \pi a b\)</td><td>Focal distance \(c = \sqrt{a^2 - b^2}\)</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 3.2 3D Solid Geometry -->
        <h3 id="sec-3-2">3.2 3D Solid Geometry Mensuration Reference</h3>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">3D Solid Body</th>
                        <th scope="col">Total Surface Area \(SA\)</th>
                        <th scope="col">Volume Capacity \(V\)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Cube</strong> (edge \(s\))</td><td>\(SA = 6s^2\)</td><td>\(V = s^3\)</td></tr>
                    <tr><td><strong>Rectangular Prism</strong> (\(l, w, h\))</td><td>\(SA = 2(lw + lh + wh)\)</td><td>\(V = l \cdot w \cdot h\)</td></tr>
                    <tr><td><strong>Right Circular Cylinder</strong> (\(r, h\))</td><td>\(SA = 2\pi r^2 + 2\pi r h\)</td><td>\(V = \pi r^2 h\)</td></tr>
                    <tr><td><strong>Right Circular Cone</strong> (\(r, h\), slant \(l = \sqrt{r^2+h^2}\))</td><td>\(SA = \pi r^2 + \pi r l\)</td><td>\(V = \frac{1}{3}\pi r^2 h\)</td></tr>
                    <tr><td><strong>Sphere</strong> (radius \(r\))</td><td>\(SA = 4\pi r^2\)</td><td>\(V = \frac{4}{3}\pi r^3\)</td></tr>
                    <tr><td><strong>Regular Pyramid</strong> (base area \(B\), perimeter \(P\), slant \(l\))</td><td>\(SA = B + \frac{1}{2}P l\)</td><td>\(V = \frac{1}{3}B h\)</td></tr>
                    <tr><td><strong>Frustum of a Cone</strong> (radii \(R, r\), height \(h\))</td><td>\(SA = \pi(R^2 + r^2) + \pi(R + r)l\)</td><td>\(V = \frac{1}{3}\pi h(R^2 + Rr + r^2)\)</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 3.3 Triangle Theorems -->
        <h3 id="sec-3-3">3.3 Triangle Theorems, Trigonometric Laws &amp; Area Formulas</h3>

        <div class="math-theorem-box">
            <div class="math-theorem-header">
                <h4 class="math-theorem-title"><i class="fas fa-ruler"></i> Theorem 3.1: The Pythagorean Theorem</h4>
                <span class="math-theorem-badge">Right Triangles</span>
            </div>
            <p>In any right triangle with perpendicular legs \(a, b\) and hypotenuse \(c\): \[a^2 + b^2 = c^2 \iff c = \sqrt{a^2 + b^2}\]</p>
            <p><strong>Common Primitive Pythagorean Triples \((a, b, c)\):</strong><br>
            \((3, 4, 5)\), \((5, 12, 13)\), \((8, 15, 17)\), \((7, 24, 25)\), \((9, 40, 41)\), \((11, 60, 61)\), \((12, 35, 37)\), \((20, 21, 29)\)</p>
        </div>

        <div class="math-formula-grid">
            <div class="math-grid-card">
                <h4><i class="fas fa-wave-square"></i> Law of Sines</h4>
                <p>\[\frac{a}{\sin A} = \frac{b}{\sin B} = \frac{c}{\sin C} = 2R\]</p>
                <p>Where \(R\) is the circumradius of \(\triangle ABC\).</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-compass"></i> Law of Cosines</h4>
                <p>\[c^2 = a^2 + b^2 - 2ab\cos C\]</p>
                <p>\[\cos C = \frac{a^2 + b^2 - c^2}{2ab}\]</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-vector-square"></i> Heron's Area Formula</h4>
                <p>\[A = \sqrt{s(s-a)(s-b)(s-c)}\]</p>
                <p>Semiperimeter \(s = \frac{a+b+c}{2}\).</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-circle"></i> Inradius &amp; Circumradius</h4>
                <p>Inradius: \(r = \frac{A}{s}\)<br>Circumradius: \(R = \frac{abc}{4A}\)</p>
            </div>
        </div>

        <!-- 3.4 Circle Geometry -->
        <h3 id="sec-3-4">3.4 Circle Geometry Theorems &amp; Angle Intersections</h3>
        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Circle Theorem</th>
                        <th scope="col">Mathematical Formulation</th>
                        <th scope="col">Geometric Consequence</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Inscribed Angle Theorem</strong></td><td>\(\theta_{\text{inscribed}} = \frac{1}{2}\theta_{\text{central}}\)</td><td>Angles subtending the same arc are congruent</td></tr>
                    <tr><td><strong>Thales's Theorem</strong></td><td>Angle inscribed in a semicircle \(= 90^\circ\)</td><td>Hypotenuse of inscribed right triangle is the diameter</td></tr>
                    <tr><td><strong>Tangent-Radius Orthogonality</strong></td><td>Tangent line \(\perp\) Radius at point of tangency</td><td>Forms a right angle with the circle radius</td></tr>
                    <tr><td><strong>Power of a Point (Intersecting Chords)</strong></td><td>\(PA \cdot PB = PC \cdot PD\)</td><td>Product of segments of intersecting chords is constant</td></tr>
                    <tr><td><strong>Tangent-Secant Theorem</strong></td><td>\(PT^2 = PA \cdot PB\)</td><td>Square of tangent equals product of external secant segments</td></tr>
                    <tr><td><strong>Cyclic Quadrilateral</strong></td><td>Opposite angles sum to \(180^\circ\): \(\angle A + \angle C = 180^\circ\)</td><td>Ptolemy's Theorem: \(ac + bd = d_1 d_2\)</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 3.5 Trig Ratios -->
        <h3 id="sec-3-5">3.5 Trigonometric Ratios &amp; Exact Value Reference Table</h3>
        <p>In a right triangle with acute angle \(\theta\), opposite leg \(o\), adjacent leg \(a\), and hypotenuse \(h\):</p>
        <div class="math-formula-grid">
            <div class="math-grid-card">
                <h4>Primary Ratios (SOH-CAH-TOA)</h4>
                <p>\[\sin\theta = \frac{o}{h} \qquad \cos\theta = \frac{a}{h} \qquad \tan\theta = \frac{o}{a} = \frac{\sin\theta}{\cos\theta}\]</p>
            </div>
            <div class="math-grid-card">
                <h4>Reciprocal Ratios</h4>
                <p>\[\csc\theta = \frac{1}{\sin\theta} = \frac{h}{o} \qquad \sec\theta = \frac{1}{\cos\theta} = \frac{h}{a} \qquad \cot\theta = \frac{1}{\tan\theta} = \frac{a}{o}\]</p>
            </div>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th scope="col">Degrees \((^\circ)\)</th>
                        <th scope="col">Radians \((\text{rad})\)</th>
                        <th scope="col">\(\sin\theta\)</th>
                        <th scope="col">\(\cos\theta\)</th>
                        <th scope="col">\(\tan\theta\)</th>
                        <th scope="col">\(\csc\theta\)</th>
                        <th scope="col">\(\sec\theta\)</th>
                        <th scope="col">\(\cot\theta\)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>\(0^\circ\)</td><td>\(0\)</td><td>\(0\)</td><td>\(1\)</td><td>\(0\)</td><td>undefined</td><td>\(1\)</td><td>undefined</td></tr>
                    <tr><td>\(30^\circ\)</td><td>\(\frac{\pi}{6}\)</td><td>\(\frac{1}{2}\)</td><td>\(\frac{\sqrt{3}}{2}\)</td><td>\(\frac{\sqrt{3}}{3}\)</td><td>\(2\)</td><td>\(\frac{2\sqrt{3}}{3}\)</td><td>\(\sqrt{3}\)</td></tr>
                    <tr><td>\(45^\circ\)</td><td>\(\frac{\pi}{4}\)</td><td>\(\frac{\sqrt{2}}{2}\)</td><td>\(\frac{\sqrt{2}}{2}\)</td><td>\(1\)</td><td>\(\sqrt{2}\)</td><td>\(\sqrt{2}\)</td><td>\(1\)</td></tr>
                    <tr><td>\(60^\circ\)</td><td>\(\frac{\pi}{3}\)</td><td>\(\frac{\sqrt{3}}{2}\)</td><td>\(\frac{1}{2}\)</td><td>\(\sqrt{3}\)</td><td>\(\frac{2\sqrt{3}}{3}\)</td><td>\(2\)</td><td>\(\frac{\sqrt{3}}{3}\)</td></tr>
                    <tr><td>\(90^\circ\)</td><td>\(\frac{\pi}{2}\)</td><td>\(1\)</td><td>\(0\)</td><td>undefined</td><td>\(1\)</td><td>undefined</td><td>\(0\)</td></tr>
                    <tr><td>\(180^\circ\)</td><td>\(\pi\)</td><td>\(0\)</td><td>\(-1\)</td><td>\(0\)</td><td>undefined</td><td>\(-1\)</td><td>undefined</td></tr>
                    <tr><td>\(270^\circ\)</td><td>\(\frac{3\pi}{2}\)</td><td>\(-1\)</td><td>\(0\)</td><td>undefined</td><td>\(-1\)</td><td>undefined</td><td>\(0\)</td></tr>
                    <tr><td>\(360^\circ\)</td><td>\(2\pi\)</td><td>\(0\)</td><td>\(1\)</td><td>\(0\)</td><td>undefined</td><td>\(1\)</td><td>undefined</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 3.6 Trig Identities -->
        <h3 id="sec-3-6">3.6 Comprehensive Trigonometric Identity Reference</h3>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr><th scope="col">Category</th><th scope="col">Exact Identity Formula</th></tr>
                </thead>
                <tbody>
                    <tr><td><strong>Pythagorean Identities</strong></td><td>\(\sin^2\theta + \cos^2\theta = 1 \qquad 1 + \tan^2\theta = \sec^2\theta \qquad 1 + \cot^2\theta = \csc^2\theta\)</td></tr>
                    <tr><td><strong>Even / Odd Symmetry</strong></td><td>\(\sin(-\theta) = -\sin\theta \qquad \cos(-\theta) = \cos\theta \qquad \tan(-\theta) = -\tan\theta\)</td></tr>
                    <tr><td><strong>Co-Function Identities</strong></td><td>\(\sin\left(\frac{\pi}{2}-\theta\right) = \cos\theta \qquad \cos\left(\frac{\pi}{2}-\theta\right) = \sin\theta \qquad \tan\left(\frac{\pi}{2}-\theta\right) = \cot\theta\)</td></tr>
                    <tr><td><strong>Angle Sum &amp; Difference (Sine)</strong></td><td>\(\sin(\alpha \pm \beta) = \sin\alpha\cos\beta \pm \cos\alpha\sin\beta\)</td></tr>
                    <tr><td><strong>Angle Sum &amp; Difference (Cosine)</strong></td><td>\(\cos(\alpha \pm \beta) = \cos\alpha\cos\beta \mp \sin\alpha\sin\beta\)</td></tr>
                    <tr><td><strong>Angle Sum &amp; Difference (Tangent)</strong></td><td>\(\tan(\alpha \pm \beta) = \frac{\tan\alpha \pm \tan\beta}{1 \mp \tan\alpha\tan\beta}\)</td></tr>
                    <tr><td><strong>Double-Angle Formulas</strong></td><td>\(\sin 2\theta = 2\sin\theta\cos\theta \qquad \cos 2\theta = \cos^2\theta - \sin^2\theta = 2\cos^2\theta - 1 = 1 - 2\sin^2\theta\)</td></tr>
                    <tr><td><strong>Half-Angle Formulas</strong></td><td>\(\sin\frac{\theta}{2} = \pm\sqrt{\frac{1-\cos\theta}{2}} \qquad \cos\frac{\theta}{2} = \pm\sqrt{\frac{1+\cos\theta}{2}} \qquad \tan\frac{\theta}{2} = \frac{\sin\theta}{1+\cos\theta}\)</td></tr>
                    <tr><td><strong>Product-to-Sum</strong></td><td>\(\sin\alpha\cos\beta = \frac{1}{2}[\sin(\alpha+\beta) + \sin(\alpha-\beta)] \qquad \cos\alpha\cos\beta = \frac{1}{2}[\cos(\alpha+\beta) + \cos(\alpha-\beta)]\)</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 3.7 Coordinate Conics -->
        <h3 id="sec-3-7">3.7 Coordinate Geometry &amp; Conic Section Equations</h3>
        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr><th scope="col">Conic Curve</th><th scope="col">Standard Canonical Equation</th><th scope="col">Geometric Invariants</th></tr>
                </thead>
                <tbody>
                    <tr><td><strong>Distance &amp; Midpoint</strong></td><td>\(d = \sqrt{(x_2-x_1)^2 + (y_2-y_1)^2} \qquad M = \left(\frac{x_1+x_2}{2}, \frac{y_1+y_2}{2}\right)\)</td><td>Euclidean metric</td></tr>
                    <tr><td><strong>Circle</strong></td><td>\((x - h)^2 + (y - k)^2 = r^2\)</td><td>Center \((h, k)\), radius \(r\)</td></tr>
                    <tr><td><strong>Parabola (Vertical)</strong></td><td>\((x - h)^2 = 4p(y - k) \iff y = \frac{1}{4p}(x - h)^2 + k\)</td><td>Focus \((h, k+p)\), directrix \(y = k-p\)</td></tr>
                    <tr><td><strong>Ellipse (Horizontal)</strong></td><td>\(\frac{(x - h)^2}{a^2} + \frac{(y - k)^2}{b^2} = 1 \quad (a > b)\)</td><td>Foci \((h \pm c, k)\) where \(c = \sqrt{a^2 - b^2}\)</td></tr>
                    <tr><td><strong>Hyperbola (Horizontal)</strong></td><td>\(\frac{(x - h)^2}{a^2} - \frac{(y - k)^2}{b^2} = 1\)</td><td>Asymptotes \(y - k = \pm\frac{b}{a}(x - h)\)</td></tr>
                </tbody>
            </table>
        </div>

        <!-- 3.8 Vector Algebra -->
        <h3 id="sec-3-8">3.8 Vector Algebra in \(\mathbb{R}^2\) and \(\mathbb{R}^3\)</h3>
        <div class="math-formula-grid">
            <div class="math-grid-card">
                <h4><i class="fas fa-arrows-alt"></i> Magnitude &amp; Unit Vector</h4>
                <p>\[\|\vec{v}\| = \sqrt{v_1^2 + v_2^2 + v_3^2}\]</p>
                <p>Unit vector: \(\hat{u} = \frac{\vec{v}}{\|\vec{v}\|}\)</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-dot-circle"></i> Dot (Scalar) Product</h4>
                <p>\[\vec{u} \cdot \vec{v} = u_1 v_1 + u_2 v_2 + u_3 v_3 = \|\vec{u}\|\|\vec{v}\|\cos\theta\]</p>
                <p>Orthogonal if \(\vec{u} \cdot \vec{v} = 0\).</p>
            </div>
            <div class="math-grid-card">
                <h4><i class="fas fa-times-circle"></i> Cross (Vector) Product</h4>
                <p>\[\vec{u} \times \vec{v} = \begin{vmatrix} \mathbf{i} & \mathbf{j} & \mathbf{k} \\ u_1 & u_2 & u_3 \\ v_1 & v_2 & v_3 \end{vmatrix}\]</p>
                <p>\(\|\vec{u} \times \vec{v}\| = \|\vec{u}\|\|\vec{v}\|\sin\theta\)</p>
            </div>
        </div>

        <!-- 3.9 Worked Solutions -->
        <h3 id="sec-3-9">3.9 Worked Solutions &amp; Geometric Proof Walkthrough</h3>

        <div class="math-example-box">
            <div class="math-example-header"><i class="fas fa-compass"></i> Example 3.1: Solving an Oblique Triangle with the Law of Cosines</div>
            <p>In \(\triangle ABC\), side \(a = 7\), side \(b = 10\), and included angle \(C = 60^\circ\). Find side \(c\):</p>
            <div class="math-example-steps">
                <div><strong>Step 1 (Apply Law of Cosines):</strong> \(c^2 = a^2 + b^2 - 2ab\cos C\)</div>
                <div><strong>Step 2 (Substitute Values):</strong> \(c^2 = 7^2 + 10^2 - 2(7)(10)\cos(60^\circ)\)</div>
                <div><strong>Step 3 (Evaluate Cosine):</strong> \(\cos(60^\circ) = \frac{1}{2} \implies c^2 = 49 + 100 - 140\left(\frac{1}{2}\right)\)</div>
                <div><strong>Step 4 (Compute):</strong> \(c^2 = 149 - 70 = 79 \implies c = \sqrt{79} \approx 8.888\)</div>
            </div>
            <div class="math-example-result"><i class="fas fa-check"></i> Exact Length: \(c = \sqrt{79} \approx 8.89\)</div>
        </div>

        <!-- 3.10 Summary Sheet -->
        <section class="math-summary-sheet" id="sec-3-10">
            <div class="math-summary-header">
                <i class="fas fa-star" style="color: var(--color-primary, #6366f1); font-size: 1.5rem;"></i>
                <div>
                    <h3>Chapter 3 Reference Quick Sheet</h3>
                    <p style="margin: 0; font-size: 0.88rem; color: var(--color-text-secondary);">Core geometry, trigonometry, and analytic conic formulas</p>
                </div>
            </div>
            <div class="math-summary-grid">
                <div class="math-summary-col">
                    <h4>Planar &amp; Solid Geometry</h4>
                    <ul>
                        <li>Circle: \(C = 2\pi r, \; A = \pi r^2\)</li>
                        <li>Cylinder: \(V = \pi r^2 h, \; SA = 2\pi r(r+h)\)</li>
                        <li>Sphere: \(V = \frac{4}{3}\pi r^3, \; SA = 4\pi r^2\)</li>
                        <li>Cone: \(V = \frac{1}{3}\pi r^2 h\)</li>
                    </ul>
                </div>
                <div class="math-summary-col">
                    <h4>Trigonometry</h4>
                    <ul>
                        <li>\(\sin^2\theta + \cos^2\theta = 1\)</li>
                        <li>\(\sin 2\theta = 2\sin\theta\cos\theta\)</li>
                        <li>\(\cos 2\theta = \cos^2\theta - \sin^2\theta\)</li>
                        <li>Law of Cosines: \(c^2 = a^2+b^2-2ab\cos C\)</li>
                    </ul>
                </div>
                <div class="math-summary-col">
                    <h4>Analytic &amp; Vectors</h4>
                    <ul>
                        <li>Distance: \(d = \sqrt{(\Delta x)^2+(\Delta y)^2}\)</li>
                        <li>Ellipse: \(\frac{x^2}{a^2} + \frac{y^2}{b^2} = 1\)</li>
                        <li>Dot: \(\vec{u}\cdot\vec{v} = \|\vec{u}\|\|\vec{v}\|\cos\theta\)</li>
                        <li>Heron: \(A = \sqrt{s(s-a)(s-b)(s-c)}\)</li>
                    </ul>
                </div>
            </div>
        </section>

    </div>
</div>
