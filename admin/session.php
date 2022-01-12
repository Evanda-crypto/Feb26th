<?php
session_start();
if(!isset($_SESSION['Admin']) && $_SESSION['Admin']==false)
{
    header("location: ../index.php");
}
?>