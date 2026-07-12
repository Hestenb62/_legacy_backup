<?php
// --- Page Configuration ---
$pageTitle = "Common Core Standards Guide";
$pageDescription = "A simplified, accessible guide to Common Core State Standards (CCSS) for students and parents.";
$pageKeywords = "CCSS, Common Core, Education Standards, Math Standards, ELA Standards, Special Education";
$pageAuthor = "Hesten's Learning";

// --- Dynamic Example Generator ---
function getStandardExample($std) {
    if (!isset($std['text']) || !isset($std['category']) || !isset($std['grade'])) return "No example available.";
    
    $text = strtolower($std['text']);
    $cat = strtolower($std['category']);
    $grade = (string)$std['grade'];

    // Math heuristics
    if (strpos($text, 'add') !== false || strpos($text, 'subtract') !== false) {
        return "Example: If you have 5 apples and get 3 more, how many do you have? You can use blocks to show adding them together.";
    }
    if (strpos($text, 'multiply') !== false || strpos($text, 'divide') !== false) {
        return "Example: Sharing 12 cookies equally among 3 friends, or calculating the total if 4 students each have 5 pencils.";
    }
    if (strpos($text, 'fraction') !== false) {
        return "Example: Cutting a pizza into 8 slices and realizing that 4 slices is the same as half of the pizza (4/8 = 1/2).";
    }
    if (strpos($cat, 'geometry') !== false || strpos($text, 'shape') !== false || strpos($text, 'triangle') !== false) {
        return "Example: Looking at objects in the real world (like a stop sign being an octagon) or calculating the area of a rectangular garden.";
    }
    if (strpos($cat, 'algebra') !== false || strpos($text, 'equation') !== false || strpos($text, 'expression') !== false) {
        return "Example: Writing an equation like '2x + 5 = 15' to figure out an unknown number of items (x) in a real-world scenario.";
    }
    if (strpos($cat, 'function') !== false) {
        return "Example: A function machine where putting in a number (x) always gives out a specific number (y), like a taxi fare that charges $2 per mile.";
    }
    if (strpos($cat, 'statistics') !== false || strpos($text, 'data') !== false) {
        return "Example: Creating a bar graph of your classmates' favorite colors, or finding the average (mean) test score in a class.";
    }
    if (strpos($cat, 'measurement') !== false || strpos($text, 'length') !== false || strpos($text, 'weight') !== false) {
        return "Example: Using a ruler to measure the length of your desk in inches, or comparing the weight of a book and an apple.";
    }
    if (strpos($text, 'count') !== false) {
        return "Example: Counting aloud from 1 to 100, or practicing counting by tens (10, 20, 30...) using a number chart.";
    }
    if (strpos($cat, 'ratio') !== false || strpos($text, 'proport') !== false) {
        return "Example: If a recipe calls for 2 cups of sugar for every 3 cups of flour, making a double batch requires applying the 2:3 ratio.";
    }
    
    // ELA heuristics
    if (strpos($cat, 'literature') !== false || strpos($text, 'story') !== false) {
        return "Example: Reading 'Charlotte\'s Web' and explaining why the main character acted a certain way using quotes from the book.";
    }
    if (strpos($cat, 'informational') !== false || strpos($text, 'evidence') !== false) {
        return "Example: Reading a science article about space and highlighting three facts that prove the author's main point.";
    }
    if (strpos($cat, 'writing') !== false) {
        return "Example: Writing a persuasive letter to the principal about why the school needs a longer recess, complete with clear reasons and an introduction.";
    }
    
    // Grade fallbacks
    if ($grade === 'K' || $grade === '1' || $grade === '2') {
        return "Example: Using physical objects like counting bears or drawings to visually show how the math works before writing numbers.";
    }
    if ($grade === '3' || $grade === '4' || $grade === '5') {
        return "Example: Solving a multi-step word problem, like figuring out how much change you get back after buying items at a store.";
    }
    if ($grade === '6' || $grade === '7' || $grade === '8') {
        return "Example: Applying the concept to a real-world scenario, such as calculating the discount on a jacket on sale or understanding a bank account balance.";
    }
    if ($grade === 'HS') {
        return "Example: Using this advanced concept to solve complex problems, such as modeling population growth or projecting future costs.";
    }

    return "Example: A teacher might ask a student to apply this standard by solving a practical, real-world problem or explaining their reasoning aloud.";
}

// --- Data Loading ---
$jsonString = file_get_contents(__DIR__ . '/data/standards.json');
$standards = json_decode($jsonString, true);
if (!is_array($standards)) {
    $standards = [];
}

include 'src/header.php';
?>

