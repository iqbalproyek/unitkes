<x-app-layout>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <?php
        if($jenis == "stok"){
            $jenis2 = "Stok Obat";
        }
        if($jenis == "masuk"){
            $jenis2 = "Obat Masuk";
        }
        if($jenis == "keluar"){
            $jenis2 = "Obat Keluar";
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
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>
          <br>

        <div class="card shadow mt-3">
          <div class="card-header bg-primary text-white ">
              Tabel {{ $jenis2 }}
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
                    javascript:location.href='/farmasi/obat/'+id+'/'+from.value+'/'+to.value;
                    }
                </script>

                <div class="col-md-3">
                    <a href="/farmasi/obat/{{ $jenis }}" class="btn btn-sm btn-danger" type="button">Batal</a>
                <button class="btn btn-md btn-secondary" onclick="fill('{{ $jenis }}')" type="button" name="filter" id="filter">Filter</button>
                </div>
            </div>
            </form>

        @if($jenis == "stok")
            <table class="table table-bordered table-stripped" id="tbdosen">
            <thead>
              <tr>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Sediaan</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Expired</th>
                <th>Kegunaan</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
            <tr>
                <td>S-{{ sprintf('%05s',$row->id) }}</td>
                <td>{{ $row->nama_obat }}</td>
                <td>{{ $row->sediaan }}</td>
                <td>{{ $row->satuan }}</td>
                <td>{{ $row->jumlah }}</td>
                <td>{{ Carbon\Carbon::parse($row->expired)->format('d-m-Y') }}</td>
                <td>{{ $row->guna }}</td>
            </tr>
            @endforeach
            </tbody>
            </table>
        @elseif($jenis == "masuk")
            <table class="table table-bordered table-stripped" id="tbdosen">
            <thead>
              <tr>
                <th>Tanggal Masuk</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Sediaan</th>
                <th>Satuan</th>
                <th>Jumlah Masuk</th>
                <th>Expired</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ Carbon\Carbon::parse($row->tgl_masuk)->format('d-m-Y') }}</td>
                <td>S-{{ sprintf('%05s',$row->id_obat) }}</td>
                <td>{{ $row->nama_obat }}</td>
                <td>{{ $row->sediaan }}</td>
                <td>{{ $row->satuan }}</td>
                <td>{{ $row->jmlh_masuk }}</td>
                <td>{{ Carbon\Carbon::parse($row->expired)->format('d-m-Y') }}</td>
            </tr>
            @endforeach
            </tbody>
            </table>
        @elseif($jenis == "keluar")
        <table class="table table-bordered table-stripped" id="tbdosen">
            <thead>
              <tr>
                <th>Tanggal Keluar</th>
                <th>NIM/NIK</th>
                <th>Nama Penerima</th>
                <th>Kode Obat</th>
                <th>Nama Obat</th>
                <th>Sediaan</th>
                <th>Satuan</th>
                <th>Jumlah Keluar</th>
                <th>Expired</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data as $row)
            <tr>
                <td>{{ Carbon\Carbon::parse($row->tgl_keluar)->format('d-m-Y') }}</td>
                <td>{{ $row->nik }}</td>
                <td>{{ $row->nama_pasien }}</td>
                <td>S-{{ sprintf('%05s',$row->id_obat) }}</td>
                <td>{{ $row->nama_obat }}</td>
                <td>{{ $row->sediaan }}</td>
                <td>{{ $row->satuan }}</td>
                <td>{{ $row->jmlh_keluar }}</td>
                <td>{{ Carbon\Carbon::parse($row->expired)->format('d-m-Y') }}</td>
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
