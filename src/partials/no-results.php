    <!-- Empty State -->
    <div id="no-results" class="no-results-state hidden">
        <div class="no-results-icon-wrapper">
            <svg class="no-results-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 21L16.65 16.65M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11 8V11L13 13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" opacity="0.5"/>
            </svg>
            <div class="no-results-pulse"></div>
        </div>
        <h3 class="no-results-title">No paths discovered</h3>
        <p class="no-results-desc">We couldn't find anything matching your search criteria. Try adjusting your filters.</p>
        <button onclick="resetFilters()" class="no-results-btn">
            Clear Search
        </button>
    </div>
