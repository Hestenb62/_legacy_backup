<?php
$pageTitle = "Teachers Resources - Hesten's Learning";
include 'src/header.php';
?>

<main class="flex-grow">

    <!-- Hero Section -->
    <!-- Hero Section -->
    <div
        class="page-hero">
        <!-- Abstract Background Shapes -->
        <div class="page-hero-bg">
            <i class="fas fa-chalkboard-teacher absolute top-10 left-10 text-8xl text-white/10 transform-gpu"></i>
            <i
                class="fas fa-apple-alt absolute bottom-20 right-10 text-[12rem] text-white/5 rotate-12 transform-gpu"></i>
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center">
            <span
                class="page-hero-badge">
                Educator Portal
            </span>
            <h1 class="page-hero-title">
                Teacher's Resources
            </h1>
            <p class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto font-light leading-relaxed">
                Supporting educators with standards-aligned materials and tools.
            </p>
        </div>
    </div>

    <!-- Content -->
    <section class="container mx-auto px-4 py-12 md:py-16">
        <div
            class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-2xl shadow-xl p-8 md:p-12 border border-gray-100 dark:border-gray-700">

            <div class="flex flex-col items-center text-center space-y-6">
                <div
                    class="w-20 h-20 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center text-green-600 dark:text-green-300 text-3xl mb-4">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>

                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Curriculum & Standards</h2>

                <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed">
                    As I build the standards page, this is where I will be adding the resources that I am using to base
                    the learning off from that aligns with the <strong class="text-primary">CCSS standards</strong> so
                    that there is no neglect going on.
                </p>

                <div class="w-full h-px bg-gray-200 dark:bg-gray-700 my-6"></div>

                <div
                    class="bg-blue-50 dark:bg-blue-900/30 border-l-4 border-blue-500 p-4 text-left w-full rounded-r-lg">
                    <p class="text-sm text-blue-800 dark:text-blue-200 font-medium">
                        <i class="fas fa-info-circle mr-2"></i> Upcoming Features:
                    </p>
                    <ul class="list-disc list-inside text-sm text-blue-700 dark:text-blue-300 mt-2 space-y-1 ml-1">
                        <li>Lesson Plan Templates</li>
                        <li>CCSS Alignment Charts</li>
                        <li>Printable Worksheets</li>
                        <li>Classroom Activity Guides</li>
                    </ul>
                </div>

                <button
                    class="mt-4 px-8 py-3 bg-primary text-white font-bold rounded-lg hover:bg-secondary transition-colors shadow-lg">
                    Request Resources
                </button>
            </div>

        </div>
    </section>

</main>

<?php include 'src/footer.php'; ?>
