
<?php
include("../db/db.php");
include_once("session.php");

if(isset($_POST['submit'])){
$DateSigned = $_POST['DateSigned'];
$ChampName = $_POST['ChampName'];
$BuildingName = $_POST['Buildingname'];
$BuildingCode = $_POST['BuildingCode'];
$Region = $_POST['Region'];
$Apt = $_POST['Apt'];
$AptLayout = $_POST['aptlayout'];
$Floor = $_POST['floor'];
$ClientName = $_POST['ClientName'];
$ClientAvailability = $_POST['Day'];
$ClientContact = $_POST['ClientContact'];
$ClientWhatsApp = $_POST['WhatsApp'];
$ClientGender = $_POST['gender'];
$ClientAge = $_POST['age'];
$ClientOccupation = $_POST['occupation'];
$HouseholdSize = $_POST['Householdsize'];
$Children = $_POST['Children'];
$Teenagers = $_POST['Teenagers'];
$Adults = $_POST['Adults'];
$Birthday = $_POST['Birthday'];
$Facebook = $_POST['facebook'];
$Instagram = $_POST['Instagram'];
$Twitter = $_POST['twitter'];
$BizName = $_POST['bizname'];
$BizCat = $_POST['bizcat'];
$BizDec = $_POST['bizdec'];
$Note = $_POST['Note'];

if($connection->connect_error){
  die('connection failed : '.$connection->connect_error);
}
else
{ 
  $stmt= $connection->prepare("select * from papdailysales where ClientContact= ?");
  $stmt->bind_param("s",$ClientContact);
  $stmt->execute();
  $stmt_result= $stmt->get_result();
  if($stmt_result->num_rows>0){
  
      $msg = '<div class="alert alert-warning" role="alert">
     The client aready exist.
    </div>';

  }
  else{
    
      $insert= $connection->prepare("insert into papdailysales (DateSigned,ChampName,BuildingName,BuildingCode,Region,Apt,AptLayout,Floor,ClientName,ClientAvailability,ClientContact,
      ClientWhatsApp,ClientGender,ClientAge,ClientOccupation,HouseholdSize,Children,Teenagers,Adults,Birthday,Facebook,Instagram,Twitter,BizName,BizCat,BizDec,Note)
      values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      //values from the fields
      $insert->bind_param("sssssssssssssssssssssssssss",$DateSigned,$ChampName,$BuildingName,$BuildingCode,$Region,$Apt,$AptLayout,$Floor,$ClientName,$ClientAvailability,$ClientContact,
      $ClientWhatsApp,$ClientGender,$ClientAge,$ClientOccupation,$HouseholdSize,$Children,$Teenagers,$Adults,$Birthday,$Facebook,$Instagram,$Twitter,$BizName,$BizCat,$BizDec,$Note);
      $insert->execute();
      $insert->close();
      $stmt->close();

      if ($insert) {
        $msg = '<div class="alert alert-success" role="alert">
       Submitted successfully.
      </div>';
        "";
    } else {
        $msg = '<div class="alert alert-warning" role="alert">
        Error occurs while updating the query
      </div>';
    }
  }
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
                <a href="pap-details.php" class="btn btn-info">Go back</a>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->

</body>

</html>