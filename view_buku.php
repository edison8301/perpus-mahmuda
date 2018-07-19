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
              <a href="buku.php" class="btn btn-primary">Kembali</a><hr>
              <?php
					include 'koneksi.php';
					$id = $_GET['id'];
					$data = mysqli_query($koneksi,"select * from buku where id='$id'");
					while($d = mysqli_fetch_array($data)){
					?>
						<table>
						<tr>
							<td width="100px" height="50px">Nama</td>
							<td width="20px">:</td>
							<td width="500px"><?php echo $d['nama'] ?></td>
						</tr>

						<tr>
							<td width="100px" height="50px">Tahun Terbit</td>
							<td width="20px">:</td>
							<td><?php echo $d['tahun_terbit'] ?></td>
						</tr>

						<tr>
							<td width="100px" height="50px">Penulis</td>
							<td width="20px">:</td>
							<?php
								$penulis = mysqli_query($koneksi, "SELECT * FROM penulis WHERE id='$d[id_penulis]'");
								$id = mysqli_fetch_array($penulis);
								$namapenulis = $id['nama'];
							?>
							<td><?php echo $namapenulis; ?></td>
						</tr>

						<tr>
							<td width="100px" height="50px">Penerbit</td>
							<td width="20px">:</td>
							<?php
								$penerbit = mysqli_query($koneksi, "SELECT * FROM penerbit WHERE id='$d[id_penerbit]'");
								$id = mysqli_fetch_array($penerbit);
								$namapenerbit = $id['nama'];
							?>
							<td><?php echo $namapenerbit; ?></td>
						</tr>

						<tr>
							<td width="100px" height="50px">Kategori</td>
							<td width="20px">:</td>
							<?php
								$kategori = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id='$d[id_kategori]'");
								$id = mysqli_fetch_array($kategori);
								$namakategori = $id['nama'];
							?>
							<td><?php echo $namakategori; ?></td>
						</tr>

						<tr>
							<td width="100px" height="50px">Sinopsis</td>
							<td width="20px">:</td>
							<td width="500px"><?php echo $d['sinopsis'] ?></td>
						</tr>
						<tr>
							<td colspan="3"><img style="width: 300px; height: 300px;" src="<?php echo $d['sampul']; ?>"></td>
						</tr>
					</table>
					
					<?php } ?>
              </div>
            </div>
      
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
  </section>
  <?php include 'javascript.php';?>
  </body>
</html>
