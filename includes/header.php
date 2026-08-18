<?php
/**
 * Shared header — included on every public page
 * Pass $pageTitle and $pageDescription variables before including
 */
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$siteName = 'The Coffee Corner';
$pageTitle = isset($pageTitle) ? $pageTitle . ' | ' . $siteName : $siteName;
$pageDescription = isset($pageDescription) ? $pageDescription : 'The Coffee Corner — a cozy cafe in Labhchand Market, Kekri, Rajasthan serving premium coffee, tea, snacks and desserts.';
$currentPage = isset($currentPage) ? $currentPage : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle) ?></title>
    <meta name="description" content="<?= e($pageDescription) ?>">
    <meta name="keywords" content="coffee shop, cafe, Kekri, Rajasthan, The Coffee Corner, coffee, tea, snacks, desserts">

    <!-- Open Graph -->
    <meta property="og:title" content="<?= e($pageTitle) ?>">
    <meta property="og:description" content="<?= e($pageDescription) ?>">
    <meta property="og:type" content="website">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/the_coffee_corner/assets/css/style.css">

    <!-- Local Business Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "CafeOrCoffeeShop",
      "name": "The Coffee Corner",
      "image": "https://images.pexels.com/photos/2079452/pexels-photo-2079452.jpeg?auto=compress&cs=tinysrgb&h=650&w=940",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Labhchand Market",
        "addressLocality": "Kekri",
        "addressRegion": "Rajasthan",
        "addressCountry": "IN"
      },
      "telephone": "+91-9571934237",
      "email": "chetanprajapat877@gmail.com",
      "servesCuisine": "Coffee, Tea, Snacks, Desserts",
      "priceRange": "₹₹"
    }
    </script>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/the_coffee_corner/index.php">
            <i class="fas fa-mug-hot"></i>
            <span>The Coffee Corner</span>
        </a>
        <button class="navbar-toggler" type="button" id="navToggle" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link <?= $currentPage === 'home' ? 'active' : '' ?>" href="/the_coffee_corner/index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link <?= $currentPage === 'about' ? 'active' : '' ?>" href="/the_coffee_corner/about.php">About</a></li>
                <li class="nav-item"><a class="nav-link <?= $currentPage === 'menu' ? 'active' : '' ?>" href="/the_coffee_corner/menu.php">Menu</a></li>
                <li class="nav-item"><a class="nav-link <?= $currentPage === 'gallery' ? 'active' : '' ?>" href="/the_coffee_corner/gallery.php">Gallery</a></li>
                <li class="nav-item"><a class="nav-link <?= $currentPage === 'contact' ? 'active' : '' ?>" href="/the_coffee_corner/contact.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
