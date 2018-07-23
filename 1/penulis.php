<?php 
session_start();
if (empty($_SESSION['username'])){
  header('location:index.php');  
} else {
  include "../config/koneksi.php";
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
                    <?php } ?>
<?php include 'view/header.php';?>
<?php include 'view/navigation.php';?>
<html>
<body>
  <section id="container" >
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>LibraryWeb</h3>
            <div class="row mt">
              <div class="col-lg-12">
              <a class="btn btn-primary" href="input-penulis.php">+ TAMBAH PENULIS</a><hr>
              <table class="table table-striped table-advance table-hover">
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Aksi</th>
                  </tr>
                  <?php 
                  
                  $no = 1;
                  $data = mysqli_query($koneksi,"select * from penulis");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['alamat']; ?></td>
                      <td><?php echo $d['telepon']; ?></td>
                      <td><?php echo $d['email']; ?></td>
                      <td>
                        <a class="btn btn-primary btn-xs" href="edit_penulis.php?id=<?php echo $d['id']; ?>"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger btn-xs" href="hapus_penulis.php?id=<?php echo $d['id']; ?>"><i class="fa fa-trash-o "></i></a>
                      </td>
                    </tr>
                    <?php 
                  }
                  ?>
                </table>
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  </section>
<?php include 'view/javascript.php';?>
  </body>
</html>
