<?php
function addItemToCart(){
    include '../database/db_connect.php';

    $itemID = $_POST['itemID'];

    session_start();
    $user = $_SESSION['user'];

    $userID = db_query("SELECT CustomerID FROM ICS199Group12_dev.Customer WHERE CustomerEmail = '$user';");
    $userID = mysqli_fetch_array($userID);
    $userID = $userID[0];

    $sql = "INSERT INTO Cart(Quantity, Customer_CustomerID, Product_ProductID)
        VALUES (5, '$userID', '$itemID');";

    $connection = db_connect();

    if(mysqli_query($connection, $sql)){
        print "Item added to your cart, going back to shop...";
    }
    else{
        print "ERROR: Not able to execute $sql. " . mysqli_error($connection) . " going back to the admin panel...";
    }
}
addItemToCart();
