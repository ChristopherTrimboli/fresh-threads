<?php
session_start();
if(isset($_SESSION["loggedIn"])){
    $ifLoggedOn = $_SESSION["loggedIn"];
    $user = $_SESSION["user"];
}

$trigger = $_POST['trigger'];

if($trigger == true){
    if(isset($_SESSION["loggedIn"])) {
        if ($ifLoggedOn == true) {

            $message = "
                        <div class=\"col-6\">
                            <button type=\"button\" class=\"btn btn-outline-success\">$user</button>
                        </div>
                        <div class=\"col-6\">
                            <form action=\"../common/logOut.php\" method=\"post\">
                                <button type=\"submit\" class=\"btn btn-primary\">
                                    Logout
                                </button>
                            </form> 
                        </div>
                    ";
            print "$message";
        }
    }
    else{
        $message = "<div class=\"col-6\">
            <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#register\">
                Register
            </button>
            <div class=\"modal fade\" id=\"register\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"registerTitle\" aria-hidden=\"true\">
                <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                    <div class=\"modal-content\">
                        <div class=\"modal-header\">
                            <h5 class=\"modal-title\" id=\"registerTitle\" >Register for an Account</h5>
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                        <form name=\"registerForm\" action=\"../common/register.php\" method=\"post\">
                            <div class=\"modal-body\">
                                <div class=\"form-group\">
                                    <label for=\"emailRegister\" class=\"col-form-label\">Email</label>
                                    <input onkeyup =\"return validateRegister()\" type=\"text\" name=\"emailRegister\"
                                           class=\"form-control registerForms\" id=\"emailRegister\"
                                           placeholder=\"example@example.xyz\" autocomplete='username email'>
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"passwordRegister\" class=\"col-form-label\">Password</label>
                                    <input onkeyup=\"return validateRegister()\" name=\"passwordRegister\" type=\"password\"
                                           class=\"form-control registerForms\" id=\"passwordRegister\"
                                           placeholder=\"Choose a secure password\" autocomplete='new-password'>
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"passwordConfirmRegister\" class=\"col-form-label\">Confirm Password</label>
                                    <input onkeyup=\"return validateRegister()\" name=\"passwordConfirmRegister\"
                                           type=\"password\" class=\"form-control registerForms\" id=\"passwordConfirmRegister\"
                                           placeholder=\"Re-type your password\" autocomplete='new-password'>
                                </div>
                            </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                            <button id=\"registerButtonSubmit\" type=\"submit\" class=\"btn btn-primary registerButton\">Register</button>
                            <script>document.getElementById(\"registerButtonSubmit\").disabled = true;</script>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-6\">
            <button id=\"signInButton\" type=\"button\" class=\"btn btn-info\" data-toggle=\"modal\" data-target=\"#signIn\">
                Sign-In
            </button>
            <div class=\"modal fade\" id=\"signIn\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"signInTitle\" aria-hidden=\"true\">
                <div class=\"modal-dialog modal-dialog-centered\" role=\"document\">
                    <div class=\"modal-content\">
                        <div class=\"modal-header\">
                            <h5 class=\"modal-title\" id=\"signInTitle\">Sign-In to your Existing Account</h5>
                            <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
                                <span aria-hidden=\"true\">&times;</span>
                            </button>
                        </div>
                        <form id='signInForm' name=\"signInForm\" action=\"../common/signIn.php\" method=\"post\">
                        <div class=\"modal-body\">
                                <div class=\"form-group\">
                                    <label for=\"emailSignIn\" class=\"col-form-label\">Email</label>
                                    <input onkeyup=\"return validateSignIn()\" name=\"emailSignIn\" type=\"text\"
                                           class=\"form-control signInForms\" id=\"emailSignIn\"
                                           placeholder=\"example@example.xyz\" autocomplete='username email'
                                    >
                                </div>
                                <div class=\"form-group\">
                                    <label for=\"passwordSignIn\" class=\"col-form-label\">Password</label>
                                    <input onkeyup=\"return validateSignIn()\" name=\"passwordSignIn\" type=\"password\"
                                           class=\"form-control signInForms\" id=\"passwordSignIn\"
                                           placeholder=\"Your password\" autocomplete='password'
                                    >
                                </div>
                        </div>
                        <div class=\"modal-footer\">
                            <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Close</button>
                            <button id=\"signInButtonSubmit\" type=\"submit\" class=\"btn btn-primary\">Sign-In</button>
                            <script>document.getElementById(\"signInButtonSubmit\").disabled = true;</script>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            (function loginMessage(){
                let loginMessage = document.createElement(\"PARAGRAPH\");
                let form = document.getElementById('signInForm');
                document.getElementById('signInForm').innerHTML = '';
                loginMessage.appendChild(form);
            })();
        </script>
        ";
        print "$message";
    }
}
