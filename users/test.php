
<?php
include("../db/db.php");
#include_once("session.php");
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
    <th class="th-sm">PAP Code</th>
                   <th class="th-sm">Building Name</th>
                   <th class="th-sm">Building Code</th>
                   <th class="th-sm">Region</th>
                   <th class="th-sm">Champ Name</th>
                   <th class="th-sm">Client Name</th>
                   <th class="th-sm">Client Contact</th>
                   <th class="th-sm">MAC Address</th>
                   <th class="th-sm">Pap Status</th>
                   <th class="th-sm">Date Turned On</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <?php

$sql="SELECT * from turnedonpap WHERE DateTurnedOn >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) order by DateTurnedOn Desc";
$result=mysqli_query($connection,$sql);
if($result){
while($row=mysqli_fetch_assoc($result)){
;
$code=$row['PapCode'];
$bname=$row['BuildingName'];
$bcode=$row['BuildingCode'];
$reg=$row['Region'];
$champ=$row['ChampName'];
$cname=$row['ClientName'];
$contact=$row['ClientContact'];
$mac=$row['MacAddress'];
$status=$row['PapStatus'];
$on=$row['DateTurnedOn'];

echo ' <tr>
<td>'.$code.'</td>
<td>'.$bname.'</td>
<td>'.$bcode.'</td>
<td>'.$reg.'</td>
<td>'.$champ.'</td>
<td>'.$cname.'</td>
<td>'.$contact.'</td>
<td>'.$mac.'</td>
<td>'.$status.'</td>
<td>'.$on.'</td>
</tr>';

}
 }
?>
  </tbody>
</table>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script>
        $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
    </script>
  </body>
</html>