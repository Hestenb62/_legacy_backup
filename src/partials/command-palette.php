<?php
/**
 * Global Command Palette & Keyboard Launcher Partial
 * Invoked via Ctrl+K, Cmd+K, or the '?' key.
 * 100% Vanilla HTML/CSS/JS with zero external dependencies.
 */
?>
<div id="cmd-palette-overlay" class="cmd-palette-overlay" style="display: none;" role="dialog" aria-modal="true" aria-label="Command Palette">
    <div class="cmd-palette-backdrop" id="cmd-palette-backdrop"></div>
    <div class="cmd-palette-dialog">
        <div class="cmd-palette-header">
            <i class="fas fa-search cmd-search-icon" aria-hidden="true"></i>
            <input type="text" id="cmd-search-input" class="cmd-search-input" placeholder="Type a destination, action, or command..." autocomplete="off" spellcheck="false" aria-label="Command Palette Search">
            <button type="button" class="cmd-kbd-esc" id="cmd-close-btn" aria-label="Close command palette">ESC</button>
        </div>

        <div class="cmd-filter-tabs" role="tablist" aria-label="Command categories">
            <button type="button" class="cmd-tab-btn active" data-category="all" role="tab" aria-selected="true">All</button>
            <button type="button" class="cmd-tab-btn" data-category="nav" role="tab" aria-selected="false">Destinations</button>
            <button type="button" class="cmd-tab-btn" data-category="actions" role="tab" aria-selected="false">Actions</button>
            <button type="button" class="cmd-tab-btn" data-category="a11y" role="tab" aria-selected="false">Accessibility</button>
        </div>

        <div class="cmd-palette-body" id="cmd-palette-results" role="listbox" aria-label="Search results">
            <!-- Dynamically populated by assets/js/command-palette.js -->
        </div>

        <div class="cmd-palette-footer">
            <div class="cmd-footer-hints">
                <span><kbd>↑</kbd><kbd>↓</kbd> Navigate</span>
                <span><kbd>↵</kbd> Select</span>
                <span><kbd>ESC</kbd> Close</span>
            </div>
            <div class="cmd-footer-brand">
                <i class="fas fa-sparkles"></i> Hesten's Learning
            </div>
        </div>
    </div>
</div>
