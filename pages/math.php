<?php
/**
 * pages/math.php - Universal Mathematics Codex & Index
 * Repository-style mathematical lexicon organized strictly in A-Z alphabetical order,
 * providing comprehensive definitions, conceptual mechanisms ('what it does'),
 * step-by-step procedures ('how to do it'), and worked exemplars across all 12 grades.
 */

$pageTitle = "Universal Mathematics Codex & Index (A–Z) | Hesten's Learning";
$pageDescription = "A-Z mathematical index and repository covering core definitions, conceptual intuition, step-by-step procedures, and worked examples across all 12 grades.";
$pageKeywords = "math index, math dictionary, math definitions, common core math, worked math examples, a-z math, calculus, algebra, geometry";
$requiresMathJax = true;

include '../src/header.php';

// Mathematical Terms Database across all 12 Grades
$mathTerms = [
    // -------------------------------------------------------------------------
    // A
    // -------------------------------------------------------------------------
    [
        'id' => 'g6-absolute-value',
        'name' => 'Absolute Value & The Integer Domain',
        'etymology' => '/ˈæbsəluːt ˈvæljuː/ • Latin: "absolutus" (freed, unbound by direction)',
        'grade' => 6,
        'gradeName' => '6th Grade',
        'branch' => 'arithmetic',
        'branchLabel' => 'Pre-Algebra',
        'formula' => '$$|x| = \begin{cases} x & \text{if } x \ge 0 \\ -x & \text{if } x < 0 \end{cases}$$',
        'rawFormula' => '|x| = distance from zero on the number line',
        'definition' => 'The non-negative magnitude of a real number on the continuous number line, representing its geometric distance from origin zero ($0$) irrespective of direction.',
        'whatItDoes' => 'It quantifies pure magnitude where direction or sign is irrelevant, such as deviations, financial deficits, depth below sea level, or physical distance.',
        'howToDoIt' => [
            'Locate the coordinate $x$ on the real number line.',
            'Measure the spatial distance between $x$ and $0$.',
            'Drop any negative sign: distance is always non-negative ($|-7| = 7$, $|+7| = 7$).'
        ],
        'exampleProblem' => 'Evaluate $|-18| + |12| - |-5|$.',
        'exampleSolution' => '$|-18| = 18$, $|12| = 12$, and $|-5| = 5$. Compute: $18 + 12 - 5 = 30 - 5 = 25$.',
        'codexChapter' => 6,
        'keywords' => 'absolute value signed numbers integers magnitude distance grade 6'
    ],
    [
        'id' => 'g2-addition-regrouping',
        'name' => 'Addition Regrouping & Decomposition (Carrying)',
        'etymology' => '/riːˈɡruːpɪŋ/ • Old French: "groupe" (cluster or bundle)',
        'grade' => 2,
        'gradeName' => '2nd Grade',
        'branch' => 'arithmetic',
        'branchLabel' => 'Arithmetic',
        'formula' => '$$\text{If } O_1 + O_2 \ge 10 \implies \text{Bundle 10 Ones into 1 Ten}$$',
        'rawFormula' => 'If Ones >= 10, Carry 1 to Tens Column',
        'definition' => 'The algorithmic process of composing a single higher base-ten unit whenever the sum of digits in an existing column equals or exceeds the base value ($10$).',
        'whatItDoes' => 'It preserves place value integrity by ensuring no single digit slot ever exceeds $9$, allowing infinite multi-digit addition.',
        'howToDoIt' => [
            'Align addends vertically by column (Hundreds, Tens, Ones).',
            'Add the Ones column. If the sum is 10 or greater, record the ones digit below and carry the tens bundle above the next column.',
            'Add the Tens column, remembering to include any carried bundle.'
        ],
        'exampleProblem' => 'Compute $48 + 37$ with vertical regrouping.',
        'exampleSolution' => 'Ones: $8 + 7 = 15$. Record 5 in ones, carry 1 ten. Tens: $1 \text{ (carried)} + 4 + 3 = 8$. Final sum: $85$.',
        'codexChapter' => 2,
        'keywords' => 'regrouping carrying addition base-ten grade 2 elementary arithmetic'
    ],
    [
        'id' => 'g3-area-rectangles',
        'name' => 'Area of Rectangles & Polygons',
        'etymology' => '/ˈeəriə/ • Latin: "area" (open space, vacant threshing floor)',
        'grade' => 3,
        'gradeName' => '3rd Grade',
        'branch' => 'geometry',
        'branchLabel' => 'Geometry',
        'formula' => '$$A = l \times w = b \times h$$',
        'rawFormula' => 'Area = Length * Width',
        'definition' => 'The total two-dimensional surface enclosed within a closed boundary, quantified as the aggregate count of square unit tiles ($1 \times 1$) that tile the planar region without overlaps.',
        'whatItDoes' => 'It measures planar coverage: flooring, carpeting, painting walls, solar panel arrays, and farming plots.',
        'howToDoIt' => [
            'Measure the perpendicular linear length ($l$) and linear width ($w$) in matching units.',
            'Multiply length by width: $A = l \times w$.',
            'Attach square units to the product ($\text{in}^2, \text{cm}^2, \text{m}^2$).'
        ],
        'exampleProblem' => 'A classroom rug measures $8\text{ ft}$ long and $6\text{ ft}$ wide. Calculate the total floor area covered.',
        'exampleSolution' => '$A = l \times w = 8 \times 6 = 48\text{ sq ft}$.',
        'codexChapter' => 3,
        'keywords' => 'area rectangle length width square units geometry grade 3'
    ],
    [
        'id' => 'g10-triangle-congruence',
        'name' => 'Axiomatic Triangle Congruence (SSS, SAS, ASA, AAS, HL)',
        'etymology' => '/ˈkɒŋɡruəns/ • Latin: "congruere" (to agree together, correspond exactly)',
        'grade' => 10,
        'gradeName' => '10th Grade / Geom',
        'branch' => 'geometry',
        'branchLabel' => 'Geometry',
        'formula' => '$$\Delta ABC \cong \Delta DEF \iff \text{Rigid Motion Maps } \Delta ABC \to \Delta DEF$$',
        'rawFormula' => 'Congruent by SSS, SAS, ASA, AAS, or HL',
        'definition' => 'Geometric postulates establishing that two triangles possess identical size and shape if a specific subset of corresponding sides and angles are proven equal.',
        'whatItDoes' => 'It allows rigorous mathematical proof: once two triangles are proven congruent by 3 pieces of criteria, all 6 corresponding parts are guaranteed congruent (CPCTC).',
        'howToDoIt' => [
            'Identify given information and mark congruent side and angle pairs on the diagram.',
            'Look for shared sides (Reflexive Property) or vertical angles.',
            'Match to a valid congruence criteria (SSS, SAS, ASA, AAS, or Hypotenuse-Leg for right triangles). Never use unproven configurations like SSA or AAA.'
        ],
        'exampleProblem' => 'Two triangles share side $AC$. Side $AB \cong AD$ and $\angle BAC \cong \angle DAC$. Prove $\Delta ABC \cong \Delta ADC$.',
        'exampleSolution' => '$AB \cong AD$ (Side), $\angle BAC \cong \angle DAC$ (Angle), and $AC \cong AC$ (Side via Reflexive Property). Triangles are congruent by $\text{SAS Congruence Postulate}$.',
        'codexChapter' => 10,
        'keywords' => 'triangle congruence sss sas asa aas hl proofs cpctc geometry grade 10'
    ],

    // -------------------------------------------------------------------------
    // B
    // -------------------------------------------------------------------------
    [
        'id' => 'g1-place-value',
        'name' => 'Base-Ten Place Value (Tens & Ones)',
        'etymology' => '/beɪs tɛn pleɪs ˈvæljuː/ • Latin: "decimalis" (of tenths)',
        'grade' => 1,
        'gradeName' => '1st Grade',
        'branch' => 'arithmetic',
        'branchLabel' => 'Arithmetic',
        'formula' => '$$\text{Two-Digit Number} = (T \times 10) + (O \times 1)$$',
        'rawFormula' => 'Number = (Tens * 10) + (Ones * 1)',
        'definition' => 'The value of a digit determined strictly by its position within a number, where each unit in the tens column equals an aggregate group of ten individual single units.',
        'whatItDoes' => 'It allows humans to express any quantity using only ten symbols ($0$ through $9$) by bundling groups into bundles of ten, avoiding the need for infinite distinct numeral marks.',
        'howToDoIt' => [
            'Count out the total single units into complete bundles of ten.',
            'Write the count of complete 10-bundles in the left column (Tens).',
            'Write any remaining loose single units in the right column (Ones).'
        ],
        'exampleProblem' => 'Decompose the quantity $47$ into its foundational base-ten components.',
        'exampleSolution' => '47 contains 4 bundles of ten and 7 loose units: $47 = (4 \times 10) + (7 \times 1) = 40 + 7$.',
        'codexChapter' => 1,
        'keywords' => 'place value tens ones bundles base-ten decomposition grade 1 elementary'
    ],
    [
        'id' => 'g11-binomial-theorem',
        'name' => 'Binomial Theorem & Pascal Combinatorics',
        'etymology' => '/baɪˈnoʊmiəl/ • Latin: "bi" (two) + "nomen" (name/term)',
        'grade' => 11,
        'gradeName' => '11th Grade / Alg II',
        'branch' => 'algebra',
        'branchLabel' => 'Algebra II',
        'formula' => '$$(a + b)^n = \sum_{k=0}^{n} \binom{n}{k} a^{n-k} b^k \quad \left(\binom{n}{k} = \frac{n!}{k!(n-k)!}\right)$$',
        'rawFormula' => '(a + b)^n = sum(nCr * a^(n-k) * b^k)',
        'definition' => 'An algebraic formula providing the expanded polynomial terms of any binomial power $(a+b)^n$, using combinatoric binomial coefficients from Pascal\'s Triangle.',
        'whatItDoes' => 'It bypasses manual, error-prone repeated polynomial multiplications (like multiplying $(a+b)$ five times), expanding higher-degree powers in a single structured sweep.',
        'howToDoIt' => [
            'Identify row $n$ in Pascal\'s Triangle to obtain coefficients $\binom{n}{k}$.',
            'Write descending powers of $a$ from $a^n$ down to $a^0$.',
            'Write ascending powers of $b$ from $b^0$ up to $b^n$.',
            'Multiply coefficients and variable powers together for each term.'
        ],
        'exampleProblem' => 'Expand $(x + 2)^3$ using the Binomial Theorem.',
        'exampleSolution' => 'Row 3 coefficients: $1, 3, 3, 1$. Expand: $1(x^3)(2^0) + 3(x^2)(2^1) + 3(x^1)(2^2) + 1(x^0)(2^3) = x^3 + 6x^2 + 12x + 8$.',
        'codexChapter' => 11,
        'keywords' => 'binomial theorem pascal combinatorics expansion algebra 2 grade 11'
    ],

    // -------------------------------------------------------------------------
    // C
    // -------------------------------------------------------------------------
    [
        'id' => 'g7-circle-geometry',
        'name' => 'Circle Geometry: Circumference & Area',
        'etymology' => '/səˈkʌmfərəns/ • Greek: "π" (perimetros, circumference)',
        'grade' => 7,
        'gradeName' => '7th Grade',
        'branch' => 'geometry',
        'branchLabel' => 'Geometry',
        'formula' => '$$C = 2\pi r = \pi d, \quad A = \pi r^2$$',
        'rawFormula' => 'Circumference = 2*pi*r, Area = pi*r^2',
        'definition' => 'Geometric relationships for any Euclidean circle, where Circumference ($C$) is the boundary perimeter and Area ($A$) is the internal planar surface, both governed by the transcendental constant $\pi \approx 3.14159$.',
        'whatItDoes' => 'It allows precise calculation of round perimeters (wheels, tracks) and circular surface areas (pipes, pizza slices, fields) from a single radial measurement.',
        'howToDoIt' => [
            'Identify radius ($r$). If given diameter ($d$), divide by $2$ ($r = d/2$).',
            'For perimeter/circumference, compute $C = 2 \times \pi \times r$.',
            'For interior surface area, square the radius first ($r^2$), then multiply by $\pi$: $A = \pi \times r^2$.'
        ],
        'exampleProblem' => 'A circular trampoline has a radius of $7\text{ ft}$. Calculate its exact circumference and area in terms of $\pi$.',
        'exampleSolution' => 'Circumference: $C = 2\pi(7) = 14\pi\text{ ft}$. Area: $A = \pi(7^2) = 49\pi\text{ sq ft}$.',
        'codexChapter' => 7,
        'keywords' => 'circle circumference area pi radius diameter geometry grade 7'
    ],
    [
        'id' => 'g1-commutative-addition',
        'name' => 'Commutative Property of Addition',
        'etymology' => '/kəˈmjuːtətɪv/ • Latin: "commutare" (to interchange or swap)',
        'grade' => 1,
        'gradeName' => '1st Grade',
        'branch' => 'arithmetic',
        'branchLabel' => 'Arithmetic',
        'formula' => '$$a + b = b + a$$',
        'rawFormula' => 'a + b = b + a',
        'definition' => 'An algebraic axiom stating that changing the physical or conceptual order of addends does not alter their collective sum.',
        'whatItDoes' => 'It halves the memory required for mental math fact fluency: if you know $3 + 8 = 11$, you automatically know $8 + 3 = 11$.',
        'howToDoIt' => [
            'Identify the two addends being combined.',
            'Start with the larger number first to minimize manual counting efforts (Count-On Strategy).',
            'Add the smaller addend: the resulting sum is invariant.'
        ],
        'exampleProblem' => 'Calculate $2 + 9$ using the Commutative Property.',
        'exampleSolution' => 'Swap addends: $2 + 9 = 9 + 2$. Count on 2 units from 9: $9 \to 10 \to 11$. Sum is $11$.',
        'codexChapter' => 1,
        'keywords' => 'commutative addition order fact family swap grade 1 arithmetic'
    ],
    [
        'id' => 'g11-complex-numbers',
        'name' => 'Complex Numbers & The Imaginary Unit',
        'etymology' => '/ˈkɒm.plɛks/ • Latin: "complexus" (interwoven, composite of real and imaginary)',
        'grade' => 11,
        'gradeName' => '11th Grade / Alg II',
        'branch' => 'algebra',
        'branchLabel' => 'Algebra II',
        'formula' => '$$z = a + bi \quad (i = \sqrt{-1}, \; i^2 = -1, \; a, b \in \mathbb{R})$$',
        'rawFormula' => 'z = a + b*i, where i^2 = -1',
        'definition' => 'An extension of the one-dimensional real number system into a two-dimensional complex plane ($\mathbb{C}$), defined by the imaginary unit $i$ whose square equals $-1$.',
        'whatItDoes' => 'It eliminates the barrier of negative square roots, guaranteeing that every $n$-th degree polynomial has exactly $n$ complex roots (Fundamental Theorem of Algebra). Powers electrical engineering and quantum physics.',
        'howToDoIt' => [
            'Treat $i$ algebraically like a variable, combining real parts with real parts and imaginary parts with imaginary parts: $(a + bi) + (c + di) = (a+c) + (b+d)i$.',
            'When multiplying, expand via FOIL and replace any occurrence of $i^2$ with $-1$.',
            'To divide, multiply numerator and denominator by the complex conjugate $a - bi$.'
        ],
        'exampleProblem' => 'Multiply $(3 + 2i)(1 - 4i)$.',
        'exampleSolution' => 'FOIL: $3(1) + 3(-4i) + 2i(1) + 2i(-4i) = 3 - 12i + 2i - 8i^2$. Replace $i^2 = -1$: $3 - 10i - 8(-1) = 3 - 10i + 8 = 11 - 10i$.',
        'codexChapter' => 11,
        'keywords' => 'complex numbers imaginary unit i squared negative square root algebra 2 grade 11'
    ],
    [
        'id' => 'g7-constant-proportionality',
        'name' => 'Constant of Proportionality (Unit Rate)',
        'etymology' => '/prəˌpɔːʃəˈnæləti/ • Latin: "pro portione" (according to the share)',
        'grade' => 7,
        'gradeName' => '7th Grade',
        'branch' => 'algebra',
        'branchLabel' => 'Proportions',
        'formula' => '$$y = kx \implies k = \frac{y}{x}$$',
        'rawFormula' => 'k = y / x',
        'definition' => 'The invariant multiplicative ratio ($k$) between two directly proportional quantities $x$ and $y$, representing the steepness of a linear relationship passing through the origin $(0, 0)$.',
        'whatItDoes' => 'It describes uniform rate behaviors: speed ($d = rt$), wage rates ($\text{Pay} = r \times \text{Hours}$), scaling recipes, and currency conversion.',
        'howToDoIt' => [
            'Pick any non-zero ordered coordinate pair $(x, y)$ from a proportional table or graph.',
            'Divide the dependent variable $y$ by independent variable $x$: $k = \frac{y}{x}$.',
            'Verify that all other pairs $(x_i, y_i)$ yield the identical quotient $k$.'
        ],
        'exampleProblem' => 'A car travels $165\text{ miles}$ in $3\text{ hours}$ at constant speed. Find the constant of proportionality and the equation relating distance ($y$) and hours ($x$).',
        'exampleSolution' => '$k = \frac{y}{x} = \frac{165}{3} = 55\text{ mph}$. Direct proportional equation: $y = 55x$.',
        'codexChapter' => 7,
        'keywords' => 'proportionality unit rate constant of proportionality direct variation grade 7'
    ],

    // -------------------------------------------------------------------------
    // D
    // -------------------------------------------------------------------------
    [
        'id' => 'g12-derivative-definition',
        'name' => 'Derivative via Difference Quotient',
        'etymology' => '/dɪˈrɪvətɪv/ • Latin: "derivare" (to draw off from a source stream)',
        'grade' => 12,
        'gradeName' => '12th Grade / Calc',
        'branch' => 'calculus',
        'branchLabel' => 'Calculus',
        'formula' => '$$f\'(x) = \lim_{h \to 0} \frac{f(x + h) - f(x)}{h}$$',
        'rawFormula' => 'f\'(x) = lim_{h -> 0} (f(x+h) - f(x)) / h',
        'definition' => 'The instantaneous rate of change of a differentiable continuous function with respect to its independent variable, geometrically representing the exact slope of the tangent line at any point $x$.',
        'whatItDoes' => 'It freezes continuous motion at a single infinitesimal point in time, revealing exact velocities, rates of biological growth, and market volatility.',
        'howToDoIt' => [
            'Substitute $x + h$ into the function $f(x)$ to evaluate $f(x + h)$.',
            'Formulate the difference quotient: $\frac{f(x + h) - f(x)}{h}$.',
            'Algebraically cancel the factor of $h$ from the denominator.',
            'Evaluate the limit by taking $h \to 0$.'
        ],
        'exampleProblem' => 'Find the derivative of $f(x) = x^2$ using the limit definition.',
        'exampleSolution' => '$\lim_{h \to 0} \frac{(x+h)^2 - x^2}{h} = \lim_{h \to 0} \frac{x^2 + 2xh + h^2 - x^2}{h} = \lim_{h \to 0} \frac{2xh + h^2}{h} = \lim_{h \to 0} (2x + h) = 2x$.',
        'codexChapter' => 12,
        'keywords' => 'derivative limit difference quotient tangent slope calculus rate of change grade 12'
    ],
    [
        'id' => 'g3-distributive-property',
        'name' => 'Distributive Property of Multiplication',
        'etymology' => '/dɪˈstrɪbjʊtɪv/ • Latin: "distribuere" (to apportion or divide up)',
        'grade' => 3,
        'gradeName' => '3rd Grade',
        'branch' => 'algebra',
        'branchLabel' => 'Algebra & Ops',
        'formula' => '$$a \times (b + c) = (a \times b) + (a \times c)$$',
        'rawFormula' => 'a * (b + c) = (a * b) + (a * c)',
        'definition' => 'An algebraic theorem stating that multiplying a multiplier by a partitioned sum yields identical results to multiplying each part individually and summing the partial products.',
        'whatItDoes' => 'It allows complex mental arithmetic by breaking intimidating numbers (like $7 \times 14$) into two effortless friendly facts ($7 \times 10 + 7 \times 4$).',
        'howToDoIt' => [
            'Break one tough factor into two easier additive parts (e.g., $14 = 10 + 4$).',
            'Multiply the outside multiplier by the first decomposed part.',
            'Multiply the outside multiplier by the second decomposed part.',
            'Add the two partial products together.'
        ],
        'exampleProblem' => 'Evaluate $8 \times 13$ using the Distributive Property.',
        'exampleSolution' => 'Decompose $13 = 10 + 3$: $8 \times (10 + 3) = (8 \times 10) + (8 \times 3) = 80 + 24 = 104$.',
        'codexChapter' => 3,
        'keywords' => 'distributive property multiplication partial products decomposition grade 3'
    ],

    // -------------------------------------------------------------------------
    // E
    // -------------------------------------------------------------------------
    [
        'id' => 'g4-long-division',
        'name' => 'Euclidean Division Algorithm (Long Division)',
        'etymology' => '/lɔːŋ dɪˈvɪʒən/ • Latin: "divisio" (distribution among shares)',
        'grade' => 4,
        'gradeName' => '4th Grade',
        'branch' => 'arithmetic',
        'branchLabel' => 'Arithmetic',
        'formula' => '$$a = bq + r \quad (0 \le r < b)$$',
        'rawFormula' => 'Dividend = (Divisor * Quotient) + Remainder',
        'definition' => 'An iterative place-value algorithm that determines how many times a positive integer divisor ($b$) partitions into a dividend ($a$), yielding an integer quotient ($q$) and an exact remainder ($r$).',
        'whatItDoes' => 'It enables the exact and step-by-step division of arbitrarily large multi-digit numbers by breaking the computation down column-by-column.',
        'howToDoIt' => [
            'Divide: Determine how many times the divisor fits into the current active place-value digit(s).',
            'Multiply: Multiply the resulting quotient digit by the divisor.',
            'Subtract: Subtract that product from the active digits to find the local remainder.',
            'Bring Down: Bring down the next digit of the dividend and repeat.'
        ],
        'exampleProblem' => 'Divide $496 \div 4$ using the standard long division algorithm.',
        'exampleSolution' => '$4 \div 4 = 1$ (rem 0). Bring down 9: $9 \div 4 = 2$ ($2 \times 4 = 8$, rem 1). Bring down 6: $16 \div 4 = 4$ ($4 \times 4 = 16$, rem 0). Quotient is $124$.',
        'codexChapter' => 4,
        'keywords' => 'long division euclidean algorithm quotient remainder dividend divisor grade 4'
    ],
    [
        'id' => 'g9-exponential-models',
        'name' => 'Exponential Growth & Decay Models',
        'etymology' => '/ˌɛkspəˈnɛnʃəl/ • Latin: "exponere" (to exhibit, put forth into powers)',
        'grade' => 9,
        'gradeName' => '9th Grade / Alg I',
        'branch' => 'algebra',
        'branchLabel' => 'Algebra I',
        'formula' => '$$y = a(1 \pm r)^t \quad \left(\text{Growth: } +r, \; \text{Decay: } -r\right)$$',
        'rawFormula' => 'y = a * (1 +- r)^t',
        'definition' => 'A non-linear mathematical model where the rate of change is proportional to the current amount, resulting in geometric compounding over continuous or discrete time intervals $t$.',
        'whatItDoes' => 'It accurately models viral contagion, compound investment interest, population explosions, and radioactive carbon decay.',
        'howToDoIt' => [
            'Identify initial amount ($a$) and decimal rate of change ($r$).',
            'Construct the growth factor ($1 + r$) or decay factor ($1 - r$).',
            'Substitute elapsed time periods ($t$) into the exponent and evaluate.'
        ],
        'exampleProblem' => 'A colony of $500$ bacteria doubles ($r = 1.0$) every hour. How many bacteria exist after $4\text{ hours}$?',
        'exampleSolution' => '$y = a(1 + r)^t = 500(1 + 1)^4 = 500(2^4) = 500(16) = 8,000\text{ bacteria}$.',
        'codexChapter' => 9,
        'keywords' => 'exponential growth decay compounding interest bacteria algebra 1 grade 9'
    ],

    // -------------------------------------------------------------------------
    // F
    // -------------------------------------------------------------------------
    [
        'id' => 'g9-factoring-trinomials',
        'name' => 'Factoring Quadratic Trinomials',
        'etymology' => '/ˈfæk.tər.ɪŋ/ • Latin: "factor" (a maker, doer, or constituent part)',
        'grade' => 9,
        'gradeName' => '9th Grade / Alg I',
        'branch' => 'algebra',
        'branchLabel' => 'Algebra I',
        'formula' => '$$x^2 + (p + q)x + pq = (x + p)(x + q)$$',
        'rawFormula' => 'x^2 + bx + c = (x + p)(x + q)',
        'definition' => 'The algebraic decomposition of a quadratic trinomial into the product of two linear binomial factors, reversing the FOIL distributive expansion.',
        'whatItDoes' => 'By applying the Zero Product Property ($AB = 0 \implies A=0 \text{ or } B=0$), factoring converts complex polynomial expressions into simple solvable linear equations.',
        'howToDoIt' => [
            'Look for two integers $p$ and $q$ that multiply to constant $c$ ($p \times q = c$) and add to middle coefficient $b$ ($p + q = b$).',
            'Construct the binomials: $(x + p)(x + q)$.',
            'Check work by expanding via FOIL (First, Outside, Inside, Last).'
        ],
        'exampleProblem' => 'Factor the polynomial $x^2 + 7x + 12$.',
        'exampleSolution' => 'Find two numbers that multiply to $12$ and add to $7$: $3 \times 4 = 12$ and $3 + 4 = 7$. Factored form: $(x + 3)(x + 4)$.',
        'codexChapter' => 9,
        'keywords' => 'factoring trinomials binomials foil zero product property algebra 1 grade 9'
    ],
    [
        'id' => 'g5-unlike-fractions',
        'name' => 'Fraction Addition with Unlike Denominators',
        'etymology' => '/ʌnˈlaɪk dɪˈnɒmɪneɪtərz/ • Latin: "denominare" (to name or specify)',
        'grade' => 5,
        'gradeName' => '5th Grade',
        'branch' => 'fractions',
        'branchLabel' => 'Fractions',
        'formula' => '$$\frac{a}{b} + \frac{c}{d} = \frac{ad + bc}{bd}$$',
        'rawFormula' => '(a/b) + (c/d) = (a*d + b*c) / (b*d)',
        'definition' => 'The method of renaming fractions into equivalent representations sharing a common unit measure (the Least Common Denominator) prior to combining numerators.',
        'whatItDoes' => 'Fractions cannot be added directly if their pieces are different sizes (e.g. halves and thirds); finding the LCD cuts all pieces into identical units so they can be summed.',
        'howToDoIt' => [
            'Find the Least Common Multiple (LCM) of denominators $b$ and $d$.',
            'Multiply numerator and denominator of each fraction by the factor needed to attain the LCD.',
            'Add the newly aligned numerators while keeping the common denominator constant.',
            'Simplify to lowest terms if possible.'
        ],
        'exampleProblem' => 'Compute $\frac{2}{3} + \frac{1}{4}$.',
        'exampleSolution' => '$\text{LCM}(3, 4) = 12$. Scale fractions: $\frac{2 \times 4}{3 \times 4} = \frac{8}{12}$, $\frac{1 \times 3}{4 \times 3} = \frac{3}{12}$. Add: $\frac{8 + 3}{12} = \frac{11}{12}$.',
        'codexChapter' => 5,
        'keywords' => 'fractions unlike denominators lcm lcd equivalent addition grade 5'
    ],
    [
        'id' => 'g6-kcf-fraction-division',
        'name' => 'Fraction Division via Reciprocal (Keep-Change-Flip)',
        'etymology' => '/rɪˈsɪprəkəl/ • Latin: "reciprocus" (moving back and forth, alternating)',
        'grade' => 6,
        'gradeName' => '6th Grade',
        'branch' => 'fractions',
        'branchLabel' => 'Fractions',
        'formula' => '$$\frac{a}{b} \div \frac{c}{d} = \frac{a}{b} \times \frac{d}{c} = \frac{ad}{bc}$$',
        'rawFormula' => '(a/b) / (c/d) = (a/b) * (d/c)',
        'definition' => 'An algebraic law establishing that dividing by a rational fraction is mathematically equivalent to multiplying by its multiplicative inverse (reciprocal).',
        'whatItDoes' => 'Division answers "how many groups fit inside." Multiplying by the flipped reciprocal counts how many sub-units fit without laborious manual partitioning.',
        'howToDoIt' => [
            'Keep: Leave the dividend (first fraction) unchanged.',
            'Change: Invert the division operator ($\div$) into multiplication ($\times$).',
            'Flip: Invert the divisor (second fraction) into its reciprocal ($\frac{c}{d} \to \frac{d}{c}$).',
            'Multiply straight across and reduce.'
        ],
        'exampleProblem' => 'Compute $\frac{3}{4} \div \frac{2}{5}$.',
        'exampleSolution' => 'Keep $\frac{3}{4}$, Change $\div$ to $\times$, Flip $\frac{2}{5} \to \frac{5}{2}$: $\frac{3}{4} \times \frac{5}{2} = \frac{3 \times 5}{4 \times 2} = \frac{15}{8} = 1\frac{7}{8}$.',
        'codexChapter' => 6,
        'keywords' => 'fraction division reciprocal keep change flip kcf multiplicative inverse grade 6'
    ],
    [
        'id' => 'g12-fundamental-theorem-calc',
        'name' => 'Fundamental Theorem of Calculus (FTC)',
        'etymology' => '/ˌfʌndəˈmɛntl ˈθɪərəm/ • Latin: "fundamentum" (groundwork, base cornerstone)',
        'grade' => 12,
        'gradeName' => '12th Grade / Calc',
        'branch' => 'calculus',
        'branchLabel' => 'Calculus',
        'formula' => '$$\int_{a}^{b} f(x) \, dx = F(b) - F(a) \quad \left(\text{where } F\'(x) = f(x)\right)$$',
        'rawFormula' => 'Integral from a to b of f(x) dx = F(b) - F(a)',
        'definition' => 'The unifying theorem of mathematical analysis demonstrating that differentiation and integration are inverse operations: the definite integral (net accumulated area) can be calculated via anti-derivatives.',
        'whatItDoes' => 'It bridges geometry (accumulating area under curves) with algebra (reversing derivatives), enabling exact calculation of areas, volumes of revolution, and total physical work.',
        'howToDoIt' => [
            'Find the antiderivative function $F(x)$ such that $F\'(x) = f(x)$.',
            'Evaluate the antiderivative at the upper integration limit ($F(b)$).',
            'Evaluate the antiderivative at the lower integration limit ($F(a)$).',
            'Subtract: $\text{Net Area} = F(b) - F(a)$.'
        ],
        'exampleProblem' => 'Evaluate the definite integral $\int_{0}^{3} 2x \, dx$.',
        'exampleSolution' => 'Antiderivative of $2x$ is $F(x) = x^2$. Evaluate: $F(3) - F(0) = 3^2 - 0^2 = 9 - 0 = 9$.',
        'codexChapter' => 12,
        'keywords' => 'fundamental theorem calculus integral area under curve antiderivative grade 12'
    ],

    // -------------------------------------------------------------------------
    // G
    // -------------------------------------------------------------------------
    [
        'id' => 'g6-greatest-common-factor',
        'name' => 'Greatest Common Factor (GCF) & Euclidean Algorithm',
        'etymology' => '/ˈɡreɪtɪst ˈkɒmən ˈfæktər/ • Greek: "arithmos" (prime numbers)',
        'grade' => 6,
        'gradeName' => '6th Grade',
        'branch' => 'arithmetic',
        'branchLabel' => 'Number Theory',
        'formula' => '$$\gcd(a, b) = \gcd(b, a \bmod b) \quad (\gcd(a, 0) = a)$$',
        'rawFormula' => 'GCF(a, b) = largest integer that divides both a and b',
        'definition' => 'The largest natural number that evenly divides two or more integers without leaving a remainder, forming the basis of simplifying fractions.',
        'whatItDoes' => 'It finds the maximum bundle size when grouping disparate collections into identical subsets, and reduces fractions to their simplest indivisible terms.',
        'howToDoIt' => [
            'Find the prime factorizations of both numbers.',
            'Identify all common prime factors shared by both sets.',
            'Multiply the shared common prime factors together to obtain the GCF.'
        ],
        'exampleProblem' => 'Find the Greatest Common Factor of $24$ and $36$.',
        'exampleSolution' => 'Prime factorization: $24 = 2^3 \times 3$, $36 = 2^2 \times 3^2$. Common prime factors: $2^2 \times 3 = 4 \times 3 = 12$. $\text{GCF} = 12$.',
        'codexChapter' => 6,
        'keywords' => 'gcf greatest common factor euclidean algorithm division fractions grade 6'
    ],

    // -------------------------------------------------------------------------
    // I
    // -------------------------------------------------------------------------
    [
        'id' => 'g12-indefinite-integrals',
        'name' => 'Indefinite Integrals & Antidifferentiation',
        'etymology' => '/ˈɪndɛfɪnɪt ˈɪntɪɡrəl/ • Latin: "integrare" (to make whole, aggregate)',
        'grade' => 12,
        'gradeName' => '12th Grade / Calc',
        'branch' => 'calculus',
        'branchLabel' => 'Calculus',
        'formula' => '$$\int x^n \, dx = \frac{x^{n+1}}{n+1} + C \quad (n \ne -1)$$',
        'rawFormula' => 'Integral x^n dx = (x^(n+1))/(n+1) + C',
        'definition' => 'The complete family of antiderivative functions whose instantaneous derivative equals the integrand $f(x)$, unified by the arbitrary constant of integration $C$.',
        'whatItDoes' => 'It reconstructs total distance from velocity data, or total accumulated charge from electric current, reversing the derivative process.',
        'howToDoIt' => [
            'Identify each power term $x^n$.',
            'Add $1$ to the exponent ($n \to n + 1$).',
            'Divide by the new exponent ($n + 1$).',
            'Append the arbitrary integration constant $+ C$.'
        ],
        'exampleProblem' => 'Find the indefinite integral $\int (3x^2 + 4x - 5) \, dx$.',
        'exampleSolution' => '$\int 3x^2 dx = x^3$; $\int 4x dx = 2x^2$; $\int -5 dx = -5x$. Combine: $x^3 + 2x^2 - 5x + C$.',
        'codexChapter' => 12,
        'keywords' => 'indefinite integral antiderivative constant of integration calculus grade 12'
    ],

    // -------------------------------------------------------------------------
    // L
    // -------------------------------------------------------------------------
    [
        'id' => 'g8-slope-intercept',
        'name' => 'Linear Slope-Intercept Form',
        'etymology' => '/sloʊp ˈɪntərsɛpt/ • Latin: "intercipere" (to catch or cross between)',
        'grade' => 8,
        'gradeName' => '8th Grade',
        'branch' => 'algebra',
        'branchLabel' => 'Linear Algebra',
        'formula' => '$$y = mx + b \quad \left(m = \frac{\Delta y}{\Delta x} = \frac{y_2 - y_1}{x_2 - x_1}\right)$$',
        'rawFormula' => 'y = m*x + b',
        'definition' => 'The canonical algebraic representation of a two-dimensional straight line, where $m$ signifies the constant rate of change (slope) and $b$ represents the coordinate value where the line intercepts the vertical y-axis ($(0, b)$).',
        'whatItDoes' => 'It enables instant graphing and prediction of linear behaviors, allowing you to project future outcomes with a known starting point ($b$) and velocity ($m$).',
        'howToDoIt' => [
            'Calculate the slope $m$ by finding vertical change over horizontal change: $m = \frac{y_2 - y_1}{x_2 - x_1}$.',
            'Plot the starting y-intercept $(0, b)$ directly on the vertical axis.',
            'Use slope $m = \frac{\text{rise}}{\text{run}}$ to navigate from the intercept to subsequent points, and connect with a line.'
        ],
        'exampleProblem' => 'Find the slope-intercept equation of the line passing through $(2, 5)$ and $(4, 11)$.',
        'exampleSolution' => 'Slope: $m = \frac{11 - 5}{4 - 2} = \frac{6}{2} = 3$. Find $b$: $5 = 3(2) + b \implies 5 = 6 + b \implies b = -1$. Equation: $y = 3x - 1$.',
        'codexChapter' => 8,
        'keywords' => 'slope intercept y=mx+b rate of change rise run linear grade 8'
    ],
    [
        'id' => 'g11-logarithmic-laws',
        'name' => 'Logarithms & Power Laws',
        'etymology' => '/ˈlɒɡərɪðəm/ • Greek: "logos" (ratio) + "arithmos" (number)',
        'grade' => 11,
        'gradeName' => '11th Grade / Alg II',
        'branch' => 'algebra',
        'branchLabel' => 'Algebra II',
        'formula' => '$$\log_b(x) = y \iff b^y = x \quad (\log(xy) = \log x + \log y)$$',
        'rawFormula' => 'log_b(x) = y <=> b^y = x',
        'definition' => 'The inverse mathematical function of exponentiation, answering the question: "To what exponent must the base $b$ be raised to produce the value $x$?"',
        'whatItDoes' => 'It compresses astronomical multiplicative scales into manageable linear steps (Richter scale earthquakes, pH acidity, decibels of sound, compound interest).',
        'howToDoIt' => [
            'Product Rule: Sum of logs equals log of product: $\log(A) + \log(B) = \log(AB)$.',
            'Quotient Rule: Difference of logs equals log of quotient: $\log(A) - \log(B) = \log(A/B)$.',
            'Power Rule: Pull exponents out front as multipliers: $\log(A^k) = k \log(A)$.'
        ],
        'exampleProblem' => 'Condense into a single logarithm: $2\log_3(x) + \log_3(5)$.',
        'exampleSolution' => 'Apply Power Rule: $\log_3(x^2) + \log_3(5)$. Apply Product Rule: $\log_3(5x^2)$.',
        'codexChapter' => 11,
        'keywords' => 'logarithms logs exponent inverse product rule power rule algebra 2 grade 11'
    ],

    // -------------------------------------------------------------------------
    // M
    // -------------------------------------------------------------------------
    [
        'id' => 'g6-measures-center',
        'name' => 'Measures of Center: Mean, Median & Mode',
        'etymology' => '/miːn ˈmiːdiən moʊd/ • Latin: "medianus" (of the middle)',
        'grade' => 6,
        'gradeName' => '6th Grade',
        'branch' => 'arithmetic',
        'branchLabel' => 'Statistics',
        'formula' => '$$\bar{x} = \frac{\sum_{i=1}^n x_i}{n}, \quad \text{Range} = \text{Max} - \text{Min}$$',
        'rawFormula' => 'Mean = Sum of values / Count of values',
        'definition' => 'Statistical metrics summarizing an entire data distribution into a single representative central value: the arithmetic average (Mean), the 50th percentile midpoint (Median), and the most frequent value (Mode).',
        'whatItDoes' => 'It distills large, noisy empirical datasets into actionable benchmark summaries for test scores, scientific experiments, climate averages, and economic indicators.',
        'howToDoIt' => [
            'Mean: Sum all values together, then divide by the total count $n$.',
            'Median: Arrange data in ascending numerical order and pick the exact middle value (or average the two middle values if $n$ is even).',
            'Mode: Identify the number that appears with highest frequency.'
        ],
        'exampleProblem' => 'Calculate the mean and median for the test score dataset: $\{80, 85, 90, 90, 100\}$.',
        'exampleSolution' => 'Mean: $\frac{80+85+90+90+100}{5} = \frac{445}{5} = 89$. Median: Ordered middle value is $90$. Mode is $90$.',
        'codexChapter' => 6,
        'keywords' => 'mean median mode statistics measures of center data grade 6'
    ],

    // -------------------------------------------------------------------------
    // O
    // -------------------------------------------------------------------------
    [
        'id' => 'g6-order-of-operations',
        'name' => 'Order of Operations (PEMDAS / GEMS)',
        'etymology' => '/ˈɔːrdər əv ˌɒpəˈreɪʃənz/ • Acronym: Parentheses, Exponents, Multiply/Divide, Add/Subtract',
        'grade' => 6,
        'gradeName' => '6th Grade',
        'branch' => 'arithmetic',
        'branchLabel' => 'Pre-Algebra',
        'formula' => '$$\text{Hierarchy: } \text{Groupings} \succ \text{Exponents} \succ \{\times, \div\} \succ \{+, -\}$$',
        'rawFormula' => 'P -> E -> M/D (Left to Right) -> A/S (Left to Right)',
        'definition' => 'The universal algebraic precedence convention dictating the precise sequence in which arithmetic operations must be evaluated to ensure unambiguous solutions.',
        'whatItDoes' => 'It eliminates mathematical chaos: without strict order of operations, an expression like $2 + 3 \times 4$ could be interpreted as either $20$ or $14$.',
        'howToDoIt' => [
            'Evaluate inside innermost Parentheses/Groupings first.',
            'Evaluate all Exponents and radical roots next.',
            'Compute all Multiplications and Divisions from Left to Right.',
            'Compute all Additions and Subtractions from Left to Right.'
        ],
        'exampleProblem' => 'Evaluate $6 + 4 \times (5 - 2)^2 \div 3$.',
        'exampleSolution' => 'Groupings: $(5-2) = 3$. Exponents: $3^2 = 9$. Multiply/Divide Left-to-Right: $4 \times 9 = 36$, then $36 \div 3 = 12$. Addition: $6 + 12 = 18$.',
        'codexChapter' => 6,
        'keywords' => 'pemdas gems order of operations precedence grouping arithmetic grade 6'
    ],

    // -------------------------------------------------------------------------
    // P
    // -------------------------------------------------------------------------
    [
        'id' => 'g12-power-rule',
        'name' => 'Power Rule of Differentiation',
        'etymology' => '/ˈpaʊər ruːl/ • Latin: "potentia" (power, exponent degree)',
        'grade' => 12,
        'gradeName' => '12th Grade / Calc',
        'branch' => 'calculus',
        'branchLabel' => 'Calculus',
        'formula' => '$$\frac{d}{dx}\left[x^n\right] = n x^{n - 1} \quad (n \in \mathbb{R})$$',
        'rawFormula' => 'd/dx[x^n] = n * x^(n - 1)',
        'definition' => 'An operational shortcut derived from the binomial theorem and difference quotient that computes the instantaneous rate of change of any monomial power function in a single algebraic step.',
        'whatItDoes' => 'It bypasses lengthy limit difference quotient algebra, reducing derivative computation on polynomials to elementary mental arithmetic.',
        'howToDoIt' => [
            'Bring the existing exponent $n$ down in front to multiply the term.',
            'Subtract exactly $1$ from the power exponent ($n \to n - 1$).',
            'If the term has a leading constant $c$, multiply: $\frac{d}{dx}[c x^n] = c \cdot n x^{n-1}$.'
        ],
        'exampleProblem' => 'Differentiate $f(x) = 4x^3 - 5x^2 + 7x - 9$.',
        'exampleSolution' => '$f\'(x) = 4(3)x^{3-1} - 5(2)x^{2-1} + 7(1)x^{1-1} - 0 = 12x^2 - 10x + 7$.',
        'codexChapter' => 12,
        'keywords' => 'power rule derivative differentiation shortcut calculus polynomial grade 12'
    ],
    [
        'id' => 'g4-prime-composite',
        'name' => 'Prime vs. Composite Numbers',
        'etymology' => '/praɪm/ • Latin: "primus" (first, primordial, indivisible)',
        'grade' => 4,
        'gradeName' => '4th Grade',
        'branch' => 'arithmetic',
        'branchLabel' => 'Number Theory',
        'formula' => '$$\text{Prime: } \{n \in \mathbb{Z}^+ \mid \text{Factors}(n) = \{1, n\}\}$$',
        'rawFormula' => 'Prime: Exactly 2 distinct positive factors (1 and itself)',
        'definition' => 'A natural number greater than $1$ is Prime if its only positive divisors are $1$ and itself. A number with more than two distinct positive factors is Composite.',
        'whatItDoes' => 'Primes act as the multiplicative "atoms" of all mathematics: by the Fundamental Theorem of Arithmetic, every integer has a unique prime factorization.',
        'howToDoIt' => [
            'Check if $n \le 1$: $0$ and $1$ are neither prime nor composite.',
            'Test trial division by primes up to $\sqrt{n}$ ($2, 3, 5, 7 \dots$).',
            'If any divisor divides $n$ without remainder, $n$ is Composite; otherwise, it is Prime.'
        ],
        'exampleProblem' => 'Determine whether $29$ and $35$ are prime or composite.',
        'exampleSolution' => 'Factors of $29$: $\{1, 29\} \implies$ Prime. Factors of $35$: $\{1, 5, 7, 35\} \implies$ Composite ($5 \times 7 = 35$).',
        'codexChapter' => 4,
        'keywords' => 'prime composite factors factorization number theory grade 4'
    ],
    [
        'id' => 'g8-pythagorean-theorem',
        'name' => 'Pythagorean Theorem',
        'etymology' => '/pɪˌθæɡəˈriːən/ • Named after Pythagoras of Samos (c. 570–495 BC)',
        'grade' => 8,
        'gradeName' => '8th Grade',
        'branch' => 'geometry',
        'branchLabel' => 'Geometry',
        'formula' => '$$a^2 + b^2 = c^2 \iff c = \sqrt{a^2 + b^2}$$',
        'rawFormula' => 'a^2 + b^2 = c^2',
        'definition' => 'A fundamental theorem of Euclidean geometry stating that in any right triangle, the area of the square erected upon the hypotenuse ($c$) equals the combined sum of the areas of the squares erected upon legs $a$ and $b$.',
        'whatItDoes' => 'It unlocks straight-line distance calculations across two dimensions, forming the basis of navigation, construction, computer graphics, and coordinate geometry.',
        'howToDoIt' => [
            'Verify the triangle contains an exact $90^\circ$ right angle.',
            'Identify the hypotenuse ($c$), which is strictly opposite the right angle.',
            'Square the two known sides. To solve for hypotenuse: $c = \sqrt{a^2 + b^2}$. To solve for a leg: $a = \sqrt{c^2 - b^2}$.'
        ],
        'exampleProblem' => 'A right triangle has legs of length $6\text{ cm}$ and $8\text{ cm}$. Find the length of hypotenuse $c$.',
        'exampleSolution' => '$a^2 + b^2 = c^2 \implies 6^2 + 8^2 = c^2 \implies 36 + 64 = 100 \implies c = \sqrt{100} = 10\text{ cm}$.',
        'codexChapter' => 8,
        'keywords' => 'pythagorean theorem right triangle hypotenuse legs geometry grade 8'
    ],

    // -------------------------------------------------------------------------
    // Q
    // -------------------------------------------------------------------------
    [
        'id' => 'g9-quadratic-formula',
        'name' => 'Quadratic Formula & The Discriminant',
        'etymology' => '/kwɒˈdrætɪk/ • Latin: "quadratus" (squared, four-sided square)',
        'grade' => 9,
        'gradeName' => '9th Grade / Alg I',
        'branch' => 'algebra',
        'branchLabel' => 'Algebra I',
        'formula' => '$$x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a} \quad (\Delta = b^2 - 4ac)$$',
        'rawFormula' => 'x = (-b +- sqrt(b^2 - 4*a*c)) / (2*a)',
        'definition' => 'The universal algebraic closed-form solution to any second-degree polynomial equation $ax^2 + bx + c = 0$, where the discriminant ($\Delta = b^2 - 4ac$) determines the nature of the roots.',
        'whatItDoes' => 'It solves any parabolic or quadratic equation, even when factoring fails. It models trajectories, projectiles, revenue optimization, and physics mechanics.',
        'howToDoIt' => [
            'Set equation into standard form: $ax^2 + bx + c = 0$.',
            'Identify coefficients $a, b, c$ with their respective signs.',
            'Evaluate the discriminant: $\Delta = b^2 - 4ac$ ($\Delta > 0 \implies 2\text{ real roots}$; $\Delta = 0 \implies 1\text{ root}$; $\Delta < 0 \implies \text{complex roots}$).',
            'Compute the two roots via $\pm$ in the numerator.'
        ],
        'exampleProblem' => 'Solve $x^2 - 5x + 6 = 0$ using the Quadratic Formula.',
        'exampleSolution' => '$a=1, b=-5, c=6$. $\Delta = (-5)^2 - 4(1)(6) = 25 - 24 = 1$. $x = \frac{-(-5) \pm \sqrt{1}}{2(1)} = \frac{5 \pm 1}{2} \implies x = 3 \text{ or } x = 2$.',
        'codexChapter' => 9,
        'keywords' => 'quadratic formula discriminant roots parabola standard form algebra 1 grade 9'
    ],

    // -------------------------------------------------------------------------
    // R
    // -------------------------------------------------------------------------
    [
        'id' => 'g2-rectangular-arrays',
        'name' => 'Rectangular Arrays & Repeated Addition',
        'etymology' => '/əˈreɪ/ • Anglo-Norman: "arrai" (orderly systematic arrangement)',
        'grade' => 2,
        'gradeName' => '2nd Grade',
        'branch' => 'arithmetic',
        'branchLabel' => 'Arithmetic',
        'formula' => '$$\text{Total Items} = \sum_{i=1}^{r} c = r \times c$$',
        'rawFormula' => 'Total = Rows * Columns',
        'definition' => 'A geometric configuration of discrete objects aligned into identical horizontal rows and vertical columns, serving as the concrete foundation of multiplication.',
        'whatItDoes' => 'It bridges counting single items to spatial two-dimensional grouping, proving that multiplication is rapid repeated addition.',
        'howToDoIt' => [
            'Count the number of horizontal lines (Rows, $r$).',
            'Count how many objects are situated in each single row (Columns, $c$).',
            'Add the row count $r$ times, or skip-count by $c$.'
        ],
        'exampleProblem' => 'Find the total items in an array containing $4$ rows with $5$ stars in each row.',
        'exampleSolution' => 'Repeated addition of rows: $5 + 5 + 5 + 5 = 20$. The array contains exactly $20$ stars.',
        'codexChapter' => 2,
        'keywords' => 'array repeated addition rows columns multiplication foundation grade 2'
    ],
    [
        'id' => 'g10-right-triangle-trig',
        'name' => 'Right Triangle Trigonometry (SOH-CAH-TOA)',
        'etymology' => '/ˌtrɪɡəˈnɒmətri/ • Greek: "trigonon" (triangle) + "metron" (measure)',
        'grade' => 10,
        'gradeName' => '10th Grade / Geom',
        'branch' => 'trigonometry',
        'branchLabel' => 'Trigonometry',
        'formula' => '$$\sin\theta = \frac{\text{Opp}}{\text{Hyp}}, \quad \cos\theta = \frac{\text{Adj}}{\text{Hyp}}, \quad \tan\theta = \frac{\text{Opp}}{\text{Adj}}$$',
        'rawFormula' => 'sin = Opp/Hyp, cos = Adj/Hyp, tan = Opp/Adj',
        'definition' => 'Fundamental trigonometric ratios relating the acute reference angle ($\theta$) of a right triangle to dimensionless quotients of its side lengths.',
        'whatItDoes' => 'It enables the measurement of inaccessible heights and distances (surveying mountains, celestial navigation, architectural load angles) from a single angle and distance.',
        'howToDoIt' => [
            'Anchor your perspective at the acute reference angle $\theta$.',
            'Label the three sides: Hypotenuse (longest side opposite $90^\circ$), Opposite (across from $\theta$), and Adjacent (next to $\theta$).',
            'Select the matching ratio from SOH-CAH-TOA based on your known and unknown sides, then solve.'
        ],
        'exampleProblem' => 'In a right triangle, angle $\theta$ has an opposite side of $5\text{ cm}$ and hypotenuse of $13\text{ cm}$. Find $\sin\theta$ and $\tan\theta$.',
        'exampleSolution' => '$\sin\theta = \frac{\text{Opp}}{\text{Hyp}} = \frac{5}{13}$. Adjacent side: $\sqrt{13^2 - 5^2} = \sqrt{144} = 12$. Therefore, $\tan\theta = \frac{\text{Opp}}{\text{Adj}} = \frac{5}{12}$.',
        'codexChapter' => 10,
        'keywords' => 'trigonometry soh cah toa sine cosine tangent right triangle geometry grade 10'
    ],

    // -------------------------------------------------------------------------
    // S
    // -------------------------------------------------------------------------
    [
        'id' => 'g8-systems-equations',
        'name' => 'Systems of Linear Equations (Simultaneous Elimination)',
        'etymology' => '/ˈsɪstəmz/ • Greek: "systema" (organized whole composition)',
        'grade' => 8,
        'gradeName' => '8th Grade',
        'branch' => 'algebra',
        'branchLabel' => 'Algebra',
        'formula' => '$$\begin{cases} a_1 x + b_1 y = c_1 \\ a_2 x + b_2 y = c_2 \end{cases} \implies \text{Intersection Point } (x, y)$$',
        'rawFormula' => 'System: 2 equations solved simultaneously for (x, y)',
        'definition' => 'A set of two or more algebraic equations containing identical variables, whose simultaneous solution is the unique coordinate point where all graphs intersect.',
        'whatItDoes' => 'It models break-even points in economics, mixing chemical solutions, flight intersection paths, and dual-variable constraints.',
        'howToDoIt' => [
            'Multiply one or both equations by a constant so that coefficients of one variable are exact opposites.',
            'Add the two equations vertically to eliminate that variable.',
            'Solve the resulting single-variable equation.',
            'Back-substitute into either original equation to find the other variable.'
        ],
        'exampleProblem' => 'Solve the linear system: $2x + y = 7$ and $x - y = 2$.',
        'exampleSolution' => 'Add equations: $(2x + y) + (x - y) = 7 + 2 \implies 3x = 9 \implies x = 3$. Substitute: $3 - y = 2 \implies y = 1$. Solution: $(3, 1)$.',
        'codexChapter' => 8,
        'keywords' => 'systems linear equations elimination substitution intersection grade 8'
    ],

    // -------------------------------------------------------------------------
    // U
    // -------------------------------------------------------------------------
    [
        'id' => 'g3-unit-fractions',
        'name' => 'Unit Fractions & Rational Partitioning',
        'etymology' => '/ˈjuːnɪt ˈfrækʃən/ • Latin: "fractio" (a breaking into fragments)',
        'grade' => 3,
        'gradeName' => '3rd Grade',
        'branch' => 'fractions',
        'branchLabel' => 'Fractions',
        'formula' => '$$\text{Unit Fraction} = \frac{1}{b} \quad (b \in \mathbb{Z}^+)$$',
        'rawFormula' => '1 / b',
        'definition' => 'A rational quantity formed by partitioning a single whole into $b$ congruent, equal-sized pieces, where the fraction represents exactly one of those partitioned segments.',
        'whatItDoes' => 'It establishes the fundamental atomic building block of all rational numbers: any non-unit fraction $\frac{a}{b}$ is simply $a$ copies of the unit fraction $\frac{1}{b}$.',
        'howToDoIt' => [
            'Verify the whole unit is divided into segments of strictly equal size/length.',
            'Count the total number of segments to determine the denominator ($b$).',
            'Isolate or shade exactly 1 segment to represent $\frac{1}{b}$.'
        ],
        'exampleProblem' => 'Express the fraction $\frac{5}{8}$ as an iteration of its underlying unit fraction.',
        'exampleSolution' => 'The unit fraction is $\frac{1}{8}$. Thus: $\frac{5}{8} = \frac{1}{8} + \frac{1}{8} + \frac{1}{8} + \frac{1}{8} + \frac{1}{8} = 5 \times \frac{1}{8}$.',
        'codexChapter' => 3,
        'keywords' => 'unit fraction numerator denominator partitioning rational numbers grade 3'
    ],

    // -------------------------------------------------------------------------
    // V
    // -------------------------------------------------------------------------
    [
        'id' => 'g5-volume-prisms',
        'name' => 'Volume of Rectangular Prisms',
        'etymology' => '/ˈvɒljuːm/ • Latin: "volumen" (roll, scroll, 3D cubic capacity)',
        'grade' => 5,
        'gradeName' => '5th Grade',
        'branch' => 'geometry',
        'branchLabel' => 'Geometry',
        'formula' => '$$V = l \times w \times h = B \times h$$',
        'rawFormula' => 'Volume = Length * Width * Height',
        'definition' => 'The total measure of three-dimensional space enclosed within a solid boundary, quantified as the aggregate number of unit cubes ($1 \times 1 \times 1$) that pack the interior without gaps.',
        'whatItDoes' => 'It measures the physical capacity of solid 3D structures (such as storage containers, shipping boxes, or liquid tanks).',
        'howToDoIt' => [
            'Measure the length ($l$) and width ($w$) of the rectangular base to find base area ($B = l \times w$).',
            'Measure the perpendicular vertical height ($h$) of the prism.',
            'Multiply base area by height: $V = B \times h$. Units are always cubic ($\text{cm}^3, \text{in}^3, \text{m}^3$).'
        ],
        'exampleProblem' => 'Find the volume of a rectangular prism with length $6\text{ cm}$, width $4\text{ cm}$, and height $5\text{ cm}$.',
        'exampleSolution' => '$V = l \times w \times h = 6 \times 4 \times 5 = 24 \times 5 = 120\text{ cm}^3$.',
        'codexChapter' => 5,
        'keywords' => 'volume rectangular prism 3d cubic capacity base height grade 5'
    ]
];

