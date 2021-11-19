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

    $username=$_POST['username'];
    $noPhone=$_POST['phone'];
    $age=$_POST['age'];
    $facebook=$_POST['facebook'];
    $instagram=$_POST['instagram'];
    $twitter=$_POST['twitter'];
    $komen=$_POST['comment'];

    $sql = "UPDATE user SET username='$username', noPhone='$noPhone' , Age='$age', facebook='$facebook', instagram='$instagram', twitter='$twitter' WHERE email='$login_session'";
    if ($conn->query($sql) === TRUE){
      $sql2 = "UPDATE hiker SET username='$username', age='$age' ,comment='$komen' WHERE email='$login_session'";
      if ($conn->query($sql2) === TRUE){
        header("Refresh:0, url='index.php'");
        echo "<script>alert('UPDATE SUCCESSFULL')</script>" ;
      }
    }
    else{
        header("Refresh:0, url='index.php'");
        echo "<script>alert('ERROR UPDATE')</script>" ;
    }
 
?>