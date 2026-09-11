<div class="math-reference-content">
    <!-- Chapter 10 Banner -->
    <div class="math-chapter-hero">
        <div class="math-hero-badge"><i class="fas fa-shapes"></i> Level: Grade 10 (Geometry &amp; Trig)</div>
        <h1 class="math-hero-title">Grade 10: Deductive Proofs, Trigonometry (SOH-CAH-TOA) &amp; Circles</h1>
        <p class="math-hero-desc">The master Grade 10 Euclidean and analytic geometry reference manual covering formal deductive two-column proofs, triangle congruence and similarity, right triangle trigonometry (SOH-CAH-TOA, special triangles), circle geometry theorems, arc length, sector area, and the Trigonometric Hand Trick.</p>
    </div>

    <!-- Quick Navigation Pills -->
    <nav class="math-toc-pills" aria-label="Chapter sections">
        <a href="#sec-10-1" class="math-pill"><i class="fas fa-check-double"></i> 10.1 Triangle Congruence (SSS, SAS, ASA, AAS, HL)</a>
        <a href="#sec-10-2" class="math-pill"><i class="fas fa-expand-arrows-alt"></i> 10.2 Triangle Similarity (AA, SAS, SSS)</a>
        <a href="#sec-10-3" class="math-pill"><i class="fas fa-play"></i> 10.3 Right Triangle Trigonometry (SOH-CAH-TOA)</a>
        <a href="#sec-10-4" class="math-pill"><i class="fas fa-drafting-compass"></i> 10.4 Special Right Triangles ($45^\circ$-$45^\circ$-$90^\circ$, $30^\circ$-$60^\circ$-$90^\circ$)</a>
        <a href="#sec-10-5" class="math-pill"><i class="fas fa-circle-notch"></i> 10.5 Circle Geometry &amp; Intersecting Chords</a>
        <a href="#sec-10-6" class="math-pill"><i class="fas fa-pie-chart"></i> 10.6 Arc Length, Sector Area &amp; Circle Equation</a>
        <a href="#sec-10-7" class="math-pill"><i class="fas fa-brain"></i> 10.7 Mental Math &amp; Study Hacks</a>
        <a href="#sec-10-8" class="math-pill"><i class="fas fa-file-invoice"></i> 10.8 Grade 10 Cheat Sheet</a>
    </nav>

    <!-- Section 10.1 -->
    <section id="sec-10-1" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">10.1</span>
            <h2 class="math-section-title">Triangle Congruence Theorems ($\cong$)</h2>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Congruence Postulate</th>
                        <th>Required Matching Criteria</th>
                        <th>Invalid Fallacy Warning</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>SSS</strong> (Side-Side-Side)</td><td>All 3 pairs of corresponding sides are congruent ($\cong$)</td><td>None</td></tr>
                    <tr><td><strong>SAS</strong> (Side-Angle-Side)</td><td>2 sides and the <em>included angle</em> between them</td><td>Angle MUST be between the sides</td></tr>
                    <tr><td><strong>ASA</strong> (Angle-Side-Angle)</td><td>2 angles and the <em>included side</em> between them</td><td>Side MUST be between the angles</td></tr>
                    <tr><td><strong>AAS</strong> (Angle-Angle-Side)</td><td>2 consecutive angles and a non-included side</td><td>None</td></tr>
                    <tr><td><strong>HL</strong> (Hypotenuse-Leg)</td><td>Right triangle: Hypotenuse and 1 leg</td><td>Valid ONLY for right triangles ($90^\circ$)</td></tr>
                    <tr><td><strong style="color: #ef4444;">AAA &amp; SSA</strong></td><td colspan="2" style="color: #ef4444;"><strong>INVALID FOR CONGRUENCE!</strong> (AAA proves similarity only; SSA is the ambiguous case).</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Section 10.2 -->
    <section id="sec-10-2" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">10.2</span>
            <h2 class="math-section-title">Triangle Similarity ($\sim$) &amp; Geometric Mean Altitude</h2>
        </div>

        <div class="math-theorem-box">
            <div class="math-thm-header">
                <span class="math-thm-badge"><i class="fas fa-award"></i> Theorem 10.2</span>
                <span class="math-thm-title">Geometric Mean Altitude Theorem</span>
            </div>
            <div class="math-thm-body">
                In a right triangle with altitude $h$ drawn to the hypotenuse dividing it into segments $p$ and $q$:
                $$h^2 = p \cdot q \implies h = \sqrt{p \cdot q}$$
                $$\text{Leg Rules: } a^2 = p \cdot c \quad \text{and} \quad b^2 = q \cdot c$$
            </div>
        </div>
    </section>

    <!-- Section 10.3 -->
    <section id="sec-10-3" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">10.3</span>
            <h2 class="math-section-title">Right Triangle Trigonometry: SOH-CAH-TOA</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Sine Ratio ($\sin\theta$)</div>
                <div class="math-formula-latex">$$\sin\theta = \frac{\text{Opposite}}{\text{Hypotenuse}} \quad (\text{SOH})$$</div>
                <div class="math-formula-desc">Ratio of opposite leg to the hypotenuse.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Cosine Ratio ($\cos\theta$)</div>
                <div class="math-formula-latex">$$\cos\theta = \frac{\text{Adjacent}}{\text{Hypotenuse}} \quad (\text{CAH})$$</div>
                <div class="math-formula-desc">Ratio of adjacent leg to the hypotenuse.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Tangent Ratio ($\tan\theta$)</div>
                <div class="math-formula-latex">$$\tan\theta = \frac{\text{Opposite}}{\text{Adjacent}} = \frac{\sin\theta}{\cos\theta} \quad (\text{TOA})$$</div>
                <div class="math-formula-desc">Ratio of opposite leg to adjacent leg.</div>
            </div>
        </div>
    </section>

    <!-- Section 10.4 -->
    <section id="sec-10-4" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">10.4</span>
            <h2 class="math-section-title">Special Right Triangles ($45^\circ$-$45^\circ$-$90^\circ$ &amp; $30^\circ$-$60^\circ$-$90^\circ$)</h2>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Special Triangle</th>
                        <th>Side Length Ratio</th>
                        <th>$\sin$ Exact</th>
                        <th>$\cos$ Exact</th>
                        <th>$\tan$ Exact</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>$45^\circ$-$45^\circ$-$90^\circ$ (Isosceles Right)</strong></td><td>$x : x : x\sqrt{2}$</td><td>$\sin(45^\circ) = \frac{\sqrt{2}}{2}$</td><td>$\cos(45^\circ) = \frac{\sqrt{2}}{2}$</td><td>$\tan(45^\circ) = 1$</td></tr>
                    <tr><td><strong>$30^\circ$-$60^\circ$-$90^\circ$ ($30^\circ$ Angle)</strong></td><td>$x : x\sqrt{3} : 2x$</td><td>$\sin(30^\circ) = \frac{1}{2}$</td><td>$\cos(30^\circ) = \frac{\sqrt{3}}{2}$</td><td>$\tan(30^\circ) = \frac{\sqrt{3}}{3}$</td></tr>
                    <tr><td><strong>$30^\circ$-$60^\circ$-$90^\circ$ ($60^\circ$ Angle)</strong></td><td>$x : x\sqrt{3} : 2x$</td><td>$\sin(60^\circ) = \frac{\sqrt{3}}{2}$</td><td>$\cos(60^\circ) = \frac{1}{2}$</td><td>$\tan(60^\circ) = \sqrt{3}$</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Section 10.5 -->
    <section id="sec-10-5" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">10.5</span>
            <h2 class="math-section-title">Circle Geometry: Chords, Tangents &amp; Inscribed Angles</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Inscribed Angle Theorem</div>
                <div class="math-formula-latex">$$\angle_{\text{inscribed}} = \frac{1}{2} \cdot \text{Arc Measure}$$</div>
                <div class="math-formula-desc">An inscribed angle equals half the measure of its intercepted arc.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Intersecting Chords Theorem</div>
                <div class="math-formula-latex">$$a \cdot b = c \cdot d$$</div>
                <div class="math-formula-desc">Products of intersecting chord segments are strictly equal.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Tangent-Radius Perpendicularity</div>
                <div class="math-formula-latex">$$\text{Radius } \perp \text{ Tangent Line at point of tangency } (90^\circ)$$</div>
                <div class="math-formula-desc">Always forms a right triangle with the circle center.</div>
            </div>
        </div>
    </section>

    <!-- Section 10.6 -->
    <section id="sec-10-6" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">10.6</span>
            <h2 class="math-section-title">Arc Length, Sector Area &amp; Coordinate Circle Equation</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Arc Length Formula ($s$)</div>
                <div class="math-formula-latex">$$s = \frac{\theta}{360^\circ}(2\pi r) = r\theta \quad (\theta \text{ in radians})$$</div>
                <div class="math-formula-desc">Fraction of outer circumference subtended by central angle $\theta$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Sector Area Formula ($A_{\text{sector}}$)</div>
                <div class="math-formula-latex">$$A_{\text{sector}} = \frac{\theta}{360^\circ}(\pi r^2) = \frac{1}{2}r^2\theta$$</div>
                <div class="math-formula-desc">Fraction of total circle area (pizza slice).</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Standard Equation of a Circle</div>
                <div class="math-formula-latex">$$(x - h)^2 + (y - k)^2 = r^2$$</div>
                <div class="math-formula-desc">Center at $(h, k)$ with radius $r$.</div>
            </div>
        </div>
    </section>

    <!-- Section 10.7: Math Hacks & Study Hacks -->
    <section id="sec-10-7" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">10.7</span>
            <h2 class="math-section-title">Grade 10 Mental Math &amp; Trigonometry Hacks</h2>
        </div>

        <div class="math-constant-grid">
            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-hand-paper" style="color: #f59e0b;"></i> Hack #1</div>
                <div class="math-const-name">The Trigonometric Hand Trick</div>
                <div class="math-const-val">$$\sin\theta = \frac{\sqrt{\text{Fingers Below}}}{2} \quad | \quad \cos\theta = \frac{\sqrt{\text{Fingers Above}}}{2}$$</div>
                <div class="math-const-desc">Assign your 5 fingers to $0^\circ, 30^\circ, 45^\circ, 60^\circ, 90^\circ$. Fold the angle finger to read exact square roots instantly!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-lightbulb" style="color: #6366f1;"></i> Hack #2</div>
                <div class="math-const-name">"SOH-CAH-TOA" Chief Mnemonic</div>
                <div class="math-const-val">$$\mathbf{S}\frac{\text{O}}{\text{H}} \ - \ \mathbf{C}\frac{\text{A}}{\text{H}} \ - \ \mathbf{T}\frac{\text{O}}{\text{A}}$$</div>
                <div class="math-const-desc">Some Old Hippie - Caught Another Hippie - Tripping On Acid. Never confuse trigonometric fractions again.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-star" style="color: #10b981;"></i> Hack #3</div>
                <div class="math-const-name">Special Triangles Multiplier Multipliers</div>
                <div class="math-const-val">$$\text{45-45-90: } \times \sqrt{2} \text{ for Hypotenuse} \quad | \quad \text{30-60-90: Short Leg } \times 2 = \text{Hyp, } \times \sqrt{3} = \text{Long Leg}$$</div>
                <div class="math-const-desc">Always find the short leg first! Everything else is a simple multiplication of that short leg.</div>
            </div>
        </div>
    </section>

    <!-- Section 10.8: Summary Cheat Sheet -->
    <section id="sec-10-8" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">10.8</span>
            <h2 class="math-section-title">Grade 10 Comprehensive Summary Cheat Sheet</h2>
        </div>

        <div class="math-summary-sheet">
            <div class="math-summary-col">
                <h4>Trigonometry Exacts</h4>
                <ul>
                    <li>$\sin(30^\circ) = 1/2, \ \cos(30^\circ) = \sqrt{3}/2$</li>
                    <li>$\sin(45^\circ) = \sqrt{2}/2, \ \cos(45^\circ) = \sqrt{2}/2$</li>
                    <li>$\sin(60^\circ) = \sqrt{3}/2, \ \cos(60^\circ) = 1/2$</li>
                    <li>$\tan\theta = \sin\theta / \cos\theta$</li>
                    <li>$\sin^2\theta + \cos^2\theta = 1$</li>
                </ul>
            </div>

            <div class="math-summary-col">
                <h4>Circle &amp; Coordinate Formulas</h4>
                <ul>
                    <li>$(x - h)^2 + (y - k)^2 = r^2$</li>
                    <li>Arc Length: $s = r\theta$ (rad)</li>
                    <li>Sector Area: $A = \frac{1}{2}r^2\theta$</li>
                    <li>$\text{Degrees} \to \text{Radians}: \times \frac{\pi}{180^\circ}$</li>
                    <li>Chords: $a \cdot b = c \cdot d$</li>
                </ul>
            </div>

            <div class="math-summary-col">
                <h4>Congruence &amp; Similarity</h4>
                <ul>
                    <li>Congruence: SSS, SAS, ASA, AAS, HL</li>
                    <li>Similarity: AA, SAS, SSS</li>
                    <li>Altitude Theorem: $h = \sqrt{pq}$</li>
                    <li>CPCTC: Corresponding Parts of Congruent Triangles are Congruent</li>
                </ul>
            </div>
        </div>
    </section>
</div>
