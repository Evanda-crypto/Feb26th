<?php
include('../../db/db.php');
include_once("session.php");
$id = $_GET['client-id'];

$msg = "";
if (isset($id)) {


    $query = "DELETE t1, t2 FROM papdailysales t1 LEFT JOIN papnotinstalled t2 ON t1.ClientID = t2.ClientID WHERE t1.ClientID= '$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
        Deleted Successfully
      </div>';
        "";
    } else {
        $msg = '<div class="alert alert-warning" role="alert">
        Error occured while processing your request
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
                <a href="pap-restituted.php" class="btn btn-info">Go back</a>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->

</body>

</html>
