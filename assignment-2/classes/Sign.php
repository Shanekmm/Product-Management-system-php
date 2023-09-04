<?php
// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);
class Sign extends Conn{
    protected function setUser($name,$email,$password)
 {
    $stmt=$this->Connect()->prepare('INSERT INTO users (u_name,u_email,u_password) VALUES(?,?,?);');
    $hashed=password_hash($password,PASSWORD_DEFAULT);
    if(!$stmt->execute(array($name,$email,$hashed)))
    {
        $stmt='null';
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
   $stmt=null;
 }
 protected function checkUser($name,$email)
 {
    $stmt=$this->Connect()->prepare('SELECT u_name FROM users WHERE u_name= ? OR u_email= ?;');
    if(!$stmt->execute(array($name,$email)))
    {
        $stmt='null';
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
    $resultcheck='false';
    if($stmt->rowCount()>0)
    {
        $resultcheck='false';
    }
    else
    {
        $resultcheck='true';
    }
    return $resultcheck;
 }
 protected function modUser($name,$email,$password,$id)
 {
    $stmt=$this->Connect()->prepare("UPDATE users SET u_name= ? ,u_email= ? ,u_password= ? WHERE u_id=?");
    $hashed=password_hash($password,PASSWORD_DEFAULT);
    if(!$stmt->execute(array($name,$email,$hashed,$id)))
    {
        $stmt='null';
        header("location: ../index.php?error=stmtfailed");
        exit();
    }
   $stmt=null;
 }
 public function deleteBYId($id)
 {
    $stmt=$this->Connect()->prepare("DELETE FROM users  WHERE u_id=?;");
    //$hashed=password_hash($password,PASSWORD_DEFAULT);
    if(!$stmt->execute(array($id)))
    {
        $stmt='null';
        //
      //  header("location: ../index.php?error=stmtfailed");
      echo "Not deleted";
        exit();
    }
   $stmt=null;
 }
}