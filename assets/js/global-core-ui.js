// core-ui.js - Global UI interactions

document.addEventListener('DOMContentLoaded', () => {
    // --- 1. Scroll Progress ---
    window.addEventListener('scroll', () => {
        const h = document.documentElement,
            b = document.body,
            st = 'scrollTop',
            sh = 'scrollHeight';
        const pct = (h[st] || b[st]) / ((h[sh] || b[sh]) - h.clientHeight) * 100;
        const bar = document.getElementById('scroll-bar');
        if (bar) bar.style.width = pct + '%';
    });

    // --- 2. Magnetic Buttons ---
    const initMagnetic = () => {
        document.querySelectorAll('.magnetic-wrap').forEach(item => {
            item.addEventListener('mousemove', function (e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left - rect.width / 2;
                const y = e.clientY - rect.top - rect.height / 2;

                this.style.transform = `translate(${x * 0.3}px, ${y * 0.3}px)`;
            });

            item.addEventListener('mouseleave', function () {
                this.style.transform = 'translate(0px, 0px)';
            });
        });
    };
    initMagnetic();

    // --- 3. Personalization: Time Greetings ---
    window.getGreeting = () => {
        const hour = new Date().getHours();
        if (hour < 12) return "Good Morning";
        if (hour < 17) return "Good Afternoon";
        return "Good Evening";
    };

    const greetingEl = document.getElementById('dynamic-greeting');
    if (greetingEl) greetingEl.textContent = window.getGreeting();

    // --- 4. User Dropdown Toggle ---
    const userMenuButton = document.getElementById('user-menu-button');
    const userDropdown = document.getElementById('user-dropdown');

    if (userMenuButton && userDropdown) {
        const arrow = document.getElementById('user-menu-arrow');

        userMenuButton.addEventListener('click', (e) => {
            e.stopPropagation();
            const isHidden = userDropdown.classList.contains('hidden');

            if (isHidden) {
                userDropdown.classList.remove('hidden');
                if (arrow) arrow.classList.add('rotate-180');
                // Small delay to allow display:block to apply before animating opacity
                setTimeout(() => {
                    userDropdown.classList.remove('opacity-0', 'scale-95');
                    userDropdown.classList.add('opacity-100', 'scale-100');
                }, 10);
            } else {
                userDropdown.classList.remove('opacity-100', 'scale-100');
                userDropdown.classList.add('opacity-0', 'scale-95');
                if (arrow) arrow.classList.remove('rotate-180');
                // Wait for animation to finish before hiding
                setTimeout(() => {
                    userDropdown.classList.add('hidden');
                }, 200);
            }
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!userMenuButton.contains(e.target) && !userDropdown.contains(e.target) && !userDropdown.classList.contains('hidden')) {
                userDropdown.classList.remove('opacity-100', 'scale-100');
                userDropdown.classList.add('opacity-0', 'scale-95');
                if (arrow) arrow.classList.remove('rotate-180');
                setTimeout(() => {
                    userDropdown.classList.add('hidden');
                }, 200);
            }
        });
    }
});
