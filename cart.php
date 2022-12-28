<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Cart - Bale Classy Outfit</title>
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
          <li><a href="product.php">Product</a></li>
          <li><a href="cart.php" class="active">Cart</a></li>
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
          <h2>Shopping Cart</h2>
          <p>Hi Dear, here is <strong>your cart</strong> continue <strong>for shopping?</strong></p>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col"></th>
              <th scope="col"></th>
              <th scope="col">Name</th>
              <th scope="col">Unit Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Subtotal</th>              
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <?php
              include "koneksi.php";
              $no = 1; $total = 0;
              $a = "SELECT a.pict, a.name_prod, a.price_prod, b.id_cart, b.qty_cart, b.subtot_cart FROM product a JOIN cart b ON a.id_prod=b.id_prod";
              $b = $koneksi->query($a);
                while ($c = $b -> fetch_array()) {
                  ?>
                  <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo "<img src='assets/img/product/".$c['pict']."' width='100' height='100'>"; ?></td>
                    <td><?php echo $c['name_prod']; ?></td>
                    <td><?php echo number_format($c['price_prod']); ?></td>
                    <td><?php echo $c['qty_cart']; ?></td>
                    <td><?php echo number_format($c['subtot_cart']); ?></td>
                    <td>
                      <a href="?page=cart&deletecart=<?php echo $c['id_cart']; ?>" class="btn btn-danger btn-sm" onclick="return confirm ('yakin mo apus?')">Remove From Cart</a>
                    </td>
                  </tr>
                  <?php
                }
              ?>
              <?php 
              $a = "SELECT * FROM cart";
              $b = $koneksi->query($a);
                while ($c = $b -> fetch_array()) {
                  $total+=$c['subtot_cart'];
                }?>
              <tr>
                <th colspan="4"></th>
                <th>Total : </th>
                <th><?php echo number_format($total); ?></th>
                <th>
                  <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalCO">Check Out</a>
                </th>
              </tr>
          </tbody>
        </table>
       
      </div>
    </section><!-- End Portfolio Section -->

    <?php
    include "koneksi.php";
      if(isset($_GET['deletecart'])) {
        $id_cart = $_GET['deletecart'];
        
        if(!empty($id_cart)){
          $sql_delete = "DELETE FROM cart WHERE id_cart='$id_cart'";
          $a = $koneksi -> query($sql_delete);

          if ($a == true){
            echo "<script>alert('Product Deleted Successfully');
            window.location.href=('cart.php');</script>";
          } else {
            echo "<script>alert('Product Failed Deleted');
            window.location.href=('cart.php');</script>";
          }

        }
      }?>

<?php 
                $province = "https://api.rajaongkir.com/starter/province?key=8f147cbf033d8f8428398eac476a6c7d";
                $data_province = file_get_contents($province);
                $data_prov = json_decode($data_province, true);

                // $id_prov = $_POST['id_prov'];
                $cities = "https://api.rajaongkir.com/starter/city?key=8f147cbf033d8f8428398eac476a6c7d";
                $data_cities = file_get_contents($cities);
                $data_city = json_decode($data_cities, true);
              ?>
    <!-- Checkout Form -->
    <div class="modal fade" id="ModalCO" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
              <form action="" method="POST">
                <div class="modal-header">
                <h5 class="modal-title">Check OUt</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="mb-2">
                  <label>Name</label>
                  <input type="text" class="form-control" readonly value="<?php echo $_SESSION["buyer"]['name']?>"/>
                </div>
                <div class="mb-3">
                  <label>Phone</label>
                  <input type="text" class="form-control" readonly value="<?php echo $_SESSION["buyer"]['phone']?>"/>
                </div>
                <div class="mb-3">
                  <label>Address</label>
                  <input type="text" class="form-control" readonly value="<?php echo $_SESSION["buyer"]['address']?>"/>
                  <input type="text" name="address" class="form-control" placeholder="Enter Address"/>
                </div>

                <div class="mb-3">
                  <label>Province</label>
                  <select class="form-select" name="id_prov">
                    <?php foreach($data_prov['rajaongkir']['results'] as $prov){?>
                      <option value="<?php echo $prov['province_id'];?>"> <?php echo $prov['province'];?> </option>
                    <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label>City</label>
                  <select class="form-select" name="city">
                    <?php foreach($data_city['rajaongkir']['results'] as $city){?>
                      <option value="<?php echo $city['city_id'];?>"> <?php echo $city['city_name'];?> </option>
                    <?php } ?>
                  </select>
                </div>
                </div>
                <div class="modal-footer pt-4">
                  <button type="submit" name="checkout" class="btn btn-modal mx-auto w-100 text-center">Check Out</button>
                </div>
              </form>


              <?php
                include "koneksi.php";
                if(isset($_POST['checkout'])) {

                  // foreach($c['id_cart'] as $id_prod => $qty_cart){
                  //   $total+=$c['subtot_cart'];
                  //   $sql_sell = "INSERT INTO selling (id_prod,qty_sell,total_sell) VALUES('$id_prod','$qty_cart','$total')";
                  //   $a = $koneksi -> query($sql_sell);
                  //   if ($a == true){
                  //     echo "<script>alert('Insert to Selling Successfully');
                  //     window.location.href=('cart.php');</script>";
                  //   } else {
                  //     echo "<script>alert('Insert to Selling Failed');
                  //     window.location.href=('cart.php');</script>";
                  //   }
                  // }

                  // $a = "SELECT * FROM cart";
                  // $b = $koneksi->query($a);
                  // while ($c = $b -> fetch_array()) {
                  //   $total+=$c['subtot_cart'];
                  //   $id_prod = $c['id_prod'];
                  //   $qty_cart = $c['qty_cart'];

                  //   $sql_sell = "INSERT INTO selling (id_prod,qty_sell,total_sell) VALUES('$id_prod','$qty_cart','$total')";
                  //   $a = $koneksi -> query($sql_sell);
                  //   if ($a == true){
                  //     echo "<script>alert('Insert to Selling Successfully');
                  //     window.location.href=('cart.php');</script>";
                  //   } else {
                  //     // trigger_error("periksa perintah sql annda: " . $sql_sell . "eror: " . $koneksi->error, E_USER_ERROR);
                  //     echo "<script>alert('Insert to Selling Failed');
                  //     window.location.href=('cart.php');</script>";
                  //   }
                  // }

                  // $id_sell = $koneksi->insert_id;
                  // $id_buyer = $_SESSION["buyer"]['id_buyer'];
                  // $date_sell = date("Y-m-d");
                  // $address_buyer = $_POST['address'];

                  // $sql_report = "INSERT INTO report_sell (id_sell,id_buyer,date_sell,address_buyer) VALUES('$id_sell','$id_buyer','$date_sells','$address_buyer')";
                  // $b = $koneksi -> query($sql_report);
                  // if ($b == true){
                  //     echo "<script>alert('Check Out Successfully');
                  //     window.location.href=('cart.php');</script>";
                  // } else {
                  //     echo "<script>alert('Check Out Failed');
                  //     window.location.href=('cart.php');</script>";
                  // }
                }
              ?>
            </div>
        </div>
    </div>
    <!-- End Modal CO -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class ="fixed-bottom">
    <div class="container">
      <div class="copyright ">
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