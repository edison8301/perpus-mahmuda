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
              <a class="btn btn-primary" href="input-peminjaman.php">+ TAMBAH PEMINJAMAN</a>
              <table class="table table-striped table-advance table-hover">
              <hr>
                <tr>
                  <th>No</th>
                  <th>Buku</th>
                  <th>Nama Anggota</th>
                  <th>Tanggal Pinjam</th>
                  <th>Tanggal kembali</th>
                  <td>Aksi</td>
                </tr>
                <?php 
                
                $no = 1;
                $data = mysqli_query($koneksi,"select * from peminjaman");
                while($d = mysqli_fetch_array($data)){
                  ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <?php
                        $buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id='$d[id_buku]'");
                        $id = mysqli_fetch_array($buku);
                        $namabuku = $id['nama'];
                      ?>
                    <td><?php echo $namabuku; ?></td>
                    <?php
                        $anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id='$d[id_anggota]'");
                        $id = mysqli_fetch_array($anggota);
                        $namaanggota = $id['nama'];
                      ?>
                    <td><?php echo $namaanggota; ?></td>
                    <td><?php echo $d['tanggal_pinjam']; ?></td>
                    <td><?php echo $d['tanggal_kembali']; ?></td>
                    <td>
                      <a class="btn btn-primary btn-xs" href="edit_peminjaman.php?id=<?php echo $d['id']; ?>"><i class="fa fa-pencil"></i></a>
                      <a class="btn btn-danger btn-xs" href="hapus_peminjaman.php?id=<?php echo $d['id']; ?>"><i class="fa fa-trash-o "></i></a>
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
