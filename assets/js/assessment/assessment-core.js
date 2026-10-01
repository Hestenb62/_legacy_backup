/**
 * assessment-core.js
 * Handles Grade Selection, Skill Population, and Recent Activity Tracking.
 */

// ... (allSkills object remains the same as previous version) ...
// (I will omit the giant allSkills object to save space, but assume it is here in the full file)
const allSkills = {
    "Pre-K": {
        Math: ["Counting to 10", "Number Recognition (1-5)", "Basic Shapes", "Sorting Objects", "Simple Patterns", "Comparing Quantities"],
        "Language Arts": ["Letter Recognition", "Phonics Intro", "Rhyming Words", "Story Comprehension", "Listening Skills", "Name Writing"],
        Science: ["Animal ID", "Plant Parts", "Five Senses", "Weather Observation", "Sink/Float", "Day and Night"],
        "Social Studies": ["My Family", "Community Helpers", "Rules and Routines", "Emotions", "Sharing"]
    },
    // ... Include all other grades here ...
    "First Grade": {
        Math: ["Addition to 20", "Subtraction to 20", "Place Value", "Counting to 120", "Time (Hour/Half)", "Money Basics"],
        "Language Arts": ["Simple Sentences", "Punctuation", "Short/Long Vowels", "Sight Words", "Capitalization"],
        Science: ["Habitats", "Weather Patterns", "Plant Life Cycle", "Solids/Liquids/Gases", "Sun and Moon"],
        "Social Studies": ["Maps and Globes", "Family Roles", "National Symbols", "Needs vs Wants"]
    },
    "Second Grade": {
        Math: ["Add/Sub to 100", "Multiplication Intro", "Fractions (1/2, 1/3, 1/4)", "Money", "Time (5 mins)"],
        "Language Arts": ["Main Idea", "Paragraph Writing", "Spelling Rules", "Parts of Speech", "Friendly Letters"],
        Science: ["States of Matter", "Life Cycles", "Earth Materials", "Magnets", "The Five Senses"],
        "Social Studies": ["Local History", "Civics Basics", "Government Roles", "Basic Economics"]
    },
    "Third Grade": {
        Math: ["Multiplication (0-10)", "Division (0-10)", "Fractions", "Area & Perimeter", "Rounding"],
        "Language Arts": ["Fiction vs Nonfiction", "Summarizing", "Nouns/Verbs/Adj", "Prefixes/Suffixes", "Cursive Intro"],
        Science: ["Forces & Motion", "Simple Machines", "Solar System", "Water Cycle", "Adaptations"],
        "Social Studies": ["World Geography", "Ancient Civilizations", "Government Branches", "Cultural Traditions"]
    },
    "Fourth Grade": {
        Math: ["Long Division", "Multi-Digit Multiplication", "Decimals Intro", "Angles & Lines", "Unit Conversions"],
        "Language Arts": ["Theme & Plot", "Inferences", "Research Skills", "Figurative Language", "Editing/Revising"],
        Science: ["Electricity", "Geology (Rocks)", "Ecosystems", "Human Body Systems", "Renewable Energy"],
        "Social Studies": ["US Geography", "State History", "American Revolution", "Economics (Trade)"]
    },
    "Fifth Grade": {
        Math: ["Fraction Operations", "Decimal Operations", "Volume", "Coordinate Plane", "Order of Operations"],
        "Language Arts": ["Essay Writing", "Public Speaking", "Persuasive Writing", "Advanced Grammar", "Root Words"],
        Science: ["Chemistry Basics", "Mixtures/Solutions", "Earth's Spheres", "Space Systems", "Photosynthesis"],
        "Social Studies": ["US Constitution", "Civil War", "Westward Expansion", "Human Rights"]
    },
    "Sixth Grade": {
        Math: ["Ratios & Rates", "Integers", "Algebraic Expressions", "Surface Area", "Statistics (Mean/Median)"],
        "Language Arts": ["Argumentative Writing", "Citing Sources", "Greek/Latin Roots", "Literary Analysis"],
        Science: ["Cells & Genetics", "Energy Transfer", "Weather & Climate", "Newton's Laws"],
        "Social Studies": ["Ancient World History", "World Religions", "Economic Systems", "Global Geography"]
    },
    "Seventh Grade": {
        Math: ["Rational Numbers", "Linear Equations", "Proportions", "Probability", "Geometric Constructions"],
        "Language Arts": ["Debate Skills", "Research Papers", "Tone & Mood", "Complex Sentences"],
        Science: ["Ecology", "Microbiology", "Geology (Plate Tectonics)", "Chemical Reactions"],
        "Social Studies": ["Middle Ages", "Renaissance", "Age of Exploration", "Civics & Government"]
    },
    "Eighth Grade": {
        Math: ["Linear Functions", "Systems of Equations", "Pythagorean Theorem", "Exponents", "Scatter Plots"],
        "Language Arts": ["Rhetorical Analysis", "Memoirs", "Poetry Analysis", "Active Voice"],
        Science: ["Atomic Theory", "Periodic Table", "Waves & Light", "Evolution", "Astronomy"],
        "Social Studies": ["US History (1800s-Present)", "Industrial Revolution", "World Wars", "Civil Rights"]
    },
    "Ninth Grade": {
        Math: ["Algebra I", "Quadratics", "Exponential Functions", "Polynomials"],
        "Language Arts": ["Literary Archetypes", "Research Methodology", "The Hero's Journey", "Formal Essays"],
        Science: ["Biology (Cellular)", "Genetics", "Ecology", "Scientific Method"],
        "Social Studies": ["World History (Modern)", "Human Geography", "Political Science"]
    },
    "Tenth Grade": {
        Math: ["Geometry", "Proofs", "Trigonometry Basics", "Circles"],
        "Language Arts": ["World Literature", "Rhetoric", "Satire", "Analytical Writing"],
        Science: ["Chemistry", "Stoichiometry", "Bonding", "Thermodynamics"],
        "Social Studies": ["European History", "Modern Conflicts", "Sociology"]
    },
    "Eleventh Grade": {
        Math: ["Algebra II", "Pre-Calculus", "Logarithms", "Matrices"],
        "Language Arts": ["American Literature", "Synthesis Essays", "Modernism"],
        Science: ["Physics", "Mechanics", "Electricity & Magnetism"],
        "Social Studies": ["US History (Advanced)", "Macroeconomics", "Psychology"]
    },
    "Twelfth Grade": {
        Math: ["Calculus", "Statistics", "Financial Math", "Linear Algebra"],
        "Language Arts": ["British Literature", "Senior Thesis", "Creative Writing"],
        Science: ["Advanced Biology/Chem/Physics", "Environmental Science", "Anatomy"],
        "Social Studies": ["US Government", "Microeconomics", "Current Events"]
    }
};

