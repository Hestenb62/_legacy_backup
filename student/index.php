<?php
// Set variables required by header.php for dynamic content
$pageTitle = "Student Wiki - Hesten's Learning";
$pageDescription = "A wiki of resources for Math, ELA, Science, and Social Studies to support students with learning disabilities.";
$pageAuthor = "Hesten's Learning Team";

// Variables for the welcome popup (located in header.php)
$welcomeMessage = "Welcome, Student!";
$welcomeParagraph = "Welcome to the resource wiki! All your subjects are listed here. You can use the menu on the left to jump to a subject.";

// Include the header file, which contains the <html>, <head>, and opening <body> tags,
// as well as the navigation bar, accessibility panel, and welcome popup.
include 'src/header.php';
?>

    <!-- Hero Section -->
    <div class="relative bg-gradient-to-br from-indigo-600 via-blue-600 to-purple-600 dark:from-indigo-900 dark:via-blue-900 dark:to-purple-900 text-white pt-20 pb-20 px-4 rounded-b-[2.5rem] shadow-2xl overflow-hidden mb-12 border-b border-white/10">
        <!-- Abstract Background Shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <i class="fas fa-user-graduate absolute top-10 left-10 text-8xl text-white/10 transform-gpu"></i>
            <i class="fas fa-book-open absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12 transform-gpu"></i>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-sm font-bold mb-4 uppercase tracking-wider backdrop-blur-md shadow-sm">
                Knowledge Base
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold mb-4 tracking-tight drop-shadow-md">
                Student Resource Wiki
            </h1>
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Find all the resources you need for Math, ELA, Science, and Social Studies.
            </p>
        </div>
    </div>

    <!-- Main Content Area -->
    <main class="container mx-auto px-4 py-8">

        <div class="flex flex-col lg:flex-row gap-12">

            <!-- Sticky Navigation Sidebar -->
            <aside class="w-full lg:w-1/4">
                <nav class="lg:sticky lg:top-24">
                    <h2 class="text-2xl font-semibold text-primary mb-4 border-b-2 border-primary/20 pb-2">Subjects</h2>
                    <ul id="wiki-nav" class="space-y-2">
                        <li>
                            <a href="#math" class="wiki-nav-link block px-4 py-2 rounded-lg text-text-secondary font-medium hover:bg-primary/10 hover:text-primary transition-colors">
                                <i class="fas fa-calculator mr-2 w-5" aria-hidden="true"></i>Math
                            </a>
                        </li>
                        <li>
                            <a href="#ela" class="wiki-nav-link block px-4 py-2 rounded-lg text-text-secondary font-medium hover:bg-green-600/10 hover:text-green-700 transition-colors">
                                <i class="fas fa-book-open mr-2 w-5" aria-hidden="true"></i>ELA
                            </a>
                        </li>
                        <li>
                            <a href="#science" class="wiki-nav-link block px-4 py-2 rounded-lg text-text-secondary font-medium hover:bg-red-600/10 hover:text-red-700 transition-colors">
                                <i class="fas fa-flask mr-2 w-5" aria-hidden="true"></i>Science
                            </a>
                        </li>
                        <li>
                            <a href="#social-studies" class="wiki-nav-link block px-4 py-2 rounded-lg text-text-secondary font-medium hover:bg-yellow-600/10 hover:text-yellow-700 transition-colors">
                                <i class="fas fa-globe-americas mr-2 w-5" aria-hidden="true"></i>Social Studies
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content Sections -->
            <div class="w-full lg:w-3/4 space-y-16">
                
                <!-- Math Section -->
                <section id="math" class="wiki-section pt-4 scroll-mt-20">
                    <h2 class="text-3xl font-bold text-primary mb-6 pb-2 border-b-2 border-primary/20 flex items-center">
                        <i class="fas fa-calculator mr-3" aria-hidden="true"></i>Math Resources
                    </h2>
                    <div class="space-y-8">
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Practice Problems</h4>
                            <p class="text-text-secondary mb-4">Access a wide range of interactive practice problems, complete with hints and step-by-step solutions to help you understand challenging concepts. The best way to learn math is by doing it!</p>
                            <a href="/student/math-practice.php" class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 mb-4 font-medium transition-colors">Go to Our Practice Problems &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://www.khanacademy.org/math" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Khan Academy</a>: Free practice exercises, quizzes, and instructional videos for all levels.</li>
                                <li><a href="https://www.ixl.com/math" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">IXL Math</a>: Comprehensive K-12 practice problems with detailed explanations.</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Video Tutorials</h4>
                            <p class="text-text-secondary mb-4">Watch engaging video lessons that break down everything from fractions to algebra. Our visual aids and clear explanations make learning easy.</p>
                            <a href="/student/math-tutorials.php" class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 mb-4 font-medium transition-colors">Browse Our Video Tutorials &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://www.youtube.com/@TheOrganicChemistryTutor" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">The Organic Chemistry Tutor</a>: (Don't let the name fool you!) Amazing, clear videos on Algebra, Geometry, Calculus, and more.</li>
                                <li><a href="https://www.youtube.com/@patrickjmt" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">PatrickJMT</a>: Free math videos from Arithmetic to Differential Equations.</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Study Guides & Notes</h4>
                            <p class="text-text-secondary mb-4">Download printable study guides and formula sheets. These are perfect for quick reference, test prep, and reinforcing what you've learned in class.</p>
                            <a href="/student/math-study-guides.php" class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 mb-4 font-medium transition-colors">Find Our Study Guides &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">Key Concepts & Formulas:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><strong>PEMDAS:</strong> Parentheses, Exponents, Multiplication/Division, Addition/Subtraction.</li>
                                <li><strong>Area of a Circle:</strong> $A = \pi r^2$</li>
                                <li><strong>Pythagorean Theorem:</strong> $a^2 + b^2 = c^2$</li>
                                <li><strong>Slope-Intercept Form:</strong> $y = mx + b$</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Interactive Math Games</h4>
                            <p class="text-text-secondary mb-4">Have fun while learning! Our math games are designed to improve your skills in a fun, competitive, and engaging way.</p>
                            <a href="/student/math-games.php" class="inline-block px-4 py-2 bg-primary/10 text-primary rounded-lg hover:bg-primary/20 mb-4 font-medium transition-colors">Play Our Math Games &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://www.desmos.com/calculator" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Desmos</a>: A beautiful, free graphing calculator and art tool.</li>
                                <li><a href="https://www.pbskids.org/games/math" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">PBS Kids Math Games</a>: Fun games for elementary and middle school concepts.</li>
                            </ul>
                        </section>
                    </div>
                </section>

                <!-- ELA Section -->
                <section id="ela" class="wiki-section pt-4 scroll-mt-20">
                    <h2 class="text-3xl font-bold text-green-600 mb-6 pb-2 border-b-2 border-green-600/20 flex items-center">
                        <i class="fas fa-book-open mr-3" aria-hidden="true"></i>ELA Resources
                    </h2>
                    <div class="space-y-8">
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Reading Comprehension</h4>
                            <p class="text-text-secondary mb-4">Practice with a variety of texts and question sets designed to improve your ability to understand, analyze, and interpret what you read.</p>
                            <a href="/student/ela-reading.php" class="inline-block px-4 py-2 bg-green-600/10 text-green-700 rounded-lg hover:bg-green-600/20 mb-4 font-medium transition-colors">Start Reading Practice &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">Active Reading Tips:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><strong>Annotate:</strong> Highlight key passages and write notes in the margins.</li>
                                <li><strong>Summarize:</strong> After each section, try to explain the main idea in one sentence.</li>
                                <li><strong>Ask Questions:</strong> Write down questions you have as you read.</li>
                            </ul>
                            <h5 class="text-lg font-medium text-text-primary mt-4 mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://www.newsela.com" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Newsela</a>: Read current events articles at different reading levels.</li>
                                <li><a href="https://www.readwritethink.org/student-interactives" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">ReadWriteThink</a>: Interactive tools for reading and writing.</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Writing Prompts & Guides</h4>
                            <p class="text-text-secondary mb-4">Get creative with our writing prompts for narratives, essays, and reports. Use our guides to structure your writing and improve your style.</p>
                            <a href="/student/ela-writing.php" class="inline-block px-4 py-2 bg-green-600/10 text-green-700 rounded-lg hover:bg-green-600/20 mb-4 font-medium transition-colors">Explore Writing Guides &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">Example Writing Prompts:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><strong>Narrative:</strong> Write a story about a time you found something you weren't looking for.</li>
                                <li><strong>Persuasive:</strong> Argue for or against this statement: "Social media is good for society."</li>
                                <li><strong>Expository:</strong> Explain how to do your favorite hobby.</li>
                            </ul>
                            <h5 class="text-lg font-medium text-text-primary mt-4 mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://owl.purdue.edu/owl/purdue_owl.html" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Purdue OWL</a>: The ultimate guide for writing, grammar, and citation styles.</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Grammar & Vocabulary</h4>
                            <p class="text-text-secondary mb-4">Master the rules of grammar with interactive exercises. Expand your vocabulary with daily words, quizzes, and word-based games.</p>
                            <a href="/student/ela-grammar.php" class="inline-block px-4 py-2 bg-green-600/10 text-green-700 rounded-lg hover:bg-green-600/20 mb-4 font-medium transition-colors">Improve Your Grammar &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">Common Pitfalls:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><strong>Their / There / They're:</strong> (Possession / Place / "They are")</li>
                                <li><strong>Your / You're:</strong> (Possession / "You are")</li>
                                <li><strong>Its / It's:</strong> (Possession / "It is")</li>
                            </ul>
                            <h5 class="text-lg font-medium text-text-primary mt-4 mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://www.merriam-webster.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Merriam-Webster</a>: Dictionary and thesaurus with word games.</li>
                                <li><a href="https://www.grammar-monster.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Grammar Monster</a>: Easy-to-understand explanations and interactive tests.</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Literature Analysis</h4>
                            <p class="text-text-secondary mb-4">Learn how to analyze literature like a pro. We provide guides on theme, character, plot, and literary devices for common books and plays.</p>
                            <a href="/student/ela-literature.php" class="inline-block px-4 py-2 bg-green-600/10 text-green-700 rounded-lg hover:bg-green-600/20 mb-4 font-medium transition-colors">Analyze Literature &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">Key Literary Devices:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><strong>Metaphor:</strong> A direct comparison (e.g., "His eyes were ice.").</li>
                                <li><strong>Simile:</strong> A comparison using "like" or "as" (e.g., "He was as cold as ice.").</li>
                                <li><strong>Theme:</strong> The central idea or message of the story.</li>
                                <li><strong>Character Arc:</strong> The change a character undergoes from beginning to end.</li>
                            </ul>
                            <h5 class="text-lg font-medium text-text-primary mt-4 mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://www.sparknotes.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">SparkNotes</a>: Study guides for hundreds of books.</li>
                            </ul>
                        </section>
                    </div>
                </section>

                <!-- Science Section -->
                <section id="science" class="wiki-section pt-4 scroll-mt-20">
                    <h2 class="text-3xl font-bold text-red-600 mb-6 pb-2 border-b-2 border-red-600/20 flex items-center">
                        <i class="fas fa-flask mr-3" aria-hidden="true"></i>Science Resources
                    </h2>
                    <div class="space-y-8">
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Virtual Experiments</h4>
                            <p class="text-text-secondary mb-4">Engage in safe, interactive virtual labs. Conduct experiments in biology, chemistry, and physics right from your computer.</p>
                            <a href="/student/science-experiments.php" class="inline-block px-4 py-2 bg-red-600/10 text-red-700 rounded-lg hover:bg-red-600/20 mb-4 font-medium transition-colors">Try Our Virtual Labs &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://phet.colorado.edu/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">PhET Interactive Simulations</a>: Fun, free simulations for physics, chemistry, biology, and math.</li>
                                <li><a href="https://www.biointeractive.org/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Howard Hughes Medical Institute</a>: Real science, virtual labs, and data analysis.</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Science Articles & News</h4>
                            <p class="text-text-secondary mb-4">Stay up-to-date with the latest scientific discoveries. Read articles on space, nature, technology, and health, written just for students.</p>
                            <a href="/student/science-articles.php" class="inline-block px-4 py-2 bg-red-600/10 text-red-700 rounded-lg hover:bg-red-600/20 mb-4 font-medium transition-colors">Read Our Science News &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://www.nasa.gov/students" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">NASA for Students</a>: Learn about space, rockets, and our planet.</li>
                                <li><a href="https://kids.nationalgeographic.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">National Geographic Kids</a>: Explore the world with articles on animals, nature, and history.</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Diagrams & Models</h4>
                            <p class="text-text-secondary mb-4">Explore detailed, interactive diagrams of the human body, chemical structures, and physical processes to help visualize complex topics.</p>
                            <a href="/student/science-diagrams.php" class="inline-block px-4 py-2 bg-red-600/10 text-red-700 rounded-lg hover:bg-red-600/20 mb-4 font-medium transition-colors">View Interactive Diagrams &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://ptable.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Ptable</a>: An amazing interactive periodic table.</li>
                                <li><a href="https://www.visiblebody.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Visible Body</a>: 3D models of the human anatomy (some free resources).</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Science Quizzes</h4>
                            <p class="text-text-secondary mb-4">Test your knowledge with quizzes on everything from the solar system to the periodic table. Get instant feedback to help you study.</p>
                            <a href="/student/science-quizzes.php" class="inline-block px-4 py-2 bg-red-600/10 text-red-700 rounded-lg hover:bg-red-600/20 mb-4 font-medium transition-colors">Take a Science Quiz &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://quizlet.com/subject/science/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Quizlet</a>: Create and use flashcards for any science topic.</li>
                                <li><a href="https://kahoot.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Kahoot!</a>: Play and create fun, game-based quizzes.</li>
                            </ul>
                        </section>
                    </div>
                </section>

                <!-- Social Studies Section -->
                <section id="social-studies" class="wiki-section pt-4 scroll-mt-20">
                    <h2 class="text-3xl font-bold text-yellow-600 mb-6 pb-2 border-b-2 border-yellow-600/20 flex items-center">
                        <i class="fas fa-globe-americas mr-3" aria-hidden="true"></i>Social Studies Resources
                    </h2>
                    <div class="space-y-8">
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Historical Timelines</h4>
                            <p class="text-text-secondary mb-4">Walk through history with our interactive timelines. See key events, figures, and eras come to life and understand how they connect.</p>
                            <a href="/student/social-history.php" class="inline-block px-4 py-2 bg-yellow-600/10 text-yellow-700 rounded-lg hover:bg-yellow-600/20 mb-4 font-medium transition-colors">Explore Our Timelines &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://www.history.com/topics" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">History.com</a>: Explore articles, videos, and timelines on thousands of topics.</li>
                                <li><a href="https://www.worldhistory.org/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">World History Encyclopedia</a>: A detailed, non-profit encyclopedia for world history.</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Interactive Maps</h4>
                            <p class="text-text-secondary mb-4">Explore the world with interactive maps. Learn about geography, historical boundaries, trade routes, and cultural regions.</p>
                            <a href="/student/social-maps.php" class="inline-block px-4 py-2 bg-yellow-600/10 text-yellow-700 rounded-lg hover:bg-yellow-600/20 mb-4 font-medium transition-colors">View Our Interactive Maps &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://earth.google.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Google Earth</a>: Explore the globe in 3D, from street level to space.</li>
                                <li><a href="https://www.nationalgeographic.org/education/mapping/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">National Geographic Maps</a>: Tools and maps for students to explore geography.</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Civics & Government</h4>
                            <p class="text-text-secondary mb-4">Understand how government works. Learn about the constitution, your rights and responsibilities, and the political process.</p>
                            <a href="/student/social-civics.php" class="inline-block px-4 py-2 bg-yellow-600/10 text-yellow-700 rounded-lg hover:bg-yellow-600/20 mb-4 font-medium transition-colors">Learn About Civics &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://www.icivics.org/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">iCivics</a>: Play games that teach you about civics, government, and law.</li>
                                <li><a href="https://www.whitehouse.gov/about-the-white-house/our-government/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">The White House - Our Government</a>: Learn about the branches of government.</li>
                            </ul>
                        </section>
                        <section class="p-6 bg-card-bg rounded-base-rounded shadow-lg">
                            <h4 class="text-2xl font-semibold text-text-primary mb-3">Current Events Analysis</h4>
                            <p class="text-text-secondary mb-4">Connect the past to the present. We provide student-friendly breakdowns of current events and explain their historical context.</p>
                            <a href="/student/social-current-events.php" class="inline-block px-4 py-2 bg-yellow-600/10 text-yellow-700 rounded-lg hover:bg-yellow-600/20 mb-4 font-medium transition-colors">Analyze Current Events &rarr;</a>
                            <h5 class="text-lg font-medium text-text-primary mb-2">More Great Resources:</h5>
                            <ul class="list-disc list-inside text-text-secondary space-y-1">
                                <li><a href="https://newsela.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">Newsela</a>: News articles adjusted for different reading levels.</li>
                                <li><a href="https://www.timeforkids.com/" target="_blank" rel="noopener noreferrer" class="text-link-color hover:underline">TIME for Kids</a>: Age-appropriate news on world events, science, and more.</li>
                            </ul>
                        </section>
                    </div>
                </section>

            </div>
        </div>
    </main>


    <!-- 
      WIKI-SPECIFIC STYLES AND SCRIPT 
      (These are new styles for the wiki layout and scroll-spy)
    -->
    <style>
        /* Style for the active navigation link in the sidebar */
        .wiki-nav-link.active-math {
            background-color: var(--color-primary, #4F46E5);
            color: white;
            font-weight: 600;
        }
        .wiki-nav-link.active-ela {
            background-color: #16a34a; /* green-600 */
            color: white;
            font-weight: 600;
        }
        .wiki-nav-link.active-science {
            background-color: #dc2626; /* red-600 */
            color: white;
            font-weight: 600;
        }
        .wiki-nav-link.active-social {
            background-color: #d97706; /* yellow-600 */
            color: white;
            font-weight: 600;
        }

        /* Ensure smooth scrolling when clicking nav links */
        html {
            scroll-behavior: smooth;
        }
    </style>

    <script>
        // JavaScript for the Intersection Observer (Scroll-Spy)
        document.addEventListener('DOMContentLoaded', () => {
            const sections = document.querySelectorAll('.wiki-section');
            const navLinks = {
                'math': document.querySelector('a[href="#math"]'),
                'ela': document.querySelector('a[href="#ela"]'),
                'science': document.querySelector('a[href="#science"]'),
                'social-studies': document.querySelector('a[href="#social-studies"]')
            };

            // Map section IDs to their corresponding active class
            const activeClasses = {
                'math': 'active-math',
                'ela': 'active-ela',
                'science': 'active-science',
                'social-studies': 'active-social'
            };

            const observerOptions = {
                root: null, // relative to viewport
                rootMargin: '0px',
                threshold: 0.3 // 30% of the section must be visible
            };

            const observerCallback = (entries) => {
                entries.forEach(entry => {
                    const id = entry.target.id;
                    const navLink = navLinks[id];
                    const activeClass = activeClasses[id];

                    if (!navLink || !activeClass) return;

                    if (entry.isIntersecting) {
                        // Remove active class from all links first
                        document.querySelectorAll('.wiki-nav-link').forEach(link => {
                            Object.values(activeClasses).forEach(cls => link.classList.remove(cls));
                        });
                        // Add the specific active class to the current link
                        navLink.classList.add(activeClass);
                    }
                });
            };

            const observer = new IntersectionObserver(observerCallback, observerOptions);

            sections.forEach(section => {
                observer.observe(section);
            });
        });
    </script>


<?php
// Include the footer file, which contains the <footer>, modals, and closing </body> and </html> tags.
include 'src/footer.php';
?>