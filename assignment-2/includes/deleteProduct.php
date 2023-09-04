<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if ('POST' ===  $_SERVER['REQUEST_METHOD'])
{
   include "../classes/Conn.php";
   include "../classes/Sign.php";
   include "../classes/Show.php";
   $pid=$_POST['product_id'];
    var_dump($pid);
    echo "hello";
     $de =new Show();
     $de->deleteProducts($pid);
    header("location:../products.php?error=none"); 

}

