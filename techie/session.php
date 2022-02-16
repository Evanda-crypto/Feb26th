<?php
session_start();
$currentTime = time();
if(!isset($_SESSION['Techie']) && $_SESSION['Techie']==false || ($currentTime > $_SESSION['expire']))
{
    header("location: ../index.php");
}
?>
