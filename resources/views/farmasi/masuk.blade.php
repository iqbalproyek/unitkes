<x-app-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Obat Masuk</h1>
        </div>

      <div class="row">
          <div class="col-lg-4">
              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Obat Masuk</h6>
                  </div>
                  <div class="card-body">

                  <form action="" id="masuk" method="post">
                      @csrf
                      @method('put')
                    <input type="hidden" name="id_obat" id="id_obat">
                  <div class="form-group">
                      <label for="tgl_masuk" class="m-0 font-weight-bold text-dark">Tanggal</label>
                      <input type="date" class="form-control @error('tgl_masuk') is-invalid @enderror me-2" name="tgl_masuk" id="tgl_masuk">
                      @error('tgl_masuk')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                      <label for="kode_obat" class="m-0 font-weight-bold text-dark">Kode Obat</label>
                      <input type="text" class="form-control" name="kode_obat" id="kode_obat" disabled required>
                      <span class="input-group-btn">
                      <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#tabelBarang">cari</a>
                      </span>
                  </div>

                  <div class="form-group">
                      <label for="nama_obat" class="m-0 font-weight-bold text-dark">Nama Obat</label>
                      <input type="text" class="form-control" name="nama_obat" id="nama_obat" disabled required>
                  </div>

                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="sediaan" class="m-0 font-weight-bold text-dark">Sediaan</label>
                      <input type="text" class="form-control" name="sediaan" id="sediaan" disabled required>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="satuan" class="m-0 font-weight-bold text-dark">Satuan</label>
                      <input type="text" class="form-control" name="satuan" id="satuan" disabled required>
                  </div>
                  </div>
                  </div>

                  <div class="form-group">
                      <label for="expired" class="m-0 font-weight-bold text-dark">Tanggal Expired</label>
                      <input type="date" class="form-control" name="expired" id="expired" disabled required>
                  </div>

                  <div class="form-group">
                      <label for="jmlh_masuk" class="m-0 font-weight-bold text-dark">Jumlah Masuk</label>
                      <input type="number" min="1" class="form-control @error('jmlh_masuk') is-invalid @enderror me-2" name="jmlh_masuk" id="jmlh_masuk">
                      @error('jmlh_masuk')
                        <span class="invalid-feedback">{{ $message }}</span>
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


    {{-- modal stok --}}
          <div id="tabelBarang" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">
                  <!-- Modal content-->
                  <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Stok Obat</h4>
                  </div>
                  <div class="modal-body">

                  <table class="table table-bordered table-stripped table-responsive" id="tbmodal">
              <thead>
              <tr>
                  <th>NO</th>
                  <th>Kode Obat</th>
                  <th>Nama Obat</th>
                  <th>Sediaan</th>
                  <th>Satuan</th>
                  <th>Jumlah</th>
                  <th>Expired</th>
                  <th>Aksi</th>
              </tr>
              </thead>

              <tbody>
              @foreach($stok as $index => $row)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ sprintf('%05s',$row->id_obat) }}</td>
                  <td>{{ $row->nama_obat }}</td>
                  <td>{{ $row->sediaan }}</td>
                  <td>{{ $row->satuan }}</td>
                  <td>{{ $row->jumlah }}</td>
                  <td>{{ $row->expired }}</td>
                  <td>
                  <button class="btn btn-sm btn-info" id="select" data-id_obat="{{ $row->id }}"
                                                                  data-kode_obat="{{ sprintf('%05s',$row->id_obat) }}"
                                                                  data-nama_obat="{{ $row->nama_obat }}"
                                                                  data-sediaan="{{ $row->sediaan }}"
                                                                  data-satuan="{{ $row->satuan }}"
                                                                  data-expired="{{ $row->expired }}">Select
                  </button>
                  </td>
              </tr>
              @endforeach
              </tbody>
              </table>

                  </div>

                  </div>
              </div>
              </div>
              {{-- tutup modal stok --}}



          <div class="col-lg-8">
              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Obat Masuk</h6>
                  </div>
                  <div class="card-body">

        <div class="card-body row">

          </div>
                  <table class="table table-bordered table-stripped table-responsive" id="tbdosen">
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
                  <th>Aksi</th>
              </tr>
              </thead>

              <tbody>
              @foreach($masuk as $index => $row)
              <?php
                $id = $row->id_obat;
                $len = strlen($id);
                if ($len == 1){
                    $kode = 'S-00000'.$id;
                }
                if ($len == 2){
                    $kode = 'S-0000'.$id;
                }
                if ($len == 3){
                    $kode = 'S-000'.$id;
                }
                if ($len == 4){
                    $kode = 'S-00'.$id;
                }
                if ($len == 5){
                    $kode = 'S-0'.$id;
                }
                if ($len == 6){
                    $kode = 'S-'.$id;
                }
                ?>
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $row->tgl_masuk }}</td>
                  <td>{{ $kode }}</td>
                  <td>{{ $row->nama_obat }}</td>
                  <td>{{ $row->jmlh_masuk }}</td>
                  <td>{{ $row->sediaan }}</td>
                  <td>{{ $row->satuan }}</td>
                  <td>{{ $row->expired }}</td>
                  <td>
                  <a href="" class="btn btn-sm btn-warning" data-toggle="modal" onclick="modaledit({{ $row->id }})" data-target="#editBarang">Edit</a>
                  <a href="" class="btn btn-sm btn-danger" data-toggle="modal" onclick="modalhapus({{ $row->id }})" data-target="#hapusBarang">Hapus</a>
                  </td>
              </tr>

              @endforeach

                  </tbody>
              </table>

                  </div>
              </div>
          </div>
          @include('farmasi.masukmodal')
      </div>

      <!-- /.container-fluid -->
  </div>

</x-app-layout>

<script>
    // datatable
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
        var table = $('#tbmodal').DataTable( {
            lengthChange: true,
        } );
    } );

    $(document).ready(function() {
      $(document).on('click', '#select', function() {
          var id_obat = $(this).data('id_obat');
          var kode_obat = $(this).data('kode_obat');
          var nama_obat = $(this).data('nama_obat');
          var sediaan = $(this).data('sediaan');
          var satuan = $(this).data('satuan');
          var expired = $(this).data('expired');
          $('#id_obat').val(id_obat);
          $('#kode_obat').val(kode_obat);
          $('#nama_obat').val(nama_obat);
          $('#sediaan').val(sediaan);
          $('#satuan').val(satuan);
          $('#expired').val(expired);
          $('#masuk').attr('action', '/obat/masuk/'+id_obat+'/stok');
          $('#tabelBarang').modal('hide');
      });
  });

    // modal hapus
    function modalhapus(id){
        $('#modalhapus').attr('action', '/obat/masuk/' + id);
    }

    // fungsi sprintf
    function p(i,w,z){z=z||0;w=w||8;i+='';var o=i.length%w;return o?[...Array(w-o).fill(z),...i].join(''):i;}

    // fungsi modal edit
    function modaledit(id){
        $.ajax({
                url : '/obat/masuk/'+id+'/edit',
                type: 'get',
                dataType: 'json',
                success: function(data){
                    $('#tgl_masuk2').val(data.data.tgl_masuk);
                    $('#kode_obat2').val('S-'+(p(data.data.id_obat, 6)));
                    $('#nama_obat2').val(data.data.nama_obat);
                    $('#sediaan2').val(data.data.sediaan);
                    $('#satuan2').val(data.data.satuan);
                    $('#expired2').val(data.data.expired);
                    $('#jmlh_masuk2').val(data.data.jmlh_masuk);
                    $('#editmasuk').attr('action', '/obat/masuk/'+id);
                }
            });
    }

</script>
