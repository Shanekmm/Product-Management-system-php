<?php
  session_start(); ?>
  <!DOCTYPE html>
  <html>
    <head>
        <title>Product Listing System </title>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit= no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1    /dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
    <div>
        <h4>SignUp</h4>
    <form action="includes/signup.php" method="post">
    <label for="name">Enter name </label>
        <input type="text" name="name" id="name" placeholder="Username"><br><br>
        <label for="email">Enter the mail address </label>
        <input type="email" name="email" id="email" placeholder="E-mail"><br><br>
        <label for="password">Enter the passworrd </label>
        <input type="password" name="pass" id="pass" placeholder="password"><br><br>
        <button type="submit" name="submit">Register</button>
     </form>
     </div>
     <div>
        <h4>LogIn</h4>
        <p>If you already have an account <b>login here</b> </p>
        <form action="includes/loggingIn.php" method="Post">
            <input type="text" name="name" id="name" placeholder="Enter username or Email id"><br>
            <input type="password" name="pass" id="pass" placeholder="Enter password"><br>
            <button type="submit" name="submit">LogIn</button>
</form>
</div>

</body>