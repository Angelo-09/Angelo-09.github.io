<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/HomePage.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bungee&family=Kanit:wght@200&family=Poppins:wght@200&display=swap');
    </style>
</head>
<body>
    <div class="Header">
        <div id="logo">
            <a href="homepage.php"><img id="HeaderLogo" src="imgResources/BobbaBrewLogo1.png" alt="BobaIcon.png"></a>
        </div>
        <div class="HeaderRight">
            <a href="menu.php"><p>Menu</p></a>
            <a href="orders.php"><p>Orders</p></a>
            <?php 
                if(isset($_SESSION["useremail"])) {
                    echo "<a href='profile.php'><p>Profile</p></a>";
                    echo "<a href='phpfunctions/logout.php'><p>Logout</p></a>";
                }
                else {
                    echo "<a href='register.php'><p>Signup</p></a>";
                    echo "<a href='login.php'><p>Login</p></a>";
                }
            ?>
        </div>
    </div>

<div class="Body">