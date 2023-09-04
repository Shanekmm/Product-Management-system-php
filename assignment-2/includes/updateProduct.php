<?php
// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);
include "../classes/Conn.php";
include "../classes/Log.php";
// include "classes/Classes.php";
Log::requireLogIn();

//if(isset($_POST["submit"]))
//{
  $pname= $_POST["pname"];
  var_dump($pname);
  $pquant=$_POST["quant"];
  var_dump($pquant);
  echo "hi";
  $price= $_POST["price"];
  var_dump($price);
  $pid=$_POST["pid"]
//}

?>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit= no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1    /dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<h4>Update Product</h4>
    <form action="newProduct.php" method="post">
    <input type="hidden" name="pid" value="<?=$pid ?>">
    <label for="name"> Modify name</label>
        <input type="text" name="pname" id="pname" value= "<?= $pname ?>"><br>
        <label for="email">New Stock quantity </label>
        <input type="text" name="quant" id="quant" value="<?= $pquant ?>" ><br>
        <label for="price">Update price </label>
        <input type="text" name="price" id="price" value="<?= $price ?>"><br>
        <button type="submit" name="update">Change</button>
     </form>
