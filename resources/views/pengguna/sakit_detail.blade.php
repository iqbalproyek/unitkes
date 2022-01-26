<x-app-layout2>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Detail Surat Keterangan Sakit</h1>
        </div>


      <div class="row justify-content-center">
          <div class="col-md-5">

              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Surat</h6>
                  </div>

                  <div class="card-body">

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Nomor Surat</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $surat->no_surat }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Tanggal Surat</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $surat->tanggal->format('d-m-Y') }}</div>
                  </div>

                  </div>

              </div>
          </div>


          <div class="col-md-5">
{{-- foreach --}}
              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Keterangan Sakit</h6>
                  </div>

                  <div class="card-body">

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">No Induk</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sakit->nim }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">nama</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sakit->nama }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">umur</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sakit->umur }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Unit/jurusan</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sakit->unit }}</div>
                  </div>


                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">total izin(hari)</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sakit->total_izin }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">mulai tanggal</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sakit->mulai_tgl->format('d-m-Y') }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">sampai tanggal</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sakit->akhir_tgl->format('d-m-Y') }}</div>
                  </div>


{{-- endforeach --}}
                  </div>

              </div>
          <div>
      </div>
      <br>
      <!-- /.container-fluid -->
  </div>

</x-app-layout2>
