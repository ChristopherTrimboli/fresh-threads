<?php
function loadCartTools(){
    include '../database/db_connect.php';
    session_start();
    $user = $_SESSION['user'];

    $userID = db_query("SELECT CustomerID FROM fresh_threads.Customer WHERE CustomerEmail = '$user';");
    $userID = mysqli_fetch_array($userID);
    $userID = $userID[0];

    $products = db_query("SELECT Product_ProductID FROM fresh_threads.Cart WHERE Customer_CustomerID = '$userID';");

    $productsList = "";
    while($productsArray = mysqli_fetch_array($products)){
        $productsList = $productsList . "'" . $productsArray['Product_ProductID'] . "', ";
    }
    $productsList = substr($productsList, 0, -2);

    $priceList = db_query("SELECT Price FROM fresh_threads.Product WHERE ProductID IN ($productsList);");

    $totalPrice = 0;

    if($priceList != false){
        while ($price = mysqli_fetch_array($priceList)) {
            $totalPrice = $totalPrice + $price['Price'];
        }
    }

    $cartTools = "
        <div class=\"col-lg-4  col-sm-12\">
            <div class=\"btn-group\" id=\"checkoutButton\">
                <button type=\"button\" class=\"btn btn-success\">
                    Checkout
                </button>
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
