<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HikeYuk</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/logoHike.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'><link rel="stylesheet" href="styleLogin.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <script>
    function openForm(){
      document.getElementById("login").style.display="block";
    }
    function closeForm() {
      document.getElementById("login").style.display = "none";
    }
  </script>
</head>
<?php
$nama=$_POST["Name"];
$email=$_POST["Email"];
$phone=$_POST["noPhone"];
$gender=$_POST["gender"];
$passwordF=$_POST["password"];
$passwordC=$_POST["Cpassword"];
$role=$_POST["role"];
$age=$_POST["umur"];

if($passwordF == $passwordC){
    include_once("dbConnect.php");
    mysqli_select_db($conn,"hikeYuk");
    $query="INSERT INTO user (username, passwordC, Age, email, noPhone, role, gender) VALUES ('$nama', '$passwordC','$age','$email','$phone','$role','$gender')";
    $run_query=mysqli_query($conn,$query);
    
    if($run_query){
        echo"<script>alert('REGISTER SUCCESS')</script>";

        if($role=="Guider"){
          $query1="INSERT INTO guider (emailGuider) VALUES ('$email')";
          $run_query1=mysqli_query($conn,$query1);
          if($run_query1){
            header("location: index.php");
            echo"<script>alert('REGISTER SUCCESS GUIDER')</script>";
          }  
        }
        elseif($role=="Hiker"){
          $query2="INSERT INTO hikers (NameId) VALUES ('$nama')";
          $run_query2=mysqli_query($conn,$query2);
          if($run_query2){
            header("location: index.php");
            echo"<script>alert('REGISTER SUCCESS HIKERS')</script>";
          } 
        }

        include("index.php");
    }
    else{
        echo"<script>alert('UNSUCCESS')</script>";
        include("index.php");
    }
}
else{
    echo"<script>alert('PASSWORD NOT SAME')</script>";
    include("createAcc.php");
}
?>
