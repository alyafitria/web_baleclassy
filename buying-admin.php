<?php session_start(); ?>

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
          <li><a href="supp-admin.php">Supplier</a></li>
          <li><a href="buying-admin.php" class="active">Buying</a></li>
          <li><a href="selling-admin.php">Selling</a></li>
          <li><a href="report-admin.php">Report</a></li>
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
      <div class="container w-50" data-aos="fade-up">

        <div class="section-title">
          <a href="" data-bs-toggle="modal" data-bs-target="#ModalAddProd"><h2 style="color: #444444;">Buying Product</h2></a>
          <p>Hola vellas, should we add <strong>A New Stock</strong> on our product?</p>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Quantity</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              include "koneksi.php";
              $a = "SELECT * FROM buying";
              $b = $koneksi->query($a);
                while ($c = $b -> fetch_array()) {
                  ?>
                  <tr>
                      <th scope="row"><?php echo $no++; ?></th>
                      <td><?php echo $c['name_prod']; ?></td>
                      <td><?php echo $c['qty_prod']; ?></td>
                      <td>
                        <a href="?page=buying&delete=<?php echo $c['id_buy']; ?>" class="btn btn-danger btn-sm" onclick="return confirm ('yakin mo apus?')">Delete</a>
                      </td>
                  </tr>
                  <?php
                }
              ?>
          </tbody>
        </table>


      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

  <!-- Add-Prod Form -->
    <?php
      include "koneksi.php";
      $query_prod = "SELECT * FROM product";
      $result_prod = mysqli_query($koneksi, $query_prod);
    ?>
    <div class="modal fade" id="ModalAddProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h5 class="modal-title">Add Product's Stock</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label>Name</label>
                <select class="form-select" name="name_prod">
                  <option>--Choose Product to Add--</option>
                  <?php while($row = mysqli_fetch_array($result_prod)):; ?>
                    <option value="<?php echo $row[2];?>"> <?php echo $row[2];?> </option>
                  <?php endwhile;?>
                </select>
              </div>
              <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="qty_prod" class="form-control" placeholder="Enter Quantity Product"/>
              </div>
            </div>
            <div class="modal-footer pt-4">
              <button type="submit" name="addqty" class="btn btn-modal mx-auto w-100 text-center">Save</button>
            </div>
          </form>
          <?php
            include "koneksi.php";
            if(isset($_POST['addqty'])) {
              $id_buy = $_POST['id_buy'];
              $name_prod = $_POST['name_prod'];
              $qty_prod = $_POST['qty_prod'];
              $date_buy = date("Y-m-d");
              $id_user = $_SESSION["admin"]['name'];
              $sql = "INSERT INTO buying(name_prod,qty_prod,date_buy,id_user) VALUES ('$name_prod','$qty_prod','$date_buy','$id_user')";
              $a = $koneksi -> query($sql);
              
              if ($a == true){
                  echo "<script>alert('Stocks Added Successfully');
                  window.location.href=('buying-admin.php');</script>";
              } else {
                  echo "<script>alert('Stocks Failed Added');
                  window.location.href=('buying-admin.php');</script>";
              }

              // $id_buy = $koneksi->insert_id;
              // $id_user = $_SESSION["admin"]['name'];
              // $date_buy = date("Y-m-d");
              // $sql = "INSERT INTO report_buy(id_buy,date_buy,id_user) VALUES ('$id_buy','$date_buy','$id_user')";
              // $a = $koneksi -> query($sql);

              // if ($a == true){
              //   echo "<script>alert('Insert to Report Buy Successfully');
              //   window.location.href=('buying-admin.php');</script>";
              // } else {
              //   echo "<script>alert('Insert to Report Buy Added');
              //   window.location.href=('buying-admin.php');</script>";
              // }
            }
          ?>
        </div>
      </div>
    </div>
    <?php
      include "koneksi.php";
      if(isset($_GET['delete'])) {
        $id_buy = $_GET['delete'];
        
        if(!empty($id_buy)){
          $sql_delete = "DELETE FROM buying WHERE id_buy='$id_buy'";
          $a = $koneksi -> query($sql_delete);  

          if ($a == true){
            echo "<script>alert('Stocks Deleted Successfully');
            window.location.href=('buying-admin.php');</script>";
          } else {
            echo "<script>alert('Stocks Failed Deleted');
            window.location.href=('buying-admin.php');</script>";
          }

        }
      }
      ?>
  <!-- End Modal Add-Prod -->

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