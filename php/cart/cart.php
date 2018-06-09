<!DOCTYPE html>
<html>
<head>
    <title>Fresh Threads - Cart</title>
    <meta charset="UTF-8">
    <meta name="description" content="Buy t-shirts and clothing at Fresh Threads">
    <meta name="keywords" content="T-Shirts, Clothing, Shop, Fresh Threads">
    <meta name="author" content="Chris Eddy, Cody Bergin, Colton Askew, Jeevenn Sangara">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../images/favicon.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
          integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../../css/cart.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-120597001-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-120597001-1');
    </script>
</head>
<body onload="loadCartItems(); loadCartTools()">
<?php include 'navBarCart.php' ?>
<div id="content">
    <div class="row" id="cartTools">

    </div>
    <br>
    <div id="cartItems">
    </div>
</div>

<div id="delete-alert" class="alert alert-danger" role="alert">

</div>
<?php include '../common/footer.html' ?>
<script>
    $(document).ready (function(){
        $("#delete-alert").hide();
    });

    function deleteAlert(productName){
        $("#delete-alert").fadeTo(2000, 500).slideUp(500, function(){
            $("#delete-alert").slideUp(500);
        });
        document.getElementById('delete-alert').innerText = productName + " deleted from your cart.";
    }

    function loadCartItems() {
        $.ajax({
            type: "POST",
            url: 'loadCartItems.php',
            data:{}
        }).done(function(html){
            document.getElementById("cartItems").innerHTML = html;
        })
    }
    function loadCartTools() {
        $.ajax({
            type: "POST",
            url: 'loadCartTools.php',
            data:{}
        }).done(function(html){
            document.getElementById("cartTools").innerHTML = html;
        })
    }
    function deleteCartItem(itemID) {
        $.ajax({
            type: "POST",
            url: 'deleteCartItem.php',
            data:{itemID:itemID}
        });
        loadCartItems();
        loadCartTools()
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