/**
 * Updates the grade, saves to local storage, and triggers UI updates.
 */
function updateGrade() {
    const gradeSelect = document.getElementById("user-grade");
    if (!gradeSelect) return;

    const grade = gradeSelect.value;
    localStorage.setItem("user-grade", grade);

    if (typeof showMessageBox === 'function') {
        showMessageBox(`Grade updated to: ${grade}`);
    } else {
        alert(`Grade updated to: ${grade}`);
    }

    populateSkills(); 
    
    if (typeof loadQuestions === 'function') {
        loadQuestions(grade);
    }
}

/**
 * Populates the skills grid based on selected Grade and Topic.
 */
function populateSkills() {
    const skillLevelEl = document.getElementById("skill-level");
    const topicEl = document.getElementById("topic");
    const skillsContainer = document.getElementById("skills-container");
    const gradeSelect = document.getElementById("user-grade");

    if (!skillLevelEl || !topicEl || !skillsContainer) return;

    if (gradeSelect && skillLevelEl.value !== gradeSelect.value) {
        skillLevelEl.value = gradeSelect.value;
    }

    const skillLevel = skillLevelEl.value;
    const topic = topicEl.value;

    skillsContainer.innerHTML = "";

    const skillsForLevel = allSkills[skillLevel];

    if (!skillsForLevel) {
        skillsContainer.innerHTML = `<p class="text-text-secondary italic text-center col-span-full">No curriculum data available for ${skillLevel}.</p>`;
        return;
    }

    let filteredSkills = {};

    if (topic === "All Topics") {
        filteredSkills = skillsForLevel;
    } else {
        if (skillsForLevel[topic]) {
            filteredSkills[topic] = skillsForLevel[topic];
        } else {
            skillsContainer.innerHTML = `<p class="text-text-secondary italic text-center col-span-full">No ${topic} skills found for ${skillLevel}.</p>`;
            return;
        }
    }

    for (const [subj, skills] of Object.entries(filteredSkills)) {
        const section = document.createElement("div");
        section.className = "mb-6 w-full";
        
        const title = document.createElement("h3");
        // Update: Uses text-text-default and theme border
        title.className = "text-lg font-bold text-text-default mb-3 border-b border-gray-200 dark:border-gray-700 pb-2";
        title.textContent = subj;
        section.appendChild(title);

        const grid = document.createElement("div");
        grid.className = "grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3";

        skills.forEach(skill => {
            const btn = document.createElement("button");
            // Update: Uses bg-base-bg instead of gray-50, and content-bg on hover
            btn.className = "text-left p-3 rounded-lg bg-base-bg hover:bg-content-bg shadow-sm hover:shadow-md border border-gray-200 dark:border-gray-700 hover:border-primary transition-all duration-200 text-sm text-text-default skill-item";
            btn.textContent = skill;
            btn.onclick = () => addToRecentActivity(skill, subj);
            grid.appendChild(btn);
        });

        section.appendChild(grid);
        skillsContainer.appendChild(section);
    }
}

