<x-app-layout>
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Data Petugas</h1>
              </div>

              <div class="card shadow mt-5">
                    <div class="card-body">
                    <a href="" onclick="modaltambah()" class="btn btn-md btn-primary" data-toggle="modal" data-target="#modalTambahBarang">Tambah Petugas</a>
                    </div>
                </div>

            <div class="card shadow mt-3">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabel Data Petugas</h6>
                    </div>
                    <div class="card-body">

                    </div>

                    <table class="table table-bordered table-stripped" id="tbdosen">
                    <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Akun</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($petugas as $index => $row)
                    <tr>
                        <td>{{$index + 1}}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->role }}</td>
                        <td>
                        <a href="" class="btn btn-sm btn-warning" data-toggle="modal" onclick="modaledit({{ $row->id }})" data-target="#editBarang">Edit</a>
                        <a href="" class="btn btn-sm btn-danger" data-toggle="modal" onclick="modalhapus({{ $row->id }})" data-target="#hapusBarang">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>

                    @include('admin.modal_petugas')

                </div>
            </div>
        </div>

    </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        var table = $('#tbdosen').DataTable( {
            lengthChange: true,
        } );

        table.buttons().container()
            .appendTo( '#tbdosen_wrapper .col-md-6:eq(0)' );
    } );

    // error tambah
    @if ($errors->has('name')||$errors->has('username')|| $errors->has('email') || $errors->has('password') || $errors->has('role'))
       $('#modalTambahBarang').modal('show');
    @endif

    // error edit
    @if ($errors->has('name2')||$errors->has('username2')|| $errors->has('email2') || $errors->has('password2') || $errors->has('role2'))
       $('#editBarang').modal('show');
    @endif

    // modal hapus
    function modalhapus(id){
        $('#hapuspetugas').attr('action', 'petugas/' + id);
    }

    // modal tambah
    function modaltambah(){
        $('#tambahpetugas').attr('action', 'petugas');
    }

    // fungsi modal edit
    function modaledit(id){
        $.ajax({
                url : 'petugas/'+id+'/edit',
                type: 'get',
                dataType: 'json',
                success: function(data){
                    $('#name2').val(data.data.name);
                    $('#username2').val(data.data.username);
                    $('#email2').val(data.data.email);
                    $('#password2').val(data.data.password);
                    $('#role2').val(data.data.role);
                    $('#editpetugas').attr('action', 'petugas/' + id);
                }
            });
    }
</script>

