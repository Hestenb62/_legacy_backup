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
        }
    };
})();
