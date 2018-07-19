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
              <a href="anggota.php" class="btn btn-primary">Kembali</a><hr>
              <form action="input-aksi-anggota.php" method="post">
      					<label>Nama</label>
      					<input type="text" name="nama">

      					<label>Alamat</label>
      					<input type="text" name="alamat">

      					<label>Telepon</label>		
      					<input type="text" name="telepon">

      					<label>Email</label>
      					<input type="text" name="email">

      					<label>Status Aktif</label>
      					<input type="text" name="status_aktif">

      					<input type="submit" value="Simpan">
      				</form>
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  </section>
  <?php include 'javascript.php';?>
  </body>
</html>
