<?php
    include_once('adminheader.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Foods</title>
</head>
<body>
    <h1>Add Foods</h1>
    <?php
    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyinput") {
            echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Fill in all the fields!</h4><br>";
        }
        else if($_GET["error"] == "invaliditem") {
            echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Input a proper name!</h4><br>";
        }
        else if($_GET["error"] == "invalidquantity") {
            echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Input correct amount!</h4><br>";
        }
        else if($_GET["error"] == "invalidformat") {
            echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Date format is not valid! Please use Year-Month-Day format.</h4><br>";
        }
        else if($_GET["error"] == "invaliddate") {
            echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Date is not valid!</h4><br>";
        }
        else if($_GET["error"] == "queryfailed") {
            echo "<h4 style='background-color: #FF0000; color: #FFFFFF;'>Something went wrong. Try again.</h4><br>";
        }
        else if($_GET["error"] == "none") {
            echo "<h4 style='background-color: #009900; color: #FFFFFF;'>You have successfully added to inventory!</h4><br>";
        }
    }
    ?>
    <form action="phpfunctions/addfood.inc.php" method="POST">
        <input id="foodId" name="foodId" type="hidden">
        <input id="foodName" name="foodName" type="text">
        <label for="foodName">Name</label><br>
        <input id="foodPrice" name="foodPrice" type="text">
        <label for="foodPrice">Price</label><br>
        <input id="foodChicken" name="foodChicken" type="text">
        <label for="foodChicken">Chicken</label><br>
        <input id="foodNacho" name="foodNacho" type="text">
        <label for="foodNacho">Nacho</label><br>
        <input id="foodFries" name="foodFries" type="text">
        <label for="foodFries">Fries</label><br>
        <input id="foodCheese" name="foodCheese" type="text">
        <label for="foodCheese">Cheese</label><br><br>
        <button type="submit" name="foodEdit">Add</button><br><br>
    </form>
</body>
</html>