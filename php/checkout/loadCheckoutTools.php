<?php

function loadCheckoutTools(){
    include '../database/db_connect.php';
    $priceList = db_query("SELECT Price FROM fresh_threads.Cart LEFT JOIN fresh_threads.Product ON Product_ProductID = ProductID");

    $totalPrice = 0;

    if($priceList != false){
        while ($price = mysqli_fetch_array($priceList)) {
            $totalPrice = $totalPrice + $price['Price'];
        }
    }
    $checkoutTools = "
        <div class=\"col-lg-4  col-sm-12\">
            <div class=\"btn-group\" id=\"checkoutButton\">
                <a id='checkoutButton' href='../checkout/checkout.php'>
                    <button type=\"button\" class=\"btn btn-success\">Checkout</button>
                </a>
                <a id='checkoutButton' href='../checkout/checkout.php'>
                    <button id='payNowButton' type=\"button\" class=\"btn btn-primary\">Pay Now</button>
                </a>
            </div>
        </div>
        <div class=\"col-lg-4 col-sm-12\">
            <h1 class=\"display-4\">Checkout</h1>
        </div>
        <div class=\"col-lg-4 col-sm-12\">
            <h5 class=\"card-title\">Your Total: $$totalPrice</h5>
        </div>
      ";
    print "$checkoutTools";
}
loadCheckoutTools();