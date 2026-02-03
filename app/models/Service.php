<?php

class Service
{
    public static function findBySlug(string $slug): ?array
    {
        $connection = Database::connection();
        $statement = $connection->prepare('SELECT * FROM services WHERE slug = :slug LIMIT 1');
        $statement->execute(['slug' => $slug]);
        $service = $statement->fetch();

        return $service ?: null;
    }

    public static function findChildBySlug(int $parentId, string $slug): ?array
    {
        $connection = Database::connection();
        $statement = $connection->prepare('SELECT * FROM services WHERE parent_id = :parent_id AND slug = :slug LIMIT 1');
        $statement->execute([
            'parent_id' => $parentId,
            'slug' => $slug,
        ]);
        $service = $statement->fetch();

        return $service ?: null;
    }

    public static function findChildren(int $parentId): array
    {
        $connection = Database::connection();
        $statement = $connection->prepare('SELECT * FROM services WHERE parent_id = :parent_id ORDER BY created_at DESC');
        $statement->execute(['parent_id' => $parentId]);

        return $statement->fetchAll();
    }

    public static function all(): array
    {
        $connection = Database::connection();
        $statement = $connection->query('SELECT * FROM services ORDER BY created_at DESC');

        return $statement->fetchAll();
    }
}
