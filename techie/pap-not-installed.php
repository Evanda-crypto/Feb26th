<?php
include_once("session.php");
include("../db/db.php");
$id=$_GET['clientid'];

$sql="SELECT techietask.ClientName,techietask.Region,papdailysales.DateSigned,papdailysales.Floor,papdailysales.ChampName,papdailysales.ClientID,techietask.ClientContact,techietask.ClientAvailability,techietask.BuildingName,techietask.Region,techietask.Date,teams.Team_ID,teams.Techie1,teams.Techie2,
papdailysales.BuildingCode,papdailysales.Floor from papdailysales LEFT JOIN 
techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN teams ON teams.Team_ID=techietask.TeamID WHERE techietask.ClientID is not null AND techietask.ClientID=$id AND teams.Team_ID='".$_SESSION['TeamID']."'";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$clientid=$row['ClientID'];
$teamid=$row['Team_ID'];
$date=$row['Date'];
$reg=$row['Region'];
$t1=$row['Techie1'];
$t2=$row['Techie2'];
$floor=$row['Floor'];
$cname=$row['ClientName'];
$champ=$row['ChampName'];
$bname=$row['BuildingName'];
$bcode=$row['BuildingCode'];
$datesigned=$row['DateSigned'];


if(isset($_POST['submit'])) {
$Team_ID=$_POST['teamid'];
$DateAssigned = $_POST['Date'];
$Techie1 = $row['Techie1'];
$Techie2 = $row['Techie2'];
$note = $_POST['note'];
$ClientID=$row['ClientID'];
$Date=$row['Date'];
$Region=$row['Region'];
$Floor=$row['Floor'];
$ClientName=$row['ClientName'];
$ChampName=$row['ChampName'];
$BuildingName=$row['BuildingName'];
$BuildingCode=$row['BuildingCode'];
$DateSigned=$row['DateSigned'];
$contact=$row['ClientContact'];


//checking connection
if($connection->connect_error){
    die('connection failed : '.$connection->connect_error);
}
else
{


     // Insert records into database 

     $query = "DELETE FROM  techietask  WHERE ClientID= '$id'";
     $result = mysqli_query($connection, $query);
     $result=mysqli_query($connection,$sql);
     $insert = $connection->query("INSERT into papnotinstalled (ClientID,ClientName,BuildingName,BuildingCode,Region,Floor,DateSigned,Reason,ChampName,TeamID,Techie1,Techie2,DateAssigned,Contact) VALUES ('$ClientID','$ClientName','$BuildingName','$BuildingCode','$Region','$Floor','$DateSigned','$note','$ChampName','$Team_ID','$Techie1','$Techie2','$DateAssigned','$contact')"); 
    
     if($insert && $result){ 
     echo '<script>alert("Submitted!")</script>';
      echo '<script>window.location.href="my-task.php";</script>';
  }else{ 
    echo "<script>alert('UnSuccessfull.');</script>"; 
     echo '<script>window.location.href="my-task.php";</script>';
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
  <title>Pap | Not | Installed</title>
  <!-- loader--
  <link href="../assets/css/pace.min.css" rel="stylesheet"/>--
  <script src="../assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../assets/images/favicon.png" type="image/x-icon">
  <!-- simplebar CSS-->
  <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="../assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="../assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="../assets/css/app-style.css" rel="stylesheet"/>
  
  
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
      <a href="TechieDashboard.php">
       <h5 class="logo-text"><?php echo $_SESSION['TeamID'];?></h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="TechieDashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

     <!-- <li>
        <a href="icons.php">
          <i class="zmdi zmdi-invert-colors"></i> <span>UI Icons</span>
        </a>
      </li>-->

      <li>
        <a href="my-task.php">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>My Task</span>
          <small class="badge float-right badge-light"><?php
                                            $query="SELECT  COUNT(teams.Team_ID)as MyTask,papinstalled.MacAddress,techietask.Date,teams.Team_ID,
                                             papdailysales.BuildingCode from papdailysales LEFT JOIN techietask on techietask.ClientID=papdailysales.ClientID LEFT JOIN teams ON teams.Team_ID=techietask.TeamID  LEFT JOIN papinstalled ON papinstalled.ClientID=papdailysales.ClientID WHERE 
                                             techietask.ClientID is not null AND papinstalled.ClientID is null AND teams.Team_ID='".$_SESSION['TeamID']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['MyTask']."<br><br>";
                                              }
                                              ?></small>
        </a>
      </li>
      <li>
        <a href="profile.php">
          <i class="zmdi zmdi-face"></i> <span>Profile</span>
        </a>
      </li>

     <!-- <li>
        <a href="login.php" target="_blank">
          <i class="zmdi zmdi-lock"></i> <span>Login</span>
        </a>
      </li>-->

       <li>
        <a href="logout.php" target="_blank">
          <i class="zmdi zmdi-lock"></i> <span>Logout</span>
        </a>
      </li>

     <!-- <li class="sidebar-header">LABELS</li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>-->

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
            
            <p class="user-subtitle"><?php echo $_SESSION['TeamID'];?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item" >Team ID : <?php echo $_SESSION['TeamID'];?></li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item" >Techie 1 : <?php echo $_SESSION['Techie1'];?></li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item" >Techie 2 : <?php echo $_SESSION['Techie2'];?></li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item" ><i class="icon-power mr-2" ></i></li>
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
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
           <div class="card-title">Pap Not Installed</div>
           <hr>
            <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <label for="input-1">Client ID</label>
            <input type="text" class="form-control" id="input-1" name="ClientID" value="<?php echo $clientid?>" readonly>
           </div>
           <div class="form-group">
            <label for="input-1">Team ID</label>
            <input type="text" class="form-control" id="input-1" name="teamid" value="<?php echo $teamid?>" readonly>
           </div>
           <div class="form-group">
            <label for="input-4">Building Name<i style="color:red;">*</i></label>
            <input type="text" class="form-control" id="input-4" value="<?php echo $bname?>" name="bname" readonly>
           </div>
        
           <div class="form-group">
            <label for="input-3">Building Code<i style="color:red;">*</i></label>
            <input type="text" class="form-control" id="input-3" value="<?php echo $bcode?>" name="bcode" readonly>
           </div>
           <div class="form-group">
            <label for="input-4">Region</label>
            <input type="text" class="form-control" id="input-4" value="<?php echo $reg?>" name="region" readonly>
           </div>
            <div class="form-group">
            <label for="input-1">Date<i style="color:red;">*</i></label></label>
            <input type="date" class="form-control" id="install" name="Date" required>
           </div>
           <div class="form-group">
            <label for="input-4">Reason<i style="color:red;">*</i></label>
            <input type="text" class="form-control" id="input-4"  name="note" placeholder="Enter Reason" required>
           </div>
           <div class="form-group">
            <button type="submit" name="submit"  class="btn btn-light px-5"><i class="icon-check"></i> Submit</button>
          </div>
          </form>
         </div>
         </div>
      </div>

      <!--<div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Round Vertical Form</div>
           <hr>
            <form>
           <div class="form-group">
            <label for="input-6">Name</label>
            <input type="text" class="form-control form-control-rounded" id="input-6" placeholder="Enter Your Name">
           </div>
           <div class="form-group">
            <label for="input-7">Email</label>
            <input type="text" class="form-control form-control-rounded" id="input-7" placeholder="Enter Your Email Address">
           </div>
           <div class="form-group">
            <label for="input-8">Mobile</label>
            <input type="text" class="form-control form-control-rounded" id="input-8" placeholder="Enter Your Mobile Number">
           </div>
           <div class="form-group">
            <label for="input-9">Password</label>
            <input type="text" class="form-control form-control-rounded" id="input-9" placeholder="Enter Password">
           </div>
           <div class="form-group">
            <label for="input-10">Confirm Password</label>
            <input type="text" class="form-control form-control-rounded" id="input-10" placeholder="Confirm Password">
           </div>
           <div class="form-group py-2">
             <div class="icheck-material-white">
            <input type="checkbox" id="user-checkbox2" checked=""/>
            <label for="user-checkbox2">I Agree Terms & Conditions</label>
            </div>
           </div>
           <div class="form-group">
            <button type="submit" class="btn btn-light btn-round px-5"><i class="icon-lock"></i> Register</button>
          </div>
          </form>
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
          Copyright ?? Konnect 2022
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
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="../assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../assets/js/app-script.js"></script>
<script>
 var tDate= new Date();
 var mm= todayDate.getMonth() + 1;
 var yyyy= todayDate.getFullYear();
 var dd=todayDate.getDate();
if(dd<10){
  dd= "0"+ dd;
}
if(mm<10){
  mm= "0"+ mm;
}
 maxdate= yyyy +"-" + mm + "-" + dd;
 document.getElementById("install").setAttribute("max",maxdate);
 </script>
</body>
</html>
