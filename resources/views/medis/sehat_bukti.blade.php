<!DOCTYPE html>

<style>
    body  {
            margin-left: auto;
            margin-right: auto;
            width: 50%;
         }
</style>
<style type="text/css" media="print">
      @media print
      {
         @page {
           margin-top: 0;
           margin-bottom: 0;

         }
         body  {
           padding-top: 72px;
           padding-bottom: 72px ;
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

 <body bgcolor="white" >
  <font face="Times New Roman" color="black" size="4"> <p align="center"> <b> UNIT KESEHATAN KAMPUS <br/>
  POLITEKNIK NEGERI BATAM </b> <br/> <font face="Times New Roman" color="black" size="3">Jl. Ahmad Yani, Kecamatan Batam Kota, Batam 29461</font> <br/> <font face="Times New Roman" color="black" size="3">Telp. +62778 469856-469860 Fax. +62778 463620</font>  </p></font>
  <hr style="border-top: 2px black solid;">
  <hr>

  <font face="Times New Roman" color="black" size="4"> <p align="center"> <u> <b> SURAT KETERANGAN KESEHATAN </b></u></font><br>
  <font face="Times New Roman" color="black" size="4"> Nomor: {{ $surat->no_surat }}/B-Kes/{{ Carbon\Carbon::parse($surat->tanggal)->format('m') }}/{{ Carbon\Carbon::parse($surat->tanggal)->format('Y') }} </p></font>



  <p align="left"><font face="Times New Roman">
   Yang bertanda tangan dibawah ini Petugas kesehatan Politeknik Negeri Batam, Selaku Bagian Kesehatan Politeknik Negeri Batam menerangkan bahwa:
  </font></p>


    <pre>
    <font face="Times New Roman">Nama  &nbsp                 : {{ $sehat->nama }}</font>
    <font face="Times New Roman">Tempat Tgl/lahir   : {{ $sehat->tempat_lahir }}, {{ $sehat->ttl }}</font>
    <font face="Times New Roman">Pekerjaan              : {{ $sehat->pekerjaan }}</font>
    </pre>



  <p align="left"><font face="Times New Roman">
   Setelah diperiksa dengan teliti, berkesimpulan bahwa yang namanya tersebut diatas dinyatakan SEHAT dan telah memenuhi syarat untuk <u class="dot">{{ $sehat->untuk }}</u>
  </font></p>

  <p align="left"><font face="Times New Roman">
   Demikian Surat keterangan ini dibuat, untuk dapat dipergunakan sebagaimana mestinya.
  </font></p>

  <pre>
  <font face="Times New Roman">Catatan :</font> <p style="float: right;"><font face="Times New Roman">Batam,  <u class="dot">{{ $surat->tanggal->format('d F Y') }}</u> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <br/>Pemeriksa,<br><br><br><br><b>Dwi Setyorini,S.Kep.,Ns.</b> <br/>NIK. 215210 </font> </p>
  <font face="Times New Roman">1. Tinggi Badan &nbsp&nbsp&nbsp&nbsp&nbsp : {{ $sehatd->tinggi }}</font>
  <font face="Times New Roman">2. Berat Badan &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : {{ $sehatd->berat }}</font>
  <font face="Times New Roman">3. Tekanan Darah &nbsp&nbsp  : {{ $sehatd->tekanan_darah }}</font>
  <font face="Times New Roman">4. Golongan Darah &nbsp : {{ $sehatd->gol_darah }}</font>
  <font face="Times New Roman">5. Buta Warna &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : {{ $sehatd->buta_warna }}</font>


  </pre>
  <script>
  window.print();
  </script>
 </body>
</html>
