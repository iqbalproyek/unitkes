<div id="ceksehat" class="modal fade" role="dialog">

    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-primary">Detail</h4>
        </div>
        <div class="modal-body">
                <?php
                if ($row['tekanan_darah'] >= 100 & $row['tekanan_darah'] <= 130){
                    $statustekanan = "Normal";
                    $detailtekanan = "-";
                }
                if ($row['tekanan_darah'] < 100){
                    $statustekanan = "Rendah";
                    $detailtekanan = "Hindari makanan berkarbohidrat tinggi, dan jaga badan tetap terhidrasi";
                }
                if ($row['tekanan_darah'] > 130){
                    $statustekanan = "Tinggi";
                    $detailtekanan = "Hindari makanan asin dan bergula, serta makanan tinggi lemak jenuh";
                }

                if ($row['tekanan_darah2'] >= 70 & $row['tekanan_darah2'] <= 90){
                    $statustekanan2 = "Normal";
                    $detailtekanan2 = "-";
                }
                if ($row['tekanan_darah2'] < 70){
                    $statustekanan2 = "Rendah";
                    $detailtekanan2 = "Hindari makanan berkarbohidrat tinggi, dan jaga badan tetap terhidrasi";
                }
                if ($row['tekanan_darah2'] > 90){
                    $statustekanan2 = "Tinggi";
                    $detailtekanan2 = "Hindari makanan asin dan bergula, serta makanan tinggi lemak jenuh";
                }
                ?>
                <blockquote class="blockquote mb-0">
                <p>1. Dari Hasil Pengecekan Tekanan Darah yaitu <strong><?=$row['tekanan_darah']?>/<?=$row['tekanan_darah2']?></STRONG></p>
                <footer class="blockquote-footer">Dari kategori output sistolik termasuk pada <cite class="font-weight-bold" title="Source Title"><?=$statustekanan; ?></cite></footer>
                <p><?=$detailtekanan; ?></p>
                <footer class="blockquote-footer">Dari kategori output diastolik termasuk pada <cite class="font-weight-bold" title="Source Title"><?=$statustekanan2; ?></cite></footer>
                <p><?=$detailtekanan2; ?></p>
                </blockquote>
                <hr>

                <?php

                $data = mysqli_fetch_assoc($diri);
                $kelamin = $data['kelamin'];

                if ($kelamin == "laki-laki"){

                    if ($row['asam_urat'] >= 4 & $row['asam_urat'] <= 7){
                        $statusasam = "Normal";
                        $detailasam = "-";
                    }
                    if ($row['asam_urat'] < 4 ){
                        $statusasam = "Rendah";
                        $detailasam = "Konsultasikan dengan dokter/tenaga medis yang ahli";
                    }
                    if ($row['asam_urat'] > 7 ){
                        $statusasam = "Tinggi";
                        $detailasam = "Hindari makanan dengan kandungan purin dan fruktosa yang tinggi";
                    }

                } else if ($kelamin == "perempuan"){

                    if ($row['asam_urat'] >= 3 & $row['asam_urat'] <= 6){
                        $statusasam = "Normal";
                        $detailasam = "-";
                    }
                    if ($row['asam_urat'] < 3 ){
                        $statusasam = "Rendah";
                        $detailasam = "Konsultasikan dengan dokter/tenaga medis yang ahli";
                    }
                    if ($row['asam_urat'] > 6 ){
                        $statusasam = "Tinggi";
                        $detailasam = "Hindari makanan dengan kandungan purin dan fruktosa yang tinggi";
                    }
                }
                ?>
                <blockquote class="blockquote mb-0">
                <p>2. Dari Hasil Pengecekan Asam urat yaitu <strong><?=$row['asam_urat']?></STRONG></p>
                <footer class="blockquote-footer">Dari kategori output asam urat termasuk pada <cite class="font-weight-bold" title="Source Title"><?=$statusasam; ?></cite></footer>
                <p><?=$detailasam; ?></p>
                </blockquote>
                <hr>

                <?php
                if ($row['gula_darah'] >= 70 & $row['gula_darah'] <= 140){
                    $statusgula = "Normal";
                    $detailgula = "-";
                }
                if ($row['gula_darah'] < 70){
                    $statusgula = "Rendah";
                    $detailgula = "Hindari makanan berlemak yang dapat menghambat penyerapan gula";
                }
                if ($row['gula_darah'] > 140){
                    $statusgula = "Tinggi";
                    $detailgula = "Hindari makanan tinggi kalori dan makanan mengandung kadar gula yang tinggi";
                }
                ?>
                <blockquote class="blockquote mb-0">
                <p>3. Dari Hasil Pengecekan Gula Darah yaitu <strong><?=$row['gula_darah']?></STRONG></p>
                <footer class="blockquote-footer">Dari kategori output gula darah termasuk pada <cite class="font-weight-bold" title="Source Title"><?=$statusgula; ?></cite></footer>
                <p><?=$detailgula; ?></p>
                </blockquote>
                <hr>

                <?php
                if ($row['kolesterol'] < 200){
                    $statuskoles = "Normal";
                    $detailkoles ="-";
                }
                if ($row['kolesterol'] >= 200){
                    $statuskoles = "Tinggi";
                    $detailkoles ="Hindari makanan yang mengandung lemak jenuh dan lemak trans";
                }
                ?>
                <blockquote class="blockquote mb-0">
                <p>4. Dari Hasil Pengecekan Kolesterol yaitu <strong><?=$row['kolesterol']?></STRONG></p>
                <footer class="blockquote-footer">Dari kategori output kolesterol termasuk pada <cite class="font-weight-bold" title="Source Title"><?=$statuskoles; ?></cite></footer>
                <p><?=$detailkoles; ?></p>
                </blockquote>
                <hr>

                <?php
                if ($row['saturasi'] >= 95 & $row['saturasi'] <= 100){
                    $statussaturasi = "Normal";
                }
                if ($row['saturasi'] < 90){
                    $statussaturasi = "Abnormal";
                }
                if ($row['saturasi'] >= 90 & $row['saturasi'] <= 94){
                    $statussaturasi = "Rendah";
                }
                ?>
                <blockquote class="blockquote mb-0">
                <p>5. Dari Hasil Pengecekan Saturasi oksigen yaitu <strong><?=$row['saturasi']?></STRONG></p>
                <footer class="blockquote-footer">Dari kategori output saturasi termasuk pada <cite class="font-weight-bold" title="Source Title"><?=$statussaturasi; ?></cite></footer>
                </blockquote>
                <hr>

                <?php
                if ($row['pulse'] >= 60 & $row['pulse'] <= 100){
                    $statuspulse = "Normal";
                }
                if ($row['pulse'] <= 45){
                    $statuspulse = "Abnormal";
                }
                if ($row['pulse'] >= 130){
                    $statuspulse = "Abnormal";
                }
                if ($row['pulse'] >= 45 & $row['pulse'] < 60){
                    $statuspulse = "Rendah";
                }
                if ($row['pulse'] > 100 & $row['pulse'] < 130){
                    $statuspulse = "Tinggi";
                }
                ?>
                <blockquote class="blockquote mb-0">
                <p>6. Dari Hasil Pengecekan Pulse yaitu <strong><?=$row['pulse']?></STRONG></p>
                <footer class="blockquote-footer">Dari kategori output pulse termasuk pada <cite class="font-weight-bold" title="Source Title"><?=$statuspulse; ?></cite></footer>
                </blockquote>
                <hr>

                <blockquote class="blockquote mb-0">
                <p>7. Dari Hasil Pengecekan Hemoglobin yaitu <strong><?=$row['hemoglobin']?></STRONG></p>
                <footer class="blockquote-footer">Dari kategori output hemoglobin termasuk pada <cite class="font-weight-bold" title="Source Title"></cite></footer>
                </blockquote>
                <hr>

        </div>

        </div>
    </div>
    </div>

<!--endform!-->
