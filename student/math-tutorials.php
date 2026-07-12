<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Math Video Tutorials - Hesten's Learning";
$pageDescription = "Visual explanations to help you grasp even the most challenging math concepts.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Math Video Tutorials</h1>
        <p class="text-center text-lg text-grayish mb-8">Visual explanations to help you grasp even the most challenging math concepts.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Algebra Tutorials -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-video mr-2"></i>Algebra Tutorials</h5>
                    <p class="text-grayish mb-4">Step-by-step video guides on algebraic expressions, equations, and functions.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Introduction to Algebra'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Introduction to Algebra</a></li>
                        <li><a href="#" onclick="openDynamicModal('Solving Linear Equations'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Solving Linear Equations</a></li>
                        <li><a href="#" onclick="openDynamicModal('Graphing Functions'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Graphing Functions</a></li>
                        <li><a href="#" onclick="openDynamicModal('Polynomial Operations'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Polynomial Operations</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">View Algebra Videos</a>
                </div>
            </div>

            <!-- Geometry Tutorials -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-video mr-2"></i>Geometry Tutorials</h5>
                    <p class="text-grayish mb-4">Visual lessons covering geometric shapes, theorems, and proofs.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Basic Geometric Shapes'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Basic Geometric Shapes</a></li>
                        <li><a href="#" onclick="openDynamicModal('Pythagorean Theorem'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Pythagorean Theorem</a></li>
                        <li><a href="#" onclick="openDynamicModal('Circles and Arcs'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Circles and Arcs</a></li>
                        <li><a href="#" onclick="openDynamicModal('Transformations'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Transformations</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Watch Geometry Videos</a>
                </div>
            </div>

            <!-- Calculus Tutorials -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-video mr-2"></i>Calculus Tutorials</h5>
                    <p class="text-grayish mb-4">In-depth video series on limits, derivatives, integrals, and their real-world applications.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Understanding Limits'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Understanding Limits</a></li>
                        <li><a href="#" onclick="openDynamicModal('Rules of Differentiation'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Rules of Differentiation</a></li>
                        <li><a href="#" onclick="openDynamicModal('Techniques of Integration'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Techniques of Integration</a></li>
                        <li><a href="#" onclick="openDynamicModal('Applications in Physics'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Applications in Physics</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Learn Calculus Visually</a>
                </div>
            </div>

            <!-- Statistics & Probability Tutorials -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-video mr-2"></i>Statistics & Probability</h5>
                    <p class="text-grayish mb-4">Video lessons covering data analysis, probability theory, and statistical inference.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Data Visualization'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Data Visualization</a></li>
                        <li><a href="#" onclick="openDynamicModal('Basic Probability'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Basic Probability</a></li>
                        <li><a href="#" onclick="openDynamicModal('Normal Distribution'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Normal Distribution</a></li>
                        <li><a href="#" onclick="openDynamicModal('Regression Analysis'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Regression Analysis</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Stats & Probability</a>
                </div>
            </div>

            <!-- Pre-Algebra Tutorials -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-video mr-2"></i>Pre-Algebra Tutorials</h5>
                    <p class="text-grayish mb-4">Foundational videos to prepare you for algebra, covering integers, fractions, and decimals.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Integers and Operations'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Integers and Operations</a></li>
                        <li><a href="#" onclick="openDynamicModal('Fractions and Decimals'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Fractions and Decimals</a></li>
                        <li><a href="#" onclick="openDynamicModal('Ratios and Proportions'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Ratios and Proportions</a></li>
                        <li><a href="#" onclick="openDynamicModal('Order of Operations'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Order of Operations</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Start Pre-Algebra</a>
                </div>
            </div>

            <!-- Trigonometry Tutorials -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-video mr-2"></i>Trigonometry Tutorials</h5>
                    <p class="text-grayish mb-4">Comprehensive video lessons on angles, triangles, and trigonometric functions.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Right Triangle Trigonometry'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Right Triangle Trigonometry</a></li>
                        <li><a href="#" onclick="openDynamicModal('Unit Circle'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Unit Circle</a></li>
                        <li><a href="#" onclick="openDynamicModal('Trigonometric Identities'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Trigonometric Identities</a></li>
                        <li><a href="#" onclick="openDynamicModal('Inverse Trig Functions'); return false;" class="text-accent hover:underline"><i class="fas fa-play-circle mr-2"></i>Inverse Trig Functions</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Master Trigonometry</a>
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

