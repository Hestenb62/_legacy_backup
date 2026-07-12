<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Science Experiments - Hesten's Learning";
$pageDescription = "Engage with hands-on and virtual science experiments to deepen your understanding.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Science Experiments</h1>
        <p class="text-center text-lg text-grayish mb-8">Engage with hands-on and virtual science experiments to deepen your understanding.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Biology Labs -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-dna mr-2"></i>Biology Labs</h5>
                    <p class="text-grayish mb-4">Explore the living world through interactive virtual labs and easy-to-do home experiments.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Plant Cell Observation'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Plant Cell Observation</a></li>
                        <li><a href="#" onclick="openDynamicModal('DNA Extraction at Home'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>DNA Extraction at Home</a></li>
                        <li><a href="#" onclick="openDynamicModal('Ecosystem Simulation'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Ecosystem Simulation</a></li>
                        <li><a href="#" onclick="openDynamicModal('Virtual Dissection'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Virtual Dissection</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Start Biology Experiments</a>
                </div>
            </div>

            <!-- Chemistry Demos -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-fire mr-2"></i>Chemistry Demos</h5>
                    <p class="text-grayish mb-4">Witness chemical reactions and explore properties of matter with exciting demonstrations.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Volcano Eruption'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Volcano Eruption</a></li>
                        <li><a href="#" onclick="openDynamicModal('Invisible Ink'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Invisible Ink</a></li>
                        <li><a href="#" onclick="openDynamicModal('Density Tower'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Density Tower</a></li>
                        <li><a href="#" onclick="openDynamicModal('Crystal Growing'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Crystal Growing</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">View Chemistry Demos</a>
                </div>
            </div>

            <!-- Physics Simulations -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-rocket mr-2"></i>Physics Simulations</h5>
                    <p class="text-grayish mb-4">Interact with simulations to understand concepts like motion, energy, and electricity.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Projectile Motion'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Projectile Motion</a></li>
                        <li><a href="#" onclick="openDynamicModal('Circuit Builder'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Circuit Builder</a></li>
                        <li><a href="#" onclick="openDynamicModal('Wave Generator'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Wave Generator</a></li>
                        <li><a href="#" onclick="openDynamicModal('Gravity Simulator'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Gravity Simulator</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Run Physics Simulations</a>
                </div>
            </div>

            <!-- Earth Science Activities -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-globe-americas mr-2"></i>Earth Science Activities</h5>
                    <p class="text-grayish mb-4">Engage in activities that explore geology, weather patterns, and space phenomena.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Rock Cycle Model'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Rock Cycle Model</a></li>
                        <li><a href="#" onclick="openDynamicModal('Weather Forecasting Game'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Weather Forecasting Game</a></li>
                        <li><a href="#" onclick="openDynamicModal('Plate Tectonics Demo'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Plate Tectonics Demo</a></li>
                        <li><a href="#" onclick="openDynamicModal('Solar System Builder'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Solar System Builder</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Do Earth Science Activities</a>
                </div>
            </div>

            <!-- Environmental Science Projects -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-recycle mr-2"></i>Environmental Science Projects</h5>
                    <p class="text-grayish mb-4">Participate in projects that promote environmental awareness and sustainability.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Water Quality Testing'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Water Quality Testing</a></li>
                        <li><a href="#" onclick="openDynamicModal('Composting Project'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Composting Project</a></li>
                        <li><a href="#" onclick="openDynamicModal('Renewable Energy Model'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Renewable Energy Model</a></li>
                        <li><a href="#" onclick="openDynamicModal('Pollution Impact Study'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Pollution Impact Study</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Start Environmental Projects</a>
                </div>
            </div>

            <!-- Forensic Science Challenges -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-fingerprint mr-2"></i>Forensic Science Challenges</h5>
                    <p class="text-grayish mb-4">Solve mysteries using scientific principles in engaging forensic science challenges.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Fingerprint Analysis'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Fingerprint Analysis</a></li>
                        <li><a href="#" onclick="openDynamicModal('DNA Evidence Matching'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>DNA Evidence Matching</a></li>
                        <li><a href="#" onclick="openDynamicModal('Chemical Trace Analysis'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Chemical Trace Analysis</a></li>
                        <li><a href="#" onclick="openDynamicModal('Crime Scene Reconstruction'); return false;" class="text-accent hover:underline"><i class="fas fa-flask mr-2"></i>Crime Scene Reconstruction</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Tackle Forensic Challenges</a>
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

