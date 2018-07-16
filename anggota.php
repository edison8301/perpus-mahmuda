<?php
include 'koneksi.php';
?>

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
              <a class="btn btn-primary" href="input-anggota.php">+ TAMBAH ANGGOTA</a>
              <table class="table table-striped table-advance table-hover">
                            <hr>
                              <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>Nama</th>
                                  <th>Alamat</th>
                                  <th>Telepon</th>
                                  <th>Email</th>
                                  <th>Status Aktif</th>
                                  <th></th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php 
                              
                              $no = 1;
                              $data = mysqli_query($koneksi,"select * from anggota");
                              while($d = mysqli_fetch_array($data)){
                                ?>
                              <tr>
                                  <td><center><?php echo $no++; ?></center></td>
                                  <td><?php echo $d['nama']; ?></td>
                                  <td><?php echo $d['alamat']; ?></td>
                                  <td><?php echo $d['telepon']; ?></td>
                                  <td><?php echo $d['email']; ?></td>
                                  <td><center><?php echo $d['status_aktif']; ?></center></td>
                                  <td>
                                      <a class="btn btn-primary btn-xs" href="edit_anggota.php?id=<?php echo $d['id']; ?>"><i class="fa fa-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs" href="hapus_anggota.php?id=<?php echo $d['id']; ?>"><i class="fa fa-trash-o "></i></a>
                                  </td>
                              </tr>
                              
                              </tbody>
                              <?php 
                              }
                              ?>
                          </table>
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
