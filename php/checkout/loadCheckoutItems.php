<?php

function loadCheckoutItems(){
    session_start();
    include '../database/db_connect.php';
    if (isset($_SESSION["loggedIn"])) {
        if ($_SESSION["loggedIn"] == true) {

            $result = db_query("SELECT * FROM fresh_threads.Cart LEFT JOIN fresh_threads.Product ON Product_ProductID = ProductID");

            $priceList = db_query("SELECT Price FROM fresh_threads.Cart LEFT JOIN fresh_threads.Product ON Product_ProductID = ProductID");

            $totalPrice = 0;

            if($priceList != false){
                while ($price = mysqli_fetch_array($priceList)) {
                    $totalPrice = $totalPrice + $price['Price'];
                }
            }
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
                                <div class=\"form-group\">
                                <label for=\"exampleFormControlSelect1\">Quantity</label>
                                <select class=\"form-control\" id=\"exampleFormControlSelect1\">
                                  <option>1</option>
                                  <option>2</option>
                                  <option>3</option>
                                  <option>4</option>
                                  <option>5</option>
                                  <option>6</option>
                                  <option>7</option>
                                  <option>8</option>
                                  <option>9</option>
                                  <option>10</option>
                                </select>
                              </div>
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
                            <h1 class=\"display-4\">\${$row['Price']}</h1>
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
}
loadCheckoutItems();