<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <form action="phpfunctions/adminlogin.inc.php" method="POST">
        <h2>Login</h2>
        <div class="">
            <label for="Username">Username</label>
            <input name="username" type="text" id="username" placeholder="Enter Username">
        </div>
        <div class="">
            <label for="password">Password</label>
            <input name="password" type="password" id="password" placeholder="Enter password">
        </div>
        <div class="">
            <button type="submit" name="login">Sign  in</button>
        </div>
        <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Fill in all the fields!</h4><br>";
                }
                else if($_GET["error"] == "loginfailed") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Wrong login information!</h4><br>";
                }
            }
        ?>
    </form>
</body>
</html>