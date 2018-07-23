<?php 
// koneksi database
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into kategori values('','$nama')");
 
// mengalihkan halaman kembali ke index.php
print "<script>alert(\"Sukses Input Data\"); location.href = \"kategori.php\"; </script>";
 
?>