<div class="math-reference-content">
    <!-- Chapter 2 Banner -->
    <div class="math-chapter-hero">
        <div class="math-hero-badge"><i class="fas fa-cubes"></i> Level: Grade 2 Mathematics</div>
        <h1 class="math-hero-title">Grade 2: Place Value to 1,000, Regrouping, Arrays &amp; Money</h1>
        <p class="math-hero-desc">The comprehensive Grade 2 reference covering 3-digit place value, multi-digit addition and subtraction with regrouping, even/odd number logic, arrays as foundations of multiplication, currency arithmetic, and mental math speed hacks.</p>
    </div>

    <!-- Quick Navigation Pills -->
    <nav class="math-toc-pills" aria-label="Chapter sections">
        <a href="#sec-2-1" class="math-pill"><i class="fas fa-layer-group"></i> 2.1 Place Value to 1,000</a>
        <a href="#sec-2-2" class="math-pill"><i class="fas fa-plus"></i> 2.2 Addition &amp; Regrouping</a>
        <a href="#sec-2-3" class="math-pill"><i class="fas fa-minus"></i> 2.3 Subtraction &amp; Borrowing</a>
        <a href="#sec-2-4" class="math-pill"><i class="fas fa-th"></i> 2.4 Arrays &amp; Foundations of Multiplication</a>
        <a href="#sec-2-5" class="math-pill"><i class="fas fa-coins"></i> 2.5 Money &amp; Currency Math</a>
        <a href="#sec-2-6" class="math-pill"><i class="fas fa-ruler"></i> 2.6 Measurement &amp; Line Plots</a>
        <a href="#sec-2-7" class="math-pill"><i class="fas fa-brain"></i> 2.7 Mental Math &amp; Study Hacks</a>
        <a href="#sec-2-8" class="math-pill"><i class="fas fa-file-invoice"></i> 2.8 Grade 2 Cheat Sheet</a>
    </nav>

    <!-- Section 2.1 -->
    <section id="sec-2-1" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">2.1</span>
            <h2 class="math-section-title">3-Digit Place Value: Hundreds, Tens &amp; Ones</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-book"></i> Definition 2.1.1</span>
                <span class="math-def-domain">Base-10 Structure</span>
            </div>
            <div class="math-def-body">
                A 3-digit number $N$ is decomposed into <strong>Hundreds ($H$)</strong>, <strong>Tens ($T$)</strong>, and <strong>Ones ($O$)</strong>:
                $$N = (H \times 100) + (T \times 10) + (O \times 1)$$
                $$\text{Example: } 742 = 7 \text{ Hundreds } (700) + 4 \text{ Tens } (40) + 2 \text{ Ones } (2)$$
            </div>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Standard Form</div>
                <div class="math-formula-latex">$$583$$</div>
                <div class="math-formula-desc">Written directly as digits.</div>
            </div>
            <div class="math-formula-card">
                <div class="math-formula-title">Expanded Form</div>
                <div class="math-formula-latex">$$500 + 80 + 3$$</div>
                <div class="math-formula-desc">Shows the exact value of each digit.</div>
            </div>
            <div class="math-formula-card">
                <div class="math-formula-title">Word Form</div>
                <div class="math-formula-latex">\text{"Five hundred eighty-three"}</div>
                <div class="math-formula-desc">Written out in formal English words.</div>
            </div>
        </div>
    </section>

    <!-- Section 2.2 -->
    <section id="sec-2-2" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">2.2</span>
            <h2 class="math-section-title">2-Digit &amp; 3-Digit Addition with Regrouping (Carrying)</h2>
        </div>

        <div class="math-theorem-box">
            <div class="math-thm-header">
                <span class="math-thm-badge"><i class="fas fa-sync-alt"></i> Algorithm 2.2</span>
                <span class="math-thm-title">The Regrouping Axiom for Addition</span>
            </div>
            <div class="math-thm-body">
                Whenever the sum of digits in any column equals $10$ or more ($S \geq 10$):
                $$\text{Keep the Ones digit in the column, and carry } 1 \text{ Ten to the next column to the left.}$$
                $$10 \text{ Ones} \longrightarrow 1 \text{ Ten}, \quad 10 \text{ Tens} \longrightarrow 1 \text{ Hundred}$$
            </div>
        </div>

        <div class="math-example-box">
            <div class="math-ex-header">
                <span class="math-ex-badge"><i class="fas fa-lightbulb"></i> Worked Example 2.2</span>
                <span class="math-ex-title">3-Digit Column Addition</span>
            </div>
            <div class="math-ex-body">
                <p><strong>Problem:</strong> Calculate $368 + 275$.</p>
                <div class="math-ex-solution">
                    <p><strong>Step 1 (Ones):</strong> $8 + 5 = 13 \implies$ write $3$, carry $1$ ten.</p>
                    <p><strong>Step 2 (Tens):</strong> $1 \text{ (carried)} + 6 + 7 = 14 \implies$ write $4$, carry $1$ hundred.</p>
                    <p><strong>Step 3 (Hundreds):</strong> $1 \text{ (carried)} + 3 + 2 = 6 \implies$ write $6$.</p>
                </div>
                <div class="math-ex-result"><i class="fas fa-check-circle"></i> Result: $368 + 275 = \mathbf{643}$.</div>
            </div>
        </div>
    </section>

    <!-- Section 2.3 -->
    <section id="sec-2-3" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">2.3</span>
            <h2 class="math-section-title">Multi-Digit Subtraction with Regrouping (Decomposition)</h2>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-cut"></i> Rule 2.3.1</span>
                <span class="math-def-domain">Borrowing Across Zeros</span>
            </div>
            <div class="math-def-body">
                When subtracting $A - B$, if the top digit is smaller than the bottom digit ($A_{\text{col}} < B_{\text{col}}$):
                $$\text{Borrow } 1 \text{ from the next column left, reducing it by } 1, \text{ and add } 10 \text{ to the current column.}$$
                $$\text{Example: } 500 - 247 \implies 4 \text{ Hundreds}, 9 \text{ Tens}, 10 \text{ Ones} - 247 = 253$$
            </div>
        </div>
    </section>

    <!-- Section 2.4 -->
    <section id="sec-2-4" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">2.4</span>
            <h2 class="math-section-title">Rectangular Arrays &amp; Foundations of Multiplication</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Rectangular Array Formula</div>
                <div class="math-formula-latex">$$\text{Total Items} = \text{Rows} \times \text{Columns}$$</div>
                <div class="math-formula-desc">An array of 4 rows and 5 columns has: $4 \times 5 = 20$ objects.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Repeated Addition Law</div>
                <div class="math-formula-latex">$$3 \text{ rows of } 6 = 6 + 6 + 6 = 18$$</div>
                <div class="math-formula-desc">Multiplication is rapid repeated addition of identical groups.</div>
            </div>
        </div>

        <div class="math-def-box">
            <div class="math-def-header">
                <span class="math-def-badge"><i class="fas fa-check-double"></i> Definition 2.4.1</span>
                <span class="math-def-domain">Even vs. Odd Numbers</span>
            </div>
            <div class="math-def-body">
                <ul>
                    <li><strong>Even Numbers:</strong> Can be divided into 2 equal teams or paired with zero remainder. Ends in $\{0, 2, 4, 6, 8\}$.</li>
                    <li><strong>Odd Numbers:</strong> Has 1 leftover when paired into groups of 2. Ends in $\{1, 3, 5, 7, 9\}$.</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Section 2.5 -->
    <section id="sec-2-5" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">2.5</span>
            <h2 class="math-section-title">Money &amp; Coin Currency Arithmetic</h2>
        </div>

        <div class="ref-table-wrap">
            <table class="ref-table">
                <thead>
                    <tr>
                        <th>Coin / Bill</th>
                        <th>Value (Cents)</th>
                        <th>Decimal Value</th>
                        <th>Key Multiples</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td><strong>Penny</strong></td><td>$1\text{¢}$</td><td>$\$0.01$</td><td>$100\text{ pennies} = \$1.00$</td></tr>
                    <tr><td><strong>Nickel</strong></td><td>$5\text{¢}$</td><td>$\$0.05$</td><td>$5, 10, 15, 20, 25\text{¢} \dots$</td></tr>
                    <tr><td><strong>Dime</strong></td><td>$10\text{¢}$</td><td>$\$0.10$</td><td>$10\text{ dimes} = \$1.00$</td></tr>
                    <tr><td><strong>Quarter</strong></td><td>$25\text{¢}$</td><td>$\$0.25$</td><td>$25\text{¢}, 50\text{¢}, 75\text{¢}, \$1.00$</td></tr>
                    <tr><td><strong>Dollar Bill</strong></td><td>$100\text{¢}$</td><td>$\$1.00$</td><td>$4\text{ quarters} = 1\text{ dollar}$</td></tr>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Section 2.6 -->
    <section id="sec-2-6" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">2.6</span>
            <h2 class="math-section-title">Telling Time to 5 Minutes &amp; Length Units</h2>
        </div>

        <div class="math-formula-grid">
            <div class="math-formula-card">
                <div class="math-formula-title">Clock Face 5-Minute Skip Rule</div>
                <div class="math-formula-latex">$$\text{Minutes} = \text{Clock Number} \times 5$$</div>
                <div class="math-formula-desc">If long hand points to $7$: $7 \times 5 = 35\text{ minutes past the hour}$.</div>
            </div>

            <div class="math-formula-card">
                <div class="math-formula-title">Standard Measurement Conversions</div>
                <div class="math-formula-latex">$$1\text{ foot} = 12\text{ inches} \quad \text{and} \quad 1\text{ meter} = 100\text{ cm}$$</div>
                <div class="math-formula-desc">3 feet = 1 yard (36 inches).</div>
            </div>
        </div>
    </section>

    <!-- Section 2.7: Math Hacks & Study Hacks -->
    <section id="sec-2-7" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">2.7</span>
            <h2 class="math-section-title">Grade 2 Mental Math &amp; Speed Calculation Hacks</h2>
        </div>

        <div class="math-constant-grid">
            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-bolt" style="color: #f59e0b;"></i> Hack #1</div>
                <div class="math-const-name">Left-to-Right Mental Addition</div>
                <div class="math-const-val">$$47 + 36 = (40 + 30) + (7 + 6) = 70 + 13 = 83$$</div>
                <div class="math-const-desc">Add the tens first in your head, then add the ones. This eliminates mental carrying strain!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-adjust" style="color: #6366f1;"></i> Hack #2</div>
                <div class="math-const-name">Compensation Hack (Friendly Numbers)</div>
                <div class="math-const-val">$$58 + 27 = (58 + 2) + 25 = 60 + 25 = 85$$</div>
                <div class="math-const-desc">When a number ends in 8 or 9, round it up to the nearest 10 by borrowing from the other number.</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-backward" style="color: #10b981;"></i> Hack #3</div>
                <div class="math-const-name">Subtraction by "Adding Up"</div>
                <div class="math-const-val">$$72 - 58 \implies 58 + \mathbf{2} = 60, \ 60 + \mathbf{12} = 72 \implies 2 + 12 = 14$$</div>
                <div class="math-const-desc">Cashier's change method: never subtract with regrouping in your head. Hop up from $58$ to $72$!</div>
            </div>

            <div class="math-constant-card">
                <div class="math-const-sym"><i class="fas fa-coins" style="color: #ec4899;"></i> Hack #4</div>
                <div class="math-const-name">Quarter Counting Rhythm</div>
                <div class="math-const-val">$$\mathbf{25\text{¢}}, \mathbf{50\text{¢}}, \mathbf{75\text{¢}}, \mathbf{\$1.00}, \mathbf{\$1.25}, \mathbf{\$1.50}, \mathbf{\$1.75}, \mathbf{\$2.00}$$</div>
                <div class="math-const-desc">Chant the 25 pattern aloud. You will count any amount of change instantly.</div>
            </div>
        </div>
    </section>

    <!-- Section 2.8: Summary Cheat Sheet -->
    <section id="sec-2-8" class="math-section">
        <div class="math-section-header">
            <span class="math-section-num">2.8</span>
            <h2 class="math-section-title">Grade 2 Comprehensive Summary Cheat Sheet</h2>
        </div>

        <div class="math-summary-sheet">
            <div class="math-summary-col">
                <h4>Place Value Units</h4>
                <ul>
                    <li>$10 \text{ ones} = 1 \text{ ten}$</li>
                    <li>$10 \text{ tens} = 1 \text{ hundred}$</li>
                    <li>$10 \text{ hundreds} = 1 \text{ thousand}$</li>
                    <li>Even: Ends in $0,2,4,6,8$</li>
                    <li>Odd: Ends in $1,3,5,7,9$</li>
                </ul>
            </div>

            <div class="math-summary-col">
                <h4>Money &amp; Time Rules</h4>
                <ul>
                    <li>1 Quarter = 25¢ (4 = $1.00)</li>
                    <li>1 Dime = 10¢ (10 = $1.00)</li>
                    <li>1 Nickel = 5¢ (20 = $1.00)</li>
                    <li>60 minutes = 1 hour</li>
                    <li>24 hours = 1 day</li>
                </ul>
            </div>

            <div class="math-summary-col">
                <h4>Geometry &amp; Measurement</h4>
                <ul>
                    <li>12 inches = 1 foot</li>
                    <li>3 feet = 1 yard = 36 inches</li>
                    <li>100 centimeters = 1 meter</li>
                    <li>Quadrilateral: 4 sides &amp; 4 angles</li>
                    <li>Pentagon: 5 sides &bull; Hexagon: 6</li>
                </ul>
            </div>
        </div>
    </section>
</div>
