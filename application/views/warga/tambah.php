<section class="wrapper site-min-height" style="margin-top:10rem;">
 <?= $this->session->flashdata('message'); ?>
                
<form method="post" enctype="multipart/form-data" action="<?= base_url('Warga/import'); ?>">
                    <div class="row">
                        <div class="col-lg-12">
                            <a href="<?= base_url('Warga'); ?>" class="btn btn-info btn-xs"><i class="fas fa-arrow-left"></i> Kembali</a>
                            <a href="<?= base_url('assets/xlsx/format/exm_bip.xlsx'); ?>" class="btn btn-success btn-xs"><i class="fas fa-download"></i> Download Contoh xlsx</a>
                        </div>
                        <div class="col-lg-12 mt">
                            <h4>Import Data Warga</h4>
                        </div>
                        <div class="col-lg-4 ">
                            <input type="file" class="form-control" id="file" name="file" accept=".xsl, .xlsx">
                            <?= form_error('data_warga','<small class="text-error text-danger">','</small>') ?>
                        </div>
                        <div class="col-lg-4 ">
                            <button class="btn btn-primary btn">Import Data</button>
                        </div>
                    </div>

</form> 
</section>