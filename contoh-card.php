<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>

    <div class="card w-25">
        <h5 class="card-header">Featured</h5>
        <div class="card-body">
          <h5 class="card-title">Add Product</h5>

          <form action="" method="POST">
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
            <input type="text" name="deskripsi" class="form-control"/>
            </div>
            <div class="mb-3">
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
              $deskripsi = $_POST['deskripsi'];

              $sql = "INSERT INTO product(kode_prod,name_prod,category,brand,qty_prod,price_prod,deskripsi) VALUES ('$kode_prod','$name_prod','$category','$brand','$qty_prod','$price_prod','$deskripsi')";
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
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>