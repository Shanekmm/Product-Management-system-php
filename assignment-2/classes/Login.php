<?php
// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);
class Login extends Log
{
   private $name;

   private $password;
   public function __construct($name,$password)
   {
     $this->name =$name;
     $this->password=$password;
   }
   public function logInUser()
   {
     if($this->emptyInput()==false)
     {
        header("location:../index.php?error=emptyinput");
        exit();
     }
     $this->getUser($this->name,$this->password);
   }
   private function emptyInput()
   {
     $result=false;
     if(empty($this->name)||empty($this->password))
     {
        $result=false;
     }
     else{
        $result=true;
     }
    return $result;
   }
}
