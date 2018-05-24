<?php
include '../database/db_connect.php';

session_start();
if(isset($_SESSION["loggedIn"])){
    if($_SESSION["loggedIn"] == true){
        $user = $_SESSION["user"];

        $result = db_query("SELECT * FROM fresh_threads.Cart LEFT JOIN fresh_threads.Product ON Product_ProductID = ProductID");

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
                                <form name=\"quantityForm\">
                                    <output id='quantityOutput' name='quantityOutput' name=\"quantityOutput\">{$row['Quantity']}</output>
                                </form>
                            </div>
                            <div class=\"col-6\">
                                <div class=\"form-group\">
                                    <label for=\"Select\">Item Size</label>
                                    <select name=\"Select\" class=\"form-control\">
                                        <option>Small</option>
                                        <option>Medium</option>
                                        <option>Large</option>
                                        <option>X-Large</option>
                                        <option>XX-Large</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                            <h1 class=\"display-4\">{$row['Price']}</h1>
                            <a class=\"btn btn-primary\">Edit Order</a>
                            <a class=\"btn btn-danger\" onclick=\"deleteCartItem({$row['ProductID']})\">Delete</a>
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
