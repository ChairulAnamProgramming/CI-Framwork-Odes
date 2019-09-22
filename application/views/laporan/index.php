
    
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
                            <div class="form-group">
                              <label class="col-sm-6 control-label">select Laporan</label>
                              <div class="col-sm-6">
                                  <select class="form-control select_cari" name="laporan">
                                      <option>- Pilih -</option>
                                      <?php foreach ($kateg_laporan as $laporan): ?>
                                          <option value="<?= $laporan['id_surat'];  ?>"><?= $laporan['nama_surat'] ?></option>
                                      <?php endforeach ?>
                                  </select>
                                  <br>
                                  <a href="#" class="btn btn-danger btn-xs btn-laporan-dompdf" style="margin-left: auto;"><i class="fas fa-file-pdf"></i> Download PDF</a>
                                  <a href="#" class="btn btn-info btn-xs btn-laporan-print" style="margin-left: auto;"><i class="fas fa-print"></i> Print</a>
                              </div>
                            </div>

                        </div>
                    
                    </div>
                  </div>
                </div>                      
            </form>



            <div class="row">
                <div class="col-lg-12">
                    <div class="card" style="height: auto;">
                        <div class="card-body" style="padding: 10px;height: auto;align-items: center;">
                            <table class="datatables">
                                <thead>
                                    <tr>
                                        <th width="10%">Tanggal</th>
                                        <th width="25%">Nama</th>
                                        <th width="25%">NIK</th>
                                        <th width="20%">Yang Mengesahkan</th>
                                        <th width="10%">Nomor Surat</th>
                                    </tr>
                                </thead>
                                <tbody class="cari_laporan">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            </section>
       


          <script src="<?= base_url(); ?>assets/js/jquery.js"></script>
          <script type="text/javascript">
              $('.select_cari').on('change',(e)=>{
                e.preventDefault();
                 const cari = $('.select_cari').val()
                 $('.btn-laporan-dompdf').attr('href','<?= base_url('Laporan/dompdf/'); ?>'+cari);
                 $('.btn-laporan-print').attr('href','<?= base_url('Laporan/print/'); ?>'+cari);
                 console.log(cari)

                 $.ajax({
                    url:'<?= base_url("Laporan/change"); ?>',
                    type:'post',
                    data: {
                        data:cari
                    },
                    success:(data)=>{
                           $('.cari_laporan').html(data);
                    }
                 });

              });


            $('.salin').on('click',(e)=>{
                e.preventDefault();
                const salin = $('.salin').data('copy');
                $('#nik_meninggal').val(salin)
                $('#nik_meninggal').focus()
                
                $('img').attr('title', 'Maringngerrang');
            })

          

          </script>