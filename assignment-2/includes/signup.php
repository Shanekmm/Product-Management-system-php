<?php

// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);
 if(isset($_POST["submit"]))
 {
   $name= $_POST["name"];
   $email=$_POST["email"];
   $password= $_POST["pass"];
   //$contact= $_POST["contact"];
   include "../classes/Conn.php";
   include "../classes/Sign.php";
   include "../classes/Classes.php";
   $signup =new Classes($name,$email,$password);
   $signup->signUpUser();
   header("location:../index.php?error=none"); 

 }
