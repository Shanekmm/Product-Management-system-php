<?php
   include "classes/Conn.php";
   include "classes/Log.php";
   include "classes/Show.php";
    $con=new Conn();
    $connect=$con->connect();
    $showObj=new Show();
    $resShow=$showObj->showProducts();
   Log::requireLogIn();
  // echo "hi";
?>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit= no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1    /dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<h1>Product Details</h1>
    <table class="table">
        <thead>
    <tr>
       <th scope="col"> Id</th>   
       <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col"></th>
        <th scope="col"></th>
   </tr>
        </thead>
        <tbody>
            <?php
            if(!is_null($resShow))
            {
                foreach($resShow as $item)
                { ?>
        <tr>
        <th scope="row"><?=$item['product_id'] ?></td>
        <td><?=$item['product_name'] ?></td>
        <td><?=$item['quantity'] ?></td>
        <td><?=$item['price'] ?></td>
        <form action="includes/deleteProduct.php" method="POST">
        <input type="hidden" name="product_id" value="<?=$item['product_id'] ?>">
       <td> <input type="submit" value="Delete"></td></form>
       <form action="includes/updateProduct.php" method="POST">
       <input type="hidden" name="pid" value="<?=$item['product_id'] ?>">
       <input type="hidden" name="quant" value="<?=$item['quantity'] ?>">
        <input type="hidden" name="pname" value="<?=$item['product_name'] ?>">
        <input type="hidden" name="price" value="<?=$item['price'] ?>">
        <td> <input type="submit" name="update" value="Update Product"></td></form>
   </tr>
   <?php }}?>
        </tbody>
        </table>
   <div>
        <a href="includes/addProduct.php">Add Product </a>
                </div>
