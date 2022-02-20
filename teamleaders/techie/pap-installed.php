<?php
include('../../db/db.php');
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
  <title>Pap | Installed</title>
  <!-- loader--
  <link href="../../assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../../assets/js/pace.min.js"></script>-->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

  <!--favicon-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" integrity="sha512-PgQMlq+nqFLV4ylk1gwUOgm6CtIIXkKwaIHp/PAIWHzig/lKZSEGKEysh0TCVbHJXCLN7WetD8TFecIky75ZfQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
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
     <li>
        <a href="restituted.php">
          <i class="zmdi zmdi-alert-triangle"></i> <span>Restituted Pap</span>
        </a>
      </li>
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
      <div class="row mt-3">
<div class="col-12 col-lg-8 col-xl-12">

          <div class="card">
            <div class="card-body"> 
            <center>  <h5 class="card-title">PAP DAILY INSTALLATION</h5></center>
			  <div class="table-responsive">
               <table class="table" id="example">
                  <thead>
                    <tr>
                    <th>Client ID</th>
                    <th>Client Name</th>
                   <th>Contact</th>
                  <th>Building Name</th>
                   <th>Team ID</th>
                    <th>Techie 1</th>
                    <th>Techie 2</th>
                    <th>Mac Address</th>
                    <th>Date Installed</th>
                   <th>More</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
    
    $sql="SELECT papdailysales.ClientName,papdailysales.BuildingName,papdailysales.ClientContact,papinstalled.ClientID,techieteams.Team_ID,techieteams.Techie_1,techieteams.Techie_2,Upper(papinstalled.MacAddress) as Mac,papinstalled.DateInstalled,papinstalled.ClientID 
    FROM techieteams LEFT JOIN papinstalled on techieteams.Team_ID=papinstalled.Team_ID left join turnedonpap on papinstalled.ClientID=turnedonpap.ClientID left join papdailysales on papdailysales.ClientID=papinstalled.ClientID WHERE papinstalled.ClientID is NOT null and turnedonpap.ClientID is null and papinstalled.Region='".$_SESSION['Region']."' ORDER BY papinstalled.DateInstalled ASC";
$result=$connection->query($sql);
while($row=$result->fetch_array()){
  ?>
  <tr>
    <td><?php echo $row['ClientID']?></td>
    <td><?php echo $row['ClientName']?></td>
    <td><?php echo $row['ClientContact']?></td>
   <td><?php echo $row['BuildingName']?></td>
    <td><?php echo $row['Team_ID']?></td>
    <td><?php echo $row['Techie_1']?></td>
    <td><?php echo $row['Techie_2']?></td>
    <td><?php echo $row['Mac']?></td>
    <td><?php echo $row['DateInstalled']?></td>
    <td>
    <a href="edit-pap.php?clientid=<?php echo $row['ClientID']; ?>"><i class="fas fa-edit"></i></a>
    </td>
</tr>
<?php } ?>
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
	
	<!--Start footer-->
	<!--<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © Konnect 2022
        </div>
      </div>
    </footer>-->
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
  <script src="../../assets/js/popper.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="../../assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../../assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../../assets/js/app-script.js"></script>
  <script >
		$(document).ready(function () {
    // Setup - add a text input to each footer cell
    $('#example thead tr')
        .clone(true)
        .addClass('filters')
        .appendTo('#example thead');
 
    var table = $('#example').DataTable({
        orderCellsTop: true,
        fixedHeader: true,
        initComplete: function () {
            var api = this.api();
 
            // For each column
            api
                .columns()
                .eq(0)
                .each(function (colIdx) {
                    // Set the header cell to contain the input element
                    var cell = $('.filters th').eq(
                        $(api.column(colIdx).header()).index()
                    );
                    var title = $(cell).text();
                    $(cell).html('<input type="text" class="form-control col-lg-12 " placeholder="' + title + '" />');
 
                    // On every keypress in this input
                    $(
                        'input',
                        $('.filters th').eq($(api.column(colIdx).header()).index())
                    )
                        .off('keyup change')
                        .on('keyup change', function (e) {
                            e.stopPropagation();
 
                            // Get the search value
                            $(this).attr('title', $(this).val());
                            var regexr = '({search})'; //$(this).parents('th').find('select').val();
 
                            var cursorPosition = this.selectionStart;
                            // Search the column for that value
                            api
                                .column(colIdx)
                                .search(
                                    this.value != ''
                                        ? regexr.replace('{search}', '(((' + this.value + ')))')
                                        : '',
                                    this.value != '',
                                    this.value == ''
                                )
                                .draw();
 
                            $(this)
                                .focus()[0]
                                .setSelectionRange(cursorPosition, cursorPosition);
                        });
                });
        },
    });
});
	</script>
</body>

</html>
