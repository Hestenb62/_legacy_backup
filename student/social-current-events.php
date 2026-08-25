<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Current Events Analysis - Hesten's Learning";
$pageDescription = "Stay informed and critically analyze global and national events shaping our world.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\\src\\header.php';
?>

<link rel="stylesheet" href="/assets/css/pages/student-hub.css">

    <main class="page-content-wrapper">
        <h1 class="student-hub-title">Current Events Analysis</h1>
        <p class="student-hub-subtitle">Stay informed and critically analyze global and national events shaping our world.</p>

        <div class="student-hub-grid">
            <!-- Weekly News Summaries -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-newspaper mr-2"></i>Weekly News Summaries</h5>
                    <p class="student-hub-card-desc">Concise summaries of major news stories from around the globe, updated weekly.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Global Headlines'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Global Headlines</a></li>
                        <li><a href="#" onclick="openDynamicModal('National News Digest'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>National News Digest</a></li>
                        <li><a href="#" onclick="openDynamicModal('Science & Tech News'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Science & Tech News</a></li>
                        <li><a href="#" onclick="openDynamicModal('Arts & Culture Highlights'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Arts & Culture Highlights</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Read Weekly Summaries</a>
                </div>
            </div>

            <!-- Geopolitical Analysis -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-globe mr-2"></i>Geopolitical Analysis</h5>
                    <p class="student-hub-card-desc">In-depth analysis of international relations, conflicts, and political developments.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Middle East Conflicts'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Middle East Conflicts</a></li>
                        <li><a href="#" onclick="openDynamicModal('US-China Relations'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>US-China Relations</a></li>
                        <li><a href="#" onclick="openDynamicModal('European Union Dynamics'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>European Union Dynamics</a></li>
                        <li><a href="#" onclick="openDynamicModal('African Political Landscape'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>African Political Landscape</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Analyze Geopolitics</a>
                </div>
            </div>

            <!-- Social Issues Discussions -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-comments mr-2"></i>Social Issues Discussions</h5>
                    <p class="student-hub-card-desc">Engage in thoughtful discussions on contemporary social challenges and movements.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Climate Justice'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Climate Justice</a></li>
                        <li><a href="#" onclick="openDynamicModal('Racial Equality'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Racial Equality</a></li>
                        <li><a href="#" onclick="openDynamicModal('Gender Equity'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Gender Equity</a></li>
                        <li><a href="#" onclick="openDynamicModal('Poverty & Inequality'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Poverty & Inequality</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Discuss Social Issues</a>
                </div>
            </div>

            <!-- Economic Trends -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-chart-line mr-2"></i>Economic Trends</h5>
                    <p class="student-hub-card-desc">Understand current economic indicators, market changes, and their global impact.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Inflation & Interest Rates'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Inflation & Interest Rates</a></li>
                        <li><a href="#" onclick="openDynamicModal('Stock Market Updates'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Stock Market Updates</a></li>
                        <li><a href="#" onclick="openDynamicModal('Global Trade Agreements'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Global Trade Agreements</a></li>
                        <li><a href="#" onclick="openDynamicModal('Labor Market Analysis'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Labor Market Analysis</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Monitor Economic Trends</a>
                </div>
            </div>

            <!-- Science & Technology in News -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-robot mr-2"></i>Science & Technology in News</h5>
                    <p class="student-hub-card-desc">Explore how scientific discoveries and technological innovations are reported and discussed.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('AI Ethics Debates'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>AI Ethics Debates</a></li>
                        <li><a href="#" onclick="openDynamicModal('Space Exploration News'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Space Exploration News</a></li>
                        <li><a href="#" onclick="openDynamicModal('Biotechnology Advancements'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Biotechnology Advancements</a></li>
                        <li><a href="#" onclick="openDynamicModal('Quantum Computing'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Quantum Computing</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Follow Science & Tech News</a>
                </div>
            </div>

            <!-- Historical Context of Current Events -->
            <div >
                <div class="student-hub-card">
                    <h5 class="student-hub-card-title"><i class="fas fa-history mr-2"></i>Historical Context of Current Events</h5>
                    <p class="student-hub-card-desc">Understand present-day events by examining their historical roots and precedents.</p>
                    <ul class="student-hub-card-list">
                        <li><a href="#" onclick="openDynamicModal('Historical Roots of Conflicts'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Historical Roots of Conflicts</a></li>
                        <li><a href="#" onclick="openDynamicModal('Evolution of Civil Rights'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Evolution of Civil Rights</a></li>
                        <li><a href="#" onclick="openDynamicModal('Economic Crises History'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Economic Crises History</a></li>
                        <li><a href="#" onclick="openDynamicModal('Impact of Past Policies'); return false;" class="student-hub-card-link"><i class="fas fa-angle-right mr-2"></i>Impact of Past Policies</a></li>
                    </ul>
                    <a href="#" class="student-hub-card-btn">Connect Past & Present</a>
                </div>
            </div>
        </div>

        <!-- New Feature: Article Summarizer -->
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
            <h2 class="text-2xl font-bold text-primary mb-4"><i class="fas fa-file-alt mr-2"></i>Article Summarizer ✨</h2>
            <p class="student-hub-card-desc">Paste a news article or any text below, and I'll provide a concise summary for you.</p>
            <textarea id="article-text" class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary mb-4" rows="10" placeholder="Paste your article text here..."></textarea>
            <button id="summarize-button" class="px-6 py-3 bg-secondary text-white rounded-md font-semibold hover:bg-primary focus:outline-none focus:ring-2 focus:ring-primary transition-colors duration-200">
                <i class="fas fa-magic mr-2"></i> Summarize Article
            </button>
            <div id="summary-output" class="bg-light p-4 rounded-md mt-6 text-dark hidden">
                <p class="font-semibold text-grayish mb-2">Summary:</p>
                <div id="summary-content"></div>
                <div id="loading-indicator" class="text-center mt-4 hidden">
                    <i class="fas fa-spinner fa-spin text-primary text-2xl"></i>
                    <p class="text-grayish">Generating summary...</p>
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

