<?php 
session_start();
if (empty($_SESSION['username'])){
  header('location:index.php');  
} else {
  include "koneksi.php";
?>
<?php
                    $timeout = 10; // Set timeout minutes
                    $logout_redirect_url = "index.php"; // Set logout URL

                    $timeout = $timeout * 60; // Converts minutes to seconds
                    if (isset($_SESSION['start_time'])) {
                        $elapsed_time = time() - $_SESSION['start_time'];
                        if ($elapsed_time >= $timeout) {
                            session_destroy();
                            echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
                        }
                    }
                    $_SESSION['start_time'] = time();
                    ?>
                    <?php } ?><html>
<link rel="stylesheet" type="text/css" href="style.css">
<?php include 'header.php';?>
<?php include 'navigation.php';?>
<html>
<body>
  <section id="container" >
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>LibraryWeb</h3>
            <div class="row mt">
              <div class="col-lg-12">
              <a href="penerbit.php" class="btn btn-primary">Kembali</a><hr>
              <?php
                  include 'koneksi.php';
                  $id = $_GET['id'];
                  $data = mysqli_query($koneksi,"select * from penerbit where id='$id'");
                  while($d = mysqli_fetch_array($data)){
                  ?>
                  <form action="update_penerbit.php" method="post">
                    <label>Nama</label>
                    <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                    <input type="text" name="nama" value="<?php echo $d['nama'] ?>">

                    <label>Alamat</label>
                    <input type="text" name="alamat" value="<?php echo $d['alamat'] ?>">

                    <label>Telepon</label>    
                    <input type="text" name="telepon" value="<?php echo $d['telepon'] ?>">

                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $d['email'] ?>">

                    <input type="submit" value="Simpan">
                  </form>
                  <?php } ?>
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
</section>
<?php include 'javascript.php';?>
  </body>
</html>
