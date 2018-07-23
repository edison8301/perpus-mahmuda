<?php 
// koneksi database
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];
$email = $_POST['email'];
 
// update data ke database
mysqli_query($koneksi,"update penerbit set nama='$nama', alamat='$alamat', telepon='$telepon', email='$email' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
print "<script>alert(\"Data Berhasil Diupdate\"); location.href = \"penerbit.php\"; </script>";
 
?>