<!-- Header / Hero Section -->
<div class="page-hero">
    <!-- Background Elements -->
    <div class="page-hero-bg">
        <i class="fas fa-book absolute top-10 right-10 text-9xl rotate-12"></i>
        <i class="fas fa-graduation-cap absolute bottom-10 left-10 text-8xl -rotate-12"></i>
    </div>
    
    <div class="relative z-10 max-w-4xl mx-auto text-center">
        <span class="page-hero-badge">
            Academic Roadmap
        </span>
        <h1 class="page-title">Common Core Standards</h1>
        <p class="text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed">
            A simple, accessible guide to what students are expected to learn at each grade level. We've translated the academic language into plain English.
        </p>
    </div>
</div>

<main class="container mx-auto px-4 mb-20 min-h-screen" id="main-content">

    <!-- Filters & Search Control Bar -->
    <div class="bg-content-bg rounded-2xl shadow-lg border border-gray-200 dark:border-gray-700 p-6 mb-10 sticky top-4 z-30 transition-colors">
        <div class="flex flex-col lg:flex-row gap-6 justify-between items-start lg:items-center">
            
            <!-- Filters -->
            <div class="flex flex-col sm:flex-row gap-4 w-full lg:w-auto">
                <!-- Subject Select -->
                <div class="relative group">
                    <label for="subject-filter" class="sr-only">Filter by Subject</label>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-book-open text-primary group-hover:text-accent transition-colors"></i>
                    </div>
                    <select id="subject-filter" onchange="filterStandards()" 
                        class="pl-10 pr-10 py-3 bg-base-bg border border-gray-300 dark:border-gray-600 text-text-default rounded-xl focus:ring-2 focus:ring-primary focus:border-primary appearance-none w-full sm:w-48 cursor-pointer font-medium shadow-sm transition-all hover:bg-gray-50 dark:hover:bg-gray-800">
                        <option value="all">All Subjects</option>
                        <option value="Math">Math</option>
                        <option value="ELA">ELA (English)</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-text-secondary">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>

                <!-- Grade Select -->
                <div class="relative group">
                    <label for="grade-filter" class="sr-only">Filter by Grade</label>
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-layer-group text-primary group-hover:text-accent transition-colors"></i>
                    </div>
                    <select id="grade-filter" onchange="filterStandards()" 
                        class="pl-10 pr-10 py-3 bg-base-bg border border-gray-300 dark:border-gray-600 text-text-default rounded-xl focus:ring-2 focus:ring-primary focus:border-primary appearance-none w-full sm:w-48 cursor-pointer font-medium shadow-sm transition-all hover:bg-gray-50 dark:hover:bg-gray-800">
                        <option value="all">All Grades</option>
                        <option value="K">Kindergarten</option>
                        <option value="1">Grade 1</option>
                        <option value="2">Grade 2</option>
                        <option value="3">Grade 3</option>
                        <option value="4">Grade 4</option>
                        <option value="5">Grade 5</option>
                        <option value="6">Grade 6</option>
                        <option value="7">Grade 7</option>
                        <option value="8">Grade 8</option>
                        <option value="HS">High School</option>
                    </select>
                     <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-text-secondary">
                        <i class="fas fa-chevron-down text-xs"></i>
                    </div>
                </div>
            </div>

            <!-- Search -->
            <div class="relative w-full lg:w-96">
                <label for="standard-search" class="sr-only">Search standards</label>
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" id="standard-search" onkeyup="filterStandards()" 
                    placeholder="Search by code or keyword..." 
                    class="w-full pl-11 pr-4 py-3 bg-base-bg border border-gray-300 dark:border-gray-600 rounded-xl text-text-default placeholder-gray-400 focus:ring-2 focus:ring-primary focus:border-primary transition-all shadow-sm">
            </div>
        </div>
        
        <!-- Live Count -->
        <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700 flex justify-between items-center text-sm text-text-secondary">
            <span id="showing-count">Showing all standards</span>
            <button onclick="resetFilters()" class="text-primary hover:underline font-bold text-xs uppercase tracking-wide">Reset Filters</button>
        </div>
    </div>

    <!-- Standards Grid -->
    <div id="standards-container" class="space-y-6">
        <?php foreach ($standards as $std): ?>
            <!-- Standard Card -->
            <article class="standard-item bg-content-bg rounded-xl shadow-md border-l-4 border-primary hover:shadow-lg transition-all duration-300 overflow-hidden"
                data-grade="<?php echo $std['grade']; ?>"
                data-subject="<?php echo $std['subject']; ?>"
                data-search="<?php echo strtolower($std['code'] . ' ' . $std['text'] . ' ' . $std['explanation']); ?>">
                data-search="<?php echo htmlspecialchars(strtolower($std['code'] . ' ' . $std['text'] . ' ' . $std['explanation']), ENT_QUOTES, 'UTF-8'); ?>">
                
                <div class="p-6">
                    <!-- Header Row -->
                    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4 mb-4">
                        <div>
                            <div class="flex flex-wrap gap-2 mb-2">
                                <span class="px-2 py-1 bg-primary/10 text-primary text-xs font-bold rounded uppercase tracking-wide">
                                    <?php echo $std['subject']; ?>
                                </span>
                                <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 text-text-secondary text-xs font-bold rounded">
                                    Grade <?php echo $std['grade']; ?>
                                </span>
                                <span class="px-2 py-1 bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 text-xs font-mono rounded border border-blue-100 dark:border-blue-800">
                                    <?php echo $std['code']; ?>
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-text-default">
                                <?php echo $std['category']; ?>
                            </h3>
                        </div>
                        
                        <!-- TTS Button -->
                        <button onclick="readStandard(this)" 
                            class="flex-shrink-0 w-10 h-10 rounded-full bg-base-bg text-text-secondary hover:text-primary hover:bg-primary/10 transition-colors flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-primary"
                            aria-label="Read standard aloud">
                            <i class="fas fa-volume-up"></i>
                        </button>
                    </div>

                    <!-- Official Text -->
                    <div class="mb-4">
                        <p class="text-sm text-text-secondary uppercase tracking-wider font-bold mb-1">Official Standard</p>
                        <p class="text-text-default font-serif italic border-l-2 border-gray-300 dark:border-gray-600 pl-4 py-1">
                            "<?php echo $std['text']; ?>"
                        </p>
                    </div>

                    <!-- Plain English Translation (Highlight) -->
                    <div class="bg-green-50 dark:bg-green-900/20 rounded-lg p-4 border border-green-100 dark:border-green-900/50">
                        <div class="flex items-start gap-3">
                            <i class="fas fa-lightbulb text-green-600 dark:text-green-400 mt-1"></i>
                            <div>
                                <h4 class="text-green-800 dark:text-green-300 font-bold text-sm mb-1">Plain English Explanation</h4>
                                <p class="text-text-default text-base leading-relaxed">
                                    <?php echo $std['explanation']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Example Button -->
                    <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-800 flex justify-end">
                        <button onclick="openExampleModal('<?php echo $std['code']; ?>', '<?php echo htmlspecialchars(addslashes($std['text'])); ?>', '<?php echo htmlspecialchars(addslashes(getStandardExample($std))); ?>')" class="text-sm font-bold text-primary hover:text-accent transition-colors flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-primary/5">
                        <button onclick="openExampleModal('<?php echo htmlspecialchars($std['code'], ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars($std['text'], ENT_QUOTES, 'UTF-8'); ?>', '<?php echo htmlspecialchars(getStandardExample($std), ENT_QUOTES, 'UTF-8'); ?>')" class="text-sm font-bold text-primary hover:text-accent transition-colors flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-primary/5">
                            <i class="fas fa-chalkboard-teacher"></i> View Example
                        </button>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>
    </div>

    <!-- No Results State -->
    <div id="no-results" class="hidden text-center py-20">
        <div class="w-20 h-20 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4 text-3xl text-gray-400">
            <i class="fas fa-search"></i>
        </div>
        <h3 class="text-xl font-bold text-text-default mb-2">No standards found</h3>
        <p class="text-text-secondary">Try adjusting your filters or search terms.</p>
        <button onclick="resetFilters()" class="mt-4 text-primary font-bold hover:underline">Clear Filters</button>
    </div>

    <!-- Example Modal -->
    <div id="example-modal" class="fixed inset-0 z-[100] hidden bg-black/50 backdrop-blur-sm flex items-center justify-center p-4 opacity-0 transition-opacity duration-300" aria-labelledby="modal-standard-code" role="dialog" aria-modal="true">
        <div class="bg-content-bg rounded-2xl shadow-2xl max-w-lg w-full overflow-hidden transform scale-95 transition-transform duration-300" id="example-modal-content">
            <div class="p-6 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center bg-gray-50 dark:bg-gray-800">
                <h3 class="text-xl font-bold text-text-default flex items-center gap-2">
                    <i class="fas fa-chalkboard-teacher text-primary"></i> <span id="modal-standard-code">Standard Example</span>
                </h3>
                <button onclick="closeExampleModal()" class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-200 transition-colors focus:outline-none focus:ring-2 focus:ring-primary rounded-full p-1 w-8 h-8 flex items-center justify-center">
                    <i class="fas fa-times text-xl"></i>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="p-6">
                <p class="text-sm font-bold text-text-secondary uppercase tracking-wider mb-2">Standard Text</p>
                <p id="modal-standard-text" class="text-text-default italic border-l-2 border-gray-300 dark:border-gray-600 pl-3 mb-6">
                    <!-- Standard text goes here -->
                </p>
                
                <div class="bg-blue-50 dark:bg-blue-900/20 p-4 rounded-xl border border-blue-100 dark:border-blue-900/50">
                    <h4 class="text-blue-800 dark:text-blue-300 font-bold mb-2 flex items-center gap-2">
                        <i class="fas fa-magic"></i> Practical Example
                    </h4>
                    <p id="modal-example-content" class="text-text-default">
                        <!-- Example goes here -->
                    </p>
                </div>
            </div>
            <div class="p-4 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 flex justify-end">
                <button onclick="closeExampleModal()" class="px-6 py-2 bg-primary text-white font-bold rounded-lg hover:bg-blue-700 transition-colors shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Close
                </button>
            </div>
        </div>
    </div>

