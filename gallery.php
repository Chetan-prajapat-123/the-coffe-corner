<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'gallery';
$pageTitle = 'Gallery';
$pageDescription = 'Take a visual tour of The Coffee Corner — our cozy interior, delicious coffee, and mouth-watering food in Kekri, Rajasthan.';

// Gallery images from Pexels
$galleryImages = [
    ['url' => 'https://images.pexels.com/photos/2079452/pexels-photo-2079452.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Cozy cafe interior with wooden bookshelves'],
    ['url' => 'https://images.pexels.com/photos/459489/pexels-photo-459489.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Latte with heart-shaped art in a blue cup'],
    ['url' => 'https://images.pexels.com/photos/4927237/pexels-photo-4927237.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Barista pouring latte art'],
    ['url' => 'https://images.pexels.com/photos/34104248/pexels-photo-34104248.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Cafe interior with wooden decor and ambient lighting'],
    ['url' => 'https://images.pexels.com/photos/20066469/pexels-photo-20066469.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Chocolate frappe with cookies'],
    ['url' => 'https://images.pexels.com/photos/11406429/pexels-photo-11406429.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Cafe counter with espresso machine'],
    ['url' => 'https://images.pexels.com/photos/12872904/pexels-photo-12872904.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Three cups of coffee with latte art'],
    ['url' => 'https://images.pexels.com/photos/10249461/pexels-photo-10249461.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Decadent chocolate cake slices'],
    ['url' => 'https://images.pexels.com/photos/11696469/pexels-photo-11696469.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Cozy cafe with framed coffee-themed art'],
    ['url' => 'https://images.pexels.com/photos/2159095/pexels-photo-2159095.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Barista pouring brewed coffee into a glass'],
    ['url' => 'https://images.pexels.com/photos/35054779/pexels-photo-35054779.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Grilled sandwiches and latte on a wooden tray'],
    ['url' => 'https://images.pexels.com/photos/8974874/pexels-photo-8974874.jpeg?auto=compress&cs=tinysrgb&h=650&w=940', 'alt' => 'Warm cafe interior with chairs by the window'],
];

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner" id="gallery-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <div class="page-banner-content reveal">
            <h1>Gallery</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/the_coffee_corner/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Gallery</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="gallery-section section-padding" id="gallery-section">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-subtitle">A Visual Tour</span>
            <h2 class="section-title">Moments at The Coffee Corner</h2>
            <div class="section-divider"><span></span><i class="fas fa-mug-hot"></i><span></span></div>
        </div>
        <div class="row g-3 mt-3 gallery-grid">
            <?php foreach ($galleryImages as $img): ?>
                <div class="col-lg-3 col-md-6 col-6">
                    <div class="gallery-item reveal">
                        <img src="<?= e($img['url']) ?>" alt="<?= e($img['alt']) ?>" loading="lazy">
                        <div class="gallery-overlay">
                            <i class="fas fa-search-plus"></i>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Lightbox -->
<div class="lightbox" id="lightbox">
    <span class="lightbox-close" id="lightboxClose">&times;</span>
    <img src="" alt="" id="lightboxImg">
</div>

<!-- CTA -->
<section class="cta-section" id="gallery-cta">
    <div class="cta-overlay"></div>
    <div class="container text-center">
        <div class="cta-content reveal">
            <h2>See You Soon</h2>
            <p>Experience the warmth of The Coffee Corner in person.</p>
            <div class="cta-buttons">
                <a href="/the_coffee_corner/contact.php" class="btn-coffee btn-primary-coffee">Visit Us</a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
