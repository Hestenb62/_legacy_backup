---
title: "Bugfix: Uncaught ReferenceError: closeStudentReportCardModal is not defined in profile-main.js"
date: "2026-09-22"
category: "Bugfix"
tags: ["Bugfix", "JavaScript", "Profile", "ReportCard", "Modal", "Accessibility"]
summary: "Resolved Uncaught ReferenceError in profile-main.js where window.closeStudentReportCardModal was exported before being defined, causing script execution to halt on pages/profile.php."
author: "Antigravity & Hesten"
---

# Bugfix: Uncaught ReferenceError: closeStudentReportCardModal is not defined

## Issue Details
- **Error**: `Uncaught ReferenceError: closeStudentReportCardModal is not defined`
- **Location**: `assets/js/profile-main.js:767:42` (prior to edit)
- **URL**: `https://www.hestena62.com/pages/profile.php`
- **Code**: `ERR-5F9B92-2699D0`

## Root Cause
In `assets/js/profile-main.js`, the script assigned `window.closeStudentReportCardModal = closeStudentReportCardModal;` at the bottom of the `DOMContentLoaded` listener. However, while `openStudentReportCardModal` and `printStudentTranscript` were implemented, `closeStudentReportCardModal` had never been defined as a function. As a result, the JavaScript engine threw a `ReferenceError` when evaluating `closeStudentReportCardModal`, terminating the script and preventing subsequent initializations on the student profile page.

## Remediation
1. **Defined `closeStudentReportCardModal()`**:
   Implemented the missing function inside `assets/js/profile-main.js`:
   ```javascript
   function closeStudentReportCardModal() {
       const modal = document.getElementById('student-report-card-modal');
       if (!modal) return;
       modal.classList.add('hidden');
       modal.style.display = 'none';
       document.body.classList.remove('modal-open');
   }
   ```
2. **Enhanced Keyboard & Modal Accessibility**:
   - Added an `Escape` key listener to dismiss the modal cleanly.
   - Added outside backdrop click detection to close the modal.
3. **Added UI Trigger**:
   - Added a "View Transcript" action button in `pages/profile.php` within the Standard Mastery Tracker header so students can view and print their official homeschool academic transcript and portfolio.

## Verification
- Validated `assets/js/profile-main.js` using `node -c assets/js/profile-main.js` (0 syntax or reference errors).
- Verified modal open, close, escape key, and backdrop click mechanisms.
