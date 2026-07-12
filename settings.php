<?php
$pageTitle       = "Accessibility Settings - Hesten's Learning";
$pageDescription = "Customize your learning experience with advanced accessibility tools, fonts, and themes.";
include 'src/header.php';
?>

<main id="main-content" class="page-content-wrapper" style="padding-top: 3rem; padding-bottom: 3rem;">

    <header class="settings-header">
        <h1
            class="page-title">
            <i class="fas fa-sliders-h text-primary mr-3"></i> Accessibility & Preferences
        </h1>
        <p class="page-subtitle">
            Customize Hesten's Learning to match your unique needs. Your preferences are saved automatically.
        </p>
    </header>

    <div class="settings-layout">

        <!-- SETTINGS SIDEBAR (Navigation) -->
        <aside class="settings-sidebar" style="animation-delay: 0.1s;">
            <nav
                class="settings-nav-panel">
                <ul class="space-y-3">
                    <li>
                        <a href="#visuals"
                            class="flex items-center p-3 rounded-xl hover:bg-primary/10 text-text-default font-bold transition-all hover:translate-x-1 group">
                            <div
                                class="w-10 h-10 rounded-lg bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-300 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-eye"></i>
                            </div>
                            Visuals & Themes
                        </a>
                    </li>
                    <li>
                        <a href="#academic"
                            class="flex items-center p-3 rounded-xl hover:bg-primary/10 text-text-default font-bold transition-all hover:translate-x-1 group">
                            <div
                                class="w-10 h-10 rounded-lg bg-emerald-100 dark:bg-emerald-900 text-emerald-600 dark:text-emerald-300 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            Curriculum & Path
                        </a>
                    </li>
                    <li>
                        <a href="#typography"
                            class="flex items-center p-3 rounded-xl hover:bg-primary/10 text-text-default font-bold transition-all hover:translate-x-1 group">
                            <div
                                class="w-10 h-10 rounded-lg bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-300 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-font"></i>
                            </div>
                            Typography
                        </a>
                    </li>
                    <li>
                        <a href="#tools"
                            class="flex items-center p-3 rounded-xl hover:bg-primary/10 text-text-default font-bold transition-all hover:translate-x-1 group">
                            <div
                                class="w-10 h-10 rounded-lg bg-teal-100 dark:bg-teal-900 text-teal-600 dark:text-teal-300 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-toolbox"></i>
                            </div>
                            Cognitive Tools
                        </a>
                    </li>
                    <li>
                        <a href="#data"
                            class="flex items-center p-3 rounded-xl hover:bg-primary/10 text-text-default font-bold transition-all hover:translate-x-1 group">
                            <div
                                class="w-10 h-10 rounded-lg bg-rose-100 dark:bg-rose-900 text-rose-600 dark:text-rose-300 flex items-center justify-center mr-3 group-hover:scale-110 transition-transform">
                                <i class="fas fa-save"></i>
                            </div>
                            Data & Reset
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- MAIN SETTINGS AREA -->
        <div class="settings-main-area">

            <!-- SECTION: VISUALS -->
            <section id="visuals"
                class="settings-section"
                style="animation-delay: 0.2s;">
                <h2
                    class="settings-section-title">
                    Visuals & Themes
                </h2>

                <div class="mb-8">
                    <label class="settings-label">Color
                        Theme</label>
                    <div class="settings-grid-3">
                        <button onclick="updateGlobalSetting('theme', 'light')"
                            class="group relative p-4 rounded-2xl border-2 border-gray-200 hover:border-primary transition-all text-center bg-gray-50 text-gray-900 shadow-sm hover:shadow-md">
                            <i class="fas fa-sun text-3xl mb-3 text-yellow-500 block"></i>
                            <span class="font-bold">Light</span>
                            <div
                                class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform rounded-b-2xl">
                            </div>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'dark')"
                            class="group relative p-4 rounded-2xl border-2 border-slate-700 hover:border-primary transition-all text-center bg-slate-900 text-white shadow-sm hover:shadow-md">
                            <i class="fas fa-moon text-3xl mb-3 text-indigo-400 block"></i>
                            <span class="font-bold">Dark</span>
                            <div
                                class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-hover:scale-x-100 transition-transform rounded-b-2xl">
                            </div>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'midnight')"
                            class="group relative p-4 rounded-2xl border-2 border-blue-900 hover:border-blue-400 transition-all text-center bg-[#011627] text-[#D6DEEB] shadow-sm hover:shadow-md">
                            <i class="fas fa-star text-3xl mb-3 text-blue-300 block"></i>
                            <span class="font-bold">Midnight</span>
                            <div
                                class="absolute inset-x-0 bottom-0 h-1 bg-blue-400 scale-x-0 group-hover:scale-x-100 transition-transform rounded-b-2xl">
                            </div>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'sepia')"
                            class="group relative p-4 rounded-2xl border-2 border-amber-200 hover:border-amber-600 transition-all text-center bg-[#F4ECD8] text-[#433422] shadow-sm hover:shadow-md">
                            <i class="fas fa-coffee text-3xl mb-3 text-amber-700 block"></i>
                            <span class="font-bold">Sepia</span>
                            <div
                                class="absolute inset-x-0 bottom-0 h-1 bg-amber-600 scale-x-0 group-hover:scale-x-100 transition-transform rounded-b-2xl">
                            </div>
                        </button>

                        <button onclick="updateGlobalSetting('theme', 'high-contrast')"
                            class="group relative p-4 rounded-2xl border-2 border-black hover:border-yellow-400 transition-all text-center bg-black text-yellow-300 shadow-sm hover:shadow-md">
                            <i class="fas fa-adjust text-3xl mb-3 block"></i>
                            <span class="font-bold">Contrast</span>
                            <div
                                class="absolute inset-x-0 bottom-0 h-1 bg-yellow-400 scale-x-0 group-hover:scale-x-100 transition-transform rounded-b-2xl">
                            </div>
                        </button>
                    </div>
                </div>

                <div class="mb-6 bg-base-bg p-6 rounded-2xl">
                    <label for="saturation-slider"
                        class="flex justify-between text-sm font-bold text-text-default mb-4">
                        <span>Color Saturation</span>
                        <span id="page-saturation-display"
                            class="bg-primary text-white px-2 py-0.5 rounded text-xs">100%</span>
                    </label>
                    <input type="range" id="saturation-slider" min="0" max="200" step="10"
                        class="w-full h-3 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-primary hover:accent-secondary transition-all"
                        oninput="updateGlobalSetting('saturation', this.value); document.getElementById('page-saturation-display').innerText = this.value + '%'">
                    <div class="flex justify-between text-xs text-text-secondary mt-2 font-medium">
                        <span>Grayscale (0%)</span>
                        <span>Normal</span>
                        <span>Vivid (200%)</span>
                    </div>
                </div>
            </section>

            <!-- SECTION: ACADEMIC & CURRICULUM -->
            <section id="academic"
                class="settings-section"
                style="animation-delay: 0.25s;">
                <h2
                    class="settings-section-title">
                    <i class="fas fa-graduation-cap text-primary mr-3"></i> Curriculum & Path
                </h2>

                <div class="mb-8">
                    <label class="settings-label">Active Curriculum</label>
                    <div class="settings-grid-3">
                        <button onclick="updateGlobalSetting('curriculum', 'engageny')" id="curriculum-engageny-btn"
                            class="group relative p-5 rounded-2xl border-2 border-gray-200 dark:border-slate-800 hover:border-primary transition-all text-left bg-content-bg shadow-sm hover:shadow-md">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 dark:bg-indigo-950 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                                    <i class="fas fa-calculator text-sm"></i>
                                </div>
                                <span class="font-black text-sm">EngageNY / CC</span>
                            </div>
                            <p class="text-xs text-text-secondary">Standard Common Core learning path focused on number structures and models.</p>
                            <div class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-aria-selected:scale-x-100 transition-transform rounded-b-2xl"></div>
                        </button>

                        <button onclick="updateGlobalSetting('curriculum', 'teks')" id="curriculum-teks-btn"
                            class="group relative p-5 rounded-2xl border-2 border-gray-200 dark:border-slate-800 hover:border-primary transition-all text-left bg-content-bg shadow-sm hover:shadow-md">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 rounded-full bg-rose-100 dark:bg-rose-950 text-rose-600 dark:text-rose-400 flex items-center justify-center">
                                    <i class="fas fa-star text-sm"></i>
                                </div>
                                <span class="font-black text-sm">Texas TEKS</span>
                            </div>
                            <p class="text-xs text-text-secondary">Texas Essential Knowledge and Skills (TEKS) alignment and progression.</p>
                            <div class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-aria-selected:scale-x-100 transition-transform rounded-b-2xl"></div>
                        </button>

                        <button onclick="updateGlobalSetting('curriculum', 'custom')" id="curriculum-custom-btn"
                            class="group relative p-5 rounded-2xl border-2 border-gray-200 dark:border-slate-800 hover:border-primary transition-all text-left bg-content-bg shadow-sm hover:shadow-md">
                            <div class="flex items-center gap-3 mb-3">
                                <div class="w-8 h-8 rounded-full bg-emerald-100 dark:bg-emerald-950 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                                    <i class="fas fa-gamepad text-sm"></i>
                                </div>
                                <span class="font-black text-sm">Hesten's Custom</span>
                            </div>
                            <p class="text-xs text-text-secondary">A highly interactive, game-first path designed specifically for learning accessibility.</p>
                            <div class="absolute inset-x-0 bottom-0 h-1 bg-primary scale-x-0 group-aria-selected:scale-x-100 transition-transform rounded-b-2xl"></div>
                        </button>
                    </div>
                </div>
            </section>

            <!-- SECTION: TYPOGRAPHY -->
            <section id="typography"
                class="settings-section"
                style="animation-delay: 0.3s;">
                <h2
                    class="settings-section-title">
                    Typography
                </h2>

                <div class="mb-8">
                    <label
                        class="settings-label">Typeface</label>
                    <div class="settings-grid-2">
                        <button onclick="updateGlobalSetting('fontFamily', 'Outfit')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Outfit</span>
                            <span class="text-xs text-text-secondary">Modern, clean, and friendly.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Inter')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg"
                            style="font-family: 'Inter', sans-serif">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Inter</span>
                            <span class="text-xs text-text-secondary">Standard geometric sans-serif.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Lexend')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg"
                            style="font-family: 'Lexend', sans-serif">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Lexend</span>
                            <span class="text-xs text-text-secondary">Proven to improve reading speed.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Open Dyslexic')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg"
                            style="font-family: 'Open Dyslexic', sans-serif">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Open Dyslexic</span>
                            <span class="text-xs text-text-secondary">Weighted bottoms for dyslexia.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Comic Neue')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg"
                            style="font-family: 'Comic Neue', cursive">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Comic Neue</span>
                            <span class="text-xs text-text-secondary">Playful and easy to read.</span>
                        </button>
                        <button onclick="updateGlobalSetting('fontFamily', 'Roboto Mono')"
                            class="p-4 border border-gray-200 dark:border-gray-700 rounded-xl text-left hover:bg-base-bg hover:border-primary transition-all group shadow-sm bg-content-bg"
                            style="font-family: 'Roboto Mono', monospace">
                            <span class="font-bold block text-lg mb-1 group-hover:text-primary">Monospace</span>
                            <span class="text-xs text-text-secondary">Good for coding and differentiation.</span>
                        </button>
                    </div>
                </div>

                <div class="settings-grid-2-gap">
                    <div class="settings-slider-panel">
                        <label class="block text-sm font-bold text-text-default mb-3">Text Size</label>
                        <input type="range" id="page-size-slider" min="0.8" max="2.0" step="0.1"
                            class="w-full accent-primary h-2 bg-gray-300 rounded-lg appearance-none cursor-pointer"
                            oninput="updateGlobalSetting('fontSize', this.value)">
                    </div>
                    <div class="settings-slider-panel">
                        <label class="block text-sm font-bold text-text-default mb-3">Line Height</label>
                        <input type="range" id="page-line-slider" min="1.0" max="2.5" step="0.1"
                            class="w-full accent-primary h-2 bg-gray-300 rounded-lg appearance-none cursor-pointer"
                            oninput="updateGlobalSetting('lineHeight', this.value)">
                    </div>
                    <div class="settings-slider-panel">
                        <label class="block text-sm font-bold text-text-default mb-3">Letter Spacing</label>
                        <input type="range" id="page-letter-slider" min="0" max="0.3" step="0.01"
                            class="w-full accent-primary h-2 bg-gray-300 rounded-lg appearance-none cursor-pointer"
                            oninput="updateGlobalSetting('letterSpacing', this.value)">
                    </div>
                    <div class="settings-slider-panel">
                        <label class="block text-sm font-bold text-text-default mb-3">Word Spacing</label>
                        <input type="range" id="page-word-slider" min="0" max="0.5" step="0.05"
                            class="w-full accent-primary h-2 bg-gray-300 rounded-lg appearance-none cursor-pointer"
                            oninput="updateGlobalSetting('wordSpacing', this.value)">
                    </div>
                </div>
            </section>

            <!-- SECTION: TOOLS -->
            <section id="tools"
                class="settings-section"
                style="animation-delay: 0.4s;">
                <h2
                    class="settings-section-title">
                    Cognitive Tools
                </h2>

                <div class="space-y-4">
                    <!-- Component: Toggle Card -->
                    <div
                        class="settings-toggle-card">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900/30 text-blue-600 flex items-center justify-center text-xl">
                                <i class="fas fa-align-justify"></i>
                            </div>
                            <div>
                                <span class="font-bold text-text-default block text-lg">Reading Guide</span>
                                <span class="text-sm text-text-secondary">A focus bar that follows your mouse.</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="page-mask-toggle" class="sr-only peer"
                                onchange="updateGlobalSetting('readingMask', this.checked)">
                            <div
                                class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Large Cursor -->
                    <div
                        class="settings-toggle-card">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900/30 text-purple-600 flex items-center justify-center text-xl">
                                <i class="fas fa-mouse-pointer"></i>
                            </div>
                            <div>
                                <span class="font-bold text-text-default block text-lg">Extra Large Cursor</span>
                                <span class="text-sm text-text-secondary">Easier to track on screen.</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="page-cursor-toggle" class="sr-only peer"
                                onchange="updateGlobalSetting('cursorSize', this.checked ? 'large' : 'normal')">
                            <div
                                class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Hide Images -->
                    <div
                        class="settings-toggle-card">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-rose-100 dark:bg-rose-900/30 text-rose-600 flex items-center justify-center text-xl">
                                <i class="fas fa-image"></i>
                            </div>
                            <div>
                                <span class="font-bold text-text-default block text-lg">Hide Images</span>
                                <span class="text-sm text-text-secondary">Remove visual distractions.</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="page-images-toggle" class="sr-only peer"
                                onchange="updateGlobalSetting('hideImages', this.checked)">
                            <div
                                class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>
                    
                    <!-- Highlight Links -->
                    <div
                        class="settings-toggle-card">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-yellow-100 dark:bg-yellow-900/30 text-yellow-600 flex items-center justify-center text-xl">
                                <i class="fas fa-link"></i>
                            </div>
                            <div>
                                <span class="font-bold text-text-default block text-lg">Highlight Links</span>
                                <span class="text-sm text-text-secondary">Make links easier to spot.</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="page-links-toggle" class="sr-only peer"
                                onchange="updateGlobalSetting('highlightLinks', this.checked)">
                            <div
                                class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Highlight Headings -->
                    <div
                        class="settings-toggle-card">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-orange-100 dark:bg-orange-900/30 text-orange-600 flex items-center justify-center text-xl">
                                <i class="fas fa-heading"></i>
                            </div>
                            <div>
                                <span class="font-bold text-text-default block text-lg">Highlight Headings</span>
                                <span class="text-sm text-text-secondary">Emphasize structure.</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="page-headings-toggle" class="sr-only peer"
                                onchange="updateGlobalSetting('highlightHeadings', this.checked)">
                            <div
                                class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Text to Speech -->
                    <div
                        class="settings-toggle-card">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-green-100 dark:bg-green-900/30 text-green-600 flex items-center justify-center text-xl">
                                <i class="fas fa-volume-up"></i>
                            </div>
                            <div>
                                <span class="font-bold text-text-default block text-lg">Text to Speech</span>
                                <span class="text-sm text-text-secondary">Select text to read aloud.</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="page-tts-toggle" class="sr-only peer"
                                onchange="updateGlobalSetting('textToSpeech', this.checked)">
                            <div
                                class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>

                    <!-- Show Permalinks -->
                    <div
                        class="settings-toggle-card">
                        <div class="flex items-center gap-4">
                            <div
                                class="w-12 h-12 rounded-full bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 flex items-center justify-center text-xl">
                                <i class="fas fa-link"></i>
                            </div>
                            <div>
                                <span class="font-bold text-text-default block text-lg">Show Permalinks</span>
                                <span class="text-sm text-text-secondary">Show links next to headings.</span>
                            </div>
                        </div>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" id="page-permalinks-toggle" class="sr-only peer"
                                onchange="updateGlobalSetting('showPermalinks', this.checked)">
                            <div
                                class="w-14 h-8 bg-gray-300 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/30 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[4px] after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>
                </div>
            </section>

            <!-- SECTION: DATA -->
            <section id="data"
                class="settings-section"
                style="animation-delay: 0.5s;">
                <h2
                    class="settings-section-title">
                    Data & Reset
                </h2>
                <div class="mb-8 flex flex-col sm:flex-row gap-4">
                    <button onclick="localStorage.removeItem('hl_accessibility_settings'); window.location.reload();"
                        class="flex-1 bg-red-100 hover:bg-red-200 text-red-700 font-bold py-4 px-6 rounded-2xl transition-colors border border-red-200 shadow-sm hover:shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-undo"></i> Reset to Defaults
                    </button>
                    <!-- Simulated Export feature -->
                    <button onclick="exportSettings()"
                        class="flex-1 bg-base-bg hover:bg-gray-200 text-text-default font-bold py-4 px-6 rounded-2xl transition-colors border border-gray-300 dark:border-gray-600 shadow-sm hover:shadow-md flex items-center justify-center gap-2">
                        <i class="fas fa-download"></i> Export Settings
                    </button>
                </div>

                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h3 class="text-xl font-bold text-text-default mb-3 flex items-center">
                        <i class="fab fa-google-drive text-[#1FA463] mr-3"></i> Google Drive Cloud Sync
                    </h3>
                    <p class="text-text-secondary mb-4 text-sm font-medium">
                        Take full control of your data. Connect your Google account to securely backup and sync all your 
                        site data directly to your own personal Google Drive, keeping it completely private from our servers.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button id="gdrive-save-btn" onclick="saveToGoogleDrive()" disabled
                            class="flex-1 bg-green-50 hover:bg-green-100 text-green-700 dark:bg-green-900/20 dark:text-green-400 font-bold py-4 px-6 rounded-2xl transition-colors border border-green-200 dark:border-green-800 shadow-sm hover:shadow-md flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-cloud-upload-alt"></i> Backup to Drive
                        </button>
                        <button id="gdrive-load-btn" onclick="loadFromGoogleDrive()" disabled
                            class="flex-1 bg-blue-50 hover:bg-blue-100 text-blue-700 dark:bg-blue-900/20 dark:text-blue-400 font-bold py-4 px-6 rounded-2xl transition-colors border border-blue-200 dark:border-blue-800 shadow-sm hover:shadow-md flex items-center justify-center gap-2 disabled:opacity-50 disabled:cursor-not-allowed">
                            <i class="fas fa-cloud-download-alt"></i> Restore from Drive
                        </button>
                    </div>
                </div>
            </section>

        </div>

        <!-- LIVE PREVIEW SIDEBAR (Desktop) -->
        <aside class="settings-preview-sidebar" style="animation-delay: 0.6s;">
            <div class="sticky top-24">
                <div class="bg-content-bg p-8 rounded-3xl shadow-2xl border border-primary/20 relative overflow-hidden">
                    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-primary to-accent"></div>
                    <h3
                        class="text-xs font-bold text-primary uppercase tracking-widest mb-6 border-b border-gray-100 pb-2">
                        Live Preview</h3>
                    <div class="space-y-6">
                        <h4 class="text-3xl font-bold text-text-default leading-tight">Alligators and crocodiles are
                            distinct.</h4>
                        <p class="text-text-secondary leading-relaxed">
                            This text demonstrates your current typography settings. Notice how the spacing, font
                            weight, and size change to help you read better.
                        </p>
                        <div class="p-4 bg-primary/5 rounded-xl border border-primary/10">
                            <a href="#" class="text-primary hover:underline font-bold flex items-center gap-2"><i
                                    class="fas fa-link"></i> Sample Link</a>
                        </div>
                    </div>
                </div>
                <div class="mt-6 text-center text-text-secondary text-sm">
                    <i class="fas fa-check-circle text-green-500 mr-1"></i> Changes saved automatically
                </div>
            </div>
        </aside>
    </div>

