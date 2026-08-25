<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Math Study Guides - Hesten's Learning";
$pageDescription = "Comprehensive guides and detailed notes to help you understand and retain key math concepts.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-hub.css">

    <main class="page-content-wrapper">
        <h1 class="student-hub-title">Math Study Guides & Notes</h1>
        <p class="student-hub-subtitle">Comprehensive guides and detailed notes to help you understand and retain key math concepts.</p>

        <div class="student-hub-grid">
            <!-- Algebra Study Guides -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-file-alt mr-2"></i>Algebra Study Guides</h5>
                    <p class="student-hub-card-desc">Concise summaries and important formulas for all algebra topics.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Algebraic Expressions Summary'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Algebraic Expressions Summary</a></li>
                        <li><a href="#" onclick="openDynamicModal('Functions Cheat Sheet'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Functions Cheat Sheet</a></li>
                        <li><a href="#" onclick="openDynamicModal('Solving Inequalities Guide'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Solving Inequalities Guide</a></li>
                        <li><a href="#" onclick="openDynamicModal('Factoring Polynomials Notes'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Factoring Polynomials Notes</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Download Algebra Guides</a>
                </div>
            </div>

            <!-- Geometry Notes -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-file-alt mr-2"></i>Geometry Notes</h5>
                    <p class="student-hub-card-desc">Detailed notes on geometric shapes, theorems, postulates, and proofs.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Basic Geometry Concepts'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Basic Geometry Concepts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Circles and Spheres Notes'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Circles and Spheres Notes</a></li>
                        <li><a href="#" onclick="openDynamicModal('Triangle Congruence Postulates'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Triangle Congruence Postulates</a></li>
                        <li><a href="#" onclick="openDynamicModal('Volume Formulas'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Volume Formulas</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Access Geometry Notes</a>
                </div>
            </div>

            <!-- Calculus Study Materials -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-file-alt mr-2"></i>Calculus Study Materials</h5>
                    <p class="student-hub-card-desc">Comprehensive study guides for limits, derivatives, integrals, and their applications.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Limits & Continuity Guide'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Limits & Continuity Guide</a></li>
                        <li><a href="#" onclick="openDynamicModal('Derivative Rules Summary'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Derivative Rules Summary</a></li>
                        <li><a href="#" onclick="openDynamicModal('Integration Techniques'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Integration Techniques</a></li>
                        <li><a href="#" onclick="openDynamicModal('Series & Sequences Notes'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Series & Sequences Notes</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Explore Calculus Guides</a>
                </div>
            </div>

            <!-- Statistics & Probability Notes -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-file-alt mr-2"></i>Statistics & Probability Notes</h5>
                    <p class="student-hub-card-desc">Key concepts, formulas, and examples for statistics and probability.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Probability Basics'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Probability Basics</a></li>
                        <li><a href="#" onclick="openDynamicModal('Statistical Formulas'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Statistical Formulas</a></li>
                        <li><a href="#" onclick="openDynamicModal('Hypothesis Testing Guide'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Hypothesis Testing Guide</a></li>
                        <li><a href="#" onclick="openDynamicModal('Confidence Intervals Notes'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Confidence Intervals Notes</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Get Stats & Probability Notes</a>
                </div>
            </div>

            <!-- Discrete Math Summaries -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-file-alt mr-2"></i>Discrete Math Summaries</h5>
                    <p class="student-hub-card-desc">Concise summaries of set theory, logic, graph theory, and combinatorics.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Set Theory Basics'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Set Theory Basics</a></li>
                        <li><a href="#" onclick="openDynamicModal('Logic & Proof Techniques'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Logic & Proof Techniques</a></li>
                        <li><a href="#" onclick="openDynamicModal('Graph Theory Concepts'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Graph Theory Concepts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Combinatorics Formulas'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Combinatorics Formulas</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">View Discrete Math Summaries</a>
                </div>
            </div>

            <!-- General Math Formulas -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-file-alt mr-2"></i>General Math Formulas</h5>
                    <p class="student-hub-card-desc">A quick reference guide for essential formulas across various math disciplines.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Basic Arithmetic Formulas'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Basic Arithmetic Formulas</a></li>
                        <li><a href="#" onclick="openDynamicModal('Algebraic Identities'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Algebraic Identities</a></li>
                        <li><a href="#" onclick="openDynamicModal('Geometric Formulas'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Geometric Formulas</a></li>
                        <li><a href="#" onclick="openDynamicModal('Trigonometric Identities'); return false;" class="student-hub-card-link"><i class="fas fa-sticky-note mr-2"></i>Trigonometric Identities</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Access All Formulas</a>
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

