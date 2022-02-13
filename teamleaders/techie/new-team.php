<?php
include('../../db/db.php');
include_once("session.php");

if(isset($_POST['submit'])){
    $Team_ID=$_POST['teamid'];
    $Techie_1 = $_POST['Techie1'];
    $Techie_2 = $_POST['Techie2'];
    $Email1 = $_POST['Email1'];
    $Email2 = $_POST['Email2'];
    $Region = $_POST['region'];
    
    //checking connection
    if($connection->connect_error){
        die('connection failed : '.$connection->connect_error);
    }
    else
    {
         //Insert query
        $stmt= $connection->prepare("insert into techieteams (Team_ID,Techie_1,Techie_2,Region,Email1,Email2)
        values(?,?,?,?,?,?)");
           //values from the fields
        $stmt->bind_param("ssssss",$Team_ID,$Techie_1,$Techie_2,$Region,$Email1,$Email2);
        $stmt->execute();
        echo "<script>alert('Information successfully submited');</script>";
        $stmt->close();
        $connection->close();
    
    }
    }
?>
<?php
include("../../db/db.php");
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
  <title>New | Team</title>
  <!-- loader--
  <link href="../../assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../../assets/js/pace.min.js"></script>
  <!--favicon-->

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

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
       <img src="../../assets/login-logo3.png" class="logo-icon" alt="logo icon" style="width: 100px; height: 60px;">
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
       <!-- <a href="techie-teams.php">
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
     
  <ul class="navbar-nav align-items-center right-nav-link">
  <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <b class=""><?php echo $_SESSION['Region']?></b></a>
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
           <div class="card-title">New Team</div>
           <hr>
            <form method="POST">
           <div class="form-group">
            <label for="input-1">Team ID</label>
            <input type="text" class="form-control" name="teamid" value="<?php echo $_SESSION['Region']?>-" id="input-1" placeholder="Enter Team ID" required>
           </div>
           <div class="form-group">
            <label for="input-2">Techie 1</label>
            <input type="text" class="form-control" name="Techie1" id="techie1"  onkeyup="GetDetail(this.value)" placeholder="Techie 1" required>
           </div>
           <div class="form-group">
            <label for="input-2">Techie 1 Email</label>
            <input type="text" class="form-control" name="Email1" id="Email1" placeholder="Techie 1 Email" required>
           </div>
           <div class="form-group">
            <label for="input-2">Techie 2</label>
            <input type="text" class="form-control" name="Techie2" id="techie2"  onkeyup="GetDetaila(this.value)" placeholder="Techie 2" required>
           </div>
           <div class="form-group">
            <label for="input-2">Techie 2 Email</label>
            <input type="text" class="form-control" name="Email2" id="Email2" placeholder="Techie 2 Email" required>
           </div>
           <div class="form-group">
            <label for="input-2">Region</label>
            <input type="text" class="form-control" name="region" id="input-2" value="<?php echo $_SESSION['Region']?>" placeholder="Region" required>
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
            <center><div class="card-title">Current Techie Teams  <div class="form-outline"></center>
			  <div class="table-responsive">
              <table class="table table-hover" id="dtBasicExample">
                <thead>
                  <tr>
                    <th scope="col">Team ID</th>
                    <th scope="col">Techie 1</th>
                    <th scope="col">Techie 2</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php

                          $sql="select * from techieteams where Region='".$_SESSION['Region']."' order by Team_ID ASC";
                          $result=mysqli_query($connection,$sql);
                          if($result){
                          while($row=mysqli_fetch_assoc($result)){
                          $tid=$row['Team_ID'];
                          $tname1=$row['Techie_1'];
                          $tname2=$row['Techie_2'];
                          

                          echo ' <tr>
                          <td>'.$tid.'</td>
                          <td>'.$tname1.'</td>
                          <td>'.$tname2.'</td>
                          
                          </tr>';

                       }
                         }
                       ?>
                 
                </tbody>
              </table>
            </div>
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
  <script src="../../assets/js/jquery.min.js"></script>-->
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="../../assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../../assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../../assets/js/app-script.js"></script>
<script>
$(document).ready(function () {
$('#dtBasicExample').DataTable();
$('.dataTables_length').addClass('bs-select');
});
</script>>
<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetail(str) {
  if (str.length == 0) {
    document.getElementById("Email1").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to first name input field
        
        document.getElementById
          ("Email1").value = myObj[0];
        
        // Assign the value received to
        // last name input field
        
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "retrieve.php?techie1=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>


<script>

// onkeyup event will occur when the user
// release the key and calls the function
// assigned to this event
function GetDetaila(str) {
  if (str.length == 0) {
    document.getElementById("Email2").value = "";
    return;
  }
  else {

    // Creates a new XMLHttpRequest object
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {

      // Defines a function to be called when
      // the readyState property changes
      if (this.readyState == 4 &&
          this.status == 200) {
        
        // Typical action to be performed
        // when the document is ready
        var myObj = JSON.parse(this.responseText);

        // Returns the response data as a
        // string and store this array in
        // a variable assign the value
        // received to first name input field
        
        document.getElementById
          ("Email2").value = myObj[0];
        
        // Assign the value received to
        // last name input field
        
      }
    };

    // xhttp.open("GET", "filename", true);
    xmlhttp.open("GET", "retriev.php?techie2=" + str, true);
    
    // Sends the request to the server
    xmlhttp.send();
  }
}
</script>
</body>
</html>
