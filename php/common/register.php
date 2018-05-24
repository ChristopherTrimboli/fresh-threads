<?php include '../database/db_connect.php' ?>
<?php
$email = $_POST["emailRegister"];
$password = $_POST["passwordRegister"];
$passwordConfirm = $_POST["passwordConfirmRegister"];
$connection = db_connect();
$emailBoolean = false;

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo"Not a valid email";
}
else{
    if($password == $passwordConfirm){
        $sql = "INSERT INTO Customer (CustomerPW, CustomerEmail) VALUES ('$hashed_password', '$email');";
        if(mysqli_query($connection, $sql)){
            echo "Records inserted successfully, going back to the shop...";
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
                    <p>Registered Successfully, Thanks for Joining :)</p>
                    You are being automatically redirected to the Shop.<br />
                    If your browser does not redirect you in 5 seconds, or you do
                    not wish to wait, <a href=\"../shop/shop.php\">click here</a>. 
                </body>
                </html>
            ";
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection) . " going back to the shop...";
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
                    <p><-- ERROR Reason at top of page.</p>
                    You are being automatically redirected to the Shop.<br />
                    If your browser does not redirect you in 5 seconds, or you do
                    not wish to wait, <a href=\"../shop/shop.php\">click here</a>. 
                </body>
                </html>
            ";
        }
    }
    else{
        echo"Passwords not the same.";
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
                    <p><-- ERROR Reason at top of page.</p>
                    You are being automatically redirected to the Shop.<br />
                    If your browser does not redirect you in 5 seconds, or you do
                    not wish to wait, <a href=\"../shop/shop.php\">click here</a>. 
                </body>
                </html>
            ";
    }
}
?>