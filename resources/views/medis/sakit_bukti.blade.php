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

  <font face="Times New Roman" color="black" size="4"> <p align="center"> <u> <b> SURAT KETERANGAN SAKIT </b></u></font><br>
  <font face="Times New Roman" color="black" size="4"> Nomor: {{ $surat->no_surat }}/B-Kes/{{ $surat->tanggal->format('m') }}/{{ $surat->tanggal->format('Y') }} </p></font>



  <p align="left"><font face="Times New Roman">
   Yang bertanda tangan dibawah ini Petugas kesehatan Politeknik Negeri Batam, Selaku Bagian Kesehatan Politeknik Negeri Batam menerangkan bahwa:
  </font></p>


    <pre>
    <font face="Times New Roman">Nama &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : {{ $sakit->nama }}</font>
    <font face="Times New Roman">Umur &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : {{ $sakit->umur }}</font>
    <font face="Times New Roman">Alamat/Jurusan &nbsp&nbsp&nbsp : {{ $sakit->unit }}</font>
    </pre>

    <p align="left"><font face="Times New Roman">
    Perlu istirahat karena sakit, selama <u class="dot">{{ $sakit->total_izin }}</u> (hari) <br/>Terhitung tanggal : <u class="dot">{{ $sakit->mulai_tgl->format('d-m-Y') }}</u> s/d <u class="dot">{{ $sakit->akhir_tgl->format('d-m-Y') }}</u>
  </font></p>

  <p align="left"><font face="Times New Roman">
   Demikian Surat keterangan ini dibuat, untuk dapat dipergunakan sebagaimana mestinya.
  </font></p><br/>

  <p style="float:right;">Batam, <u class="dot">{{ $surat->tanggal->format('d F Y') }}</u> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <br/>Pemeriksa,<br><br><br><br><br><br><b>Dwi Setyorini,S.Kep.,Ns.</b><br/>NIK. 215210</p>

  <script>
  window.print();
  </script>
 </body>
</html>
