<?php
// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);
class Classes extends Sign
{
   //private $id;
   private $name;
   private $email;
   private $password;
   public function __construct($name,$email,$password)
   {
     $this->name =$name;
     $this->email =$email;
     $this->password=$password;
     //$this->id=$id;
   }
   public function signUpUser()
   {
     if($this->emptyInput()==false)
     {
        header("location:../index.php?error=emptyinput");
        exit();
     }
     if($this->isCheck()==false)
     {
        header("location:../index.php?error=useroremailtaken");
        exit();
     }
     $this->setUser($this->name,$this->email,$this->password);
     
   }
   public function updateUser($id)
   {
      if($this->emptyInput()==false)
      {
         header("location:../index.php?error=emptyinput");
         exit();
      }
      if($this->isCheck()==false)
      {
         header("location:../index.php?error=useroremailtaken");
         exit();
      }
      $this->modUser($this->name,$this->email,$this->password,$id);
   }
   private function emptyInput()
   {
     $result=false;
     if(empty($this->name)||empty($this->email)||empty($this->password))
     {
        $result=false;
     }
     else{
        $result=true;
     }
    return $result;
   }
  private function isCheck()
  {
    $result=false;
    if(!$this->checkUser($this->name,$this->email))
    {
        $result=false;
    }
    else{
        $result=true;
    }
    return $result;
  }

}
