<?php
// --- ANSWER KEY (Will be passed to JavaScript) ---
$answerKey = [
    // Part I (Multiple Choice)
    'q1' => '1', 'q2' => '3', 'q3' => '1', 'q4' => '3', 'q5' => '4', 'q6' => '4', 'q7' => '2', 'q8' => '1', 'q9' => '2', 'q10' => '3', 'q11' => '4', 'q12' => '3', 'q13' => '1', 'q14' => '2', 'q15' => '3', 'q16' => '3', 'q17' => '4', 'q18' => '4', 'q19' => '4', 'q20' => '2', 'q21' => '1', 'q22' => '2', 'q23' => '2', 'q24' => '1',
    // Part II (Constructed Response)
    'q25' => 'translation is a rigid motion', 'q26' => 'Iron', 'q27' => '(3,4)', 'q28' => '7.2', 'q29' => '30', 'q30' => '108',
    // Part III (Constructed Response)
    'q32' => '9', 'q33_dist' => '13', 'q33_angle' => '43',
    // Part IV (Constructed Response)
    'q31' => 'CONSTRUCTION', 'q34' => 'PROOF', 'q35' => 'PROOF'
];

// --- HINTS (Passed to JavaScript) ---
// !-- YOU CAN EDIT THESE HINTS --!
$questionHints = [
    'q1' => 'What 3D shape does a 2D triangle trace when spun around its central axis?',
    'q2' => 'Trace the path of side BD. 90° clockwise maps (x, y) to (y, -x). Reflection over y-axis maps (x, y) to (-x, y).',
    'q3' => 'SOH CAH TOA. You have the hypotenuse and an angle, and you need the side opposite that angle.',
    'q4' => 'The volume of a full sphere is (4/3)πr³. What would a hemisphere be?',
    'q5' => 'What is the special property of a rhombus\'s diagonals that a general parallelogram doesn\'t have?',
    'q6' => 'If HS is parallel to JO, the consecutive angles between them (like ∠J and ∠JHS) are supplementary (add to 180°).',
    'q7' => 'The two triangles, ΔBDE and ΔBAC, are similar. Set up a proportion: BD/BA = DE/AC.',
    'q8' => 'The standard equation of a circle is (x-h)² + (y-k)² = r². Find the center (h, k) and the radius (r) from the graph.',
    'q9' => 'Test the coordinates of one point, like D(2, 2) and its image D\'(-2, -2). Which transformation rule maps (x, y) to (-y, -x)?',
    'q10' => 'Use the secant theorem: (Whole segment) × (External part) = (Whole segment) × (External part). So, PA * PC = PB * PD.',
    'q11' => 'Use alternate interior angles (the "Z" angle) and the definition of an angle bisector to find two equal angles in ΔCDB.',
    'q12' => 'The slope of a perpendicular line is the negative reciprocal of the original slope. Then use point-slope form: y - y₁ = m(x - x₁).',
    'q13' => 'First, find the volume of the pyramid: V = (1/3) * (Base Area) * height. Then use the density formula: Density = Mass / Volume.',
    'q14' => 'The midsegment is half the length of the parallel base. Set up the equation: DE = (1/2)AC.',
    'q15' => 'An isosceles right triangle has angles 45-45-90. The sides are in the ratio x : x : x√2, where x√2 is the hypotenuse.',
    'q16' => 'Use the SAS area formula for a triangle: Area = (1/2)ab * sin(C), where a and b are two sides and C is the included angle.',
    'q17' => 'Use the dilation formula: P\' = C + k(P - C). Or, find the center (0,0) by checking the coordinates: C(5,2) -> T(10,4).',
    'q18' => 'Use the distance formula (or count boxes for horizontal/vertical lines) to find the length of each of the three sides.',
    'q19' => 'Vertical angles (like ∠PEG and ∠FET) are congruent. Use AA similarity to prove ΔPEG ~ ΔFET, then set up the side ratios.',
    'q20' => 'Make sure all units are the same! Convert 4 inches to feet (4/12 = 1/3 ft) before calculating the volume.',
    'q21' => 'A dilation centered at the origin (0,0) with scale factor k transforms a line y=mx+b to y=mx+(k*b). The slope is unchanged!',
    'q22' => 'The rhombus in the picture is centered at the origin (0,0) and has diagonals on the x and y axes. Which transformation doesn\'t use this center?',
    'q23' => 'First find the length of the other leg (HA) using the Pythagorean theorem. Then, use Area = (1/2)(leg1)(leg2) and Area = (1/2)(hypotenuse)(altitude).',
    'q24' => 'The new area is related to the old area by the *square* of the scale factor: Area_new = Area_old * k².',
    'q25' => 'What is a "rigid motion"? What properties (like distance and angle measure) does it preserve?',
    'q26' => 'First, find the volume of the cube (V = s³). Then, use the density formula: Density = Mass / Volume. Match the result to the table.',
    'q27' => 'Use the partitioning formula: x = x₁ + (k/(m+n))(x₂-x₁). Here, the ratio is 3:2, so the fraction k/(m+n) is 3/5.',
    'q28' => 'SOH CAH TOA. You have the Opposite side (0.6) and the angle (4.8°), and you need the Hypotenuse (the ramp).',
    'q29' => 'In an isosceles triangle, base angles are equal. Also, the exterior angle of a triangle (∠KMN) is equal to the sum of the two remote interior angles (∠K and ∠L).',
    'q30' => 'The formula for the area of a sector is: Area_sector = (angle / 360) * (Area_circle). You know the sector area and can find the circle\'s area.',
    'q31' => 'This is a "for review" question. Remember, a reflection creates a mirror image. Every point on the new image (A\') must be the same distance from the line BC as the original point (A).',
    'q32' => 'Find the volume of the tank (1 L = 1000 cm³) and the volume of one bucket (V = πr²h). Be careful to use the radius (10 cm), not the diameter!',
    'q33_dist' => 'First, use tan(50°) = 12/x to find the distance of the shorter cable (x). The longer cable\'s distance is x+3.',
    'q33_angle' => 'After you find the new distance (13), use tan(θ) = 12 / 13 to find the new angle. Use arctan (or tan⁻¹).',
    'q34' => 'This is a "for review" question. To prove it\'s a rectangle, you need to show it\'s a parallelogram with one right angle (slopes of adjacent sides are negative reciprocals).',
    'q35' => 'This is a "for review" question. Use the fact that BFE and AFD bisect each other to show ΔAFE ≅ ΔDFB (SAS), which gives AB || ED. Since ED is part of EC, AB || EC. Also AB ≅ ED. Since DE ≅ DC, AB ≅ DC. A quad with one pair of sides both parallel and congruent is a parallelogram.'
];

