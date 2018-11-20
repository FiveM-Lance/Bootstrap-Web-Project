<?php
    session_start();
    if (isset($_SESSION['user_id']))
    {
        include "userbar.php";
    }
    else
    {
        include "guestbar.php";
    }
?>