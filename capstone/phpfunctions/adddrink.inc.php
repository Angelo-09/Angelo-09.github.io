<?php

    if(isset($_POST["drinkAdd"])) {
        $prodId = $_POST["drinkId"];
        $prodName = $_POST["drinkName"];
        $prodSize = $_POST["drinkSize"];
        $prodPrice = $_POST["drinkPrice"];
        $prodCoffee = $_POST["drinkCoffee"];
        $prodMilk = $_POST["drinkMilk"];
        $prodCream = $_POST["drinkWhipcream"];
        $prodChoc = $_POST["drinkChoc"];
        $prodOreo = $_POST["drinkOreo"];
        $prodKitkat = $_POST["drinkKitkat"];

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

        addDrinks($con, $prodId, $prodName, $prodSize, $prodPrice, $prodCoffee, $prodMilk, $prodCream, $prodChoc, $prodOreo, $prodKitkat);
    }
    else {
        header("Location: ../adddrinks.php");
        exit();
    }