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
    if(isset($result)){
        if($result == true) {
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {

                if (isset($_SESSION["loggedIn"])) {
                    $addToCart = "
                <a class=\"btn btn-primary addToCart\"
                 onclick=\"
                 addItem({$row['ProductID']}, document.getElementsByClassName('form-control quantity')[$i].value,
                 document.getElementsByClassName('form-control sizeSelect')[$i].options[document.getElementsByClassName('form-control sizeSelect')[$i].selectedIndex].text);
                 successAlert('{$row['ProductName']}');
                 \">
                 Add-to-Cart
                </a>
            ";
                    $options = "
                <div class=\"row\">
                    <div class=\"col-6\">
                        <div class=\"form-group\">
                            <label for=\"quantityForm\">Quantity</label>
                            <input type=\"text\" class=\"form-control quantity\" value='1'>
                        </div>
                    </div>
                    <div class=\"col-6\">
                        <div class=\"form-group\">
                            <label for=\"Select\">Item Size</label>
                            <select name=\"Select\" class=\"form-control sizeSelect\">
                                <option value='Small'>Small</option>
                                <option value='Medium'>Medium</option>
                                <option value='Large'>Large</option>
                                <option value='X-Large'>X-Large</option>
                                <option value='XX-Large'>XX-Large</option>
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
                <div class='shadow mb-5 rounded'>
                <div class=\"card\" style=\"width: 18rem;\">
                    <img class=\"card-img-top\" src={$row['ProductImage']} alt=\"Card image cap\">
                    <div class=\"card-body\">
                        <h5 class=\"card-title\">{$row['ProductName']}</h5>
                        <p class=\"card-text\">{$row['ProductDescription']}</p>
                        $options
                        <h1 class=\"display-4\">\${$row['Price']}</h1>
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
                $i++;
            } // end while
        }
        else{
            $connection = db_connect();
            echo mysqli_errno($connection);
            echo"connection did not work";
        }
    }
} // end function