// --- EXPLANATIONS (Passed to JavaScript) ---
// !-- YOU CAN EDIT THESE EXPLANATIONS --!
$questionExplanations = [
    'q1' => 'An equilateral triangle is a 2D shape. When it is continuously rotated around one of its altitudes (a line from a vertex to the midpoint of the opposite side), the base sweeps out a circle and the vertex stays at a point. This 3D object is a cone.',
    'q2' => 'Side BD is in quadrant I. A 90° clockwise rotation maps (x, y) to (y, -x), moving the side to quadrant IV. A reflection over the y-axis maps (x, y) to (-x, y), moving the side from quadrant IV to quadrant III. The side in quadrant III corresponding to BD is MQ.',
    'q3' => 'Using SOH CAH TOA in the right triangle, EJ is the side "Opposite" to angle J, and JO is the "Hypotenuse". So, we use sine: sin(J) = Opposite/Hypotenuse. sin(38°) = EJ / 31.8. EJ = 31.8 * sin(38°) ≈ 19.579... which rounds to 19.6.',
    'q4' => 'The volume of a full sphere is V = (4/3)πr³. A hemisphere is half of a sphere, so its volume is V = (1/2) * (4/3)πr³ = (2/3)πr³. Given r = 8 cm, V = (2/3)π(8)³ = (2/3)π(512) ≈ 1072.33 cm³. This rounds to 1072.',
    'q5' => 'All parallelograms have diagonals that bisect each other (Option 1). If diagonals are congruent, it\'s a rectangle (Option 2). If adjacent sides are perpendicular, it\'s a rectangle (Option 3). A rhombus is a parallelogram with perpendicular diagonals (Option 4).',
    'q6' => 'Assuming JOSH is a trapezoid with parallel sides HS and JO. The consecutive angles between the parallel sides are supplementary. m∠O + m∠HSO = 180°. 30° + m∠HSO = 180°. m∠HSO = 150°. We are given m∠OSA = 80°. m∠HSA = m∠HSO - m∠OSA = 150° - 80° = 70°.',
    'q7' => 'Because DE || AC, ΔBDE is similar to ΔBAC. This means the ratio of their corresponding sides is equal. The side BD corresponds to BA. BA = BD + DA = 4 + 8 = 12. Set up the proportion: BD/BA = DE/AC. 4/12 = 6/AC. 1/3 = 6/AC. AC = 3 * 6 = 18.',
    'q8' => 'The center (h, k) is (2, -1). The radius (r) is the distance from the center (2, -1) to a point on the circle, like (2, 4). The distance is 5. The equation is (x-h)² + (y-k)² = r². (x-2)² + (y - (-1))² = 5². This simplifies to (x-2)² + (y+1)² = 25.',
    'q9' => 'Let\'s test the transformation for point D(2, 2) and its image D\'(-2, -2). (1) y=x: (2,2)->(2,2). (2) y=-x: (x,y)->(-y,-x). (2,2)->(-2,-2). This works. Let\'s check E(2,5): (2,5)->(-5,-2). This matches E\'. (3) Origin: (x,y)->(-x,-y). (2,2)->(-2,-2). This also works for D. But E(2,5)->(-2,-5), which does NOT match E\'(-5,-2). So, the answer is (2).',
    'q10' => 'Use the secant power theorem: (Whole) × (External) = (Whole) × (External). Whole secant PA = 17. External is PC. Whole secant PB = PD + DB = 10 + 12 = 22. External is PD = 10. (PA)(PC) = (PB)(PD). (17)(PC) = (22)(10). 17 * PC = 220. PC = 220 / 17 ≈ 12.941... which rounds to 12.9.',
    'q11' => 'Given CD || AB, we know that alternate interior angles are congruent. Using BC as the transversal, m∠DCB = m∠CBA. Given CB bisects ∠ABD, we know m∠DBC = m∠CBA. By the transitive property, m∠DCB = m∠DBC. In ΔCDB, since two angles are equal, the triangle is isosceles.',
    'q12' => 'The slope of line h (y = 2/3x - 4) is m = 2/3. A perpendicular line has a negative reciprocal slope, m_perp = -3/2. Using the point-slope form y - y₁ = m(x - x₁), we plug in the point (6, 1): y - 1 = -3/2(x - 6).',
    'q13' => '1. Find the volume of the pyramid: V = (1/3) * (Base Area) * height. The base is a square, so Base Area = (8.2)² = 67.24 cm². V = (1/3) * 67.24 * 17.4 = 390.048 cm³. 2. Use the density formula: Density = Mass / Volume. 0.77 = Mass / 390.048. Mass = 0.77 * 390.048 ≈ 300.33... g. This rounds to 300 g.',
    'q14' => 'By the Triangle Midsegment Theorem, the midsegment (DE) is half the length of the parallel base (AC). So, DE = (1/2)AC. x + 3 = (1/2)(3x - 5). Multiply by 2: 2(x + 3) = 3x - 5. 2x + 6 = 3x - 5. 11 = x. The question asks for the length of DE: DE = x + 3 = 11 + 3 = 14.',
    'q15' => 'An isosceles right triangle is a 45-45-90 triangle. The legs (GU and DG) are congruent, and the hypotenuse (DU) is √2 times the length of a leg. So, leg * √2 = hypotenuse. GU * √2 = 10√2. Divide by √2: GU = 10.',
    'q16' => 'Use the SAS formula for the area of a triangle: Area = (1/2)ab * sin(C), where a and b are two sides and C is the angle *between* them. Area = (1/2)(8)(9) * sin(55°) = 36 * sin(55°) ≈ 36 * 0.8191... ≈ 29.489... This rounds to 29.',
    'q17' => 'The center of dilation is (0,0). We can check this with one point: C(5,2) and its image T(10,4). 10 = k * 5 and 4 = k * 2. In both cases, k=2. The center is (0,0) because the rule (x,y) -> (2x, 2y) holds. (Note: The provided graph coordinates in the PDF for R, S, T, A, B, C are inconsistent. The logic (0,0) is the only one that works for a dilation factor of 2 mapping C to T and B to S).',
    'q18' => 'Side AB is vertical: distance is |3 - (-1)| = 4. Side BC is horizontal: distance is |6 - (-2)| = 8. Side AC is diagonal. Use the distance formula: d = √((x₂-x₁)² + (y₂-y₁)²). d = √((6 - (-2))² + ((-1) - 3)²) = √(8² + (-4)²) = √(64 + 16) = √80. √80 = √(16*5) = 4√5. Perimeter = 4 + 8 + 4√5 = 12 + 4√5.',
    'q19' => 'We are given ∠P ≅ ∠F. Also, ∠PEG and ∠FET are vertical angles, so they are congruent. By Angle-Angle (AA) similarity, ΔPEG ~ ΔFET. This means the ratios of corresponding sides are equal. PE corresponds to FE. PG corresponds to FT. EG corresponds to ET. So, PE/FE = PG/FT = EG/ET. Option (4) matches this.',
    'q20' => 'First, convert all units to feet. 4 inches = 4/12 feet = 1/3 feet. Volume = Length × Width × Depth. V = 10 ft × 4 ft × (1/3) ft = 40/3 ft³ ≈ 13.333... ft³. Bags needed = Total Volume / (Volume per bag) = (40/3) / 0.6 = 13.333... / 0.6 ≈ 22.22... Since you can\'t buy 0.22 of a bag, you must buy 23 bags.',
    'q21' => 'First, get the line in y=mx+b form. 4x - 6y = 24 -> -6y = -4x + 24 -> y = (4/6)x - 4 -> y = (2/3)x - 4. The slope is 2/3 and the y-intercept is -4. A dilation centered at the origin with scale factor k (here, k=3) changes the y-intercept to k*b. New y-intercept = 3 * (-4) = -12. The slope remains the same. New equation: y = (2/3)x - 12.',
    'q22' => 'The rhombus in the image has its center at the origin (0,0) and diagonals on the x and y axes. (1) 180° rotation about the origin maps (x,y) to (-x,-y), which maps the rhombus onto itself. (3) & (4) are reflections over lines that are NOT symmetry lines for this rhombus. (2) 180° rotation about (1,0) is a symmetry rotation, but about the wrong center. Transformations (2), (3), and (4) all fail to map the rhombus onto itself. The question is flawed, but (2) is the most likely intended answer, testing a rotation about a point other than the center.',
    'q23' => 'In the large right triangle HAY, find the other leg (HA) using the Pythagorean theorem: HA² + 20² = 25². HA² + 400 = 625. HA² = 225. HA = 15. Now, find the area of the triangle in two ways: Area = (1/2)(leg1)(leg2) = (1/2)(15)(20) = 150. Also, Area = (1/2)(hypotenuse)(altitude) = (1/2)(25)(AL). Set them equal: 150 = (1/2)(25)(AL). 300 = 25 * AL. AL = 12.',
    'q24' => 'When a 2D figure is dilated by a scale factor k, its area changes by a factor of k². Area_new = Area_old * k². Area_new = 36 * (1/2)² = 36 * (1/4) = 9.',
    'q25' => 'A translation is a rigid motion. Rigid motions preserve distance (side lengths) and angle measure. Since all corresponding parts of the two triangles are congruent, the triangles themselves are congruent.',
    'q26' => '1. Find the volume of the cube: V = side³ = 5³ = 125 cm³. 2. Calculate the density: Density = Mass / Volume = 982.5 g / 125 cm³ = 7.86 g/cm³. 3. Compare this density to the table. A density of 7.86 g/cm³ matches Iron.',
    'q27' => 'The ratio C to A is 3, and A to S is 2. The total ratio is 3+2=5. So, point A is 3/5 of the way from C to S. x-coord: x = x₁ + (3/5)(x₂-x₁) = -3 + (3/5)(7 - (-3)) = -3 + (3/5)(10) = -3 + 6 = 3. y-coord: y = y₁ + (3/5)(y₂-y₁) = 1 + (3/5)(6 - 1) = 1 + (3/5)(5) = 1 + 3 = 4. The coordinates are (3, 4).',
    'q28' => 'Using SOH CAH TOA, the landing (0.6 m) is the "Opposite" side, and the ramp is the "Hypotenuse". We use sine. sin(angle) = Opp/Hyp. sin(4.8°) = 0.6 / ramp. ramp = 0.6 / sin(4.8°) ≈ 0.6 / 0.08367... ≈ 7.171. To the nearest tenth of a meter, this is 7.2 m.',
    'q29' => 'Since KML is the vertex angle, the triangle is isosceles with base KL. This means the base angles are equal: m∠K = m∠L = 15°. The angle ∠KMN is an exterior angle. The measure of an exterior angle is equal to the sum of the two remote interior angles. m∠KMN = m∠K + m∠L = 15° + 15° = 30°.',
    'q30' => 'Area of the full circle = πr² = π(5)² = 25π. The area of the sector is a fraction of the full circle\'s area. This fraction is the same as the central angle\'s fraction of 360°. (Sector Area) / (Circle Area) = angle / 360°. (7.5π) / (25π) = angle / 360. 0.3 = angle / 360. angle = 0.3 * 360 = 108°.',
    'q31' => 'This is a construction and must be done with a compass and straightedge. The key is to draw two arcs from A that intersect BC, then use those intersection points to create a perpendicular line, and finally measure the distance from A to the line and transfer it to the other side.',
    'q32' => 'Volume of tank = 75 L = 75,000 cm³. Volume of bucket (cylinder) = πr²h. The diameter is 20 cm, so the radius is 10 cm. V_bucket = π(10)²(26) = 2600π cm³ ≈ 8168.14 cm³. Number of buckets = V_tank / V_bucket = 75000 / 8168.14 ≈ 9.18... The maximum number of *full* buckets she can put in is 9.',
    'q33_dist' => 'Part 1: Let x be the distance for the shorter cable. tan(50°) = opp/adj = 12/x. x = 12 / tan(50°) ≈ 10.069 ft. The longer cable is 3 feet farther: 10.069 + 3 = 13.069 ft. To the nearest foot, this is 13 ft.',
    'q33_angle' => 'Part 2: For the longer cable, the distance is 13.069 ft and the height is 12 ft. tan(θ) = opp/adj = 12 / 13.069 ≈ 0.9182. θ = arctan(0.9182) ≈ 42.55°. To the nearest degree, this is 43°.',
    'q34' => 'To prove READ is a rectangle, you must prove it is a parallelogram with a right angle. 1. Find slopes of all 4 sides. RE: 4/3, EA: -6/8 = -3/4, AD: 4/3, DR: -6/8 = -3/4. 2. Since opposite sides have equal slopes (RE || AD and EA || DR), it is a parallelogram. 3. Since adjacent slopes are negative reciprocals (e.g., RE (4/3) and EA (-3/4)), the sides are perpendicular, forming a right angle. Therefore, READ is a rectangle.',
    'q35' => '1. Given AFD and BFE bisect each other. This means F is the midpoint of AD and BE. 2. In ΔAFE and ΔDFB: AF ≅ DF (bisected), EF ≅ BF (bisected), ∠AFE ≅ ∠DFB (vertical angles). 3. By SAS, ΔAFE ≅ ΔDFB. 4. By CPCTC, AE ≅ DB and ∠EAF ≅ ∠BDF. 5. Since ∠EAF and ∠BDF are congruent alternate interior angles, AE || DB. 6. Given DE ≅ DC and AE ≅ DB (from step 4), this doesn\'t seem to lead anywhere. Let\'s try again.
1. AFD and BFE bisect each other -> F is midpoint of AD and BE. Wait, the *segments* bisect each other. F is midpoint of AD and BE.
Let\'s re-read the prompt. \"AFD and BFE bisect each other\". This means F is the midpoint of AD and F is the midpoint of BE. NO, F is the midpoint of *segment AD* and *segment BE*? No, the line *segments* AFD and BFE. This means F is the midpoint of AD and F is the midpoint of BE.
Wait, BFE... B-F-E. AFD... A-F-D. Yes.
1. F is midpoint of AD, F is midpoint of BE.
2. In ΔABF and ΔDEF: AF ≅ DF (F is mdpt), BF ≅ EF (F is mdpt), ∠AFB ≅ ∠DFE (vertical angles).
3. By SAS, ΔABF ≅ ΔDEF.
4. By CPCTC, AB ≅ DE and ∠BAF ≅ ∠EDF.
5. Since ∠BAF and ∠EDF are congruent alternate interior angles, AB || DE.
6. Since DE is part of the line segment CE, AB || CE.
7. We are given DE ≅ DC. From step 4, AB ≅ DE. By transitive property, AB ≅ DC.
8. We now have AB || DC (since AB || CE) and AB ≅ DC.
9. A quadrilateral with one pair of sides that is both congruent and parallel is a parallelogram.
10. Therefore, ABCD is a parallelogram.'
];


