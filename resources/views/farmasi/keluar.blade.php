<x-app-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Obat Keluar</h1>
        </div>



      <div class="row">
          <div class="col-lg-4">
              <div class="card shadow mt-3">
                  <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Form Input Obat Keluar</h6>
                  </div>
                  <div class="card-body">

                  <form action="" id="keluar" method="post">
                      @csrf
                      @method('put')
                  <input type="hidden" id="id_obat" name="id_obat">

                  <div class="form-group">
                      <label for="tgl_keluar" class="m-0 font-weight-bold text-dark">Tanggal</label>
                      <input type="date" class="form-control @error('tgl-keluar') is-invalid @enderror me-2" name="tgl_keluar" id="tgl_keluar" value="{{ old('tgl_keluar') }}">
                      @error('tgl_keluar')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                      <label for="nik" class="m-0 font-weight-bold text-dark">NIM/NIK</label>
                      <input type="text" class="form-control @error('nik') is-invalid @enderror me-2" name="nik" id="nik">
                      <button type="button" onclick="search()" class="btn btn-success btn-sm float-right mb-2">Cari</button>
                      @error('nik')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                      <label for="nama_pasien" class="m-0 font-weight-bold text-dark">Nama Pasien</label>
                      <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror me-2 readonly" style="background-color: #eaecf4;" name="nama_pasien" id="nama_pasien">
                      @error('nama_pasien')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>

                  <div class="form-group">
                      <label for="kode_obat" class="m-0 font-weight-bold text-dark">Kode Obat</label>
                      <input type="text" class="form-control" name="kode_obat" id="kode_obat" required="" disabled>
                      <span class="input-group-btn">
                      <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#tabelBarang">cari</a>
                      </span>
                  </div>

                  <div class="form-group">
                      <label for="nama_obat" class="m-0 font-weight-bold text-dark">Nama Obat</label>
                      <input type="text" class="form-control" name="nama_obat" id="nama_obat" required="" disabled>
                  </div>

                <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="sediaan" class="m-0 font-weight-bold text-dark">Sediaan</label>
                      <input type="text" class="form-control" name="sediaan" id="sediaan" disabled>
                  </div>
                  </div>

                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="satuan" class="m-0 font-weight-bold text-dark">Satuan</label>
                      <input type="text" class="form-control" name="satuan" id="satuan" disabled>
                  </div>
                  </div>
                  </div>

                  <div class="form-group">
                      <label for="expired" class="m-0 font-weight-bold text-dark">Tanggal Expired</label>
                      <input type="date" class="form-control" name="expired" id="expired" required="" disabled>
                  </div>

                  <div class="form-group">
                      <label for="jumlah" class="m-0 font-weight-bold text-dark">Jumlah Saat Ini</label>
                      <input type="number" min="1" class="form-control" name="jumlah" id="jumlah" required="" disabled>
                  </div>

                  <div class="form-group">
                      <label for="jmlh_keluar" class="m-0 font-weight-bold text-dark">Jumlah keluar</label>
                      <input type="number" min="1" class="form-control @error('jmlh_keluar') is-invalid @enderror me-2" name="jmlh_keluar" id="jmlh_keluar" value="{{ old('jmlh_keluar') }}">
                      @error('jmlh_keluar')
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
                <td>S-{{ sprintf('%05s',$row->id) }}</td>
                <td>{{ $row->nama_obat }}</td>
                <td>{{ $row->sediaan }}</td>
                <td>{{ $row->satuan }}</td>
                <td>{{ $row->jumlah }}</td>
                <td>{{ Carbon\Carbon::parse($row->expired)->format('d-m-Y') }}</td>
                <td>
                <button class="btn btn-sm btn-info" id="select" data-id_obat="{{ $row->id }}"
                                                                data-kode_obat="{{ sprintf('%05s',$row->id) }}"
                                                                data-nama_obat="{{ $row->nama_obat }}"
                                                                data-sediaan="{{ $row->sediaan }}"
                                                                data-satuan="{{ $row->satuan }}"
                                                                data-jumlah="{{ $row->jumlah }}"
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
                  <h6 class="m-0 font-weight-bold text-primary">Data Obat Keluar</h6>
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
                  <th>NIM/NIK</th>
                  <th>Nama</th>
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
              @foreach($keluar as $index => $row)
              <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ Carbon\Carbon::parse($row->tgl_keluar)->format('d-m-Y') }}</td>
                  <td>{{ $row->nik }}</td>
                  <td>{{ $row->nama_pasien }}</td>
                  <td>S-{{ sprintf('%05s',$row->id_obat) }}</td>
                  <td>{{ $row->nama_obat }}</td>
                  <td>{{ $row->jmlh_keluar }}</td>
                  <td>{{ $row->sediaan }}</td>
                  <td>{{ $row->satuan }}</td>
                  <td>{{ Carbon\Carbon::parse($row->expired)->format('d-m-Y') }}</td>
                  <td>
                  <a href="" class="btn btn-sm btn-warning" onclick="modaledit({{ $row->id }})" data-toggle="modal" data-target="#editBarang">Edit</a>
                  <a href="" class="btn btn-sm btn-danger" onclick="modalhapus({{ $row->id }})" data-toggle="modal" data-target="#hapusBarang">Hapus</a>
                  </td>
              </tr>

              @endforeach

                  </tbody>
              </table>

                  </div>
              </div>
          </div>

      </div>

      @include('farmasi.keluarmodal')
      <!-- /.container-fluid -->
  </div>
