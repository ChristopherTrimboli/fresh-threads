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
            <li class="nav-item active">
                <a class="nav-link" href="../shop/shop.php">Shop<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="register.php" method="post">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register">
                Register
            </button>
            <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="registerTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="registerTitle">Register for an Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="emailRegister" class="col-form-label">Email</label>
                                    <input type="text" name="emailRegister" class="form-control" id="emailRegister">
                                </div>
                                <div class="form-group">
                                    <label for="passwordRegister" class="col-form-label">Password</label>
                                    <input name="passwordRegister" type="text" class="form-control" id="passwordRegister">
                                </div>
                                <div class="form-group">
                                    <label for="passwordRegister" class="col-form-label">Confirm Password</label>
                                    <input name="passwordConfirmRegister" type="text" class="form-control" id="passwordRegister">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <form class="form-inline my-2 my-lg-0">
                                <button type="submit" class="btn btn-primary registerButton">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <button id="signInButton" type="button" class="btn btn-info" data-toggle="modal" data-target="#signIn">
                Sign-In
            </button>
            <div class="modal fade" id="signIn" tabindex="-1" role="dialog" aria-labelledby="signInTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="signInTitle">Sign-In to your Existing Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label for="emailSignIn" class="col-form-label">Email</label>
                                    <input type="text" class="form-control" id="emailSignIn">
                                </div>
                                <div class="form-group">
                                    <label for="passwordSignIn" class="col-form-label">Password</label>
                                    <input type="text" class="form-control" id="passwordSignIn">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Sign-In</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</nav>
