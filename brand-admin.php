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
          <li><a href="brand-admin.php" class="active">Brand</a></li>
          <li><a href="supp-admin.php">Supplier</a></li>
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

        <!-- ======= Brand Section ======= -->
        <div class="section-title mt-5">
          <a href="" data-bs-toggle="modal" data-bs-target="#ModalAddBr"><h2 style="color: #444444;">Brands</h2></a>
          <p>Let see, do we have <strong>A New Brand</strong> to add?</p>
        </div>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Code</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $no = 1;
              include "koneksi.php";
              $a = "SELECT * FROM brand";
              $b = $koneksi->query($a);
                while ($c = $b -> fetch_array()) {
                  ?>
                  <tr>
                      <th scope="row"><?php echo $no++; ?></th>
                      <td><?php echo $c['kode_brand']; ?></td>
                      <td><?php echo $c['brand']; ?></td>
                      <td>
                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $c['id_brand']; ?>">Edit</a>
                        <a href="?page=brand&delete=<?php echo $c['id_brand']; ?>" class="btn btn-danger btn-sm" onclick="return confirm ('yakin mo apus?')">Delete</a>
                      </td>
                  </tr>
                  <?php
                }
              ?>
          </tbody>
        </table>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- Add-Br Form -->
        <div class="modal fade" id="ModalAddBr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
            <form action="" method="POST">
              <div class="modal-header">
                <h5 class="modal-title">Add Brand</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                    <label>Code Brand</label>
                    <input type="text" name="kode_brand" class="form-control" placeholder="Enter Code Brand"/>
                </div>
                <div class="mb-3">
                    <label>Brand</label>
                    <input type="text" name="brand" class="form-control" placeholder="Enter Brand"/>
                </div>
              </div>
              <div class="modal-footer pt-4">
                <button type="submit" name="addbr" class="btn btn-modal mx-auto w-100 text-center">Save</button>
              </div>
            </form>
            <?php
                include "koneksi.php";
                if(isset($_POST['addbr'])) {
                $kode_brand = $_POST['kode_brand'];
                $brand = $_POST['brand'];

                $sql = "INSERT INTO brand(kode_brand,brand) VALUES ('$kode_brand','$brand')";
                $a = $koneksi -> query($sql);
                
                if ($a == true){
                    echo "<script>alert('Brand Added Successfully');
                    window.location.href=('brand-admin.php');</script>";
                } else {
                    echo "<script>alert('Brand Failed Added');
                    window.location.href=('brand-admin.php');</script>";
                }
                }
            ?>
            </div>
        </div>
        </div>
    <!-- End Modal Add-Br -->

    <?php
      include "koneksi.php";
      if(isset($_GET['delete'])) {
        $id_brand = $_GET['delete'];
        
        if(!empty($id_brand)){
          $sql_delete = "DELETE FROM brand WHERE id_brand='$id_brand'";
          $a = $koneksi -> query($sql_delete);  

          if ($a == true){
            echo "<script>alert('Brand Deleted Successfully');
            window.location.href=('brand-admin.php');</script>";
          } else {
            echo "<script>alert('Brand Failed Deleted');
            window.location.href=('brand-admin.php');</script>";
          }

        }
      }
      $a = "SELECT * FROM brand";
      $b = $koneksi->query($a);
        while ($c = $b -> fetch_array()) { ?>

          <!-- ISI APA AJA YG MAU PAKE GET SQL -->

          <!-- Edit-Prod Form -->
          <div class="modal fade" id="ModalEdit<?php echo $c['id_brand']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="" method="POST">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label>Code Brand</label>
                      <input type="text" name="kode_brand" value="<?php echo $c['kode_brand'];?>" class="form-control"/>
                    </div>
                    <div class="mb-3">
                      <label>Brand</label>
                      <input type="text" name="brand" value="<?php echo $c['brand'];?>" class="form-control"/>
                    </div>
                  </div>
                  <div class="modal-footer pt-4">
                    <input type="hidden" name="id_brand" value="<?php echo $c['id_brand'] ?>">
                    <button type="submit" name="edit" class="btn btn-modal mx-auto w-100 text-center">Update</button>
                  </div>
                </form>
                <?php
                  include "koneksi.php";
                  if(isset($_POST['edit'])) {
                    $id_brand = $_POST['id_brand'];
                    $kode_brand = $_POST['kode_brand'];
                    $brand = $_POST['brand'];
                    
                    $sql = "UPDATE brand SET kode_brand='$kode_brand', brand='$brand' WHERE id_brand='$id_brand'";
                    $a = $koneksi -> query($sql);
                    
                    if ($a == true){
                      echo "<script>alert('Brand Edited Successfully');
                      window.location.href=('brand-admin.php');</script>";
                    } else {
                      echo "<script>alert('Brand Failed Edited');
                      window.location.href=('brand-admin.php');</script>";
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