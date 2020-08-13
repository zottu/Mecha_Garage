<!doctype html>
<html lang="en">
<?php 
error_reporting(0);
session_start();
if(!$_SESSION['email'])
{
header("Location:login.php");
}
if (isset($_POST['logout'])) { 
	session_destroy(); 
	unset($_SESSION['email']); 
	header("location: Login.php"); 
} 

?>
 
  <head>
    <title>REGISTER</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<script>
function pageRedirect(){
window.location.href="CancelBooking.php";
}function pageRedirect1(){
window.location.href="MoreDetails.php";
}
</script>
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
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>
		  <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="homeCus.php" class="nav-link">Back</a></li>
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
		  <form name="form_login" method="post" action="MoreDetails.php" role="form">
   
      	<div class="realestate-filter">
        	<div class="container">
       	   <div class="realestate-filter-wrap nav">
        	   </div>
       	 </div>
      		</div>
      
        
             <div>
		 </div>
               </div>
             </div><div  >
 <div class="form-group"><br><label  style = "text-align:left;font-size:40px;">BOOKINGS </label>
	 <input type="button" class="btn btn-primary btn-lg" onClick="pageRedirect()" value="CANCEL BOOKING"></div>

 <?php
require_once "config.php";

if(isset($_POST['submit']))
{
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$_SESSION['bid'] = $checkbox[$i]; 
	}
}
$mail = $_SESSION['email'];
$result = mysqli_query($link,"SELECT * FROM job where cmail = '$mail'");
?>



  <div><?php if(isset($message)) { echo $message; } ?>
</div>

<form method="post" action="MoreDetails.php">
<table class="table table-bordered" style="text-align:center;">
<thead>
<tr>
    <th style="text-align:center;"><input type="checkbox" id="checkAl"> Select All</th>
	<th style="text-align:center;">Booking ID</th>
	<th style="text-align:center;">No. Plate</th>	
	<th  style="text-align:center;">CarType</th>
	<th  style="text-align:center;">Job Status</th>
	<th style="text-align:center;">More Details</th>	
	
</tr>
</thead>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {

?>
<tr>
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["Bookingid"]; ?>"></td>
	<td><?php echo $row["Bookingid"]; ?><?php $_SESSION['bid']=$row["Bookingid"];?></td>
	<td><?php echo $row["NoPlate"]; ?></td>
	<td><?php echo $row["CarType"]; ?></td>
	<td><?php echo $row["JobStatus"]; ?></td>
	<td> <button type="submit" class="btn btn-primary btn-lg" name="submit">OPEN<a href = "MoreDetails.php" title=""></a></button></td>		
	</tr>
<?php
$i++;
}
?>
</table></div>
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
<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
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
    
    
   

  </body>

</html>

