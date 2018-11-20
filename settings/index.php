<!DOCTYPE html>
<html>
    <?php
        session_start();
        include $_SERVER['DOCUMENT_ROOT'] . "/assets/frontend/header.php";
        
        if (!isset($_SESSION['username'])) 
        {
            header("Location: http://localhost/");
        }
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

        <div style="max-width: 1000px; padding: 50px;" class="container">
            <form id="settings-update" class="form-group" action="http://localhost/php/actions/update.php" method="post" autocomplete="off">
                <div class="settings-container">
                    <h4>Settings</h4>
                    <hr>
                    <div class="form-group row">
                        <label for="new_username" class="col-sm-2 col-form-label" style="text-align: right;">Username</label>
                        <div class="form-inline col-sm-10"> 
                            <div class="input-group">
                                <input id="new_username" name="new_username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="user-name-update-hint" disabled>
                                <div class="input-group-append">
                                    <button id="user-name-update-toggle" class="btn btn-primary fa fa-pencil" type="button"></button>
                                </div>
                            </div>
                            <small id="user-name-update-hint" style="display: block; padding-left: 15px;" class="form-group text-danger"></small>    
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="new_displayname" class="col-sm-2 col-form-label" style="text-align: right;">Display Name</label>
                        <div class="form-inline col-sm-10"> 
                            <div class="input-group">
                                <input id="new_displayname" name="new_displayname" type="text" class="form-control" placeholder="Display Name" aria-label="Display Name" aria-describedby="display-name-update-hint" disabled>
                                <div class="input-group-append">
                                    <button id="display-name-update-toggle" class="btn btn-primary fa fa-pencil" type="button"></button>
                                </div>
                            </div>
                            <small id="display-name-update-hint" style="display: block; padding-left: 15px;" class="form-group text-danger"></small>    
                        </div>
                    </div>
                </div>
                <div id="user-name-update-option" style="background-color: #efeef1 !important;padding: 30px;border-radius: 0px 0px 4px 4px !important;">
                    <button type="submit" id="settings_submit" class="btn btn-outline-dark" style="width: 150px">Update</button>
                </div>
            <form>
        </div>
    </body>
</html>