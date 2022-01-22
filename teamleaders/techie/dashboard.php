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

      <li>
        <a href="calendar.php">
          <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
          <small class="badge float-right badge-light"></small>
        </a>
      </li>

      <li>
        <a href="new-team.php">
          <i class="zmdi zmdi-account-add"></i> <span>New Team</span>
        </a>
      </li>

      <li>
        <a href="techie-teams.php">
          <i class="fa fa-pencil"></i> <span>Change Team</span>
        </a>
      </li>

      <li>
        <a href="pending-installation.php">
          <i class="fa fa-tasks"></i> <span>Assign Task</span>
          <small class="badge float-right badge-light"><?php
                                             $query="SELECT  COUNT(papdailysales.ClientID) AS pending,papdailysales.ClientID,papdailysales.ClientName,papdailysales.ClientContact,papdailysales.ClientAvailability,papdailysales.Region,papdailysales.BuildingName,papdailysales.BuildingCode from papdailysales LEFT OUTER JOIN techietask on techietask.ClientID=papdailysales.ClientID
                                             WHERE techietask.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'";
                                             $data=mysqli_query($connection,$query);
                                             while($row=mysqli_fetch_assoc($data)){
                                             echo $row['pending']."<br><br>";
                                              }
                                              ?></small>
        </a>
      </li>

      <li>
      <li>
        <a href="#">
          <i class="fa fa-check"></i> <span>Work Report</span>
        </a>
      </li>
    <!--  <li>
        <a href="profile.php">
          <i class="zmdi zmdi-face"></i> <span>Profile</span>
        </a>
      </li>-->

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
                                             $query="SELECT COUNT(*)as pending,papinstalled.ClientID,papdailysales.ClientID from papdailysales LEFT JOIN papinstalled on papinstalled.ClientID=papdailysales.ClientID WHERE papinstalled.ClientID is null and papdailysales.Region='".$_SESSION['Region']."'";
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
     <div class="col-12 col-lg-8 col-xl-8"  style="width:100%;">
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
                                     $sql ="SELECT DateInstalled,COUNT(DateInstalled) as installed FROM papinstalled GROUP BY DateInstalled HAVING COUNT(DateInstalled)>1 OR COUNT(DateInstalled)=1 AND `DateInstalled` >= DATE_SUB(CURDATE(), INTERVAL 7 DAY)";
                                     $result = mysqli_query($connection,$sql);# All Region installation
                                     $chart_data="";
                                      while ($row = mysqli_fetch_array($result)) { 
                                      $Date[]  = $row['DateInstalled']  ;
                                      $number[] = $row['installed'];
                                      
                                      }
                                   }?>
		 <div class="card-body">
		    <ul class="list-inline">
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-white"></i>PAP Installation</li>
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light"></i>PAP Installation[<?php echo $_SESSION['Region']?>]</li>
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
                                      #$Date[]  = $row['DateInstalled']  ;
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
			   <small class="mb-0">Weekely Installation[<?php echo $_SESSION['Region']?>] <span> <i class="fa fa-arrow-"></i> </span></small>
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
			   <small class="mb-0">Weekely Installation[All Regions] <span> <i class="fa fa-arrow-"></i></span></small>
		     </div>
		   </div>
		 </div>
		 
		</div>
	 </div>

   <div class="col-12 col-lg-4 col-xl-4">
        <div class="card">
           <div class="card-header">Buildings Per Region
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
		     <div class="chart-container-2">
               <canvas id="chart2"></canvas>
			  </div>
           </div>
           <div class="table-responsive">
             <table class="table align-items-center">
               <tbody>
                 <tr>
                   <td><i class="fa fa-circle text-white mr-2"></i> <?php echo json_encode($Region[0]); ?></td>
                   <td><?php echo json_encode($Build[0]); ?></td>
                   <td></td>
                 </tr>
                 <tr>
                   <td><i class="fa fa-circle text-light-1 mr-2"></i><?php echo json_encode($Region[1]); ?></td>
                   <td><?php echo json_encode($Build[1]); ?></td>
                   <td></td>
                 </tr>
                 <tr>
                   <td><i class="fa fa-circle text-light-2 mr-2"></i><?php echo json_encode($Region[2]); ?></td>
                   <td><?php echo json_encode($Build[2]); ?></td>
                   <td></td>
                 </tr>
                 <tr>
                   <td><i class="fa fa-circle text-light-3 mr-2"></i><?php echo json_encode($Region[3]); ?></td>
                   <td><?php echo json_encode($Build[3]); ?></td>
                   <td></td>
                 </tr>
                 <tr>
                   <td><i class="fa fa-circle text-light-3 mr-2"></i><?php echo json_encode($Region[4]); ?></td>
                   <td><?php echo json_encode($Build[4]); ?></td>
                   <td></td>
                 </tr>
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
  <script src="../../assets/js/jquery.min.js"></script>
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
 
  <!-- Index js 
  <script src="../../assets/js/index.js"></script>-->
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

