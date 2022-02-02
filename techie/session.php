<?php
session_start();
if(!isset($_SESSION['Techie']) && $_SESSION['Techie']==false )
{
    header("location: login.php");
}
?>