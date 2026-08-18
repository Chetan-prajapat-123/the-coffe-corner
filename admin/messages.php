<?php
$pageTitle = 'Messages';
$adminPage = 'messages';
require_once __DIR__ . '/../includes/admin_header.php';

// Mark as read
if (isset($_GET['read'])) {
    $id = (int)$_GET['read'];
    $pdo->prepare("UPDATE contact_messages SET is_read = 1 WHERE id = :id")->execute([':id' => $id]);
    redirect('messages.php');
}

// Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $pdo->prepare("DELETE FROM contact_messages WHERE id = :id")->execute([':id' => $id]);
    redirect('messages.php?deleted=1');
}

$deleted = isset($_GET['deleted']);

$messages = $pdo->query("SELECT * FROM contact_messages ORDER BY created_at DESC")->fetchAll();
$unread = $pdo->query("SELECT COUNT(*) FROM contact_messages WHERE is_read = 0")->fetchColumn();
?>

<?php if ($deleted): ?><div class="alert alert-success"><i class="fas fa-check-circle"></i> Message deleted.</div><?php endif; ?>

<div class="admin-panel">
    <div class="admin-panel-header">
        <h3><i class="fas fa-envelope"></i> Contact Messages (<?= count($messages) ?>)</h3>
        <?php if ($unread > 0): ?>
            <span class="badge bg-danger"><?= $unread ?> unread</span>
        <?php endif; ?>
    </div>
    <div class="admin-panel-body">
        <?php if (empty($messages)): ?>
            <p class="text-muted text-center py-5">No messages yet.</p>
        <?php else: ?>
            <div class="message-list">
                <?php foreach ($messages as $msg): ?>
                    <div class="message-item <?= $msg['is_read'] ? '' : 'unread' ?>">
                        <div class="message-item-avatar"><?= strtoupper(substr($msg['name'], 0, 1)) ?></div>
                        <div class="message-item-body">
                            <div class="message-item-header">
                                <h4><?= e($msg['name']) ?> <?php if (!$msg['is_read']): ?><span class="badge bg-danger">New</span><?php endif; ?></h4>
                                <span class="message-item-date"><?= date('M j, Y g:i A', strtotime($msg['created_at'])) ?></span>
                            </div>
                            <div class="message-item-meta">
                                <a href="mailto:<?= e($msg['email']) ?>"><i class="fas fa-envelope"></i> <?= e($msg['email']) ?></a>
                                <a href="tel:<?= e($msg['phone']) ?>"><i class="fas fa-phone"></i> <?= e($msg['phone']) ?></a>
                            </div>
                            <p class="message-item-text"><?= e($msg['message']) ?></p>
                            <div class="message-item-actions">
                                <?php if (!$msg['is_read']): ?>
                                    <a href="messages.php?read=<?= $msg['id'] ?>" class="btn btn-sm btn-mark-read"><i class="fas fa-check"></i> Mark Read</a>
                                <?php endif; ?>
                                <a href="messages.php?delete=<?= $msg['id'] ?>" class="btn btn-sm btn-delete" onclick="return confirm('Delete this message?')"><i class="fas fa-trash"></i> Delete</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/admin_footer.php'; ?>
