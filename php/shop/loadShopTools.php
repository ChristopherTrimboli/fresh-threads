<?php
function loadShopTools(){
    session_start();
    if(isset($_SESSION["loggedIn"]) and $_SESSION['loggedIn'] == true){
        $shopTools= "
            <div class=\"btn-group\" id=\"categoryButton\">
            <button type=\"button\" class=\"btn btn-danger dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                Categories
            </button>
            <div class=\"dropdown-menu\">
                <form name=\"cats\" action=\"shop.php\" method=\"post\">
                    <a id =\"All\" class=\"dropdown-item\" name=\"All\" onclick=\"loadShopItems('All')\">All</a>
                    <a id =\"Shirts\" class=\"dropdown-item\" name=\"Shirts\" onclick=\"loadShopItems('Shirts')\">T-Shirts</a>
                    <a id =\"Pants\" class=\"dropdown-item\" name=\"Pants\" onclick=\"loadShopItems('Pants')\">Pants</a>
                    <a id =\"Socks\" class=\"dropdown-item\" name=\"Socks\" onclick=\"loadShopItems('Socks')\">Socks</a>
                </form>
            </div>
        </div>
        <div class=\"btn-group\" id=\"viewCartButton\">
            <a href=\"../cart/cart.php\">
                <button type=\"button\" class=\"btn btn-warning\" >
                    View Cart
                </button>
            </a>
        </div>
        <div class=\"btn-group\" id=\"checkoutButton\">
        <a href='../checkout/checkout.php'>
            <button type=\"button\" class=\"btn btn-success\">
                Checkout
            </button>
        </a>
            
        </div>
        ";
    }
    else{
        $shopTools = "
        <div class=\"btn-group\" id=\"categoryButton\">
            <button type=\"button\" class=\"btn btn-danger dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
                Categories
            </button>
            <div class=\"dropdown-menu\">
                <form name=\"cats\" action=\"shop.php\" method=\"post\">
                    <a id =\"All\" class=\"dropdown-item\" name=\"All\" onclick=\"loadShopItems('All')\">All</a>
                    <a id =\"Shirts\" class=\"dropdown-item\" name=\"Shirts\" onclick=\"loadShopItems('Shirts')\">T-Shirts</a>
                    <a id =\"Pants\" class=\"dropdown-item\" name=\"Pants\" onclick=\"loadShopItems('Pants')\">Pants</a>
                    <a id =\"Socks\" class=\"dropdown-item\" name=\"Socks\" onclick=\"loadShopItems('Socks')\">Socks</a>
                </form>
            </div>
        </div>
        ";
    }
    print "$shopTools";
}
loadShopTools();