
<?php
// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);
session_start();
 if(isset($_SESSION["user_id"]))
 {
//    $name= $_POST["name"];
//    $email=$_POST["email"];
//    $password= $_POST["pass"];
   $id=$_SESSION["user_id"];
   //$c ontact= $_POST["contact"];
   include "../classes/Conn.php";
   include "../classes/Sign.php";
   include "../classes/Classes.php";
   $delete =new Sign();
   $delete->deleteBYId($id);
   header("location:../index.php?error=none"); 
 }
    
