<?php
$flash = $flash ?? [];
$errors = $flash['errors'] ?? [];
$old = $flash['old'] ?? ['name' => '', 'email' => '', 'phone' => '', 'message' => ''];
?>
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h1 class="fw-bold">Contact us</h1>
                <p class="lead">Let us know about your project goals and timelines. We will respond within one business day.</p>
                <ul class="list-unstyled">
                    <li class="mb-2">📧 hello@octaviatech.com</li>
                    <li class="mb-2">📍 Remote-first, serving global clients</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <?php if (!empty($flash['success'])): ?>
                            <div class="alert alert-success"><?= htmlspecialchars($flash['success']) ?></div>
                        <?php endif; ?>
                        <?php if ($errors): ?>
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= htmlspecialchars($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="/contact">
                            <div class="mb-3">
                                <label class="form-label" for="name">Full name</label>
                                <input class="form-control" type="text" id="name" name="name" value="<?= htmlspecialchars($old['name'] ?? '') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="email">Work email</label>
                                <input class="form-control" type="email" id="email" name="email" value="<?= htmlspecialchars($old['email'] ?? '') ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="phone">Phone</label>
                                <input class="form-control" type="text" id="phone" name="phone" value="<?= htmlspecialchars($old['phone'] ?? '') ?>">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="message">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="4" required><?= htmlspecialchars($old['message'] ?? '') ?></textarea>
                            </div>
                            <button class="btn btn-primary w-100" type="submit">Send message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
