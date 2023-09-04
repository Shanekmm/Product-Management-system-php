<?php
   include "classes/Conn.php";
   include "classes/Log.php";
   Log::requireLogIn();
  // echo "hi";
?>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit= no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1    /dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<h1>HOME</h1>
<ul>
   <li> <a href="products.php">Products</a>  </li>
   <li> <a href="includes/catProducts.php">Products by Category</a>  </li>
   <li> <a href="editProfile.php">Edit Profile</a><br></li>
   <li> <a href="includes/delete.php">Delete Account</a><br></li>
   <li> <a href="includes/logout.php">LOG OUT</a></li>
</ul>