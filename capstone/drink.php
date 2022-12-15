<?php
include_once('adminheader.php');
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM drinks WHERE drinksId = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>
<title>Edit Drinks</title>
<div class="product content-wrapper">
    <div>
        <h1 class="name"><?=$product['drinksName']?></h1>
        <h1 class="name"><?=$product['drinksSize']?></h1>
        <form action="phpfunctions/editdrink.inc.php" method="post">
            <input type="text" name="drinkName" placeholder="Name" required value='<?=$product['drinksName']?>'>
            <label for="prodName">Name</label><br>
            <input type="text" name="drinkSize" placeholder="Size" required value='<?=$product['drinksSize']?>'>
            <label for="prodSize">Size</label><br>
            <input type="text" name="drinkPrice" placeholder="Price" required value='<?=$product['drinksPrice']?>'>
            <label for="prodPrice">Price</label><br>
            <input type="text" name="drinkCoffee" placeholder="Coffee" required value='<?=$product['drinksCoffee']?>'>
            <label for="prodCoffee">Coffee</label><br>
            <input type="text" name="drinkMilk" placeholder="Milk" required value='<?=$product['drinksMilk']?>'>
            <label for="prodMilk">Milk</label><br>
            <input type="text" name="drinkWhipcream" placeholder="Whipcream" required value='<?=$product['drinksWhipcream']?>'>
            <label for="prodCream">Whipcream</label><br>
            <input type="text" name="drinkChoc" placeholder="Chocolate" required value='<?=$product['drinksChocolate']?>'>
            <label for="prodChoc">Chocolate</label><br>
            <input type="text" name="drinkOreo" placeholder="Oreo" required value='<?=$product['drinksOreo']?>'>
            <label for="prodOreo">Oreo</label><br>
            <input type="text" name="drinkKitkat" placeholder="Kitkat" required value='<?=$product['drinksKitkat']?>'>
            <label for="prodKitkat">Kitkat</label><br>
            <input type="hidden" name="product_id" value="<?=$product['drinksId']?>">
            <input type="submit" value="Edit" name="drinkEdit">
        </form>
    </div>
</div>