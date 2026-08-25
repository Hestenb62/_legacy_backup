<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Science Quizzes - Hesten's Learning";
$pageDescription = "Test your scientific knowledge with our interactive quizzes covering various branches of science.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-hub.css">

    <main class="page-content-wrapper">
        <h1 class="student-hub-title">Science Quizzes</h1>
        <p class="student-hub-subtitle">Test your scientific knowledge with our interactive quizzes covering various branches of science.</p>

        <div class="student-hub-grid">
            <!-- Biology Quizzes -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-dna mr-2"></i>Biology Quizzes</h5>
                    <p class="student-hub-card-desc">Challenge your understanding of living organisms, from cellular biology to ecosystems.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Cells & Organelles Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Cells & Organelles Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Genetics Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Genetics Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Ecology & Biomes Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Ecology & Biomes Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Human Body Systems Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Human Body Systems Quiz</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Take Biology Quizzes</a>
                </div>
            </div>

            <!-- Chemistry Quizzes -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-atom mr-2"></i>Chemistry Quizzes</h5>
                    <p class="student-hub-card-desc">Assess your knowledge of chemical elements, compounds, reactions, and states of matter.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Periodic Table Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Periodic Table Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Chemical Bonding Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Chemical Bonding Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Acids & Bases Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Acids & Bases Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Stoichiometry Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Stoichiometry Quiz</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Take Chemistry Quizzes</a>
                </div>
            </div>

            <!-- Physics Quizzes -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-bolt mr-2"></i>Physics Quizzes</h5>
                    <p class="student-hub-card-desc">Test your understanding of fundamental physics principles, including motion, energy, and electricity.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Motion & Forces Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Motion & Forces Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Energy & Work Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Energy & Work Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Electricity Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Electricity Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Waves & Sound Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Waves & Sound Quiz</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Take Physics Quizzes</a>
                </div>
            </div>

            <!-- Earth Science Quizzes -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-globe-europe mr-2"></i>Earth Science Quizzes</h5>
                    <p class="student-hub-card-desc">Evaluate your knowledge of geology, meteorology, oceanography, and astronomy.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Geology Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Geology Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Weather & Climate Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Weather & Climate Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Oceanography Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Oceanography Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Astronomy Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Astronomy Quiz</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Take Earth Science Quizzes</a>
                </div>
            </div>

            <!-- General Science Quizzes -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-question mr-2"></i>General Science Quizzes</h5>
                    <p class="student-hub-card-desc">Broad quizzes covering a mix of scientific topics to test overall understanding.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Scientific Method Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Scientific Method Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Famous Scientists Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Famous Scientists Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Science Terminology Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Science Terminology Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Science Trivia'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Science Trivia</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Take General Science Quizzes</a>
                </div>
            </div>

            <!-- Environmental Science Quizzes -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-recycle mr-2"></i>Environmental Science Quizzes</h5>
                    <p class="student-hub-card-desc">Quizzes focused on ecological principles, environmental issues, and sustainability.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Ecosystems Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Ecosystems Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Pollution & Conservation Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Pollution & Conservation Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Renewable Energy Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Renewable Energy Quiz</a></li>
                        <li><a href="#" onclick="openDynamicModal('Climate Change Quiz'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Climate Change Quiz</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Test Environmental Knowledge</a>
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

