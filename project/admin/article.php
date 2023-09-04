<?php

require '../includes/init.php';
$conn=require '../includes/db.php';
Auth::requireLogIn();
if (isset($_GET['id'])) {
    $article = Article::getByID($conn, $_GET['id']);
} else {
    $article = null;
}

?>
<?php require '../includes/header.php'; ?>

<?php if ($article) : ?>

    <article>
        <h2><?= htmlspecialchars($article->title); ?></h2>
        <?php if($article->image_file) : ?>
            <img src="/uploads/<?= $article->image_file;?>">
            <?php endif; ?>
        <p><?= htmlspecialchars($article->content); ?></p>
    </article>

    <a href="edit-article.php?id=<?= $article->id; ?>">Edit</a>
    <a class ="delete-article" href="delete-article.php?id=<?= $article->id; ?>">Delete</a>
    <a href="editnew.php?id=<?= $article->id; ?>">Edit Image</a>

<?php else : ?>
    <p>Article not found.</p>
<?php endif; ?>

<?php require '../includes/footer.php'; ?>
