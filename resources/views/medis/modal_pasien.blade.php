{{-- modal tambah --}}
<div id="modalTambahBarang" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">

        <form action="{{ route('pasien.store') }}" method="post">
        @csrf
          <div class="row">

          <div class="col-sm-6">
          <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control @error('nik') is-invalid @enderror me-2" name="nik" id="nik" value="{{ old('nik') }}">
            <button class="btn btn-success btn-sm float-right mt-1" type="button" onclick="search()"><i class="fa fa-search"></i> Cari</button>
            @error('nik')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          </div>

          <div class="col-sm-6">
          <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror me-2" name="nama" id="nama" readonly>
            @error('nama')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          </div>

          </div>

          <div class="row">
          <div class="col-md-6">
          <div class="form-group">
            <label for="kategori">kategori</label>
            <input type="text" class="form-control @error('kategori') is-invalid @enderror me-2" name="kategori" id="kategori" readonly>
            @error('kategori')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          </div>

          <div class="col-md-6">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror me-2" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          </div>
          </div>

          <div class="row">

          <div class="col-sm-6">
          <div class="form-group">
          <label for="hp">Hp</label>
            <input type="text" class="form-control @error('hp') is-invalid @enderror me-2" name="hp" id="hp" value="{{ old('hp') }}">
            @error('hp')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          </div>

          <div class="col-sm-6">
          <div class="form-group">
          <label for="unit">Unit/Jurusan</label>
            <input type="text" class="form-control @error('unit') is-invalid @enderror me-2" name="unit" id="unit" value="{{ old('unit') }}">
            @error('unit')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          </div>

          </div>

          <div class="row">

          <div class="col-sm-6">
          <div class="form-group">
          <label for="umur">Umur</label>
            <input type="text" class="form-control @error('umur') is-invalid @enderror me-2" name="umur" id="umur" value="{{ old('umur') }}">
            @error('umur')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          </div>

          <div class="col-sm-6">
          <div class="form-group">
          <label for="tgllahir">Tanggal Lahir</label>
            <input type="date" class="form-control @error('tgllahir') is-invalid @enderror me-2" name="tgllahir" id="tgllahir" value="{{ old('tgllahir') }}">
            @error('tgllahir')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          </div>

          </div>

          <div class="row">

          <div class="col-sm-6">
          <div class="form-group">
          <label for="tempat">Tempat Lahir</label>
            <input type="text" class="form-control @error('tempat') is-invalid @enderror me-2" name="tempat" id="tempat" value="{{ old('tempat') }}">
            @error('tempat')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
          </div>
          </div>

          <div class="col-sm-6">
          <div class="form-group">
          <label for="kelamin">Jenis Kelamin</label>
            <select class="form-control @error('kelamin') is-invalid @enderror me-2" name="kelamin" id="kelamin">
              <option value="">Pilih . . .</option>
              <option value="laki-laki">laki-laki</option>
              <option value="perempuan">perempuan</option>
            </select>
            @error('kelamin')
                <span class="invalid-feedback">{{$message}}</span>
            @enderror
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

    {{-- modal hapus --}}
    <div id="hapusBarang" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Hapus Data</h4>
            </div>
            <div class="modal-body">

            <form action="" id="hapuspasien" method="post">
                @csrf
                @method("delete")
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
      <!--endform!-->

