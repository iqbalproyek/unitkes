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
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Edit</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                            <form action="{{ route('pengumuman.update', $row->id) }}" method="post">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-8">
                                <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" class="form-control" name="judul" id="judul2" value="{{ old('judul') }}">
                                </div>
                                </div>

                                <div class="col-md-4">
                                <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" id="tanggal2" value="{{ old('tanggal') }}">
                                </div>
                                </div>
                            </div>

                                <div class="form-group">
                                <label for="isi">Isi</label>
                                <textarea class="ckeditor" id="isiku" name="isi">{{ old('isi') }}</textarea>
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
                }
            });
    }
</script>