function addToRecentActivity(skillName, subject) {
    const list = document.getElementById("recent-activity-list");
    if (!list) return;

    const text = `Practiced ${subject}: "${skillName}"`;
    
    const li = document.createElement("li");
    // Update: Uses bg-base-bg and text-text-default
    li.className = "p-2 bg-base-bg rounded-md text-sm border-l-4 border-primary animate-fade-in-up text-text-default";
    li.textContent = text;
    
    if (list.firstChild) {
        list.insertBefore(li, list.firstChild);
    } else {
        list.appendChild(li);
    }

    if (list.children.length > 5) {
        list.removeChild(list.lastChild);
    }

    const saved = JSON.parse(localStorage.getItem('recent-activities')) || [];
    saved.unshift(text);
    if(saved.length > 5) saved.pop();
    localStorage.setItem('recent-activities', JSON.stringify(saved));
}

document.addEventListener("DOMContentLoaded", () => {
    const savedGrade = localStorage.getItem("user-grade");
    const gradeSelect = document.getElementById("user-grade");
    const skillSelect = document.getElementById("skill-level");
    
    if (savedGrade) {
        if(gradeSelect) gradeSelect.value = savedGrade;
        if(skillSelect) skillSelect.value = savedGrade;
    }

    populateSkills();

    const savedActivities = JSON.parse(localStorage.getItem('recent-activities')) || [];
    const list = document.getElementById("recent-activity-list");
    if(list) {
        list.innerHTML = "";
        if(savedActivities.length === 0) {
            list.innerHTML = "<li class='text-text-secondary text-sm italic'>No recent activity yet.</li>";
        } else {
            savedActivities.forEach(act => {
                const li = document.createElement("li");
                // Update: Uses theme classes
                li.className = "p-2 bg-base-bg rounded-md text-sm text-text-default";
                li.textContent = act;
                list.appendChild(li);
            });
        }
    }
});