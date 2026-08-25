<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Civics & Government - Hesten's Learning";
$pageDescription = "Understand the foundations of government, citizenship, and legal systems.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-hub.css">

    <main class="page-content-wrapper">
        <h1 class="student-hub-title">Civics & Government</h1>
        <p class="student-hub-subtitle">Understand the foundations of government, citizenship, and legal systems.</p>

        <div class="student-hub-grid">
            <!-- Branches of Government -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-gavel mr-2"></i>Branches of Government</h5>
                    <p class="student-hub-card-desc">Learn about the legislative, executive, and judicial branches and their roles.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Legislative Branch'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Legislative Branch</a></li>
                        <li><a href="#" onclick="openDynamicModal('Executive Branch'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Executive Branch</a></li>
                        <li><a href="#" onclick="openDynamicModal('Judicial Branch'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Judicial Branch</a></li>
                        <li><a href="#" onclick="openDynamicModal('Checks and Balances'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Checks and Balances</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Explore Branches</a>
                </div>
            </div>

            <!-- Citizenship Rights & Duties -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-user-check mr-2"></i>Citizenship Rights & Duties</h5>
                    <p class="student-hub-card-desc">Understand your rights and responsibilities as a citizen in a democratic society.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Bill of Rights'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Bill of Rights</a></li>
                        <li><a href="#" onclick="openDynamicModal('Civic Participation'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Civic Participation</a></li>
                        <li><a href="#" onclick="openDynamicModal('Voting & Elections'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Voting & Elections</a></li>
                        <li><a href="#" onclick="openDynamicModal('Community Involvement'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Community Involvement</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Learn About Citizenship</a>
                </div>
            </div>

            <!-- Constitutional Law -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-book-law mr-2"></i>Constitutional Law</h5>
                    <p class="student-hub-card-desc">Delve into the US Constitution, its amendments, and landmark Supreme Court cases.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Articles of Confederation'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Articles of Confederation</a></li>
                        <li><a href="#" onclick="openDynamicModal('Constitutional Amendments'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Constitutional Amendments</a></li>
                        <li><a href="#" onclick="openDynamicModal('Landmark Supreme Court Cases'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Landmark Supreme Court Cases</a></li>
                        <li><a href="#" onclick="openDynamicModal('Federalism'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Federalism</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Study Constitutional Law</a>
                </div>
            </div>

            <!-- Electoral Process -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-vote-yea mr-2"></i>Electoral Process</h5>
                    <p class="student-hub-card-desc">Understand how elections work, from primary elections to the Electoral College.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Primary Elections'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Primary Elections</a></li>
                        <li><a href="#" onclick="openDynamicModal('General Elections'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>General Elections</a></li>
                        <li><a href="#" onclick="openDynamicModal('Electoral College Explained'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Electoral College Explained</a></li>
                        <li><a href="#" onclick="openDynamicModal('Campaign Finance'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Campaign Finance</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Understand Elections</a>
                </div>
            </div>

            <!-- Public Policy -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-handshake mr-2"></i>Public Policy</h5>
                    <p class="student-hub-card-desc">Examine how laws are made and how government policies impact society.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Policy Making Process'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Policy Making Process</a></li>
                        <li><a href="#" onclick="openDynamicModal('Social Policy'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Social Policy</a></li>
                        <li><a href="#" onclick="openDynamicModal('Economic Policy'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Economic Policy</a></li>
                        <li><a href="#" onclick="openDynamicModal('Foreign Policy'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Foreign Policy</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Explore Public Policy</a>
                </div>
            </div>

            <!-- International Relations -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-globe mr-2"></i>International Relations</h5>
                    <p class="student-hub-card-desc">Study how nations interact, including diplomacy, international organizations, and global conflicts.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('United Nations'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>United Nations</a></li>
                        <li><a href="#" onclick="openDynamicModal('International Law'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>International Law</a></li>
                        <li><a href="#" onclick="openDynamicModal('Diplomacy & Treaties'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Diplomacy & Treaties</a></li>
                        <li><a href="#" onclick="openDynamicModal('Global Conflicts'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Global Conflicts</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Learn International Relations</a>
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

