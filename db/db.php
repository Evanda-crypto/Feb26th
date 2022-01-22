<?php
$connection=mysqli_connect('localhost','root','','konnect');
if(!$connection){
    die(mysqli_error($connection));
}
?>