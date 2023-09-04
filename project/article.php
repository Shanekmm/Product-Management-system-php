<?php

require 'includes/init.php';
$conn=require 'includes/db.php';

if (isset($_GET['id'])) {
    $article = Article::getCat($conn, $_GET['id']);
} else {
    $article = null;
}
var_dump($article);

?>
<?php require 'includes/header.php'; ?>

<?php if ($article) : ?>

    <article>
        <?php if($article[0]['c_name']) : ?>
            <p> CATEGORIES 
            <?php foreach ($article as $a) : ?>
                <?= htmlspecialchars($a['c_name']); ?>
                <?php endforeach ?>
            </p>
                <?php endif; ?>
        <h2><?= htmlspecialchars($article[0]['title']); ?></h2>
        <?php if($article->image_file) : ?>
            <img src="/uploads/<?= $article->image_file;?>">
            <?php endif; ?>
            <p><?= htmlspecialchars($article[0]['content']); ?></p>
    </article>

<?php else : ?>
    <p>Article not found.</p>
<?php endif; ?>

<?php require 'includes/footer.php'; ?>
