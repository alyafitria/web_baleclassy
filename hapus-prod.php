<?php
    include "koneksi.php";
    $id_siswa = $_GET['deleteproduct'];

    if(!empty($id_prod)){
    $sql_delete = "DELETE FROM product WHERE id_prod='$id_prod'";
    $a = $koneksi -> query($sql_delete);
                
    if ($a == true){
        echo "<script>alert('Product Deleted Successfully');
        window.location.href=('product-admin.php');</script>";
    } else {
        trigger_error("perintah sql salah: " . $sql_delete . "error: " . $koneksi->error, E_USER_ERROR);
        // echo "<script>alert('Product Failed Deleted');
        // window.location.href=('product-admin.php');</script>";
    }

    }
?>