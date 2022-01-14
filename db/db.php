<?php
$connection=mysqli_connect('localhost','root','','mine');
if(!$connection){
    die(mysqli_error($connection));
}
?>