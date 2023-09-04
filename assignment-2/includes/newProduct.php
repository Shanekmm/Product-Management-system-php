<?php

// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);

   $pname= $_POST["pname"];
   $pquant=$_POST["quant"];
   $price= $_POST["price"];
   $cat=  $_POST["c_id"];
   //$contact= $_POST["contact"];
   include "../classes/Conn.php";
  // include "../classes/Sign.php";
   include "../classes/Product.php";
   
   $pnew =new Product($pname,$pquant,$price,$cat);
   if(isset($_POST["submit"]))
   {
   $pnew->addProduct();}
   else{
    $pid=$_POST["pid"];
    $pnew->updateProduct($pid);}

   header("location:../products.php?error=none"); 
                       
