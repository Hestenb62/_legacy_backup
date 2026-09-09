<div class="fixed-tools-wrapper print-hidden">
    <!-- Scroll To Top (Outside FAB) -->
    <button id="scroll-to-top" class="scroll-top-btn" type="button">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Floating Action Button Container -->
    <div id="fab-container" class="fab-container">
        <!-- Collapsible Tools Menu -->
        <div id="fab-menu" class="fab-menu">
            <button onclick="window.openCommandPalette()" class="fab-item-btn fab-command" title="Command Palette (Ctrl+K)" type="button"><i class="fas fa-terminal"></i></button>
            <button onclick="window.print()" class="fab-item-btn fab-print" title="Print Page" type="button"><i class="fas fa-print"></i></button>
            <button id="citation-toggle" class="fab-item-btn fab-citation" title="Citation" type="button"><i class="fas fa-quote-right"></i></button>
            <button id="timer-toggle" class="fab-item-btn fab-timer" title="Timer" type="button"><i class="fas fa-stopwatch"></i></button>
            <button id="scratchpad-toggle" class="fab-item-btn fab-scratchpad" title="Scratchpad" type="button"><i class="fas fa-pen"></i></button>
            <button id="a11y-toggle-button" class="fab-item-btn fab-a11y" title="Accessibility" type="button"><i class="fas fa-universal-access"></i></button>
            <button onclick="window.toggleShortcutsModal ? window.toggleShortcutsModal() : null" class="fab-item-btn fab-shortcuts" title="Keyboard Shortcuts (?)" type="button"><i class="fas fa-keyboard"></i></button>
        </div>

        <!-- Main FAB Toggle -->
        <button id="fab-main-toggle" class="fab-main-btn" type="button" title="Tools">
            <i class="fas fa-plus fab-main-icon" id="fab-icon"></i>
        </button>
    </div>
</div>
