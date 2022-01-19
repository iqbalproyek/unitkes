{{-- modal tambah --}}
<div id="modalTambahBarang" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
        </div>
        <div class="modal-body">
        <form action="" id="tambahpetugas" method="post">
            @csrf
            <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror me-2" name="name" id="name">
                @error('name')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror me-2 " name="email" id="email">
                @error('email')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror me-2" name="username" id="username">
                @error('username')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror me-2" name="password" id="password">
                @error('password')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
            <label for="role">Akun</label>
            <select class="form-control @error('role') is-invalid @enderror me-2" name="role" id="role">
                <option value="">Pilih . . .</option>
                <option value="admin">Admin</option>
                <option value="medis">Medis</option>
                <option value="farmasi">Farmasi</option>
            </select>
            @error('role')
                <span class="invalid-feedback">{{$message}}</span>
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
            <form action="" id="hapuspetugas" method="post">
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
    {{-- endform --}}

{{-- modal Edit --}}
<div id="editBarang" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
        </div>
        <div class="modal-body">
        <form action="" id="editpetugas" method="post">
            @csrf
            @method('put')
            <div class="form-group">
            <label for="name2">Name</label>
            <input type="text" class="form-control @error('name2') is-invalid @enderror me-2" name="name2" id="name2" value="{{ old('name2') }}">
                @error('name2')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
            <label for="email2">Email</label>
            <input type="email" class="form-control @error('email2') is-invalid @enderror me-2 " name="email2" id="email2" value="{{ old('email2') }}">
                @error('email2')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
            <label for="username2">Username</label>
            <input type="text" class="form-control @error('username2') is-invalid @enderror me-2" name="username2" id="username2" value="{{ old('username2') }}">
                @error('username2')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
            <label for="password2">Password</label>
            <input type="text" class="form-control @error('password2') is-invalid @enderror me-2" name="password2" id="password2" value="{{ old('password2') }}">
                @error('password2')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group">
            <label for="role">Akun</label>
            <select class="form-control @error('role2') is-invalid @enderror me-2" name="role2" id="role2">
                <option value="{{ old('role2') }}">{{ old('role2') }}</option>
                <option value="admin">Admin</option>
                <option value="medis">Medis</option>
                <option value="farmasi">Farmasi</option>
            </select>
            @error('role2')
                <span class="invalid-feedback">{{$message}}</span>
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
    <!--endform!-->
