<?php
    include_once('adminheader.php');
    include 'phpfunctions/connection.php';
    include 'phpfunctions/functions.php';
?>

<title>Products</title>
<link rel="stylesheet" href="css/invTables.css">
    <div>
        <h1>Drinks</h1>
        <table class='column-12'>
            <tr>
                <th>Product</th>
                <th>Size</th>
                <th>Price</th>
                <th>Coffee Bean (grams)</th>
                <th>Milk (ml)</th>
                <th>Chocolate (ml)</th>
                <th>Whipped Cream (ml)</th>
                <th>Kitkat (grams)</th>
                <th>Oreo (grams)</th>
            </tr>
            <tr>
            <?php
            $query = "SELECT * FROM drinks";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<td>" . $row['drinksName'] . "<td>" . $row['drinksSize']
                    . "<td>" . $row['drinksPrice'] . "<td>"  . $row['drinksCoffee'] 
                    . "<td>" . $row['drinksMilk'] . "<td>"  . $row['drinksWhipcream']
                    . "<td>" . $row['drinksChocolate'] . "<td>"  . $row['drinksOreo']
                    . "<td>" . $row['drinksKitkat'] . "<td>" . "<tr>";
                }
            }
            else {
                echo "0 results";
            }
            ?>
            </tr>
        </table>
        <br><br><br><br>
        <h1>Foods</h1>
        <table class='column-12'>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Chicken (grams)</th>
                <th>Nacho (grams)</th>
                <th>Fries (grams)</th>
                <th>Cheese (grams)</th>
            </tr>
            <tr>
            <?php
            $query = "SELECT * FROM foods";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<td>" . $row['foodsName'] . "<td>" . $row['foodsPrice']
                    . "<td>" . $row['foodsChicken'] . "<td>"  . $row['foodsNacho'] 
                    . "<td>" . $row['foodsFries'] . "<td>"  . $row['foodsCheese'] . "<tr>";
                }
            }
            else {
                echo "0 results";
            }
            $con->close();
            ?>
            </tr>
        </table>
    </div>

</body>
</html>