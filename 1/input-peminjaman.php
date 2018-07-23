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
                    <?php } ?><html>
<link rel="stylesheet" type="text/css" href="../style.css">
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
              <a href="peminjaman.php" class="btn btn-primary">Kembali</a><hr>
              <form action="input-aksi-peminjaman.php" method="post">
    					<label>Buku : </label>
                      <?php
                        $read_buku = mysqli_query($koneksi, "SELECT * FROM buku");
                      ?>
                      <select name="buku">
                        <option>Pilih Buku</option>
                        <?php
                        if ($read_buku->num_rows > 0 ) {
                          while ($data = $read_buku->fetch_assoc()) {
                            ?>
                            <option value="<?=$data['id'];?>"><?=$data['nama'];?></option>
                            <?php
                          }
                        }
                        ?>
                      </select>

    					<label>Nama Anggota</label>
    					<?php
                  $read_anggota = mysqli_query($koneksi, "SELECT * FROM anggota");
                  ?>
                  <select name="anggota">
                  <option>Pilih Anggota</option>
                  <?php
                  if ($read_anggota->num_rows > 0 ) {
                  while ($data = $read_anggota->fetch_assoc()) {
                  ?>
                  <option value="<?=$data['id'];?>"><?=$data['nama'];?></option>
                  <?php
                    }
                  }
                  ?>
                  </select>

    					<label>Tanggal Pinjam</label>		
    					<input type="date" name="tanggal_pinjam">

    					<label>Tanggal Kembali</label>
    					<input type="date" name="tanggal_kembali">

    					<input type="submit" value="Simpan">
    				</form>
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
</section>
<?php include 'view/javascript.php';?>
  </body>
</html>
