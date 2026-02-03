<?php
$serviceName = $serviceName ?? 'Service';
$serviceSlug = $serviceSlug ?? '';
$subservices = $subservices ?? [];
$serviceContent = $serviceContent ?? '';
$serviceDescription = $serviceDescription ?? '';
$highlights = [
    'ai-solutions' => [
        'AI strategy workshops and roadmap.',
        'Custom automation and predictive analytics.',
        'Secure AI deployments with monitoring.',
    ],
    'software-development' => [
        'Full-stack web and platform engineering.',
        'Cloud migration and API integrations.',
        'Quality assurance and performance testing.',
    ],
    'digital-marketing' => [
        'SEO and content strategy for visibility.',
        'Paid media, CRO, and analytics dashboards.',
        'Lifecycle marketing and retention programs.',
    ],
    'app-development' => [
        'iOS, Android, and cross-platform builds.',
        'Product design and user testing.',
        'Launch support and ongoing optimization.',
    ],
];
$items = $highlights[$serviceSlug] ?? [];
?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="fw-bold"><?= htmlspecialchars($serviceName) ?></h1>
                <p class="lead">
                    <?= htmlspecialchars($serviceDescription ?: 'We design and deliver ' . strtolower($serviceName) . ' programs that help teams move faster and smarter.') ?>
                </p>
                <?php if ($serviceContent): ?>
                    <div class="content-block mb-4">
                        <?= nl2br(htmlspecialchars($serviceContent)) ?>
                    </div>
                <?php endif; ?>
                <ul class="list-group list-group-flush mt-4">
                    <?php foreach ($items as $item): ?>
                        <li class="list-group-item"><?= htmlspecialchars($item) ?></li>
                    <?php endforeach; ?>
                </ul>
                <?php if ($subservices): ?>
                    <div class="mt-4">
                        <h5 class="fw-semibold">Explore specialized solutions</h5>
                        <ul class="list-unstyled">
                            <?php foreach ($subservices as $slug => $label): ?>
                                <?php if (is_array($label)): ?>
                                    <li class="mb-2">
                                        <a class="link-primary" href="/services/<?= htmlspecialchars($serviceSlug) ?>/<?= htmlspecialchars($label['slug']) ?>">
                                            <?= htmlspecialchars($label['title']) ?> →
                                        </a>
                                    </li>
                                <?php else: ?>
                                    <li class="mb-2">
                                        <a class="link-primary" href="/services/<?= htmlspecialchars($serviceSlug) ?>/<?= htmlspecialchars($slug) ?>">
                                            <?= htmlspecialchars($label) ?> →
                                        </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-light rounded">
                    <h5 class="fw-semibold">Ready to get started?</h5>
                    <p>Share your goals and we will map a custom plan.</p>
                    <a href="/contact" class="btn btn-primary">Talk to our team</a>
                </div>
            </div>
        </div>
    </div>
</section>
