<?php
session_start();
$currentTime = time();
if(!isset($_SESSION['teamleader']) && $_SESSION['teamleader']==false || ($currentTime > $_SESSION['expire']))
{
    header("location: ../../index.php");
}
?>