</main>

<script>
    function filterStandards() {
        const subject = document.getElementById('subject-filter').value;
        const grade = document.getElementById('grade-filter').value;
        const search = document.getElementById('standard-search').value.toLowerCase();
        
        const items = document.querySelectorAll('.standard-item');
        let visibleCount = 0;

        items.forEach(item => {
            const itemSubject = item.dataset.subject;
            const itemGrade = item.dataset.grade;
            const itemSearchData = item.dataset.search;

            const subjectMatch = (subject === 'all' || itemSubject === subject);
            const gradeMatch = (grade === 'all' || itemGrade === grade);
            const searchMatch = (search === '' || itemSearchData.includes(search));

            if (subjectMatch && gradeMatch && searchMatch) {
                item.classList.remove('hidden');
                // Add simple fade in animation
                item.style.opacity = '0';
                setTimeout(() => item.style.opacity = '1', 50);
                visibleCount++;
            } else {
                item.classList.add('hidden');
            }
        });

        // Update UI states
        const noResults = document.getElementById('no-results');
        const container = document.getElementById('standards-container');
        const countLabel = document.getElementById('showing-count');

        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
            container.classList.add('hidden');
            countLabel.textContent = 'No results';
        } else {
            noResults.classList.add('hidden');
            container.classList.remove('hidden');
            countLabel.textContent = `Showing ${visibleCount} standard${visibleCount !== 1 ? 's' : ''}`;
        }
    }

    function resetFilters() {
        document.getElementById('subject-filter').value = 'all';
        document.getElementById('grade-filter').value = 'all';
        document.getElementById('standard-search').value = '';
        filterStandards();
    }

    // Simple Text-to-Speech for Accessibility
    function readStandard(btn) {
        // Stop any current speech
        window.speechSynthesis.cancel();

        // Visual feedback reset
        document.querySelectorAll('.fa-stop').forEach(icon => {
            icon.classList.remove('fa-stop');
            icon.classList.add('fa-volume-up');
            icon.closest('button').classList.remove('text-primary', 'animate-pulse');
        });

        const card = btn.closest('.standard-item');
        const code = card.querySelector('.font-mono').innerText;
        const text = card.querySelector('.font-serif').innerText;
        const expl = card.querySelector('.bg-green-50 p').innerText;

        const utterance = new SpeechSynthesisUtterance(`Standard ${code}. ${text}. In other words: ${expl}`);
        
        // Icon change
        const icon = btn.querySelector('i');
        icon.classList.remove('fa-volume-up');
        icon.classList.add('fa-stop');
        btn.classList.add('text-primary', 'animate-pulse');

        utterance.onend = () => {
            icon.classList.remove('fa-stop');
            icon.classList.add('fa-volume-up');
            btn.classList.remove('text-primary', 'animate-pulse');
        };

        window.speechSynthesis.speak(utterance);
    }

    // Modal Logic
    const exampleModal = document.getElementById('example-modal');
    const modalContent = document.getElementById('example-modal-content');
    
    function openExampleModal(code, text, specificExample) {
        document.getElementById('modal-standard-code').textContent = code;
        document.getElementById('modal-standard-text').textContent = `"${text}"`;
        document.getElementById('modal-example-content').textContent = specificExample || "Example: A teacher might ask a student to apply this standard by solving a practical, real-world problem or explaining their reasoning aloud.";
        
        exampleModal.classList.remove('hidden');
        // trigger reflow for transition
        void exampleModal.offsetWidth;
        exampleModal.classList.remove('opacity-0');
        modalContent.classList.remove('scale-95');
    }

    function closeExampleModal() {
        exampleModal.classList.add('opacity-0');
        modalContent.classList.add('scale-95');
        setTimeout(() => {
            exampleModal.classList.add('hidden');
        }, 300);
    }
    
    // Close modal if clicking outside
    exampleModal.addEventListener('click', function(e) {
        if (e.target === exampleModal) {
            closeExampleModal();
        }
    });

</script>

<?php include 'src/footer.php'; ?>
