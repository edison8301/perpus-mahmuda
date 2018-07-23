<?php
	include "config/koneksi.php";
	include "validasi/angka.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php 
  if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "gagal"){
      print "<script>alert(\"Login gagal! username dan password salah!\");</script>";
    }else if($_GET['pesan'] == "logout"){
      echo "Anda telah berhasil logout";
    }else if($_GET['pesan'] == "belum_login"){
      echo "Anda harus login untuk mengakses halaman admin";

    }
  }
  ?>
<div class="login-page">
  <div class="form">
    <form action="aksi_register.php" method="POST" enctype="multipart/form-data">

				<label>Nama :</label>
				<input type="text" name="nama" required="">

				<label>Alamat :</label>
                <input type="text" name="alamat" required="">

				<label>Telepon :</label>
				<input type="text" name="telepon" required="" onkeypress="return angka(event)">

				<label>Email :</label>
				<input type="email" name="email" required="">

				<label>Username :</label>
				<input type="text" name="username" required="">

				<label>Password :</label>
				<input type="password" name="password" required="">

				<button type="submit" name="register" class="btn btn-default">Register</button>

			</form>
			<p><a href="index.php">Login</a></p>
  </div>
</div>
</body>
</html>