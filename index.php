<!DOCTYPE html>
<html>
    <?php 
        session_start(); 
    ?>
    <?php include $_SERVER['DOCUMENT_ROOT'] . "/assets/frontend/header.php"; ?>
    <body>
        
        <?php include $_SERVER['DOCUMENT_ROOT'] . "/php/assets/nav-bar/init.php" ?>
        
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