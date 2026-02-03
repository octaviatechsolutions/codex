<?php
require __DIR__ . '/../auth.php';
$config = require __DIR__ . '/../../config/database.php';
$pdo = getDatabaseConnection($config);

$id = (int) ($_GET['id'] ?? 0);
if ($id > 0) {
    $statement = $pdo->prepare('DELETE FROM services WHERE id = ?');
    $statement->execute([$id]);
}

header('Location: /admin/services/list.php');
exit;
