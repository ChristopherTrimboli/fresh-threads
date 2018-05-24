function validateSignIn() {

    let email = document.forms["signInForm"]["emailSignIn"].value;
    let password = document.forms["signInForm"]["passwordSignIn"].value;

    function isEmailValid(email) {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) || email === "admin") {
            document.getElementById("emailSignIn").style.border = "1px solid green";
            return true;
        }
        else {
            document.getElementById("emailSignIn").style.border = "1px solid red";
            return false;
        }
    }

    function isPasswordEmpty(pass1) {
        if (pass1 === " " || pass1 === "") {
            document.getElementById("passwordSignIn").style.border = "1px solid red";
            return false;
        }
        else {
            document.getElementById("passwordSignIn").style.border = "1px solid green";
            return true;
        }
    }
    if(isEmailValid(email) === true && isPasswordEmpty(password) === true){
        document.getElementById("signInButtonSubmit").disabled = false;
    }
    else{
        document.getElementById("signInButtonSubmit").disabled = true;

    }
    isEmailValid(email);
    isPasswordEmpty(password);
}