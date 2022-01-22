<?php
include('../db/db.php');
include_once("session.php");
$id = $_GET['client-id'];

$msg = "";
if (isset($id)) {

   /* $sql="SELECT turnedonpap.ClientID,turnedonpap.Team_ID,turnedonpap.MacAddress,turnedonpap.ChampName,turnedonpap.ClientName,turnedonpap.ClientContact,turnedonpap.BuildingName,turnedonpap.BuildingCode,turnedonpap.DateTurnedOn,turnedonpap.Region,techieteams.Techie_1,techieteams.Techie_2,papinstalled.DateInstalled,CURRENT_TIMESTAMP() as DateDeleted,papdailysales.DateSigned
    from turnedonpap join techieteams on techieteams.Team_ID=turnedonpap.Team_ID join papinstalled on papinstalled.ClientID=turnedonpap.ClientID JOIN papdailysales ON papdailysales.ClientID=papinstalled.ClientID where turnedonpap.ClientID='$id'";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result);
   
    $Team_ID = $row['Team_ID'];
    $MacAddress = $row['MacAddress'];
    $ChampName = $row['ChampName'];
    $Region = $row['Region'];
    $ClientName = $row['ClientName'];
    $ClientContact = $row['ClientContact'];
    $BuildingName = $row['BuildingName'];
    $BuildingCode = $row['BuildingCode'];
    $DateTurnedOn = $row['DateTurnedOn'];
    $ClientID = $row['ClientID'];
    $DateSigned = $row['DateSigned'];
    $DateInstalled = $row['DateInstalled'];
    $DateDeleted = $row['DateDeleted'];
    $Techie_1 = $row['Techie_1'];
    $Techie_2 = $row['Techie_2'];

    $stmt= $connection->prepare("insert into backup(ClientID,Team_ID,MacAddress,ChampName,Region,ClientName,ClientContact,BuildingName,BuildingCode,DateTurnedOn,DateSigned,DateInstalled,DateDeleted,Techie_1,Techie_2)
    values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    //values from the fields
    $stmt->bind_param("sssssssssssssss",$ClientID,$Team_ID,$MacAddress,$ChampName,$Region,$ClientName,$ClientContact,$BuildingName,$BuildingCode,$DateTurnedOn,$DateSigned,$DateInstalled,$DateDeleted,$techie1,$techie2);
    $stmt->execute();
    $stmt->close();*/

    $query = "DELETE t1, t2, t3 FROM papdailysales t1 LEFT JOIN papinstalled t2 ON t1.ClientID = t2.ClientID LEFT JOIN turnedonpap t3 ON t3.ClientID=t2.ClientID WHERE t1.ClientID= '$id'";
    $result = mysqli_query($connection, $query);
    if ($result) {
        $msg = '<div class="alert alert-success" role="alert">
        Deleted Successfully
      </div>';
        "";
    } else {
        $msg = '<div class="alert alert-warning" role="alert">
        Error occurs while updating the query
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
                <a href="pap-daily-sales.php" class="btn btn-info">Go back</a>
            </div>
        </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->

</body>

</html>