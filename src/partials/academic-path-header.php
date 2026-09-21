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
        <div class="path-tabs" role="tablist" aria-label="Filter learning paths">
            <button type="button" role="tab" aria-selected="true" tabindex="0"
                class="path-tab active" id="tab-all"
                onclick="setCategory(this, 'all', true)">
                <i class="fas fa-layer-group tab-icon-indigo" aria-hidden="true"></i> All
            </button>
            <button type="button" role="tab" aria-selected="false" tabindex="-1"
                class="path-tab" id="tab-elem"
                onclick="setCategory(this, 'elem', true)">
                <i class="fas fa-child tab-icon-teal" aria-hidden="true"></i> Elementary
            </button>
            <button type="button" role="tab" aria-selected="false" tabindex="-1"
                class="path-tab" id="tab-middle"
                onclick="setCategory(this, 'middle', true)">
                <i class="fas fa-user-graduate tab-icon-amber" aria-hidden="true"></i> Middle
            </button>
            <button type="button" role="tab" aria-selected="false" tabindex="-1"
                class="path-tab" id="tab-high"
                onclick="setCategory(this, 'high', true)">
                <i class="fas fa-brain tab-icon-rose" aria-hidden="true"></i> High
            </button>
            <button type="button" role="tab" aria-selected="false" tabindex="-1"
                class="path-tab" id="tab-extra"
                onclick="setCategory(this, 'extra', true)">
                <i class="fas fa-plus-circle tab-icon-purple" aria-hidden="true"></i> Extra
            </button>
            <button type="button" role="tab" aria-selected="false" tabindex="-1"
                class="path-tab" id="tab-bookmarked"
                onclick="setCategory(this, 'bookmarked', true)">
                <i class="fas fa-star" style="color: #eab308;" aria-hidden="true"></i> Saved
            </button>
            <button type="button" role="tab" aria-selected="false" tabindex="-1"
                class="path-tab" id="tab-in-progress"
                onclick="setCategory(this, 'in-progress', true)">
                <i class="fas fa-tasks" style="color: #06b6d4;" aria-hidden="true"></i> In Progress
            </button>
        </div>

        <!-- Mobile Select -->
        <div class="path-mobile-select-wrapper">
            <select aria-label="Select Category" id="path-mobile-select" class="path-mobile-select"
                onchange="const tab = document.getElementById('tab-' + this.value); setCategory(tab, this.value, true);">
                <option value="all">All Paths</option>
                <option value="elem">Elementary</option>
                <option value="middle">Middle School</option>
                <option value="high">High School</option>
                <option value="extra">Extra Resources</option>
                <option value="bookmarked">Saved / Bookmarked</option>
                <option value="in-progress">In Progress</option>
            </select>
            <i class="fas fa-chevron-down select-chevron" aria-hidden="true"></i>
        </div>

        <div class="path-search-group">
            <input type="text" id="level-search" aria-label="Search levels" placeholder="Search grades, topics..."
                class="path-search-input">
            <i class="fas fa-search search-icon"></i>
            <button id="clear-search" onclick="resetFilters()" class="path-search-clear hidden" aria-label="Clear Search" type="button">
                <i class="fas fa-times-circle"></i>
            </button>
        </div>
    </div>