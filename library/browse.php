<?php
/**
 * library/browse.php - Alternate catalog entry point
 * Redirects seamlessly to the unified library catalog.
 */
$queryString = $_SERVER['QUERY_STRING'] ?? '';
$redirectUrl = '/library/' . ($queryString ? '?' . $queryString : '');
header('Location: ' . $redirectUrl, true, 301);
exit;
