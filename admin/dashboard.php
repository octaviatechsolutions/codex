<?php
session_start();

if (!isset($_SESSION['admin_user'])) {
    header('Location: /admin/login.php');
    exit;
}

if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: /admin/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard | Octavia Tech Solutions</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Admin Dashboard</h1>
        <form method="post">
            <button class="btn btn-outline-secondary" name="logout" type="submit">Log out</button>
        </form>
    </div>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Content Management</h5>
                    <p class="card-text">Manage service pages, portfolio highlights, and blog posts.</p>
                    <button class="btn btn-primary" type="button" disabled>Coming soon</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Lead Tracking</h5>
                    <p class="card-text">Review contact form submissions and export them for your sales team.</p>
                    <button class="btn btn-primary" type="button" disabled>Coming soon</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
