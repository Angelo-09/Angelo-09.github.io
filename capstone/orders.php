<?php include_once("header.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Orders.css">
    <title>Orders</title>
</head>
<body>
<div class="border-container">
        <div class="top-content-left">
            <div class="logo">
                <img src="imgResources/bobbabrew-3.png" alt="image lost">
                <p>ORDERS LIST</p>
            </div>
        </div>
        <div class="filler1"></div><div class="filler2"></div>
        <div class="bottom-content">
            <div class="bottom-top-line">
            </div>
            <div class="table-container">
                <table>
                <div class="table-header">
                    <tr>
                        <th>PRODUCT</th>
                        <th>PRICE</th>
                        <th>QTY</th>
                        <th>COST</th>
                    </tr>
                </div>
                <div class="orders-list">
                    <tr>
                        <td>
                            <img src="imgResources/BobbaBrew/BobbaBrew-123.png" alt="">
                            <p>PRODUCT NAME</p>
                        </td>
                        <td>
                            <p id="price">120</p>
                        </td>
                        <td>
                            <p id="quantity">2</p>
                        </td>
                        <td>
                            <p id="sub-total">140</p>
                        </td>
                        <td>
                            <button>X</button>
                        </td>
                    </tr>
                    <tr>
                    <td>
                            <img src="imgResources/BobbaBrew/BobbaBrew-123.png" alt="">
                            <p>PRODUCT NAME</p>
                        </td>
                        <td>
                            <p id="price">120</p>
                        </td>
                        <td>
                            <p id="quantity">2</p>
                        </td>
                        <td>
                            <p id="sub-total">140</p>
                        </td>
                        <td>
                            <button>X</button>
                        </td>
                    </tr>
                    <tr>
                    <td>
                            <img src="imgResources/BobbaBrew/BobbaBrew-123.png" alt="">
                            <p>PRODUCT NAME</p>
                        </td>
                        <td>
                            <p id="price">120</p>
                        </td>
                        <td>
                            <p id="quantity">2</p>
                        </td>
                        <td>
                            <p id="sub-total">140</p>
                        </td>
                        <td>
                            <button>X</button>
                        </td>
                    </tr>

                </div>
                
            </div>
            <div class="emptyslots">
            <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </div>
            <div class="bottom-down-line">
                <tr>
                    <td></td>
                    <td></td>
                    <td>TOTAL :</td>
                    <td>420</td>
                    <td></td>
                </tr>
            </div>
            </table>
            <div class="submit-button">
            <button id="Submit-payment">SUBMIT & PAY</button>
            </div>

        </div>
    </div>
</body>
</html>

<?php include_once("footer.php");?>