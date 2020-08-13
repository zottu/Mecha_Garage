<!doctype html>
<html lang="en" >

  <head>
    <title>ADMIN</title>
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
<script>
function pageRedirect1(){
window.location.href="AddJob.php";
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
                  <li class="active"><a href="homeAd.php" class="nav-link">Back</a></li>
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
		   <form name="form_login" method="post" action="Jobs.php" role="form">
   
	
      <div class="realestate-filter">
        <div class="container">
          <div class="realestate-filter-wrap nav">
           </div>
        </div>
      </div>
      
                       </div>
             </div>
            

           
        </div>
           	 <div  ><br><div class="form-group"><br>
	<label  style = "text-align:left;font-size:40px;">JOBS </label>
	<button type="submit" class="btn btn-primary btn-lg" name="save">DELETE</button>
			<button type="submit" class="btn btn-primary btn-lg" name="submit"/>ASSIGN</button>
	  <input type="button" class="btn btn-primary btn-lg" onClick="pageRedirect1()" value="ADD">
		<div  class="col-md-4 form-group" >
                    <input type="text" name="sdate" id = "sdate" class="form-control datepicker" placeholder="startDate" autocomplete="off">
		</div><div  class="col-md-4 form-group" >
                    <input type="text" name="edate" id = "edate" class="form-control datepicker" placeholder="endDate" autocomplete="off">
		</div><button type="submit" class="btn btn-primary btn-lg" name="Save">Apply</button>

		</div>
    <?php
require_once "config.php";
if(isset($_POST['save'])){
	if(isset($_POST['check'])){
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$del_id = $checkbox[$i]; 
	mysqli_query($link,"DELETE FROM job WHERE Bookingid='".$del_id."'");?>
	<div class = "alert alert-success"style="text-align:center;"><strong>Data deleted successfully !<strong></div>
	<?php }}else{?><div class = "alert alert-info" style="text-align:center;"><strong>Please select checkbox!<strong></div>
	
<?php }
}
?>
  <div><?php if(isset($message)) { echo $message; } ?>
</div>
<form method="post" action="">
<table class="table table-bordered" style="text-align:center;">
<thead>
<tr>
    <th style="text-align:center;"><input type="checkbox" id="checkAl"> Select All</th>
	<th style="text-align:center;">JobNo</th> 
	<th style="text-align:center;">CustomerID</th>	
	<th style="text-align:center;">No. Plate</th>	
	<th style="text-align:center;">CarType</th>	
	<th style="text-align:center;">Fault/Service</th>
	<th style="text-align:center;">Employee</th>
	<th style="text-align:center;">Date</th>
	<th style="text-align:center;">Time</th>
</tr>
</thead>
<?php
$i=0;
if(isset($_POST['Save'])){
    
 if(isset($_POST['sdate']))
    {
    $sdate =$_POST['sdate'];
    //$Appoint = date('l,F d y h:i:sa');
    $sdate = strtotime($sdate);
    $sdate = date('Y-m-d',$sdate);
    }
    if(isset($_POST['edate']))
    {
    $edate =$_POST['edate'];
    //$Appoint = date('l,F d y h:i:sa');
    $edate = strtotime($edate);
    $edate = date('Y-m-d',$edate);
    }
  
$result = mysqli_query($link,"SELECT * FROM job where Apptdate BETWEEN '$sdate' AND '$edate'");

while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><input type="checkbox" id="checkItem" name="check[]" value="<?php echo $row["Bookingid"]; ?>"></td>
	<td><?php echo $row["Bookingid"]; ?></td>
	<td><?php echo $row["Cmail"];?> </td>	
	<td><?php echo $row["NoPlate"]; ?></td>
	<td><?php echo $row["CarType"]; ?></td>
	<td><?php echo $row["Service"]; ?></td>
	<td><?php echo $row["Email"]; ?></td>
	<td><?php echo $row["Apptdate"]; ?></td>
	<td><?php echo $row["Appttime"]; ?></td>

	</tr>
<?php
$i++;
}}
?>
<?php
require_once "config.php";
    if (isset($_POST["submit"])) {
	if(isset($_POST['check'])){
        $email = $_POST['email'];
	$checkbox = $_POST['check'];
	for($i=0;$i<count($checkbox);$i++){
	$id = $checkbox[$i]; 
        mysqli_query($link,"UPDATE job SET Email = '$email' where Bookingid = $id ");?>
	<div class = "alert alert-success"style="text-align:center;"><strong>Successfully Added !<strong></div>
	<?php }}else{?><div class = "alert alert-info" style="text-align:center;"><strong>Please select checkbox!<strong></div>
	
<?php }
}
?>
</table> </div>
		
	    </div>
           
       	</form>
	</div>

            		
		
</form>

<script>
$("#checkAl").click(function () {
$('input:checkbox').not(this).prop('checked', this.checked);
});
</script>      </div>

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

