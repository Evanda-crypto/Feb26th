<!DOCTYPE html>
<html>
  <head><title>KONNECT CMS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link rel="icon" href="assets/favicon.png" type="image/x-icon">
<style>
.carousel-item {
    height: 65vh;
    min-height: 350px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: orange;
   color: white;
   text-align: center;
}
#mainNavbar {
    padding-left: 50px;
    padding-top: 20px;
    overflow: hidden;
  background-color:grey;
}

.navbar-dark .navbar-brand {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar-nav .nav-link {
  font-family: Arial, Helvetica, sans-serif;
}

.display-4 {
  font-family: Arial, Helvetica, sans-serif;
}
.lead {
  font-family: Arial, Helvetica, sans-serif;
}
.navbar.scrolled {
    background: rgb(34, 31, 31);
    transition: background 500ms;
}

.font-weight-light {
  font-family: Arial, Helvetica, sans-serif;
}
.nav-link, .nav-item  {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 10px 14px;
  text-decoration: none;
  font-size:15px;
}
</style>
</head>
<body>
<nav id="mainNavbar" class="navbar navbar-dark navbar-expand-md py-0 fixed-top"> <a href="#" class="navbar-brand"><img style="height:60px; width: 100px; margin-top:0.1px;" src="assets/logo.png"></a> <button style="color:black;" class="navbar-toggler" data-toggle="collapse" data-target="#navLinks"> <span  class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navLinks">
        <ul class="navbar-nav">
            <li class="nav-item"> <a style="color: black;" href="admin/login.php" class="navbar-brand">ADMIN</a> </li>
            <li class="nav-item"> <a style="color: black;" href="teamleaders/techie/login.php" class="navbar-brand">TEAM LEADERS</a> </li>
            <li class="nav-item"> <a style="color: black;" href="techie/login.php" class="navbar-brand">INSTALLATION </a></li>
            <li class="nav-item"> <a style="color: black;" href="sales/login.php"class="navbar-brand">SALES</a></li>   
           <!-- <li class="nav-item"> <a style="color: black;" href="users/action.php"class="navbar-brand">image</a></li>
            <li class="nav-item"> <a style="color: black;" href="users/test.php"class="navbar-brand">test</a></li> 
            <li class="nav-item"> <a style="color: black;" href="users/table.php"class="navbar-brand">test</a></li> -->                                                                                                                                                                                                                                                    
</div>
    </div>
</nav>
<header>
    <div id="indicators" class="carousel slide" data-ride="carousel" style="">
        <ol class="carousel-indicators">
            <li data-target="#indicators" data-slide-to="0" class="active"></li>
            <li data-target="#indicators" data-slide-to="1"></li>
            <li data-target="#indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('assets/techie.png')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">Techies</h3>
                    <p class="lead">Reliable Expertise who work to ensure safety installation strategies are Implemented.</p>
                </div>
            </div> <!-- Slide Two - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('assets/sales.png')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">Champs</h3>
                    <p class="lead">Committed to offer our customers all the informaton required to be part of Konnect family.</p>
                </div>
            </div> <!-- Slide Three - Set the background image for this slide in the line below -->
            <div class="carousel-item" style="background-image: url('assets/ahadi.png')">
                <div class="carousel-caption d-none d-md-block">
                    <h3 class="display-4">Our Company</h3>
                    <p class="lead">Committed to work round the clock to ensure fast affordabled Internet connection to our customers.</p>
                </div>
            </div>
        </div> <a class="carousel-control-prev" href="#indicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#indicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div>
</header>
<!-- Page Content -->
<section class="py-5">
    <div class="container">
         <h1 class="font-weight-light">Objectives</h1>
        <p class="lead">Our main obective is to ensure provision of affordable Internet Services to our customers.</p>
        <p class="lead"></p>
    </div>
</section>
  <div class="footer">
  <p>&copy; Konnect 2022</p>
   </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script>
    $(function() {
        $(document).scroll(function() {
            var $nav = $("#mainNavbar");
            $nav.toggleClass("scrolled", $(this).scrollTop() > $nav.height());
        });
    });
</script>
<script>
  jQuery(document).ready(function() {
 // executes when HTML-Document is loaded and DOM is read
  
  jQuery('.btn[href^=#]').click(function(e){
    e.preventDefault();
    var href = jQuery(this).attr('href');
    jQuery(href).modal('toggle');
  });
});  
</script>
</html>
