<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Math Resources - Hesten's Learning";
$pageDescription = "Unlock your potential in mathematics with our diverse collection of resources.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Math Resources</h1>
        <p class="text-center text-lg text-grayish mb-8">Unlock your potential in mathematics with our diverse collection of resources.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Practice Problems Card -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-pencil-alt mr-2"></i>Practice Problems</h5>
                    <p class="text-grayish mb-4">Sharpen your skills with a wide range of practice problems, from basic arithmetic to advanced algebra and geometry.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Algebra Practice'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Algebra Practice</a></li>
                        <li><a href="#" onclick="openDynamicModal('Geometry Exercises'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Geometry Exercises</a></li>
                        <li><a href="#" onclick="openDynamicModal('Calculus Worksheets'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Calculus Worksheets</a></li>
                        <li><a href="#" onclick="openDynamicModal('Statistics Problems'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Statistics Problems</a></li>
                    </ul>
                    <a href="/student/math-practice.html" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Start Practicing</a>
                </div>
            </div>

            <!-- Video Tutorials Card -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-video mr-2"></i>Video Tutorials</h5>
                    <p class="text-grayish mb-4">Learn complex math concepts through easy-to-understand video tutorials, taught by experienced educators.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Pre-Algebra Basics'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Pre-Algebra Basics</a></li>
                        <li><a href="#" onclick="openDynamicModal('Trigonometry Explained'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Trigonometry Explained</a></li>
                        <li><a href="#" onclick="openDynamicModal('Differential Equations'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Differential Equations</a></li>
                        <li><a href="#" onclick="openDynamicModal('Probability & Combinatorics'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Probability & Combinatorics</a></li>
                    </ul>
                    <a href="/student/math-tutorials.html" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Watch Tutorials</a>
                </div>
            </div>

            <!-- Study Guides & Notes Card -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-file-alt mr-2"></i>Study Guides & Notes</h5>
                    <p class="text-grayish mb-4">Access comprehensive study guides and detailed notes to review key topics and prepare for exams.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Number Theory Notes'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Number Theory Notes</a></li>
                        <li><a href="#" onclick="openDynamicModal('Linear Algebra Guide'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Linear Algebra Guide</a></li>
                        <li><a href="#" onclick="openDynamicModal('Discrete Math Summaries'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Discrete Math Summaries</a></li>
                        <li><a href="#" onclick="openDynamicModal('Geometry Postulates'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Geometry Postulates</a></li>
                    </ul>
                    <a href="/student/math-study-guides.html" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Get Study Guides</a>
                </div>
            </div>

            <!-- Interactive Math Games Card -->
            <div class="col-span-1 md:col-span-2 lg:col-span-3">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-gamepad mr-2"></i>Interactive Math Games</h5>
                    <p class="text-grayish mb-4">Make learning math fun with interactive games that challenge your mind and reinforce concepts in an engaging way.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Arithmetic Challenge'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Arithmetic Challenge</a></li>
                        <li><a href="#" onclick="openDynamicModal('Geometry Puzzle'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Geometry Puzzle</a></li>
                        <li><a href="#" onclick="openDynamicModal('Fraction Frenzy'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Fraction Frenzy</a></li>
                        <li><a href="#" onclick="openDynamicModal('Equation Solver'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Equation Solver</a></li>
                    </ul>
                    <a href="/student/math-games.html" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Play Math Games</a>
                </div>
            </div>
        </div>
    </main>

<?php
// Include the footer file
include '..\src\resource-modal.php';
// Include the footer file
include '..\src\footer.php';
?>

