<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';

$currentPage = 'menu';
$pageTitle = 'Menu';
$pageDescription = 'Explore the full menu at The Coffee Corner — hot coffee, cold coffee, tea, snacks, and desserts. Freshly made in Kekri, Rajasthan.';

$categories = getCategories($pdo);
$allItems = getMenuItems($pdo);

// Group items by category
$itemsByCategory = [];
foreach ($allItems as $item) {
    $itemsByCategory[$item['category']][] = $item;
}

require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Banner -->
<section class="page-banner" id="menu-banner">
    <div class="page-banner-overlay"></div>
    <div class="container">
        <div class="page-banner-content reveal">
            <h1>Our Menu</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item"><a href="/the_coffee_corner/index.php">Home</a></li>
                    <li class="breadcrumb-item active">Menu</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Menu Filter -->
<section class="menu-section section-padding" id="menu-section">
    <div class="container">
        <div class="section-header text-center reveal">
            <span class="section-subtitle">Freshly Made</span>
            <h2 class="section-title">Explore Our Offerings</h2>
            <div class="section-divider"><span></span><i class="fas fa-mug-hot"></i><span></span></div>
        </div>

        <!-- Category Filter -->
        <div class="menu-filter text-center reveal">
            <button class="filter-btn active" data-filter="all">All</button>
            <?php foreach ($categories as $cat): ?>
                <button class="filter-btn" data-filter="<?= e($cat) ?>"><?= e($cat) ?></button>
            <?php endforeach; ?>
        </div>

        <!-- Menu Items -->
        <div class="row g-4 mt-3" id="menuGrid">
            <?php foreach ($allItems as $item): ?>
                <div class="col-lg-4 col-md-6 menu-item" data-category="<?= e($item['category']) ?>">
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

        <?php if (empty($allItems)): ?>
            <div class="text-center py-5">
                <p class="no-items">No menu items available at the moment. Please check back soon!</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA -->
<section class="cta-section" id="menu-cta">
    <div class="cta-overlay"></div>
    <div class="container text-center">
        <div class="cta-content reveal">
            <h2>Hungry Yet?</h2>
            <p>Drop by The Coffee Corner and treat yourself to something delicious.</p>
            <div class="cta-buttons">
                <a href="/the_coffee_corner/contact.php" class="btn-coffee btn-primary-coffee">Find Us</a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
