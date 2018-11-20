<!DOCTYPE html>
<html>
    <?php
        session_start();
        include $_SERVER['DOCUMENT_ROOT'] . "/assets/frontend/header.php";
    ?>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img src="http://localhost/images/logo.png" width="75px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>

                <!-- AJAX User/Guest bar -->
                <div id="userbar" class="form-inline my-2 my-lg-0">
                </div>
                
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="width: 100px;">Search</button>
                </form>
            </div>
        </nav>
        
        <!-- Login Prompt -->

        <div id="loginPrompt" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="avatar">
                        <img style="text-align: center;" src="images/logo.png" alt="logo">
                    </div>	
                    <div class="modal-body">
                        <form action="php/actions/login_register.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="login_username" placeholder="Username" required="required">		
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="login_password" placeholder="Password" required="required">	
                            </div>        
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block login-btn">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#">Forgot Password?</a>    
                        <a href="#registerPrompt" data-toggle="modal" data-dismiss="modal">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>  
                
        <!-- Register Prompt -->

        <div id="registerPrompt" class="modal fade">
            <div class="modal-dialog modal-register">
                <div class="modal-content">
                    <div class="modal-header">			
                        
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="avatar">
                        <img style="text-align: center;" src="images/logo.png" alt="logo">
                    </div>	
                    <h4 class="modal-title">Register</h4>	
                    <div class="modal-body">
                        <form action="php/actions/login_register.php" method="post">
                            <div class="form-group">
                            <label for="register_username"><span class="glyphicon glyphicon-user"></span> Username</label>
                            <input type="text" class="form-control" name="register_username" placeholder="Enter username" required>
                            </div>
                            <div class="form-group">
                            <label for="register_displayname"><span class="glyphicon glyphicon-user"></span> Display Name</label>
                            <input type="text" class="form-control" name="register_displayname" placeholder="Enter Display Name" required>
                            </div>
                            <div class="form-group">
                            <label for="register_password"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
                            <input type="psw" class="form-control" name="register_password" placeholder="Enter password" required>
                            </div>
                            <div class="form-group">
                            <label for="register_email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                            <input type="email" class="form-control" name="register_email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                            <label for="register_phonenumber"><span class="glyphicon glyphicon-earphone"></span> Phone Number</label>
                            <input type="tel" class="form-control" name="register_phonenumber" placeholder="Enter Phone Number" required>
                            </div>
                            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Register</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <a href="#loginPrompt" data-toggle="modal" data-dismiss="modal">Have an account?</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>