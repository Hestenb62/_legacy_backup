 <!-- FULL FOOTER -->
    <link rel="stylesheet" href="/src/footer_style.css">
    <footer class="footer-main noise-filter">
        <!-- Decoration -->
        <div class="footer-decor-top"></div>
        <div class="footer-decor-blob"></div>

        <div class="footer-container">
            <div class="footer-grid">
                <!-- Column 1: About -->
                <div>
                    <h4 class="footer-heading">
                        <i class="fas fa-graduation-cap" style="color: var(--color-blue)"></i> About
                    </h4>
                    <div class="footer-about-brand">
                        <div class="footer-brand-logo">
                            <img src="/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png" alt="Logo" loading="lazy">
                        </div>
                        <div class="footer-brand-text">
                            <span class="footer-brand-title">Hesten's Learning</span>
                            <span class="footer-brand-subtitle">Education for All</span>
                        </div>
                    </div>
                    <p class="footer-about-desc">
                        Empowering students with learning disabilities through personalized learning experiences. <a href="/about.php">Learn more</a>
                    </p>
                </div>

                <!-- Column 2: Quick Links -->
                <div class="links-teal">
                    <h4 class="footer-heading" style="opacity: 0.9">
                        <i class="fas fa-link" style="color: var(--color-teal)"></i> Quick Links
                    </h4>
                    <ul class="footer-links">
                        <li class="footer-link-item"><a href="/curriculum.php"><i class="fas fa-book footer-link-icon"></i> Curriculum</a></li>
                        <li class="footer-link-item"><a href="/research/"><i class="fas fa-flask footer-link-icon"></i> Research</a></li>
                        <li class="footer-link-item"><a href="/library/"><i class="fas fa-book-open footer-link-icon"></i> Library</a></li>
                        <li class="footer-link-item"><a href="/help-center.php"><i class="fas fa-question-circle footer-link-icon"></i> Help Center</a></li>
                    </ul>
                </div>

                <!-- Column 3: Support -->
                <div class="links-purple">
                    <h4 class="footer-heading" style="opacity: 0.9">
                        <i class="fas fa-hand-holding-heart" style="color: var(--color-purple)"></i> Support
                    </h4>
                    <ul class="footer-links">
                        <li class="footer-link-item"><a href="/contact.php"><i class="fas fa-envelope footer-link-icon"></i> Contact Us</a></li>
                        <li class="footer-link-item"><a href="#"><i class="fas fa-home footer-link-icon"></i> For Students</a></li>
                        <li class="footer-link-item"><a href="/parents.php"><i class="fas fa-users footer-link-icon"></i> For Parents</a></li>
                        <li class="footer-link-item"><a href="#"><i class="fas fa-chalkboard-teacher footer-link-icon"></i> For Teachers</a></li>
                    </ul>
                </div>

                <!-- Column 4: Legal -->
                <div class="links-rose">
                    <h4 class="footer-heading" style="opacity: 0.9">
                        <i class="fas fa-balance-scale" style="color: var(--color-rose)"></i> Legal & Settings
                    </h4>
                    <ul class="footer-links">
                        <li class="footer-link-item"><a href="/privacy.php"><i class="fas fa-shield-alt footer-link-icon"></i> Privacy Policy</a></li>
                        <li class="footer-link-item"><a href="/terms-of-use.php"><i class="fas fa-file-contract footer-link-icon"></i> Terms of Use</a></li>
                        <li class="footer-link-item"><a href="/settings.php"><i class="fas fa-universal-access footer-link-icon"></i> Accessibility</a></li>
                        <li class="footer-link-item"><a href="/about.php"><i class="fas fa-info-circle footer-link-icon"></i> About Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-divider"></div>

            <div class="footer-bottom">
                <div class="footer-bottom-text">
                    <p>
                        &copy; <span id="year">2025</span> <span style="font-weight: 800; color: var(--footer-heading)">Hesten's Learning</span>. All rights reserved. | 
                        Made with <i class="fas fa-heart footer-heart"></i> for education
                    </p>
                    <p class="footer-license">
                        <a href="/">Hesten's Learning</a> by Hesten Allison is licensed under 
                        <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/?ref=chooser-v1" target="_blank" rel="license noopener noreferrer" class="license-badge-link">
                            CC BY-NC-SA 4.0
                            <img style="height:16px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/cc.svg?ref=chooser-v1" alt="">
                            <img style="height:16px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/by.svg?ref=chooser-v1" alt="">
                            <img style="height:16px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/nc.svg?ref=chooser-v1" alt="">
                            <img style="height:16px!important;margin-left:3px;vertical-align:text-bottom;" src="https://mirrors.creativecommons.org/presskit/icons/sa.svg?ref=chooser-v1" alt="">
                        </a>
                    </p>
                </div>

                <div class="footer-bottom-actions">
                    <div class="gtranslate_wrapper" style="position: relative; z-index: 50;"></div>
                    <a href="https://www.buymeacoffee.com/hestena62l" target="_blank" rel="noopener noreferrer" class="coffee-btn">
                        <img src="https://cdn.buymeacoffee.com/buttons/bmc-new-btn-logo.svg" alt="" class="coffee-icon" loading="lazy">
                        <span>Buy me a coffee</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>


<!-- GTranslate Settings -->
<script>
    window.gtranslateSettings = {
        default_language: "en",
        native_language_names: true,
        wrapper_selector: ".gtranslate_wrapper",
        flag_style: "3d",
        alt_flags: { en: "usa" }
    };
</script>
<script src="https://cdn.gtranslate.net/widgets/latest/popup.js" defer></script>

