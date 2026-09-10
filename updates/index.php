<?php
// ====================================================================
// PLATFORM UPDATES & PLANNING PORTAL
// Hesten's Learning Platform - Engineering Logs & Implementation Walkthroughs
// ====================================================================

$pageTitle = "Platform Updates & Planning Docs | Hesten's Learning";
$pageDescription = "Explore chronological walkthroughs, implementation plans, release logs, and architectural roadmaps for Hesten's Learning platform.";

// Dynamically resolve and include header based on location
$headerPath = file_exists(__DIR__ . '/../src/header.php') ? __DIR__ . '/../src/header.php' : (file_exists(__DIR__ . '/src/header.php') ? __DIR__ . '/src/header.php' : '../src/header.php');
include $headerPath;

/**
 * Parses markdown frontmatter and content.
 *
 * @param string $filePath Absolute or relative path to the markdown document.
 * @return array|null Parsed document metadata, excerpt, and content, or null on failure.
 */
function parseUpdateDoc(string $filePath): ?array {
    $raw = file_get_contents($filePath);
    if ($raw === false) return null;

    $filename = basename($filePath);
    $meta = [
        'id' => pathinfo($filename, PATHINFO_FILENAME),
        'filename' => $filename,
        'title' => '',
        'date' => '',
        'category' => 'Update',
        'tags' => [],
        'summary' => '',
        'author' => "Hesten's Learning Engineering",
        'raw_content' => $raw,
        'content' => '',
        'word_count' => 0,
        'read_time' => '1 min'
    ];

    $content = $raw;

    // Check YAML Frontmatter
    if (preg_match('/^---\s*[\r\n]+([\s\S]*?)[\r\n]+---\s*[\r\n]+([\s\S]*)$/', $raw, $matches)) {
        $frontmatter = $matches[1];
        $content = $matches[2];

        // Parse frontmatter keys
        foreach (explode("\n", $frontmatter) as $line) {
            $line = trim($line);
            if (empty($line) || str_starts_with($line, '#')) continue;

            if (preg_match('/^([a-zA-Z0-9_-]+)\s*:\s*(.+)$/', $line, $fMatch)) {
                $key = strtolower(trim($fMatch[1]));
                $val = trim($fMatch[2], " \t\n\r\0\x0B\"'");

                if ($key === 'tags') {
                    // Parse array like ["A", "B"] or comma separated
                    if (str_starts_with($val, '[') && str_ends_with($val, ']')) {
                        $inner = substr($val, 1, -1);
                        $meta['tags'] = array_map(function($t) {
                            return trim($t, " \t\n\r\0\x0B\"'");
                        }, explode(',', $inner));
                    } else {
                        $meta['tags'] = array_map('trim', explode(',', $val));
                    }
                } else {
                    $meta[$key] = $val;
                }
            }
        }
    }

    $meta['content'] = trim($content);

    // Fallback title: extract first # Header
    if (empty($meta['title'])) {
        if (preg_match('/^#\s+(.+)$/m', $content, $hMatch)) {
            $meta['title'] = trim($hMatch[1]);
        } else {
            $cleanName = preg_replace('/^\d{4}-\d{2}-\d{2}[-_]?/', '', $meta['id']);
            $meta['title'] = ucwords(str_replace(['-', '_'], ' ', $cleanName));
        }
    }

    // Fallback date: extract from filename YYYY-MM-DD or filemtime
    if (empty($meta['date'])) {
        if (preg_match('/^(\d{4}-\d{2}-\d{2})/', $meta['id'], $dMatch)) {
            $meta['date'] = $dMatch[1];
        } else {
            $meta['date'] = date('Y-m-d', filemtime($filePath));
        }
    }

    // Fallback category detection
    if ($meta['category'] === 'Update') {
        $lowerId = strtolower($meta['id']);
        if (str_contains($lowerId, 'walkthrough')) {
            $meta['category'] = 'Walkthrough';
        } elseif (str_contains($lowerId, 'plan')) {
            $meta['category'] = 'Implementation Plan';
        } elseif (str_contains($lowerId, 'fix') || str_contains($lowerId, 'bug')) {
            $meta['category'] = 'Bugfix';
        } elseif (str_contains($lowerId, 'arch')) {
            $meta['category'] = 'Architecture';
        }
    }

    // Fallback summary
    if (empty($meta['summary'])) {
        foreach (explode("\n", $content) as $line) {
            $trimmed = trim($line);
            if (empty($trimmed) || str_starts_with($trimmed, '#') || str_starts_with($trimmed, '>') || str_starts_with($trimmed, '---')) continue;
            $cleanP = preg_replace('/\[(.*?)\]\((.*?)\)/', '$1', $trimmed);
            $cleanP = preg_replace('/[*_`]/', '', $cleanP);
            $meta['summary'] = mb_substr($cleanP, 0, 180) . (mb_strlen($cleanP) > 180 ? '...' : '');
            break;
        }
        if (empty($meta['summary'])) {
            $meta['summary'] = "Detailed engineering document and specifications for " . $meta['title'] . ".";
        }
    }

    // Calculate word count & reading time
    $words = str_word_count(strip_tags($content));
    $meta['word_count'] = $words;
    $minutes = max(1, (int)ceil($words / 200));
    $meta['read_time'] = "~{$minutes} min read";

    return $meta;
}

