/**
 * Hesten's Learning - Standard Functionality
 * Handles Mobile Menu and Dynamic Copyright
 */

document.addEventListener('DOMContentLoaded', function () {

    // --- Mobile Navigation Toggle ---
    const menuToggle = document.getElementById('nav-toggle') || document.querySelector('.mobile-menu-toggle');
    const navContent = document.getElementById('nav-content') || document.querySelector('.navbar-nav');

    if (menuToggle && navContent) {
        menuToggle.addEventListener('click', function () {
            // Toggle 'hidden' class for Tailwind, or 'active' for custom CSS
            if (navContent.classList.contains('hidden')) {
                navContent.classList.remove('hidden');
            } else {
                navContent.classList.add('hidden');
            }

            // Also toggle 'active' for legacy support
            navContent.classList.toggle('active');

            // Optional: Toggle icon between bars and times (X)
            const icon = menuToggle.querySelector('i');
            if (icon) {
                // Check if open (not hidden)
                if (!navContent.classList.contains('hidden') || navContent.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }
        });
    }

    // --- Dynamic Copyright Year ---
    const yearSpan = document.querySelector('.copyright-year');
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }
});