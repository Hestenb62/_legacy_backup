const CACHE_NAME = 'hestens-learning-v6';
const ASSETS_TO_CACHE = [

  // Main Directory Pages & Manifest
  '/',
  '/index.php',
  '/offline.php',
  '/manifest.json',
  '/assessment/index.php',
  '/library/index.php',
  '/student/index.php',

  // Pages Directory
  '/pages/help-center.php',
  '/pages/mission.php',
  '/pages/parents.php',
  '/pages/profile.php',
  '/pages/settings.php',
  '/pages/standards.php',
  '/pages/teachers.php',

  // Images & Icons
  '/assets/images/6791421e-7ca7-40bd-83d3-06a479bf7f36.png',

  // CSS Layers & Layouts
  '/assets/css/global-tokens.css',
  '/assets/css/global-reset.css',
  '/assets/css/global-primitives.css',
  '/assets/css/global-components.css',
  '/assets/css/components/fixed-tools.css',
  '/assets/css/layouts/header.css',
  '/assets/css/layouts/footer.css',

  // JavaScript Core & Data
  '/assets/js/assessment-core.js',
  '/assets/js/assessment-questionGenerator.js',
  '/assets/js/global-a11y.js',
  '/assets/js/global-standard.js',
  '/assets/js/global-study-tools.js',
  '/assets/js/index-main.js',
  '/assets/js/global-announcements.js',
  '/assets/js/global-core-ui.js',
  '/assets/js/gdrive-sync.js',
  '/assets/data/global-learningLevels.js',
  '/assets/js/standards-ccss-math-ela.js'
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
  // 1. For HTML pages (PHP), use Network First, then Cache
  if (event.request.headers.get('accept') && event.request.headers.get('accept').includes('text/html')) {
    event.respondWith(
      fetch(event.request)
        .then((response) => {
          return caches.open(CACHE_NAME).then((cache) => {
            cache.put(event.request, response.clone());
            return response;
          });
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
          return caches.open(CACHE_NAME).then((cache) => {
            cache.put(event.request, networkResponse.clone());
            return networkResponse;
          });
        }).catch(() => {
          // Ignore network errors on background fetch
        });
        
        // Return cached response immediately if available, while network fetch happens in background
        return cachedResponse || fetchPromise;
      })
    );
  }
});

