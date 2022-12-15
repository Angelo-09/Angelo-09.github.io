<?php include_once("header.php");?>
     
    <?php 
        if(isset($_SESSION["useremail"])) {
        echo "<h2>Greetings, " . $_SESSION["username"] . "!</h2>";
        }
        else {
        echo "<h2 id='greetings'>Greetings!</h2>";
        }
    ?>
    <head>
        <title>Home</title>
        <script src="javascript/Carousel.js"></script>
    </head>
    <br>

        <div class="ProductAd">
        <input id="prev" type="button" value=" < ">
        <img id="ProductAd" src="imgResources/bobbabrew.gif" alt="1.jpeg">
        <input id="next" type="button" value=" > ">
    </div>
    
    <div class="container">
    <div class="buttons-nav">
    <input id="button-left" type="button" value=" < ">
    <input id="button-right" type="button" value=" > ">
    </div>
        <div class="image-frame">
            <img src="imgResources/BobbaBrew/BobbaBrew-101.png" alt="">
            <p id=productName name=productName>Product Name</p>
            <p id=price name=price>Price:</p>
            <button>Add</button>
        </div>
        <div class="image-frame">
            <img src="imgResources/BobbaBrew/BobbaBrew-101.png" alt="">
            <p id=productName name=productName>Product Name</p>
            <p id=price name=price>Price:</p>
            <button>Add</button>
        </div>
        <div class="image-frame">
            <img src="imgResources/BobbaBrew/BobbaBrew-101.png" alt="">
            <p id=productName name=productName>Product Name</p>
            <p id=price name=price>Price:</p>
            <button>Add</button>
        </div>
        <div class="image-frame">
            <img src="imgResources/BobbaBrew/BobbaBrew-101.png" alt="">
            <p id=productName name=productName>Product Name</p>
            <p id=price name=price>Price:</p>
            <button>Add</button>
        </div>
        <div class="image-frame">
            <img src="imgResources/BobbaBrew/BobbaBrew-101.png" alt="">
            <p id=productName name=productName>Product Name</p>
            <p id=price name=price>Price:</p>
            <button>Add</button>
        </div>
    </div>
<?php include_once("footer.php");?>