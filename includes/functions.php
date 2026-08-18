<?php
/**
 * Helper functions for The Coffee Corner
 */

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Sanitize output to prevent XSS
 */
function e($string) {
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

/**
 * Check if admin is logged in
 */
function isAdminLoggedIn() {
    return isset($_SESSION['admin_id']);
}

/**
 * Redirect to a URL
 */
function redirect($url) {
    header("Location: {$url}");
    exit;
}

/**
 * Require admin login — redirects to login page if not authenticated
 */
function requireAdmin() {
    if (!isAdminLoggedIn()) {
        redirect('login.php');
    }
}

/**
 * Get all menu items grouped by category
 */
function getMenuItems($pdo, $category = null) {
    if ($category) {
        $stmt = $pdo->prepare("SELECT * FROM menu_items WHERE category = :category ORDER BY id");
        $stmt->execute([':category' => $category]);
    } else {
        $stmt = $pdo->query("SELECT * FROM menu_items ORDER BY category, id");
    }
    return $stmt->fetchAll();
}

/**
 * Get menu categories
 */
function getCategories($pdo) {
    $stmt = $pdo->query("SELECT DISTINCT category FROM menu_items ORDER BY category");
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

/**
 * Get a single menu item by ID
 */
function getMenuItem($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM menu_items WHERE id = :id");
    $stmt->execute([':id' => $id]);
    return $stmt->fetch();
}

/**
 * Get dashboard statistics
 */
function getStats($pdo) {
    $stats = [];

    $stats['menu_count'] = $pdo->query("SELECT COUNT(*) FROM menu_items")->fetchColumn();
    $stats['message_count'] = $pdo->query("SELECT COUNT(*) FROM contact_messages")->fetchColumn();
    $stats['unread_count'] = $pdo->query("SELECT COUNT(*) FROM contact_messages WHERE is_read = 0")->fetchColumn();
    $stats['categories'] = $pdo->query("SELECT COUNT(DISTINCT category) FROM menu_items")->fetchColumn();

    return $stats;
}
