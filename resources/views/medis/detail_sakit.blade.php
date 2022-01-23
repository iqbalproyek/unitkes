<x-app-layout>
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
                  <h6 class="m-0 font-weight-bold text-primary">Detail Surat <a style="text-decoration:none;"
                  class="text-primary float-right" href="" data-toggle="modal" data-target="#editBarang2"> <i class="fa
                 fa-edit"></i></a></h6>
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

                          <!-- Modal -->
                          <div class="modal fade" id="editBarang2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-md">
                              <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Form Edit Surat</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{ route('izin.update', $surat->id) }}" method="post">
                                    @csrf
                                    @method('put')

                                  <div class="form-group">
                                      <label for="no_surat">Nomor Surat</label>
                                      <input type="text" class="form-control @error('no_surat') is-invalid @enderror me-2" name="no_surat" id="no_surat" value="{{ old('no_surat', $surat->no_surat) }}">
                                        @error('no_surat')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="tanggal">Tanggal</label>
                                      <input type="date" class="form-control @error('tanggal') is-invalid @enderror me-2" name="tanggal" id="tanggal" value="{{ old('tanggal', $surat->tanggal->format('Y-m-d')) }}">
                                      @error('tanggal')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                              <div class="modal-footer">
                                  <button type="reset" id="tambah_brg" name="reset" class="btn btn-danger">Kosongkan</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                              </form>

                              </div>
                          </div>
                          </div>
                          </div>

                  </div>

              </div>
          </div>


          <div class="col-md-5">
{{-- foreach --}}
              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Keterangan Sakit <a style="text-decoration:none;"
                  class="text-primary float-right" href="" data-toggle="modal" data-target="#editBarang3"> <i class="fa
                 fa-edit"></i></a></h6>
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

                          <!-- Modal -->
                          <div class="modal fade" id="editBarang3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-md">
                              <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Form Edit Keterangan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{ route('izinsakit.update', $sakit->id_surat) }}" method="post" >
                                    @csrf
                                    @method('put')

                                  <div class="form-group">
                                      <label for="nim">No Induk</label>
                                      <input type="text" class="form-control" name="nim" id="nim" value="{{ $sakit->nim }}" readonly>
                                  </div>

                                  <div class="form-group">
                                      <label for="nama">Nama</label>
                                      <input type="text" class="form-control" name="nama" id="nama" value="{{ $sakit->nama }}" readonly>
                                  </div>

                                  <div class="form-group">
                                      <label for="umur">Umur</label>
                                      <input type="text" class="form-control @error('umur') is-invalid @enderror me-2" name="umur" id="umur" value="{{ old('umur', $sakit->umur) }}">
                                      @error('umur')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="unit">Unit/Jurusan</label>
                                      <input type="text" class="form-control @error('unit') is-invalid @enderror me-2" name="unit" id="unit" value="{{ old('unit', $sakit->unit) }}">
                                      @error('unit')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="total_izin">Total Izin(hari)</label>
                                      <input type="text" class="form-control @error('total_izin') is-invalid @enderror me-2" name="total_izin" id="total_izin" value="{{ old('total_izin', $sakit->total_izin) }}">
                                      @error('total_izin')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="row">
                                  <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="mulai_tgl">Mulai Tanggal</label>
                                      <input type="date" class="form-control @error('mulai_tgl') is-invalid @enderror me-2" name="mulai_tgl" id="mulai_tgl" value="{{ old('mulai_tgl', $sakit->mulai_tgl->format('Y-m-d')) }}">
                                      @error('mulai_tgl')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>
                                  </div>

                                  <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="akhir_tgl">Sampai Tanggal</label>
                                      <input type="date" class="form-control @error('akhir_tgl') is-invalid @enderror me-2" name="akhir_tgl" id="akhir_tgl" value="{{ old('akhir_tgl', $sakit->akhir_tgl->format('Y-m-d')) }}">
                                      @error('akhir_tgl')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>
                                  </div>
                                  </div>

                              <div class="modal-footer">
                                  <button type="reset" id="tambah_brg" name="reset" class="btn btn-danger">Kosongkan</button>
                                  <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                              </form>

                              </div>
                          </div>
                          </div>
                          </div>
{{-- endforeach --}}
                  </div>

              </div>
          <div>
      </div>

      <!-- /.container-fluid -->
  </div>

</x-app-layout>

<script>
    //fungsi modal edit surat validation error
    @if ($errors->has('no_surat')|| $errors->has('tanggal'))
       $('#editBarang2').modal('show');
    @endif

// fungsi modal edit sakit validation error
    @if ($errors->has('umur')|| $errors->has('unit') || $errors->has('mulai_tgl') || $errors->has('akhir_tgl') || $errors->has('total_izin'))
       $('#editBarang3').modal('show');
    @endif
</script>
