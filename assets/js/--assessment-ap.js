// Hesten's Learning - AP Content Expansion
// This file injects Advanced Placement (AP) questions into the shared questionBank.

(function () {
    const apContent = [
        // ==================== AP MATH (Calculus, Statistics) ====================
        { grade: "Advanced Placement", subject: "Math", question: "[AP Calc] What is the limit of (sin x)/x as x approaches 0?", options: ["0", "1", "Infinity", "Undefined"], answer: "1", hint: "Fundamental trig limit." },
        { grade: "Advanced Placement", subject: "Math", question: "[AP Calc] The derivative of f(x) = e^x is?", options: ["e^x", "xe^(x-1)", "ln(x)", "1"], answer: "e^x", hint: "It is its own derivative." },
        { grade: "Advanced Placement", subject: "Math", question: "[AP Calc] If f'(x) > 0, then f(x) is?", options: ["Increasing", "Decreasing", "Concave Up", "Concave Down"], answer: "Increasing", hint: "Positive slope." },
        { grade: "Advanced Placement", subject: "Math", question: "[AP Calc] What is the integral of 1/x dx?", options: ["ln|x| + C", "-1/x^2", "e^x", "1"], answer: "ln|x| + C", hint: "Reverse of derivative of ln(x)." },
        { grade: "Advanced Placement", subject: "Math", question: "[AP Calc] The Mean Value Theorem strictly applies to functions that are?", options: ["Continuous & Differentiable", "Only Continuous", "Only Differentiable", "Integrable"], answer: "Continuous & Differentiable", hint: "Smooth and connected." },
        { grade: "Advanced Placement", subject: "Math", question: "[AP Stats] What does a correlation coefficient (r) of 0.9 imply?", options: ["Strong positive linear relationship", "Weak positive", "Strong negative", "No correlation"], answer: "Strong positive linear relationship", hint: "Close to 1." },
        { grade: "Advanced Placement", subject: "Math", question: "[AP Stats] In a normal distribution, what % is within 1 SD?", options: ["68%", "95%", "99.7%", "50%"], answer: "68%", hint: "Empirical Rule." },
        { grade: "Advanced Placement", subject: "Math", question: "[AP Stats] Type I error is?", options: ["Rejecting a true null", "Failing to reject false null", "Calculation error", "Sampling error"], answer: "Rejecting a true null", hint: "False positive." },
        { grade: "Advanced Placement", subject: "Math", question: "[AP Stats] The median is resistant to?", options: ["Outliers", "Sample size", "Mean", "Range"], answer: "Outliers", hint: "Extreme values don't pull it." },
        { grade: "Advanced Placement", subject: "Math", question: "[AP Macroecon] GDP includes?", options: ["Final goods/services produced domestically", "Used goods", "Illegal sales", "Imports"], answer: "Final goods/services produced domestically", hint: "Gross Domestic Product." },

        // ==================== AP SCIENCE (Biology, Chemistry, Physics) ====================
        { grade: "Advanced Placement", subject: "Science", question: "[AP Bio] Which organelle is the site of cellular respiration?", options: ["Mitochondria", "Chloroplast", "Ribosome", "Nucleus"], answer: "Mitochondria", hint: "Powerhouse of the cell." },
        { grade: "Advanced Placement", subject: "Science", question: "[AP Bio] DNA replication is?", options: ["Semi-conservative", "Conservative", "Dispersive", "Random"], answer: "Semi-conservative", hint: "Start with one old strand." },
        { grade: "Advanced Placement", subject: "Science", question: "[AP Bio] The final electron acceptor in the ETC?", options: ["Oxygen", "Carbon", "Water", "NADPH"], answer: "Oxygen", hint: "Allows us to breathe." },
        { grade: "Advanced Placement", subject: "Science", question: "[AP Chem] According to VSEPR, CH4 has what shape?", options: ["Tetrahedral", "Linear", "Bent", "Trigonal planar"], answer: "Tetrahedral", hint: "4 bonds, no lone pairs." },
        { grade: "Advanced Placement", subject: "Science", question: "[AP Chem] An acid is a proton ___?", options: ["Donor", "Acceptor", "Creator", "Destroyer"], answer: "Donor", hint: "Bronsted-Lowry." },
        { grade: "Advanced Placement", subject: "Science", question: "[AP Chem] PV = nRT is the?", options: ["Ideal Gas Law", "Boyle's Law", "Charles's Law", "Rate Law"], answer: "Ideal Gas Law", hint: "Equation of state." },
        { grade: "Advanced Placement", subject: "Science", question: "[AP Physics] Kinetic energy is conserved in?", options: ["Elastic collisions", "Inelastic collisions", "All collisions", "Explosions"], answer: "Elastic collisions", hint: "Bouncy." },
        { grade: "Advanced Placement", subject: "Science", question: "[AP Physics] Correct unit for Power?", options: ["Watt", "Joule", "Newton", "Volt"], answer: "Watt", hint: "J/s." },
        { grade: "Advanced Placement", subject: "Science", question: "[AP Physics] Newton's Second Law?", options: ["F = ma", "F = mv", "E = mc^2", "v = d/t"], answer: "F = ma", hint: "Force law." },
        { grade: "Advanced Placement", subject: "Science", question: "[AP Env Sci] Which gas is a major greenhouse gas?", options: ["Carbon Dioxide", "Oxygen", "Nitrogen", "Argon"], answer: "Carbon Dioxide", hint: "Global warming." },

        // ==================== AP SOCIAL STUDIES (History, Gov, Econ) ====================
        { grade: "Advanced Placement", subject: "Social Studies", question: "[AP US Gov] The 'Supreme Law of the Land' is?", options: ["The Constitution", "Declaration of Independence", "Biblical Law", "State Law"], answer: "The Constitution", hint: "Article VI." },
        { grade: "Advanced Placement", subject: "Social Studies", question: "[AP US Gov] Marbury v. Madison established?", options: ["Judicial Review", "Privacy", "Free Speech", "Gun Rights"], answer: "Judicial Review", hint: "Court power." },
        { grade: "Advanced Placement", subject: "Social Studies", question: "[AP US Gov] How many Senators per state?", options: ["2", "Based on population", "1", "4"], answer: "2", hint: "Equal representation." },
        { grade: "Advanced Placement", subject: "Social Studies", question: "[AP US Hist] The Reconstruction Era followed?", options: ["The Civil War", "WWI", "Revolutionary War", "Cold War"], answer: "The Civil War", hint: "Rebuilding the South." },
        { grade: "Advanced Placement", subject: "Social Studies", question: "[AP US Hist] The 19th Amendment granted?", options: ["Women's Suffrage", "End of Slavery", "Income Tax", "Prohibition"], answer: "Women's Suffrage", hint: "Votes for women." },
        { grade: "Advanced Placement", subject: "Social Studies", question: "[AP World] The Columbian Exchange involved?", options: ["Transfer of goods/diseases", "Silk Road trade", "Asian isolation", "African colonization"], answer: "Transfer of goods/diseases", hint: "Old World <-> New World." },
        { grade: "Advanced Placement", subject: "Social Studies", question: "[AP World] Feudalism was dominant in?", options: ["Medieval Europe", "Ancient Rome", "Modern USA", "Industrial China"], answer: "Medieval Europe", hint: "Lords and serfs." },
        { grade: "Advanced Placement", subject: "Social Studies", question: "[AP Euro] The French Revolution started in?", options: ["1789", "1492", "1914", "1848"], answer: "1789", hint: "Bastille." },
        { grade: "Advanced Placement", subject: "Social Studies", question: "[AP Microecon] Supply curve usually slopes?", options: ["Upward", "Downward", "Vertical", "Horizontal"], answer: "Upward", hint: "Higher price, more supply." },
        { grade: "Advanced Placement", subject: "Social Studies", question: "[AP Psych] Who founded Psychoanalysis?", options: ["Sigmund Freud", "B.F. Skinner", "Pavlov", "Maslow"], answer: "Sigmund Freud", hint: "Unconscious mind." },

        // ==================== AP LANGUAGE ARTS (Lang, Lit) ====================
        { grade: "Advanced Placement", subject: "Language Arts", question: "[AP Lang] Ethos appeals to?", options: ["Credibility/Ethics", "Emotion", "Logic", "Time"], answer: "Credibility/Ethics", hint: "Trust the speaker." },
        { grade: "Advanced Placement", subject: "Language Arts", question: "[AP Lang] A 'straw man' argument is a?", options: ["Logical Fallacy", "Building technique", "Strong point", "Fact"], answer: "Logical Fallacy", hint: "Misrepresenting opponent." },
        { grade: "Advanced Placement", subject: "Language Arts", question: "[AP Lang] Diction refers to?", options: ["Word Choice", "Sentence Structure", "Tone", "Rhythm"], answer: "Word Choice", hint: "Vocabulary." },
        { grade: "Advanced Placement", subject: "Language Arts", question: "[AP Lang] Syntax refers to?", options: ["Sentence Structure", "Word Choice", "Meaning", "Sound"], answer: "Sentence Structure", hint: "Order of words." },
        { grade: "Advanced Placement", subject: "Language Arts", question: "[AP Lit] A 14-line poem is a?", options: ["Sonnet", "Haiku", "Limerick", "Epic"], answer: "Sonnet", hint: "Shakespearean." },
        { grade: "Advanced Placement", subject: "Language Arts", question: "[AP Lit] Hamlet's 'To be or not to be' is a?", options: ["Soliloquy", "Dialogue", "Sonnet", "Letter"], answer: "Soliloquy", hint: "Speaking thoughts aloud." },
        { grade: "Advanced Placement", subject: "Language Arts", question: "[AP Lit] 'In medias res' means?", options: ["In the middle of things", "At the end", "From the start", "With foreshadowing"], answer: "In the middle of things", hint: "Epic convention." },
        { grade: "Advanced Placement", subject: "Language Arts", question: "[AP Lit] Irony where the audience knows more than characters?", options: ["Dramatic Irony", "Verbal Irony", "Situational Irony", "Sarcasm"], answer: "Dramatic Irony", hint: "Tragedy." },
        { grade: "Advanced Placement", subject: "Language Arts", question: "[AP Lit] The repetition of initial consonant sounds?", options: ["Alliteration", "Assonance", "Metaphor", "Simile"], answer: "Alliteration", hint: "Sally sells seashells." },
        { grade: "Advanced Placement", subject: "Language Arts", question: "[AP Lit] A story with a hidden moral meaning?", options: ["Allegory", "Biography", "Memoir", "Essay"], answer: "Allegory", hint: "Animal Farm." },
    ];

    // Safely inject into the global questionBank (defined in p-12.js)
    if (typeof questionBank !== 'undefined' && Array.isArray(questionBank)) {
        console.log("Hesten's Learning: Injecting AP Content...");
        questionBank.push(...apContent);
    } else {
        console.warn("Hesten's Learning: questionBank not found. AP content initialized standalone.");
        window.questionBank = apContent;
    }
})();