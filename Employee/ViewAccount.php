<!doctype html>
<html lang="en" >
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
<?php
require_once "config.php";
$password = $confirm_password="";
$password_err = $confirm_password_err= "";
$email = $_SESSION["email"];
if($_SERVER["REQUEST_METHOD"] == "POST"){
         
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    

    // Check input errors before inserting in database
    if(empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
       $r=   mysqli_query($link,"UPDATE employee SET password = $password where email = '$email' ");
	if(!$r)
             {   // Redirect to login page
	 echo die("couldnt add".mysqli_error($link));
            } else{?>
	<div class = "alert alert-success""><strong>Successfully Updated !<strong></div>
	
           <?php }}

           
    
    
}
$result = mysqli_query($link,"SELECT * FROM employee where email = '$email'");
$row = mysqli_fetch_array($result);
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
		   <form name="form_login" method="post" action="ViewAccount.php" role="form">
   
	
      <div class="realestate-filter">
        <div class="container">
          <div class="realestate-filter-wrap nav">
           </div>
        </div>
      </div><div  >
              <div class="col-md-4 form-group">
		      <input type="text" name="fname"  id="fname" class="form-control input-lg" placeholder="Name" value="<?php echo $row["fname"]; ?>">
               </div>
		    <div class="col-md-4 form-group" >
	        <input type="text" name="lname"  id="lname" class="form-control input-lg" placeholder="Surame" value="<?php echo $row["lname"]; ?>">
                         </div>
             	    <div class="col-md-4 form-group">
            	      <input type="text" name="mobile"  id="mobile" class="form-control input-lg" placeholder="Mobile" value="<?php echo $row["mobile"]; ?>">
              </div>
               <div class="col-md-4 form-group">
                 <input type="text" name="email"  id="email" class="form-control input-lg" placeholder="Email" value="<?php echo $row["email"]; ?>">
               </div>
                </div>
		<div class="col-md-4 form-group">
			     <input type="text" name="password" id="password" class="form-control input-lg" placeholder="Password" value="<?php echo $row["password"]; ?>">
               </div>
		<div class="col-md-4 form-group">
			     <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
               </div>
		<div class="col-md-4 form-group">
			     <input type="password" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="Confirm-Password">
               </div>
            <div class="row">
               <div class="col-md-4" style="text-align:center" >
		 <input type="submit" class="btn btn-primary btn-black" value="SAVE">
		 <input type="reset" class="btn btn-primary btn-black" value="RESET">
           	</div>
              
             </div>
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

