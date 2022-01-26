<x-app-layout2>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row justify-content-center">
        <div class="col-md-10">

          <div class="card shadow mt-5">
              <div class="card-body">
              <a href="" class="btn btn-md btn-info" data-toggle="modal" data-target="#editBarang"><i class="fas fa-id-card-alt" style="margin-right: 3px;"></i>Data Diri</a>

              </div>
          </div>
          @foreach($pasien as $row)
<div id="editBarang" class="modal fade" role="dialog">
<div class="modal-dialog modal-lg">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Data Diri</h4>
    </div>
    <div class="modal-body">

    <form>

      <div class="row">

      <div class="col-sm-6">
      <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" class="form-control" name="nik" id="nik" required="" value="{{ $row->nik }}" readonly>
      </div>
      </div>

      <div class="col-sm-6">
      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" required="" value="{{ $row->nama }}" readonly>
      </div>
      </div>

      </div>

      <div class="row">

      <div class="col-sm-6">
      <div class="form-group">
      <label for="hp">Hp</label>
        <input type="text" class="form-control" name="hp" id="hp" value="{{ $row->hp }}" readonly>
      </div>
      </div>

      <div class="col-sm-6">
      <div class="form-group">
      <label for="unit">Unit/Jurusan</label>
        <input type="text" class="form-control" name="unit" id="unit" required="" value="{{ $row->unit }}" readonly>
      </div>
      </div>

      </div>

      <div class="row">

      <div class="col-sm-6">
      <div class="form-group">
      <label for="umur">Umur</label>
        <input type="text" class="form-control" name="umur" id="umur" value="{{ $row->umur }}" readonly>
      </div>
      </div>

      <div class="col-sm-6">
      <div class="form-group">
      <label for="tgllahir">Tanggal Lahir</label>
        <input type="date" class="form-control" name="tgllahir" id="tgllahir" value="{{ $row->tgllahir }}" readonly>
      </div>
      </div>

      </div>

      <div class="row">

      <div class="col-sm-6">
      <div class="form-group">
      <label for="tempat">Tempat Lahir</label>
        <input type="text" class="form-control" name="tempat" id="tempat" value="{{ $row->tempat }}" readonly>
      </div>
      </div>

      <div class="col-sm-6">
      <div class="form-group">
      <label for="tempat">Jenis Kelamin</label>
        <input type="text" class="form-control" name="tempat" id="tempat" value="{{ $row->kelamin }}" readonly>
      </div>
      </div>

      </div>

      </form>
    </div>

  </div>
</div>
</div>


      <!--endform!-->

        @endforeach

              <div class="card shadow mt-5">
                <div class="card-header bg-primary text-white ">
                  Riwayat Pemeriksaan
                </div>
                <div class="card-body">

                </div>
                <table class="table table-bordered table-stripped" id="tbdosen">
              <thead>
              <tr>
                  <th>NO</th>
                  <th>Tanggal</th>
                  <th>keluhan</th>
                  <th>Pemeriksaan</th>
                  <th>Tindakan</th>
                  <th>Aksi</th>
              </tr>
              </thead>

              <tbody>

              @foreach($periksa as $index => $row)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                  <td>{{ $row->keluhan }}</td>
                  <td>{{ $row->pemeriksaan }}</td>
                  <td>{{ $row->tindakan }}</td>
                  <td>
                      <a href="/pengguna/detail/medis/{{ $row->id }}" class="btn btn-sm btn-info">Detail</a>
                  </td>
              </tr>
              @endforeach
              </tbody>
              </table>
              </div>

              <hr>

              <div class="card shadow mt-5">
                <div class="card-header bg-primary text-white ">
                  Riwayat Pengambilan Obat
                </div>
                <div class="card-body">

                </div>
                <table class="dt-responsive nowrap table table-bordered table-stripped" id="tbobat">
              <thead>
              <tr>
                  <th>NO</th>
                  <th>Tanggal</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>Jumlah</th>
                  <th>Sediaan</th>
                  <th>Satuan</th>
                  <th>Expired</th>
              </tr>
              </thead>

              <tbody>
              @foreach($keluar as $index => $row)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ Carbon\Carbon::parse($row->tgl_keluar)->format('d-m-Y') }}</td>
                  <td>S-{{ sprintf('%05s',$row->id) }}</td>
                  <td>{{ $row->nama_obat }}</td>
                  <td>{{ $row->jmlh_keluar }}</td>
                  <td>{{ $row->sediaan }}</td>
                  <td>{{ $row->satuan }}</td>
                  <td>{{ Carbon\Carbon::parse($row->expired)->format('d-m-Y') }}</td>
              </tr>
              @endforeach
            </tbody>
            </table>

              </div>
              <hr>

              <div class="card shadow mt-5">
                <div class="card-header bg-primary text-white ">
                  Surat Izin Sakit
                </div>
                <div class="card-body">

                </div>
                <table class="dt-responsive nowrap table table-bordered table-stripped" id="tbsakit">
              <thead>
              <tr>
                  <th>NO</th>
                  <th>Tanggal</th>
                  <th>No Surat</th>
                  <th>Total Izin</th>
                  <th>Aksi</th>
              </tr>
              </thead>

              <tbody>
              @foreach($sakit as $index => $row)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                  <td>{{ $row->no_surat }}</td>
                  <td>{{ $row->total_izin }}</td>
                  <td>
                  <a href="/pengguna/detail/sakit/{{ $row->id }}" class="btn btn-sm btn-info">Detail</a>
                  <a href="/bukti/sakit/{{ $row->id }}" target="_blank" class="btn btn-sm btn-secondary">Print</a>
                  </td>
              </tr>
              @endforeach
            </tbody>
            </table>

              </div>

            </div>

          </div>
</x-app-layout2>

<script>
    $(document).ready(function() {
        var table = $('#tbdosen').DataTable( {
            lengthChange: true,
            responsive: true
        } );

        new $.fn.dataTable.FixedHeader( table );
    } );
      </script>


    <script>
    $(document).ready(function() {
        var table = $('#tbobat').DataTable( {
            lengthChange: true,
            responsive: true
        } );

        new $.fn.dataTable.FixedHeader( table );
    } );
      </script>

    <script>
    $(document).ready(function() {
        var table = $('#tbsakit').DataTable( {
            lengthChange: true,
            responsive: true
        } );

        new $.fn.dataTable.FixedHeader( table );
    } );
      </script>
