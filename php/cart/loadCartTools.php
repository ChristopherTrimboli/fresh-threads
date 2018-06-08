<?php
function loadCartTools(){
    include '../database/db_connect.php';
    session_start();
    $user = $_SESSION['user'];
    $userID = db_query("SELECT CustomerID FROM fresh_threads.Customer WHERE CustomerEmail = '$user';");

    $userID = mysqli_fetch_array($userID);

    $result = db_query("SELECT * FROM fresh_threads.Cart LEFT JOIN fresh_threads.Product ON
                                  Product_ProductID = ProductID WHERE Customer_CustomerID = {$userID['CustomerID']};");
    $totalPrice = 0;
    if($result != false){
        while ($price = mysqli_fetch_array($result)) {
            $totalPrice = $totalPrice + $price['Price'] * $price['Quantity'];
        }
    }

    $cartTools = "
        <div class=\"col-lg-4  col-sm-12\">
            <div class=\"btn-group\" id=\"checkoutButton\">
                <a id='checkoutButton' href='../checkout/checkout.php'>
                    <button type=\"button\" class=\"btn btn-success\">Checkout</button>
                </a>
            </div>
        </div>
        <div class=\"col-lg-4 col-sm-12\">
            <h1 class=\"display-4\">Shopping Cart</h1>
        </div>
        <div class=\"col-lg-4 col-sm-12\">
            <h5 class=\"card-title\">Your Total: $$totalPrice</h5>
        </div>
      ";
    print "$cartTools";
}
loadCartTools();
