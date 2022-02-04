<?php
    session_start();
    session_unset();
    session_destroy();
    header("location: ../techie/login.php");
    exit;
?>
