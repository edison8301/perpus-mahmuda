<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>LibraryWeb</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    input[type=text], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=date], select {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
  </style>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>LibraryWeb</b></a>
            <!--logo end-->
            <div class="top-menu">
              <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="login.html">Logout</a></li>
              </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                    
                  <li class="mt">
                      <a href="home.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="anggota.php" >
                          <i class="fa fa-users"></i>
                          <span>Anggota</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="petugas.php" >
                          <i class="fa fa-user"></i>
                          <span>Petugas</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="buku.php" >
                          <i class="fa fa-book"></i>
                          <span>Buku</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="kategori.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Kategori</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="penulis.php" >
                          <i class="fa fa-user"></i>
                          <span>Penulis</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="penerbit.php" >
                          <i class="fa fa-user"></i>
                          <span>Penerbit</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="peminjaman.php" >
                          <i class=" fa fa-list-alt"></i>
                          <span>Peminjaman</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <h3><i class="fa fa-angle-right"></i>LibraryWeb</h3>
            <div class="row mt">
              <div class="col-lg-12">
              <?php
                  include "koneksi.php";

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

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
