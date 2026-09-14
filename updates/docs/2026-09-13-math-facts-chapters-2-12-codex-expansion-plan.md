---
title: "Math Reference Repository: Chapters 2–12 Codex Expansion Plan"
date: "2026-09-13"
category: "Implementation Plan"
tags: ["Math Reference", "Library Book", "Curriculum", "Student How-To Guides", "Cheat Sheets", "Download", "Print", "MathJax", "WCAG"]
summary: "Comprehensive implementation plan to elevate Chapters 2 through 12 of the Math Facts Reference Repository to match the scholastic codex formatting, student how-to guides, worked exemplums, speed hacks, and downloadable synoptic tables established in Chapter 1."
author: "Antigravity & Hesten"
---

# Math Reference Repository: Chapters 2–12 Codex Expansion Plan

## Objective
Elevate all remaining chapters of the **Math Facts Reference Repository** (`library/read/math-facts-repo/chapter-2.php` through `chapter-12.php`) to match the authoritative scholastic codex formatting, exhaustive curricular expansion, didactic student how-to guides, and downloadable/printable Grand Synoptic Tables established in Chapter 1.

---

## Architectural Standard Established in Chapter 1

In **Chapter 1 (`chapter-1.php`)**, the math repository was transformed into the **First Grade Mathematics Reference Codex** featuring:
1. **Archival Cataloging Header & Frontispiece**:
   - Callout header with official academic archive badge, Dewey decimal, and Library of Congress classification.
   - Frontispiece bookplate with Volume compendium badge, title, scholastic subtitle, fleuron divider (`&#10086;`), and authoritative handbook description.
2. **Standardized Scholastic Layout Elements**:
   - Formal Section badges: `§ X.Y` with clear descriptive titles.
   - Definition Boxes (`math-def-box`): `math-def-badge`, `math-def-domain`, `<dfn class="math-term">`, and clear LaTeX axioms.
   - Formula Cards (`math-formula-grid` / `math-formula-card`): Law classification, mathematical title, formatted LaTeX, and conceptual descriptions.
   - Student How-To Guides (`math-howto-box`): Step-by-step sequential problem-solving walkthroughs with badges (`math-step-badge`, `math-step-item`).
   - Worked Exemplums (`math-example-box`): Formal Latin-styled `EXEMPLUM X.Y`, problem statement, step-by-step solution derivation (`math-sol-step`), and verified result block with Q.E.D. (`math-qed`).
   - Scholastic Cautions (`math-caution-box`): Highlighting frequent mathematical pitfalls, non-commutative operations, and domain restrictions.
   - Systematic Reference Tables (`ref-table-wrap`, `ref-table`): Comprehensive, accessible tabular references.
   - Computational Speed Hacks (`math-constant-grid`, `math-constant-card`): Mental math heuristics and shortcuts with icons and LaTeX demonstrations.
3. **The Grand Synoptic Tables & Instant Download / Print**:
   - Dedicated final section containing the **Master Reference Concordance** (`math-summary-sheet`).
   - High-contrast, beautifully organized 6-column reference grid (`math-summary-grid`, `math-summary-col`).
   - Client-side one-click **Print / Save PDF** (`printSynopticTables()`) tailored for clean sheet printing without UI chrome.
   - Client-side one-click **Download Text File** (`downloadSynopticMarkdown()`) generating structured offline reference cheat sheets.

---

## Scope of Expansion: Chapters 2 through 12

We will upgrade all 11 remaining chapters across Elementary, Middle, and High School mathematics:

