<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Product - Bale Classy Outfit</title>
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

      <h1 class="logo me-auto me-lg-0"><a href="index-admin.php">Bale Classy</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index-after.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index-admin.php">Home</a></li>
          <li><a href="product-admin.php">Product</a></li>
          <li><a href="category-admin.php">Category</a></li>
          <li><a href="brand-admin.php">Brand</a></li>
          <li><a href="buying-admin.php">Buying</a></li>
          <li><a href="selling-admin.php">Selling</a></li>
          <li><a href="report-admin.php" class="active">Report</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div id="corner" class="navbar-corner">
        <a class="navbar-corner2" href="profile-admin.php"><i class="bi bi-person-circle"></i></a>
      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">
    
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Report of sale</h2>
            <p>Here is the full record of <strong>Buying </strong> report</p>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Date</th>
              <th scope="col">Admin</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              include "koneksi.php";
              $a = "SELECT * FROM buying"; //ganti selling
              // $a = "SELECT a.name_prod, a.qty_prod, b.date_buy, b.id_user FROM buying a JOIN report_buy b ON a.id_buy=b.id_buy";
              $b = $koneksi->query($a);
                while ($c = $b -> fetch_array()) {
                  ?>
                  <tr>
                      <th scope="row"><?php echo $no++; ?></th>
                      <td><?php echo $c['name_prod']; ?></td>
                      <td><?php echo $c['qty_prod']; ?></td>
                      <td><?php echo $c['date_buy']; ?></td>
                      <td><?php echo $c['id_user']; ?></td>
                  </tr>
                  <?php
                }
              ?>
          </tbody>
        </table>

        <div class="section-title mt-5">
            <h2 >Report of Purchase</h2>
            <p>Here is the full record of <strong>Selling </strong> report</p>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name Product</th>
              <th scope="col">Quantity</th>
              <th scope="col">Date</th>
              <th scope="col">Buyer</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              include "koneksi.php";
              $a = "SELECT a.name_prod, b.qty_cart, b.date_sell, b.id_user FROM product a JOIN cart b ON a.id_prod=b.id_prod";
              $b = $koneksi->query($a);
                while ($c = $b -> fetch_array()) {
                  ?>
                   <tr>
                      <th scope="row"><?php echo $no++; ?></th>
                      <td><?php echo $c['name_prod']; ?></td>
                      <td><?php echo $c['qty_cart']; ?></td>
                      <td><?php echo $c['date_sell']; ?></td>
                      <td><?php echo $c['id_user']; ?></td>
                  </tr>
                  <?php
                }
              ?>
          </tbody>
        </table>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Alya Fitria</span></strong>. All Rights Reserved
      </div>
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