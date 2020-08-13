<!doctype html>
<html lang="en" >
  <head>
    <title>Employee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo" style="text-align:center;">
                <a href="index.html">MECHA AUTOWORKS</a>
<?php 
session_start();

if(!$_SESSION['email'])
{
header("Location:Login.php");
}

 if (isset($_POST['logout'])) { 
	session_destroy(); 
	unset($_SESSION['email']); 
	header("location: ogin.php"); 
} ?>
<?php if (isset($_SESSION['email'])) : ?> 
			<p style="font-size: 20px;"class="text-success"> 
				Welcome 
				<strong> 
					<?php echo $_SESSION['email']; ?> 
				</strong>
				!! 
			</p> 
<?php endif ?>
     
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
		  <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="homeEm.php" class="nav-link">Back</a></li>
		     </ul>
              </nav>
         
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.5" style="background-color:#2F41C2">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
		   <form name="form_login" method="post" action="JobPortal.php" role="form">
   
	
      <div class="realestate-filter">
        <div class="container">
          <div class="realestate-filter-wrap nav">
           </div>
        </div>
      </div>
                 </div>
               </div>
             </div>
            <div  > <br><h3 style = "text-align:center;font-size:40px;">YOUR JOBS</h3>
 <?php
require_once "config.php";
$Email = $_SESSION['email'];
$result = mysqli_query($link,"SELECT * FROM job where Email = '$Email' ");
?>
 <?php
require_once "config.php";

if(isset($_POST['submit']))
{
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$_SESSION['bid'] = $checkbox[$i]; 
	}
}
?>


  <div><?php if(isset($message)) { echo $message; } ?>
</div>
<form method="post" action="JobPortal.php">
<table class="table table-bordered">
<thead>
<tr>
	<th><input type="checkbox" id="checkAl"> Select All</th>
    	<th>JobID</th>
	<th>No. Plate</th>	
		
	
</tr>
</thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
	 <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["Bookingid"]; ?>"></td>
   	<td><?php echo $row["Bookingid"]; ?></td>
	<td><?php echo $row["NoPlate"]; ?></td>
	<td> <button type="submit" class="btn btn-primary btn-lg" name="submit">OPEN<a href = "JobPortal.php" title=""></a></button></td>		
	</tr>
<?php
$i++;
}
?>
</table>

</form>
</div>
<div ><br>
  <h3 style = "text-align:center;font-size:40px;">COMPLETED JOBS</h3>
 <?php
require_once "config.php";
$Email = $_SESSION['email'];
$result = mysqli_query($link,"SELECT * FROM job where Email = '$Email' AND JobStatus ='Completed' ");
?>
 <?php
require_once "config.php";

if(isset($_POST['submit']))
{
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$_SESSION['bid'] = $checkbox[$i]; 
	}
}
?>


  <div><?php if(isset($message)) { echo $message; } ?>
</div>
<form method="post" action="jobPortal.php">
<table class="table table-bordered">
<thead>
<tr>
	<th>JobID</th>
	<th>No. Plate</th>	
		
	
</tr>
</thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
	<td><?php echo $row["Bookingid"]; ?></td>
	<td><?php echo $row["NoPlate"]; ?></td>
	</tr>
<?php
$i++;
}
?>
</table>

</form></div>
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>	
<script>
function pageRedirect(){
window.location.href="jobPortal.php";
}
</script>

             </div> 
      

           
        </div>
      </div>
    </form>


                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
    
    
   
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

