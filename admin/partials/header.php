<?php
$pageTitle = $pageTitle ?? 'Admin | Octavia Tech Solutions';
$adminBase = $adminBase ?? '/admin';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="<?= htmlspecialchars($adminBase) ?>/dashboard.php">Octavia Admin</a>
        <div class="d-flex gap-2">
            <a class="btn btn-outline-secondary btn-sm" href="<?= htmlspecialchars($adminBase) ?>/dashboard.php">Dashboard</a>
            <a class="btn btn-outline-secondary btn-sm" href="<?= htmlspecialchars($adminBase) ?>/services/list.php">Services</a>
            <a class="btn btn-outline-secondary btn-sm" href="<?= htmlspecialchars($adminBase) ?>/logout.php">Logout</a>
        </div>
    </div>
</nav>
<main class="container py-4">
