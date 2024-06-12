<?php 

    session_start();
    session_destroy();
    header("Location: ../Screens/login.php");
    exit();
?>