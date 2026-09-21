/**
 * assets/js/reader/read-timeline.js
 * Historical Timeline Interactive & Accessibility Enhancements
 * Provides automatic semantic enhancement for timeline markup across all book chapters.
 */
(function () {
    'use strict';

    function enhanceTimelines() {
        // Find raw timeline containers that do not yet have a structured list
        const rawTimelines = document.querySelectorAll('.content-timeline:not(:has(.timeline-list))');
        rawTimelines.forEach(function (tl) {
            if (tl.querySelector('.timeline-list')) return;

            tl.setAttribute('role', 'region');
            tl.setAttribute('aria-label', 'Historical Timeline');

            const children = Array.from(tl.children);
            if (children.length === 0) return;

            const header = document.createElement('div');
            header.className = 'timeline-header';

            const kicker = document.createElement('span');
            kicker.className = 'timeline-kicker';
            kicker.innerHTML = '<i class="fas fa-history" aria-hidden="true"></i> Historical Chronology';
            header.appendChild(kicker);

            const firstH3 = tl.querySelector(':scope > h3');
            const titleText = (firstH3 && firstH3.textContent.trim().toLowerCase() === 'timeline')
                ? 'Historical Timeline'
                : (firstH3 ? firstH3.textContent.trim() : 'Timeline');

            const title = document.createElement('h3');
            title.className = 'timeline-title';
            title.textContent = titleText;
            header.appendChild(title);

            const subtitle = document.createElement('p');
            subtitle.className = 'timeline-subtitle';
            subtitle.textContent = 'Chronological events and historical turning points';
            header.appendChild(subtitle);

            const list = document.createElement('ol');
            list.className = 'timeline-list';

            let currentItem = null;
            let currentBody = null;

            children.forEach(function (child) {
                if (child.tagName === 'H3') {
                    if (child.textContent.trim().toLowerCase() === 'timeline') {
                        return;
                    }
                    currentItem = document.createElement('li');
                    currentItem.className = 'timeline-item';

                    const marker = document.createElement('div');
                    marker.className = 'timeline-marker';
                    marker.setAttribute('aria-hidden', 'true');
                    currentItem.appendChild(marker);

                    const card = document.createElement('div');
                    card.className = 'timeline-card';

                    const dateWrap = document.createElement('div');
                    dateWrap.className = 'timeline-date-wrap';

                    const timeEl = document.createElement('time');
                    timeEl.className = 'timeline-date';
                    timeEl.textContent = child.textContent.trim();
                    dateWrap.appendChild(timeEl);
                    card.appendChild(dateWrap);

                    currentBody = document.createElement('div');
                    currentBody.className = 'timeline-body';
                    card.appendChild(currentBody);

                    currentItem.appendChild(card);
                    list.appendChild(currentItem);
                } else if (child.tagName === 'P' && currentBody) {
                    currentBody.appendChild(child.cloneNode(true));
                }
            });

            if (list.children.length > 0) {
                tl.innerHTML = '';
                tl.appendChild(header);
                tl.appendChild(list);
            }
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', enhanceTimelines);
    } else {
        enhanceTimelines();
    }
})();
