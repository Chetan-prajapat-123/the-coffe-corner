<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'about';
$pageTitle = 'About';
$pageDescription = 'Learn the story of The Coffee Corner, owned by Chetan Prajapat in Labhchand Market, Kekri, Rajasthan. Our mission, values, and passion for great coffee.';

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner" id="about-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <div class="page-banner-content reveal">
            <h1>About Us</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/the_coffee_corner/index.php">Home</a></li>
                    <li class="breadcrumb-item active">About</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- About Story -->
<section class="about-story section-padding" id="about-story">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <div class="about-images reveal">
                    <img src="https://images.pexels.com/photos/2079452/pexels-photo-2079452.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="The Coffee Corner interior" class="about-img-main">
                    <img src="https://images.pexels.com/photos/11406429/pexels-photo-11406429.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Coffee counter at The Coffee Corner" class="about-img-secondary">
                    <div class="about-experience-badge">
                        <h3>3+</h3>
                        <p>Years of<br>Passion</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-text reveal">
                    <span class="section-subtitle">Our Story</span>
                    <h2 class="section-title">The Story Behind<br>The Coffee Corner</h2>
                    <p>The Coffee Corner was born from a simple idea — that every community deserves a place where great coffee, warm food, and genuine hospitality come together. Founded by <strong>Chetan Prajapat</strong> in the bustling Labhchand Market of Kekri, Rajasthan, our cafe has become a beloved gathering spot for friends, families, and coffee enthusiasts.</p>
                    <p>What started as a small dream has grown into a thriving corner of comfort. We believe that coffee is more than a drink — it's a moment of pause, a reason to gather, and a daily ritual worth savoring. Every cup we serve reflects our commitment to quality and our love for the craft.</p>

                    <div class="about-owner">
                        <div class="owner-avatar">CP</div>
                        <div>
                            <h4>Chetan Prajapat</h4>
                            <span>Owner &amp; Founder</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Values -->
<section class="mission-values section-padding bg-cream" id="mission">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-subtitle">Our Mission &amp; Values</span>
            <h2 class="section-title">What Drives Us Every Day</h2>
            <div class="section-divider"><span></span><i class="fas fa-mug-hot"></i><span></span></div>
        </div>
        <div class="row g-4 mt-3">
            <div class="col-lg-4 col-md-6">
                <div class="value-card reveal">
                    <div class="value-icon"><i class="fas fa-bullseye"></i></div>
                    <h3>Our Mission</h3>
                    <p>To serve exceptional coffee and food in a warm, welcoming space where every customer feels valued and every visit feels special.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card reveal">
                    <div class="value-icon"><i class="fas fa-eye"></i></div>
                    <h3>Our Vision</h3>
                    <p>To be the most loved cafe in Kekri — known for quality, consistency, and a community-first spirit that keeps people coming back.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="value-card reveal">
                    <div class="value-icon"><i class="fas fa-handshake"></i></div>
                    <h3>Our Values</h3>
                    <p>Quality without compromise, genuine hospitality, freshness in every order, and a deep respect for our customers and community.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section" id="about-cta">
    <div class="cta-overlay"></div>
    <div class="container text-center">
        <div class="cta-content reveal">
            <h2>Come Say Hello</h2>
            <p>We'd love to welcome you with a warm cup and a smile.</p>
            <div class="cta-buttons">
                <a href="/the_coffee_corner/contact.php" class="btn-coffee btn-primary-coffee">Visit Us</a>
                <a href="/the_coffee_corner/menu.php" class="btn-coffee btn-outline-light-coffee">View Menu</a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
