<?php
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
require '../includes/init.php';
Auth::requireLogIn();
$conn=require '../includes/db.php';

if (isset($_GET['id'])) {

    $article = Article::getByID($conn, $_GET['id']);

    Auth::requireLogIn();

} else {
    die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if($article->setImagefile($conn,null))
        {
            if($previous_image)
            {
                unlink("../uploads/$previous_image");
            }
            Url::redirect("/admin/article.php?id={$article->id}");
        }
     }



?>
<?php require '../includes/header.php'; ?>

<h2>delete IMAGE</h2>
<?php if($article->image_file) : ?>
    <img src="/uploads/<?=$article->image_file; ?>">
    <?php endif; ?>
<form method="post">
    <p> are you sure?</p>
    <button>Delete</button>
    <a href="editnew.php?id=<?= $article->id ?>">Cancel</a>


<?php require '../includes/footer.php'; ?>

