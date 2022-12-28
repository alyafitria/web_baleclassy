<?php session_start(); 
include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Bale Classy Outfit</title>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Kelly - v4.7.0
  * Template URL: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-php-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex justify-content-between align-items-center">

      <h1 class="logo me-auto me-lg-0"><a href="index-after.php">Bale Classy</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index-after.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <!-- <li><a data-bs-toggle="modal" data-bs-target="#ModalLogin">Home</a></li>
          <li><a data-bs-toggle="modal" data-bs-target="#ModalLogin">Shop</a></li>
          <li><a data-bs-toggle="modal" data-bs-target="#ModalLogin">Product</a></li>
          <li><a data-bs-toggle="modal" data-bs-target="#ModalLogin">Category</a></li>
          <li><a data-bs-toggle="modal" data-bs-target="#ModalLogin">Brand</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div id="corner" class="navbar-corner">
        <!-- <a class="navbar-corner2" data-bs-toggle="modal" data-bs-target="#ModalLogin"><i class="bi bi-cart2"></i></a>
        <a class="navbar-corner2" data-bs-toggle="modal" data-bs-target="#ModalLogin"><i class="bi bi-person-circle"></i></a> -->
        <a class="btn-about" data-bs-toggle="modal" data-bs-target="#ModalLogin">Login</a>
      </div>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container d-flex flex-column align-items-center" data-aos="zoom-in" data-aos-delay="100">
      <h1>Welcome to Bale Classy</h1>
      <h2>payless yet still classy</h2>
      <a href="" class="btn-about" data-bs-toggle="modal" data-bs-target="#ModalLogin">Login Here</a>
    </div>
  </section><!-- End Hero -->

  <!-- Login Form -->
    <div class="modal fade" id="ModalLogin" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <!-- Login Form -->
          <form action="" method="POST">
            <div class="modal-header">
              <h5 class="modal-title">Login to Your Account</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="">
                <label for="Username">Username<span class="text-danger">*</span></label>
              </div>
              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">@</span>
                <input type="text" name="usn" class="form-control" placeholder="Enter Username" aria-label="Username" aria-describedby="addon-wrapping">
              </div>
              <div class="mb-3">
                <label for="Password">Password<span class="text-danger">*</span></label>
                <input type="password" name="pass" class="form-control" id="Password" placeholder="Enter Password"/>
              </div>
            </div>
            <div class="modal-footer pt-4">
              <button type="submit" name="login" class="btn btn-modal mx-auto w-100 text-center">Login</button>
            </div>
            <p class="text-center">Not yet account, <a href="" data-bs-toggle="modal" data-bs-target="#ModalRegister">Signup</a></p>
          </form>
          <?php
            include "koneksi.php";
            if(isset($_POST['login'])) {
                $usn = $_POST['usn'];
                $pass = $_POST['pass'];
                $sql = mysqli_query($koneksi, "SELECT * FROM admin WHERE usn='$usn' AND pass='$pass'");
                if(mysqli_num_rows($sql) == 1){
                    $a = $sql->fetch_array();
                
                    if($a['role'] == "Admin"){
                        $_SESSION['admin'] = $a;
                        $_SESSION['role'] = "Admin";
                        echo "<script>alert('Login Sebagai Admin Berhasil');
                        window.location.href=('index-admin.php');</script>";
                    }else if($a['role'] == "Buyer"){
                        $_SESSION['buyer'] = $a;
                        $_SESSION['role'] = "Buyer";
                        echo "<script>alert('Login Sebagai Buyer Berhasil');
                        window.location.href=('index-buyer.php');</script>";
                    }else{
                        echo "<script>alert('Login Gagal');
                        window.location.href=('index.php');</script>";
                    }
                
                }else{
                    echo "<script>alert('Username atau Password salah');
                    window.location.href=('index.php');</script>";
                }
            }
          ?>
        </div>
      </div>
    </div>
  <!-- End Modal Login -->

  <!-- Modal Success Login -->
  <div class="modal fade" id="SuccLog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Success</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Anda Berhasil Login</div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button> -->
          <a href="index-after.php" class="btn btn-secondary">OK</a>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Success Login -->

  <!-- Register Form -->
    <div class="modal fade" id="ModalRegister" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h5 class="modal-title">Register</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label>Name<span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required/>
              </div>
              <div class="mb-3">
                <label>Email<span class="text-danger">*</span></label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email" required/>
              </div>
              <div class="mb-3">
                <label>Phone<span class="text-danger">*</span></label>
                <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" required/>
              </div>
              <div class="">
                <label for="Username">Username<span class="text-danger">*</span></label>
              </div>
              <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping">@</span>
                <input type="text" name="usn" class="form-control" placeholder="Enter Username" aria-label="Username" aria-describedby="addon-wrapping" required>
              </div>
              <div class="mb-3">
                <label>Password<span class="text-danger">*</span></label>
                <input type="password" name="pass" class="form-control" placeholder="Enter Password" required/>
              </div>
              <div class="mb-3">
                <label>Role<span class="text-danger">*</span></label>
                <select class="form-select" name="role" required>
                  <option value="Admin">Admin</option>
                  <option value="Buyer">Buyer</option>
                </select>
              </div>
            </div>
            <div class="modal-footer pt-4">
              <button type="submit" name="register" class="btn btn-modal mx-auto w-100 text-center">Register</button>
            </div>
            <p class="text-center">Have account, <a href="" data-bs-toggle="modal" data-bs-target="#ModalLogin">Sign In</a></p>
          </form>
          <?php
            include "koneksi.php";
            if(isset($_POST['register'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $usn = $_POST['usn'];
                $pass = $_POST['pass'];
                $role = $_POST['role'];
                
                $sql = "INSERT INTO admin(name,email,phone,usn,pass,role) VALUES ('$name','$email','$phone','$usn','$pass','$role')";
                $a = $koneksi -> query($sql);
                
                if ($a == true){
                    echo "<script>alert('Anda Sukses Registrasi, Silahkan Login');
                    window.location.href=('index.php');</script>";
                } else {
                    echo "<script>alert('Anda Gagal Registrasi');
                    window.location.href=('index.php');</script>";
                }
            }
          ?>
        </div>
      </div>
    </div>
  <!-- End Modal Register -->

  <!-- Modal Success Register -->
    <div class="modal fade" id="SuccReg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Success</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">Anda Berhasil Registrasi, Silahkan Login</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ModalLogin">Login</button>
          </div>
        </div>
      </div>
    </div>
  <!-- End Modal Success Register -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Alya Fitria</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/kelly-free-bootstrap-cv-resume-php-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div> -->
    </div>
  </footer><!-- End  Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>