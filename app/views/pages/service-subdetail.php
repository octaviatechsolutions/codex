<?php
$serviceName = $serviceName ?? 'Service';
$serviceSlug = $serviceSlug ?? '';
$subserviceName = $subserviceName ?? 'Specialty';
$subserviceSlug = $subserviceSlug ?? '';
?>
<section class="py-5">
    <div class="container">
        <a class="link-secondary" href="/services/<?= htmlspecialchars($serviceSlug) ?>">← Back to <?= htmlspecialchars($serviceName) ?></a>
        <div class="row mt-3">
            <div class="col-lg-8">
                <h1 class="fw-bold"><?= htmlspecialchars($subserviceName) ?></h1>
                <p class="lead">Targeted <?= htmlspecialchars(strtolower($serviceName)) ?> support designed around your business goals.</p>
                <div class="content-block">
                    <p>We align strategy, execution, and performance tracking to deliver measurable outcomes for <?= htmlspecialchars(strtolower($subserviceName)) ?> engagements.</p>
                    <ul>
                        <li>Discovery workshops and roadmap planning.</li>
                        <li>Implementation with agile delivery and QA.</li>
                        <li>Optimization through analytics and testing.</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-light rounded">
                    <h5 class="fw-semibold">Launch this initiative</h5>
                    <p>Share your timeline and we will provide a tailored plan.</p>
                    <a href="/contact" class="btn btn-primary">Request a proposal</a>
                </div>
            </div>
        </div>
    </div>
</section>
