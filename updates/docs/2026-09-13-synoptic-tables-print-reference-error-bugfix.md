---
title: "Resolution of Synoptic Tables ReferenceError (printSynopticTables)"
date: "2026-09-13"
category: "Bugfix"
tags: ["Math Codex", "Digital Reader", "Bugfix", "JavaScript", "Printing", "Synoptic Tables"]
summary: "Resolved Uncaught ReferenceError: printSynopticTables is not defined across the Digital Reader by refining the chapter sanitization regex in index.php and adding universal fallback handlers in reader_template.php."
author: "Antigravity & Hesten"
---

# Bugfix: Resolution of `printSynopticTables` ReferenceError in Digital Reader

## 1. Problem Description & Root Cause Analysis

### Incident
When navigating to any chapter of the Math Facts Repository in the Digital Reader (`/library/read/index.php?book=math-facts-repo&chapter=chapter-6`), clicking the **"Print / Save PDF"** or **"Download Plaintext / Markdown"** buttons triggered the following browser exception:
```text
Uncaught ReferenceError: printSynopticTables is not defined
Code: ERR-8E00D4-C02131 | Loc: index.php:2660:148
URL: https://www.hestena62.com/library/read/index.php?book=math-facts-repo&chapter=chapter-6
```

### Root Cause
1. In `library/read/index.php` (line 316), the content sanitization pipeline executed:
   ```php
   $cleaned = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $cleaned);
   ```
   This regex aggressively stripped all `<script>` tags from the chapter files. While originally intended to eliminate obsolete legacy reader scripts, it inadvertently discarded the inline `<script>` blocks embedded in Math Facts Repository chapters (`chapter-1.php` through `chapter-12.php`), which contained `printSynopticTables()` and `downloadSynopticMarkdown()`.
2. As a consequence, the HTML button `<button type="button" class="math-print-btn" onclick="printSynopticTables()">` remained in the DOM, but its bound function did not exist in the JavaScript global scope when invoked.

---

## 2. Implemented Solutions

We resolved the issue with a robust two-layer architecture ensuring both chapter-level customization and platform-level reliability:

### A. Non-Destructive Script Sanitization in `library/read/index.php`
- Updated the sanitization regex to specifically target external redundant scripts (those with `src="..."`) while preserving local inline interactive chapter scripts:
  ```php
  // Clean PHP tags and local styles
  $cleaned = preg_replace('/<\?(php|=)?[\s\S]*?\?>/is', '', $chapterHtml);
  $cleaned = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $cleaned);
  // Strip external redundant script tags with src attributes, while retaining inline chapter scripts
  $cleaned = preg_replace('/<script\b[^>]*\bsrc\b[\s\S]*?<\/script>/is', '', $cleaned);
  $cleaned = preg_replace('/<nav\b[^>]*class="[^"]*reader-chapter-nav[^"]*"[^>]*>(.*?)<\/nav>/is', '', $cleaned);
  $cleaned = preg_replace('/<nav\b[^>]*id="reader-controls"[^>]*>(.*?)<\/nav>/is', '', $cleaned);
  ```
- Result: All 12 chapters now retain their handcrafted ASCII summaries, exact mathematical formatting, and print handlers when rendered by the reader controller.

### B. Universal Platform Handlers in `library/read/reader_template.php`
- Defined global fallback handlers directly on `window` in `reader_template.php`:
  ```javascript
  // Universal Math Reference Codex: Synoptic Table Handlers
  window.printSynopticTables = window.printSynopticTables || function() {
      document.body.classList.add('printing-math-synoptic');
      window.print();
      setTimeout(function () {
          document.body.classList.remove('printing-math-synoptic');
      }, 1000);
  };

  window.downloadSynopticMarkdown = window.downloadSynopticMarkdown || function() {
      const sheet = document.querySelector('.math-summary-sheet');
      if (!sheet) {
          alert('No synoptic reference table found to download on this page.');
          return;
      }
      const title = document.querySelector('.math-bookplate-title')?.innerText || document.title || 'Math Reference Summary';
      const volume = document.querySelector('.math-catalog-badge')?.innerText || '';
      let text = '========================================================================\n';
      text += title.toUpperCase() + (volume ? ' - ' + volume : '') + '\n';
      text += '========================================================================\n\n';
      
      const cols = sheet.querySelectorAll('.math-summary-col');
      cols.forEach(function(col) {
          const heading = col.querySelector('h4')?.innerText || 'Section';
          text += '--- ' + heading.toUpperCase() + ' ---\n';
          const items = col.querySelectorAll('li');
          if (items.length > 0) {
              items.forEach(function(item) {
                  text += '  * ' + item.innerText.replace(/\s+/g, ' ').trim() + '\n';
              });
          } else {
              text += col.innerText.replace(/\s+/g, ' ').trim() + '\n';
          }
          text += '\n';
      });

      const blob = new Blob([text], { type: 'text/plain;charset=utf-8' });
      const url = URL.createObjectURL(blob);
      const link = document.createElement('a');
      link.href = url;
      const bookSlug = (window.BOOK_METADATA && window.BOOK_METADATA.id) ? window.BOOK_METADATA.id : 'math-facts';
      const chSlug = (window.BOOK_METADATA && window.BOOK_METADATA.chapter) ? window.BOOK_METADATA.chapter : 'summary';
      link.download = bookSlug + '-' + chSlug + '.txt';
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
      URL.revokeObjectURL(url);
  };
  ```
- Result: Even if an ad-blocker, browser extension, or legacy book lacks an embedded script, `printSynopticTables()` and `downloadSynopticMarkdown()` will never throw a `ReferenceError`. The print isolation style class is safely toggled, and synoptic content is dynamically extracted from the DOM and downloaded.

---

## 3. Verification & Testing

1. **Chapter Sanitization Filter Test**:
   - Tested all 12 chapters through the updated `index.php` filter logic.
   - Result: 12/12 chapters retain `printSynopticTables` and `downloadSynopticMarkdown`.
2. **Master Verification Suite**:
   - Ran `scratch/verify_math_repo_chapters.js`: All 12 chapters passed with 0 errors and balanced tags.
   - Ran `scratch/verify_master_suite.js`: All JS syntax, CSS dependencies, and PHP balances passed with 0 errors.
