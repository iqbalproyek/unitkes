<x-app-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php
        if($jenis == "dosen"){
            $jenis2 = "Pengunjung Dosen";
        }
        if($jenis == "mahasiswa"){
            $jenis2 = "Pengunjung Mahasiswa";
        }
        if($jenis == "pegawai"){
            $jenis2 = "Pengunjung Pegawai";
        }
        if($jenis == "sakit"){
            $jenis2 = "Surat Keterangan Sakit";
        }
        if($jenis == "sehat"){
            $jenis2 = "Surat Keterangan kesehatan";
        }
        ?>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-white shadow">
            <li class="breadcrumb-item" style="font-size:14px;"><a href="index.php"><i class="fas fa-home"></i></a></li>
            <li class="breadcrumb-item active" style="font-size:14px;" aria-current="page">Laporan {{ $jenis2 }}</li>
          </ol>
        </nav>
        <br>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-gray-800">Laporan {{ $jenis2 }}</h1>
          </div>
          <br>

        <div class="card shadow mt-3">
          <div class="card-header bg-primary text-white ">
              Tabel Riwayat {{ $jenis2 }}
          </div>

          <form method="post">
            <div class="card-body row">
                <div class="col-md-3">
                      <input type="date" name="from_date" id="from_date" class="form-control">
                  </div>

                  <div class="col-md-3">
                      <input type="date" name="to_date" id="to_date" class="form-control">
                  </div>
                <script>
                    var	from = document.getElementById('from_date');
                    var	to = document.getElementById('to_date');
                    function fill(id){
                    javascript:location.href='/laporan/'+id+'/'+from.value+'/'+to.value;
                    }
                </script>

                  <div class="col-md-3">
                      <a href="/laporan/{{ $jenis }}" class="btn btn-sm btn-danger" type="button">Batal</a>
                  <button class="btn btn-md btn-secondary" onclick="fill('{{ $jenis }}')" type="button" name="filter" id="filter">Filter</button>
                  </div>
              </div>
              </form>

        @if($jenis == 'dosen' || $jenis == 'mahasiswa' || $jenis == 'pegawai')
            <table class="table table-bordered table-stripped" id="tbdosen">
            <thead>
              <tr>
                <th>tanggal</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Unit/Jurusan</th>
                <th>Keluhan</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $row->nik }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->unit }}</td>
                <td>{{ $row->keluhan }}</td>
            </tr>
            @endforeach
            </tbody>
            </table>
        @elseif($jenis == 'sakit')
            <table class="table table-bordered table-stripped" id="tbdosen">
            <thead>
              <tr>
                <th>tanggal</th>
                <th>No Surat</th>
                <th>NIM/NIK</th>
                <th>Nama</th>
                <th>Unit/Jurusan</th>
              </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
            <tr>
                <td>{{ Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $row->no_surat }}</td>
                <td>{{ $row->nim }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->unit }}</td>
            </tr>
            @endforeach
            </tbody>
            </table>
        @elseif($jenis == 'sehat')
            <table class="table table-bordered table-stripped" id="tbdosen">
            <thead>
              <tr>
                <th>tanggal</th>
                <th>No Surat</th>
                <th>Nama</th>
                <th>Pekerjaan</th>
                <th>Kegunaan Surat</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ Carbon\Carbon::parse($row->tanggal)->format('d-m-Y') }}</td>
                <td>{{ $row->no_surat }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->pekerjaan }}</td>
                <td>{{ $row->untuk }}</td>
            </tr>
            @endforeach
            </tbody>
            </table>
        @endif

        <!-- /.container-fluid -->

      </div>
</x-app-layout>

<script>
    $(document).ready(function() {
        var table = $('#tbdosen').DataTable( {
            lengthChange: true,
            buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        } );

        table.buttons().container()
            .appendTo( '#tbdosen_wrapper .col-md-6:eq(0)' );
    } );
</script>
