<?php
include("../../db/db.php");
include_once("session.php");
?>
<!--Graphs-->
<?php
                                  if (!$connection) {
                                    # code...
                                  echo "Problem in database connection! Contact administrator!" . mysqli_error();
                                      }else{
                                      $sql ="SELECT  Region, COUNT(Region) as buildings FROM building GROUP BY Region HAVING COUNT(Region)>1 OR COUNT(Region)=1 order by buildings Desc";
                                      $result = mysqli_query($connection,$sql);
                                      $chart_data="";
                                      while ($row = mysqli_fetch_array($result)) { 
 
                                      $Region[]  = $row['Region']  ;
                                      $Build[] = $row['buildings'];
                                       }
                                    }?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>TeamLeader | Dashboard</title>
  <!-- loader--
  <link href="../../assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../../assets/js/pace.min.js"></script>
  <!--favicon-->
<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

  <link rel="icon" href="../../assets/favicon.png" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="../../assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
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
      </li>      <li>
     <!-- <li>
        <a href="#">
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

  <!--Start Dashboard Content-->

	<div class="card mt-3">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body" >
                  <h5 class="text-white mb-0"><?php
                                             $query="SELECT COUNT(*)as pending from papdailysales LEFT JOIN papinstalled on papinstalled.ClientID=papdailysales.ClientID WHERE papinstalled.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['pending']."<br><br>";
                                              }
                                              ?> <span class="float-right"><i class="fa fa-question"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Pending Installation <span class="float-right"> <i class="zmdi zmdi-long--up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><?php
                                             $query="SELECT COUNT(*) as installed from papinstalled where DATE(DateInstalled) = CURDATE() and Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['installed']."<br><br>";
                                              }
                                              ?> <span class="float-right"><i class="fa fa-check"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">Daily Installation[<?php echo $_SESSION['Region']?>] <span class="float-right"> <i class="zmdi zmdi-up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><?php
                                             $query="SELECT (COUNT(*)*2) as techies from techieteams where Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['techies']."<br><br>";
                                              }
                                              ?> <span class="float-right"><i class="fa fa-male"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">My Techies <span class="float-right"><i class="zmdi zmdi--up"></i></span></p>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h5 class="text-white mb-0"><?php
                                             $query="SELECT COUNT(*) as myteams from techieteams where Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['myteams']."<br><br>";
                                              }
                                              ?> <span class="float-right"><i class="fa fa-users"></i></span></h5>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">My Teams <span class="float-right"><i class="zmdi zmdi-long"></i></span></p>
                </div>
            </div>
        </div>
    </div>
 </div>  
	  
	<div class="row">
     <div class="col-12 col-lg-8 col-xl-7"  style="width:100%;">
	    <div class="card">
		 <div class="card-header">Installation Progress
		   <div class="card-action">
			 <div class="dropdown">
			 <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
			  <i class="icon-options"></i>
			 </a>
			<!--	<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item" href="javascript:void();">Action</a>
				<a class="dropdown-item" href="javascript:void();">Another action</a>
				<a class="dropdown-item" href="javascript:void();">Something else here</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="javascript:void();">Separated link</a>
			   </div>-->
			  </div>
		   </div>
		 </div>

     <?php
                                  
                                  if (!$connection) {
                                        # code...
                                   echo "Problem in database connection! Contact administrator!" . mysqli_error();
                                 }else{
                                     $sql ="SELECT DateInstalled,COUNT(DateInstalled) as installed FROM papinstalled GROUP BY DateInstalled HAVING COUNT(DateInstalled)>1 OR COUNT(DateInstalled)=1 AND `DateInstalled` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)order by DateInstalled Asc";
                                     $result = mysqli_query($connection,$sql);# All Region installation
                                     $chart_data="";
                                      while ($row = mysqli_fetch_array($result)) { 
                                     # $Date[]  = $row['DateInstalled']  ;
                                     #$number[] = $row['installed'];
                                      
                                      }
                                   }?>
		 <div class="card-body">
		    <ul class="list-inline">
			 <!-- <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light"></i>PAP Installation[All Regions]</li>-->
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-white"></i>PAP Installation[<?php echo $_SESSION['Region']?>]</li>
			</ul>
      <?php
                                  
                                  if (!$connection) {
                                        # code...
                                   echo "Problem in database connection! Contact administrator!" . mysqli_error();
                                 }else{
                                     $sql ="SELECT DateInstalled,COUNT(DateInstalled) as reginstallation FROM papinstalled where REGION='".$_SESSION['Region']."' GROUP BY DateInstalled HAVING COUNT(DateInstalled)>1 OR COUNT(DateInstalled)=1 AND `DateInstalled` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
                                     $result = mysqli_query($connection,$sql);# individual region installation
                                     $chart_data="";
                                      while ($row = mysqli_fetch_array($result)) { 
                                      $Date[]  = $row['DateInstalled']  ;
                                      $reginstallation[] = $row['reginstallation'];
                                      
                                      }
                                   }?>
			<div class="chart-container-1">
      <canvas id="chart1"></canvas>
			</div>
		 </div>
		 
		 <div class="row m-0 row-group text-center border-top border-light-3">
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0"><?php
                                             $query="SELECT COUNT(*) as installed from papinstalled where DATE(DateInstalled) = CURDATE() and region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['installed']."<br><br>";
                                              }
                                              ?></h5>
			   <small class="mb-0">Daily Installation[<?php echo $_SESSION['Region']?>] <span> <i class="fa fa-"></i></span></small>
		     </div>
		   </div>
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0"><?php
                                             $query="SELECT  COUNT(papinstalled.MacAddress) as installed FROM papinstalled WHERE`DateInstalled` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY) and papinstalled.Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['installed']."<br><br>";
                                              }
                                              ?></h5>
			   <small class="mb-0">Weekly Installation[<?php echo $_SESSION['Region']?>] <span> <i class="fa fa-arrow-"></i> </span></small>
		     </div>
		   </div>
		   <div class="col-12 col-lg-4">
		     <div class="p-3">
		       <h5 class="mb-0"><?php
                                             $query="SELECT  COUNT(papinstalled.MacAddress) as installed FROM papinstalled WHERE`DateInstalled` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['installed']."<br><br>";
                                              }
                                              ?></h5>
			   <small class="mb-0">Weekly Installation[All Regions] <span> <i class="fa fa-arrow-"></i></span></small>
		     </div>
		   </div>
		 </div>
		 
		</div>
	 </div>

   <div class="col-12 col-lg-4 col-xl-5">
        <div class="card">
           <div class="card-header"><center><h5>Pap Installation Per Team[<?php echo $_SESSION['Region']?>]</h5></center>
             <div class="card-action">
             <div class="dropdown">
             <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
              <i class="icon-options"></i>
             </a>
            <!--  <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="javascript:void();">Action</a>
              <a class="dropdown-item" href="javascript:void();">Another action</a>
              <a class="dropdown-item" href="javascript:void();">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:void();">Separated link</a>
               </div>-->
              </div>
             </div>
           </div>
           
           <div class="card-body">
           <div class="table-responsive">
           <table class="table" id="dtBasicExample">
                  <thead>
                    <tr>
                    <th>No</th>
                     <th>Techie 1</th>
                     <th>Techie 2</th>
                     <th>Pap Installed</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $query  = "SELECT techieteams.Techie_1,techieteams.Techie_2,COUNT(papinstalled.Team_ID) as task FROM papinstalled LEFT JOIN techieteams ON techieteams.Team_ID=papinstalled.Team_ID WHERE papinstalled.Region='".$_SESSION['Region']."' and  papinstalled.DateInstalled BETWEEN subdate(curdate(), WEEKDAY(curdate())) AND  subdate(curdate(), WEEKDAY(curdate())-13) GROUP BY techieteams.Team_ID";
                        $result  = mysqli_query($connection, $query);

                        $num_rows  = mysqli_num_rows($result);

                        $num = 0;
                        if ($num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $num++;
                        ?>
                                <tr>
                                    <th><?php echo $num; ?></th>
                                    <th><?php echo $row['Techie_1']; ?></th>
                                    <th><?php echo $row['Techie_2']; ?></th>
                                    <th><?php echo $row['task']; ?></th>

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
     </div>
	</div><!--End Row-->
	
	<!--<div class="row">
	 <div class="col-12 col-lg-12">
	   <div class="card">
	     <div class="card-header">Pending Installation
		  <div class="card-action">
      <!--<div class="form-outline"> <input type="search" id="myInput" onkeyup="myFunction()"class="form-control" placeholder="Search by Name.." aria-label="Search" /></div>
             <!-- <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="javascript:void();">Action</a>
              <a class="dropdown-item" href="javascript:void();">Another action</a>
              <a class="dropdown-item" href="javascript:void();">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:void();">Separated link</a>
               </div>
              </div>--
             </div>
		 </div>
     <div class="form-outline" style="alignment:left;"> 	<!--		Show Numbers Of Rows 		--
			 		<select class  ="form-control" name="state" id="maxRows">
						 <option value="10000">Show ALL Rows</option>
						 <option value="5">5</option>
						 <option value="25">25</option>
						 <option value="50">50</option>
						 <option value="100">100</option>
						 <option value="250">250</option>
						 <option value="500">500</option>
						 <option value="1000">1000</option>
						</select>
			 		
			  	</div>
	       <div class="table-responsive">
                 <table class="table align-items-center table-flush table-borderless" id="myTable">
                  <thead>
                   <tr>
                   <th>ID</th>
                     <th>Building Name</th>
                     <th>Building Code</th>
                     <th>Region</th>
                     <th>Client Name</th>
                     <th>Client Contact</th>
                     <th>Availability</th>
                     <th>More</th>
                   </tr>
                   </thead>
                   <tbody><tr>
                   <?php
   /* $query=mysqli_query($connection,"SELECT DISTINCT papdailysales.ClientID,papdailysales.ClientName,papdailysales.ClientContact,papdailysales.ClientAvailability,papdailysales.Region,papdailysales.BuildingName,papdailysales.BuildingCode from papdailysales LEFT OUTER JOIN techietask on techietask.ClientID=papdailysales.ClientID
    WHERE techietask.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'");
    while($row=mysqli_fetch_assoc($query)){
      $id=$row['ClientID'];
      $cname=$row['ClientName'];
      $contact=$row['ClientContact'];
      $availD=$row['ClientAvailability'];
      $reg=$row['Region'];
      $bname=$row['BuildingName'];
      $bcode=$row['BuildingCode'];
      
      echo ' <tr>
      <th scope="row">'.$id.'</th>
      <td>'.$bname.'</td>
      <td>'.$bcode.'</td>
      <td>'.$reg.'</td>
      <td>'.$cname.'</td>
      <td>'.$contact.'</td>
      <td>'.$availD.'</td>
      <td>
        <button class="btn-success"><a href="techie-task.php?client-id='.$id.'" class="text-bold">Assign Task</a></button>
      </td>
      </tr>';
    }*/
    ?>
                   </tr>


                 </tbody></table>
               </div>
	   </div>
	 </div>
	</div><!--End Row-->

      <!--End Dashboard Content-->
	  
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
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="../../assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../../assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="../../assets/js/jquery.loading-indicator.js"></script>
  <!-- Custom scripts -->
  <script src="../../assets/js/app-script.js"></script>
  <!-- Chart js -->
<script src="../../assets/plugins/Chart.js/Chart.min.js"></script>
  <script>
 $(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>

</body>
<script>
  var ctx = document.getElementById('chart1').getContext('2d');
		
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($Date); ?>,
        datasets: [{
          label: 'Pap Installed[<?php echo $_SESSION['Region']?>]',
          data: <?php echo json_encode($reginstallation); ?>,
          backgroundColor: '#fff',
          borderColor: "transparent",
          pointRadius :"0",
          borderWidth: 3
        }]
      },
    options: {
      maintainAspectRatio: false,
      legend: {
        display: false,
        labels: {
        fontColor: '#ddd',  
        boxWidth:40
        }
      },
      tooltips: {
        displayColors:false
      },	
      scales: {
        xAxes: [{
        ticks: {
          beginAtZero:true,
          fontColor: '#ddd'
        },
        gridLines: {
          display: true ,
          color: "rgba(221, 221, 221, 0.08)"
        },
        }],
         yAxes: [{
        ticks: {
          beginAtZero:true,
          fontColor: '#ddd'
        },
        gridLines: {
          display: true ,
          color: "rgba(221, 221, 221, 0.08)"
        },
        }]
       }

     }
    });  
    // chart 2

		var ctx = document.getElementById("chart2").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: <?php echo json_encode($Region); ?>,
					datasets: [{
						backgroundColor: [
							"#ffffff",
							"rgba(255, 255, 255, 0.70)",
							"rgba(255, 255, 255, 0.50)",
							"rgba(255, 255, 255, 0.20)"
						],
						data: <?php echo json_encode($Build); ?>,
						borderWidth: [0, 0, 0, 0]
					}]
				},
			options: {
				maintainAspectRatio: false,
			   legend: {
				 position :"bottom",	
				 display: false,
				    labels: {
					  fontColor: '#ddd',  
					  boxWidth:15
				   }
				}
				,
				tooltips: {
				  displayColors:false
				}
			   }
			});
</script>
</html>
