<?php include_once('adminheader.php');
    include 'phpfunctions/connection.php';
    include 'phpfunctions/functions.php';?>
<?php
// The current page, in the URL this will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM foods');
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_products = $pdo->query('SELECT * FROM foods')->rowCount();
?>


<title>Edit Foods</title>
<div class="products content-wrapper">
    <h1>Foods</h1>
    <p><?=$total_products?> Foods</p>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
        <a href="index.php?page=food&id=<?=$product['foodsId']?>" class="product"><br>
            <span class="name"><?=$product['foodsName']?></span>
        </a>
        <?php endforeach; ?>
    </div>
</div>
