/**
 * assets/js/reader/read-timeline.js
 * Historical Timeline Interactive, Collapsible & Accessibility Enhancements
 * Provides automatic semantic enhancement and collapsible management across all book chapters.
 */
(function () {
    'use strict';

    function initCollapsibleDetails() {
        const detailsElements = document.querySelectorAll('details.content-timeline');
        
        detailsElements.forEach(function (details) {
            const toggleText = details.querySelector('.timeline-collapse-toggle .toggle-text');
            const items = details.querySelectorAll('.timeline-item');
            const itemCount = items.length;
            const countLabel = itemCount > 0 ? ` (${itemCount} Milestones)` : '';

            function updateToggleLabel() {
                if (!toggleText) return;
                if (details.open) {
                    toggleText.textContent = 'Collapse Timeline';
                } else {
                    toggleText.textContent = `Expand Timeline${countLabel}`;
                }
            }

            // Restore user preference if saved
            try {
                const userPref = localStorage.getItem('hl_reader_timeline_collapsed');
                if (userPref === 'true') {
                    details.open = false;
                }
            } catch (e) {}

            updateToggleLabel();

            details.addEventListener('toggle', function () {
                updateToggleLabel();
                try {
                    localStorage.setItem('hl_reader_timeline_collapsed', details.open ? 'false' : 'true');
                } catch (e) {}

                if (window.announceA11y) {
                    window.announceA11y(details.open ? 'Timeline expanded' : 'Timeline collapsed');
                }
            });
        });
    }

    function enhanceTimelines() {
        // Find raw timeline containers that do not yet have a structured list
        const rawTimelines = document.querySelectorAll('.content-timeline:not(:has(.timeline-list)):not(details)');
        rawTimelines.forEach(function (tl) {
            if (tl.querySelector('.timeline-list')) return;

            const children = Array.from(tl.children);
            if (children.length === 0) return;

            const firstH3 = tl.querySelector(':scope > h3');
            const titleText = (firstH3 && firstH3.textContent.trim().toLowerCase() === 'timeline')
                ? 'Historical Timeline'
                : (firstH3 ? firstH3.textContent.trim() : 'Timeline');

            const list = document.createElement('ol');
            list.className = 'timeline-list';

            let currentItem = null;
            let currentBody = null;
            let itemCount = 0;

            children.forEach(function (child) {
                if (child.tagName === 'H3') {
                    if (child.textContent.trim().toLowerCase() === 'timeline') {
                        return;
                    }
                    itemCount++;
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
                const details = document.createElement('details');
                details.className = 'content-timeline timeline-collapsible';
                details.open = true;
                details.setAttribute('role', 'region');
                details.setAttribute('aria-label', 'Historical Timeline');

                const summary = document.createElement('summary');
                summary.className = 'timeline-summary';

                const headerContent = document.createElement('div');
                headerContent.className = 'timeline-header-content';

                const kicker = document.createElement('span');
                kicker.className = 'timeline-kicker';
                kicker.innerHTML = '<i class="fas fa-history" aria-hidden="true"></i> Historical Chronology';
                headerContent.appendChild(kicker);

                const title = document.createElement('h3');
                title.className = 'timeline-title';
                title.textContent = titleText;
                headerContent.appendChild(title);

                const subtitle = document.createElement('p');
                subtitle.className = 'timeline-subtitle';
                subtitle.textContent = 'Chronological events and historical turning points';
                headerContent.appendChild(subtitle);

                const toggle = document.createElement('div');
                toggle.className = 'timeline-collapse-toggle';
                toggle.setAttribute('aria-hidden', 'true');
                toggle.innerHTML = `<span class="toggle-text">Collapse Timeline</span><i class="fas fa-chevron-up toggle-icon" aria-hidden="true"></i>`;

                summary.appendChild(headerContent);
                summary.appendChild(toggle);
                details.appendChild(summary);

                const contentWrap = document.createElement('div');
                contentWrap.className = 'timeline-collapsible-content';
                contentWrap.appendChild(list);
                details.appendChild(contentWrap);

                tl.parentNode.replaceChild(details, tl);
            }
        });

        initCollapsibleDetails();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', enhanceTimelines);
    } else {
        enhanceTimelines();
    }
})();
