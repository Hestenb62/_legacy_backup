<!-- Book Modal (Refined as Knowledge Portal) -->
<div id="bookModal"
    class="fixed inset-0 z-[100] hidden opacity-0 transition-all duration-500 flex items-center justify-center p-4 sm:p-6 sm:pb-12 pointer-events-none"
    role="dialog" aria-modal="true" aria-labelledby="modal-title">
    
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-gray-900/40 dark:bg-black/60 backdrop-blur-sm transition-opacity cursor-pointer pointer-events-auto" onclick="closeModal()"></div>

    <!-- Modal Content -->
    <div class="bg-white dark:bg-[#0a0a0a] rounded-3xl relative w-full max-w-4xl max-h-[90vh] overflow-y-auto transform scale-95 opacity-0 transition-all duration-500 book-modal-content pointer-events-auto flex flex-col border border-gray-200 dark:border-white/10 shadow-2xl custom-modal-scrollbar"
        onclick="event.stopPropagation()">

        <!-- Close Button Top -->
        <button onclick="closeModal()" id="book-modal-close"
            class="absolute top-6 right-6 z-50 w-10 h-10 md:w-12 md:h-12 rounded-xl bg-gray-100 dark:bg-white/5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white hover:bg-gray-200 dark:hover:bg-white/10 flex items-center justify-center transition-all focus:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500 shadow-sm backdrop-blur-md">
            <i class="fas fa-times text-lg"></i>
        </button>

        <div class="flex flex-col md:flex-row h-full">
            <!-- Book Cover Side -->
            <div class="w-full md:w-5/12 relative h-72 md:h-auto shrink-0 bg-gray-100 dark:bg-gray-900 flex items-center justify-center p-8 md:p-12 border-b md:border-b-0 md:border-r border-gray-200 dark:border-white/5">
                <!-- Subtle background glow -->
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/5 via-transparent to-transparent pointer-events-none blur-2xl"></div>
                <img id="modal-img" src="" alt="Book Cover" class="w-full max-h-full object-contain rounded-xl shadow-2xl relative z-10 transition-transform hover:scale-105 duration-500">
            </div>

            <!-- Details Side -->
            <div class="w-full md:w-7/12 p-8 md:p-10 flex flex-col relative z-20 bg-gray-50/50 dark:bg-transparent">
                <!-- Titles -->
                <div class="mb-8">
                    <div class="flex items-center gap-2 mb-3">
                         <span class="w-8 h-1 bg-indigo-500 rounded-full opacity-70"></span>
                         <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">Library Access</span>
                    </div>
                    <h2 id="modal-title" class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white font-outfit mb-2 leading-tight tracking-tight"></h2>
                    <p id="modal-author" class="text-xl text-indigo-600 dark:text-indigo-400 font-bold"></p>
                </div>

                <!-- Specs Grid -->
                <div class="grid grid-cols-2 gap-4 mb-8 p-6 bg-white dark:bg-white/5 rounded-2xl border border-gray-200 dark:border-white/10 shadow-sm dark:shadow-none relative overflow-hidden group">
                    <div class="absolute -right-6 -top-6 w-24 h-24 bg-indigo-500/5 rounded-full blur-xl group-hover:bg-indigo-500/10 transition-colors pointer-events-none"></div>
                    <div>
                        <span class="block text-[10px] uppercase tracking-widest opacity-50 mb-1 font-bold text-gray-500 dark:text-gray-400">Published</span>
                        <span id="modal-date" class="text-gray-900 dark:text-gray-200 font-mono text-sm font-semibold"></span>
                    </div>
                    <div>
                        <span class="block text-[10px] uppercase tracking-widest opacity-50 mb-1 font-bold text-gray-500 dark:text-gray-400">ISBN</span>
                        <span id="modal-isbn" class="text-gray-900 dark:text-gray-200 font-mono text-sm font-semibold break-all"></span>
                    </div>
                    <div id="modal-lexile-container" class="col-span-1 pt-4 mt-2 border-t border-gray-100 dark:border-white/5 hidden">
                        <span class="block text-[10px] uppercase tracking-widest opacity-50 mb-1 font-bold text-gray-500 dark:text-gray-400">Lexile / Reading Level</span>
                        <span id="modal-lexile" class="text-emerald-600 dark:text-emerald-400 font-black text-lg"></span>
                    </div>
                    <div id="modal-dewey-container" class="col-span-1 pt-4 mt-2 border-t border-gray-100 dark:border-white/5 hidden">
                        <span class="block text-[10px] uppercase tracking-widest opacity-50 mb-1 font-bold text-gray-500 dark:text-gray-400">Dewey Decimal</span>
                        <span id="modal-dewey" class="text-purple-600 dark:text-purple-400 font-black text-lg"></span>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <p id="modal-description" class="text-base md:text-lg text-gray-600 dark:text-gray-300 leading-relaxed font-medium"></p>
                </div>

                <!-- Action Buttons Area -->
                <div class="mt-auto pt-6 border-t border-gray-200 dark:border-white/10 flex flex-col gap-5">
                    
                    <!-- Single Book Actions -->
                    <div id="modal-single-actions" class="flex flex-col sm:flex-row gap-4">
                        <a id="modal-read-online-link" href="#" target="_blank" rel="noopener noreferrer"
                            class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-500 hover:from-indigo-600 hover:to-purple-600 text-white py-3.5 px-6 rounded-xl font-bold text-center shadow-lg shadow-indigo-500/25 transition-all transform hover:-translate-y-0.5 active:scale-95 flex items-center justify-center gap-3 text-sm focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-indigo-500">
                            <i class="fas fa-book-open"></i> <span>Read Online</span>
                        </a>

                        <div class="flex gap-2 justify-center sm:justify-start">
                             <a id="modal-pdf-link" href="#" target="_blank" rel="noopener noreferrer"
                                class="bg-gray-100 dark:bg-white/5 hover:bg-rose-50 dark:hover:bg-rose-500/10 text-gray-700 dark:text-gray-300 hover:text-rose-600 dark:hover:text-rose-400 p-3.5 rounded-xl border border-gray-200 dark:border-white/10 transition-colors tooltip-btn focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-rose-500 shadow-sm"
                                title="Download PDF" aria-label="Download PDF">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <a id="modal-epub-link" href="#" target="_blank" rel="noopener noreferrer"
                                class="bg-gray-100 dark:bg-white/5 hover:bg-blue-50 dark:hover:bg-blue-500/10 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 p-3.5 rounded-xl border border-gray-200 dark:border-white/10 transition-colors tooltip-btn focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-blue-500 shadow-sm"
                                title="Download ePUB" aria-label="Download ePUB">
                                <i class="fas fa-book"></i>
                            </a>
                            <a id="modal-mobi-link" href="#" target="_blank" rel="noopener noreferrer"
                                class="bg-gray-100 dark:bg-white/5 hover:bg-amber-50 dark:hover:bg-amber-500/10 text-gray-700 dark:text-gray-300 hover:text-amber-600 dark:hover:text-amber-400 p-3.5 rounded-xl border border-gray-200 dark:border-white/10 transition-colors tooltip-btn focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 shadow-sm"
                                title="Download MOBI" aria-label="Download MOBI">
                                <i class="fas fa-tablet-alt"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Collection List Container -->
                    <div id="modal-collection-actions" class="hidden flex-col gap-3 max-h-[300px] overflow-y-auto pr-2 custom-modal-scrollbar">
                        <!-- Dynamically populated in JS -->
                    </div>

                    <!-- Disclaimer Button -->
                    <div class="flex">
                        <button onclick="openDisclaimerModal()"
                            class="text-[11px] font-bold uppercase tracking-widest text-gray-400 hover:text-amber-500 transition-colors flex items-center gap-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-amber-500 rounded p-1">
                            <i class="fas fa-exclamation-circle text-amber-500/80"></i> Content Disclaimer
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Disclaimer Modal -->
<div id="disclaimerModal"
    class="fixed inset-0 z-[110] flex items-center justify-center p-4 hidden opacity-0 transition-opacity duration-300 pointer-events-none"
    role="alertdialog" aria-modal="true" onclick="closeDisclaimerModal()">
    <div class="absolute inset-0 bg-gray-900/60 dark:bg-black/70 backdrop-blur-sm pointer-events-auto"></div>
    <div class="bg-white dark:bg-[#0a0a0a] border border-gray-200 dark:border-white/10 rounded-3xl shadow-2xl w-full max-w-md p-8 m-4 relative pointer-events-auto z-10 transform scale-95 transition-transform duration-300 disclaimer-modal-content"
        onclick="event.stopPropagation()">

        <button onclick="closeDisclaimerModal()" id="disclaimer-modal-close"
            class="absolute top-5 right-5 z-10 w-10 h-10 rounded-xl bg-gray-100 dark:bg-white/5 text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-white/10 hover:text-gray-900 dark:hover:text-white transition-colors flex items-center justify-center border border-transparent shadow-sm">
            <i class="fas fa-times"></i>
        </button>

        <div class="text-center mb-6 mt-2">
            <div class="w-20 h-20 bg-amber-50 dark:bg-amber-500/10 rounded-full flex items-center justify-center mx-auto mb-4 border border-amber-100 dark:border-amber-500/30">
                 <i class="fas fa-exclamation-triangle text-3xl text-amber-500"></i>
            </div>
            <h3 class="text-3xl font-black font-outfit text-gray-900 dark:text-white tracking-tight">Disclaimer</h3>
        </div>
        <div class="bg-gray-50 dark:bg-white/5 p-6 rounded-2xl border border-gray-100 dark:border-white/5 mb-8">
            <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed font-medium">
                 The books and materials in this digital library are provided for educational and informational purposes
                 only. Hesten's Learning makes no claims of ownership over third-party content. Please ensure your use of
                 these materials complies with applicable copyright laws before downloading.
            </p>
        </div>
        <div class="flex justify-center">
            <button onclick="closeDisclaimerModal()"
                class="bg-gray-900 dark:bg-white text-white dark:text-gray-900 py-3.5 px-8 rounded-xl font-bold shadow-lg hover:-translate-y-1 transition-all active:scale-95 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-gray-400">
                I Understand
            </button>
        </div>
    </div>
</div>
