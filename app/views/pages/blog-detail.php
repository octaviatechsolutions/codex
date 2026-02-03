<?php
$slug = $slug ?? '';
?>
<section class="py-5">
    <div class="container">
        <a href="/blog" class="link-secondary">← Back to blog</a>
        <h1 class="fw-bold mt-3">Article: <?= htmlspecialchars(str_replace('-', ' ', $slug)) ?></h1>
        <p class="lead">This is a preview of the insight article. Full content can be managed through the admin panel.</p>
        <div class="content-block">
            <p>Use this space to publish long-form thought leadership, case studies, and product updates.</p>
        </div>
    </div>
</section>
