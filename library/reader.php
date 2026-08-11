<?php
$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$requestPath = explode('?', $requestUri)[0];
$queryString = $_SERVER['QUERY_STRING'] ?? '';

if (basename($requestPath) === 'reader.php' && dirname($requestPath) !== '/library/read') {
    $redirectUrl = '/library/read/reader.php' . ($queryString ? '?' . $queryString : '');
    header('Location: ' . $redirectUrl, true, 301);
    exit;
}

require __DIR__ . '/read/reader.php';
