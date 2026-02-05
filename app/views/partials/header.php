<?php
$title = $title ?? 'Octavia Tech Solutions';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($title) ?></title>
    <meta name="description" content="Octavia Tech Solutions delivers AI solutions, software engineering, app development, and digital marketing services.">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">Octavia Tech Solutions</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="/about">About Us</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/services" role="button" data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/services/ai-solutions">AI Solutions</a></li>
                        <li><a class="dropdown-item" href="/services/software-development">Software Development</a></li>
                        <li><a class="dropdown-item" href="/services/digital-marketing">Digital Marketing</a></li>
                        <li><a class="dropdown-item" href="/services/app-development">App Development</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="/portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link" href="/blog">Blog</a></li>
                <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<main>
