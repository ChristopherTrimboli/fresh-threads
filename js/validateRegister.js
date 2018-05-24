function validateRegister() {

    let email = document.forms["registerForm"]["emailRegister"].value;
    let pass1 = document.forms["registerForm"]["passwordRegister"].value;
    let pass2 = document.forms["registerForm"]["passwordConfirmRegister"].value;

    function isEmailValid(email){
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
            document.getElementById("emailRegister").style.border="1px solid green";
            return true;
        }
        else{
            document.getElementById("emailRegister").style.border="1px solid red";
            return false;
        }
    }
    function isPasswordEmpty(pass1){
        if(pass1 === " " || pass1 === ""){
            document.getElementById("passwordRegister").style.border="1px solid red";
            return false;
        }
        else{
            document.getElementById("passwordRegister").style.border="1px solid green";
            return true;
        }
    }
    function isPasswordSame(pass1, pass2){
        if(pass1 !== pass2 || pass2 === " " || pass2 === ""){
            document.getElementById("passwordConfirmRegister").style.border="1px solid red";
            return false;
        }
        else{
            document.getElementById("passwordConfirmRegister").style.border="1px solid green";
            return true;

        }
    }
    if(isEmailValid(email) === true && isPasswordEmpty(pass1, pass2) === true && isPasswordSame(pass1, pass2) === true){
        document.getElementById("registerButtonSubmit").disabled = false;
    }
    else{
        document.getElementById("registerButtonSubmit").disabled = true;

    }
    isEmailValid(email);
    isPasswordEmpty(pass1, pass2);
    isPasswordSame(pass1, pass2);

}