<x-app-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Stok Obat</h1>
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
              Daftar Stok Obat
          </div>

          <form method="post">
        <div class="card-body row">
            <div class="col-md-3">
                  <input type="date" name="from_date" id="from_date" class="form-control">
              </div>

              <div class="col-md-3">
                  <input type="date" name="to_date" id="to_date" class="form-control">
              </div>
              <script>
                var	from = document.getElementById('from_date');
                var	to = document.getElementById('to_date');
                function fill(){
                javascript:location.href='/obat/stok/'+from.value+'/'+to.value;
                }
            </script>

              <div class="col-md-3">
                <a href="/obat/stok" class="btn btn-sm btn-danger" type="button">Batal</a>
              <button class="btn btn-md btn-secondary" onclick="fill()" type="button" name="filter" id="filter">Filter Expired</button>
              </div>
          </div>
          </form>

              <table class="table table-bordered table-stripped" id="tbdosen">
              <thead>
              <tr>
                  <th>NO</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>Sediaan</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Expired</th>
                  <th>kegunaan</th>
                  <th>Aksi</th>
              </tr>
              </thead>

              <tbody>
            @foreach($stok as $index => $row)

              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>S-{{ sprintf('%05s',$row->id) }}</td>
                  <td>{{ $row->nama_obat }}</td>
                  <td>{{ $row->sediaan }}</td>
                  <td>{{ $row->satuan }}</td>
                  <td>{{ $row->jumlah }}</td>
                  <td>{{ Carbon\Carbon::parse($row->expired)->format('d-m-Y') }}</td>
                  <td>{{ $row->guna }}</td>
                  <td>
                  <a href="" class="btn btn-sm btn-warning" onclick="modaledit({{ $row->id }})" data-toggle="modal" data-target="#editBarang">Ubah</a>
                      <a href="" class="btn btn-sm btn-danger" onclick="modalhapus({{ $row->id }})" data-toggle="modal" data-target="#hapusBarang">Hapus</a>
                  </td>
              </tr>

              @endforeach

                  </tbody>
              </table>
          </div>

          </div>
          <!--endtable!-->
          {{-- end container --}}
          @include('farmasi.stokmodal')

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
        $('#hapusstok').attr('action', '/obat/stok/' + id);
    }

    //fungsi modal tambah validation error
    @if ($errors->has('nama_obat')|| $errors->has('sediaan') || $errors->has('satuan') || $errors->has('unit') || $errors->has('jumlah') || $errors->has('expired') || $errors->has('guna'))
       $('#modalTambahBarang').modal('show');
    @endif

    //fungsi modal edit validation error
    @if ($errors->has('nama_obat2')|| $errors->has('sediaan2') || $errors->has('satuan2') || $errors->has('unit2') || $errors->has('expired2') || $errors->has('guna2'))
       $('#editBarang').modal('show');
    @endif

    // fungsi modal edit
    function modaledit(id){
        $.ajax({
                url : '/obat/stok/'+id+'/edit',
                type: 'get',
                dataType: 'json',
                success: function(data){
                    console.log(data.data.isi);
                    $('#nama_obat2').val(data.data.nama_obat);
                    $('#sediaan2').val(data.data.sediaan);
                    $('#satuan2').val(data.data.satuan);
                    $('#jumlah2').val(data.data.jumlah);
                    $('#expired2').val(data.data.expired);
                    $('#guna2').val(data.data.guna);
                    $('#editobat').attr('action', '/obat/stok/'+id);
                }
            });
    }
</script>
