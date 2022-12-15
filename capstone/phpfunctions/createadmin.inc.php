<?php

    if(isset($_POST["register"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $repass = $_POST["repass"];
        $adminType = $_POST["adminType"];

        require_once 'connection.php';
        require_once 'functions.php';

        if(emptyInputCreate($username, $password, $repass, $adminType) !== false) {
            header("Location: ../admincreate.php?error=emptyinput");
            exit();
        }
        if(invalidUser($username) !== false) {
            header("Location: ../admincreate.php?error=invaliduser");
            exit();
        }
        if(passMismatch($password, $repass) !== false) {
            header("Location: ../admincreate.php?error=passwordmismatch");
            exit();
        }
        if(userExists($con, $username) !== false) {
            header("Location: ../admincreate.php?error=userexists");
            exit();
        }

        adminSignUp($con, $username, $password, $adminType);
    }
    else {
        header("Location: ../admincreate.php");
        exit();
    }