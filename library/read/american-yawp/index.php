<?php
/**
 * library/read/american-yawp/index.php
 * The American Yawp Reader Entry Point
 * Renders The American Yawp (Volumes 1 & 2) in the Unified Digital Reader.
 */
$bookId = 'american-yawp';

if (!isset($_GET['chapter']) || $_GET['chapter'] === '') {
    if (isset($_GET['vol']) && (int)$_GET['vol'] === 2) {
        $_GET['chapter'] = 'chapter-15';
    } else {
        $_GET['chapter'] = 'chapter-1';
    }
}

require_once __DIR__ . '/../index.php';
