<!DOCTYPE html>
<head>
    <title>Contoh Surat Pernyataan</title>
    <meta charset="utf-8">
    <style>
        #judul{
            text-align:center;
        }
        body  {
            margin-left: auto;
            margin-right: auto;
            width: 70%;
         }

        #halaman{
            width: auto;
            height: auto;
            position: absolute;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
        }

        @media print
      {
         @page {
           margin-top: 0;
           margin-bottom: 0;

         }
         body  {
           padding-top: 72px;
           padding-bottom: 72px ;
           margin-left: auto;
           margin-right: auto;
           width: 100%;
         }
         pre {
           font: "Times New Roman";
         }
         u.dot{
          border-bottom: 1px dashed #999;
          text-decoration: none;
        }
      }

    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>PEMERIKSAAN KESEHATAN<br>POLITEKNIK NEGERI BATAM</h3>
        <br>

        <div style="width: 30%; text-align: left; float: left;">Nama : {{ $pasien->nama }}</div>         <div style="width: 30%; text-align: left; float: right;">Umur : {{ $pasien->umur }}</div><br>
        <div style="width: 30%; text-align: left; float: left;">Tanggal : {{ $periksa->tanggal->format('d/m/Y') }}</div>      <div style="width: 30%; text-align: left; float: right;">BB/TB : {{ $periksa->b_badan }}/{{ $periksa->t_badan }}</div><br>
        <p></p>

        <table border="1" cellspacing="0" width="650px">
        <tr>
        <td align="center"><b>Jenis Pemeriksaan<b></td>
        <td align="center"><b>Hasil</b></td>
        <td align="center"><b>Nilai Normal</b></td>
    </tr>
    <tr>
        <td rowspan="2">Tekanan Darah</td>
        <td rowspan="2">{{ $periksa->tekanan_darah }}/{{ $periksa->tekanan_darah2 }}</td>
        <td align="center">Sist: 100-130 mmHg</td>
    </tr>
    <tr>
        <td align="center">Dias: 70-90 mmHg</td>
    </tr>
    <tr>
        <td rowspan="2">Asam Urat</td>
        <td rowspan="2">{{ $periksa->asam_urat }}</td>
        <td align="center">Pa: 4-7 mg/dl</td>
    </tr>
    <tr>
        <td align="center">Pi: 3-6 mg/dl</td>
    </tr>
    <tr>
        <td>GDS</td>
        <td>{{ $periksa->gula_darah }}</td>
        <td align="center">70-140 mg/dl</td>
    </tr>
    <tr>
        <td>Kolesterol</td>
        <td>{{ $periksa->kolesterol }}</td>
        <td align="center">< 200 mg/dl</td>
    </tr>
        </table>

        <br>
        <div style="width: 30%; text-align: center; float: right;">Pemeriksa,</div><br><br><br><br><br>
        <div style="width: 30%; text-align: center; float: right;">Dwi Setyorini, S.kep.,Ns.</div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    window.onload = function () {
    window.print();
    }

  </script>
</body>

</html>

