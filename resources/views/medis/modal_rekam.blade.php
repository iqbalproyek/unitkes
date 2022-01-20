{{-- modal tambah cek --}}
                            <!-- Modal -->
                            <div class="modal fade" id="modalTambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Form Tambah Riwayat</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <form action="prosescek.php?aksi=tambah" method="post" enctype="multipart/form-data" >
                                      <?php
                                      foreach($dsn as $row):
                                        $email = $row['email'];
                                      ?>
                                      <input type="hidden" class="form-control" name="email" id="email" value="<?=$email;?>" >
                                      <?php endforeach; ?>
                                      <input type="hidden" name="token" value="<?=$token?>">

                                    <div class="row">
                                      <div class= col-sm-6>
                                          <div class="form-group">
                                              <label for="id">NIK</label>
                                              <select name="id_ps" class="form-control" id="id_ps" required>
                                          <?php
                                                    $md = mysqli_query($koneksi, "select * from tb_pasien where id_ps = '".$id."'");
                                                   $data = mysqli_fetch_array($md);
                                          ?>
                                          <option value="<?=$data['id_ps'];?>"><?=$data['nik'];?></option>
                                          </select>
                                          </div>
                                      </div>

                                      <div class= col-sm-6>
                                          <div class="form-group">
                                              <label for="tanggal">Tanggal</label>
                                              <input type="date" class="form-control" name="tanggal" id="tanggal" required="">
                                          </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="tekanan darah">Tekanan Darah</label>
                                              <div class="row">
                                              <div class="col-sm-6">
                                              <input type="text" class="form-control" name="tekanan_darah" id="tekanan_darah">
                                              </div>
                                              /
                                              <div class="col-sm-5">
                                              <input type="text" class="form-control" name="tekanan_darah2" id="tekanan_darah2">
                                              </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="pulse">Pulse</label>
                                              <input type="text" class="form-control" name="pulse" id="pulse">
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="hemoglobin">Hemoglobin</label>
                                              <input type="text" class="form-control" name="hemoglobin" id="hemoglobin">
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="asam_urat">Asam Urat</label>
                                              <input type="text" class="form-control" name="asam_urat" id="asam_urat">
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="gula_darah">Gula Darah</label>
                                              <input type="text" class="form-control" name="gula_darah" id="gula_darah">
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="kolesterol">Kolesterol</label>
                                              <input type="text" class="form-control" name="kolesterol" id="kolesterol">
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="saturasi">Saturasi Oksigen</label>
                                              <input type="text" class="form-control" name="saturasi" id="saturasi">
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="t_badan">Tinggi Badan</label>
                                              <input type="text" class="form-control" name="t_badan" id="t_badan">
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="b_badan">Berat Badan</label>
                                              <input type="text" class="form-control" name="b_badan" id="b_badan">
                                          </div>
                                      </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="row">
                                      <div class= col-sm-6>
                                          <div class="form-group">
                                          <label for="keluhan">Keluhan</label>
                                          <textarea class="form-control" name="keluhan" id="keluhan" rows="2"></textarea>
                                        </div>
                                      </div>

                                      <div class= col-sm-6>
                                        <div class="form-group">
                                        <label for="alergi">Riwayat Alergi</label>
                                          <textarea class="form-control" name="alergi" id="alergi" rows="2"></textarea>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class= col-sm-6>
                                        <div class="form-group">
                                        <label for="pemeriksaan">Hasil Pemeriksaan</label>
                                          <textarea class="form-control" name="pemeriksaan" id="pemeriksaan" rows="2"></textarea>
                                        </div>
                                      </div>

                                      <div class= col-sm-6>
                                        <div class="form-group">
                                        <label for="tindakan">Tindakan</label>
                                          <textarea class="form-control" name="tindakan" id="tindakan" rows="2"></textarea>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class= col-sm-6>
                                        <div class="form-group">
                                        <label for="terapi">Terapi</label>
                                          <textarea class="form-control" name="terapi" id="terapi" rows="2"></textarea>
                                        </div>
                                      </div>

                                      <div class= col-sm-6>
                                        <div class="form-group">
                                        <label for="foto">Gambar</label>
                                          <input type="file" class="form-control" name="foto" id="foto" >
                                        </div>
                                      </div>
                                    </div>

                                    </div>
                                    <div class="modal-footer">
                                      <button type="reset" id="tambah_brg" name="reset" class="btn btn-danger">Kosongkan</button>
                                      <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    </form>

                                  </div>
                                </div>
                              </div>
                             <!--endform modal tambah cek!-->


{{-- modal hapus cek --}}
<div id="hapusBarang<?php echo $row['id_cek']; ?>" class="modal fade" role="dialog">

    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">


        <div class="modal-header">

          <h4 class="modal-title">Hapus Data</h4>

        </div>


        <div class="modal-body">

        <form action="prosescek.php?aksi=hapus" method="post">
        <input type="hidden" name="token" value="<?=$token?>">

                <input type="hidden" name="id_cek" value="<?php echo $row['id_cek'] ?>">

                <center><h6 class="modal-title">Apakah Anda ingin menghapus data ini ?</h6>
                <br>
          <div class="form-group">
            <button type="submit" id="hapus_brg" class="btn btn-primary btn-block">Hapus Data</button>
          </div>

          </form>
        </div>

      </div>
    </div>
  </div>
  {{-- tutup hapus cek --}}
