<?php include 'koneksi.php';?>
<?php include 'header.php';?>
<?php include 'navigation.php';?>
<section id="container" >
      <section id="main-content">
          <section class="wrapper site-min-height">
          	<h3><i class="fa fa-angle-right"></i>LibraryWeb</h3>
          	<div class="row mt">
          		<div class="col-lg-12">
          		<a class="btn btn-primary" href="input-petugas.php">+ TAMBAH PETUGAS</a>
              <table class="table table-striped table-advance table-hover">
                            <hr>
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>Telepon</th>
                                  <th>Email</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                                
                                $no = 1;
                                $data = mysqli_query($koneksi,"select * from petugas");
                                while($d = mysqli_fetch_array($data)){
                                  ?>
                                  <tr>
                                    <td><?php echo $no++; ?></td>
                                    <td><?php echo $d['nama']; ?></td>
                                    <td><?php echo $d['alamat']; ?></td>
                                    <td><?php echo $d['telepon']; ?></td>
                                    <td><?php echo $d['email']; ?></td>
                                    <td>
                                    <center>
                                      <a class="btn btn-primary btn-xs" href="edit_petugas.php?id=<?php echo $d['id']; ?>"><i class="fa fa-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs" href="hapus_petugas.php?id=<?php echo $d['id']; ?>"><i class="fa fa-trash-o "></i></a>
                                    </center>
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
<?php include 'javascript.php';?>
  </body>
</html>
