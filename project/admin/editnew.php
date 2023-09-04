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
    var_dump($_FILES);
    try{
        if(empty($_FILES))
        {
            throw new Exception('Invalid upload');
        }
    switch($_FILES['file']['error'])
    {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE :
            throw new Exception("no file uploaded");
           // break;
        default:
        throw new Exception('An error occured');    
    }
     if($_FILES['file']['size']>1000000){

        throw new Exception("file is too large");
     }
     $mime_types =['image/gif','image/png','image/jpeg'];
     if(! in_array($_FILES['file']['type'],$mime_types))
     {
        throw new Exception("Invalid file type");
     }
     $destination ="../uploads/" . $_FILES['file']['name'];
     $pathinfo = pathinfo($_FILES["file"]["name"]);
     $base=$pathinfo['filename'];
     $base = mb_substr($base,0,200);
     $i=1;
     while(file_exists($destination))
     {
         $filename =$base ."-$i." .$pathinfo['extension'];
         $destination ="../uploads/$filename";
         $i++;

     }
     if(move_uploaded_file($_FILES['file']['tmp_name'],$destination))
     {

        if($article->setImagefile($conn,$filename))
        {
            if($previous_image)
            {
                unlink("../uploads/$previous_image");
            }
            Url::redirect("/admin/article.php?id={$article->id}");
        }
     }
     else
     {
        throw new Exception('unable to move uploaded file');
     }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}


?>
<?php require '../includes/header.php'; ?>

<h2>Edit article IMAGE</h2>
<?php if($article->image_file) : ?>
    <img src="/uploads/<?=$article->image_file; ?>">
<a class ="delete-article" href="deletenew.php?id=<?= $article->id ?>">Delete Image</a>
<?php endif; ?>
<form method="post" enctype="multipart/form-data">
    <div>
        <label for="file">Image File </label>
        <input type="file" name="file" id="file">
    </div>
    <button>Upload</upload>

<?php require '../includes/footer.php'; ?>

