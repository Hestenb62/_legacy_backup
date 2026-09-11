/**
 * assets/js/offline-storage-manager.js
 * PWA Storage Quota & Offline Cache Management Dashboard Controller
 * Hesten's Learning Platform
 */

(function () {
    'use strict';

    window.HlStorageManager = {
        async estimateStorage() {
            if ('storage' in navigator && 'estimate' in navigator.storage) {
                return await navigator.storage.estimate();
            }
            return null;
        },

        async getCacheInventories() {
            if (!('caches' in window)) return [];
            const keys = await window.caches.keys();
            const inventories = [];
            for (const key of keys) {
                const cache = await window.caches.open(key);
                const reqs = await cache.keys();
                inventories.push({ key, count: reqs.length });
            }
            return inventories;
        },

        async cacheCoursePack(urls, onProgress) {
            if (!('caches' in window)) throw new Error('Cache Storage is not supported');
            const cache = await window.caches.open('hestens-learning-coursepack');
            let completed = 0;
            for (const url of urls) {
                try {
                    await cache.add(url);
                    completed++;
                    if (onProgress) onProgress(completed, urls.length, url);
                } catch (err) {
                    console.warn('Failed to cache resource:', url, err);
                }
            }
            return completed;
        },

        async purgeTransientCaches() {
            if (!('caches' in window)) return;
            const keys = await window.caches.keys();
            for (const k of keys) {
                if (k.includes('coursepack') || k.includes('temp')) {
                    await window.caches.delete(k);
                }
            }
        },

        async saveCurrentMaterialOffline(btnEl) {
            if (!('caches' in window)) {
                alert('Offline caching is not supported on this browser.');
                return false;
            }

            const currentUrl = window.location.pathname + window.location.search;
            const titleEl = document.querySelector('.reader-title') || document.querySelector('.lesson-title') || document.querySelector('h1');
            const subTitleEl = document.querySelector('.reader-author') || document.querySelector('.lesson-badge');
            const title = (titleEl ? titleEl.textContent : document.title).trim();
            const subtitle = (subTitleEl ? subTitleEl.textContent : '').trim();

            try {
                if (btnEl) {
                    btnEl.innerHTML = '<i class="fas fa-spinner fa-spin" aria-hidden="true"></i>';
                    btnEl.disabled = true;
                }

                // Cache to primary PWA cache
                const cacheName = 'hestens-learning-v14';
                const cache = await window.caches.open(cacheName);
                await cache.add(currentUrl);

                // Collect local linked assets
                const assetUrls = Array.from(document.querySelectorAll('link[rel="stylesheet"], script[src]'))
                    .map(el => el.getAttribute('href') || el.getAttribute('src'))
                    .filter(u => u && u.startsWith('/') && !u.startsWith('//'));

                for (const u of assetUrls) {
                    try { await cache.add(u); } catch(e){}
                }

                // Save metadata record
                const existing = JSON.parse(localStorage.getItem('hl_offline_downloads') || '[]');
                const filtered = existing.filter(item => item.url !== currentUrl);
                filtered.unshift({
                    id: 'down-' + Date.now(),
                    title: title,
                    subtitle: subtitle,
                    url: currentUrl,
                    date: new Date().toLocaleDateString(),
                    type: currentUrl.includes('/lessons/') ? 'lesson' : 'book'
                });
                localStorage.setItem('hl_offline_downloads', JSON.stringify(filtered));

                if (btnEl) {
                    btnEl.classList.add('active');
                    btnEl.disabled = false;
                    btnEl.innerHTML = '<i class="fas fa-check-circle" style="color: #10b981;" aria-hidden="true"></i>';
                    btnEl.setAttribute('title', 'Saved offline in Offline Station');
                }

                if (typeof window.announceA11y === 'function') {
                    window.announceA11y(`"${title}" saved to Offline Station`);
                }

                // Show toast notification
                const toast = document.createElement('div');
                toast.className = 'hl-acc-toast';
                toast.style.position = 'fixed';
                toast.style.bottom = '2rem';
                toast.style.left = '50%';
                toast.style.transform = 'translateX(-50%)';
                toast.style.zIndex = '9999';
                toast.style.background = '#0f172a';
                toast.style.color = '#f8fafc';
                toast.style.padding = '0.75rem 1.5rem';
                toast.style.borderRadius = '9999px';
                toast.style.boxShadow = '0 10px 25px rgba(0,0,0,0.3)';
                toast.style.fontWeight = '700';
                toast.style.fontSize = '0.9rem';
                toast.style.border = '1px solid #334155';
                toast.innerHTML = `<i class="fas fa-arrow-down" style="color: #38bdf8; margin-right: 0.5rem;"></i> Saved to Offline Station! Available offline anytime.`;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3200);

                return true;
            } catch (err) {
                console.error('Failed to save material offline:', err);
                if (btnEl) {
                    btnEl.disabled = false;
                    btnEl.innerHTML = '<i class="fas fa-arrow-down" aria-hidden="true"></i>';
                }
                alert('Could not save material offline: ' + err.message);
                return false;
            }
        }
    };

    window.saveCurrentMaterialOffline = function(btn) {
        return window.HlStorageManager.saveCurrentMaterialOffline(btn);
    };
})();