</body>
<script>
  var ctx = document.getElementById('chart1').getContext('2d');
		
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($Date); ?>,
        datasets: [{
          label: 'Pap Installed[All Regions]',
          data: <?php echo json_encode($number); ?>,
          backgroundColor: '#fff',
          borderColor: "transparent",
          pointRadius :"0",
          borderWidth: 3
        }, {
          label: 'Pap Installed[<?php echo $_SESSION['Region']?>]',
          data: <?php echo json_encode($reginstallation); ?>,
          backgroundColor: "rgba(255, 255, 255, 0.25)",
          borderColor: "transparent",
          pointRadius :"0",
          borderWidth: 1
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
<script>
    getPagination('#myTable');
					//getPagination('.table-class');
					//getPagination('table');

		  /*					PAGINATION 
		  - on change max rows select options fade out all rows gt option value mx = 5
		  - append pagination list as per numbers of rows / max rows option (20row/5= 4pages )
		  - each pagination li on click -> fade out all tr gt max rows * li num and (5*pagenum 2 = 10 rows)
		  - fade out all tr lt max rows * li num - max rows ((5*pagenum 2 = 10) - 5)
		  - fade in all tr between (maxRows*PageNum) and (maxRows*pageNum)- MaxRows 
		  */
		 

function getPagination(table) {
  var lastPage = 1;

  $('#maxRows')
    .on('change', function(evt) {
      //$('.paginationprev').html('');						// reset pagination

     lastPage = 1;
      $('.pagination')
        .find('li')
        .slice(1, -1)
        .remove();
      var trnum = 0; // reset tr counter
      var maxRows = parseInt($(this).val()); // get Max Rows from select option

      if (maxRows == 5000) {
        $('.pagination').hide();
      } else {
        $('.pagination').show();
      }

      var totalRows = $(table + ' tbody tr').length; // numbers of rows
      $(table + ' tr:gt(0)').each(function() {
        // each TR in  table and not the header
        trnum++; // Start Counter
        if (trnum > maxRows) {
          // if tr number gt maxRows

          $(this).hide(); // fade it out
        }
        if (trnum <= maxRows) {
          $(this).show();
        } // else fade in Important in case if it ..
      }); //  was fade out to fade it in
      if (totalRows > maxRows) {
        // if tr total rows gt max rows option
        var pagenum = Math.ceil(totalRows / maxRows); // ceil total(rows/maxrows) to get ..
        //	numbers of pages
        for (var i = 1; i <= pagenum; ) {
          // for each page append pagination li
          $('.pagination #prev')
            .before(
              '<li data-page="' +
                i +
                '">\
								  <span>' +
                i++ +
                '<span class="sr-only">(current)</span></span>\
								</li>'
            )
            .show();
        } // end for i
      } // end if row count > max rows
      $('.pagination [data-page="1"]').addClass('active'); // add active class to the first li
      $('.pagination li').on('click', function(evt) {
        // on click each page
        evt.stopImmediatePropagation();
        evt.preventDefault();
        var pageNum = $(this).attr('data-page'); // get it's number

        var maxRows = parseInt($('#maxRows').val()); // get Max Rows from select option

        if (pageNum == 'prev') {
          if (lastPage == 1) {
            return;
          }
          pageNum = --lastPage;
        }
        if (pageNum == 'next') {
          if (lastPage == $('.pagination li').length - 2) {
            return;
          }
          pageNum = ++lastPage;
        }

        lastPage = pageNum;
        var trIndex = 0; // reset tr counter
        $('.pagination li').removeClass('active'); // remove active class from all li
        $('.pagination [data-page="' + lastPage + '"]').addClass('active'); // add active class to the clicked
        // $(this).addClass('active');					// add active class to the clicked
	  	limitPagging();
        $(table + ' tr:gt(0)').each(function() {
          // each tr in table not the header
          trIndex++; // tr index counter
          // if tr index gt maxRows*pageNum or lt maxRows*pageNum-maxRows fade if out
          if (
            trIndex > maxRows * pageNum ||
            trIndex <= maxRows * pageNum - maxRows
          ) {
            $(this).hide();
          } else {
            $(this).show();
          } //else fade in
        }); // end of for each tr in table
      }); // end of on click pagination list
	  limitPagging();
    })
    .val(5)
    .change();

  // end of on select change

  // END OF PAGINATION
}

function limitPagging(){
	// alert($('.pagination li').length)

	if($('.pagination li').length > 7 ){
			if( $('.pagination li.active').attr('data-page') <= 3 ){
			$('.pagination li:gt(5)').hide();
			$('.pagination li:lt(5)').show();
			$('.pagination [data-page="next"]').show();
		}if ($('.pagination li.active').attr('data-page') > 3){
			$('.pagination li:gt(0)').hide();
			$('.pagination [data-page="next"]').show();
			for( let i = ( parseInt($('.pagination li.active').attr('data-page'))  -2 )  ; i <= ( parseInt($('.pagination li.active').attr('data-page'))  + 2 ) ; i++ ){
				$('.pagination [data-page="'+i+'"]').show();

			}

		}
	}
}

$(function() {
  // Just to append id number for each row
  $('table tr:eq(0)').prepend('<th> ID </th>');

  var id = 0;

  $('table tr:gt(0)').each(function() {
    id++;
    $(this).prepend('<td>' + id + '</td>');
  });
});
</script>
</html>
