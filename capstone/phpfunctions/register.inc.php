<?php

    if(isset($_POST["register"])) {
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $emailRe = $_POST["emailRe"];
        $password = $_POST["password"];
        $passwordRe = $_POST["passwordRe"];

        require_once 'connection.php';
        require_once 'functions.php';

        if(emptyInputSignup($fname, $lname, $email, $emailRe, $password, $passwordRe) !== false) {
            header("Location: ../register.php?error=emptyinput");
            exit();
        }
        if(invalidName($fname, $lname) !== false) {
            header("Location: ../register.php?error=invalidname");
            exit();
        }
        if(invalidEmail($email) !== false) {
            header("Location: ../register.php?error=invalidemail");
            exit();
        }
        if(emailMismatch($email, $emailRe) !== false) {
            header("Location: ../register.php?error=emailmismatch");
            exit();
        }
        if(passwordMismatch($password, $passwordRe) !== false) {
            header("Location: ../register.php?error=passwordmismatch");
            exit();
        }
        if(emailExists($con, $email) !== false) {
            header("Location: ../register.php?error=emailexists");
            exit();
        }

        userSignUp($con, $fname, $lname, $email, $password);
    }
    else {
        header("Location: ../register.php");
        exit();
    }