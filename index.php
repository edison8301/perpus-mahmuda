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
    <form class="form-horizontal" method="post" action="aksi_login.php">
      <div class="form-group">
        <div class="col-sm-10">
          <input type="username" class="form-control" id="username" placeholder="Enter Username" name="username" autocomplete="off" autofocus="on" required>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-10">          
          <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" autocomplete="off" required>
        </div>
      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">Login</button>
          <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        </div>
      </div>
  </form>
  </div>
</div>
</body>
<script type="text/javascript">
  function validasi() {
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;   
    if (username != "" && password!="") {
      return true;
    }else{
      alert('Username dan Password harus di isi !');
      return false;
    }
  }
 
</script>
</html>