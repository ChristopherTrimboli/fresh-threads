<?php
include '../database/db_connect.php';

$cat = $_POST['cat'];
loadShopCategory($cat);

function loadShopCategory($cat){

    session_start();

    if($cat == 'All'){
        $result = db_query("SELECT * FROM fresh_threads.Product;");
    }
    if($cat == 'Shirts'){
        $result = db_query("SELECT * FROM fresh_threads.Product WHERE Category = 'Shirt';");
    }
    if($cat == 'Pants'){
        $result = db_query("SELECT * FROM fresh_threads.Product WHERE Category = 'Pants';");
    }
    if($cat == 'Socks'){
        $result = db_query("SELECT * FROM fresh_threads.Product WHERE Category = 'Socks';");
    }

    $counter = 0;
    if($result == true) {
        while ($row = mysqli_fetch_array($result)) {

            if (isset($_SESSION["loggedIn"])) {
                $addToCart = "
                <a class=\"btn btn-primary\" onclick=\"addItem({$row['ProductID']})\">Add-to-Cart</a>
                <script>
                function addItem(itemID, quantity) {
                    $.ajax({
                        type: \"POST\",
                        url: 'addItemToCart.php',
                        data:{itemID:itemID}
                    })
                }
                </script>
            ";
                $options = "
                <div class=\"row\">
                    <div class=\"col-6\">
                        <label for=\"quantityInput\">Quantity</label>
                        <form name=\"quantityForm\">
                            <input type=\"range\" name=\"quantityInput\" value=\"1\" min=\"1\" max=\"25\"
                             oninput=\"quantityOutput.value = quantityInput.value\">
                            <output id=\"quantityOutput\" name=\"quantityOutput\">0</output>
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
            ";

            } else {
                $options = "";
                $addToCart = "";
            }
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
                        $options
                        <h1 class=\"display-4\">{$row['Price']}</h1>
                        $addToCart
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
        $connection = db_connect();
        echo mysqli_errno($connection);
    }
} // end function