### Cohort A: Elementary Foundations (Chapters 2–5)
1. **Chapter 2: Second Grade Mathematics Reference Codex** (QA107.H47 Vol. II)
   - Place value to 1,000 (hundreds, tens, ones, base-10 blocks).
   - 2-digit and 3-digit column addition & subtraction with regrouping (carrying & decomposition across zeros).
   - Even vs. odd arithmetic properties & parity tests.
   - Rectangular arrays, rows/columns, and foundations of repeated addition.
   - Money and US currency combinations up to \$1.00 and \$5.00.
   - Telling time to 5 minutes (a.m./p.m., analog skip counting).
   - Standard linear measurement (inches, feet, yards, centimeters, meters) & line plots.
   - 2D/3D geometric attributes (quadrilaterals, pentagons, hexagons, cubes).
   - Picture graphs and bar graphs with scale intervals.
   - Grade 2 mental math speed hacks (left-to-right addition, compensation, cashier's add-up).
   - Grand Synoptic Tables & instant Print/Download client script.

2. **Chapter 3: Third Grade Mathematics Reference Codex** (QA107.H47 Vol. III)
   - Multiplication & division models (equal groups, arrays, area models, repeated subtraction).
   - Core properties: Commutative, Associative, and Distributive Property of Multiplication.
   - Fact families and multiplication fact fluency (0 through 12).
   - Fraction concepts: unit fractions ($\frac{1}{b}$), fractions on the number line, fractions of a set.
   - Equivalent fractions and comparing fractions with same numerators or denominators.
   - Area ($A = l \times w$) through unit square tiling and perimeter ($P = 2l + 2w$).
   - Telling time to the exact minute and elapsed time word problems.
   - Liquid volume (liters) and mass (grams, kilograms).
   - Scaled bar graphs and picture graphs.
   - Grade 3 mental math speed hacks (break-apart multiplication, nine-finger trick, halving and doubling).
   - Grand Synoptic Tables & instant Print/Download client script.

3. **Chapter 4: Fourth Grade Mathematics Reference Codex** (QA107.H47 Vol. IV)
   - Multi-digit place value to 1,000,000 and standard rounding algorithms.
   - Multi-digit multiplication (up to $4\text{-digit} \times 1\text{-digit}$ and $2\text{-digit} \times 2\text{-digit}$) using area models and standard algorithm.
   - Long division with remainders (up to $4\text{-digit} \div 1\text{-digit}$).
   - Factors, multiples, prime and composite numbers, divisibility rules (2, 3, 4, 5, 6, 9, 10).
   - Fraction equivalence, comparing fractions with unlike denominators, adding and subtracting mixed numbers with like denominators.
   - Multiplying fractions by whole numbers ($n \times \frac{a}{b}$).
   - Decimal fractions (tenths and hundredths) and money notation.
   - Angle concepts: acute, right, obtuse, straight; protractor measurement (degrees).
   - Lines: parallel, perpendicular, intersecting; lines of symmetry.
   - Grade 4 mental math speed hacks (double-and-half, multiplying by 11, 25, 99).
   - Grand Synoptic Tables & instant Print/Download client script.

4. **Chapter 5: Fifth Grade Mathematics Reference Codex** (QA107.H47 Vol. V)
   - Decimal place value to thousandths, rounding, comparing, and power-of-10 shifts.
   - Standard algorithms: multi-digit whole number and decimal operations ($+, -, \times, \div$).
   - Adding and subtracting fractions with unlike denominators (LCM/LCD).
   - Multiplying fractions and dividing unit fractions by whole numbers (and vice versa).
   - Rectangular prism volume ($V = l \times w \times h = B \times h$) and composite volumes.
   - The Coordinate Plane (Quadrant I: origin $(0,0)$, x-axis, y-axis, ordered pairs).
   - 2D figure classification hierarchy (polygons, trapezoids, parallelograms, rhombuses, rectangles, squares).
   - Order of operations (PEMDAS / GEMDAS) with nested brackets and braces.
   - Grade 5 mental math speed hacks (dividing by 5 or 50, fraction cross-cancellation, decimal shifts).
   - Grand Synoptic Tables & instant Print/Download client script.

---

### Cohort B: Middle School Foundations (Chapters 6–8)
5. **Chapter 6: Sixth Grade Mathematics Reference Codex** (QA107.H47 Vol. VI)
   - Ratios, rates, and unit rates ($r = \frac{y}{x}$).
   - Percentages as rates per 100, finding percent of a quantity.
   - Division of fractions by fractions ($\frac{a}{b} \div \frac{c}{d} = \frac{a}{b} \times \frac{d}{c}$).
   - Negative integers, absolute value ($|x|$), and rational numbers across all four quadrants.
   - Algebraic expressions, distributive factoring, and combining like terms.
   - One-step linear equations ($x + a = b, ax = b$) and inequalities on number lines.
   - Geometric nets, surface area of prisms and pyramids, volume with fractional edge lengths.
   - Statistics: measures of center (mean, median, mode) and spread (range, IQR, MAD).
   - Grade 6 mental math speed hacks (10% benchmark percent calculation, integer sign rules).
   - Grand Synoptic Tables & instant Print/Download client script.

6. **Chapter 7: Seventh Grade Mathematics Reference Codex** (QA107.H47 Vol. VII)
   - Arithmetic with positive and negative rational numbers (fractions and decimals).
   - Proportional relationships: unit rate as constant of proportionality ($k = \frac{y}{x}, y = kx$).
   - Multi-step ratio and percent problems (tax, tip, discount, markup, simple interest $I = Prt$, percent change).
   - Two-step linear equations ($ax + b = c$) and inequalities with sign-flipping on negative multiplication/division.
   - Scale drawings, scale factors, and geometric angle relationships (vertical, adjacent, complementary, supplementary).
   - Circumference ($C = 2\pi r = \pi d$) and area of circles ($A = \pi r^2$).
   - Slice cross-sections of 3D solids and surface area/volume of cylinders.
   - Theoretical and experimental probability, compound events, and representative random sampling.
   - Grade 7 mental math speed hacks (simple interest mental calculation, cross-multiplying proportions).
   - Grand Synoptic Tables & instant Print/Download client script.

7. **Chapter 8: Eighth Grade Mathematics Reference Codex** (QA107.H47 Vol. VIII)
   - Real numbers: rational vs. irrational numbers ($\sqrt{2}, \pi$), repeating decimals to fractions.
   - Scientific notation ($a \times 10^n$) and exponent laws ($x^a \cdot x^b, \frac{x^a}{x^b}, (x^a)^b, x^{-n}, x^0$).
   - Linear functions: slope ($m = \frac{y_2 - y_1}{x_2 - x_1}$), slope-intercept form ($y = mx + b$), point-slope form.
   - Systems of two linear equations: graphing, substitution, and elimination methods.
   - The Pythagorean Theorem ($a^2 + b^2 = c^2$), converse, and 2D/3D distance formula.
   - Rigid geometric transformations (translations, rotations, reflections) and dilations (similarity).
   - 3D volume formulas: cylinders ($V = \pi r^2 h$), cones ($V = \frac{1}{3}\pi r^2 h$), spheres ($V = \frac{4}{3}\pi r^3$).
   - Bivariate data, scatter plots, lines of best fit, and two-way relative frequency tables.
   - Grade 8 mental math speed hacks (memorized Pythagorean triples, negative exponent reciprocal flips).
   - Grand Synoptic Tables & instant Print/Download client script.

---

### Cohort C: High School Advanced Mathematics (Chapters 9–12)
8. **Chapter 9: Ninth Grade Mathematics Reference Codex (Algebra I)** (QA152.H47 Vol. IX)
   - Real number properties, compound inequalities, absolute value equations and inequalities.
   - Functions: domain, range, function notation $f(x)$, rate of change, intercepts, piecewise functions.
   - Polynomial operations: adding, subtracting, multiplying (FOIL and box method).
   - Polynomial factoring: GCF, difference of two squares, trinomial factoring ($ax^2 + bx + c$), grouping.
   - Quadratic functions: standard, vertex, and factored forms; completing the square; Quadratic Formula ($x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$); discriminant ($\Delta$).
   - Exponential functions ($y = a \cdot b^x$), growth/decay models ($A = P(1 \pm r)^t$), half-life.
   - Arithmetic and geometric sequences ($a_n = a_1 + (n-1)d$, $a_n = a_1 \cdot r^{n-1}$).
   - Statistics: residual plots, standard deviation ($\sigma$), correlation coefficient ($r$).
   - Algebra I mental math hacks (factoring shortcuts, discriminant sanity checks).
   - Grand Synoptic Tables & instant Print/Download client script.

9. **Chapter 10: Tenth Grade Mathematics Reference Codex (High School Geometry)** (QA453.H47 Vol. X)
   - Formal logic: conditionals, converses, inverses, contrapositives, biconditionals, two-column and flow proofs.
   - Parallel lines and angles cut by a transversal (alternate interior, alternate exterior, consecutive interior, corresponding).
   - Triangle congruence theorems (SSS, SAS, ASA, AAS, HL) and CPCTC.
   - Triangle similarity criteria (AA~, SAS~, SSS~) and geometric mean theorems.
   - Right triangle trigonometry: SOH-CAH-TOA, special right triangles ($45^\circ-45^\circ-90^\circ$ and $30^\circ-60^\circ-90^\circ$).
   - Circle geometry: central and inscribed angles, tangent-radius perpendicularity, secant-tangent power theorems, arc length ($s = r\theta$), sector area ($A = \frac{1}{2}r^2\theta$).
   - Coordinate proofs: slope criteria for perpendicularity ($m_1 \cdot m_2 = -1$), midpoint formula, equation of a circle ($(x-h)^2 + (y-k)^2 = r^2$).
   - 3D solids, Cavalieri's principle, density, and geometric modeling.
   - Geometry mental math hacks (special right triangle scaling, inscribed angle half-rule).
   - Grand Synoptic Tables & instant Print/Download client script.

10. **Chapter 11: Eleventh Grade Mathematics Reference Codex (Algebra II & Trigonometry)** (QA154.H47 Vol. XI)
    - Polynomial functions of degree $\ge 3$: Remainder Theorem, Factor Theorem, Rational Root Theorem, Fundamental Theorem of Algebra.
    - Rational functions: vertical, horizontal, and slant asymptotes, holes, and partial fraction decomposition basics.
    - Radical expressions, complex numbers ($i = \sqrt{-1}, i^2 = -1$), powers of $i$, Argand diagram, and conjugate pairs.
    - Exponential and Logarithmic functions: natural log ($\ln$), change of base, logarithmic laws ($\log(xy), \log(x/y), \log(x^k)$), solving exponential equations.
    - The Unit Circle: radian measure ($2\pi \text{ rad} = 360^\circ$), exact trigonometric values at all benchmark angles ($0, \frac{\pi}{6}, \frac{\pi}{4}, \frac{\pi}{3}, \frac{\pi}{2}, \dots$).
    - Trigonometric graphs: amplitude, period ($T = \frac{2\pi}{b}$), phase shift, and Pythagorean identity ($\sin^2\theta + \cos^2\theta = 1$).
    - Sequences and series: sigma notation ($\sum$), finite and infinite geometric series ($S_\infty = \frac{a}{1-r}$).
    - Probability & Statistics: permutations ($nPr$), combinations ($nCr$), binomial probability, normal distributions and empirical rule ($68-95-99.7$).
    - Algebra II mental math hacks (logarithm approximations, unit circle coordinates memory tricks).
    - Grand Synoptic Tables & instant Print/Download client script.

11. **Chapter 12: Twelfth Grade Mathematics Reference Codex (Pre-Calculus & Calculus Foundations)** (QA303.H47 Vol. XII)
    - Limits: graphical, algebraic (factoring, rationalizing, L'Hôpital's preview), one-sided limits, continuity at a point.
    - Difference quotient and formal definition of the derivative: $f'(x) = \lim_{h \to 0}\frac{f(x+h) - f(x)}{h}$.
    - Fundamental derivative rules: Constant, Power Rule ($\frac{d}{dx}[x^n] = nx^{n-1}$), Constant Multiple, Sum/Difference, Product Rule, Quotient Rule, Chain Rule.
    - Applications of derivatives: tangent line equation, critical points, First and Second Derivative Tests, concavity, inflection points, optimization.
    - Introduction to definite and indefinite integrals: Riemann sums, power rule of integration, and the Fundamental Theorem of Calculus ($\int_a^b f(x)\,dx = F(b) - F(a)$).
    - Polar coordinates $(r, \theta)$, conversions to Cartesian $(x, y)$, and polar graphs.
    - Parametric equations and vectors in 2D/3D (magnitude, direction, dot product).
    - Conic sections: parabolas, ellipses, hyperbolas in standard and translated forms.
    - Universal constants reference ($\pi, e, \phi, i, \gamma, \sqrt{2}$).
    - Pre-Calculus/Calculus mental math hacks (power rule quick differentiation, polynomial limit end behavior).
    - Grand Synoptic Tables & instant Print/Download client script.

---

## Technical & Architectural Guidelines

- **Zero Breaking Changes**: All existing IDs (`sec-2-1`, etc.) will be retained and enhanced to preserve internal bookmarks and TOC navigation in the reader shell.
- **Strict Tag Balancing**: Validate all HTML container elements (`<div class="math-reference-content">`, `<section>`, `<div>`, `<p>`, `<table>`) with Node scripts before closing tasks.
- **Universal MathJax SVG Standards**: Compliant with `tex-svg` rendering, currentColor theme adaptation, responsive overflow containment.
- **Accessibility & WCAG AAA**: High-contrast ratios, keyboard focus rings, screen reader landmarks, semantic headings, and descriptive alt/aria attributes.
- **Print & Download Fidelity**: Client functions `printSynopticTables()` and `downloadSynopticMarkdown()` will generate grade-appropriate downloadable text files (`Grade-2-Math-Synoptic-Tables.txt`, etc.).

---

## Verification Plan

### Automated Checks
1. **DOM Structure & Tag Balance**: Run Node.js HTML tag balance validators across all modified `chapter-*.php` files to ensure zero unclosed or mismatched tags.
2. **Master Verification Suite**: Run `node scratch/verify_master_suite.js` to ensure the platform passes all syntax and structural checks.
3. **MathJax & Delimiter Integrity**: Run automated regex scanners to confirm every `$ ... $` and `$$ ... $$` delimiter is balanced and properly escaped.

### Manual / Browser Verification
1. Open each chapter in the digital reader `/library/read/index.php?book=math-facts-repo&chapter=X`.
2. Verify visual appearance: Archival catalog header, hero frontispiece, definitions, formulas, student how-tos, worked exemplums, caution boxes, reference tables, constant grids, and grand synoptic tables.
3. Test the "Print / Save PDF" button and "Download Text File" button on each chapter.
4. Test light, dark, midnight, and sepia themes for MathJax equation readability.
