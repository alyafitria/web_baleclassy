<?php
    include "koneksi.php";
    if(isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $usn = $_POST['usn'];
        $pass = $_POST['pass'];
        $role = $_POST['role'];
        $address = $_POST['address'];
        
        $sql = "INSERT INTO admin(name,email,phone,usn,pass,role,address) VALUES ('$name','$email','$phone','$usn','$pass','$role','$address')";
        $a = $koneksi -> query($sql);
        
        if ($a == true){
            header ('location: index-after.php');
            echo "<script>alert('Anda Sukses Registrasi');</script>";
            echo "berhasil";
        } else {
            header ('location: index.php');
            echo "<script>alert('Anda Gagal Registrasi');</script>";
            echo "gagal";
        }
    }
?>