
<?php
// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);
include "../classes/Conn.php";
include "../classes/Log.php";
include "../classes/Category.php";
Log::requireLogIn();

//$con = new Conn();
//$connect = $con->connect();

// Retrieve the list of categories
$categoryObj = new Category();
$categories = $categoryObj->getCategory();
?>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit= no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1    /dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<h4>New Product</h4>
    <form action="newProduct.php" method="post">
    <label for="name">Enter the name</label>
        <input type="text" name="pname" id="pname" placeholder="Name"><br>
        <label for="quant">Enter the Stock quantity </label>
        <input type="text" name="quant" id="quant" placeholder="Quantity" ><br>
        <label for="price">Enter the price </label>
        <input type="text" name="price" id="price" placeholder="Price"><br>
        <label for="c_id">Category</label>
        <select name="c_id"required>
            <?php foreach($categories as $category) : ?>
                <? var_dump($category); ?>
                <option value="<?= $category['p_category']; ?>"> <?= $category['p_category']; ?></option>
            <?php endforeach; ?>
        </select><br>
        <button type="submit" name="submit">Add</button>
     </form>