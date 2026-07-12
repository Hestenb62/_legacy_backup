<?php
// --- ANSWER KEY (Will be passed to JavaScript) ---
$answerKey = [
    // Part I (Multiple Choice)
    'q1' => '1', 'q2' => '2', 'q3' => '3', 'q4' => '3', 'q5' => '2', 'q6' => '3', 'q7' => '1', 'q8' => '3', 'q9' => '3', 'q10' => '1', 'q11' => '2', 'q12' => '4', 'q13' => '2', 'q14' => '4', 'q15' => '1', 'q16' => '2', 'q17' => '2', 'q18' => '4', 'q19' => '3', 'q20' => '1', 'q21' => '4', 'q22' => '2', 'q23' => '1', 'q24' => '2',
    // Part II (Constructed Response)
    'q25' => '3/4', 'q27' => '-8x + (2y - 6x)i', 'q28' => '2', 'q29' => '3', 'q30' => '-1', 'q31' => '1998000', 'q32' => '1/2+1/2i, 1/2-1/2i',
    // Part III (Constructed Response)
    'q33a' => 'y=9411.46(1.02)^x', 'q33b' => '23.5', 'q34_factor' => 'Yes', 'q34_zeros' => '-3,sqrt(2),-sqrt(2)', 'q35' => 'a=1/2, b=-2, c=3', 'q36' => '-5x^2 - 5x',
    // Part IV (Constructed Response)
    'q37_period' => '12', 'q37_equation' => '-2.5cos(pi/6*t)+2.5', 'q37_lowtide' => '8.5'
];

// --- HINTS (Passed to JavaScript) ---
$questionHints = [
    'q1' => 'This is a geometric sequence. Find the first term ($a_1$) and the common ratio (r). Then use the formula $a_n = a_1 \cdot r^{n-1}$ to find the 7th term (n=7).',
    'q2' => 'Use the laws of exponents for division: $\frac{x^m}{x^n} = x^{m-n}$. Divide the coefficients (12 and 3) and subtract the exponents (8a and 2a).',
    'q3' => 'To find the inverse, first replace $f(x)$ with $y$. Then, swap $x$ and $y$. Finally, solve the new equation for $y$.',
    'q4' => 'Separate the expression into $\sqrt[3]{16}$ and $\sqrt[3]{x^6}$. Simplify $\sqrt[3]{x^6}$ by dividing the exponent by the root (6 / 3). For $\sqrt[3]{16}$, find the largest perfect cube that divides 16 (which is 8).',
    'q5' => 'Consider the definitions. A census surveys everyone. An experiment applies a treatment. A simulation models a situation. Is the researcher applying a treatment or just observing?',
    'q6' => 'First, expand the target expression $(x-6)(x+2)$. Then, simplify each of the four options to see which one does *not* match the target.',
    'q7' => 'This is a normal distribution problem. First, calculate the z-score using $z = (X - \mu) / \sigma$. Then, use a z-table or calculator to find the probability $P(X > 2750)$, which corresponds to $P(z > \text{your z-score})$. This will be $1 - P(z < \text{your z-score})$.',
    'q8' => 'The least common denominator (LCD) is $x^3$. Multiply every term in the equation by $x^3$ to eliminate the fractions. Then, solve the resulting equation for $x$. Remember to check that your solutions are not $x=0$.',
    'q9' => 'First, isolate the exponential term $e^{x-2}$ by dividing both sides by 9. Then, take the natural logarithm (ln) of both sides to cancel out the $e$. Finally, solve for $x$.',
    'q10' => 'The average is the total points divided by the total number of tests. What is the expression for the total points? What is the expression for the total number of tests?',
    'q11' => 'The argument of a logarithm (the part inside the parentheses) must be strictly greater than zero. Set up this inequality and solve for $x$. Then find the smallest integer that fits the solution.',
    'q12' => 'Use polynomial long division to divide $6x^{3}+7x^{2}-9x-1$ by $2x-1$. Alternatively, use synthetic division with the root $x = 1/2$, but remember to divide your final quotient by 2.',
    'q13' => 'Look at the x-intercepts (roots). A root at $x = k$ corresponds to a factor $(x-k)$. If the graph *crosses* the axis at the root, the factor has an odd power (like 1). If the graph *touches* the axis and turns around, the factor has an even power (like 2).',
    'q14' => 'This equation is too complex to solve algebraically. Use a graphing calculator. Graph $f(x)$ as Y1 and $g(x)$ as Y2. Use the "intersect" feature to find the x-values where the graphs cross. One of the options will not be an intersection point.',
    'q15' => 'A transformation of the form $f(x+h)$ represents a horizontal shift. When $h$ is positive (like $x+3$), the graph shifts to the left. When $h$ is negative (like $x-3$), the graph shifts to the right.',
    'q16' => 'Use the substitution method. Since $y = x-6$ is already solved for $y$, substitute $(x-6)$ for $y$ in the first equation, $x^2 + y^2 = 20$. Solve the resulting quadratic equation for $x$, then find the corresponding $y$ values.',
    'q17' => 'Use the formula $P(A \text{ or } B) = P(A) + P(B) - P(A \text{ and } B)$. First, find the total number of students. Then find $P(\text{Walks})$, $P(\text{Eats Breakfast})$, and $P(\text{Walks and Eats Breakfast})$.',
    'q18' => 'A recursive formula has two parts: an initial value ($a_0$ or $a_1$) and a rule to get the next term from the previous one ($a_n = ... a_{n-1}$). If the value depreciates by $9.2\%$, it *keeps* $100\% - 9.2\%$ of its value. This is your multiplier.',
    'q19' => 'Use a u-substitution. Let $u = (3x-1)$. Rewrite the expression in terms of $u$, factor the resulting quadratic, and then substitute $(3x-1)$ back in for $u$. Make sure to factor completely.',
    'q20' => 'Check each statement. For I, find $E(0)$. For II, check the units (t is in minutes) and the doubling time from the exponent. For III, convert 3 hours to minutes and calculate $E(t)$.',
    'q21' => 'Convert the radical expressions to rational (fractional) exponents. $\sqrt[n]{a^m} = a^{m/n}$. Then use the exponent rule $a^m \cdot a^n = a^{m+n}$ for the $9$\'s and $x$\'s separately.',
    'q22' => 'The original rate is per minute. Let the new rate per *second* be $r_s$. Since there are 60 seconds in a minute, the original rate $(1.0098)$ must equal $(r_s)^{60}$. Solve for $r_s$. The new equation will be $N(t) = 2(r_s)^{60t}$, where $t$ is still in minutes.',
    'q23' => 'The vertex $(h, k)$ is exactly halfway between the focus and the directrix. The parabola opens away from the directrix, towards the focus (downwards). The value $p$ is the directed distance from the vertex to the focus. The standard form is $(x-h)^2 = 4p(y-k)$.',
    'q24' => 'A polynomial of degree $n$ has $n$ total roots. Imaginary roots always come in conjugate pairs. Real roots are the x-intercepts. If a 4th-degree polynomial has 2 imaginary roots, how many real roots (x-intercepts) must it have?',
    'q25' => 'This is a conditional probability: "given that...". This means we only look at the "Back" design row. Out of those people, how many preferred a hoodie?',
    'q26' => 'First, determine the end behavior by looking at the leading term ($-x^3$). Then, find the zeros by using a graphing calculator or the rational root theorem to find one root, then synthetic division to find the others.',
    'q27' => 'Simplify each power of $i$ first ($i^{10}$, $i^{19}$, $i^3$). Remember $i^2 = -1, i^3 = -i, i^4 = 1$. Then substitute these values back into the expression and combine like terms (real parts with real parts, imaginary parts with imaginary parts).',
    'q28' => 'Use the Empirical Rule (68-95-99.7). About $95\%$ of data in a normal distribution lies within how many standard deviations of the mean? The given interval $[8, 16]$ must represent this range.',
    'q29' => 'Use $\cos\theta = x/r$. Since $\theta$ is in Q3, $x$ is negative. Then use $x^2+y^2=r^2$ to find $y$. $y$ is also negative in Q3. Finally, find $\tan\theta = y/x$.',
    'q30' => 'First, isolate the square root term on one side of the equation. Then, square both sides to eliminate the radical. Solve the resulting quadratic equation. **Important:** You must check your solutions in the *original* equation to find and discard any extraneous solutions.',
    'q31' => 'This is a geometric series sum. $a_1 = 42000$, $n = 30$. A 3% raise means the common ratio $r = 1.03$. Use the formula $S_n = \frac{a_1(1 - r^n)}{1 - r}$.',
    'q32' => 'Set the equation to 0 ($2x^2 - 2x + 1 = 0$). Since it asks for $a+bi$ form, the discriminant is likely negative. Use the quadratic formula $x = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$.',
    'q33a' => '(a) Enter the x and y values into your calculator\'s lists and run an Exponential Regression (ExpReg).',
    'q33b' => '(b) Set your rounded equation equal to 15000. Isolate the exponential term, then use logarithms to solve for $x$.',
    'q34_factor' => 'For the first part, use the Remainder Theorem. If $(x+3)$ is a factor, then $f(-3)$ must equal 0.',
    'q34_zeros' => 'For the second part, since you know $x=-3$ is a zero, use synthetic division with -3 to find the remaining quadratic factor, then solve that factor for the other two zeros.',
    'q35' => 'This is a 3x3 system. Use elimination. Try adding (1) and (2) to eliminate $c$. Then, multiply (2) by -2 and add it to (3) to eliminate $c$ again. This will give you a 2x2 system for $a$ and $b$.',
    'q36' => 'Work in parts. First, find $4g(x)$. Second, find $f(x+1)$ by substituting $(x+1)$ for every $x$ in $f(x)$, then expand and simplify. Finally, subtract the *entire* simplified $f(x+1)$ polynomial from $4g(x)$.',
    'q37_period' => '(Period) Find the time for one full cycle (e.g., from one low tide to the next).',
    'q37_equation' => '(Equation) Midline $c=(\text{Max+Min})/2$. Amplitude $a=(\text{Max-Min})/2$. $b=2\pi/\text{Period}$. Since it starts at a min, $a$ is negative.',
    'q37_lowtide' => '(Low Tide) This is the minimum value of $D(t)$, which is $\text{Midline} - \text{Amplitude}$.'
];

