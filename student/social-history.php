<?php
// Set variables required by header.php for dynamic content
$pageTitle = "History Resources - Hesten's Learning";
$pageDescription = "Travel through time and explore the events, cultures, and people that shaped our world.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">History Resources</h1>
        <p class="text-center text-lg text-grayish mb-8">Travel through time and explore the events, cultures, and people that shaped our world.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Ancient Civilizations -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-gopuram mr-2"></i>Ancient Civilizations</h5>
                    <p class="text-grayish mb-4">Discover the origins of human civilization, from Mesopotamia to ancient Rome.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Ancient Egypt'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Ancient Egypt</a></li>
                        <li><a href="#" onclick="openDynamicModal('Mesopotamia'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Mesopotamia</a></li>
                        <li><a href="#" onclick="openDynamicModal('Ancient Greece'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Ancient Greece</a></li>
                        <li><a href="#" onclick="openDynamicModal('Roman Empire'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Roman Empire</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Ancient History</a>
                </div>
            </div>

            <!-- World History Timelines -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-calendar-alt mr-2"></i>World History Timelines</h5>
                    <p class="text-grayish mb-4">Visualize key events and periods in world history with interactive timelines.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Medieval Period'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Medieval Period</a></li>
                        <li><a href="#" onclick="openDynamicModal('Renaissance & Reformation'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Renaissance & Reformation</a></li>
                        <li><a href="#" onclick="openDynamicModal('Age of Exploration'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Age of Exploration</a></li>
                        <li><a href="#" onclick="openDynamicModal('Modern World History'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Modern World History</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">View Timelines</a>
                </div>
            </div>

            <!-- US History Documents -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-scroll mr-2"></i>US History Documents</h5>
                    <p class="text-grayish mb-4">Access primary sources, historical texts, and analyses of significant moments in American history.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Colonial America'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Colonial America</a></li>
                        <li><a href="#" onclick="openDynamicModal('American Revolution'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>American Revolution</a></li>
                        <li><a href="#" onclick="openDynamicModal('Civil War Era'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Civil War Era</a></li>
                        <li><a href="#" onclick="openDynamicModal('20th Century America'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>20th Century America</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Read US History Documents</a>
                </div>
            </div>

            <!-- Historical Figures -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-user-friends mr-2"></i>Historical Figures</h5>
                    <p class="text-grayish mb-4">Learn about the lives and legacies of influential people throughout history.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Leaders & Rulers'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Leaders & Rulers</a></li>
                        <li><a href="#" onclick="openDynamicModal('Scientists & Inventors'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Scientists & Inventors</a></li>
                        <li><a href="#" onclick="openDynamicModal('Artists & Writers'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Artists & Writers</a></li>
                        <li><a href="#" onclick="openDynamicModal('Activists & Reformers'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Activists & Reformers</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Discover Historical Figures</a>
                </div>
            </div>

            <!-- World Wars -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-bomb mr-2"></i>World Wars</h5>
                    <p class="text-grayish mb-4">In-depth resources on World War I and World War II, including causes, events, and impacts.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('World War I Overview'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>World War I Overview</a></li>
                        <li><a href="#" onclick="openDynamicModal('Causes of WWII'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Causes of WWII</a></li>
                        <li><a href="#" onclick="openDynamicModal('Major Battles of WWII'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Major Battles of WWII</a></li>
                        <li><a href="#" onclick="openDynamicModal('Post-War World'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Post-War World</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Learn About World Wars</a>
                </div>
            </div>

            <!-- Cold War Era -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-snowflake mr-2"></i>Cold War Era</h5>
                    <p class="text-grayish mb-4">Understand the geopolitical tensions, proxy wars, and ideological conflicts of the Cold War.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Origins of the Cold War'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Origins of the Cold War</a></li>
                        <li><a href="#" onclick="openDynamicModal('Space Race'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Space Race</a></li>
                        <li><a href="#" onclick="openDynamicModal('Cuban Missile Crisis'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Cuban Missile Crisis</a></li>
                        <li><a href="#" onclick="openDynamicModal('Fall of the Berlin Wall'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Fall of the Berlin Wall</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Cold War</a>
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

