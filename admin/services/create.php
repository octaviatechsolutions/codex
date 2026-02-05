<?php
require __DIR__ . '/../auth.php';
$config = require __DIR__ . '/../../config/database.php';
$pdo = getDatabaseConnection($config);
$pageTitle = 'Create Service | Octavia Tech Solutions';
$adminBase = '/admin';
require __DIR__ . '/../partials/header.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $shortDescription = trim($_POST['short_description'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $metaTitle = trim($_POST['meta_title'] ?? '');
    $metaDescription = trim($_POST['meta_description'] ?? '');
    $serviceGroup = trim($_POST['service_group'] ?? '');
    $status = trim($_POST['status'] ?? 'draft');
    $parentId = $_POST['parent_id'] !== '' ? (int) $_POST['parent_id'] : null;

    if ($title === '' || $slug === '' || $serviceGroup === '') {
        $error = 'Title, slug, and group are required.';
    } else {
        $statement = $pdo->prepare(
            'INSERT INTO services (parent_id, title, slug, short_description, content, meta_title, meta_description, service_group, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
        );
        $statement->execute([
            $parentId,
            $title,
            $slug,
            $shortDescription,
            $content,
            $metaTitle,
            $metaDescription,
            $serviceGroup,
            $status,
        ]);
        header('Location: /admin/services/list.php');
        exit;
    }
}

$parents = $pdo->query('SELECT id, title FROM services WHERE parent_id IS NULL ORDER BY created_at DESC')->fetchAll();
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Add Service</h1>
    <a class="btn btn-outline-secondary" href="/admin/services/list.php">Back to list</a>
</div>
<?php if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>
<form method="post" class="card shadow-sm">
    <div class="card-body">
        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label" for="title">Title</label>
                <input class="form-control" type="text" id="title" name="title" required value="<?= htmlspecialchars($_POST['title'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="slug">Slug</label>
                <input class="form-control" type="text" id="slug" name="slug" required value="<?= htmlspecialchars($_POST['slug'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="service_group">Group</label>
                <select class="form-select" id="service_group" name="service_group" required>
                    <option value="">Select group</option>
                    <?php foreach (['ai' => 'AI', 'software' => 'Software', 'marketing' => 'Marketing', 'app' => 'App'] as $value => $label): ?>
                        <option value="<?= $value ?>" <?= (($_POST['service_group'] ?? '') === $value) ? 'selected' : '' ?>><?= $label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="parent_id">Parent Service (optional)</label>
                <select class="form-select" id="parent_id" name="parent_id">
                    <option value="">None</option>
                    <?php foreach ($parents as $parent): ?>
                        <option value="<?= htmlspecialchars($parent['id']) ?>" <?= (($_POST['parent_id'] ?? '') == $parent['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($parent['title']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-12">
                <label class="form-label" for="short_description">Short Description</label>
                <textarea class="form-control" id="short_description" name="short_description" rows="2"><?= htmlspecialchars($_POST['short_description'] ?? '') ?></textarea>
            </div>
            <div class="col-12">
                <label class="form-label" for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="6"><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label" for="meta_title">Meta Title</label>
                <input class="form-control" type="text" id="meta_title" name="meta_title" value="<?= htmlspecialchars($_POST['meta_title'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label" for="meta_description">Meta Description</label>
                <input class="form-control" type="text" id="meta_description" name="meta_description" value="<?= htmlspecialchars($_POST['meta_description'] ?? '') ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label" for="status">Status</label>
                <select class="form-select" id="status" name="status">
                    <option value="draft" <?= (($_POST['status'] ?? 'draft') === 'draft') ? 'selected' : '' ?>>Draft</option>
                    <option value="published" <?= (($_POST['status'] ?? '') === 'published') ? 'selected' : '' ?>>Published</option>
                </select>
            </div>
        </div>
    </div>
    <div class="card-footer text-end">
        <button class="btn btn-primary" type="submit">Save Service</button>
    </div>
</form>
<?php require __DIR__ . '/../partials/footer.php'; ?>
