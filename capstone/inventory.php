<?php
    include_once('adminheader.php');
    include 'phpfunctions/connection.php';
    include 'phpfunctions/functions.php';
?>

<title>Inventory</title>
<link rel="stylesheet" href="css/invTables.css">
    <div>
        <table class='column-12'>
            <tr>
                <th>Ingredient Name</th>
                <th>Quantity (grams/ml)</th>
                <th>Date Acquired</th>
                <th>Date Expiry</th>
            </tr>
            <tr>
            <?php
            $query = "SELECT * FROM inventory;";
            $result = mysqli_query($con, $query);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<td>" . $row['inventoryName'] . "<td>" . $row['inventoryQuantity']
                    . "<td>" . $row['inventoryDate'] . "<td>"  . $row['inventoryExpiry'] . "<tr>";
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