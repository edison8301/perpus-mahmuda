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
              <a class="btn btn-primary" href="input-anggota.php">+ TAMBAH ANGGOTA</a>
              <table class="table table-striped table-advance table-hover">
                            <hr>
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>Telepon</th>
                                  <th>Email</th>
                                  <th>Status Aktif</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                              
                              $no = 1;
                              $data = mysqli_query($koneksi,"select * from anggota");
                              while($d = mysqli_fetch_array($data)){
                                ?>
                              <tr>
                                  <td><center><?php echo $no++; ?></center></td>
                                  <td><?php echo $d['nama']; ?></td>
                                  <td><?php echo $d['alamat']; ?></td>
                                  <td><?php echo $d['telepon']; ?></td>
                                  <td><?php echo $d['email']; ?></td>
                                  <td><center><?php echo $d['status_aktif']; ?></center></td>
                                  <td>
                                      <a class="btn btn-primary btn-xs" href="edit_anggota.php?id=<?php echo $d['id']; ?>"><i class="fa fa-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs" href="hapus_anggota.php?id=<?php echo $d['id']; ?>"><i class="fa fa-trash-o "></i></a>
                                  </td>
                              </tr>
                              
                              </tbody>
                              <?php 
                              }
                              ?>
                          </table>              
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section>
</section>
<?php include 'view/javascript.php';?>
</body>
</html>