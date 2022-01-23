<x-app-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Surat Keterangan Sakit</h1>
        </div>

      <div class="row">
          <div class="col-lg-5">
              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Surat Keterangan Sakit</h6>
                  </div>
                  <div class="card-body">

                  <form action="{{ route('izin.store') }}" method="post">
                    @csrf

                  <input type="hidden" id="jenis_surat" name="jenis_surat" value="sakit">

                  <div class="form-group">
                      <label for="tanggal" class="m-0 font-weight-bold text-dark">Tanggal</label>
                      <input type="date" class="form-control @error('tanggal') is-invalid @enderror me-2" name="tanggal" id="tanggal" value="{{ old('tanggal') }}">
                        @error('tanggal')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                  </div>

                  <div class="form-group">
                      <label for="no_surat" class="m-0 font-weight-bold text-dark">Nomor Surat</label>
                      <input type="text" class="form-control @error('no_surat') is-invalid @enderror me-2" name="no_surat" id="no_surat" value="{{ old('no_surat') }}">
                      @error('no_surat')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                  </div>

                  <div class="form-group">
                      <label for="nik" class="m-0 font-weight-bold text-dark">NIM/NIK</label>
                      <input type="text" class="form-control @error('nik') is-invalid @enderror me-2" name="nik" id="nik" value="{{ old('nik') }}">
                      <button class="btn btn-success btn-sm float-right mb-3" type="button" onclick="search()"><i class="fa fa-search"></i> Cari</button>
                      @error('nik')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                  </div>


                  <div class="form-group">
                      <label for="nama" class="m-0 font-weight-bold text-dark">Nama</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror me-2" name="nama" id="nama" readonly>
                      @error('nama')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                  </div>

                  <div class="form-group">
                      <label for="unit" class="m-0 font-weight-bold text-dark">Unit/Jurusan</label>
                      <input type="text" class="form-control @error('unit') is-invalid @enderror me-2" name="unit" id="unit" value="{{ old('unit') }}">
                      @error('unit')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                  </div>

                  <div class="row">

                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="umur" class="m-0 font-weight-bold text-dark">umur</label>
                      <input type="text" class="form-control @error('umur') is-invalid @enderror me-2" name="umur" id="umur" value="{{ old('umur') }}">
                      @error('umur')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="total_izin" class="m-0 font-weight-bold text-dark">Total Izin(hari)</label>
                      <input type="text" class="form-control @error('total_izin') is-invalid @enderror me-2" name="total_izin" id="total_izin" value="{{ old('total_izin') }}">
                      @error('total_izin')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                  </div>
                  </div>

                  </div>

                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="mulai_tgl" class="m-0 font-weight-bold text-dark">Mulai Tanggal</label>
                      <input type="date" class="form-control @error('mulai_tgl') is-invalid @enderror me-2" name="mulai_tgl" id="mulai_tgl" value="{{ old('mulai_tgl') }}">
                      @error('mulai_tgl')
                        <span class="invalid-feedback">{{$message}}</span>
                        @enderror
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="akhir_tgl" class="m-0 font-weight-bold text-dark">Sampai Tanggal</label>
                      <input type="date" class="form-control @error('akhir_tgl') is-invalid @enderror me-2" name="akhir_tgl" id="akhir_tgl" value="{{ old('akhir_tgl') }}">
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


          <div class="col-lg-7">
              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Surat Keterangan Sakit</h6>
                  </div>
                  <div class="card-body">

        <!--endform!-->
        <div class="card-body row">

          </div>
                  <table class="dt-responsive nowrap table table-bordered table-stripped" id="tbdosen">
              <thead>
              <tr>
                  <th>NO</th>
                  <th>Tanggal</th>
                  <th>Nomor Surat</th>
                  <th>NIM/NIK</th>
                  <th>Nama</th>
                  <th>Unit/Jurusan</th>
                  <th>Aksi</th>
              </tr>
              </thead>

              <tbody>
             @foreach($sakit as $index => $row)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $row->tanggal }}</td>
                  <td>{{ $row->no_surat }}</td>
                  <td>{{ $row->nim }}</td>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->unit }}</td>
                  <td>
                      <a href="/surat/izin/{{ $row->id }}/bukti" target="_blank" class="btn btn-sm btn-secondary">Print</a>
                      <a href="/surat/izin/{{ $row->id }}" class="btn btn-sm btn-info">Detail</a>
                      <a href="" class="btn btn-sm btn-danger" data-toggle="modal" onclick="modalhapus({{ $row->id }})" data-target="#hapusBarang">Hapus</a>
                  </td>
              </tr>
              <?php var_dump($row->id) ?>

              @endforeach

                  </tbody>
              </table>

                  </div>
              </div>
          </div>

      </div>

      <!-- /.container-fluid -->
  </div>
</x-app-layout>

{{-- hapus modal--}}
<div id="hapusBarang" class="modal fade" role="dialog">

    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
        </div>
        <div class="modal-body">

        <form action="" id="modalhapus" method="post">
            @csrf
            @method('delete')
                <center><h6 class="modal-title">Apakah Anda ingin menghapus data ini ?</h6>
                <br>
          <div class="form-group">
            <button type="submit" id="hapus_brg" class="btn btn-primary btn-block">Hapus Data</button>
          </div>

          </form>
        </div>

      </div>
    </div>
  </div>
  {{-- tutup modal --}}

<script>
    // datatable
    $(document).ready(function() {
        var table = $('#tbdosen').DataTable( {
            lengthChange: true,
            responsive: true
        } );

        new $.fn.dataTable.FixedHeader( table );
    } );

    // modal hapus
    function modalhapus(id){
        $('#modalhapus').attr('action', '/surat/izin/' + id);
    }

    // fungsi get api
    function search(){
        var nik = $('#nik').val();
        var len = nik.length;
        if (len >= 6){
        $.ajax({
                url : '/apipasien/'+nik,
                type: 'get',
                dataType: 'json',
                success: function(data){
                    console.log(data.nama);
                    $('#nama').val(data.nama);
                }
        });
        }
    }
</script>
