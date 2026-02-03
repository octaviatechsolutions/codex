<?php

class PageController
{
    public function home(): void
    {
        $this->render('home', [
            'title' => 'Octavia Tech Solutions | AI, Software, and Marketing',
        ]);
    }

    public function about(): void
    {
        $this->render('about', [
            'title' => 'About Octavia Tech Solutions',
        ]);
    }

    public function services(): void
    {
        $this->render('services', [
            'title' => 'Services | Octavia Tech Solutions',
        ]);
    }

    public function serviceDetail(string $slug): void
    {
        $serviceMap = [
            'ai-solutions' => 'AI Solutions',
            'software-development' => 'Software Development',
            'digital-marketing' => 'Digital Marketing',
            'app-development' => 'App Development',
        ];

        if (!array_key_exists($slug, $serviceMap)) {
            $this->notFound();
            return;
        }

        $this->render('service-detail', [
            'title' => $serviceMap[$slug] . ' | Octavia Tech Solutions',
            'serviceName' => $serviceMap[$slug],
            'serviceSlug' => $slug,
        ]);
    }

    public function portfolio(): void
    {
        $this->render('portfolio', [
            'title' => 'Portfolio | Octavia Tech Solutions',
        ]);
    }

    public function blog(): void
    {
        $this->render('blog', [
            'title' => 'Blog | Octavia Tech Solutions',
        ]);
    }

    public function blogDetail(string $slug): void
    {
        $this->render('blog-detail', [
            'title' => 'Blog Article | Octavia Tech Solutions',
            'slug' => $slug,
        ]);
    }

    public function contact(array $flash = []): void
    {
        $this->render('contact', [
            'title' => 'Contact | Octavia Tech Solutions',
            'flash' => $flash,
        ]);
    }

    public function notFound(): void
    {
        http_response_code(404);
        $this->render('404', [
            'title' => 'Page Not Found | Octavia Tech Solutions',
        ]);
    }

    private function render(string $view, array $data = []): void
    {
        extract($data, EXTR_SKIP);
        require __DIR__ . '/../views/partials/header.php';
        require __DIR__ . '/../views/pages/' . $view . '.php';
        require __DIR__ . '/../views/partials/footer.php';
    }
}
