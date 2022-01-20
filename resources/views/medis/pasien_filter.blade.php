<x-app-layout>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">{{ $head }}</h1>
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
          <div class="card-body row d-flex justify-content-end">

            <div class="dropdown show">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Filter Pasien
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item text-lg" href="{{ route('pasien.index') }}">All</a>
                    <a class="dropdown-item text-lg" href="{{ route('pasien.filter', 'Dosen') }}">Dosen</a>
                    <a class="dropdown-item text-lg" href="{{ route('pasien.filter', 'pegawai') }}">Pegawai</a>
                    <a class="dropdown-item text-lg" href="{{ route('pasien.filter', 'Mahasiswa') }}">Mahasiswa</a>
                </div>
              </div>

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
        $('#hapuspasien').attr('action', '/pasien/' + id);
    }

    //fungsi modal tambah validation error
    @if ($errors->has('nik')|| $errors->has('nama') || $errors->has('hp') || $errors->has('unit') || $errors->has('umur') || $errors->has('tgllahir') || $errors->has('tempat') || $errors->has('kelamin') || $errors->has('kategori') || $errors->has('email'))
       $('#modalTambahBarang').modal('show');
    @endif

    // fungsi modal edit
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
                    $('#kategori').val(data.jabatan);
                }
        });
        }
    }
</script>
