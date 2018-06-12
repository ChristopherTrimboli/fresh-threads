<?php
session_start();
if(isset($_SESSION["loggedIn"])){
    $ifLoggedOn = $_SESSION["loggedIn"];
    $user = $_SESSION["user"];
}

if(isset($_SESSION["loggedIn"])) {
    if ($ifLoggedOn == true and $user == "admin") {
        $message = "

                    <h1 class=\"display-4\">Add Item to Shop</h1>
                    <br>
                    <form name=\"adminForm\" action=\"addItemToCart.php\" method=\"post\">
                        <div class=\"form-row\">
                            <div class=\"form-group col-md-12\">
                                <label for=\"inputPassword4\">Item Name</label>
                                <input id=\"itemName\" onkeyup=\"validateForm()\" name=\"Name\" type=\"text\" class=\"form-control\" placeholder=\"Name\">
                                <small id=\"nameHelpBlock\" class=\"form-text text-muted\">
                                    Item Name cannot contain numbers, also cannot be empty.
                                </small>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            <label for=\"inputAddress\">Item Description</label>
                            <input id=\"itemDescription\" onkeyup=\"validateForm()\" name=\"Description\" type=\"text\" class=\"form-control\" placeholder=\"Description\">
                            <small id=\"descriptionHelpBlock\" class=\"form-text text-muted\">
                                Item Description must be less than 50 characters, also cannot be empty..
                            </small>
                        </div>
                        <div class=\"form-row\">
                            <div class=\"form-group col-md-4\">
                                <label for=\"inputState\">Item Size</label>
                                <select id=\"inputState\" class=\"form-control\">
                                    <option selected>Small</option>
                                    <option selected>Medium</option>
                                    <option selected>Large</option>
                                    <option selected>X-Large</option>
                                    <option selected>XX-Large</option>
                                </select>
                            </div>
                            <div class=\"form-group col-md-2\">
                                <label for=\"inputZip\">Item Cost</label>
                                <input id=\"itemPrice\" onkeyup=\"validateForm()\" name=\"Price\" type=\"text\" class=\"form-control\" placeholder=\"$\">
                                <small id=\"priceHelpBlock\" class=\"form-text text-muted\">
                                    Only numbers 0-9
                                </small>
                            </div>
                            <div class=\"form-group col-md-6\">
                                <label for=\"customFile\">Upload Picture</label>
                                <div class=\"custom-file\">
                                    <input type=\"file\" class=\"custom-file-input\" id=\"customFile\">
                                    <label class=\"custom-file-label\" for=\"customFile\">Upload</label>
                                </div>
                            </div>
                            <div class=\"form-group col-md-12\">
                                <label for=\"inputZip\">Image URL</label>
                                <input id=\"itemImageURL\" onkeyup=\"validateForm()\" name=\"URL\" type=\"text\" class=\"form-control\" placeholder=\"URL:\">
                                <small id=\"URLHelpBlock\" class=\"form-text text-muted\">
                                    Must be a valid URL
                                </small>
                            </div>
                        </div>
                        <button type=\"submit\" class=\"btn btn-primary\">Add to Shop</button>
                    </form>
                    ";
        print "$message";
    }
    else{
        $message = "Only for people with special powers...";
        print"$message";
    }
}
