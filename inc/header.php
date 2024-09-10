<?php require_once "./App.php"; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Shop</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="index.php">BLOG</a>               
                <nav class="navbar-nav ml-auto">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <?php
                            if($Session->hasSession("current_login")){
                                $current_user = $Session->Get("current_login");
                                $user_id = $current_user['id'];
                                $username = $current_user['username'];
                                $email = $current_user['email'];
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><?= $username ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="handlers/handleLogout.php">Logout</a>
                        </li>
                        <?php }else{ ?>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Signup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <?php }?>
                    </ul>
                </nav>
            </div>
        </nav>
