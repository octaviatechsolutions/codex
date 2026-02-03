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

    public function serviceDetail(string $slug, ?string $subslug = null): void
    {
        $serviceMap = [
            'ai-solutions' => [
                'label' => 'AI Solutions',
                'subservices' => [
                    'ai-consulting' => 'AI Consulting',
                    'automation-solutions' => 'Automation Solutions',
                ],
            ],
            'software-development' => [
                'label' => 'Software Development',
                'subservices' => [
                    'web-development' => 'Web Development',
                    'custom-web-apps' => 'Custom Web Apps',
                    'admin-panel-cms' => 'Admin Panel & CMS',
                ],
            ],
            'digital-marketing' => [
                'label' => 'Digital Marketing',
                'subservices' => [
                    'seo' => 'Search Engine Optimization',
                    'google-ads' => 'Google Ads',
                    'social-media-marketing' => 'Social Media Marketing',
                    'content-marketing' => 'Content Marketing',
                ],
            ],
            'app-development' => [
                'label' => 'App Development',
                'subservices' => [
                    'android' => 'Android Development',
                    'ios' => 'iOS Development',
                    'cross-platform' => 'Cross-Platform Apps',
                ],
            ],
        ];

        if (!array_key_exists($slug, $serviceMap)) {
            $this->notFound();
            return;
        }

        $service = $serviceMap[$slug];

        if ($subslug !== null) {
            if (!array_key_exists($subslug, $service['subservices'])) {
                $this->notFound();
                return;
            }

            $this->render('service-subdetail', [
                'title' => $service['subservices'][$subslug] . ' | Octavia Tech Solutions',
                'serviceName' => $service['label'],
                'serviceSlug' => $slug,
                'subserviceName' => $service['subservices'][$subslug],
                'subserviceSlug' => $subslug,
            ]);
            return;
        }

        $this->render('service-detail', [
            'title' => $service['label'] . ' | Octavia Tech Solutions',
            'serviceName' => $service['label'],
            'serviceSlug' => $slug,
            'subservices' => $service['subservices'],
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
