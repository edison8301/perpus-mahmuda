<?php 
// koneksi database
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
$status_aktif = $_POST['status_aktif'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into anggota values('','$nama','$alamat','$telepon', '$email', '$status_aktif')");
 
// mengalihkan halaman kembali ke index.php
print "<script>alert(\"Sukses Input Data\"); location.href = \"anggota.php\"; </script>";
// header("location:anggota.php");
 
?>