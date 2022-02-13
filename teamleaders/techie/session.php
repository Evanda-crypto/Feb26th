<?php
session_start();
if(!isset($_SESSION['teamleader']) && $_SESSION['teamleader']==false)
{
    header("location: ../../index.php");
}
?>