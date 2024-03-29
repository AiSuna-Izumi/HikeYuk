<?php
   include("dbConnect.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['Email']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['PasswordC']); 
      $role = mysqli_real_escape_string($conn,$_POST['role']); 
      
      $sql = "SELECT * FROM user WHERE email = '$myusername'and passwordC = '$mypassword' and role='$role' ";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      


      if($count == 1) {
        if($role =='Hiker'){
        $_SESSION['login_user'] = $myusername;
        header("location: login/index.php");
        }
        elseif($role=='Guider'){
        $_SESSION['login_user'] = $myusername;
        header("location: login/guider.php");
        }
      }
      else {
         $error = "Your Login Name or Password is invalid";
         echo "<script>alert('Wrong Password or Username');</script>";
      }
   } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HikeYuk</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/logoHike.png" rel="icon">

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

<body >

  <!-- ======= Header ======= -->
  <header  id="header" class="fixed-top d-flex align-items-center  header-transparent ">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        
        <h1><a href="index.php">Kemaman Hiking Park</a></h1>
        
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang Kami</a></li>
          <li><a class="nav-link scrollto" href="#services">Tempat Menarik</a></li>
          <li><a class="nav-link scrollto " href="#bestPhoto">Best Photos</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          <li class="main-nav"><a class="nav-link scrollto" href="#0">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
<div class="user-modal">
  <div class="user-modal-container">
    <ul class="switcher">
      <li><a href="#0">Sign in</a></li>
      <li><a href="#0">New account</a></li>
    </ul>

    <div id="login">
      <form class="form" action="" method="POST">
      <p class="animate__animated animate__fadeInDown">Hiker Email :<span> drmodi@gmail.com</span></p>
          <p class="animate__animated fanimate__adeInUp">Hiker password : drmodi</p>
          <p class="animate__animated animate__fadeInDown">Guider Email : <span> drmodi1@gmail.com</span></p>
          <p class="animate__animated fanimate__adeInUp">Guider password : drmodi</p>
        <p class="fieldset">
          <label class="image-replace email" for="signin-email">E-mail</label>
          <input class="full-width has-padding has-border" id="signin-email" name="Email"type="email" placeholder="E-mail">
          <span class="error-message">An account with this email address does not exist!</span>
        </p>

        <p class="fieldset">
          <label class="image-replace password" for="signin-password">Password</label>
          <input class="full-width has-padding has-border"name="PasswordC" id="signin-password" type="password"  placeholder="Password">
          <a href="#0" class="hide-password">Show</a>
          <span class="error-message">Wrong password! Try again.</span>
        </p>

        <center>
          <div class="btn-group" >
            <input  type="radio"class="btn-check" id="Hikers" name="role" value="Hiker">
            <label class="btn btn-outline-success" for="Hikers">Hikers</label> 
            <input  class="btn-check"type="radio" id="Guider" name="role" value="Guider">
            <label class="btn btn-outline-success" for="Guider">Guider</label></br>
          </div>
         <br>

        </center>

        <p class="fieldset">
          <input type="checkbox" id="remember-me" checked>
          <label for="remember-me">Remember me</label>
        </p>

        <center class="fieldset">
          <button style="background-color: rgb(175, 231, 128,1);"class="btn btn-succes" type="submit" value="Create account">LOGIN</button>
        </center>
      </form>
      <form action="">
        <p class="form-bottom-message"><a href="#0">Forgot your password?</a></p>
      </form>
      <!-- <a href="#0" class="close-form">Close</a> -->
    </div>

    <div id="signup">
      <form class="form" action="regAcc.php" method="post">
        <p class="fieldset">
          <label class="image-replace" for="signup-username">Username</label>
          <input class="full-width has-padding has-border" name="Name"id="signup-username" type="text" placeholder="Username">
        </p>
        <p class="fieldset">
          <label class="image-replace" for="signup-email">Email</label>
          <input class="full-width has-padding has-border" name="Email"id="signup-email" type="text" placeholder="E-mail">
        </p>
        <p class="fieldset">
          <label class="image-replace" for="signup-email">No Phone</label>
          <input class="full-width has-padding has-border" name="noPhone"id="signup-email" type="text" placeholder="No Phone">
        </p>
        <center>
          <div class="btn-group" >
            <input  type="radio"class="btn-check" id="Lelaki" name="gender" value="Lelaki">
            <label class="btn btn-outline-success" for="Lelaki">Lelaki</label> 
            <input  class="btn-check"type="radio" id="Perempuan" name="gender" value="perempuan">
            <label class="btn btn-outline-success" for="Perempuan">Perempuan</label></br>
        </div>
         <br>
        </center>
        <p class="fieldset">
          <label class="image-replace" for="signup-email">Umur</label>
          <input class="full-width has-padding has-border" name="umur" id="signup-email" type="umur" placeholder="Umur">
        </p>   
        <p class="fieldset">
          <label class="image-replace " for="signup-password">Password</label>
          <input class="full-width has-padding has-border" id="signup-password" name="password" type="password"  placeholder="Password">
          <a href="#0" class="hide-password">Show</a>
        </p>
        <p class="fieldset">
          <label class="image-replace " for="signup-password">Confirm Password</label>
          <input class="full-width has-padding has-border" id="signup-password" name="Cpassword" type="password"  placeholder="Confirm Password">
          <a href="#0" class="hide-password">Show</a>
        </p>
        <p class="fieldset">
        <center>
          
          <div class="col-md-4">
            <label for="inputState" class="form-label">ROLE</label>
            <select id="inputState" class="form-select" name="role">
              <option value="Hiker">HIKERS</option>
              <option value="Guider">GUIDER</option>
              
            </select>
          </div>
         <br>
        </center></p>
        <!-- <p class="fieldset">
          <input type="checkbox" id="accept-terms">
          <label for="accept-terms">I agree to the <a class="accept-terms" href="#0">Terms</a></label>
        </p> -->
        <center class="fieldset">
          <button style="background-color: rgb(175, 231, 128,1);"class="btn btn-succes" type="submit" value="Create account">CREATE ACCOUNT</button>
        </center>
      </form>

      <!-- <a href="#0" class="cd-close-form">Close</a> -->
    </div>

    <div id="reset-password">
      <p class="form-message">Lost your password? Please enter your email address.</br> You will receive a link to create a new password.</p>

      <form class="form" action="">
        <p class="fieldset">
          <label class="image-replace email" for="reset-email">E-mail</label>
          <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
          <span class="error-message">An account with this email does not exist!</span>
        </p>

        <p class="fieldset">
          <input class="full-width has-padding" type="submit" value="Reset password">
        </p>
      </form>

      <p class="form-bottom-message"><a href="#0">Back to log-in</a></p>
    </div>
    <a href="#0" class="close-form">Close</a>
  </div>
