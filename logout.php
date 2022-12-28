<?php 
include "koneksi.php"; 
echo "<script>alert('Logout Berhasil');
      window.location.href=('index.php');</script>";
session_destroy(); 
?>