/**
 * assets/js/pages/guides-reader.js
 * Interactive Client Controller for Educational Guides Hub & Deep Reader
 * Includes: Client-side catalog search/filtering, reading progress tracking,
 * Scrollspy Table of Contents, Text-to-Speech (TTS) narration with paragraph tracking,
 * and persistent typography accessibility controls.
 */

(function () {
    'use strict';

    // =========================================================================
    // 1. CATALOG SEARCH & CATEGORY FILTERING (Catalog Hub View)
    // =========================================================================
    const searchInput = document.getElementById('guides-search-input');
    const searchClearBtn = document.getElementById('guides-search-clear');
    const filterPills = document.querySelectorAll('.guides-filter-pill');
    const guideCards = document.querySelectorAll('.guide-card');
    const noResultsEl = document.getElementById('guides-no-results');
    const countBadge = document.getElementById('guides-count-badge');

    let activeCategory = 'all';

    function filterCatalog() {
        if (!guideCards.length) return;

        const query = (searchInput ? searchInput.value : '').trim().toLowerCase();
        let visibleCount = 0;

        guideCards.forEach(card => {
            const title = (card.dataset.title || '').toLowerCase();
            const summary = (card.dataset.summary || '').toLowerCase();
            const tags = (card.dataset.tags || '').toLowerCase();
            const category = (card.dataset.category || '').toLowerCase();

            const matchesCategory = (activeCategory === 'all') || (category === activeCategory.toLowerCase());
            const matchesQuery = !query || title.includes(query) || summary.includes(query) || tags.includes(query);

            if (matchesCategory && matchesQuery) {
                card.style.display = 'flex';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (countBadge) {
            countBadge.textContent = visibleCount;
        }

        if (noResultsEl) {
            noResultsEl.style.display = visibleCount === 0 ? 'block' : 'none';
        }

        if (searchClearBtn && searchInput) {
            searchClearBtn.style.display = searchInput.value ? 'inline-flex' : 'none';
        }
    }

    if (searchInput) {
        searchInput.addEventListener('input', filterCatalog);
    }

    if (searchClearBtn && searchInput) {
        searchClearBtn.addEventListener('click', function () {
            searchInput.value = '';
            searchInput.focus();
            filterCatalog();
        });
    }

    filterPills.forEach(pill => {
        pill.addEventListener('click', function () {
            filterPills.forEach(p => p.classList.remove('active'));
            this.classList.add('active');
            activeCategory = this.dataset.category || 'all';
            filterCatalog();
        });
    });

    // =========================================================================
    // 2. READING PROGRESS BAR (Reader View)
    // =========================================================================
    const progressFill = document.getElementById('guide-read-progress');
    const articleWrap = document.querySelector('.guide-article-wrap');

    function updateReadingProgress() {
        if (!progressFill || !articleWrap) return;

        const rect = articleWrap.getBoundingClientRect();
        const articleHeight = rect.height;
        const windowHeight = window.innerHeight;
        const articleTop = rect.top;

        if (articleTop > 0) {
            progressFill.style.width = '0%';
            return;
        }

        const scrolledPast = Math.abs(articleTop);
        const scrollable = articleHeight - windowHeight;
        if (scrollable <= 0) {
            progressFill.style.width = '100%';
            return;
        }

        const percentage = Math.min(100, Math.max(0, (scrolledPast / scrollable) * 100));
        progressFill.style.width = `${percentage}%`;
    }

    if (progressFill && articleWrap) {
        window.addEventListener('scroll', updateReadingProgress, { passive: true });
        window.addEventListener('resize', updateReadingProgress, { passive: true });
    }

    // =========================================================================
    // 3. TABLE OF CONTENTS SCROLLSPY
    // =========================================================================
    const tocLinks = document.querySelectorAll('.guide-toc-link');
    const headings = document.querySelectorAll('.guide-prose h2, .guide-prose h3');

    if (headings.length > 0 && tocLinks.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    if (!id) return;

                    tocLinks.forEach(link => {
                        const href = link.getAttribute('href');
                        if (href === `#${id}`) {
                            link.classList.add('active');
                            link.setAttribute('aria-current', 'true');
                        } else {
                            link.classList.remove('active');
                            link.removeAttribute('aria-current');
                        }
                    });
                }
            });
        }, {
            rootMargin: '-80px 0px -60% 0px',
            threshold: 0
        });

        headings.forEach(heading => observer.observe(heading));
    }

    // =========================================================================
    // 4. TEXT-TO-SPEECH (TTS) NARRATION ENGINE
    // =========================================================================
    const btnPlayTTS = document.getElementById('guide-btn-tts-play');
    const btnStopTTS = document.getElementById('guide-btn-tts-stop');
    const speedSelect = document.getElementById('guide-tts-speed');

    let speechSynth = window.speechSynthesis;
    let ttsQueue = [];
    let currentParagraphIndex = -1;
    let isSpeaking = false;
    let isPaused = false;
    let currentUtterance = null;

    function buildTTSQueue() {
        const proseElements = document.querySelectorAll('.guide-prose p, .guide-prose h2, .guide-prose h3, .guide-prose li');
        const queue = [];

        proseElements.forEach((el, index) => {
            // Clean out HTML tags and extra spaces
            const text = (el.innerText || '').trim();
            if (text.length > 1) {
                queue.push({
                    element: el,
                    text: text
                });
            }
        });

        return queue;
    }

    function clearTTSHighlight() {
        document.querySelectorAll('.tts-speaking').forEach(el => {
            el.classList.remove('tts-speaking');
        });
    }

    function playNextTTSChunk() {
        if (!isSpeaking || isPaused) return;

        currentParagraphIndex++;
        if (currentParagraphIndex >= ttsQueue.length) {
            stopTTS();
            return;
        }

        clearTTSHighlight();

        const item = ttsQueue[currentParagraphIndex];
        item.element.classList.add('tts-speaking');

        // Scroll into view if out of viewport
        const rect = item.element.getBoundingClientRect();
        if (rect.top < 80 || rect.bottom > window.innerHeight) {
            item.element.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        const utterance = new SpeechSynthesisUtterance(item.text);
        utterance.rate = parseFloat(speedSelect ? speedSelect.value : '1.0') || 1.0;
        utterance.lang = 'en-US';

        utterance.onend = function () {
            if (isSpeaking && !isPaused) {
                playNextTTSChunk();
            }
        };

        utterance.onerror = function (e) {
            console.warn('[TTS Error]', e);
            if (isSpeaking && !isPaused) {
                playNextTTSChunk();
            }
        };

        currentUtterance = utterance;
        speechSynth.speak(utterance);
    }

    function startTTS() {
        if (!speechSynth) {
            alert('Text-to-speech is not supported in this browser.');
            return;
        }

        if (isPaused) {
            isPaused = false;
            isSpeaking = true;
            speechSynth.resume();
            updateTTSUI();
            return;
        }

        if (ttsQueue.length === 0) {
            ttsQueue = buildTTSQueue();
        }

        isSpeaking = true;
        isPaused = false;
        currentParagraphIndex = -1;
        updateTTSUI();
        playNextTTSChunk();
    }

    function pauseTTS() {
        if (!speechSynth || !isSpeaking) return;
        speechSynth.pause();
        isPaused = true;
        updateTTSUI();
    }

    function stopTTS() {
        if (!speechSynth) return;
        speechSynth.cancel();
        isSpeaking = false;
        isPaused = false;
        currentParagraphIndex = -1;
        clearTTSHighlight();
        updateTTSUI();
    }

    function updateTTSUI() {
        if (!btnPlayTTS) return;

        if (isSpeaking && !isPaused) {
            btnPlayTTS.innerHTML = '<i class="fas fa-pause" aria-hidden="true"></i> <span>Pause</span>';
            btnPlayTTS.classList.add('active');
            if (btnStopTTS) btnStopTTS.style.display = 'inline-flex';
        } else if (isSpeaking && isPaused) {
            btnPlayTTS.innerHTML = '<i class="fas fa-play" aria-hidden="true"></i> <span>Resume</span>';
            btnPlayTTS.classList.add('active');
            if (btnStopTTS) btnStopTTS.style.display = 'inline-flex';
        } else {
            btnPlayTTS.innerHTML = '<i class="fas fa-volume-up" aria-hidden="true"></i> <span>Listen</span>';
            btnPlayTTS.classList.remove('active');
            if (btnStopTTS) btnStopTTS.style.display = 'none';
        }
    }

    if (btnPlayTTS) {
        btnPlayTTS.addEventListener('click', function () {
            if (isSpeaking && !isPaused) {
                pauseTTS();
            } else {
                startTTS();
            }
        });
    }

    if (btnStopTTS) {
        btnStopTTS.addEventListener('click', stopTTS);
    }

    if (speedSelect) {
        speedSelect.addEventListener('change', function () {
            if (isSpeaking && !isPaused) {
                // Restart current chunk with new rate
                speechSynth.cancel();
                currentParagraphIndex = Math.max(-1, currentParagraphIndex - 1);
                playNextTTSChunk();
            }
        });
    }

    // Stop speaking when user navigates away
    window.addEventListener('beforeunload', function () {
        if (speechSynth) speechSynth.cancel();
    });

    // =========================================================================
    // 5. TYPOGRAPHY & ACCESSIBILITY CONTROLS
    // =========================================================================
    const proseContainer = document.querySelector('.guide-prose');
    const btnSizeDown = document.getElementById('guide-btn-size-down');
    const btnSizeUp = document.getElementById('guide-btn-size-up');
    const btnDyslexia = document.getElementById('guide-btn-dyslexia');
    const btnLineHeight = document.getElementById('guide-btn-line-height');
    const btnPrint = document.getElementById('guide-btn-print');
    const btnShare = document.getElementById('guide-btn-share');

    const FONT_SIZES = ['text-size-sm', 'text-size-md', 'text-size-lg', 'text-size-xl'];
    let currentSizeIndex = 1; // default 'text-size-md'

    function loadSavedTypography() {
        if (!proseContainer) return;

        try {
            const saved = JSON.parse(localStorage.getItem('hl_guide_reader_settings') || '{}');

            if (typeof saved.sizeIndex === 'number' && saved.sizeIndex >= 0 && saved.sizeIndex < FONT_SIZES.length) {
                currentSizeIndex = saved.sizeIndex;
                applyFontSize();
            }

            if (saved.dyslexic && btnDyslexia) {
                proseContainer.classList.add('font-opendyslexic');
                btnDyslexia.classList.add('active');
            }

            if (saved.relaxedLine && btnLineHeight) {
                proseContainer.classList.add('line-height-relaxed');
                btnLineHeight.classList.add('active');
            }
        } catch (e) {
            console.warn('Error loading typography settings', e);
        }
    }

    function saveTypography() {
        try {
            const settings = {
                sizeIndex: currentSizeIndex,
                dyslexic: proseContainer ? proseContainer.classList.contains('font-opendyslexic') : false,
                relaxedLine: proseContainer ? proseContainer.classList.contains('line-height-relaxed') : false
            };
            localStorage.setItem('hl_guide_reader_settings', JSON.stringify(settings));
        } catch (e) {
            // ignore localStorage quota errors
        }
    }

    function applyFontSize() {
        if (!proseContainer) return;
        FONT_SIZES.forEach(cls => proseContainer.classList.remove(cls));
        proseContainer.classList.add(FONT_SIZES[currentSizeIndex]);
        saveTypography();
    }

    if (btnSizeDown) {
        btnSizeDown.addEventListener('click', function () {
            if (currentSizeIndex > 0) {
                currentSizeIndex--;
                applyFontSize();
            }
        });
    }

    if (btnSizeUp) {
        btnSizeUp.addEventListener('click', function () {
            if (currentSizeIndex < FONT_SIZES.length - 1) {
                currentSizeIndex++;
                applyFontSize();
            }
        });
    }

    if (btnDyslexia) {
        btnDyslexia.addEventListener('click', function () {
            if (!proseContainer) return;
            const isNowDyslexic = proseContainer.classList.toggle('font-opendyslexic');
            this.classList.toggle('active', isNowDyslexic);
            saveTypography();
        });
    }

    if (btnLineHeight) {
        btnLineHeight.addEventListener('click', function () {
            if (!proseContainer) return;
            const isNowRelaxed = proseContainer.classList.toggle('line-height-relaxed');
            this.classList.toggle('active', isNowRelaxed);
            saveTypography();
        });
    }

    if (btnPrint) {
        btnPrint.addEventListener('click', function () {
            window.print();
        });
    }

    if (btnShare) {
        btnShare.addEventListener('click', function () {
            const shareUrl = window.location.href;
            if (navigator.clipboard) {
                navigator.clipboard.writeText(shareUrl).then(() => {
                    const originalHtml = btnShare.innerHTML;
                    btnShare.innerHTML = '<i class="fas fa-check" aria-hidden="true"></i> <span>Copied!</span>';
                    setTimeout(() => {
                        btnShare.innerHTML = originalHtml;
                    }, 2000);
                }).catch(() => {
                    prompt('Copy this link:', shareUrl);
                });
            } else {
                prompt('Copy this link:', shareUrl);
            }
        });
    }

    // Initialize typography
    loadSavedTypography();

})();
