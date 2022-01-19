<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dosen</h1>
        </div>

        <div class="card mt-3">

              </div>
                <div class="card-body">
                  <div>
                    <a href="" class="btn btn-lg btn-primary btn-loading label label-primary pull-right" style="font-size: 16px;padding-bottom: 5px;padding-top: 5px;"
                      data-toggle="modal" data-target="#modalTambahBarang"><i class="fa fa-plus" style="margin-right: 3px;"></i> Tambah Data
                    </a>
                  </div>
                </div>

        <div class="card shadow mt-3">
          <div class="card-header bg-primary text-white ">
              Data Dosen
          </div>
          <div class="card-body row">

              </div>

              <table class="table table-bordered table-stripped" id="tbdosen">
              <thead>
              <tr>
                  <th width="5%">NO</th>
                  <th width="15%">NIK</th>
                  <th width="30%">Nama</th>
                  <th width="35%">Unit/Jurusan</th>
                  <th width="15%">Aksi</th>
              </tr>
              </thead>

              <tbody>
            @foreach($pasien as $index => $row)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $row->nik }}</td>
                  <td>{{ $row->nama }}</td>
                  <td>{{ $row->unit }}</td>
                  <td>
                      <a href="tb_cek.php?id=" class="btn btn-sm btn-info">Lihat</a>
                      <a href="" class="btn btn-sm btn-danger" onclick="modalhapus({{ $row->id }})" data-toggle="modal" data-target="#hapusBarang">Hapus</a>
                  </td>
              </tr>
            @endforeach
                  </tbody>
              </table>

          </div>
          <!--endtable!-->
          @include('medis.modal_pasien')
        </div>
</x-app-layout>

<script>
    // datatable
    $(document).ready(function() {
        var table = $('#tbdosen').DataTable( {
            lengthChange: true,
        } );
    } );

    // modal hapus
    function modalhapus(id){
        $('#hapuspasien').attr('action', 'pasien/' + id);
    }
</script>
