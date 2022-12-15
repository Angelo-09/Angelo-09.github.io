<?php

    if(isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once 'connection.php';
        require_once 'functions.php';

        if(emptyInputLogin($username, $password) !== false) {
            header("Location: ../adminlogin.php?error=emptyinput");
            exit();
        }

        loginAdmin($con, $username, $password);
    }
    else {
        header("Location: ../adminlogin.php");
        exit();
    }