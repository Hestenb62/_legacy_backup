<?php
// Initialize session securely for teacher authentication
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Determine requested chapter
if (empty($chapter)) {
    if (isset($_GET['chapter']) && $_GET['chapter'] !== '') {
        $chapter = preg_replace('/[^a-zA-Z0-9\-]/', '', $_GET['chapter']);
    } else {
        $chapter = 'chapter-1';
    }
}

$chapterNum = 1;
if (preg_match('/^chapter-(\d+)$/', $chapter, $matches)) {
    $chapterNum = intval($matches[1]);
} else {
    $chapter = 'chapter-1';
}

$totalChapters = 26; // 25 chapters + 1 teacher resources (chapter-26)
$teacherUnlocked = isset($_SESSION['teacher_unlocked']) && $_SESSION['teacher_unlocked'] === true;
$authError = '';

// 2. Handle teacher password authorization
if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['teacher_password'])) {
    if (trim($_POST['teacher_password']) === '8675309') {
        $_SESSION['teacher_unlocked'] = true;
        $teacherUnlocked = true;
        header('Location: /library/read/reader.php?book=1984&chapter=chapter-26');
        exit;
    } else {
        $authError = 'Incorrect answer. Access Denied.';
    }
}

// 3. Resolve chapter file path
$chapterFile = __DIR__ . '/' . $chapter . '.php';
if (!is_file($chapterFile)) {
    $chapter = 'chapter-1';
    $chapterNum = 1;
    $chapterFile = __DIR__ . '/chapter-1.php';
}

// 4. Extract chapter content
$chapterHtml = file_get_contents($chapterFile);
$contentHtml = '';
if (preg_match('/<div class="cdn-book-reader-content">(.*?)<\/div>\s*<nav class="reader-chapter-nav"/is', $chapterHtml, $matches)) {
    $contentHtml = $matches[1];
} else {
    // Fallback search patterns
    if (preg_match('/<div class="cdn-book-reader-content">(.*?)<\/div>/is', $chapterHtml, $matches)) {
        $contentHtml = $matches[1];
    } else {
        $contentHtml = '<p>Error: Could not parse chapter content structure.</p>';
    }
}

// --- Page-Specific Variables ---
$pageTitle = "1984 - " . ($chapterNum === 26 ? "Teacher Resources" : "Chapter " . $chapterNum) . " | Hesten's Learning";
$pageDescription = "Read 1984 by George Orwell online at Hesten's Learning e-library, with full accessibility support.";
$pageKeywords = "ebook, online reader, 1984, George Orwell, accessible reading";
$pageAuthor = "Hesten Allison";

// Include Global Header
include __DIR__ . '/../../../src/header.php';
?>

<!-- Include Core Library CSS -->
<link rel="stylesheet" href="/library/library.css">

