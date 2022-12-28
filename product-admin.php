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
      <!-- <a href="index-after.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a href="index-admin.php">Home</a></li>
          <li><a href="product-admin.php" class="active">Product</a></li>
          <li><a href="category-admin.php">Category</a></li>
          <li><a href="brand-admin.php">Brand</a></li>
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
    
    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <a href="" data-bs-toggle="modal" data-bs-target="#ModalAddProd"><h2 style="color: #444444;">Add Product</h2></a>
          <p>Hei dear, what's our <strong>New Product</strong> today?</p>
        </div>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Category</th>
              <th scope="col">Brand</th>
              <th scope="col">Supp</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Description</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
              include "koneksi.php";

              $no = 1;
              $a = "SELECT * FROM product order by id_prod ASC";
              $b = $koneksi->query($a);
                while ($c = $b -> fetch_array()) {
                  ?>
                  <tr>
                      <th scope="row"><?php echo $no++; ?></th>
                      <td><?php echo $c['name_prod']; ?></td>
                      <td><?php echo $c['category']; ?></td>
                      <td><?php echo $c['brand']; ?></td>
                      <td><?php echo $c['supplier']; ?></td>
                      <td><?php echo $c['qty_prod']; ?></td>
                      <td><?php echo number_format($c['price_prod']); ?></td>
                      <td><?php echo $c['deskripsi']; ?></td>
                      <td><?php echo "<img src='assets/img/product/".$c['pict']."' width='50' height='50'>"; ?></td>
                      <td>
                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $c['id_prod']; ?>">Edit</a>
                        <a href="?page=product&deleteproduct=<?php echo $c['id_prod']; ?>" class="btn btn-danger btn-sm" onclick="return confirm ('yakin mo apus?')">Delete</a>
                      </td>
                  </tr>
                  <?php
                }
              ?>
          </tbody>
        </table>
      </div>
    </section><!-- End Portfolio Section -->


    <!-- Add-Prod Form -->
    <?php
      include "koneksi.php";
      $query_cat = "SELECT * FROM category";
      $result_cat = mysqli_query($koneksi, $query_cat);
      $query_br = "SELECT * FROM brand";
      $result_br = mysqli_query($koneksi, $query_br);
    ?>
    <div class="modal fade" id="ModalAddProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-header">
              <h5 class="modal-title">Add New Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label>Code</label>
                <input type="text" name="kode_prod" class="form-control" placeholder="Enter Code Product"/>
              </div>
              <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name_prod" class="form-control" placeholder="Enter Name Product"/>
              </div>
              <div class="mb-3">
                <label>Category</label>
                <select class="form-select" name="category">
                  <!-- <option>--Choose Category--</option> -->
                  <?php while($row = mysqli_fetch_array($result_cat)):; ?>
                    <option value="<?php echo $row[2];?>"> <?php echo $row[2];?> </option>
                  <?php endwhile;?>
                </select>
              </div>
              <div class="mb-3">
                <label>Brand</label>
                <select class="form-select" name="brand">
                  <!-- <option>--Choose Brand--</option> -->
                  <?php while($row = mysqli_fetch_array($result_br)):; ?>
                    <option value="<?php echo $row[2];?>"> <?php echo $row[2];?> </option>
                  <?php endwhile;?>
                </select>
              </div>
              <div class="mb-3">
                <label>Quantity</label>
                <input type="number" name="qty_prod" class="form-control" placeholder="Enter Quantity Product"/>
              </div>
              <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price_prod" class="form-control" placeholder="Enter Price Product"/>
              </div>
              <div class="mb-3">
                <label>Description</label>
                <input type="text" name="deskripsi" class="form-control" placeholder="Enter Description Product"/>
              </div>
              <div class="mb-3">
                <label>Image</label>
                <input type="file" name="pict" class="form-control"/>
              </div>
            </div>
            <div class="modal-footer pt-4">
              <button type="submit" name="addproduct" class="btn btn-modal mx-auto w-100 text-center">Save</button>
            </div>
          </form>
          <?php
            include "koneksi.php";

            if(isset($_POST['addproduct'])) {
              $kode_prod = $_POST['kode_prod'];
              $name_prod = $_POST['name_prod'];
              $category = $_POST['category'];
              $brand = $_POST['brand'];
              $qty_prod = $_POST['qty_prod'];
              $price_prod = $_POST['price_prod'];
              $deskripsi = $_POST['deskripsi'];
              
              $pict = $_FILES['pict']['name'];
              $tipe_pict = $_FILES['pict']['type'];
              $tmp_pict = $_FILES['pict']['tmp_name'];
              $path_pict = "assets/img/product/".$pict;
              
              move_uploaded_file($tmp_pict, $path_pict);
              
              $sql = "INSERT INTO product (kode_prod, name_prod, category, brand, qty_prod, price_prod, deskripsi, pict) VALUES ('$kode_prod', '$name_prod', '$category', '$brand', '$qty_prod', '$price_prod', '$deskripsi', '$pict')";
              $a = $koneksi -> query($sql);
              
              if ($a == true){
                  echo "<script>alert('Product Added Successfully');
                  window.location.href=('product-admin.php');</script>";
              } else {
                  echo "<script>alert('Product Failed Added');
                  window.location.href=('product-admin.php');</script>";
              }
            }
          ?>
        </div>
      </div>
    </div>
    <!-- End Modal Add-Prod -->

    <?php
      include "koneksi.php";
      if(isset($_GET['deleteproduct'])) {
        $id_prod = $_GET['deleteproduct'];
        
        if(!empty($id_prod)){
          $sql_delete = "DELETE FROM product WHERE id_prod='$id_prod'";
          $a = $koneksi -> query($sql_delete);

          if(file_exists("assets/img/product/$pict;")){
            unlink("assets/img/product/$pict;");
          }     

          if ($a == true){
            echo "<script>alert('Product Deleted Successfully');
            window.location.href=('product-admin.php');</script>";
          } else {
            echo "<script>alert('Product Failed Deleted');
            window.location.href=('product-admin.php');</script>";
          }

        }
      }
      $a = "SELECT * FROM product";
      $b = $koneksi->query($a);
        while ($c = $b -> fetch_array()) { ?>

          <!-- ISI APA AJA YG MAU PAKE GET SQL -->

          <!-- Edit-Prod Form -->
          <?php
          include "koneksi.php";
          $query_cat = "SELECT * FROM category";
          $result_cat = mysqli_query($koneksi, $query_cat);
          $query_br = "SELECT * FROM brand";
          $result_br = mysqli_query($koneksi, $query_br);
          ?>
          <div class="modal fade" id="ModalEdit<?php echo $c['id_prod']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label>Code</label>
                      <input type="text" name="kode_prod" value="<?php echo $c['kode_prod'];?>" class="form-control"/>
                    </div>
                    <div class="mb-3">
                      <label>Name</label>
                      <input type="text" name="name_prod" value="<?php echo $c['name_prod'];?>" class="form-control"/>
                    </div>
                    <div class="mb-3">
                      <label>Category</label>
                      <select class="form-select" name="category">
                        <option>--Choose Category--</option>
                        <?php while($row = mysqli_fetch_array($result_cat)):; ?>
                          <option value="<?php echo $row[2];?>"> <?php echo $row[2];?> </option>
                        <?php endwhile;?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Brand</label>
                      <select class="form-select" name="brand">
                        <option>--Choose Brand--</option>
                        <?php while($row = mysqli_fetch_array($result_br)):; ?>
                          <option value="<?php echo $row[2];?>"> <?php echo $row[2];?> </option>
                        <?php endwhile;?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label>Quantity</label>
                      <input type="text" name="qty_prod" value="<?php echo $c['qty_prod'];?>" class="form-control"/>
                    </div>
                    <div class="mb-3">
                      <label>Price</label>
                      <input type="text" name="price_prod" value="<?php echo $c['price_prod'];?>" class="form-control"/>
                    </div>
                    <div class="mb-3">
                      <label>Description</label>
                      <input type="text" name="deskripsi" value="<?php echo $c['deskripsi'];?>" class="form-control"/>
                    </div>
                    <div class="mb-3">
                      <label>Image</label>
                      <input type="file" name="pict" value="<?php echo $c['pict'];?>" class="form-control"/>
                    </div>
                  </div>
                  <div class="modal-footer pt-4">
                    <input type="hidden" name="id_prod" value="<?php echo $c['id_prod'] ?>">
                    <button type="submit" name="editproduct" class="btn btn-modal mx-auto w-100 text-center">Update</button>
                  </div>
                </form>
                <?php
                  include "koneksi.php";
                  if(isset($_POST['editproduct'])) {
                    $id_prod = $_POST['id_prod'];
                    $kode_prod = $_POST['kode_prod'];
                    $name_prod = $_POST['name_prod'];
                    $category = $_POST['category'];
                    $brand = $_POST['brand'];
                    $qty_prod = $_POST['qty_prod'];
                    $price_prod = $_POST['price_prod'];
                    $deskripsi = $_POST['deskripsi'];
                    
                    $pict = $_FILES['pict']['name'];
                    $tipe_pict = $_FILES['pict']['type'];
                    $tmp_pict = $_FILES['pict']['tmp_name'];
                    $path_pict = "assets/img/product/".$pict;
                    
                    move_uploaded_file($tmp_pict, $path_pict);
                    
                    $sql = "UPDATE product SET kode_prod='$kode_prod', name_prod='$name_prod', category='$category', brand='$brand', qty_prod='$qty_prod', price_prod='$price_prod', deskripsi='$deskripsi', pict='$pict' WHERE id_prod='$id_prod'";
                    $a = $koneksi -> query($sql);
                    
                    if ($a == true){
                      echo "<script>alert('Product Edited Successfully');
                      window.location.href=('product-admin.php');</script>";
                    } else {
                      echo "<script>alert('Product Failed Edited');
                      window.location.href=('product-admin.php');</script>";
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