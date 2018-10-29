<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
        <script src="main.js"></script>
    </head>
    <body>
        <?php
            session_start();
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "website";
            $login_user;
            $login_pass;
            
            if (isset($_SESSION['user_id'])) {
                setcookie(session_name(), '', 100);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("Location: http://localhost");
        ?>
    </body>
</html>

