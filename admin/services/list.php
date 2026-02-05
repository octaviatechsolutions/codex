<?php
require __DIR__ . '/../auth.php';
$config = require __DIR__ . '/../../config/database.php';
$pdo = getDatabaseConnection($config);
$pageTitle = 'Manage Services | Octavia Tech Solutions';
$adminBase = '/admin';
require __DIR__ . '/../partials/header.php';

$statement = $pdo->query('SELECT * FROM services ORDER BY created_at DESC');
$services = $statement->fetchAll();
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Services</h1>
    <a class="btn btn-primary" href="/admin/services/create.php">Add Service</a>
</div>
<div class="card shadow-sm">
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Group</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!$services): ?>
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">No services yet.</td>
                    </tr>
                <?php endif; ?>
                <?php foreach ($services as $service): ?>
                    <tr>
                        <td><?= htmlspecialchars($service['title']) ?></td>
                        <td><?= htmlspecialchars($service['slug']) ?></td>
                        <td><?= htmlspecialchars($service['service_group']) ?></td>
                        <td><?= htmlspecialchars($service['status']) ?></td>
                        <td><?= htmlspecialchars($service['created_at']) ?></td>
                        <td class="text-end">
                            <a class="btn btn-sm btn-outline-secondary" href="/admin/services/edit.php?id=<?= htmlspecialchars($service['id']) ?>">Edit</a>
                            <a class="btn btn-sm btn-outline-danger" href="/admin/services/delete.php?id=<?= htmlspecialchars($service['id']) ?>" onclick="return confirm('Delete this service?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php require __DIR__ . '/../partials/footer.php'; ?>
