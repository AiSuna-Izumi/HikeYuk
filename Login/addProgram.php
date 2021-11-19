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

$email=$login_session;
$username=$_POST['username'];
$noPhone=$_POST['phone'];
$time=$_POST['time'];
$date=$_POST['date'];
$member=$_POST['total'];
$place=$_POST['tempat'];

$query="INSERT INTO program (emailProgram, Location, NameId, Time, Date, TotalMember,noPhone) VALUES ('$email', '$place','$username','$time','$date','$member','$noPhone')";
$run_query=mysqli_query($conn,$query);
    
if($run_query){
    echo"<script>alert('REGISTER SUCCESS')</script>";
    include("index.php");
}
else{
    echo"<script>alert('UNSUCCESS')</script>";
    include("index.php");
}

 
?>