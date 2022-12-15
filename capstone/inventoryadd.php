<?php
    include_once('adminheader.php');
    include 'phpfunctions/connection.php';
    include 'phpfunctions/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to Inventory</title>
</head>
<body>
<h1>Suppliers</h1>
    <form action="" method="GET">
        <div>
            <select name="suppliers" id="suppliers" value="<?php if(isset($_GET['suppliers'])){echo $_GET['suppliers'];} ?>">
                <option value="" disabled selected hidden>Select Supplier</option>
                <?php $query = "SELECT * FROM suppliers GROUP BY suppliersName";
                $result = mysqli_query($con, $query);
                $options = "";
                while($row2 = mysqli_fetch_array($result)) { ?>
                    <option value="<?= $row2['suppliersName']?>"><?= $row2['suppliersName']?></option>;
                <?php } ?>
            </select>
            <button type="submit" id="findSupplier">Select</button><br><br>
        </div>
    </form>

    <?php
    if(isset($_GET['suppliers'])) {
        $suppliers = $_GET['suppliers'];
        $query1 = "SELECT suppliersName, suppliersContact, suppliersAddress
            FROM suppliers WHERE suppliersName = ? GROUP BY suppliersName;";
        $stmt1 = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt1, $query1)) {
            header("Location: ../inventoryadd.php?error=queryfailed");
            exit();
        }
        mysqli_stmt_bind_param($stmt1, "s", $suppliers);
        mysqli_stmt_execute($stmt1);
        $result1 = mysqli_stmt_get_result($stmt1);

        while($rows1 = mysqli_fetch_assoc($result1)) {
            echo "<td>Suppliers Name:   <td>" . $rows1['suppliersName'] . "<br>"
                . "<td>Suppliers Contact:   <td>" . $rows1['suppliersContact'] . "<br>"
                . "<td>Suppliers Address:   <td>" . $rows1['suppliersAddress'] . "<br><br>";
        }
    }
    ?>
    <form action="phpfunctions/inventoryadd.inc.php" method="POST">
        <div>
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
            <?php
            if(isset($_GET['suppliers'])) {
                $suppliers = $_GET['suppliers'];
                $query3 = "SELECT suppliersItem
                    FROM suppliers WHERE suppliersName = ?;";
                $stmt3 = mysqli_stmt_init($con);
                if(!mysqli_stmt_prepare($stmt3, $query3)) {
                    header("Location: ../inventoryadd.php?error=queryfailed");
                    exit();
                }
                mysqli_stmt_bind_param($stmt3, "s", $suppliers);
                mysqli_stmt_execute($stmt3);
                $result3 = mysqli_stmt_get_result($stmt3);
                global $count;
                $count = 1;

                if(mysqli_num_rows($result3) > 0) {
                    while($row3 = mysqli_fetch_assoc($result3)) {
                        echo "<label>".$row3['suppliersItem']."</label><br>
                            <input type='hidden' id='item$count' name='item$count' value='".$row3['suppliersItem']."'>
                            <label>Quantity</label>
                            <input type='text' id='itemQ$count' name='itemQ$count'>
                            <label>Expiry</label>
                            <input type='text' id='itemE$count' name='itemE$count'><br>";
                            $count +=1;
                    }
                }
                $_SESSION["count"] = $count;
                ?>
                 
                <br><button type="submit" name="add">Add</button><br><br>
            <?php }
            
            ?>
            
        </div>
    </form><!-- -->
</body>
</html>