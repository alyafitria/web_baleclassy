<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Bootstrap Example</title>
  </head>
  <body>

    <!-- Example Code -->
    
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAddProd" data-bs-whatever="@mdo">Open modal for @mdo</button>
    
    
    <div class="modal fade" id="ModalAddProd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <form action="" method="POST">
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
                  <option value="atasan">atasan</option>
                  <option value="bawahan">bawahan</option>
                </select>
              </div>
              <div class="mb-3">
                <label>Brand</label>
                <select class="form-select" name="brand">
                  <option value="Zara">Zara</option>
                  <option value="H&M">H&M</option>
                </select>
              </div>
              <div class="mb-3">
                <label>Quantity</label>
                <input type="text" name="qty_prod" class="form-control" placeholder="Enter Quantity Product"/>
              </div>
              <div class="mb-3">
                <label>Price</label>
                <input type="text" name="price_prod" class="form-control" placeholder="Enter Price Product"/>
              </div>
              <div class="mb-3">
                <label>Description</label>
                <input type="text" name="desc" class="form-control"/>
              </div>
            </div>
            <div class="modal-footer pt-4">
              <button type="submit" name="addprod" class="btn btn-modal mx-auto w-100 text-center">Save</button>
            </div>
          </form>
          <?php
            include "koneksi.php";
            if(isset($_POST['addprod'])) {
              $kode_prod = $_POST['kode_prod'];
              $name_prod = $_POST['name_prod'];
              $category = $_POST['category'];
              $brand = $_POST['brand'];
              $qty_prod = $_POST['qty_prod'];
              $price_prod = $_POST['price_prod'];
              $desc = $_POST['desc'];

              $sql = "INSERT INTO product(kode_prod,name_prod,category,brand,qty_prod,price_prod,desc) VALUES ('$kode_prod','$name_prod','$category','$brand','$qty_prod','$price_prod','$desc')";
              $a = $koneksi -> query($sql);
              
              if ($a == true){
                  echo "<script>alert('Product Added Successfully');
                  window.location.href=('product-admin.php');</script>";
              } else {
                trigger_error("perintah sql salah: " . $sql . "error: " . $koneksi->error, E_USER_ERROR);
                  echo "<script>alert('Product Failed Added');
                  window.location.href=('product-admin.php');</script>";
              }
            }
          ?>
        </div>
      </div>
    </div>
    
    <!-- End Example Code -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>