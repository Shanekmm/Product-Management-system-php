<!DOCTYPE html>
<html>
<head>
    <title>My blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit= no">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1    /dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
 <div class="container">
    <header>
        <h1>My blog</h1>
    </header>
    <nav>
        <ul class="nav">
                <li class="nav-item"> <a class="nav-link" href="/">HOME</a></li>
                <?php if(AUTH::isLoggedIn()) : ?>
                <li class="nav-item"> <a class="nav-link" href="/admin/">ADMIN</a> </li>
                <li class="nav-item"> <a class="nav-link" href="/logout.php">LOG OUT</a> </li>
                <?php else : ?>
                    <li class="nav-item"> <a class="nav-link" href="/login.php">LOG IN</a> </li>
                    <?php endif; ?>
                    <li class="nav-item"> <a class="nav-link" href="/contact.php">CONTACT</a> </li>
                </ul>
    </nav>

    <main>
