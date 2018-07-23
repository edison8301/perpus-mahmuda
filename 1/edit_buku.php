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
  <body>

  <section id="container" >
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>LibraryWeb</h3>
            <div class="row mt">
              <div class="col-lg-12">
              <a href="buku.php" class="btn btn-primary">Kembali</a><hr>

              <?php
                    if (isset($_GET['id'])) {

                    $id = ($_GET["id"]);

                    $query = "SELECT * FROM buku WHERE id='$id'";
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

              <form method="POST" action="update_buku.php" enctype="multipart/form-data">

                      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                  <p>Nama :</p>
                  <input type="text" name="nama" value="<?php echo $data['nama']; ?>"><br>

                  <p>Tahun Terbit :</p>
                  <input type="text" name="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>"><br>

                  <p>Penerbit :</p>
                  <select name="penerbit">
                           <?php
                           $query = "SELECT * FROM penerbit";
                           $hasil = mysqli_query($koneksi, $query);
                           $tampil = mysqli_num_rows($hasil);

                           if ( $tampil> 0) {
                               while ( $dat = mysqli_fetch_assoc($hasil)) {
                                  if($dat['id']==$data['id_penerbit']){
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

                      <p>Penulis :</p>
                  <select name="penulis">
                           <?php
                           $query = "SELECT * FROM penulis";
                           $hasil = mysqli_query($koneksi, $query);
                           $tampil = mysqli_num_rows($hasil);

                           if ( $tampil> 0) {
                               while ( $dat = mysqli_fetch_assoc($hasil)) {
                                  if($dat['id']==$data['id_penulis']){
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

                      <p>Kategori :</p>
                  <select name="kategori">
                           <?php
                           $query = "SELECT * FROM kategori";
                           $hasil = mysqli_query($koneksi, $query);
                           $tampil = mysqli_num_rows($hasil);

                           if ( $tampil> 0) {
                               while ( $dat = mysqli_fetch_assoc($hasil)) {
                                  if($dat['id']==$data['id_kategori']){
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

                  <p>Sinopsis :</p>
                  <input type="text" name="sinopsis" value="<?php echo $data['sinopsis']; ?>">

                  <p>Sampul :</p>
                      <img style="width: 150px; height: 150px;" src="<?php echo $data['sampul']; ?>"><br>
                      <input type="hidden" name="sampul_buku_awal" value="<?php echo $data['sampul']?>">
                  <input type="file" name="sampul"><br>

                  <p>Berkas :</p>
                      <p><?php echo $data['berkas']; ?></p>
                      <input type="hidden" name="berkas_buku_awal" value="<?php echo $data['berkas']?>">
                  <input type="file" name="berkas"><br><br>
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
