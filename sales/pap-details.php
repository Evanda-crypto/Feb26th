
<?php
include("../db/db.php");
include_once("salesloginsession.php");
?>

<?php
include("../db/db.php");
include_once("session.php");
if(isset($_POST['submit'])){
$DateSigned = $_POST['DateSigned'];
$ChampName = $_POST['ChampName'];
$BuildingName = $_POST['Buildingname'];
$BuildingCode = $_POST['BuildingCode'];
$Region = $_POST['Region'];
$Apt = $_POST['Apt'];
$AptLayout = $_POST['aptlayout'];
$Floor = $_POST['floor'];
$ClientName = $_POST['ClientName'];
$ClientAvailability = $_POST['Day'];
$ClientContact = $_POST['ClientContact'];
$ClientWhatsApp = $_POST['WhatsApp'];
$ClientGender = $_POST['gender'];
$ClientAge = $_POST['age'];
$ClientOccupation = $_POST['occupation'];
$HouseholdSize = $_POST['Householdsize'];
$Children = $_POST['Children'];
$Teenagers = $_POST['Teenagers'];
$Adults = $_POST['Adults'];
$Birthday = $_POST['Birthday'];
$Facebook = $_POST['facebook'];
$Instagram = $_POST['Instagram'];
$Twitter = $_POST['twitter'];
$BizName = $_POST['bizname'];
$BizCat = $_POST['bizcat'];
$BizDec = $_POST['bizdec'];
$Note = $_POST['Note'];





//checking if connection is not created successfully
if($connection->connect_error){
    die('connection failed : '.$connection->connect_error);
}
else{
    //Insert query
    $stmt= $connection->prepare("insert into papdailysales(DateSigned,ChampName,BuildingName,BuildingCode,Region,Apt,AptLayout,Floor,ClientName,ClientAvailability,ClientContact,
    ClientWhatsApp,ClientGender,ClientAge,ClientOccupation,HouseholdSize,Children,Teenagers,Adults,Birthday,Facebook,Instagram,Twitter,BizName,BizCat,BizDec,Note)
    values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
       //values from the fields
    $stmt->bind_param("sssssssssssssssssssssssssss",$DateSigned,$ChampName,$BuildingName,$BuildingCode,$Region,$Apt,$AptLayout,$Floor,$ClientName,$ClientAvailability,$ClientContact,
    $ClientWhatsApp,$ClientGender,$ClientAge,$ClientOccupation,$HouseholdSize,$Children,$Teenagers,$Adults,$Birthday,$Facebook,$Instagram,$Twitter,$BizName,$BizCat,$BizDec,$Note);
    $stmt->execute();
    echo "<script>alert('Successfull.');</script>";
    $stmt->close();
    $connection->close();
    #header("location: pap-details.php");
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
  <title>New PAP Signed</title>
  <!-- loader-->
  <link href="../assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
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
     <!--  <img src="../assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
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

     <!-- <li>
        <a href="icons.php">
          <i class="zmdi zmdi-invert-colors"></i> <span>UI Icons</span>
        </a>
      </li>-->

      <li>
        <a href="pap-details.php">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>PAP Daily Sales</span>
        </a>
      </li>

      <li>
        <a href="buildings.php">
          <i class="zmdi zmdi-grid"></i> <span>Buldings</span>
        </a>
      </li>

      <li>
        <a href="calendar.php">
          <i class="zmdi zmdi-calendar-check"></i> <span>Calendar</span>
          <small class="badge float-right badge-light"></small>
        </a>
      </li>

     <!-- <li>
        <a href="profile.php">
          <i class="zmdi zmdi-face"></i> <span>Profile</span>
        </a>
      </li>-->

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
            <h6 class="mt-2 user-title"><?php echo $_SESSION['FName'];?> <?php echo $_SESSION['LName'];?></h6>
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
      <div class="col-lg-6">
         <div class="card">
           <div class="card-body">
           <div class="card-title"> New PAP Signed</div>
           <hr>
            <form method="POST">
           <div class="form-group">
            <label for="input-1">Date Signed</label>
            <input type="date" class="form-control" id="input-1" name="DateSigned" placeholder="Date Signed">
           </div>
           <div class="form-group">
            <label for="input-1">Champs</label>
            <input type="text" class="form-control" id="input-1" name="ChampName" value="<?php echo $_SESSION['FName'];?>  <?php echo $_SESSION['LName'];?>" readonly>
           </div>
           <div class="form-group">
            <label for="input-1">Building Name</label>
            <input type="text" class="form-control" id="input-1" name="Buildingname" placeholder="Building Name">
           </div>
           <div class="form-group">
            <label for="input-1">Building Code</label>
            <input type="text" class="form-control" id="input-1" name="BuildingCode" placeholder="Building Code">
           </div>
           <div class="form-group">
            <label for="input-1">Region</label>
            <select type="text" class="form-control" id="input-1" name="Region" placeholder="Region">
              <option value=""> Select Region</option>
              <option value="G44">G44</option>
              <option value="G45S">G45S</option>
              <option value="G45N">G45N</option>
              <option value="ZMM">ZMM</option>
              <option value="R&M">R&M</option>
              <option value="Jacaranda">Jacaranda</option>
            </select>
           </div>
           <div class="form-group">
            <label for="input-1">Apt</label>
            <input type="text" class="form-control" id="input-1" name="Apt" placeholder="Apartment">
           </div>
           <div class="form-group">
            <label for="input-1">Apt Layout</label>
            <select type="text" class="form-control" id="input-1" name="aptlayout" placeholder="Enter Your Name">
              <option value=""> Select Layout</option>
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
            <label for="input-1">Floor</label>
            <input type="text" class="form-control" id="input-1" name="floor" placeholder="Floor">
           </div>
           <div class="form-group">
            <label for="input-2">Client Name</label>
            <input type="text" class="form-control" id="input-2" name="ClientName" placeholder="Client Name">
           </div>
           <div class="form-group">
            <label for="input-4">Client Contact</label>
            <input type="text" class="form-control" id="input-4" name="ClientContact" placeholder="Client Contact">
           </div>
           <div class="form-group">
            <label for="input-5">Client WhatsApp</label>
            <input type="text" class="form-control" id="input-5" name="WhatsApp" placeholder="Client WhatsApp">
           </div>
           <div class="form-group">
            <label for="input-1">Client Availability</label>
            <select type="text" class="form-control" id="input-1" name="Day">
              <option value=""> Select Day</option>
              <option value="Mon">Mon</option>
              <option value="Tue">Tue</option>
              <option value="Wed">Wed</option>
              <option value="Thu">Thu</option>
              <option value="Fri">Fri</option>
              <option value="sat">Sat</option>
              <option value="Sun">Sun</option>
            </select>
           </div>
          
           <div class="form-group">
            <label for="input-1">Client Age</label>
            <select type="text" class="form-control" id="input-1" name="gender" >
              <option value=""> Select Age</option>
              <option value="Male">Male</option>  
              <option value="Female">Female</option>  
              <option value="Other">Other</option>
             </select>
           <div class="form-group">
            <label for="input-1">Client Age</label>
            <select type="text" class="form-control" id="input-1" name="age">
              <option value=""> Select Age</option>
              <option value="Below 17">Below 17</option>  
              <option value="18-24">18-24</option>  
              <option value="25-34">25-34</option>  
              <option value="35-44">35-44</option>  
              <option value="45-59">45-59</option>  
              <option value="Above 60">Above 60</option>
            </select>
           </div>
           <div class="form-group">
            <label for="input-5">Client Occupation</label>
            <input type="text" class="form-control" id="input-5" name="occupation" placeholder="Client Occupation">
           </div>
           <var><var><div class="form-group">
            <label for="input-3">Household Size</label>
            <input type="text" class="form-control" id="input-3" name="Householdsize" placeholder="Household Size">
           </div>
           <div class="form-group">
            <label for="input-4">Children</label>
            <input type="text" class="form-control" id="input-4" name="Children" placeholder="Children">
           </div>
           <div class="form-group">
            <label for="input-5">Teenagers</label>
            <input type="text" class="form-control" id="input-5" name="Teenagers" placeholder="Teenagers">
           </div>
           <div class="form-group">
            <label for="input-4">Adults</label>
            <input type="text" class="form-control" id="input-4" name="Adults" placeholder="Adults">
           </div>
           <div class="form-group">
            <label for="input-1">Birthday</label>
            <input type="text" class="form-control" id="input-5" name="Birthday" placeholder="Birtday">
           </div>
           <div class="form-group">
            <label for="input-4">Facebook</label>
            <input type="text" class="form-control" id="input-4" name="facebook" placeholder="Facebook">
           </div>
           <div class="form-group">
            <label for="input-5">Instagram</label>
            <input type="text" class="form-control" id="input-5" name="Instagram" placeholder="Instagram">
           </div>
           <div class="form-group">
            <label for="input-5">Twitter</label>
            <input type="text" class="form-control" id="input-5" name="twitter" placeholder="Twitter">
           </div>
           <div class="form-group">
            <label for="input-5">Biz Name</label>
            <input type="text" class="form-control" id="input-5" name="bizname" placeholder="Biz Name">
           </div>
           <div class="form-group">
            <label for="input-5">Biz Category</label>
            <input type="text" class="form-control" id="input-5" name="bizcat" placeholder="Biz Category">
           </div>
           <div class="form-group">
            <label for="input-5">Biz Description</label>
            <input type="text" class="form-control" id="input-5" name="bizdec" placeholder="Biz Description">
           </div>
           <div class="form-group">
            <label for="input-5">Note</label>
            <input type="text" class="form-control" id="input-5" name="Note" placeholder="Note">
           </div></var></var>
           <div class="form-group">
            <button type="submit" name="submit" class="btn btn-light px-5"><i class="icon-check"></i> Submit</button>
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
	
	<!--Start footer-->
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
 document.getElementById("input-5").setAttribute("max",maxdate);
 </script>
</body>
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
 document.getElementById("input-1").setAttribute("max",maxdate);
 </script> 
</html>
