<div class="math-reference-content">
    <!-- Archival Cataloging Header -->
    <div class="math-book-callout-header">
        <span class="math-catalog-seal"><i class="fas fa-landmark"></i> HESTEN ACADEMIC REFERENCE ARCHIVE</span>
        <span class="math-catalog-callno">CALL NO: QA453.H47 2026 &bull; DEWEY: 516.3 &bull; VOL. X</span>
    </div>

    <!-- Chapter 10 Bookplate Frontispiece -->
    <header class="math-chapter-hero">
        <div class="math-hero-badge"><i class="fas fa-bookmark"></i> Volume X &bull; Euclidean Geometry &amp; Trigonometry Codex</div>
        <h1 class="math-hero-title">Tenth Grade Mathematics Reference Codex (High School Geometry)</h1>
        <div class="math-hero-subtitle">The Complete Scholastic Guide to Deductive Proofs, Triangle Congruence &amp; Similarity, SOH-CAH-TOA, Special Triangles, Circle Theorems, Arc &amp; Sector Mensuration &amp; Synoptic Concordance</div>
        <div class="math-book-divider"><span class="math-fleuron">&#10086;</span></div>
        <p class="math-hero-desc">An exhaustive reference codex compiled for secondary geometry scholars, honors students, and collegiate preparatory researchers. Codifying Euclidean deductive proof structures, rigorous axiomatic congruence and similarity criteria, right triangle trigonometry, coordinate conic circles, differential arc measures, and computational geometric heuristics.</p>
    </header>

    <!-- Quick Navigation Pills -->
    <nav class="math-toc-pills" aria-label="Chapter sections">
        <a href="#sec-10-1" class="math-pill"><i class="fas fa-scroll"></i> &sect; 10.1 Deductive Proofs &amp; CPCTC</a>
        <a href="#sec-10-2" class="math-pill"><i class="fas fa-check-double"></i> &sect; 10.2 Triangle Congruence</a>
        <a href="#sec-10-3" class="math-pill"><i class="fas fa-expand-arrows-alt"></i> &sect; 10.3 Triangle Similarity</a>
        <a href="#sec-10-4" class="math-pill"><i class="fas fa-play"></i> &sect; 10.4 SOH-CAH-TOA Trig</a>
        <a href="#sec-10-5" class="math-pill"><i class="fas fa-drafting-compass"></i> &sect; 10.5 Special Right Triangles</a>
        <a href="#sec-10-6" class="math-pill"><i class="fas fa-circle-notch"></i> &sect; 10.6 Circle Theorems</a>
        <a href="#sec-10-7" class="math-pill"><i class="fas fa-pie-chart"></i> &sect; 10.7 Arc Length &amp; Sectors</a>
        <a href="#sec-10-8" class="math-pill"><i class="fas fa-crosshairs"></i> &sect; 10.8 Coordinate Proofs</a>
        <a href="#sec-10-9" class="math-pill"><i class="fas fa-cube"></i> &sect; 10.9 3D Cavalieri's Solids</a>
        <a href="#sec-10-10" class="math-pill"><i class="fas fa-brain"></i> &sect; 10.10 Speed Hacks</a>
        <a href="#sec-10-11" class="math-pill"><i class="fas fa-scroll"></i> &sect; 10.11 Synoptic Tables</a>
    </nav>

    <!-- ==========================================================================
         Section 10.1: Deductive Proofs & CPCTC
         ========================================================================== -->
    <section id="sec-10-1" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.1</span>
            <h2 class="math-section-title">Formal Logic, Deductive Proofs &amp; CPCTC</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">LOGICAL CONDITIONAL</div>
                <div class="math-formula-title">Conditional &amp; Variations</div>
                <div class="math-formula-latex">$$\begin{aligned} \text{Conditional: } &p \to q \\ \text{Converse: } &q \to p \\ \text{Inverse: } &\sim p \to \sim q \\ \text{Contrapositive: } &\sim q \to \sim p \ (\equiv p \to q) \end{aligned}$$</div>
                <div class="math-formula-desc">A conditional statement and its contrapositive are logically equivalent!</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">EUCLIDEAN PRINCIPLE</div>
                <div class="math-formula-title">The CPCTC Axiom</div>
                <div class="math-formula-latex">$$\Delta ABC \cong \Delta DEF \implies \begin{cases} \overline{AB}\cong\overline{DE}, \overline{BC}\cong\overline{EF}, \overline{AC}\cong\overline{DF} \\ \angle A\cong\angle D, \angle B\cong\angle E, \angle C\cong\angle F \end{cases}$$</div>
                <div class="math-formula-desc">Corresponding Parts of Congruent Triangles are Congruent. Proves segment/angle equality after establishing triangle congruence.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 10.2: Triangle Congruence Theorems
         ========================================================================== -->
    <section id="sec-10-2" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.2</span>
            <h2 class="math-section-title">Triangle Congruence Postulates &amp; Theorems ($\cong$)</h2>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Congruence Criterion</th>
                        <th>Required Geometric Evidence</th>
                        <th>Scholastic Invariant Note</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>SSS</strong> (Side-Side-Side)</td><td>All 3 pairs of corresponding sides are congruent ($\cong$)</td><td>Rigidly locks all 3 interior angles</td></tr>
                    <tr><td><strong>SAS</strong> (Side-Angle-Side)</td><td>2 sides and the <em>included angle</em> between them</td><td>Angle MUST lie strictly between the two sides</td></tr>
                    <tr><td><strong>ASA</strong> (Angle-Side-Angle)</td><td>2 angles and the <em>included side</em> between them</td><td>Side connects the two angle vertices</td></tr>
                    <tr><td><strong>AAS</strong> (Angle-Angle-Side)</td><td>2 consecutive angles and a non-included side</td><td>Equivalent to ASA by Triangle Angle Sum ($180^\circ$)</td></tr>
                    <tr><td><strong>HL</strong> (Hypotenuse-Leg)</td><td>Right triangle: Congruent hypotenuse and 1 leg</td><td>Valid strictly in right triangles ($90^\circ$)</td></tr>
                    <tr><td><strong style="color: #ef4444;">AAA &amp; SSA</strong></td><td colspan="2" style="color: #ef4444;"><strong>INVALID FOR CONGRUENCE!</strong> AAA proves similarity only. SSA produces the ambiguous two-triangle case.</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- ==========================================================================
         Section 10.3: Triangle Similarity & Geometric Mean
         ========================================================================== -->
    <section id="sec-10-3" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.3</span>
            <h2 class="math-section-title">Triangle Similarity ($\sim$) &amp; Geometric Mean Theorems</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-expand-arrows-alt"></i> THEOREM 10.3.1</span>
                <span class="math-def-domain">Topic: Geometric Mean Altitude &amp; Leg Theorems</span>
            </div>
            <div class="math-def-body">
                In right triangle $\Delta ABC$ with altitude $h$ drawn to hypotenuse $c$, partitioning $c$ into segments $p$ and $q$:
                $$h^2 = p \cdot q \implies h = \sqrt{p \cdot q} \quad (\text{Altitude is Geometric Mean of Segments})$$
                $$a^2 = p \cdot c \implies a = \sqrt{p \cdot c} \quad \text{and} \quad b^2 = q \cdot c \implies b = \sqrt{q \cdot c}$$
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 10.4: Right Triangle Trigonometry (SOH-CAH-TOA)
         ========================================================================== -->
    <section id="sec-10-4" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.4</span>
            <h2 class="math-section-title">Right Triangle Trigonometry: SOH-CAH-TOA</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">PRIMARY RATIO I</div>
                <div class="math-formula-title">Sine Ratio ($\sin\theta$)</div>
                <div class="math-formula-latex">$$\sin\theta = \frac{\text{Opposite}}{\text{Hypotenuse}} \quad (\text{SOH})$$</div>
                <div class="math-formula-desc">Reciprocal: Cosecant $\csc\theta = \frac{\text{Hyp}}{\text{Opp}} = \frac{1}{\sin\theta}$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">PRIMARY RATIO II</div>
                <div class="math-formula-title">Cosine Ratio ($\cos\theta$)</div>
                <div class="math-formula-latex">$$\cos\theta = \frac{\text{Adjacent}}{\text{Hypotenuse}} \quad (\text{CAH})$$</div>
                <div class="math-formula-desc">Reciprocal: Secant $\sec\theta = \frac{\text{Hyp}}{\text{Adj}} = \frac{1}{\cos\theta}$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">PRIMARY RATIO III</div>
                <div class="math-formula-title">Tangent Ratio ($\tan\theta$)</div>
                <div class="math-formula-latex">$$\tan\theta = \frac{\text{Opposite}}{\text{Adjacent}} = \frac{\sin\theta}{\cos\theta} \quad (\text{TOA})$$</div>
                <div class="math-formula-desc">Reciprocal: Cotangent $\cot\theta = \frac{\text{Adj}}{\text{Opp}} = \frac{1}{\tan\theta}$.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 10.5: Special Right Triangles
         ========================================================================== -->
    <section id="sec-10-5" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.5</span>
            <h2 class="math-section-title">Special Right Triangles ($45^\circ$-$45^\circ$-$90^\circ$ &amp; $30^\circ$-$60^\circ$-$90^\circ$)</h2>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Special Triangle</th>
                        <th>Side Length Ratio</th>
                        <th>$\sin\theta$ Exact</th>
                        <th>$\cos\theta$ Exact</th>
                        <th>$\tan\theta$ Exact</th>
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

    <!-- ==========================================================================
         Section 10.6: Circle Geometry Theorems
         ========================================================================== -->
    <section id="sec-10-6" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.6</span>
            <h2 class="math-section-title">Circle Geometry: Chords, Tangents &amp; Inscribed Angles</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">INSCRIBED ANGLE</div>
                <div class="math-formula-title">Inscribed Angle Theorem</div>
                <div class="math-formula-latex">$$\angle_{\text{inscribed}} = \frac{1}{2} \cdot \text{Arc Measure}$$</div>
                <div class="math-formula-desc">An angle inscribed in a semicircle is strictly a right angle ($90^\circ$).</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">INTERSECTING CHORDS</div>
                <div class="math-formula-title">Chord Segment Products</div>
                <div class="math-formula-latex">$$a \cdot b = c \cdot d$$</div>
                <div class="math-formula-desc">Products of intersecting chord segments inside a circle are equal.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">TANGENT THEOREM</div>
                <div class="math-formula-title">Radius-Tangent Perpendicularity</div>
                <div class="math-formula-latex">$$\text{Radius } \perp \text{ Tangent Line } (90^\circ)$$</div>
                <div class="math-formula-desc">Two tangents drawn from the same external point are congruent.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 10.7: Arc Length, Sector Area & Coordinate Circle Equation
         ========================================================================== -->
    <section id="sec-10-7" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.7</span>
            <h2 class="math-section-title">Arc Length, Sector Area &amp; Coordinate Circle Equation</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">ARC LENGTH</div>
                <div class="math-formula-title">Arc Length ($s$)</div>
                <div class="math-formula-latex">$$s = \frac{\theta}{360^\circ}(2\pi r) = r\theta \quad (\theta \text{ rad})$$</div>
                <div class="math-formula-desc">Curved length along the circumference subtended by central angle $\theta$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">SECTOR AREA</div>
                <div class="math-formula-title">Sector Area ($A_{\text{sector}}$)</div>
                <div class="math-formula-latex">$$A = \frac{\theta}{360^\circ}(\pi r^2) = \frac{1}{2}r^2\theta$$</div>
                <div class="math-formula-desc">Fractional area of circle enclosed by two radii and the arc.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">CONIC SECTION</div>
                <div class="math-formula-title">Standard Equation of a Circle</div>
                <div class="math-formula-latex">$$(x - h)^2 + (y - k)^2 = r^2$$</div>
                <div class="math-formula-desc">Circle centered at coordinate $(h, k)$ with radius $r$.</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 10.8: Coordinate Geometry Proofs
         ========================================================================== -->
    <section id="sec-10-8" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.8</span>
            <h2 class="math-section-title">Coordinate Geometry Proofs &amp; Quadrilateral Verification</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-meta">SLOPE CRITERIA</div>
                <div class="math-formula-title">Perpendicular Lines</div>
                <div class="math-formula-latex">$$m_1 \cdot m_2 = -1 \iff m_2 = -\frac{1}{m_1}$$</div>
                <div class="math-formula-desc">Slopes are opposite reciprocals. (Parallel: $m_1 = m_2$).</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-meta">MIDPOINT FORMULA</div>
                <div class="math-formula-title">Segment Bisection</div>
                <div class="math-formula-latex">$$M = \left(\frac{x_1 + x_2}{2}, \frac{y_1 + y_2}{2}\right)$$</div>
                <div class="math-formula-desc">Used to prove diagonals of a parallelogram bisect each other!</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 10.9: 3D Solids & Cavalieri's Principle
         ========================================================================== -->
    <section id="sec-10-9" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.9</span>
            <h2 class="math-section-title">3D Solids, Cavalieri's Principle &amp; Density</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-cube"></i> PRINCIPLE 10.9.1</span>
                <span class="math-def-domain">Topic: Cavalieri's Cross-Sectional Invariant</span>
            </div>
            <div class="math-def-body">
                If two solids have the same height $h$ and the same cross-sectional area at every level parallel to their bases, then they have equal volumes!
                $$\text{Pyramid / Cone Volume: } V = \frac{1}{3} B h \quad \vert \quad \text{Sphere Volume: } V = \frac{4}{3}\pi r^3$$
                $$\text{Density: } \text{Density} = \frac{\text{Mass}}{\text{Volume}} \quad \vert \quad \text{Population Density} = \frac{\text{Population}}{\text{Area}}$$
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 10.10: Computational Mental Math Speed Hacks
         ========================================================================== -->
    <section id="sec-10-10" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.10</span>
            <h2 class="math-section-title">Scholia &amp; Computational Geometry Speed Hacks</h2>
        </div>

        <div class="math-constant-grid">
            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-hand-paper" style="color: #b45309;"></i> HACK I</div>
                <div class="math-const-name">Trigonometric Left-Hand Trick</div>
                <div class="math-const-val">$$\sin\theta = \frac{\sqrt{\text{Fingers Below}}}{2} \quad \vert \quad \cos\theta = \frac{\sqrt{\text{Fingers Above}}}{2}$$</div>
                <div class="math-const-desc">Assign fingers to $0^\circ, 30^\circ, 45^\circ, 60^\circ, 90^\circ$. Fold finger to read exact radical fractions instantly!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-play" style="color: #1e3a8a;"></i> HACK II</div>
                <div class="math-const-name">30-60-90 Short-Leg Anchor</div>
                <div class="math-const-val">$$\text{Short Leg } x \implies \text{Hypotenuse } = 2x, \ \text{Long Leg } = x\sqrt{3}$$</div>
                <div class="math-const-desc">Always isolate the short leg across from $30^\circ$ first! Everything scales from that single number.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-circle" style="color: #065f46;"></i> HACK III</div>
                <div class="math-const-name">Thales' Semicircle Right Angle Shortcut</div>
                <div class="math-const-val">$$\text{Inscribed angle intercepting diameter } \implies 90^\circ \text{ ALWAYS}$$</div>
                <div class="math-const-desc">Any triangle with one side as the circle diameter is automatically a right triangle.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-vector-square" style="color: #9d174d;"></i> HACK IV</div>
                <div class="math-const-name">Area Scale Factor Squared Rule</div>
                <div class="math-const-val">$$\text{Linear Scale } k \implies \text{Area Scale } = k^2, \ \text{Volume Scale } = k^3$$</div>
                <div class="math-const-desc">If dimensions double ($k=2$), area quadruples ($\times 4$) and volume octuples ($\times 8$)!</div>
            </div>
        </div>
    </section>

    <!-- ==========================================================================
         Section 10.11: The Grand Synoptic Tables & Student Cheat Sheet
         ========================================================================== -->
    <section id="sec-10-11" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">&sect; 10.11</span>
            <h2 class="math-section-title">The Grand Synoptic Tables &amp; Complete Grade 10 / Geometry Student Cheat Sheet</h2>
        </div>

        <div class="math-summary-sheet">
            <div class="math-summary-header">
                <div>
                    <h3><i class="fas fa-scroll"></i> Grade 10 / Geometry Master Reference Concordance</h3>
                    <p style="margin: 0.25rem 0 0 0; font-size: 0.85rem; color: var(--reader-muted);">Authorized curriculum reference concordance &bull; High School Geometry Complete</p>
                </div>
                <div class="math-summary-actions">
                    <button type="button" class="math-print-btn" onclick="printSynopticTables()" aria-label="Print or Save Synoptic Tables as PDF">
                        <i class="fas fa-print"></i> Print / Save PDF
                    </button>
                    <button type="button" class="math-print-btn" onclick="downloadSynopticMarkdown()" aria-label="Download Synoptic Tables as Text File">
                        <i class="fas fa-download"></i> Download Text File
                    </button>
                </div>
            </div>

            <div class="math-summary-grid">
                <!-- Concordance 1 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-check-double" style="color: #f59e0b;"></i> Congruence &amp; Similarity</h4>
                    <ul>
                        <li>Congruent ($\cong$): SSS, SAS, ASA, AAS, HL</li>
                        <li>Similar ($\sim$): AA~, SAS~, SSS~</li>
                        <li>CPCTC: Corresponding parts congruent</li>
                        <li>Altitude: $h = \sqrt{pq}$</li>
                        <li>Leg: $a = \sqrt{pc}, b = \sqrt{qc}$</li>
                    </ul>
                </div>

                <!-- Concordance 2 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-play" style="color: #3b82f6;"></i> Trigonometry (SOH-CAH-TOA)</h4>
                    <ul>
                        <li>$\sin\theta = \frac{\text{Opp}}{\text{Hyp}}$ &bull; $\csc\theta = \frac{\text{Hyp}}{\text{Opp}}$</li>
                        <li>$\cos\theta = \frac{\text{Adj}}{\text{Hyp}}$ &bull; $\sec\theta = \frac{\text{Hyp}}{\text{Adj}}$</li>
                        <li>$\tan\theta = \frac{\text{Opp}}{\text{Adj}}$ &bull; $\cot\theta = \frac{\text{Adj}}{\text{Opp}}$</li>
                        <li>Pythagorean ID: $\sin^2\theta + \cos^2\theta = 1$</li>
                        <li>$\tan\theta = \sin\theta / \cos\theta$</li>
                    </ul>
                </div>

                <!-- Concordance 3 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-drafting-compass" style="color: #10b981;"></i> Special Triangles</h4>
                    <ul>
                        <li>45-45-90: $x : x : x\sqrt{2}$</li>
                        <li>$\sin(45^\circ) = \cos(45^\circ) = \frac{\sqrt{2}}{2}$</li>
                        <li>30-60-90: $x : x\sqrt{3} : 2x$</li>
                        <li>$\sin(30^\circ) = \frac{1}{2}, \cos(30^\circ) = \frac{\sqrt{3}}{2}$</li>
                        <li>$\sin(60^\circ) = \frac{\sqrt{3}}{2}, \cos(60^\circ) = \frac{1}{2}$</li>
                    </ul>
                </div>

                <!-- Concordance 4 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-circle-notch" style="color: #ec4899;"></i> Circle Geometry</h4>
                    <ul>
                        <li>Inscribed Angle: $\frac{1}{2} \times \text{Arc}$</li>
                        <li>Chords: $a \cdot b = c \cdot d$</li>
                        <li>Radius $\perp$ Tangent ($90^\circ$)</li>
                        <li>Circle Eq: $(x-h)^2 + (y-k)^2 = r^2$</li>
                        <li>Thales: Semicircle angle $= 90^\circ$</li>
                    </ul>
                </div>

                <!-- Concordance 5 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-pie-chart" style="color: #8b5cf6;"></i> Arcs &amp; Sectors</h4>
                    <ul>
                        <li>Arc Length: $s = r\theta = \frac{\theta}{360}(2\pi r)$</li>
                        <li>Sector Area: $A = \frac{1}{2}r^2\theta = \frac{\theta}{360}(\pi r^2)$</li>
                        <li>Radians to Deg: $\times \frac{180^\circ}{\pi}$</li>
                        <li>Deg to Radians: $\times \frac{\pi}{180^\circ}$</li>
                        <li>$2\pi \text{ rad} = 360^\circ$</li>
                    </ul>
                </div>

                <!-- Concordance 6 -->
                <div class="math-summary-col">
                    <h4><i class="fas fa-cube" style="color: #6366f1;"></i> 3D Solids &amp; Slopes</h4>
                    <ul>
                        <li>Perpendicular: $m_1 \cdot m_2 = -1$</li>
                        <li>Midpoint: $\left(\frac{x_1+x_2}{2}, \frac{y_1+y_2}{2}\right)$</li>
                        <li>Pyramid/Cone: $V = \frac{1}{3}Bh$</li>
                        <li>Sphere: $V = \frac{4}{3}\pi r^3, SA = 4\pi r^2$</li>
                        <li>Area Scale: $k^2$ &bull; Volume: $k^3$</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Client Script for Printing and Downloading Synoptic Tables -->
    <script>
        function printSynopticTables() {
            document.body.classList.add('printing-math-synoptic');
            window.print();
            setTimeout(function () {
                document.body.classList.remove('printing-math-synoptic');
            }, 1000);
        }

        function downloadSynopticMarkdown() {
            var textContent = "========================================================================\n" +
                "HESTEN ACADEMIC REFERENCE ARCHIVE - GEOMETRY (GRADE 10) MATHEMATICS CONCORDANCE\n" +
                "CALL NO: QA453.H47 2026 | DEWEY: 516.3 | VOLUME X\n" +
                "========================================================================\n\n" +
                "1. TRIANGLE CONGRUENCE & SIMILARITY:\n" +
                "   Congruence Postulates: SSS, SAS, ASA, AAS, HL (Right Triangles)\n" +
                "   INVALID Criteria     : AAA (proves similarity only), SSA (ambiguous case)\n" +
                "   CPCTC                : Corresponding Parts of Congruent Triangles are Congruent\n" +
                "   Similarity Postulates: AA~, SAS~, SSS~\n" +
                "   Geometric Mean       : Altitude h = sqrt(p * q) | Leg a = sqrt(p * c)\n\n" +
                "2. RIGHT TRIANGLE TRIGONOMETRY (SOH-CAH-TOA):\n" +
                "   sin(theta) = Opposite / Hypotenuse\n" +
                "   cos(theta) = Adjacent / Hypotenuse\n" +
                "   tan(theta) = Opposite / Adjacent = sin(theta) / cos(theta)\n" +
                "   Reciprocals: csc = 1/sin | sec = 1/cos | cot = 1/tan\n" +
                "   Fundamental Identity: sin^2(theta) + cos^2(theta) = 1\n\n" +
                "3. SPECIAL RIGHT TRIANGLES:\n" +
                "   45-45-90: Leg : Leg : Hypotenuse = x : x : x*sqrt(2)\n" +
                "             sin(45) = cos(45) = sqrt(2)/2 | tan(45) = 1\n" +
                "   30-60-90: Short Leg : Long Leg : Hypotenuse = x : x*sqrt(3) : 2x\n" +
                "             sin(30) = 1/2 | cos(30) = sqrt(3)/2 | tan(30) = sqrt(3)/3\n" +
                "             sin(60) = sqrt(3)/2 | cos(60) = 1/2 | tan(60) = sqrt(3)\n\n" +
                "4. CIRCLE THEOREMS & CONIC EQUATION:\n" +
                "   Standard Circle Equation: (x - h)^2 + (y - k)^2 = r^2\n" +
                "   Inscribed Angle Theorem : Angle = (1/2) * Intercepted Arc\n" +
                "   Thales' Theorem         : Angle inscribed in a semicircle = 90 deg\n" +
                "   Chord Segment Products  : a * b = c * d\n" +
                "   Tangent-Radius Theorem  : Radius is perpendicular to tangent line (90 deg)\n\n" +
                "5. ARC LENGTH & SECTOR AREA:\n" +
                "   Arc Length  : s = r * theta = (theta / 360) * (2 * pi * r)\n" +
                "   Sector Area : A = (1/2) * r^2 * theta = (theta / 360) * (pi * r^2)\n" +
                "   Radians-Degrees: 180 deg = pi radians\n\n" +
                "6. 3D SOLIDS & COORDINATE METRICS:\n" +
                "   Perpendicular Slopes: m1 * m2 = -1\n" +
                "   Midpoint Formula    : ((x1 + x2)/2, (y1 + y2)/2)\n" +
                "   Cylinder Volume     : V = pi * r^2 * h\n" +
                "   Cone / Pyramid      : V = (1/3) * Base Area * h\n" +
                "   Sphere Volume       : V = (4/3) * pi * r^3 | Surface Area: 4 * pi * r^2\n" +
                "   Scale Factors       : Linear = k => Area = k^2 => Volume = k^3\n\n" +
                "========================================================================\n" +
                "Hesten's Learning Platform - Curated Reference Codex\n";

            var blob = new Blob([textContent], { type: 'text/plain;charset=utf-8' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'Geometry-Grade-10-Synoptic-Tables.txt';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        }
    </script>
</div>
