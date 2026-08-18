<?php
$pageTitle = 'Manage Menu';
$adminPage = 'menu';
require_once __DIR__ . '/../includes/admin_header.php';

$categories = ['Hot Coffee', 'Cold Coffee', 'Tea', 'Snacks', 'Desserts'];
$allItems = getMenuItems($pdo);

// Handle Add
if (isset($_POST['action']) && $_POST['action'] === 'add') {
    $name        = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price       = trim($_POST['price'] ?? '');
    $category    = trim($_POST['category'] ?? '');
    $image       = trim($_POST['image'] ?? '');

    if ($name && $description && $price && $category && $image) {
        $stmt = $pdo->prepare("INSERT INTO menu_items (name, description, price, category, image) VALUES (:name, :description, :price, :category, :image)");
        $stmt->execute([
            ':name' => $name, ':description' => $description, ':price' => $price,
            ':category' => $category, ':image' => $image
        ]);
        redirect('menu.php?added=1');
    }
}

// Handle Edit
if (isset($_POST['action']) && $_POST['action'] === 'edit') {
    $id          = (int)($_POST['id'] ?? 0);
    $name        = trim($_POST['name'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $price       = trim($_POST['price'] ?? '');
    $category    = trim($_POST['category'] ?? '');
    $image       = trim($_POST['image'] ?? '');

    if ($id && $name && $description && $price && $category && $image) {
        $stmt = $pdo->prepare("UPDATE menu_items SET name = :name, description = :description, price = :price, category = :category, image = :image WHERE id = :id");
        $stmt->execute([
            ':name' => $name, ':description' => $description, ':price' => $price,
            ':category' => $category, ':image' => $image, ':id' => $id
        ]);
        redirect('menu.php?updated=1');
    }
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM menu_items WHERE id = :id");
    $stmt->execute([':id' => $id]);
    redirect('menu.php?deleted=1');
}

// Get item for editing
$editItem = null;
if (isset($_GET['edit'])) {
    $editItem = getMenuItem($pdo, (int)$_GET['edit']);
}

$added   = isset($_GET['added']);
$updated = isset($_GET['updated']);
$deleted = isset($_GET['deleted']);
?>

<?php if ($added): ?><div class="alert alert-success"><i class="fas fa-check-circle"></i> Menu item added successfully.</div><?php endif; ?>
<?php if ($updated): ?><div class="alert alert-success"><i class="fas fa-check-circle"></i> Menu item updated successfully.</div><?php endif; ?>
<?php if ($deleted): ?><div class="alert alert-success"><i class="fas fa-check-circle"></i> Menu item deleted.</div><?php endif; ?>

<!-- Add/Edit Form -->
<div class="admin-panel mb-4">
    <div class="admin-panel-header">
        <h3><i class="fas fa-<?= $editItem ? 'edit' : 'plus' ?>"></i> <?= $editItem ? 'Edit Menu Item' : 'Add New Menu Item' ?></h3>
        <?php if ($editItem): ?>
            <a href="menu.php" class="admin-panel-link">Cancel Edit <i class="fas fa-times"></i></a>
        <?php endif; ?>
    </div>
    <div class="admin-panel-body">
        <form method="POST" action="">
            <input type="hidden" name="action" value="<?= $editItem ? 'edit' : 'add' ?>">
            <?php if ($editItem): ?>
                <input type="hidden" name="id" value="<?= e($editItem['id']) ?>">
            <?php endif; ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Item Name</label>
                    <input type="text" name="name" class="form-control" required value="<?= $editItem ? e($editItem['name']) : '' ?>" placeholder="e.g. Cappuccino">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Price (₹)</label>
                    <input type="number" step="0.01" name="price" class="form-control" required value="<?= $editItem ? e($editItem['price']) : '' ?>" placeholder="e.g. 120">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select" required>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= e($cat) ?>" <?= $editItem && $editItem['category'] === $cat ? 'selected' : '' ?>><?= e($cat) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-12">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" required placeholder="Short description of the item..."><?= $editItem ? e($editItem['description']) : '' ?></textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Image URL</label>
                    <input type="url" name="image" class="form-control" required value="<?= $editItem ? e($editItem['image']) : '' ?>" placeholder="https://...">
                    <small class="text-muted">Paste a direct image URL (e.g. from Pexels or Unsplash).</small>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn-coffee btn-primary-coffee"><?= $editItem ? 'Update Item' : 'Add Item' ?> <i class="fas fa-<?= $editItem ? 'save' : 'plus' ?>"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Menu Items Table -->
<div class="admin-panel">
    <div class="admin-panel-header">
        <h3><i class="fas fa-list"></i> All Menu Items (<?= count($allItems) ?>)</h3>
    </div>
    <div class="admin-panel-body">
        <div class="table-responsive">
            <table class="table admin-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allItems as $item): ?>
                        <tr>
                            <td><img src="<?= e($item['image']) ?>" alt="<?= e($item['name']) ?>" class="admin-thumb"></td>
                            <td><strong><?= e($item['name']) ?></strong></td>
                            <td><span class="badge bg-secondary"><?= e($item['category']) ?></span></td>
                            <td>₹<?= number_format($item['price']) ?></td>
                            <td class="admin-desc"><?= e(mb_substr($item['description'], 0, 50)) ?><?= mb_strlen($item['description']) > 50 ? '...' : '' ?></td>
                            <td>
                                <a href="menu.php?edit=<?= $item['id'] ?>" class="btn btn-sm btn-edit"><i class="fas fa-edit"></i></a>
                                <a href="menu.php?delete=<?= $item['id'] ?>" class="btn btn-sm btn-delete" onclick="return confirm('Delete this item?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/admin_footer.php'; ?>
