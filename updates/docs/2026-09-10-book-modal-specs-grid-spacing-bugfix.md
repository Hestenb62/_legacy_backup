---
title: "Bugfix: Eliminate Empty Leading Slot in Book Overview Modal Specs Grid"
date: "2026-09-10"
category: "Bugfix"
tags: ["Library", "Modals", "CSS Grid", "UI Fix"]
summary: "Removed an extraneous decorative element from the library book modal specs grid that caused an empty slot at the top-left of the info table, ensuring publication and metadata fields fill in seamlessly."
author: "Antigravity & Hesten"
---

# Bugfix: Eliminate Empty Leading Slot in Book Overview Modal Specs Grid

## Root Cause
In [`library/modals.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/modals.php), the `.library-modal-specs-grid` container (a 2-column CSS grid) contained an empty `<div class="library-modal-specs-decor"></div>` as its very first child.

Because CSS grid places direct children sequentially into grid tracks, this empty element consumed column 1 of row 1, leaving the top-left cell completely vacant. As a result:
- "PUBLISHED" was pushed to column 2 of row 1.
- "ISBN" was pushed to column 1 of row 2.
- "LEXILE MEASURE" was pushed to column 2 of row 2.
- "DEWEY DECIMAL" was pushed to column 1 of row 3.
- "LIBRARY OF CONGRESS" was pushed to column 2 of row 3.

## Resolution
- Removed `<div class="library-modal-specs-decor"></div>` from `.library-modal-specs-grid` in [`library/modals.php`](file:///c:/Users/Heste/OneDrive/Documents/_legacy_backup/library/modals.php).
- All metadata fields are now pushed back into natural order starting at cell (1, 1):
  - **Row 1**: Published (left), ISBN (right)
  - **Row 2**: Lexile Measure (left), Dewey Decimal (right)
  - **Row 3**: Library of Congress (left)
  - **Row 4**: Aligned Curriculum Tracks (full 2-column span when populated)
- The entire info table is now cleanly filled without empty leading space.
