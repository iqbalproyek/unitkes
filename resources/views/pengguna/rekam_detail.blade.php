<x-app-layout2>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-white shadow">
            <li class="breadcrumb-item" style="font-size:14px;"><a href="#" onClick="history.go(-2);">Data Pasien</a></li>
            <li class="breadcrumb-item" style="font-size:14px;"><a href="#" onClick="history.go(-1);">Rekam Medis</a></li>
            <li class="breadcrumb-item active" style="font-size:14px;" aria-current="page">Detail Rekam Medis</li>
          </ol>
        </nav>
        <br>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Detail Rekam Medis | {{ $periksa->tanggal->format("d F Y") }}</h1>
          </div>


        <div class="row">
            <div class="col-lg-5">
                <div class="card shadow mt-3">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Cek Kesehatan</h6>
                    </div>
                    <div class="card-body">


                    <div class="row">
                        <div class="col-lg-6">
                        <div style="margin-bottom:18px;">
                            <div class="row no-gutters">
                            <div class="text-s font-weight-bold text-secondary mb-1">Tinggi Badan <small>(cm)</small></div>
                            </div>
                            <div class="h4 mb-1 font-weight-bold text-gray-800">{{ $periksa->t_badan }}</div>
                        </div>
                        </div>

                        <div class="col-lg-6">
                        <div style="margin-bottom:18px;">
                            <div class="row no-gutters">
                            <div class="text-s font-weight-bold text-secondary mb-1">Berat Badan <small>(kg)</small></div>
                            </div>
                            <div class="h4 mb-1 font-weight-bold text-gray-800">{{ $periksa->b_badan }}</div>
                        </div>
                            </div>

                    </div>


                <div class="row">

                <div class="col-lg-6">
                <div style="margin-bottom:18px;">
                   <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary mb-1">Tekanan Darah <small>(mmHg)</small></div>
                </div>
                 <div class="h4 mb-1 font-weight-bold text-gray-800">{{ $periksa->tekanan_darah }}/{{ $periksa->tekanan_darah2 }}</div>
               </div>
               </div>

               <div class="col-lg-6">
               <div style="margin-bottom:18px;">
                <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary mb-1">Pulse <small>(/menit)</small></div>
                </div>
                 <div class="h4 mb-1 font-weight-bold text-gray-800">{{ $periksa->pulse }}</div>
                </div>
                </div>

                </div>

                <div class="row">
              <div class="col-lg-6">
              <div style="margin-bottom:18px;">
                 <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary mb-1">Hemoglobin</div>
                </div>
                 <div class="h4 mb-1 font-weight-bold text-gray-800">{{ $periksa->hemoglobin }}</div>
               </div>
               </div>

               <div class="col-lg-6">
               <div style="margin-bottom:18px;">
                 <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary mb-1">Asam Urat <small>(mg/dl)</small></div>
                </div>
                 <div class="h4 mb-1 font-weight-bold text-gray-800">{{ $periksa->asam_urat }}</div>
                </div>
                </div>

                </div>

                <div class="row">

                <div class="col-lg-6">
                <div style="margin-bottom:18px;">
                 <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary mb-1">Gula Darah <small>(mg/dl)</small></div>
                </div>
                 <div class="h4 mb-1 font-weight-bold text-gray-800">{{ $periksa->gula_darah }}</div>
                </div>
                </div>

                <div class="col-lg-6">
                <div style="margin-bottom:18px;">
                 <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary mb-1">Kolesterol <small>(mg/dl)</small></div>
                </div>
                 <div class="h4 mb-1 font-weight-bold text-gray-800">{{ $periksa->kolesterol }}</div>
                </div>
                </div>

                </div>

                <div class="row">

                <div class="col-lg-6">
                <div style="margin-bottom:18px;">
                 <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary mb-1">Saturasi <small>(%)</small></div>
                </div>
                 <div class="h4 mb-1 font-weight-bold text-gray-800">{{ $periksa->saturasi }}</div>
                </div>
                </div>

                <div class="col-lg-6">
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#ceksehat">Detail</a>
                </div>

                <div class="col-lg-6">
                <a href="/periksa/{{ $periksa->id }}/bukti" target="_blank" class="btn btn-secondary">Print</a>
                </div>

                </div>


            <div id="ceksehat" class="modal fade" role="dialog">

            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">


                <div class="modal-header">

                    <h4 class="modal-title text-primary">Detail</h4>

                </div>

                <div class="modal-body">

                        @if ($periksa->tekanan_darah >= 100 & $periksa->tekanan_darah2 <= 130)
                            <?php
                            $statustekanan = "Normal";
                            $detailtekanan = "-";
                            ?>
                        @endif
                        @if ($periksa->tekanan_darah < 100)
                            <?php
                            $statustekanan = "Rendah";
                            $detailtekanan = "Hindari makanan berkarbohidrat tinggi, dan jaga badan tetap terhidrasi";
                            ?>
                        @endif
                        @if ($periksa->tekanan_darah > 130)
                            <?php
                            $statustekanan = "Tinggi";
                            $detailtekanan = "Hindari makanan asin dan bergula, serta makanan tinggi lemak jenuh";
                            ?>
                        @endif

                        @if ($periksa->tekanan_darah >= 70 & $periksa->tekanan_darah2 <= 90)
                            <?php
                            $statustekanan2 = "Normal";
                            $detailtekanan2 = "-";
                            ?>
                        @endif
                        @if ($periksa->tekanan_darah2 < 70)
                            <?php
                            $statustekanan2 = "Rendah";
                            $detailtekanan2 = "Hindari makanan berkarbohidrat tinggi, dan jaga badan tetap terhidrasi";
                            ?>
                        @endif
                        @if ($periksa->tekanan_darah2 > 90)
                            <?php
                            $statustekanan2 = "Tinggi";
                            $detailtekanan2 = "Hindari makanan asin dan bergula, serta makanan tinggi lemak jenuh";
                            ?>
                        @endif

                        <blockquote class="blockquote mb-0">
                        <p>1. Dari Hasil Pengecekan Tekanan Darah yaitu <strong>{{ $periksa->tekanan_darah }}/{{ $periksa->tekanan_darah2 }}</STRONG></p>
                        <footer class="blockquote-footer">Dari kategori output sistolik termasuk pada <cite class="font-weight-bold" title="Source Title">{{ $statustekanan }}</cite></footer>
                        <p>{{ $detailtekanan }}</p>
                        <footer class="blockquote-footer">Dari kategori output diastolik termasuk pada <cite class="font-weight-bold" title="Source Title">{{ $statustekanan2 }}</cite></footer>
                        <p>{{ $detailtekanan2 }}</p>
                        </blockquote>
                        <hr>

                        <?php

                        if ($pasien == "laki-laki"){

                            if ($periksa->asam_urat >= 4 & $periksa->asam_urat <= 7){
                                $statusasam = "Normal";
                                $detailasam = "-";
                            }
                            if ($periksa->asam_urat < 4 ){
                                $statusasam = "Rendah";
                                $detailasam = "Konsultasikan dengan dokter/tenaga medis yang ahli";
                            }
                            if ($periksa->asam_urat > 7 ){
                                $statusasam = "Tinggi";
                                $detailasam = "Hindari makanan dengan kandungan purin dan fruktosa yang tinggi";
                            }

                        } else if ($pasien == "perempuan"){

                            if ($periksa->asam_urat >= 3 & $periksa->asam_urat <= 6){
                                $statusasam = "Normal";
                                $detailasam = "-";
                            }
                            if ($periksa->asam_urat < 3 ){
                                $statusasam = "Rendah";
                                $detailasam = "Konsultasikan dengan dokter/tenaga medis yang ahli";
                            }
                            if ($periksa->asam_urat > 6 ){
                                $statusasam = "Tinggi";
                                $detailasam = "Hindari makanan dengan kandungan purin dan fruktosa yang tinggi";
                            }
                        }
                        ?>
                        <blockquote class="blockquote mb-0">
                        <p>2. Dari Hasil Pengecekan Asam urat yaitu <strong>{{ $periksa->asam_urat }}</STRONG></p>
                        <footer class="blockquote-footer">Dari kategori output asam urat termasuk pada <cite class="font-weight-bold" title="Source Title">{{ $statusasam }}</cite></footer>
                        <p>{{ $detailasam }}</p>
                        </blockquote>
                        <hr>

                        @if ($periksa->gula_darah >= 70 & $periksa->gula_darah <= 140)
                        <?php
                            $statusgula = "Normal";
                            $detailgula = "-";
                        ?>
                        @endif
                        @if ($periksa->gula_darah < 70)
                        <?php
                            $statusgula = "Rendah";
                            $detailgula = "Hindari makanan berlemak yang dapat menghambat penyerapan gula";
                        ?>
                        @endif
                        @if ($periksa->gula_darah > 140)
                        <?php
                            $statusgula = "Tinggi";
                            $detailgula = "Hindari makanan tinggi kalori dan makanan mengandung kadar gula yang tinggi";
                        ?>
                        @endif

                        <blockquote class="blockquote mb-0">
                        <p>3. Dari Hasil Pengecekan Gula Darah yaitu <strong>{{ $periksa->gula_darah }}</STRONG></p>
                        <footer class="blockquote-footer">Dari kategori output gula darah termasuk pada <cite class="font-weight-bold" title="Source Title">{{ $statusgula }}</cite></footer>
                        <p>{{ $detailgula }}</p>
                        </blockquote>
                        <hr>

                        @if ($periksa->kolesterol < 200)
                        <?php
                            $statuskoles = "Normal";
                            $detailkoles ="-";
                        ?>
                        @endif
                        @if ($periksa->kolesterol >= 200)
                        <?php
                            $statuskoles = "Tinggi";
                            $detailkoles ="Hindari makanan yang mengandung lemak jenuh dan lemak trans";
                        ?>
                        @endif

                        <blockquote class="blockquote mb-0">
                        <p>4. Dari Hasil Pengecekan Kolesterol yaitu <strong>{{ $periksa->kolesterol }}</STRONG></p>
                        <footer class="blockquote-footer">Dari kategori output kolesterol termasuk pada <cite class="font-weight-bold" title="Source Title">{{ $statuskoles }}</cite></footer>
                        <p>{{ $detailkoles }}</p>
                        </blockquote>
                        <hr>

                        @if ($periksa->saturasi >= 95 & $periksa->saturasi <= 100)
                        <?php
                            $statussaturasi = "Normal";
                        ?>
                        @endif
                        @if ($periksa->saturasi < 90)
                        <?php
                            $statussaturasi = "Abnormal";
                        ?>
                        @endif
                        @if ($periksa->saturasi >= 90 & $periksa->saturasi <= 94)
                        <?php
                            $statussaturasi = "Rendah";
                        ?>
                        @endif

                        <blockquote class="blockquote mb-0">
                        <p>5. Dari Hasil Pengecekan Saturasi oksigen yaitu <strong>{{ $periksa->saturasi }}</STRONG></p>
                        <footer class="blockquote-footer">Dari kategori output saturasi termasuk pada <cite class="font-weight-bold" title="Source Title">{{ $statussaturasi }}</cite></footer>
                        </blockquote>
                        <hr>

                        @if ($periksa->pulse >= 60 & $periksa->pulse <= 100)
                        <?php
                            $statuspulse = "Normal";
                        ?>
                        @endif
                        @if ($periksa->pulse <= 45)
                        <?php
                            $statuspulse = "Abnormal";
                            ?>
                        @endif
                        @if ($periksa->pulse >= 130)
                        <?php
                            $statuspulse = "Abnormal";
                            ?>
                        @endif
                        @if ($periksa->pulse >= 45 & $periksa->pulse < 60)
                        <?php
                            $statuspulse = "Rendah";
                            ?>
                        @endif
                        @if ($periksa->pulse > 100 & $periksa->pulse < 130)
                        <?php
                            $statuspulse = "Tinggi";
                        ?>
                        @endif
                        <blockquote class="blockquote mb-0">
                        <p>6. Dari Hasil Pengecekan Pulse yaitu <strong>{{ $periksa->pulse }}</STRONG></p>
                        <footer class="blockquote-footer">Dari kategori output pulse termasuk pada <cite class="font-weight-bold" title="Source Title">{{ $statuspulse }}</cite></footer>
                        </blockquote>
                        <hr>

                        <blockquote class="blockquote mb-0">
                        <p>7. Dari Hasil Pengecekan Hemoglobin yaitu <strong>{{ $periksa->hemoglobin }}</STRONG></p>
                        <footer class="blockquote-footer">Dari kategori output hemoglobin termasuk pada <cite class="font-weight-bold" title="Source Title"></cite></footer>
                        </blockquote>
                        <hr>

                </div>

                </div>
            </div>
            </div>


                    </div>
                </div>
            </div>




            <div class="col-xl-7 col-lg-4">
                <div class="card shadow mt-3">

                    {{-- @foreach($rekam as $row) --}}
                    <div class="card-header py-3 ">
                    <h6 class="m-0 font-weight-bold text-primary">Rekam Medis</h6>
                    </div>
                    <div class="card-body">

                    <div style="margin-bottom:18px;">
                   <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">Keluhan</div>
                </div>
                 <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $rekam->keluhan }}</div>
               </div>

               <div style="margin-bottom:18px;">
                <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">alergi</div>
                </div>
                 <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $rekam->alergi }}</div>
                </div>

              <div style="margin-bottom:18px;">
                 <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">hasil pemeriksaan</div>
                </div>
                 <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $rekam->pemeriksaan }}</div>
               </div>

               <div style="margin-bottom:18px;">
                 <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">tindakan</div>
                </div>
                 <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $rekam->tindakan }}</div>
                </div>

                <div style="margin-bottom:18px;">
                 <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">terapi</div>
                </div>
                 <div class="h5 mb-1 font-weight-bold text-gray-800">{{ $rekam->terapi }}</div>
                </div>

                <div style="margin-bottom:18px;">
                 <div class="row no-gutters">
                 <div class="text-s font-weight-bold text-secondary text-uppercase mb-1">foto</div>
                </div>
                 <div class="h5 mb-1 font-weight-bold text-gray-800"><img src="/Uploads/{{ $rekam->foto }}" width="300"></div>
                </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- /.container-fluid -->
    </div>

    <br>
</x-app-layout2>
