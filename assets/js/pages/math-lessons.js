/**
 * Mathematics Topic Lessons Dataset (assets/js/pages/math-lessons.js)
 * Dual-lexile definitions, breakdown cards, worked examples, pro-tips/pitfalls,
 * equation vaults, mathematical diagrams/graphs, curated references, and quizzes.
 */

window.mathLessons = {
    "Basic Algebra": {
        "category": "Algebra",
        "definition": "Algebra is the branch of mathematics that substitutes letters (variables) for numbers to express general relationships, equations, and universal mathematical properties. Fundamental algebraic concepts revolve around expressions, terms, coefficients, variables, and constants. Solving basic algebraic equations requires applying inverse operations (addition/subtraction, multiplication/division) symmetrically across the equality sign to isolate the unknown variable.",
        "basicDefinition": "Basic Algebra uses letters like $x$ and $y$ to stand for unknown numbers. To find the missing number, you undo operations (like subtracting or dividing) on both sides of the equals sign until $x$ is left alone.",
        "breakdown": [
            {
                "label": "Variables & Constants",
                "text": "A variable (e.g., $x, y, n$) represents an unknown or changing quantity. A constant is a fixed numerical value (e.g., $7, -3$)."
            },
            {
                "label": "Expressions vs. Equations",
                "text": "An algebraic expression ($3x + 5$) represents a value without an equals sign; an equation ($3x + 5 = 20$) asserts two expressions are equal."
            },
            {
                "label": "Inverse Operations",
                "text": "Addition is undone by subtraction; multiplication is undone by division. Operations performed on one side must be performed on the other."
            }
        ],
        "example": "<strong>Solve for $x$:</strong> $4x - 7 = 21$<br><br>1. Add $7$ to both sides: $4x = 28$<br>2. Divide both sides by $4$: $x = \\frac{28}{4} = 7$<br>3. Check: $4(7) - 7 = 28 - 7 = 21$ &check;",
        "basicExample": "If $x + 5 = 12$, subtract $5$ from both sides to find $x = 12 - 5 = 7$.",
        "proTip": "Golden Rule of Algebra: Whatever operation you perform on the left-hand side of an equation, you must perform identically on the right-hand side to preserve the equality balance.",
        "question": "Solve for $y$ in the equation: $5y + 15 = 40$. What is the value of $y$?",
        "choices": [
            "$y = 5$",
            "$y = 8$",
            "$y = 11$",
            "$y = 25$"
        ],
        "correctIndex": 0,
        "explanation": "Subtract 15 from both sides to get $5y = 25$. Dividing both sides by 5 yields $y = 5$.",
        "equations": [
            {
                "title": "Properties of Equality",
                "latex": "a = b \\iff a + c = b + c \\quad \\text{and} \\quad a - c = b - c",
                "note": "Addition and Subtraction Properties: adding or subtracting the same quantity maintains equality."
            },
            {
                "title": "Multiplication & Division Properties",
                "latex": "a = b \\implies a \\cdot c = b \\cdot c \\quad \\text{and} \\quad \\frac{a}{c} = \\frac{b}{c} \\; (c \\neq 0)",
                "note": "Multiplying or dividing both sides by any non-zero real number preserves the equality."
            },
            {
                "title": "Distributive Property",
                "latex": "a(b + c) = ab + ac \\quad \\text{and} \\quad -(a - b) = -a + b",
                "note": "Multiplication distributes across terms inside parentheses; distributes negative signs across all terms."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 180\" width=\"100%\" height=\"180\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Balance scale representing algebraic equality\">\n  <defs>\n    <linearGradient id=\"scaleGrad\" x1=\"0%\" y1=\"0%\" x2=\"100%\" y2=\"100%\">\n      <stop offset=\"0%\" stop-color=\"#3b82f6\" />\n      <stop offset=\"100%\" stop-color=\"#1d4ed8\" />\n    </linearGradient>\n  </defs>\n  <!-- Base & Fulcrum -->\n  <polygon points=\"230,95 210,145 250,145\" fill=\"#64748b\" stroke=\"#334155\" stroke-width=\"2\"/>\n  <rect x=\"180\" y=\"145\" width=\"100\" height=\"12\" rx=\"4\" fill=\"#475569\"/>\n  <!-- Balance Beam -->\n  <line x1=\"60\" y1=\"95\" x2=\"400\" y2=\"95\" stroke=\"#0284c7\" stroke-width=\"6\" stroke-linecap=\"round\"/>\n  <circle cx=\"230\" cy=\"95\" r=\"7\" fill=\"#0284c7\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <!-- Left Pan -->\n  <line x1=\"80\" y1=\"95\" x2=\"60\" y2=\"135\" stroke=\"#94a3b8\" stroke-width=\"2\"/>\n  <line x1=\"120\" y1=\"95\" x2=\"140\" y2=\"135\" stroke=\"#94a3b8\" stroke-width=\"2\"/>\n  <ellipse cx=\"100\" cy=\"138\" rx=\"46\" ry=\"10\" fill=\"#e2e8f0\" stroke=\"#94a3b8\" stroke-width=\"2\"/>\n  <!-- Left Weights: 2x + 3 -->\n  <rect x=\"75\" y=\"112\" width=\"22\" height=\"22\" rx=\"4\" fill=\"#3b82f6\"/>\n  <text x=\"86\" y=\"127\" fill=\"#ffffff\" font-size=\"12\" font-family=\"sans-serif\" font-weight=\"bold\" text-anchor=\"middle\">x</text>\n  <rect x=\"103\" y=\"112\" width=\"22\" height=\"22\" rx=\"4\" fill=\"#3b82f6\"/>\n  <text x=\"114\" y=\"127\" fill=\"#ffffff\" font-size=\"12\" font-family=\"sans-serif\" font-weight=\"bold\" text-anchor=\"middle\">x</text>\n  <circle cx=\"90\" cy=\"104\" r=\"7\" fill=\"#f59e0b\"/>\n  <text x=\"90\" y=\"108\" fill=\"#ffffff\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">3</text>\n  <!-- Center Equal Sign -->\n  <text x=\"230\" y=\"65\" fill=\"#0284c7\" font-size=\"28\" font-family=\"sans-serif\" font-weight=\"bold\" text-anchor=\"middle\">=</text>\n  <text x=\"230\" y=\"35\" fill=\"#64748b\" font-size=\"13\" font-family=\"sans-serif\" font-weight=\"600\" text-anchor=\"middle\">Equilibrium Balance</text>\n  <!-- Right Pan -->\n  <line x1=\"340\" y1=\"95\" x2=\"320\" y2=\"135\" stroke=\"#94a3b8\" stroke-width=\"2\"/>\n  <line x1=\"380\" y1=\"95\" x2=\"400\" y2=\"135\" stroke=\"#94a3b8\" stroke-width=\"2\"/>\n  <ellipse cx=\"360\" cy=\"138\" rx=\"46\" ry=\"10\" fill=\"#e2e8f0\" stroke=\"#94a3b8\" stroke-width=\"2\"/>\n  <!-- Right Weights: 11 -->\n  <rect x=\"342\" y=\"110\" width=\"36\" height=\"24\" rx=\"4\" fill=\"#10b981\"/>\n  <text x=\"360\" y=\"126\" fill=\"#ffffff\" font-size=\"13\" font-family=\"sans-serif\" font-weight=\"bold\" text-anchor=\"middle\">11</text>\n  <text x=\"100\" y=\"165\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"700\" text-anchor=\"middle\">2x + 3</text>\n  <text x=\"360\" y=\"165\" fill=\"#10b981\" font-size=\"12\" font-weight=\"700\" text-anchor=\"middle\">11  (x = 4)</text>\n</svg>",
        "diagramLabel": "Algebraic balance scale model illustrating 2x + 3 = 11",
        "diagramCaption": "Geometric model: An algebraic equation behaves as a balanced scale; applying inverse operations on both sides preserves equilibrium.",
        "references": [
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSA.REI.A.1",
                "desc": "Explain each step in solving a simple equation as following from the equality of numbers.",
                "url": "/pages/standards.php?domain=HSA-REI",
                "icon": "fas fa-award"
            },
            {
                "title": "Interactive GeoGebra Algebra Balance",
                "desc": "Manipulate virtual weights and balance beams to visualize solving two-step equations.",
                "url": "https://www.geogebra.org/m/eU9q2T9J",
                "icon": "fas fa-balance-scale"
            },
            {
                "title": "Hesten's Learning Library: Foundations of Arithmetic & Algebra",
                "desc": "Borrow free electronic textbook guides with step-by-step diagnostic exercises.",
                "url": "/library/index.php?q=algebra",
                "icon": "fas fa-book"
            }
        ]
    },
    "Linear Equations": {
        "category": "Algebra",
        "definition": "A linear equation is an algebraic equation of the first degree, meaning every variable is raised to the power of 1 ($x^1$). In Cartesian geometry, a linear equation in two variables represents a straight line. The primary forms include Slope-Intercept form ($y = mx + b$), Point-Slope form ($y - y_1 = m(x - x_1)$), and Standard form ($Ax + By = C$). The slope $m = \\frac{\\Delta y}{\\Delta x} = \\frac{y_2 - y_1}{x_2 - x_1}$ measures the steepness and direction of the line.",
        "basicDefinition": "A linear equation makes a straight line when you plot it on a grid. In $y = mx + b$, $m$ tells you how steep the line is (the slope), and $b$ is where the line crosses the vertical axis (y-intercept).",
        "breakdown": [
            {
                "label": "Slope-Intercept Form",
                "text": "$y = mx + b$, where $m$ is the slope (rate of change) and $b$ is the $y$-intercept $(0, b)$."
            },
            {
                "label": "Slope Calculation",
                "text": "Slope is $\\frac{\\text{Rise}}{\\text{Run}} = \\frac{y_2 - y_1}{x_2 - x_1}$. Horizontal lines have slope $m = 0$; vertical lines have undefined slope."
            },
            {
                "label": "Parallel & Perpendicular Lines",
                "text": "Parallel lines share identical slopes ($m_1 = m_2$). Perpendicular lines have negative reciprocal slopes ($m_1 \\cdot m_2 = -1$)."
            }
        ],
        "example": "<strong>Find the slope of a line passing through $(2, 3)$ and $(6, 11)$:</strong><br><br>$$m = \\frac{11 - 3}{6 - 2} = \\frac{8}{4} = 2$$<br>Using $y - 3 = 2(x - 2) \\implies y = 2x - 1$. The $y$-intercept is $(0, -1)$.",
        "basicExample": "In the line $y = 3x + 2$, every time $x$ moves right by $1$, $y$ goes up by $3$. The line crosses the vertical axis at $2$.",
        "proTip": "Watch out for vertical lines like $x = 4$. Their slope is undefined because division by zero occurs ($\\Delta x = 0$). They cannot be written in $y = mx + b$ form.",
        "question": "What is the slope of the line represented by $6x - 2y = 10$?",
        "choices": [
            "$m = 3$",
            "$m = -3$",
            "$m = 6$",
            "$m = -5$"
        ],
        "correctIndex": 0,
        "explanation": "Convert to slope-intercept form: $-2y = -6x + 10 \\implies y = 3x - 5$. The coefficient of $x$ is $m = 3$.",
        "equations": [
            {
                "title": "Slope-Intercept Form",
                "latex": "y = mx + b",
                "note": "$m$ is the slope (rate of change $\\Delta y / \\Delta x$); $b$ is the $y$-intercept at coordinates $(0, b)$."
            },
            {
                "title": "Point-Slope Form",
                "latex": "y - y_1 = m(x - x_1)",
                "note": "Ideal when given the slope $m$ and any single known coordinate point $(x_1, y_1)$."
            },
            {
                "title": "Standard Form & Slope Calculation",
                "latex": "Ax + By = C \\quad \\text{and} \\quad m = \\frac{y_2 - y_1}{x_2 - x_1}",
                "note": "Integers $A, B, C$ with $A \\ge 0$. Slope $m$ is negative reciprocal for perpendicular lines ($m_1 \\cdot m_2 = -1$)."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 220\" width=\"100%\" height=\"220\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Cartesian graph of linear equation y = 2x - 1\">\n  <!-- Grid Background -->\n  <defs>\n    <pattern id=\"grid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#grid)\" rx=\"8\"/>\n  <!-- Axes -->\n  <line x1=\"20\" y1=\"120\" x2=\"440\" y2=\"120\" stroke=\"#64748b\" stroke-width=\"2\" marker-end=\"url(#arrow)\"/>\n  <line x1=\"180\" y1=\"20\" x2=\"180\" y2=\"200\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <text x=\"435\" y=\"112\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">x</text>\n  <text x=\"190\" y=\"32\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">y</text>\n  <!-- Linear Graph: y = 2x - 1 -->\n  <!-- Origin (180, 120), scale: 25px per unit -->\n  <!-- x=-2 -> y=-5: (130, 245) -->\n  <!-- x=0 -> y=-1: (180, 145) -->\n  <!-- x=1 -> y=1: (205, 95) -->\n  <!-- x=2 -> y=3: (230, 45) -->\n  <!-- x=3 -> y=5: (255, -5) -->\n  <line x1=\"145\" y1=\"215\" x2=\"255\" y2=\"-5\" stroke=\"#0284c7\" stroke-width=\"3.5\" stroke-linecap=\"round\"/>\n  <!-- Y-intercept point (0, -1) -->\n  <circle cx=\"180\" cy=\"145\" r=\"5\" fill=\"#ef4444\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <text x=\"135\" y=\"152\" fill=\"#ef4444\" font-size=\"11\" font-weight=\"bold\">b = (0, -1)</text>\n  <!-- Point (1, 1) -->\n  <circle cx=\"205\" cy=\"95\" r=\"4.5\" fill=\"#3b82f6\" stroke=\"#ffffff\" stroke-width=\"1.5\"/>\n  <!-- Point (2, 3) -->\n  <circle cx=\"230\" cy=\"45\" r=\"5\" fill=\"#10b981\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <text x=\"242\" y=\"48\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\">(2, 3)</text>\n  <!-- Slope triangle from (1,1) to (2,3) -->\n  <line x1=\"205\" y1=\"95\" x2=\"230\" y2=\"95\" stroke=\"#f59e0b\" stroke-width=\"2\" stroke-dasharray=\"3,3\"/>\n  <line x1=\"230\" y1=\"95\" x2=\"230\" y2=\"45\" stroke=\"#f59e0b\" stroke-width=\"2\" stroke-dasharray=\"3,3\"/>\n  <text x=\"217\" y=\"110\" fill=\"#f59e0b\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Run = 1</text>\n  <text x=\"256\" y=\"75\" fill=\"#f59e0b\" font-size=\"10\" font-weight=\"bold\">Rise = 2</text>\n  <!-- Equation banner -->\n  <rect x=\"290\" y=\"140\" width=\"145\" height=\"42\" rx=\"6\" fill=\"#0284c7\" opacity=\"0.1\"/>\n  <text x=\"362\" y=\"158\" fill=\"#0284c7\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">y = 2x - 1</text>\n  <text x=\"362\" y=\"174\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">Slope m = 2 / 1 = 2</text>\n</svg>",
        "diagramLabel": "Cartesian graph of y = 2x - 1 highlighting slope rise and run",
        "diagramCaption": "Cartesian coordinate graph of y = 2x - 1: Y-intercept at (0, -1), with a constant rate of change m = Rise / Run = 2 / 1 = 2.",
        "references": [
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSA.CED.A.2",
                "desc": "Create equations in two or more variables to represent relationships between quantities; graph equations on coordinate axes.",
                "url": "/pages/standards.php?domain=HSA-CED",
                "icon": "fas fa-award"
            },
            {
                "title": "Desmos Interactive Graphing Calculator",
                "desc": "Explore slopes, intercepts, and linear families dynamically with interactive sliders.",
                "url": "https://www.desmos.com/calculator",
                "icon": "fas fa-chart-line"
            },
            {
                "title": "GeoGebra Slope-Intercept Demonstration",
                "desc": "Visually manipulate m and b parameters to observe live coordinate translation.",
                "url": "https://www.geogebra.org/m/JRRhZ6yM",
                "icon": "fas fa-shapes"
            }
        ]
    },
    "Quadratic Equations": {
        "category": "Algebra",
        "definition": "A quadratic equation is a second-order polynomial equation of the canonical form $ax^2 + bx + c = 0$, where $a \\neq 0$. Geometrically, its graph forms a parabola with a single turning point called the vertex. Quadratic equations can be solved via factoring, completing the square, or applying the quadratic formula: $x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a}$. The discriminant $\\Delta = b^2 - 4ac$ determines whether the roots are two distinct real numbers ($\\Delta > 0$), one repeated real number ($\\Delta = 0$), or complex conjugates ($\\Delta < 0$).",
        "basicDefinition": "A quadratic equation has an $x^2$ term (like $x^2 - 5x + 6 = 0$). When you graph it, it creates a curved U-shape called a parabola. You can solve it by factoring or using the quadratic formula.",
        "breakdown": [
            {
                "label": "The Quadratic Formula",
                "text": "$$x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a}$$ Works for any quadratic equation in standard form."
            },
            {
                "label": "The Discriminant",
                "text": "$\\Delta = b^2 - 4ac$. If $\\Delta > 0$, 2 real solutions; if $\\Delta = 0$, 1 real solution; if $\\Delta < 0$, 2 complex solutions."
            },
            {
                "label": "Vertex Coordinates",
                "text": "The axis of symmetry occurs at $x = -\\frac{b}{2a}$, which gives the $x$-coordinate of the parabola's maximum or minimum."
            }
        ],
        "example": "<strong>Solve by factoring:</strong> $x^2 - 7x + 12 = 0$<br><br>Find two numbers that multiply to $12$ and add to $-7$: $-3$ and $-4$.<br>$$(x - 3)(x - 4) = 0 \\implies x = 3 \\text{ or } x = 4$$",
        "basicExample": "To solve $x^2 = 25$, take the square root of both sides. Remember both positive and negative values: $x = 5$ or $x = -5$.",
        "proTip": "Don't forget the '$\\pm$' sign when taking square roots or applying the quadratic formula. Omitting the negative root is the #1 reason students lose points on quadratic problems.",
        "question": "What is the discriminant of $x^2 - 4x + 4 = 0$, and how many real roots exist?",
        "choices": [
            "$\\Delta = 0$; 1 repeated real root",
            "$\\Delta = 16$; 2 distinct real roots",
            "$\\Delta = -16$; 2 complex roots",
            "$\\Delta = 8$; 2 irrational roots"
        ],
        "correctIndex": 0,
        "explanation": "$\\Delta = b^2 - 4ac = (-4)^2 - 4(1)(4) = 16 - 16 = 0$. When $\\Delta = 0$, there is exactly 1 repeated real root ($x = 2$).",
        "equations": [
            {
                "title": "Standard Quadratic Form",
                "latex": "ax^2 + bx + c = 0 \\quad (a \\neq 0)",
                "note": "Canonical polynomial form; $a$ determines vertical stretch and direction (up if $a > 0$, down if $a < 0$)."
            },
            {
                "title": "The Quadratic Formula",
                "latex": "x = \\frac{-b \\pm \\sqrt{b^2 - 4ac}}{2a}",
                "note": "Universal algebraic solution for any quadratic equation in standard form."
            },
            {
                "title": "The Discriminant & Vertex Form",
                "latex": "\\Delta = b^2 - 4ac \\quad \\text{and} \\quad y = a(x - h)^2 + k",
                "note": "Vertex coordinates $(h, k)$ where $h = -\\frac{b}{2a}$ and $k = f(h)$. $\\Delta > 0 \\implies 2$ real roots; $\\Delta = 0 \\implies 1$; $\\Delta < 0 \\implies 2$ complex."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 220\" width=\"100%\" height=\"220\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Parabola graph of y = x^2 - 4x + 3\">\n  <defs>\n    <pattern id=\"qgrid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#qgrid)\" rx=\"8\"/>\n  <!-- Axes (Origin at (150, 160), scale 30px per unit) -->\n  <line x1=\"20\" y1=\"160\" x2=\"440\" y2=\"160\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"150\" y1=\"20\" x2=\"150\" y2=\"210\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <text x=\"435\" y=\"152\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">x</text>\n  <text x=\"160\" y=\"32\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">y</text>\n  <!-- Axis of Symmetry x = 2 -> (150 + 60 = 210) -->\n  <line x1=\"210\" y1=\"20\" x2=\"210\" y2=\"210\" stroke=\"#94a3b8\" stroke-width=\"1.5\" stroke-dasharray=\"4,4\"/>\n  <text x=\"210\" y=\"218\" fill=\"#94a3b8\" font-size=\"10\" text-anchor=\"middle\">Axis: x = 2</text>\n  <!-- Parabola: y = x^2 - 4x + 3. Roots: x=1, x=3. Vertex: (2, -1) -> SVG (210, 190) -->\n  <!-- x=0 -> y=3 (150, 70) -->\n  <!-- x=1 -> y=0 (180, 160) -->\n  <!-- x=2 -> y=-1 (210, 190) -->\n  <!-- x=3 -> y=0 (240, 160) -->\n  <!-- x=4 -> y=3 (270, 70) -->\n  <path d=\"M 125 10 C 170 190, 190 190, 210 190 C 230 190, 250 190, 295 10\" fill=\"none\" stroke=\"#0284c7\" stroke-width=\"3.5\" stroke-linecap=\"round\"/>\n  <!-- Vertex point (2, -1) -->\n  <circle cx=\"210\" cy=\"190\" r=\"5\" fill=\"#ef4444\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <text x=\"210\" y=\"205\" fill=\"#ef4444\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Vertex (2, -1)</text>\n  <!-- Roots: (1, 0) and (3, 0) -->\n  <circle cx=\"180\" cy=\"160\" r=\"5\" fill=\"#10b981\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <text x=\"175\" y=\"150\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"end\">x = 1</text>\n  <circle cx=\"240\" cy=\"160\" r=\"5\" fill=\"#10b981\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <text x=\"245\" y=\"150\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\">x = 3</text>\n  <!-- Y-intercept (0, 3) -->\n  <circle cx=\"150\" cy=\"70\" r=\"4.5\" fill=\"#f59e0b\" stroke=\"#ffffff\" stroke-width=\"1.5\"/>\n  <text x=\"140\" y=\"74\" fill=\"#f59e0b\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"end\">c = (0, 3)</text>\n  <!-- Legend Banner -->\n  <rect x=\"300\" y=\"30\" width=\"145\" height=\"52\" rx=\"6\" fill=\"#0284c7\" opacity=\"0.1\"/>\n  <text x=\"372\" y=\"48\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">y = x\u00b2 - 4x + 3</text>\n  <text x=\"372\" y=\"64\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">\u0394 = (-4)\u00b2 - 4(1)(3) = 4 &gt; 0</text>\n  <text x=\"372\" y=\"76\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">2 Distinct Real Roots</text>\n</svg>",
        "diagramLabel": "Parabola graph illustrating vertex, axis of symmetry, and real roots",
        "diagramCaption": "Parabola geometry: Shows roots at x = 1 and x = 3, minimum vertex at (2, -1), axis of symmetry x = 2, and positive discriminant \u0394 = 4.",
        "references": [
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSA.REI.B.4",
                "desc": "Solve quadratic equations in one variable by inspection, factoring, completing the square, and the quadratic formula.",
                "url": "/pages/standards.php?domain=HSA-REI",
                "icon": "fas fa-award"
            },
            {
                "title": "Desmos Quadratic Explorer",
                "desc": "Adjust coefficients a, b, and c to see vertex movement, root convergence, and discriminant transformations.",
                "url": "https://www.desmos.com/calculator/qmsu14y18i",
                "icon": "fas fa-chart-line"
            },
            {
                "title": "Khan Academy: Quadratic Functions & Equations",
                "desc": "Comprehensive video lecture sequence on completing the square and derivation.",
                "url": "https://www.khanacademy.org/math/algebra/x2f8bb11595b61c86:quadratic-functions-equations",
                "icon": "fas fa-graduation-cap"
            }
        ]
    },
    "Systems of Equations": {
        "category": "Algebra",
        "definition": "A system of linear equations is a collection of two or more equations sharing common variables. The solution to a system is the set of variable values that satisfies every equation simultaneously, corresponding geometrically to the point(s) of intersection. Systems can be solved algebraically using the Substitution Method, Elimination Method (linear combination), or matrix methods (Gaussian elimination, Cramer's Rule). A system may be consistent independent (1 unique solution), consistent dependent (infinitely many solutions, coincident lines), or inconsistent (no solution, parallel lines).",
        "basicDefinition": "A system of equations has two or more equations with the same letters (like $x$ and $y$). The answer is where their graphs cross each other. You can solve them by substituting one into another or adding them to eliminate a letter.",
        "breakdown": [
            {
                "label": "Substitution Method",
                "text": "Isolate one variable in one equation, then substitute that expression into the second equation."
            },
            {
                "label": "Elimination Method",
                "text": "Multiply equations by constants so coefficients of one variable are opposites, then add equations to eliminate that variable."
            },
            {
                "label": "Classification",
                "text": "One solution (intersecting lines), no solution (parallel lines, inconsistent), or infinite solutions (same line, dependent)."
            }
        ],
        "example": "<strong>Solve by elimination:</strong><br>1) $2x + y = 9$<br>2) $3x - y = 6$<br><br>Add equations: $(2x + 3x) + (y - y) = 9 + 6 \\implies 5x = 15 \\implies x = 3$.<br>Substitute $x=3$ into (1): $2(3) + y = 9 \\implies 6 + y = 9 \\implies y = 3$.<br>Solution: $(3, 3)$.",
        "basicExample": "If $x + y = 10$ and $x - y = 2$, add them together: $2x = 12$, so $x = 6$. Then $6 + y = 10$, so $y = 4$.",
        "proTip": "If eliminating variables results in a true statement like $0 = 0$, the system has infinitely many solutions (coincident lines). If it results in a false statement like $0 = 7$, there is no solution (parallel lines).",
        "question": "Solve the system: $x + 2y = 8$ and $x - 2y = 2$. What is the value of $x$?",
        "choices": [
            "$x = 5$",
            "$x = 3$",
            "$x = 6$",
            "$x = 4$"
        ],
        "correctIndex": 0,
        "explanation": "Adding both equations cancels $2y$: $(x + x) + (2y - 2y) = 8 + 2 \\implies 2x = 10 \\implies x = 5$.",
        "equations": [
            {
                "title": "General 2x2 Linear System",
                "latex": "\\begin{cases} a_1 x + b_1 y = c_1 \\\\ a_2 x + b_2 y = c_2 \\end{cases}",
                "note": "System of two linear equations in two unknown variables $x$ and $y$."
            },
            {
                "title": "Cramer's Rule via Determinants",
                "latex": "D = \\begin{vmatrix} a_1 & b_1 \\\\ a_2 & b_2 \\end{vmatrix} = a_1 b_2 - a_2 b_1, \\quad x = \\frac{D_x}{D}, \\quad y = \\frac{D_y}{D}",
                "note": "A unique solution exists if and only if the determinant $D \\neq 0$."
            },
            {
                "title": "Matrix Vector Formulation",
                "latex": "\\begin{bmatrix} a_1 & b_1 \\\\ a_2 & b_2 \\end{bmatrix} \\begin{bmatrix} x \\\\ y \\end{bmatrix} = \\begin{bmatrix} c_1 \\\\ c_2 \\end{bmatrix} \\implies \\mathbf{x} = A^{-1}\\mathbf{b}",
                "note": "Linear algebra representation where $A^{-1}$ is the matrix inverse."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 220\" width=\"100%\" height=\"220\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Intersection of two linear equations at (3, 3)\">\n  <defs>\n    <pattern id=\"sgrid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#sgrid)\" rx=\"8\"/>\n  <line x1=\"20\" y1=\"170\" x2=\"440\" y2=\"170\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"120\" y1=\"20\" x2=\"120\" y2=\"210\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <!-- Scale 25px per unit. Origin at (120, 170) -->\n  <!-- Line 1: 2x + y = 9 -> y = -2x + 9. Points: (0, 9) [120, -55], (3, 3) [195, 95], (4.5, 0) [232, 170] -->\n  <line x1=\"135\" y1=\"20\" x2=\"250\" y2=\"210\" stroke=\"#3b82f6\" stroke-width=\"3\" stroke-linecap=\"round\"/>\n  <!-- Line 2: 3x - y = 6 -> y = 3x - 6. Points: (2, 0) [170, 170], (3, 3) [195, 95], (4, 6) [220, 20] -->\n  <line x1=\"160\" y1=\"200\" x2=\"230\" y2=\"20\" stroke=\"#10b981\" stroke-width=\"3\" stroke-linecap=\"round\"/>\n  <!-- Intersection point (3, 3) -> (195, 95) -->\n  <circle cx=\"195\" cy=\"95\" r=\"7\" fill=\"#ef4444\" stroke=\"#ffffff\" stroke-width=\"2.5\"/>\n  <text x=\"210\" y=\"98\" fill=\"#ef4444\" font-size=\"13\" font-weight=\"bold\">Solution (3, 3)</text>\n  <!-- Labels -->\n  <rect x=\"260\" y=\"40\" width=\"180\" height=\"60\" rx=\"6\" fill=\"#f8fafc\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n  <text x=\"275\" y=\"60\" fill=\"#3b82f6\" font-size=\"12\" font-weight=\"bold\">L1: 2x + y = 9</text>\n  <text x=\"275\" y=\"78\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">L2: 3x - y = 6</text>\n  <text x=\"275\" y=\"94\" fill=\"#64748b\" font-size=\"11\">Consistent &amp; Independent</text>\n</svg>",
        "diagramLabel": "Cartesian graph showing intersection of two lines at (3, 3)",
        "diagramCaption": "Geometric interpretation of a system of equations: The simultaneous solution is the unique point of intersection (3, 3).",
        "references": [
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSA.REI.C.6",
                "desc": "Solve systems of linear equations exactly and approximately focusing on pairs of linear equations in two variables.",
                "url": "/pages/standards.php?domain=HSA-REI",
                "icon": "fas fa-award"
            },
            {
                "title": "GeoGebra Systems of Linear Equations Solver",
                "desc": "Interactive visualization of intersecting, parallel, and coincident lines in 2D.",
                "url": "https://www.geogebra.org/m/e3Gszd9k",
                "icon": "fas fa-project-diagram"
            },
            {
                "title": "Khan Academy: Systems of Linear Equations",
                "desc": "Tutorials covering elimination, substitution, and graphical solutions.",
                "url": "https://www.khanacademy.org/math/algebra/x2f8bb11595b61c86:systems-of-equations",
                "icon": "fas fa-graduation-cap"
            }
        ]
    },
    "Angles and Lines": {
        "category": "Geometry",
        "definition": "Lines and angles form the axiomatic building blocks of Euclidean geometry. An angle is formed by two rays sharing a common endpoint called the vertex. Angles are classified by magnitude: Acute ($0^\\circ < \\theta < 90^\\circ$), Right ($\\theta = 90^\\circ$), Obtuse ($90^\\circ < \\theta < 180^\\circ$), and Straight ($\\theta = 180^\\circ$). Pairs of angles exhibit fundamental relationships: Complementary (sum to $90^\\circ$), Supplementary (sum to $180^\\circ$), and Vertical angles (formed by intersecting lines, always congruent). When parallel lines are cut by a transversal, alternate interior, alternate exterior, and corresponding angles are congruent.",
        "basicDefinition": "An angle is the space between two connected lines. Angles are measured in degrees ($^\\circ$). Angles that add up to $90^\\circ$ are complementary, and angles that add up to $180^\\circ$ (a flat straight line) are supplementary.",
        "breakdown": [
            {
                "label": "Angle Classifications",
                "text": "Acute ($< 90^\\circ$), Right ($= 90^\\circ$, marked with a square), Obtuse ($> 90^\\circ$), Straight ($= 180^\\circ$)."
            },
            {
                "label": "Complementary & Supplementary",
                "text": "Complementary angles add to $90^\\circ$; supplementary angles form a linear pair and add to $180^\\circ$."
            },
            {
                "label": "Parallel Transversal Rules",
                "text": "Corresponding and Alternate Interior angles are equal. Consecutive interior angles add up to $180^\\circ$."
            }
        ],
        "example": "<strong>Transversal Problem:</strong> Two parallel lines are intersected by a transversal. If one interior angle is $65^\\circ$, its alternate interior angle is $65^\\circ$, and its consecutive interior angle is $180^\\circ - 65^\\circ = 115^\\circ$.",
        "basicExample": "If an angle is $40^\\circ$, its complement is $90^\\circ - 40^\\circ = 50^\\circ$, and its supplement is $180^\\circ - 40^\\circ = 140^\\circ$.",
        "proTip": "Remember the mnemonic: 'C' comes before 'S' in the alphabet, just as $90^\\circ$ comes before $180^\\circ$: <strong>C</strong>omplementary = $90^\\circ$, <strong>S</strong>upplementary = $180^\\circ$.",
        "question": "Two angles are supplementary. If one angle measures $118^\\circ$, what is the measure of the other angle?",
        "choices": [
            "$62^\\circ$",
            "$72^\\circ$",
            "$28^\\circ$",
            "$162^\\circ$"
        ],
        "correctIndex": 0,
        "explanation": "Supplementary angles sum to $180^\\circ$. Therefore, the missing angle is $180^\\circ - 118^\\circ = 62^\\circ$.",
        "equations": [
            {
                "title": "Angle Pair Sum Theorems",
                "latex": "\\angle A + \\angle B = 90^\\circ \\; (\\text{Comp}) \\quad \\text{and} \\quad \\angle C + \\angle D = 180^\\circ \\; (\\text{Supp})",
                "note": "Complementary angles sum to a right angle; supplementary angles form a linear pair on a straight line."
            },
            {
                "title": "Parallel Lines Transversal Theorems",
                "latex": "\\angle \\text{alt-int}_1 = \\angle \\text{alt-int}_2, \\quad \\angle \\text{corr}_1 = \\angle \\text{corr}_2, \\quad \\angle \\text{consec}_1 + \\angle \\text{consec}_2 = 180^\\circ",
                "note": "Alternate interior and corresponding angles are congruent; consecutive interior angles are supplementary."
            },
            {
                "title": "Triangle Angle Sum Theorem",
                "latex": "\\angle A + \\angle B + \\angle C = 180^\\circ \\quad \\text{and} \\quad \\angle \\text{ext} = \\angle A + \\angle B",
                "note": "Interior angles of any Euclidean triangle sum to $180^\\circ$; exterior angle equals sum of two remote interiors."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Parallel lines cut by a transversal diagram\">\n  <!-- Parallel Lines L1 and L2 -->\n  <line x1=\"30\" y1=\"60\" x2=\"430\" y2=\"60\" stroke=\"#0284c7\" stroke-width=\"3\"/>\n  <text x=\"435\" y=\"64\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\">L1</text>\n  <line x1=\"30\" y1=\"140\" x2=\"430\" y2=\"140\" stroke=\"#0284c7\" stroke-width=\"3\"/>\n  <text x=\"435\" y=\"144\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\">L2</text>\n  <!-- Transversal Line T -->\n  <line x1=\"120\" y1=\"185\" x2=\"340\" y2=\"15\" stroke=\"#ef4444\" stroke-width=\"3\"/>\n  <text x=\"345\" y=\"25\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\">T</text>\n  <!-- Angles on L1 (Intersection at (281.5, 60)) -->\n  <circle cx=\"281.5\" cy=\"60\" r=\"4\" fill=\"#334155\"/>\n  <text x=\"250\" y=\"52\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">\u22201 (115\u00b0)</text>\n  <text x=\"310\" y=\"52\" fill=\"#f59e0b\" font-size=\"12\" font-weight=\"bold\">\u22202 (65\u00b0)</text>\n  <text x=\"245\" y=\"80\" fill=\"#f59e0b\" font-size=\"12\" font-weight=\"bold\">\u22203 (65\u00b0)</text>\n  <text x=\"310\" y=\"80\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">\u22204 (115\u00b0)</text>\n  <!-- Angles on L2 (Intersection at (178, 140)) -->\n  <circle cx=\"178\" cy=\"140\" r=\"4\" fill=\"#334155\"/>\n  <text x=\"145\" y=\"132\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">\u22205 (115\u00b0)</text>\n  <text x=\"205\" y=\"132\" fill=\"#f59e0b\" font-size=\"12\" font-weight=\"bold\">\u22206 (65\u00b0)</text>\n  <text x=\"140\" y=\"160\" fill=\"#f59e0b\" font-size=\"12\" font-weight=\"bold\">\u22207 (65\u00b0)</text>\n  <text x=\"205\" y=\"160\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">\u22208 (115\u00b0)</text>\n  <!-- Summary Box -->\n  <rect x=\"260\" y=\"110\" width=\"180\" height=\"75\" rx=\"6\" fill=\"#f8fafc\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n  <text x=\"270\" y=\"130\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\">Alternate Interior: \u22203 = \u22206</text>\n  <text x=\"270\" y=\"148\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\">Corresponding: \u22202 = \u22206</text>\n  <text x=\"270\" y=\"166\" fill=\"#64748b\" font-size=\"11\">Consecutive: \u22203 + \u22205 = 180\u00b0</text>\n</svg>",
        "diagramLabel": "Geometric diagram of two parallel lines cut by a transversal",
        "diagramCaption": "Transversal relationships: Shows equal alternate interior angles (65\u00b0) and supplementary consecutive interior angles (115\u00b0 + 65\u00b0 = 180\u00b0).",
        "references": [
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSG.CO.C.9",
                "desc": "Prove theorems about lines and angles including vertical angles, parallel transversals, and perpendicular bisectors.",
                "url": "/pages/standards.php?domain=HSG-CO",
                "icon": "fas fa-award"
            },
            {
                "title": "GeoGebra Dynamic Transversal Explorer",
                "desc": "Drag transversal angle to observe live congruence and supplementary relationships.",
                "url": "https://www.geogebra.org/m/C73uS52D",
                "icon": "fas fa-ruler-combined"
            },
            {
                "title": "Hesten's Learning Library: Geometry Principles & Proofs",
                "desc": "Review formal Euclid postulates and Euclidean axiomatic methods.",
                "url": "/library/index.php?q=geometry",
                "icon": "fas fa-book"
            }
        ]
    },
    "Area and Perimeter": {
        "category": "Geometry",
        "definition": "Perimeter is the one-dimensional distance around the exterior boundary of a two-dimensional closed geometric shape, measured in linear units. Area is the two-dimensional extent of space enclosed within the boundary, measured in square units ($u^2$). Standard formulas include: Rectangle ($P = 2l + 2w$, $A = l \\cdot w$), Triangle ($A = \\frac{1}{2} b h$), Trapezoid ($A = \\frac{a + b}{2} \\cdot h$), and Circle (Circumference $C = 2\\pi r$, Area $A = \\pi r^2$).",
        "basicDefinition": "Perimeter is the distance all the way around the outside of a shape (like a fence around a yard). Area is the amount of flat space covered inside the shape (like carpet on a floor).",
        "breakdown": [
            {
                "label": "Polygons (Triangles & Quads)",
                "text": "Rectangle: $A = lw$. Triangle: $A = \\frac{1}{2}bh$. Trapezoid: $A = \\frac{b_1 + b_2}{2}h$. Add side lengths for perimeter."
            },
            {
                "label": "Circles (Perimeter = Circumference)",
                "text": "Circumference $C = 2\\pi r = \\pi d$. Area $A = \\pi r^2$. Remember $r$ is the radius (half the diameter $d$)."
            },
            {
                "label": "Composite Figures",
                "text": "Decompose irregular shapes into regular rectangles, triangles, and semicircles; compute individual areas and sum them."
            }
        ],
        "example": "<strong>Find the area and perimeter of a right triangle with legs $6$ cm and $8$ cm:</strong><br><br>1. Hypotenuse via Pythagorean theorem: $c = \\sqrt{6^2 + 8^2} = \\sqrt{36 + 64} = 10$ cm.<br>2. Perimeter: $P = 6 + 8 + 10 = 24$ cm.<br>3. Area: $A = \\frac{1}{2}(6)(8) = 24\\text{ cm}^2$.",
        "basicExample": "A garden is $5$ meters long and $3$ meters wide. The perimeter is $5 + 3 + 5 + 3 = 16$ m. The area is $5 \\times 3 = 15$ square meters.",
        "proTip": "In circle problems, check whether you are given the diameter or radius! If diameter is given, divide by 2 first before calculating area with $A = \\pi r^2$.",
        "question": "What is the area of a circle with a diameter of $10$ meters? (Use $\\pi \\approx 3.14$)",
        "choices": [
            "$78.5\\text{ m}^2$",
            "$31.4\\text{ m}^2$",
            "$314\\text{ m}^2$",
            "$15.7\\text{ m}^2$"
        ],
        "correctIndex": 0,
        "explanation": "The radius is half the diameter: $r = 10 / 2 = 5$ m. Area $A = \\pi r^2 = 3.14 \\times 5^2 = 3.14 \\times 25 = 78.5\\text{ m}^2$.",
        "equations": [
            {
                "title": "Polygon Area Formulas",
                "latex": "A_{\\text{rect}} = lw, \\quad A_{\\text{tri}} = \\frac{1}{2}bh, \\quad A_{\\text{trap}} = \\frac{a + b}{2}h",
                "note": "Standard formulas for rectangles, triangles, and trapezoids with base $b$ and altitude $h$."
            },
            {
                "title": "Circle Formulas",
                "latex": "C = 2\\pi r = \\pi d \\quad \\text{and} \\quad A = \\pi r^2",
                "note": "Circumference $C$ (perimeter) and Area $A$ where $r = d / 2$ is the radius."
            },
            {
                "title": "Heron's Formula & Regular Polygons",
                "latex": "A = \\sqrt{s(s - a)(s - b)(s - c)} \\; \\left(s = \\frac{a+b+c}{2}\\right), \\quad A_{\\text{reg}} = \\frac{1}{2} a P",
                "note": "Heron's formula solves triangle area from 3 side lengths; regular polygon area uses apothem $a$ and perimeter $P$."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 190\" width=\"100%\" height=\"190\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Area and perimeter comparison of rectangle and circle\">\n  <!-- Rectangle -->\n  <rect x=\"40\" y=\"40\" width=\"150\" height=\"90\" rx=\"4\" fill=\"#3b82f6\" fill-opacity=\"0.15\" stroke=\"#3b82f6\" stroke-width=\"2.5\"/>\n  <text x=\"115\" y=\"32\" fill=\"#3b82f6\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Length = 8 cm</text>\n  <text x=\"25\" y=\"90\" fill=\"#3b82f6\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\" transform=\"rotate(-90 25 90)\">Width = 5 cm</text>\n  <text x=\"115\" y=\"85\" fill=\"#1e40af\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">A = 8 \u00d7 5 = 40 cm\u00b2</text>\n  <text x=\"115\" y=\"105\" fill=\"#64748b\" font-size=\"11\" text-anchor=\"middle\">P = 2(8+5) = 26 cm</text>\n  <!-- Circle -->\n  <circle cx=\"330\" cy=\"85\" r=\"50\" fill=\"#10b981\" fill-opacity=\"0.15\" stroke=\"#10b981\" stroke-width=\"2.5\"/>\n  <!-- Radius line -->\n  <line x1=\"330\" y1=\"85\" x2=\"380\" y2=\"85\" stroke=\"#059669\" stroke-width=\"2\"/>\n  <circle cx=\"330\" cy=\"85\" r=\"3.5\" fill=\"#059669\"/>\n  <text x=\"355\" y=\"78\" fill=\"#059669\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">r = 5 cm</text>\n  <text x=\"330\" y=\"155\" fill=\"#059669\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">A = \u03c0(5)\u00b2 \u2248 78.54 cm\u00b2</text>\n  <text x=\"330\" y=\"172\" fill=\"#64748b\" font-size=\"11\" text-anchor=\"middle\">C = 2\u03c0(5) \u2248 31.42 cm</text>\n</svg>",
        "diagramLabel": "Area and perimeter comparison diagram for rectangle and circle",
        "diagramCaption": "Dimensional contrast: Perimeter and circumference measure 1D linear boundary; area measures 2D enclosed surface region.",
        "references": [
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSG.GPE.B.7",
                "desc": "Use coordinates to compute perimeters of polygons and areas of triangles and rectangles.",
                "url": "/pages/standards.php?domain=HSG-GPE",
                "icon": "fas fa-award"
            },
            {
                "title": "GeoGebra Area & Perimeter Dynamic Sandbox",
                "desc": "Reshape polygons dynamically to observe how constant perimeter affects maximum enclosed area.",
                "url": "https://www.geogebra.org/m/Xm79C99k",
                "icon": "fas fa-draw-polygon"
            },
            {
                "title": "Khan Academy: Area & Perimeter Practice",
                "desc": "Step-by-step problem sets on composite figures and arc lengths.",
                "url": "https://www.khanacademy.org/math/basic-geo/basic-geo-area-and-perimeter",
                "icon": "fas fa-graduation-cap"
            }
        ]
    },
    "Volume and Surface Area": {
        "category": "Geometry",
        "definition": "Volume quantifies the three-dimensional capacity of space contained within a closed boundary, measured in cubic units ($u^3$). Surface Area represents the total two-dimensional area of all exposed exterior surfaces of a three-dimensional polyhedron or solid of revolution, measured in square units ($u^2$). Fundamental formulas include: Rectangular Prism ($V = lwh$, $SA = 2(lw + lh + wh)$), Cylinder ($V = \\pi r^2 h$, $SA = 2\\pi r h + 2\\pi r^2$), Cone ($V = \\frac{1}{3}\\pi r^2 h$), and Sphere ($V = \\frac{4}{3}\\pi r^3$, $SA = 4\\pi r^2$).",
        "basicDefinition": "Volume is how much 3D space is inside an object (like how much water fills a box or bottle). Surface area is how much wrapping paper you need to cover the entire outside of the solid.",
        "breakdown": [
            {
                "label": "Prisms & Cylinders",
                "text": "Volume is always the area of the base ($B$) times height ($h$): $V = B \\cdot h$. Rectangular prism: $lwh$; Cylinder: $\\pi r^2 h$."
            },
            {
                "label": "Pyramids & Cones",
                "text": "Pointed solids occupy exactly one-third the volume of their corresponding prism/cylinder: $V = \\frac{1}{3} B h$."
            },
            {
                "label": "Spheres",
                "text": "Volume $V = \\frac{4}{3}\\pi r^3$. Total Surface Area $SA = 4\\pi r^2$. Depends entirely on radius $r$."
            }
        ],
        "example": "<strong>Cylinder calculations ($r = 3$ cm, $h = 7$ cm):</strong><br><br>$$V = \\pi r^2 h = \\pi (3^2)(7) = 63\\pi \\approx 197.92\\text{ cm}^3$$<br>$$SA = 2\\pi r h + 2\\pi r^2 = 2\\pi(3)(7) + 2\\pi(9) = 42\\pi + 18\\pi = 60\\pi \\approx 188.5\\text{ cm}^2$$",
        "basicExample": "A cardboard box is $4$ ft long, $3$ ft wide, and $2$ ft tall. The volume is $4 \\times 3 \\times 2 = 24$ cubic feet.",
        "proTip": "Remember unit dimensions: Length is in linear units (cm), Surface Area is in squared units ($\\text{cm}^2$), and Volume is in cubed units ($\\text{cm}^3$). Keep them distinct on assessments.",
        "question": "What is the volume of a sphere with a radius of $3$ inches? (Leave answer in terms of $\\pi$)",
        "choices": [
            "$36\\pi\\text{ in}^3$",
            "$12\\pi\\text{ in}^3$",
            "$108\\pi\\text{ in}^3$",
            "$27\\pi\\text{ in}^3$"
        ],
        "correctIndex": 0,
        "explanation": "Volume formula for a sphere: $V = \\frac{4}{3}\\pi r^3 = \\frac{4}{3}\\pi (3^3) = \\frac{4}{3}\\pi (27) = 36\\pi\\text{ in}^3$.",
        "equations": [
            {
                "title": "Prisms & Cylinders",
                "latex": "V_{\\text{prism}} = lwh, \\quad V_{\\text{cyl}} = \\pi r^2 h, \\quad SA_{\\text{cyl}} = 2\\pi r h + 2\\pi r^2",
                "note": "Volume is Base Area $\\times$ Height ($V = B \\cdot h$); cylinder surface area includes lateral tube plus 2 circular bases."
            },
            {
                "title": "Pyramids & Cones",
                "latex": "V_{\\text{pyr}} = \\frac{1}{3}Bh, \\quad V_{\\text{cone}} = \\frac{1}{3}\\pi r^2 h, \\quad SA_{\\text{cone}} = \\pi r l + \\pi r^2",
                "note": "Pointed 3D solids occupy $\\frac{1}{3}$ the volume of matching prisms; slant height $l = \\sqrt{r^2 + h^2}$."
            },
            {
                "title": "Sphere Formulas",
                "latex": "V_{\\text{sphere}} = \\frac{4}{3}\\pi r^3 \\quad \\text{and} \\quad SA_{\\text{sphere}} = 4\\pi r^2",
                "note": "Derived via Archimedes' principle: Sphere surface area is exactly 4 times the area of its great circular disk."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"3D geometric solids cylinder and cone diagram\">\n  <!-- Cylinder -->\n  <g transform=\"translate(40, 25)\">\n    <!-- Top ellipse -->\n    <ellipse cx=\"65\" cy=\"25\" rx=\"45\" ry=\"14\" fill=\"#0284c7\" fill-opacity=\"0.2\" stroke=\"#0284c7\" stroke-width=\"2\"/>\n    <!-- Sides -->\n    <line x1=\"20\" y1=\"25\" x2=\"20\" y2=\"125\" stroke=\"#0284c7\" stroke-width=\"2\"/>\n    <line x1=\"110\" y1=\"25\" x2=\"110\" y2=\"125\" stroke=\"#0284c7\" stroke-width=\"2\"/>\n    <!-- Bottom ellipse -->\n    <path d=\"M 20 125 A 45 14 0 0 0 110 125\" fill=\"none\" stroke=\"#0284c7\" stroke-width=\"2\"/>\n    <path d=\"M 20 125 A 45 14 0 0 1 110 125\" fill=\"none\" stroke=\"#0284c7\" stroke-width=\"1.5\" stroke-dasharray=\"3,3\"/>\n    <!-- Height indicator -->\n    <line x1=\"120\" y1=\"25\" x2=\"120\" y2=\"125\" stroke=\"#64748b\" stroke-width=\"1.5\"/>\n    <text x=\"130\" y=\"80\" fill=\"#64748b\" font-size=\"11\" font-weight=\"bold\">h</text>\n    <!-- Radius indicator -->\n    <line x1=\"65\" y1=\"25\" x2=\"110\" y2=\"25\" stroke=\"#0284c7\" stroke-width=\"1.5\"/>\n    <text x=\"85\" y=\"20\" fill=\"#0284c7\" font-size=\"10\" font-weight=\"bold\">r</text>\n    <text x=\"65\" y=\"160\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">V = \u03c0r\u00b2h</text>\n  </g>\n  <!-- Cone -->\n  <g transform=\"translate(260, 25)\">\n    <!-- Apex point -->\n    <circle cx=\"70\" cy=\"15\" r=\"3\" fill=\"#10b981\"/>\n    <!-- Slant sides -->\n    <line x1=\"70\" y1=\"15\" x2=\"20\" y2=\"125\" stroke=\"#10b981\" stroke-width=\"2\"/>\n    <line x1=\"70\" y1=\"15\" x2=\"120\" y2=\"125\" stroke=\"#10b981\" stroke-width=\"2\"/>\n    <!-- Base ellipse -->\n    <path d=\"M 20 125 A 50 14 0 0 0 120 125\" fill=\"#10b981\" fill-opacity=\"0.15\" stroke=\"#10b981\" stroke-width=\"2\"/>\n    <path d=\"M 20 125 A 50 14 0 0 1 120 125\" fill=\"none\" stroke=\"#10b981\" stroke-width=\"1.5\" stroke-dasharray=\"3,3\"/>\n    <!-- Altitude line -->\n    <line x1=\"70\" y1=\"15\" x2=\"70\" y2=\"125\" stroke=\"#64748b\" stroke-width=\"1.5\" stroke-dasharray=\"3,3\"/>\n    <text x=\"75\" y=\"75\" fill=\"#64748b\" font-size=\"11\">h</text>\n    <line x1=\"70\" y1=\"125\" x2=\"120\" y2=\"125\" stroke=\"#10b981\" stroke-width=\"1.5\"/>\n    <text x=\"95\" y=\"120\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\">r</text>\n    <text x=\"70\" y=\"160\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">V = \u2153 \u03c0r\u00b2h</text>\n  </g>\n</svg>",
        "diagramLabel": "3D geometric solid comparison showing cylinder and matching cone",
        "diagramCaption": "3D solids relationship: A cone occupies exactly \u2153 the volume of a cylinder sharing identical radius r and height h.",
        "references": [
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSG.GMD.A.1",
                "desc": "Give an informal argument for the formulas for the circumference of a circle, area of a circle, volume of a cylinder, pyramid, and cone.",
                "url": "/pages/standards.php?domain=HSG-GMD",
                "icon": "fas fa-award"
            },
            {
                "title": "GeoGebra 3D Solids Explorer",
                "desc": "Rotate cylinders, prisms, and spheres in real-time 3D space with cross-section slices.",
                "url": "https://www.geogebra.org/m/v7t3n6h5",
                "icon": "fas fa-cube"
            },
            {
                "title": "Wolfram MathWorld: Polyhedral Solids & Volumes",
                "desc": "Rigorous derivation tables for Platonic solids, prisms, and surface integrations.",
                "url": "https://mathworld.wolfram.com/Volume.html",
                "icon": "fas fa-globe"
            }
        ]
    },
    "Geometric Proofs": {
        "category": "Geometry",
        "definition": "A geometric proof is a rigorous logical argument that establishes the universal truth of a mathematical proposition using deductive reasoning, axioms, postulates, and previously proven theorems. The most common organizational format is the Two-Column Proof, where steps of mathematical deduction are listed sequentially in the left column ('Statements') and justified by valid geometric definitions, postulates, or theorems in the right column ('Reasons'). Essential triangle congruence postulates include SSS, SAS, ASA, AAS, and HL (Hypotenuse-Leg for right triangles), followed by CPCTC (Corresponding Parts of Congruent Triangles are Congruent).",
        "basicDefinition": "A geometric proof is a step-by-step logical explanation proving that something is always true in geometry. In a two-column proof, every statement you write must be backed up by a verified rule, definition, or theorem.",
        "breakdown": [
            {
                "label": "Two-Column Structure",
                "text": "Left Column = Statements (what is true); Right Column = Reasons (why it's true: Given, Definition, Postulate, Theorem)."
            },
            {
                "label": "Triangle Congruence Postulates",
                "text": "SSS (Side-Side-Side), SAS (Side-Angle-Side), ASA, AAS, and HL. Note: AAA proves similarity, not congruence; SSA is NOT valid."
            },
            {
                "label": "CPCTC Principle",
                "text": "'Corresponding Parts of Congruent Triangles are Congruent'. Once triangles are proven congruent, all their parts match."
            }
        ],
        "example": "<strong>Proving vertical angles are equal:</strong><br>1. $\\angle 1$ and $\\angle 2$ form a linear pair (Given)<br>2. $\\angle 1 + \\angle 2 = 180^\\circ$ (Linear Pair Postulate)<br>3. $\\angle 2$ and $\\angle 3$ form a linear pair (Given)<br>4. $\\angle 2 + \\angle 3 = 180^\\circ$ (Linear Pair Postulate)<br>5. $\\angle 1 + \\angle 2 = \\angle 2 + \\angle 3$ (Transitive Property)<br>6. $\\angle 1 = \\angle 3$ (Subtraction Property of Equality) &check;",
        "basicExample": "If you know two triangles have three pairs of matching sides (SSS), they are exact twins. Therefore, their matching angles must also be equal (CPCTC).",
        "proTip": "Never use 'SSA' (Side-Side-Angle) or 'ASS' as a congruence reason. Unless it is a right triangle where the Hypotenuse-Leg (HL) theorem applies, two sides and a non-included angle can produce two completely different triangles (the ambiguous case).",
        "question": "Which of the following is NOT a valid criteria for proving two triangles are congruent?",
        "choices": [
            "AAA (Angle-Angle-Angle)",
            "SSS (Side-Side-Side)",
            "SAS (Side-Angle-Side)",
            "ASA (Angle-Side-Angle)"
        ],
        "correctIndex": 0,
        "explanation": "AAA only guarantees that two triangles are similar (same shape), but not necessarily congruent (same size). A tiny triangle can have identical angles to an enormous triangle.",
        "equations": [
            {
                "title": "Triangle Congruence Axioms",
                "latex": "\\triangle ABC \\cong \\triangle DEF \\iff \\text{SSS, SAS, ASA, AAS, or HL}",
                "note": "Criteria sufficient to guarantee full congruence; AAA proves similarity, while SSA is mathematically ambiguous."
            },
            {
                "title": "CPCTC Principle",
                "latex": "\\triangle ABC \\cong \\triangle DEF \\implies \\begin{cases} \\overline{AB} \\cong \\overline{DE}, \\; \\overline{BC} \\cong \\overline{EF}, \\; \\overline{AC} \\cong \\overline{DF} \\\\ \\angle A \\cong \\angle D, \\; \\angle B \\cong \\angle E, \\; \\angle C \\cong \\angle F \\end{cases}",
                "note": "Corresponding Parts of Congruent Triangles are Congruent."
            },
            {
                "title": "Pythagorean Theorem & Converse",
                "latex": "a^2 + b^2 = c^2 \\iff \\angle C = 90^\\circ",
                "note": "In a right triangle with legs $a, b$ and hypotenuse $c$; the converse proves a triangle is right if $a^2 + b^2 = c^2$."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 190\" width=\"100%\" height=\"190\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Triangle congruence SAS proof diagram\">\n  <!-- Triangle 1 -->\n  <polygon points=\"50,140 160,140 130,50\" fill=\"#3b82f6\" fill-opacity=\"0.12\" stroke=\"#3b82f6\" stroke-width=\"2.5\"/>\n  <circle cx=\"50\" cy=\"140\" r=\"3\" fill=\"#3b82f6\"/>\n  <text x=\"40\" y=\"152\" fill=\"#3b82f6\" font-size=\"12\" font-weight=\"bold\">A</text>\n  <circle cx=\"160\" cy=\"140\" r=\"3\" fill=\"#3b82f6\"/>\n  <text x=\"168\" y=\"152\" fill=\"#3b82f6\" font-size=\"12\" font-weight=\"bold\">B</text>\n  <circle cx=\"130\" cy=\"50\" r=\"3\" fill=\"#3b82f6\"/>\n  <text x=\"130\" y=\"40\" fill=\"#3b82f6\" font-size=\"12\" font-weight=\"bold\">C</text>\n  <!-- Congruence ticks on T1 -->\n  <!-- Side AB tick: 1 tick -->\n  <line x1=\"102\" y1=\"135\" x2=\"102\" y2=\"145\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <!-- Side AC tick: 2 ticks -->\n  <line x1=\"86\" y1=\"91\" x2=\"94\" y2=\"99\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <line x1=\"89\" y1=\"87\" x2=\"97\" y2=\"95\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <!-- Included Angle A arc -->\n  <path d=\"M 68 140 A 18 18 0 0 0 62 127\" fill=\"none\" stroke=\"#f59e0b\" stroke-width=\"2\"/>\n  \n  <!-- Triangle 2 -->\n  <polygon points=\"260,140 370,140 340,50\" fill=\"#10b981\" fill-opacity=\"0.12\" stroke=\"#10b981\" stroke-width=\"2.5\"/>\n  <circle cx=\"260\" cy=\"140\" r=\"3\" fill=\"#10b981\"/>\n  <text x=\"250\" y=\"152\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">D</text>\n  <circle cx=\"370\" cy=\"140\" r=\"3\" fill=\"#10b981\"/>\n  <text x=\"378\" y=\"152\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">E</text>\n  <circle cx=\"340\" cy=\"50\" r=\"3\" fill=\"#10b981\"/>\n  <text x=\"340\" y=\"40\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">F</text>\n  <!-- Congruence ticks on T2 -->\n  <line x1=\"312\" y1=\"135\" x2=\"312\" y2=\"145\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <line x1=\"296\" y1=\"91\" x2=\"304\" y2=\"99\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <line x1=\"299\" y1=\"87\" x2=\"307\" y2=\"95\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <path d=\"M 278 140 A 18 18 0 0 0 272 127\" fill=\"none\" stroke=\"#f59e0b\" stroke-width=\"2\"/>\n\n  <!-- Centered Result text -->\n  <text x=\"210\" y=\"95\" fill=\"#0284c7\" font-size=\"22\" font-weight=\"bold\" text-anchor=\"middle\">\u2245</text>\n  <text x=\"210\" y=\"115\" fill=\"#64748b\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">via SAS</text>\n  <text x=\"210\" y=\"172\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">\u0394ABC \u2245 \u0394DEF \u27f9 CPCTC holds for all sides &amp; angles</text>\n</svg>",
        "diagramLabel": "Triangle congruence diagram demonstrating Side-Angle-Side (SAS) criteria",
        "diagramCaption": "Deductive geometric proof: Two sides and the included angle (SAS) establish complete triangle congruence (\u0394ABC \u2245 \u0394DEF), enabling CPCTC.",
        "references": [
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSG.CO.B.8",
                "desc": "Explain how the criteria for triangle congruence (ASA, SAS, and SSS) follow from the definition of congruence in terms of rigid motions.",
                "url": "/pages/standards.php?domain=HSG-CO",
                "icon": "fas fa-award"
            },
            {
                "title": "GeoGebra Two-Column Proof Simulator",
                "desc": "Interactive deduction steps with live validation of postulates and theorems.",
                "url": "https://www.geogebra.org/m/eFsmMv3e",
                "icon": "fas fa-balance-scale"
            },
            {
                "title": "Euclid's Elements (Online Interactive Edition by D. Joyce)",
                "desc": "The complete classical 13 books of Euclidean geometric propositions and proofs.",
                "url": "https://mathcs.clarku.edu/~djoyce/java/elements/elements.html",
                "icon": "fas fa-scroll"
            }
        ]
    },
    "Limits and Continuity": {
        "category": "Calculus",
        "definition": "The limit of a function is the value that $f(x)$ approaches as the input $x$ approaches a target value $c$: $\\lim_{x \\to c} f(x) = L$. Limits form the foundational bedrock for both differential and integral calculus. A function $f(x)$ is defined as continuous at a point $x = c$ if and only if three conditions are satisfied: (1) $f(c)$ exists, (2) $\\lim_{x \\to c} f(x)$ exists (meaning left- and right-hand limits coincide), and (3) $\\lim_{x \\to c} f(x) = f(c)$. Indeterminate forms such as $\\frac{0}{0}$ or $\\frac{\\infty}{\\infty}$ are resolved using algebraic simplification, factoring, rationalization, or L'H\u00f4pital's Rule.",
        "basicDefinition": "A limit describes what value a function is heading toward as you get closer and closer to a certain point. A function is continuous if you can draw its graph without lifting your pencil from the paper (no jumps, holes, or asymptotes).",
        "breakdown": [
            {
                "label": "One-Sided vs. Two-Sided Limits",
                "text": "For $\\lim_{x \\to c} f(x) = L$ to exist, the left-hand limit $\\lim_{x \\to c^-} f(x)$ and right-hand limit $\\lim_{x \\to c^+} f(x)$ must both equal $L$."
            },
            {
                "label": "Three Continuity Tests",
                "text": "1. $f(c)$ is defined. 2. $\\lim_{x \\to c} f(x)$ exists. 3. $\\lim_{x \\to c} f(x) = f(c)$."
            },
            {
                "label": "Resolving Indeterminate Forms",
                "text": "When direct substitution yields $\\frac{0}{0}$, eliminate the zero factor via factoring, multiplying by the conjugate, or L'H\u00f4pital's Rule."
            }
        ],
        "example": "<strong>Evaluate the limit:</strong> $\\lim_{x \\to 3} \\frac{x^2 - 9}{x - 3}$<br><br>Direct substitution gives $\\frac{0}{0}$ (indeterminate).<br>Factor the numerator: $x^2 - 9 = (x - 3)(x + 3)$.<br>Cancel $(x - 3)$ for $x \\neq 3$:<br>$$\\lim_{x \\to 3} (x + 3) = 3 + 3 = 6$$",
        "basicExample": "If $f(x) = 2x + 1$, as $x$ gets closer and closer to $4$, $f(x)$ gets closer to $2(4) + 1 = 9$. The limit is $9$.",
        "proTip": "Getting $\\frac{0}{0}$ upon direct substitution does not mean the limit doesn't exist or is 0. It is an indeterminate form that signals you must factor, rationalize, or apply L'H\u00f4pital's Rule to reveal the true limit.",
        "question": "What is the value of $\\lim_{x \\to 0} \\frac{\\sin(x)}{x}$?",
        "choices": [
            "$1$",
            "$0$",
            "Undefined",
            "$\\infty$"
        ],
        "correctIndex": 0,
        "explanation": "$\\lim_{x \\to 0} \\frac{\\sin(x)}{x} = 1$ is a fundamental trigonometric limit derived geometrically via the Squeeze Theorem.",
        "equations": [
            {
                "title": "Formal (\u03b5-\u03b4) Definition of Limit",
                "latex": "\\lim_{x \\to c} f(x) = L \\iff \\forall \\varepsilon > 0, \\exists \\delta > 0 \\text{ s.t. } 0 < |x - c| < \\delta \\implies |f(x) - L| < \\varepsilon",
                "note": "Weierstrass formal definition: $f(x)$ can be made arbitrarily close to $L$ by keeping $x$ sufficiently close to $c$."
            },
            {
                "title": "Three Continuity Criteria",
                "latex": "f(x) \\text{ is continuous at } x = c \\iff \\begin{cases} 1. \\; f(c) \\text{ is defined} \\\\ 2. \\; \\lim_{x \\to c} f(x) \\text{ exists} \\\\ 3. \\; \\lim_{x \\to c} f(x) = f(c) \\end{cases}",
                "note": "A function is continuous over interval $[a, b]$ if it passes this test at every point within the interval."
            },
            {
                "title": "L'H\u00f4pital's Rule for Indeterminate Forms",
                "latex": "\\text{If } \\lim_{x \\to c} \\frac{f(x)}{g(x)} = \\frac{0}{0} \\text{ or } \\frac{\\pm\\infty}{\\pm\\infty}, \\quad \\lim_{x \\to c} \\frac{f(x)}{g(x)} = \\lim_{x \\to c} \\frac{f'(x)}{g'(x)}",
                "note": "Differentiate numerator and denominator separately until the indeterminate form is resolved."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 210\" width=\"100%\" height=\"210\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Removable discontinuity and limit convergence diagram\">\n  <defs>\n    <pattern id=\"limgrid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#limgrid)\" rx=\"8\"/>\n  <line x1=\"20\" y1=\"170\" x2=\"440\" y2=\"170\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"120\" y1=\"20\" x2=\"120\" y2=\"195\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <text x=\"435\" y=\"162\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">x</text>\n  <text x=\"130\" y=\"32\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">y</text>\n  <!-- Curve f(x) = (x^2 - 9)/(x - 3) = x + 3. Origin (120, 170). Scale: 20px per unit -->\n  <!-- Target c = 3 (180), L = 6 (50) -->\n  <line x1=\"40\" y1=\"190\" x2=\"173\" y2=\"57\" stroke=\"#0284c7\" stroke-width=\"3.5\" stroke-linecap=\"round\"/>\n  <line x1=\"187\" y1=\"43\" x2=\"260\" y2=\"-30\" stroke=\"#0284c7\" stroke-width=\"3.5\" stroke-linecap=\"round\"/>\n  <!-- Removable Hole at (3, 6) -> SVG (180, 50) -->\n  <circle cx=\"180\" cy=\"50\" r=\"6\" fill=\"#ffffff\" stroke=\"#ef4444\" stroke-width=\"2.5\"/>\n  <text x=\"195\" y=\"48\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\">Hole at (3, 6)</text>\n  <!-- Limit arrows converging to x = 3 -->\n  <line x1=\"130\" y1=\"180\" x2=\"170\" y2=\"180\" stroke=\"#10b981\" stroke-width=\"2.5\" marker-end=\"url(#arrow)\"/>\n  <text x=\"135\" y=\"196\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\">x \u2192 3\u207b</text>\n  <line x1=\"230\" y1=\"180\" x2=\"190\" y2=\"180\" stroke=\"#10b981\" stroke-width=\"2.5\"/>\n  <text x=\"205\" y=\"196\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\">x \u2192 3\u207a</text>\n  <!-- Dashed lines to target L=6 and c=3 -->\n  <line x1=\"180\" y1=\"56\" x2=\"180\" y2=\"170\" stroke=\"#94a3b8\" stroke-dasharray=\"3,3\"/>\n  <line x1=\"120\" y1=\"50\" x2=\"174\" y2=\"50\" stroke=\"#94a3b8\" stroke-dasharray=\"3,3\"/>\n  <text x=\"105\" y=\"54\" fill=\"#64748b\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"end\">L = 6</text>\n  <text x=\"180\" y=\"162\" fill=\"#64748b\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">c = 3</text>\n  <!-- Banner -->\n  <rect x=\"270\" y=\"80\" width=\"170\" height=\"52\" rx=\"6\" fill=\"#0284c7\" opacity=\"0.1\"/>\n  <text x=\"355\" y=\"100\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">lim(x\u21923) (x\u00b2-9)/(x-3) = 6</text>\n  <text x=\"355\" y=\"118\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">Left &amp; Right limits equal 6</text>\n</svg>",
        "diagramLabel": "Calculus limit diagram illustrating removable hole and convergence to L = 6",
        "diagramCaption": "Limit concept: While f(3) is undefined (hole at x = 3), both left- and right-hand limits converge symmetrically to L = 6.",
        "references": [
            {
                "title": "Desmos Interactive Epsilon-Delta Limit Explorer",
                "desc": "Visually adjust \u03b5 and \u03b4 tolerances around function targets to prove continuity.",
                "url": "https://www.desmos.com/calculator/xvh0fefy8d",
                "icon": "fas fa-chart-line"
            },
            {
                "title": "MIT OpenCourseWare: Single Variable Calculus - Limits",
                "desc": "Foundational lectures by Prof. David Jerison on limit laws and continuity.",
                "url": "https://ocw.mit.edu/courses/18-01sc-single-variable-calculus-fall-2010/",
                "icon": "fas fa-university"
            },
            {
                "title": "Hesten's Learning Library: Calculus Concepts & Techniques",
                "desc": "Free textbook modules covering limits, trigonometric limits, and L'H\u00f4pital's rule.",
                "url": "/library/index.php?q=calculus",
                "icon": "fas fa-book"
            }
        ]
    },
    "Differentiation": {
        "category": "Calculus",
        "definition": "Differentiation is the mathematical operation of calculating the derivative of a function. The derivative $f'(x) = \\frac{df}{dx} = \\lim_{h \\to 0} \\frac{f(x + h) - f(x)}{h}$ represents the instantaneous rate of change of $f(x)$ with respect to $x$, geometrically representing the slope of the tangent line to the curve at any point. Essential rules include the Power Rule ($\\frac{d}{dx} x^n = n x^{n-1}$), Product Rule ($(uv)' = u'v + uv'$), Quotient Rule ($(\\frac{u}{v})' = \\frac{u'v - uv'}{v^2}$), and Chain Rule ($\\frac{d}{dx}[f(g(x))] = f'(g(x)) \\cdot g'(x)$).",
        "basicDefinition": "Differentiation finds the derivative, which tells you how fast something is changing at an exact moment (like a speedometer showing your exact speed right now). It is also the slope of the curve at that point.",
        "breakdown": [
            {
                "label": "The Power Rule",
                "text": "For any real exponent $n$: $\\frac{d}{dx}[x^n] = n x^{n-1}$. Example: $\\frac{d}{dx}[x^4] = 4x^3$."
            },
            {
                "label": "Product & Quotient Rules",
                "text": "Product: $(uv)' = u'v + uv'$. Quotient: $\\frac{d}{dx}\\left[\\frac{u}{v}\\right] = \\frac{v u' - u v'}{v^2}$ (Low d-High minus High d-Low over Low squared)."
            },
            {
                "label": "The Chain Rule",
                "text": "For composite functions: take the derivative of the outer function leaving inside intact, then multiply by derivative of inside: $\\frac{d}{dx} f(g(x)) = f'(g(x))g'(x)$."
            }
        ],
        "example": "<strong>Find the derivative of $f(x) = (3x^2 + 5)^4$:</strong><br><br>Let outer function be $u^4$ and inner function be $u = 3x^2 + 5$.<br>By the Chain Rule:<br>$$f'(x) = 4(3x^2 + 5)^3 \\cdot \\frac{d}{dx}[3x^2 + 5] = 4(3x^2 + 5)^3 \\cdot (6x) = 24x(3x^2 + 5)^3$$",
        "basicExample": "To take the derivative of $x^3$, bring the 3 to the front and subtract 1 from the power: $3x^2$. For $5x^2$, it becomes $5 \\times 2x^1 = 10x$.",
        "proTip": "Always remember the Chain Rule when differentiating composite expressions! For instance, $\\frac{d}{dx}[\\sin(5x)] = 5\\cos(5x)$, not just $\\cos(5x)$. Always multiply by the derivative of the inner function.",
        "question": "What is the derivative of $f(x) = 5x^3 - 4x^2 + 7x - 9$?",
        "choices": [
            "$f'(x) = 15x^2 - 8x + 7$",
            "$f'(x) = 15x^3 - 8x^2 + 7x$",
            "$f'(x) = 5x^2 - 4x + 7$",
            "$f'(x) = 15x^2 - 8x$"
        ],
        "correctIndex": 0,
        "explanation": "Applying the power rule term by term: $\\frac{d}{dx}(5x^3) = 15x^2$, $\\frac{d}{dx}(-4x^2) = -8x$, $\\frac{d}{dx}(7x) = 7$, and the derivative of constant $-9$ is $0$.",
        "equations": [
            {
                "title": "Difference Quotient (Definition of Derivative)",
                "latex": "f'(x) = \\frac{df}{dx} = \\lim_{h \\to 0} \\frac{f(x + h) - f(x)}{h}",
                "note": "Represents the instantaneous rate of change and the exact slope of the tangent line."
            },
            {
                "title": "Core Differentiation Rules",
                "latex": "\\frac{d}{dx} x^n = n x^{n-1}, \\quad (uv)' = u'v + uv', \\quad \\left(\\frac{u}{v}\\right)' = \\frac{u'v - uv'}{v^2}",
                "note": "Power rule, product rule, and quotient rule for polynomial and rational functions."
            },
            {
                "title": "The Chain Rule",
                "latex": "\\frac{d}{dx} [f(g(x))] = f'(g(x)) \\cdot g'(x) \\quad \\text{or} \\quad \\frac{dy}{dx} = \\frac{dy}{du} \\cdot \\frac{du}{dx}",
                "note": "Differentiate outer function holding inner constant, multiplied by derivative of inner."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 210\" width=\"100%\" height=\"210\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Derivative tangent line to curve diagram\">\n  <defs>\n    <pattern id=\"diffgrid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#diffgrid)\" rx=\"8\"/>\n  <line x1=\"20\" y1=\"180\" x2=\"440\" y2=\"180\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"80\" y1=\"20\" x2=\"80\" y2=\"195\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <!-- Smooth cubic curve f(x) -->\n  <path d=\"M 90 170 C 140 160, 180 120, 240 90 C 300 60, 360 40, 420 30\" fill=\"none\" stroke=\"#0284c7\" stroke-width=\"3.5\" stroke-linecap=\"round\"/>\n  <text x=\"425\" y=\"40\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\">y = f(x)</text>\n  <!-- Tangent point at (240, 90) -->\n  <circle cx=\"240\" cy=\"90\" r=\"6\" fill=\"#ef4444\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <text x=\"240\" y=\"75\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Point (x, f(x))</text>\n  <!-- Tangent Line through (240, 90) with slope -0.5 -->\n  <line x1=\"120\" y1=\"150\" x2=\"360\" y2=\"30\" stroke=\"#ef4444\" stroke-width=\"2.5\" stroke-linecap=\"round\"/>\n  <text x=\"365\" y=\"28\" fill=\"#ef4444\" font-size=\"11\" font-weight=\"bold\">Tangent: slope = f'(x)</text>\n  <!-- Secant line showing h -> 0 -->\n  <line x1=\"170\" y1=\"130\" x2=\"310\" y2=\"50\" stroke=\"#10b981\" stroke-width=\"1.5\" stroke-dasharray=\"4,4\"/>\n  <text x=\"175\" y=\"145\" fill=\"#10b981\" font-size=\"10\">Secant line \u0394y / \u0394x</text>\n  <!-- Banner -->\n  <rect x=\"250\" y=\"130\" width=\"190\" height=\"50\" rx=\"6\" fill=\"#f8fafc\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n  <text x=\"345\" y=\"150\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Instantaneous Rate of Change</text>\n  <text x=\"345\" y=\"168\" fill=\"#64748b\" font-size=\"11\" text-anchor=\"middle\">f'(x) = lim(h\u21920) [f(x+h)-f(x)]/h</text>\n</svg>",
        "diagramLabel": "Derivative diagram illustrating tangent line slope vs secant convergence",
        "diagramCaption": "The geometric derivative: As \u0394x (or h) shrinks to 0, secant lines rotate into the instantaneous tangent line with slope m = f'(x).",
        "references": [
            {
                "title": "GeoGebra Tangent & Secant Line Animation",
                "desc": "Drag point h to watch the secant line smoothly transform into the derivative tangent line.",
                "url": "https://www.geogebra.org/m/J5p2W75w",
                "icon": "fas fa-play"
            },
            {
                "title": "Wolfram Alpha Derivative Calculator",
                "desc": "Step-by-step differentiation engine with power, product, and chain rule expansion.",
                "url": "https://www.wolframalpha.com/calculators/derivative-calculator",
                "icon": "fas fa-calculator"
            },
            {
                "title": "Khan Academy: Differential Calculus",
                "desc": "Structured lessons on curve sketching, concavity, and derivatives of transcendentals.",
                "url": "https://www.khanacademy.org/math/differential-calculus",
                "icon": "fas fa-graduation-cap"
            }
        ]
    },
    "Integration": {
        "category": "Calculus",
        "definition": "Integration is the continuous analog of summation, serving as the inverse operation to differentiation (formalized by the Fundamental Theorem of Calculus). An indefinite integral $\\int f(x)\\,dx = F(x) + C$ yields the general antiderivative family where $F'(x) = f(x)$ and $C$ represents the constant of integration. A definite integral $\\int_a^b f(x)\\,dx = F(b) - F(a)$ calculates the net signed area bounded between the curve $y = f(x)$, the $x$-axis, and the vertical lines $x = a$ and $x = b$. Essential techniques include $u$-substitution, Integration by Parts ($\\int u\\,dv = uv - \\int v\\,du$), and partial fraction decomposition.",
        "basicDefinition": "Integration is the opposite of differentiation. It adds up tiny slices to find the total area under a curve. When you do an indefinite integral, always add '$+ C$' to include any missing constant.",
        "breakdown": [
            {
                "label": "Fundamental Theorem of Calculus",
                "text": "Connects derivatives and integrals: $\\int_a^b f(x)\\,dx = F(b) - F(a)$, where $F'(x) = f(x)$."
            },
            {
                "label": "The Power Rule for Integrals",
                "text": "$$\\int x^n\\,dx = \\frac{x^{n+1}}{n + 1} + C \\quad (n \\neq -1)$$ For $n = -1$, $\\int \\frac{1}{x}\\,dx = \\ln|x| + C$."
            },
            {
                "label": "$u$-Substitution",
                "text": "The integral version of the Chain Rule: substitute $u = g(x)$ and $du = g'(x)dx$ to convert complex integrals into standard forms."
            }
        ],
        "example": "<strong>Evaluate the definite integral:</strong> $\\int_1^3 (3x^2 + 2x)\\,dx$<br><br>Find the antiderivative:<br>$$F(x) = x^3 + x^2$$<br>Evaluate from $1$ to $3$:<br>$$F(3) - F(1) = (3^3 + 3^2) - (1^3 + 1^2) = (27 + 9) - (1 + 1) = 36 - 2 = 34$$",
        "basicExample": "The antiderivative of $2x$ is $x^2 + C$, because the derivative of $x^2$ is $2x$.",
        "proTip": "Never forget the constant of integration '$+ C$' on indefinite integrals! Without $+ C$, you specify only a single function instead of the entire infinite family of parallel antiderivatives.",
        "question": "What is $\\int (6x^2 - 4x + 3)\\,dx$?",
        "choices": [
            "$2x^3 - 2x^2 + 3x + C$",
            "$12x - 4 + C$",
            "$3x^3 - 4x^2 + 3x + C$",
            "$2x^3 - 4x^2 + 3x + C$"
        ],
        "correctIndex": 0,
        "explanation": "Integrating term-by-term: $\\int 6x^2\\,dx = \\frac{6x^3}{3} = 2x^3$; $\\int -4x\\,dx = -\\frac{4x^2}{2} = -2x^2$; $\\int 3\\,dx = 3x$. Adding $+ C$ yields $2x^3 - 2x^2 + 3x + C$.",
        "equations": [
            {
                "title": "Fundamental Theorem of Calculus (FTC)",
                "latex": "\\frac{d}{dx} \\left[ \\int_a^x f(t)\\,dt \\right] = f(x) \\quad \\text{and} \\quad \\int_a^b f(x)\\,dx = F(b) - F(a) \\; (F' = f)",
                "note": "Connects derivatives and integrals as exact mathematical inverse operations."
            },
            {
                "title": "Integration by Parts Formula",
                "latex": "\\int u\\,dv = uv - \\int v\\,du",
                "note": "Derived from the product rule of differentiation; used to integrate products of polynomials and transcendentals."
            },
            {
                "title": "Integration by Substitution (u-sub)",
                "latex": "\\int f(g(x)) g'(x)\\,dx = \\int f(u)\\,du \\quad (u = g(x), \\; du = g'(x)dx)",
                "note": "The inverse of the Chain Rule; transforms difficult composite integrals into elementary antiderivatives."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 210\" width=\"100%\" height=\"210\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Definite integral Riemann sum area under curve diagram\">\n  <defs>\n    <pattern id=\"intgrid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#intgrid)\" rx=\"8\"/>\n  <line x1=\"20\" y1=\"170\" x2=\"440\" y2=\"170\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"70\" y1=\"20\" x2=\"70\" y2=\"190\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <text x=\"435\" y=\"162\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">x</text>\n  <text x=\"80\" y=\"32\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">y</text>\n  <!-- Riemann Rectangles from a=130 to b=330 -->\n  <!-- Interval [130, 330], 5 slices of width 40px -->\n  <rect x=\"130\" y=\"130\" width=\"40\" height=\"40\" fill=\"#38bdf8\" fill-opacity=\"0.35\" stroke=\"#0284c7\" stroke-width=\"1.5\"/>\n  <rect x=\"170\" y=\"105\" width=\"40\" height=\"65\" fill=\"#38bdf8\" fill-opacity=\"0.35\" stroke=\"#0284c7\" stroke-width=\"1.5\"/>\n  <rect x=\"210\" y=\"80\" width=\"40\" height=\"90\" fill=\"#38bdf8\" fill-opacity=\"0.35\" stroke=\"#0284c7\" stroke-width=\"1.5\"/>\n  <rect x=\"250\" y=\"60\" width=\"40\" height=\"110\" fill=\"#38bdf8\" fill-opacity=\"0.35\" stroke=\"#0284c7\" stroke-width=\"1.5\"/>\n  <rect x=\"290\" y=\"45\" width=\"40\" height=\"125\" fill=\"#38bdf8\" fill-opacity=\"0.35\" stroke=\"#0284c7\" stroke-width=\"1.5\"/>\n  <!-- Continuous Curve y = f(x) -->\n  <path d=\"M 90 155 Q 210 90, 370 30\" fill=\"none\" stroke=\"#0369a1\" stroke-width=\"3\"/>\n  <text x=\"375\" y=\"32\" fill=\"#0369a1\" font-size=\"12\" font-weight=\"bold\">y = f(x)</text>\n  <!-- Bound a and b lines -->\n  <line x1=\"130\" y1=\"170\" x2=\"130\" y2=\"185\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <text x=\"130\" y=\"200\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">a</text>\n  <line x1=\"330\" y1=\"170\" x2=\"330\" y2=\"185\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <text x=\"330\" y=\"200\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">b</text>\n  <!-- Area label -->\n  <text x=\"230\" y=\"125\" fill=\"#0369a1\" font-size=\"14\" font-weight=\"bold\" text-anchor=\"middle\">Area = \u222b\u2090\u1d47 f(x) dx</text>\n</svg>",
        "diagramLabel": "Riemann sum definite integral area under curve diagram",
        "diagramCaption": "Definite integration as the limit of Riemann sums: Accumulating infinitesimal vertical slices dx yields exact enclosed area F(b) - F(a).",
        "references": [
            {
                "title": "Desmos Riemann Sum Simulation",
                "desc": "Increase rectangle count n from 5 to 500 to observe convergence to the definite integral.",
                "url": "https://www.desmos.com/calculator/cjhakk8hi8",
                "icon": "fas fa-chart-bar"
            },
            {
                "title": "Paul's Online Math Notes: Calculus I Integrals",
                "desc": "Authoritative college study notes covering FTC, substitution, and area between curves.",
                "url": "https://tutorial.math.lamar.edu/classes/calci/integralsintro.aspx",
                "icon": "fas fa-book-open"
            },
            {
                "title": "GeoGebra Definite Integral Visualizer",
                "desc": "Shade and compute net signed area under arbitrary polynomials dynamically.",
                "url": "https://www.geogebra.org/m/G58Hw2f2",
                "icon": "fas fa-draw-polygon"
            }
        ]
    },
    "Applications of Calculus": {
        "category": "Calculus",
        "definition": "Calculus powers rigorous models of dynamic physical, biological, and economic phenomena. Primary applications include Optimization (finding local/global maxima and minima where $f'(x) = 0$ and testing concavity via $f''(x)$), Related Rates (computing rates of change connected via geometric equations using implicit differentiation with respect to time $t$), Kinematics (position $s(t)$, velocity $v(t) = s'(t)$, acceleration $a(t) = v'(t) = s''(t)$), and Solids of Revolution (computing volumes via the Disk, Washer, and Cylindrical Shell methods: $V = \\pi \\int [R(x)]^2\\,dx$).",
        "basicDefinition": "Calculus is used to solve real-world problems like finding the maximum profit for a business, calculating the speed and acceleration of a rocket, or finding the volume of curved 3D shapes.",
        "breakdown": [
            {
                "label": "Optimization & Critical Points",
                "text": "Set $f'(x) = 0$ to find critical points. Use First/Second Derivative Tests to confirm local maximum or minimum."
            },
            {
                "label": "Kinematics Hierarchy",
                "text": "Position $s(t) \\xrightarrow{d/dt}$ Velocity $v(t) \\xrightarrow{d/dt}$ Acceleration $a(t)$. Reversing direction occurs when $v(t) = 0$."
            },
            {
                "label": "Solids of Revolution",
                "text": "Disk Method: $V = \\pi \\int_a^b [f(x)]^2\\,dx$. Washer Method for hollow shapes: $V = \\pi \\int_a^b (R^2 - r^2)\\,dx$."
            }
        ],
        "example": "<strong>Maximize the area of a rectangular enclosure with $100$ meters of fencing:</strong><br><br>Perimeter: $2x + 2y = 100 \\implies y = 50 - x$.<br>Area: $A(x) = x(50 - x) = 50x - x^2$.<br>Derivative: $A'(x) = 50 - 2x = 0 \\implies x = 25$ m.<br>Since $A''(x) = -2 < 0$, it is a maximum. Dimensions are $25\\text{ m} \\times 25\\text{ m}$, with maximum area $625\\text{ m}^2$ (a square).",
        "basicExample": "If an object's position is $s(t) = 5t^2$, its speed at time $t$ is the derivative $v(t) = 10t$. At $t = 3$ seconds, its speed is $30$ meters per second.",
        "proTip": "In optimization problems on closed intervals $[a, b]$, always check both the interior critical points where $f'(x) = 0$ AND the endpoints $x = a, x = b$ to find the absolute extreme values.",
        "question": "An object moves along a line with position $s(t) = t^3 - 6t^2 + 9t$. At what times is the object momentarily at rest ($v(t) = 0$)?",
        "choices": [
            "$t = 1$ and $t = 3$",
            "$t = 0$ and $t = 2$",
            "$t = 3$ only",
            "$t = 2$ and $t = 4$"
        ],
        "correctIndex": 0,
        "explanation": "Velocity is the derivative of position: $v(t) = s'(t) = 3t^2 - 12t + 9$. Setting $v(t) = 0 \\implies 3(t^2 - 4t + 3) = 0 \\implies 3(t - 1)(t - 3) = 0$. Thus, $t = 1$ and $t = 3$.",
        "equations": [
            {
                "title": "First & Second Derivative Optimization",
                "latex": "f'(c) = 0 \\implies \\text{Critical Point}; \\quad \\begin{cases} f''(c) < 0 \\implies \\text{Local Maximum} \\\\ f''(c) > 0 \\implies \\text{Local Minimum} \\end{cases}",
                "note": "Concavity and inflection points occur where the second derivative changes sign ($f''(x) = 0$)."
            },
            {
                "title": "Kinematic Motion Hierarchy",
                "latex": "v(t) = \\frac{ds}{dt} = s'(t) \\quad \\text{and} \\quad a(t) = \\frac{dv}{dt} = \\frac{d^2s}{dt^2} = s''(t)",
                "note": "Position $s(t)$, velocity $v(t)$, and acceleration $a(t)$. Speed is the scalar magnitude $|v(t)|$."
            },
            {
                "title": "Solids of Revolution (Disk & Washer)",
                "latex": "V_{\\text{disk}} = \\pi \\int_a^b [f(x)]^2\\,dx, \\quad V_{\\text{washer}} = \\pi \\int_a^b \\left( [R(x)]^2 - [r(x)]^2 \\right)\\,dx",
                "note": "Computes volume generated by revolving a 2D boundary curve around a coordinate axis."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 210\" width=\"100%\" height=\"210\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Optimization curve showing local maximum, minimum, and inflection point\">\n  <defs>\n    <pattern id=\"optgrid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#optgrid)\" rx=\"8\"/>\n  <line x1=\"20\" y1=\"170\" x2=\"440\" y2=\"170\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"60\" y1=\"20\" x2=\"60\" y2=\"190\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <!-- Cubic curve with clear local max and local min -->\n  <path d=\"M 70 160 C 120 40, 160 40, 210 100 C 260 160, 300 160, 380 40\" fill=\"none\" stroke=\"#0284c7\" stroke-width=\"3.5\" stroke-linecap=\"round\"/>\n  <!-- Local Max at (140, 48) -->\n  <circle cx=\"140\" cy=\"48\" r=\"6\" fill=\"#ef4444\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <line x1=\"105\" y1=\"48\" x2=\"175\" y2=\"48\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <text x=\"140\" y=\"32\" fill=\"#ef4444\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Local Max: f'(x) = 0, f'' &lt; 0</text>\n  <!-- Inflection Point at (210, 100) -->\n  <circle cx=\"210\" cy=\"100\" r=\"5\" fill=\"#f59e0b\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <text x=\"225\" y=\"104\" fill=\"#f59e0b\" font-size=\"11\" font-weight=\"bold\">Inflection: f''(x) = 0</text>\n  <!-- Local Min at (280, 152) -->\n  <circle cx=\"280\" cy=\"152\" r=\"6\" fill=\"#10b981\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <line x1=\"245\" y1=\"152\" x2=\"315\" y2=\"152\" stroke=\"#10b981\" stroke-width=\"2\"/>\n  <text x=\"280\" y=\"172\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Local Min: f'(x) = 0, f'' &gt; 0</text>\n</svg>",
        "diagramLabel": "Calculus optimization curve with horizontal tangents at local extrema",
        "diagramCaption": "Optimization analysis: Critical points occur where tangent slope is horizontal (f'(x) = 0); the second derivative determines concavity.",
        "references": [
            {
                "title": "GeoGebra Calculus Solid of Revolution Simulator",
                "desc": "3D interactive revolution of arbitrary curves around x and y axes.",
                "url": "https://www.geogebra.org/m/mhygzcda",
                "icon": "fas fa-cube"
            },
            {
                "title": "Khan Academy: Optimization Applications",
                "desc": "Real-world problems modeling maximize box volume, revenue, and shortest paths.",
                "url": "https://www.khanacademy.org/math/ap-calculus-ab/ab-diff-analytical-applications-new/ab-5-11/v/optimizing-box-volume-analytics",
                "icon": "fas fa-graduation-cap"
            },
            {
                "title": "MIT OCW: Related Rates & Kinematics",
                "desc": "Rigorous derivation of multivariable rates of change over time.",
                "url": "https://ocw.mit.edu/courses/18-01sc-single-variable-calculus-fall-2010/pages/unit-2-applications-of-differentiation/",
                "icon": "fas fa-university"
            }
        ]
    },
    "Descriptive Statistics": {
        "category": "Statistics",
        "definition": "Descriptive statistics summarizes and describes the quantitative features of a dataset through numerical calculations and graphical representations. Measures of Central Tendency quantify the center or typical value: Mean (arithmetic average $\\bar{x} = \\frac{\\sum x}{n}$), Median (the middle observation when sorted), and Mode (most frequent observation). Measures of Dispersion quantify variability and spread: Range (Max $-$ Min), Interquartile Range ($IQR = Q_3 - Q_1$, resistant to outliers), Variance ($s^2 = \\frac{\\sum (x - \\bar{x})^2}{n - 1}$), and Standard Deviation ($s = \\sqrt{s^2}$).",
        "basicDefinition": "Descriptive statistics helps you make sense of large amounts of data. The mean is the average, the median is the middle score, the mode is the most common number, and the standard deviation tells you how spread out numbers are from the center.",
        "breakdown": [
            {
                "label": "Measures of Center",
                "text": "Mean: $\\frac{\\sum x}{n}$ (sensitive to extreme outliers). Median: middle value when ordered (resistant to skew). Mode: most frequent value."
            },
            {
                "label": "Measures of Spread",
                "text": "Standard Deviation ($s$) measures average distance from mean. Variance is $s^2$. IQR ($Q_3 - Q_1$) measures spread of the middle 50%."
            },
            {
                "label": "Outlier Detection (1.5 IQR Rule)",
                "text": "Any point below $Q_1 - 1.5 \\cdot IQR$ or above $Q_3 + 1.5 \\cdot IQR$ is classified as a statistical outlier."
            }
        ],
        "example": "<strong>Dataset:</strong> $3, 5, 7, 8, 12$<br><br>1. Mean: $\\bar{x} = \\frac{3 + 5 + 7 + 8 + 12}{5} = \\frac{35}{5} = 7$<br>2. Median: Middle value is $7$<br>3. Variance: $s^2 = \\frac{(3-7)^2 + (5-7)^2 + (7-7)^2 + (8-7)^2 + (12-7)^2}{5 - 1} = \\frac{16 + 4 + 0 + 1 + 25}{4} = \\frac{46}{4} = 11.5$<br>4. Standard Deviation: $s = \\sqrt{11.5} \\approx 3.39$",
        "basicExample": "For test scores $80, 85, 90$: The mean is $\\frac{80+85+90}{3} = 85$. The median is the middle number, $85$. The range is $90 - 80 = 10$.",
        "proTip": "When data is heavily skewed (like household incomes or home prices), always use the Median rather than the Mean. Outliers pull the mean dramatically, giving a misleading impression of the typical value.",
        "question": "What is the median of the dataset: $[4, 18, 9, 2, 11, 7]$?",
        "choices": [
            "$8$",
            "$7$",
            "$9$",
            "$8.5$"
        ],
        "correctIndex": 0,
        "explanation": "First sort the data in ascending order: $[2, 4, 7, 9, 11, 18]$. Since there is an even number of values ($6$), the median is the average of the two middle numbers ($7$ and $9$): $\\frac{7 + 9}{2} = 8$.",
        "equations": [
            {
                "title": "Sample Mean (Arithmetic Average)",
                "latex": "\\bar{x} = \\frac{1}{n} \\sum_{i=1}^n x_i = \\frac{x_1 + x_2 + \\dots + x_n}{n}",
                "note": "The balance point of the distribution; sensitive to extreme outliers and heavy skew."
            },
            {
                "title": "Sample Variance & Standard Deviation",
                "latex": "s^2 = \\frac{1}{n - 1} \\sum_{i=1}^n (x_i - \\bar{x})^2, \\quad s = \\sqrt{s^2}",
                "note": "Bessel's correction ($n - 1$ in denominator) eliminates bias when estimating population $\\sigma$."
            },
            {
                "title": "Interquartile Range & Outlier Fences",
                "latex": "IQR = Q_3 - Q_1, \\quad \\text{Outliers} \\notin [Q_1 - 1.5 \\cdot IQR, \\; Q_3 + 1.5 \\cdot IQR]",
                "note": "Tukey's five-number summary: Min, $Q_1$, Median, $Q_3$, Max; resistant to extreme values."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 190\" width=\"100%\" height=\"190\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Box and whisker plot diagram showing five-number summary and IQR\">\n  <!-- Plot Base -->\n  <line x1=\"30\" y1=\"140\" x2=\"430\" y2=\"140\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <!-- Scale tick marks -->\n  <line x1=\"60\" y1=\"140\" x2=\"60\" y2=\"148\" stroke=\"#64748b\" stroke-width=\"1.5\"/><text x=\"60\" y=\"162\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">10</text>\n  <line x1=\"140\" y1=\"140\" x2=\"140\" y2=\"148\" stroke=\"#64748b\" stroke-width=\"1.5\"/><text x=\"140\" y=\"162\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">30</text>\n  <line x1=\"220\" y1=\"140\" x2=\"220\" y2=\"148\" stroke=\"#64748b\" stroke-width=\"1.5\"/><text x=\"220\" y=\"162\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">50</text>\n  <line x1=\"300\" y1=\"140\" x2=\"300\" y2=\"148\" stroke=\"#64748b\" stroke-width=\"1.5\"/><text x=\"300\" y=\"162\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">70</text>\n  <line x1=\"380\" y1=\"140\" x2=\"380\" y2=\"148\" stroke=\"#64748b\" stroke-width=\"1.5\"/><text x=\"380\" y=\"162\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">90</text>\n  <!-- Left Whisker from Min=60 to Q1=140 -->\n  <line x1=\"60\" y1=\"80\" x2=\"140\" y2=\"80\" stroke=\"#0284c7\" stroke-width=\"2\"/>\n  <line x1=\"60\" y1=\"65\" x2=\"60\" y2=\"95\" stroke=\"#0284c7\" stroke-width=\"2\"/>\n  <text x=\"60\" y=\"55\" fill=\"#64748b\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Min (10)</text>\n  <!-- Box: Q1=140 to Q3=300 -->\n  <rect x=\"140\" y=\"50\" width=\"160\" height=\"60\" rx=\"4\" fill=\"#38bdf8\" fill-opacity=\"0.25\" stroke=\"#0284c7\" stroke-width=\"2.5\"/>\n  <text x=\"140\" y=\"42\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Q1 (30)</text>\n  <!-- Median Line: 210 -->\n  <line x1=\"210\" y1=\"50\" x2=\"210\" y2=\"110\" stroke=\"#ef4444\" stroke-width=\"3\"/>\n  <text x=\"210\" y=\"40\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Median = 47.5</text>\n  <text x=\"300\" y=\"42\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Q3 (70)</text>\n  <!-- Right Whisker to Max=380 -->\n  <line x1=\"300\" y1=\"80\" x2=\"380\" y2=\"80\" stroke=\"#0284c7\" stroke-width=\"2\"/>\n  <line x1=\"380\" y1=\"65\" x2=\"380\" y2=\"95\" stroke=\"#0284c7\" stroke-width=\"2\"/>\n  <text x=\"380\" y=\"55\" fill=\"#64748b\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Max (90)</text>\n  <!-- IQR Indicator Bracket -->\n  <line x1=\"140\" y1=\"122\" x2=\"300\" y2=\"122\" stroke=\"#10b981\" stroke-width=\"2\"/>\n  <text x=\"220\" y=\"134\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">IQR = Q3 - Q1 = 40 (Middle 50%)</text>\n</svg>",
        "diagramLabel": "Box and whisker plot demonstrating five-number summary and IQR",
        "diagramCaption": "Five-number summary box plot: Visualizes distribution spread, median line, interquartile range (IQR), and whisker extremes.",
        "references": [
            {
                "title": "GeoGebra Box Plot & Histogram Generator",
                "desc": "Input raw data sets to instantly generate synchronized box plots and frequency distributions.",
                "url": "https://www.geogebra.org/m/eFsmMv3e",
                "icon": "fas fa-chart-bar"
            },
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSS.ID.A.2",
                "desc": "Use statistics appropriate to the shape of the data distribution to compare center and spread of two or more different data sets.",
                "url": "/pages/standards.php?domain=HSS-ID",
                "icon": "fas fa-award"
            },
            {
                "title": "Hesten's Learning Library: Introductory Statistics Guide",
                "desc": "Review comprehensive chapters on standard deviation, normal distributions, and data variance.",
                "url": "/library/index.php?q=statistics",
                "icon": "fas fa-book"
            }
        ]
    },
    "Probability Distributions": {
        "category": "Statistics",
        "definition": "A probability distribution is a mathematical function that assigns probabilities to all possible outcomes of a random variable. Discrete distributions model countable outcomes: the Binomial Distribution ($P(X = k) = \\binom{n}{k} p^k (1-p)^{n-k}$) models successes across $n$ independent trials, and the Poisson Distribution models event frequency over fixed intervals. Continuous distributions model infinite uncountably dense outcomes: the Gaussian (Normal) Distribution is defined by mean $\\mu$ and standard deviation $\\sigma$, characterized by the bell curve and the Empirical Rule ($68\\% - 95\\% - 99.7\\%$ of data within $1, 2, 3\\sigma$).",
        "basicDefinition": "A probability distribution shows all possible results of a random event and how likely each one is. The bell curve (Normal distribution) is the most famous, where most values cluster near the average and rare values trail off on both ends.",
        "breakdown": [
            {
                "label": "The Normal Distribution",
                "text": "Symmetric bell curve centered at mean $\\mu$. Total area under curve equals $1$. $z$-score transforms values to standard normal: $z = \\frac{x - \\mu}{\\sigma}$."
            },
            {
                "label": "Empirical Rule (68-95-99.7)",
                "text": "About $68\\%$ of values lie within $\\pm 1\\sigma$, $95\\%$ lie within $\\pm 2\\sigma$, and $99.7\\%$ lie within $\\pm 3\\sigma$."
            },
            {
                "label": "Binomial Distribution",
                "text": "Applies when trials ($n$) are independent, have only two outcomes (success/failure), and constant probability $p$. Mean $\\mu = np$, variance $\\sigma^2 = np(1-p)$."
            }
        ],
        "example": "<strong>Normal Distribution Problem:</strong> Heights are normally distributed with $\\mu = 170$ cm and $\\sigma = 10$ cm. What percentage of the population is taller than $190$ cm?<br><br>Compute the $z$-score:<br>$$z = \\frac{190 - 170}{10} = \\frac{20}{10} = 2.0$$<br>By the Empirical Rule, $95\\%$ fall within $\\pm 2\\sigma$. The remaining $5\\%$ is split evenly in the two tails. Taller than $+2\\sigma$: $\\frac{5\\%}{2} = 2.5\\%$ &check;",
        "basicExample": "If you flip a fair coin 10 times, the chance of getting heads each time is $0.5$. The binomial distribution helps you calculate the exact odds of getting exactly 7 heads.",
        "proTip": "A $z$-score tells you exactly how many standard deviations a data point lies above (positive) or below (negative) the mean. A $z$-score of $0$ corresponds precisely to the mean.",
        "question": "In a normal distribution with mean $\\mu = 50$ and $\\sigma = 5$, what percentage of values lie between $45$ and $55$?",
        "choices": [
            "Approximately $68\\%$",
            "Approximately $95\\%$",
            "Approximately $99.7\\%$",
            "Approximately $50\\%$"
        ],
        "correctIndex": 0,
        "explanation": "Values $45$ and $55$ represent $\\mu - 1\\sigma$ and $\\mu + 1\\sigma$. According to the Empirical Rule (68-95-99.7), approximately $68\\%$ of data lies within 1 standard deviation of the mean.",
        "equations": [
            {
                "title": "Gaussian (Normal) Distribution PDF",
                "latex": "f(x) = \\frac{1}{\\sigma \\sqrt{2\\pi}} \\exp\\left( -\\frac{1}{2} \\left( \\frac{x - \\mu}{\\sigma} \\right)^2 \\right), \\quad z = \\frac{x - \\mu}{\\sigma}",
                "note": "Bell-shaped probability density function centered at population mean $\\mu$ with standard deviation $\\sigma$."
            },
            {
                "title": "Binomial Distribution PMF",
                "latex": "P(X = k) = \\binom{n}{k} p^k (1 - p)^{n - k}, \\quad \\mu = np, \\quad \\sigma = \\sqrt{np(1-p)}",
                "note": "Discrete probability of obtaining exactly $k$ successes across $n$ independent Bernoulli trials with success probability $p$."
            },
            {
                "title": "Poisson Distribution Formula",
                "latex": "P(X = k) = \\frac{\\lambda^k e^{-\\lambda}}{k!}, \\quad \\mu = \\lambda, \\quad \\sigma^2 = \\lambda",
                "note": "Models event counts occurring at known continuous average rate $\\lambda$ independently of elapsed time."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Standard normal distribution bell curve with empirical rule bands\">\n  <defs>\n    <linearGradient id=\"bellGrad\" x1=\"0%\" y1=\"0%\" x2=\"0%\" y2=\"100%\">\n      <stop offset=\"0%\" stop-color=\"#38bdf8\" stop-opacity=\"0.5\"/>\n      <stop offset=\"100%\" stop-color=\"#38bdf8\" stop-opacity=\"0.05\"/>\n    </linearGradient>\n  </defs>\n  <!-- Axis -->\n  <line x1=\"20\" y1=\"160\" x2=\"440\" y2=\"160\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <!-- Bell Curve Path -->\n  <!-- Mean at x=230, sigma=45. -3s=95, -2s=140, -1s=185, 0=230, +1s=275, +2s=320, +3s=365 -->\n  <path d=\"M 60 160 C 130 160, 160 130, 185 85 C 205 45, 215 25, 230 25 C 245 25, 255 45, 275 85 C 300 130, 330 160, 400 160 Z\" fill=\"url(#bellGrad)\" stroke=\"#0284c7\" stroke-width=\"3\"/>\n  <!-- Standard deviation lines -->\n  <line x1=\"230\" y1=\"25\" x2=\"230\" y2=\"160\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <text x=\"230\" y=\"175\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">\u03bc</text>\n  <line x1=\"185\" y1=\"85\" x2=\"185\" y2=\"160\" stroke=\"#94a3b8\" stroke-dasharray=\"3,3\"/>\n  <text x=\"185\" y=\"175\" fill=\"#64748b\" font-size=\"11\" text-anchor=\"middle\">-1\u03c3</text>\n  <line x1=\"275\" y1=\"85\" x2=\"275\" y2=\"160\" stroke=\"#94a3b8\" stroke-dasharray=\"3,3\"/>\n  <text x=\"275\" y=\"175\" fill=\"#64748b\" font-size=\"11\" text-anchor=\"middle\">+1\u03c3</text>\n  <line x1=\"140\" y1=\"135\" x2=\"140\" y2=\"160\" stroke=\"#94a3b8\" stroke-dasharray=\"3,3\"/>\n  <text x=\"140\" y=\"175\" fill=\"#64748b\" font-size=\"11\" text-anchor=\"middle\">-2\u03c3</text>\n  <line x1=\"320\" y1=\"135\" x2=\"320\" y2=\"160\" stroke=\"#94a3b8\" stroke-dasharray=\"3,3\"/>\n  <text x=\"320\" y=\"175\" fill=\"#64748b\" font-size=\"11\" text-anchor=\"middle\">+2\u03c3</text>\n  <!-- Empirical Percentages -->\n  <text x=\"230\" y=\"85\" fill=\"#0369a1\" font-size=\"13\" font-weight=\"bold\" text-anchor=\"middle\">68.2%</text>\n  <line x1=\"185\" y1=\"92\" x2=\"275\" y2=\"92\" stroke=\"#0369a1\" stroke-width=\"1.5\"/>\n  <text x=\"230\" y=\"115\" fill=\"#0369a1\" font-size=\"11\" text-anchor=\"middle\">95.4% within \u00b12\u03c3</text>\n  <text x=\"230\" y=\"135\" fill=\"#0369a1\" font-size=\"10\" text-anchor=\"middle\">99.7% within \u00b13\u03c3</text>\n</svg>",
        "diagramLabel": "Normal distribution bell curve showing standard deviation empirical rule bands",
        "diagramCaption": "Gaussian normal distribution: The bell curve is symmetric around mean \u03bc, with 68.2% of values within 1\u03c3, 95.4% within 2\u03c3, and 99.7% within 3\u03c3.",
        "references": [
            {
                "title": "GeoGebra Normal Distribution Area Calculator",
                "desc": "Interactive shaded area probability calculator for one-tailed and two-tailed z-scores.",
                "url": "https://www.geogebra.org/m/mhygzcda",
                "icon": "fas fa-bell"
            },
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSS.ID.A.4",
                "desc": "Use the mean and standard deviation of a data set to fit it to a normal distribution and to estimate population percentages.",
                "url": "/pages/standards.php?domain=HSS-ID",
                "icon": "fas fa-award"
            },
            {
                "title": "NIST Engineering Statistics Handbook: Probability Distributions",
                "desc": "Authoritative National Institute of Standards compendium on discrete and continuous distributions.",
                "url": "https://www.itl.nist.gov/div898/handbook/eda/section3/eda366.htm",
                "icon": "fas fa-globe"
            }
        ]
    },
    "Hypothesis Testing": {
        "category": "Statistics",
        "definition": "Hypothesis testing is an inferential statistical methodology used to determine whether empirical evidence from a sample warrants rejecting a specific claim about a population parameter. The Null Hypothesis ($H_0$) represents status quo or no effect; the Alternative Hypothesis ($H_a$) represents the research claim. A test statistic ($z, t, \\chi^2$, or $F$) is calculated, yielding a $p$-value\u2014the probability of obtaining sample results as extreme as observed assuming $H_0$ is true. If $p \\leq \\alpha$ (significance level, typically $0.05$), $H_0$ is rejected in favor of $H_a$. Decision errors include Type I (false positive, rejecting true $H_0$, rate $\\alpha$) and Type II (false negative, failing to reject false $H_0$, rate $\\beta$).",
        "basicDefinition": "Hypothesis testing is how scientists prove claims using data. You assume there is no difference (the Null Hypothesis), collect data, and see if the result is so unusual (low $p$-value, usually under $0.05$) that your assumption must be wrong.",
        "breakdown": [
            {
                "label": "Null ($H_0$) vs. Alternative ($H_a$)",
                "text": "$H_0$: parameter equals benchmark value (no difference). $H_a$: parameter is $<, >$, or $\\neq$ benchmark (two-tailed vs one-tailed)."
            },
            {
                "label": "The $p$-value Decision Rule",
                "text": "'If the $p$-value is low, the null must go!' If $p \\le \\alpha$, reject $H_0$ (statistically significant). If $p > \\alpha$, fail to reject $H_0$."
            },
            {
                "label": "Type I vs. Type II Errors",
                "text": "Type I Error ($\\alpha$): Rejecting $H_0$ when it is actually true. Type II Error ($\\beta$): Failing to reject $H_0$ when it is actually false."
            }
        ],
        "example": "<strong>Testing a new lightbulb lifespan:</strong><br>Standard bulbs last $\\mu = 1000$ hours. A sample of $100$ new bulbs has $\\bar{x} = 1025$ hours ($s = 80$).<br>$H_0: \\mu = 1000$ vs. $H_a: \\mu > 1000$.<br>Standard error: $SE = \\frac{80}{\\sqrt{100}} = 8$.<br>Test statistic: $t = \\frac{1025 - 1000}{8} = \\frac{25}{8} = 3.125$.<br>Since $p < 0.001 < 0.05$, we reject $H_0$. The new bulbs last significantly longer &check;",
        "basicExample": "Think of a courtroom trial: The defendant is presumed innocent ($H_0$). The prosecutor must provide evidence beyond a reasonable doubt to reject innocence and declare guilt ($H_a$).",
        "proTip": "Never say you 'accept the null hypothesis'. The correct scientific conclusion is always 'we reject $H_0$' or 'we fail to reject $H_0$'. Failing to find sufficient evidence of an effect does not prove the effect is zero.",
        "question": "If a researcher conducts a test at $\\alpha = 0.05$ and obtains a $p$-value of $0.018$, what is the appropriate statistical conclusion?",
        "choices": [
            "Reject $H_0$ because $p < 0.05$; the result is statistically significant",
            "Fail to reject $H_0$ because $p < 0.05$",
            "Accept $H_0$ because $p$ is positive",
            "Prove $H_a$ is $100\\%$ true with zero error"
        ],
        "correctIndex": 0,
        "explanation": "Because the $p$-value ($0.018$) is less than the significance threshold $\\alpha = 0.05$, we reject the null hypothesis $H_0$ and conclude that there is statistically significant evidence for $H_a$.",
        "equations": [
            {
                "title": "One-Sample z-test & t-test Statistics",
                "latex": "z = \\frac{\\bar{x} - \\mu_0}{\\sigma / \\sqrt{n}} \\quad (\\sigma \\text{ known}), \\quad t = \\frac{\\bar{x} - \\mu_0}{s / \\sqrt{n}} \\; (df = n - 1)",
                "note": "Measures how many standard errors the sample mean $\\bar{x}$ deviates from hypothesized value $\\mu_0$."
            },
            {
                "title": "p-value Decision Rule",
                "latex": "p \\le \\alpha \\implies \\text{Reject } H_0 \\quad \\text{vs.} \\quad p > \\alpha \\implies \\text{Fail to Reject } H_0",
                "note": "$\u0007lpha$ is the significance level (typically 0.05). If $p \\le \\alpha$, the result is statistically significant."
            },
            {
                "title": "Error Matrix (Type I vs Type II)",
                "latex": "\\alpha = P(\\text{Reject } H_0 \\mid H_0 \\text{ True}), \\quad \\beta = P(\\text{Fail to Reject } H_0 \\mid H_0 \\text{ False}), \\quad \\text{Power} = 1 - \\beta",
                "note": "Type I error is a false alarm; Type II error is a missed discovery. Statistical power is $1 - \\beta$."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Hypothesis testing rejection region and p-value curve\">\n  <line x1=\"20\" y1=\"160\" x2=\"440\" y2=\"160\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <!-- Null curve centered at 200 -->\n  <path d=\"M 60 160 C 130 160, 160 120, 180 80 C 195 40, 205 30, 220 30 C 235 30, 245 40, 260 80 C 280 120, 310 160, 380 160 Z\" fill=\"#e2e8f0\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <!-- Rejection Region Shaded (alpha=0.05 right tail) -->\n  <path d=\"M 285 110 C 295 130, 315 150, 350 160 L 285 160 Z\" fill=\"#ef4444\" fill-opacity=\"0.4\" stroke=\"#ef4444\" stroke-width=\"1.5\"/>\n  <!-- Critical Value Line (z_crit = 1.645) -->\n  <line x1=\"285\" y1=\"50\" x2=\"285\" y2=\"160\" stroke=\"#ef4444\" stroke-width=\"2\" stroke-dasharray=\"3,3\"/>\n  <text x=\"285\" y=\"42\" fill=\"#ef4444\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Critical Value (z = 1.645)</text>\n  <!-- Observed Test Statistic (z = 2.45) in rejection region -->\n  <circle cx=\"320\" cy=\"160\" r=\"5\" fill=\"#10b981\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <line x1=\"320\" y1=\"80\" x2=\"320\" y2=\"160\" stroke=\"#10b981\" stroke-width=\"2\"/>\n  <text x=\"320\" y=\"74\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Test Statistic z = 2.45</text>\n  <!-- Labels -->\n  <text x=\"200\" y=\"100\" fill=\"#475569\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Fail to Reject H\u2080</text>\n  <text x=\"330\" y=\"140\" fill=\"#b91c1c\" font-size=\"10\" font-weight=\"bold\">Reject H\u2080 (p &lt; \u03b1)</text>\n  <text x=\"220\" y=\"175\" fill=\"#64748b\" font-size=\"11\" text-anchor=\"middle\">\u03bc\u2080 (Null Mean)</text>\n</svg>",
        "diagramLabel": "Hypothesis testing distribution curve illustrating critical value and rejection region",
        "diagramCaption": "Decision boundary: When the sample test statistic (green, z = 2.45) falls past the critical threshold into the red rejection zone (p < \u03b1), we reject H\u2080.",
        "references": [
            {
                "title": "OpenIntro Statistics: Hypothesis Testing Chapters",
                "desc": "Free open-source college textbook chapters on one- and two-sample inference.",
                "url": "https://www.openintro.org/book/os/",
                "icon": "fas fa-book"
            },
            {
                "title": "GeoGebra Hypothesis Test Power & Alpha Explorer",
                "desc": "Simulate Type I vs. Type II error trade-offs and statistical power curves interactively.",
                "url": "https://www.geogebra.org/m/eFsmMv3e",
                "icon": "fas fa-balance-scale"
            },
            {
                "title": "Khan Academy: Significance Tests",
                "desc": "Full problem sets on p-values, z-tests, and Student's t-distributions.",
                "url": "https://www.khanacademy.org/math/ap-statistics/xf0b43253210e4836:tests-about-a-population-mean",
                "icon": "fas fa-graduation-cap"
            }
        ]
    },
    "Regression Analysis": {
        "category": "Statistics",
        "definition": "Regression analysis is a statistical technique used to estimate the mathematical relationships between a dependent response variable ($y$) and one or more independent explanatory variables ($x$). In simple Ordinary Least Squares (OLS) linear regression, the best-fit line $\\hat{y} = b_0 + b_1 x$ minimizes the sum of squared vertical residuals (errors: $e_i = y_i - \\hat{y}_i$). The Pearson correlation coefficient $r \\in [-1, 1]$ measures the strength and direction of linear association. The coefficient of determination $R^2 = r^2$ specifies the proportion of total variance in the dependent variable explained by the regression model.",
        "basicDefinition": "Regression draws the best-fitting trendline through scattered data points so you can make predictions. The correlation number $r$ shows how tightly points hug the line, and $R^2$ shows how well the model explains the trends.",
        "breakdown": [
            {
                "label": "The Least-Squares Line",
                "text": "$\\hat{y} = b_1 x + b_0$, where slope $b_1 = r \\frac{s_y}{s_x}$ and intercept $b_0 = \\bar{y} - b_1 \\bar{x}$. The line always passes through $(\\bar{x}, \\bar{y})$."
            },
            {
                "label": "Correlation vs. Causation",
                "text": "A strong correlation ($r \\approx 1$ or $-1$) shows association, but NEVER proves that $x$ caused $y$; confounding variables may exist."
            },
            {
                "label": "Interpreting $R^2$",
                "text": "If $R^2 = 0.81$, $81\\%$ of the variation in the dependent variable $y$ is explained by the linear relationship with $x$."
            }
        ],
        "example": "<strong>Predicting exam score from study hours:</strong><br>Regression line: $\\hat{y} = 6.5x + 48$, where $x$ is study hours and $\\hat{y}$ is predicted score.<br>For a student studying $x = 6$ hours:<br>$$\\hat{y} = 6.5(6) + 48 = 39 + 48 = 87\\text{ points}$$<br>Slope interpretation: Each additional hour of studying is associated with an expected $6.5$ point increase in exam score.",
        "basicExample": "If studying more hours is linked to higher grades, there is a positive correlation ($r > 0$). You can use the trendline equation to guess a student's grade based on how many hours they study.",
        "proTip": "Beware of extrapolation! Making predictions for $x$-values far outside the range of your original observed data is risky and frequently produces nonsensical results.",
        "question": "If the correlation coefficient between study time and quiz performance is $r = 0.80$, what is the coefficient of determination $R^2$?",
        "choices": [
            "$R^2 = 0.64$ ($64\\%$ of variance explained)",
            "$R^2 = 0.80$ ($80\\%$ of variance explained)",
            "$R^2 = 0.40$ ($40\\%$ of variance explained)",
            "$R^2 = 1.60$ ($160\\%$ of variance explained)"
        ],
        "correctIndex": 0,
        "explanation": "The coefficient of determination is the square of the correlation coefficient: $R^2 = (0.80)^2 = 0.64$, meaning $64\\%$ of the variability in quiz performance is explained by study time.",
        "equations": [
            {
                "title": "Ordinary Least Squares (OLS) Line",
                "latex": "\\hat{y} = b_1 x + b_0, \\quad b_1 = r \\frac{s_y}{s_x} = \\frac{\\sum (x - \\bar{x})(y - \\bar{y})}{\\sum (x - \\bar{x})^2}, \\quad b_0 = \\bar{y} - b_1 \\bar{x}",
                "note": "Minimizes the sum of squared vertical residuals: $\\sum e_i^2 = \\sum (y_i - \\hat{y}_i)^2$."
            },
            {
                "title": "Pearson Correlation Coefficient (r)",
                "latex": "r = \\frac{\\sum (x_i - \\bar{x})(y_i - \\bar{y})}{\\sqrt{\\sum (x_i - \\bar{x})^2 \\sum (y_i - \\bar{y})^2}}, \\quad -1 \\le r \\le 1",
                "note": "Measures linear association strength; $r = 1$ is perfect positive, $r = -1$ is perfect negative, $r = 0$ is no linear link."
            },
            {
                "title": "Coefficient of Determination (R\u00b2)",
                "latex": "R^2 = r^2 = 1 - \\frac{SS_{\\text{res}}}{SS_{\\text{tot}}} = \\frac{\\sum (\\hat{y}_i - \\bar{y})^2}{\\sum (y_i - \\bar{y})^2}",
                "note": "Proportion of total variation in dependent variable $y$ explained by the linear relationship with $x$."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 210\" width=\"100%\" height=\"210\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Scatter plot and ordinary least squares regression line with residuals\">\n  <defs>\n    <pattern id=\"reggrid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#reggrid)\" rx=\"8\"/>\n  <line x1=\"30\" y1=\"180\" x2=\"430\" y2=\"180\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"60\" y1=\"20\" x2=\"60\" y2=\"195\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <text x=\"435\" y=\"175\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">x</text>\n  <text x=\"70\" y=\"30\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">y</text>\n  <!-- Regression Line: y = 0.45x + 35 -->\n  <line x1=\"70\" y1=\"160\" x2=\"410\" y2=\"40\" stroke=\"#0284c7\" stroke-width=\"3\" stroke-linecap=\"round\"/>\n  <text x=\"350\" y=\"35\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\">\u0177 = b\u2081x + b\u2080</text>\n  <!-- Scatter Points & Residual Lines -->\n  <!-- Point 1 (110, 130) line to (110, 146) -->\n  <line x1=\"110\" y1=\"130\" x2=\"110\" y2=\"146\" stroke=\"#ef4444\" stroke-width=\"1.5\" stroke-dasharray=\"3,2\"/>\n  <circle cx=\"110\" cy=\"130\" r=\"5\" fill=\"#3b82f6\" stroke=\"#ffffff\" stroke-width=\"1.5\"/>\n  <!-- Point 2 (160, 140) line to (160, 128) -->\n  <line x1=\"160\" y1=\"140\" x2=\"160\" y2=\"128\" stroke=\"#ef4444\" stroke-width=\"1.5\" stroke-dasharray=\"3,2\"/>\n  <circle cx=\"160\" cy=\"140\" r=\"5\" fill=\"#3b82f6\" stroke=\"#ffffff\" stroke-width=\"1.5\"/>\n  <!-- Point 3 (220, 95) line to (220, 107) -->\n  <line x1=\"220\" y1=\"95\" x2=\"220\" y2=\"107\" stroke=\"#ef4444\" stroke-width=\"1.5\" stroke-dasharray=\"3,2\"/>\n  <circle cx=\"220\" cy=\"95\" r=\"5\" fill=\"#3b82f6\" stroke=\"#ffffff\" stroke-width=\"1.5\"/>\n  <!-- Point 4 (280, 85) line to (280, 86) -->\n  <circle cx=\"280\" cy=\"85\" r=\"5\" fill=\"#3b82f6\" stroke=\"#ffffff\" stroke-width=\"1.5\"/>\n  <!-- Point 5 (330, 50) line to (330, 68) -->\n  <line x1=\"330\" y1=\"50\" x2=\"330\" y2=\"68\" stroke=\"#ef4444\" stroke-width=\"1.5\" stroke-dasharray=\"3,2\"/>\n  <circle cx=\"330\" cy=\"50\" r=\"5\" fill=\"#3b82f6\" stroke=\"#ffffff\" stroke-width=\"1.5\"/>\n  <!-- Residual Note -->\n  <text x=\"340\" y=\"65\" fill=\"#ef4444\" font-size=\"10\" font-weight=\"bold\">Residual e = y - \u0177</text>\n  <!-- Banner -->\n  <rect x=\"75\" y=\"40\" width=\"140\" height=\"42\" rx=\"6\" fill=\"#f8fafc\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n  <text x=\"145\" y=\"58\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">r = +0.88, R\u00b2 = 0.77</text>\n  <text x=\"145\" y=\"72\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">Strong Positive Correlation</text>\n</svg>",
        "diagramLabel": "Scatter plot and least-squares regression line showing vertical error residuals",
        "diagramCaption": "Ordinary Least Squares: The regression line minimizes the sum of squared vertical residuals (red dashed segments, e = y - \u0177).",
        "references": [
            {
                "title": "Desmos Interactive Linear Regression",
                "desc": "Drag scatter plot data points to observe live recalculation of slope, intercept, and r\u00b2 values.",
                "url": "https://www.desmos.com/calculator/jwjh54abua",
                "icon": "fas fa-chart-line"
            },
            {
                "title": "Common Core Standard CCSS.MATH.CONTENT.HSS.ID.B.6",
                "desc": "Represent data on two quantitative variables on a scatter plot, and describe how the variables are related; fit a function to the data.",
                "url": "/pages/standards.php?domain=HSS-ID",
                "icon": "fas fa-award"
            },
            {
                "title": "StatTrek: Linear Regression Tutorial",
                "desc": "Clear guides on interpreting standard error, residuals, and prediction intervals.",
                "url": "https://stattrek.com/regression/linear-regression.aspx",
                "icon": "fas fa-graduation-cap"
            }
        ]
    },
    "Prime Numbers": {
        "category": "Number Theory",
        "definition": "A prime number is an integer strictly greater than 1 whose only positive divisors are 1 and itself ($p \\in \\mathbb{Z}^+, p > 1$). Integers greater than 1 with more than two factors are composite numbers; the number 1 is designated neither prime nor composite. The Fundamental Theorem of Arithmetic guarantees that every integer $n > 1$ can be uniquely factored as a product of prime powers: $n = p_1^{a_1} p_2^{a_2} \\cdots p_k^{a_k}$ up to the order of factors. Euclid proved over 2,300 years ago that the set of prime numbers is infinite. Primes underpin modern asymmetric public-key cryptography (e.g., RSA encryption).",
        "basicDefinition": "A prime number can only be divided evenly by 1 and itself (like 2, 3, 5, 7, 11). Every whole number bigger than 1 is either prime or can be broken down into prime building blocks.",
        "breakdown": [
            {
                "label": "Prime vs. Composite",
                "text": "Primes have exactly 2 distinct factors ($2, 3, 5, 7, 11, 13\\dots$). $2$ is the only even prime. $0$ and $1$ are neither prime nor composite."
            },
            {
                "label": "Fundamental Theorem of Arithmetic",
                "text": "Every integer $> 1$ has a single, unique prime factorization (e.g., $360 = 2^3 \\cdot 3^2 \\cdot 5$)."
            },
            {
                "label": "The Sieve of Eratosthenes",
                "text": "An ancient algorithm to find all primes up to $N$: list numbers and systematically cross off multiples of each identified prime."
            }
        ],
        "example": "<strong>Prime Factorization of $504$:</strong><br><br>$$504 = 2 \\times 252 = 2 \\times 2 \\times 126 = 2^3 \\times 63 = 2^3 \\times 3^2 \\times 7$$<br>The unique prime factors are $2, 3,$ and $7$.",
        "basicExample": "$7$ is prime because only $1 \\times 7 = 7$. $9$ is not prime (composite) because $3 \\times 3 = 9$.",
        "proTip": "To test if an integer $N$ is prime, you only need to test divisibility by primes up to $\\sqrt{N}$. If no prime $p \\le \\sqrt{N}$ divides $N$, then $N$ is guaranteed to be prime.",
        "question": "What is the unique prime factorization of $84$?",
        "choices": [
            "$2^2 \\cdot 3 \\cdot 7$",
            "$2 \\cdot 3^2 \\cdot 7$",
            "$4 \\cdot 3 \\cdot 7$",
            "$2^3 \\cdot 7$"
        ],
        "correctIndex": 0,
        "explanation": "$84 = 2 \\times 42 = 2 \\times 2 \\times 21 = 2^2 \\times 3 \\times 7$. (Note that $4 \\cdot 3 \\cdot 7$ is not a prime factorization because $4$ is composite).",
        "equations": [
            {
                "title": "Fundamental Theorem of Arithmetic",
                "latex": "n = p_1^{a_1} p_2^{a_2} p_3^{a_3} \\cdots p_k^{a_k} \\quad (p_1 < p_2 < \\dots < p_k \\text{ are prime})",
                "note": "Every integer $n > 1$ has a unique representation as a product of prime powers up to order."
            },
            {
                "title": "Euclid's Infinitude of Primes Proof",
                "latex": "N = (p_1 p_2 \\cdots p_k) + 1 \\implies \\forall i, \\; p_i \\nmid N",
                "note": "Assuming a finite list of primes produces a contradiction; there are infinitely many primes."
            },
            {
                "title": "Prime Number Theorem (PNT)",
                "latex": "\\pi(x) \\sim \\frac{x}{\\ln(x)} \\quad \\text{as } x \\to \\infty",
                "note": "Asymptotic distribution of prime numbers: $\\pi(x)$ counts primes less than or equal to $x$."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Prime factorization tree diagram for 360\">\n  <!-- Root Node 360 -->\n  <circle cx=\"230\" cy=\"30\" r=\"18\" fill=\"#3b82f6\"/>\n  <text x=\"230\" y=\"35\" fill=\"#ffffff\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">360</text>\n  <!-- Branches to 2 and 180 -->\n  <line x1=\"215\" y1=\"42\" x2=\"160\" y2=\"70\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"245\" y1=\"42\" x2=\"300\" y2=\"70\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <!-- Prime Leaf 2 -->\n  <circle cx=\"160\" cy=\"75\" r=\"15\" fill=\"#10b981\"/>\n  <text x=\"160\" y=\"80\" fill=\"#ffffff\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">2</text>\n  <!-- Node 180 -->\n  <circle cx=\"300\" cy=\"75\" r=\"16\" fill=\"#3b82f6\"/>\n  <text x=\"300\" y=\"80\" fill=\"#ffffff\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">180</text>\n  <!-- Branches from 180 to 2 and 90 -->\n  <line x1=\"288\" y1=\"88\" x2=\"250\" y2=\"115\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"312\" y1=\"88\" x2=\"350\" y2=\"115\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <!-- Prime Leaf 2 -->\n  <circle cx=\"250\" cy=\"120\" r=\"15\" fill=\"#10b981\"/>\n  <text x=\"250\" y=\"125\" fill=\"#ffffff\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">2</text>\n  <!-- Node 90 -->\n  <circle cx=\"350\" cy=\"120\" r=\"16\" fill=\"#3b82f6\"/>\n  <text x=\"350\" y=\"125\" fill=\"#ffffff\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">90</text>\n  <!-- Branches from 90 to 2 and 45 -->\n  <line x1=\"340\" y1=\"133\" x2=\"320\" y2=\"160\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"360\" y1=\"133\" x2=\"390\" y2=\"160\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <circle cx=\"320\" cy=\"165\" r=\"15\" fill=\"#10b981\"/>\n  <text x=\"320\" y=\"170\" fill=\"#ffffff\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">2</text>\n  <!-- Node 45 -> 3, 3, 5 -->\n  <circle cx=\"390\" cy=\"165\" r=\"15\" fill=\"#f59e0b\"/>\n  <text x=\"390\" y=\"170\" fill=\"#ffffff\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">3\u00b2\u00b75</text>\n  <!-- Result Callout -->\n  <rect x=\"30\" y=\"120\" width=\"180\" height=\"55\" rx=\"6\" fill=\"#f8fafc\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n  <text x=\"120\" y=\"142\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">360 = 2\u00b3 \u00d7 3\u00b2 \u00d7 5</text>\n  <text x=\"120\" y=\"160\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Unique Prime Factorization</text>\n</svg>",
        "diagramLabel": "Factorization tree diagram demonstrating prime decomposition of 360",
        "diagramCaption": "Factor tree decomposition: Every composite integer breaks down into an unalterable, unique product of prime numbers (green nodes).",
        "references": [
            {
                "title": "The Prime Pages (UT Martin)",
                "desc": "Top 5,000 prime numbers, prime records, and historical research summaries.",
                "url": "https://primes.utm.edu/",
                "icon": "fas fa-hashtag"
            },
            {
                "title": "GeoGebra Sieve of Eratosthenes Interactive",
                "desc": "Step-by-step interactive visualizer crossing off multiples of primes up to 100.",
                "url": "https://www.geogebra.org/m/kwhncmva",
                "icon": "fas fa-th"
            },
            {
                "title": "Hesten's Learning Library: Elementary Number Theory",
                "desc": "Explanations of Euclidean algorithm, modular arithmetic, and RSA cryptography.",
                "url": "/library/index.php?q=number+theory",
                "icon": "fas fa-book"
            }
        ]
    },
    "Divisibility Rules": {
        "category": "Number Theory",
        "definition": "Divisibility rules are algorithmic shortcuts that determine whether a given integer is divisible by a fixed divisor without performing long division. These rules originate from modular arithmetic and base-10 positional notation. Common rules include: Divisible by 2 (last digit even), by 3 (sum of digits divisible by 3), by 4 (last two digits divisible by 4), by 5 (ends in 0 or 5), by 6 (divisible by both 2 and 3), by 8 (last three digits divisible by 8), by 9 (sum of digits divisible by 9), by 10 (ends in 0), and by 11 (alternating sum of digits divisible by 11).",
        "basicDefinition": "Divisibility rules are fast mental math tricks to see if a big number divides evenly by another number without doing long division. For example, any number whose digits add up to 9 is divisible by 9.",
        "breakdown": [
            {
                "label": "Divisibility by 3 and 9",
                "text": "Sum the digits. If the digit sum is divisible by 3, the number is divisible by 3. If divisible by 9, the number is divisible by 9."
            },
            {
                "label": "Divisibility by 4 and 8",
                "text": "For 4: check the last two digits (since $100$ is a multiple of 4). For 8: check the last three digits (since $1000$ is a multiple of 8)."
            },
            {
                "label": "Divisibility by 11",
                "text": "Compute alternating sum: $(d_0 - d_1 + d_2 - d_3 \\dots)$. If result is $0$ or a multiple of $11$, the number is divisible by $11$."
            }
        ],
        "example": "<strong>Test if $7,821$ is divisible by $9$:</strong><br><br>Sum of digits: $7 + 8 + 2 + 1 = 18$.<br>Since $18$ is divisible by $9$ ($18 = 9 \\times 2$), $7,821$ is divisible by $9$.<br>Verification: $7,821 / 9 = 869$ &check;",
        "basicExample": "Is $435$ divisible by $5$? Yes, because it ends in a $5$. Is it divisible by $2$? No, because the last digit ($5$) is odd.",
        "proTip": "For compound divisors, test coprime factors: A number is divisible by 12 if and only if it satisfies the rules for both 3 and 4 ($\\gcd(3, 4) = 1$). You cannot use non-coprime factors like 2 and 6.",
        "question": "Which of the following numbers is divisible by BOTH $3$ and $4$?",
        "choices": [
            "$528$",
            "$418$",
            "$315$",
            "$614$"
        ],
        "correctIndex": 0,
        "explanation": "For $528$: Last two digits $28$ is divisible by $4$ ($28/4 = 7$). Sum of digits $5 + 2 + 8 = 15$ is divisible by $3$. Thus $528$ is divisible by both 3 and 4 (and therefore divisible by 12).",
        "equations": [
            {
                "title": "Base-10 Positional Expansion",
                "latex": "N = a_k 10^k + a_{k-1} 10^{k-1} + \\dots + a_1 10 + a_0 = \\sum_{i=0}^k a_i 10^i",
                "note": "Underlying algebraic basis for all base-10 divisibility rules."
            },
            {
                "title": "Rule of 9 and 3 (Modulo 9 / Modulo 3)",
                "latex": "10 \\equiv 1 \\pmod 9 \\implies 10^i \\equiv 1 \\pmod 9 \\implies N \\equiv \\sum_{i=0}^k a_i \\pmod 9",
                "note": "A number is congruent to the sum of its digits modulo 9 and modulo 3."
            },
            {
                "title": "Alternating Sum Rule for 11",
                "latex": "10 \\equiv -1 \\pmod{11} \\implies 10^i \\equiv (-1)^i \\pmod{11} \\implies N \\equiv \\sum_{i=0}^k (-1)^i a_i \\pmod{11}",
                "note": "A number is divisible by 11 if its alternating digit sum is 0 or a multiple of 11."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Divisibility rules summary matrix infographic\">\n  <!-- Table Header -->\n  <rect x=\"20\" y=\"20\" width=\"420\" height=\"32\" rx=\"4\" fill=\"#0284c7\"/>\n  <text x=\"60\" y=\"42\" fill=\"#ffffff\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Divisor</text>\n  <text x=\"250\" y=\"42\" fill=\"#ffffff\" font-size=\"12\" font-weight=\"bold\">Divisibility Condition</text>\n  <text x=\"390\" y=\"42\" fill=\"#ffffff\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Example</text>\n  <!-- Row 2 -->\n  <rect x=\"20\" y=\"55\" width=\"420\" height=\"26\" fill=\"#f8fafc\"/>\n  <text x=\"60\" y=\"73\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">2, 5, 10</text>\n  <text x=\"120\" y=\"73\" fill=\"#334155\" font-size=\"11\">Check last digit: even (2), 0 or 5 (5), 0 (10)</text>\n  <text x=\"390\" y=\"73\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">740 \u2713</text>\n  <!-- Row 3 & 9 -->\n  <rect x=\"20\" y=\"84\" width=\"420\" height=\"26\" fill=\"#ffffff\"/>\n  <text x=\"60\" y=\"102\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">3 &amp; 9</text>\n  <text x=\"120\" y=\"102\" fill=\"#334155\" font-size=\"11\">Sum of digits is divisible by 3 or 9</text>\n  <text x=\"390\" y=\"102\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">7+8+2+1=18 \u2713</text>\n  <!-- Row 4 & 8 -->\n  <rect x=\"20\" y=\"113\" width=\"420\" height=\"26\" fill=\"#f8fafc\"/>\n  <text x=\"60\" y=\"131\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">4 &amp; 8</text>\n  <text x=\"120\" y=\"131\" fill=\"#334155\" font-size=\"11\">Last 2 digits divisible by 4; last 3 digits by 8</text>\n  <text x=\"390\" y=\"131\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">528 (28/4=7) \u2713</text>\n  <!-- Row 11 -->\n  <rect x=\"20\" y=\"142\" width=\"420\" height=\"26\" fill=\"#ffffff\"/>\n  <text x=\"60\" y=\"160\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">11</text>\n  <text x=\"120\" y=\"160\" fill=\"#334155\" font-size=\"11\">Alternating sum of digits: (d\u2080 - d\u2081 + d\u2082 - ...) \u2261 0</text>\n  <text x=\"390\" y=\"160\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">913 (3-1+9=11) \u2713</text>\n  <!-- Border -->\n  <rect x=\"20\" y=\"20\" width=\"420\" height=\"152\" rx=\"4\" fill=\"none\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n</svg>",
        "diagramLabel": "Divisibility rules algorithmic reference chart",
        "diagramCaption": "Modular divisibility shortcuts: Exploits positional base-10 characteristics (powers of 10 mod 2, 3, 4, 5, 8, 9, 11).",
        "references": [
            {
                "title": "Brilliant.org: Number Theory & Divisibility Proofs",
                "desc": "Step-by-step modular proofs behind the divisibility rules of 7, 11, and 13.",
                "url": "https://brilliant.org/wiki/divisibility-rules/",
                "icon": "fas fa-lightbulb"
            },
            {
                "title": "Khan Academy: Divisibility Tests",
                "desc": "Mental math practice sets and video explanations.",
                "url": "https://www.khanacademy.org/math/pre-algebra/pre-algebra-factors-multiples/pre-algebra-divisibility-tests",
                "icon": "fas fa-graduation-cap"
            },
            {
                "title": "Wolfram MathWorld: Divisibility Tests",
                "desc": "Formal algebraic definitions for base-b divisibility rules.",
                "url": "https://mathworld.wolfram.com/DivisibilityTests.html",
                "icon": "fas fa-globe"
            }
        ]
    },
    "Modular Arithmetic": {
        "category": "Number Theory",
        "definition": "Modular arithmetic is a system of arithmetic for integers where numbers 'wrap around' upon reaching a fixed value known as the modulus ($m$). Two integers $a$ and $b$ are congruent modulo $m$, written $a \\equiv b \\pmod{m}$, if their difference $(a - b)$ is an integer multiple of $m$, meaning they produce identical remainders when divided by $m$. Modular arithmetic satisfies standard algebraic properties of congruence: addition, subtraction, and multiplication. Inverses $a^{-1} \\pmod{m}$ exist if and only if $\\gcd(a, m) = 1$, determined via the Extended Euclidean Algorithm or Fermat's Little Theorem ($a^{p-1} \\equiv 1 \\pmod{p}$).",
        "basicDefinition": "Modular arithmetic is 'clock arithmetic'. On a 12-hour clock, 9 o'clock plus 5 hours is 2 o'clock, not 14 o'clock, because numbers wrap around after 12. In math, $14 \\equiv 2 \\pmod{12}$.",
        "breakdown": [
            {
                "label": "Congruence Definition",
                "text": "$a \\equiv b \\pmod{m} \\iff m \\mid (a - b)$. In practical terms: $a$ and $b$ leave the exact same remainder when divided by $m$."
            },
            {
                "label": "Modular Operations",
                "text": "If $a \\equiv c$ and $b \\equiv d \\pmod m$, then $(a + b) \\equiv (c + d)$ and $(a \\cdot b) \\equiv (c \\cdot d) \\pmod m$."
            },
            {
                "label": "Fermat's Little Theorem",
                "text": "If $p$ is a prime and $\\gcd(a, p) = 1$, then $a^{p-1} \\equiv 1 \\pmod p$. Fundamental for computing large modular powers."
            }
        ],
        "example": "<strong>Find the remainder of $7^{100} \\pmod{6}$:</strong><br><br>Observe that $7 \\equiv 1 \\pmod{6}$.<br>Therefore:<br>$$7^{100} \\equiv 1^{100} \\equiv 1 \\pmod{6}$$<br>The remainder is $1$.",
        "basicExample": "If today is Tuesday (day 2), what day will it be in 15 days? Since weeks repeat every 7 days: $15 \\pmod 7 = 1$. So it will be $2 + 1 = 3$ (Wednesday).",
        "proTip": "Never divide directly in modular arithmetic! Instead of dividing by $a$, you must multiply by the modular multiplicative inverse $a^{-1}$, which exists only when $\\gcd(a, m) = 1$.",
        "question": "What is the value of $(19 \\times 23) \\pmod{5}$?",
        "choices": [
            "$2$",
            "$3$",
            "$4$",
            "$1$"
        ],
        "correctIndex": 0,
        "explanation": "Reduce each factor modulo 5 first: $19 \\equiv 4 \\pmod 5$ and $23 \\equiv 3 \\pmod 5$. Then multiply: $4 \\times 3 = 12 \\equiv 2 \\pmod 5$.",
        "equations": [
            {
                "title": "Congruence Relation Definition",
                "latex": "a \\equiv b \\pmod m \\iff m \\mid (a - b) \\iff a = qm + b \\quad (0 \\le b < m)",
                "note": "$a$ and $b$ leave the exact same remainder upon division by the positive integer modulus $m$."
            },
            {
                "title": "Modular Arithmetic Operations",
                "latex": "(a + c) \\equiv (b + d) \\pmod m, \\quad (a \\cdot c) \\equiv (b \\cdot d) \\pmod m, \\quad a^k \\equiv b^k \\pmod m",
                "note": "Congruences can be added, subtracted, and multiplied just like standard equations."
            },
            {
                "title": "Fermat's Little Theorem & Euler's Totient",
                "latex": "a^{p-1} \\equiv 1 \\pmod p \\; (p \\text{ prime}), \\quad a^{\\phi(m)} \\equiv 1 \\pmod m \\; (\\gcd(a, m) = 1)",
                "note": "Foundational bedrock for public-key cryptography (RSA encryption) and computing large modular exponents."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"12-hour modular clock arithmetic diagram\">\n  <!-- Outer Clock Face -->\n  <circle cx=\"230\" cy=\"100\" r=\"75\" fill=\"#f8fafc\" stroke=\"#0284c7\" stroke-width=\"3\"/>\n  <circle cx=\"230\" cy=\"100\" r=\"4\" fill=\"#0284c7\"/>\n  <!-- Clock Hours 0 to 11 -->\n  <!-- 0 at top (230, 38) -->\n  <text x=\"230\" y=\"42\" fill=\"#0f172a\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">0 \u2261 12</text>\n  <!-- 3 at right (292, 104) -->\n  <text x=\"292\" y=\"104\" fill=\"#0f172a\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">3</text>\n  <!-- 6 at bottom (230, 168) -->\n  <text x=\"230\" y=\"168\" fill=\"#0f172a\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">6</text>\n  <!-- 9 at left (168, 104) -->\n  <text x=\"168\" y=\"104\" fill=\"#0f172a\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">9</text>\n  <!-- Hour Hand pointing to 2 (9 + 5 = 14 = 2 mod 12) -->\n  <line x1=\"230\" y1=\"100\" x2=\"268\" y2=\"62\" stroke=\"#ef4444\" stroke-width=\"3\" stroke-linecap=\"round\"/>\n  <circle cx=\"268\" cy=\"62\" r=\"5\" fill=\"#ef4444\"/>\n  <!-- Circular Arrow indicating wrap-around -->\n  <path d=\"M 180 50 A 70 70 0 0 1 280 50\" fill=\"none\" stroke=\"#10b981\" stroke-width=\"2.5\" marker-end=\"url(#arrow)\"/>\n  <!-- Mathematical Equivalence Callouts -->\n  <rect x=\"25\" y=\"40\" width=\"120\" height=\"50\" rx=\"6\" fill=\"#f8fafc\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n  <text x=\"85\" y=\"60\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">9 + 5 = 14</text>\n  <text x=\"85\" y=\"78\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">14 \u2261 2 (mod 12)</text>\n  <rect x=\"315\" y=\"40\" width=\"120\" height=\"50\" rx=\"6\" fill=\"#f8fafc\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n  <text x=\"375\" y=\"60\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Modular Wrap</text>\n  <text x=\"375\" y=\"78\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">m | (14 - 2)</text>\n</svg>",
        "diagramLabel": "Clock arithmetic diagram demonstrating modular equivalence modulo 12",
        "diagramCaption": "Clock arithmetic visualization: Numbers wrap around every 12 hours; 9 o'clock + 5 hours lands on 2 o'clock, proving 14 \u2261 2 (mod 12).",
        "references": [
            {
                "title": "Khan Academy: Modular Arithmetic in Cryptography",
                "desc": "How modular inverses, modular exponentiation, and discrete logarithms secure the web.",
                "url": "https://www.khanacademy.org/computing/computer-science/cryptography/modarithmetic",
                "icon": "fas fa-lock"
            },
            {
                "title": "Brilliant.org: Modular Arithmetic Fundamentals",
                "desc": "Interactive lessons on modular inverses, Euler's totient, and Chinese Remainder Theorem.",
                "url": "https://brilliant.org/wiki/modular-arithmetic/",
                "icon": "fas fa-shield-alt"
            },
            {
                "title": "GeoGebra Modular Clock Simulation",
                "desc": "Interactive dial testing arbitrary modulus values and multiplication cycles.",
                "url": "https://www.geogebra.org/m/eFsmMv3e",
                "icon": "fas fa-clock"
            }
        ]
    },
    "Diophantine Equations": {
        "category": "Number Theory",
        "definition": "A Diophantine equation is an algebraic polynomial equation in two or more variables for which only integer solutions are sought. The linear Diophantine equation $ax + by = c$ has integer solutions if and only if $d = \\gcd(a, b)$ divides $c$ (B\u00e9zout's Identity). When a particular solution $(x_0, y_0)$ is identified using the Extended Euclidean Algorithm, the infinite family of integer solutions is given by $x = x_0 + k \\frac{b}{d}$ and $y = y_0 - k \\frac{a}{d}$ for any integer $k \\in \\mathbb{Z}$. Famous non-linear Diophantine equations include the Pythagorean equation ($x^2 + y^2 = z^2$) and Fermat's Last Theorem ($x^n + y^n = z^n$ has no positive integer solutions for $n > 2$).",
        "basicDefinition": "A Diophantine equation is an equation where only whole numbers (integers) count as answers. For example, buying $35$ dollars worth of items with $5$-dollar and $10$-dollar bills.",
        "breakdown": [
            {
                "label": "Linear Existence Condition",
                "text": "$ax + by = c$ has integer solutions if and only if $\\gcd(a, b)$ divides $c$. If $\\gcd(a, b) \\nmid c$, no integer solution exists."
            },
            {
                "label": "General Solution Formula",
                "text": "Given particular solution $(x_0, y_0)$: $x = x_0 + k(b/d)$ and $y = y_0 - k(a/d)$ for all integers $k \\in \\mathbb{Z}$."
            },
            {
                "label": "Pythagorean Triples",
                "text": "Integer solutions to $a^2 + b^2 = c^2$, generated by Euclid's formula: $a = m^2 - n^2, b = 2mn, c = m^2 + n^2$ ($m > n > 0$)."
            }
        ],
        "example": "<strong>Find integer solutions to $6x + 9y = 21$:</strong><br><br>1. $\\gcd(6, 9) = 3$.<br>2. Does $3$ divide $21$? Yes ($21 = 3 \\times 7$), so solutions exist.<br>3. Divide by $3$: $2x + 3y = 7$.<br>4. By inspection, $x_0 = 2, y_0 = 1$ is a particular solution ($2(2) + 3(1) = 7$).<br>5. General solutions: $x = 2 + 3k$, $y = 1 - 2k$ for any integer $k$.",
        "basicExample": "Can you pay a $15 bill using only $4-dollar coins and $6-dollar tokens? $\\gcd(4, 6) = 2$. Since $15$ is odd and cannot be divided by $2$, it is impossible with whole coins.",
        "proTip": "Always calculate $\\gcd(a, b)$ first before attempting to find solutions. If the greatest common divisor does not divide the constant $c$, you can immediately conclude no integer solutions exist.",
        "question": "Which linear Diophantine equation has NO integer solutions?",
        "choices": [
            "$4x + 6y = 15$",
            "$3x + 5y = 11$",
            "$6x + 9y = 18$",
            "$10x + 15y = 25$"
        ],
        "correctIndex": 0,
        "explanation": "For $4x + 6y = 15$, $\\gcd(4, 6) = 2$. Since $2$ does not divide $15$ ($15$ is odd), no integer solutions $(x, y)$ can exist.",
        "equations": [
            {
                "title": "B\u00e9zout's Identity (Linear Existence)",
                "latex": "ax + by = c \\text{ has integer solutions } (x, y) \\iff \\gcd(a, b) \\mid c",
                "note": "A linear Diophantine equation has integer solutions if and only if $\\gcd(a, b)$ divides $c$."
            },
            {
                "title": "General Integer Solution Parameterization",
                "latex": "x = x_0 + k \\left( \\frac{b}{d} \\right), \\quad y = y_0 - k \\left( \\frac{a}{d} \\right) \\quad (k \\in \\mathbb{Z}, \\; d = \\gcd(a, b))",
                "note": "Given any particular integer solution $(x_0, y_0)$, generates the infinite family of integer solutions."
            },
            {
                "title": "Pythagorean Diophantine Triples",
                "latex": "a^2 + b^2 = c^2 \\implies a = m^2 - n^2, \\; b = 2mn, \\; c = m^2 + n^2 \\quad (m > n > 0, \\; \\gcd(m, n)=1)",
                "note": "Euclid's formula generates all primitive integer solutions to the Pythagorean equation."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 210\" width=\"100%\" height=\"210\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Integer lattice grid and linear Diophantine line\">\n  <defs>\n    <pattern id=\"latgrid\" width=\"30\" height=\"30\" patternUnits=\"userSpaceOnUse\">\n      <circle cx=\"30\" cy=\"30\" r=\"2\" fill=\"#cbd5e1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"#f8fafc\" rx=\"8\"/>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#latgrid)\"/>\n  <!-- Axes -->\n  <line x1=\"40\" y1=\"160\" x2=\"420\" y2=\"160\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"70\" y1=\"20\" x2=\"70\" y2=\"190\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <!-- Line 2x + 3y = 7 -> y = -(2/3)x + 7/3. Scale 30px per unit -->\n  <!-- Points: (-1, 3) [40, 70], (2, 1) [130, 130], (5, -1) [220, 190] -->\n  <line x1=\"20\" y1=\"57\" x2=\"250\" y2=\"210\" stroke=\"#0284c7\" stroke-width=\"2.5\"/>\n  <!-- Highlight Integer Lattice Intersections -->\n  <circle cx=\"130\" cy=\"130\" r=\"6\" fill=\"#ef4444\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <text x=\"145\" y=\"125\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\">(x\u2080=2, y\u2080=1)</text>\n  <circle cx=\"40\" cy=\"70\" r=\"6\" fill=\"#10b981\" stroke=\"#ffffff\" stroke-width=\"2\"/>\n  <text x=\"55\" y=\"65\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">(-1, 3) [k = -1]</text>\n  <!-- Step indicator dx = +3, dy = -2 -->\n  <line x1=\"40\" y1=\"70\" x2=\"130\" y2=\"70\" stroke=\"#f59e0b\" stroke-width=\"1.5\" stroke-dasharray=\"3,3\"/>\n  <line x1=\"130\" y1=\"70\" x2=\"130\" y2=\"130\" stroke=\"#f59e0b\" stroke-width=\"1.5\" stroke-dasharray=\"3,3\"/>\n  <text x=\"85\" y=\"64\" fill=\"#f59e0b\" font-size=\"10\" font-weight=\"bold\">\u0394x = +3 (b/d)</text>\n  <text x=\"135\" y=\"100\" fill=\"#f59e0b\" font-size=\"10\" font-weight=\"bold\">\u0394y = -2 (-a/d)</text>\n  <!-- Banner -->\n  <rect x=\"250\" y=\"30\" width=\"180\" height=\"60\" rx=\"6\" fill=\"#f8fafc\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n  <text x=\"340\" y=\"50\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">2x + 3y = 7</text>\n  <text x=\"340\" y=\"68\" fill=\"#64748b\" font-size=\"11\" text-anchor=\"middle\">gcd(2, 3) = 1 | 7 \u2713</text>\n  <text x=\"340\" y=\"82\" fill=\"#10b981\" font-size=\"10\" text-anchor=\"middle\">x = 2 + 3k,  y = 1 - 2k</text>\n</svg>",
        "diagramLabel": "Integer lattice grid showing discrete solution points along Diophantine line",
        "diagramCaption": "Integer lattice geometry: Only coordinate grid intersections (red and green points) count as valid integer solutions.",
        "references": [
            {
                "title": "Extended Euclidean Algorithm Calculator",
                "desc": "Step-by-step table finding gcd(a, b) and B\u00e9zout coefficients (x, y).",
                "url": "https://www.calculatorsoup.com/calculators/math/extended-euclidean-algorithm.php",
                "icon": "fas fa-calculator"
            },
            {
                "title": "Brilliant.org: Linear Diophantine Equations",
                "desc": "Rigorous derivation of modular reduction and general solution parametrization.",
                "url": "https://brilliant.org/wiki/linear-diophantine-equations-one-equation/",
                "icon": "fas fa-square-root-alt"
            },
            {
                "title": "Stanford Encyclopedia of Philosophy: Fermat's Last Theorem",
                "desc": "Historical overview of Andrew Wiles' proof of x\u207f + y\u207f = z\u207f for n > 2.",
                "url": "https://plato.stanford.edu/entries/fermat-last-theorem/",
                "icon": "fas fa-scroll"
            }
        ]
    },
    "Financial Math": {
        "category": "Applied Math",
        "definition": "Financial mathematics applies mathematical methods to financial markets, investments, and personal economics. Core concepts center on the Time Value of Money (TVM)\u2014the economic principle that money available at the present time is worth more than the identical sum in the future due to its earning capacity. Fundamental formulas include Simple Interest ($I = P r t$), Compound Interest ($A = P(1 + \\frac{r}{n})^{nt}$), Continuously Compounded Interest ($A = P e^{rt}$), and Annuities (ordinary annuity future value $FV = PMT \\cdot \\frac{(1 + r)^t - 1}{r}$). The Rule of 72 provides a quick mental estimation for doubling time ($t \\approx \\frac{72}{r\\%}$).",
        "basicDefinition": "Financial math explains how money grows over time with interest. Simple interest calculates interest only on the starting amount, while compound interest pays interest on your interest, making money grow much faster.",
        "breakdown": [
            {
                "label": "Simple Interest",
                "text": "$I = P r t$. Interest ($I$) depends linearly on principal ($P$), annual interest rate ($r$ as decimal), and time ($t$ in years)."
            },
            {
                "label": "Compound Interest",
                "text": "$$A = P\\left(1 + \\frac{r}{n}\\right)^{nt}$$ where $n$ is compounding frequency per year (annual: 1, monthly: 12, daily: 365)."
            },
            {
                "label": "The Rule of 72",
                "text": "Divide $72$ by the annual interest rate percentage to estimate the number of years required for an investment to double in value."
            }
        ],
        "example": "<strong>Compound Interest:</strong> Invest $\\$1,000$ at $6\\%$ annual interest compounded monthly ($n=12$) for $3$ years:<br><br>$$A = 1000\\left(1 + \\frac{0.06}{12}\\right)^{12 \\times 3} = 1000(1 + 0.005)^{36} = 1000(1.005)^{36} \\approx \\$1,196.68$$<br>Total interest earned: $\\$196.68$ &check;",
        "basicExample": "If you invest $\\$100$ at $10\\%$ simple interest for 2 years: Interest = $100 \\times 0.10 \\times 2 = \\$20$. Your total balance is $\\$120$.",
        "proTip": "Always convert interest rates from percentages to decimals before computing ($7.5\\% = 0.075$). When compounded monthly, divide rate by 12 and multiply years by 12.",
        "question": "Using the Rule of 72, approximately how many years will it take for an investment to double at an $8\\%$ annual compound return?",
        "choices": [
            "$9$ years",
            "$8$ years",
            "$12$ years",
            "$6$ years"
        ],
        "correctIndex": 0,
        "explanation": "According to the Rule of 72: Doubling time $\\approx \\frac{72}{8} = 9$ years.",
        "equations": [
            {
                "title": "Compound Interest Formula",
                "latex": "A = P \\left(1 + \\frac{r}{n}\\right)^{nt} \\quad \\text{and} \\quad A = P e^{rt} \\; (\\text{Continuous})",
                "note": "$P$ = Principal, $r$ = annual interest rate, $n$ = compound frequency per year, $t$ = time in years."
            },
            {
                "title": "Ordinary Annuity Future Value",
                "latex": "FV = PMT \\cdot \\frac{(1 + i)^n - 1}{i} \\quad (i = r / m, \\; n = m \\cdot t)",
                "note": "Calculates accumulated wealth from regular periodic payments $PMT$ earning periodic rate $i$."
            },
            {
                "title": "Rule of 72 & Amortization Formula",
                "latex": "t_{\\text{double}} \\approx \\frac{72}{r\\%}, \\quad PMT = P \\cdot \\frac{i(1 + i)^n}{(1 + i)^n - 1}",
                "note": "Rule of 72 estimates doubling time; mortgage formula calculates fixed periodic loan payments."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 210\" width=\"100%\" height=\"210\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Simple interest vs compound interest exponential growth graph\">\n  <defs>\n    <pattern id=\"fingrid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#fingrid)\" rx=\"8\"/>\n  <line x1=\"30\" y1=\"180\" x2=\"430\" y2=\"180\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"60\" y1=\"20\" x2=\"60\" y2=\"195\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <text x=\"435\" y=\"175\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">Time (Years)</text>\n  <text x=\"70\" y=\"30\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">Total Balance ($)</text>\n  <!-- Simple Interest Linear Line -->\n  <line x1=\"60\" y1=\"140\" x2=\"410\" y2=\"90\" stroke=\"#94a3b8\" stroke-width=\"2.5\" stroke-linecap=\"round\"/>\n  <text x=\"415\" y=\"94\" fill=\"#94a3b8\" font-size=\"11\" font-weight=\"bold\">Simple Interest (Linear)</text>\n  <!-- Compound Interest Exponential Curve -->\n  <path d=\"M 60 140 C 180 135, 270 110, 410 30\" fill=\"none\" stroke=\"#10b981\" stroke-width=\"3.5\" stroke-linecap=\"round\"/>\n  <text x=\"415\" y=\"30\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\">Compound: A = P(1+r/n)\u207f\u1d57</text>\n  <!-- Starting Principal Dot -->\n  <circle cx=\"60\" cy=\"140\" r=\"5\" fill=\"#0284c7\"/>\n  <text x=\"50\" y=\"144\" fill=\"#0284c7\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"end\">Principal P</text>\n  <!-- Growth Gap Highlight at year 20 -->\n  <line x1=\"340\" y1=\"100\" x2=\"340\" y2=\"60\" stroke=\"#ef4444\" stroke-width=\"2\" stroke-dasharray=\"3,3\"/>\n  <text x=\"350\" y=\"80\" fill=\"#ef4444\" font-size=\"11\" font-weight=\"bold\">Compound Advantage</text>\n  <!-- Banner -->\n  <rect x=\"80\" y=\"45\" width=\"160\" height=\"42\" rx=\"6\" fill=\"#f8fafc\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n  <text x=\"160\" y=\"63\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">The Power of Compounding</text>\n  <text x=\"160\" y=\"77\" fill=\"#64748b\" font-size=\"10\" text-anchor=\"middle\">Earning interest on prior interest</text>\n</svg>",
        "diagramLabel": "Exponential compound growth curve vs linear simple interest graph",
        "diagramCaption": "Time value of money: Compound interest (green curve) grows exponentially over time compared to the fixed linear pace of simple interest (gray line).",
        "references": [
            {
                "title": "U.S. SEC Compound Interest Calculator",
                "desc": "Official U.S. Securities and Exchange Commission investment projection tool.",
                "url": "https://www.investor.gov/financial-tools-calculators/calculators/compound-interest-calculator",
                "icon": "fas fa-dollar-sign"
            },
            {
                "title": "Investopedia: Time Value of Money Guide",
                "desc": "Comprehensive explanations of discounting, present value, and future value formulas.",
                "url": "https://www.investopedia.com/terms/t/timevalueofmoney.asp",
                "icon": "fas fa-piggy-bank"
            },
            {
                "title": "Hesten's Learning Library: Personal Financial Literacy",
                "desc": "Chapters on loans, credit cards, mortgages, and investment portfolios.",
                "url": "/library/index.php?q=finance",
                "icon": "fas fa-book"
            }
        ]
    },
    "Physics Applications": {
        "category": "Applied Math",
        "definition": "Mathematical physics employs mathematical tools to formalize the laws governing matter, energy, space, and time. Classical mechanics relies on Newton's Second Law of Motion ($\\mathbf{F} = m\\mathbf{a}$), kinematic equations under constant acceleration ($v = v_0 + at$, $\\Delta x = v_0 t + \\frac{1}{2}at^2$, $v^2 = v_0^2 + 2a\\Delta x$), Work and Energy principles ($W = \\mathbf{F} \\cdot \\mathbf{d}$, Kinetic Energy $KE = \\frac{1}{2}mv^2$, Gravitational Potential Energy $PE = mgh$), and Universal Gravitation ($F = G \\frac{m_1 m_2}{r^2}$). Vectors, trigonometry, and differential equations describe projectile trajectories, harmonic oscillation, and electromagnetism.",
        "basicDefinition": "Math is the language of physics. Formulas calculate how fast objects fall, how much force is needed to accelerate a vehicle ($F = ma$), and how energy changes between motion (kinetic energy) and height (potential energy).",
        "breakdown": [
            {
                "label": "Newton's Second Law",
                "text": "$F = ma$ (Force in Newtons equals mass in kg times acceleration in $\\text{m/s}^2$)."
            },
            {
                "label": "Kinetic & Potential Energy",
                "text": "Kinetic Energy $KE = \\frac{1}{2}mv^2$. Gravitational Potential Energy $PE = mgh$ ($g \\approx 9.8\\text{ m/s}^2$). Total mechanical energy is conserved."
            },
            {
                "label": "Projectile Motion",
                "text": "Horizontal and vertical motions are independent. Horizontal velocity is constant ($a_x = 0$); vertical motion accelerates at $-g$."
            }
        ],
        "example": "<strong>Find the force needed to accelerate a $1,200$ kg car at $3\\text{ m/s}^2$:</strong><br><br>$$F = ma = (1200\\text{ kg})(3\\text{ m/s}^2) = 3,600\\text{ N}$$<br>The required net force is $3,600$ Newtons.",
        "basicExample": "If a ball with mass $2$ kg moves at $4$ meters per second, its kinetic energy is $\\frac{1}{2} \\times 2 \\times 4^2 = 16$ Joules.",
        "proTip": "In energy conservation problems ($PE_{top} = KE_{bottom}$), mass $m$ cancels out: $mgh = \\frac{1}{2}mv^2 \\implies v = \\sqrt{2gh}$. Speed depends only on drop height, not mass (neglecting air resistance).",
        "question": "A $4$ kg object is dropped from a height of $5$ meters ($g = 9.8\\text{ m/s}^2$). What is its potential energy before release?",
        "choices": [
            "$196$ Joules",
            "$20$ Joules",
            "$49$ Joules",
            "$392$ Joules"
        ],
        "correctIndex": 0,
        "explanation": "$PE = mgh = (4\\text{ kg})(9.8\\text{ m/s}^2)(5\\text{ m}) = 196\\text{ Joules}$.",
        "equations": [
            {
                "title": "Newton's Second Law & Gravitation",
                "latex": "\\mathbf{F}_{\\text{net}} = m \\mathbf{a} = \\frac{d\\mathbf{p}}{dt}, \\quad F_g = G \\frac{m_1 m_2}{r^2} \\quad (G = 6.674 \\times 10^{-11} \\; \\text{N}\\cdot\\text{m}^2/\\text{kg}^2)",
                "note": "Net force equals mass times acceleration; universal gravitational attraction between two masses."
            },
            {
                "title": "Constant Acceleration Kinematics",
                "latex": "v = v_0 + at, \\quad \\Delta x = v_0 t + \\frac{1}{2}at^2, \\quad v^2 = v_0^2 + 2a\\Delta x",
                "note": "Describes rectilinear motion under uniform constant acceleration (e.g., gravity $g = 9.8\\text{ m/s}^2$)."
            },
            {
                "title": "Work-Energy Theorem & Conservation",
                "latex": "W = \\int \\mathbf{F} \\cdot d\\mathbf{r} = \\Delta KE, \\quad KE = \\frac{1}{2}mv^2, \\quad PE_g = mgh",
                "note": "Mechanical energy conservation: $E_{\\text{tot}} = KE + PE = \\text{constant}$ in isolated systems."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 210\" width=\"100%\" height=\"210\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Projectile motion parabolic trajectory diagram\">\n  <defs>\n    <pattern id=\"physgrid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#physgrid)\" rx=\"8\"/>\n  <line x1=\"30\" y1=\"180\" x2=\"430\" y2=\"180\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"50\" y1=\"20\" x2=\"50\" y2=\"190\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <text x=\"435\" y=\"175\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">Range (x)</text>\n  <text x=\"60\" y=\"30\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">Height (y)</text>\n  <!-- Parabolic Trajectory -->\n  <path d=\"M 50 180 Q 230 20, 410 180\" fill=\"none\" stroke=\"#0284c7\" stroke-width=\"3\" stroke-linecap=\"round\"/>\n  <!-- Launch Vector v0 at (50, 180) -->\n  <line x1=\"50\" y1=\"180\" x2=\"115\" y2=\"115\" stroke=\"#10b981\" stroke-width=\"2.5\" marker-end=\"url(#arrow)\"/>\n  <text x=\"120\" y=\"115\" fill=\"#10b981\" font-size=\"11\" font-weight=\"bold\">v\u2080 vector</text>\n  <!-- Angle theta arc -->\n  <path d=\"M 75 180 A 25 25 0 0 0 68 162\" fill=\"none\" stroke=\"#f59e0b\" stroke-width=\"2\"/>\n  <text x=\"82\" y=\"172\" fill=\"#f59e0b\" font-size=\"10\" font-weight=\"bold\">\u03b8</text>\n  <!-- Maximum Height Peak at (230, 100) -->\n  <circle cx=\"230\" cy=\"100\" r=\"5\" fill=\"#ef4444\"/>\n  <line x1=\"230\" y1=\"100\" x2=\"230\" y2=\"180\" stroke=\"#ef4444\" stroke-width=\"1.5\" stroke-dasharray=\"3,3\"/>\n  <text x=\"230\" y=\"90\" fill=\"#ef4444\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">Apex: vy = 0, H_max</text>\n  <!-- Velocity vector at apex is purely horizontal vx -->\n  <line x1=\"230\" y1=\"100\" x2=\"275\" y2=\"100\" stroke=\"#10b981\" stroke-width=\"2\"/>\n  <text x=\"280\" y=\"95\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\">vx = v\u2080 cos(\u03b8)</text>\n  <!-- Gravity arrow -->\n  <line x1=\"340\" y1=\"70\" x2=\"340\" y2=\"105\" stroke=\"#ef4444\" stroke-width=\"2\"/>\n  <text x=\"350\" y=\"90\" fill=\"#ef4444\" font-size=\"10\" font-weight=\"bold\">g = 9.8 m/s\u00b2 \u2193</text>\n</svg>",
        "diagramLabel": "Projectile motion parabolic trajectory diagram showing launch velocity and apex",
        "diagramCaption": "Projectile kinematics: The horizontal motion has zero acceleration (vx = constant), while vertical gravity accelerates downward at g = -9.8 m/s\u00b2.",
        "references": [
            {
                "title": "PhET Interactive Simulations: Projectile Motion",
                "desc": "Fire cannons with adjustable velocity, launch angle, and air resistance in real-time.",
                "url": "https://phet.colorado.edu/en/simulations/projectile-motion",
                "icon": "fas fa-rocket"
            },
            {
                "title": "The Physics Classroom: Newton's Laws & Kinematics",
                "desc": "Tutorials on free-body diagrams, conservation of momentum, and kinetic energy.",
                "url": "https://www.physicsclassroom.com/Physics-Tutorial/Newton-s-Laws",
                "icon": "fas fa-atom"
            },
            {
                "title": "MIT OpenCourseWare: Classical Mechanics",
                "desc": "Video lectures by Walter Lewin on Newton's universal gravitation and conservation laws.",
                "url": "https://ocw.mit.edu/courses/8-01sc-classical-mechanics-fall-2016/",
                "icon": "fas fa-university"
            }
        ]
    },
    "Engineering Problems": {
        "category": "Applied Math",
        "definition": "Engineering mathematics integrates trigonometry, linear algebra, vector calculus, and differential equations to design, test, and optimize structural, mechanical, electrical, and civil systems. Key areas include Static Equilibrium ($\\sum \\mathbf{F} = 0$ and $\\sum \\boldsymbol{\\tau} = 0$, ensuring buildings and bridges do not translate or rotate), Stress and Strain analysis ($\\sigma = \\frac{F}{A}$, $\\epsilon = \\frac{\\Delta L}{L}$, Young's Modulus $E = \\frac{\\sigma}{\\epsilon}$), Electrical Circuit Theory (Ohm's Law $V = IR$, Kirchhoff's Current and Voltage Laws), and Fluid Dynamics (Bernoulli's Equation).",
        "basicDefinition": "Engineers use math to ensure bridges don't collapse, circuits don't overheat, and machines operate safely. It includes balancing forces (statics), stress on steel beams, and calculating voltage, current, and resistance in electronics.",
        "breakdown": [
            {
                "label": "Static Equilibrium",
                "text": "For structures at rest: Sum of all forces $\\sum \\vec{F} = 0$ and sum of all torques $\\sum \\vec{\\tau} = 0$."
            },
            {
                "label": "Ohm's Law & Circuit Power",
                "text": "Voltage $V = I \\cdot R$ (Volts = Amps $\\times$ Ohms). Electrical power dissipated: $P = V I = I^2 R$."
            },
            {
                "label": "Factor of Safety (FoS)",
                "text": "$\\text{FoS} = \\frac{\\text{Yield Strength}}{\\text{Allowable Working Stress}}$. Values $> 1$ ensure resilience against unexpected overloads."
            }
        ],
        "example": "<strong>Electrical Engineering Circuit:</strong> A $120$V supply powers a circuit with total resistance $R = 15\\,\\Omega$.<br><br>1. Current: $I = \\frac{V}{R} = \\frac{120\\text{ V}}{15\\,\\Omega} = 8\\text{ A}$<br>2. Power dissipated: $P = V \\cdot I = 120\\text{ V} \\times 8\\text{ A} = 960\\text{ Watts}$ &check;",
        "basicExample": "If an electric lightbulb uses $12$ Volts and has a resistance of $4$ Ohms, the electric current is $12 \\div 4 = 3$ Amperes.",
        "proTip": "When calculating series vs. parallel circuits: Series resistances add directly ($R_{total} = R_1 + R_2$), whereas parallel resistances add reciprocally ($\\frac{1}{R_{total}} = \\frac{1}{R_1} + \\frac{1}{R_2}$).",
        "question": "What current flows through a resistor of $25\\,\\Omega$ connected across a $100$V battery?",
        "choices": [
            "$4$ Amperes",
            "$2500$ Amperes",
            "$0.25$ Amperes",
            "$75$ Amperes"
        ],
        "correctIndex": 0,
        "explanation": "Applying Ohm's Law: $I = \\frac{V}{R} = \\frac{100\\text{ V}}{25\\,\\Omega} = 4\\text{ A}$.",
        "equations": [
            {
                "title": "Static Equilibrium Conditions",
                "latex": "\\sum \\mathbf{F}_x = 0, \\quad \\sum \\mathbf{F}_y = 0, \\quad \\sum \\boldsymbol{\\tau} = \\sum (\\mathbf{r} \\times \\mathbf{F}) = 0",
                "note": "A rigid structural system remains at rest without translation or rotation."
            },
            {
                "title": "Stress, Strain & Hooke's Law",
                "latex": "\\sigma = \\frac{F}{A} \\; (\\text{Stress}), \\quad \\epsilon = \\frac{\\Delta L}{L_0} \\; (\\text{Strain}), \\quad E = \\frac{\\sigma}{\\epsilon} \\; (\\text{Young's Modulus})",
                "note": "Quantifies mechanical material deformation under tension, compression, and shear loads."
            },
            {
                "title": "Ohm's Law & Electrical Power",
                "latex": "V = I R, \\quad P = V I = I^2 R = \\frac{V^2}{R}, \\quad R_{\\text{series}} = \\sum R_i, \\; \\frac{1}{R_{\\text{parallel}}} = \\sum \\frac{1}{R_i}",
                "note": "Circuit equations relating voltage, current, resistance, and electrical energy dissipation."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 200\" width=\"100%\" height=\"200\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Engineering bridge truss diagram showing tensile and compressive forces\">\n  <!-- Ground Supports -->\n  <polygon points=\"60,150 45,175 75,175\" fill=\"#64748b\"/>\n  <rect x=\"40\" y=\"175\" width=\"40\" height=\"8\" fill=\"#334155\"/>\n  <polygon points=\"380,150 365,175 395,175\" fill=\"#64748b\"/>\n  <circle cx=\"370\" cy=\"178\" r=\"4\" fill=\"#64748b\"/><circle cx=\"390\" cy=\"178\" r=\"4\" fill=\"#64748b\"/>\n  <!-- Bottom Chord Nodes -->\n  <line x1=\"60\" y1=\"150\" x2=\"380\" y2=\"150\" stroke=\"#0284c7\" stroke-width=\"4\"/>\n  <!-- Top Chord Nodes -->\n  <line x1=\"140\" y1=\"70\" x2=\"300\" y2=\"70\" stroke=\"#0284c7\" stroke-width=\"4\"/>\n  <!-- Web Members -->\n  <line x1=\"60\" y1=\"150\" x2=\"140\" y2=\"70\" stroke=\"#0284c7\" stroke-width=\"3\"/>\n  <line x1=\"140\" y1=\"70\" x2=\"220\" y2=\"150\" stroke=\"#0284c7\" stroke-width=\"3\"/>\n  <line x1=\"220\" y1=\"150\" x2=\"300\" y2=\"70\" stroke=\"#0284c7\" stroke-width=\"3\"/>\n  <line x1=\"300\" y1=\"70\" x2=\"380\" y2=\"150\" stroke=\"#0284c7\" stroke-width=\"3\"/>\n  <!-- Vertical Struts -->\n  <line x1=\"140\" y1=\"70\" x2=\"140\" y2=\"150\" stroke=\"#0284c7\" stroke-width=\"2\"/>\n  <line x1=\"300\" y1=\"70\" x2=\"300\" y2=\"150\" stroke=\"#0284c7\" stroke-width=\"2\"/>\n  <!-- Applied Downward Load F at center node (220, 150) -->\n  <line x1=\"220\" y1=\"100\" x2=\"220\" y2=\"145\" stroke=\"#ef4444\" stroke-width=\"3.5\" marker-end=\"url(#arrow)\"/>\n  <text x=\"220\" y=\"90\" fill=\"#ef4444\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Load F = 10 kN \u2193</text>\n  <!-- Force Labels -->\n  <text x=\"220\" y=\"60\" fill=\"#ef4444\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Top: Compression (C)</text>\n  <text x=\"220\" y=\"165\" fill=\"#10b981\" font-size=\"10\" font-weight=\"bold\" text-anchor=\"middle\">Bottom: Tension (T)</text>\n</svg>",
        "diagramLabel": "Warren truss bridge diagram showing static equilibrium and tension/compression members",
        "diagramCaption": "Structural statics: Under downward loading, the top chords experience compression while the bottom chords experience tension to maintain \u2211F = 0 and \u2211\u03c4 = 0.",
        "references": [
            {
                "title": "GeoGebra 2D Truss Analysis Tool",
                "desc": "Interactive method of joints solver calculating internal member forces live.",
                "url": "https://www.geogebra.org/m/k3v7k84p",
                "icon": "fas fa-hammer"
            },
            {
                "title": "Falstad Circuit Simulator Applet",
                "desc": "Real-time electronic circuit simulator modeling Ohm's and Kirchhoff's laws.",
                "url": "https://www.falstad.com/circuit/",
                "icon": "fas fa-microchip"
            },
            {
                "title": "Engineering Toolbox: Beams & Structural Mechanics",
                "desc": "Reference tables for Young's moduli, moment of inertia, and allowable beam deflection.",
                "url": "https://www.engineeringtoolbox.com/",
                "icon": "fas fa-tools"
            }
        ]
    },
    "Data Science Challenges": {
        "category": "Applied Math",
        "definition": "Data Science challenges utilize computational linear algebra, multivariate calculus, probability theory, and discrete optimization to extract knowledge and train machine learning models from large datasets. Mathematical pillars include Vector Spaces & Matrix Decomposition (Singular Value Decomposition (SVD), Principal Component Analysis (PCA) for dimensionality reduction via eigenvectors/eigenvalues), Loss Optimization (Gradient Descent $\\theta_{t+1} = \\theta_t - \\alpha \\nabla L(\\theta)$), and Model Evaluation metrics (Confusion Matrices, Precision, Recall, $F_1$-score, and Mean Squared Error $MSE = \\frac{1}{n} \\sum (y_i - \\hat{y}_i)^2$).",
        "basicDefinition": "Data Science uses math and algorithms to teach computers how to recognize patterns, make predictions, and learn from data. It relies on matrix math, finding the shortest distance (optimization), and measuring how accurate predictions are.",
        "breakdown": [
            {
                "label": "Gradient Descent Optimization",
                "text": "Iteratively steps variables in the direction of steepest descent ($-\\nabla L$) to minimize cost/loss functions: $\\theta \\leftarrow \\theta - \\alpha \\nabla L$."
            },
            {
                "label": "Loss Functions",
                "text": "Mean Squared Error (MSE) for regression; Cross-Entropy Loss for categorical classification models."
            },
            {
                "label": "Classification Metrics",
                "text": "Precision = $\\frac{TP}{TP + FP}$; Recall = $\\frac{TP}{TP + FN}$; $F_1 = 2 \\cdot \\frac{\\text{Precision} \\cdot \\text{Recall}}{\\text{Precision} + \\text{Recall}}$."
            }
        ],
        "example": "<strong>Compute Mean Squared Error (MSE):</strong><br>Actual values: $[10, 20, 30]$<br>Predicted values: $[12, 18, 33]$<br><br>Errors $(y - \\hat{y})$: $[-2, 2, -3]$<br>Squared errors: $[4, 4, 9]$<br>$$MSE = \\frac{4 + 4 + 9}{3} = \\frac{17}{3} \\approx 5.67$$",
        "basicExample": "If a movie recommendation model guesses you will rate a film 4 stars and you actually rate it 5 stars, the error is $5 - 4 = 1$. Data science averages these errors to make the recommender smarter.",
        "proTip": "Beware of Overfitting: when a model memorizes training noise rather than generalizable underlying patterns. Regularization techniques ($L_1$ Lasso, $L_2$ Ridge) add penalty terms to the loss function to maintain simpler, robust weights.",
        "question": "A diagnostic AI identifies $80$ true positives and $20$ false positives. What is its Precision?",
        "choices": [
            "$0.80$ ($80\\%$)",
            "$0.20$ ($20\\%$)",
            "$0.75$ ($75\\%$)",
            "$1.00$ ($100\\%$)"
        ],
        "correctIndex": 0,
        "explanation": "Precision is calculated as $\\frac{TP}{TP + FP} = \\frac{80}{80 + 20} = \\frac{80}{100} = 0.80$ ($80\\%$).",
        "equations": [
            {
                "title": "Gradient Descent Optimization",
                "latex": "\\boldsymbol{\\theta}_{t+1} = \\boldsymbol{\\theta}_t - \\alpha \\nabla_\\theta L(\\boldsymbol{\\theta}), \\quad \\alpha = \\text{Learning Rate}",
                "note": "Iterative first-order optimization algorithm that steps parameters along the steepest negative gradient of the loss surface."
            },
            {
                "title": "Mean Squared Error (MSE) & Cross-Entropy",
                "latex": "MSE = \\frac{1}{n} \\sum_{i=1}^n (y_i - \\hat{y}_i)^2, \\quad L_{\\text{CE}} = -\\sum_{i=1}^C y_i \\log(\\hat{y}_i)",
                "note": "Canonical objective functions for continuous regression and probabilistic categorical classification."
            },
            {
                "title": "Precision, Recall & F1-Score",
                "latex": "\\text{Precision} = \\frac{TP}{TP + FP}, \\quad \\text{Recall} = \\frac{TP}{TP + FN}, \\quad F_1 = 2 \\cdot \\frac{\\text{Precision} \\cdot \\text{Recall}}{\\text{Precision} + \\text{Recall}}",
                "note": "Core evaluation metrics for imbalanced classification models derived from confusion matrices."
            }
        ],
        "diagramSvg": "<svg viewBox=\"0 0 460 210\" width=\"100%\" height=\"210\" xmlns=\"http://www.w3.org/2000/svg\" role=\"img\" aria-label=\"Gradient descent loss function optimization curve\">\n  <defs>\n    <pattern id=\"dsgrid\" width=\"20\" height=\"20\" patternUnits=\"userSpaceOnUse\">\n      <path d=\"M 20 0 L 0 0 0 20\" fill=\"none\" stroke=\"#e2e8f0\" stroke-width=\"1\"/>\n    </pattern>\n  </defs>\n  <rect width=\"100%\" height=\"100%\" fill=\"url(#dsgrid)\" rx=\"8\"/>\n  <line x1=\"30\" y1=\"180\" x2=\"430\" y2=\"180\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <line x1=\"60\" y1=\"20\" x2=\"60\" y2=\"195\" stroke=\"#64748b\" stroke-width=\"2\"/>\n  <text x=\"435\" y=\"175\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">Weights \u03b8</text>\n  <text x=\"70\" y=\"30\" fill=\"#64748b\" font-size=\"12\" font-weight=\"700\">Loss L(\u03b8)</text>\n  <!-- Parabolic Loss Function -->\n  <path d=\"M 90 40 C 140 160, 200 170, 250 170 C 300 170, 360 160, 410 40\" fill=\"none\" stroke=\"#0284c7\" stroke-width=\"3.5\" stroke-linecap=\"round\"/>\n  <!-- Gradient Descent Iterative Steps -->\n  <!-- Step 0: (110, 75) -->\n  <circle cx=\"110\" cy=\"75\" r=\"5\" fill=\"#ef4444\"/>\n  <text x=\"95\" y=\"70\" fill=\"#ef4444\" font-size=\"11\" font-weight=\"bold\">\u03b8\u2080</text>\n  <!-- Arrow step 1 to (150, 125) -->\n  <line x1=\"110\" y1=\"75\" x2=\"145\" y2=\"120\" stroke=\"#f59e0b\" stroke-width=\"2\" stroke-dasharray=\"3,2\"/>\n  <circle cx=\"150\" cy=\"125\" r=\"5\" fill=\"#ef4444\"/>\n  <text x=\"135\" y=\"125\" fill=\"#ef4444\" font-size=\"11\" font-weight=\"bold\">\u03b8\u2081</text>\n  <!-- Arrow step 2 to (195, 155) -->\n  <line x1=\"150\" y1=\"125\" x2=\"190\" y2=\"152\" stroke=\"#f59e0b\" stroke-width=\"2\" stroke-dasharray=\"3,2\"/>\n  <circle cx=\"195\" cy=\"155\" r=\"5\" fill=\"#ef4444\"/>\n  <!-- Converged Global Minimum at (250, 170) -->\n  <circle cx=\"250\" cy=\"170\" r=\"7\" fill=\"#10b981\" stroke=\"#ffffff\" stroke-width=\"2.5\"/>\n  <text x=\"250\" y=\"195\" fill=\"#10b981\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Optimal \u03b8* (Min Loss)</text>\n  <!-- Banner -->\n  <rect x=\"230\" y=\"45\" width=\"180\" height=\"55\" rx=\"6\" fill=\"#f8fafc\" stroke=\"#cbd5e1\" stroke-width=\"1.5\"/>\n  <text x=\"320\" y=\"65\" fill=\"#0284c7\" font-size=\"12\" font-weight=\"bold\" text-anchor=\"middle\">Gradient Descent Step</text>\n  <text x=\"320\" y=\"83\" fill=\"#f59e0b\" font-size=\"11\" font-weight=\"bold\" text-anchor=\"middle\">\u03b8 \u2190 \u03b8 - \u03b1 \u2207L(\u03b8)</text>\n</svg>",
        "diagramLabel": "Gradient descent optimization path converging to minimum loss",
        "diagramCaption": "Machine learning optimization: Gradient descent iteratively follows the negative gradient (-\u2207L) down the loss bowl until parameters \u03b8 converge to optimal weights.",
        "references": [
            {
                "title": "TensorFlow Playground",
                "desc": "Interactive neural network playground visualizing weights, decision boundaries, and loss curves in browser.",
                "url": "https://playground.tensorflow.org/",
                "icon": "fas fa-brain"
            },
            {
                "title": "Scikit-Learn Model Evaluation Metrics Guide",
                "desc": "Documentation on precision-recall trade-offs, ROC-AUC curves, and cross-validation.",
                "url": "https://scikit-learn.org/stable/modules/model_evaluation.html",
                "icon": "fas fa-code"
            },
            {
                "title": "Distill.pub: Why Momentum Really Works",
                "desc": "Award-winning interactive visual article on machine learning optimization algorithms.",
                "url": "https://distill.pub/2017/momentum/",
                "icon": "fas fa-laptop-code"
            }
        ]
    }
};
