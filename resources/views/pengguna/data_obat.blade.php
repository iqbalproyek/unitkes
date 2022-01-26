<x-app-layout2>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row justify-content-center">
        <div class="col-md-10">

        <div class="card shadow mt-5">
                  <div class="card-header bg-primary text-white ">
                    Data Obat
                  </div>
                  <div class="card-body">

                  </div>
                  <table class="dt-responsive nowrap table table-bordered table-stripped" id="tbobat">
                <thead>
                <tr>
                    <th>NO</th>
                    <th>Kode Obat</th>
                    <th>Nama Obat</th>
                    <th>Sediaan</th>
                    <th>Satuan</th>
                    <th>Kegunaan</th>
                </tr>
                </thead>

                <tbody>
                @foreach($obat as $index => $row)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>S-{{ sprintf('%05s',$row->id) }}</td>
                    <td>{{ $row->nama_obat }}</td>
                    <td>{{ $row->sediaan }}</td>
                    <td>{{ $row->satuan }}</td>
                    <td>{{ $row->guna }}</td>
                </tr>
                @endforeach
              </tbody>
              </table>
              </div>
                </div>

            </div>
</x-app-layout2>

<script>
    $(document).ready(function() {
        var table = $('#tbobat').DataTable( {
            lengthChange: true,
            responsive: true
        } );

        new $.fn.dataTable.FixedHeader( table );
    } );
      </script>
