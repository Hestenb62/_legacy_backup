<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Interactive Math Games - Hesten's Learning";
$pageDescription = "Make learning math an exciting adventure with our collection of fun and educational games!";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-hub.css">

    <main class="page-content-wrapper">
        <h1 class="student-hub-title">Interactive Math Games</h1>
        <p class="student-hub-subtitle">Make learning math an exciting adventure with our collection of fun and educational games!</p>

        <div class="student-hub-grid">
            <!-- Arithmetic Challenge -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-plus-minus mr-2"></i>Arithmetic Challenge</h5>
                    <p class="student-hub-card-desc">Test your speed and accuracy in addition, subtraction, multiplication, and division.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Speed Addition'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Speed Addition</a></li>
                        <li><a href="#" onclick="openDynamicModal('Multiplication Mania'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Multiplication Mania</a></li>
                        <li><a href="#" onclick="openDynamicModal('Division Dash'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Division Dash</a></li>
                        <li><a href="#" onclick="openDynamicModal('Mixed Operations Blitz'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Mixed Operations Blitz</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Play Arithmetic Games</a>
                </div>
            </div>

            <!-- Geometry Puzzle -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-puzzle-piece mr-2"></i>Geometry Puzzle</h5>
                    <p class="student-hub-card-desc">Solve puzzles and challenges that reinforce geometric concepts and spatial reasoning.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Shape Sorter'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Shape Sorter</a></li>
                        <li><a href="#" onclick="openDynamicModal('Angle Finder'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Angle Finder</a></li>
                        <li><a href="#" onclick="openDynamicModal('Area Builder'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Area Builder</a></li>
                        <li><a href="#" onclick="openDynamicModal('Symmetry Challenge'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Symmetry Challenge</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Play Geometry Puzzles</a>
                </div>
            </div>

            <!-- Fraction Frenzy -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-divide mr-2"></i>Fraction Frenzy</h5>
                    <p class="student-hub-card-desc">Master fractions through engaging games that cover addition, subtraction, multiplication, and division.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Fraction Match'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Fraction Match</a></li>
                        <li><a href="#" onclick="openDynamicModal('Equivalent Fractions'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Equivalent Fractions</a></li>
                        <li><a href="#" onclick="openDynamicModal('Fraction Operations'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Fraction Operations</a></li>
                        <li><a href="#" onclick="openDynamicModal('Decimal Conversion'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Decimal Conversion</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Start Fraction Fun</a>
                </div>
            </div>

            <!-- Equation Solver -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-equals mr-2"></i>Equation Solver</h5>
                    <p class="student-hub-card-desc">Practice solving linear, quadratic, and more complex equations in an interactive game format.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Linear Equation Race'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Linear Equation Race</a></li>
                        <li><a href="#" onclick="openDynamicModal('Quadratic Quest'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Quadratic Quest</a></li>
                        <li><a href="#" onclick="openDynamicModal('System Solver'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>System Solver</a></li>
                        <li><a href="#" onclick="openDynamicModal('Inequality Challenge'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Inequality Challenge</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Solve Equations</a>
                </div>
            </div>

            <!-- Data Detective -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-chart-line mr-2"></i>Data Detective</h5>
                    <p class="student-hub-card-desc">Engage with games that teach data interpretation, probability, and statistical analysis.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Graph Reading Challenge'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Graph Reading Challenge</a></li>
                        <li><a href="#" onclick="openDynamicModal('Probability Picker'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Probability Picker</a></li>
                        <li><a href="#" onclick="openDynamicModal('Mean, Median, Mode Game'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Mean, Median, Mode Game</a></li>
                        <li><a href="#" onclick="openDynamicModal('Statistical Sort'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Statistical Sort</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Become a Data Detective</a>
                </div>
            </div>

            <!-- Math Logic Puzzles -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-brain mr-2"></i>Math Logic Puzzles</h5>
                    <p class="student-hub-card-desc">Sharpen your critical thinking and problem-solving skills with various math logic puzzles.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Sudoku Variants'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Sudoku Variants</a></li>
                        <li><a href="#" onclick="openDynamicModal('Number Sequence Challenges'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Number Sequence Challenges</a></li>
                        <li><a href="#" onclick="openDynamicModal('Cryptarithmetic Puzzles'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>Cryptarithmetic Puzzles</a></li>
                        <li><a href="#" onclick="openDynamicModal('River Crossing Riddles'); return false;" class="student-hub-card-link"><i class="fas fa-gamepad mr-2"></i>River Crossing Riddles</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Play Logic Puzzles</a>
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