// --- Page Variables for Header/Footer ---
$pageTitle = "Geometry Test (Full Exam)";
$pageDescription = "An interactive, one-question-at-a-time practice test for the NY Regents Geometry Exam.";
$pageKeywords = "geometry, regents, exam, practice test, math, high school, interactive, quiz";
$pageAuthor = "Hesten Allison"; // Author from footer
$welcomeMessage = "Geometry Practice";
$welcomeParagraph = "Welcome to the Geometry full exam practice test. This test is one question at a time. Good luck!";


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

        <h1 class="text-3xl font-bold text-primary mb-2"><?php echo $welcomeMessage; ?></h1>
        <p class="text-text-secondary mb-6"><?php echo $welcomeParagraph; ?></p>
        
        <!-- Progress Bar and Timer -->
        <div class="mb-8">
            <div class="flex justify-between mb-2">
                <span class="text-base font-medium text-primary">Progress</span>
                <span class="text-base font-medium text-primary" id="stopwatch">00:00:00</span>
            </div>
            <div class="flex justify-between mb-1">
                <span class="text-sm font-medium text-primary" id="progress-text">Question 1 of 35</span>
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
                <p class="font-semibold text-lg mb-3">1. An equilateral triangle is continuously rotated around one of its altitudes. The three-dimensional object formed is a</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q1" value="1" class="mr-2">cone</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q1" value="2" class="mr-2">sphere</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q1" value="3" class="mr-2">cylinder</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q1" value="4" class="mr-2">pyramid</label>
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
                <p class="font-semibold text-lg mb-3">2. On the set of axes (see PDF for diagram), quadrilateral BDGF is rotated 90 degrees clockwise about the origin and then reflected over the y-axis. The image of quadrilateral BDGF is quadrilateral MQSP. Side BD will always map onto</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q2" value="1" class="mr-2"><code>MP</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q2" value="2" class="mr-2"><code>PS</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q2" value="3" class="mr-2"><code>MQ</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q2" value="4" class="mr-2"><code>SQ</code></label>
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
                <p class="font-semibold text-lg mb-3">3. In right triangle JOE, hypotenuse <code>JO = 31.8</code> and <code>m∠J = 38°</code>. To the nearest tenth, the length of EJ is</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q3" value="1" class="mr-2">19.6</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q3" value="2" class="mr-2">25.1</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q3" value="3" class="mr-2">40.4</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q3" value="4" class="mr-2">51.7</label>
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
                <p class="font-semibold text-lg mb-3">4. The hemisphere below (see PDF for diagram) has a radius of 8 cm. To the nearest cubic centimeter, the volume of the hemisphere is</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q4" value="1" class="mr-2">201</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q4" value="2" class="mr-2">268</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q4" value="3" class="mr-2">1072</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q4" value="4" class="mr-2">2145</label>
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
                <p class="font-semibold text-lg mb-3">5. In parallelogram ABCD, diagonals <code>AC</code> and <code>BD</code> intersect at E. Which information is sufficient to prove ABCD is a rhombus?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q5" value="1" class="mr-2"><code>AE ≅ EC</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q5" value="2" class="mr-2"><code>AC ≅ BD</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q5" value="3" class="mr-2"><code>AB ⊥ BC</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q5" value="4" class="mr-2"><code>AC ⊥ BD</code></label>
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
                <p class="font-semibold text-lg mb-3">6. Trapezoid JOSH, shown below (see PDF for diagram), has parallel sides <code>HS</code> and <code>JO</code>. <code>m∠J = 65°</code>, <code>m∠O = 30°</code>, <code>m∠OSA = 80°</code>, and <code>m∠SHU = 60°</code>. What is m∠HSA?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q6" value="1" class="mr-2">55°</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q6" value="2" class="mr-2">60°</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q6" value="3" class="mr-2">65°</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q6" value="4" class="mr-2">70°</label>
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
                <p class="font-semibold text-lg mb-3">7. In ΔABC below (see PDF for diagram), points D and E are on <code>AB</code> and <code>CB</code>, respectively, such that <code>DE || AC</code>. If <code>AD = 8</code>, <code>DB = 4</code>, and <code>DE = 6</code>, what is the length of <code>AC</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q7" value="1" class="mr-2">24</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q7" value="2" class="mr-2">18</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q7" value="3" class="mr-2">12</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q7" value="4" class="mr-2">10</label>
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
                <p class="font-semibold text-lg mb-3">8. On the set of axes below (see PDF for diagram), circle C has a center with coordinates (2, -1) and a radius that passes through (2, 4). Which equation represents circle C?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q8" value="1" class="mr-2"><code>(x - 2)² + (y + 1)² = 25</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q8" value="2" class="mr-2"><code>(x - 2)² + (y + 1)² = 16</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q8" value="3" class="mr-2"><code>(x + 2)² + (y - 1)² = 25</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q8" value="4" class="mr-2"><code>(x + 2)² + (y - 1)² = 16</code></label>
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
                <p class="font-semibold text-lg mb-3">9. On the set of axes below (see PDF for diagram), ΔD'E'F' is the image of ΔDEF. A transformation that maps ΔDEF onto ΔD'E'F' is a</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q9" value="1" class="mr-2">reflection over the line <code>y = x</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q9" value="2" class="mr-2">reflection over the line <code>y = -x</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q9" value="3" class="mr-2">point reflection through the origin</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q9" value="4" class="mr-2">translation 4 units left and 4 units down</label>
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
                <p class="font-semibold text-lg mb-3">10. In circle O below (see PDF for diagram), secants <code>PCA</code> and <code>PDB</code> are drawn from external point P. If <code>PA = 17</code>, <code>PD = 10</code>, and <code>BD = 12</code>, what is the length of <code>PC</code> to the nearest tenth?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q10" value="1" class="mr-2">7.1</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q10" value="2" class="mr-2">7.7</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q10" value="3" class="mr-2">12.9</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q10" value="4" class="mr-2">14.2</label>
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
                <p class="font-semibold text-lg mb-3">11. In the diagram below (see PDF), <code>CD || AB</code> and <code>CB</code> bisects ∠ABD. Which statement must be true?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q11" value="1" class="mr-2"><code>CD ≅ AB</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q11" value="2" class="mr-2"><code>AB ≅ BD</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q11" value="3" class="mr-2"><code>ΔCDB</code> is a right triangle</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q11" value="4" class="mr-2"><code>ΔCDB</code> is an isosceles triangle</label>
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
                <p class="font-semibold text-lg mb-3">12. Line h is represented by the equation <code>y = (2/3)x - 4</code>. Which equation represents the line that is perpendicular to line h and passes through the point (6, 1)?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q12" value="1" class="mr-2"><code>y - 1 = (2/3)(x - 6)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q12" value="2" class="mr-2"><code>y + 1 = (2/3)(x + 6)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q12" value="3" class="mr-2"><code>y - 1 = - (3/2)(x - 6)</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q12" value="4" class="mr-2"><code>y + 1 = - (3/2)(x + 6)</code></label>
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
                <p class="font-semibold text-lg mb-3">13. A wooden toy block (see PDF) is a pyramid with a square base. The height is 17.4 cm and the base side length is 8.2 cm. The density of oak is 0.77 g/cm³. What is the mass of the block, to the nearest gram?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q13" value="1" class="mr-2">300</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q13" value="2" class="mr-2">506</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q13" value="3" class="mr-2">637</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q13" value="4" class="mr-2">901</label>
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
                <p class="font-semibold text-lg mb-3">14. In ΔABC below (see PDF), midsegment <code>DE</code> is drawn. If <code>DE = x + 3</code> and <code>AC = 3x - 5</code>, what is the length of <code>DE</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q14" value="1" class="mr-2">28</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q14" value="2" class="mr-2">14</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q14" value="3" class="mr-2">7</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q14" value="4" class="mr-2">4</label>
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
                <p class="font-semibold text-lg mb-3">15. Triangle DUG is an isosceles right triangle with the right angle at G. If <code>DU = 10√2</code>, what is the length of <code>GU</code>?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q15" value="1" class="mr-2">5</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q15" value="2" class="mr-2">5√2</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q15" value="3" class="mr-2">10</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q15" value="4" class="mr-2">10√2</label>
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
                <p class="font-semibold text-lg mb-3">16. In ΔRST below (see PDF), <code>RS = 9 cm</code>, <code>RT = 8 cm</code>, and <code>m∠TRS = 55°</code>. What is the area of ΔRST, to the nearest square centimeter?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q16" value="1" class="mr-2">59</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q16" value="2" class="mr-2">36</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q16" value="3" class="mr-2">29</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q16" value="4" class="mr-2">21</label>
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
                <p class="font-semibold text-lg mb-3">17. Triangle ABC is dilated by a scale factor of 2 to map onto its image, ΔRST, on the set of axes below (see PDF). What are the coordinates of the center of this dilation?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q17" value="1" class="mr-2">(1, -1)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q17" value="2" class="mr-2">(2, 1)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q17" value="3" class="mr-2">(3, 3)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q17" value="4" class="mr-2">(0, 0)</label>
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
                <p class="font-semibold text-lg mb-3">18. What is the perimeter of ΔABC where the vertices have coordinates A(-2, 3), B(-2, -1), and C(6, -1)?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q18" value="1" class="mr-2">16</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q18" value="2" class="mr-2">92</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q18" value="3" class="mr-2">16√5</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q18" value="4" class="mr-2">12 + 4√5</label>
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
                <p class="font-semibold text-lg mb-3">19. In the diagram below (see PDF), <code>GT</code> and <code>PF</code> intersect at E, and <code>∠P ≅ ∠F</code>. Which equation is always true?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q19" value="1" class="mr-2"><code>PE/FE = FT/PG</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q19" value="2" class="mr-2"><code>GE/TE = FT/PG</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q19" value="3" class="mr-2"><code>PE/GE = TE/FE</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q19" value="4" class="mr-2"><code>PE/FE = PG/FT</code></label>
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
                <p class="font-semibold text-lg mb-3">20. A section of sidewalk is 10 feet long, 4 feet wide, and 4 inches deep. Concrete mix yields 0.6 cubic foot per bag. What is the minimum number of bags needed?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q20" value="1" class="mr-2">22</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q20" value="2" class="mr-2">23</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q20" value="3" class="mr-2">26</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q20" value="4" class="mr-2">27</label>
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
                <p class="font-semibold text-lg mb-3">21. The line <code>4x - 6y = 24</code> is transformed by a dilation of scale factor 3 centered at the origin. Which equation represents the image of the line?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q21" value="1" class="mr-2"><code>y = (2/3)x - 12</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q21" value="2" class="mr-2"><code>y = (2/3)x - 4</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q21" value="3" class="mr-2"><code>y = 2x - 12</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q21" value="4" class="mr-2"><code>y = 2x - 4</code></label>
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
                <p class="font-semibold text-lg mb-3">22. A rhombus is graphed on the set of axes below (see PDF). Which transformation does not carry the rhombus onto itself?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q22" value="1" class="mr-2">a rotation of 180° about the origin</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q22" value="2" class="mr-2">a rotation of 180° about point (1, 0)</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q22" value="3" class="mr-2">a reflection over the line <code>y = (1/2)x - 1/2</code></label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q22" value="4" class="mr-2">a reflection over the line <code>y = -2x + 2</code></label>
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
                <p class="font-semibold text-lg mb-3">23. In right triangle HAY below (see PDF), altitude <code>AL</code> is drawn to hypotenuse <code>HY</code>. If <code>HY = 25</code> and <code>YA = 20</code>, the length of <code>AL</code> is</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q23" value="1" class="mr-2">9</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q23" value="2" class="mr-2">12</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q23" value="3" class="mr-2">15</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q23" value="4" class="mr-2">16</label>
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
                <p class="font-semibold text-lg mb-3">24. Square ABCD has an area of 36. If the square is dilated by a scale factor of 1/2 centered at A, what is the area of its image?</p>
                <div class="space-y-2">
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q24" value="1" class="mr-2">9</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q24" value="2" class="mr-2">18</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q24" value="3" class="mr-2">72</label>
                    <label class="radio-label block p-3 rounded-md border border-gray-200 hover:bg-gray-50 dark:border-gray-700 dark:hover:bg-gray-800 cursor-pointer"><input type="radio" name="q24" value="4" class="mr-2">144</label>
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
                <p class="font-semibold text-lg mb-3">25. Triangle D'A'N' is the image of ΔDAN after a translation. Explain why ΔD'A'N' must be congruent to ΔDAN.</p>
                <label for="q25" class="block text-sm font-medium text-text-secondary mb-1">Your explanation:</label>
                <textarea id="q25" name="q25" rows="3" class="w-full p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600"></textarea>
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
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q26">
                <p class="font-semibold text-lg mb-3">26. The table (see PDF) lists five metals and their densities. A solid metal cube has an edge length of 5 cm and a mass of 982.5 grams. Determine and state the type of metal.</p>
                <label for="q26" class="block text-sm font-medium text-text-secondary mb-1">Your answer (Metal name):</label>
                <input type="text" id="q26" name="q26" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
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

            <!-- Question 27 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q27">
                <p class="font-semibold text-lg mb-3">27. The endpoints of <code>CS</code> are C(-3, 1) and S(7, 6). Determine and state the coordinates of point A such that the ratio of CA:AS is 3:2.</p>
                <label for="q27" class="block text-sm font-medium text-text-secondary mb-1">Your answer (e.g., (x,y)):</label>
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
                <p class="font-semibold text-lg mb-3">28. The ramp shown in the diagram (see PDF) has an angle of elevation of 4.8°. The ramp is built to a landing 0.6 m above the ground. Determine and state the length of the ramp, to the nearest tenth of a meter.</p>
                <label for="q28" class="block text-sm font-medium text-text-secondary mb-1">Your answer (in meters):</label>
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
                <p class="font-semibold text-lg mb-3">29. Angle KML is the vertex angle of isosceles triangle KLM (see PDF). Side <code>LM</code> is extended through vertex M to point N. If <code>m∠K = 15°</code>, determine and state m∠KMN.</p>
                <label for="q29" class="block text-sm font-medium text-text-secondary mb-1">Your answer (in degrees):</label>
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
            <div class="question-container mb-8 p-4 rounded-md hidden" data-part="Part III" data-key="q30">
                <p class="font-semibold text-lg mb-3">30. In the diagram of circle L (see PDF), the area of the shaded sector KLM is 7.5π and <code>LK = 5</code>. Determine and state the degree measure of angle KLM.</p>
                <label for="q30" class="block text-sm font-medium text-text-secondary mb-1">Your answer (in degrees):</label>
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
            <div class="question-container mb-8 p-4 rounded-md hidden for-review" data-key="q31">
                <p class="font-semibold text-lg mb-3">31. (For Review) Using a compass and straightedge, construct the image of point A after a reflection over <code>BC</code>. [Leave all construction marks.]</p>
                <p class="text-text-secondary">This question requires a geometric construction and will not be graded by the script. Please check your construction against the answer key.</p>
                <div class="question-controls mt-4">
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300">Next</button>
                </div>
            </div>

            <!-- Question 32 -->
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q32">
                <p class="font-semibold text-lg mb-3">32. Joan wants to fill an empty 75-liter fish tank. She uses a cylindrical bucket with a diameter of 20 cm. Determine and state the maximum number of buckets of water, filled to a height of 26 cm, she can put in before it overflows. [1000 cm³ = 1 liter]</p>
                <label for="q32" class="block text-sm font-medium text-text-secondary mb-1">Max number of buckets:</label>
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
            <div class="question-container mb-8 p-4 rounded-md hidden" data-key="q33_dist,q33_angle">
                <p class="font-semibold text-lg mb-3">33. As modeled in the diagram (see PDF), two cables are attached to a tree 12 ft above ground. The longer cable is anchored 3 ft farther from the tree than the shorter cable. The angle of elevation for the shorter cable is 50°.</p>
                <label for="q33_dist" class="block text-sm font-medium text-text-secondary mb-1">Determine, to the nearest foot, the distance from the base of the tree to where the <strong>longer cable</strong> is attached.</label>
                <input type="text" id="q33_dist" name="q33_dist" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm mb-2 bg-white dark:bg-gray-800 dark:border-gray-600">
                <label for="q33_angle" class="block text-sm font-medium text-text-secondary mb-1 mt-4">Determine, to the nearest degree, the angle of elevation for the <strong>longer cable</strong>.</label>
                <input type="text" id="q33_angle" name="q33_angle" class="w-full md:w-1/2 p-2 border border-gray-300 rounded-md shadow-sm bg-white dark:bg-gray-800 dark:border-gray-600">
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
            <div class="question-container mb-8 p-4 rounded-md hidden for-review" data-part="Part IV" data-key="q34">
                <p class="font-semibold text-lg mb-3">34. (For Review) Quadrilateral READ has vertices R(-1, 3), E(2, 7), A(10, 1), and D(7, -3). Prove READ is a rectangle.</p>
                <p class="text-text-secondary">This question requires a coordinate proof and will not be graded by the script. Please check your proof against the answer key.</p>
                <div class="question-controls mt-4">
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300">Next</button>
                </div>
            </div>

            <!-- Question 35 -->
            <div class="question-container mb-8 p-4 rounded-md hidden for-review" data-key="q35">
                <p class="font-semibold text-lg mb-3">35. (For Review) In the diagram (see PDF), side <code>CD</code> is extended to E. Segments <code>AFD</code> and <code>BFE</code> bisect each other, and <code>DE ≅ DC</code>. Prove ABCD is a parallelogram.</p>
                <p class="text-text-secondary">This question requires a geometric proof and will not be graded by the script. Please check your proof against the answer key.</p>
                <div class="question-controls mt-4">
                    <button type="button" class="next-question-btn bg-gray-600 text-white font-bold py-2 px-6 rounded-lg shadow-md hover:bg-gray-700 transition duration-300">Finish</button>
                </div>
            </div>

        </div> <!-- End #quiz-content-wrapper -->
    </div>

    <script>
        // --- Pass Data from PHP to JS ---
        const answerKeyJS = <?php echo json_encode($answerKey); ?>;
        const hintsJS = <?php echo json_encode($questionHints); ?>;
        const explanationsJS = <?php echo json_encode($questionExplanations); ?>;
        const gradableQuestionsCount = <?php echo count(array_filter(array_keys($answerKey), fn($k) => !in_array($answerKey[$k], ['CONSTRUCTION', 'PROOF']))); ?>;

        // --- Helper functions ---
        function normalize(val) {
            if (typeof val !== 'string') val = String(val);
            val = val.toLowerCase().trim();
            val = val.replace(/\s+/g, ''); // Remove all spaces
            val = val.replace(/degrees/g, '');
            val = val.replace(/°/g, '');
            val = val.replace(/m/g, '');
            val = val.replace(/meters/g, '');
            val = val.replace(/ft/g, '');
            val = val.replace(/feet/g, '');
            val = val.replace(/sqrt/g, '√'); // Standardize sqrt
            val = val.endsWith(',') ? val.slice(0, -1) : val; // Remove trailing comma
            return val;
        }
        
        // Helper function to prevent XSS when displaying user input
        function escapeHTML(str) {
            if (typeof str !== 'string') return str;
            return str.replace(/[&<>'"]/g, function(tag) {
                const charsToReplace = { '&': '&amp;', '<': '&lt;', '>': '&gt;', "'": '&#39;', '"': '&quot;' };
                return charsToReplace[tag] || tag;
            });
        }

        function normalize_q25(val) {
            if (typeof val !== 'string') val = String(val);
            val = val.toLowerCase().trim();
            if (val.includes('rigid') && val.includes('motion')) return 'translation is a rigid motion';
            if (val.includes('preserve') && (val.includes('distance') || val.includes('length'))) return 'translation is a rigid motion';
            return val;
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
                        if (inputs[0].type === 'text' || inputs[0].type === 'textarea') {
                            let allFilled = true;
                            inputs.forEach(input => {
                                if (input.value.trim() === '') allFilled = false;
                            });
                            if (allFilled) checkBtn.classList.remove('hidden');
                        } else {
                            checkBtn.classList.remove('hidden');
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
                        // Handle "for-review" questions that don't get checked
                        if (question.classList.contains('for-review')) {
                            questionResults[index] = 'review';
                            userAnswers[index] = { review: 'For Review' };
                        }
                        
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

                    if (key === 'q25') {
                        userNormalized = normalize_q25(userAnswer);
                        correctNormalized = normalize_q25(correctAnswer);
                    } else {
                        userNormalized = normalize(userAnswer);
                        correctNormalized = normalize(correctAnswer);
                    }
                    
                    let isCorrect = (userNormalized === correctNormalized);

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
                    const qNum = question.querySelector('p').textContent.split('.')[0];
                    const result = questionResults[index];
                    const answers = userAnswers[index];
                    
                    let answerHTML = '';
                    if (result === 'review') {
                        answerHTML = `<div class="user-answer"><em>(For Review - Not Graded)</em></div>`;
                    } else if (answers) {
                        keys.forEach(key => {
                            const userAnswer = answers[key] || "No Answer";
                            const safeUserAnswer = escapeHTML(userAnswer);
                            const correctAnswer = answerKeyJS[key];
                            const isCorrect = (normalize(userAnswer) === normalize(correctAnswer)) || (key === 'q25' && normalize_q25(userAnswer) === normalize_q25(correctAnswer));
                            
                            answerHTML += `
                                <div class="user-answer ${isCorrect ? 'correct-text' : 'incorrect-text'}">
                                    <strong>Your Answer (${key}):</strong> ${userAnswer}
                                    <strong>Your Answer (${key}):</strong> ${safeUserAnswer}
                                </div>
                                ${!isCorrect ? `<div class="correct-text"><strong>Correct (${key}):</strong> ${correctAnswer}</div>` : ''}
                            `;
                        });
                    } else {
                        answerHTML = `<div class="user-answer incorrect-text"><strong>Your Answer:</strong> No Answer Given</div>`;
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
                let textContent = "Geometry Test Results\n";
                textContent += "=========================\n\n";
                textContent += `Final Score: ${score} / ${gradableQuestionsCount}\n`;
                textContent += `Percentage: ${document.getElementById('final-percentage').textContent}%\n`;
                textContent += `Time Taken: ${document.getElementById('final-time').textContent}\n`;
                textContent += `Hints Used: ${hintsUsed}\n\n`;
                textContent += "--- Question Summary ---\n\n";

                questions.forEach((question, index) => {
                    const keys = question.dataset.key.split(',');
                    const qNum = question.querySelector('p').textContent.split('.')[0];
                    const result = questionResults[index];
                    const answers = userAnswers[index];
                    
                    textContent += `Question ${qNum}: ${result ? result.toUpperCase() : 'SKIPPED'}\n`;
                    
                    if (result === 'review') {
                        textContent += `  - (For Review - Not Graded)\n`;
                    } else if (answers) {
                         keys.forEach(key => {
                            const userAnswer = answers[key] || "No Answer";
                            const correctAnswer = answerKeyJS[key];
                            textContent += `  - Your Answer (${key}): ${userAnswer}\n`;
                            if (result === 'incorrect') {
                                textContent += `  - Correct Answer (${key}): ${correctAnswer}\n`;
                            }
                         });
                    } else {
                         textContent += `  - You did not provide an answer.\n`;
                    }
                    textContent += "\n";
                });

                const blob = new Blob([textContent], { type: 'text/plain;charset=utf-8' });
                const link = document.createElement('a');
                link.href = URL.createObjectURL(blob);
                link.download = 'geometry-test-results.txt';
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
