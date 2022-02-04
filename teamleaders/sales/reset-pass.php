<?php
include("../db/db.php");
include("session.php");
$id=$_SESSION['ID'];
if(isset($_POST['submit'])){

    
$Password = $_POST['password'];
$hashpass= password_hash($Password, PASSWORD_DEFAULT);

$sql="update employees set ID=$id,PASSWORD='$hashpass' where ID=$id";

$result=mysqli_query($connection,$sql);
if ($result) {
    $msg = '<div class="alert alert-success" role="alert">
    Password was reset.
   </div>';
     "";
} else {
  $msg = '<div class="alert alert-warning" role="alert">
  An Error occured while processing your request
</div>';
}
}
?>
<!doctype html>
<html lang="ar" dir="ltr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title></title>
</head>

<body>
    <div class="container">
        <div class="row py-5">
            <div class="col-md-12 border p-3">
                <span><?php echo $msg; ?></span>
            </div>

            <div class="col-md-12 text-center pt-5 ">
                <a href="logout.php" class="btn btn-info">Login</a>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->

</body>
