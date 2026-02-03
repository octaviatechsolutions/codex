<?php
require __DIR__ . '/auth.php';
$pageTitle = 'Admin Dashboard | Octavia Tech Solutions';
$adminBase = '/admin';
require __DIR__ . '/partials/header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Admin Dashboard</h1>
        <p class="text-muted mb-0">Manage services and review site content.</p>
    </div>
</div>
<div class="row g-4">
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">Services</h5>
                <p class="card-text">Create, edit, and publish service content.</p>
                <a class="btn btn-primary" href="/admin/services/list.php">Manage Services</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">Blog</h5>
                <p class="card-text">Blog management will live here once posts are enabled.</p>
                <a class="btn btn-outline-secondary" href="/blog">View Blog</a>
            </div>
        </div>
    </div>
</div>
<?php require __DIR__ . '/partials/footer.php'; ?>
