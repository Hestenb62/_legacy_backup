---
title: "Fix JSON Syntax and Quote Escaping in Standards CCSS Math Dataset"
date: "2026-09-14"
category: "Bugfix"
tags: ["Standards", "CCSS", "Math", "JSON", "Bugfix"]
summary: "Resolved 'Expected comma @L138' error and escaped all internal quotation marks, restored HTML tag closures, and formatted standard identifiers across standards-ccss-math copy.json."
author: "Antigravity & Hesten"
---

# Fix JSON Syntax and Quote Escaping in Standards CCSS Math Dataset

## 1. Problem Overview
While viewing and editing `assets/data/standards-ccss-math copy.json`, an IDE syntax error was triggered:
> `Expected comma @[c:\Users\Heste\OneDrive\Documents\_legacy_backup\assets\data\standards-ccss-math copy.json:L138]`

### Root Cause Analysis
1. **Unescaped Quotes in JSON Strings**:
   Array elements containing HTML markup (such as `"<h4 class="curr-standard-title">..."`) contained unescaped double quotes (`"`). In JSON, the quote after `class=` prematurely terminated the string, leaving trailing unquoted tokens (`curr-standard-title`) without a comma separator.
2. **Missing Closing Tags & Broken Structure**:
   Cluster container tags (`<div>` and `</div>`), standard heading tags (`</h4>`), and paragraph tags (`</p>`) were either stripped or replaced with empty strings (`""`), violating expected markup structure.
3. **Internal Literal Quotes**:
   Phrases such as `"Understand concept of "more" or "less""` and `called a "ten."` contained raw unescaped quotes inside JSON strings.
4. **LaTeX Backslash Escapes**:
   Mathematical formulas containing unescaped LaTeX symbols (e.g. `\pi`) threw `Bad escaped character in JSON` because `\p` is not a valid JSON escape sequence without a double backslash (`\\pi`).

---

## 2. Changes & Remediation
- **Quote Escaping**: Escaped all internal double quotes across all 14 grade levels (`Pre-K` through `12th Grade`) using `\"`.
- **HTML Markup Restored**:
  - Restored `<div class=\"curr-standard-item\">` and `"</div>"` container wrappers.
  - Restored `<h4 class=\"curr-standard-title\">...</h4>` headings.
  - Restored `<p class=\"curr-standard-desc\"><strong>CODE:</strong> ...</p>` formatting for standards and sub-standards (`4a`, `4b`, `7c`, etc.).
- **LaTeX Math Backslashes**: Properly escaped all LaTeX control characters (e.g., `\\pi`, `\\frac`, `\\sqrt`).
- **Validation**: Executed `JSON.parse` across all 14 grade levels in `standards-ccss-math copy.json` and verified 100% syntactical compliance.

---

## 3. Verification
- `node -e "JSON.parse(fs.readFileSync('assets/data/standards-ccss-math copy.json', 'utf8'))"` passed with 0 errors.
- Verified all 14 grades (`Pre-K` through `12th Grade`) with active standard badges and descriptions.
