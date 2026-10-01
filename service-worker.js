const CACHE_NAME = 'hestens-learning-v21';
const ASSETS_TO_CACHE = [

  // Main Directory Pages & Manifest
  '/',
  '/index.php',
  '/offline.php',
  '/updates.php',
  '/manifest.json',
  '/assessment/index.php',
  '/assessment/diagnostic.php',
  '/library/index.php',
  '/student/index.php',
  '/student/skill-tree.php',
  '/student/interactive-labs.php',
  '/research/index.php',
  '/research/DLDR/index.php',
  '/research/DSMS/index.php',

  // Pages Directory
  '/pages/accessibility.php',
  '/pages/help-center.php',
  '/pages/mission.php',
  '/pages/parents.php',
  '/pages/profile.php',
  '/pages/settings.php',
  '/pages/standards.php',
  '/pages/teachers.php',
  '/pages/games.php',
  '/pages/skills.php',
  '/pages/manipulatives.php',

  // Images & Icons
  '/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png',

  // CSS Layers & Layouts
  '/assets/css/global-tokens.css',
  '/assets/css/global-reset.css',
  '/assets/css/global-primitives.css',
  '/assets/css/global-components.css',
  '/assets/css/pages/accessibility.css',
  '/assets/css/pages/updates.css',
  '/assets/css/pages/skill-tree.css',
  '/assets/css/pages/interactive-labs.css',
  '/assets/css/pages/diagnostic.css',
  '/assets/css/pages/student.css',
  '/assets/css/pages/games.css',
  '/assets/css/pages/skills.css',
  '/assets/css/pages/manipulatives.css',
  '/assets/css/level-style.css',
  '/assets/css/reader-main.css',
  '/assets/css/components/sticky-reading-bar.css',
  '/assets/css/components/fixed-tools.css',
  '/assets/css/components/command-palette.css',
  '/assets/css/components/shortcuts-modal.css',
  '/assets/css/components/quest-badges.css',
  '/assets/css/components/accommodations.css',
  '/assets/css/layouts/header.css',
  '/assets/css/layouts/footer.css',
  '/assets/css/layouts/print.css',

  // JavaScript Core & Modular Suites
  '/assets/js/accessibility/audio-feedback.js',
  '/assets/js/assessment/assessment-core.js',
  '/assets/js/assessment/assessment-questionGenerator.js',
  '/assets/js/assessment/adaptive-diagnostic.js',
  '/assets/js/accessibility/global-a11y.js',
  '/assets/js/accessibility/accommodation-engine.js',
  '/assets/js/labs/interactive-labs.js',
  '/assets/js/core/offline-status.js',
  '/assets/js/components/offline-storage-manager.js',
  // Statutory & Standards Research Documents
  '/assets/text/accessability-wcag-2-1-aa.md',
  '/assets/text/accessability-wcag-aaa.md',
  '/assets/text/accessability-section-508.md',
  '/assets/text/accessability-udl.md',
  '/assets/text/library-gutenburg.md',
  '/assets/js/core/global-error-handler.js',
  '/assets/js/core/global-standard.js',
  '/assets/js/components/scratchpad-studio.js',
  '/assets/js/components/global-study-tools.js',
  '/assets/js/components/flashcard-studio.js',
  '/assets/js/gamification/quest-manager.js',
  '/assets/js/gamification/skill-tree.js',
  '/assets/js/pages/index-main.js',
  '/assets/js/components/global-announcements.js',
  '/assets/js/core/global-core-ui.js',
  '/assets/js/core/gdrive-sync.js',
  '/assets/js/components/command-palette.js',
  '/assets/js/labs/manipulatives-lab.js',
  '/assets/js/pages/skills-passport.js',
  '/assets/data/global-learningLevels.js',
  '/assets/js/standards/standards-ccss-math-ela.js',
  '/assets/js/components/practice-notebook.js',
  '/assets/data/research/journals.json',
  '/assets/css/research-main.css',
  '/assets/js/research/journal-engine.js'
];

// Install Event: Caches critical assets safely with individual fallback
self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then(async (cache) => {
      console.log('[Service Worker] Caching pre-defined assets');
      await Promise.allSettled(
        ASSETS_TO_CACHE.map((url) =>
          cache.add(url).catch((err) => {
            console.warn(`[Service Worker] Non-critical cache fail for: ${url}`, err);
          })
        )
      );
    })
  );
  self.skipWaiting();
});

// Activate Event: Cleans up old caches
self.addEventListener('activate', (event) => {
  event.waitUntil(
    caches.keys().then((keyList) => {
      return Promise.all(
        keyList.map((key) => {
          if (key !== CACHE_NAME) {
            console.log('[Service Worker] Removing old cache', key);
            return caches.delete(key);
          }
        })
      );
    })
  );
  self.clients.claim();
});

// Fetch Event: The Strategy
self.addEventListener('fetch', (event) => {
  // Only process GET requests from http/https schemes
  if (event.request.method !== 'GET' || !event.request.url.startsWith('http')) {
    return;
  }

  // 1. For HTML pages (PHP), use Network First, then Cache
  if (event.request.headers.get('accept') && event.request.headers.get('accept').includes('text/html')) {
    event.respondWith(
      fetch(event.request)
        .then((response) => {
          if (response && response.status === 200) {
            const copy = response.clone();
            caches.open(CACHE_NAME).then((cache) => {
              cache.put(event.request, copy);
            });
          }
          return response;
        })
        .catch(() => {
          return caches.match(event.request).then((response) => {
            if (response) return response;
            return caches.match('/offline.php');
          });
        })
    );
  }
  // 2. For images, fonts, and static assets (CSS/JS), use Stale-While-Revalidate
  else {
    event.respondWith(
      caches.match(event.request).then((cachedResponse) => {
        const fetchPromise = fetch(event.request).then((networkResponse) => {
          if (networkResponse && networkResponse.status === 200) {
            const copy = networkResponse.clone();
            caches.open(CACHE_NAME).then((cache) => {
              cache.put(event.request, copy);
            });
          }
          return networkResponse;
        }).catch(() => {
          // Network failed, return cached if available
          return cachedResponse;
        });
        
        // Return cached response immediately if available, while network fetch happens in background
        return cachedResponse || fetchPromise;
      })
    );
  }
});

