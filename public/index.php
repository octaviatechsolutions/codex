<?php

require __DIR__ . '/../app/core/Database.php';
require __DIR__ . '/../app/models/ContactMessage.php';
require __DIR__ . '/../app/models/Service.php';
require __DIR__ . '/../app/controllers/PageController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? '/';
$uri = rtrim($uri, '/') ?: '/';

$controller = new PageController();

if ($uri === '/') {
    $controller->home();
    exit;
}

if ($uri === '/about') {
    $controller->about();
    exit;
}

if ($uri === '/services') {
    $controller->services();
    exit;
}

if (str_starts_with($uri, '/services/')) {
    $segments = array_values(array_filter(explode('/', trim($uri, '/'))));
    $slug = $segments[1] ?? '';
    $subslug = $segments[2] ?? null;
    if ($slug !== '') {
        $controller->serviceDetail($slug, $subslug);
        exit;
    }
}

if ($uri === '/portfolio') {
    $controller->portfolio();
    exit;
}

if ($uri === '/blog') {
    $controller->blog();
    exit;
}

if (str_starts_with($uri, '/blog/')) {
    $slug = trim(str_replace('/blog/', '', $uri), '/');
    $controller->blogDetail($slug);
    exit;
}

if ($uri === '/contact' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'name' => trim($_POST['name'] ?? ''),
        'email' => trim($_POST['email'] ?? ''),
        'phone' => trim($_POST['phone'] ?? ''),
        'message' => trim($_POST['message'] ?? ''),
    ];

    $errors = [];
    if ($data['name'] === '') {
        $errors[] = 'Please provide your name.';
    }
    if ($data['email'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please provide a valid email address.';
    }
    if ($data['message'] === '') {
        $errors[] = 'Please include a brief message.';
    }

    if ($errors === []) {
        ContactMessage::create($data);

        $to = 'hello@octaviatech.com';
        $subject = 'New Contact Message from ' . $data['name'];
        $body = "Name: {$data['name']}\nEmail: {$data['email']}\nPhone: {$data['phone']}\n\nMessage:\n{$data['message']}";
        @mail($to, $subject, $body);

        $controller->contact([
            'success' => 'Thanks for reaching out. Our team will respond shortly.',
        ]);
        exit;
    }

    $controller->contact([
        'errors' => $errors,
        'old' => $data,
    ]);
    exit;
}

if ($uri === '/contact') {
    $controller->contact();
    exit;
}

$controller->notFound();
