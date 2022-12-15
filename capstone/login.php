<?php
    include_once("header.php");
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/Login.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bungee&family=Kanit:wght@200&family=Poppins:wght@200&display=swap');
    </style>
</head>
<body>
        <div class="loginPopup"id="loginPopup">
            <form class="popup-content form" action="phpfunctions/login.inc.php" method="POST">
            <h2>Log In</h2>
            <?php
                if(isset($_GET["error"])) {
                    if($_GET["error"] == "emptyinput") {
                        echo "<h3 style='background-color: black; color: #FFFFFF;'>Fill in all the fields!</h3>
                        <br>";
                    }
                    else if($_GET["error"] == "loginfailed") {
                        echo "<h3 style='background-color: black; color: #FFFFFF;'>Wrong login information!</h3><br>";
                    }
                }
            ?>
            <div class="form-container">
                <div class="form-element">
                    <label for="Email">Email</label>
                    <br>
                    <input name="email" type="text" id="email" placeholder="Enter Email">
                </div>
                <div class="form-element">
                    <label for="password">Password</label>
                    <br>
                    <input name="password" type="password" id="password" placeholder="Enter password">
                </div>
                <div>
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Remember me</label>
                </div>
                <div class="form-element">
                    <button type="submit" name="login">Sign  in</button>
                </div>
                <br>
                <?php
                if(isset($_GET["error"])) {
                    if($_GET["error"] == "emptyinput") {
                        echo "<h3 style='background-color: black; color: #FFFFFF;'>Fill in all the fields!</h3>
                        <br>";
                        #Paki-palitan nalang ng alert() para clean tignan
                    }
                    else if($_GET["error"] == "loginfailed") {
                        echo "<h3 style='background-color: black; color: #FFFFFF;'>Wrong login information!</h3><br>";
                    }   #Same dito (line 54)
                }
            ?>
                <div class="form-element">
                    <p>Or , Login with</p>
                </div>
                
                <div class= "other-login"> 
                    
                    <button id="facebook-login" href="#" ><img src="imgResources/FacebookLogo.png" width="40px" height="40px"></button>
                    <button id="gmail-login" href="#"><img src="imgResources/GmailLogo.png" width="40px" height="40px"></button>
                    <button id="instagram-login" href="#"><img src="imgResources/InstagramLogo.png" width="40px" height="40px"></button>

                </div>
                <div class="form-element">
                </div>
            </div>
            </form>
        </div>
    <?php
        include_once("footer.php");
    ?>