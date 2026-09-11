<div class="fixed-tools-wrapper print-hidden">
    <!-- Scroll To Top (Outside FAB) -->
    <button id="scroll-to-top" class="scroll-top-btn" type="button" title="Scroll to top of page" aria-label="Scroll to top of page">
        <i class="fas fa-arrow-up" aria-hidden="true"></i>
    </button>

    <!-- Floating Action Button Container -->
    <div id="fab-container" class="fab-container">
        <!-- Collapsible Tools Menu -->
        <div id="fab-menu" class="fab-menu" role="menu" aria-label="Learning tools menu">
            <button onclick="window.print()" class="fab-item-btn fab-print" title="Print Page" aria-label="Print Page" type="button"><i class="fas fa-print" aria-hidden="true"></i></button>
            <button id="citation-toggle" class="fab-item-btn fab-citation" title="Citation" aria-label="Citation Tool" type="button"><i class="fas fa-quote-right" aria-hidden="true"></i></button>
            <button id="timer-toggle" class="fab-item-btn fab-timer" title="Timer" aria-label="Study Timer" type="button"><i class="fas fa-stopwatch" aria-hidden="true"></i></button>
            <button id="scratchpad-toggle" class="fab-item-btn fab-scratchpad" title="Scratchpad (Alt+S)" aria-label="Scratchpad (Alt+S)" type="button"><i class="fas fa-pen" aria-hidden="true"></i></button>
            <button id="flashcard-toggle" onclick="window.toggleFlashcardStudio ? window.toggleFlashcardStudio() : null" class="fab-item-btn fab-flashcards" title="Flashcard Studio (Alt+F)" aria-label="Flashcard Studio (Alt+F)" type="button"><i class="fas fa-layer-group" aria-hidden="true"></i></button>
            <button id="acc-studio-toggle" onclick="window.toggleAccommodationsStudio ? window.toggleAccommodationsStudio() : null" class="fab-item-btn fab-accommodations" title="IEP Accommodations & Focus (Alt+O)" aria-label="IEP Accommodations & Focus (Alt+O)" type="button"><i class="fas fa-glasses" aria-hidden="true"></i></button>
            <button id="a11y-toggle-button" class="fab-item-btn fab-a11y" title="Accessibility (Alt+A)" aria-label="Accessibility Settings (Alt+A)" type="button"><i class="fas fa-universal-access" aria-hidden="true"></i></button>
        </div>

        <!-- Main FAB Toggle -->
        <button id="fab-main-toggle" class="fab-main-btn" type="button" title="Learning Tools" aria-label="Open learning tools menu" aria-expanded="false" aria-haspopup="true">
            <i class="fas fa-plus fab-main-icon" id="fab-icon" aria-hidden="true"></i>
        </button>
    </div>
</div>