// --- EXPLANATIONS (Passed to JavaScript) ---
$questionExplanations = [
    'q1' => 'The first term $a_1 = -2$. The common ratio $r = 6 / -2 = -3$. The formula for the nth term is $a_n = a_1 \cdot r^{n-1}$. For the 7th term, $n=7$. $a_7 = -2 \cdot (-3)^{7-1} = -2 \cdot (-3)^6 = -2 \cdot 729 = -1458$.',
    'q2' => '$\frac{m(x)}{p(x)} = \frac{12x^{8a}}{3x^{2a}}$. Divide the coefficients: $12 \div 3 = 4$. Subtract the exponents: $8a - 2a = 6a$. The result is $4x^{6a}$.',
    'q3' => 'Start with $y = 2x + 6$. Swap $x$ and $y$ to get $x = 2y + 6$. Solve for $y$: $x - 6 = 2y$. Divide by 2: $y = \frac{x - 6}{2}$. This simplifies to $y = \frac{x}{2} - 3$. So, $f^{-1}(x) = \frac{x}{2} - 3$.',
    'q4' => '$\sqrt[3]{16x^6} = \sqrt[3]{8 \cdot 2 \cdot x^6}$. We can separate this into $\sqrt[3]{8} \cdot \sqrt[3]{x^6} \cdot \sqrt[3]{2}$. $\sqrt[3]{8} = 2$. $\sqrt[3]{x^6} = x^{6/3} = x^2$. The $\sqrt[3]{2}$ cannot be simplified. Combining these parts gives $2x^2\sqrt[3]{2}$.',
    'q5' => 'This is an observational study because the researcher is measuring existing characteristics (height and shoe size) without applying any treatment or changing any variables. A census would involve every person in the school, and an experiment would involve imposing a treatment.',
    'q6' => 'The target expression is $(x-6)(x+2) = x^2 - 4x - 12$. Option (3) simplifies to $\frac{(x-2)(x-6)(x+2)}{(x-6)} = (x-2)(x+2) = x^2 - 4$. This does not match.',
    'q7' => 'First, find the z-score: $z = (2750 - 2387) / 238 = 363 / 238 \approx 1.525$. We want the probability of a value *greater* than this. The area to the left (less than) $z=1.525$ is approximately 0.9363. The area to the right (greater than) is $1 - 0.9363 = 0.0637$. As a percentage, this is $6.37\%$, which rounds to $6.4\%$.',
    'q8' => 'Multiply the entire equation by $x^3$: $x^3(\frac{2}{x^3}) + x^3(\frac{1}{x}) = x^3(\frac{6}{x^3})$. This simplifies to $2 + x^2 = 6$. Subtract 2 from both sides: $x^2 = 4$. Take the square root of both sides: $x = \pm 2$. The solution set is $\{-2, 2\}$.',
    'q9' => 'Divide both sides by 9: $e^{x-2} = 36 / 9 = 4$. Take the natural log of both sides: $ln(e^{x-2}) = ln(4)$. The $ln$ and $e$ cancel, leaving: $x - 2 = ln(4)$. Add 2 to both sides: $x = ln(4) + 2$.',
    'q10' => 'The total points earned are $40$ (from the first test) plus $100 \cdot x$ (from the $x$ additional tests), which is $40 + 100x$. The total number of tests taken is $1$ (the first test) plus $x$ (the additional tests), which is $x + 1$. The average is $\frac{\text{Total Points}}{\text{Total Tests}}$, so the equation is $\frac{40 + 100x}{x + 1} = 80$.',
    'q11' => 'The natural logarithm function $ln(A)$ is defined only when its argument $A$ is positive. Therefore, we must have $x + 5 > 0$. Subtracting 5 from both sides gives $x > -5$. The smallest integer value of $x$ that is greater than -5 is -4.',
    'q12' => 'Using polynomial long division, the quotient is $3x^2 + 5x - 2$ with a remainder of $-3$. This is written as $3x^2 + 5x - 2 - \frac{3}{2x-1}$.',
    'q13' => 'The graph has x-intercepts at $x = -a$ and $x = b$. At $x = -a$, the graph is tangent to the x-axis, which indicates an even multiplicity (e.g., a power of 2). So we have a factor of $(x+a)^2$. At $x = b$, the graph crosses the x-axis, indicating an odd multiplicity (e.g., a power of 1). So we have a factor of $(x-b)$. This gives the form $p(x) = (x+a)^2(x-b)$.',
    'q14' => 'By graphing $f(x)$ and $g(x)$ on a graphing calculator, we can find the points of intersection. The graphs intersect at $x \approx -6.93$, $x \approx -1.36$, and $x \approx 2.23$. The values in options (1), (2), and (3) are rounded approximations of these solutions. The value $x = 9.8$ is not a solution.',
    'q15' => 'The transformation $g(x) = f(x+3)$ shifts the original graph of $f(x)$ three units to the left. The original graph has an x-intercept at $x=1$. Shifting this 3 units left moves the x-intercept to $x = 1 - 3 = -2$. Graph (1) shows the shifted graph with an x-intercept at $x=-2$.',
    'q16' => 'Substitute $y = x-6$ into $x^2 + y^2 = 20$: $x^2 + (x-6)^2 = 20$. Expand: $x^2 + x^2 - 12x + 36 = 20$. Combine terms: $2x^2 - 12x + 16 = 0$. Divide by 2: $x^2 - 6x + 8 = 0$. Factor: $(x-4)(x-2) = 0$. The solutions for $x$ are $x=4$ and $x=2$. When $x=4$, $y = 4 - 6 = -2$. This gives the point $(4, -2)$.',
    'q17' => 'Total students = $7 + 10 + 53 + 30 = 100$. The number of students who walk is $17$. The number who eat breakfast is $60$. The number who do *both* is $7$. $P(\text{Walks or Eats}) = P(\text{Walks}) + P(\text{Eats}) - P(\text{Walks and Eats}) = (17/100) + (60/100) - (7/100) = 70/100 = 0.70$.',
    'q18' => 'The initial value is $a_0 = 34,950$. A depreciation of $9.2\%$ means the value is multiplied by $(1 - 0.092) = 0.908$ each year. A recursive formula defines the next term ($a_n$) based on the previous term ($a_{n-1}$). Therefore, $a_n = a_{n-1} \cdot 0.908$. This matches option (4).',
    'q19' => 'Let $u = (3x-1)$. The expression becomes $u^2 - 5u + 6$. This factors to $(u-2)(u-3)$. Substitute back: $[(3x-1) - 2] \cdot [(3x-1) - 3] = (3x - 3)(3x - 4)$. The first factor, $(3x-3)$, can be factored further to $3(x-1)$. The result is $3(x - 1)(3x - 4)$.',
    'q20' => 'I. Initial mass $E(0) = 26(2)^{0/20} = 26(1) = 26$. (True). II. The exponent is $t/20$, where $t$ is in *minutes*. It doubles every 20 minutes, not days. (False). III. 3 hours = 180 minutes. $E(180) = 26(2)^{180/20} = 26(2)^9 = 13312$. (False). Only I is true.',
    'q21' => '$\sqrt[3]{9x^2} = 9^{1/3}x^{2/3}$. $\sqrt{9x} = 9^{1/2}x^{1/2}$. Multiplying them: $(9^{1/3} \cdot 9^{1/2}) \cdot (x^{2/3} \cdot x^{1/2}) = 9^{(1/3 + 1/2)} \cdot x^{(2/3 + 1/2)} = 9^{5/6}x^{7/6}$.',
    'q22' => 'The original factor per minute is $1.0098$. Let $r_s$ be the factor per second. Then $(r_s)^{60} = 1.0098$. So $r_s = (1.0098)^{1/60} \approx 1.000163$. The new equation in terms of $t$ (minutes) is $N(t) = 2(r_s)^{60t} = 2(1.000163)^{60t}$.',
    'q23' => 'The vertex $(h, k)$ is halfway between the focus $(2, -5)$ and directrix $y=3$. $h=2$, $k=(3 + -5)/2 = -1$. Vertex is $(2, -1)$. $p$ is the directed distance from vertex to focus: $p = -5 - (-1) = -4$. The equation is $(x - h)^2 = 4p(y - k)$, so $(x - 2)^2 = 4(-4)(y - (-1))$, which is $(x - 2)^2 = -16(y + 1)$.',
    'q24' => 'A 4th-degree polynomial has 4 total roots. If 2 are imaginary, the other 2 must be real (x-intercepts). We need the graph with 2 x-intercepts. Graph (2) is the only 4th-degree graph (ends go in the same direction) with 2 x-intercepts.',
    'q25' => 'We are "given" that the senior wanted a design on the back. This means we only consider the "Back" row. The total in this row is $45 + 15 = 60$. Out of these 60 students, 45 preferred a hoodie. The probability is $\frac{45}{60} = \frac{3}{4}$.',
    'q27' => '$i^{10} = (i^4)^2 \cdot i^2 = -1$. $i^{19} = (i^4)^4 \cdot i^3 = -i$. $i^3 = -i$. Substitute: $8x(-1) - 4y(-i) + 2y(-i) - 6xi = -8x + 4yi - 2yi - 6xi$. Combine real/imaginary: $-8x + (2y - 6x)i$.',
    'q28' => 'The interval $[8, 16]$ is symmetric around the mean $\mu = 12$. By the Empirical Rule, $95\%$ of data falls within 2 standard deviations ($2\sigma$) of the mean. The distance from the mean to the end of the interval is $16 - 12 = 4$. This distance must equal $2\sigma$. So, $2\sigma = 4$, which means $\sigma = 2$.',
    'q29' => 'We are given $\cos\theta = x/r = -\frac{\sqrt{10}}{10}$. We can set $x = -\sqrt{10}$ and $r = 10$. Find $y$: $x^2 + y^2 = r^2 \implies 10 + y^2 = 100 \implies y^2 = 90 \implies y = \pm 3\sqrt{10}$. In Q3, $y$ is negative, so $y = -3\sqrt{10}$. $\tan\theta = y/x = \frac{-3\sqrt{10}}{-\sqrt{10}} = 3$.',
    'q30' => 'Isolate the radical: $\sqrt{x+5} = x + 3$. Square both sides: $x + 5 = x^2 + 6x + 9$. Set to zero: $0 = x^2 + 5x + 4$. Factor: $0 = (x + 4)(x + 1)$. Potential solutions $x = -4, x = -1$. Check $x = -1$: $\sqrt{4} - (-1) = 2 + 1 = 3$ (Correct). Check $x = -4$: $\sqrt{1} - (-4) = 1 + 4 = 5$ (Extraneous). The only solution is $x = -1$.',
    'q31' => 'This is the sum of a geometric series with $a_1 = 42000$, $r = 1.03$, and $n = 30$. $S_n = \frac{a_1(1 - r^n)}{1 - r} = \frac{42000(1 - 1.03^{30})}{1 - 1.03} = 1,998,166.8...$ Rounded to the nearest thousand, this is $1,998,000$.',
    'q32' => 'Set to standard form: $2x^2 - 2x + 1 = 0$. Use the quadratic formula: $x = \frac{-(-2) \pm \sqrt{(-2)^2 - 4(2)(1)}}{2(2)} = \frac{2 \pm \sqrt{4 - 8}}{4} = \frac{2 \pm \sqrt{-4}}{4} = \frac{2 \pm 2i}{4}$. This simplifies to $x = \frac{1}{2} \pm \frac{1}{2}i$.',
    'q33a' => '(a) Using a calculator\'s exponential regression feature on the data gives $y = 9411.46(1.02)^x$.',
    'q33b' => '(b) $15000 = 9411.46(1.02)^x \implies 1.5937... = (1.02)^x \implies x = \ln(1.5937...) / \ln(1.02) \approx 23.53...$ Rounded to the nearest tenth, $x = 23.5$ years.',
    'q34_factor' => 'Yes, $(x+3)$ is a factor. By the Factor Theorem, we check $f(-3) = (-3)^3 + 3(-3)^2 - 2(-3) - 6 = -27 + 27 + 6 - 6 = 0$. Since the remainder is 0, it is a factor.',
    'q34_zeros' => 'We can factor $f(x)$ by grouping: $x^2(x + 3) - 2(x + 3) = (x^2 - 2)(x + 3)$. The zeros are from $x+3=0 \implies x=-3$ and $x^2-2=0 \implies x=\pm\sqrt{2}$.',
    'q35' => 'Add (1) and (2) to get $6a + 2b = -1$. Multiply (2) by -2 and add to (3) to get $-10a - 5b = 5$, which simplifies to $2a + b = -1$. Solving this 2x2 system gives $a = 1/2$ and $b = -2$. Plugging back into (2) gives $c = 3$.',
    'q36' => '$4g(x) = 4(2x - 1) = 8x - 4$. $f(x+1) = 5(x+1)^2 + 3(x+1) - 12 = 5(x^2 + 2x + 1) + 3x + 3 - 12 = 5x^2 + 13x - 4$. $(8x - 4) - (5x^2 + 13x - 4) = 8x - 4 - 5x^2 - 13x + 4 = -5x^2 - 5x$.',
    'q37_period' => 'The graph $B(t)$ completes one full cycle from low tide ($t=0$) to low tide ($t=12$). The period is 12 hours.',
    'q37_equation' => 'Midline $c = (5+0)/2 = 2.5$. Amplitude $|a| = (5-0)/2 = 2.5$. $b = 2\pi/12 = \pi/6$. Since it starts at a minimum, $a = -2.5$. Equation is $B(t) = -2.5\cos(\frac{\pi}{6}t) + 2.5$.',
    'q37_lowtide' => 'The function is $D(t) = 8\cos(\frac{\pi}{6}t) + 16.5$. The midline is $16.5$ and the amplitude is $8$. The low tide is the minimum value: $\text{Midline} - \text{Amplitude} = 16.5 - 8 = 8.5$ feet.'
];


