<?php include 'koneksi.php';?>
<?php include 'header.php';?>
<?php include 'navigation.php';?>
<body>

  <section id="container" >
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>LibraryWeb</h3>
            <div class="row mt">
              <div class="col-lg-12">
              <a class="btn btn-primary" href="input-buku.php">+ TAMBAH BUKU</a>
              <table class="table table-striped table-advance table-hover">
              <hr>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tahun Terbit</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Kategori</th>
                    <th>Sampul</th>
                    <th>Berkas</th>
                    <th>Aksi</th>
                  </tr>
                  <?php 
                  
                  $no = 1;
                  $data = mysqli_query($koneksi,"select * from buku");
                  while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $d['nama']; ?></td>
                      <td><?php echo $d['tahun_terbit']; ?></td>
                      <?php
                        $penulis = mysqli_query($koneksi, "SELECT * FROM penulis WHERE id='$d[id_penulis]'");
                        $id = mysqli_fetch_array($penulis);
                        $namapenulis = $id['nama'];
                      ?>
                      <td><?php echo $namapenulis; ?></td>
                      
                      <?php
                        $penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE id='$d[id_penerbit]'");
                        $id = mysqli_fetch_array($penerbit);
                        $namapenerbit = $id['nama'];
                      ?>
                      <td><?php echo $namapenerbit; ?></td>

                      <?php
                        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$d[id_kategori]'");
                        $id = mysqli_fetch_array($kategori);
                        $namakategori = $id['nama'];
                      ?>
                      <td><?php echo $namakategori; ?></td>
                      
                      <td><img style="width: 100px; height: 100px;" src="<?php echo $d['sampul']; ?>"></td>
                      <td><a class="btn btn-primary btn-xs" href="<?php echo $d['berkas']; ?>"><i class="fa fa-download"></i></a></td>
                      <td>
                        <a class="btn btn-success btn-xs" href="view_buku.php?id=<?php echo $d['id']; ?>"><i class="fa fa-check"></i></a>
                        <a class="btn btn-primary btn-xs" href="edit_buku.php?id=<?php echo $d['id']; ?>"><i class="fa fa-pencil"></i></a>
                        <a class="btn btn-danger btn-xs" href="hapus_buku.php?id=<?php echo $d['id']; ?>"><i class="fa fa-trash-o "></i></a>
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
      <?php include 'footer.php';?>
      </section>
      <?php include 'javascript.php';?>
  </body>
</html>