// Scan documents directory
$docsDir = __DIR__ . '/docs';
$docs = [];
if (is_dir($docsDir)) {
    $files = glob($docsDir . '/*.md');
    if ($files) {
        foreach ($files as $f) {
            $parsed = parseUpdateDoc($f);
            if ($parsed) {
                $docs[] = $parsed;
            }
        }
    }
}

// Sort newest first by date, then filename
usort($docs, function($a, $b) {
    return strcmp($b['date'] . $b['id'], $a['date'] . $a['id']);
});

// Category stats
$categoryCounts = [];
foreach ($docs as $d) {
    $cat = $d['category'];
    $categoryCounts[$cat] = ($categoryCounts[$cat] ?? 0) + 1;
}

$firstDoc = $docs[0] ?? null;
?>

<link rel="stylesheet" href="<?= function_exists('assetVersion') ? assetVersion('/assets/css/pages/updates.css') : '/assets/css/pages/updates.css' ?>">

<!-- Hero Section -->
<header class="upd-hero" role="banner">
    <div class="upd-hero-inner">
        <span class="upd-hero-badge">
            <i class="fas fa-code-branch"></i> Engineering & Release Documentation
        </span>
        <h1 class="upd-hero-title">Platform Updates & Planning Docs</h1>
        <p class="upd-hero-subtitle">
            Chronological archive of verified walkthroughs, technical implementation plans, and release roadmaps for Hesten's Learning platform.
        </p>

        <div class="upd-hero-stats">
            <div class="upd-stat-item">
                <div class="upd-stat-icon"><i class="fas fa-file-alt"></i></div>
                <div>
                    <div class="upd-stat-label">Total Documents</div>
                    <div class="upd-stat-val"><?= count($docs) ?> Logged</div>
                </div>
            </div>
            <div class="upd-stat-item">
                <div class="upd-stat-icon"><i class="fas fa-calendar-check"></i></div>
                <div>
                    <div class="upd-stat-label">Latest Release</div>
                    <div class="upd-stat-val"><?= !empty($docs[0]['date']) ? htmlspecialchars($docs[0]['date']) : 'Current' ?></div>
                </div>
            </div>
            <div class="upd-stat-item">
                <div class="upd-stat-icon"><i class="fas fa-shield-alt"></i></div>
                <div>
                    <div class="upd-stat-label">Verification Status</div>
                    <div class="upd-stat-val" style="color: var(--color-success, #10b981);">Production Verified</div>
                </div>
            </div>
        </div>

        <div class="upd-feed-badge-row" style="margin-top: 1.25rem; display: flex; justify-content: center; gap: 0.75rem; flex-wrap: wrap;">
            <a href="/updates/feed.php?format=rss" class="upd-btn-action" style="text-decoration: none; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.35rem 0.85rem; border-radius: 9999px; background: rgba(245, 158, 11, 0.15); color: #f59e0b; border: 1px solid rgba(245, 158, 11, 0.3);" title="Subscribe via RSS 2.0 Feed" target="_blank" rel="noopener">
                <i class="fas fa-rss"></i> RSS Feed
            </a>
            <a href="/updates/feed.php?format=json" class="upd-btn-action" style="text-decoration: none; font-size: 0.8rem; display: inline-flex; align-items: center; gap: 0.4rem; padding: 0.35rem 0.85rem; border-radius: 9999px; background: rgba(59, 130, 246, 0.15); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.3);" title="Programmatic JSON Feed" target="_blank" rel="noopener">
                <i class="fas fa-code"></i> JSON API
            </a>
        </div>
    </div>
</header>

