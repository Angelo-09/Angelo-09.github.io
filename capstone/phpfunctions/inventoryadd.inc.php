<?php
session_start();
    if(isset($_POST["add"])) {
        $count = $_SESSION["count"];
        $num;
        for($num = 1; $num < $count; $num++) {
            $item[$num] = $_POST["item$num"];
            $itemQ[$num] = $_POST["itemQ$num"];
            $itemE[$num] = $_POST["itemE$num"];


            // if(emptyInputInvAdd($item[$num], $itemQ[$num], $itemE[$num]) !== false) {
            //     header("Location: ../inventoryadd.php?error=emptyinput");
            //     exit();
            // }
            // if(invalidItem($item[$num]) !== false) {
            //     header("Location: ../inventoryadd.php?error=invaliditem");
            //     exit();
            // }
            // if(invalidQuantity($itemQ[$num]) !== false) {
            //     header("Location: ../inventoryadd.php?error=invalidquantity");
            //     exit();
            // }
            // if(invalidExpiryFormat($itemE[$num]) !== false) {
            //     header("Location: ../inventoryadd.php?error=invalidformat");
            //     exit();
            // }
            // if(invalidExpiryDate($itemE[$num]) !== false) {
            //     header("Location: ../inventoryadd.php?error=invaliddate");
            //     exit();
            // }
            require_once 'connection.php';
            require_once 'functions.php';

            // Connect to the database
            $pdo;

            // Create an array of values to be inserted
            $values = array(
                array(
                'name' => $item[$num],
                'quantity' => $itemQ[$num],
                'expiry' => $itemE[$num]
                )
            );

            // Check if any of the array elements are empty
            $empty_found = false;
            foreach ($values as $v) {
                if (empty($v['quantity']) || empty($v['expiry'])) {
                    $empty_found = true;
                    header("Location: ../inventoryadd.php?error=emptyinput");
                    break;
                }
            }

            if(!$empty_found) {
                // Build the SQL query
                $query = "INSERT INTO inventory (inventoryName, inventoryQuantity, inventoryExpiry) VALUES ";
                $query_values = array();
                foreach ($values as $v) {
                    $query_values[] = "(:inventoryName{$v['name']}, :inventoryQuantity{$v['name']}, :inventoryExpiry{$v['name']})";
                }
                $query .= implode(',', $query_values);

                // Prepare the statement
                $stmt = $pdo->prepare($query);

                // Bind the values to the prepared statement
                foreach ($values as $v) {
                    $stmt->bindValue(":inventoryName{$v['name']}", $v['name']);
                    $stmt->bindValue(":inventoryQuantity{$v['name']}", $v['quantity'], PDO::PARAM_INT);
                    $stmt->bindValue(":inventoryExpiry{$v['name']}", $v['expiry']);
                }

                // Execute the query
                $result = $stmt->execute();
                header("Location: ../inventoryadd.php?error=none");

                // Check for errors
                if (!$result) {
                    // Handle errors
                }
            }
        }
    }
    else {
        header("Location: ../inventoryadd.php");
        exit();
    }