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
                *Stock obat akan berkurang

          <div class="form-group">
            <button type="submit" id="hapus_brg" class="btn btn-primary btn-block">Hapus Data</button>
          </div>

          </form>
        </div>

      </div>
    </div>
  </div>
  {{-- end delete --}}

  {{-- modal edit --}}

  <div id="editBarang" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Ubah Data</h4>
        </div>
        <div class="modal-body">

        <form action="" id="editmasuk" method="post">
            @csrf
            @method('put')
        <div class="form-group">
            <label for="tgl_masuk2" class="m-0 font-weight-bold text-dark">Tanggal</label>
            <input type="date" class="form-control" name="tgl_masuk2" id="tgl_masuk2" value="">
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
            <label for="jmlh_masuk2" class="m-0 font-weight-bold text-dark">Jumlah Masuk</label>
            <input type="number" min="1" class="form-control" name="jmlh_masuk2" id="jmlh_masuk2" value="">
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
