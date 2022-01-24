<?php
$connection=mysqli_connect('localhost','root','','test');
if(!$connection){
    die(mysqli_error($connection));
}
?>