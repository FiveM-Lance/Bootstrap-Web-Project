<!DOCTYPE html>
<html>
    <?php session_start(); ?>
    
    <script type="text/javascript">
        var currentUser         = <?php echo '"'. $_SESSION['username'] .'"' ?>;
        var currentDisplayName  = <?php echo '"'. $_SESSION['displayname'] .'"' ?>;
    </script>

    <?php
        include $_SERVER['DOCUMENT_ROOT'] . "/assets/frontend/header.php";
        
        if (!isset($_SESSION['username'])) 
        {
            header("Location: http://localhost/");
        }
    ?>
    <script src="http://localhost/js/settings.js"></script>

    <body>

        <?php include $_SERVER['DOCUMENT_ROOT'] . "/php/assets/nav-bar/init.php" ?>

        <div style="max-width: 1000px; padding: 50px;" class="container">
            <form id="settings-update" class="form-group" action="http://localhost/php/actions/update.php" method="post" autocomplete="off">
                <div class="settings-container">
                    <h4>Settings</h4>
                    <hr>
                    <div id="settings-fields">
                        <div class="form-group row">
                            <label for="new_username" class="col-sm-2 col-form-label" style="text-align: right;">Username</label>
                            <div class="form-inline col-sm-10"> 
                                <div class="input-group">
                                    <input id="new_username" name="new_username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="user-name-update-hint" disabled>
                                    <div class="input-group-append">
                                        <button id="user-name-update-toggle" class="settings-update-toggle btn btn-primary fa fa-pencil" type="button"></button>
                                    </div>
                                </div>
                                <small id="user-name-update-hint" class="settings-update-hint form-group text-danger"></small>    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_displayname" class="col-sm-2 col-form-label" style="text-align: right;">Display Name</label>
                            <div class="form-inline col-sm-10"> 
                                <div class="input-group">
                                    <input id="new_displayname" name="new_displayname" type="text" class="form-control" placeholder="Display Name" aria-label="Display Name" aria-describedby="display-name-update-hint" disabled>
                                    <div class="input-group-append">
                                        <button id="display-name-update-toggle" class="settings-update-toggle btn btn-primary fa fa-pencil" type="button"></button>
                                    </div>
                                </div>
                                <small id="display-name-update-hint" class="settings-update-hint form-group text-danger"></small>    
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new_profilepicture" class="col-sm-2 col-form-label" style="text-align: right;">Profile Picture</label>
                            <div class="form-inline col-sm-10"> 
                                <label>
                                    <input type="image" src="http://localhost/images/image_upload.png" style="z-index: 1;height: 150px;width: 150px;">
                                    <input type="file" id="new_profilepicture" style="display: none;">
                                    <img id="new_profilepicture_display" src="http://localhost/images/users/default.jpg" style="border-radius: 50%;width: 150px;height: 150px;position: absolute;">
                                </label>
                                <small id="display-name-update-hint" class="settings-update-hint form-group text-danger"></small>    
                            </div>
                        </div>
                    </div>
                </div>
                <div id="settings-submit" class="form-inline" style="background-color: #efeef1 !important;padding: 20px;border-radius: 0px 0px 4px 4px !important;">
                    <button type="submit" id="settings_submit" class="btn btn-outline-dark" style="width: 150px">Update</button>
                </div>
                <div id="settings-toast" class="settings-update"></div>
            <form>
        </div>
    </body>
</html>