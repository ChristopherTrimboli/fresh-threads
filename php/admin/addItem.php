<?php include '../database/db_connect.php' ?>
<?php

function isNameValid($name){
    if (is_numeric($name) == true || strlen($name) === 0){
        echo "name not valid";

        return false;
    }
    else{
        return true;
    }
}
function isDescriptionValid($description){
    if(strlen($description) < 100 && strlen($description) !== 0){
        return true;
        }
    else{
        echo "description not valid";
        return false;
        }
}
function isPriceValid($price){
    $pattern = "/^\d+\.\d{2}$/";
    if (preg_match($pattern, $price)){
        return true;
    }
    else{
        echo "price not valid";
        return false;
    }
}
function isImageURLValid($URL){
    if (filter_var($URL, FILTER_VALIDATE_URL) == TRUE) {
        return true;
    }
    else {
        echo "URL not valid";
        return false;
    }
}

function isFieldsValid(){
    $name = $_POST['Name'];
    $description = $_POST['Description'];
    $imageURL = $_POST['URL'];
    $price = $_POST['Price'];

    if(isImageURLValid($imageURL) == true && isDescriptionValid($description) == true
    && isNameValid($name) == true && isPriceValid($price) == true){
        $connection = db_connect();

        $sql = "INSERT INTO Product (ProductName, ProductDescription, ProductImage, Price, Size, Category)
        VALUES ('$name', '$description', '$imageURL', $price, 'large', 'shoes');";

        if(mysqli_query($connection, $sql)){
            echo "Item inserted successfully, going back to admin panel...";
            echo"
                <html>
                <head>
                    <title>Redirecting...</title>
                    <meta http-equiv=\"refresh\" content=\"5;URL=./admin.php\">
                    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\"
                          integrity=\"sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB\" crossorigin=\"anonymous\">
                    <link rel=\"stylesheet\" href=\"../../css/redirect.css\">
                </head>
                <body>
                    <p>Item Added :)</p>
                    You are being automatically redirected to the admin panel.<br />
                    If your browser does not redirect you in 5 seconds, or you do
                    not wish to wait, <a href=\"./admin.php\">click here</a>. 
                </body>
                </html>
            ";
        }
        else{
            echo "ERROR: Not able to execute $sql. " . mysqli_error($connection) . " going back to the admin panel...";

            echo"
                <html>
                <head>
                    <title>Redirecting...</title>
                    <meta http-equiv=\"refresh\" content=\"5;URL=./admin.php\">
                    <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\"
                          integrity=\"sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB\" crossorigin=\"anonymous\">
                    <link rel=\"stylesheet\" href=\"../../css/redirect.css\">
                </head>
                <body>
                    <h1><-- ERROR --></h1>
                    <p>Item not added. Reason for error at top of page.</p>
                    You are being automatically redirected to a new location.<br />
                    If your browser does not redirect you in 5 seconds, or you do
                    not wish to wait, <a href=\"./admin.php\">click here</a>. 
                </body>
                </html>
            ";
        }
    }
    else{
        echo"
            <html>
            <head>
                <title>Redirecting...</title>
                <meta http-equiv=\"refresh\" content=\"5;URL=./admin.php\">
                <link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css\"
                      integrity=\"sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB\" crossorigin=\"anonymous\">
                <link rel=\"stylesheet\" href=\"../../css/redirect.css\">
            </head>
            <body>
                <h3><-- ERROR --></h3>
                <p>Item not added. Reason for error at top of page.</p>
                You are being automatically redirected to a new location.<br />
                If your browser does not redirect you in 5 seconds, or you do
                not wish to wait, <a href=\"./admin.php\">click here</a>. 
            </body>
            </html>
        ";
    }
}

isFieldsValid();

?>