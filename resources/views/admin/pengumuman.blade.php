<x-app-layout>
    <div class="container-fluid">
                <!-- Page Heading -->

                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Pengumuman</h1>
                </div>

                <div class="card shadow mt-3">
                    <div class="card-header bg-primary text-white font-weight-bold">
                    Form Tambah Pengumuman
                    </div>
                        <div class="card-body">

                        <form action="{{ route('pengumuman.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-8">
                            <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror me-2" name="judul" id="judul" value="{{ old('judul') }}">
                            @error('judul')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror me-2" name="tanggal" id="tanggal" readonly value="<?php echo date("Y-m-d"); ?>">
                            @error('tanggal')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                            </div>
                            </div>
                        </div>

                            <div class="form-group">
                            <label for="isi">Isi</label>
                            <textarea class="form-control @error('isi') is-invalid @enderror me-2 ckeditor" id="isi" name="isi" value="{{ old('isi') }}"></textarea>
                            @error('isi')
                                <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                            </div>

                            <div class="form-group">
                            <button type="submit" id="tambah_brg" class="btn btn-primary btn-block">Simpan</button>
                            </div>

                            </form>

                        </div>
                </div>

                @foreach($pengumuman as $row)
                <div class="card border-secondary shadow mt-5">
                    <div class="card-header bg-white text-dark font-weight-bold">
                      <h5 class="font-weight-bold">{{ $row->judul }} <a style="margin-left: 10px; text-decoration:none;"
                            class="text-info modaledit" onclick="modaledit({{ $row->id }})" id="{{ $row->id }}" href="" data-toggle="modal" data-target="#editBarang"> <i class="fa
                           fa-edit"></i></a> <a style="margin-left: 10px; text-decoration:none;"
                            class="text-danger" href="" onclick="modalhapus({{ $row->id }})" data-toggle="modal" data-target="#hapusBarang"> <i class="fa
                           fa-times"></i></a></h5>
                      <p><i class="fas fa-user-circle" style="margin-right: 3px;"></i>by admin | {{ \Carbon\Carbon::parse($row->tanggal)->format('j F, Y') }}</p>
                    </div>
                        <div class="card-body">
                        {!! $row->isi !!}
                        </div>
                </div>
                @endforeach

                @include('admin.modal_pengumuman')

    </div>
</x-app-layout>

<script>
    // ckeditor
    CKEDITOR.replace('isi',{
        uiColor: '#d3d3d3'
    });
    CKEDITOR.replace('isiku',{
        uiColor: '#d3d3d3'
    });

    //fungsi modal hapus
    function modalhapus(id){
        $('#hapuspengumuman').attr('action', 'pengumuman/' + id);
    }

    //fungsi modal edit validation error
    @if ($errors->has('judul2')||$errors->has('tanggal2')|| $errors->has('isi2') )
       $('#editBarang').modal('show');
    @endif

    // fungsi modal edit
    function modaledit(id){
        var isiku = 'isiku';
        $.ajax({
                url : 'pengumuman/'+id+'/edit',
                type: 'get',
                dataType: 'json',
                success: function(data){
                    console.log(data.data.isi);
                    $('#judul2').val(data.data.judul);
                    $('#tanggal2').val(data.data.tanggal);
                    CKEDITOR.instances.isiku.setData(data.data.isi);
                    $('#editpengumuman').attr('action', 'pengumuman/' + id);
                }
            });
    }
</script>
