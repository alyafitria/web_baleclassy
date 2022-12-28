<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Product Details - Bale Classy</title>
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

  <main id="main">

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container">
        <?php
          include "koneksi.php";
          $id_prod = $_GET['id_prod'];
          
          $no = 1;
          $a = "SELECT * FROM product WHERE id_prod='$id_prod' ";
          $b = $koneksi->query($a);
            while ($c = $b -> fetch_array()) {
            ?>

          <div class="row gy-4">
            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper">
                <div class="swiper-wrapper align-items-center">
                  <?php echo "<img src='assets/img/product/".$c['pict']."'>"; ?>
                </div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="portfolio-info">
                <h3><?php echo $c['name_prod']; ?></h3>
                <ul>
                  <li><strong>Category</strong> : <?php echo $c['category']; ?></li>
                  <li><strong>Brand</strong> : <?php echo $c['brand']; ?></li>
                  <li><strong>Price</strong> : <?php echo $c['price_prod']; ?></li>
                  <li><strong>Stock</strong> : <?php echo $c['qty_prod']; ?></li>
                  <li><strong>Description</strong>: <?php echo $c['deskripsi']; ?></li>
                  <li></li>
                <form action="" method="POST">
                  <li><input type="number" name="qty_cart" class="form-control" placeholder="Enter Quantity"/></li>
                </ul>
                
                  <button type="submit" name="addcart" class="btn btn-modal mx-auto w-100 text-center"><i class="bi bi-cart2"></i>  Add to Cart</button>
                  <!-- <a href="" class="btn btn-modal btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $c['id_prod']; ?>"><i class="bi bi-cart2"></i> Add to Cart</a> -->
                </form>
                <?php
                  include "koneksi.php";

                  if(isset($_POST['addcart'])) {
                    $qty_cart = $_POST['qty_cart'];
                    $id_prod = $_GET['id_prod'];
                    $subtot_cart = $c['price_prod']*$qty_cart;
                    
                    if($qty_cart >= 1){
                      $d = "SELECT * FROM cart WHERE id_prod='$id_prod' ";
                      $e = $koneksi->query($d);
                      $f = mysqli_num_rows($e);
                      $date_sell = date("Y-m-d");
                      $id_user = $_SESSION["buyer"]['name'];
                      
                      if($f<1) {
                        $sql_insert = "INSERT INTO cart (id_prod,qty_cart,subtot_cart,date_sell,id_user) VALUES('$id_prod','$qty_cart','$subtot_cart','$date_sell','$id_user')";
                        $a = $koneksi -> query($sql_insert);
                        if ($a == true){
                          echo "<script>alert('Product Added to Cart Successfully');</script>";
                        } else {
                          echo "<script>alert('Product Failed Added to Cart');</script>";
                        }
                      } else { 
                        $sql_update = "UPDATE cart SET qty_cart=qty_cart+$qty_cart, subtot_cart=subtot_cart+$subtot_cart";
                        $a = $koneksi -> query($sql_update);
                        if ($a == true){
                          echo "<script>alert('Product Added to Cart Successfully');</script>";
                        } else {
                          echo "<script>alert('Product Failed Added to Cart');</script>";
                        }
                      } 
                    }else{
                      echo "<script>alert('Insert a Valid Quantity');</script>";
                    }
                  }
                ?>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

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