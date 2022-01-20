<x-app-layout>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb bg-white shadow">
                    <li class="breadcrumb-item" style="font-size:14px;"><a href="#" onClick="location.href='/pasien'">Data Pasien</a></li>
                    <li class="breadcrumb-item active" style="font-size:14px;" aria-current="page">Rekam Medis</li>
                  </ol>
                </nav>
                <br>

                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Rekam Medis</h1>
                  </div>

                  <div class="row">
                      <div class="col-lg-4">
                          <div class="card shadow mt-3">
                              <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Detail Pasien <a style="text-decoration:none;"
                              class="text-primary float-right" href="" data-toggle="modal" data-target="#editBarang"> <i class="fa
                            fa-edit"></i></a></h6>
                              </div>
                              <div class="card-body">

                          <div style="margin-bottom:17px;">
                          <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">No induk</div>
                          </div>
                  <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $pasien->nik }}</div>
                        </div>

                        <div style="margin-bottom:17px;">
                          <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">NAMA</div>
                          </div>
                  <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $pasien->nama }}</div>
                  </div>

                        <div style="margin-bottom:17px;">
                  <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">No TELEPON</div>
                          </div>
                  <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $pasien->hp }}</div>
                  </div>

                        <div style="margin-bottom:17px;">
                  <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Unit</div>
                          </div>
                  <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $pasien->unit }}</div>
                  </div>


                  <div style="margin-bottom:17px;">
                  <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">UMUR</div>
                          </div>
                  <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $pasien->umur }}</div>
                  </div>

                  <div style="margin-bottom:18px;">
                  <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">TANGGAL LAHIR</div>
                          </div>
                  <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $pasien->tgllahir->format("d F Y") }}</div>
                  </div>

                    <div style="margin-bottom:18px;">
                  <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">TEMPAT LAHIR</div>
                          </div>
                  <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $pasien->tempat }}</div>
                  </div>

                  <div style="margin-bottom:18px;">
                  <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">JENIS KELAMIN</div>
                          </div>
                  <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $pasien->kelamin }}</div>
                  </div>

                    <div style="margin-bottom:18px;">
                  <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">kategori</div>
                          </div>
                  <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $pasien->kategori }}</div>
                  </div>

                    <div style="margin-bottom:18px;">
                  <div class="row no-gutters">
                          <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">email</div>
                          </div>
                  <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $pasien->email }}</div>
                  </div>

                              </div>
                          </div>
                      </div>

        {{-- modal edit user --}}
        <div id="editBarang" class="modal fade" role="dialog">

          <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Ubah Data Pasien</h4>

              </div>

              <div class="modal-body">

              <form action="{{ route('pasien.update', $pasien->id) }}" method="post">
                @csrf
                @method('put')
                <div class="row">

                <div class="col-sm-6">
                <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control @error('nik') is-invalid @enderror me-2" name="nik" id="nik" readonly value="{{ old('nik', $pasien->nik) }}">
                  @error('nik')
                    <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                </div>

                <div class="col-sm-6">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror me-2" name="nama" id="nama" value="{{ old('nama', $pasien->nama) }}" readonly>
                  @error('nama')
                  <span class="invalid-feedback">{{$message}}</span>
                  @enderror
                </div>
                </div>

                </div>

                <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="kategori">kategori</label>
                          <input type="text" class="form-control @error('kategori') is-invalid @enderror me-2" name="kategori" id="kategori" value="{{ old('kategori', $pasien->kategori) }}" readonly>
                          @error('kategori')
                          <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control @error('email') is-invalid @enderror me-2" name="email" id="email" value="{{ old('email', $pasien->email) }}">
                          @error('email')
                          <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                        </div>
                        </div>
                        </div>

                        <div class="row">

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="hp">Hp</label>
                        <input type="text" class="form-control @error('hp') is-invalid @enderror me-2" name="hp" id="hp" value="{{ old('hp', $pasien->hp) }}">
                        @error('hp')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="unit">Unit/Jurusan</label>
                        <input type="text" class="form-control @error('unit') is-invalid @enderror me-2" name="unit" id="unit" value="{{ old('unit', $pasien->unit) }}">
                        @error('unit')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                        </div>
                        </div>

                        </div>

                        <div class="row">

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="umur">Umur</label>
                        <input type="text" class="form-control @error('umur') is-invalid @enderror me-2" name="umur" id="umur" value="{{ old('umur', $pasien->umur) }}">
                        @error('umur')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="tgllahir">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tgllahir') is-invalid @enderror me-2" name="tgllahir" id="tgllahir" value="{{ old('tgllahir', $pasien->tgllahir->format("Y-m-d")) }}">
                        @error('tgllahir')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                        </div>
                        </div>

                        </div>

                        <div class="row">

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="tempat">Tempat Lahir</label>
                        <input type="text" class="form-control @error('tempat') is-invalid @enderror me-2" name="tempat" id="tempat" value="{{ old('tempat', $pasien->tempat) }}">
                        @error('tempat')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="kelamin">Jenis Kelamin</label>
                        <select class="form-control @error('kelamin') is-invalid @enderror me-2" name="kelamin" id="kelamin">
                            <option value="{{ old('kelamin', $pasien->kelamin) }}">{{ old('kelamin', $pasien->kelamin) }}</option>
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                        </select>
                        @error('kelamin')
                            <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                        </div>
                        </div>

                        </div>

                        <div class="form-group">
                        <button type="submit" id="tambah_brg" class="btn btn-primary btn-block">Simpan</button>
                        </div>

                </form>
              </div>

            </div>
          </div>
        </div>
        <!--endform modal edit user!-->

                    <div class="col-xl-8 col-lg-4">
                        <div class="card shadow mt-3">
                            <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Riwayat Pemeriksaan Pasien <a style="text-decoration:none;"
                            class="text-primary float-right" href="" onclick="modaltambah({{ $pasien->id }}, {{ $pasien->nik }})" data-toggle="modal" data-target="#modalTambahBarang"> <i class="fa
                           fa-plus"></i></a></h6>
                            </div>
                            <div class="card-body">
                            <div class="card-body row">
                            </div>
                                <table class="table table-bordered table-stripped" id="tbdosen">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- foreach data cek --}}
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <a href="tb_rekam.php?view=" class="btn btn-sm btn-info">Detail</a>
                                            <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusBarang">Hapus</a>
                                        </td>
                                    </tr>
                                {{-- endforeach data cek --}}
                                </tbody>
                                </table>

                                @include('medis.modal_rekam')

                            </div>
                        </div>
                    </div>

                </div>

                <!-- /.container-fluid -->
            </div>
</x-app-layout>
<script>
// datatable
$(document).ready(function() {
    var table = $('#tbdosen').DataTable( {
        lengthChange: true,
    } );

    table.buttons().container()
        .appendTo( '#tbdosen_wrapper .col-md-6:eq(0)' );
} );

//fungsi modal tambah validation error
    @if ($errors->has('nik')|| $errors->has('nama') || $errors->has('hp') || $errors->has('unit') || $errors->has('umur') || $errors->has('tgllahir') || $errors->has('tempat') || $errors->has('kelamin') || $errors->has('kategori') || $errors->has('email'))
       $('#editBarang').modal('show');
    @endif

// modal tambah
function modaltambah(id, nik){
    console.log(id);
    $('#id_pasien').append(`<option value="${id}">${nik}</option>`);
}

</script>
