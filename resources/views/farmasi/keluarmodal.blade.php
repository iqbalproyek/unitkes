{{-- modal hapus --}}
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
                *Stock obat akan bertambah

          <div class="form-group">
            <button type="submit" id="hapus_brg" class="btn btn-primary btn-block">Hapus Data</button>
          </div>

          </form>
        </div>

      </div>
    </div>
  </div>
{{-- end modal hapus --}}

{{-- modal edit --}}
<div id="editBarang" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Ubah Data</h4>
        </div>

        <div class="modal-body">

        <form action="" id="modaledit" method="post">
            @csrf
            @method('put')
        <div class="form-group">
            <label for="tgl_keluar2" class="m-0 font-weight-bold text-dark">Tanggal</label>
            <input type="date" class="form-control" name="tgl_keluar2" id="tgl_keluar2" value="{{ old('tgl_keluar') }}">
        </div>

        <div class="form-group">
            <label for="nik" class="m-0 font-weight-bold text-dark">NIM/NIK</label>
            <input type="text" class="form-control" name="nik2" id="nik2" required="" readonly value="">
        </div>

        <div class="form-group">
            <label for="nama" class="m-0 font-weight-bold text-dark">Nama Pasien</label>
            <input type="text" class="form-control" name="nama" id="nama" required="" value="" readonly>
        </div>

        <div class="form-group">
            <label for="kode_obat2" class="m-0 font-weight-bold text-dark">Kode Obat</label>
            <input type="text" class="form-control" name="kode_obat2" id="kode_obat2" required="" disabled value="">
        </div>

        <div class="form-group">
            <label for="nama_obat2" class="m-0 font-weight-bold text-dark">Nama Obat</label>
            <input type="text" class="form-control" name="nama_obat2" id="nama_obat2" required="" disabled value="">
        </div>

      <div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label for="sediaan2" class="m-0 font-weight-bold text-dark">Sediaan</label>
            <input type="text" class="form-control" name="sediaan2" id="sediaan2" disabled value="">
        </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
            <label for="satuan2" class="m-0 font-weight-bold text-dark">Satuan</label>
            <input type="text" class="form-control" name="satuan2" id="satuan2" disabled value="">
        </div>
        </div>
        </div>

        <div class="form-group">
            <label for="expired2" class="m-0 font-weight-bold text-dark">Tanggal Expired</label>
            <input type="date" class="form-control" name="expired2" id="expired2" required="" disabled value="">
        </div>

        <div class="form-group">
            <label for="jumlah2" class="m-0 font-weight-bold text-dark">Jumlah Saat Ini</label>
            <input type="number" min="1" class="form-control" name="jumlah2" id="jumlah2" required="" disabled value="">
        </div>

        <div class="form-group">
            <label for="jmlh_keluar2" class="m-0 font-weight-bold text-dark">Jumlah Keluar</label>
            <input type="number" min="1" class="form-control" name="jmlh_keluar2" id="jmlh_keluar2" value="{{ old('jmlh_keluar') }}">
        </div>

        <div class="modal-footer">
          <button type="reset" id="tambah_brg" name="reset" class="btn btn-danger">Kosongkan</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>

        </form>

        </div>

        </div>
    </div>
    </div>
            <!--endform!-->

