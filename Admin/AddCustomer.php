<!doctype html>
<html lang="en">
<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = $confirm_password = $fname =$lname = $mobile="";
$email_err = $password_err = $confirm_password_err =$fname_err = $lname_err = $mobile_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "This email is already registered.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
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
    

//validate firstname
  if(empty(trim($_POST["fname"]))){
        $fname_err = "name is req";
    } else{$fname = trim($_POST["fname"]);}

//validate lastname
  if(empty(trim($_POST["lname"]))){
        $lname_err = "surname is req";
    } else{$lname = trim($_POST["lname"]);}
 //Validate mobile
	
    if(empty(trim($_POST["mobile"]))){
        $mobile_err = "phone number is req";
    } else{$mobile = trim($_POST["mobile"]);}
    // Check input errors before inserting in database
    if(empty($fname_err)&&empty($lname_err) && empty($password_err) && empty($confirm_password_err)&&empty($mobile_err)&&empty($email_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (fname,lname,mobile,email, password) VALUES (?, ? ,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss",$param_fname,$param_lname,$param_mobile, $param_email, $param_password);
            
            // Set parameters
            $param_fname = $fname;
	    $param_lname = $lname;
	    $param_mobile = $mobile;
	    $param_email = $email;
            $param_password =$password; // Creates a password hash
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
         echo "Successfully added";
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
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
                  <li class="active"><a href="CustomerGroup.php" class="nav-link">Back</a></li>
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
		  <form name="form_login" method="post" action="AddCustomer.php" role="form">
   
      	<div class="realestate-filter">
        	<div class="container">
       	   <div class="realestate-filter-wrap nav">
        	   </div>
       	 </div>
      		</div>
      
        
             <div>
              <div class="col-md-4 form-group">
		      <input type="text" name="fname"  id="fname" class="form-control input-lg" placeholder="Name">
               </div>
		    <div class="col-md-4 form-group" >
	        <input type="text" name="lname"  id="lname" class="form-control input-lg" placeholder="Surame">
                         </div>
             	    <div class="col-md-4 form-group">
            	      <input type="text" name="mobile"  id="mobile" class="form-control input-lg" placeholder="Mobile">
              </div>
               <div class="col-md-4 form-group">
                 <input type="text" name="email"  id="email" class="form-control input-lg" placeholder="Email">
               </div>
               <div class="col-md-4 form-group">
			     <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
               </div>
		<div class="col-md-4 form-group">
			     <input type="password" name="confirm_password" id="confirm_password" class="form-control input-lg" placeholder="Confirm-Password">
               </div>
            
               <div class="col-md-4" style="text-align:center">
                 <input type="submit" class="btn btn-black" value="Submit">
              
             </div> </div>
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

