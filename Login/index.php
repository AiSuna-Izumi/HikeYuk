<?php
  include('session.php')
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

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="d-flex flex-column">
    
  <?php
      include('../dbConnect.php');
      mysqli_select_db($conn,"hikeyuk");

      $picture ="SELECT * FROM user WHERE email='$login_session'";
      $result = $conn->query($picture);

      while($row = $result->fetch_assoc()) {
        
        echo "
        <div class='profile'>
          <a href=''><img src='pic/".$row["pic"]."' alt='' class='img-fluid rounded-circle'></a>
          <h1 class='text-light'><a href='index.html'>".$row["username"]."</a></h1>
          <h1 class='text-light'><a href='index.html'>".$row["role"]."</a></h1>
          <div class='social-links mt-3 text-center'>
            <a href='".$row["twitter"]."' class='twitter'><i class='bx bxl-twitter'></i></a>
            <a href='".$row["facebook"]."' class='facebook'><i class='bx bxl-facebook'></i></a>
            <a href='".$row["instagram"]."' class='instagram'><i class='bx bxl-instagram'></i></a>
          </div>
        </div>";
           
      }
      
    
    ?>

      <nav id="navbar" class="nav-menu navbar">
        <ul>
          <li><a href="#about" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Biodata</span></a></li>
          <li><a href="#bestPhoto" class="nav-link scrollto "><i class="bx bx-user"></i> <span>Best View</span></a></li>
          <li><a href="#program" class="nav-link scrollto"><i class="bx bx-file-blank"></i><span>Program Sedia Ada</span></a></li>
          <li><a href="#daftar" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Daftar Pendakian</span></a></li>
          <li><a href="#guider" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Guider Yang Berdaftar</span></a></li>
          <li><a href="#setupAcc" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Account Setup</span></a></li>
          <li><center><a href="logout.php" class="nav-link scrollto"><i class="bx"></i> <span>LogOut</span></a></center></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>Bio Hiker</h2>
          
        <?php

          include('../dbConnect.php');
          mysqli_select_db($conn,"hikeyuk");

          $picture ="SELECT * FROM bioview WHERE email='$login_session'";
          $result = $conn->query($picture);

          while($row = $result->fetch_assoc()) {
 
                  echo "
                  <p>".$row["komen"]."</p>
              </div>

              <div class='row'>
              <div class='col-lg-4' data-aos='fade-right'>
            <img style='height: 500px;'src='pic/".$row["bioPic"]."' class='img-fluid' alt=''>
          </div>
          <div class='col-lg-8 pt-4 pt-lg-0 content' data-aos='fade-left'>
            <h3>".$row["username"]."</h3>
            <p class='fst-italic'>
            ".$row["komen"]."
            </p>
            <div class='row'>
              <div class='col-lg-6'>
                <ul>
                  <li><i class='bi bi-chevron-right'></i> <strong>Age:</strong> <span>".$row["age"]."</span></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>Phone Number:</strong> <span>".$row["phone"]."</span></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>Role:</strong> <span>".$row["role"]."<span></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>Gender:</strong> <span>".$row["gender"]."</span></li>
                </ul>
              </div>
              <div class='col-lg-6'>
                <ul>
                  <li><i class='bi bi-chevron-right'></i> <strong>Facebook:</strong><a  href='".$row["fb"]."' > <span>".$row["fb"]."</span></a></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>Twitter:</strong><a href='".$row["twitter"]."'><span>".$row["twitter"]."</span></a></li>
                  <li><i class='bi bi-chevron-right'></i> <strong>Instagram:</strong><a href='".$row["ig"]."'> <span>".$row["ig"]."</span></a></li>
                
                </ul>
              </div>
            </div>
            <p>
            </p>
          </div>
        </div>
                  ";

              }
        ?>
        <table class="table">
        <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Location</th>
      <th scope="col">Time</th>
      <th scope="col">Date</th>
      <th scope="col">Total Member</th>
      <th scope="col">Guider Name</th>
      <th scope="col">Guider Phone</th>
      <th scope="col">Comment</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    
        <?php
    include('../dbConnect.php');
    mysqli_select_db($conn,"hikeyuk");

    $sql ="SELECT * FROM userprogramview WHERE userEmail='$login_session' ";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
     if("".$row["status"].""=='Done')
        echo "
        <form action='doneProgram.php' method='post'>
      <tr>
        <th scope='row'><input type='hidden' name='id' value=".$row["Id"].">".$row["Id"]."</th>
        <td><input type='hidden' name='hiker' value=".$row["username"].">".$row["username"]."</td>
        <td><input type='hidden' name='location' value=".$row["location"].">".$row["location"]."</td>
        <td><input type='hidden' name='time' value=".$row["time"].">".$row["time"]."</td>
        <td><input type='hidden' name='date' value=".$row["date"].">".$row["date"]."</td>
        <td><input type='hidden' name='member' value=".$row["member"].">".$row["member"]."</td>
        <td><input type='hidden' name='guiderName' value=".$row["guiderName"].">".$row["guiderName"]."</td>
        <td><input type='hidden' name='guiderPhone' value=".$row["guiderPhone"].">".$row["guiderPhone"]."</td>
        <td><input type='hidden' name='comment' value=".$row["comment"].">".$row["comment"]."</td>
        <td><input type='hidden' name='comment' value=".$row["comment"].">".$row["status"]."</td>
        <input type='hidden' name='phone' value=".$row["phone"].">
       

        </tr> </form>";

    }

    echo "</tbody>
    </table>"
    ?>
          

      </div>
    </section><!-- End About Section -->
  <!-- ======= BestPhoto Section ======= -->
    
  <section id="bestPhoto" class="portfolio ">
      <div class="container" style="width:'300px;'">
      <div class="section-title">
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
            <div class="portfolio-img"><img src="../img/BukitBendera/DSC_2815.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Bendera</h4>
              <p>Pantai Teluk Mak Nik</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-BM">
            <div class="portfolio-img"><img src="../img/BukitBendera/21e5df25-50d6-48e8-8698-47037c5cf376.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Bendera</h4>
              <p>Pantai Teluk Mak Nik</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-BM">
            <div class="portfolio-img"><img src="../img/BukitBendera/c3a1d2e3-647a-4d5e-b2ae-fcd260ea22d4.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Bendera</h4>
              <p>Pantai Teluk Mak Nik</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-BM">
            <div class="portfolio-img"><img src="../img/BukitBendera/photo_2021-05-25_01-40-20.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Bendera</h4>
              <p>Pantai Teluk Mak Nik</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-BM">
            <div class="portfolio-img"><img src="../img/BukitBendera/photo_2021-05-25_01-40-08.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Harimau Menangis</h4>
              <p>Kemasik, Kemaman</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-HM">
            <div class="portfolio-img"><img src="../img/HarimauMenangis/25348149.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Harimau Menangis</h4>
              <p>Kemasik, Kemaman</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-HM">
            <div class="portfolio-img"><img src="../img/HarimauMenangis/27293435.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Harimau Menangis</h4>
              <p>Kemasik, Kemaman</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-HM">
            <div class="portfolio-img"><img src="../img/HarimauMenangis/eb3729dd-93c7-494b-85b3-0a133bb47c61.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Harimau Menangis</h4>
              <p>Kemasik, Kemaman</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-HM">
            <div class="portfolio-img"><img src="../img/HarimauMenangis/9ed4a844-ffe5-4ffc-aa2b-096b9234b84a.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Harimau Menangis</h4>
              <p>Kemasik, Kemaman</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="../img/JandaMandi/photo_2021-05-29_00-51-42.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="../img/JandaMandi/photo_2021-05-29_00-51-49.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="../img/JandaMandi/photo_2021-05-29_00-52-03.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="../img/JandaMandi/photo_2021-05-29_00-52-13.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="../img/JandaMandi/photo_2021-05-29_00-52-29.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div><div class="col-lg-4 col-md-6 portfolio-item filter-JM">
            <div class="portfolio-img"><img src="../img/JandaMandi/photo_2021-05-29_00-52-36.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Janda Mandi</h4>
              <p>Bukit Gemok</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-MD">
            <div class="portfolio-img"><img src="../img/MakDayang/89803973_00L27A0A5hvr2_QSBq1iVw7NaRVW6RMLaBYNspm-ly8.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Mak Dayang</h4>
              <p>Chukai, Kemaman</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-MD">
            <div class="portfolio-img"><img src="../img/MakDayang/download (1).jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Mak Dayang</h4>
              <p>Chukai Kemaman</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-MD">
            <div class="portfolio-img"><img src="../img/MakDayang/extra_large_0887bbad37516082bf8c6e2e2f2d58f0.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukti Mak Dayang</h4>
              <p>Chukai Kemaman</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-MD">
            <div class="portfolio-img"><img src="../img/MakDayang/21088669.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Bukit Mak Dayang</h4>
              <p>Chukai, Kemaman</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-TS">
            <div class="portfolio-img"><img src="../img/TelagaSimpul/5cd1cc0d-46d1-4aeb-a99e-b0891534d4f8.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Telaga Simpul</h4>
              <p>Pantai Marina</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-TS">
            <div class="portfolio-img"><img src="../img/TelagaSimpul/75da3153-7d65-4df4-bd4e-25444d1a56fc.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Telaga Simpul</h4>
              <p>Pantai Marina</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-TS">
            <div class="portfolio-img"><img src="../img/TelagaSimpul/7e05403d-05c4-4c30-8280-3457691b7f72.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Telaga Simpul</h4>
              <p>Pantai Marina</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-TS">
            <div class="portfolio-img"><img src="../img/TelagaSimpul/d77c08f8-0a82-4fb1-bc12-7f66044ef5a4.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Telaga Simpul</h4>
              <p>Pantai Marina</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-TS">
            <div class="portfolio-img"><img src="../img/TelagaSimpul/dc1ad605-cc07-469d-aa4f-ebb0ecb7f334.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Telaga Simpul</h4>
              <p>Pantai Marina</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-ME">
            <div class="portfolio-img"><img src="../img/Menderu/2020-08-26.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Menderu</h4>
              <p>Hutan Simpan Rasau</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-ME">
            <div class="portfolio-img"><img src="../img/Menderu/air-terjun-menderu.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Menderu</h4>
              <p>Hutan Simpan Rasau</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-ME">
            <div class="portfolio-img"><img src="../img/Menderu/photo_2021-05-29_00-49-44.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Menderu</h4>
              <p>Hutan Simpan Rasau</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-ME">
            <div class="portfolio-img"><img src="../img/Menderu/Hutan Lipur Menderu.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Menderu</h4>
              <p>Hutan Simpan Rasau</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 portfolio-item filter-ME">
            <div class="portfolio-img"><img src="../img/Menderu/photo_2021-05-29_00-50-35.jpg" class="img-fluid" alt=""></div>
            <div class="portfolio-info">
              <h4>Menderu</h4>
              <p>Hutan Simpan Rasau</p>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End BestView Section -->

    <!-- ======= Resume Section ======= -->
    <section id="program" class="program">
      <div class="container">

        <div class="section-title">
          <h2>Program</h2>
          <p></p>
        </div>

        <div class="row">
        <table class="table">
        <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Location</th>
      <th scope="col">Time</th>
      <th scope="col">Date</th>
      <th scope="col">Total Member</th>
      <th scope="col">Guider Name</th>
      <th scope="col">Guider Phone</th>
      <th scope="col">Comment</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    
        <?php
    include('../dbConnect.php');
    mysqli_select_db($conn,"hikeyuk");

    $sql ="SELECT * FROM userprogramview WHERE userEmail='$login_session' ";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) {
     if("".$row["status"].""=='accept')
        echo "
        <form action='doneProgram.php' method='post'>
      <tr>
        <th scope='row'><input type='hidden' name='id' value=".$row["Id"].">".$row["Id"]."</th>
        <td><input type='hidden' name='hiker' value=".$row["username"].">".$row["username"]."</td>
        <td><input type='hidden' name='location' value=".$row["location"].">".$row["location"]."</td>
        <td><input type='hidden' name='time' value=".$row["time"].">".$row["time"]."</td>
        <td><input type='hidden' name='date' value=".$row["date"].">".$row["date"]."</td>
        <td><input type='hidden' name='member' value=".$row["member"].">".$row["member"]."</td>
        <td><input type='hidden' name='guiderName' value=".$row["guiderName"].">".$row["guiderName"]."</td>
        <td><input type='hidden' name='guiderPhone' value=".$row["guiderPhone"].">".$row["guiderPhone"]."</td>
        <td><input type='hidden' name='comment' value=".$row["comment"].">".$row["comment"]."</td>
        <input type='hidden' name='phone' value=".$row["phone"].">
        <td><input type='hidden' name='status' value='Done'><input style='background-color: rgb(175, 231, 128,1);'class='btn btn-succes' value='DONE' type='submit'/></td>
    
      

        </tr> </form>";

    }

    echo "</tbody>
    </table>"
    ?>
  
      </div>
    </section><!-- End Resume Section -->

  

    <!-- ======= Services Section ======= -->
    <section id="daftar" class="daftar">
      <div class="container">

        <div class="section-title">
          <h2>Daftar Pendakian Anda</h2>
          <p>Daftar Pendakian anda untuk memudahkan perjalanan anda</p>
        </div>

     
    <?php
       include('../dbConnect.php');
       mysqli_select_db($conn,"hikeyuk");
 
       $picture ="SELECT * FROM user WHERE email='$login_session'";
       $result = $conn->query($picture);
 
       while($row = $result->fetch_assoc()) {
         echo " <center><div class='col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch'>
         <form action='addProgram.php' method='POST'>
          <div class='row'> 
           <fieldset disabled>
             <div class='form-group' style='width:'>
               <label for='disabledTextInput' class='form-label'>Email</label>
               <input type='text' id=''name='email' class='form-control' value='".$row["email"]."' placeholder='".$row["email"]."'>
             </div>
           </fieldset disabled>
             <div class='form-group' style='width:'>
               <label for='' class='form-label'>Username</label>
               <input type='text' id='' class='form-control btn-light'name='username' value='".$row["username"]."' placeholder='".$row["username"]."'>
             </div>
             <div class='form-group' style='width:'>
               <label for='' class='form-label'>No Phone</label>
               <input type='text' id='' class='form-control btn-info'name='phone'value='".$row["noPhone"]."' placeholder='".$row["noPhone"]."'>
             </div>
             <div class='form-group' style='width:'>
               <label for='' class='form-label'>Time (12 hour : eg = 5.00 pm)</label>
               <input type='time' class='form-control btn-input'id='appt' name='time'  required> </div>
             <div class='form-group' style='width:'>
               <label for='' class='form-label'>Date</label>
               <input type='date' id='' class='form-control btn-warning' name='date' value=''>
             </div>
             <div class='form-group' style='width:'>
               <label for='' class='form-label '>Total Member Join</label>
               <input type='number' id='' class='form-control btn-danger'name='total' value=''>
             </div>
              <br></br>
             <div class='form-group' style=''>
             <label for='' class='form-label'>Pilih Tempat</label>
             <select class='form-select btn-success' name='tempat' aria-label=''>
                  <option selected>Tempat Mendaki</option>
                  <option value='Bukit Bendera'>Bukit Bendera</option>
                  <option value='Mak Dayang'>Mak Dayang</option>
                  <option value='Telaga Simpul'>Telaga Simpul</option>
                  <option value='Janda Mandi'>Janda Mandi</option>
                  <option value='Harimau Menangis'>Harimau Menangis</option>
                  <option value='Menderu'>Menderu</option>
            </select>
            </div><br></br>
            
             <center class='fieldset'><br>
             <button style='background-color: rgb(175, 231, 128,1);'class='btn btn-succes' type='submit' value='Change Detail'>DAFTAR</button>
          </center>
           </div>       
           

         </form>
         
             
       </div></center> ";
       
      }
    ?>

       
      </div>
    </section><!-- End Services Section -->

    <section id="guider" class="guider">
      <div class="container">

        <div class="section-title">
          <h2>Guider Yang Berdaftar</h2>
        </div>

      <?php
       include('../dbConnect.php');
       mysqli_select_db($conn,"hikeyuk");
 
       $picture ="SELECT * FROM guiderdetail";
       $result = $conn->query($picture);
 
       while($row = $result->fetch_assoc()) {
       echo"
       <div class='testimonials-slider swiper-container' data-aos='fade-up' data-aos-delay='100'>
       <div class='swiper-wrapper'>

       <div class='card' style='width: 18rem; margin-left:5%;'>
             <img src='pic/".$row["pic"]."'style='height:250px;' class='card-img-top' >
         <div class='card-body'>
             <h5 class='card-title'>".$row["name"]."</h5>
             <i class='bx bxs-quote-alt-left quote-icon-left'></i>
            ".$row["komen"]."
             <i class='bx bxs-quote-alt-right quote-icon-right'></i>
             <p class='card-text' style='height:;'>".$row["age"]."</p>
             <div class='social-links mt-3 text-center'>
             <a href='".$row["twitter"]."' class='twitter'><i class='bx bxl-twitter'></i></a>
             <a href='".$row["fb"]."' class='facebook'><i class='bx bxl-facebook'></i></a>
             <a href='".$row["ig"]."' class='instagram'><i class='bx bxl-instagram'></i></a>
           </div>
         </div>
     </div>
       ";
      }
      
      
      ?>
    
          </div>
         
        </div>
      </div>
    </section>
    <section id="setupAcc" class="setupAcc">
      <div class="container">
        <div class="section-title">
          <h2>Setup Your Account</h2>
          <p></p>
        </div>
        <div class="row" data-aos="fade-in">

    <?php
      include('../dbConnect.php');
      mysqli_select_db($conn,"hikeyuk");

      $picture ="SELECT * FROM user WHERE email='$login_session'";
      $result = $conn->query($picture);

      while($row = $result->fetch_assoc()) {
        
        echo "
        <div class='col-lg-5 d-flex align-items-stretch'>
            <div class='info'>
              <div class='address'>
                <i class='bi bi-geo-alt'></i>
                <h4>Username:</h4>
                <p>".$row["username"]."</p>
              </div>

              <div class='email'>
                <i class='bi bi-envelope'></i>
                <h4>Email:</h4>
                <p>".$row["email"]."</p>
              </div>

              <div class='phone'>
                <i class='bi bi-phone'></i>
                <h4>No Phone:</h4>
                <p>".$row["noPhone"]."</p>
              </div>

              <form action='picUpdate.php' method='post'enctype='multipart/form-data'>
              <div class='mb-3'>
                <label for='formFile' class='form-label'>Change Pic</label>
                <input class='form-control' name='picture' type='file' id='picture'>
              </div>
              <center class='fieldset'>
              <input type='submit' style='background-color: rgb(175, 231, 128,1);'class='btn btn-succes' value='Upload Picture'/>
              </center>
            </form> <br>

            <form action='bioPic.php' method='post'enctype='multipart/form-data'>
                  <div class='mb-3'>
                    <label for='formFile' class='form-label'>Bio Pic</label>
                    <input class='form-control' style='width:280px;' name='picture' type='file' id='picture'>
                  </div>
                  
              <center><input type='submit' style='background-color: rgb(175, 231, 128,1);'class='btn btn-succes' value='Upload Picture'/></center>
                  
            </form>

            </div>
          </div>";       
      }
      
    
    ?>
        

    <?php
       include('../dbConnect.php');
       mysqli_select_db($conn,"hikeyuk");
 
       $picture ="SELECT * FROM user WHERE email='$login_session'";
       $result = $conn->query($picture);
 
       while($row = $result->fetch_assoc()) {
         echo " <div class='col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch'>
         <form action='updateUser.php' method='POST'>
          <div class='row'> 
           <fieldset disabled>
             <div class='form-group' style='width:'>
               <label for='disabledTextInput' class='form-label'>Email</label>
               <input type='text' id=''name='email' class='form-control' placeholder='".$row["email"]."'>
             </div>
           </fieldset disabled>
             <div class='form-group' style='width:'>
               <label for='' class='form-label'>Username</label>
               <input type='text' id='' class='form-control'name='username' value='".$row["username"]."' placeholder='".$row["username"]."'>
             </div>
             <div class='form-group' style='width:'>
               <label for='' class='form-label'>No Phone</label>
               <input type='text' id='' class='form-control'name='phone'value='".$row["noPhone"]."' placeholder='".$row["noPhone"]."'>
             </div>
             <div class='form-group' style='width:'>
               <label for='' class='form-label'>Age</label>
               <input  class='form-control' type='number' id='age' name='age' min='15' max='90' value='".$row["Age"]."' placeholder='".$row["Age"]."'>
             </div>
             <div class='form-group' style='width:'>
               <label for='' class='form-label'>Facebook</label>
               <input type='text' id='' class='form-control' name='facebook' value='".$row["facebook"]."'>
             </div>
             <div class='form-group' style='width:'>
               <label for='' class='form-label'>Instagram</label>
               <input type='text' id='' class='form-control'name='instagram' value='".$row["instagram"]."'>
             </div>
             <div class='form-group' style='width:'>
               <label for='' class='form-label'>Twitter</label>
               <input type='text' id='' class='form-control'name='twitter' value='".$row["twitter"]."'>
             </div><br></br>
             <div class='form-group' >
             <label for='' class='form-label'>Comment</label>
             <input type='text' id='' class='form-control'name='comment'value=''placeholder='Your Motivate'>
          </div>
            
             <center class='fieldset'><br>
             <button style='background-color: rgb(175, 231, 128,1);'class='btn btn-succes' type='submit' value='Change Detail'>UPDATE DETAIL</button>
          </center>
           </div>       
           

         </form>
         
             
       </div> ";
       
      }
    ?>
    
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>HikeYuk</span></strong>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/iportfolio-bootstrap-portfolio-websites-template/ -->
        Designed by <a href="https://bootstrapmade.com/">Design</a>
      </div>
    </div>
  </footer><!-- End  Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/typed.js/typed.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>