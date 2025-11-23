<?php
include 'views/layout/header.php';
$parser = new Parsedown();
?>

<?php foreach ($posts as $post): ?>
    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title"><?= htmlspecialchars($post->title) ?></h3>
            <small class="text-muted"><?= htmlspecialchars($post->created_at) ?></small>
            <div class="card-text mt-2">
                <?= $parser->text($post->content) ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<!-- Пагінація -->
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                <a class="page-link" href="?page=<?= $i ?><?= $search !== '' ? '&search=' . urlencode($search) : '' ?>">
                    <?= $i ?>
                </a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>

<?php include 'views/layout/footer.php'; ?>
