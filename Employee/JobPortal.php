<!doctype html>
<html lang="en" >

<?php
error_reporting(0);
ob_start();
$FrontBreak=$RearBreak=$Fluid=$Parking=$SparkPlugs=$OilFilter=$Oil=$Filter=$FuelFilter=$TimingBelt=$Coolent=$TransmissionFluid=$FinalDriveFluid=$Steering=$BoltJoints=$Bushes=$Bellows=$JobStatus=$fault=$fault_err="";
require_once "config.php";
session_start();

	$checkbox = $_POST['check']; 
	for($i=0;$i<count($checkbox);$i++){
	$_SESSION['Bid'] = $checkbox[$i]; 
	}
$bid =1;//$_SESSION['Bid'];
 



	if(isset($_POST['submit'])){
	// Storing Selected Value In Variable
	$FrontBreak = $_POST['FrontBreak'];
	$RearBreak= $_POST['RearBreak'];
	$Fluid=$_POST['Fluid'];
	$Parking=$_POST['Parking'];
	$SparkPlugs=$_POST['SparkPlugs'];
	$OilFilter=$_POST['OilFilter'];
	$Oil=$_POST['Oil'];
	$Filter=$_POST['Filter'];
	$FuelFilter=$_POST['FuelFilter'];
	$TimingBelt=$_POST['TimingBelt'];
	$Coolent=$_POST['Coolent'];
	$TransmissionFluid=$_POST['TransmissionFluid'];
	$FinalDriveFluid=$_POST['FinalDriveFluid'];
	$Steering=$_POST['Steering'];
	$BoltJoints=$_POST['BoltJoints'];
	$Bushes=$_POST['Bushes'];
	$Bellows=$_POST['Bellows']; 
	$fault = trim($_POST['fault']);
	if(isset($_POST['radio']))
	{
	$JobStatus=$_POST['radio'];
	}
	if(empty(trim($_POST['fault']))){
        $fault_err = "description is req";
    	} else{$fault = trim($_POST['fault']);}
	 if(empty($fault_err)){
		 //var_dump($bid);
 mysqli_query($link,"UPDATE job SET FrontBreak = '$FrontBreak' , RearBreak = '$RearBreak' ,Parking ='$Parking',Fluid='$Fluid',SparkPlugs='$SparkPlugs',Oil= '$Oil' ,OilFilter= '$OilFilter', Filter='$Filter',FuelFilter='$FuelFilter',TimingBelt='$TimingBelt',Coolent='$Coolent',TransmissionFluid='$TransmissionFluid',FinalDriveFluid='$FinalDriveFluid',Steering='$Steering',BoltJoints='$BoltJoints',Bushes='$Bushes',Bellows='$Bellows',FaultFound = '$fault',JobStatus ='$JobStatus' WHERE Bookingid = '$bid' ");
?>
	<div class = "alert alert-success"style = "text-align:center"><strong>Successfully Updated !<strong></div>
	
           <?php 
        	 }
                
	}
    
    // Close connection
    mysqli_close($link);

?>

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
      </div><div  >
             </div> 
      
                 </div>
               </div>
             </div>
            <div class="col-md-4 form-group">
	<label>Breaks:</label>
        <br>  <div class = "row">
        <label>FrontBreak:</label>
	<select name="FrontBreak" id="FrontBreak" class="form-control w-100">
	<option value="notdone">NotChecked</option>
	<option value="ok">OK</option>
	<option value="replaced">Replaced</option>
	</select>
	<label>RearBreak:</label>
	<select name="RearBreak" id="RearBreak" class="form-control w-100">
	<option value="notdone">NotChecked</option>
	<option value="ok">OK</option>
	<option value="replaced">Replaced</option>
	</select>  </div><div class = "row">
	<label>Parking:</label>
	<select name="Parking" id="Parking" class="form-control w-100">
	<option value="notdone">NotChecked</option>
	<option value="ok">OK</option>
	<option value="replaced">Replaced</option>
        </select>  
	<label>Fluid:</label>
        <select name="Fluid" id="Fluid" class="form-control w-100">
	<option value="notdone">NotChecked</option>
	<option value="ok">OK</option>
	<option value="replaced">Replaced</option>
	 </select> </div> <br><br>
	<label>Engine:</label>
             	<br><br>
		<label>Spark Plugs:</label>
		<select name="SparkPlugs" id="SparkPlugs" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	         </select>  
		<label>Oil:</label>
                <select name="Oil" id="Oil" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	        </select>  
		<label>Oil Filter:</label>
           	<select name="OilFilter" id="OilFilter" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	            </select>  
		<label>Filter:</label>
            <select name="Filter" id="Filter" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	           </select> 
		<label>Fuel Filter:</label>
            <select name="FuelFilter" id="FuelFilter" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	           </select>  
		<label>Timing Belt:</label>
            <select name="TimingBelt" id="TimingBelt" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	           </select>  
		<label>Coolent:</label>
           <select name="Coolent" id="Coolent" class="form-control w-100">	
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	            </select>  <br> <br>
	
		<label>Transmission:</label>
             	<br>
		<label>Transmission Fluid:</label>        
		<select name="TransmissionFluid" id="TransmissionFluid" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	        </select>
		<label>Final Drive Fluid:</label>        
		<select name="FinalDriveFluid" id="FinalDriveFluid" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	        </select><br> <br>
		<label>Suspension:</label>
             	<br>
		<label>Steering:</label>        
		<select name="Steering" id="Steering" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	         </select>
		<label>Bolt Joints:</label>        
		<select name="BoltJoints" id="BoltJoints" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	        </select>
		<label>Bushes:</label>        
		<select name="Bushes" id="Bushes" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	        </select>
		<label>Bellows:</label>        
		<select name="Bellows" id="Bellows" class="form-control w-100">
		<option value="notdone">NotChecked</option>
		<option value="ok">OK</option>
		<option value="replaced">Replaced</option>
	        </select> <br> <br>
		<div style="width:300px;" >		
		<div class="form-group <?php echo (!empty($fault_err)) ? 'has-error' : ''; ?>">
                <label>Faults found / Repaired</label>
                <input type="text" name="fault" class="form-control" value="<?php echo $fault; ?>">
                <span class="help-block"><?php echo $fault_err; ?></span>
            </div></div>
		<label>Job Status:</label><br>
		<input type="radio" <?php if (isset($JobStatus) && $JobStatus=="Not Started") echo "checked";?> name="radio" value="Not Started">Not Started
		<input type="radio" <?php if (isset($JobStatus) && $JobStatus=="In Progress") echo "checked";?> name="radio" value="In Progress">In Progress
		<input type="radio" <?php if (isset($JobStatus) && $JobStatus=="Completed") echo "checked";?> name="radio" value="Completed">Completed
		<br>
		<div style = "text-align:center;">
		<input type="submit" class="btn btn-primary btn-lg" name="submit" value="SAVE" >
		
			
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

