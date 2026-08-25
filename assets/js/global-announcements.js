// announcements.js - Logic for the global announcement bar

document.addEventListener('DOMContentLoaded', () => {
    const annBar = document.getElementById('announcement-bar');
    const annContent = document.getElementById('announcement-content');
    const annClose = document.getElementById('close-announcement');
    const annPrev = document.getElementById('prev-announcement');
    const annNext = document.getElementById('next-announcement');
    const annInfo = document.getElementById('info-announcement');
    
    // Change this version string to force the announcement to show again for all users
    const ANN_VERSION = 'v1.4'; 
    
    const announcements = [
        {
            html: '<i class="fas fa-hammer mr-2 text-yellow-300"></i> <span class="font-black">PROUDLY UPDATING:</span> We are modernizing our curriculum levels daily. Stay tuned!',
            title: 'Curriculum Modernization',
            icon: 'fas fa-hammer text-yellow-400',
            file: '/assets/text/updating.md'
        },
        {
            html: '<i class="fas fa-font mr-2 text-cyan-300"></i> <span class="font-black">ACCESSIBILITY:</span> OpenDyslexic font support is being worked on. Toggle it in the accessibility panel.',
            title: 'Accessibility & Inclusion',
            icon: 'fas fa-font text-cyan-400',
            file: '/assets/text/accessibility.md'
        },
        {
            html: '<i class="fas fa-star mr-2 text-pink-300"></i> <span class="font-black">NEW FEATURE:</span> You can now track your progress and see your module mastery in real-time!',
            title: 'Real-time Progress Tracking',
            icon: 'fas fa-star text-pink-400',
            file: '/assets/text/progress.md'
        }
    ];
    
    let currentAnnIndex = 0;
    let autoPlayInterval = null;
    let progressInterval = null;
    const AUTO_PLAY_DELAY = 6000; // 6 seconds for better reading
    const PROGRESS_STEP = 50; // Update every 50ms for smoothness
    
    const progressBar = document.getElementById('announcement-progress');

    // Modal Elements
    const annModal = document.getElementById('announcement-modal');
    const modalTitle = document.getElementById('announcement-modal-title');
    const modalBody = document.getElementById('announcement-modal-body');
    const modalIcon = document.getElementById('announcement-modal-icon');
    const modalClose = document.getElementById('close-announcement-modal');
    const modalCloseBtn = document.getElementById('close-announcement-modal-btn');
    const modalBackdrop = document.getElementById('announcement-modal-backdrop');

    let isModalOpen = false;

    // Simple Markdown to HTML Parser
    function parseMarkdown(text) {
        if (!text) return '';
        
        let clean = text
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;');
            
        clean = clean.replace(/^## (.*$)/gim, '<h2>$1</h2>');
        clean = clean.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        
        let lines = clean.split('\n');
        let inList = false;
        let resultLines = [];
        
        lines.forEach(line => {
            let trimmed = line.trim();
            if (trimmed.startsWith('- ')) {
                if (!inList) {
                    inList = true;
                    resultLines.push('<ul>');
                }
                resultLines.push(`<li>${trimmed.substring(2)}</li>`);
            } else {
                if (inList) {
                    inList = false;
                    resultLines.push('</ul>');
                }
                if (trimmed) {
                    if (trimmed.startsWith('<h2')) {
                        resultLines.push(trimmed);
                    } else {
                        resultLines.push(`<p>${trimmed}</p>`);
                    }
                }
            }
        });
        if (inList) {
            resultLines.push('</ul>');
        }
        
        return resultLines.join('\n');
    }

    function openModal() {
        if (!annModal) return;
        stopAutoPlay();
        isModalOpen = true;
        
        const currentItem = announcements[currentAnnIndex];
        if (modalTitle) modalTitle.textContent = currentItem.title;
        
        if (modalIcon) {
            modalIcon.className = currentItem.icon;
        }
        
        if (modalBody) {
            modalBody.innerHTML = '<p style="text-align:center; opacity:0.6;"><i class="fas fa-spinner fa-spin mr-2"></i>Loading details...</p>';
            
            fetch(currentItem.file)
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.text();
                })
                .then(text => {
                    modalBody.innerHTML = parseMarkdown(text);
                })
                .catch(err => {
                    modalBody.innerHTML = '<p style="color: #ef4444;">Failed to load announcement details. Please try again later.</p>';
                    console.error('Error fetching announcement details:', err);
                });
        }
        
        annModal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
        if (modalCloseBtn) modalCloseBtn.focus();
    }

    function closeModal() {
        if (!annModal) return;
        isModalOpen = false;
        annModal.classList.add('hidden');
        document.body.style.overflow = '';
        
        if (annBar) {
            const isHovering = annBar.matches(':hover');
            if (!isHovering) {
                startAutoPlay();
            }
        }
    }

    // Modal Close event listeners
    if (modalClose) modalClose.onclick = closeModal;
    if (modalCloseBtn) modalCloseBtn.onclick = closeModal;
    if (modalBackdrop) modalBackdrop.onclick = closeModal;

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && isModalOpen) {
            closeModal();
        }
    });

    function resetProgressBar() {
        if (progressBar) {
            progressBar.style.transition = 'none';
            progressBar.style.width = '0%';
        }
    }

    function startProgressBar() {
        if (!progressBar || isModalOpen) return;
        
        resetProgressBar();
        let startTime = Date.now();
        
        if (progressInterval) clearInterval(progressInterval);
        
        progressInterval = setInterval(() => {
            let elapsed = Date.now() - startTime;
            let progress = Math.min((elapsed / AUTO_PLAY_DELAY) * 100, 100);
            progressBar.style.width = progress + '%';
            
            if (progress >= 100) {
                clearInterval(progressInterval);
            }
        }, PROGRESS_STEP);
    }

    function renderAnnouncement(isNext = true) {
        if (!annContent) return;
        
        // Phase 1: Fade out
        annContent.classList.remove('announcement-fade-in');
        annContent.classList.add('announcement-fade-out');
        
        setTimeout(() => {
            // Update content
            annContent.innerHTML = announcements[currentAnnIndex].html;
            
            // Phase 2: Fade in
            annContent.classList.remove('announcement-fade-out');
            annContent.classList.add('announcement-fade-in');
            
            // Restart progress bar if auto-playing
            if (autoPlayInterval && !isModalOpen) startProgressBar();
        }, 300); // Matches fade-out duration
    }

    function nextAnnouncement() {
        currentAnnIndex = (currentAnnIndex < announcements.length - 1) ? currentAnnIndex + 1 : 0;
        renderAnnouncement(true);
    }

    function prevAnnouncement() {
        currentAnnIndex = (currentAnnIndex > 0) ? currentAnnIndex - 1 : announcements.length - 1;
        renderAnnouncement(false);
    }

    function startAutoPlay() {
        if (isModalOpen) return;
        stopAutoPlay();
        autoPlayInterval = setInterval(nextAnnouncement, AUTO_PLAY_DELAY);
        startProgressBar();
    }

    function stopAutoPlay() {
        if (autoPlayInterval) clearInterval(autoPlayInterval);
        if (progressInterval) clearInterval(progressInterval);
        autoPlayInterval = null;
        progressInterval = null;
        resetProgressBar();
    }

    if (annBar && annClose) {
        // Show if not dismissed
        if (localStorage.getItem('hl_announcement_dismissed') !== ANN_VERSION) {
            annBar.classList.remove('hidden');
            // Initial render
            annContent.innerHTML = announcements[currentAnnIndex].html;
            annContent.classList.add('announcement-fade-in');
            startAutoPlay();
            
            // Info button interaction
            if (annInfo) {
                annInfo.onclick = (e) => {
                    e.stopPropagation();
                    stopAutoPlay();
                    openModal();
                };
            }
            
            // Hover interactions
            annBar.onmouseenter = stopAutoPlay;
            annBar.onmouseleave = () => {
                if (!isModalOpen) startAutoPlay();
            };

            // Set up navigation
            if (annPrev && annNext) {
                annPrev.onclick = (e) => {
                    e.stopPropagation();
                    stopAutoPlay();
                    prevAnnouncement();
                };
                annNext.onclick = (e) => {
                    e.stopPropagation();
                    stopAutoPlay();
                    nextAnnouncement();
                };
            }
        }

        annClose.onclick = (e) => {
            e.stopPropagation();
            stopAutoPlay();
            annBar.classList.add('hiding');
            setTimeout(() => {
                annBar.classList.add('hidden');
                localStorage.setItem('hl_announcement_dismissed', ANN_VERSION);
            }, 600);
        };
    }
});
