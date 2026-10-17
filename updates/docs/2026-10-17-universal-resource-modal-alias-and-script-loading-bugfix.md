---
title: "Universal Resource Modal Script Resolution and Topic Aliasing Bugfix"
date: "2026-10-17"
version: "v2.24.0"
category: "Bugfix"
tags: ["Bugfix", "Science", "Social Studies", "Math", "Resource Modal", "Service Worker"]
summary: "Resolved root cause preventing Science (Periodic Table) and Social Studies (Timelines) popups from rendering their diagrams by embedding datasets directly in resource-modal.php, adding a 207-topic alias resolver, and bumping service worker cache."
author: "Antigravity & Hesten"
---

# Universal Resource Modal Script Resolution and Topic Aliasing Bugfix

## 1. Problem Description
When accessing student subpages (such as [`student/science-diagrams.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/science-diagrams.php), [`student/science-quizzes.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/science-quizzes.php), [`student/social-history.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/social-history.php), and [`student/math-resources.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/student/math-resources.php)), modal topics such as **Periodic Table** and **World History Timelines** were not displaying their vector SVG diagrams, equation vaults, or curated academic references, falling back to an unpopulated placeholder message.

## 2. Root Cause Analysis
1. **Isolated Script Inclusions**: The newly authored interactive dataset files (`assets/js/pages/science-lessons.js` and `assets/js/pages/social-studies-lessons.js`) were only referenced on their primary resource landing pages (`student/science-resources.php` and `student/social-studies-resources.php`). The remaining 12+ student subpages loaded [`src/resource-modal.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/resource-modal.php) without the necessary JavaScript datasets present in `window.scienceLessons` and `window.socialStudiesLessons`.
2. **Subpage Topic Title Divergence**: Subpages displayed specialized button labels (e.g., `"Periodic Table Visualizer"`, `"Periodic Table Quiz"`, `"Medieval Period"`, `"Renaissance & Reformation"`, `"Animal Cell Diagram"`). The modal runner performed an exact key match against `data[topicName]`; without an alias lookup, these queries fell through to the default stub.
3. **Service Worker Stale-While-Revalidate Caching**: [`service-worker.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js) served cached assets from `CACHE_NAME = 'hestens-learning-v24'`, requiring a cache version increment and cache purge on activation.

## 3. Resolution Details
1. **Centralized Dataset Script Ingestion**:
   - In [`src/resource-modal.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/src/resource-modal.php), added persistent versioned `<script>` tags for `math-lessons.js`, `science-lessons.js`, and `social-studies-lessons.js` right before the modal controller executes. Every page that includes `resource-modal.php` now automatically receives all academic datasets.
2. **207-Topic Canonical Alias Dictionary**:
   - Built `window.topicAliases` mapping subpage pill names (e.g., `"Periodic Table Visualizer"` &rarr; `"Periodic Table"`, `"Medieval Period"` &rarr; `"World History Timelines"`, `"Animal Cell Diagram"` &rarr; `"Cell Biology"`) to their canonical parent lesson.
3. **Fuzzy & Fallback Keyword Matching**:
   - In `renderModalTopic`, if an exact match or alias is not found, a case-insensitive substring search matches topics containing keywords (e.g., `periodic table`, `timeline`, `cell`, `civilization`).
4. **Direct URL Hash Routing Integration**:
   - Updated `findTopicByHash` to resolve aliases dynamically, enabling direct hash links like `#periodic-table-visualizer` and `#medieval-period`.
5. **Cache Invalidation**:
   - Bumped service worker cache in [`service-worker.js`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/service-worker.js) to `CACHE_NAME = 'hestens-learning-v25'` with automatic stale cache deletion on activation.

## 4. Verification
Automated test script `scratch/verify_platform_popups.js` verified 100% pass rate across direct canonical queries and subpage aliases:
- `"Periodic Table"` &rarr; Active SVG Diagram Verified ✓
- `"Periodic Table Visualizer"` &rarr; Active SVG Diagram Verified ✓
- `"Periodic Table Quiz"` &rarr; Active SVG Diagram Verified ✓
- `"World History Timelines"` &rarr; Active SVG Diagram Verified ✓
- `"Medieval Period"` &rarr; Active SVG Diagram Verified ✓
- `"Renaissance & Reformation"` &rarr; Active SVG Diagram Verified ✓
- `"Ancient Egypt"` &rarr; Active SVG Diagram Verified ✓
- `"Animal Cell Diagram"` &rarr; Active SVG Diagram Verified ✓
