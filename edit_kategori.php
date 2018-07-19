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
              <a href="kategori.php" class="btn btn-primary">Kembali</a><hr>
              <?php
                include 'koneksi.php';
                $id = $_GET['id'];
                $data = mysqli_query($koneksi,"select * from kategori where id='$id'");
                while($d = mysqli_fetch_array($data)){
                ?>
                <form action="update_kategori.php" method="post">
                  <label>Nama</label>
                  <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
                  <input type="text" name="nama" value="<?php echo $d['nama'] ?>">

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
