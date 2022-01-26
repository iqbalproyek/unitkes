<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="/template/css/sb-admin-2.min.css" rel="stylesheet">
  <style type="text/css"> .notify{ z-index: 1000000; } </style>
  @notifyCss

  <!-- Custom styles for this page -->
  <link href="/template/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="/template/vendor/Buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/template/vendor/fixedheader/css/fixedHeader.bootstrap4.min.css"/>
<link rel="stylesheet" type="text/css" href="/template/vendor/responsive/css/responsive.bootstrap4.min.css"/>
</head>
<x:notify-messages />
<body id="page-top">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <div class="row no-gutters">
                 <div class="text-lg font-weight-bold text-dark text-uppercase mb-1">unit kesehatan polibatam</div>
                </div>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

        @if(session()->get('NIM'))
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ session()->get('Name') }}</span>
                  <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                  </a>

                </div>
              </li>
        @else
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">LOGIN</span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/api/login">
                  <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Login
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/login">
                  <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Login Petugas
                </a>

              </div>
            </li>
        @endif

          </ul>

        </nav>
        <!-- End of Topbar -->

        {{ $slot }}

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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
          <form action="{{ route('api.logout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="/template/vendor/jquery/jquery.min.js"></script>
  <script src="/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/template/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/template/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/template/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/template/js/demo/chart-area-demo.js"></script>
  <script src="/template/js/demo/chart-pie-demo.js"></script>
  @notifyJs

  <!-- Page level plugins -->
  <script src="/template/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/template/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <script src="/template/vendor/Buttons/js/dataTables.buttons.min.js"></script>
  <script src="/template/vendor/Buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="/template/vendor/JSZip/jszip.min.js"></script>
  <script src="/template/vendor/pdfmake/pdfmake.min.js"></script>
  <script src="/template/vendor/pdfmake/vfs_fonts.js"></script>
  <script src="/template/vendor/Buttons/js/buttons.html5.min.js"></script>
  <script src="/template/vendor/Buttons/js/buttons.print.min.js"></script>
  <script src="/template/vendor/Buttons/js/buttons.colVis.min.js"></script>

  <script src="/template/vendor/fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="/template/vendor/responsive/js/dataTables.responsive.min.js"></script>
  <script src="/template/vendor/responsive/js/responsive.bootstrap4.min.js"></script>
</body>

</html>
