<?php
// Shared document shell. Pages set $pageTitle, $pageDescription and (optional) $preloadImage before including this file.
$assetVersion = '1.0.18';
$page = basename($_SERVER['SCRIPT_FILENAME'], '.php');
$home = $page === 'index' ? '' : 'index.php'; // in-page anchors stay native (and smooth-scrolled) on the home page
$pageTitle = $pageTitle ?? 'Shalento Medical Journey | Healthcare Coordination in India';
$pageDescription = $pageDescription ?? 'Shalento Medical Journey connects UK patients with established healthcare providers in India and coordinates appointments, travel and accommodation.';
?>
<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $pageTitle ?></title>
    <meta name="description" content="<?= $pageDescription ?>">
    <meta name="robots" content="noindex, nofollow, noarchive">
    <meta name="theme-color" content="#223050">
    <link rel="icon" href="assets/images/favicon.png" type="image/png">
    <link rel="manifest" href="site.webmanifest">
    <link rel="preload" href="assets/fonts/inter-latin-var.woff2" as="font" type="font/woff2" crossorigin>
<?php if (!empty($preloadImage)) : ?>
    <link rel="preload" as="image" type="image/webp" fetchpriority="high" href="assets/images/<?= $preloadImage ?>.webp" imagesrcset="assets/images/<?= $preloadImage ?>-828.webp 828w, assets/images/<?= $preloadImage ?>-1280.webp 1280w, assets/images/<?= $preloadImage ?>.webp 1920w" imagesizes="100vw">
<?php endif; ?>
    <link rel="stylesheet" href="assets/css/app.min.css?v=<?= $assetVersion ?>">
</head>
<body>
<?php include "includes/header.php"; ?>
