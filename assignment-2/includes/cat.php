<?php
include "../classes/Conn.php";
include "../classes/Log.php";
include "../classes/Category.php";
include "classes/Show.php";
    $con=new Conn();
    $connect=$con->connect();
   // $showObj=new Show();
    //$resShow=$showObj->showProducts();
   Log::requireLogIn();
if(isset($_POST["submit"]))
{
 $cat= $_POST["cid"];
 $catobj=new Category();
 $pcategories= $catobj->productByCategory($cat);}
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
            if(!is_null($pcategories))
            {
                foreach($pcategories as $item)
                { ?>
        <tr>
        <th scope="row"><?=$item['product_id'] ?></td>
        <td><?=$item['product_name'] ?></td>
        <td><?=$item['quantity'] ?></td>
        <td><?=$item['price'] ?></td>
   </tr>
   <?php }}?>
        </tbody>
        </table>


