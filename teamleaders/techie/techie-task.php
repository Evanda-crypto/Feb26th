<?php
include('../../db/db.php');
include_once("session.php");
$id=$_GET['client-id'];

$sql="select * from papdailysales where ClientID=$id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$id=$row['ClientID'];
$cname=$row['ClientName'];
$contact=$row['ClientContact'];
$availD=$row['ClientAvailability'];
$reg=$row['Region'];
$bname=$row['BuildingName'];
$bcode=$row['BuildingCode'];

if(isset($_POST['submit'])){
    $TeamID = $_POST['teamid'];
    $ClientID = $_POST['ClientID'];
    $ClientName = $_POST['cname'];
    $ClientContact = $_POST['contact'];
    $ClientAvailability = $_POST['availD'];
    $Region = $_POST['reg'];
    $BuildingName = $_POST['bname'];
    $BuildingCode = $_POST['bcode'];
    $Date = $_POST['date'];

    if($connection->connect_error){
        die('connection failed : '.$connection->connect_error);
    }
    else
    {    
      $stmt= $connection->prepare("select * from teams where Team_ID= ? and Region= ?");
    $stmt->bind_param("ss",$TeamID,$Region);
    $stmt->execute();
    $stmt_result= $stmt->get_result();
    if($stmt_result->num_rows>0){
      
        $stmt= $connection->prepare("insert into techietask (TeamID,ClientID,ClientName,ClientContact,ClientAvailability,Region,BuildingName,BuildingCode,Date)
        values(?,?,?,?,?,?,?,?,?)");
        //values from the fields
        $stmt->bind_param("sssssssss",$TeamID,$ClientID,$ClientName,$ClientContact,$ClientAvailability,$Region,$BuildingName,$BuildingCode,$Date);
        $stmt->execute();
        echo "<script>alert('Successfull.');</script>";
        header("location: pending-installation.php");
        $stmt->close();
        $connection->close();
    }
    else{
      echo "<script>alert('Team does not exist.');</script>";
    }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Techie | Task</title>
  <!-- loader--
  <link href="../../assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../../assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../../assets/favicon.png" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="../../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="../../assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="../../assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="../../assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="../../assets/css/app-style.css" rel="stylesheet"/>
  
  
</head>

<body class="bg-theme bg-theme11">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <!--Start sidebar-wrapper-->
 <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="dashboard.php">
       <img src="../../assets/logo.png" class="logo-icon" alt="logo icon" style="width: 80px; height: 60px;">
       <h5 class="logo-text"></h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="dashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

     <!-- <li>
        <a href="calendar.php">
          <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
          <small class="badge float-right badge-light"></small>
        </a>
      </li>-->

      <li>
        <a href="new-team.php">
          <i class="zmdi zmdi-account-add"></i> <span>New Team</span>
        </a>
      </li>

     <!-- <li>
        <a href="techie-teams.php">
          <i class="fa fa-pencil"></i> <span>Change Team</span>
        </a>
      </li>-->

      <li>
        <a href="pending-installation.php">
          <i class="fa fa-tasks"></i> <span>Assign Task</span>
          <small class="badge float-right badge-light"><?php
                                             $query="SELECT COUNT(papdailysales.ClientID) AS pending from papdailysales LEFT OUTER JOIN techietask on techietask.ClientID=papdailysales.ClientID left join  papnotinstalled on papnotinstalled.ClientID=papdailysales.ClientID
                                             WHERE techietask.ClientID is null and papnotinstalled.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['pending']."<br><br>";
                                              }
                                              ?></small>
        </a>
      </li>
            <li>
        <a href="reasign-task.php">
          <i class="zmdi zmdi-refresh-alt"></i> <span>Reasign Task</span>
        </a>
      </li>
            <li>
        <a href="pap-installed.php">
          <i class="fa fa-check"></i> <span>Pap Installed</span>
        </a>
      </li>
     <!-- <li>
        <a href="">
          <i class="fa fa-check"></i> <span>Work Report</span>
        </a>
      </li>-->
     <li>
        <a href="profile.php">
          <i class="zmdi zmdi-face"></i> <span>Profile</span>
        </a>
      </li>

      <li>
        <a href="logout.php" target="_blank">
          <i class="zmdi zmdi-lock"></i> <span>Logout</span>
        </a>
      </li>

     <!--  <li>
        <a href="register.php" target="_blank">
          <i class="zmdi zmdi-account-circle"></i> <span>Registration</span>
        </a>
      </li>-->
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->
  

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
  <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class=""><?php echo $_SESSION['Region']?></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="https://via.placeholder.com/110x110" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="https://via.placeholder.com/110x110" alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $_SESSION['FName']?> <?php echo $_SESSION['LName']?></h6>
            <p class="user-subtitle"><?php echo $_SESSION['teamleader']?></p>
            </div>
           </div>
          </a>
       </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->
<div class="clearfix"></div>
	
  <div class="content-wrapper">
    <div class="container-fluid">

    <div class="row mt-3">
      <div class="col-lg-4">
         <div class="card">
           <div class="card-body">
           <div class="card-title">New Task</div>
           <hr>
            <form method="POST">
           <div class="form-group">
            <label for="input-1">Team ID</label>
            <input type="text" class="form-control" name="teamid" id="input-1" placeholder="Enter Team ID" value="<?php echo $_SESSION['Region']?>-" required>
           </div>
           <div class="form-group">
            <label for="input-2">Client ID</label>
            <input type="text" class="form-control" name="ClientID" value="<?php echo $id?>" id="input-2" placeholder="Client ID">
           </div>
           <div class="form-group">
            <label for="input-2">Client Name</label>
            <input type="text" class="form-control" name="cname" value="<?php echo $cname?>" id="input-2" placeholder="Client Name">
           </div>
           <div class="form-group">
            <label for="input-2">Contact</label>
            <input type="text" class="form-control" name="contact" id="input-2" value="<?php echo $contact?>" placeholder="Client Contact">
           </div>
           <div class="form-group">
            <label for="input-2">Region</label>
            <input type="text" class="form-control" name="reg" id="input-2" value="<?php echo $reg?>" placeholder="Region">
           </div>
           <div class="form-group">
            <label for="input-2">Availability</label>
            <input type="text" class="form-control" name="availD" id="input-2" value="<?php echo $availD?>" placeholder="Client Availability">
           </div>
           <div class="form-group">
            <label for="input-2">Building Name</label>
            <input type="text" class="form-control" name="bname" id="input-2" value="<?php echo $bname?>" placeholder="Building Name">
           </div>
           <div class="form-group">
            <label for="input-2">Building Code</label>
            <input type="text" class="form-control" name="bcode" id="input-2" value="<?php echo $bcode?>" placeholder="Building Code">
           </div>
           <div class="form-group">
            <label for="input-2">Date of Work</label>
            <input type="date" class="form-control" name="date" id="input-2" placeholder="Date of Work" required>
           </div>
           <div class="form-group">
            <button type="submit" name="submit" class="btn btn-light px-5"><i class="icon-tick"></i> Submit</button>
          </div>
          </form>
         </div>
         </div>
      </div>

     <div class="col-lg-8">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Pending Tasks for Teams 
           </div>
           <hr>
              <h5 class="card-title"></h5>
			  <div class="table-responsive">
              <table class="table table-hover" id="myTable">
                <thead>
                  <tr>
                    <th scope="col">Team ID</th>
                    <th scope="col">Techie 1</th>
                    <th scope="col">Techie 2</th>
                    <th scope="col">Pending Tasks</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php

                          $sql="SELECT techietask.TeamID, COUNT(techietask.TeamID) as tasks,teams.Techie1,teams.Techie2 FROM techietask left join papinstalled on papinstalled.ClientID=techietask.ClientID
                          left join teams on techietask.TeamID=teams.Team_ID WHERE papinstalled.ClientID is null and techietask.Region='".$_SESSION['Region']."' 
                          GROUP BY techietask.TeamID HAVING COUNT(techietask.TeamID)>1 OR COUNT(techietask.TeamID)=1";
                          $result=mysqli_query($connection,$sql);
                          if($result){
                          while($row=mysqli_fetch_assoc($result)){
                          $tid=$row['TeamID'];
                          $t1=$row['Techie1'];
                          $t2=$row['Techie2'];
                          $task=$row['tasks'];

                          echo ' <tr>
                          <td>'.$tid.'</td>
                          <td>'.$t1.'</td>
                          <td>'.$t2.'</td>
                          <td>'.$task.'</td>
                          </tr>';

                       }
                         }
                       ?>
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
      </div>
    </div><!--End Row-->

	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->

    </div>
    <!-- End container-fluid-->
    
   </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer--
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © Konnect 2022
        </div>
      </div>
    </footer>
	<!--End footer-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
   
  </div><!--End wrapper-->


  <!-- Bootstrap core JavaScript-->
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="../../assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../../assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../../assets/js/app-script.js"></script>
  <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}

$(document).ready(function () {
$("myTable").stickyTableHeaders();
});
</script>
<script>
 var todayDate= new Date();
 var month= todayDate.getMonth() + 1;
 var year= todayDate.getFullYear();
 var todate=todayDate.getDate();
if(todate<10){
  todate= "0"+ todate;
}
if(month<10){
  month= "0"+ month;
}
 maxdate= year +"-" + month + "-" + todate;
 document.getElementById("input-2").setAttribute("max",maxdate);
</script>
</body>
<!--SELECT count(techietask.TeamID) as task,papinstalled.Team_ID from techietask left join papinstalled on papinstalled.ClientID=techietask.ClientID WHERE papinstalled.ClientID is null and techietask.TeamID="1000"



SELECT techietask.TeamID, COUNT(techietask.TeamID) as tasks FROM techietask left join papinstalled on papinstalled.ClientID=techietask.ClientID WHERE papinstalled.ClientID is null  and techietask.Region="G44" GROUP BY techietask.TeamID HAVING COUNT(techietask.TeamID)>1 OR COUNT(techietask.TeamID)=1 





-->
</html>
