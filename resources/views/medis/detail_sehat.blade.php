<x-app-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Detail Surat Keterangan Sehat</h1>
        </div>



      <div class="row justify-content-center">

          <div class="col-md-10">
              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Surat <a style="text-decoration:none;"
                  class="text-primary float-right" href="" data-toggle="modal" data-target="#editBarang"> <i class="fa
                 fa-edit"></i></a></h6>
                  </div>

                  <div class="card-body row">
                  <div class="col-md-6">
                      <div style="margin-bottom:17px;">
                          <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">No Surat</div>
                          </div>
                          <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $surat->no_surat }}</div>
                      </div>
                  </div>

                  <div class="col-md-6">
                      <div style="margin-bottom:17px;">
                          <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Tanggal</div>
                          </div>
                          <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $surat->tanggal->format('d-m-Y') }}</div>
                      </div>
                  </div>

                          <!-- Modal -->
                          <div class="modal fade" id="editBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-md">
                              <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Form Edit Surat</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{ route('izin.update', $surat->id) }}" method="post" >
                                    @csrf
                                    @method('put')
                                  <div class="form-group">
                                      <label for="no_surat">No Surat</label>
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
      </div>

      <div class="row justify-content-center">
          <div class="col-md-5">

              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Diri <a style="text-decoration:none;"
                  class="text-primary float-right" href="" data-toggle="modal" data-target="#editBarang2"> <i class="fa
                 fa-edit"></i></a></h6>
                  </div>

                  <div class="card-body">

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Nama</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sehat->nama }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Tempat lahir</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sehat->tempat_lahir }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Tanggal lahir</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sehat->ttl->format('d-m-Y') }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">pekerjaan</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sehat->pekerjaan }}</div>
                  </div>


                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">kegunaan</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sehat->untuk }}</div>
                  </div>

                          <!-- Modal -->
                          <div class="modal fade" id="editBarang2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-md">
                              <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Diri</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{ route('sehat.update', $surat->id) }}" method="post" >
                                    @csrf
                                    @method('put')
                                  <div class="form-group">
                                      <label for="nama">Nama</label>
                                      <input type="text" class="form-control @error('nama') is-invalid @enderror me-2" name="nama" id="nama" value="{{ old('nama', $sehat->nama) }}">
                                      @error('nama')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="tempat_lahir">Tempat Lahir</label>
                                      <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror me-2" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir', $sehat->tempat_lahir) }}">
                                      @error('tempat_lahir')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="ttl">Tanggal Lahir</label>
                                      <input type="date" class="form-control @error('ttl') is-invalid @enderror me-2" name="ttl" id="ttl" value="{{ old('ttl', $sehat->ttl->format('Y-m-d')) }}">
                                      @error('ttl')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="pekerjaan">Pekerjaan</label>
                                      <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror me-2" name="pekerjaan" id="pekerjaan" value="{{ old('pekerjaan', $sehat->pekerjaan) }}">
                                      @error('pekerjaan')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="untuk">Kegunaan</label>
                                      <input type="untuk" class="form-control @error('untuk') is-invalid @enderror me-2" name="untuk" id="untuk" value="{{ old('untuk', $sehat->untuk) }}">
                                      @error('untuk')
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

              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Pemeriksaan <a style="text-decoration:none;"
                  class="text-primary float-right" href="" data-toggle="modal" data-target="#editBarang3"> <i class="fa
                 fa-edit"></i></a></h6>
                  </div>

                  <div class="card-body">

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">tinggi badan</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sehatd->tinggi }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">berat badan</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sehatd->berat }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Tekanan darah</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sehatd->tekanan_darah }}</div>
                  </div>

                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">golongan darah</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sehatd->gol_darah }}</div>
                  </div>


                  <div style="margin-bottom:17px;">
                      <div class="row no-gutters">
                      <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">buta warna</div>
                      </div>
                      <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $sehatd->buta_warna }}</div>
                  </div>

                          <!-- Modal -->
                          <div class="modal fade" id="editBarang3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-md">
                              <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Form Edit pemeriksaan</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <form action="{{ route('sehatd.update', $sehatd->id_sehat) }}" method="post" >
                                    @csrf
                                    @method('put')
                                  <div class="form-group">
                                      <label for="tinggi">Tinggi Badan</label>
                                      <input type="text" class="form-control @error('tinggi') is-invalid @enderror me-2" name="tinggi" id="tinggi" value="{{ old('tinggi', $sehatd->tinggi) }}">
                                      @error('tinggi')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="berat">Berat Badan</label>
                                      <input type="text" class="form-control @error('berat') is-invalid @enderror me-2" name="berat" id="berat" value="{{ old('berat', $sehatd->berat) }}">
                                      @error('berat')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="tekanan_darah">Tekanan Darah</label>
                                      <input type="text" class="form-control @error('tekanan_darah') is-invalid @enderror me-2" name="tekanan_darah" id="tekanan_darah" value="{{ old('tekanan_darah', $sehatd->tekanan_darah) }}">
                                      @error('tekanan_darah')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="gol_darah">Golongan Darah</label>
                                      <input type="text" class="form-control @error('gol_darah') is-invalid @enderror me-2" name="gol_darah" id="gol_darah" value="{{ old('gol_darah', $sehatd->gol_darah) }}">
                                      @error('gol_darah')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                  </div>

                                  <div class="form-group">
                                      <label for="buta_warna">Buta Warna</label>
                                      <input type="text" class="form-control @error('buta_warna') is-invalid @enderror me-2" name="buta_warna" id="buta_warna" value="{{ old('buta_warna', $sehatd->buta_warna) }}">
                                      @error('buta_warna')
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
          <div>
      </div>

      <!-- /.container-fluid -->
  </div>
</x-app-layout>

<script>
    //fungsi modal edit surat validation error
    @if ($errors->has('no_surat')|| $errors->has('tanggal'))
       $('#editBarang').modal('show');
    @endif

    //fungsi modal edit surat sehat validation error
    @if ($errors->has('nama') || $errors->has('tempat_lahir') || $errors->has('ttl') || $errors->has('pekerjaan') || $errors->has('untuk'))
       $('#editBarang2').modal('show');
    @endif

    //fungsi modal edit surat sehat detail validation error
    @if ($errors->has('tinggi') || $errors->has('berat') || $errors->has('tekanan_darah') || $errors->has('gol_darah') || $errors->has('buta_warna'))
       $('#editBarang3').modal('show');
    @endif
</script>
