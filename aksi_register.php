<?php
  include "config/koneksi.php";
  $use = $_POST['username'];
  $pas = $_POST['password'];
  $nam = $_POST['nama'];
  $ala = $_POST['alamat'];
  $tel = $_POST['telepon'];
  $ema = $_POST['email'];
  $simpan1 =  mysqli_query($koneksi, "INSERT INTO anggota SET nama         = '$nam',
                                                           alamat       = '$ala',
                                                           telepon      = '$tel',
                                                           email        = '$ema',
                                                           status_aktif = '1'");
  $cari = mysqli_query($koneksi, "SELECT id FROM anggota WHERE email='$ema'");
  $id   = mysqli_fetch_array($cari);
  $id_a = $id['id'];
  $simpan2 =  mysqli_query($koneksi, "INSERT INTO user SET username     = '$use',
                                                        password     = '$pas',
                                                        id_anggota   = '$id_a',
                                                        id_petugas   = '',
                                                        id_user_role = '2',
                                                        status       = '2'");
  if($simpan1 == true && $simpan2 == true) {
    header('location:index.php');
   } else{
    include "404.php";
   }
?>