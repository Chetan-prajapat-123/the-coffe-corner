<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'contact';
$pageTitle = 'Contact';
$pageDescription = 'Contact The Coffee Corner — Labhchand Market, Kekri, Rajasthan. Call 9571934237 or email chetanprajapat877@gmail.com. Send us a message.';

$errors = [];
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $email   = trim($_POST['email'] ?? '');
    $phone   = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($name)) {
        $errors[] = 'Please enter your name.';
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if (empty($phone)) {
        $errors[] = 'Please enter your phone number.';
    }
    if (empty($message)) {
        $errors[] = 'Please enter a message.';
    }

    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, phone, message) VALUES (:name, :email, :phone, :message)");
        $stmt->execute([
            ':name'    => $name,
            ':email'   => $email,
            ':phone'   => $phone,
            ':message' => $message,
        ]);
        $success = true;
    }
}

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner" id="contact-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <div class="page-banner-content reveal">
            <h1>Contact Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/the_coffee_corner/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section section-padding" id="contact">
    <div class="container">
        <div class="row g-5">
            <!-- Contact Info -->
            <div class="col-lg-5">
                <div class="contact-info reveal">
                    <span class="section-subtitle">Get in Touch</span>
                    <h2 class="section-title">We'd Love to<br>Hear From You</h2>
                    <p>Whether you have a question, a suggestion, or just want to say hello — we're always happy to chat. Visit us, call us, or send a message using the form.</p>

                    <div class="contact-info-list">
                        <div class="contact-info-item">
                            <div class="contact-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div>
                                <h4>Address</h4>
                                <p>Labhchand Market, Kekri, Rajasthan</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon"><i class="fas fa-phone"></i></div>
                            <div>
                                <h4>Phone</h4>
                                <p><a href="tel:+919571934237">+91 95719 34237</a></p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon"><i class="fas fa-envelope"></i></div>
                            <div>
                                <h4>Email</h4>
                                <p><a href="mailto:chetanprajapat877@gmail.com">chetanprajapat877@gmail.com</a></p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon"><i class="fas fa-clock"></i></div>
                            <div>
                                <h4>Hours</h4>
                                <p>Mon - Sun: 8:00 AM - 10:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-7">
                <div class="contact-form-wrap reveal">
                    <?php if ($success): ?>
                        <div class="alert alert-success" role="alert">
                            <i class="fas fa-check-circle"></i> Thank you! Your message has been sent. We'll get back to you soon.
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($errors)): ?>
                        <div class="alert alert-danger" role="alert">
                            <ul class="mb-0">
                                <?php foreach ($errors as $error): ?>
                                    <li><?= e($error) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="" class="contact-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="john@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="+91 98765 43210" required>
                            </div>
                            <div class="col-md-6">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="How can we help?">
                            </div>
                            <div class="col-12">
                                <label for="message" class="form-label">Your Message</label>
                                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us what's on your mind..." required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn-coffee btn-primary-coffee w-100">Send Message <i class="fas fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="map-wrap reveal mt-5">
            <iframe
                src="https://www.google.com/maps?q=Kekri,Rajasthan&output=embed"
                width="100%"
                height="400"
                style="border:0;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                title="The Coffee Corner location map">
            </iframe>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
