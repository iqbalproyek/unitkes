<x-app-layout>
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
                  <a href="tb_laporandsn.php">
                    <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Dosen</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $dsn }}</div>
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
                  <a href="tb_laporanmhs.php">
                    <div class="text-s font-weight-bold text-success text-uppercase mb-1">Mahasiswa</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mhs }}</div>
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
                  <a href="tb_laporankry.php">
                    <div class="text-s font-weight-bold text-warning text-uppercase mb-1">Karyawan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pgw }}</div>
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

                  <!-- Content Row -->
                  <div class="row" >

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-4 col-md-6 mb-4">
                  <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <a href="tb_laporansuratsehat.php">
                          <div class="text-s font-weight-bold text-info text-uppercase mb-1">Surat Keterangan Kesehatan</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
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
                  <div class="card border-left-danger shadow h-100 py-2">
                    <div class="card-body">
                      <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                        <a href="tb_laporansuratsakit.php">
                          <div class="text-s font-weight-bold text-danger text-uppercase mb-1">Surat Keterangan Sakit</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
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
</x-app-layout>
