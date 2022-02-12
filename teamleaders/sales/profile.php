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
  <title>Profile</title>
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
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
      <a href="dashboard.php">
       <img src="../../assets/logo.png" style="width: 100px; height: 70px;" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">   </h5>
     </a>
   </div>
  <ul class="sidebar-menu do-nicescrol">
     <li class="sidebar-header">MAIN NAVIGATION</li>
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
        <a href="pap-restituted.php">
          <i class="zmdi zmdi-alert-triangle"></i> <span>Pap restituted</span>
        </a>
      </li>
<li  style="margin-left:5%">
        <a href="pap-turnedon.php">
          <i class="zmdi zmdi-grid"></i> <span>Pap turnedon</span>
        </a>
      </li>

    <li style="margin-left:5%">
       <a href="profile.php" >
         <i class="zmdi zmdi-face"></i> <span>Profile</span>
       </a>
     </li>

    <!-- <li>
       <a href="login.php" target="_blank">
         <i class="zmdi zmdi-lock"></i> <span>Login</span>
       </a>
     </li>-->

      <li style="margin-left:5%">
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
           <h6 class="mt-2 user-title"><?php echo $_SESSION['FName'];?>  <?php echo $_SESSION['LName'];?></h6>
           <p class="user-subtitle"><?php echo $_SESSION['Sales'];?></p>
           </div>
          </div>
         </a>
       </li>
       <li class="dropdown-divider"></li>
       <li class="dropdown-item"><i class="icon-power mr-2">  <a href="#" target="_blank"></i> Logout</li>
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
           <!--<div class="card profile-card-2">
            <div class="card-img-block">
                <img class="img-fluid" src="https://via.placeholder.com/800x500" alt="Card image cap">
            </div>
            <div class="card-body pt-5">
                <img src="https://via.placeholder.com/110x110" alt="profile-image" class="profile">
                <h5 class="card-title">Mark Stern</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <div class="icon-block">
                  <a href="javascript:void();"><i class="fa fa-facebook bg-facebook text-white"></i></a>
				  <a href="javascript:void();"> <i class="fa fa-twitter bg-twitter text-white"></i></a>
				  <a href="javascript:void();"> <i class="fa fa-google-plus bg-google-plus text-white"></i></a>
                </div>
            </div>

            <div class="card-body border-top border-light">
                 <div class="media align-items-center">
                   <div>
                       <img src="../assets/images/timeline/html5.svg" class="skill-img" alt="skill img">
                   </div>
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
                         <p>HTML5 <span class="float-right">65%</span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:65%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                  <hr>
                  <div class="media align-items-center">
                   <div><img src="../assets/images/timeline/bootstrap-4.svg" class="skill-img" alt="skill img"></div>
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
                         <p>Bootstrap 4 <span class="float-right">50%</span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:50%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                   <hr>
                  <div class="media align-items-center">
                   <div><img src="../assets/images/timeline/angular-icon.svg" class="skill-img" alt="skill img"></div>
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
                         <p>AngularJS <span class="float-right">70%</span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:70%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                    <hr>
                  <div class="media align-items-center">
                   <div><img src="../assets/images/timeline/react.svg" class="skill-img" alt="skill img"></div>
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
                         <p>React JS <span class="float-right">35%</span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:35%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                  
              </div>
        </div>-->

        </div>

        <div class="col-lg-8">
           <div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link "><i class="icon-"></i> <span class="hidden-xs"></span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#messages" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                </li>
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-"></i> <span class="hidden-xs"></span></a>
                </li>
            </ul>
            <div class="tab-content p-3">
                <div class="tab-pane active" id="profile">
                   <!-- <h5 class="mb-3">User Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>About</h6>
                            <p>
                                Web Designer, UI/UX Engineer
                            </p>
                            <h6>Hobbies</h6>
                            <p>
                                Indie music, skiing and hiking. I love the great outdoors.
                            </p>
                        </div>
                       <!-- <div class="col-md-6">
                            <h6>Recent badges</h6>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">html5</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">react</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">codeply</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">angularjs</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">css3</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">jquery</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">bootstrap</a>
                            <a href="javascript:void();" class="badge badge-dark badge-pill">responsive-design</a>
                            <hr>
                            <span class="badge badge-primary"><i class="fa fa-user"></i> 900 Followers</span>
                            <span class="badge badge-success"><i class="fa fa-cog"></i> 43 Forks</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i> 245 Views</span>
                        </div>-->
                        <div class="col-md-12">
                        <!-- <h5 class="mt-2 mb-3"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>-->
                             <!--<div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Gary</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Kensington</strong> deleted MyBoard3 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>John</strong> deleted My Board1 in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Skell</strong> deleted his post Look at Why this is.. in <strong>`Discussions`</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>-->
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <!--<div class="tab-pane" id="messages">
                    <div class="alert alert-info alert-dismissible" role="alert">
				   <button type="button" class="close" data-dismiss="alert">&times;</button>
				    <div class="alert-icon">
					 <i class="icon-info"></i>
				    </div>
				    <div class="alert-message">
				      <span><strong>Info!</strong> Lorem Ipsum is simply dummy text.</span>
				    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <tbody>                                    
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix for tibulum tincidunt ullamcorper eros. 
                                </td>
                            </tr>
                        </tbody> 
                    </table>
                  </div>
                </div>-->
                <div class="tab-pane" id="edit">
                    <form method="post" action="reset-pass.php">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $_SESSION['FName'];?> " readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value=" <?php echo $_SESSION['LName'];?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value=" <?php echo $_SESSION['Sales'];?>" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" id="exampleInputNam" onkeyup="check();" name="password" type="password" placeholder="Password" required>
                            </div>
                        </div>
                        <center> <span style="font-family: Georgia;" id='message'> </span></center> </br>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control"  id="exampleInputPassword" onkeyup="check();"  type="password" placeholder=" Confirm Password" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                            <button name="submit" class="btn btn-primary">Reset Password</button>
                              
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
      </div>
        
    </div>

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
       var check = function (){
        if(document.getElementById('exampleInputNam').value==
        document.getElementById('exampleInputPassword').value){
          document.getElementById('message').style.color='black';
          document.getElementById('message').innerHTML='Password matching';
          document.getElementById('submit').disable=false;
        }
        else{
          document.getElementById('message').style.color='red';
          document.getElementById('message').innerHTML='Password not matching!!';
          document.getElementById('submit').disable=true;
        }

        $('#exampleInputNam').on('blur', function(){
    if($(this).val().length > 6){
      document.getElementById('message1').style.color='green';
          document.getElementById('message1').innerHTML='Strong pass';
          document.getElementById('submit').disable=false;
    }
    else{
          document.getElementById('message1').style.color='red';
          document.getElementById('message1').innerHTML='Weak pass!!';
          document.getElementById('submit').disable=true;
        }
});
      }


    </script>
</body>
</html>