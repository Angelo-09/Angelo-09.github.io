<?php

    if(isset($_POST["foodEdit"])) {
        $prodId = $_POST["foodId"];
        $prodName = $_POST["foodName"];
        $prodPrice = $_POST["foodPrice"];
        $prodChic = $_POST["foodChicken"];
        $prodNacho = $_POST["foodNacho"];
        $prodFries = $_POST["foodFries"];
        $prodChe = $_POST["foodCheese"];

        require_once 'connection.php';
        require_once 'functions.php';

        // if(emptyInputCreate($username, $password, $repass, $adminType) !== false) {
        //     header("Location: ../admincreate.php?error=emptyinput");
        //     exit();
        // }
        // if(invalidUser($username) !== false) {
        //     header("Location: ../admincreate.php?error=invaliduser");
        //     exit();
        // }
        // if(passMismatch($password, $repass) !== false) {
        //     header("Location: ../admincreate.php?error=passwordmismatch");
        //     exit();
        // }
        // if(userExists($con, $username) !== false) {
        //     header("Location: ../admincreate.php?error=userexists");
        //     exit();
        // }

        addFoods($con, $prodId, $prodName, $prodPrice, $prodChic, $prodNacho, $prodFries, $prodChe);
    }
    else {
        header("Location: ../addfoods.php");
        exit();
    }