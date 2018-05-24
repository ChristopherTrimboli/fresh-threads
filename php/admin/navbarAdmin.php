<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="../home/index.php">Fresh Threads</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../home/index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../shop/shop.php">Shop</a>
            </li>
        </ul>
        <div class="row" id="signInTools">

        </div>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script>
    function checkLoginNav() {
        $.ajax({
            type: "POST",
            url: '../common/checkLoginNav.php',
            data:{trigger:true}
        }).done(function(html){
            document.getElementById("signInTools").innerHTML = html;
        })
    }
    checkLoginNav()
</script>
<script src="../../js/validateRegister.js"></script>
<script src="../../js/validateSignIn.js"></script>