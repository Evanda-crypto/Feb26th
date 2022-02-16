<?php
session_start();
$currentTime = time();
if(!isset($_SESSION['Sales']) && $_SESSION['Sales']==false || ($currentTime > $_SESSION['expire']))
{
    header("location: ../../index.php");
}
?>
