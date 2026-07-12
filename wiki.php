<?php
/**
 * Resource Wiki - Hesten's Learning
 * A Wikipedia-style home page built for Hesten's Learning.
 * 
 * Fetches real-time dynamic content from Wikipedia's Feed API.
 */

// Set page variables
$pageTitle = "Resource Wiki - Hesten's Learning";
$pageDescription = "An index of learning articles and resources, presented in a Wikipedia-inspired layout.";
$pageAuthor = "Hesten's Learning Team";

// Fetch Dynamic Content from Wikipedia REST API
$today = date('Y/m/d');
$apiUrl = "https://en.wikipedia.org/api/rest_v1/feed/featured/$today";

$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => [
            'User-Agent: HestensLearning/1.0 (https://hestenslearning.org; contact@hestenslearning.org) PHP/8.x'
        ],
        'timeout' => 5
    ]
]);

$wikiData = @file_get_contents($apiUrl, false, $context);
$data = $wikiData ? json_decode($wikiData, true) : null;

// Fallback data if API fails or for missing sections
$tfa = isset($data['tfa']) ? $data['tfa'] : [
    'title' => 'Learning and Education',
    'extract' => 'Education is the process of facilitating learning, or the acquisition of knowledge, skills, values, beliefs, and habits.',
    'thumbnail' => ['source' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Education_Logo.svg/1200px-Education_Logo.svg.png']
];

$onthisday = isset($data['onthisday']) ? array_slice($data['onthisday'], 0, 5) : [];
$itn = isset($data['mostread']['articles']) ? array_slice($data['mostread']['articles'], 0, 5) : [];

// Include the header file
include 'src/header.php';
?>

<!-- Link to Wikipedia-specific CSS -->
<link rel="stylesheet" href="/assets/css/wiki.css">

<div class="wiki-container">
    <div class="wiki-content">

        <div class="wiki-layout">

            <!-- Sidebar -->
            <aside class="wiki-sidebar">
                <div class="sidebar-logo">
                    <div
                        class="h-16 w-16 mx-auto mb-2 bg-gradient-to-br from-indigo-600 to-purple-600 text-white rounded-full flex items-center justify-center font-bold text-3xl shadow-lg">
                        H
                    </div>
                    <span class="font-serif text-lg font-bold">Hesten's Wiki</span>
                </div>

                <div class="sidebar-nav-section">
                    <div class="sidebar-nav-header">Main menu</div>
                    <ul class="sidebar-nav-links">
                        <li><a href="/">Main page</a></li>
                        <li><a href="/wiki.php">Contents</a></li>
                        <li><a href="/research">Current events</a></li>
                        <li><a href="#">About Hesten's</a></li>
                        <li><a href="/contact.php">Contact us</a></li>
                        <li><a href="/donate.php">Donate</a></li>
                    </ul>
                </div>

                <div class="sidebar-nav-section">
                    <div class="sidebar-nav-header">Contribute</div>
                    <ul class="sidebar-nav-links">
                        <li><a href="/community">Help</a></li>
                        <li><a href="/community/projects.php">Projects</a></li>
                        <li><a href="/community/tools.php">Tools</a></li>
                    </ul>
                </div>

                <div class="sidebar-nav-section">
                    <div class="sidebar-nav-header">Subjects</div>
                    <ul class="sidebar-nav-links">
                        <li><a href="/student/math-practice.php">Math</a></li>
                        <li><a href="/student/ela-reading.php">ELA</a></li>
                        <li><a href="/student/science-articles.php">Science</a></li>
                        <li><a href="/student/social-history.php">Social Studies</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Main Content Grid -->
            <main class="wiki-main">

                <!-- Welcome Banner -->
                <div class="mp-banner">
                    <h1>Welcome to <span class="text-indigo-600">Hesten's Wiki</span></h1>
                    <p class="text-sm text-gray-500">The free library that anyone can use. Currently hosting hundreds of
                        learning resources.</p>
                </div>

                <div class="mp-grid">

                    <!-- Left Column -->
                    <div class="mp-left">

                        <!-- Today's Featured Article -->
                        <section class="mp-box box-green">
                            <h2 class="mp-h2">From today's featured article</h2>
                            <div class="mp-box-content featured-article">
                                <?php if (isset($tfa['thumbnail']['source'])): ?>
                                    <img src="<?= htmlspecialchars($tfa['thumbnail']['source']) ?>"
                                        alt="<?= htmlspecialchars($tfa['title']) ?>">
                                <?php endif; ?>
                                <p><strong><?= htmlspecialchars($tfa['titles']['normalized'] ?? $tfa['title']) ?></strong>
                                </p>
                                <p><?= $tfa['extract'] ?></p>
                                <a href="<?= $tfa['content_urls']['desktop']['page'] ?? '#' ?>" class="read-more">Read
                                    more...</a>
                            </div>
                        </section>

                        <!-- Did You Know? -->
                        <section class="mp-box box-green">
                            <h2 class="mp-h2">Did you know...</h2>
                            <div class="mp-box-content">
                                <ul class="dyk-list">
                                    <li>... that <strong>Hesten's Learning</strong> provides personalized paths for
                                        students with learning differences?</li>
                                    <li>... that the most popular subject on this site currenty is <strong>Math
                                            Expression</strong>?</li>
                                    <li>... that you can access interactive <strong>simulations</strong> for Science
                                        experiments?</li>
                                    <li>... that our <strong>reader tool</strong> supports highlighting and
                                        text-to-speech?</li>
                                </ul>
                                <p class="text-right mt-2 text-xs font-bold"><a href="#" class="text-blue-600">More
                                        updates...</a></p>
                            </div>
                        </section>

                    </div>

                    <!-- Right Column -->
                    <div class="mp-right">

                        <!-- In the News -->
                        <section class="mp-box box-blue">
                            <h2 class="mp-h2">In the news</h2>
                            <div class="mp-box-content">
                                <ul class="itn-list">
                                    <?php if (!empty($itn)): ?>
                                        <?php foreach ($itn as $article): ?>
                                            <li><strong><a href="<?= $article['content_urls']['desktop']['page'] ?? '#' ?>"
                                                        class="text-blue-700"><?= htmlspecialchars($article['titles']['normalized'] ?? $article['title']) ?></a></strong>:
                                                <?= htmlspecialchars($article['extract'] ?? 'Featured trending topic') ?></li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li><strong>Library Update</strong>: New books added to the 1984 Reader.</li>
                                        <li><strong>Math Competition</strong>: Spring 2026 rankings are now live!</li>
                                        <li><strong>Science Fair</strong>: Virtual submission portal remains open.</li>
                                    <?php endif; ?>
                                </ul>
                                <p class="text-right mt-2 text-xs font-bold"><a href="#" class="text-blue-600">More
                                        news...</a></p>
                            </div>
                        </section>

                        <!-- On This Day -->
                        <section class="mp-box box-blue">
                            <h2 class="mp-h2">On this day...</h2>
                            <div class="mp-box-content">
                                <ul class="otd-list">
                                    <?php if (!empty($onthisday)): ?>
                                        <?php foreach ($onthisday as $event): ?>
                                            <li><strong><?= $event['year'] ?></strong>: <?= $event['text'] ?></li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li><strong>1949</strong>: The founding treaty of NATO is signed in Washington, D.C.
                                        </li>
                                        <li><strong>1968</strong>: Martin Luther King Jr. is assassinated in Memphis,
                                            Tennessee.</li>
                                        <li><strong>1975</strong>: Microsoft is founded by Bill Gates and Paul Allen.</li>
                                    <?php endif; ?>
                                </ul>
                                <p class="text-right mt-2 text-xs font-bold"><a href="#" class="text-blue-600">More
                                        anniversaries...</a></p>
                            </div>
                        </section>

                    </div>

                </div>

                <!-- Footer Section ( Sister Projects ) -->
                <section class="mp-box box-grey mt-4">
                    <h2 class="mp-h2">Other areas of Hesten's Learning</h2>
                    <div class="mp-box-content">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                            <a href="/levels/a.php" class="block p-4 border rounded-lg hover:bg-gray-50">
                                <i class="fas fa-layer-group text-2xl text-indigo-600 mb-2"></i><br>Level K-A
                            </a>
                            <a href="/research" class="block p-4 border rounded-lg hover:bg-gray-50">
                                <i class="fas fa-microscope text-2xl text-emerald-600 mb-2"></i><br>Research
                            </a>
                            <a href="/assessment" class="block p-4 border rounded-lg hover:bg-gray-50">
                                <i class="fas fa-clipboard-check text-2xl text-amber-600 mb-2"></i><br>Assessments
                            </a>
                            <a href="/community" class="block p-4 border rounded-lg hover:bg-gray-50">
                                <i class="fas fa-users text-2xl text-rose-600 mb-2"></i><br>Community
                            </a>
                        </div>
                    </div>
                </section>

            </main>

        </div>

    </div>
</div>

<?php
// Include the footer file
include 'src/footer.php';
?>