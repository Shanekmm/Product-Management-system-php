<?php
// ini_set('display_errors', 1);

// ini_set('display_startup_errors', 1);

// error_reporting(E_ALL);
class Log extends Conn
{
    protected function getUser($name,$password)
    {
       $stmt=$this->Connect()->prepare('SELECT u_password FROM  users WHERE u_name= ? OR u_email= ?;');
       if(!$stmt->execute(array($name,$name)))
       {
           $stmt=null;
           header("location: ../index.php?error=stmtfailed");
           exit();
       }
       if($stmt->rowCount() == 0)
       {
        $stmt=null;
        header("location: ../index.php?error=usernotfound");
           exit();
       }
       $pwdHashed=$stmt->fetchAll(PDO::FETCH_ASSOC);
       $checkPwd=password_verify($password,$pwdHashed[0]['u_password']);
       if($checkPwd == false)
       {
        $stmt=null;
        header("location: ../index.php?error=wrongpassword");
           exit();
       }
       else if($checkPwd == true){
        $stmt=$this->Connect()->prepare('SELECT * FROM users WHERE u_name = ? OR u_email= ? AND u_password= ?;');
        $hashed=password_hash($password,PASSWORD_DEFAULT);
        if(!$stmt->execute(array($name,$name,$hashed[0]['u_password'])))
        {
            $stmt='null';
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount() == 0)
       {
        $stmt=null;
        header("location: ../index.php?error=usernotfound");
           exit();
       }
       $user=$stmt->fetchAll(PDO::FETCH_ASSOC);
       session_start();
       $_SESSION["user_id"]=$user[0]["u_id"];
       $_SESSION["user_name"]=$user[0]["u_name"];
       $_SESSION["user_mail"]=$user[0]["u_email"];
       $_SESSION["user_pass"]=$password;
       header("location: ../home.php?error=no error");
    }
      $stmt=null;
    }

    public static function isLoggedIn()
 {
    session_start();
     return isset($_SESSION["user_id"]);
 }
 public static function requireLogIn()
 {
     if (! static:: isLoggedIn()) {
 
         die("unauthorised");
     
     }}
}