<?php

class ContactMessage
{
    public static function create(array $data): void
    {
        $connection = Database::connection();
        $statement = $connection->prepare(
            'INSERT INTO contact_messages (name, email, phone, message, created_at) VALUES (:name, :email, :phone, :message, :created_at)'
        );

        $statement->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $data['message'],
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
