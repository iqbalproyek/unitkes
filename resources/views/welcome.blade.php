<x-app-layout2>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="row justify-content-center">
                    <div class="col-md-9">

                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="d-block w-100" src="/Uploads/poltek.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="/Uploads/poltek.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block w-100" src="/Uploads/poltek.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        </div>

                    </div>
                </div>


                <div class="row justify-content-center">
                <div class="col-md-9">

                        <div class="card shadow mt-5">
                            <div class="card-body">
                          <div class="row">
                          <div class="col-xl-4 col-md-6 mb-4">
                          <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                              <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                <a href="riwayat_pasien.php">
                                  <div class="text-s font-weight-bold text-primary text-uppercase mb-1">Riwayat Pasien</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                  </a>
                                </div>
                                <div class="col-auto">
                                  <i class="fas fa-user-md fa-2x"></i>
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
                                <a href="/data/obat">
                                  <div class="text-s font-weight-bold text-success text-uppercase mb-1">Data Obat</div>
                                  <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                  </a>
                                </div>
                                <div class="col-auto">
                                  <i class="fa fa-medkit fa-2x"></i>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                          </div>
                            </div>
                        </div>

                </div>
                </div>


                <div class="row justify-content-center">
                <div class="col-md-9">

                    <div class="d-sm-flex align-items-center justify-content-between mt-5">
                        <h1 class="h3 mb-0 text-gray-800">Pengumuman</h1>
                    </div>

                       @foreach($pengumuman as $row)
                        <div class="card border-secondary shadow mt-3">
                        <div class="card-header bg-white text-dark font-weight-bold">
                          <h5 class="font-weight-bold">{{ $row->judul }}</h5>
                          <p><i class="fas fa-user-circle" style="margin-right: 3px;"></i>by admin | {{ Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</p>
                        </div>
                            <div class="card-body">
                                {!! $row->isi !!}
                            </div>
                        </div>
                        @endforeach
                </div>
                </div>
                <br>
</x-app-layout2>
