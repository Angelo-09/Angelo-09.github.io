<?php
    include_once('adminheader.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Drinks</title>
</head>
<body>
    <h1>Add Drinks</h1>
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
<!-- ---------DRINKS--------- -->
    <form action="phpfunctions/adddrink.inc.php" method="POST">
        <input id="drinkId" name="drinkId" type="hidden">
        <input id="drinkName" name="drinkName" type="text">
        <label for="drinkName">Name</label><br>
        <input id="drinkSize" name="drinkSize" type="text">
        <label for="drinkSize">Size</label><br>
        <input id="drinkPrice" name="drinkPrice" type="text">
        <label for="drinkPrice">Price</label><br>
        <input id="drinkCoffee" name="drinkCoffee" type="text">
        <label for="drinkCoffee">Coffee</label><br>
        <input id="drinkMilk" name="drinkMilk" type="text">
        <label for="drinkMilk">Milk</label><br>
        <input id="drinkWhipcream" name="drinkWhipcream" type="text">
        <label for="drinkWhipcream">Whipcream</label><br>
        <input id="drinkChoc" name="drinkChoc" type="text">
        <label for="drinkChoc">Chocolate</label><br>
        <input id="drinkOreo" name="drinkOreo" type="text">
        <label for="drinkOreo">Oreo</label><br>
        <input id="drinkKitkat" name="drinkKitkat" type="text">
        <label for="drinkKitkat">Kitkat</label><br><br>
        <button type="submit" name="drinkAdd">Add</button><br><br>
    </form>
</body>
</html>