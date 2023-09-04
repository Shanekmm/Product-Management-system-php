<?php
class user
{
    public $id;
    public $username;
    public $password;
    public static function authenticate($conn,$username,$password)
    {
       $sql ="SELECT * FROM user WHERE username=:username";
       $stmt=$conn->prepare($sql);
       $stmt ->bindvalue(':username',$username,PDO::PARAM_STR); 
       $stmt->setFetchMode(PDO::FETCH_CLASS,'user');
       $stmt->execute();
       $user=$stmt->fetch();
       if($user)
       {
            return $user->password==$password;
       }

    }
}