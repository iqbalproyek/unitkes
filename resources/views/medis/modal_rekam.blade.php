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
                                      <form action="{{ route('periksa.store') }}" method="post" enctype="multipart/form-data" >
                                         @csrf

                                    <div class="row">
                                      <div class= col-sm-6>
                                          <div class="form-group">
                                              <label for="id_pasien">NIK</label>
                                              <select name="id_pasien" class="form-control @error('id_pasien') is-invalid @enderror me-2" id="id_pasien" value="{{ old('id_pasien') }}">
                                              </select>
                                            @error('id_pasien')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                          </div>
                                      </div>

                                      <div class= col-sm-6>
                                          <div class="form-group">
                                              <label for="tanggal">Tanggal</label>
                                              <input type="date" class="form-control @error('tanggal') is-invalid @enderror me-2" name="tanggal" id="tanggal" value="{{ old('tanggal') }}">
                                              @error('tanggal')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                          </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="tekanan darah">Tekanan Darah</label>
                                              <div class="row">
                                              <div class="col-sm-6">
                                              <input type="text" class="form-control @error('tekanan_darah') is-invalid @enderror me-2" name="tekanan_darah" id="tekanan_darah" value="{{ old('tekanan_darah') }}">
                                              @error('tekanan_darah')
                                              <span class="invalid-feedback">{{$message}}</span>
                                          @enderror
                                            </div>
                                              /
                                              <div class="col-sm-5">
                                              <input type="text" class="form-control @error('tekanan_darah2') is-invalid @enderror me-2" name="tekanan_darah2" id="tekanan_darah2" value="{{ old('tekanan_darah2') }}">
                                              @error('tekana_darah2')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                                </div>
                                              </div>
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="pulse">Pulse</label>
                                              <input type="text" class="form-control @error('pulse') is-invalid @enderror me-2" name="pulse" id="pulse" value="{{ old('pulse') }}">
                                              @error('pulse')
                                              <span class="invalid-feedback">{{$message}}</span>
                                          @enderror
                                            </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="hemoglobin">Hemoglobin</label>
                                              <input type="text" class="form-control @error('hemoglobin') is-invalid @enderror me-2" name="hemoglobin" id="hemoglobin" value="{{ old('hemoglobin') }}">
                                              @error('hemoglobin')
                                              <span class="invalid-feedback">{{$message}}</span>
                                          @enderror
                                            </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="asam_urat">Asam Urat</label>
                                              <input type="text" class="form-control @error('asam_urat') is-invalid @enderror me-2" name="asam_urat" id="asam_urat" value="{{ old('asam_urat') }}">
                                              @error('asam_urat')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="gula_darah">Gula Darah</label>
                                              <input type="text" class="form-control @error('gula_darah') is-invalid @enderror me-2" name="gula_darah" id="gula_darah" value="{{ old('gula_darah') }}">
                                              @error('gula_darah')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="kolesterol">Kolesterol</label>
                                              <input type="text" class="form-control @error('kolesterol') is-invalid @enderror me-2" name="kolesterol" id="kolesterol" value="{{ old('kolesterol') }}">
                                              @error('kolesterol')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="saturasi">Saturasi Oksigen</label>
                                              <input type="text" class="form-control @error('saturasi') is-invalid @enderror me-2" name="saturasi" id="saturasi" value="{{ old('saturasi') }}">
                                              @error('saturasi')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="t_badan">Tinggi Badan</label>
                                              <input type="text" class="form-control @error('t_badan') is-invalid @enderror me-2" name="t_badan" id="t_badan" value="{{ old('t_badan') }}">
                                              @error('t_badan')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                          </div>
                                      </div>

                                      <div class="col-sm-2">
                                          <div class="form-group">
                                              <label for="b_badan">Berat Badan</label>
                                              <input type="text" class="form-control @error('b_badan') is-invalid @enderror me-2" name="b_badan" id="b_badan" value="{{ old('b_badan') }}">
                                              @error('b_badan')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                          </div>
                                      </div>
                                    </div>

                                    <br>
                                    <br>

                                    <div class="row">
                                      <div class= col-sm-6>
                                          <div class="form-group">
                                          <label for="keluhan">Keluhan</label>
                                          <textarea class="form-control @error('keluhan') is-invalid @enderror me-2" name="keluhan" id="keluhan" rows="2">{{ old('keluhan') }}</textarea>
                                          @error('keluhan')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                      </div>

                                      <div class= col-sm-6>
                                        <div class="form-group">
                                        <label for="alergi">Riwayat Alergi</label>
                                          <textarea class="form-control @error('alergi') is-invalid @enderror me-2" name="alergi" id="alergi" rows="2">{{ old('alergi') }}</textarea>
                                          @error('alergi')
                                          <span class="invalid-feedback">{{$message}}</span>
                                          @enderror
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class= col-sm-6>
                                        <div class="form-group">
                                        <label for="pemeriksaan">Hasil Pemeriksaan</label>
                                          <textarea class="form-control @error('pemeriksaan') is-invalid @enderror me-2" name="pemeriksaan" id="pemeriksaan" rows="2">{{ old('pemeriksaan') }}</textarea>
                                          @error('pemeriksaan')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                      </div>

                                      <div class= col-sm-6>
                                        <div class="form-group">
                                        <label for="tindakan">Tindakan</label>
                                          <textarea class="form-control @error('tindakan') is-invalid @enderror me-2" name="tindakan" id="tindakan" rows="2">{{ old('tindakan') }}</textarea>
                                          @error('tindakan')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class= col-sm-6>
                                        <div class="form-group">
                                        <label for="terapi">Terapi</label>
                                          <textarea class="form-control @error('terapi') is-invalid @enderror me-2" name="terapi" id="terapi" rows="2">{{ old('terapi') }}</textarea>
                                          @error('terapi')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
                                        </div>
                                      </div>

                                      <div class= col-sm-6>
                                        <div class="form-group">
                                        <label for="foto">Gambar</label>
                                          <input type="file" class="form-control @error('foto') is-invalid @enderror me-2" name="foto" id="foto" >
                                          @error('foto')
                                                <span class="invalid-feedback">{{$message}}</span>
                                            @enderror
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
<div id="hapusBarang" class="modal fade" role="dialog">

    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Data</h4>
        </div>
        <div class="modal-body">

        <form id="hapusperiksa" action="" method="post">
            @csrf
            @method('delete')
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
