<?php
  include('session.php')
?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HikeYuk</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: iPortfolio - v3.1.0
  * Template URL: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php
include('../dbConnect.php');
mysqli_select_db($conn,"hikeyuk");
$id=$_POST['id'];
$email=$login_session;
$hikerName=$_POST['hiker'];
$noPhone=$_POST['phone'];
$location=$_POST['location'];
$time=$_POST['time'];
$date=$_POST['date'];
$member=$_POST['member'];
$userEmail=$_POST['userEmail'];
$stat=$_POST['status'];
$komen=$_POST['comment'];


$sql = "UPDATE program SET Guider='$email', Status='$stat' , Comment_Order='$komen'  WHERE Id='$id'";  
$run_query=mysqli_query($conn,$sql);
    
if($conn->query($sql) === TRUE){
    header("Refresh:0, url='guider.php'");
    echo"<script>alert('ACCEPT SUCCESS')</script>";
 
}
else{
    header("Refresh:0, url='guider.php'");
    echo"<script>alert('UNSUCCESS')</script>";
    
}

 
?>