// Sort terms strictly in A-Z alphabetical order by Name
usort($mathTerms, function ($a, $b) {
    return strcasecmp($a['name'], $b['name']);
});

// Group terms alphabetically by first letter
$groupedTerms = [];
foreach ($mathTerms as $term) {
    $firstChar = strtoupper(substr(trim($term['name']), 0, 1));
    if (!isset($groupedTerms[$firstChar])) {
        $groupedTerms[$firstChar] = [];
    }
    $groupedTerms[$firstChar][] = $term;
}
ksort($groupedTerms);

// Full alphabet for the ribbon
$alphabet = range('A', 'Z');
?>

<link rel="stylesheet"
    href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/math.css') : '/assets/css/pages/math.css' ?>">

<main id="main-content" class="math-index-page">

    <!-- Page Hero Section -->
    <header class="math-index-hero">
        <span class="math-index-hero-badge">
            <i class="fas fa-sort-alpha-down"></i> A–Z Mathematics Codex & Repository
        </span>
        <h1 class="math-index-hero-title">
            The A–Z Mathematics Index
        </h1>
        <p class="math-index-hero-desc">
            An alphabetical concordance cataloging mathematical definitions, conceptual intuition ("what it does"),
            step-by-step procedures ("how to do it"), and worked step-by-step exemplars across all 12 grades.
        </p>

        <!-- Live Instant Search Bar -->
        <div class="math-index-search-wrap">
            <div class="math-index-search-bar" role="search">
                <i class="fas fa-search math-index-search-icon" aria-hidden="true"></i>
                <input type="text" id="math-search-input" class="math-index-search-input"
                    placeholder="Search terms, formulas, axioms, grades (e.g. 'Pythagorean', 'Fraction', 'Grade 8')..."
                    aria-label="Search A-Z mathematical index" autocomplete="off" spellcheck="false">
                <button type="button" id="math-clear-search" class="math-index-clear-btn"
                    aria-label="Clear search input">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Sticky A–Z Quick-Jump Ribbon -->
    <nav class="math-az-ribbon-container" aria-label="A to Z Alphabetical Navigation">
        <div class="math-az-ribbon">
            <?php foreach ($alphabet as $letter): ?>
                <?php $hasTerms = isset($groupedTerms[$letter]); ?>
                <?php if ($hasTerms): ?>
                    <a href="#letter-<?= $letter ?>" class="math-az-letter-btn" data-az-letter="<?= $letter ?>"
                        title="Jump to Letter <?= $letter ?> (<?= count($groupedTerms[$letter]) ?> terms)">
                        <?= $letter ?>
                    </a>
                <?php else: ?>
                    <span class="math-az-letter-btn disabled" aria-disabled="true"
                        title="No terms starting with <?= $letter ?>">
                        <?= $letter ?>
                    </span>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </nav>

    <!-- Filter Control Panel -->
    <section class="math-filter-panel" aria-label="Curriculum Filter Controls">
        <!-- Grade Band Filter Row -->
        <div class="math-filter-row">
            <span class="math-filter-label"><i class="fas fa-layer-group"></i> Grade Level:</span>
            <div class="math-pills-wrap" role="tablist" aria-label="Filter by Grade">
                <button type="button" class="math-pill-btn active" data-grade="all" role="tab" aria-selected="true">
                    All 12 Grades <span class="math-pill-count"><?= count($mathTerms) ?></span>
                </button>
                <button type="button" class="math-pill-btn" data-grade="elem" role="tab" aria-selected="false">
                    Elementary (K–5)
                </button>
                <button type="button" class="math-pill-btn" data-grade="mid" role="tab" aria-selected="false">
                    Middle School (6–8)
                </button>
                <button type="button" class="math-pill-btn" data-grade="high" role="tab" aria-selected="false">
                    High School (9–12)
                </button>
                <button type="button" class="math-pill-btn" id="math-fav-toggle" role="tab" aria-selected="false">
                    <i class="far fa-star"></i> My Study List <span class="math-pill-count" id="math-fav-count">0</span>
                </button>
            </div>
        </div>

        <!-- Grade Specific Filter Row -->
        <div class="math-filter-row">
            <span class="math-filter-label"><i class="fas fa-graduation-cap"></i> Specific Grade:</span>
            <div class="math-pills-wrap" role="tablist" aria-label="Filter by Individual Grade">
                <?php for ($g = 1; $g <= 12; $g++): ?>
                    <button type="button" class="math-pill-btn" data-grade="grade-<?= $g ?>" role="tab"
                        aria-selected="false">
                        Grade <?= $g ?>
                    </button>
                <?php endfor; ?>
            </div>
        </div>

        <!-- Mathematical Branch / Domain Filter Row -->
        <div class="math-filter-row">
            <span class="math-filter-label"><i class="fas fa-shapes"></i> Domain:</span>
            <div class="math-pills-wrap" role="tablist" aria-label="Filter by Domain">
                <button type="button" class="math-pill-btn active" data-branch="all" role="tab" aria-selected="true">
                    All Domains
                </button>
                <button type="button" class="math-pill-btn" data-branch="arithmetic" role="tab" aria-selected="false">
                    Arithmetic
                </button>
                <button type="button" class="math-pill-btn" data-branch="fractions" role="tab" aria-selected="false">
                    Fractions & Rational
                </button>
                <button type="button" class="math-pill-btn" data-branch="algebra" role="tab" aria-selected="false">
                    Algebra
                </button>
                <button type="button" class="math-pill-btn" data-branch="geometry" role="tab" aria-selected="false">
                    Geometry
                </button>
                <button type="button" class="math-pill-btn" data-branch="trigonometry" role="tab" aria-selected="false">
                    Trigonometry
                </button>
                <button type="button" class="math-pill-btn" data-branch="calculus" role="tab" aria-selected="false">
                    Calculus
                </button>
            </div>
        </div>
    </section>

    <!-- Status & Action Bar -->
    <div class="math-status-bar">
        <div class="math-match-count" aria-live="polite">
            Showing <strong id="math-match-count-num"><?= count($mathTerms) ?></strong> of <span
                id="math-total-count-num"><?= count($mathTerms) ?></span> indexed mathematical concepts
        </div>
        <div class="math-view-toggle">
            <button type="button" id="math-export-btn" class="math-index-export-btn"
                title="Export currently filtered terms as a plain text study sheet">
                <i class="fas fa-download"></i> Export Study Sheet
            </button>
            <button type="button" id="math-print-btn" class="math-index-print-btn"
                title="Print this mathematical reference index">
                <i class="fas fa-print"></i> Print Index
            </button>
        </div>
    </div>

    <!-- Alphabetical A-Z Sections Container -->
    <div id="math-az-sections-container">
        <?php foreach ($groupedTerms as $letter => $terms): ?>
            <section class="math-az-letter-section" id="letter-<?= $letter ?>" data-letter="<?= $letter ?>">
                <!-- Section Header -->
                <div class="math-az-letter-header">
                    <div class="math-az-letter-badge"><?= $letter ?></div>
                    <h2 class="math-az-letter-title"><?= $letter ?> — Concepts</h2>
                    <span class="math-az-letter-count"><?= count($terms) ?>
                        <?= count($terms) === 1 ? 'term' : 'terms' ?></span>
                </div>

                <!-- Lexicon Entries List -->
                <div class="math-lexicon-list">
                    <?php foreach ($terms as $term): ?>
                        <article class="math-term-card math-lexicon-entry" data-term-id="<?= htmlspecialchars($term['id']) ?>"
                            data-grade="<?= htmlspecialchars((string) $term['grade']) ?>"
                            data-branch="<?= htmlspecialchars($term['branch']) ?>" data-letter="<?= $letter ?>"
                            data-keywords="<?= htmlspecialchars($term['keywords']) ?>">

                            <!-- Entry Header -->
                            <div class="math-term-card-header">
                                <div class="math-term-title-wrap">
                                    <h3 class="math-term-title">
                                        <?= htmlspecialchars($term['name']) ?>
                                    </h3>
                                    <span class="math-term-etymology"><?= htmlspecialchars($term['etymology']) ?></span>
                                    <div class="math-term-badges mt-2">
                                        <span class="math-badge-grade"><?= htmlspecialchars($term['gradeName']) ?></span>
                                        <span class="math-badge-branch"><?= htmlspecialchars($term['branchLabel']) ?></span>
                                    </div>
                                </div>

                                <!-- Action Tools -->
                                <div class="math-term-actions">
                                    <button type="button" class="math-action-btn math-btn-speak"
                                        title="Listen to pronunciation and definition"
                                        aria-label="Listen to <?= htmlspecialchars($term['name']) ?>">
                                        <i class="fas fa-volume-up"></i>
                                    </button>
                                    <button type="button" class="math-action-btn math-btn-copy"
                                        data-formula="<?= htmlspecialchars($term['rawFormula']) ?>"
                                        title="Copy formula to clipboard"
                                        aria-label="Copy formula for <?= htmlspecialchars($term['name']) ?>">
                                        <i class="far fa-copy"></i>
                                    </button>
                                    <button type="button" class="math-action-btn math-btn-fav" title="Save to My Study List"
                                        aria-label="Bookmark <?= htmlspecialchars($term['name']) ?>" aria-pressed="false">
                                        <i class="far fa-star"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Formal Definition & Formula -->
                            <div class="math-idx-def-box">
                                <div class="math-idx-box-label">
                                    <i class="fas fa-book"></i> Formal Definition & Rule
                                </div>
                                <p class="math-idx-def-text">
                                    <?= $term['definition'] ?>
                                </p>
                                <div class="math-idx-formula-card">
                                    <?= $term['formula'] ?>
                                </div>
                            </div>

                            <!-- Two-Column Grid: What It Does & How to Do It -->
                            <div class="math-lexicon-body-grid">
                                <!-- What It Does (Intuition & Mechanism) -->
                                <div class="math-idx-does-box">
                                    <div class="math-idx-box-label">
                                        <i class="fas fa-lightbulb"></i> What It Does & Why It Matters
                                    </div>
                                    <p class="math-idx-does-text">
                                        <?= $term['whatItDoes'] ?>
                                    </p>
                                </div>

                                <!-- How to Do It (Procedural Steps) -->
                                <div class="math-idx-howto-box">
                                    <div class="math-idx-box-label">
                                        <i class="fas fa-list-ol"></i> How to Do It (Step-by-Step)
                                    </div>
                                    <ul class="math-idx-steps-list">
                                        <?php foreach ($term['howToDoIt'] as $sIdx => $step): ?>
                                            <li class="math-idx-step-item">
                                                <span class="math-idx-step-num"><?= $sIdx + 1 ?></span>
                                                <span><?= $step ?></span>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>

                            <!-- Worked Exemplum Box -->
                            <div class="math-idx-example-box">
                                <div class="math-idx-box-label">
                                    <i class="fas fa-pencil-ruler"></i> Worked Exemplum
                                </div>
                                <p class="math-idx-problem">
                                    <strong>Problem:</strong> <?= $term['exampleProblem'] ?>
                                </p>
                                <p class="math-idx-solution">
                                    <strong>Solution:</strong> <?= $term['exampleSolution'] ?>
                                </p>
                                <div class="math-idx-qed">Q.E.D. &#x220E;</div>
                            </div>

                            <!-- Entry Footer with Reference Codex Jump -->
                            <footer class="math-term-footer">
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-bookmark"></i> Reference Codex Vol. <?= $term['grade'] ?>
                                </span>
                                <a href="/library/read/index.php?book=math-facts-repo&chapter=chapter-<?= $term['codexChapter'] ?>"
                                    class="math-codex-link" title="Read full Grade <?= $term['grade'] ?> Codex in Library">
                                    Explore Full Chapter <i class="fas fa-arrow-right"></i>
                                </a>
                            </footer>

                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php endforeach; ?>
    </div>

    <!-- Empty State Container -->
    <div id="math-empty-state" class="math-empty-state">
        <i class="fas fa-search-minus"></i>
        <h3>No Mathematical Concepts Found</h3>
        <p>No mathematical terms match your current combination of search keywords, grade level, and domain filters.</p>
        <button type="button" id="math-reset-filters" class="math-pill-btn active">
            <i class="fas fa-redo"></i> Reset All Filters
        </button>
    </div>

    <!-- Toast Notification for Feedback -->
    <div id="math-toast" class="math-toast" role="status" aria-live="polite">
        <i class="fas fa-info-circle"></i>
        <span id="math-toast-msg">Action completed</span>
    </div>

</main>

<script
    src="<?= function_exists('assetVersion') ? assetVersion('/assets/js/pages/math-index.js') : '/assets/js/pages/math-index.js' ?>"></script>

<?php include '../src/footer.php'; ?>