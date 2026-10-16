---
title: "Hesten's Learning Library Redesign and Deep-Linked Hash Book Detail Page Popup"
date: "2026-10-16"
version: "v2.18.0"
category: "Implementation Plan"
tags: ["Library", "Hesten's Learning", "Catalog", "Hash Routing", "Deep Linking", "WCAG", "UDL"]
summary: "Comprehensive redesign of the main library portal into Hesten's Learning Library, coupled with an expansive page-like book detail popup featuring URL hash deep-linking (#book-id), browser history synchronization, and bibliographic holdings tables."
author: "Antigravity & Hesten"
---

# Hesten's Learning Library Redesign and Deep-Linked Hash Book Detail Page Popup

## 1. Executive Overview
The objective is to transform the main library portal (`/library/index.php`) into **Hesten's Learning Library**, and re-engineer the book overview modal so that it functions as a **dedicated bibliographic detail page** presented in an accessible, closable overlay with **first-class URL hash routing (`#book-{id}`)** and browser navigation synchronization.

## 2. Key Objectives & Architecture

### A. Senayan Library Management System (SLiMS) OPAC Aesthetics & Features
- **SLiMS Institutional Header & OPAC Hero**:
  - Institutional library branding bar: "Hesten's Learning Library OPAC" • "Automated Library Management System".
  - Distinctive SLiMS OPAC search center with scope filter (All Fields, Title, Author, Subject, Call Number, ISBN).
  - Quick trending search chips (Classic Fiction, US History, World History, STEM & Math, Science, Civics, Saved Books).
  - Live catalog record counter ("Showing X bibliographic titles in collection").
- **SLiMS Book Card & Bibliographic List Item**:
  - Prominent Library Spine Call Number label (e.g. `PR6029.R8 N56 1949` or `823.914`).
  - GMD Tag (General Material Designation): `[Text]`, `[E-Book]`, `[Digital Monograph]`.
  - Author attribution with icon (`by <Author>`).
  - SLiMS Item Availability Indicator: Signature green pill `✔ Available in Digital Stacks` with glowing status dot.
  - Action buttons: "Detail Bibliografi", "Read Online", and "Save".

### B. Book Detail "Own Page" Popup with URL Hash Routing
- **Full Page-Like Experience in an Overlay**:
  - Top Sticky Navigation Bar:
    - Breadcrumb trail: `Library OPAC` > `<Category>` > `<Book Title>`.
    - `< Back to Catalog` button (with `Esc` shortcut hint).
    - "Bibliographic Detail Record" badge with Call Number.
    - "Share Direct Link" button (copies `#book-{id}` URL with visual confirmation).
    - Save to Reading List button.
    - Large accessible Close `✕` button.
  - SLiMS Bibliographic Detail Structure:
    - **Left Media Column**: 3D spine cover, Call Number tag, SLiMS Availability card, primary "Read Online / Continue Reading" button, dual volume links, file download formats (PDF, ePUB, MOBI, TXT), citation & sourcing triggers.
    - **Right Bibliographic Column**: Title Proper & Subtitle, Author statement, SLiMS MARC-style Bibliographic Information Table, Synopsis/Abstract, SLiMS Item Availability & Holdings Table (`HL-[ID]-001`, Call Number, Stacks Location, Status `✔ Available`), and Author & Historical Context (Why written, How composed, Curriculum tracks).
- **URL Hash Synchronization (`#book-{id}` and `#{id}`)**:
  - When opening a book, updates URL hash to `#book-${bookId}` via `history.pushState`.
  - When pressing Browser Back button, `hashchange`/`popstate` automatically closes the popup cleanly without reloading.
  - Deep linking: Direct visits to `/library/#book-1984` or `/library/#1984` automatically detect the hash and open the book's popup on load.
  - When closing via `< Back to Catalog`, `✕`, backdrop, or `Esc`, clears the hash cleanly.

### C. Compliance & Platform Sync
- **WCAG 2.1/2.2 AA & AAA & UDL**: Keyboard operability, `:focus-visible` rings, high-contrast support, screen reader semantics.
- **Platform Version Sync**: Bump to `v2.18.0` in `src/header.php` and `src/footer.php`.
- **Help Center Article**: Create `assets/text/hc-slims-library-opac.md`.
- **Documentation**: Save this plan and subsequent walkthrough in `updates/docs/`.
