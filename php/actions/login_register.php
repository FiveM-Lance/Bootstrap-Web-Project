<?php
    session_start();
    include "../assets/db.php";
    /* Login Check and Function */

    if ( isset( $_POST['login_username'] ) &&  isset( $_POST['login_password'] ) ) {
        // Create connection
        $sql = "SELECT * FROM users WHERE username='".$_POST['login_username']."' AND password='".$_POST['login_password']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Valid!";
            $row = $result->fetch_array();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['displayname'] = $row['displayname'];
            $_SESSION['profile_picture'] = $row['profile_picture'];
            $_SESSION['permission_level'] = $row['permission_level'];
        }
        header("Location: http://localhost/");
    }

    /* Register Function */

    if ( isset( $_POST['register_username'] ) && isset( $_POST['register_displayname'] ) && isset( $_POST['register_password'] ) && isset( $_POST['register_email'] ) && isset( $_POST['register_phonenumber'] )  ) {
        // Create connection
        $sql = "INSERT INTO users (username, displayname, password, email, phonenumber) VALUES( '".$_POST['register_username']."', '".$_POST['register_displayname']."', '".$_POST['register_password']."', '".$_POST['register_email']."',  '".$_POST['register_phonenumber']."' )";
        $conn->query($sql);
        $sql = "SELECT * FROM users WHERE username='".$_POST['register_username']."' AND password='".$_POST['register_password']."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Valid!";
            $row = $result->fetch_array();
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['displayname'] = $row['displayname'];
            $_SESSION['profile_picture'] = $row['profile_picture'];
            $_SESSION['permission_level'] = $row['permission_level'];
        }
        header("Location: http://localhost/");
    }
?>