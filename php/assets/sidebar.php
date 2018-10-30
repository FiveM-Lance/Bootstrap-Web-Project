<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Page Title</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>
    <body>
        
        <!-- Login Prompt -->

        <div id="loginPrompt" class="modal fade">
            <div class="modal-dialog modal-login">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="avatar">
                            <img src="images/logo.png" alt="logo">
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
                            <img src="images/logo.png" alt="logo">
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
                            <input type="text" class="form-control" name="register_password" placeholder="Enter password" required>
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

        <!-- Sidebar -->
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">PCGalaxy</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-userbar  -->
                <?php 
                    if (isset($_SESSION['user_id'])) {
                        include 'php/actions/userbar.php';
                    }
                ?>
                <!-- sidebar-navigation  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                                <span class="badge badge-pill badge-danger">New</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Dashboard 1
                                            <span class="badge badge-pill badge-success">Pro</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 3</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>E-commerce</span>
                                <span class="badge badge-pill badge-primary">3</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Products

                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Orders</a>
                                    </li>
                                    <li>
                                        <a href="#">Credit cart</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="far fa-gem"></i>
                                <span>Components</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">General</a>
                                    </li>
                                    <li>
                                        <a href="#">Panels</a>
                                    </li>
                                    <li>
                                        <a href="#">Tables</a>
                                    </li>
                                    <li>
                                        <a href="#">Icons</a>
                                    </li>
                                    <li>
                                        <a href="#">Forms</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-chart-line"></i>
                                <span>Charts</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Pie chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Line chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Bar chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Histogram</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Maps</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Google maps</a>
                                    </li>
                                    <li>
                                        <a href="#">Open street map</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#loginPrompt" data-toggle="modal">
                                <i class="fa fa-folder"></i>
                                <span>Examples</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Documentation</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-login_register  -->
                <?php
                    if (!isset($_SESSION['user_id'])){
                        echo '<div class="sign_button" class="container"><div class="row"><div class="col-12 text-center"><a href="#loginPrompt" data-toggle="modal" class="btn btn-primary">Login</a></div></div></div>';
                        echo '<div class="sign_button" class="container"><div class="row"><div class="col-12 text-center"><a href="#registerPrompt" data-toggle="modal" class="btn btn-primary">Register</a></div></div></div>';
                    }
                ?>
            </div>
        </nav>
    </body>
</html>