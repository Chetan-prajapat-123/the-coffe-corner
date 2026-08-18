<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'home';
$pageTitle = 'Home';
$pageDescription = 'The Coffee Corner — Good Coffee. Good Mood. Visit us in Labhchand Market, Kekri, Rajasthan for premium coffee, tea, snacks, and desserts.';

$featuredItems = $pdo->query("SELECT * FROM menu_items ORDER BY id LIMIT 6")->fetchAll();
$categories = getCategories($pdo);

// Testimonials (static)
$testimonials = [
    ['name' => 'Rahul Sharma', 'role' => 'Regular Customer', 'text' => 'Best coffee in Kekri! The atmosphere is cozy and the cappuccino is absolutely perfect.', 'rating' => 5],
    ['name' => 'Priya Singh', 'role' => 'Coffee Lover', 'text' => 'A hidden gem in town. The cold coffee and brownies are to die for. Highly recommend!', 'rating' => 5],
    ['name' => 'Amit Verma', 'role' => 'Local Foodie', 'text' => 'Friendly service, great taste, and reasonable prices. My go-to place for evening tea.', 'rating' => 5],
    ['name' => 'Neha Gupta', 'role' => 'Student', 'text' => 'Perfect place to sit and study with a hot latte. The ambience is warm and welcoming.', 'rating' => 5],
];

require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero" id="hero">
    <div class="hero-overlay"></div>
    <div class="hero-bg"></div>
    <div class="container hero-content">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-7 text-center text-lg-start">
                <p class="hero-tagline reveal">Welcome to The Coffee Corner</p>
                <h1 class="hero-title reveal">Good Coffee.<br>Good Mood.</h1>
                <p class="hero-desc reveal">Every great day begins with a great cup. At The Coffee Corner, we serve freshly brewed coffee, delicious snacks, and warm smiles — right in the heart of Kekri, Rajasthan.</p>
                <div class="hero-buttons reveal">
                    <a href="/the_coffee_corner/menu.php" class="btn-coffee btn-primary-coffee">View Menu <i class="fas fa-arrow-right"></i></a>
                    <a href="/the_coffee_corner/contact.php" class="btn-coffee btn-outline-coffee">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-scroll">
        <span>Scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="why-us section-padding" id="why-us">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-subtitle">Why Choose Us</span>
            <h2 class="section-title">A Coffee Experience Like No Other</h2>
            <div class="section-divider"><span></span><i class="fas fa-mug-hot"></i><span></span></div>
        </div>
        <div class="row g-4 mt-3">
            <div class="col-lg-3 col-md-6">
                <div class="why-card reveal">
                    <div class="why-icon"><i class="fas fa-mug-hot"></i></div>
                    <h3>Premium Coffee</h3>
                    <p>We source the finest beans and brew every cup with precision and passion.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="why-card reveal">
                    <div class="why-icon"><i class="fas fa-leaf"></i></div>
                    <h3>Fresh Ingredients</h3>
                    <p>From tea to snacks, everything is made with fresh, high-quality ingredients.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="why-card reveal">
                    <div class="why-icon"><i class="fas fa-couch"></i></div>
                    <h3>Cozy Ambience</h3>
                    <p>Relax in our warm, inviting space designed for comfort and good conversations.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="why-card reveal">
                    <div class="why-icon"><i class="fas fa-heart"></i></div>
                    <h3>Made with Love</h3>
                    <p>Every cup and every plate is prepared with care by our passionate team.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Menu -->
<section class="featured-menu section-padding bg-cream" id="featured">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-subtitle">Our Specialties</span>
            <h2 class="section-title">Featured Menu Items</h2>
            <div class="section-divider"><span></span><i class="fas fa-mug-hot"></i><span></span></div>
        </div>
        <div class="row g-4 mt-3">
            <?php foreach ($featuredItems as $item): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="menu-card reveal">
                        <div class="menu-card-img">
                            <img src="<?= e($item['image']) ?>" alt="<?= e($item['name']) ?>" loading="lazy">
                            <span class="menu-card-category"><?= e($item['category']) ?></span>
                        </div>
                        <div class="menu-card-body">
                            <div class="menu-card-top">
                                <h3><?= e($item['name']) ?></h3>
                                <span class="menu-card-price">₹<?= number_format($item['price']) ?></span>
                            </div>
                            <p><?= e($item['description']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-5 reveal">
            <a href="/the_coffee_corner/menu.php" class="btn-coffee btn-primary-coffee">View Full Menu <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</section>

<!-- Stats Banner -->
<section class="stats-banner" id="stats">
    <div class="stats-overlay"></div>
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-lg-3 col-md-6">
                <div class="stat-item reveal">
                    <h3 class="stat-number" data-count="500">0</h3>
                    <p>Happy Customers</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item reveal">
                    <h3 class="stat-number" data-count="20">0</h3>
                    <p>Menu Items</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item reveal">
                    <h3 class="stat-number" data-count="5">0</h3>
                    <p>Categories</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-item reveal">
                    <h3 class="stat-number" data-count="3">0</h3>
                    <p>Years of Service</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials section-padding" id="testimonials">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-subtitle">Testimonials</span>
            <h2 class="section-title">What Our Customers Say</h2>
            <div class="section-divider"><span></span><i class="fas fa-mug-hot"></i><span></span></div>
        </div>
        <div class="row g-4 mt-3">
            <?php foreach ($testimonials as $t): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="testimonial-card reveal">
                        <div class="testimonial-stars">
                            <?php for ($i = 0; $i < $t['rating']; $i++): ?><i class="fas fa-star"></i><?php endfor; ?>
                        </div>
                        <p class="testimonial-text">"<?= e($t['text']) ?>"</p>
                        <div class="testimonial-author">
                            <div class="testimonial-avatar"><?= strtoupper(substr($t['name'], 0, 1)) ?></div>
                            <div>
                                <h4><?= e($t['name']) ?></h4>
                                <span><?= e($t['role']) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="cta">
    <div class="cta-overlay"></div>
    <div class="container text-center">
        <div class="cta-content reveal">
            <h2>Ready for Your Perfect Cup?</h2>
            <p>Visit The Coffee Corner today and experience coffee the way it was meant to be.</p>
            <div class="cta-buttons">
                <a href="/the_coffee_corner/menu.php" class="btn-coffee btn-primary-coffee">Explore Menu</a>
                <a href="/the_coffee_corner/contact.php" class="btn-coffee btn-outline-light-coffee">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
