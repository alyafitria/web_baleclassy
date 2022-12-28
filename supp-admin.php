<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Supplier - Bale Classy Outfit</title>
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

      <h1 class="logo me-auto me-lg-0"><a href="index-admin.php">Bale Classy</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index-admin.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index-admin.php">Home</a></li>
          <li><a href="product-admin.php">Product</a></li>
          <li><a href="category-admin.php">Category</a></li>
          <li><a href="brand-admin.php">Brand</a></li>
          <li><a href="supp-admin.php" class="active">Supplier</a></li>
          <li><a href="buying-admin.php">Buying</a></li>
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
  <section id="portfolio" class="portfolio">
      <div class="container w-50" data-aos="fade-up">

        <!-- ======= Category Section ======= -->
        <div class="section-title">
          <a href="" data-bs-toggle="modal" data-bs-target="#ModalAddSupp"><h2 style="color: #444444;">Supplier</h2></a>
          <p>Here is the list of our <strong>our supplier</strong></p>
        </div>
        <table class="table ">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Supplier</th>
              <th scope="col">Phone Supplier</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              include "koneksi.php";
              $a = "SELECT * FROM supplier";
              $b = $koneksi->query($a);
                while ($c = $b -> fetch_array()) {
                  ?>
                  <tr>
                      <th scope="row"><?php echo $no++; ?></th>
                      <td><?php echo $c['supplier']; ?></td>
                      <td><?php echo $c['phone_supp']; ?></td>
                      <td>
                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $c['id_supp']; ?>">Edit</a>
                        <a href="?page=category&delete=<?php echo $c['id_supp']; ?>" class="btn btn-danger btn-sm" onclick="return confirm ('yakin mo apus?')">Delete</a>
                      </td>
                  </tr>
                  <?php
                }
              ?>
          </tbody>
        </table>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- Add-Cat Form -->
      <div class="modal fade" id="ModalAddSupp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
              <form action="" method="POST">
                <div class="modal-header">
                <h5 class="modal-title">Add Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label>Supplier</label>
                    <input type="text" name="supplier" class="form-control" placeholder="Enter Supplier"/>
                </div>
                <div class="mb-3">
                    <label>Phone Supplier</label>
                    <input type="text" name="phone_supp" class="form-control" placeholder="Enter Phone Supplier"/>
                </div>
                </div>
                <div class="modal-footer pt-4">
                  <button type="submit" name="addsupp" class="btn btn-modal mx-auto w-100 text-center">Save</button>
                </div>
              </form>
              <?php
                  include "koneksi.php";
                  if(isset($_POST['addsupp'])) {
                  $supplier = $_POST['supplier'];
                  $phone_supp = $_POST['phone_supp'];

                  $sql = "INSERT INTO supplier (supplier,phone_supp) VALUES('$supplier','$phone_supp')";
                  $a = $koneksi -> query($sql);
                  
                    if ($a == true){
                        echo "<script>alert('Supplier Added Successfully');
                        window.location.href=('supp-admin.php');</script>";
                    } else {
                        echo "<script>alert('Supplier Failed Added');
                        window.location.href=('supp-admin.php');</script>";
                    }
                  }
              ?>
            </div>
        </div>
      </div>
    <!-- End Modal Add-Cat -->

    <?php
      include "koneksi.php";
      if(isset($_GET['delete'])) {
        $id_supp = $_GET['delete'];
        
        if(!empty($id_supp)){
          $sql_delete = "DELETE FROM supplier WHERE id_supp='$id_supp'";
          $a = $koneksi -> query($sql_delete);  

          if ($a == true){
            echo "<script>alert('Supplier Deleted Successfully');
            window.location.href=('supp-admin.php');</script>";
          } else {
            echo "<script>alert('Supplier Failed Deleted');
            window.location.href=('supp-admin.php');</script>";
          }

        }
      }
      $a = "SELECT * FROM supplier";
      $b = $koneksi->query($a);
        while ($c = $b -> fetch_array()) { ?>

          <!-- ISI APA AJA YG MAU PAKE GET SQL -->

          <!-- Edit-Prod Form -->
          <div class="modal fade" id="ModalEdit<?php echo $c['id_supp']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="" method="POST">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label>Supplier</label>
                      <input type="text" name="supplier" value="<?php echo $c['supplier'];?>" class="form-control"/>
                    </div>
                    <div class="mb-3">
                      <label>Phone Supplier</label>
                      <input type="text" name="phone_supp" value="<?php echo $c['phone_supp'];?>" class="form-control"/>
                    </div>
                  </div>
                  <div class="modal-footer pt-4">
                    <input type="hidden" name="id_supp" value="<?php echo $c['id_supp'] ?>">
                    <button type="submit" name="editsupp" class="btn btn-modal mx-auto w-100 text-center">Update</button>
                  </div>
                </form>
                <?php
                  include "koneksi.php";
                  if(isset($_POST['editsupp'])) {
                    $id_supp = $_POST['id_supp'];
                    $supplier = $_POST['supplier'];
                    $phone_supp = $_POST['phone_supp'];
                    
                    $sql = "UPDATE supplier SET supplier='$supplier', phone_supp='$phone_supp' WHERE id_supp='$id_supp'";
                    $a = $koneksi -> query($sql);
                    
                    if ($a == true){
                      echo "<script>alert('Supplier Edited Successfully');
                      window.location.href=('supp-admin.php');</script>";
                    } else {
                      echo "<script>alert('Supplier Edited Failed');
                      window.location.href=('supp-admin.php');</script>";
                    }
                  }
                ?>
              </div>
            </div>
          </div>
          <!-- End Modal Edit-Prod -->
        <?php
        }
      ?>


  </main>

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