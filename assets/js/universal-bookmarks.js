/**
 * Universal Bookmarking & Favorites Engine
 * File: assets/js/universal-bookmarks.js
 * Pure Vanilla JavaScript (Zero Dependencies)
 * Seamlessly coordinates saved Lessons, Digital Books, and Curriculum Skills
 * with automatic Google Drive auto-sync and real-time UI updates.
 */

(function () {
    'use strict';

    const STORAGE_KEY = 'hesten_universal_bookmarks';
    const LEGACY_LIB_KEY = 'hesten_library_bookmarks';

    // Helper to get raw items
    function getItems() {
        let items = [];
        try {
            const raw = localStorage.getItem(STORAGE_KEY);
            if (raw) items = JSON.parse(raw);
            if (!Array.isArray(items)) items = [];
        } catch (e) {
            items = [];
        }

        // Backwards compatibility: merge any missing legacy book bookmarks
        try {
            const rawLib = localStorage.getItem(LEGACY_LIB_KEY);
            if (rawLib) {
                const libIds = JSON.parse(rawLib);
                if (Array.isArray(libIds)) {
                    let changed = false;
                    libIds.forEach(id => {
                        if (id && !items.some(it => it.id === id)) {
                            items.push({
                                id: id,
                                title: id.replace(/-/g, ' ').replace(/\b\w/g, c => c.toUpperCase()),
                                type: 'book',
                                url: `/library/read/index.php?book=${encodeURIComponent(id)}`,
                                category: 'Literature',
                                icon: 'fa-book',
                                dateAdded: new Date().toISOString()
                            });
                            changed = true;
                        }
                    });
                    if (changed) {
                        try {
                            localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
                        } catch (e) {}
                    }
                }
            }
        } catch (e) {}

        return items;
    }

    function saveItems(items) {
        try {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(items));

            // Sync book items to legacy key for backwards compatibility
            const bookIds = items.filter(it => it.type === 'book').map(it => it.id);
            localStorage.setItem(LEGACY_LIB_KEY, JSON.stringify(bookIds));
        } catch (e) {
            console.warn('[UniversalBookmarks] Storage write error:', e);
        }

        // Trigger Google Drive auto-sync if available
        if (typeof window.scheduleAutoSync === 'function') {
            window.scheduleAutoSync();
        }

        // Dispatch update event
        window.dispatchEvent(new CustomEvent('bookmarks-updated', {
            detail: { items: items }
        }));
    }

    const UniversalBookmarks = {
        getAll: function (filterType) {
            const items = getItems();
            if (!filterType || filterType === 'all') return items;
            return items.filter(it => it.type === filterType);
        },

        getCount: function (filterType) {
            return this.getAll(filterType).length;
        },

        isBookmarked: function (id) {
            if (!id) return false;
            const items = getItems();
            return items.some(it => it.id === id);
        },

        add: function (item) {
            if (!item || !item.id) return;
            const items = getItems();
            const existingIdx = items.findIndex(it => it.id === item.id);
            if (existingIdx === -1) {
                items.unshift({
                    id: item.id,
                    title: item.title || item.id,
                    type: item.type || 'lesson',
                    url: item.url || '#',
                    category: item.category || 'General',
                    icon: item.icon || (item.type === 'book' ? 'fa-book' : (item.type === 'skill' ? 'fa-bullseye' : 'fa-graduation-cap')),
                    dateAdded: new Date().toISOString()
                });
                saveItems(items);
            }
        },

        remove: function (id) {
            if (!id) return;
            let items = getItems();
            items = items.filter(it => it.id !== id);
            saveItems(items);
        },

        toggle: function (item) {
            if (!item || !item.id) return false;
            if (this.isBookmarked(item.id)) {
                this.remove(item.id);
                return false;
            } else {
                this.add(item);
                return true;
            }
        }
    };

    window.UniversalBookmarks = UniversalBookmarks;
})();
