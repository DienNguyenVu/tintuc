<?php 
require '../../lib/dbCon.php';
require'../../lib/quantri.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Dashboard</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo URL?>admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="<?php echo URL?>admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="<?php echo URL?>admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Start Bootstrap</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

     

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
           
            <li class="breadcrumb-item active">
               <a href="../loaitin/index.php">LOẠI TIN </a>
            </li>
            <li class="breadcrumb-item active">
               <a href="../Theloai/index.php">THỂ LOẠI </a>
            </li>
            <li class="breadcrumb-item active">
               <a href="../index.php">Trang Chủ</a>
            </li>
          </ol>

         

      
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              DANH SÁCH TIN</div>
            <div class="card-body">
              <div class="table-responsive">
               
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>
                        <a href="themTin.php" title="">Thêm</a>
                      </th>
                     
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th></th>
                      <th>
                        <a href="themTin.php" title="">Thêm</a>
                      </th>
                     
                    </tr>
                  </tfoot>
                  <tbody>
<?php 
$tin=DanhSachTin();
while ($row_tin=mysqli_fetch_array($tin)) 
{
ob_start();
?>
              <tr>
                <td>idTin:{idTin} {Ngay}</td>
                <td>
                  <a href="suaTin.php?idTin={idTin}" >
                  {TieuDe}
                  </a>
                  <img style="float:left; margin-right:5px" src="../../upload/tintuc/{urlHinh} " alt="" width="150" height="100"> 
                  {TomTat}
                </td>
                <td>{TenTL}{Ten}</td>
                <td>số lần xem:{SoLanXem} {TinNoiBat}{AnHien}</td>
                <td>
                  <a href="xoaTin.php?idTin={idTin}">Xóa</a>
                  <a href="suaTin.php?idTin={idTin}">Sửa</a>
                </td>
              </tr>
          <?php
      $s=ob_get_clean();
      $s=str_replace("{idTin}", $row_tin['idTin'], $s);
      $s=str_replace("{Ngay}", $row_tin['Ngay'], $s);
      $s=str_replace("{TieuDe}", $row_tin['TieuDe'], $s);
      $s=str_replace("{TomTat}", $row_tin['TomTat'], $s);
      $s=str_replace("{urlHinh}", $row_tin['urlHinh'], $s);
      $s=str_replace("{TenTL}", $row_tin['TenTL'], $s);
      $s=str_replace("{Ten}", $row_tin['Ten'], $s);
      $s=str_replace("{SoLanXem}", $row_tin['SoLanXem'], $s);
      $s=str_replace("{TinNoiBat}", $row_tin['TinNoiBat'], $s);
      $s=str_replace("{AnHien}", $row_tin['AnHien'], $s);
      echo $s;

  } 
    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo URL?>admin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo URL?>admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo URL?>admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="<?php echo URL?>admin/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo URL?>admin/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo URL?>admin/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo URL?>admin/js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="<?php echo URL?>admin/js/demo/datatables-demo.js"></script>
    <script src="<?php echo URL?>admin/js/demo/chart-area-demo.js"></script>

  </body>

</html>
