<?php
ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);
require '../includes/init.php';
$conn = require '../includes/db.php';

$paginator =new Paginator(isset($_GET['page'])? $_GET['page']:1,3, Article::getTotal($conn));

$articles = Article::getPage($conn, $paginator->limit,$paginator->offset);
Auth::requireLogIn();
?>
<?php require '../includes/header.php'; ?>

    
    <p><a href="new-article.php">New article</a></p>

<?php if (empty($articles)) : ?>
    <p>No articles found.</p>
<?php else : ?>

    <table>
        <thead>
            <th>TITLE</th>
        </thead>
        <tbody>
        <?php foreach ($articles as $article) : ?>
            <tr>
                <td>
                    <a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a>
        </td>
        </tr>
        <?php endforeach; ?>
    </ul>

<?php endif; ?>
        </tbody>
    </table>
    <?php require '../includes/pagination.php'; ?> 

<?php require '../includes/footer.php'; ?>
