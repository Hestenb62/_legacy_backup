<?php
/**
 * library/catalogue.php - Alternate spelling alias
 * Redirects seamlessly to cataloge.php
 */
$queryString = $_SERVER['QUERY_STRING'] ?? '';
$redirectUrl = '/library/cataloge.php' . ($queryString ? '?' . $queryString : '');
header('Location: ' . $redirectUrl, true, 301);
exit;
