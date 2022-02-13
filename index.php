<?php

include("db/db.php");
if(isset($_POST['submit'])){
    session_start();
    $EMAIL= trim($_POST['Username']);
    $Password= trim($_POST['Password']);

    if(!$connection){
        echo "<script>alert('There is no connection at this time.Please try again later.');</script>";
        echo '<script>window.location.href="login.php";</script>';
    }
    else{
        $stmt= $connection->prepare("select * from employees where EMAIL= ?");
        $stmt->bind_param("s",$EMAIL);
        $stmt->execute();
        $stmt_result= $stmt->get_result();
        if($stmt_result->num_rows>0){
            $data= $stmt_result->fetch_assoc();
            if($data['DEPARTMENT']=="Nats" || $data['DEPARTMENT']=="Executive"){
                if(password_verify($Password, $data['PASSWORD'])){
                    $_SESSION['Admin'] = true;
                    $_SESSION['start'] = time();
                    $_SESSION['expire'] = $_SESSION['start'] + (40 * 60);
                    $_SESSION['Admin']=$EMAIL;
                    $_SESSION['FName']=$data['FIRST_NAME'];
                    $_SESSION['LName']=$data['LAST_NAME'];
                    $_SESSION['ID']=$data['ID'];
                    header("Location: admin/dashboard.php");
                }
                else{
                    echo "<script>alert('Wrong Password.');</script>";
                    echo '<script>window.location.href="login.php";</script>';
                    }

            }
            else if($data['DEPARTMENT']=="Sales"){
                if(password_verify($Password, $data['PASSWORD'])){
                    $_SESSION['Sales']=$EMAIL;
                    $_SESSION['FName']=$data['FIRST_NAME'];
                    $_SESSION['LName']=$data['LAST_NAME'];
                    $_SESSION['ID']=$data['ID'];
                    header("Location: sales/SalesDashboard.php");
                }
                else{
                    echo "<script>alert('Wrong Password.');</script>";
                     echo '<script>window.location.href="login.php";</script>';
                }

            }
            else if($data['DEPARTMENT']=="Techie" && $data['Region']!="admin"){
                $query= $connection->prepare("select employees.ID,employees.FIRST_NAME,employees.LAST_NAME,employees.EMAIL,employees.DEPARTMENT,employees.PASSWORD,techieteams.Team_ID from employees LEFT join techieteams ON techieteams.Email1=employees.EMAIL OR techieteams.Email2=employees.EMAIL WHERE techieteams.Team_ID is not null AND Email= ?");
                $query->bind_param("s",$EMAIL);
                $query->execute();
                $query_result= $query->get_result();
                if($query_result->num_rows>0){
                    $row= $query_result->fetch_assoc();
                    if(password_verify($Password, $row['PASSWORD'])){
                        $_SESSION['Techie']=$EMAIL;
                        $_SESSION['FName']=$data['FIRST_NAME'];
                        $_SESSION['LName']=$data['LAST_NAME'];
                        $_SESSION['TeamID']=$row['Team_ID'];
                        $_SESSION['ID']=$data['ID'];
                        header("Location: techie/TechieDashboard.php");
                    }
                    else{
                        echo "<script>alert('Wrong Password.');</script>";
                        echo '<script>window.location.href="login.php";</script>';
                    }
            }
        }
        else{
            $result= $connection->prepare("select * from teamleaders where EMAIL= ?");
            $result->bind_param("s",$EMAIL);
            $result->execute();
            $result_result= $result->get_result();
            if($result_result->num_rows>0){
                $info= $result_result->fetch_assoc();
                if(password_verify($Password, $data['PASSWORD']) && $data['DEPARTMENT']=='TechieTL'){
                    $_SESSION['teamleader']=$EMAIL;
                    $_SESSION['FName']=$data['FIRST_NAME'];
                    $_SESSION['LName']=$data['LAST_NAME'];
                    $_SESSION['ID']=$data['ID'];
                    $_SESSION['Region']=$info['REGION'];
                    header("Location: teamleaders/techie/dashboard.php");
                }
                else if(password_verify($Password, $data['PASSWORD']) && $data['DEPARTMENT']=='SalesTL'){
                    $_SESSION['FName']=$data['FIRST_NAME'];
                    $_SESSION['LName']=$data['LAST_NAME'];
                    $_SESSION['Sales']=$EMAIL;
                    $_SESSION['ID']=$data['ID'];
                    $_SESSION['Region']=$info['REGION'];
                    header('Location: teamleaders/sales/dashboard.php ');
                }
                else{
                    echo "<script>alert('Wrong Password.');</script>";
                    echo '<script>window.location.href="login.php";</script>';
                }
            }
        }
        }
        else{
            echo "<script>alert('No Records.');</script>";
            echo '<script>window.location.href="login.php";</script>';
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
  <title>K.O.M.P</title>
  <!-- loader--
  <link href=" assets/css/pace.min.css" rel="stylesheet"/>
  <script src=" assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/favicon.png" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href=" assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href=" assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS--
  <link href=" assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href=" assets/css/app-style.css" rel="stylesheet"/>
 
</head>

<body >

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body" >
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="assets/login-logo2.png" alt="logo icon" style="height:60%; width: 100%; corner-radius:2px;">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3"></div>
		    <form method="POST" autocomplete="off" style="background-image: url('assets/login-logo.png');">
			  <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">Username</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputUsername" class="form-control input-shadow" name="Username" placeholder="Enter Username">
				  <div class="form-control-position">
					 
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="exampleInputPassword" name="Password" class="form-control input-shadow" placeholder="Enter Password">
				  <div class="form-control-position">
					  
				  </div>
			   </div>
			  </div>
			<div class="form-row">
			 <div class="form-group col-6">
			   <div class="icheck-material-white">
                <input type="checkbox" id="user-checkbox" checked="" />
                <label for="user-checkbox">Remember me</label>
			  </div>
			 </div>
			</div>
			 <button type="submit" name="submit" class="btn btn-light btn-block">Sign In</button>

			 
			 </form>
		   </div>
		  </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
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
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript--
  <script src=" assets/js/jquery.min.js"></script>
  <script src=" assets/js/popper.min.js"></script>
  <script src=" assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src=" assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src=" assets/js/app-script.js"></script>
  
</body>
</html>