<!-- Reader Specific Styles -->
<style>
  /* Clean Reader Layout */
  #reader-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 2rem;
  }

  /* Progress Bar */
  #progress-bar-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 4px;
    background-color: var(--color-base-bg, #eee);
    z-index: 1001;
  }

  #progress-bar {
    height: 100%;
    width: 0;
    background: linear-gradient(to right, var(--color-primary), var(--color-secondary));
    transition: width 0.1s ease-out;
  }

  /* Sticky Header for Controls */
  #reader-controls {
    position: sticky;
    top: 0;
    z-index: 50;
    background-color: var(--color-base-bg);
    border-bottom: 1px solid var(--color-text-secondary);
    padding: 1rem 0;
    margin-bottom: 2rem;
    transition: background-color 0.3s;
  }

  /* Add backdrop blur for premium feel if supported */
  @supports (backdrop-filter: blur(10px)) {
    #reader-controls {
      background-color: transparent;
      backdrop-filter: blur(10px);
    }
  }

  /* Typography Enhancements */
  #book-content p {
    margin-bottom: 1.5em;
    text-align: justify;
  }

  /* Disable justify for Dyslexic font */
  body.font-dyslexic #book-content p {
    text-align: left;
  }

  /* Tooltip Styling */
  .tooltip {
    position: relative;
    display: inline-block;
    cursor: help;
    border-bottom: 2px dotted var(--color-accent);
    color: var(--color-primary);
    font-weight: 600;
  }

  .tooltip .tooltiptext {
    visibility: hidden;
    width: 240px;
    background-color: var(--color-content-bg, #ffffff);
    color: var(--color-text-default);
    border: 1px solid var(--color-text-secondary);
    text-align: center;
    border-radius: 12px;
    padding: 12px;
    position: absolute;
    z-index: 100;
    bottom: 140%;
    left: 50%;
    transform: translateX(-50%);
    opacity: 0;
    transition: opacity 0.3s, transform 0.3s, bottom 0.3s;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    font-weight: 500;
    font-size: 0.95em;
    line-height: 1.4;
    pointer-events: auto;
    display: flex;
    flex-direction: column;
    gap: 10px;
  }

  /* Transparent bridge to maintain hover state */
  .tooltip .tooltiptext::after {
    content: "";
    position: absolute;
    bottom: -30px;
    left: 0;
    width: 100%;
    height: 35px;
    background: transparent;
  }

  .tooltip:hover .tooltiptext {
    visibility: visible;
    opacity: 1;
    bottom: 130%;
  }

  /* Tooltip Action Buttons */
  .tooltip-actions {
    display: flex;
    justify-content: center;
    gap: 10px;
    border-top: 1px solid var(--color-text-secondary);
    padding-top: 10px;
    margin-top: 4px;
  }

  .tooltip-btn {
    background: var(--color-primary);
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 0.85rem;
    transition: all 0.2s ease;
    display: flex;
    align-items: center;
    gap: 6px;
  }

  .tooltip-btn:hover {
    background: var(--color-secondary);
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .tooltip-btn i {
    font-size: 0.9rem;
  }

  /* Chapter Navigation styling */
  .chapter-section {
    display: none;
  }

  .chapter-section.active {
    display: block !important;
    animation: fadeIn 0.5s ease-in-out;
  }

  .teacher-only.chapter-section {
    border: none !important;
    padding: 0 !important;
    background: transparent !important;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(10px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Go To Top */
  #go-to-top-btn {
    display: none;
    position: fixed;
    bottom: 90px;
    right: 24px;
    z-index: 99;
    padding: 12px;
    border-radius: 50%;
    background: var(--color-primary);
    color: white;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    transition: transform 0.2s, opacity 0.2s;
    border: none;
    cursor: pointer;
  }

  #go-to-top-btn:hover {
    transform: translateY(-2px);
  }

  /* TOC Modal Styles */
  #toc-modal {
    position: fixed;
    inset: 0;
    z-index: 2000;
    background: rgba(0, 0, 0, 0.4);
    backdrop-filter: blur(8px);
    display: none;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
  }

  #toc-modal.active {
    display: flex;
    animation: fadeInModal 0.3s forwards;
  }

  @keyframes fadeInModal {
    from {
      opacity: 0;
      transform: scale(0.95);
    }
    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  .toc-content {
    background: var(--color-base-bg);
    width: 90%;
    max-width: 600px;
    max-height: 80vh;
    border-radius: 24px;
    padding: 2rem;
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    border: 1px solid var(--color-text-secondary);
    overflow-y: auto;
    position: relative;
  }

  .toc-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    border-bottom: 2px solid var(--color-primary);
    padding-bottom: 1rem;
  }

  .toc-close {
    background: transparent;
    border: none;
    color: var(--color-text-default);
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0.5rem;
    transition: color 0.2s;
  }

  .toc-close:hover {
    color: var(--color-secondary);
  }

  .toc-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
    gap: 1rem;
  }

  .toc-link {
    display: block;
    padding: 1rem;
    background: var(--color-content-bg);
    border: 1px solid var(--color-text-secondary);
    border-radius: 12px;
    text-align: center;
    font-weight: bold;
    color: var(--color-text-default);
    transition: all 0.2s;
    cursor: pointer;
    text-decoration: none;
  }

  .toc-link:hover {
    background: var(--color-primary);
    color: white;
    border-color: var(--color-primary);
    transform: translateY(-2px);
  }

  .toc-link.active {
    background: var(--color-secondary);
    color: white;
    border-color: var(--color-secondary);
  }

  .toc-teacher-btn {
    grid-column: span 2;
    background-color: var(--color-accent);
    color: white !important;
    border-color: var(--color-accent) !important;
  }

  .toc-teacher-btn:hover {
    background-color: var(--color-primary) !important;
    border-color: var(--color-primary) !important;
  }

  .toc-locked-item {
    padding: 1rem;
    text-align: center;
    border-radius: 12px;
    border: 1px dashed var(--color-border);
    opacity: 0.5;
    background-color: var(--color-base-bg);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 0.25rem;
  }

  .toc-locked-item span {
    font-weight: bold;
    font-size: 0.85rem;
  }

  /* Aurora Background */
  .reader-bg-wrapper {
    position: fixed;
    inset: 0;
    overflow: hidden;
    pointer-events: none;
    z-index: -10;
    background-color: var(--color-base-bg);
    transition: background-color 0.5s ease;
  }

  .reader-blob {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    opacity: 0.15;
    will-change: transform;
  }

  .blob-1 {
    top: -20%;
    left: -10%;
    width: 70vw;
    height: 70vw;
    background-color: var(--color-primary);
  }

  .blob-2 {
    top: 20%;
    right: -10%;
    width: 60vw;
    height: 60vw;
    background-color: var(--color-secondary);
  }

  .blob-3 {
    bottom: -20%;
    left: 20%;
    width: 50vw;
    height: 50vw;
    background-color: var(--color-accent);
  }

  /* Layout Shell */
  .reader-main-content {
    min-height: 100vh;
    position: relative;
    z-index: 10;
    padding-bottom: 5rem;
  }

  .reader-page-header {
    text-align: center;
    margin-top: 3rem;
    margin-bottom: 3rem;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .reader-mode-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.75rem;
    border-radius: 9999px;
    background-color: var(--color-content-bg);
    border: 1px solid var(--color-border);
    padding: 0.5rem 1.25rem;
    font-size: 0.75rem;
    font-weight: 700;
    margin-bottom: 2rem;
    box-shadow: var(--shadow-sm);
  }

  .pulse-indicator {
    position: relative;
    display: flex;
    height: 0.5rem;
    width: 0.5rem;
  }

  .pulse-ring {
    position: absolute;
    display: inline-flex;
    height: 100%;
    width: 100%;
    border-radius: 50%;
    background-color: var(--color-primary);
    opacity: 0.75;
    animation: ping 1.2s cubic-bezier(0, 0, 0.2, 1) infinite;
  }

  .pulse-dot {
    position: relative;
    display: inline-flex;
    border-radius: 50%;
    height: 0.5rem;
    width: 0.5rem;
    background-color: var(--color-primary);
  }

  .badge-text {
    letter-spacing: 0.15em;
    text-transform: uppercase;
    color: var(--color-text-secondary);
  }

  .reader-page-title {
    font-family: var(--site-font-family, 'Outfit', sans-serif);
    font-size: clamp(3rem, 8vw, 4.5rem);
    font-weight: 900;
    letter-spacing: -0.03em;
    margin-bottom: 1rem;
    line-height: 0.95;
    background: linear-gradient(135deg, var(--color-primary), var(--color-secondary), var(--color-accent));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
  }

  .reader-page-author {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-text-secondary);
    margin: 0;
  }

  /* Control Navigation Bar */
  #reader-controls {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    border: 1px solid var(--color-border);
    border-radius: 1.5rem;
    background-color: var(--color-content-bg);
    box-shadow: var(--shadow-lg);
    padding: 1rem 1.5rem;
    margin-bottom: 3rem;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
  }

  @media (min-width: 640px) {
    #reader-controls {
      flex-direction: row;
      border-radius: 9999px;
    }
  }

  .controls-nav-group {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background-color: var(--color-base-bg);
    padding: 0.35rem;
    border-radius: 1rem;
    border: 1px solid var(--color-border);
  }

  @media (min-width: 640px) {
    .controls-nav-group {
      border-radius: 9999px;
    }
  }

  .controls-nav-btn {
    background-color: var(--color-content-bg);
    color: var(--color-text-default);
    border: 1px solid var(--color-border);
    padding: 0.5rem 1rem;
    border-radius: 0.75rem;
    font-weight: 700;
    font-size: 0.85rem;
    cursor: pointer;
    transition: all 0.2s ease;
    text-decoration: none;
  }

  @media (min-width: 640px) {
    .controls-nav-btn {
      border-radius: 9999px;
    }
  }

  .controls-nav-btn:hover:not(.disabled) {
    background-color: var(--color-border);
  }

  .controls-nav-btn.disabled {
    opacity: 0.5;
    cursor: not-allowed;
    pointer-events: none;
  }

  /* TTS Speaking controls */
  .controls-speech-group {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .speech-btn {
    background-color: var(--color-text-default);
    color: var(--color-base-bg);
    border: none;
    padding: 0.65rem 1.25rem;
    border-radius: 0.75rem;
    font-weight: 700;
    font-size: 0.85rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.2s ease;
  }

  @media (min-width: 640px) {
    .speech-btn {
      border-radius: 9999px;
    }
  }

  .speech-btn:hover {
    transform: translateY(-1px);
    filter: brightness(1.1);
  }

  .speech-btn-stop {
    background-color: rgba(239, 68, 68, 0.1);
    color: #ef4444;
    border: 1px solid rgba(239, 68, 68, 0.2);
  }

  .speech-btn-stop:hover {
    background-color: rgba(239, 68, 68, 0.2);
  }

  /* Right-side tools panel */
  .controls-tools-group {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    position: relative;
  }

  .tool-btn {
    background-color: var(--color-base-bg);
    border: 1px solid var(--color-border);
    padding: 0.65rem 1rem;
    border-radius: 0.75rem;
    cursor: pointer;
    transition: all 0.2s ease;
    font-size: 0.95rem;
  }

  @media (min-width: 640px) {
    .tool-btn {
      border-radius: 9999px;
    }
  }

  .tool-btn-vocab {
    color: var(--color-accent);
  }

  .tool-btn-settings {
    color: var(--color-secondary);
  }

  .tool-btn-toc {
    color: var(--color-primary);
    font-weight: 700;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    padding: 0.65rem 1.25rem;
  }

  .tool-btn:hover {
    background-color: var(--color-border);
    transform: translateY(-1px);
  }

  /* Settings Dropdown Panel styling */
  #settings-panel {
    position: absolute;
    top: 130%;
    right: 0;
    width: 18rem;
    background-color: var(--color-content-bg);
    border: 1px solid var(--color-border);
    border-radius: 1.25rem;
    box-shadow: var(--shadow-xl);
    padding: 1.5rem;
    z-index: 100;
    transition: opacity 0.3s ease, transform 0.3s ease;
    text-align: left;
  }

  #settings-panel.hidden {
    display: none !important;
  }

  .settings-section-title {
    font-size: 0.7rem;
    font-weight: 800;
    color: var(--color-text-secondary);
    text-transform: uppercase;
    letter-spacing: 0.15em;
    margin-bottom: 0.75rem;
    margin-top: 0;
  }

  .settings-btn-row {
    display: flex;
    gap: 0.5rem;
    background-color: var(--color-base-bg);
    padding: 0.25rem;
    border-radius: 0.75rem;
    margin-bottom: 1.25rem;
  }

  .settings-row-btn {
    flex: 1;
    background: transparent;
    border: none;
    padding: 0.4rem 0;
    font-size: 0.8rem;
    font-weight: 700;
    color: var(--color-text-secondary);
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .settings-row-btn.active {
    background-color: var(--color-content-bg);
    color: var(--color-text-default);
    box-shadow: var(--shadow-sm);
  }

  .theme-dots-row {
    display: flex;
    justify-content: space-around;
    padding: 0 0.5rem;
    margin-bottom: 0.5rem;
  }

  .theme-dot-btn {
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 50%;
    border: 2px solid transparent;
    cursor: pointer;
    transition: all 0.2s ease;
    box-shadow: var(--shadow-sm);
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .theme-dot-btn:hover {
    transform: scale(1.08);
  }

  .theme-dot-btn.active {
    border-color: var(--color-primary);
  }

  .dot-default {
    background-color: #ffffff;
  }

  .dot-sepia {
    background-color: #f4ecd8;
  }

  .dot-oled {
    background-color: #000000;
  }

  /* Modals general overlay styling */
  .modal-overlay {
    position: fixed;
    inset: 0;
    z-index: 2000;
    background-color: rgba(15, 23, 42, 0.4);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 1rem;
    transition: opacity 0.3s ease;
  }

  .modal-overlay.hidden {
    display: none !important;
  }

  .modal-card {
    background-color: var(--color-content-bg);
    border: 1px solid var(--color-border);
    border-radius: 1.5rem;
    width: 100%;
    box-shadow: var(--shadow-xl);
    transition: transform 0.3s ease, opacity 0.3s ease;
    display: flex;
    flex-direction: column;
  }

  .modal-card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1.5rem;
    border-bottom: 1px solid var(--color-border);
  }

  .modal-card-title {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .modal-icon-circle {
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .circle-vocab {
    background-color: rgba(16, 185, 129, 0.1);
    color: #10b981;
  }

  .circle-lock {
    background-color: rgba(99, 102, 241, 0.1);
    color: #6366f1;
  }

  .modal-card-close-btn {
    width: 2rem;
    height: 2rem;
    border-radius: 50%;
    background-color: var(--color-base-bg);
    color: var(--color-text-secondary);
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
  }

  .modal-card-close-btn:hover {
    background-color: var(--color-border);
    color: var(--color-text-default);
  }

  /* Vocab Modal Card list style */
  .vocab-list {
    padding: 1.5rem;
    overflow-y: auto;
    max-height: 55vh;
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .vocab-card {
    background-color: var(--color-base-bg);
    border: 1px solid var(--color-border);
    border-radius: 1rem;
    padding: 1.25rem;
    box-shadow: var(--shadow-sm);
    text-align: left;
  }

  .vocab-term {
    font-family: var(--site-font-family, 'Outfit', sans-serif);
    font-size: 1.1rem;
    font-weight: 800;
    color: var(--color-primary);
    margin-top: 0;
    margin-bottom: 0.5rem;
    text-transform: capitalize;
  }

  .vocab-definition {
    font-size: 0.9rem;
    line-height: 1.6;
    color: var(--color-text-secondary);
    margin: 0;
  }

  /* Highlight selection toolbar */
  #highlight-toolbar {
    position: fixed;
    z-index: 200;
    background-color: #1e293b;
    color: #ffffff;
    padding: 0.25rem;
    border-radius: 0.75rem;
    box-shadow: var(--shadow-xl);
    display: flex;
    align-items: center;
    gap: 0.25rem;
    transform: translate(-50%, -100%);
    transition: opacity 0.2s ease;
  }

  #highlight-toolbar.hidden {
    display: none !important;
  }

  .hl-btn {
    background: transparent;
    color: #ffffff;
    border: none;
    padding: 0.5rem 0.75rem;
    font-size: 0.8rem;
    font-weight: 700;
    border-radius: 0.5rem;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.4rem;
    transition: background-color 0.2s ease;
  }

  .hl-btn:hover {
    background-color: rgba(255, 255, 255, 0.1);
  }

  .hl-divider {
    width: 1px;
    height: 1.25rem;
    background-color: rgba(255, 255, 255, 0.15);
  }

  /* Teacher Authentication Access Modal styling */
  .auth-body {
    padding: 2rem;
    text-align: center;
  }

  .auth-input {
    width: 100%;
    border-radius: 0.75rem;
    border: 1px solid var(--color-border);
    background-color: var(--color-base-bg);
    padding: 1rem;
    text-align: center;
    font-size: 1.5rem;
    letter-spacing: 0.2em;
    font-family: monospace;
    outline: none;
    box-shadow: inset var(--shadow-sm);
    color: var(--color-text-default);
  }

  .auth-input:focus {
    border-color: var(--color-primary);
    box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.2);
  }

  .auth-error {
    color: #ef4444;
    font-size: 0.85rem;
    font-weight: 700;
    margin-top: 0.75rem;
    display: block;
  }

  .auth-error.hidden {
    display: none !important;
  }

  .auth-actions {
    display: flex;
    gap: 0.75rem;
    margin-top: 2rem;
  }

  .auth-btn {
    flex: 1;
    padding: 0.75rem 0;
    font-weight: 700;
    font-size: 0.85rem;
    border-radius: 0.75rem;
    cursor: pointer;
    transition: all 0.2s ease;
    border: none;
  }

  .auth-btn-cancel {
    background-color: var(--color-base-bg);
    color: var(--color-text-secondary);
    border: 1px solid var(--color-border);
  }

  .auth-btn-cancel:hover {
    background-color: var(--color-border);
  }

  .auth-btn-submit {
    background-color: var(--color-primary);
    color: #ffffff;
  }

  .auth-btn-submit:hover {
    filter: brightness(1.08);
  }
</style>

<!-- AURORA MESH BACKGROUND -->
<div class="reader-bg-wrapper">
    <div class="reader-blob blob-1"></div>
    <div class="reader-blob blob-2"></div>
    <div class="reader-blob blob-3"></div>
</div>

<!-- Progress Bar -->
<div id="progress-bar-container">
  <div id="progress-bar"></div>
</div>

<main id="main-content" class="reader-main-content">
  <div id="reader-container">

    <!-- Title / Header -->
    <header class="reader-page-header animate-reveal">
      <div class="reader-mode-badge">
        <span class="pulse-indicator">
          <span class="pulse-ring"></span>
          <span class="pulse-dot"></span>
        </span>
        <span class="badge-text"><i class="fas fa-book-open"></i> Reader Mode</span>
      </div>
      <h1 class="reader-page-title">1984</h1>
      <p class="reader-page-author">by George Orwell</p>
    </header>

    <!-- Fixed Controls Bar -->
    <nav id="reader-controls">
      <?php
      $prevChapterNum = $chapterNum - 1;
      $nextChapterNum = $chapterNum + 1;
      $hasPrev = $prevChapterNum >= 1;
      $hasNext = $nextChapterNum <= $totalChapters;
      ?>
      <!-- Left: Prev/Next -->
      <div class="controls-nav-group">
        <a href="<?php echo $hasPrev ? "/library/read/reader.php?book=1984&chapter=chapter-$prevChapterNum" : '#'; ?>" 
           id="prev-chapter" 
           class="controls-nav-btn <?php echo !$hasPrev ? 'disabled' : ''; ?>" 
           aria-label="Previous Chapter">
          <i class="fas fa-chevron-left"></i> Pre
        </a>
        <span id="current-chapter"><?php echo $chapterNum === 26 ? 'Teacher' : 'Ch ' . $chapterNum; ?></span>
        <a href="<?php echo $hasNext ? "/library/read/reader.php?book=1984&chapter=chapter-$nextChapterNum" : '#'; ?>" 
           id="next-chapter" 
           class="controls-nav-btn <?php echo !$hasNext ? 'disabled' : ''; ?>" 
           aria-label="Next Chapter">
          Nxt <i class="fas fa-chevron-right"></i>
        </a>
      </div>

      <!-- Center: TTS -->
      <div class="controls-speech-group">
        <button id="tts-speak-btn" class="speech-btn">
          <i class="fas fa-play"></i> Listen Voice
        </button>
        <button id="tts-stop-btn" class="speech-btn speech-btn-stop hidden">
          <i class="fas fa-stop"></i> Stop Voice
        </button>
      </div>

      <!-- Right: Tools & TOC -->
      <div class="controls-tools-group">
        <button id="open-vocab-btn" class="tool-btn tool-btn-vocab" title="Study Guide">
          <i class="fas fa-book-reader"></i>
        </button>
        <button id="open-settings-btn" class="tool-btn tool-btn-settings" title="Reader Settings">
          <i class="fas fa-font"></i>
        </button>
        <button id="open-toc-modal" class="tool-btn tool-btn-toc">
          <i class="fas fa-list-ol"></i> Chapters
        </button>

        <!-- Settings Dropdown Panel -->
        <div id="settings-panel" class="hidden">
            <h4 class="settings-section-title">Typography</h4>
            <div class="settings-btn-row">
                <button class="settings-row-btn active settings-font" data-font="font-sans">Sans</button>
                <button class="settings-row-btn settings-font font-serif" data-font="font-serif">Serif</button>
                <button class="settings-row-btn settings-font" data-font="font-dyslexic" style="font-family: 'OpenDyslexic', sans-serif;">Dyslexic</button>
            </div>
            
            <h4 class="settings-section-title">Text Size</h4>
            <div class="settings-btn-row">
                <button class="settings-row-btn settings-size" data-size="prose-base">A-</button>
                <button class="settings-row-btn active settings-size" data-size="prose-lg">Aa</button>
                <button class="settings-row-btn settings-size" data-size="prose-2xl">A+</button>
            </div>

            <h4 class="settings-section-title">Theme</h4>
            <div class="theme-dots-row">
                <button class="theme-dot-btn active dot-default settings-theme" data-theme="default" title="Default"></button>
                <button class="theme-dot-btn dot-sepia settings-theme" data-theme="theme-sepia" title="Sepia"></button>
                <button class="theme-dot-btn dot-oled settings-theme" data-theme="theme-oled" title="OLED Dark"></button>
            </div>
        </div>
      </div>
    </nav>

    <!-- Book Content Area -->
    <article id="book-content" class="prose prose-lg dark:prose-invert max-w-none text-text-default">
      <?php if ($chapterNum === 26 && !$teacherUnlocked): ?>
        <!-- Teacher Resources Password Form (Securely rendered in page) -->
        <div class="bg-content-bg p-8 rounded-[2rem] border border-accent/20 shadow-2xl max-w-md mx-auto text-center">
          <div class="modal-icon-circle circle-lock mx-auto mb-6">
            <i class="fas fa-lock" style="font-size: 1.5rem;"></i>
          </div>
          <h3 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.5rem; font-weight: 800; margin: 0 0 0.5rem 0; color: var(--color-text-default);">Authorized Access Only</h3>
          <p style="color: var(--color-text-secondary); font-size: 0.9rem; margin-bottom: 1.5rem;">What is Jenny's number?</p>
          <form method="POST" action="/library/read/reader.php?book=1984&chapter=chapter-26">
            <input type="password" name="teacher_password" class="auth-input mb-4" placeholder="•••••••" required autofocus autocomplete="off">
            <?php if (!empty($authError)): ?>
              <p class="auth-error mb-4"><?php echo htmlspecialchars($authError); ?></p>
            <?php endif; ?>
            <div class="auth-actions">
              <a href="/library/read/reader.php?book=1984&chapter=chapter-1" class="auth-btn auth-btn-cancel text-center" style="display:block; line-height:2.2rem; text-decoration:none;">Cancel</a>
              <button type="submit" class="auth-btn auth-btn-submit">Unlock</button>
            </div>
          </form>
        </div>
      <?php else: ?>
        <div class="chapter-title text-3xl font-bold text-center mb-8 text-primary">
          <?php echo $chapterNum === 26 ? "Teacher Resources" : "Chapter " . $chapterNum; ?>
        </div>
        <?php echo $contentHtml; ?>
      <?php endif; ?>
    </article>

  </div>
</main>

<!-- Chapters Table of Contents Modal -->
<div id="toc-modal" role="dialog" aria-labelledby="toc-title">
  <div class="toc-content">
    <div class="toc-header">
      <h2 id="toc-title">Table of Contents</h2>
      <button class="toc-close" id="close-toc-modal" aria-label="Close menu">&times;</button>
    </div>
    <div class="toc-grid">
      <?php for ($i = 1; $i <= 25; $i++): ?>
        <a href="/library/read/reader.php?book=1984&chapter=chapter-<?php echo $i; ?>" 
           class="toc-link <?php echo ($i === $chapterNum) ? 'active' : ''; ?>" 
           data-chapter="<?php echo $i; ?>">CH <?php echo $i; ?></a>
      <?php endfor; ?>
      <a href="/library/read/reader.php?book=1984&chapter=chapter-26" 
         class="toc-link toc-teacher-btn <?php echo ($chapterNum === 26) ? 'active' : ''; ?>" 
         data-chapter="26">
        <i class="fas fa-chalkboard-teacher mr-2"></i> TEACHER RESOURCES
      </a>
    </div>
  </div>
</div>

<!-- Go To Top Button -->
<button id="go-to-top-btn" aria-label="Go to top">
  <i class="fas fa-arrow-up"></i>
</button>

<!-- Floating Highlight Toolbar -->
<div id="highlight-toolbar" class="hidden">
    <button id="hl-btn-mark" class="hl-btn"><i class="fas fa-highlighter text-yellow-400"></i> Mark</button>
    <div class="hl-divider"></div>
    <button id="hl-btn-copy" class="hl-btn"><i class="fas fa-copy text-blue-400"></i> Copy</button>
</div>

<!-- Vocab Modal -->
<div id="vocab-modal" class="modal-overlay hidden">
  <div class="modal-card" style="max-width: 600px;">
    <div class="modal-card-header">
      <div class="modal-card-title">
        <div class="modal-icon-circle circle-vocab">
          <i class="fas fa-book-reader"></i>
        </div>
        <div style="text-align: left;">
          <h3 style="font-family: var(--site-font-family, 'Outfit', sans-serif); font-size: 1.25rem; font-weight: 800; margin: 0; color: var(--color-text-default);">Study Guide</h3>
          <p style="color: var(--color-text-secondary); font-size: 0.7rem; font-weight: 800; text-transform: uppercase; letter-spacing: 0.1em; margin: 0.25rem 0 0 0;">Current Chapter Vocabulary</p>
        </div>
      </div>
      <div style="display: flex; align-items: center; gap: 0.75rem;">
        <button id="download-vocab-btn" class="tooltip-btn" style="background: var(--color-secondary); padding: 0.5rem 1rem; border-radius: 9999px; font-size: 0.8rem; font-weight: 700; border: none; cursor: pointer; display: inline-flex; align-items: center; gap: 0.4rem;" title="Download word list as TXT">
          <i class="fas fa-download"></i> Download TXT
        </button>
        <button id="close-vocab-modal" class="modal-card-close-btn">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <div id="vocab-list-container" class="vocab-list">
      <!-- Injected Vocab Cards -->
    </div>
  </div>
</div>

<!-- Scripts -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const currentChapter = <?php echo $chapterNum; ?>;
    const BOOK_ID = '1984_lastChapter';

    // Save progress to localStorage
    try { localStorage.setItem(BOOK_ID, currentChapter); } catch (e) { }

    // --- TTS Setup ---
    let utterance = new SpeechSynthesisUtterance();
    const speakBtn = document.getElementById('tts-speak-btn');
    const stopBtn = document.getElementById('tts-stop-btn');
    const bookContent = document.getElementById('book-content');

    // --- TOC Modal Logic ---
    const tocModal = document.getElementById('toc-modal');
    const openTocBtn = document.getElementById('open-toc-modal');
    const closeTocBtn = document.getElementById('close-toc-modal');

    if (openTocBtn && tocModal) {
      openTocBtn.onclick = () => tocModal.classList.add('active');
    }
    if (closeTocBtn && tocModal) {
      closeTocBtn.onclick = () => tocModal.classList.remove('active');
    }
    window.onclick = (event) => {
      if (event.target == tocModal) {
        tocModal.classList.remove('active');
      }
    };

    // --- TTS Logic ---
    if ('speechSynthesis' in window && speakBtn && stopBtn) {
      let activeTextNodes = [];
      let currentParaIndex = -1;

      speakBtn.onclick = () => {
        const paras = Array.from(bookContent.querySelectorAll('p, h1, h2, h3'));
        activeTextNodes = paras;
        currentParaIndex = 0;

        const fullText = paras.map(p => {
             const clone = p.cloneNode(true);
             clone.querySelectorAll('.tooltiptext').forEach(t => t.remove());
             return clone.textContent.trim();
        }).join(" ... ");

        utterance.text = fullText;
        window.speechSynthesis.speak(utterance);
        
        speakBtn.classList.add('hidden');
        stopBtn.classList.remove('hidden');
      };

      utterance.onboundary = (e) => {
         let accumulated = 0;
         for(let i=0; i<activeTextNodes.length; i++) {
             const clone = activeTextNodes[i].cloneNode(true);
             clone.querySelectorAll('.tooltiptext').forEach(t => t.remove());
             const len = clone.textContent.trim().length;
             
             if (e.charIndex >= accumulated && e.charIndex <= accumulated + len + 5) {
                 if(currentParaIndex !== i) {
                     if(activeTextNodes[currentParaIndex]) activeTextNodes[currentParaIndex].classList.remove('bg-indigo-100', 'dark:bg-indigo-900/40', 'rounded-xl', 'px-2', 'py-1', 'transition-colors', 'duration-500');
                     currentParaIndex = i;
                     activeTextNodes[currentParaIndex].classList.add('bg-indigo-100', 'dark:bg-indigo-900/40', 'rounded-xl', 'px-2', 'py-1', 'transition-colors', 'duration-500');
                     activeTextNodes[currentParaIndex].scrollIntoView({behavior: 'smooth', block: 'center'});
                 }
                 break;
             }
             accumulated += len + 5;
         }
      };

      stopBtn.onclick = () => {
        window.speechSynthesis.cancel();
        if(activeTextNodes[currentParaIndex]) activeTextNodes[currentParaIndex].classList.remove('bg-indigo-100', 'dark:bg-indigo-900/40', 'rounded-xl', 'px-2', 'py-1', 'transition-colors', 'duration-500');
        speakBtn.classList.remove('hidden');
        stopBtn.classList.add('hidden');
      };

      utterance.onend = () => {
        if(activeTextNodes[currentParaIndex]) activeTextNodes[currentParaIndex].classList.remove('bg-indigo-100', 'dark:bg-indigo-900/40', 'rounded-xl', 'px-2', 'py-1', 'transition-colors', 'duration-500');
        speakBtn.classList.remove('hidden');
        stopBtn.classList.add('hidden');
      };
    } else if (speakBtn) {
      speakBtn.textContent = "TTS Not Supported";
      speakBtn.disabled = true;
    }

    // --- Progress Bar & Go To Top ---
    window.addEventListener('scroll', () => {
      const scrollTop = window.scrollY;
      const docHeight = document.documentElement.scrollHeight - window.innerHeight;
      const pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
      const pBar = document.getElementById('progress-bar');
      if (pBar) pBar.style.width = pct + '%';

      const btn = document.getElementById('go-to-top-btn');
      if (btn) {
        if (scrollTop > 300) btn.style.display = 'block';
        else btn.style.display = 'none';
      }
    });

    const topBtn = document.getElementById('go-to-top-btn');
    if (topBtn) {
      topBtn.onclick = () => window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // --- Tooltip Enhancement ---
    function initTooltipButtons() {
      const tooltips = document.querySelectorAll('.tooltiptext');
      tooltips.forEach(tt => {
        const originalText = tt.textContent.replace(/\s+/g, ' ').trim();
        if (!originalText) return;

        tt.innerHTML = `
          <div class="tooltip-def-text" style="margin-bottom: 8px;">${originalText}</div>
          <div class="tooltip-actions" onclick="event.stopPropagation()">
            <button class="tooltip-btn copy-btn" title="Copy definition">
              <i class="fas fa-copy"></i> Copy
            </button>
            <button class="tooltip-btn speak-btn" title="Read definition aloud">
              <i class="fas fa-volume-up"></i> Listen
            </button>
          </div>
        `;

        const copyBtn = tt.querySelector('.copy-btn');
        copyBtn.onclick = (e) => {
          e.preventDefault();
          e.stopPropagation();
          navigator.clipboard.writeText(originalText).then(() => {
            const originalContent = copyBtn.innerHTML;
            copyBtn.innerHTML = '<i class="fas fa-check text-green-400"></i> Copied!';
            setTimeout(() => { copyBtn.innerHTML = originalContent; }, 2000);
          });
        };

        const speakBtn = tt.querySelector('.speak-btn');
        speakBtn.onclick = (e) => {
          e.preventDefault();
          e.stopPropagation();
          if ('speechSynthesis' in window) {
            window.speechSynthesis.cancel();
            const defUtterance = new SpeechSynthesisUtterance(originalText);
            defUtterance.rate = 0.9;
            window.speechSynthesis.speak(defUtterance);

            const originalContent = speakBtn.innerHTML;
            speakBtn.innerHTML = '<i class="fas fa-wave-square text-blue-400"></i> Reading...';
            defUtterance.onend = () => { speakBtn.innerHTML = originalContent; };
          }
        };
      });
    }

    // --- Highlighting Logic ---
    const hlToolbar = document.getElementById('highlight-toolbar');
    const hlMarkBtn = document.getElementById('hl-btn-mark');
    const hlCopyBtn = document.getElementById('hl-btn-copy');
    let currentSelectionRange = null;

    if (hlToolbar && hlMarkBtn && hlCopyBtn) {
      document.addEventListener('selectionchange', () => {
        const selection = window.getSelection();
        if (!selection.rangeCount || selection.isCollapsed) {
          hlToolbar.classList.add('hidden');
          return;
        }
        
        const range = selection.getRangeAt(0);
        if (!bookContent.contains(range.commonAncestorContainer)) {
          hlToolbar.classList.add('hidden');
          return;
        }

        currentSelectionRange = range;
        const rect = range.getBoundingClientRect();
        
        hlToolbar.style.left = `${rect.left + rect.width / 2 + window.scrollX}px`;
        hlToolbar.style.top = `${rect.top + window.scrollY - 10}px`;
        
        hlToolbar.classList.remove('hidden');
      });

      hlMarkBtn.onclick = () => {
        if (!currentSelectionRange) return;
        try {
          const mark = document.createElement('mark');
          mark.style.backgroundColor = 'rgba(253, 224, 71, 0.6)';
          mark.style.borderRadius = '0.25rem';
          mark.style.padding = '0 0.25rem';
          mark.style.cursor = 'pointer';
          currentSelectionRange.surroundContents(mark);
          window.getSelection().removeAllRanges();
        } catch (e) {
          console.log("Highlighting crossed boundaries", e);
        }
        hlToolbar.classList.add('hidden');
      };

      hlCopyBtn.onclick = () => {
        if (!currentSelectionRange) return;
        navigator.clipboard.writeText(currentSelectionRange.toString()).then(() => {
          const ogIcon = hlCopyBtn.innerHTML;
          hlCopyBtn.innerHTML = '<i class="fas fa-check text-green-400"></i> Copied';
          setTimeout(() => hlCopyBtn.innerHTML = ogIcon, 1500);
        });
      };
    }

    // --- Settings Panel Logic ---
    const settingsBtn = document.getElementById('open-settings-btn');
    const settingsPanel = document.getElementById('settings-panel');
    let settingsOpen = false;

    if (settingsBtn && settingsPanel) {
      settingsBtn.onclick = (e) => {
          e.stopPropagation();
          settingsOpen = !settingsOpen;
          if(settingsOpen) {
              settingsPanel.classList.remove('hidden');
          } else {
              closeSettings();
          }
      };

      function closeSettings() {
          settingsOpen = false;
          settingsPanel.classList.add('hidden');
      }

      document.addEventListener('click', (e) => {
          if(settingsOpen && !settingsPanel.contains(e.target) && e.target !== settingsBtn) closeSettings();
      });

      // Typography Preferences
      const PREFS_KEY = '1984_prefs';
      let prefs = JSON.parse(localStorage.getItem(PREFS_KEY) || '{"font":"font-sans", "size":"prose-lg", "theme":"default"}');

      function applyPrefs() {
          bookContent.classList.remove('font-sans', 'font-serif', 'font-dyslexic', 'prose-base', 'prose-lg', 'prose-2xl');
          document.body.classList.remove('theme-sepia', 'theme-oled');
          
          bookContent.classList.add(prefs.font);
          bookContent.classList.add(prefs.size);
          if(prefs.theme !== 'default') document.body.classList.add(prefs.theme);

          document.querySelectorAll('.settings-font, .settings-size, .settings-theme').forEach(el => {
              el.classList.remove('active');
              if(el.dataset.font === prefs.font || el.dataset.size === prefs.size || el.dataset.theme === prefs.theme) {
                  el.classList.add('active');
              }
          });
          localStorage.setItem(PREFS_KEY, JSON.stringify(prefs));
      }

      document.querySelectorAll('.settings-font').forEach(btn => btn.onclick = () => { prefs.font = btn.dataset.font; applyPrefs(); });
      document.querySelectorAll('.settings-size').forEach(btn => btn.onclick = () => { prefs.size = btn.dataset.size; applyPrefs(); });
      document.querySelectorAll('.settings-theme').forEach(btn => btn.onclick = () => { prefs.theme = btn.dataset.theme; applyPrefs(); });
      applyPrefs(); 
    }

    // --- Vocab Modal Logic ---
    const vocabModal = document.getElementById('vocab-modal');
    const vocabBtn = document.getElementById('open-vocab-btn');
    const closeVocabBtn = document.getElementById('close-vocab-modal');
    const vocabList = document.getElementById('vocab-list-container');
    const downloadVocabBtn = document.getElementById('download-vocab-btn');
    let activeVocabList = [];

    if (vocabModal && vocabBtn && closeVocabBtn && vocabList) {
      vocabBtn.onclick = () => {
          vocabList.innerHTML = '';
          const tooltips = bookContent.querySelectorAll('.tooltip');
          const vocabMap = {};

          tooltips.forEach(tt => {
              const termNode = Array.from(tt.childNodes).find(n => n.nodeType === 3 || (n.nodeType === 1 && !n.classList.contains('tooltiptext')));
              const term = termNode ? termNode.textContent.trim() : '';
              const defNode = tt.querySelector('.tooltiptext');
              
              // Extract definition text, stripping any added tooltips buttons
              let defText = '';
              if (defNode) {
                const defTextEl = defNode.querySelector('.tooltip-def-text');
                defText = defTextEl ? defTextEl.textContent.trim() : defNode.textContent.replace(/\s+/g, ' ').trim();
              }

              if(term && defText) vocabMap[term.toLowerCase()] = { term, defText };
          });

          const vocabArray = Object.values(vocabMap).sort((a,b) => a.term.localeCompare(b.term));
          activeVocabList = vocabArray;

          if (downloadVocabBtn) {
              downloadVocabBtn.style.display = vocabArray.length === 0 ? 'none' : 'inline-flex';
          }

          if(vocabArray.length === 0) {
              vocabList.innerHTML = '<div style="text-align: center; padding: 2rem; color: var(--color-text-secondary);"><i class="fas fa-ghost" style="font-size: 2.5rem; margin-bottom: 1rem; opacity: 0.5;"></i><p>No specialized vocabulary found in this chapter.</p></div>';
          } else {
              vocabArray.forEach(v => {
                  vocabList.innerHTML += `
                      <div class="vocab-card">
                          <h4 class="vocab-term">${v.term}</h4>
                          <p class="vocab-definition">${v.defText}</p>
                      </div>
                  `;
              });
          }

          vocabModal.classList.remove('hidden');
      };

      closeVocabBtn.onclick = () => {
          vocabModal.classList.add('hidden');
      };

      if (downloadVocabBtn) {
          downloadVocabBtn.onclick = () => {
              if (activeVocabList.length === 0) return;
              let txtContent = `1984 - Chapter ${currentChapter} Vocabulary List\n`;
              txtContent += `==================================================\n\n`;
              activeVocabList.forEach((v, idx) => {
                  txtContent += `${idx + 1}. ${v.term.toUpperCase()}\n`;
                  txtContent += `   Definition: ${v.defText}\n\n`;
              });
              
              const blob = new Blob([txtContent], { type: 'text/plain;charset=utf-8;' });
              const link = document.createElement('a');
              link.href = URL.createObjectURL(blob);
              link.download = `1984_Chapter_${currentChapter}_Vocabulary.txt`;
              link.style.display = 'none';
              document.body.appendChild(link);
              link.click();
              document.body.removeChild(link);
          };
      }
    }

    // Init
    initTooltipButtons();
  });
</script>

<?php include __DIR__ . '/../../../src/footer.php'; ?>