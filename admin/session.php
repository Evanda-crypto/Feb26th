<?php
$currentTime = time();
session_start();
if(!isset($_SESSION['Admin']) && $_SESSION['Admin']==false || ($currentTime > $_SESSION['expire']))
{
    header("location: ../index.php");
}
?>