// --- Page Variables for Header/Footer ---
$pageTitle = "Algebra 2 Test (Full Exam)";
$pageDescription = "An interactive, one-question-at-a-time practice test for the NY Regents Algebra II Exam.";
$pageKeywords = "algebra 2, regents, exam, practice test, math, high school, interactive, quiz";
$pageAuthor = "Hesten Allison"; // Author from footer
$welcomeMessage = "Algebra 2 Practice";
$welcomeParagraph = "Welcome to the Algebra 2 full exam practice test. This test is one question at a time. Good luck!";


// Include the header
include '..\src\header.php'; 
?>

<!-- Custom styles for this specific page -->
<style>
    /* ... (previous styles are unchanged) ... */
    .correct { border-left: 4px solid #22c55e; background-color: var(--color-content-bg, #f0fdf4); }
    .incorrect { border-left: 4px solid #ef4444; background-color: var(--color-content-bg, #fef2f2); }
    .for-review { border-left: 4px solid #60a5fa; background-color: var(--color-content-bg, #f5f9ff); }
    .correct-text { color: #166534; }
    .dark .correct-text { color: #6ee7b7; }
    .incorrect-text { color: #b91c1c; }
    .dark .incorrect-text { color: #fca5a5; }
    .question-answered input, .question-answered textarea { pointer-events: none; background-color: var(--color-base-bg, #f9fafb); opacity: 0.7; }
    .question-answered .radio-label { pointer-events: none; cursor: default; }
    code { font-family: monospace; background-color: var(--color-base-bg, #f3f4f6); color: var(--color-primary, #4F46E5); padding: 2px 6px; border-radius: 4px; font-size: 0.95em; }
    .dark code { color: var(--color-accent, #A5B4FC); }

    /* New styles for hints and explanations */
    .question-hint, .question-explanation {
        background-color: var(--color-base-bg, #f8f9fa);
        border: 1px solid var(--color-secondary, #e0e0e0);
        border-left-width: 4px;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-top: 1rem;
        font-size: 0.95em;
    }
    .question-hint { border-left-color: var(--color-accent, #60A5FA); }
    .question-explanation { border-left-color: var(--color-primary, #1D4ED8); }

    /* Summary Table Styles */
    #summary-table-container {
        max-height: 400px;
        overflow-y: auto;
        border: 1px solid var(--color-accent, #ddd);
        border-radius: 0.5rem;
    }
    .summary-row {
        display: grid;
        grid-template-columns: 1fr 2fr;
        border-bottom: 1px solid var(--color-accent, #ddd);
        padding: 0.75rem;
    }
    .summary-row:last-child { border-bottom: none; }
    .summary-row-q { font-weight: 600; color: var(--color-primary); }
    .summary-row-a { display: flex; flex-direction: column; gap: 0.25rem; }
    .summary-row-a .user-answer.correct-text { color: #166534 !important; }
    .summary-row-a .user-answer.incorrect-text { color: #b91c1c !important; }
    .dark .summary-row-a .user-answer.correct-text { color: #6ee7b7 !important; }
    .dark .summary-row-a .user-answer.incorrect-text { color: #fca5a5 !important; }

</style>

<!-- Page Content -->
<main class="bg-base-bg p-4 md:p-8">

    <div class="max-w-3xl mx-auto bg-content-bg text-text-default p-6 md:p-10 rounded-lg shadow-xl">

        <h1 class="text-3xl font-bold text-primary mb-2">Algebra 2 Test</h1>
        <p class="text-text-secondary mb-6">Based on the NY Regents Algebra II Exam (August 2025)</p>
        
        <!-- Progress Bar and Timer -->
        <div class="mb-8">
            <div class="flex justify-between mb-2">
                <span class="text-base font-medium text-primary">Progress</span>
                <span class="text-base font-medium text-primary" id="stopwatch">00:00:00</span>
            </div>
            <div class="flex justify-between mb-1">
                <span class="text-sm font-medium text-primary" id="progress-text">Question 1 of 37</span>
                <span class="text-sm font-medium text-primary" id="hints-used-counter">Hints used: 0</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-primary h-2.5 rounded-full" style="width: 0%" id="progress-bar"></div>
            </div>
        </div>


        <!-- --- RESULTS BLOCK (Initially Hidden) --- -->
        <div id="results-container" class="bg-blue-100 border-l-4 border-blue-500 text-blue-800 p-6 rounded-md mb-8 shadow-sm hidden">
            <h2 class="text-2xl font-bold mb-4">Test Complete!</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6 text-center">
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="text-sm font-medium text-gray-500">Score</div>
                    <div class="text-2xl font-bold text-primary"><span id="final-score">0</span> / <?php echo count($answerKey); ?></div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="text-sm font-medium text-gray-500">Percentage</div>
                    <div class="text-2xl font-bold text-primary"><span id="final-percentage">0</span>%</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="text-sm font-medium text-gray-500">Time Taken</div>
                    <div class="text-2xl font-bold text-primary" id="final-time">00:00:00</div>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <div class="text-sm font-medium text-gray-500">Hints Used</div>
                    <div class="text-2xl font-bold text-primary" id="final-hints">0</div>
                </div>
            </div>

            <h3 class="text-xl font-bold text-blue-800 mb-2">Answer Summary</h3>
            <div id="summary-table-container" class="bg-white rounded-lg shadow mb-6">
                <!-- Summary rows will be injected here by JS -->
            </div>

            <div class="flex flex-col md:flex-row gap-4">
                <a href="" class="w-full text-center bg-gray-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 text-lg">Take Again</a>
                <button id="download-results-btn" type="button" class="w-full bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-md hover:bg-green-700 transition duration-300 text-lg">
                    <i class="fas fa-download mr-2"></i>Download Results
                </button>
            </div>
        </div>

        <!-- --- QUIZ CONTENT WRAPPER --- -->
        <div id="quiz-content-wrapper">
            <h2 id="question-part-title" class="text-2xl font-semibold text-text-default border-b-2 border-gray-200 pb-2 mb-6">Part I: Multiple Choice</h2>

            <!-- Question 1 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q1">
                <p class="font-semibold text-lg mb-3">1. What is the seventh term of the sequence <code>-2, 6, -18, 54, ...</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q1" value="1" class="mr-2"><code>-1458</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q1" value="2" class="mr-2"><code>-4374</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q1" value="3" class="mr-2"><code>1458</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q1" value="4" class="mr-2"><code>4374</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 2 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q2">
                <p class="font-semibold text-lg mb-3">2. Given <code>x &ne; 0</code>, where <code>m(x) = 12x<sup>8a</sup></code> and <code>p(x) = 3x<sup>2a</sup></code>, the expression <code>m(x) / p(x)</code> is equivalent to:</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q2" value="1" class="mr-2"><code>9x<sup>4a</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q2" value="2" class="mr-2"><code>4x<sup>6a</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q2" value="3" class="mr-2"><code>4x<sup>6</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q2" value="4" class="mr-2"><code>4x<sup>4</sup></code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 3 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q3">
                <p class="font-semibold text-lg mb-3">3. What is the inverse of <code>f(x) = 2x + 6</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q3" value="1" class="mr-2"><code>f<sup>-1</sup>(x) = -2(x + 3)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q3" value="2" class="mr-2"><code>f<sup>-1</sup>(x) = x - 3</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q3" value="3" class="mr-2"><code>f<sup>-1</sup>(x) = x/2 - 3</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q3" value="4" class="mr-2"><code>f<sup>-1</sup>(x) = x/2 + 3</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 4 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q4">
                <p class="font-semibold text-lg mb-3">4. The expression <code>&sup3;&radic;(16x<sup>6</sup>)</code> is equivalent to:</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q4" value="1" class="mr-2"><code>4x<sup>3</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q4" value="2" class="mr-2"><code>4x<sup>2</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q4" value="3" class="mr-2"><code>2x<sup>2</sup>&sup3;&radic;2</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q4" value="4" class="mr-2"><code>2x<sup>3</sup>&sup3;&radic;2</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 5 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q5">
                <p class="font-semibold text-lg mb-3">5. Mary would like to determine if there is an association between a student's height and their shoe size. She measures the height and shoe size of every 10th person entering her school. This is an example of:</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q5" value="1" class="mr-2">a census</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q5" value="2" class="mr-2">an observational study</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q5" value="3" class="mr-2">a simulation</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q5" value="4" class="mr-2">a controlled experiment</label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 6 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q6">
                <p class="font-semibold text-lg mb-3">6. For all values for which the expressions are defined, which expression can <strong>not</strong> be rewritten as <code>(x - 6)(x + 2)</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q6" value="1" class="mr-2"><code>( (x + 2)(x<sup>2</sup> - 2x - 24) ) / (x + 4)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q6" value="2" class="mr-2"><code>x(x + 2) - 6(x + 2)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q6" value="3" class="mr-2"><code>( (x - 2)(x<sup>2</sup> - 4x - 12) ) / (x - 6)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q6" value="4" class="mr-2"><code>(x + 4)(x - 2) - 2(3x + 2)</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 7 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q7">
                <p class="font-semibold text-lg mb-3">7. The number of hours in the lifespan of a certain brand of light bulb is normally distributed with a mean of 2387 hours and a standard deviation of 238 hours. To the nearest tenth of a percent, what percent of light bulbs have a lifespan of greater than 2750 hours?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q7" value="1" class="mr-2">6.4%</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q7" value="2" class="mr-2">15.9%</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q7" value="3" class="mr-2">43.6%</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q7" value="4" class="mr-2">93.6%</label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 8 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q8">
                <p class="font-semibold text-lg mb-3">8. The solution set to the equation <code>2/x<sup>3</sup> + 1/x = 6/x<sup>3</sup></code> is:</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q8" value="1" class="mr-2"><code>{-2, 0, 2}</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q8" value="2" class="mr-2"><code>{2}</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q8" value="3" class="mr-2"><code>{-2, 2}</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q8" value="4" class="mr-2"><code>{0, 2}</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 9 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q9">
                <p class="font-semibold text-lg mb-3">9. What is the solution to <code>9(e<sup>x-2</sup>) = 36</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q9" value="1" class="mr-2"><code>x = ln(36) / ln(9e) + 2</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q9" value="2" class="mr-2"><code>x = ln(4) - 2</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q9" value="3" class="mr-2"><code>x = ln(4) + 2</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q9" value="4" class="mr-2"><code>x = ln(4/e) + 2</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 10 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q10">
                <p class="font-semibold text-lg mb-3">10. Reynaldo got a score of 40 on his first test. If he gets a score of 100 on every additional test, which equation can be used to determine the number of additional tests, <code>x</code>, he would need to take in order to raise his test average to an 80?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q10" value="1" class="mr-2"><code>(40 + 100x) / (x + 1) = 80</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q10" value="2" class="mr-2"><code>(40 + 100x) / x = 80</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q10" value="3" class="mr-2"><code>(40 + 100 + x) / x = 80</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q10" value="4" class="mr-2"><code>(40 + 100 + x) / (x + 1) = 80</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 11 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q11">
                <p class="font-semibold text-lg mb-3">11. Given <code>f(x) = ln(x + 5)</code>, what is the smallest integer value of <code>x</code> for which <code>f(x)</code> is defined?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q11" value="1" class="mr-2">-5</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q11" value="2" class="mr-2">-4</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q11" value="3" class="mr-2">-1</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q11" value="4" class="mr-2">0</label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 12 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q12">
                <p class="font-semibold text-lg mb-3">12. Which expression is equivalent to <code>(6x<sup>3</sup> + 7x<sup>2</sup> - 9x - 1) / (2x - 1)</code> when <code>x &ne; 1/2</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q12" value="1" class="mr-2"><code>3x<sup>2</sup> - 2x - 4</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q12" value="2" class="mr-2"><code>3x<sup>2</sup> + 5x - 7 - 8/(2x - 1)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q12" value="3" class="mr-2"><code>3x<sup>2</sup> + 2x + 5 - 6/(2x - 1)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q12" value="4" class="mr-2"><code>3x<sup>2</sup> + 5x - 2 - 3/(2x - 1)</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 13 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q13">
                <p class="font-semibold text-lg mb-3">13. A sketch for <code>p(x)</code> is shown (see PDF), where <code>a > 0</code> and <code>b > 0</code>. The graph has roots at <code>-a</code> (tangent) and <code>b</code> (crosses). An equation for <code>p(x)</code> could be:</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q13" value="1" class="mr-2"><code>p(x) = (x + a)(x - b)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q13" value="2" class="mr-2"><code>p(x) = (x + a)<sup>2</sup>(x - b)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q13" value="3" class="mr-2"><code>p(x) = (x - a)(x + b)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q13" value="4" class="mr-2"><code>p(x) = (x - a)<sup>2</sup>(x + b)</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 14 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q14">
                <p class="font-semibold text-lg mb-3">14. If <code>f(x) = (1/2)x<sup>3</sup> + 3x<sup>2</sup> - 4x</code> and <code>g(x) = 5 log<sub>3</sub>(x + 10)</code>, then which value, rounded to the nearest tenth, is <strong>not</strong> a solution to <code>f(x) = g(x)</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q14" value="1" class="mr-2">-6.9</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q14" value="2" class="mr-2">-1.4</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q14" value="3" class="mr-2">2.2</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q14" value="4" class="mr-2">9.8</label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 15 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q15">
                <p class="font-semibold text-lg mb-3">15. The graph of <code>f(x)</code> is shown (see PDF). Which graph represents <code>f(x + 3)</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q15" value="1" class="mr-2">Graph (1) - Shift Left</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q15" value="2" class="mr-2">Graph (2) - Shift Right</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q15" value="3" class="mr-2">Graph (3) - Shift Up</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q15" value="4" class="mr-2">Graph (4) - Shift Down</label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 16 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q16">
                <p class="font-semibold text-lg mb-3">16. What is one solution to the system of equations shown below?
                <br><code>x<sup>2</sup> + y<sup>2</sup> = 20</code>
                <br><code>y = x - 6</code></p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q16" value="1" class="mr-2"><code>x = 2</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q16" value="2" class="mr-2"><code>(4, -2)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q16" value="3" class="mr-2"><code>y = 4</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q16" value="4" class="mr-2"><code>(4, 2)</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 17 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q17">
                <p class="font-semibold text-lg mb-3">17. At a high school, 10th-grade students were surveyed (see PDF table). What is the probability that a randomly selected 10th-grade student from the school walks to school <strong>or</strong> eats breakfast?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q17" value="1" class="mr-2">0.07</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q17" value="2" class="mr-2">0.70</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q17" value="3" class="mr-2">0.77</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q17" value="4" class="mr-2">0.84</label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 18 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q18">
                <p class="font-semibold text-lg mb-3">18. A vehicle's depreciation rate is 9.2% per year. If a vehicle costs $34,950, then which recursive formula models the value of the vehicle <code>n</code> years after it was purchased?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q18" value="1" class="mr-2"><code>a<sub>n</sub> = 34,950(1.092)<sup>n</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q18" value="2" class="mr-2"><code>a<sub>n</sub> = 34,950(0.921)<sup>n</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q18" value="3" class="mr-2"><code>a<sub>0</sub> = 34,950; a<sub>n</sub> = 1.092a<sub>n-1</sub></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q18" value="4" class="mr-2"><code>a<sub>0</sub> = 34,950; a<sub>n</sub> = 0.908a<sub>n-1</sub></code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 19 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q19">
                <p class="font-semibold text-lg mb-3">19. When factored completely, <code>(3x - 1)<sup>2</sup> - 5(3x - 1) + 6</code> is equivalent to:</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q19" value="1" class="mr-2"><code>(3x - 3)(3x - 4)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q19" value="2" class="mr-2"><code>3x(3x - 7)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q19" value="3" class="mr-2"><code>3(x - 1)(3x - 4)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q19" value="4" class="mr-2"><code>(3x + 1)(3x - 2)</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 20 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q20">
                <p class="font-semibold text-lg mb-3">20. Given <code>E(t) = 26(2)<sup>t/20</sup></code> represents the mass, in grams, of a substance after <code>t</code> minutes. Which statement or statements must be true?
                <br>I. The initial mass of the substance is 26 grams.
                <br>II. The mass of the substance doubles every 20 days.
                <br>III. The mass of the substance after 3 hours is approximately 29 grams.</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q20" value="1" class="mr-2">I, only</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q20" value="2" class="mr-2">III, only</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q20" value="3" class="mr-2">I and II, only</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q20" value="4" class="mr-2">I and III, only</label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 21 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q21">
                <p class="font-semibold text-lg mb-3">21. For <code>x > 0</code>, which expression is equivalent to <code>&sup3;&radic;(9x<sup>2</sup>) &bull; &radic;(9x)</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q21" value="1" class="mr-2"><code>9<sup>5</sup>x<sup>7/2</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q21" value="2" class="mr-2"><code>9<sup>6</sup>x<sup>3</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q21" value="3" class="mr-2"><code>9<sup>1/6</sup>x<sup>1/3</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q21" value="4" class="mr-2"><code>9<sup>5/6</sup>x<sup>7/6</sup></code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 22 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q22">
                <p class="font-semibold text-lg mb-3">22. The number of people who have read an article grows exponentially... <code>N(t) = 2(1.0098)<sup>t</sup></code>, where <code>t</code> represents minutes. Which equation best represents the number of people who have read the article in terms of the growth rate per second?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q22" value="1" class="mr-2"><code>N(t) = 2(1.000163)<sup>t/60</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q22" value="2" class="mr-2"><code>N(t) = 2(1.000163)<sup>60t</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q22" value="3" class="mr-2"><code>N(t) = 2(1.79524)<sup>t/60</sup></code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q22" value="4" class="mr-2"><code>N(t) = 2(1.79524)<sup>60t</sup></code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 23 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q23">
                <p class="font-semibold text-lg mb-3">23. Which equation represents a parabola with focus <code>(2, -5)</code> and directrix <code>y = 3</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q23" value="1" class="mr-2"><code>(x - 2)<sup>2</sup> = -16(y + 1)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q23" value="2" class="mr-2"><code>(x - 2)<sup>2</sup> = -16(y - 1)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q23" value="3" class="mr-2"><code>(x + 2)<sup>2</sup> = -16(y - 1)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q23" value="4" class="mr-2"><code>(x - 2)<sup>2</sup> = 16(y + 1)</code></label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 24 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-part="Part II" data-key="q24">
                <p class="font-semibold text-lg mb-3">24. Which graph (see PDF) shows a fourth-degree polynomial function with exactly two imaginary roots?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q24" value="1" class="mr-2">Graph (1)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q24" value="2" class="mr-2">Graph (2)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q24" value="3" class="mr-2">Graph (3)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q24" value="4" class="mr-2">Graph (4)</label>
                </div>
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>


            <!-- Question 25 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q25">
                <p class="font-semibold text-lg mb-3">25. Seniors were surveyed (see PDF table). Determine the exact probability that a randomly selected senior from the survey preferred a hoodie, <strong>given that</strong> the senior wanted a design on the back.</p>
                <label for="q25" class="block text-sm font-medium text-text-secondary mb-1">Your answer (as a fraction or decimal):</label>
                <input type="text" id="q25" name="q25" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 26 -->
            <div class="question-container mb-8 p-4 rounded-md hidden for-review" data-key="q26_review">
                <p class="font-semibold text-lg mb-3">26. (For Review) Sketch <code>g(x) = -x<sup>3</sup> - 7x<sup>2</sup> + 36</code> on the axes, including appropriate end behavior and zeros.</p>
                <p class="text-text-secondary">This question requires graphing and will not be graded by the script. Please check your graph against the answer key (Zeros: -6, -3, 2. End behavior: Up on left, Down on right).</p>
                <div class="question-controls mt-4">
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300">Next</button>
                </div>
            </div>

            <!-- Question 27 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q27">
                <p class="font-semibold text-lg mb-3">27. Express <code>8xi<sup>10</sup> - 4yi<sup>19</sup> + 2yi<sup>3</sup> - 6xi</code> in simplest form, where <code>i</code> is the imaginary unit.</p>
                <label for="q27" class="block text-sm font-medium text-text-secondary mb-1">Your answer (in a+bi form):</label>
                <input type="text" id="q27" name="q27" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 28 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q28">
                <p class="font-semibold text-lg mb-3">28. The job satisfaction rating at a company is normally distributed with a mean of 12. About 95% of the scores are between 8 and 16. What is the standard deviation of this distribution? Justify your answer.</p>
                <label for="q28" class="block text-sm font-medium text-text-secondary mb-1">Your answer (standard deviation):</label>
                <input type="text" id="q28" name="q28" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 29 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q29">
                <p class="font-semibold text-lg mb-3">29. An angle, <code>&theta;</code>, is drawn in standard position and terminates in Quadrant III. Given <code>cos &theta; = -(&radic;10) / 10</code>, determine the value of <code>tan &theta;</code>.</p>
                <label for="q29" class="block text-sm font-medium text-text-secondary mb-1">Your answer:</label>
                <input type="text" id="q29" name="q29" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 30 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q30">
                <p class="font-semibold text-lg mb-3">30. Solve algebraically for all values of <code>x</code>: &nbsp; <code>&radic;(x + 5) - x = 3</code></p>
                <label for="q30" class="block text-sm font-medium text-text-secondary mb-1">Your answer (x):</label>
                <input type="text" id="q30" name="q30" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 31 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-part="Part III" data-key="q31">
                <p class="font-semibold text-lg mb-3">31. Use the geometric series formula to determine the total 30-year earnings for an employee whose first-year salary is $42,000 and earns an annual raise of 3%, rounded to the nearest thousand dollars.</p>
                <label for="q31" class="block text-sm font-medium text-text-secondary mb-1">Your answer (total earnings):</label>
                <input type="text" id="q31" name="q31" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 32 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q32">
                <p class="font-semibold text-lg mb-3">32. Algebraically determine the solution(s) to the equation <code>2x<sup>2</sup> = 2x - 1</code>, in simplest <code>a + bi</code> form.</p>
                <label for="q32" class="block text-sm font-medium text-text-secondary mb-1">Your answer (e.g., 1+2i, 1-2i):</label>
                <input type="text" id="q32" name="q32" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 33 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q33a,q33b">
                <p class="font-semibold text-lg mb-3">33. The GDP per capita, y, x years after 1990 is listed in the table (see PDF).</p>
                <label for="q33a" class="block text-sm font-medium text-text-secondary mb-1">(a) Write an exponential regression equation. Round all coefficients to the nearest hundredth.</label>
                <input type="text" id="q33a" name="q33a" class="w-full p-2 border border-gray-300 rounded-md shadow-sm mb-2 bg-white dark:bg-gray-800 dark:border-gray-600" placeholder="e.g., y=1000(1.05)^x">
                <label for="q33b" class="block text-sm font-medium text-text-secondary mb-1 mt-4">(b) Use the rounded equation to determine, to the nearest tenth of a year, when GDP per capita was $15,000.</label>
                <input type="text" id="q33b" name="q33b" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600" placeholder="e.g., 25.3">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 34 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q34_factor,q34_zeros">
                <p class="font-semibold text-lg mb-3">34. Consider <code>f(x) = x<sup>3</sup> + 3x<sup>2</sup> - 2x - 6</code>.</p>
                <label for="q34_factor" class="block text-sm font-medium text-text-secondary mb-1">Is <code>(x + 3)</code> a factor of <code>f(x)</code>? Justify your answer.</label>
                <input type="text" id="q34_factor" name="q34_factor" class="w-full p-2 border border-gray-300 rounded-md shadow-sm mb-2 bg-white dark:bg-gray-800 dark:border-gray-600" placeholder="Yes/No and justification">
                <label for="q34_zeros" class="block text-sm font-medium text-text-secondary mb-1 mt-4">Determine all zeros of <code>f(x)</code>.</label>
                <input type="text" id="q34_zeros" name="q34_zeros" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600" placeholder="e.g., -1, 2, 3">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 35 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-part="Part IV" data-key="q35">
                <p class="font-semibold text-lg mb-3">35. Solve the system algebraically:
                <br><code>2a + b - c = -4</code>
                <br><code>4a + b + c = 3</code>
                <br><code>-2a - 3b + 2c = 11</code></p>
                <label for="q35" class="block text-sm font-medium text-text-secondary mb-1">Your answer (e.g., a=1, b=2, c=3):</label>
                <input type="text" id="q35" name="q35" class="w-full p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 36 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q36">
                <p class="font-semibold text-lg mb-3">36. Given: <code>f(x) = 5x<sup>2</sup> + 3x - 12</code> and <code>g(x) = 2x - 1</code>. Express <code>4g(x) - [f(x + 1)]</code> as a polynomial in standard form.</p>
                <label for="q36" class="block text-sm font-medium text-text-secondary mb-1">Your answer (polynomial in standard form):</label>
                <input type="text" id="q36" name="q36" class="w-full p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

            <!-- Question 37 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q37_period,q37_equation,q37_lowtide">
                <p class="font-semibold text-lg mb-3">37. The graph of tides <code>B(t)</code> is shown (see PDF).</p>
                <label for="q37_period" class="block text-sm font-medium text-text-secondary mb-1">State the period of <code>B(t)</code>, in hours.</label>
                <input type="text" id="q37_period" name="q37_period" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm mb-2 bg-white dark:bg-gray-800 dark:border-gray-600" placeholder="e.g., 12">
                
                <label for="q37_equation" class="block text-sm font-medium text-text-secondary mb-1 mt-4">Write an equation for <code>B(t)</code> in the form <code>B(t) = a cos(bt) + c</code>.</label>
                <input type="text" id="q37_equation" name="q37_equation" class="w-full p-2 border border-gray-300 rounded-md shadow-sm mb-2 bg-white dark:bg-gray-800 dark:border-gray-600" placeholder="e.g., -5cos(pi/8*t)+5">
                
                <p class="font-semibold text-lg mb-3 mt-4">In Derby, Australia, the tide is modeled by <code>D(t) = 8cos(&pi;/6 * t) + 16.5</code>. (Graphing this is for review).</p>
                <label for="q37_lowtide" class="block text-sm font-medium text-text-secondary mb-1">State the height, in feet, of the low tide in Derby.</label>
                <input type="text" id="q37_lowtide" name="q37_lowtide" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600" placeholder="e.g., 8.5">
                
                <div class="question-hint hidden"></div>
                <div class="question-feedback mt-4 p-4 rounded-md hidden"></div>
                <div class="question-explanation hidden"></div>
                <div class="question-controls mt-4 flex gap-2">
                    <button type="button" class="hint-btn bg-yellow-500 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-yellow-600 transition duration-300"><i class="fas fa-lightbulb mr-1"></i> Hint</button>
                    <button type="button" class="check-answer-btn bg-primary text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-secondary transition duration-300 hidden">Check Answer</button>
                    <button type="button" class="explain-btn bg-blue-400 text-white font-bold py-2 px-4 rounded-lg shadow-md hover:bg-blue-500 transition duration-300 hidden">Explain</button>
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300 hidden">Next</button>
                </div>
            </div>

        </div> <!-- End #quiz-content-wrapper -->
    </div>

    <script>
        // --- Pass Data from PHP to JS ---
        const answerKeyJS = <?php echo json_encode($answerKey); ?>;
        const hintsJS = <?php echo json_encode($questionHints); ?>;
        const explanationsJS = <?php echo json_encode($questionExplanations); ?>;
        const gradableQuestionsCount = <?php echo count($answerKey); ?>;

        // --- Helper functions ---
        function normalize(val) {
            if (typeof val !== 'string') val = String(val);
            val = val.toLowerCase().trim();
            val = val.replace(/\s+/g, ''); // Remove all spaces
            val = val.replace(/sqrt/g, 'sqrt'); // Keep sqrt
            val = val.replace(/pi/g, 'pi');
            val = val.endsWith(',') ? val.slice(0, -1) : val; // Remove trailing comma
            return val;
        }

        // Custom normalizer for comma-separated lists (e.g., roots)
        function normalizeSet(val) {
            if (typeof val !== 'string') val = String(val);
            val = val.toLowerCase().trim();
            val = val.replace(/\s+/g, '');
            val = val.replace(/sqrt/g, 'sqrt');
            const parts = val.split(',').sort();
            return parts.join(',');
        }
        
        // Custom normalizer for justification
        function normalize_q34_factor(val) {
            val = val.toLowerCase().trim();
            if (val.includes('yes') && (val.includes('f(-3)=0') || val.includes('remainder is 0'))) {
                return 'yes';
            }
            return normalize(val);
        }

        function formatTime(totalSeconds) {
            const hours = Math.floor(totalSeconds / 3600);
            const minutes = Math.floor((totalSeconds % 3600) / 60);
            const seconds = totalSeconds % 60;
            return [hours, minutes, seconds]
                .map(v => v < 10 ? "0" + v : v)
                .join(":");
        }
        
        document.addEventListener('DOMContentLoaded', () => {
            // --- Quiz Elements ---
            const questions = document.querySelectorAll('.question-container');
            const totalQuestions = questions.length;
            const resultsContainer = document.getElementById('results-container');
            const quizContentWrapper = document.getElementById('quiz-content-wrapper');
            const partTitle = document.getElementById('question-part-title');
            
            // --- Progress & Timer Elements ---
            const progressBar = document.getElementById('progress-bar');
            const progressText = document.getElementById('progress-text');
            const stopwatchEl = document.getElementById('stopwatch');
            const hintsCounterEl = document.getElementById('hints-used-counter');

            // --- State Variables ---
            let currentQuestionIndex = 0;
            let score = 0;
            let hintsUsed = 0;
            let totalSeconds = 0;
            let timerInterval = null;
            let userAnswers = {};
            let questionResults = {};
            let questionNames = {}; // To store question text for summary

            // --- Timer Functions ---
            function startTimer() {
                stopwatchEl.textContent = formatTime(totalSeconds);
                timerInterval = setInterval(() => {
                    totalSeconds++;
                    stopwatchEl.textContent = formatTime(totalSeconds);
                }, 1000);
            }

            function stopTimer() {
                clearInterval(timerInterval);
            }

            // --- Quiz Flow Functions ---
            function showQuestion(index) {
                questions.forEach(q => q.classList.add('hidden'));

                if (index < totalQuestions) {
                    const question = questions[index];
                    question.classList.remove('hidden');

                    if (question.dataset.part) {
                        partTitle.textContent = question.dataset.part;
                    }
                    
                    const questionNumber = index + 1;
                    const progressPercent = (questionNumber / totalQuestions) * 100;
                    progressBar.style.width = `${progressPercent}%`;
                    progressText.textContent = `Question ${questionNumber} of ${totalQuestions}`;

                } else {
                    showResults();
                }
            }

            function attachListeners(question, index) {
                const inputs = question.querySelectorAll('input[type="radio"], input[type="text"], textarea');
                const checkBtn = question.querySelector('.check-answer-btn');
                const nextBtn = question.querySelector('.next-question-btn');
                const hintBtn = question.querySelector('.hint-btn');
                const hintEl = question.querySelector('.question-hint');
                const explainBtn = question.querySelector('.explain-btn');
                const explainEl = question.querySelector('.question-explanation');

                // Store question text for summary
                const qText = question.querySelector('p').textContent.substring(0, 50) + "..."; // Get first 50 chars
                questionNames[index] = qText;

                // Enable check button
                if (checkBtn) {
                    const enableCheckButton = () => {
                        if (inputs.length > 0 && (inputs[0].type === 'text' || inputs[0].type === 'textarea')) {
                            let allFilled = true;
                            inputs.forEach(input => {
                                if (input.value.trim() === '') allFilled = false;
                            });
                            if (allFilled) checkBtn.classList.remove('hidden');
                        } else {
                             // For radio buttons, check if one is selected
                            let oneChecked = false;
                            inputs.forEach(input => {
                                if (input.checked) oneChecked = true;
                            });
                            if (oneChecked) checkBtn.classList.remove('hidden');
                        }
                    };
                    inputs.forEach(input => {
                        input.addEventListener('input', enableCheckButton);
                        input.addEventListener('change', enableCheckButton);
                    });
                    checkBtn.addEventListener('click', () => checkAnswer(question, index));
                }
                
                // Next button
                if (nextBtn) {
                    nextBtn.addEventListener('click', () => {
                        currentQuestionIndex++;
                        showQuestion(currentQuestionIndex);
                    });
                }

                // Hint button
                if (hintBtn && hintEl) {
                    hintBtn.addEventListener('click', () => {
                        const keys = question.dataset.key.split(',');
                        let hintHTML = '<ul>';
                        keys.forEach(key => {
                            if (hintsJS[key]) {
                                hintHTML += `<li class="mt-2"><strong>Hint for ${key}:</strong> ${hintsJS[key]}</li>`;
                            }
                        });
                        hintHTML += '</ul>';
                        hintEl.innerHTML = hintHTML || "No hint available for this question.";
                        hintEl.classList.remove('hidden');
                        hintBtn.classList.add('hidden');
                        hintsUsed++;
                        hintsCounterEl.textContent = `Hints used: ${hintsUsed}`;
                    });
                }
                
                // Explain button
                if (explainBtn && explainEl) {
                    explainBtn.addEventListener('click', () => {
                        const keys = question.dataset.key.split(',');
                        let explanationHTML = '<ul>';
                        keys.forEach(key => {
                            if (explanationsJS[key]) {
                                explanationHTML += `<li class="mt-2"><strong>Explanation for ${key}:</strong> ${explanationsJS[key]}</li>`;
                            }
                        });
                        explanationHTML += '</ul>';
                        
                        explainEl.innerHTML = explanationHTML || "No explanation available.";
                        explainEl.classList.remove('hidden');
                        explainBtn.classList.add('hidden');
                    });
                }
            }

            function checkAnswer(question, index) {
                const keys = question.dataset.key.split(',');
                const feedbackEl = question.querySelector('.question-feedback');
                let allCorrect = true;
                let feedbackHTML = '<ul class="space-y-2">';
                
                let answerObj = {};

                keys.forEach(key => {
                    const input = question.querySelector(`[name="${key}"]`);
                    if (!input) return;

                    let userAnswer;
                    if (input.type === 'radio') {
                        const checkedRadio = question.querySelector(`input[name="${key}"]:checked`);
                        userAnswer = checkedRadio ? checkedRadio.value : '';
                    } else {
                        userAnswer = input.value;
                    }
                    
                    answerObj[key] = userAnswer; // Store user answer

                    const correctAnswer = answerKeyJS[key];
                    let userNormalized, correctNormalized;

                    // Apply specific normalization
                    if (key === 'q32' || key === 'q34_zeros') {
                        userNormalized = normalizeSet(userAnswer);
                        correctNormalized = normalizeSet(correctAnswer);
                    } else if (key === 'q34_factor') {
                        userNormalized = normalize_q34_factor(userAnswer);
                        correctNormalized = normalize(correctAnswer);
                    } else {
                        userNormalized = normalize(userAnswer);
                        correctNormalized = normalize(correctAnswer);
                    }
                    
                    let isCorrect = (userNormalized === correctNormalized);
                    
                    // Special check for q25 (fraction/decimal)
                    if (key === 'q25') {
                        if (userNormalized === '3/4' || userNormalized === '0.75' || userNormalized === '45/60') {
                            isCorrect = true;
                        }
                    }

                    if (isCorrect) {
                        feedbackHTML += `<li class="correct-text font-semibold"><i class="fas fa-check-circle mr-2"></i>Part "${key}" is correct!</li>`;
                    } else {
                        allCorrect = false;
                        feedbackHTML += `<li class="incorrect-text font-semibold"><i class="fas fa-times-circle mr-2"></i>Part "${key}" is incorrect. The correct answer is: ${correctAnswer}</li>`;
                    }
                });
                
                userAnswers[index] = answerObj; // Store answers for summary
                questionResults[index] = allCorrect ? 'correct' : 'incorrect';
                
                feedbackHTML += '</ul>';
                feedbackEl.innerHTML = feedbackHTML;
                feedbackEl.classList.remove('hidden');

                if (allCorrect) {
                    score++;
                    question.classList.add('correct');
                } else {
                    question.classList.add('incorrect');
                    question.querySelector('.explain-btn').classList.remove('hidden'); // Show explain button on incorrect
                }
                
                question.classList.add('question-answered');
                question.querySelector('.check-answer-btn').classList.add('hidden');
                question.querySelector('.hint-btn').classList.add('hidden');
                const nextBtn = question.querySelector('.next-question-btn');
                nextBtn.classList.remove('hidden');
                
                if (currentQuestionIndex === totalQuestions - 1) {
                    nextBtn.textContent = 'See Results';
                }
                nextBtn.focus();
            }
            
            function showResults() {
                stopTimer();
                quizContentWrapper.classList.add('hidden');
                resultsContainer.classList.remove('hidden');
                
                const percentage = (score / gradableQuestionsCount) * 100;
                const finalTimeFormatted = formatTime(totalSeconds);
                
                document.getElementById('final-score').textContent = score;
                document.getElementById('final-percentage').textContent = percentage.toFixed(0);
                document.getElementById('final-time').textContent = finalTimeFormatted;
                document.getElementById('final-hints').textContent = hintsUsed;

                // Build Summary Table
                const summaryContainer = document.getElementById('summary-table-container');
                summaryContainer.innerHTML = ''; // Clear previous
                
                questions.forEach((question, index) => {
                    const keys = question.dataset.key.split(',');
                    if (keys[0].includes('_review')) return; // Skip review questions
                    
                    const qNumText = question.querySelector('p').textContent.match(/^(\d+)\./);
                    const qNum = qNumText ? qNumText[1] : (index + 1);
                    const result = questionResults[index];
                    const answers = userAnswers[index];
                    
                    let answerHTML = '';
                    if (answers) {
                        keys.forEach(key => {
                            const userAnswer = answers[key] || "No Answer";
                            const correctAnswer = answerKeyJS[key];
                            
                            // Check correctness for this specific part
                            let isPartCorrect = false;
                            let userNormalized, correctNormalized;
                            if (key === 'q32' || key === 'q34_zeros') {
                                userNormalized = normalizeSet(userAnswer);
                                correctNormalized = normalizeSet(correctAnswer);
                            } else if (key === 'q34_factor') {
                                userNormalized = normalize_q34_factor(userAnswer);
                                correctNormalized = normalize(correctAnswer);
                            } else {
                                userNormalized = normalize(userAnswer);
                                correctNormalized = normalize(correctAnswer);
                            }
                            isPartCorrect = (userNormalized === correctNormalized);
                            if (key === 'q25' && (userNormalized === '3/4' || userNormalized === '0.75' || userNormalized === '45/60')) {
                                isPartCorrect = true;
                            }
                            
                            answerHTML += `
                                <div class="user-answer ${isPartCorrect ? 'correct-text' : 'incorrect-text'}">
                                    <strong>Your Answer (${key}):</strong> ${userAnswer}
                                </div>
                                ${!isPartCorrect ? `<div class="correct-text"><strong>Correct (${key}):</strong> ${correctAnswer}</div>` : ''}
                            `;
                        });
                    } else {
                        answerHTML = `<div class="user-answer incorrect-text"><strong>Your Answer:</strong> No Answer Given</div>`;
                        keys.forEach(key => {
                            answerHTML += `<div class="correct-text"><strong>Correct (${key}):</strong> ${answerKeyJS[key]}</div>`;
                        });
                    }

                    const row = document.createElement('div');
                    row.className = 'summary-row';
                    row.innerHTML = `
                        <div class="summary-row-q">Question ${qNum}</div>
                        <div class="summary-row-a">${answerHTML}</div>
                    `;
                    summaryContainer.appendChild(row);
                });
            }

            function downloadResults() {
                let textContent = "Algebra 2 Test Results\n";
                textContent += "=========================\n\n";
                textContent += `Final Score: ${score} / ${gradableQuestionsCount}\n`;
                textContent += `Percentage: ${document.getElementById('final-percentage').textContent}%\n`;
                textContent += `Time Taken: ${document.getElementById('final-time').textContent}\n`;
                textContent += `Hints Used: ${hintsUsed}\n\n`;
                textContent += "--- Question Summary ---\n\n";

                questions.forEach((question, index) => {
                    const keys = question.dataset.key.split(',');
                    if (keys[0].includes('_review')) return;
                    
                    const qNumText = question.querySelector('p').textContent.match(/^(\d+)\./);
                    const qNum = qNumText ? qNumText[1] : (index + 1);
                    const result = questionResults[index];
                    const answers = userAnswers[index];
                    
                    textContent += `Question ${qNum}: ${result ? result.toUpperCase() : 'SKIPPED'}\n`;
                    
                    if (answers) {
                         keys.forEach(key => {
                            const userAnswer = answers[key] || "No Answer";
                            const correctAnswer = answerKeyJS[key];
                            
                            // Re-check correctness for download
                            let isPartCorrect = false;
                            let userNormalized, correctNormalized;
                            if (key === 'q32' || key === 'q34_zeros') {
                                userNormalized = normalizeSet(userAnswer);
                                correctNormalized = normalizeSet(correctAnswer);
                            } else if (key === 'q34_factor') {
                                userNormalized = normalize_q34_factor(userAnswer);
                                correctNormalized = normalize(correctAnswer);
                            } else {
                                userNormalized = normalize(userAnswer);
                                correctNormalized = normalize(correctAnswer);
                            }
                            isPartCorrect = (userNormalized === correctNormalized);
                            if (key === 'q25' && (userNormalized === '3/4' || userNormalized === '0.75' || userNormalized === '45/60')) {
                                isPartCorrect = true;
                            }

                            textContent += `  - Your Answer (${key}): ${userAnswer}\n`;
                            if (!isPartCorrect) {
                                textContent += `  - Correct Answer (${key}): ${correctAnswer}\n`;
                            }
                         });
                    } else {
                         textContent += `  - You did not provide an answer.\n`;
                         keys.forEach(key => {
                            textContent += `  - Correct Answer (${key}): ${answerKeyJS[key]}\n`;
                         });
                    }
                    textContent += "\n";
                });

                const blob = new Blob([textContent], { type: 'text/plain;charset=utf-8' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'algebra-2-test-results.txt';
                link.style.display = 'none';
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }

            // --- Initialize the Test ---
            document.getElementById('download-results-btn').addEventListener('click', downloadResults);
            questions.forEach(attachListeners);
            showQuestion(currentQuestionIndex);
            startTimer();
        });
    </script>
</main>

<?php
  // Include the footer
  include '..\src\footer.php'; 
?>
