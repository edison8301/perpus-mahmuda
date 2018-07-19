<?php include 'koneksi.php';?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<?php include 'header.php';?>
<?php include 'navigation.php';?>
<body>
  <section id="container" >
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>LibraryWeb</h3>
            <div class="row mt">
              <div class="col-lg-12">
              <a href="buku.php" class="btn btn-primary">Kembali</a><hr>
              <form method="POST" action="input-aksi-buku.php" enctype="multipart/form-data">
                  <label>nama : </label><input type="text" name="nama">
                  <label>tahun terbit : </label><input type="text" name="tahun_terbit">
                  <label>Penulis : </label>
                  <?php
                    include 'koneksi.php';
                    $read_penulis = mysqli_query($koneksi, "SELECT * FROM penulis");
                  ?>
                  <select name="penulis">
                    <option>Pilih Penulis</option>
                    <?php
                    if ($read_penulis->num_rows > 0 ) {
                      while ($data = $read_penulis->fetch_assoc()) {
                        ?>
                        <option value="<?=$data['id'];?>"><?=$data['nama'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <label>Penerbit : </label>
                  <?php
                    include 'koneksi.php';
                    $read_penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit");
                  ?>
                  <select name="penerbit">
                    <option>Pilih Penerbit</option>
                    <?php
                    if ($read_penerbit->num_rows > 0 ) {
                      while ($data = $read_penerbit->fetch_assoc()) {
                        ?>
                        <option value="<?=$data['id'];?>"><?=$data['nama'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <label>Kategori : </label>
                  <?php
                    include 'koneksi.php';
                    $read_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                  ?>
                  <select name="kategori">
                    <option>Pilih Kategori</option>
                    <?php
                    if ($read_kategori->num_rows > 0 ) {
                      while ($data = $read_kategori->fetch_assoc()) {
                        ?>
                        <option value="<?=$data['id'];?>"><?=$data['nama'];?></option>
                        <?php
                      }
                    }
                    ?>
                  </select>

                  <label>sinopsis</label><input type="text" name="sinopsis">
                  <label>sampul : </label><input type="file" name="sampul">
                  <label>berkas : </label><input type="file" name="berkas">
                  <input type="submit" value="SIMPAN">
                  </form>
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  </section>
<?php include 'javascript.php';?>
  </body>
</html>
