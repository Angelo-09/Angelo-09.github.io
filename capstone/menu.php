<?php include_once("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/Menu.css">
</head>
<body>
    <div class="border">
        <div class="orders-container">
            <div class="top-content">
                <div class="top-content-left">
                    <div class="logo">
                        <img src="imgResources/bobbabrew-3.png" alt="image lost">
                    </div>
                    <p>Order Menu</p>
                </div>
                <div class="top-content-right">
                    <p><label for="order-list">Product/Category</label></p>
                    <select id="order-list"name="order-list">
                        <option value="drinks">Drinks</option>
                        <option value="foods">Foods</option>
                    </select>
                    
                </div>
            </div>
            <div class="container">
                <div class="product-container">
                    <div class="product-cards">
                        <p id="product-name">Product Name</p>
                        <img src="imgResources/BobbaBrew/BobbaBrew-103.png" alt="No Image Available">
                        <p id="price">Price:</p>
                        <button id="add-button"type="submit">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="javascript/Orderlist.js"></script>
</body>
</html>
<?php include_once("footer.php");?>