<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Science Diagrams & Models - Hesten's Learning";
$pageDescription = "Visualize complex scientific concepts with our collection of detailed diagrams, interactive models, and 3D representations.";
$pageAuthor = "Hesten's Learning Team";

// Include the header file
include '..\src\header.php';
?>

    <main class="page-content-wrapper">
        <h1 class="text-center text-4xl font-bold text-primary mb-4">Science Diagrams & Models</h1>
        <p class="text-center text-lg text-grayish mb-8">Visualize complex scientific concepts with our collection of detailed diagrams, interactive models, and 3D representations.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Biology Diagrams -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-microscope mr-2"></i>Biology Diagrams</h5>
                    <p class="text-grayish mb-4">Explore intricate biological structures and processes through clear and labeled diagrams.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Animal Cell Diagram'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Animal Cell Diagram</a></li>
                        <li><a href="#" onclick="openDynamicModal('Plant Anatomy'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Plant Anatomy</a></li>
                        <li><a href="#" onclick="openDynamicModal('Human Organ Systems'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Human Organ Systems</a></li>
                        <li><a href="#" onclick="openDynamicModal('Food Web & Chains'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Food Web & Chains</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">View Biology Diagrams</a>
                </div>
            </div>

            <!-- Chemistry Models -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-flask mr-2"></i>Chemistry Models</h5>
                    <p class="text-grayish mb-4">Understand atomic structures, molecular bonds, and chemical reactions with interactive models.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Atomic Structure Model'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Atomic Structure Model</a></li>
                        <li><a href="#" onclick="openDynamicModal('Molecular Geometry'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Molecular Geometry</a></li>
                        <li><a href="#" onclick="openDynamicModal('Chemical Reaction Animations'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Chemical Reaction Animations</a></li>
                        <li><a href="#" onclick="openDynamicModal('Periodic Table Visualizer'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Periodic Table Visualizer</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Chemistry Models</a>
                </div>
            </div>

            <!-- Physics Diagrams -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-atom mr-2"></i>Physics Diagrams</h5>
                    <p class="text-grayish mb-4">Visualize forces, circuits, waves, and other physics phenomena through clear diagrams.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Force Diagrams'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Force Diagrams</a></li>
                        <li><a href="#" onclick="openDynamicModal('Electric Circuits'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Electric Circuits</a></li>
                        <li><a href="#" onclick="openDynamicModal('Light Spectrum Diagram'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Light Spectrum Diagram</a></li>
                        <li><a href="#" onclick="openDynamicModal('Wave Properties'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Wave Properties</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">View Physics Diagrams</a>
                </div>
            </div>

            <!-- Earth Science Models -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-globe-americas mr-2"></i>Earth Science Models</h5>
                    <p class="text-grayish mb-4">Understand geological processes, weather systems, and celestial mechanics with interactive models.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Rock Cycle Model'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Rock Cycle Model</a></li>
                        <li><a href="#" onclick="openDynamicModal('Water Cycle Diagram'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Water Cycle Diagram</a></li>
                        <li><a href="#" onclick="openDynamicModal('Plate Tectonics Map'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Plate Tectonics Map</a></li>
                        <li><a href="#" onclick="openDynamicModal('Solar System Model'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Solar System Model</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Explore Earth Science Models</a>
                </div>
            </div>

            <!-- Anatomy & Physiology Visuals -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-user-md mr-2"></i>Anatomy & Physiology Visuals</h5>
                    <p class="text-grayish mb-4">Detailed diagrams and 3D models of the human body and its systems.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Skeletal System'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Skeletal System</a></li>
                        <li><a href="#" onclick="openDynamicModal('Muscular System'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Muscular System</a></li>
                        <li><a href="#" onclick="openDynamicModal('Circulatory System'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Circulatory System</a></li>
                        <li><a href="#" onclick="openDynamicModal('Nervous System'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Nervous System</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">View Anatomy Visuals</a>
                </div>
            </div>

            <!-- Scientific Process Diagrams -->
            <div class="col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col h-full">
                    <h5 class="text-xl font-semibold text-primary mb-3"><i class="fas fa-chart-flow mr-2"></i>Scientific Process Diagrams</h5>
                    <p class="text-grayish mb-4">Flowcharts and diagrams explaining the scientific method and experimental design.</p>
                    <ul class="list-none space-y-2 flex-grow">
                        <li><a href="#" onclick="openDynamicModal('Scientific Method Steps'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Scientific Method Steps</a></li>
                        <li><a href="#" onclick="openDynamicModal('Experimental Design Flowchart'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Experimental Design Flowchart</a></li>
                        <li><a href="#" onclick="openDynamicModal('Data Analysis Process'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Data Analysis Process</a></li>
                        <li><a href="#" onclick="openDynamicModal('Peer Review Process'); return false;" class="text-accent hover:underline"><i class="fas fa-angle-right mr-2"></i>Peer Review Process</a></li>
                    </ul>
                    <a href="#" class="mt-auto px-4 py-2 bg-primary text-white rounded-md font-semibold hover:opacity-90 text-center">Understand Scientific Process</a>
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

