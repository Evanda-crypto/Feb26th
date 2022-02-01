<?php
include("../db/db.php");
if(isset($_POST['submit'])){
$FIRST_NAME=$_POST['FName'];
$LAST_NAME=$_POST['LName'];
$EMAIL = $_POST['Email'];
$GENDER = $_POST['gender'];
$AGE = $_POST['age'];
$DEPARTMENT = $_POST['dpt'];
$RESIDENCE = $_POST['res'];
$PASSWORD = $_POST['password'];

$hashpass= password_hash($PASSWORD, PASSWORD_DEFAULT);



//checking if connection is not created successfully
if($connection->connect_error){
    die('connection failed : '.$connection->connect_error);
}
else
{ 
    $stmt= $connection->prepare("select * from empemails where Email= ? and Department= ?");
    $stmt->bind_param("ss",$EMAIL,$DEPARTMENT);
    $stmt->execute();
    $stmt_result= $stmt->get_result();
    if($stmt_result->num_rows>0){
        
         $stmt= $connection->prepare("insert into employees (FIRST_NAME,LAST_NAME,EMAIl,DEPARTMENT,RESIDENCE,PASSWORD,GENDER,AGE)
         values(?,?,?,?,?,?,?,?)");
         //values from the fields
         $stmt->bind_param("ssssssss",$FIRST_NAME,$LAST_NAME,$EMAIL,$DEPARTMENT,$RESIDENCE,$hashpass,$GENDER,$AGE);
         $stmt->execute();
         echo "<script>alert('Registration successfull.Now you can login');</script>";
          echo '<script>window.location.href="../index.php";</script>';
         $stmt->close();
         $connection->close();
    }
    else{
        echo "<script>alert('No matching records.Ensure email and department are correct.');</script>";
         echo '<script>window.location.href="register.php";</script>';
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
  <title>Sign | Up</title>
  <!-- loader--
  <link href="../assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="../assets/favicon.png" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="../assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="../assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="../assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme11">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

	<div class="card card-authentication1 mx-auto my-4">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 	<!--	<img src="../assets/logo.png" alt="logo icon">-->
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign Up</div>
		    <form method="POST" autocomplete="off">
			  <div class="form-group">
			  <label for="exampleInputName" class="sr-only">First Name</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputName" class="form-control input-shadow" name="FName" placeholder="First Name" required>
				  <div class="form-control-position">
					
				  </div>
			   </div>
			  </div>
        <div class="form-group">
			  <label for="exampleInputName" class="sr-only">Last Name</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputName" class="form-control input-shadow" name="LName" placeholder="Last Name" required>
				  <div class="form-control-position">
				
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputEmailId" class="sr-only">Email ID</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputEmailId" class="form-control input-shadow" name="Email" placeholder="Email ID" required>
				  <div class="form-control-position">
				
				  </div>
			   </div>
			  </div>
        <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">Gender</label>
			   <div class="position-relative has-icon-right">
				  <select type="text" id="input-1" class="form-control input-shadow" name="gender" required>
                  <option value="" disabled selected>Select Gender</option>
                   <option value="Male">Male</option>
                   <option value="Female">Female</option>
                   <option value="Other">Other</option>
                  </select>
			   </div>
			  </div>
        <div class="form-group">
			  <label for="exampleInputName" class="sr-only">Age</label>
			   <div class="position-relative has-icon-right">
				  <input type="number" id="exampleInputName" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==2) return false;" class="form-control input-shadow" name="age" placeholder="Age" required>
				  <div class="form-control-position">
					 
				  </div>
			   </div>
			  </div>
        <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">Department</label>
			   <div class="position-relative has-icon-right">
				  <select type="text" id="input-1" class="form-control input-shadow" name="dpt" required>
                  <option value="" disabled selected>Select Department</option>
                   <option value="Sales">Sales</option>
                   <option value="Techie">Techie</option>
                  </select>
			   </div>
			  </div>
        <div class="form-group">
			  <label for="exampleInputName" class="sr-only">Community</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputName" class="form-control input-shadow" name="res" placeholder="Community" required>
				  <div class="form-control-position">
				
				  </div>
			   </div>
			  </div>
        <div class="form-group">
			  <label for="exampleInputName" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="exampleInputNam" onkeyup="check();" name="password" class="form-control input-shadow" placeholder="Password" required>
				  <div class="form-control-position">
					  
				  </div>
			   </div>
			  </div>
        <center> <span style="font-family: Georgia;" id='message1'> </span></center> </br>
			  <div class="form-group">
			   <label for="exampleInputPassword" class="sr-only">CPassword</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" id="exampleInputPassword" onkeyup="check();" class="form-control input-shadow" placeholder="Confirm Password" required>
				  <div class="form-control-position">
					
				  </div>
			   </div>
			  </div>
        <center> <span style="font-family: Georgia;" id='message'> </span></center> </br>
        <button type="submit" id="submit" name="submit" class="btn btn-light btn-block">Sign Up</button>
			 </form>
		   </div>
		  </div>

      
		  <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0"><a href="../index.php">Home</a></p>
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
	
  <!-- Bootstrap core JavaScript-->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="../assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../assets/js/app-script.js"></script>
  
</body>
  <script>
       var check = function (){
        if(document.getElementById('exampleInputNam').value==
        document.getElementById('exampleInputPassword').value){
          document.getElementById('message').style.color='green';
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
</html>