</div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section  id="hero" class="d-flex flex-column justify-content-end align-items-center"  > 
    <div  id="heroCarousel"  data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
    
      <!-- Slide 1 -->
      <div class="carousel-item active">
        <div class="carousel-container"> 
          <p class="animate__animated animate__fadeInDown">Hiker Email :<span> drmodi@gmail.com</span></p>
          <p class="animate__animated fanimate__adeInUp">Hiker password : drmodi</p>
          <p class="animate__animated animate__fadeInDown">Guider Email : <span> drmodi1@gmail.com</span></p>
          <p class="animate__animated fanimate__adeInUp">Guider password : drmodi</p>
        </div>
      </div>
      <!-- Slide 1 -->
      <div class="carousel-item ">
        <div class="carousel-container"> 
          <img src="img/hikeYuk.png" style="width: 200px;height: 200px;">
          <h2 class="animate__animated animate__fadeInDown">Selamat Datang Ke <span>Kemaman Hiking Park</span></h2>
          <p class="animate__animated fanimate__adeInUp">Disini kami menyediakan pelbagai kemudahan untuk anda pergi mendaki</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 2 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Enjoy With Nature</h2>
          <p class="animate__animated animate__fadeInUp">Everyone wants happiness , no one wants pain . but you can’t have a rainbow without a little rain </p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Ayuh Berkelana</h2>
          <p class="animate__animated animate__fadeInUp">Hidup tak seindah mimpi . hidup bukan fantasi yang dicipta sendiri. Berjalanlah mencari hikmah yang ada didalamnya . insya-Allah bahagia .</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>
      <!-- Slide 4 -->
      <div class="carousel-item">
        <div class="carousel-container">
          <h2 class="animate__animated animate__fadeInDown">Bersama Teman</h2>
          <p class="animate__animated animate__fadeInUp">Hidup ini mudah jer. Sesiapa sahaja yang berada di sekeliling kita itulah yang menjadi kawan kita. Yang lepas jadikan kenangan. Hargai apa yang ada didepan kita.</p>
          <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
        </div>
      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
      </a>

    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(208, 230, 161, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(208, 230, 161, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="rgba(208, 230, 161, .3)">
      </g>
    </svg>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Kemaman</h2>
          <p>Kelebihan Yang Kami Sediakan</p>
        </div>

        <div class="row content" data-aos="fade-up">
          <div class="col-lg-6">
            <p>
              Ayuh kita mendaki bergembira bersama teman-teman, sambil menikmati keindahan alam. Hilangkan segala masalah di jiwa.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Petunjuk arah yang berpengalaman</li>
              <li><i class="ri-check-double-line"></i> Tempat Checkpoint</li>
              <li><i class="ri-check-double-line"></i> Gambar Pemandangan yang menarik</li>
              <li><i class="ri-check-double-line"></i> Tempat Pemulaan Mendaki</li>
              <li><i class="ri-check-double-line"></i>Masa Yang Sesuai</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <p>
              Ayuh bersama kami meneroka alam yang penuh misteri.</br>
              Bersama luaskan tempat untuk diterokai.<br>
              Bersama sihatkan tubuh badan, hilangkan segala masalah dijiwa.
            </p>
            <a href="#" class="btn-learn-more">Login</a>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <ul class="nav nav-tabs row d-flex">
          <li class="nav-item col-3" data-aos="zoom-in">
            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
              <i class="ri-gps-line"></i>
              <h4 class="d-none d-lg-block">Lokasi-lokasi yang sesuai</h4>
            </a>
          </li>
          <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="100">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
              <i class="ri-body-scan-line"></i>
              <h4 class="d-none d-lg-block">Sihatkan Tubuh Badan Anda</h4>
            </a>
          </li>
          <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="200">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
              <i class="ri-sun-line"></i>
              <h4 class="d-none d-lg-block">Atur Waktu Yang Sesuai</h4>
            </a>
          </li>
          <li class="nav-item col-3" data-aos="zoom-in" data-aos-delay="300">
            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
              <i class="ri-parent-line"></i>
              <h4 class="d-none d-lg-block">Make New Friend</h4>
            </a>
          </li>
        </ul>

    </section><!-- End Features Section -->

   

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Perkhidmatan</h2>
          <p>Yang Kami Tawarakan</p>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="icon-box" data-aos="zoom-in-left">
              <div class="icon"><i class="bi bi-binoculars" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">Tempat Mendaki Yang menarik</a></h4>
              <p class="description">Keindahan Kemaman, bukit ditepi laut. Yang mempunyai pelbagai keunikkan yang tersendiri di setiap tempat.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5 mt-md-0">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="100">
              <div class="icon"><i class="bi bi-globe" style="color: #e9bf06;"></i></div>
              <h4 class="title"><a href="">Keselamatan</a></h4>
              <p class="description">Tujuan terbinanya website ini adalah untuk memastikan keselamatan setiap pendaki yang baharu. Terutama pendaki perempuan</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5 mt-lg-0 ">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="200">
              <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Pengiring Yang Berdafar</a></h4>
              <p class="description">Kami juga menyediakan Guider atau Pengiring yang berdaftar untuk anda.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="300">
              <div class="icon"><i class="bi bi-briefcase" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">Gambar Yang Menarik</a></h4>
              <p class="description">Anda boleh memilih tempat pendakian yang menarik, selepas anda melihat gambar yang kami paparkan</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="400">
              <div class="icon"><i class="bi bi-book" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">Sejarah Perjalanan Anda</a></h4>
              <p class="description">Kami akan merekod sejarah pendakian anda, selagi anda menggunakan perkhidmatan kami</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box" data-aos="zoom-in-left" data-aos-delay="500">
              <div class="icon"><i class="bi bi-clock" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">Bersama Teman</a></h4>
              <p class="description">Berpeluang untuk merancang perjalanan anda bersama kawan-kawan. Bertemu dengan kawan baru.</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= BestView Section ======= -->
    <section id="bestPhoto" class="portfolio">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>GAMBAR MENARIK</h2>
          <p>KOLEKSI GAMBAR</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-end" data-aos="fade-up">
          <li data-filter="*" class="filter-active">Semua</li>
          <li data-filter=".filter-BM">Bukit Bendera</li>
          <li data-filter=".filter-HM">Harimau Menangis</li>
          <li data-filter=".filter-JM">Janda Mandi</li>
          <li data-filter=".filter-MD">Mak Dayang</li>
          <li data-filter=".filter-ME">Menderu</li>
          <li data-filter=".filter-TS">Telaga Simpul</li>
        </ul>

        <div class="row portfolio-container" data-aos="fade-up">

          <div class="col-lg-4 col-md-6 portfolio-item filter-BM">
            <div class="portfolio-img"><img src="img/BukitBendera/DSC_2815.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Bendera</h4>
              <p>Pantai Teluk Mak Nik</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-BM">
            <div class="portfolio-img"><img src="img/BukitBendera/21e5df25-50d6-48e8-8698-47037c5cf376.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Bendera</h4>
              <p>Pantai Teluk Mak Nik</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-BM">
            <div class="portfolio-img"><img src="img/BukitBendera/c3a1d2e3-647a-4d5e-b2ae-fcd260ea22d4.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Bendera</h4>
              <p>Pantai Teluk Mak Nik</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-BM">
            <div class="portfolio-img"><img src="img/BukitBendera/photo_2021-05-25_01-40-20.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Bendera</h4>
              <p>Pantai Teluk Mak Nik</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-BM">
            <div class="portfolio-img"><img src="img/BukitBendera/photo_2021-05-25_01-40-08.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Harimau Menangis</h4>
              <p>Kemasik, Kemaman</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-HM">
            <div class="portfolio-img"><img src="img/HarimauMenangis/25348149.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Harimau Menangis</h4>
              <p>Kemasik, Kemaman</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-HM">
            <div class="portfolio-img"><img src="img/HarimauMenangis/27293435.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Harimau Menangis</h4>
              <p>Kemasik, Kemaman</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-HM">
            <div class="portfolio-img"><img src="img/HarimauMenangis/eb3729dd-93c7-494b-85b3-0a133bb47c61.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Harimau Menangis</h4>
              <p>Kemasik, Kemaman</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-HM">
            <div class="portfolio-img"><img src="img/HarimauMenangis/9ed4a844-ffe5-4ffc-aa2b-096b9234b84a.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Harimau Menangis</h4>
              <p>Kemasik, Kemaman</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="img/JandaMandi/photo_2021-05-29_00-51-42.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="img/JandaMandi/photo_2021-05-29_00-51-49.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="img/JandaMandi/photo_2021-05-29_00-52-03.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="img/JandaMandi/photo_2021-05-29_00-52-13.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="img/JandaMandi/photo_2021-05-29_00-52-29.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div><div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="img/JandaMandi/photo_2021-05-29_00-52-36.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-MD">
            <div class="portfolio-img"><img src="img/MakDayang/89803973_00L27A0A5hvr2_QSBq1iVw7NaRVW6RMLaBYNspm-ly8.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Mak Dayang</h4>
              <p>Chukai, Kemaman</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-MD">
            <div class="portfolio-img"><img src="img/MakDayang/download (1).jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Mak Dayang</h4>
              <p>Chukai Kemaman</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-MD">
            <div class="portfolio-img"><img src="img/MakDayang/extra_large_0887bbad37516082bf8c6e2e2f2d58f0.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukti Mak Dayang</h4>
              <p>Chukai Kemaman</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-MD">
            <div class="portfolio-img"><img src="img/MakDayang/21088669.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Mak Dayang</h4>
              <p>Chukai, Kemaman</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-TS">
            <div class="portfolio-img"><img src="img/TelagaSimpul/5cd1cc0d-46d1-4aeb-a99e-b0891534d4f8.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Telaga Simpul</h4>
              <p>Pantai Marina</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-TS">
            <div class="portfolio-img"><img src="img/TelagaSimpul/75da3153-7d65-4df4-bd4e-25444d1a56fc.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Telaga Simpul</h4>
              <p>Pantai Marina</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-TS">
            <div class="portfolio-img"><img src="img/TelagaSimpul/7e05403d-05c4-4c30-8280-3457691b7f72.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Telaga Simpul</h4>
              <p>Pantai Marina</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-TS">
            <div class="portfolio-img"><img src="img/TelagaSimpul/d77c08f8-0a82-4fb1-bc12-7f66044ef5a4.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Telaga Simpul</h4>
              <p>Pantai Marina</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-TS">
            <div class="portfolio-img"><img src="img/TelagaSimpul/dc1ad605-cc07-469d-aa4f-ebb0ecb7f334.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Telaga Simpul</h4>
              <p>Pantai Marina</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-ME">
            <div class="portfolio-img"><img src="img/Menderu/2020-08-26.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Menderu</h4>
              <p>Hutan Simpan Rasau</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-ME">
            <div class="portfolio-img"><img src="img/Menderu/air-terjun-menderu.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Menderu</h4>
              <p>Hutan Simpan Rasau</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-ME">
            <div class="portfolio-img"><img src="img/Menderu/photo_2021-05-29_00-49-44.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Menderu</h4>
              <p>Hutan Simpan Rasau</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-ME">
            <div class="portfolio-img"><img src="img/Menderu/Hutan Lipur Menderu.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Menderu</h4>
              <p>Hutan Simpan Rasau</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-ME">
            <div class="portfolio-img"><img src="img/Menderu/photo_2021-05-29_00-50-35.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Menderu</h4>
              <p>Hutan Simpan Rasau</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End BestView Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="zoom-out">
          <h2>Ayuh</h2>
          <p>Hubungi Kami</p>
        </div>

        <div class="row mt-5">

          <div class="col-lg-4" data-aos="fade-right">
            <div class="info">    
            <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>hikeYuk@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>No Phone:</h4>
                <p>0139181521</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>HikeYuk</h3>
      <p>Perjuangan Menuju Ke Puncak</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>HikeYuk</span></strong></div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        Designed by <a href="https://bootstrapmade.com/">Dziya AiSuna</a>
      </div>
    </div>
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="scriptLogin.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>