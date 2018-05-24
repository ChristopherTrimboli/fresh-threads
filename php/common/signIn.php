<?php include '../database/db_connect.php' ?>
<?php
$email = $_POST["emailSignIn"];
$password = $_POST["passwordSignIn"];

$connection = db_connect();

$hashed_password = db_query("SELECT CustomerPW FROM ICS199Group12_dev.Customer WHERE CustomerEmail = '$email';");

$hashed_password = mysqli_fetch_array($hashed_password);

if(password_verify($password, $hashed_password['CustomerPW'])) {
    session_start();
    $_SESSION["user"] = $email;
    $_SESSION["loggedIn"] = true;
    if($_SESSION["user"] == "admin"){
        header('Location: ../admin/admin.php');
    }
    else{
        header('Location: ../shop/shop.php');
    }
}
else{
    echo "Sign In failed, going back to the shop...";
    echo"
        <html>
        <head>
            <title>Redirecting...</title>
            <meta http-equiv=\"refresh\" content=\"5;URL=../shop/shop.php\">
            <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\"
                  integrity=\"sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB\" crossorigin=\"anonymous\">
            <link rel=\"stylesheet\" href=\"../../css/redirect.css\">
        </head>
        <body>
            <p>Sign In failed.</p>
            You are being automatically redirected to the Shop.<br />
            If your browser does not redirect you in 5 seconds, or you do
            not wish to wait, <a href=\"../shop/shop.php\">click here</a>. 
        </body>
        </html>
    ";
}
?>