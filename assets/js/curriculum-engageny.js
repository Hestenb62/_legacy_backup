(function() {
    window.curriculumData = window.curriculumData || {};
    
    function mergeCurriculumData(target, source) {
        for (const key in source) {
            if (source[key] && typeof source[key] === 'object' && !Array.isArray(source[key])) {
                if (!target[key]) target[key] = {};
                mergeCurriculumData(target[key], source[key]);
            } else {
                target[key] = source[key];
            }
        }
    }
    
    const localData = {
    'math': {
        'desc': 'Detailed learning paths, state standards alignment, and core competencies for Mathematics.',
        'color': 'indigo',
        'icon': 'fa-calculator',
        'grades': {
            'Pre-K': {
                'ccss': {
                    'title': 'Pre-K Math Foundations (CCSS Aligned)',
                    'overview': '<p>Introduction to basic counting, cardinalities, and spatial reasoning to prepare for Common Core Kindergarten expectations.</p>',
                    'standards': '<div class="curr-standard-item"><h4 class="curr-standard-title">PK.CC.A</h4><p class="curr-standard-desc">Know number names and the count sequence up to 10.</p></div><div class="curr-standard-item"><h4 class="curr-standard-title">PK.G.A</h4><p class="curr-standard-desc">Identify and describe basic two-dimensional shapes.</p></div>',
                    'competencies': ['Count to 10', 'Recognize basic shapes', 'Understand concept of "more" or "less"'],
                    'level': 'A'
                }
            },
            'Kindergarten': {
                'ccss': {
                    'title': 'Kindergarten Math (CCSS)',
                    'overview': '<p>Focus on representing and comparing whole numbers, initially with sets of objects, and describing shapes and space.</p>',
                    'standards': `
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Counting and Cardinality (K.CC)</h4>
                            <p class="curr-standard-desc"><strong>K.CC.A.1:</strong> Count to 100 by ones and by tens.</p>
                            <p class="curr-standard-desc"><strong>K.CC.A.2:</strong> Count forward beginning from a given number within the known sequence (instead of having to begin at 1).</p>
                            <p class="curr-standard-desc"><strong>K.CC.A.3:</strong> Write numbers from 0 to 20. Represent a number of objects with a written numeral 0-20 (with 0 representing a count of no objects).</p>
                            <p class="curr-standard-desc"><strong>K.CC.B.4:</strong> Understand the relationship between numbers and quantities; connect counting to cardinality.</p>
                            <p class="curr-standard-desc"><strong>K.CC.B.4a:</strong> When counting objects, say the number names in the standard order, pairing each object with one and only one number name and each number name with one and only one object.</p>
                            <p class="curr-standard-desc"><strong>K.CC.B.4b:</strong> Understand that the last number name said tells the number of objects counted. The number of objects is the same regardless of their arrangement or the order in which they were counted.</p>
                            <p class="curr-standard-desc"><strong>K.CC.B.4c:</strong> Understand that each successive number name refers to a quantity that is one larger.</p>
                            <p class="curr-standard-desc"><strong>K.CC.B.5:</strong> Count to answer "how many?" questions about as many as 20 things arranged in a line, a rectangular array, or a circle, or as many as 10 things in a scattered configuration; given a number from 1-20, count out that many objects.</p>
                            <p class="curr-standard-desc"><strong>K.CC.C.6:</strong> Identify whether the number of objects in one group is greater than, less than, or equal to the number of objects in another group, e.g., by using matching and counting strategies.</p>
                            <p class="curr-standard-desc"><strong>K.CC.C.7:</strong> Compare two numbers between 1 and 10 presented as written numerals.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Operations and Algebraic Thinking (K.OA)</h4>
                            <p class="curr-standard-desc"><strong>K.OA.A.1:</strong> Represent addition and subtraction with objects, fingers, mental images, drawings, sounds (e.g., claps), acting out situations, verbal explanations, expressions, or equations.</p>
                            <p class="curr-standard-desc"><strong>K.OA.A.2:</strong> Solve addition and subtraction word problems, and add and subtract within 10, e.g., by using objects or drawings to represent the problem.</p>
                            <p class="curr-standard-desc"><strong>K.OA.A.3:</strong> Decompose numbers less than or equal to 10 into pairs in more than one way, e.g., by using objects or drawings, and record each decomposition by a drawing or equation (e.g., 5 = 2 + 3 and 5 = 4 + 1).</p>
                            <p class="curr-standard-desc"><strong>K.OA.A.4:</strong> For any number from 1 to 9, find the number that makes 10 when added to the given number, e.g., by using objects or drawings, and record the answer with a drawing or equation.</p>
                            <p class="curr-standard-desc"><strong>K.OA.A.5:</strong> Fluently add and subtract within 5.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Number and Operations in Base Ten (K.NBT)</h4>
                            <p class="curr-standard-desc"><strong>K.NBT.A.1:</strong> Compose and decompose numbers from 11 to 19 into ten ones and some further ones, e.g., by using objects or drawings, and record each composition or decomposition by a drawing or equation (such as 18 = 10 + 8); understand that these numbers are composed of ten ones and one, two, three, four, five, six, seven, eight, or nine ones.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Measurement and Data (K.MD)</h4>
                            <p class="curr-standard-desc"><strong>K.MD.A.1:</strong> Describe measurable attributes of objects, such as length or weight. Describe several measurable attributes of a single object.</p>
                            <p class="curr-standard-desc"><strong>K.MD.A.2:</strong> Directly compare two objects with a measurable attribute in common, to see which object has "more of"/"less of" the attribute, and describe the difference. For example, directly compare the heights of two children and describe one child as taller/shorter.</p>
                            <p class="curr-standard-desc"><strong>K.MD.B.3:</strong> Classify objects into given categories; count the numbers of objects in each category and sort the categories by count.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Geometry (K.G)</h4>
                            <p class="curr-standard-desc"><strong>K.G.A.1:</strong> Describe objects in the environment using names of shapes, and describe the relative positions of these objects using terms such as above, below, beside, in front of, behind, and next to.</p>
                            <p class="curr-standard-desc"><strong>K.G.A.2:</strong> Correctly name shapes regardless of their orientations or overall size.</p>
                            <p class="curr-standard-desc"><strong>K.G.A.3:</strong> Identify shapes as two-dimensional (lying in a plane, "flat") or three-dimensional ("solid").</p>
                            <p class="curr-standard-desc"><strong>K.G.B.4:</strong> Analyze and compare two- and three-dimensional shapes, in different sizes and orientations, using informal language to describe their similarities, differences, parts (e.g., number of sides and vertices/"corners") and other attributes (e.g., having sides of equal length).</p>
                            <p class="curr-standard-desc"><strong>K.G.B.5:</strong> Model shapes in the world by building shapes from components (e.g., sticks and clay balls) and drawing shapes.</p>
                            <p class="curr-standard-desc"><strong>K.G.B.6:</strong> Compose simple shapes to form larger shapes. For example, "Can you join these two triangles with full sides touching to make a rectangle?"</p>
                        </div>
                    `,
                    'competencies': ['Count to 100 by ones and tens', 'Addition and subtraction within 10', 'Foundation of place value (11-19)'],
                    'level': 'B'
                }
            },
            
            '1st Grade': {
                'ccss': {
                    'title': '1st Grade Math (CCSS)',
                    'overview': '<p>Focus on addition and subtraction concepts, whole number relationships, linear measurement, and reasoning with geometric shapes.</p>',
                    'standards': `
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Operations and Algebraic Thinking (1.OA)</h4>
                            <p class="curr-standard-desc"><strong>1.OA.A.1:</strong> Use addition and subtraction within 20 to solve word problems involving situations of adding to, taking from, putting together, taking apart, and comparing, with unknowns in all positions.</p>
                            <p class="curr-standard-desc"><strong>1.OA.A.2:</strong> Solve word problems that call for addition of three whole numbers whose sum is less than or equal to 20.</p>
                            <p class="curr-standard-desc"><strong>1.OA.B.3:</strong> Apply properties of operations as strategies to add and subtract. (Commutative and Associative properties)</p>
                            <p class="curr-standard-desc"><strong>1.OA.B.4:</strong> Understand subtraction as an unknown-addend problem. For example, subtract 10 - 8 by finding the number that makes 10 when added to 8.</p>
                            <p class="curr-standard-desc"><strong>1.OA.C.5:</strong> Relate counting to addition and subtraction (e.g., by counting on 2 to add 2).</p>
                            <p class="curr-standard-desc"><strong>1.OA.C.6:</strong> Add and subtract within 20, demonstrating fluency for addition and subtraction within 10. Use strategies such as counting on; making ten; decomposing a number leading to a ten; using the relationship between addition and subtraction; and creating equivalent but easier or known sums.</p>
                            <p class="curr-standard-desc"><strong>1.OA.D.7:</strong> Understand the meaning of the equal sign, and determine if equations involving addition and subtraction are true or false.</p>
                            <p class="curr-standard-desc"><strong>1.OA.D.8:</strong> Determine the unknown whole number in an addition or subtraction equation relating three whole numbers.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Number and Operations in Base Ten (1.NBT)</h4>
                            <p class="curr-standard-desc"><strong>1.NBT.A.1:</strong> Count to 120, starting at any number less than 120. In this range, read and write numerals and represent a number of objects with a written numeral.</p>
                            <p class="curr-standard-desc"><strong>1.NBT.B.2:</strong> Understand that the two digits of a two-digit number represent amounts of tens and ones.</p>
                            <p class="curr-standard-desc"><strong>1.NBT.B.2a:</strong> 10 can be thought of as a bundle of ten ones — called a "ten."</p>
                            <p class="curr-standard-desc"><strong>1.NBT.B.2b:</strong> The numbers from 11 to 19 are composed of a ten and one, two, three, four, five, six, seven, eight, or nine ones.</p>
                            <p class="curr-standard-desc"><strong>1.NBT.B.2c:</strong> The numbers 10, 20, 30, 40, 50, 60, 70, 80, 90 refer to one, two, three, four, five, six, seven, eight, or nine tens (and 0 ones).</p>
                            <p class="curr-standard-desc"><strong>1.NBT.B.3:</strong> Compare two two-digit numbers based on meanings of the tens and ones digits, recording the results of comparisons with the symbols >, =, and <.</p>
                            <p class="curr-standard-desc"><strong>1.NBT.C.4:</strong> Add within 100, including adding a two-digit number and a one-digit number, and adding a two-digit number and a multiple of 10, using concrete models or drawings and strategies based on place value, properties of operations, and/or the relationship between addition and subtraction.</p>
                            <p class="curr-standard-desc"><strong>1.NBT.C.5:</strong> Given a two-digit number, mentally find 10 more or 10 less than the number, without having to count; explain the reasoning used.</p>
                            <p class="curr-standard-desc"><strong>1.NBT.C.6:</strong> Subtract multiples of 10 in the range 10-90 from multiples of 10 in the range 10-90 (positive or zero differences), using concrete models or drawings and strategies based on place value, properties of operations, and/or the relationship between addition and subtraction.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Measurement and Data (1.MD)</h4>
                            <p class="curr-standard-desc"><strong>1.MD.A.1:</strong> Order three objects by length; compare the lengths of two objects indirectly by using a third object.</p>
                            <p class="curr-standard-desc"><strong>1.MD.A.2:</strong> Express the length of an object as a whole number of length units, by laying multiple copies of a shorter object (the length unit) end to end.</p>
                            <p class="curr-standard-desc"><strong>1.MD.B.3:</strong> Tell and write time in hours and half-hours using analog and digital clocks.</p>
                            <p class="curr-standard-desc"><strong>1.MD.C.4:</strong> Organize, represent, and interpret data with up to three categories; ask and answer questions about the total number of data points, how many in each category, and how many more or less are in one category than in another.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Geometry (1.G)</h4>
                            <p class="curr-standard-desc"><strong>1.G.A.1:</strong> Distinguish between defining attributes (e.g., triangles are closed and three-sided) versus non-defining attributes (e.g., color, orientation, overall size); build and draw shapes to possess defining attributes.</p>
                            <p class="curr-standard-desc"><strong>1.G.A.2:</strong> Compose two-dimensional shapes or three-dimensional shapes to create a composite shape, and compose new shapes from the composite shape.</p>
                            <p class="curr-standard-desc"><strong>1.G.A.3:</strong> Partition circles and rectangles into two and four equal shares, describe the shares using the words halves, fourths, and quarters, and use the phrases half of, fourth of, and quarter of. Describe the whole as two of, or four of the shares. Understand for these examples that decomposing into more equal shares creates smaller shares.</p>
                        </div>
                    `,
                    'competencies': ['Addition and subtraction within 20', 'Place value (tens and ones)', 'Measure length', 'Tell time to hour/half-hour'],
                    'level': 'C'
                }
            },
            '2nd Grade': {
                'ccss': {
                    'title': '2nd Grade Math (CCSS)',
                    'overview': '<p>Extending understanding of base-ten notation, building fluency with addition and subtraction, and using standard units of measure.</p>',
                    'standards': `
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Operations and Algebraic Thinking (2.OA)</h4>
                            <p class="curr-standard-desc"><strong>2.OA.A.1:</strong> Use addition and subtraction within 100 to solve one- and two-step word problems involving situations of adding to, taking from, putting together, taking apart, and comparing, with unknowns in all positions.</p>
                            <p class="curr-standard-desc"><strong>2.OA.B.2:</strong> Fluently add and subtract within 20 using mental strategies. By end of Grade 2, know from memory all sums of two one-digit numbers.</p>
                            <p class="curr-standard-desc"><strong>2.OA.C.3:</strong> Determine whether a group of objects (up to 20) has an odd or even number of members, e.g., by pairing objects or counting them by 2s; write an equation to express an even number as a sum of two equal addends.</p>
                            <p class="curr-standard-desc"><strong>2.OA.C.4:</strong> Use addition to find the total number of objects arranged in rectangular arrays with up to 5 rows and up to 5 columns; write an equation to express the total as a sum of equal addends.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Number and Operations in Base Ten (2.NBT)</h4>
                            <p class="curr-standard-desc"><strong>2.NBT.A.1:</strong> Understand that the three digits of a three-digit number represent amounts of hundreds, tens, and ones.</p>
                            <p class="curr-standard-desc"><strong>2.NBT.A.1a:</strong> 100 can be thought of as a bundle of ten tens — called a "hundred."</p>
                            <p class="curr-standard-desc"><strong>2.NBT.A.1b:</strong> The numbers 100, 200, 300, 400, 500, 600, 700, 800, 900 refer to one, two, three, four, five, six, seven, eight, or nine hundreds (and 0 tens and 0 ones).</p>
                            <p class="curr-standard-desc"><strong>2.NBT.A.2:</strong> Count within 1000; skip-count by 5s, 10s, and 100s.</p>
                            <p class="curr-standard-desc"><strong>2.NBT.A.3:</strong> Read and write numbers to 1000 using base-ten numerals, number names, and expanded form.</p>
                            <p class="curr-standard-desc"><strong>2.NBT.A.4:</strong> Compare two three-digit numbers based on meanings of the hundreds, tens, and ones digits, using >, =, and < symbols to record the results of comparisons.</p>
                            <p class="curr-standard-desc"><strong>2.NBT.B.5:</strong> Fluently add and subtract within 100 using strategies based on place value, properties of operations, and/or the relationship between addition and subtraction.</p>
                            <p class="curr-standard-desc"><strong>2.NBT.B.6:</strong> Add up to four two-digit numbers using strategies based on place value and properties of operations.</p>
                            <p class="curr-standard-desc"><strong>2.NBT.B.7:</strong> Add and subtract within 1000, using concrete models or drawings and strategies based on place value, properties of operations, and/or the relationship between addition and subtraction.</p>
                            <p class="curr-standard-desc"><strong>2.NBT.B.8:</strong> Mentally add 10 or 100 to a given number 100-900, and mentally subtract 10 or 100 from a given number 100-900.</p>
                            <p class="curr-standard-desc"><strong>2.NBT.B.9:</strong> Explain why addition and subtraction strategies work, using place value and the properties of operations.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Measurement and Data (2.MD)</h4>
                            <p class="curr-standard-desc"><strong>2.MD.A.1:</strong> Measure the length of an object by selecting and using appropriate tools such as rulers, yardsticks, meter sticks, and measuring tapes.</p>
                            <p class="curr-standard-desc"><strong>2.MD.A.2:</strong> Measure the length of an object twice, using length units of different lengths for the two measurements; describe how the two measurements relate to the size of the unit chosen.</p>
                            <p class="curr-standard-desc"><strong>2.MD.A.3:</strong> Estimate lengths using units of inches, feet, centimeters, and meters.</p>
                            <p class="curr-standard-desc"><strong>2.MD.A.4:</strong> Measure to determine how much longer one object is than another, expressing the length difference in terms of a standard length unit.</p>
                            <p class="curr-standard-desc"><strong>2.MD.B.5:</strong> Use addition and subtraction within 100 to solve word problems involving lengths that are given in the same units.</p>
                            <p class="curr-standard-desc"><strong>2.MD.B.6:</strong> Represent whole numbers as lengths from 0 on a number line diagram with equally spaced points corresponding to the numbers 0, 1, 2, ..., and represent whole-number sums and differences within 100 on a number line diagram.</p>
                            <p class="curr-standard-desc"><strong>2.MD.C.7:</strong> Tell and write time from analog and digital clocks to the nearest five minutes, using a.m. and p.m.</p>
                            <p class="curr-standard-desc"><strong>2.MD.C.8:</strong> Solve word problems involving dollar bills, quarters, dimes, nickels, and pennies, using $ and ¢ symbols appropriately.</p>
                            <p class="curr-standard-desc"><strong>2.MD.D.9:</strong> Generate measurement data by measuring lengths of several objects to the nearest whole unit, or by making repeated measurements of the same object. Show the measurements by making a line plot.</p>
                            <p class="curr-standard-desc"><strong>2.MD.D.10:</strong> Draw a picture graph and a bar graph (with single-unit scale) to represent a data set with up to four categories. Solve simple put-together, take-apart, and compare problems using information presented in a bar graph.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Geometry (2.G)</h4>
                            <p class="curr-standard-desc"><strong>2.G.A.1:</strong> Recognize and draw shapes having specified attributes, such as a given number of angles or a given number of equal faces. Identify triangles, quadrilaterals, pentagons, hexagons, and cubes.</p>
                            <p class="curr-standard-desc"><strong>2.G.A.2:</strong> Partition a rectangle into rows and columns of same-size squares and count to find the total number of them.</p>
                            <p class="curr-standard-desc"><strong>2.G.A.3:</strong> Partition circles and rectangles into two, three, or four equal shares, describe the shares using the words halves, thirds, half of, a third of, etc., and describe the whole as two halves, three thirds, four fourths. Recognize that equal shares of identical wholes need not have the same shape.</p>
                        </div>
                    `,
                    'competencies': ['Addition and subtraction within 100 (fluent)', 'Place value up to 1000', 'Measure length (standard units)', 'Solve word problems with money'],
                    'level': 'D'
                }
            },

            '3rd Grade': {
                'ccss': {
                    'title': '3rd Grade Math (CCSS)',
                    'overview': '<p>Developing understanding of multiplication and division, fractions (especially unit fractions), and rectangular arrays and area.</p>',
                    'standards': `
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Operations and Algebraic Thinking (3.OA)</h4>
                            <p class="curr-standard-desc"><strong>3.OA.A.1:</strong> Interpret products of whole numbers, e.g., interpret 5 × 7 as the total number of objects in 5 groups of 7 objects each.</p>
                            <p class="curr-standard-desc"><strong>3.OA.A.2:</strong> Interpret whole-number quotients of whole numbers, e.g., interpret 56 ÷ 8 as the number of objects in each share when 56 objects are partitioned equally into 8 shares.</p>
                            <p class="curr-standard-desc"><strong>3.OA.A.3:</strong> Use multiplication and division within 100 to solve word problems in situations involving equal groups, arrays, and measurement quantities.</p>
                            <p class="curr-standard-desc"><strong>3.OA.A.4:</strong> Determine the unknown whole number in a multiplication or division equation relating three whole numbers.</p>
                            <p class="curr-standard-desc"><strong>3.OA.B.5:</strong> Apply properties of operations as strategies to multiply and divide. (Commutative, Associative, Distributive properties)</p>
                            <p class="curr-standard-desc"><strong>3.OA.B.6:</strong> Understand division as an unknown-factor problem. For example, find 32 ÷ 8 by finding the number that makes 32 when multiplied by 8.</p>
                            <p class="curr-standard-desc"><strong>3.OA.C.7:</strong> Fluently multiply and divide within 100, using strategies such as the relationship between multiplication and division or properties of operations. By the end of Grade 3, know from memory all products of two one-digit numbers.</p>
                            <p class="curr-standard-desc"><strong>3.OA.D.8:</strong> Solve two-step word problems using the four operations. Represent these problems using equations with a letter standing for the unknown quantity.</p>
                            <p class="curr-standard-desc"><strong>3.OA.D.9:</strong> Identify arithmetic patterns (including patterns in the addition table or multiplication table), and explain them using properties of operations.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Number and Operations in Base Ten (3.NBT)</h4>
                            <p class="curr-standard-desc"><strong>3.NBT.A.1:</strong> Use place value understanding to round whole numbers to the nearest 10 or 100.</p>
                            <p class="curr-standard-desc"><strong>3.NBT.A.2:</strong> Fluently add and subtract within 1000 using strategies and algorithms based on place value, properties of operations, and/or the relationship between addition and subtraction.</p>
                            <p class="curr-standard-desc"><strong>3.NBT.A.3:</strong> Multiply one-digit whole numbers by multiples of 10 in the range 10-90 (e.g., 9 × 80, 5 × 60) using strategies based on place value and properties of operations.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Number and Operations—Fractions (3.NF)</h4>
                            <p class="curr-standard-desc"><strong>3.NF.A.1:</strong> Understand a fraction 1/b as the quantity formed by 1 part when a whole is partitioned into b equal parts; understand a fraction a/b as the quantity formed by a parts of size 1/b.</p>
                            <p class="curr-standard-desc"><strong>3.NF.A.2:</strong> Understand a fraction as a number on the number line; represent fractions on a number line diagram.</p>
                            <p class="curr-standard-desc"><strong>3.NF.A.2a:</strong> Represent a fraction 1/b on a number line diagram by defining the interval from 0 to 1 as the whole and partitioning it into b equal parts.</p>
                            <p class="curr-standard-desc"><strong>3.NF.A.2b:</strong> Represent a fraction a/b on a number line diagram by marking off a lengths 1/b from 0.</p>
                            <p class="curr-standard-desc"><strong>3.NF.A.3:</strong> Explain equivalence of fractions in special cases, and compare fractions by reasoning about their size.</p>
                            <p class="curr-standard-desc"><strong>3.NF.A.3a:</strong> Understand two fractions as equivalent (equal) if they are the same size, or the same point on a number line.</p>
                            <p class="curr-standard-desc"><strong>3.NF.A.3b:</strong> Recognize and generate simple equivalent fractions, e.g., 1/2 = 2/4, 4/6 = 2/3. Explain why the fractions are equivalent.</p>
                            <p class="curr-standard-desc"><strong>3.NF.A.3c:</strong> Express whole numbers as fractions, and recognize fractions that are equivalent to whole numbers.</p>
                            <p class="curr-standard-desc"><strong>3.NF.A.3d:</strong> Compare two fractions with the same numerator or the same denominator by reasoning about their size. Recognize that comparisons are valid only when the two fractions refer to the same whole. Record the results of comparisons with the symbols >, =, or <.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Measurement and Data (3.MD)</h4>
                            <p class="curr-standard-desc"><strong>3.MD.A.1:</strong> Tell and write time to the nearest minute and measure time intervals in minutes. Solve word problems involving addition and subtraction of time intervals in minutes.</p>
                            <p class="curr-standard-desc"><strong>3.MD.A.2:</strong> Measure and estimate liquid volumes and masses of objects using standard units of grams (g), kilograms (kg), and liters (l). Add, subtract, multiply, or divide to solve one-step word problems involving masses or volumes.</p>
                            <p class="curr-standard-desc"><strong>3.MD.B.3:</strong> Draw a scaled picture graph and a scaled bar graph to represent a data set with several categories. Solve one- and two-step "how many more" and "how many less" problems using information presented in scaled bar graphs.</p>
                            <p class="curr-standard-desc"><strong>3.MD.B.4:</strong> Generate measurement data by measuring lengths using rulers marked with halves and fourths of an inch. Show the data by making a line plot.</p>
                            <p class="curr-standard-desc"><strong>3.MD.C.5:</strong> Recognize area as an attribute of plane figures and understand concepts of area measurement.</p>
                            <p class="curr-standard-desc"><strong>3.MD.C.6:</strong> Measure areas by counting unit squares (square cm, square m, square in, square ft, and improvised units).</p>
                            <p class="curr-standard-desc"><strong>3.MD.C.7:</strong> Relate area to the operations of multiplication and addition.</p>
                            <p class="curr-standard-desc"><strong>3.MD.C.7a:</strong> Find the area of a rectangle with whole-number side lengths by tiling it, and show that the area is the same as would be found by multiplying the side lengths.</p>
                            <p class="curr-standard-desc"><strong>3.MD.C.7b:</strong> Multiply side lengths to find areas of rectangles with whole-number side lengths in the context of solving real world and mathematical problems.</p>
                            <p class="curr-standard-desc"><strong>3.MD.C.7c:</strong> Use tiling to show in a concrete case that the area of a rectangle with whole-number side lengths a and b + c is the sum of a × b and a × c (Distributive property).</p>
                            <p class="curr-standard-desc"><strong>3.MD.D.8:</strong> Solve real world and mathematical problems involving perimeters of polygons, including finding the perimeter given the side lengths, finding an unknown side length, and exhibiting rectangles with the same perimeter and different areas or with the same area and different perimeters.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Geometry (3.G)</h4>
                            <p class="curr-standard-desc"><strong>3.G.A.1:</strong> Understand that shapes in different categories (e.g., rhombuses, rectangles, and others) may share attributes (e.g., having four sides), and that the shared attributes can define a larger category (e.g., quadrilaterals). Recognize rhombuses, rectangles, and squares as examples of quadrilaterals.</p>
                            <p class="curr-standard-desc"><strong>3.G.A.2:</strong> Partition shapes into parts with equal areas. Express the area of each part as a unit fraction of the whole. For example, partition a shape into 4 parts with equal area, and describe the area of each part as 1/4 of the area of the shape.</p>
                        </div>
                    `,
                    'competencies': ['Multiplication/Division within 100', 'Intro to Fractions', 'Calculate Area & Perimeter', 'Multi-step word problems'],
                    'level': 'E'
                }
            },
            '4th Grade': {
                'ccss': {
                    'title': '4th Grade Math (CCSS)',
                    'overview': '<p>Developing fluency with multi-digit multiplication, developing understanding of dividing to find quotients involving multi-digit dividends, and understanding fraction equivalence.</p>',
                    'standards': `
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Operations and Algebraic Thinking (4.OA)</h4>
                            <p class="curr-standard-desc"><strong>4.OA.A.1:</strong> Interpret a multiplication equation as a comparison, e.g., interpret 35 = 5 × 7 as a statement that 35 is 5 times as many as 7 and 7 times as many as 5. Represent verbal statements of multiplicative comparisons as multiplication equations.</p>
                            <p class="curr-standard-desc"><strong>4.OA.A.2:</strong> Multiply or divide to solve word problems involving multiplicative comparison, e.g., by using drawings and equations with a symbol for the unknown number to represent the problem, distinguishing multiplicative comparison from additive comparison.</p>
                            <p class="curr-standard-desc"><strong>4.OA.A.3:</strong> Solve multistep word problems posed with whole numbers and having whole-number answers using the four operations, including problems in which remainders must be interpreted. Represent these problems using equations with a letter standing for the unknown quantity. Assess the reasonableness of answers using mental computation and estimation strategies including rounding.</p>
                            <p class="curr-standard-desc"><strong>4.OA.B.4:</strong> Find all factor pairs for a whole number in the range 1-100. Recognize that a whole number is a multiple of each of its factors. Determine whether a given whole number in the range 1-100 is a multiple of a given one-digit number. Determine whether a given whole number in the range 1-100 is prime or composite.</p>
                            <p class="curr-standard-desc"><strong>4.OA.C.5:</strong> Generate a number or shape pattern that follows a given rule. Identify apparent features of the pattern that were not explicit in the rule itself.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Number and Operations in Base Ten (4.NBT)</h4>
                            <p class="curr-standard-desc"><strong>4.NBT.A.1:</strong> Recognize that in a multi-digit whole number, a digit in one place represents ten times what it represents in the place to its right. For example, recognize that 700 ÷ 70 = 10 by applying concepts of place value and division.</p>
                            <p class="curr-standard-desc"><strong>4.NBT.A.2:</strong> Read and write multi-digit whole numbers using base-ten numerals, number names, and expanded form. Compare two multi-digit numbers based on meanings of the digits in each place, using >, =, and < symbols to record the results of comparisons.</p>
                            <p class="curr-standard-desc"><strong>4.NBT.A.3:</strong> Use place value understanding to round multi-digit whole numbers to any place.</p>
                            <p class="curr-standard-desc"><strong>4.NBT.B.4:</strong> Fluently add and subtract multi-digit whole numbers using the standard algorithm.</p>
                            <p class="curr-standard-desc"><strong>4.NBT.B.5:</strong> Multiply a whole number of up to four digits by a one-digit whole number, and multiply two two-digit numbers, using strategies based on place value and the properties of operations. Illustrate and explain the calculation by using equations, rectangular arrays, and/or area models.</p>
                            <p class="curr-standard-desc"><strong>4.NBT.B.6:</strong> Find whole-number quotients and remainders with up to four-digit dividends and one-digit divisors, using strategies based on place value, the properties of operations, and/or the relationship between multiplication and division. Illustrate and explain the calculation by using equations, rectangular arrays, and/or area models.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Number and Operations—Fractions (4.NF)</h4>
                            <p class="curr-standard-desc"><strong>4.NF.A.1:</strong> Explain why a fraction a/b is equivalent to a fraction (n × a)/(n × b) by using visual fraction models, with attention to how the number and size of the parts differ even though the two fractions themselves are the same size. Use this principle to recognize and generate equivalent fractions.</p>
                            <p class="curr-standard-desc"><strong>4.NF.A.2:</strong> Compare two fractions with different numerators and different denominators, e.g., by creating common denominators or numerators, or by comparing to a benchmark fraction such as 1/2. Recognize that comparisons are valid only when the two fractions refer to the same whole. Record the results of comparisons with symbols >, =, or <.</p>
                            <p class="curr-standard-desc"><strong>4.NF.B.3:</strong> Understand a fraction a/b with a > 1 as a sum of fractions 1/b.</p>
                            <p class="curr-standard-desc"><strong>4.NF.B.3a:</strong> Understand addition and subtraction of fractions as joining and separating parts referring to the same whole.</p>
                            <p class="curr-standard-desc"><strong>4.NF.B.3b:</strong> Decompose a fraction into a sum of fractions with the same denominator in more than one way, recording each decomposition by an equation.</p>
                            <p class="curr-standard-desc"><strong>4.NF.B.3c:</strong> Add and subtract mixed numbers with like denominators, e.g., by replacing each mixed number with an equivalent fraction, and/or by using properties of operations and the relationship between addition and subtraction.</p>
                            <p class="curr-standard-desc"><strong>4.NF.B.3d:</strong> Solve word problems involving addition and subtraction of fractions referring to the same whole and having like denominators, e.g., by using visual fraction models and equations to represent the problem.</p>
                            <p class="curr-standard-desc"><strong>4.NF.B.4:</strong> Apply and extend previous understandings of multiplication to multiply a fraction by a whole number.</p>
                            <p class="curr-standard-desc"><strong>4.NF.B.4c:</strong> Solve word problems involving multiplication of a fraction by a whole number, e.g., by using visual fraction models and equations to represent the problem.</p>
                            <p class="curr-standard-desc"><strong>4.NF.C.5:</strong> Express a fraction with denominator 10 as an equivalent fraction with denominator 100, and use this technique to add two fractions with respective denominators 10 and 100.</p>
                            <p class="curr-standard-desc"><strong>4.NF.C.6:</strong> Use decimal notation for fractions with denominators 10 or 100. For example, rewrite 0.62 as 62/100; describe a length as 0.62 meters; locate 0.62 on a number line diagram.</p>
                            <p class="curr-standard-desc"><strong>4.NF.C.7:</strong> Compare two decimals to hundredths by reasoning about their size. Recognize that comparisons are valid only when the two decimals refer to the same whole. Record the results of comparisons with the symbols >, =, or <.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Measurement and Data (4.MD)</h4>
                            <p class="curr-standard-desc"><strong>4.MD.A.1:</strong> Know relative sizes of measurement units within one system of units including km, m, cm; kg, g; lb, oz.; l, ml; hr, min, sec. Within a single system of measurement, express measurements in a larger unit in terms of a smaller unit. Record measurement equivalents in a two-column table.</p>
                            <p class="curr-standard-desc"><strong>4.MD.A.2:</strong> Use the four operations to solve word problems involving distances, intervals of time, liquid volumes, masses of objects, and money, including problems involving simple fractions or decimals, and problems that require expressing measurements given in a larger unit in terms of a smaller unit.</p>
                            <p class="curr-standard-desc"><strong>4.MD.A.3:</strong> Apply the area and perimeter formulas for rectangles in real world and mathematical problems.</p>
                            <p class="curr-standard-desc"><strong>4.MD.B.4:</strong> Make a line plot to display a data set of measurements in fractions of a unit (1/2, 1/4, 1/8). Solve problems involving addition and subtraction of fractions by using information presented in line plots.</p>
                            <p class="curr-standard-desc"><strong>4.MD.C.5:</strong> Recognize angles as geometric shapes that are formed wherever two rays share a common endpoint, and understand concepts of angle measurement.</p>
                            <p class="curr-standard-desc"><strong>4.MD.C.6:</strong> Measure angles in whole-number degrees using a protractor. Sketch angles of specified measure.</p>
                            <p class="curr-standard-desc"><strong>4.MD.C.7:</strong> Recognize angle measure as additive. When an angle is decomposed into non-overlapping parts, the angle measure of the whole is the sum of the angle measures of the parts. Solve addition and subtraction problems to find unknown angles on a diagram.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Geometry (4.G)</h4>
                            <p class="curr-standard-desc"><strong>4.G.A.1:</strong> Draw points, lines, line segments, rays, angles (right, acute, obtuse), and perpendicular and parallel lines. Identify these in two-dimensional figures.</p>
                            <p class="curr-standard-desc"><strong>4.G.A.2:</strong> Classify two-dimensional figures based on the presence or absence of parallel or perpendicular lines, or the presence or absence of angles of a specified size. Recognize right triangles as a category, and identify right triangles.</p>
                            <p class="curr-standard-desc"><strong>4.G.A.3:</strong> Recognize a line of symmetry for a two-dimensional figure as a line across the figure such that the figure can be folded along the line into matching parts. Identify line-symmetric figures and draw lines of symmetry.</p>
                        </div>
                    `,
                    'competencies': ['Multi-digit multiplication and division', 'Fraction addition/subtraction', 'Decimal notation for fractions', 'Angle measurement'],
                    'level': 'F'
                }
            },

            '5th Grade': {
                'ccss': {
                    'title': '5th Grade Math (CCSS)',
                    'overview': '<p>Developing fluency with addition and subtraction of fractions, integrating decimal fractions into the place value system, and understanding volume.</p>',
                    'standards': `
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Operations and Algebraic Thinking (5.OA)</h4>
                            <p class="curr-standard-desc"><strong>5.OA.A.1:</strong> Use parentheses, brackets, or braces in numerical expressions, and evaluate expressions with these symbols.</p>
                            <p class="curr-standard-desc"><strong>5.OA.A.2:</strong> Write simple expressions that record calculations with numbers, and interpret numerical expressions without evaluating them.</p>
                            <p class="curr-standard-desc"><strong>5.OA.B.3:</strong> Generate two numerical patterns using two given rules. Identify apparent relationships between corresponding terms. Form ordered pairs consisting of corresponding terms from the two patterns, and graph the ordered pairs on a coordinate plane.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Number and Operations in Base Ten (5.NBT)</h4>
                            <p class="curr-standard-desc"><strong>5.NBT.A.1:</strong> Recognize that in a multi-digit number, a digit in one place represents 10 times as much as it represents in the place to its right and 1/10 of what it represents in the place to its left.</p>
                            <p class="curr-standard-desc"><strong>5.NBT.A.2:</strong> Explain patterns in the number of zeros of the product when multiplying a number by powers of 10, and explain patterns in the placement of the decimal point when a decimal is multiplied or divided by a power of 10. Use whole-number exponents to denote powers of 10.</p>
                            <p class="curr-standard-desc"><strong>5.NBT.A.3:</strong> Read, write, and compare decimals to thousandths.</p>
                            <p class="curr-standard-desc"><strong>5.NBT.A.3a:</strong> Read and write decimals to thousandths using base-ten numerals, number names, and expanded form.</p>
                            <p class="curr-standard-desc"><strong>5.NBT.A.3b:</strong> Compare two decimals to thousandths based on meanings of the digits in each place, using >, =, and < symbols to record the results of comparisons.</p>
                            <p class="curr-standard-desc"><strong>5.NBT.A.4:</strong> Use place value understanding to round decimals to any place.</p>
                            <p class="curr-standard-desc"><strong>5.NBT.B.5:</strong> Fluently multiply multi-digit whole numbers using the standard algorithm.</p>
                            <p class="curr-standard-desc"><strong>5.NBT.B.6:</strong> Find whole-number quotients of whole numbers with up to four-digit dividends and two-digit divisors, using strategies based on place value, the properties of operations, and/or the relationship between multiplication and division. Illustrate and explain the calculation by using equations, rectangular arrays, and/or area models.</p>
                            <p class="curr-standard-desc"><strong>5.NBT.B.7:</strong> Add, subtract, multiply, and divide decimals to hundredths, using concrete models or drawings and strategies based on place value, properties of operations, and/or the relationship between addition and subtraction; relate the strategy to a written method and explain the reasoning used.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Number and Operations—Fractions (5.NF)</h4>
                            <p class="curr-standard-desc"><strong>5.NF.A.1:</strong> Add and subtract fractions with unlike denominators (including mixed numbers) by replacing given fractions with equivalent fractions in such a way as to produce an equivalent sum or difference of fractions with like denominators.</p>
                            <p class="curr-standard-desc"><strong>5.NF.A.2:</strong> Solve word problems involving addition and subtraction of fractions referring to the same whole, including cases of unlike denominators, e.g., by using visual fraction models or equations to represent the problem. Use benchmark fractions and number sense of fractions to estimate mentally and assess the reasonableness of answers.</p>
                            <p class="curr-standard-desc"><strong>5.NF.B.3:</strong> Interpret a fraction as division of the numerator by the denominator (a/b = a ÷ b). Solve word problems involving division of whole numbers leading to answers in the form of fractions or mixed numbers, e.g., by using visual fraction models or equations to represent the problem.</p>
                            <p class="curr-standard-desc"><strong>5.NF.B.4:</strong> Apply and extend previous understandings of multiplication to multiply a fraction or whole number by a fraction.</p>
                            <p class="curr-standard-desc"><strong>5.NF.B.4a:</strong> Interpret the product (a/b) × q as a parts of a partition of q into b equal parts; equivalently, as the result of a sequence of operations a × q ÷ b.</p>
                            <p class="curr-standard-desc"><strong>5.NF.B.4b:</strong> Find the area of a rectangle with fractional side lengths by tiling it with unit squares of the appropriate unit fraction side lengths, and show that the area is the same as would be found by multiplying the side lengths.</p>
                            <p class="curr-standard-desc"><strong>5.NF.B.5:</strong> Interpret multiplication as scaling (resizing), by: Comparing the size of a product to the size of one factor on the basis of the size of the other factor, without performing the indicated multiplication.</p>
                            <p class="curr-standard-desc"><strong>5.NF.B.6:</strong> Solve real world problems involving multiplication of fractions and mixed numbers, e.g., by using visual fraction models or equations to represent the problem.</p>
                            <p class="curr-standard-desc"><strong>5.NF.B.7:</strong> Apply and extend previous understandings of division to divide unit fractions by whole numbers and whole numbers by unit fractions.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Measurement and Data (5.MD)</h4>
                            <p class="curr-standard-desc"><strong>5.MD.A.1:</strong> Convert among different-sized standard measurement units within a given measurement system (e.g., convert 5 cm to 0.05 m), and use these conversions in solving multi-step, real world problems.</p>
                            <p class="curr-standard-desc"><strong>5.MD.B.2:</strong> Make a line plot to display a data set of measurements in fractions of a unit (1/2, 1/4, 1/8). Use operations on fractions for this grade to solve problems involving information presented in line plots.</p>
                            <p class="curr-standard-desc"><strong>5.MD.C.3:</strong> Recognize volume as an attribute of solid figures and understand concepts of volume measurement.</p>
                            <p class="curr-standard-desc"><strong>5.MD.C.4:</strong> Measure volumes by counting unit cubes, using cubic cm, cubic in, cubic ft, and improvised units.</p>
                            <p class="curr-standard-desc"><strong>5.MD.C.5:</strong> Relate volume to the operations of multiplication and addition and solve real world and mathematical problems involving volume.</p>
                            <p class="curr-standard-desc"><strong>5.MD.C.5a:</strong> Find the volume of a right rectangular prism with whole-number side lengths by packing it with unit cubes, and show that the volume is the same as would be found by multiplying the edge lengths, equivalently by multiplying the height by the area of the base.</p>
                            <p class="curr-standard-desc"><strong>5.MD.C.5b:</strong> Apply the formulas V = l × w × h and V = b × h for rectangular prisms to find volumes of right rectangular prisms with whole-number edge lengths in the context of solving real world and mathematical problems.</p>
                            <p class="curr-standard-desc"><strong>5.MD.C.5c:</strong> Recognize volume as additive. Find volumes of solid figures composed of two non-overlapping right rectangular prisms by adding the volumes of the non-overlapping parts, applying this technique to solve real world problems.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Geometry (5.G)</h4>
                            <p class="curr-standard-desc"><strong>5.G.A.1:</strong> Use a pair of perpendicular number lines, called axes, to define a coordinate system, with the intersection of the lines (the origin) arranged to coincide with the 0 on each line and a given point in the plane located by using an ordered pair of numbers, called its coordinates.</p>
                            <p class="curr-standard-desc"><strong>5.G.A.2:</strong> Represent real world and mathematical problems by graphing points in the first quadrant of the coordinate plane, and interpret coordinate values of points in the context of the situation.</p>
                            <p class="curr-standard-desc"><strong>5.G.B.3:</strong> Understand that attributes belonging to a category of two-dimensional figures also belong to all subcategories of that category. For example, all rectangles have four right angles and squares are rectangles, so all squares have four right angles.</p>
                            <p class="curr-standard-desc"><strong>5.G.B.4:</strong> Classify two-dimensional figures in a hierarchy based on properties.</p>
                        </div>
                    `,
                    'competencies': ['Fraction operations (all four)', 'Decimal operations to hundredths', 'Calculate Volume', 'Coordinate plane graphing'],
                    'level': 'G'
                }
            },

            '6th Grade': {
                'ccss': {
                    'title': '6th Grade Math (CCSS)',
                    'overview': '<p>Connecting ratio and rate to whole number multiplication and division, completing understanding of division of fractions, and developing understanding of statistical thinking.</p>',
                    'standards': `
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Ratios and Proportional Relationships (6.RP)</h4>
                            <p class="curr-standard-desc"><strong>6.RP.A.1:</strong> Understand the concept of a ratio and use ratio language to describe a ratio relationship between two quantities.</p>
                            <p class="curr-standard-desc"><strong>6.RP.A.2:</strong> Understand the concept of a unit rate a/b associated with a ratio a:b with b ≠ 0, and use rate language in the context of a ratio relationship.</p>
                            <p class="curr-standard-desc"><strong>6.RP.A.3:</strong> Use ratio and rate reasoning to solve real-world and mathematical problems, e.g., by reasoning about tables of equivalent ratios, tape diagrams, double number line diagrams, or equations.</p>
                            <p class="curr-standard-desc"><strong>6.RP.A.3a:</strong> Make tables of equivalent ratios relating quantities with whole-number measurements, find missing values in the tables, and plot the pairs of values on the coordinate plane. Use tables to compare ratios.</p>
                            <p class="curr-standard-desc"><strong>6.RP.A.3b:</strong> Solve unit rate problems including those involving unit pricing and constant speed.</p>
                            <p class="curr-standard-desc"><strong>6.RP.A.3c:</strong> Find a percent of a quantity as a rate per 100 (e.g., 30% of a quantity means 30/100 times the quantity); solve problems involving finding the whole, given a part and the percent.</p>
                            <p class="curr-standard-desc"><strong>6.RP.A.3d:</strong> Use ratio reasoning to convert measurement units; manipulate and transform units appropriately when multiplying or dividing quantities.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">The Number System (6.NS)</h4>
                            <p class="curr-standard-desc"><strong>6.NS.A.1:</strong> Interpret and compute quotients of fractions, and solve word problems involving division of fractions by fractions, e.g., by using visual fraction models and equations to represent the problem.</p>
                            <p class="curr-standard-desc"><strong>6.NS.B.2:</strong> Fluently divide multi-digit numbers using the standard algorithm.</p>
                            <p class="curr-standard-desc"><strong>6.NS.B.3:</strong> Fluently add, subtract, multiply, and divide multi-digit decimals using the standard algorithm for each operation.</p>
                            <p class="curr-standard-desc"><strong>6.NS.B.4:</strong> Find the greatest common factor of two whole numbers less than or equal to 100 and the least common multiple of two whole numbers less than or equal to 12. Use the distributive property to express a sum of two whole numbers 1-100 with a common factor as a multiple of a sum of two whole numbers with no common factor.</p>
                            <p class="curr-standard-desc"><strong>6.NS.C.5:</strong> Understand that positive and negative numbers are used together to describe quantities having opposite directions or values; use positive and negative numbers to represent quantities in real-world contexts, explaining the meaning of 0 in each situation.</p>
                            <p class="curr-standard-desc"><strong>6.NS.C.6:</strong> Understand a rational number as a point on the number line. Extend number line diagrams and coordinate axes familiar from previous grades to represent points on the line and in the plane with negative number coordinates.</p>
                            <p class="curr-standard-desc"><strong>6.NS.C.7:</strong> Understand ordering and absolute value of rational numbers.</p>
                            <p class="curr-standard-desc"><strong>6.NS.C.8:</strong> Solve real-world and mathematical problems by graphing points in all four quadrants of the coordinate plane. Include use of coordinates and absolute value to find distances between points with the same first coordinate or the same second coordinate.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Expressions and Equations (6.EE)</h4>
                            <p class="curr-standard-desc"><strong>6.EE.A.1:</strong> Write and evaluate numerical expressions involving whole-number exponents.</p>
                            <p class="curr-standard-desc"><strong>6.EE.A.2:</strong> Write, read, and evaluate expressions in which letters stand for numbers.</p>
                            <p class="curr-standard-desc"><strong>6.EE.A.2a:</strong> Write expressions that record operations with numbers and with letters standing for numbers.</p>
                            <p class="curr-standard-desc"><strong>6.EE.A.2c:</strong> Evaluate expressions at specific values of their variables. Include expressions that arise from formulas used in real-world problems. Perform arithmetic operations, including those involving whole-number exponents, in the conventional order when there are no parentheses to specify a particular order (Order of Operations).</p>
                            <p class="curr-standard-desc"><strong>6.EE.A.3:</strong> Apply the properties of operations to generate equivalent expressions.</p>
                            <p class="curr-standard-desc"><strong>6.EE.A.4:</strong> Identify when two expressions are equivalent (i.e., when the two expressions name the same number regardless of which value is substituted into them).</p>
                            <p class="curr-standard-desc"><strong>6.EE.B.5:</strong> Understand solving an equation or inequality as a process of answering a question: which values from a specified set, if any, make the equation or inequality true? Use substitution to determine whether a given number in a specified set makes an equation or inequality true.</p>
                            <p class="curr-standard-desc"><strong>6.EE.B.6:</strong> Use variables to represent numbers and write expressions when solving a real-world or mathematical problem; understand that a variable can represent an unknown number, or, depending on the purpose at hand, any number in a specified set.</p>
                            <p class="curr-standard-desc"><strong>6.EE.B.7:</strong> Solve real-world and mathematical problems by writing and solving equations of the form x + p = q and px = q for cases in which p, q and x are all nonnegative rational numbers.</p>
                            <p class="curr-standard-desc"><strong>6.EE.B.8:</strong> Write an inequality of the form x > c or x < c to represent a constraint or condition in a real-world or mathematical problem. Recognize that inequalities of the form x > c or x < c have infinitely many solutions; represent solutions of such inequalities on number line diagrams.</p>
                            <p class="curr-standard-desc"><strong>6.EE.C.9:</strong> Use variables to represent two quantities in a real-world problem that change in relationship to one another; write an equation to express one quantity, thought of as the dependent variable, in terms of the other quantity, thought of as the independent variable. Analyze the relationship between the dependent and independent variables using graphs and tables, and relate these to the equation.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Geometry (6.G)</h4>
                            <p class="curr-standard-desc"><strong>6.G.A.1:</strong> Find the area of right triangles, other triangles, special quadrilaterals, and polygons by composing into rectangles or decomposing into triangles and other shapes; apply these techniques in the context of solving real-world and mathematical problems.</p>
                            <p class="curr-standard-desc"><strong>6.G.A.2:</strong> Find the volume of a right rectangular prism with fractional edge lengths by packing it with unit cubes of the appropriate unit fraction edge lengths, and show that the volume is the same as would be found by multiplying the edge lengths of the prism. Apply the formulas V = l w h and V = b h to find volumes of right rectangular prisms with fractional edge lengths in the context of solving real-world and mathematical problems.</p>
                            <p class="curr-standard-desc"><strong>6.G.A.3:</strong> Draw polygons in the coordinate plane given coordinates for the vertices; use coordinates to find the length of a side joining points with the same first coordinate or the same second coordinate. Apply these techniques in the context of solving real-world and mathematical problems.</p>
                            <p class="curr-standard-desc"><strong>6.G.A.4:</strong> Represent three-dimensional figures using nets made up of rectangles and triangles, and use the nets to find the surface area of these figures. Apply these techniques in the context of solving real-world and mathematical problems.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Statistics and Probability (6.SP)</h4>
                            <p class="curr-standard-desc"><strong>6.SP.A.1:</strong> Recognize a statistical question as one that anticipates variability in the data related to the question and accounts for it in the answers.</p>
                            <p class="curr-standard-desc"><strong>6.SP.A.2:</strong> Understand that a set of data collected to answer a statistical question has a distribution which can be described by its center, spread, and overall shape.</p>
                            <p class="curr-standard-desc"><strong>6.SP.A.3:</strong> Recognize that a measure of center for a numerical data set summarizes all of its values with a single number, while a measure of variation describes how its values vary with a single number.</p>
                            <p class="curr-standard-desc"><strong>6.SP.B.4:</strong> Display numerical data in plots on a number line, including dot plots, histograms, and box plots.</p>
                            <p class="curr-standard-desc"><strong>6.SP.B.5:</strong> Summarize numerical data sets in relation to their context, such as by: Reporting the number of observations, Describing the nature of the attribute under investigation, Giving quantitative measures of center (median and/or mean) and variability (interquartile range and/or mean absolute deviation), Relating the choice of measures of center and variability to the shape of the data distribution and the context in which the data were gathered.</p>
                        </div>
                    `,
                    'competencies': ['Ratios, rates, and percents', 'Division of fractions', 'Rational numbers & negative numbers', 'Solving 1-step equations', 'Statistical variability'],
                    'level': 'H'
                }
            },

            '7th Grade': {
                'ccss': {
                    'title': '7th Grade Math (CCSS)',
                    'overview': '<p>Developing understanding of proportional relationships, operations with rational numbers, and working with expressions and linear equations.</p>',
                    'standards': `
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Ratios and Proportional Relationships (7.RP)</h4>
                            <p class="curr-standard-desc"><strong>7.RP.A.1:</strong> Compute unit rates associated with ratios of fractions, including ratios of lengths, areas and other quantities measured in like or different units.</p>
                            <p class="curr-standard-desc"><strong>7.RP.A.2:</strong> Recognize and represent proportional relationships between quantities.</p>
                            <p class="curr-standard-desc"><strong>7.RP.A.2a:</strong> Decide whether two quantities are in a proportional relationship, e.g., by testing for equivalent ratios in a table or graphing on a coordinate plane and observing whether the graph is a straight line through the origin.</p>
                            <p class="curr-standard-desc"><strong>7.RP.A.2b:</strong> Identify the constant of proportionality (unit rate) in tables, graphs, equations, diagrams, and verbal descriptions of proportional relationships.</p>
                            <p class="curr-standard-desc"><strong>7.RP.A.2c:</strong> Represent proportional relationships by equations.</p>
                            <p class="curr-standard-desc"><strong>7.RP.A.2d:</strong> Explain what a point (x, y) on the graph of a proportional relationship means in terms of the situation, with special attention to the points (0, 0) and (1, r) where r is the unit rate.</p>
                            <p class="curr-standard-desc"><strong>7.RP.A.3:</strong> Use proportional relationships to solve multistep ratio and percent problems. Examples: simple interest, tax, markups and markdowns, gratuities and commissions, fees, percent increase and decrease, percent error.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">The Number System (7.NS)</h4>
                            <p class="curr-standard-desc"><strong>7.NS.A.1:</strong> Apply and extend previous understandings of addition and subtraction to add and subtract rational numbers; represent addition and subtraction on a horizontal or vertical number line diagram.</p>
                            <p class="curr-standard-desc"><strong>7.NS.A.1c:</strong> Understand subtraction of rational numbers as adding the additive inverse, p - q = p + (-q). Show that the distance between two rational numbers on the number line is the absolute value of their difference, and apply this principle in real-world contexts.</p>
                            <p class="curr-standard-desc"><strong>7.NS.A.2:</strong> Apply and extend previous understandings of multiplication and division and of fractions to multiply and divide rational numbers.</p>
                            <p class="curr-standard-desc"><strong>7.NS.A.2d:</strong> Convert a rational number to a decimal using long division; know that the decimal form of a rational number terminates in 0s or eventually repeats.</p>
                            <p class="curr-standard-desc"><strong>7.NS.A.3:</strong> Solve real-world and mathematical problems involving the four operations with rational numbers. (Computations with rational numbers extend the rules for manipulating fractions to complex fractions.)</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Expressions and Equations (7.EE)</h4>
                            <p class="curr-standard-desc"><strong>7.EE.A.1:</strong> Apply properties of operations as strategies to add, subtract, factor, and expand linear expressions with rational coefficients.</p>
                            <p class="curr-standard-desc"><strong>7.EE.A.2:</strong> Understand that rewriting an expression in different forms in a problem context can shed light on the problem and how the quantities in it are related.</p>
                            <p class="curr-standard-desc"><strong>7.EE.B.3:</strong> Solve multi-step real-life and mathematical problems posed with positive and negative rational numbers in any form (whole numbers, fractions, and decimals), using tools strategically. Apply properties of operations to calculate with numbers in any form; convert between forms as appropriate; and assess the reasonableness of answers using mental computation and estimation strategies.</p>
                            <p class="curr-standard-desc"><strong>7.EE.B.4:</strong> Use variables to represent quantities in a real-world or mathematical problem, and construct simple equations and inequalities to solve problems by reasoning about the quantities.</p>
                            <p class="curr-standard-desc"><strong>7.EE.B.4a:</strong> Solve word problems leading to equations of the form px + q = r and p(x + q) = r, where p, q, and r are specific rational numbers. Solve equations of these forms fluently. Compare an algebraic solution to an arithmetic solution, identifying the sequence of the operations used in each approach.</p>
                            <p class="curr-standard-desc"><strong>7.EE.B.4b:</strong> Solve word problems leading to inequalities of the form px + q > r or px + q < r, where p, q, and r are specific rational numbers. Graph the solution set of the inequality and interpret it in the context of the problem.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Geometry (7.G)</h4>
                            <p class="curr-standard-desc"><strong>7.G.A.1:</strong> Solve problems involving scale drawings of geometric figures, including computing actual lengths and areas from a scale drawing and reproducing a scale drawing at a different scale.</p>
                            <p class="curr-standard-desc"><strong>7.G.A.2:</strong> Draw (freehand, with ruler and protractor, and with technology) geometric shapes with given conditions. Focus on constructing triangles from three measures of angles or sides, noticing when the conditions determine a unique triangle, more than one triangle, or no triangle.</p>
                            <p class="curr-standard-desc"><strong>7.G.A.3:</strong> Describe the two-dimensional figures that result from slicing three-dimensional figures, as in plane sections of right rectangular prisms and right rectangular pyramids.</p>
                            <p class="curr-standard-desc"><strong>7.G.B.4:</strong> Know the formulas for the area and circumference of a circle and use them to solve problems; give an informal derivation of the relationship between the circumference and area of a circle.</p>
                            <p class="curr-standard-desc"><strong>7.G.B.5:</strong> Use facts about supplementary, complementary, vertical, and adjacent angles in a multi-step problem to write and solve simple equations for an unknown angle in a figure.</p>
                            <p class="curr-standard-desc"><strong>7.G.B.6:</strong> Solve real-world and mathematical problems involving area, volume and surface area of two- and three-dimensional objects composed of triangles, quadrilaterals, polygons, cubes, and right prisms.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Statistics and Probability (7.SP)</h4>
                            <p class="curr-standard-desc"><strong>7.SP.A.1:</strong> Understand that statistics can be used to gain information about a population by examining a sample of the population; generalizations about a population from a sample are valid only if the sample is representative of that population. Understand that random sampling tends to produce representative samples and support valid inferences.</p>
                            <p class="curr-standard-desc"><strong>7.SP.A.2:</strong> Use data from a random sample to draw inferences about a population with an unknown characteristic of interest. Generate multiple samples (or simulated samples) of the same size to gauge the variation in estimates or predictions.</p>
                            <p class="curr-standard-desc"><strong>7.SP.B.3:</strong> Informally assess the degree of visual overlap of two numerical data distributions with similar variabilities, measuring the difference between the centers by expressing it as a multiple of a measure of variability.</p>
                            <p class="curr-standard-desc"><strong>7.SP.B.4:</strong> Use measures of center and measures of variability for numerical data from random samples to draw informal comparative inferences about two populations.</p>
                            <p class="curr-standard-desc"><strong>7.SP.C.5:</strong> Understand that the probability of a chance event is a number between 0 and 1 that expresses the likelihood of the event occurring. Larger numbers indicate greater likelihood. A probability near 0 indicates an unlikely event, a probability around 1/2 indicates an event that is neither unlikely nor likely, and a probability near 1 indicates a likely event.</p>
                            <p class="curr-standard-desc"><strong>7.SP.C.6:</strong> Approximate the probability of a chance event by collecting data on the chance process that produces it and observing its long-run relative frequency, and predict the approximate relative frequency given the probability.</p>
                            <p class="curr-standard-desc"><strong>7.SP.C.7:</strong> Develop a probability model and use it to find probabilities of events. Compare probabilities from a model to observed frequencies; if the agreement is not good, explain possible sources of the discrepancy.</p>
                            <p class="curr-standard-desc"><strong>7.SP.C.8:</strong> Find probabilities of compound events using organized lists, tables, tree diagrams, and simulation.</p>
                        </div>
                    `,
                    'competencies': ['Proportional relationships', 'Operations with rational numbers', 'Solving multi-step equations', 'Angle measure, surface area, and volume', 'Probability models'],
                    'level': 'I'
                }
            },

            '8th Grade': {
                'ccss': {
                    'title': '8th Grade Math (CCSS)',
                    'overview': '<p>Formulating and reasoning about expressions and equations, grasping the concept of a function, and analyzing two- and three-dimensional space and figures.</p>',
                    'standards': `
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">The Number System (8.NS)</h4>
                            <p class="curr-standard-desc"><strong>8.NS.A.1:</strong> Know that numbers that are not rational are called irrational. Understand informally that every number has a decimal expansion; for rational numbers show that the decimal expansion repeats eventually, and convert a decimal expansion which repeats eventually into a rational number.</p>
                            <p class="curr-standard-desc"><strong>8.NS.A.2:</strong> Use rational approximations of irrational numbers to compare the size of irrational numbers, locate them approximately on a number line diagram, and estimate the value of expressions (e.g., π²).</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Expressions and Equations (8.EE)</h4>
                            <p class="curr-standard-desc"><strong>8.EE.A.1:</strong> Know and apply the properties of integer exponents to generate equivalent numerical expressions. For example, 3² × 3⁻⁵ = 3⁻³ = 1/3³ = 1/27.</p>
                            <p class="curr-standard-desc"><strong>8.EE.A.2:</strong> Use square root and cube root symbols to represent solutions to equations of the form x² = p and x³ = p, where p is a positive rational number. Evaluate square roots of small perfect squares and cube roots of small perfect cubes. Know that √2 is irrational.</p>
                            <p class="curr-standard-desc"><strong>8.EE.A.3:</strong> Use numbers expressed in the form of a single digit times an integer power of 10 to estimate very large or very small quantities, and to express how many times as much one is than the other.</p>
                            <p class="curr-standard-desc"><strong>8.EE.A.4:</strong> Perform operations with numbers expressed in scientific notation, including problems where both decimal and scientific notation are used. Use scientific notation and choose units of appropriate size for measurements of very large or very small quantities (e.g., use millimeters per year for seafloor spreading). Interpret scientific notation that has been generated by technology.</p>
                            <p class="curr-standard-desc"><strong>8.EE.B.5:</strong> Graph proportional relationships, interpreting the unit rate as the slope of the graph. Compare two different proportional relationships represented in different ways.</p>
                            <p class="curr-standard-desc"><strong>8.EE.B.6:</strong> Use similar triangles to explain why the slope m is the same between any two distinct points on a non-vertical line in the coordinate plane; derive the equation y = mx for a line through the origin and the equation y = mx + b for a line intercepting the vertical axis at b.</p>
                            <p class="curr-standard-desc"><strong>8.EE.C.7:</strong> Solve linear equations in one variable.</p>
                            <p class="curr-standard-desc"><strong>8.EE.C.7a:</strong> Give examples of linear equations in one variable with one solution, infinitely many solutions, or no solutions. Show which of these possibilities is the case by successively transforming the given equation into simpler forms, until an equivalent equation of the form x = a, a = a, or a = b results (where a and b are different numbers).</p>
                            <p class="curr-standard-desc"><strong>8.EE.C.7b:</strong> Solve linear equations with rational number coefficients, including equations whose solutions require expanding expressions using the distributive property and collecting like terms.</p>
                            <p class="curr-standard-desc"><strong>8.EE.C.8:</strong> Analyze and solve pairs of simultaneous linear equations.</p>
                            <p class="curr-standard-desc"><strong>8.EE.C.8a:</strong> Understand that solutions to a system of two linear equations in two variables correspond to points of intersection of their graphs, because points of intersection satisfy both equations simultaneously.</p>
                            <p class="curr-standard-desc"><strong>8.EE.C.8b:</strong> Solve systems of two linear equations in two variables algebraically, and estimate solutions by graphing the equations. Solve simple cases by inspection. For example, 3x + 2y = 5 and 3x + 2y = 6 have no solution because 3x + 2y cannot simultaneously be 5 and 6.</p>
                            <p class="curr-standard-desc"><strong>8.EE.C.8c:</strong> Solve real-world and mathematical problems leading to two linear equations in two variables.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Functions (8.F)</h4>
                            <p class="curr-standard-desc"><strong>8.F.A.1:</strong> Understand that a function is a rule that assigns to each input exactly one output. The graph of a function is the set of ordered pairs consisting of an input and the corresponding output.</p>
                            <p class="curr-standard-desc"><strong>8.F.A.2:</strong> Compare properties of two functions each represented in a different way (algebraically, graphically, numerically in tables, or by verbal descriptions).</p>
                            <p class="curr-standard-desc"><strong>8.F.A.3:</strong> Interpret the equation y = mx + b as defining a linear function, whose graph is a straight line; give examples of functions that are not linear.</p>
                            <p class="curr-standard-desc"><strong>8.F.B.4:</strong> Construct a function to model a linear relationship between two quantities. Determine the rate of change and initial value of the function from a description of a relationship or from two (x, y) values, including reading these from a table or from a graph. Interpret the rate of change and initial value of a linear function in terms of the situation it models, and in terms of its graph or a table of values.</p>
                            <p class="curr-standard-desc"><strong>8.F.B.5:</strong> Describe qualitatively the functional relationship between two quantities by analyzing a graph (e.g., where the function is increasing or decreasing, linear or nonlinear). Sketch a graph that exhibits the qualitative features of a function that has been described verbally.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Geometry (8.G)</h4>
                            <p class="curr-standard-desc"><strong>8.G.A.1:</strong> Verify experimentally the properties of rotations, reflections, and translations.</p>
                            <p class="curr-standard-desc"><strong>8.G.A.2:</strong> Understand that a two-dimensional figure is congruent to another if the second can be obtained from the first by a sequence of rotations, reflections, and translations; given two congruent figures, describe a sequence that exhibits the congruence between them.</p>
                            <p class="curr-standard-desc"><strong>8.G.A.3:</strong> Describe the effect of dilations, translations, rotations, and reflections on two-dimensional figures using coordinates.</p>
                            <p class="curr-standard-desc"><strong>8.G.A.4:</strong> Understand that a two-dimensional figure is similar to another if the second can be obtained from the first by a sequence of rotations, reflections, translations, and dilations; given two similar two-dimensional figures, describe a sequence that exhibits the similarity between them.</p>
                            <p class="curr-standard-desc"><strong>8.G.A.5:</strong> Use informal arguments to establish facts about the angle sum and exterior angle of triangles, about the angles created when parallel lines are cut by a transversal, and the angle-angle criterion for similarity of triangles.</p>
                            <p class="curr-standard-desc"><strong>8.G.B.6:</strong> Explain a proof of the Pythagorean Theorem and its converse.</p>
                            <p class="curr-standard-desc"><strong>8.G.B.7:</strong> Apply the Pythagorean Theorem to determine unknown side lengths in right triangles in real-world and mathematical problems in two and three dimensions.</p>
                            <p class="curr-standard-desc"><strong>8.G.B.8:</strong> Apply the Pythagorean Theorem to find the distance between two points in a coordinate system.</p>
                            <p class="curr-standard-desc"><strong>8.G.C.9:</strong> Know the formulas for the volumes of cones, cylinders, and spheres and use them to solve real-world and mathematical problems.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Statistics and Probability (8.SP)</h4>
                            <p class="curr-standard-desc"><strong>8.SP.A.1:</strong> Construct and interpret scatter plots for bivariate measurement data to investigate patterns of association between two quantities. Describe patterns such as clustering, outliers, positive or negative association, linear association, and nonlinear association.</p>
                            <p class="curr-standard-desc"><strong>8.SP.A.2:</strong> Know that straight lines are widely used to model relationships between two quantitative variables. For scatter plots that suggest a linear association, informally fit a straight line, and informally assess the model fit by judging the closeness of the data points to the line.</p>
                            <p class="curr-standard-desc"><strong>8.SP.A.3:</strong> Use the equation of a linear model to solve problems in the context of bivariate measurement data, interpreting the slope and intercept.</p>
                            <p class="curr-standard-desc"><strong>8.SP.A.4:</strong> Understand that patterns of association can also be seen in bivariate categorical data by displaying frequencies and relative frequencies in a two-way table. Construct and interpret a two-way table summarizing data on two categorical variables collected from the same subjects. Use relative frequencies calculated for rows or columns to describe possible association between the two variables.</p>
                        </div>
                    `,
                    'competencies': ['Radicals and integer exponents', 'Linear equations and systems', 'Functions and modeling', 'Pythagorean Theorem', 'Bivariate data analysis'],
                    'level': 'J'
                }
            },

            'High School': {
                'ccss': {
                    'title': 'High School Math (CCSS Conceptual Categories)',
                    'overview': '<p>High school standards specify the mathematics that all students should study in order to be college and career ready, organized by conceptual categories (Number/Quantity, Algebra, Functions, Geometry, Statistics/Probability) rather than by grade.</p>',
                    'standards': `
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Number and Quantity (HSN)</h4>
                            <p class="curr-standard-desc"><strong>HSN-RN (The Real Number System):</strong> Extend the properties of exponents to rational exponents; use properties of rational and irrational numbers.</p>
                            <p class="curr-standard-desc"><strong>HSN-Q (Quantities):</strong> Reason quantitatively and use units to solve problems.</p>
                            <p class="curr-standard-desc"><strong>HSN-CN (The Complex Number System):</strong> Perform arithmetic operations with complex numbers; represent complex numbers and their operations on the complex plane; use complex numbers in polynomial identities and equations.</p>
                            <p class="curr-standard-desc"><strong>HSN-VM (Vector and Matrix Quantities):</strong> Represent and model with vector quantities; perform operations on vectors; perform operations on matrices and use matrices in applications.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Algebra (HSA)</h4>
                            <p class="curr-standard-desc"><strong>HSA-SSE (Seeing Structure in Expressions):</strong> Interpret the structure of expressions; write expressions in equivalent forms to solve problems.</p>
                            <p class="curr-standard-desc"><strong>HSA-APR (Arithmetic with Polynomials and Rational Expressions):</strong> Perform arithmetic operations on polynomials; understand the relationship between zeros and factors of polynomials; use polynomial identities to solve problems; rewrite rational expressions.</p>
                            <p class="curr-standard-desc"><strong>HSA-CED (Creating Equations):</strong> Create equations that describe numbers or relationships.</p>
                            <p class="curr-standard-desc"><strong>HSA-REI (Reasoning with Equations and Inequalities):</strong> Understand solving equations as a process of reasoning and explain the reasoning; solve equations and inequalities in one variable; solve systems of equations; represent and solve equations and inequalities graphically.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Functions (HSF)</h4>
                            <p class="curr-standard-desc"><strong>HSF-IF (Interpreting Functions):</strong> Understand the concept of a function and use function notation; interpret functions that arise in applications in terms of the context; analyze functions using different representations.</p>
                            <p class="curr-standard-desc"><strong>HSF-BF (Building Functions):</strong> Build a function that models a relationship between two quantities; build new functions from existing functions.</p>
                            <p class="curr-standard-desc"><strong>HSF-LE (Linear, Quadratic, and Exponential Models):</strong> Construct and compare linear, quadratic, and exponential models and solve problems; interpret expressions for functions in terms of the situation they model.</p>
                            <p class="curr-standard-desc"><strong>HSF-TF (Trigonometric Functions):</strong> Extend the domain of trigonometric functions using the unit circle; model periodic phenomena with trigonometric functions; prove and apply trigonometric identities.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Geometry (HSG)</h4>
                            <p class="curr-standard-desc"><strong>HSG-CO (Congruence):</strong> Experiment with transformations in the plane; understand congruence in terms of rigid motions; prove geometric theorems; make geometric constructions.</p>
                            <p class="curr-standard-desc"><strong>HSG-SRT (Similarity, Right Triangles, and Trigonometry):</strong> Understand similarity in terms of similarity transformations; prove theorems involving similarity; define trigonometric ratios and solve problems involving right triangles; apply trigonometry to general triangles.</p>
                            <p class="curr-standard-desc"><strong>HSG-C (Circles):</strong> Understand and apply theorems about circles; find arc lengths and areas of sectors of circles.</p>
                            <p class="curr-standard-desc"><strong>HSG-GPE (Expressing Geometric Properties with Equations):</strong> Translate between the geometric description and the equation for a conic section; use coordinates to prove simple geometric theorems algebraically.</p>
                            <p class="curr-standard-desc"><strong>HSG-GMD (Geometric Measurement and Dimension):</strong> Explain volume formulas and use them to solve problems; visualize relationships between two-dimensional and three-dimensional objects.</p>
                            <p class="curr-standard-desc"><strong>HSG-MG (Modeling with Geometry):</strong> Apply geometric concepts in modeling situations.</p>
                        </div>
                        <div class="curr-standard-item">
                            <h4 class="curr-standard-title">Statistics and Probability (HSS)</h4>
                            <p class="curr-standard-desc"><strong>HSS-ID (Interpreting Categorical and Quantitative Data):</strong> Summarize, represent, and interpret data on a single count or measurement variable; summarize, represent, and interpret data on two categorical and quantitative variables; interpret linear models.</p>
                            <p class="curr-standard-desc"><strong>HSS-IC (Making Inferences and Justifying Conclusions):</strong> Understand and evaluate random processes underlying statistical experiments; make inferences and justify conclusions from sample surveys, experiments, and observational studies.</p>
                            <p class="curr-standard-desc"><strong>HSS-CP (Conditional Probability and the Rules of Probability):</strong> Understand independence and conditional probability and use them to interpret data; use the rules of probability to compute probabilities of compound events in a uniform probability model.</p>
                            <p class="curr-standard-desc"><strong>HSS-MD (Using Probability to Make Decisions):</strong> Calculate expected values and use them to solve problems; use probability to evaluate outcomes of decisions.</p>
                        </div>
                    `,
                    'competencies': ['Advanced Algebra & Polynomials', 'Trigonometry & Advanced Geometry', 'Statistical Inference', 'Mathematical Modeling', 'Complex Numbers & Vectors'],
                    'level': 'K-M'
                }
            }
        }
    }
};
    
    mergeCurriculumData(window.curriculumData, localData);
})();
var curriculumData = window.curriculumData;

/* 
 * Usage example for your frontend code:
 * document.getElementById('content').innerHTML = curriculumData.math.grades['6th Grade'].ccss.standards;
 */