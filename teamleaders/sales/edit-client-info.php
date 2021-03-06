<?php
include("../../db/db.php");
include("session.php");
$id=$_GET['client-id'];

$sql="select * from papdailysales where ClientID=$id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$ChampName=$row['ChampName'];
$ClientName=$row['ClientName'];
$ClientContact=$row['ClientContact'];
$ClientGender=$row['ClientGender'];
$ClientAge=$row['ClientAge'];
$ClientOccupation=$row['ClientOccupation'];
$availability=$row['ClientAvailability'];
$Region=$row['Region'];
$WhatsApp=$row['ClientWhatsApp'];
$BuildingName=$row['BuildingName'];
$BuildingCode=$row['BuildingCode'];
$Apt=$row['Apt'];
$Floors=$row['Floor'];
$AptLayout=$row['AptLayout'];
$HouseholdSize=$row['HouseholdSize'];
$Children=$row['Children'];
$Teenagers=$row['Teenagers'];
$Adults=$row['Adults'];
$Birthday=$row['Birthday'];
$facebook=$row['Facebook'];
$Instagram=$row['Instagram'];
$Twitter=$row['Twitter'];
$Bizname=$row['BizName'];
$Bizcat=$row['BizCat'];
$Bizdec=$row['BizDec'];

if(isset($_POST['submit'])){
$ChampName = $_POST['ChampName'];
$ClientName = $_POST['ClientName'];
$ClientContact = $_POST['ClientContact'];
$ClientGender = $row['ClientGender'];
$ClientAge = $row['ClientAge'];
$ClientOccupation = $_POST['occupation'];
$ClientAvailability = $_POST['Day'];
$Region = $_POST['Region'];
$BuildingName = $_POST['BuildingName'];
$BuildingCode = $_POST['BuildingCode'];
$Apt = $_POST['apt'];
$Floor = $_POST['floor'];
$Layout = $row['AptLayout'];
$HouseholdSize = $_POST['HouseholdSize'];
$Children = $_POST['Children'];
$Teenagers = $_POST['Teenagers'];
$Adults = $_POST['Adults'];
$Birthday = $_POST['Birthday'];
$ClientWhatsApp = $_POST['whatsapp'];
$Facebook = $_POST['facebook'];
$Instagram = $_POST['instagram'];
$Twitter = $_POST['twitter'];
$BizName = $_POST['BizName'];
$BizCat = $_POST['BizCat'];
$BizDec = $_POST['BizDec'];

$sql="update papdailysales set ClientID=$id,ChampName='$ChampName',ClientName='$ClientName',ClientContact='$ClientContact'
,ClientGender='$ClientGender',ClientAge='$ClientAge',ClientOccupation='$ClientOccupation',ClientAvailability='$ClientAvailability',Region='$Region',BuildingName='$BuildingName',BuildingCode='$BuildingCode',Apt='$Apt'
,Floor='$Floor',AptLayout='$Layout',HouseholdSize='$HouseholdSize',Children='$Children',Teenagers='$Teenagers',Adults='$Adults',Birthday='$Birthday',ClientWhatsApp='$ClientWhatsApp',Facebook='$Facebook',
Instagram='$Instagram',Twitter='$Twitter',BizName='$BizName',BizCat='$BizCat',BizDec='$BizDec' where ClientID=$id";

$result=mysqli_query($connection,$sql);
if ($result) {
  header("Location: pap-daily-sales.php");
} else {
  $msg = '<div class="alert alert-warning" role="alert">
  Error occurs while updating the query
</div>';
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
  <title>Edit | Client | Info</title>
  <!-- loader--
  <link href="../assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../../assets/js/pace.min.js"></script>
  <!--favicon-->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
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
 <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="false" >
     <div class="brand-logo">
      <a href="dashboard.php">
       <img src="../../assets/login-logo3.png" style="width: 100px; height: 70px;" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">   </h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol" >
      <li class="sidebar-header">    MAIN NAVIGATION</li>
        <li style="margin-left:5%">
        <a href="dashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li  style="margin-left:5%">
        <a href="pap-daily-sales.php">
          <i class="zmdi zmdi-grid"></i> <span>Pap daily sales[<?php echo $_SESSION['Region']?>]</span>
        </a>
      </li>
       <li  style="margin-left:5%">
        <a href="all-pap.php">
          <i class="zmdi zmdi-grid"></i> <span>Pap all records</span>
        </a>
      </li>

<li  style="margin-left:5%">
        <a href="pap-turnedon.php">
          <i class="zmdi zmdi-grid"></i> <span>Pap turnedon</span>
        </a>
      </li>
         <!--  <li  style="margin-left:5%">
        <a href="daily-target.php">
          <i class="zmdi zmdi-grid"></i> <span>Daily target</span>
        </a>
      </li>-->

      <li  style="margin-left:5%">
        <a href="profile.php">
          <i class="zmdi zmdi-face"></i> <span>Profile</span>
        </a>
      </li>

     <!-- <li  style="margin-left:5%">
        <a href="pap-pending-installation.php">
          <i class="zmdi zmdi-grid"></i> <span>Pending Pap Installation</span>
        </a>
      </li>

      <li style="margin-left:5%">
        <a href="pap-master-record.php">
          <i class="zmdi zmdi-grid"></i> <span>Pap Master Record</span>
        </a>
      </li>

      <li class="sidebar-header" style="font-size: 17px; color:white; font-style:bold;"><span> ACCOUNTS</span></li>
      <li  style="margin-left:5%">
        <a href="new-user.php">
          <i class="fa fa-user"></i> <span>New User</span>
        </a>
      </li>

      <li  style="margin-left:5%">
        <a href="add-teamleader.php">
          <i class="fa fa-user-plus"></i> <span>Add TeamLeader</span>
        </a>
      </li>

      <li>
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
            <h6 class="mt-2 user-title"><?php echo $_SESSION['FName']?> <?php echo $_SESSION['LName']?></h6>
            <p class="user-subtitle"><?php echo $_SESSION['sales']?></p>
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
           <div class="card-title"<center><h5>Update Client Info</h5></center></div>
           <hr>
            <form method="POST">

              <div class="form-group">
            <label for="input-1">Champs</label>
            <input type="text" class="form-control" id="input-1" name="ChampName" value="<?php echo $ChampName?>" required>
           </div>
            <div class="form-group">
            <label for="input-1">Building Name </label>
            <input type="text" class="form-control" id="bname" name="BuildingName"value="<?php echo $BuildingName?>"   placeholder="Building Name" required>
           </div>
           <div class="form-group">
            <label for="input-1">Building Code</label>
            <input type="text" class="form-control" id="bcode" name="BuildingCode" placeholder="Building Code" value="<?php echo $BuildingCode?>" required>
           </div>
            <div class="form-group">
            <label for="input-1">Region</label>
            <input type="text" class="form-control" id="region" name="Region" placeholder="Region" value="<?php echo $Region?>"  required>
           </div>
           <div class="form-group">
            <label for="input-1">Apt</label>
            <input type="text" class="form-control"value="<?php echo $Apt?>" id="input-1" name="apt" placeholder="Apartment">
           </div>
            <div class="form-group">
            <label for="input-1">Floor</label>
            <input type="text" class="form-control" id="input-1" name="floor" placeholder="Floor"value="<?php echo $Floors?>" required>
           </div>
           <div class="form-group">
            <label for="input-1">Apt Layout</label>
            <select type="text" class="form-control" id="input-1" name="aptlayout">
              <option value="<?php echo $AptLayout?>" disabled selected><?php echo $AptLayout?></option>
              <option value="Single">Single</option>
              <option value="Double">Double</option>
              <option value="Bedsitter">Bedsitter</option>
              <option value="1 BR">1 BR</option>
              <option value="2 BR">2 BR</option>
              <option value="3 BR">3 BR</option>
              <option value="4 BR and above">4 BR and above</option>
            </select>
           </div>
           <div class="form-group">
            <label for="input-1">Client Name</label>
            <input type="text" class="form-control" name="ClientName" value="<?php echo $ClientName?>" id="input-1" placeholder="Client Name" required>
           </div>
           <div class="form-group">
            <label for="input-1">Age</label>
            <select type="text" class="form-control" id="input-1" name="age"  placeholder="Age">
              <option value="<?php echo $ClientAge?>" disabled selected ><?php echo $ClientAge?></option>
              <option value="Below 17">Below 17</option>  
              <option value="18-24">18-24</option>  
              <option value="25-34">25-34</option>  
              <option value="35-44">35-44</option>  
              <option value="45-59">45-59</option>  
              <option value="Above 60">Above 60</option>
            </select>
           </div>
          <div class="form-group">
            <label for="input-1">Client Gender</label>
            <select type="text" class="form-control" id="input-1" name="gender"  required>
              <option value="<?php echo $ClientGender?>"  disabled selected><?php echo $ClientGender?></option>
              <option value="Male">Male</option>  
              <option value="Female">Female</option>  
              <option value="Other">Other</option>
             </select>
             </div>
           <div class="form-group">
            <label for="input-2">Contact</label>
            <input type="text" class="form-control" name="ClientContact" id="input-2" value="<?php echo $ClientContact?>" placeholder="Client Contact" required>
           </div>
           <div class="form-group">
            <label for="input-2">WhatsApp</label>
            <input type="text" class="form-control" name="whatsapp" id="input-2" value="<?php echo $WhatsApp?>" placeholder="Client WhatsApp" required>
           </div>
                         <div class="form-group">
            <label for="input-5">Occupation</label>
            <input type="text" class="form-control" id="input-5" name="occupation" value="<?php echo $ClientOccupation?>"  placeholder="Client Occupation" required>
           </div>
                      <div class="form-group">
            <label for="input-5">Availability</label>
            <input type="date" class="form-control" id="input-5" name="Day" value="<?php echo $availability?>"  placeholder="Availability" required>
           </div>
            <div class="form-group">
            <label for="input-1">Birthday</label>
            <input type="text" class="form-control" id="input-5"value="<?php echo $Birthday?>"   name="Birthday" placeholder="Birthday" >
           </div>

           <div class="form-group">
            <label for="input-1">Facebook</label>
            <input type="text" class="form-control" name="facebook" id="input-1" value="<?php echo $facebook?>" placeholder="Client Facebook" >
           </div>
           <div class="form-group">
            <label for="input-2">Twitter</label>
            <input type="text" class="form-control" name="twitter" id="input-2" value="<?php echo $Twitter?>" placeholder="Client Twitter" >
           </div>
           <div class="form-group">
            <label for="input-2">Instagram</label>
            <input type="text" class="form-control" name="instagram" id="input-2" value="<?php echo $Instagram?>" placeholder="Client Instagram" >
           </div>
           <div class="form-group">
            <label for="input-1">Household Size</label>
            <input type="text" class="form-control" name="HouseholdSize" id="input-1" value="<?php echo $HouseholdSize?>" placeholder="Household Size" >
           </div>
           <div class="form-group">
            <label for="input-1">Teenagers</label>
            <input type="text" class="form-control" name="Teenagers" id="input-1" value="<?php echo $Teenagers?>" placeholder="Teenagers" >
           </div>
           <div class="form-group">
            <label for="input-2">Adults</label>
            <input type="text" class="form-control" name="Adults" id="input-2" value="<?php echo $Adults?>" placeholder="Adults" >
           </div>
           <div class="form-group">
            <label for="input-2">Children</label>
            <input type="text" class="form-control" name="Children" id="input-2" value="<?php echo $Children?>" placeholder="Children" >
           </div>
           <div class="form-group">
            <label for="input-1">Biz Name</label>
            <input type="text" class="form-control" name="BizName" id="input-1" value="<?php echo $Bizname?>" placeholder="Biz Name" >
           </div>
           <div class="form-group">
            <label for="input-2">Biz Cat</label>
            <input type="text" class="form-control" name="BizCat" id="input-2" value="<?php echo $Bizcat?>" placeholder="Biz Cat" >
           </div>
           <div class="form-group">
            <label for="input-2">Biz Dec</label>
            <input type="text" class="form-control" name="BizDec" id="input-2" value="<?php echo $Bizdec?>" placeholder="Biz Dec" >
           </div>
           <div class="form-group">
            <button type="submit" name="submit" class="btn btn-light px-5"><i class="icon-tick"></i> Submit</button>
          </div>
          </form>
         </div>
         </div>
         
      </div>

     <!--<div class="col-lg-6">
        <div class="card">
           <div class="card-body">
           <div class="card-title">Emails  <div class="form-outline">
          <input type="search" id="myInput" onkeyup="myFunction()"class="form-control" placeholder="Search by Name.." aria-label="Search" /></div>
           </div>
           <hr>
           <div class="card">
           
            <div class="card-body">
              <h5 class="card-title"></h5>
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
              <table class="table table-hover" id="myTable">
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
                  <tr>
                  <?php

                        /*  $sql="select * from empemails order by ID ASC";
                          $result=mysqli_query($connection,$sql);
                          if($result){
                          while($row=mysqli_fetch_assoc($result)){
                           $id=$row['ID'];   
                          $fname=$row['FirstName'];
                          $lname=$row['LastName'];
                          $email=$row['Email'];
                          $dpt=$row['Department'];
                          

                          echo ' <tr>
                          <td>'.$id.'</td>
                          <td>'.$fname.'</td>
                          <td>'.$lname.'</td>
                          <td>'.$email.'</td>
                          <td>'.$dpt.'</td>
                          
                          </tr>';

                       }
                         }*/
                       ?>
                  </tr>
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
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="../../assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../../assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../../assets/js/app-script.js"></script>
 
</body>
</html>
