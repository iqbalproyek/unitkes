<form method="post">
    <div class="card-body row">
        <input type="hidden" name="jenis" id="jenis" class="form-control">
        <div class="col-md-3">
              <input type="date" name="from_date" id="from_date" class="form-control">
          </div>

          <div class="col-md-3">
              <input type="date" name="to_date" id="to_date" class="form-control">
          </div>
          <script>
            var jenis = document.getElementById('jenis');
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
