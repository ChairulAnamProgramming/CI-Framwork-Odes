
    
            <section class="wrapper site-min-height" style="margin-top:10rem;">
             <?= $this->session->flashdata('message'); ?>
                
                <a href="" class="btn btn-warning btn-xs"><i class="fas fa-sync"></i> Refrash</a>
               
                <form method="post">
               <div class="card mt" style="height: auto;">
                <div class="card-header" style="padding: 1px 10px; color: white; background-color: #f5cf53;height: auto;align-items: center;">
                      <h4 class=""><?= $title; ?></h4>
                </div>
                <div class="card-body" style="padding: 10px;height: auto;align-items: center;">
                    <div class="row">
                        <div class="col-lg-8">
                            <label class="col-lg-6"></label>
                            <h3 class="col-lg-6" id="nama_yang_meninggal"></h3>
                            <div class="form-group">
                              <label class="col-sm-6 control-label">Masukkan Nik Almarhum</label>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" placeholder="exm:6307040406110002" id="nik_meninggal" name="nik_meninggal">
                                  <?= form_error('nik_meninggal', '<small class="text-error text-danger">', '</small>'); ?>
                                  <br>
                              </div>
                              <label class="col-sm-6 control-label">Hari Meninggal</label>
                              <div class="col-sm-6">
                                  <select class="form-control" name="hari_meninggal">
                                      <option>- Pilih -</option>
                                      <option value="Senin">Senin</option>
                                      <option value="Selasa">Selasa</option>
                                      <option value="Rabu">Rabu</option>
                                      <option value="Kamis">Kamis</option>
                                      <option value="Jumat">Jumat</option>
                                      <option value="Sabtu">Sabtu</option>
                                      <option value="Minggu">Minggu</option>
                                  </select>
                                  <br>
                              </div>
                              <label class="col-sm-6 control-label">Tanggal Meninggal</label>
                              <div class="col-sm-6">
                                  <input type="date" class="form-control" name="tanggal_meninggal" value="<?= date('Y-m-d'); ?>">
                                  <br>
                              </div>
                              <label class="col-sm-6 control-label">Penyebab</label>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" name="penyebab">
                                  <br>
                              </div>
                              <label class="col-sm-6 control-label">Tempat Meninggal</label>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" name="tempat_meninggal">
                                  <hr>
                              </div>
                              <label class="col-sm-6 control-label">Nomor Surat</label>
                              <div class="col-sm-6">
                                  <input type="number" class="form-control" name="nomor_surat">
                                  <br>
                              </div>
                              <label class="col-sm-6 control-label">Tanggal Surat</label>
                              <div class="col-sm-6">
                                  <input type="date" class="form-control" name="tgl_surat" value="<?= date('Y-m-d'); ?>">
                                  <br>
                              </div>
                              <label class="col-sm-6 control-label">Mengesahkan</label>
                              <div class="col-sm-6">
                              <select class="form-control" name="mengesahkan">
                                  <option value="<?= $user['id_user'] ?>"><?= $user['nama_user'] ?></option>
                              </select>
                              <br>
                              </div>
                              <label class="col-sm-6 control-label">TTD Tempat</label>
                              <div class="col-sm-6">
                                <input type="text" name="ttd_tempat" class="form-control" value="<?= $asn['nama_desa'] ?>">
                                <br>
                              </div>
                              <label class="col-sm-6 control-label">TTD Tanggal</label>
                              <div class="col-sm-6">
                                <input type="date" name="ttd_tgl" class="form-control" value="<?= date('Y-m-d'); ?>">
                                <br>
                              </div>
                            </div>
                          <button class="btn btn-primary"><i class="fas fa-marker"></i> Buat Surat</button>

                        </div>
                        <div class="col-lg-4 mt">
                          <div class="card" style="height: auto;">
                            <div class="card-header" style="padding: 1px 10px; color: white; background-color: #9ff553;height: auto;align-items: center;">
                              <h5 class="text-center">List NIK:</h5>
                            </div>
                            <div class="card-body" style="padding: 10px;height: auto;align-items: center;">
                              <table class="datatables">
                                <thead>
                                  <tr>
                                    <th width="40%">Nama</th>
                                    <th width="60%">NIK</th>
                                    <th width="20%"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($warga as $key): ?>
                                    <tr>
                                      <td style="padding: 3px 0;"><?= $key['nama_lengkap'] ?></td>
                                      <td style="padding: 3px 0;"><?= $key['nik'] ?></td>
                                      <td style="padding: 3px 0;">
                                        <button type="button" class="btn btn-info btn-xs salin"  data-copy="<?= $key['nik']; ?>" >Copy</button>
                                      </td>
                                    </tr>
                                  <?php endforeach ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>                      
            </form>

            </section>
       


          <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
          <script type="text/javascript">
              $('#nik_meninggal').on('input',()=>{
                 const meniggal = $('#nik_meninggal').val()


                 $.ajax({
                    url:'<?= base_url("surat/SKMT/cari"); ?>',
                    type:'post',
                    data: {
                        data:meniggal
                    },
                    success:(data)=>{
                        const json = data,
                            dataJ = JSON.parse(json);
                            if (dataJ == null) {
                        $('#nama_yang_meninggal').html("<small>NIK Belum Terdaftar</small>");
                    }else{

                         $('#nama_yang_meninggal').html(dataJ.nama_lengkap);
                    }
                    }
                 })

              });


            $('.salin').on('click',function(){
                const salin = $(this).data('copy');
                $('#nik_meninggal').val(salin)
                $('#nik_meninggal').focus()
            })

          </script>