<!-- Footer Scripts -->
<script src="/assets/js/error-handler.js"></script>
<script>
    // Year
    document.addEventListener("DOMContentLoaded", () => {
        const y = document.getElementById("year");
        if (y) y.textContent = new Date().getFullYear();
    });

    // Message Box
    window.showMessageBox = function(msg) {
        const b = document.getElementById("message-box");
        if (b) {
            document.getElementById("message-text").textContent = msg;
            b.classList.remove("hidden");
            b.style.display = 'flex';
            document.getElementById("message-ok-button").onclick = () => {
                b.classList.add("hidden");
                b.style.display = 'none';
            };
        } else {
            console.log(msg); // Fallback
        }
    };

    // Confetti
    window.triggerConfetti = function(origin) {
        if (typeof confetti === 'function') confetti({ particleCount: 100, spread: 70, origin: origin || { y: 0.6 } });
        else {
            const s = document.createElement('script');
            s.src = 'https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.2/dist/confetti.browser.min.js';
            s.onload = () => confetti({ particleCount: 100, spread: 70, origin: origin || { y: 0.6 } });
            document.body.appendChild(s);
        }
    };

    // Init All Features
    document.addEventListener('DOMContentLoaded', () => {
        const loader = document.getElementById('initial-loader');
        if (loader) setTimeout(() => { loader.style.opacity = '0'; setTimeout(() => loader.remove(), 500); }, 300);



        const setup = (tid, pid, cid) => {
            const t = document.getElementById(tid), p = document.getElementById(pid), c = document.getElementById(cid);
            if (!t || !p) return;
            const toggle = () => {
                p.classList.toggle('active');
            };
            t.onclick = toggle;
            if (c) c.onclick = toggle;
        };

        setup('a11y-toggle-button', 'a11y-settings-panel', 'a11y-close-button');
        setup('timer-toggle', 'timer-panel', 'timer-close');
        setup('scratchpad-toggle', 'scratchpad-panel', 'scratchpad-close');
        setup('citation-toggle', 'citation-panel', 'citation-close');

        // FAB Toggle
        const fabMainToggle = document.getElementById('fab-main-toggle');
        const fabMenu = document.getElementById('fab-menu');
        const fabIcon = document.getElementById('fab-icon');
        if (fabMainToggle && fabMenu && fabIcon) {
            fabMainToggle.addEventListener('click', () => {
                const isExpanded = fabMainToggle.getAttribute('aria-expanded') === 'true';
                if (isExpanded) {
                    fabMenu.classList.remove('active');
                    fabIcon.classList.remove('active');
                    fabMainToggle.setAttribute('aria-expanded', 'false');
                } else {
                    fabMenu.classList.add('active');
                    fabIcon.classList.add('active');
                    fabMainToggle.setAttribute('aria-expanded', 'true');
                }
            });
        }

        // Feature Inits


        // Timer
        let iv, time = 1500;
        const d = document.getElementById('timer-display'), ts = document.getElementById('timer-start'), tr = document.getElementById('timer-reset');
        if (d && ts) {
            const up = () => d.textContent = `${Math.floor(time/60)}:${(time%60).toString().padStart(2,'0')}`;
            ts.onclick = () => {
                if (iv) { clearInterval(iv); iv = null; ts.innerText = 'Start'; }
                else { ts.innerText = 'Pause'; iv = setInterval(() => { time--; up(); if(time<=0){ clearInterval(iv); window.showMessageBox('Time up!'); ts.innerText = 'Start'; } }, 1000); }
            };
            tr.onclick = () => { clearInterval(iv); iv = null; time = 1500; up(); ts.innerText = 'Start'; };
        }

        // Notes
        const n = document.getElementById('quick-notes-area');
        if (n) {
            try { n.value = localStorage.getItem('hl_scratchpad') || ''; } catch(e){}
            n.addEventListener('input', () => { try { localStorage.setItem('hl_scratchpad', n.value); } catch(e){} });
            document.getElementById('download-notes').onclick = () => {
                const a = document.createElement('a'); a.href = URL.createObjectURL(new Blob([n.value], {type:'text/plain'})); a.download = 'notes.txt'; a.click();
            };
        }

        // Citation
        const cb = document.getElementById('cite-gen');
        if (cb) cb.onclick = () => {
             const title = document.getElementById('cite-title').value || document.title || 'Untitled Page';
             const url = window.location.href;
             const date = new Date();
             const dateString = date.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
             const apa = `Hesten's Learning. (${date.getFullYear()}). ${title}. Retrieved ${dateString}, from ${url}`;
             const mla = `"${title}." Hesten's Learning. ${date.getFullYear()}, ${url}. Accessed ${dateString}.`;
             document.getElementById('cite-result').value = `APA:\n${apa}\n\nMLA:\n${mla}`;
        };

        // Scroll Top
        const sb = document.getElementById('scroll-to-top');
        if (sb) {
            window.addEventListener('scroll', () => sb.classList.toggle('visible', window.scrollY >= 300));
            sb.onclick = () => window.scrollTo({top:0, behavior:'smooth'});
        }
     
        
        // Setup Recent Pages Toggle
        setup('recent-toggle', 'recent-pages-panel', 'recent-close');

        // PWA Service Worker Registration
        if ('serviceWorker' in navigator) {
            window.addEventListener('load', () => {
                navigator.serviceWorker.register('/service-worker.js')
                    .then(reg => console.log('[PWA] Service Worker Registered', reg))
                    .catch(err => console.error('[PWA] Service Worker Registration Failed', err));
            });
        }

        // Sync Check
        if (typeof window.syncPanelInputs === 'function') {
            const s = window.loadSettings ? window.loadSettings() : (window.currentSettings || {});
            window.syncPanelInputs(s);
        }
    }); // End DOMContentLoaded
</script>
<script src="/assets/js/standard.js"></script>