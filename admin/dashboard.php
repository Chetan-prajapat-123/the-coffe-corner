<?php
$pageTitle = 'Dashboard';
$adminPage = 'dashboard';
require_once __DIR__ . '/../includes/admin_header.php';

$stats = getStats($pdo);
$recentMessages = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC LIMIT 5")->fetchAll();
$recentItems = $pdo->query("SELECT * FROM menu_items ORDER BY created_at DESC LIMIT 5")->fetchAll();
?>

<!-- Stat Cards -->
<div class="row g-4 mb-4">
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="stat-card-icon" style="background: rgba(74,44,26,0.1); color: #4a2c1a;"><i class="fas fa-utensils"></i></div>
            <div class="stat-card-info">
                <h3><?= $stats['menu_count'] ?></h3>
                <p>Menu Items</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="stat-card-icon" style="background: rgba(201,168,132,0.2); color: #c9a884;"><i class="fas fa-layer-group"></i></div>
            <div class="stat-card-info">
                <h3><?= $stats['categories'] ?></h3>
                <p>Categories</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="stat-card-icon" style="background: rgba(40,167,69,0.1); color: #28a745;"><i class="fas fa-envelope"></i></div>
            <div class="stat-card-info">
                <h3><?= $stats['message_count'] ?></h3>
                <p>Total Messages</p>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="stat-card">
            <div class="stat-card-icon" style="background: rgba(220,53,69,0.1); color: #dc3545;"><i class="fas fa-bell"></i></div>
            <div class="stat-card-info">
                <h3><?= $stats['unread_count'] ?></h3>
                <p>Unread Messages</p>
            </div>
        </div>
    </div>
</div>

<!-- Recent Messages -->
<div class="row g-4">
    <div class="col-lg-6">
        <div class="admin-panel">
            <div class="admin-panel-header">
                <h3><i class="fas fa-envelope-open-text"></i> Recent Messages</h3>
                <a href="messages.php" class="admin-panel-link">View All <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="admin-panel-body">
                <?php if (empty($recentMessages)): ?>
                    <p class="text-muted text-center py-4">No messages yet.</p>
                <?php else: ?>
                    <div class="message-list">
                        <?php foreach ($recentMessages as $msg): ?>
                            <div class="message-item <?= $msg['is_read'] ? '' : 'unread' ?>">
                                <div class="message-item-avatar"><?= strtoupper(substr($msg['name'], 0, 1)) ?></div>
                                <div class="message-item-body">
                                    <h4><?= e($msg['name']) ?> <?php if (!$msg['is_read']): ?><span class="badge bg-danger">New</span><?php endif; ?></h4>
                                    <p><?= e(mb_substr($msg['message'], 0, 80)) ?><?= mb_strlen($msg['message']) > 80 ? '...' : '' ?></p>
                                    <span class="message-item-date"><?= date('M j, Y g:i A', strtotime($msg['created_at'])) ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Recent Menu Items -->
    <div class="col-lg-6">
        <div class="admin-panel">
            <div class="admin-panel-header">
                <h3><i class="fas fa-utensils"></i> Recent Menu Items</h3>
                <a href="menu.php" class="admin-panel-link">Manage <i class="fas fa-arrow-right"></i></a>
            </div>
            <div class="admin-panel-body">
                <?php if (empty($recentItems)): ?>
                    <p class="text-muted text-center py-4">No menu items yet.</p>
                <?php else: ?>
                    <div class="recent-menu-list">
                        <?php foreach ($recentItems as $item): ?>
                            <div class="recent-menu-item">
                                <img src="<?= e($item['image']) ?>" alt="<?= e($item['name']) ?>">
                                <div>
                                    <h4><?= e($item['name']) ?></h4>
                                    <span><?= e($item['category']) ?></span>
                                </div>
                                <span class="recent-menu-price">₹<?= number_format($item['price']) ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/admin_footer.php'; ?>
