<?php include __DIR__ . '/layout/header.php'; ?>

<div class="mb-4">
    <form method="get" class="d-flex" action="index.php">
        <input type="hidden" name="action" value="search">
        <input name="query" class="form-control me-2" placeholder="Пошук постів..." value="<?= isset($query) ? htmlspecialchars($query) : '' ?>">
        <button class="btn btn-outline-primary" type="submit">Пошук</button>
        <a href="index.php" class="btn btn-link ms-2">Усі пости</a>
    </form>
</div>

<?php if (empty($posts)): ?>
    <div class="alert alert-info">Пости не знайдені.</div>
<?php else: ?>
    <?php foreach ($posts as $idx => $post): ?>
        <article class="mb-4 p-3 bg-white rounded shadow-sm">
            <h2>
                <a href="index.php?action=view&id=<?= $idx ?>"><?= htmlspecialchars($post->title) ?></a>
            </h2>
            <p class="text-muted small">Дата: <?= htmlspecialchars($post->date) ?></p>
            <div>
                <?php
                // Відображення контенту: якщо є Parsedown — парсимо Markdown, інакше — екранізуємо + nl2br
                if (class_exists('Parsedown')) {
                    $pd = new Parsedown();
                    echo $pd->text($post->content);
                } else {
                    echo nl2br(htmlspecialchars($post->content));
                }
                ?>
            </div>
            <a class="btn btn-sm btn-outline-secondary mt-2" href="index.php?action=view&id=<?= $idx ?>">Читати далі</a>
        </article>
    <?php endforeach; ?>
<?php endif; ?>

<?php include __DIR__ . '/layout/footer.php'; ?>
