
    
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
                            <h3 class="col-lg-6" id="nama_pemohon"></h3>
                            <div class="form-group">
                              <label class="col-sm-6 control-label">Masukkan Nik</label>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" placeholder="exm:6307040406110002" id="nik_pemohon" name="nik_pemohon">
                                  <?= form_error('nik_pemohon', '<small class="text-error text-danger">', '</small>'); ?>
                                  <br>
                              </div>
                              <label class="col-sm-6 control-label">Bidang Usaha</label>
                              <div class="col-sm-6">
                                  <input type="text" class="form-control" name="bidang_usaha">
                                  <br>
                              </div>
                              <label class="col-sm-6 control-label">Alamat Usaha</label>
                              <div class="col-sm-6">
                                  <textarea class="form-control" name="alamat_usaha" rows="4"></textarea>
                                  <br>
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
              $('#nik_pemohon').on('input',()=>{
                 const pemohon = $('#nik_pemohon').val()

                 $.ajax({
                    url:'<?= base_url("surat/SKU/cari"); ?>',
                    type:'post',
                    data: {
                        data:pemohon
                    },
                    success:(data)=>{
                        const json = data,
                            dataJ = JSON.parse(json);
                            if (dataJ == null) {
                        $('#nama_pemohon').html("<small>NIK Belum Terdaftar</small>");
                    }else{

                         $('#nama_pemohon').html(dataJ.nama_lengkap);
                    }
                    }
                 })

              });


            $('.salin').on('click',function(){
                const salin = $(this).data('copy');
                $('#nik_pemohon').val(salin)
                $('#nik_pemohon').focus()
            })

          </script>