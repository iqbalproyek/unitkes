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

                <div id="modalTambahBarang" class="modal fade" role="dialog">

                  <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">


                      <div class="modal-header">

                        <h4 class="modal-title">Tambah Data</h4>

                      </div>


                      <div class="modal-body">

                      <form action="prosesdsn.php?aksi=tambah" method="post">

                        <div class="row">

                        <div class="col-sm-6">
                        <div class="form-group">
                          <label for="nik">NIK</label>
                          <input type="text" class="form-control" name="nik" id="nik" onkeyup="search()" required="">
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control readonly" style="background-color: #eaecf4;" name="nama" id="nama" required>
                        </div>
                        </div>

                        </div>

                        <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="kategori">kategori</label>
                          <input type="text" class="form-control readonly" style="background-color: #eaecf4;" name="kategori" id="kategori" required>
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" name="email" id="email" required>
                        </div>
                        </div>
                        </div>

                        <div class="row">

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="hp">Hp</label>
                          <input type="text" class="form-control" name="hp" id="hp">
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="unit">Unit/Jurusan</label>
                          <input type="text" class="form-control" name="unit" id="unit" required="" >
                        </div>
                        </div>

                        </div>

                        <div class="row">

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="umur">Umur</label>
                          <input type="text" class="form-control" name="umur" id="umur">
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="tgllahir">Tanggal Lahir</label>
                          <input type="date" class="form-control" name="tgllahir" id="tgllahir" required="">
                        </div>
                        </div>

                        </div>

                        <div class="row">

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="tempat">Tempat Lahir</label>
                          <input type="text" class="form-control" name="tempat" id="tempat">
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <div class="form-group">
                        <label for="kelamin">Jenis Kelamin</label>
                          <select class="form-control" name="kelamin" id="kelamin" required="">
                            <option value="">Pilih . . .</option>
                            <option value="laki-laki">laki-laki</option>
                            <option value="perempuan">perempuan</option>
                          </select>
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
                        <!--endform!-->


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
                      <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#hapusBarang">Hapus</a>
                  </td>
              </tr>

         <div id="hapusBarang" class="modal fade" role="dialog">

              <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">


                  <div class="modal-header">

                    <h4 class="modal-title">Hapus Data</h4>

                  </div>


                  <div class="modal-body">

                  <form action="prosesdsn.php?aksi=hapus" method="post">

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

            @endforeach
                  </tbody>
              </table>

          </div>
          <!--endtable!-->

        </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        var table = $('#tbdosen').DataTable( {
            lengthChange: true,
        } );
    } );
</script>
