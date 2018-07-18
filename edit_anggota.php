<?php include 'koneksi.php';?>
<html>
<link rel="stylesheet" type="text/css" href="style.css">
<?php include 'header.php';?>
<?php include 'navigation.php';?>
<body>
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>LibraryWeb</h3>
            <div class="row mt">
              <div class="col-lg-12">
              <a href="anggota.php" class="btn btn-primary">Kembali</a><hr>
              <?php
                include 'koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"select * from anggota where id='$id'");
                while($d = mysqli_fetch_array($data)){
                ?>
                <form action="update_anggota.php" method="post">
                  <label>Nama</label>
                  <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                  <input type="text" name="nama" value="<?php echo $d['nama'] ?>">

                  <label>Alamat</label>
                  <input type="text" name="alamat" value="<?php echo $d['alamat'] ?>">

                  <label>Telepon</label>    
                  <input type="text" name="telepon" value="<?php echo $d['telepon'] ?>">

                  <label>Email</label>
                  <input type="text" name="email" value="<?php echo $d['email'] ?>">

                  <label>Status Aktif</label>
                  <input type="text" name="status_aktif" value="<?php echo $d['status_aktif'] ?>">

                  <input type="submit" value="Simpan">
                </form>
                <?php } ?>
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  </section>
  </body>
</html>