<!-- Main Workspace Layout -->
<main class="upd-layout" id="main-content">

    <!-- Sidebar: Search, Filters & Document Timeline -->
    <aside class="upd-sidebar" aria-label="Updates List">
        <!-- Search Input -->
        <div class="upd-search-box">
            <i class="fas fa-search upd-search-icon" aria-hidden="true"></i>
            <input type="text" id="upd-search-input" class="upd-search-input" placeholder="Search updates, tags, keywords..." aria-label="Search updates">
            <button type="button" id="upd-search-clear" class="upd-search-clear" title="Clear search" aria-label="Clear search">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Filter Pills -->
        <div class="upd-filter-pills" role="tablist" aria-label="Filter documents by category">
            <button type="button" class="upd-pill-btn active" data-filter="ALL" role="tab" aria-selected="true">
                All (<?= count($docs) ?>)
            </button>
            <?php foreach ($categoryCounts as $cat => $count): ?>
                <button type="button" class="upd-pill-btn" data-filter="<?= htmlspecialchars($cat) ?>" role="tab" aria-selected="false">
                    <?= htmlspecialchars($cat) ?> (<?= $count ?>)
                </button>
            <?php endforeach; ?>
        </div>

        <!-- Document List -->
        <div class="upd-doc-list" id="upd-doc-list" role="list">
            <?php if (empty($docs)): ?>
                <div class="upd-empty-state">
                    <i class="fas fa-folder-open upd-empty-icon"></i>
                    <p>No documentation files found in <code>updates/docs/</code>.</p>
                </div>
            <?php else: ?>
                <?php foreach ($docs as $idx => $doc): 
                    $catSlug = strtolower(preg_replace('/[^a-z0-9]/', '', $doc['category']));
                    if (str_contains($catSlug, 'walkthrough')) $catClass = 'cat-walkthrough';
                    elseif (str_contains($catSlug, 'plan')) $catClass = 'cat-plan';
                    elseif (str_contains($catSlug, 'bug')) $catClass = 'cat-bugfix';
                    elseif (str_contains($catSlug, 'arch')) $catClass = 'cat-architecture';
                    else $catClass = 'cat-default';
                ?>
                    <article class="upd-card-item <?= $idx === 0 ? 'active' : '' ?>" 
                             data-id="<?= htmlspecialchars($doc['id']) ?>"
                             data-category="<?= htmlspecialchars($doc['category']) ?>"
                             role="button"
                             tabindex="0"
                             aria-label="<?= htmlspecialchars($doc['title']) ?>">
                        <div class="upd-card-meta">
                            <span class="upd-badge-category <?= $catClass ?>">
                                <i class="fas fa-tag"></i> <?= htmlspecialchars($doc['category']) ?>
                            </span>
                            <span class="upd-card-date">
                                <?= htmlspecialchars($doc['date']) ?>
                            </span>
                        </div>
                        <h2 class="upd-card-title"><?= htmlspecialchars($doc['title']) ?></h2>
                        <p class="upd-card-desc"><?= htmlspecialchars($doc['summary']) ?></p>
                        <div class="upd-card-footer">
                            <div class="upd-card-tags">
                                <?php foreach (array_slice($doc['tags'], 0, 3) as $t): ?>
                                    <span class="upd-card-tag">#<?= htmlspecialchars($t) ?></span>
                                <?php endforeach; ?>
                            </div>
                            <span><i class="far fa-clock"></i> <?= htmlspecialchars($doc['read_time']) ?></span>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </aside>

    <!-- Viewer Area (Right Column) -->
    <section class="upd-viewer" id="upd-viewer" aria-live="polite">
        <div class="upd-viewer-header">
            <div class="upd-viewer-topbar">
                <div class="upd-viewer-meta">
                    <span id="viewer-badge" class="upd-badge-category cat-walkthrough">Walkthrough</span>
                    <span>&bull;</span>
                    <span id="viewer-date"><i class="far fa-calendar-alt"></i> 2026-09-08</span>
                    <span>&bull;</span>
                    <span id="viewer-read-time"><i class="far fa-clock"></i> ~4 min read</span>
                    <span>&bull;</span>
                    <span id="viewer-word-count"><i class="fas fa-file-alt"></i> ~1,000 words</span>
                    <span>&bull;</span>
                    <span id="viewer-author"><i class="fas fa-user-edit"></i> Antigravity & Hesten</span>
                </div>
                <div class="upd-viewer-actions">
                    <button type="button" id="btn-copy-doc-link" class="upd-btn-action" title="Copy link to this document">
                        <i class="fas fa-link"></i> Copy Link
                    </button>
                    <button type="button" id="btn-download-md" class="upd-btn-action" title="Download Markdown file">
                        <i class="fas fa-download"></i> Download .md
                    </button>
                    <button type="button" id="btn-print-doc" class="upd-btn-action" title="Print document or export PDF">
                        <i class="fas fa-print"></i> Print Doc
                    </button>
                    <button type="button" id="btn-view-raw-md" class="upd-btn-action" title="View or copy raw Markdown">
                        <i class="fab fa-markdown"></i> Raw Markdown
                    </button>
                    <a href="/updates/feed.php?format=rss" class="upd-btn-action" title="Subscribe to RSS 2.0 Feed" target="_blank" rel="noopener">
                        <i class="fas fa-rss"></i> RSS
                    </a>
                </div>
            </div>
            <h1 class="upd-viewer-title" id="viewer-title">Loading document...</h1>
            <p class="upd-viewer-summary" id="viewer-summary"></p>
            <!-- Clickable Document Tags -->
            <div class="upd-viewer-tags" id="viewer-tags"></div>
            <!-- Auto-Generated Table of Contents -->
            <nav class="upd-toc-container" id="viewer-toc" aria-label="Table of Contents" style="display: none;">
                <div class="upd-toc-header">
                    <i class="fas fa-list-ul"></i>
                    <span>Table of Contents</span>
                </div>
                <div class="upd-toc-list" id="viewer-toc-list"></div>
            </nav>
            <!-- Companion Document Link (Plan <-> Walkthrough) -->
            <div id="viewer-companion-box" class="upd-companion-card" style="display: none;">
                <div class="upd-companion-info">
                    <i class="fas fa-link upd-companion-icon" aria-hidden="true"></i>
                    <div>
                        <strong id="viewer-companion-type">Companion Document Available</strong>
                        <p id="viewer-companion-title" style="margin: 0.15rem 0 0 0; font-size: 0.85rem; color: var(--color-text-muted);"></p>
                    </div>
                </div>
                <button type="button" id="btn-jump-companion" class="upd-btn-action" style="background: var(--color-primary); color: #fff; border: none; font-weight: 700;">
                    <span>Open Companion</span> &rarr;
                </button>
            </div>
        </div>

        <!-- Rendered Markdown Body -->
        <div class="upd-content prose reading-content" id="viewer-content" tabindex="-1">
            <!-- Dynamic HTML rendered here -->
        </div>
    </section>

