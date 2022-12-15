<?php include_once('adminheader.php');
    include 'phpfunctions/connection.php';
    include 'phpfunctions/functions.php';?>
<?php
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM drinks');
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_products = $pdo->query('SELECT * FROM drinks')->rowCount();
?>


<title>Edit Drinks</title>
<div class="products content-wrapper">
    <h1>Drinks</h1>
    <p><?=$total_products?> Drinks</p>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
        <a href="index.php?page=drink&id=<?=$product['drinksId']?>" class="product"><br>
            <span class="name"><?=$product['drinksName']?></span>
            <span class="price">
                <?=$product['drinksSize']?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>
