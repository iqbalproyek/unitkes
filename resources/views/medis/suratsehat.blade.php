<x-app-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Surat Keterangan Sehat</h1>
        </div>

      <div class="row">
          <div class="col-lg-5">
              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Surat Keterangan Sehat</h6>
                  </div>
                  <div class="card-body">

                  <form action="{{ route('sehat.store') }}" method="post">
                    @csrf

                  <input type="hidden" id="jenis_surat" name="jenis_surat" value="sehat">

                  <div class="form-group">
                      <label for="tanggal" class="m-0 font-weight-bold text-dark">Tanggal</label>
                      <input type="date" class="form-control @error('tanggal') is-invalid @enderror me-2" name="tanggal" id="tanggal">
                      @error('tanggal')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="no_surat" class="m-0 font-weight-bold text-dark">Nomor Surat</label>
                      <input type="text" class="form-control @error('no_surat') is-invalid @enderror me-2" name="no_surat" id="no_surat">
                      @error('no_surat')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="nama" class="m-0 font-weight-bold text-dark">Nama</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror me-2" name="nama" id="nama">
                      @error('nama')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>

                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="tempat_lahir" class="m-0 font-weight-bold text-dark">Tempat Lahir</label>
                      <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror me-2" name="tempat_lahir" id="tempat_lahir">
                      @error('tempat_lahir')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="ttl" class="m-0 font-weight-bold text-dark">Tanggal Lahir</label>
                      <input type="date" class="form-control @error('ttl') is-invalid @enderror me-2" name="ttl" id="ttl">
                      @error('ttl')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>
                  </div>
                  </div>

                  <div class="form-group">
                      <label for="pekerjaan" class="m-0 font-weight-bold text-dark">Pekerjaan</label>
                      <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror me-2" name="pekerjaan">
                      @error('pekerjaan')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="form-group">
                      <label for="untuk" class="m-0 font-weight-bold text-dark">Kegunaan</label>
                      <input type="text" class="form-control @error('untuk') is-invalid @enderror me-2" name="untuk" id="untuk">
                      @error('untuk')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>

                  <div class="row">
                  <div class="col-md-4">
                  <div class="form-group">
                      <label for="tinggi" class="m-0 font-weight-bold text-dark">Tinggi</label>
                      <input type="text" class="form-control @error('tinggi') is-invalid @enderror me-2" name="tinggi" id="tinggi">
                      @error('tinggi')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                      <label for="berat" class="m-0 font-weight-bold text-dark">berat</label>
                      <input type="text" class="form-control @error('berat') is-invalid @enderror me-2" name="berat" id="berat">
                      @error('berat')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>
                  </div>

                  <div class="col-md-4">
                  <div class="form-group">
                      <label for="tekanan_darah" class="m-0 font-weight-bold text-dark">Tekanan drh</label>
                      <input type="text" class="form-control @error('tekanan_darah') is-invalid @enderror me-2" name="tekanan_darah" id="tekanan_darah">
                      @error('tekanan_darah')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>
                  </div>
                  </div>

                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="gol_darah" class="m-0 font-weight-bold text-dark">Golongan Darah</label>
                      <input type="text" class="form-control @error('gol_darah') is-invalid @enderror me-2" name="gol_darah" id="gol_darah">
                      @error('gol_darah')
                      <span class="invalid-feedback">{{$message}}</span>
                      @enderror
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="buta_warna" class="m-0 font-weight-bold text-dark">Buta Warna</label>
                      <input type="text" class="form-control @error('buta_warna') is-invalid @enderror me-2" name="buta_warna" id="buta_warna">
                      @error('buta_warna')
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Surat Keterangan Sehat</h6>
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
                  <th>Nama</th>
                  <th>Pekerjaan</th>
                  <th>Aksi</th>
              </tr>
              </thead>

              <tbody>
        @foreach($sehat as $index => $row)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                  <td>{{ $row->no_surat }}</td>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->pekerjaan }}</td>
                  <td>
                      <a href="/surat/kesehatan/{{ $row->id }}/bukti" target="_blank" class="btn btn-sm btn-secondary">Print</a>
                      <a href="/surat/kesehatan/{{ $row->id }}" class="btn btn-sm btn-info">Detail</a>
                      <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusBarang" onclick="modalhapus({{ $row->id }})">Hapus</a>
                  </td>
              </tr>

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
</script>
