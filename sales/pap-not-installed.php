<?php
include("../db/db.php");
include_once("session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>My | Clients</title>
  <!-- loader-->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

 <!-- <link href="../assets/css/pace.min.css" rel="stylesheet"/>
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
     <a href="SalesDashboard.php">
    <!--  <img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
      <h5 class="logo-text">Dashtreme Admin</h5>
    </a>-->
  </div>
  <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION</li>
     <li>
       <a href="SalesDashboard.php">
         <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
       </a>
     </li>

     <!--<li>
       <a href="icons.php">
         <i class="zmdi zmdi-invert-colors"></i> <span>UI Icons</span>
       </a>
     </li>-->

     <li>
       <a href="pap-details.php">
         <i class="zmdi zmdi-format-list-bulleted"></i> <span>Pap daily sales</span>
       </a>
     </li>

     <li>
       <a href="buildings.php">
         <i class="zmdi zmdi-grid"></i> <span>Buldings</span>
       </a>
     </li>

     <li>
       <a href="my-clients.php">
         <i class="zmdi zmdi-wifi"></i> <span>My turned on pap</span>
       </a>
     </li>
     <li>
       <a href="pap-not-installed.php">
         <i class="zmdi zmdi-alert-triangle"></i> <span>Pap not installed</span>
       </a>
     </li>
    <li>
       <a href="profile.php" >
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
            <h6 class="mt-2 user-title"><?php echo $_SESSION['FName'];?>  <?php echo $_SESSION['LName'];?></h6>
            <p class="user-subtitle"><?php echo $_SESSION['Sales'];?></p>
            <p class="user-subtitle"></p>
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
        
          <div class="card">
        
            <div class="card-body">
            <center> <h5 class="card-title">Pap Not Installed</h5></center>
			  <div class="table-responsive">
        <table id="dtBasicExample" class="table" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">No
      </th>
      <th class="th-sm">Client Name
      </th>
      <th class="th-sm">Contact
      </th>
      <th class="th-sm">Building Name
      </th>
      <th class="th-sm">Building Code
      </th>
      <th class="th-sm">Floor
      </th>
      </th>
      <th class="th-sm">Region
      </th>
      <th class="th-sm">DateSigned
      </th>
      </th>
      <th class="th-sm">Reason
      </th>
          </th>
      <th class="th-sm">Restore
      </th>
    </tr>
  </thead>
  <tbody>
  <?php
                        $query  = "SELECT ClientID,ClientName,BuildingName,BuildingCode,Region,Floor,DateSigned,Reason,Contact from papnotinstalled WHERE ChampName='".$_SESSION['FName']." ".$_SESSION['LName']."'";
                        $result  = mysqli_query($connection, $query);

                        $num_rows  = mysqli_num_rows($result);


                        $num = 0;
                        if ($num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $num++;
                        ?>
                                <tr>
                                    <th><?php echo $num; ?></th>
                                    <th><?php echo $row['ClientName']; ?></th>
                                    <th><?php echo $row['Contact']; ?></th>
                                    <th><?php echo $row['BuildingName']; ?></th>
                                    <th><?php echo $row['BuildingCode']; ?></th>
                                    <th><?php echo $row['Floor']; ?></th>
                                    <th><?php echo $row['Region']; ?></th>
                                    <th><?php echo $row['DateSigned']; ?></th>
                                    <th><?php echo $row['Reason']; ?></th>
                                   <th>
                                    <button class="btn-secondary" ><a href="resign-pap.php?client-id=<?php echo $row['ClientID']; ?> " onClick="return confirm('Sure to restore <?php  echo $row['ClientName']; ?> as pap client  again?')">Restore</a></button>
                                    </th>
                                </tr>
                        <?php

                            }
                        }
                        ?>
  </tbody>
</table>
            </div>
            </div>
          </div>
        
        <div class="col-lg-6">

        </div>
      </div><!--End Row-->


      <div class="row">
        <div class="col-lg-6">
     
        </div>
        <div class="col-lg-6">
      
        </div>
      </div><!--End Row-->

      <div class="row">
        <div class="col-lg-6">
      
        </div>
        <div class="col-lg-6">
  
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
          Copyright © 2018 Dashtreme Admin
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
