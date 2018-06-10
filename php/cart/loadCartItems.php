<?php
include '../database/db_connect.php';

session_start();
if(isset($_SESSION["loggedIn"])){
    if($_SESSION["loggedIn"] == true){
        $user = $_SESSION["user"];

        $userID = db_query("SELECT CustomerID FROM fresh_threads.Customer WHERE CustomerEmail = '$user';");

        $userID = mysqli_fetch_array($userID);

        $result = db_query("SELECT * FROM fresh_threads.Cart LEFT JOIN fresh_threads.Product ON
                                  Product_ProductID = ProductID WHERE Customer_CustomerID = {$userID['CustomerID']};");

        $counter = 0;
        if($result != false) {
            while ($row = mysqli_fetch_array($result)) {
                if ($counter == 0) {
                    print "<div class=\"row\">";
                }
                $column = "
            <div class=\"col-lg-3 col-md-6 col-sm-6\">
                <div class='shadow-lg mb-5 rounded'>
                    <div class=\"card\" style=\"width: 18rem;\">
                    <img class=\"card-img-top\" src={$row['ProductImage']} alt=\"Card image cap\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">{$row['ProductName']}</h5>
                            <p class=\"card-text\">{$row['ProductDescription']}</p>
                            <div class=\"row\">
                            <div class=\"col-6\">
                                <label for=\"quantityInput\">Quantity</label>
                                <p class='lead' id='quantityInput'>{$row['Quantity']}</p>
                            </div>
                            <div class=\"col-6\">
                                <div class=\"form-group\">
                                    <label for=\"Select\">Item Size</label>
                                    <p class='lead' id='select'>{$row['Size']}</p>
                                </div>
                            </div>
                        </div>
                            <h1 class=\"display-4\">\${$row['Price']}</h1>
                            <a class=\"btn btn-primary\">Edit Order</a>
                            <a class=\"btn btn-danger\" onclick=\"deleteCartItem({$row['ProductID']}); deleteAlert('{$row['ProductName']}');\">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            ";
                print "$column";
                $counter++;
                if ($counter == 4) {
                    print "</div>";
                    $counter = 0;
                }
            } // end while
        }
        else{
            print " No items in your Cart, go to the shop to add items.";
        }
    }
}
