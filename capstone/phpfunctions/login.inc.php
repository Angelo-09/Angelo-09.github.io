<?php

    if(isset($_POST["login"])) {
        $username = $_POST["email"];
        $password = $_POST["password"];

        require_once 'connection.php';
        require_once 'functions.php';

        if(emptyInputLogin($username, $password) !== false) {
            header("Location: ../login.php?error=emptyinput");
            exit();
        }

        loginUser($con, $username, $password);
    }
    else {
        header("Location: ../login.php");
        exit();
    }