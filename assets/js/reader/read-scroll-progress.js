    /* ==========================================================================
       2. Scroll Progress & Floating Resume Alert Banner
       ========================================================================== */
    function initScrollProgress(scrollPosKey, completionKey, currentChapter, totalChapters) {
        const progressBar = document.getElementById("progress-bar");

        function debounce(func, wait) {
            let timeout;
            return function (...args) {
                clearTimeout(timeout);
                timeout = setTimeout(() => func.apply(this, args), wait);
            };
        }

        const saveScrollPos = debounce((scrollTop, scrollPct) => {
            try {
                localStorage.setItem(scrollPosKey, scrollTop);
                const overallPct = Math.round(((currentChapter - 1) / totalChapters) * 100 + (scrollPct / totalChapters));
                localStorage.setItem(completionKey, overallPct);
            } catch (e) {}
        }, 150);

        window.addEventListener("scroll", () => {
            const scrollTop = window.scrollY || document.documentElement.scrollTop;
            const docHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollPct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;

            if (progressBar) {
                progressBar.style.width = `${Math.min(Math.max(scrollPct, 0), 100)}%`;
            }

            saveScrollPos(scrollTop, scrollPct);
        });

        // Prompt to resume reading if previous scroll position was saved
        setTimeout(() => {
            try {
                const savedPos = parseFloat(localStorage.getItem(scrollPosKey));
                if (savedPos > 200) {
                    const toast = document.getElementById("resume-toast");
                    const confirmBtn = document.getElementById("resume-toast-confirm");
                    const dismissBtn = document.getElementById("resume-toast-dismiss");

                    if (toast && confirmBtn && dismissBtn) {
                        toast.classList.remove("hidden");

                        confirmBtn.onclick = () => {
                            window.scrollTo({ top: savedPos, behavior: "smooth" });
                            toast.classList.add("hidden");
                        };

                        dismissBtn.onclick = () => {
                            toast.classList.add("hidden");
                        };
                    }
                }
            } catch (e) {}
        }, 500);
    }
