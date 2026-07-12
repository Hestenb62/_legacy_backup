// announcements.js - Logic for the global announcement bar

document.addEventListener('DOMContentLoaded', () => {
    const annBar = document.getElementById('announcement-bar');
    const annContent = document.getElementById('announcement-content');
    const annClose = document.getElementById('close-announcement');
    const annPrev = document.getElementById('prev-announcement');
    const annNext = document.getElementById('next-announcement');
    
    // Change this version string to force the announcement to show again for all users
    const ANN_VERSION = 'v1.3'; 
    
    const announcements = [
        '<i class="fas fa-hammer mr-2 text-yellow-300"></i> <span class="font-black">PROUDLY UPDATING:</span> We are modernizing our curriculum levels daily. Stay tuned!',
        '<i class="fas fa-font mr-2 text-cyan-300"></i> <span class="font-black">ACCESSIBILITY:</span> OpenDyslexic font support has been fixed! Toggle it in the accessibility panel.',
        '<i class="fas fa-star mr-2 text-pink-300"></i> <span class="font-black">NEW FEATURE:</span> You can now track your progress and see your module mastery in real-time!',
        '<i class="fas fa-book mr-2 text-emerald-300"></i> <span class="font-black">LIBRARY:</span> Check out our freshly expanded collection of classic and modern literature.'
    ];
    
    let currentAnnIndex = 0;
    let autoPlayInterval = null;
    let progressInterval = null;
    const AUTO_PLAY_DELAY = 6000; // 6 seconds for better reading
    const PROGRESS_STEP = 50; // Update every 50ms for smoothness
    
    const progressBar = document.getElementById('announcement-progress');

    function resetProgressBar() {
        if (progressBar) {
            progressBar.style.transition = 'none';
            progressBar.style.width = '0%';
        }
    }

    function startProgressBar() {
        if (!progressBar) return;
        
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
            annContent.innerHTML = announcements[currentAnnIndex];
            
            // Phase 2: Fade in
            annContent.classList.remove('announcement-fade-out');
            annContent.classList.add('announcement-fade-in');
            
            // Restart progress bar if auto-playing
            if (autoPlayInterval) startProgressBar();
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
            annContent.innerHTML = announcements[currentAnnIndex];
            annContent.classList.add('announcement-fade-in');
            startAutoPlay();
            
            // Hover interactions
            annBar.onmouseenter = stopAutoPlay;
            annBar.onmouseleave = startAutoPlay;

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
