{{-- modal tambah --}}
<div id="modalTambahBarang" class="modal fade" role="dialog">

    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">

        <form action="{{ route('stok.store') }}" method="post">
            @csrf

            <div class="form-group">
            <label for="nama_obat">Nama Obat</label>
            <input type="text" class="form-control @error('nama_obat') is-invalid @enderror me-2" name="nama_obat" id="nama_obat" value={{ old('nama_obat') }}>
            @error('nama_obat')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="sediaan">Sediaan</label>
            <input type="text" class="form-control @error('sediaan') is-invalid @enderror me-2" name="sediaan" id="sediaan" value={{ old('sediaan') }}>
            @error('sediaan')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="satuan">Satuan</label>
            <input type="text" class="form-control @error('satuan') is-invalid @enderror me-2" name="satuan" id="satuan" value={{ old('satuan') }}>
            @error('satuan')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" min="0" class="form-control @error('jumlah') is-invalid @enderror me-2" name="jumlah" id="jumlah" value={{ old('jumlah') }}>
            @error('jumlah')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="expired">Tanggal Expired</label>
            <input type="date" class="form-control @error('expired') is-invalid @enderror me-2" name="expired" id="expired" value={{ old('expired') }}>
            @error('expired')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="guna">Kegunaan</label>
            <input type="text" class="form-control @error('guna') is-invalid @enderror me-2" name="guna" id="guna" value={{ old('guna') }}>
            @error('guna')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <button type="submit" id="tambah_brg" class="btn btn-primary btn-block">Simpan</button>
            </div>

            </form>
        </div>

        </div>
    </div>
    </div>
<!--endform  modal tambah!-->

{{-- modal hapus --}}
<div id="hapusBarang" class="modal fade" role="dialog">

    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
        </div>
        <div class="modal-body">

        <form action="" id="hapusstok" method="post">
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

        <form action="" id="editobat" method="post">
        @csrf
        @method('put')

            <div class="form-group">
            <label for="nama_obat2">Nama Obat</label>
            <input type="text" class="form-control @error('nama_obat2') is-invalid @enderror me-2" name="nama_obat2" id="nama_obat2" value={{ old('nama_obat2') }}>
            @error('nama_obat2')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="sediaan2">Sediaan</label>
            <input type="text" class="form-control @error('sediaan2') is-invalid @enderror me-2" name="sediaan2" id="sediaan2" value={{ old('sediaan2') }}>
            @error('sediaan2')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="satuan2">Satuan</label>
            <input type="text" class="form-control @error('satuan2') is-invalid @enderror me-2" name="satuan2" id="satuan2" value={{ old('satuan2') }}>
            @error('satuan2')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="jumlah2">Jumlah</label>
            <input type="text" class="form-control @error('jumlah2') is-invalid @enderror me-2" name="jumlah2" id="jumlah2" readonly>
            @error('jumlah2')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="expired2">Expired</label>
            <input type="date" class="form-control @error('expired2') is-invalid @enderror me-2" name="expired2" id="expired2" value={{ old('expired2') }}>
            @error('expired2')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <label for="guna2">Kegunaan</label>
            <input type="text" class="form-control @error('guna2') is-invalid @enderror me-2" name="guna2" id="guna2" value={{ old('guna2') }}>
            @error('guna2')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
            </div>

            <div class="form-group">
            <button type="submit" id="tambah_brg" class="btn btn-primary btn-block">Simpan</button>
            </div>

            </form>
        </div>

        </div>
    </div>
    </div>
    <!--endform edit!-->
