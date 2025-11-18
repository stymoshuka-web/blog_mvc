<?php include __DIR__ . '/layout/header.php'; ?>

<article class="p-4 bg-white rounded shadow-sm">
    <h2><?= htmlspecialchars($post->title) ?></h2>
    <p class="text-muted small">Дата: <?= htmlspecialchars($post->date) ?></p>
    <div>
        <?php
        if (class_exists('Parsedown')) {
            $pd = new Parsedown();
            echo $pd->text($post->content);
        } else {
            echo nl2br(htmlspecialchars($post->content));
        }
        ?>
    </div>
    <a class="btn btn-link mt-3" href="index.php">Назад до списку</a>
</article>

<?php include __DIR__ . '/layout/footer.php'; ?>