</main>

<!-- Google API Scripts -->
<script async defer src="https://apis.google.com/js/api.js" onload="gapiLoaded()"></script>
<script async defer src="https://accounts.google.com/gsi/client" onload="gisLoaded()"></script>

<script>
    // --- GOOGLE DRIVE SYNC LOGIC ---
    // IMPORTANT: Replace 'YOUR_GOOGLE_CLIENT_ID_HERE' with your actual Google Cloud Project Client ID for this to work natively!
    const CLIENT_ID = '988211241767-n13gda92d0t48la0ibou2jl5cir723nc.apps.googleusercontent.com'; 
    const DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/drive/v3/rest"];
    const SCOPES = 'https://www.googleapis.com/auth/drive.file'; // drive.file scope so users can actually see the file in their Drive

    let tokenClient;
    let gapiInited = false;
    let gisInited = false;

    function gapiLoaded() {
        gapi.load('client', initializeGapiClient);
    }

    async function initializeGapiClient() {
        await gapi.client.init({
            discoveryDocs: DISCOVERY_DOCS,
        });
        gapiInited = true;
        maybeEnableButtons();
    }

    function gisLoaded() {
        tokenClient = google.accounts.oauth2.initTokenClient({
            client_id: CLIENT_ID,
            scope: SCOPES,
            callback: '', // defined at request time
        });
        gisInited = true;
        maybeEnableButtons();
    }

    function maybeEnableButtons() {
        if (gapiInited && gisInited) {
            document.getElementById('gdrive-save-btn').disabled = false;
            document.getElementById('gdrive-load-btn').disabled = false;
        }
    }

    function getAllSiteData() {
        let data = {};
        for (let i = 0; i < localStorage.length; i++) {
            let key = localStorage.key(i);
            data[key] = localStorage.getItem(key);
        }
        return JSON.stringify(data);
    }

    function restoreSiteData(jsonString) {
        try {
            let data = typeof jsonString === 'string' ? JSON.parse(jsonString) : jsonString;
            for (let key in data) {
                localStorage.setItem(key, data[key]);
            }
            alert('Data restored successfully from Google Drive! The page will now reload.');
            window.location.reload();
        } catch (e) {
            alert('Error parsing site data from Drive.');
            console.error(e);
        }
    }

    async function saveToGoogleDrive() {
        if (CLIENT_ID === 'YOUR_GOOGLE_CLIENT_ID_HERE') {
            alert('Setup Required: Please edit settings.php and replace YOUR_GOOGLE_CLIENT_ID_HERE with a valid Google Client ID from the Google Cloud Console.');
            return;
        }
        
        tokenClient.callback = async (resp) => {
            if (resp.error !== undefined) {
                console.error(resp);
                return;
            }
            try {
                // Show loading state
                const saveBtn = document.getElementById('gdrive-save-btn');
                const originalText = saveBtn.innerHTML;
                saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
                saveBtn.disabled = true;

                let fileContent = getAllSiteData();
                const accessToken = gapi.client.getToken().access_token;

                // 1. Check if file already exists in user's drive
                const response = await gapi.client.drive.files.list({
                    fields: 'files(id, name)',
                    pageSize: 10,
                    q: "name='hestens_learning_data.json' and trashed=false"
                });
                const files = response.result.files;
                
                let fileId;

                if (files && files.length > 0) {
                    fileId = files[0].id;
                } else {
                    // 2. Create the file metadata first
                    const metaResponse = await fetch('https://www.googleapis.com/drive/v3/files', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer ' + accessToken,
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            name: 'hestens_learning_data.json'
                        })
                    });
                    const metaData = await metaResponse.json();
                    fileId = metaData.id;
                }

                // 3. Upload the content to the fileId
                await fetch('https://www.googleapis.com/upload/drive/v3/files/' + fileId + '?uploadType=media', {
                    method: 'PATCH',
                    headers: {
                        'Authorization': 'Bearer ' + accessToken,
                        'Content-Type': 'application/json'
                    },
                    body: fileContent
                });
                
                saveBtn.innerHTML = originalText;
                saveBtn.disabled = false;
                alert('Site data backed up to your Google Drive seamlessly! You should see hestens_learning_data.json in your Drive.');
            } catch (err) {
                alert('Error saving to Google Drive: ' + err.message);
                console.error(err);
                const saveBtn = document.getElementById('gdrive-save-btn');
                saveBtn.innerHTML = '<i class="fas fa-cloud-upload-alt"></i> Backup to Drive';
                saveBtn.disabled = false;
            }
        };

        if (gapi.client.getToken() === null) {
            tokenClient.requestAccessToken({prompt: 'consent'});
        } else {
            tokenClient.requestAccessToken({prompt: ''});
        }
    }

    async function loadFromGoogleDrive() {
        if (CLIENT_ID === 'YOUR_GOOGLE_CLIENT_ID_HERE') {
            alert('Setup Required: Please edit settings.php and replace YOUR_GOOGLE_CLIENT_ID_HERE with a valid Google Client ID from the Google Cloud Console.');
            return;
        }

        tokenClient.callback = async (resp) => {
            if (resp.error !== undefined) {
                console.error(resp);
                return;
            }
            try {
                // Show loading state
                const loadBtn = document.getElementById('gdrive-load-btn');
                const originalText = loadBtn.innerHTML;
                loadBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';
                loadBtn.disabled = true;

                const response = await gapi.client.drive.files.list({
                    fields: 'files(id, name)',
                    pageSize: 10,
                    q: "name='hestens_learning_data.json' and trashed=false"
                });
                const files = response.result.files;
                
                if (files && files.length > 0) {
                    const fileResponse = await gapi.client.drive.files.get({
                        fileId: files[0].id,
                        alt: 'media'
                    });
                    restoreSiteData(fileResponse.body);
                } else {
                    alert('No saved data found in your Google Drive. Try backing it up first!');
                }
                loadBtn.innerHTML = originalText;
                loadBtn.disabled = false;
            } catch (err) {
                alert('Error loading from Google Drive: ' + err.message);
                console.error(err);
                const loadBtn = document.getElementById('gdrive-load-btn');
                loadBtn.innerHTML = '<i class="fas fa-cloud-download-alt"></i> Restore from Drive';
                loadBtn.disabled = false;
            }
        };

        if (gapi.client.getToken() === null) {
            tokenClient.requestAccessToken({prompt: 'consent'});
        } else {
            tokenClient.requestAccessToken({prompt: ''});
        }
    }

    // --- SETTINGS PAGE SYNC LOGIC ---

    function syncPageUI(s) {
        if (!s) s = loadSettings(); // Default to global load if not provided

        // Sliders
        if (document.getElementById('saturation-slider')) {
            document.getElementById('saturation-slider').value = s.saturation || 100;
            document.getElementById('page-saturation-display').innerText = (s.saturation || 100) + '%';
        }
        if (document.getElementById('page-size-slider')) document.getElementById('page-size-slider').value = s.fontSize;
        if (document.getElementById('page-line-slider')) document.getElementById('page-line-slider').value = s.lineHeight;
        if (document.getElementById('page-letter-slider')) document.getElementById('page-letter-slider').value = s.letterSpacing || 0;
        if (document.getElementById('page-word-slider')) document.getElementById('page-word-slider').value = s.wordSpacing || 0;

        // Toggles
        if (document.getElementById('page-mask-toggle')) document.getElementById('page-mask-toggle').checked = !!s.readingMask;
        if (document.getElementById('page-cursor-toggle')) document.getElementById('page-cursor-toggle').checked = (s.cursorSize === 'large');
        if (document.getElementById('page-images-toggle')) document.getElementById('page-images-toggle').checked = !!s.hideImages;
        if (document.getElementById('page-links-toggle')) document.getElementById('page-links-toggle').checked = !!s.highlightLinks;
        if (document.getElementById('page-headings-toggle')) document.getElementById('page-headings-toggle').checked = !!s.highlightHeadings;
        if (document.getElementById('page-tts-toggle')) document.getElementById('page-tts-toggle').checked = !!s.textToSpeech;
        if (document.getElementById('page-permalinks-toggle')) document.getElementById('page-permalinks-toggle').checked = !!s.showPermalinks;

        // Curriculum Selection UI Sync
        const activeCurriculum = s.curriculum || 'engageny';
        ['engageny', 'teks', 'custom'].forEach(c => {
            const btn = document.getElementById(`curriculum-${c}-btn`);
            if (btn) {
                if (c === activeCurriculum) {
                    btn.classList.add('border-primary', 'ring-2', 'ring-primary/20', 'shadow-md');
                    btn.classList.remove('border-gray-200', 'dark:border-slate-800');
                    btn.setAttribute('aria-selected', 'true');
                } else {
                    btn.classList.remove('border-primary', 'ring-2', 'ring-primary/20', 'shadow-md');
                    btn.classList.add('border-gray-200', 'dark:border-slate-800');
                    btn.setAttribute('aria-selected', 'false');
                }
            }
        });
    }

    function exportSettings() {
        const dataStr = "data:text/json;charset=utf-8," + encodeURIComponent(JSON.stringify(loadSettings()));
        const downloadAnchorNode = document.createElement('a');
        downloadAnchorNode.setAttribute("href", dataStr);
        downloadAnchorNode.setAttribute("download", "hesten-settings.json");
        document.body.appendChild(downloadAnchorNode);
        downloadAnchorNode.click();
        downloadAnchorNode.remove();
        alert('Settings downloaded as hesten-settings.json');
    }

    // Initialize UI on Load
    document.addEventListener('DOMContentLoaded', () => {
        syncPageUI();

        // Listen for internal updates (from header a11y panel)
        window.addEventListener('settings-changed', (e) => {
            syncPageUI(e.detail);
        });
    });
</script>

<?php include 'src/footer.php'; ?>
