<?php
include('../db/db.php');
include_once("session.php");
include_once("sidebar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Restituted | Pap</title>
  <!-- loader--
  <link href="../assets/css/pace.min.css" rel="stylesheet"/>
  <script src="../assets/js/pace.min.js"></script>-->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- Bootstrap core JavaScript-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Page level plugin JavaScript--><script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

  <!--favicon-->

  <link rel="icon" href="../assets/favicon.png" type="image/x-icon">
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
            <p class="user-subtitle"><?php echo $_SESSION['Admin']?></p>
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

<div class="clearfix"> </div>
	
  <div class="content-wrapper">
    <div class="container-fluid">
     
      <div class="row mt-3">
          <div class="card">
            <div class="card-body"> 
            <center>  <h5 class="card-title">RESTITUTED PAP</h5></center>
			  <div class="table-responsive">
        <table class="table" id="example">
                  <thead>
                    <tr>
                    <th>No</th>
                     <th>Client Name</th>
                     <th>Contact</th>
                     <th>Building Name</th>
                     <th>BuildingCode</th>
                     <th>ChampName</th>
                     <th>Region</th>
                     <th>Techie 1</th>
                     <th>Techie 2</th>
                    <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>

 <?php
                        $query  = "SELECT ClientID,ClientName,BuildingName,BuildingCode,Region,Floor,DateSigned,Reason,Contact,ChampName,Techie1,Techie2 from papnotinstalled  order by DateSigned Desc";
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
                                    <th><?php echo $row['ChampName']; ?></th>
                                    <th><?php echo $row['Region']; ?></th>
                                    <th><?php echo $row['Techie1']; ?></th>
                                    <th><?php echo $row['Techie2']; ?></th>
                                    <th><?php echo $row['Reason']; ?></th>
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


        </div>
      </div><!--End Row-->
	  
	  <!--start overlay-->
		  <div class="overlay toggle-menu"> </div>
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
          Copyright ?? Konnect 2022
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
  <script src="../assets/js/popper.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
	
  <!-- simplebar js -->
  <script src="../assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="../assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="../assets/js/app-script.js"></script>

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
