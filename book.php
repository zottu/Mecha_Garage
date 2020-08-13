<!doctype html>
<html lang="en">
<?php 
error_reporting(0);
session_start();
?>
<?php 

// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$bookingid=$Cbrand=$Ctype=$NoPlate=$fault=$Appoint=$Service="";
$Cbrand=$Ctype_err=$Cmail="";
    
    
$date_arr = array('9AM', '10AM');
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty(trim($_POST["Ctype"]))){
        $Ctype_err = "name is req";
    } else{$Ctype = trim($_POST["Ctype"]);}	
	 
	if(isset($_POST['user']))
	{
	 $Ctype = $_POST['user'];	
	}
 	
	if(isset($_POST['Cbrand']))
	{
	 $Cbrand = $_POST['Cbrand'];	
	}
 	if(isset($_POST['NoPlate']))
	{
	$NoPlate = $_POST['NoPlate'];
	}
 	if(isset($_POST['service']))
	{
	$Service=$_POST['service'];
	}
	if(isset($_POST['fault']))
	{
	$fault = $_POST['fault'];
	}
	if(isset($_POST['datetimepicker1']))
	{		
	$Appoint =$_POST['datetimepicker1'];
	//$Appoint = date('l,F d y h:i:sa');
	$Appoint = strtotime($Appoint);
	$Appoint = date('Y-m-d H:i:sa',$Appoint);
	}
	
	$Cmail=$_SESSION['email'];
    
    

    // Check input errors before inserting in database
      if(empty($Ctype_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO job(Cmail,CarBrand,CarType,NoPlate,Service,Fault,Appt) VALUES ('$Cmail',?,?,?,?,?,?)";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss",$param_Cbrand,$param_Ctype, $param_NoPlate,$param_Service, $param_fault,$param_Appoint);
            
            // Set parameters
	   //$param_Cmail=$Cmail;
	    $param_Cbrand = $Cbrand;
	    $param_Ctype =$Ctype;
	    $param_NoPlate =$NoPlate;
	    $param_Service =$Service;
	    $param_fault =$fault; 
	   $param_Appoint=$Appoint;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){ ?>
	<div class = "alert alert-success"style="text-align:center;"><strong>Successfully Added !<strong></div>
	<?php }}else{?><div class = "alert alert-info" style="text-align:center;"><strong>Something went wrong. Please try again later.!<strong></div>
	
<?php }
}
            // Close statement
            mysqli_stmt_close($stmt);
         }
    
 
?>
  <head>
    <title>ADD JOB </title>
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
<!--  jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />

<!-- Bootstrap Date-Picker Plugin -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>




<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">






    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">
	
    <script type="text/javascript">
    $(function() {
       var enableDays = [];
       var disabledDays = ['2020-08-28', '2020-08-29','2020-08-09','2020-08-10'];

       function formatDate(d) {
         var day = String(d.getDate())
         //add leading zero if day is is single digit

         if (day.length == 1)
           day = '0' + day
         var month = String((d.getMonth()+1))
         //add leading zero if month is is single digit
         if (month.length == 1)
           month = '0' + month
         return d.getFullYear() + '-' + month + "-" + day;
       }

       $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
             beforeShowDay: function(date){
              var dayNr = date.getDay();
                if (dayNr==0  ||  dayNr==6){
                    if (enableDays.indexOf(formatDate(date)) >= 0) {
                        return true;
                    }
                    return false;
                }
                if (disabledDays.indexOf(formatDate(date)) >= 0) {
                   return false;
                }
                return true;
            }
       });
    });
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
		  <form name="form_login" method="post" action="BookaCar.php" role="form">
   
      	<div class="realestate-filter">
        	<div class="container">
       	   <div class="realestate-filter-wrap nav">
        	   </div>
       	 </div>
      		</div>
      
         <div class="col-md-4" style="text-align:center">
                 <input type="submit" class="btn btn-black" value="Submit">
              
             </div> <br>
             <div><div class="row">
               <div class="col-md-4 form-group" >
                 <select name=user id=user class="form-control w-100">
		       <option value="">Select Car Brand</option>
                   <option value="BMW-s1">BMW(series-1)</option>
                   <option value="BMW-s1">BMW(series-2)</option>
                   <option value="Honda civic">Honda Civic</option>
		  <option value="Honda fit">Honda Fit</option>
		   <option value="Toyota starlet">Toyota Starlet</option>
		<option value="Toyota corolla">Toyota Corolla</option>
		<option value="Nissan gtr">Nissan Gtr</option>
		<option value="Nissan micro">Nissan Micro</option>
		<option value="Volkswagen golf">Volkswagen Golf</option>
		<option value="Volkswagen polo">Volkswagen Polo</option>

                    </select>
               </div>
                 <div class="col-md-4 form-group" >
                 <select name="time" id="time" class="form-control w-100">
		       <option value="">Select Time</option>
                   <option value="8AM">8AM</option>
                   <option value="9AM">9AM</option>
		   <option value="10AM">10AM</option>
                   <option value="11AM">11AM</option>
		    <option value="12PM">12PM</option>
		   <option value="2PM">2PM</option>
		   <option value="3PM">3PM</option>
		  <option value="4PM">4PM</option>


                    </select>
<script>

document.getElementById("time").style.opacity = ".01";

</script>
<button type="button" class="btn btn-black" onclick="myFunction()">Select time</button>

<script>


function myFunction() {
  
  var time_ind = <?php echo json_encode($date_arr); ?>;
  console.log(time_ind);
  var select = document.getElementById("time");
    for (var j=0; j< time_ind.length; j++){
        select.removeChild(getOptionByValue(select, time_ind[j]))
    }
    function getOptionByValue (select, value) {
        var options = select.options;
        for (var i = 0; i < options.length; i++) {
            if (options[i].value === value) {
                return options[i]
            }
        }
        return null
    }
document.getElementById("time").style.opacity = "100";
}
</script>


               </div>  <div class="col-md-4 form-group">
                <select name="service" id="service" class="form-control w-100">
		<option disabled selected>service/job</option>
		<option value="yes">YES</option>	
		<option value="no">NO</option>	
		</select></div>	

	      <div class="col-md-4 form-group" >
	        <input type="text" name="Ctype"  id="Ctype" class="form-control input-lg" placeholder="Car Type">
                         </div>
             	    <div class="col-md-4 form-group">
            	      <input type="text" name="NoPlate"  id="NoPlate" class="form-control input-lg" placeholder="Number Plate">
              </div></div><div class="row">
		               <div class="col-md-4 form-group">
			     <input type="text" name="fault" id="fault" class="form-control input-lg" placeholder="Fault">
               </div>





<div >
      <div  >
        
         <input type="text" placeholder="Date" name="date" class="datepicker form-control" >
      </div>
   </div>
</div>










<span class="input-group-addon">
                     <span class="glyphicon glyphicon-th"></span>
                     </span></div></div>
              </div>
		
                 </div>
               </div>
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






