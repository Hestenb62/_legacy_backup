    <!-- Redesigned Search bar -->
    <div class="path-header-wrapper">
        <div class="path-title-group">
            <h2 class="path-title" id="section-title">Academic Path</h2>
            <div class="path-counter-wrapper">
                <span class="path-counter-line"></span>
                <span class="path-counter-text" id="results-count">Analyzing levels...</span>
            </div>
        </div>

        <!-- Segmented Control -->
        <div class="path-tabs hidden md-flex" role="tablist" aria-label="Filter learning paths">
            <button type="button" role="tab" aria-selected="true"
                class="path-tab active"
                onclick="setCategory(this, 'all', true)">
                <i class="fas fa-layer-group tab-icon-indigo"></i> All
            </button>
            <button type="button" role="tab" aria-selected="false"
                class="path-tab"
                onclick="setCategory(this, 'elem', true)">
                <i class="fas fa-child tab-icon-teal"></i> Elementary
            </button>
            <button type="button" role="tab" aria-selected="false"
                class="path-tab"
                onclick="setCategory(this, 'middle', true)">
                <i class="fas fa-user-graduate tab-icon-amber"></i> Middle
            </button>
            <button type="button" role="tab" aria-selected="false"
                class="path-tab"
                onclick="setCategory(this, 'high', true)">
                <i class="fas fa-brain tab-icon-rose"></i> High
            </button>
            <button type="button" role="tab" aria-selected="false"
                class="path-tab"
                onclick="setCategory(this, 'extra', true)">
                <i class="fas fa-plus-circle tab-icon-purple"></i> Extra
            </button>
        </div>

        <!-- Mobile Select -->
        <div class="path-mobile-select-wrapper md-hidden">
            <select aria-label="Select Category" class="path-mobile-select"
                onchange="const tabs = document.querySelectorAll('.path-tab'); setCategory(tabs[0], this.value, true); Array.from(tabs).forEach((t, i) => t.setAttribute('aria-selected', i===this.selectedIndex));">
                <option value="all">All Paths</option>
                <option value="elem">Elementary</option>
                <option value="middle">Middle School</option>
                <option value="high">High School</option>
                <option value="extra">Extra Resources</option>
            </select>
            <i class="fas fa-chevron-down select-chevron"></i>
        </div>

        <div class="path-search-group group">
            <input type="text" id="level-search" aria-label="Search levels" placeholder="Search grades, topics..."
                class="path-search-input">
            <i class="fas fa-search search-icon group-focus-within-primary"></i>
            <button id="clear-search" onclick="resetFilters()" class="path-search-clear hidden" aria-label="Clear Search" type="button">
                <i class="fas fa-times-circle"></i>
            </button>
        </div>
    </div>