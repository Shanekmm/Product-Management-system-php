
<?php
include "classes/Conn.php";
include "classes/Log.php";
// include "classes/Classes.php";
Log::requireLogIn();
$currentId=$_SESSION["user_id"];
//var_dump($currentId);
$currentName=$_SESSION["user_name"];
//var_dump($currentName);
$currentMail=$_SESSION["user_mail"];
//var_dump($currentMail);
$currentPass=$_SESSION["user_pass"];
//var_dump($currentPass);
?>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit= no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1    /dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<h4>Update Details</h4>
    <form action="includes/update.php" method="post">
    <label for="name">Update name </label>
        <input type="text" name="name" id="name" value="<?=$currentName;?>"><br>
        <label for="email">Update the mail address </label>
        <input type="email" name="email" id="email" placeholder="E-mail" value="<?=$currentMail;?>"><br>
        <label for="password">Update the password </label>
        <input type="password" name="pass" id="pass" placeholder="password" value="<?=$currentPass;?>"><br>
        <button type="submit" name="submit">Update</button>
     </form>