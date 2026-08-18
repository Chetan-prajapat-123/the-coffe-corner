<?php
/**
 * Admin shared header
 * Pass $pageTitle before including
 */
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';
requireAdmin();

$adminPage = isset($adminPage) ? $adminPage : '';
$adminTitle = isset($pageTitle) ? $pageTitle : 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($adminTitle) ?> | Admin - The Coffee Corner</title>
    <meta name="robots" content="noindex, nofollow">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="/the_coffee_corner/assets/css/style.css">
    <link rel="stylesheet" href="/the_coffee_corner/assets/css/admin.css">
</head>
<body class="admin-body">

<div class="admin-wrapper">
    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="admin-sidebar-brand">
            <i class="fas fa-mug-hot"></i>
            <span>Coffee Corner</span>
        </div>
        <nav class="admin-sidebar-nav">
            <a href="dashboard.php" class="<?= $adminPage === 'dashboard' ? 'active' : '' ?>"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="menu.php" class="<?= $adminPage === 'menu' ? 'active' : '' ?>"><i class="fas fa-utensils"></i> Menu Items</a>
            <a href="messages.php" class="<?= $adminPage === 'messages' ? 'active' : '' ?>"><i class="fas fa-envelope"></i> Messages</a>
            <a href="logout.php" class="admin-logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="admin-main" id="adminMain">
        <header class="admin-topbar">
            <button class="admin-toggle" id="adminToggle"><i class="fas fa-bars"></i></button>
            <h1><?= e($adminTitle) ?></h1>
            <div class="admin-user">
                <i class="fas fa-user-circle"></i>
                <span><?= e($_SESSION['admin_name'] ?? 'Admin') ?></span>
            </div>
        </header>
        <div class="admin-content">
