<?php 
// koneksi database
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$buku = $_POST['buku'];
$anggota = $_POST['anggota'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggl_kembali = $_POST['tanggal_kembali'];


 
// menginput data ke database
mysqli_query($koneksi,"insert into peminjaman values('','$buku', '$anggota', '$tanggal_pinjam', '$tanggl_kembali')");
 
// mengalihkan halaman kembali ke index.php
print "<script>alert(\"Sukses Input Data\"); location.href = \"home.php\"; </script>";
 
?>