<?php
    include_once("header.php");
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Register.css">
    <title>Register</title>
</head>
<body>
    
    <div class="RegistrationBox">
    <div class="container">
        <form action="phpfunctions/register.inc.php" method="POST">

        <?php
            if(isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Fill in all the fields!</h4><br>";
                }
                else if($_GET["error"] == "invalidname") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Input a proper name!</h4><br>";
                }
                else if($_GET["error"] == "invalidemail") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Input proper email!</h4><br>";
                }
                else if($_GET["error"] == "emailmismatch") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Emails don't match!</h4><br>";
                }
                else if($_GET["error"] == "passwordmismatch") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Passwords don't match!</h4><br>";
                }
                else if($_GET["error"] == "emailexists") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Email is already registered.</h4><br>";
                }
                else if($_GET["error"] == "queryfailed") {
                    echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Something went wrong. Try again.</h4><br>";
                }
                else if($_GET["error"] == "none") {
                    echo "<h4 style='background-color: #009900; color: #FFFFFF;'>You have successfully signed up!</h4><br>";
                }
            }
        ?>
        <div class="heading">
        <img src="imgResources/bobbabrew-3.png" alt="Bobba Icon.png">
        <div class="text">Create An Account</div>
        </div>
        <div class="input-container">
            <div class="Frame">
                <div class="inputs">
                    <input id="txtFirstName" name="fname" type="text" placeholder="First Name">
                    <input id="txtLastName" name="lname" type="text" placeholder="Last Name">
                    <input id="txtEmail" name="email" type="text" placeholder="E-Mail Address">
                    <input id="txtConfirmEmail" name="emailRe" type="text" placeholder="Confirm E-Mail Address">
                    <input id="txtPassword" name="password" type="password" placeholder="Password">
                    <input id="txtConfirmPass" name="passwordRe" type="password" placeholder="Confirm Password">
                    
                </div>
            </div>
            <div class="button-container">
                    <div class="TAC"><input type="checkbox" name="" id="TAC" name="TAC">Terms and Condition</div>
                    <button type="submit" name="register">Register</button>
            </div>
        </form>
        </div>
        </div>
    </div>
</body>


<?php
    include_once("footer.php");
?>