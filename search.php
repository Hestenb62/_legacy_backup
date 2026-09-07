<?php
/**
 * Root search redirect router.
 * Seamlessly routes search queries to /pages/search.php while preserving all GET parameters.
 */
$queryString = $_SERVER['QUERY_STRING'] ?? '';
$target = '/pages/search.php' . ($queryString !== '' ? '?' . $queryString : '');

header('Location: ' . $target, true, 301);
exit;
