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
  <section id="container" >
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>LibraryWeb</h3>
            <div class="row mt">
              <div class="col-lg-12">
              <a href="home.php" class="btn btn-primary">Kembali</a><hr>
              <?php
                  if (isset($_GET['id'])) {

                    $id = ($_GET["id"]);

                    $query = "SELECT * FROM peminjaman WHERE id='$id'";
                    $result = mysqli_query($koneksi, $query);

                    if(!$result){
                        die ("Query Error: ".mysqli_errno($koneksi).
                            " - ".mysqli_error($koneksi));
                    }

                    $data = mysqli_fetch_assoc($result);
                                    
                    } else {

                    header("location:index.php");
                    }
                ?>

              <form method="POST" action="update_peminjaman.php" enctype="multipart/form-data">

                  <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                  <label>Buku :</label>
                  <select name="buku">
                           <?php
                           $query = "SELECT * FROM buku";
                           $hasil = mysqli_query($koneksi, $query);
                           $tampil = mysqli_num_rows($hasil);

                           if ( $tampil> 0) {
                               while ( $dat = mysqli_fetch_assoc($hasil)) {
                                  if($dat['id']==$data['id_buku']){
                                  ?>
                                      <option value="<?php echo $dat['id']; ?>" selected="selected"><?php echo $dat['nama'];?></option>
                                  <?php
                                      }else{
                                  ?>
                                  <option value="<?php echo $dat['id']; ?>"><?php echo $dat['nama']; ?></option>
                           <?php
                               }
                               }
                           }
                           ?>
                      </select>

                  <label>Anggota :</label>
                  <select name="anggota">
                           <?php
                           $query = "SELECT * FROM anggota";
                           $hasil = mysqli_query($koneksi, $query);
                           $tampil = mysqli_num_rows($hasil);

                           if ( $tampil> 0) {
                               while ( $dat = mysqli_fetch_assoc($hasil)) {
                                  if($dat['id']==$data['id_anggota']){
                                  ?>
                                      <option value="<?php echo $dat['id']; ?>" selected="selected"><?php echo $dat['nama'];?></option>
                                  <?php
                                      }else{
                                  ?>
                                  <option value="<?php echo $dat['id']; ?>"><?php echo $dat['nama']; ?></option>
                           <?php
                               }
                               }
                           }
                           ?>
                      </select>

                  <label>Tanggal Pinjam :</label>
                  <input type="date" name="tanggal_pinjam" value="<?php echo $data['tanggal_pinjam']; ?>">

                  <label>Tanggal Kembali :</label>
                  <input type="date" name="tanggal_kembali" value="<?php echo $data['tanggal_kembali']; ?>">

                  <input type="submit" value="simpan">
                </form>
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
</section>
<?php include 'view/javascript.php';?>
  </body>
</html>
