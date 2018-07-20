<?php include 'koneksi.php';?>
<?php include 'header.php';?>
<?php include 'navigation.php';?>
<html>
<body>
<section id="container" >
<section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>LibraryWeb</h3>
            <div class="row mt">
              <div class="col-lg-12">

              <section class="content">

                    <div class="row" style="margin-bottom:5px;">


                        <div class="col-md-4">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysqli_query($koneksi,"select * from anggota order by id desc");
                        $total=mysqli_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total"; ?></span>
                                    Total Anggota
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysqli_query($koneksi,"select * from buku order by id desc");
                        $total1=mysqli_num_rows($tampil);
                    ?>
                                    <span><?php echo "$total1"; ?></span>
                                    Total Buku
                                </div>
                            </div>
                        </div>

                       <div class="col-md-4">
                            <div class="sm-st clearfix">
                                <span class="sm-st-icon st-blue"><i class="fa fa-refresh fa-spin fa-1x"></i></span>
                                <div class="sm-st-info">
                                <?php $tampil=mysqli_query($koneksi,"select * from peminjaman order by id desc");
                                      $total2=mysqli_num_rows($tampil);
                                ?>
                                    <span><?php echo "$total2"; ?></span>
                                    Total Peminjaman Buku
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
            </div>
            </section>
      
    </section><! --/wrapper -->
      </section>
</section>
<?php include 'javascript.php';?>
</body>
</html>