</main>

<!-- Raw Markdown Modal -->
<div id="upd-raw-modal" class="modal-backdrop" style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.6); backdrop-filter: blur(4px); z-index: 100000; align-items: center; justify-content: center; padding: 1.5rem;" role="dialog" aria-modal="true" aria-labelledby="raw-modal-title">
    <div class="upd-modal-dialog" style="background: var(--color-bg-surface, #ffffff); border: 1px solid var(--color-border, #e2e8f0); border-radius: var(--radius-xl, 1rem); max-width: 900px; width: 100%; max-height: 85vh; display: flex; flex-direction: column; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 1.5rem; border-bottom: 1px solid var(--color-border, #e2e8f0);">
            <div style="display: flex; align-items: center; gap: 0.5rem; font-weight: 700; color: var(--color-text-main, #0f172a);">
                <i class="fab fa-markdown color-primary"></i>
                <span id="raw-modal-title">Raw Markdown</span>
            </div>
            <div style="display: flex; gap: 0.5rem;">
                <button type="button" id="btn-copy-raw-text" class="upd-btn-action">
                    <i class="far fa-copy"></i> Copy Text
                </button>
                <button type="button" onclick="closeRawModal()" class="upd-btn-action" aria-label="Close raw modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <textarea id="raw-modal-textarea" readonly aria-label="Raw Markdown Content" style="flex: 1; width: 100%; padding: 1.25rem; font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, monospace; font-size: 0.875rem; border: none; background: var(--color-bg-base, #f8fafc); color: var(--color-text-main, #0f172a); resize: none; outline: none; line-height: 1.6;"></textarea>
    </div>
</div>

<!-- Copied Toast -->
<div id="upd-toast" class="upd-toast" role="alert" aria-live="polite">
    <i class="fas fa-check-circle" style="color: #34d399;"></i>
    <span id="upd-toast-text">Link copied to clipboard!</span>
</div>

<!-- Embedded Documents Data & Client-Side Controller -->
<script>
    const updatesDocs = <?= json_encode($docs, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;
    let activeDocId = (updatesDocs.length > 0) ? updatesDocs[0].id : null;
    let activeFilter = 'ALL';
    let searchQuery = '';

    /**
     * Client-side lightweight Markdown Parser with GitHub-alert support
     */
    function renderMarkdownToHtml(md) {
        if (!md) return '';

        // Pre-clean carriage returns
        let text = md.replace(/\r\n/g, '\n').replace(/\r/g, '\n');

        // Remove frontmatter if present
        text = text.replace(/^---[\s\S]*?---[\s\S]*?\n/, '');

        // Escape HTML tags helper
        function escapeHtml(str) {
            return str
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        // 1. Code blocks ```lang ... ```
        const codeBlocks = [];
        text = text.replace(/```([a-zA-Z0-9_\-]*)\n([\s\S]*?)```/g, (match, lang, code) => {
            const idx = codeBlocks.length;
            const langName = (lang || 'code').toLowerCase();
            let formattedCode = escapeHtml(code);

            // Enhance diff blocks
            if (langName === 'diff') {
                formattedCode = formattedCode.split('\n').map(line => {
                    if (line.startsWith('+')) return `<span class="diff-add">${line}</span>`;
                    if (line.startsWith('-')) return `<span class="diff-del">${line}</span>`;
                    return line;
                }).join('\n');
            }

            const html = `
                <div class="upd-code-block-wrap">
                    <div class="upd-code-header">
                        <span>${langName}</span>
                        <button type="button" class="upd-copy-code-btn" onclick="copyCodeSnippet(this)">
                            <i class="far fa-copy"></i> Copy
                        </button>
                    </div>
                    <pre><code class="language-${langName}">${formattedCode}</code></pre>
                </div>
            `;
            codeBlocks.push(html);
            return `<!--CODE_BLOCK_${idx}-->`;
        });

        // 2. GitHub-style alert callouts: > [!NOTE], > [!TIP], > [!IMPORTANT], > [!WARNING], > [!CAUTION]
        text = text.replace(/^>\s*\[!(NOTE|TIP|IMPORTANT|WARNING|CAUTION)\][\r\n]+((?:>.*(?:\n|$))+)/gim, (match, type, body) => {
            const cleanType = type.toUpperCase();
            const alertClass = 'upd-alert-' + cleanType.toLowerCase();
            const iconMap = {
                'NOTE': 'fa-info-circle',
                'TIP': 'fa-lightbulb',
                'IMPORTANT': 'fa-exclamation-circle',
                'WARNING': 'fa-exclamation-triangle',
                'CAUTION': 'fa-radiation'
            };
            const icon = iconMap[cleanType] || 'fa-info-circle';
            const cleanBody = body.replace(/^>\s?/gm, '').trim();

            return `
                <div class="upd-alert ${alertClass}">
                    <div class="upd-alert-title">
                        <i class="fas ${icon}"></i> ${cleanType}
                    </div>
                    <div>${cleanBody}</div>
                </div>
            `;
        });

        // 3. Blockquotes
        text = text.replace(/^>(.*)$/gm, '<blockquote>$1</blockquote>');

        // 4. Headers with auto-anchors
        text = text.replace(/^#### (.*$)/gim, '<h4>$1</h4>');
        text = text.replace(/^### (.*$)/gim, '<h3>$1</h3>');
        text = text.replace(/^## (.*$)/gim, '<h2>$1</h2>');
        text = text.replace(/^# (.*$)/gim, '<h1>$1</h1>');

        // 5. Horizontal Rules
        text = text.replace(/^---$/gm, '<hr>');

        // 6. Bold & Italic
        text = text.replace(/\*\*\*(.*?)\*\*\*/g, '<strong><em>$1</em></strong>');
        text = text.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        text = text.replace(/\*(.*?)\*/g, '<em>$1</em>');
        text = text.replace(/___(.*?)___/g, '<strong><em>$1</em></strong>');
        text = text.replace(/__(.*?)__/g, '<strong>$1</strong>');
        text = text.replace(/_(.*?)_/g, '<em>$1</em>');

        // 7. Inline code
        text = text.replace(/`([^`]+)`/g, '<code>$1</code>');

        // 8. Links & Images
        text = text.replace(/!\[(.*?)\]\((.*?)\)/g, '<img src="$2" alt="$1" style="max-width: 100%; border-radius: var(--radius-md); margin: 1rem 0;">');
        text = text.replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2" target="_blank" rel="noopener noreferrer">$1</a>');

        // 9. Task Checkboxes
        text = text.replace(/^- \[x\]\s+(.*)$/gim, '<li style="list-style:none;"><input type="checkbox" checked disabled> $1</li>');
        text = text.replace(/^- \[ \]\s+(.*)$/gim, '<li style="list-style:none;"><input type="checkbox" disabled> $1</li>');

        // 10. Unordered Lists
        text = text.replace(/^\s*[-*+]\s+(.*)$/gim, '<li>$1</li>');
        text = text.replace(/(<li>.*<\/li>)/gims, (match) => {
            return `<ul>${match}</ul>`;
        });
        // Fix multiple consecutive uls
        text = text.replace(/<\/ul>\s*<ul>/g, '');

        // 11. Tables
        text = text.replace(/\|(.+)\|/g, (match) => {
            const cells = match.split('|').filter((c, i, a) => i > 0 && i < a.length - 1);
            if (cells.every(c => /^[-: ]+$/.test(c.trim()))) {
                return ''; // Divider row
            }
            const row = cells.map(c => `<td>${c.trim()}</td>`).join('');
            return `<tr>${row}</tr>`;
        });
        text = text.replace(/(<tr>.*<\/tr>)/gims, (match) => {
            return `<table>${match}</table>`;
        });
        text = text.replace(/<\/table>\s*<table>/g, '');

        // 12. Paragraphs
        text = text.split('\n\n').map(p => {
            const trimmed = p.trim();
            if (!trimmed) return '';
            if (trimmed.startsWith('<h') || trimmed.startsWith('<div') || trimmed.startsWith('<ul') ||
                trimmed.startsWith('<blockquote') || trimmed.startsWith('<table') || trimmed.startsWith('<hr') ||
                trimmed.startsWith('<!--CODE_BLOCK')) {
                return trimmed;
            }
            return `<p>${trimmed.replace(/\n/g, '<br>')}</p>`;
        }).join('\n\n');

        // Restore Code Blocks
        codeBlocks.forEach((block, idx) => {
            text = text.replace(`<!--CODE_BLOCK_${idx}-->`, block);
        });

        return text;
    }

    /**
     * Activates and renders a document by its ID
     */
    function selectDocument(docId, syncHash = true) {
        const doc = updatesDocs.find(d => d.id === docId);
        if (!doc) return;

        activeDocId = docId;

        // Update Sidebar Active state
        document.querySelectorAll('.upd-card-item').forEach(card => {
            card.classList.toggle('active', card.dataset.id === docId);
        });

        // Category pill class
        const catSlug = doc.category.toLowerCase().replace(/[^a-z0-9]/g, '');
        let catClass = 'cat-default';
        if (catSlug.includes('walkthrough')) catClass = 'cat-walkthrough';
        else if (catSlug.includes('plan')) catClass = 'cat-plan';
        else if (catSlug.includes('bug')) catClass = 'cat-bugfix';
        else if (catSlug.includes('arch')) catClass = 'cat-architecture';

        // Update Viewer Header
        const badgeEl = document.getElementById('viewer-badge');
        if (badgeEl) {
            badgeEl.className = `upd-badge-category ${catClass}`;
            badgeEl.innerHTML = `<i class="fas fa-tag"></i> ${doc.category}`;
        }

        const dateEl = document.getElementById('viewer-date');
        if (dateEl) dateEl.innerHTML = `<i class="far fa-calendar-alt"></i> ${doc.date}`;

        const readEl = document.getElementById('viewer-read-time');
        if (readEl) readEl.innerHTML = `<i class="far fa-clock"></i> ${doc.read_time}`;

        const wordEl = document.getElementById('viewer-word-count');
        if (wordEl) wordEl.innerHTML = `<i class="fas fa-file-alt"></i> ${doc.word_count ? Number(doc.word_count).toLocaleString() + ' words' : 'Document'}`;

        const authorEl = document.getElementById('viewer-author');
        if (authorEl) authorEl.innerHTML = `<i class="fas fa-user-edit"></i> ${doc.author || "Hesten's Learning"}`;

        const titleEl = document.getElementById('viewer-title');
        if (titleEl) titleEl.innerText = doc.title;

        const summaryEl = document.getElementById('viewer-summary');
        if (summaryEl) summaryEl.innerText = doc.summary;

        // Render Markdown content
        const contentEl = document.getElementById('viewer-content');
        if (contentEl) {
            contentEl.innerHTML = renderMarkdownToHtml(doc.content);

            // Re-apply Bionic Reading if enabled in A11y settings
            if (typeof window.applyBionicReading === 'function' && window.currentSettings && window.currentSettings.bionicReading) {
                window.applyBionicReading(true);
            }

            // Live Accessibility Announcement for Screen Readers
            if (typeof window.announceA11y === 'function') {
                window.announceA11y(`Now viewing ${doc.category}: ${doc.title}`);
            }
        }

        // Detect Companion Document (e.g. -plan.md matching -walkthrough.md)
        const companionBox = document.getElementById('viewer-companion-box');
        const companionType = document.getElementById('viewer-companion-type');
        const companionTitle = document.getElementById('viewer-companion-title');
        const companionBtn = document.getElementById('btn-jump-companion');

        let companionDoc = null;
        let companionLabel = '';

        if (doc.id.endsWith('-plan')) {
            const partnerId = doc.id.replace(/-plan$/, '-walkthrough');
            companionDoc = updatesDocs.find(d => d.id === partnerId);
            companionLabel = 'Completed Walkthrough Available';
        } else if (doc.id.endsWith('-walkthrough')) {
            const partnerId = doc.id.replace(/-walkthrough$/, '-plan');
            companionDoc = updatesDocs.find(d => d.id === partnerId);
            companionLabel = 'Technical Implementation Plan';
        }

        if (companionBox && companionDoc) {
            if (companionType) companionType.textContent = companionLabel;
            if (companionTitle) companionTitle.textContent = `${companionDoc.title} (${companionDoc.date})`;
            if (companionBtn) companionBtn.onclick = () => selectDocument(companionDoc.id);
            companionBox.style.display = 'flex';
        } else if (companionBox) {
            companionBox.style.display = 'none';
        }

        // Render Tags
        const tagsEl = document.getElementById('viewer-tags');
        if (tagsEl) {
            if (doc.tags && doc.tags.length > 0) {
                tagsEl.innerHTML = doc.tags.map(t => {
                    const safeTag = (t || '').replace(/'/g, "\\'");
                    return `<button type="button" class="upd-viewer-tag" onclick="filterByTag('${safeTag}')"><i class="fas fa-tag"></i> ${t}</button>`;
                }).join('');
                tagsEl.style.display = 'flex';
            } else {
                tagsEl.innerHTML = '';
                tagsEl.style.display = 'none';
            }
        }

        // Generate Table of Contents (TOC)
        const tocEl = document.getElementById('viewer-toc');
        const tocListEl = document.getElementById('viewer-toc-list');
        if (tocEl && tocListEl && contentEl) {
            const headings = contentEl.querySelectorAll('h2, h3');
            if (headings.length >= 2) {
                let tocHtml = '';
                headings.forEach((h, idx) => {
                    const id = 'heading-' + idx + '-' + h.textContent.trim().toLowerCase().replace(/[^a-z0-9]+/g, '-');
                    h.id = id;
                    const level = h.tagName.toLowerCase() === 'h3' ? 'level-3' : 'level-2';
                    tocHtml += `<a href="#${id}" class="upd-toc-item ${level}">${h.textContent}</a>`;
                });
                tocListEl.innerHTML = tocHtml;
                tocEl.style.display = 'block';

                tocListEl.querySelectorAll('.upd-toc-item').forEach(link => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        const target = document.querySelector(link.getAttribute('href'));
                        if (target) target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    });
                });
            } else {
                tocEl.style.display = 'none';
                tocListEl.innerHTML = '';
            }
        }

        // Update URL hash for direct deep-linking
        if (syncHash) {
            window.location.hash = `doc=${encodeURIComponent(docId)}`;
        }

        // Scroll viewer into view on mobile
        if (window.innerWidth < 992) {
            const viewer = document.getElementById('upd-viewer');
            if (viewer) viewer.scrollIntoView({ behavior: 'smooth' });
        }
    }

    /**
     * Filter documents based on Search & Category
     */
    function applyFilters() {
        const cards = document.querySelectorAll('.upd-card-item');
        let visibleCount = 0;

        cards.forEach(card => {
            const id = card.dataset.id;
            const doc = updatesDocs.find(d => d.id === id);
            if (!doc) return;

            // Category match
            const matchesCat = (activeFilter === 'ALL' || doc.category.toLowerCase() === activeFilter.toLowerCase());

            // Search query match
            let matchesSearch = true;
            if (searchQuery) {
                const q = searchQuery.toLowerCase();
                const inTitle = (doc.title || '').toLowerCase().includes(q);
                const inSummary = (doc.summary || '').toLowerCase().includes(q);
                const inTags = (doc.tags || []).some(t => t.toLowerCase().includes(q));
                const inContent = (doc.content || '').toLowerCase().includes(q);
                matchesSearch = inTitle || inSummary || inTags || inContent;
            }

            const titleNode = card.querySelector('.upd-card-title');
            const descNode = card.querySelector('.upd-card-desc');

            if (matchesCat && matchesSearch) {
                card.style.display = 'block';
                visibleCount++;

                if (searchQuery && searchQuery.length >= 2) {
                    const esc = searchQuery.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
                    const reg = new RegExp(`(${esc})`, 'gi');
                    if (titleNode) titleNode.innerHTML = doc.title.replace(reg, '<mark>$1</mark>');
                    if (descNode) descNode.innerHTML = doc.summary.replace(reg, '<mark>$1</mark>');
                } else {
                    if (titleNode) titleNode.textContent = doc.title;
                    if (descNode) descNode.textContent = doc.summary;
                }
            } else {
                card.style.display = 'none';
            }
        });

        // Handle empty search results state
        let emptyEl = document.getElementById('upd-no-filter-results');
        const listContainer = document.getElementById('upd-doc-list');
        if (visibleCount === 0) {
            if (!emptyEl) {
                emptyEl = document.createElement('div');
                emptyEl.id = 'upd-no-filter-results';
                emptyEl.className = 'upd-empty-state';
                emptyEl.innerHTML = `
                    <i class="fas fa-search-minus upd-empty-icon"></i>
                    <p>No documents matched your criteria.</p>
                `;
                listContainer.appendChild(emptyEl);
            }
            emptyEl.style.display = 'block';
        } else if (emptyEl) {
            emptyEl.style.display = 'none';
        }
    }

    /**
     * Toast notification helper
     */
    function showToast(msg) {
        const toast = document.getElementById('upd-toast');
        const text = document.getElementById('upd-toast-text');
        if (!toast || !text) return;
        text.innerText = msg;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2500);
    }

    /**
     * Copy code snippet from pre blocks
     */
    function copyCodeSnippet(btn) {
        const pre = btn.closest('.upd-code-block-wrap')?.querySelector('pre');
        if (!pre) return;
        navigator.clipboard.writeText(pre.innerText).then(() => {
            const orig = btn.innerHTML;
            btn.innerHTML = `<i class="fas fa-check"></i> Copied!`;
            setTimeout(() => btn.innerHTML = orig, 1800);
            showToast('Code copied to clipboard!');
        });
    }

    /**
     * Raw Markdown Modal controls
     */
    function openRawModal() {
        const doc = updatesDocs.find(d => d.id === activeDocId);
        if (!doc) return;
        const modal = document.getElementById('upd-raw-modal');
        const textarea = document.getElementById('raw-modal-textarea');
        const title = document.getElementById('raw-modal-title');
        if (modal && textarea) {
            textarea.value = doc.raw_content;
            if (title) title.innerText = doc.filename;
            modal.style.display = 'flex';
        }
    }

    function closeRawModal() {
        const modal = document.getElementById('upd-raw-modal');
        if (modal) modal.style.display = 'none';
    }

    // Initialize Page
    document.addEventListener('DOMContentLoaded', () => {
        // Document Card click & keyboard navigation events
        document.querySelectorAll('.upd-card-item').forEach(card => {
            card.addEventListener('click', () => {
                selectDocument(card.dataset.id);
            });
            card.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    selectDocument(card.dataset.id);
                } else if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    let next = card.nextElementSibling;
                    while (next && (!next.classList.contains('upd-card-item') || next.style.display === 'none')) {
                        next = next.nextElementSibling;
                    }
                    if (next) next.focus();
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    let prev = card.previousElementSibling;
                    while (prev && (!prev.classList.contains('upd-card-item') || prev.style.display === 'none')) {
                        prev = prev.previousElementSibling;
                    }
                    if (prev) prev.focus();
                }
            });
        });

        // Filter Pills
        document.querySelectorAll('.upd-pill-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.upd-pill-btn').forEach(b => {
                    b.classList.remove('active');
                    b.setAttribute('aria-selected', 'false');
                });
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');
                activeFilter = btn.dataset.filter;
                applyFilters();
            });
        });

        // Search Input
        const searchInput = document.getElementById('upd-search-input');
        const searchClear = document.getElementById('upd-search-clear');
        if (searchInput) {
            searchInput.addEventListener('input', () => {
                searchQuery = searchInput.value.trim();
                if (searchClear) searchClear.style.display = searchQuery ? 'block' : 'none';
                applyFilters();
            });
        }
        if (searchClear) {
            searchClear.addEventListener('click', () => {
                if (searchInput) searchInput.value = '';
                searchClear.style.display = 'none';
                searchQuery = '';
                applyFilters();
            });
        }

        // Copy Link Button
        const copyLinkBtn = document.getElementById('btn-copy-doc-link');
        if (copyLinkBtn) {
            copyLinkBtn.addEventListener('click', () => {
                const url = new URL(window.location);
                url.hash = `doc=${encodeURIComponent(activeDocId)}`;
                navigator.clipboard.writeText(url.toString()).then(() => {
                    showToast('Document link copied to clipboard!');
                });
            });
        }

        // View Raw Markdown Button
        const rawBtn = document.getElementById('btn-view-raw-md');
        if (rawBtn) {
            rawBtn.addEventListener('click', openRawModal);
        }

        // Download Markdown File Button
        const downloadBtn = document.getElementById('btn-download-md');
        if (downloadBtn) {
            downloadBtn.addEventListener('click', () => {
                const doc = updatesDocs.find(d => d.id === activeDocId);
                if (!doc) return;
                const blob = new Blob([doc.raw_content], { type: 'text/markdown;charset=utf-8' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = doc.filename || `${doc.id}.md`;
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
                showToast(`Downloaded ${doc.filename}`);
            });
        }

        // Print Document Button
        const printBtn = document.getElementById('btn-print-doc');
        if (printBtn) {
            printBtn.addEventListener('click', () => {
                window.print();
            });
        }

        // Tag Filter Helper
        window.filterByTag = function(tag) {
            const searchInput = document.getElementById('upd-search-input');
            const searchClear = document.getElementById('upd-search-clear');
            if (searchInput) {
                searchInput.value = tag;
                searchQuery = tag;
                if (searchClear) searchClear.style.display = 'block';
                applyFilters();
                searchInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
                showToast(`Filtered by tag: ${tag}`);
            }
        };

        // Copy Raw text button
        const copyRawBtn = document.getElementById('btn-copy-raw-text');
        if (copyRawBtn) {
            copyRawBtn.addEventListener('click', () => {
                const ta = document.getElementById('raw-modal-textarea');
                if (ta) {
                    navigator.clipboard.writeText(ta.value).then(() => {
                        showToast('Raw markdown copied to clipboard!');
                    });
                }
            });
        }

        // Global keyboard accessibility shortcuts
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeRawModal();
            // Press '/' outside of inputs to instantly focus updates search
            if (e.key === '/' && document.activeElement !== searchInput && !['input', 'textarea', 'select'].includes(document.activeElement?.tagName?.toLowerCase())) {
                e.preventDefault();
                searchInput?.focus();
                searchInput?.select();
            }
        });

        // Parse initial URL hash (?doc=... or #doc=...)
        let initDoc = null;
        if (window.location.hash.startsWith('#doc=')) {
            initDoc = decodeURIComponent(window.location.hash.replace('#doc=', ''));
        } else {
            const params = new URLSearchParams(window.location.search);
            initDoc = params.get('doc');
        }

        if (initDoc && updatesDocs.some(d => d.id === initDoc)) {
            selectDocument(initDoc, false);
        } else if (updatesDocs.length > 0) {
            selectDocument(updatesDocs[0].id, false);
        }
    });
</script>

<?php 
// Dynamically resolve and include footer based on location
$footerPath = file_exists(__DIR__ . '/../src/footer.php') ? __DIR__ . '/../src/footer.php' : (file_exists(__DIR__ . '/src/footer.php') ? __DIR__ . '/src/footer.php' : '../src/footer.php');
include $footerPath;
?>
