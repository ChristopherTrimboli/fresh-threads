function validateForm() {

    let itemName = document.forms["adminForm"]["Name"].value;
    let itemDescription = document.forms["adminForm"]["Description"].value;
    let itemPrice = document.forms["adminForm"]["Price"].value;
    let itemImageURL = document.forms["adminForm"]["URL"].value;

    function isNameValid(name){
        if (/\d/.test(name) || name.length === 0){
            document.getElementById("itemName").style.border="2px solid red"
        }else{
            document.getElementById("itemName").style.border="2px solid green"
        }
    }
    function isDescriptionValid(description){
        if(description.length < 50 && description.length !== 0){
            document.getElementById("itemDescription").style.border="2px solid green"
        }
        else{
            document.getElementById("itemDescription").style.border="2px solid red"
        }
    }
    function isPriceValid(price){
        if (/^\d+\.\d{2}$/.test(price)){
            document.getElementById("itemPrice").style.border="2px solid green"
        }else{
            document.getElementById("itemPrice").style.border="2px solid red"
        }
    }
    function isImageURLValid(URL){
        let regexp = /^(?:(?:https?|ftp):\/\/)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:\/\S*)?$/;
        if(regexp.test(URL)){
            document.getElementById("itemImageURL").style.border="2px solid green"
        }
        else{
            document.getElementById("itemImageURL").style.border="2px solid red"
        }

    }
    isDescriptionValid(itemDescription);
    isPriceValid(itemPrice);
    isNameValid(itemName);
    isImageURLValid(itemImageURL);

}