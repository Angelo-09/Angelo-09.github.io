<?php

    function emptyInputSignup($fname, $lname, $email, $emailRe, $password, $passwordRe) {
        $result;
        if(empty($fname) || empty($lname) || empty($email) || empty($emailRe) || empty($password) || empty($passwordRe)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidName($fname, $lname) {
        $result;
        if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidEmail($email) {
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function emailMismatch($email, $emailRe) {
        $result;
        if($email !== $emailRe) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function passwordMismatch($password, $passwordRe) {
        $result;
        if($password !== $passwordRe) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function emailExists($con, $email) {
        $query = "SELECT * FROM users WHERE usersEmail = ?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../register.php?error=queryfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function userSignUp($con, $fname, $lname, $email, $password) {
        $query = "INSERT INTO users (usersFname, usersLname, usersEmail, usersPass) VALUES (?, ?, ?, ?);";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../register.php?error=queryfailed");
            exit();
        }
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $fname, $lname, $email, $hashedPass);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("Location: ../register.php?error=none");
        exit();
    }

    function emptyInputLogin($username, $password) {
        $result;
        if(empty($username) || empty($password)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function loginUser($con, $username, $password) {
        $emailExists = emailExists($con, $username);

        if($emailExists === false){
            header("Location: ../login.php?error=loginfailed");
            exit();
        }

        $passHashed = $emailExists["usersPass"];
        $chkPass = password_verify($password, $passHashed);

        if ($chkPass === false) {
            header("Location: ../login.php?error=loginfailed");
            exit();
        }
        else if ($chkPass === true) {
            session_start();
            $_SESSION["userid"] = $emailExists["usersId"];
            $_SESSION["useremail"] = $emailExists["usersEmail"];
            $_SESSION["username"] = $emailExists["usersFname"];
            header("Location: ../homepage.php");
            exit();
        }
    }

#------------------------ADMIN------------------------------------

    function adminExists($con, $username) {
        $query = "SELECT * FROM admins WHERE adminsUser = ?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../adminlogin.php?error=queryfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    function loginAdmin($con, $username, $password) {
        $adminExists = adminExists($con, $username);

        if($adminExists === false){
            header("Location: ../adminlogin.php?error=loginfailed");
            exit();
        }

        $passHashed = $adminExists["adminsPass"];
        $chkPass = password_verify($password, $passHashed);

        if ($chkPass === false) {
            header("Location: ../adminlogin.php?error=loginfailed");
            exit();
        }
        else if ($chkPass === true) {
            session_start();
            $_SESSION["adminId"] = $adminExists["adminsId"];
            $_SESSION["adminUser"] = $adminExists["adminsUser"];
            $_SESSION["adminType"] = $adminExists["adminsType"];
            $_SESSION["adminDate"] = $adminExists["adminsDate"];
            header("Location: ../inventory.php");
            exit();
        }
    }

    function adminSignUp($con, $username, $password, $type) {
        $query = "INSERT INTO admins (adminsUser, adminsPass, adminsType) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../admincreate.php?error=queryfailed");
            exit();
        }
        $hashedPass = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPass, $type);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("Location: ../admincreate.php?error=none");
        exit();
    }

    function emptyInputCreate($username, $password, $repass, $adminType) {
        $result;
        if(empty($username) || empty($password) || empty($repass) || empty($adminType)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidUser($username) {
        $result;
        if(!preg_match("/^[a-zA-Z]*$/", $username)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function passMismatch($password, $repass) {
        $result;
        if($password !== $repass) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function userExists($con, $username) {
        $query = "SELECT * FROM admins WHERE adminsUser = ?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../admincreate.php?error=queryfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }
        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

#------------------------INVENTORY------------------------------------

    // function addInv($con, $ingredient, $quantity, $expiry) {
    //     $query = "INSERT INTO inventory (inventoryName, inventoryQuantity, inventoryExpiry) VALUES (?, ?, ?);";
    //     $stmt = mysqli_stmt_init($con);
    //     if(!mysqli_stmt_prepare($stmt, $query)) {
    //         header("Location: ../inventoryadd.php?error=queryfailed");
    //         exit();
    //     }
    //     mysqli_stmt_bind_param($stmt, "sss", $ingredient, $quantity, $expiry);
    //     mysqli_stmt_execute($stmt);

    //     mysqli_stmt_close($stmt);
    //     header("Location: ../inventoryadd.php?error=none");
    //     exit();
    // }

    function emptyInputInvAdd($ingredient, $quantity, $expiry) {
        $result;
        if(empty($ingredient) || empty($quantity) || empty($expiry)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidItem($ingredient) {
        $result;
        if(!preg_match("/^[a-zA-Z]*$/", $ingredient)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidQuantity($quantity) {
        $result;
        if(!preg_match("/^[0-9]*$/", $quantity)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidExpiryFormat($expiry) {
        $result;
        if(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])*$/", $expiry)) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

    function invalidExpiryDate($expiry) {
        $result;
        $date = explode('-', $expiry);
        if(checkdate($date[1], $date[2], $date[0]) !== true) {
            $result = true;
        }
        else {
            $result = false;
        }
        return $result;
    }

#------------------------INVENTORY-EDIT------------------------------------
    
    function editDrinks($con, $prodId, $prodName, $prodSize, $prodPrice, $prodCoffee, $prodMilk, $prodCream, $prodChoc, $prodOreo, $prodKitkat) {
        $query = "INSERT INTO drinks(drinksId, drinksName, drinksSize, drinksPrice, 
            drinksCoffee, drinksMilk, drinksWhipcream, drinksChocolate, drinksOreo, drinksKitkat) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) 
            ON DUPLICATE KEY UPDATE drinksPrice = ?, drinksCoffee = ?, drinksMilk = ?, 
            drinksWhipcream = ?, drinksChocolate = ?, drinksOreo = ?, drinksKitkat = ?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../drink.php?error=queryfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssssssssssssssss", 
            $prodId, $prodName, $prodSize, $prodPrice, $prodCoffee, $prodMilk, $prodCream, $prodChoc, $prodOreo, $prodKitkat,
            $prodPrice, $prodCoffee, $prodMilk, $prodCream, $prodChoc, $prodOreo, $prodKitkat);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("Location: ../drink.php?error=none");
        exit();
    }

    function addDrinks($con, $prodId, $prodName, $prodSize, $prodPrice, $prodCoffee, $prodMilk, $prodCream, $prodChoc, $prodOreo, $prodKitkat) {
        $query = "INSERT INTO drinks(drinksId, drinksName, drinksSize, drinksPrice, 
            drinksCoffee, drinksMilk, drinksWhipcream, drinksChocolate, drinksOreo, drinksKitkat) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) 
            ON DUPLICATE KEY UPDATE drinksPrice = ?, drinksCoffee = ?, drinksMilk = ?, 
            drinksWhipcream = ?, drinksChocolate = ?, drinksOreo = ?, drinksKitkat = ?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../adddrinks.php?error=queryfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "sssssssssssssssss", 
            $prodId, $prodName, $prodSize, $prodPrice, $prodCoffee, $prodMilk, $prodCream, $prodChoc, $prodOreo, $prodKitkat,
            $prodPrice, $prodCoffee, $prodMilk, $prodCream, $prodChoc, $prodOreo, $prodKitkat);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("Location: ../adddrinks.php?error=none");
        exit();
    }

    function editFoods($con, $prodId, $prodName, $prodPrice, $prodChic, $prodNacho, $prodFries, $prodChe) {
        $query = "INSERT INTO foods(foodsId, foodsName, foodsPrice, foodsChicken, 
            foodsNacho, foodsFries, foodsCheese) 
            VALUES (?, ?, ?, ?, ?, ?, ?) 
            ON DUPLICATE KEY UPDATE foodsPrice = ?, foodsChicken = ?, foodsNacho = ?, 
            foodsFries = ?, foodsCheese = ?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../foods.php?error=queryfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssssssssssss", 
            $prodId, $prodName, $prodPrice, $prodChic, $prodNacho, $prodFries, $prodChe, 
            $prodPrice, $prodChic, $prodNacho, $prodFries, $prodChe);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("Location: ../foods.php?error=none");
        exit();
    }

    function addFoods($con, $prodId, $prodName, $prodPrice, $prodChic, $prodNacho, $prodFries, $prodChe) {
        $query = "INSERT INTO foods(foodsId, foodsName, foodsPrice, foodsChicken, 
            foodsNacho, foodsFries, foodsCheese) 
            VALUES (?, ?, ?, ?, ?, ?, ?) 
            ON DUPLICATE KEY UPDATE foodsPrice = ?, foodsChicken = ?, foodsNacho = ?, 
            foodsFries = ?, foodsCheese = ?;";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $query)) {
            header("Location: ../addfoods.php?error=queryfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt, "ssssssssssss", 
            $prodId, $prodName, $prodPrice, $prodChic, $prodNacho, $prodFries, $prodChe, 
            $prodPrice, $prodChic, $prodNacho, $prodFries, $prodChe);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        header("Location: ../addfoods.php?error=none");
        exit();
    }