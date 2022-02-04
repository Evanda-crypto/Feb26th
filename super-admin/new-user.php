<?php

include("../db/db.php");
include("session.php");

if(isset($_POST['submit'])){
$FirstName = $_POST['FName'];
$LastName = $_POST['LName'];
$Email = $_POST['email'];
$Department = $_POST['Department'];
$Password = $_POST['password'];

$hashpass= password_hash($Password, PASSWORD_DEFAULT);

//checking if connection is not created successfully
if($connection->connect_error){
    die('connection failed : '.$connection->connect_error);
}
else
{
    $stmt= $connection->prepare("insert into employees (FIRST_NAME,LAST_NAME,EMAIL,DEPARTMENT,PASSWORD)
    values(?,?,?,?,?)");
       //values from the fields
    $stmt->bind_param("sssss",$FirstName,$LastName,$Email,$Department,$hashpass);
    $stmt->execute();
    echo "<script>alert('Successfull.');</script>";
    echo '<script>window.location.href="new-user.php";</script>';
    $stmt->close();
   # $connection->close();
   
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
  <title>New | User</title>
  <!-- loader--
  <link href="../assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../assets/favicon.png" type="image/x-icon">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
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
 <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="false" >
     <div class="brand-logo">
      <a href="dashboard.php">
       <img src="../assets/logo.png" style="width: 100px; height: 70px;" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">   </h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol" >
      <li class="sidebar-header">    MAIN NAVIGATION</li>
      <!--<li>
        <a href="dashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li class="sidebar-header" style="font-size: 17px; color:white; font-style:bold; alignment:center;"><span> TABLES</span></li>
      <li  style="margin-left:5%">
        <a href="pap-daily-sales.php">
          <i class="zmdi zmdi-grid"></i> <span>Pap Daily Sales</span>
        </a>
      </li>

      <li  style="margin-left:5%">
        <a href="pap-daily-installation.php">
          <i class="zmdi zmdi-grid"></i> <span>Pap Daily Installation</span>
        </a>
      </li>

      <li  style="margin-left:5%">
        <a href="pap-pending-installation.php">
          <i class="zmdi zmdi-grid"></i> <span>Pending Pap Installation</span>
        </a>
      </li>

      <li style="margin-left:5%">
        <a href="pap-master-record.php">
          <i class="zmdi zmdi-grid"></i> <span>Pap Master Record</span>
        </a>
      </li>-->

      <li class="sidebar-header" style="font-size: 17px; color:white; font-style:bold;"><span> ACCOUNTS</span></li>
      <li  style="margin-left:5%">
        <a href="new-user.php">
          <i class="fa fa-user"></i> <span>New User</span>
        </a>
      </li>

     <!-- <li  style="margin-left:5%">
        <a href="add-teamleader.php">
          <i class="fa fa-user-plus"></i> <span>Add TeamLeader</span>
        </a>
      </li>

     <!-- <li>
        <a href="list-of-teamleaders.php">
          <i class="fa fa-eye"></i> <span>View TeamLeaders</span>
        </a>
      </li>

     <!-- <li class="sidebar-header" style="font-size: 17px; color:white; font-style:bold; alignment:center;"><span> SALES</span></li>
      <li>
        <a href="#">
          <i class="fa fa-user"></i> <span>A</span>
        </a>
      </li>

      <li>
        <a href="forms.php">
          <i class="fa fa-user-plus"></i> <span>B</span>
        </a>
      </li>

      <li>
        <a href="#">
          <i class="fa fa-minus-circle"></i> <span>C</span>
        </a>
      </li>

      <li class="sidebar-header" style="font-size: 17px; color:white; font-style:bold; alignment:center;"><span> TECHIE</span></li>
      <li>
        <a href="#">
          <i class="fa fa-user"></i> <span>Material Usage</span>
        </a>
      </li>

      <li>
        <a href="forms.php">
          <i class="fa fa-user-plus"></i> <span>Payment</span>
        </a>
      </li>

    <!--  <li>
        <a href="#">
          <i class="fa fa-minus-circle"></i> <span>Change TeamLeader</span>
        </a>
      </li>--
      <li class="sidebar-header" style="font-size: 17px; color:white; font-style:bold; alignment:center;"><span> TOOLS</span></li>
      <li style="margin-left:5%">
        <a href="gallery.php">
          <i class="fa fa-picture-o"></i> <span>Gallery</span>
        </a>
      </li>
      <li  style="margin-left:5%">
        <a href="calendar.php">
          <i class="fa fa-calendar"></i> <span>Calendar</span>
          <small class="badge float-right badge-light">New</small>
        </a>
      </li>-->
      <li  style="margin-left:5%">
        <a href="logout.php">
          <i class="fa fa-lock"></i> <span>Logout</span>
        </a>
      </li>

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
     
   <!-- <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class=""></i></a>
    </li>-->

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
            <h6 class="mt-2 user-title"><?php## echo $_SESSION['FName']?> <?php #echo $_SESSION['LName']?></h6>
            <p class="user-subtitle"><?php echo $_SESSION['superadmin']?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
       <!-- <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>-->
        <li class="dropdown-divider"></li>
        <li class="dropdown-item" ><i class="icon-power mr-2" href="logout.php"></i> Logout</li>
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
           <div class="card-title">New User</div>
           <hr>
            <form method="POST" autocomplete="off">
           <div class="form-group">
            <label for="input-1">First Name</label>
            <input type="text" class="form-control" name="FName" id="input-1" placeholder="Enter First Name" required>
           </div>
           <div class="form-group">
            <label for="input-2">Last Name</label>
            <input type="text" class="form-control" name="LName" id="input-2" placeholder="Enter Last Name" required>
           </div>
           <div class="form-group">
            <label for="input-2">Email</label>
            <input type="text" class="form-control" name="email" id="input-2" placeholder="Enter Email" required>
           </div>
           <div class="form-group">
            <label for="input-1">Department</label>
            <select type="text" class="form-control" name="Department" id="input-1" name="Region" placeholder="Region" required>
              <option value="" disabled selected> Select Deprtment</option>
              <option value="Executive">Executive</option>
              <option value="HR">HR</option>
              <option value="Nats">Nats</option>
              <option value="Maton">Maton</option>
              <option value="Hub">Hub</option>
              <option value="Media">Media</option>
              <option value="Sales">Sales</option>
              <option value="Techie">Techie</option>
            </select>
           </div>
           <div class="form-group">
            <label for="input-2">Password</label>
            <input type="text" class="form-control" name="password" id="input-2" value="123456" placeholder="Password" required>
           </div>
           <div class="form-group">
            <button type="submit" name="submit" class="btn btn-light px-5"><i class="icon-tick"></i> Submit</button>
          </div>
          </form>
         </div>
         </div>
      </div>

     <div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title"><center><h5>Emails</h5></center>  <div class="form-outline">
           </div>
           <hr>
          
			  <div class="table-responsive">
              <table class="table table-hover" id="dtBasicExample">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Department</th>
                    
                  </tr>
                </thead>
                <tbody>
   <?php
    
    $sql="select * from employees order by ID ASC";
    $result=$connection->query($sql);
    while($row=$result->fetch_array()){
      ?>
      <tr>
        <td><?php echo $row['ID']?></td>
        <td><?php echo $row['FIRST_NAME']?></td>
        <td><?php echo $row['LAST_NAME']?></td>
        <td><?php echo $row['EMAIL']?></td>
        <td><?php echo $row['DEPARTMENT']?></td>
    </tr>
    <?php } ?>
                </tbody>
              </table>
            </div>
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


  <!-- Bootstrap core JavaScript--
  <script src="../assets/js/jquery.min.js"></script>-->
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="../assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../assets/js/app-script.js"></script>
  <script>
        $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
    </script>
</body>
</html>
