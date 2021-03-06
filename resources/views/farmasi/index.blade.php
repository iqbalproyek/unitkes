<x-app-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
        </div>
        <br>


        <!-- Content Row -->
        <div class="row" >

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                  <a href="/farmasi/obat/masuk">
                    <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Obat Masuk</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $masuk }}</div>
                    </a>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-database fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                  <a href="/farmasi/obat/stok">
                    <div class="text-s font-weight-bold text-success text-uppercase mb-1">Stok Obat</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $stok }}</div>
                    </a>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-database fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <!-- Pending Requests Card Example -->
          <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                  <a href="/farmasi/obat/keluar">
                    <div class="text-s font-weight-bold text-warning text-uppercase mb-1">Obat Keluar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $keluar }}</div>
                    </a>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-database fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

</x-app-layout>
