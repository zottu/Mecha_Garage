<?php 
// session_start();
// error_reporting(0);
// if(!$_SESSION['email'])
// {
// header("Location:login.php");
// }
// if (isset($_POST['logout'])) { 
// 	session_destroy(); 
// 	unset($_SESSION['email']); 
// 	header("location: Login.php"); 
// } 

// Include config file
require_once "Customer/config.php";
$time = 'none.';
if(isset($_REQUEST['d'])) {
    $date = explode("/",$_REQUEST['d']);
    $date = $date[2].'-'.$date[0].'-'.$date[1];

    $empCountSql = mysqli_query($link,"SELECT count(*) as total FROM employee");
    $countData=mysqli_fetch_assoc($empCountSql);
    $empCount = $countData['total'];
    //$date = $_REQUEST['d'];
    $jobCount = mysqli_query($link,"SELECT * FROM timecounter where date='$date' AND jobtime='00:00:08'");
    $data=mysqli_fetch_assoc($jobCount);
    $count = $data['count'];
    if($count !== $empCount) {
        $time = '8.';
    }

    $jobCount = mysqli_query($link,"SELECT * FROM timecounter where date='$date' AND jobtime='00:00:09'");
    $data=mysqli_fetch_assoc($jobCount);
    $count = $data['count'];
    if($count !== $empCount) {
        $time = $time.'9.';
    }

    $jobCount = mysqli_query($link,"SELECT * FROM timecounter where date='$date' AND jobtime='00:00:10'");
    $data=mysqli_fetch_assoc($jobCount);
    $count = $data['count'];
    if($count !== $empCount) {
        $time = $time.'10.';
    }

    $jobCount = mysqli_query($link,"SELECT * FROM timecounter where date='$date' AND jobtime='00:00:11'");
    $data=mysqli_fetch_assoc($jobCount);
    $count = $data['count'];
    if($count !== $empCount) {
        $time = $time.'11.';
    }

    $jobCount = mysqli_query($link,"SELECT * FROM timecounter where date='$date' AND jobtime='00:00:12'");
    $data=mysqli_fetch_assoc($jobCount);
    $count = $data['count'];
    if($count !== $empCount) {
        $time = $time.'12.';
    }

    $jobCount = mysqli_query($link,"SELECT * FROM timecounter where date='$date' AND jobtime='00:00:02'");
    $data=mysqli_fetch_assoc($jobCount);
    $count = $data['count'];
    if($count !== $empCount) {
        $time = $time.'2.';
    }

    $jobCount = mysqli_query($link,"SELECT * FROM timecounter where date='$date' AND jobtime='00:00:03'");
    $data=mysqli_fetch_assoc($jobCount);
    $count = $data['count'];
    if($count !== $empCount) {
        $time = $time.'3.';
    }

    $jobCount = mysqli_query($link,"SELECT * FROM timecounter where date='$date' AND jobtime='00:00:04'");
    $data=mysqli_fetch_assoc($jobCount);
    $count = $data['count'];
    if($count !== $empCount) {
        $time = $time.'4';
    }
   
}

echo $time;  
?>