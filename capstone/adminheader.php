<?php 
    if(!isset($_SESSION)) {
        session_start();
    }
    if(!isset($_SESSION['adminId'])) {
        header("Location: adminlogin.php");
        exit();
    }
    else {}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
    <link href="css/edit.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div>
        <div class='HeaderRight'>
            <?php
                if(isset($_SESSION["adminType"])) {
                    if($_SESSION["adminType"] == "admin"){
                        echo "<a href='admincreate.php'><p>Add User</p></a>";
                        echo "<a href='inventory.php'><p>Inventory</p></a>";
                        echo "<a href='inventoryadd.php'><p>Suppliers</p></a>";
                        echo "<a href='product.php'><p>Product</p></a>";
                        echo "<a href='adddrinks.php'><p>Add Drinks</p></a>";
                        echo "<a href='drinks.php'><p>Edit Drinks</p></a>";
                        echo "<a href='addfoods.php'><p>Add Foods</p></a>";
                        echo "<a href='foods.php'><p>Edit Foods</p></a>";
                    }
                    else {
                        echo "<a href='inventory.php'><p>Inventory</p></a>";
                        echo "<a href='inventoryadd.php'><p>Suppliers</p></a>";
                        echo "<a href='product.php'><p>Product</p></a>";
                        echo "<a href='adddrinks.php'><p>Add Drinks</p></a>";
                        echo "<a href='drinks.php'><p>Edit Drinks</p></a>";
                        echo "<a href='addfoods.php'><p>Add Foods</p></a>";
                        echo "<a href='foods.php'><p>Edit Foods</p></a>";
                    }
                }
                else {
                    
                }
            ?>
            <a href='phpfunctions/adminlogout.php'><p>Logout</p></a>
        </div>
    </div>