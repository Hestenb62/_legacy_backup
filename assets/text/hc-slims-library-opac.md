# Senayan Library Management System (SLiMS) OPAC & Deep-Linked Bibliographic Pages

## Senayan Library Management System (SLiMS) OPAC Portal & Deep-Linked Bibliographic Pages

### Executive Overview
The Hesten's Learning **Digital Library** (`/library/index.php`) features an institutional Online Public Access Catalog (OPAC) interface inspired by the open-source **Senayan Library Management System (SLiMS)**. Designed for K-12 students, academic researchers, and educators, the SLiMS OPAC provides professional bibliographic categorization, multi-field catalog searching, real-time collection counts, and full-page bibliographic record overlays with dedicated `#book-{id}` URL deep-linking.

---

### Core Capabilities & SLiMS Features

1. **SLiMS OPAC Search Console & Field Scoping**:
   - **Targeted Field Scopes**: Search across **All Fields**, **Title**, **Author**, **Subject**, **Call Number**, or **ISBN**.
   - **Keyboard Shortcut**: Press `/` from anywhere on the catalog page to instantly focus the OPAC search bar. Press `Esc` to clear search or dismiss focus.
   - **Trending Topic Chips**: One-click quick filters for popular academic categories: *Fiction*, *US History*, *World History*, *STEM*, *Science*, *Civics*, and *⭐ Saved Items*.
   - **Live Bibliographic Counter**: Real-time counter badge indicating `Showing N bibliographic records` matching active query filters.

2. **SLiMS General Material Designation (GMD) & Spine Call Numbers**:
   - Every book card displays a SLiMS GMD tag (e.g., `[Text]`, `[E-Book]`, `[Collection]`).
   - SLiMS spine call number tags (e.g., `PR6029.R8 N5`, `BD581 .H4`, `E178.1 .A44`) provide immediate academic classification.
   - Live availability status indicator pill (`Available` with pulsating green stack status dot).

3. **Full-Page Bibliographic Record Overlays ("Own Page" Experience)**:
   - **Dedicated URL Deep Links**: Opening any book updates the browser URL hash to `#book-{id}` (e.g. `https://yoursite.com/library/#book-dracula`).
   - **Direct Deep Linking**: Visiting or sharing a URL with `#book-{id}` automatically opens that specific bibliographic record page on initial load.
   - **Browser Navigation Integration**: The browser's Back and Forward buttons seamlessly navigate into and out of book detail pages without losing page scroll or filter state.
   - **Clean Dismissal**: Closing the record page via `< Back to Catalog`, the `✕` button, or `Esc` clears the URL hash and returns focus smoothly.
   - **One-Click Share Link**: Copy the direct deep-linked URL to clipboard with live confirmation toast.

4. **Academic Bibliographic Tabs (4-Tab Workspace)**:
   - **Tab 1: Bibliographic Information**: Essential catalog metadata including Call Number, Standard Number (ISBN), Publication / Release Date, and Digital Sourcing & Repository.
   - **Tab 2: Abstract / Notes**: Complete literary abstract, pedagogical overview, and curriculum alignment links.
   - **Tab 3: Electronic Formats**: Dedicated cards for DRM-free digital downloads including PDF, Volume 2 PDF, ePUB 3.0, Kindle MOBI, and accessible Plain Text (TXT).
   - **Tab 4: Barcode / Inventory**: Authentic SLiMS Code-128 vector barcode visual, item barcode identifier (`HL-[ID]-01`), call number, repository location, one-click code copy, and label print actions staged for upcoming revisions.

5. **Multi-Format Electronic Resources & Citations**:
   - Direct launch to in-browser single-column chapter reader.
   - Dual-volume support for multi-volume publications (e.g., *The American Yawp*, *History of Woman Suffrage*).
   - Academic citation modal supporting APA 7th, MLA 9th, and Chicago 17th editions.
   - Dedicated Sourcing and Content Disclaimer modal with licensing details.

---

### Keyboard Shortcuts & Action Controls

| Action | Control / Shortcut | Description |
| :--- | :--- | :--- |
| **Focus OPAC Search** | `/` (Slash) | Jumps cursor into the OPAC search box from anywhere |
| **Clear / Exit Search** | `Esc` | Clears active query and restores full catalog |
| **Open Book Detail Page** | `Enter` / `Space` on Card | Launches full-page bibliographic overlay and sets `#book-{id}` |
| **Close Detail Page** | `Esc` or `< Back to Catalog` | Closes overlay, clears URL hash, and returns focus |
| **Browser Back Button** | `Alt + Left Arrow` / Back | Closes the book detail overlay and updates URL |
| **Browser Forward Button** | `Alt + Right Arrow` / Forward | Reopens the previously viewed bibliographic record |
| **Share Link** | `Share Link` Button | Copies direct `#book-{id}` URL to clipboard |
| **Bookmark Title** | Star Button / `B` | Toggles item in student's offline reading list |
| **Switch Tabs in Overlay** | `Tab` + `Enter` on Tab | Switches between Bibliographic Info, Abstract, Holdings, Author |

---

### Accessibility & Universal Design for Learning (UDL)

- **Strict WCAG 2.1/2.2 AA & AAA Compliance**:
  - Focus trapping and restoration when entering and exiting the full-page bibliographic overlay.
  - High-contrast `:focus-visible` outlines (amber/gold in high contrast mode; sky blue in standard mode).
  - Minimum 4.5:1 text contrast ratio in light/dark themes and ≥7:1 in AAA high contrast mode.
- **Screen Reader Semantics**:
  - `role="dialog"` and `aria-modal="true"` with dynamic `aria-labelledby="modalTitle"` on bibliographic overlay.
  - SLiMS holdings tables have accessible `<th>` headers with `scope="col"` and clear textual statuses.
  - Live regions (`aria-live="polite"`) announce search filter count changes and clipboard copy events.
- **Universal Design for Learning (UDL)**:
  - **Multiple Means of Representation**: High-resolution cover art, MARC metadata, structured abstracts, audio read-aloud support, and multi-format electronic downloads (TXT, ePUB, PDF).
  - **Multiple Means of Action & Expression**: 100% keyboard navigable without a mouse, URL hash deep linking for easy sharing in student assignments.
  - **Multiple Means of Engagement**: Personalized bookmarks, reading progress tracking, low-distraction single-column reader modes.
- **Mobile Responsive Design**:
  - Reflows gracefully from 320px mobile displays up to 4K ultra-wide monitors without horizontal scrollbars.
  - Sticky OPAC navigation header ensures back button and share link are always within thumb's reach on mobile.
