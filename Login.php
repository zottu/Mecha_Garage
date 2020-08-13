<!doctype html>
<html lang="en" >
<?php
error_reporting(0);
 
// Check if the user is already logged in, if yes then redirect him to welcome page
/*if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}*/
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password =$Type=  "";
$email_err = $password_err = "";
$admin = "admin";
$adminpass = "adminn";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
$Type = $_POST['user'];
	
     // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
		 // Validate credentials
    if(empty($email_err) && empty($password_err)){
        
                            session_start();
                            	if($email == $admin && $password == $adminpass)
		{
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                             $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location:Admin/homeAd.php");
                }
	
	 $sql = "SELECT id, email, password FROM users WHERE email = ? && password= ?";        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email,$param_password);
            
            // Set parameters
            $param_email = $email;
            $param_password=$password;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email);
                    if(mysqli_stmt_fetch($stmt)){
                        
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location:Customer/homeCus.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "No account found with that username.";
                }
            	// Close statement
            	mysqli_stmt_close($stmt);
		}}
	 // Prepare a select statement
        $sql = "SELECT employeeid, email, password FROM employee WHERE email = ? && password = ? ";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_email,$param_password);
            
            // Set parameters
            $param_email = $email;
            $param_password=$password;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $employeeid, $email);
                    if(mysqli_stmt_fetch($stmt)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["employeeid"] = $employeeid;
                            $_SESSION["email"] = $email;                            
                            
                            // Redirect user to welcome page
                            header("location:Employee/homeEm.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $email_err = "No account found with that username.";
                } // Close statement
            mysqli_stmt_close($stmt);

            }}
		


		}else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        
                    }
               

         }
    // Close connection
    mysqli_close($link);

?>

  <head>
    <title>LOGIN</title>
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
                  <li class="active"><a href="Login.html" class="nav-link">Login</a></li>
                  <li><a href="Register.html" class="nav-link">Register</a></li>
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
		   <form name="form_login" method="post" action="Login.php" role="form">
   
	
      <div class="realestate-filter">
        <div class="container">
          <div class="realestate-filter-wrap nav">
           </div>
        </div>
      </div>
      
        
             <div >
               <div class="col-md-4 form-group">
        	     <input name="email" type="text" id="email" class="form-control input-lg" placeholder="Email Address">
       	
	       </div>
               <div class="col-md-4 form-group">
		     <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
       
              </div>
            
               <div class="col-md-4" style="text-align:center">
		        <input type="submit" name="Submit" value="Login" class="btn btn-lg btn-success btn-block btn-black">
      
              
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

