<?php 

    session_start();

    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['user_level']);

    session_destroy();
    header('location: login.php');


?>