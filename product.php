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

      <h1 class="logo me-auto me-lg-0"><a href="index-buyer.php">Bale Classy</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index-buyer.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index-buyer.php">Home</a></li>
          <li><a href="product.php" class="active">Product</a></li>
          <li><a href="cart.php">Cart</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div id="corner" class="navbar-corner">
        <a class="navbar-corner2" href="profile.php"><i class="bi bi-person-circle"></i></a>
      </div>

    </div>

  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Products</h2>
          <p>Happy shopping at Bale Classy, a place where you can get <strong>quality goods</strong> at <strong>affordable prices</strong></p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php
            include "koneksi.php";
            $no = 1;
            $a = "SELECT * FROM product order by id_prod ASC";
            $b = $koneksi->query($a);
              while ($c = $b -> fetch_array()) {
              ?>
          
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
              <div class="portfolio-wrap">
                <div class="img-fluid" alt="">
                  <?php echo "<img src='assets/img/product/".$c['pict']."' height='300'>"; ?>
                </div>
                <div class="portfolio-info">
                  <h4><?php echo $c['name_prod']; ?></h4>
                  <p><?php echo $c['category']; ?></p>
                  <div class="portfolio-links">
                    <a href="product-details.php?id_prod=<?php echo $c['id_prod']; ?>" class="portfolio-details-lightbox" data-glightbox="type: external" title="See Product Details"><i class="bx bx-link"></i></a>
                  </div>
                </div>
              </div>
            </div>

          <?php } ?>
        </div>
      </div>
    </section><!-- End Portfolio Section -->

    <!-- Add-Prod Form -->
    <div class="modal fade" id="ModalAddCart" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title">Add To Cart</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label>Are you sure want to add product to cart?</label>
            </div>
            <div class="modal-footer">
              <button type="submit" name="addcart" class="btn btn-modal mx-auto w-100 text-center">Yes</button>
            </div>
          </form>
          <?php
            include "koneksi.php";
            if(isset($_POST['addcart'])) {
              $id_cart = $_POST['id_cart'];
              $kode_prod = $_POST['kode_prod'];
              $name_prod = $_POST['name_prod'];
              $category = $_POST['category'];
              $brand = $_POST['brand'];
              $qty_prod = $_POST['qty_prod'];
              $price_prod = $_POST['price_prod'];
              $deskripsi = $_POST['deskripsi'];
              
              $sql = "INSERT INTO cart (id_cart) VALUES ('$id_cart')";
              $a = $koneksi -> query($sql);
              
              if ($a == true){
                  echo "<script>alert('Product Added To Cart Successfully');
                  window.location.href=('product.php');</script>";
              } else {
                  echo "<script>alert('Product Failed Added To Cart');
                  window.location.href=('product.php');</script>";
              }
            }
          ?>
        </div>
      </div>
    </div>
    <!-- End Modal Add-Cart -->

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