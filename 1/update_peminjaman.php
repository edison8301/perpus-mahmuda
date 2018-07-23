<?php 
// koneksi database
include '../config/koneksi.php';
 
// menangkap data yang di kirim dari form
$id = $_POST['id'];
$buku = $_POST['buku'];
$anggota = $_POST['anggota'];
$tanggal_pinjam = $_POST['tanggal_pinjam'];
$tanggal_kembali = $_POST['tanggal_kembali'];
 
// update data ke database
mysqli_query($koneksi,"update peminjaman set id_buku='$buku', id_anggota='$anggota', tanggal_pinjam='$tanggal_pinjam', tanggal_kembali='$tanggal_kembali' where id='$id'");
 
// mengalihkan halaman kembali ke index.php
print "<script>alert(\"Data Berhasil Diupdate\"); location.href = \"peminjaman.php\"; </script>";
 
?>