</x-app-layout>
<script>
    $(document).ready(function() {
        var table = $('#tbdosen').DataTable( {
            lengthChange: true,
            responsive: true
        } );

        new $.fn.dataTable.FixedHeader( table );
    } );

$(document).ready(function() {
    var table = $('#tbmodal').DataTable( {
        lengthChange: true,
    } );
} );

// modal hapus
function modalhapus(id){
        $('#modalhapus').attr('action', '/obat/keluar/' + id);
}

//fungsi modal edit validation error
@if ($errors->has('tgl_keluar2')|| $errors->has('jmlh_keluar2'))
       $('#editBarang').modal('show');
@endif

// fungsi sprintf
function p(i,w,z){z=z||0;w=w||8;i+='';var o=i.length%w;return o?[...Array(w-o).fill(z),...i].join(''):i;}

$(document).ready(function() {
      $(document).on('click', '#select', function() {
          var id_obat = $(this).data('id_obat');
          var nama_obat = $(this).data('nama_obat');
          var sediaan = $(this).data('sediaan');
          var satuan = $(this).data('satuan');
          var expired = $(this).data('expired');
          var jumlah = $(this).data('jumlah');
          $('#id_obat').val(id_obat);
          $('#kode_obat').val('S-'+(p(id_obat, 6)));
          $('#nama_obat').val(nama_obat);
          $('#sediaan').val(sediaan);
          $('#satuan').val(satuan);
          $('#expired').val(expired);
          $('#jumlah').val(jumlah);
          $('#keluar').attr('action', '/obat/keluar/'+id_obat+'/stok');
          $('#tabelBarang').modal('hide');
      });
  });

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
                    $('#nama_pasien').val(data.nama);
                }
        });
        }
    }

    function modaledit(id){
        $.ajax({
                url : '/obat/keluar/'+id+'/edit',
                type: 'get',
                dataType: 'json',
                success: function(data){
                    $('#tgl_keluar2').val(data.data.tgl_keluar);
                    $('#nik2').val(data.data.nik);
                    $('#nama').val(data.data.nama_pasien);
                    $('#kode_obat2').val('S-'+(p(data.data.id_obat, 6)));
                    $('#nama_obat2').val(data.data.nama_obat);
                    $('#sediaan2').val(data.data.sediaan);
                    $('#satuan2').val(data.data.satuan);
                    $('#expired2').val(data.data.expired);
                    $('#jumlah2').val(data.data.jumlah);
                    $('#jmlh_keluar2').val(data.data.jmlh_keluar);
                    $('#modaledit').attr('action', '/obat/keluar/'+id);
                }
            });
    }
</script>
