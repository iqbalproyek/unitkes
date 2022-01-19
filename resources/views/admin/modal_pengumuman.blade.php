{{-- modal hapus --}}
<div id="hapusBarang" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Hapus Data</h4>
        </div>
        <div class="modal-body">
        <form action="" id="hapuspengumuman" method="post">
            @method("delete")
            @csrf
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

    <!-- Modal edit-->
    <div class="modal fade" id="editBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form action="" id="editpengumuman" method="post">
            @csrf
            @method('put')

            <div class="row">
                <div class="col-md-8">
                <div class="form-group">
                <label for="judul2">Judul</label>
                <input type="text" class="form-control @error('judul2') is-invalid @enderror me-2" name="judul2" id="judul2" value="{{ old('judul') }}">
                @error('judul2')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
                </div>
                </div>

                <div class="col-md-4">
                <div class="form-group">
                <label for="tanggal2">Tanggal</label>
                <input type="date" class="form-control @error('tanggal2') is-invalid @enderror me-2" name="tanggal2" id="tanggal2" value="{{ old('tanggal') }}">
                @error('tanggal2')
                <span class="invalid-feedback">{{$message}}</span>
                @enderror
                </div>
                </div>
            </div>

                <div class="form-group">
                <label for="isi2">Isi</label>
                <textarea class="ckeditor form-control @error('isi2') is-invalid @enderror me-2" id="isiku" name="isi2">{{ old('isi') }}</textarea>
                @error('isiku')
                <span class="invalid-feedback">{{$message}}</span>
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
        </div>
        <!--endform!-->
