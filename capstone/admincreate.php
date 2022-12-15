<?php
    include_once('adminheader.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <form action="phpfunctions/createadmin.inc.php" method="POST">
        <div>
            <h1>Create User</h1>
            <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Fill in all the fields!</h4><br>";
                }
                else if($_GET["error"] == "invaliduser") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Input a proper name!</h4><br>";
                }
                else if($_GET["error"] == "passwordmismatch") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Passwords don't match!</h4><br>";
                }
                else if($_GET["error"] == "userexists") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>User is already registered.</h4><br>";
                }
                else if($_GET["error"] == "queryfailed") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Something went wrong. Try again.</h4><br>";
                }
                else if($_GET["error"] == "none") {
                    echo "<h4 style='background-color: #009900; color: #FFFFFF;'>You have successfully created a user!</h4><br>";
                }
            }
            ?>
            <div class="">
                <input id="username" name="username" type="text" placeholder="Username">
                <input id="password" name="password" type="password" placeholder="Password">
                <input id="repass" name="repass" type="password" placeholder="Confirm Password">
                <select name="adminType" id="adminType">
                    <option value="" disabled selected hidden>User Type</option>
                    <option value="admin">admin</option>
                    <option value="manager">manager</option>
                </select>
                <button type="submit" name="register">Create</button>
            </div>
        </div>
    </form>
</body>
</html>