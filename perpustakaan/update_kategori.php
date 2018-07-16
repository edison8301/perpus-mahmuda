<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$nama = $_POST['nama'];
 
// update data ke database
mysqli_query($koneksi,"update kategori set nama='$nama' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
print "<script>alert(\"Data Berhasil Diupdate\"); location.href = \"kategori.php\"; </script>";
 
?>