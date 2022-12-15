<?php
include_once('adminheader.php');
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM foods WHERE foodsId = ?');
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
<title>Edit Foods</title>
<div class="product content-wrapper">
    <div>
        <h1 class="name"><?=$product['foodsName']?></h1>
        <form action="phpfunctions/editfood.inc.php" method="post">
            <input type="text" name="foodName" placeholder="Name" required value='<?=$product['foodsName']?>'>
            <label for="prodName">Name</label><br>
            <input type="text" name="foodPrice" placeholder="Price" required value='<?=$product['foodsPrice']?>'>
            <label for="prodPrice">Price</label><br>
            <input type="text" name="foodChicken" placeholder="Coffee" required value='<?=$product['foodsChicken']?>'>
            <label for="prodChic">Chicken</label><br>
            <input type="text" name="foodNacho" placeholder="Milk" required value='<?=$product['foodsNacho']?>'>
            <label for="prodNacho">Nacho</label><br>
            <input type="text" name="foodFries" placeholder="Whipcream" required value='<?=$product['foodsFries']?>'>
            <label for="prodFries">Fries</label><br>
            <input type="text" name="foodCheese" placeholder="Chocolate" required value='<?=$product['foodsCheese']?>'>
            <label for="prodChe">Cheese</label><br>
            <input type="hidden" name="product_id" value="<?=$product['foodsId']?>">
            <input type="submit" value="Edit" name="foodEdit">
        </form>
    </div>
</div>