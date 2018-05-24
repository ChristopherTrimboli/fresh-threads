<!DOCTYPE html>
<html>
<head>
    <title>Fresh Threads - Shop</title>
    <meta charset="UTF-8">
    <meta name="description" content="Buy t-shirts and clothing at Fresh Threads">
    <meta name="keywords" content="T-Shirts, Clothing, Shop, Fresh Threads">
    <meta name="author" content="Chris Eddy, Cody Bergin, Colton Askew, Jeevenn Sangara">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/shop.css">
</head>
<body onload="loadShopItems('All'); loadShopTools();">
<div id="content">
    <?php include 'navbarShop.php' ?>
    <div class="row " id="shopTools">

    </div>
    <!--Generating shop cards from template card for all items in shop -->

    <div id="shop">
    </div>

</div>
<?php include '../common/footer.html' ?>
<script>
    function loadShopTools() {
        $.ajax({
            type: "POST",
            url: 'loadShopTools.php',
        }).done(function(html){
            document.getElementById("shopTools").innerHTML = html;
        })
    }
    function loadShopItems(cat) {
        $.ajax({
            type: "POST",
            url: 'loadShopItems.php',
            data:{cat:cat}
        }).done(function(html){
            document.getElementById("shop").innerHTML = html;
        })
    }
    function addItem(itemID, quantity) {
        $.ajax({
            type: "POST",
            url: 'addItemToCart.php',
            data:{itemID:itemID, quantity:quantity}
        })
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
        integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>