/**
 * assets/js/reader/read-scroll-markers.js
 * Continuous scroll mode engine with inline page markers.
 */
document.addEventListener("DOMContentLoaded", () => {
    const bookContent = document.getElementById("book-content");
    if (!bookContent) return;

    const WORDS_PER_PAGE = 250;
    let wordTally = 0;
    let currentPage = 1;

    // Traverse the content to inject markers
    // We only want to inject markers BETWEEN block-level elements (paragraphs, blockquotes, etc)
    const blockElements = Array.from(bookContent.children);
    
    // We start at page 1 implicitly, so we don't need a marker at the very top.
    
    blockElements.forEach(element => {
        // Count words in this block
        const text = element.innerText || element.textContent || '';
        const words = text.trim().split(/\s+/).filter(w => w.length > 0).length;
        
        wordTally += words;

        // If this element pushed us over the word threshold for a page, inject a marker BEFORE it.
        if (wordTally >= WORDS_PER_PAGE) {
            currentPage++;
            wordTally = 0; // Reset tally for the next page

            const marker = document.createElement("div");
            marker.className = "inline-page-marker";
            marker.dataset.page = currentPage;
            marker.innerHTML = `
                <hr class="marker-line">
                <span class="marker-pill">Page ${currentPage}</span>
                <hr class="marker-line">
            `;
            
            // Insert the marker before the current element
            bookContent.insertBefore(marker, element);
        }
    });

    window.TOTAL_READER_PAGES = currentPage;
    window.CURRENT_READER_PAGE = 1; // Default to 1

    // Setup IntersectionObserver to update CURRENT_READER_PAGE as user scrolls
    const markers = document.querySelectorAll(".inline-page-marker");
    if (markers.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            // We want to know the highest page number that is currently above or crossing the viewport
            // Actually, a simpler way is: find the last marker whose bounding client rect top is < window.innerHeight / 2
            // IntersectionObserver is good, but tracking the "active" page might be easier with a scroll listener.
        }, { threshold: 0 });
        
        // Use scroll event for more precise "current page" tracking
        window.addEventListener("scroll", () => {
            let activePage = 1;
            const thresholdY = window.innerHeight / 3; // Top third of screen

            markers.forEach(marker => {
                const rect = marker.getBoundingClientRect();
                if (rect.top <= thresholdY) {
                    activePage = parseInt(marker.dataset.page, 10);
                }
            });
            
            window.CURRENT_READER_PAGE = activePage;
        }, { passive: true });
    }
});
