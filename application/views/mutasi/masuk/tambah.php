<section class="wrapper site-min-height" style="margin-top: 7rem;">
     <?= $this->session->flashdata('message'); ?>
     <a href="<?= base_url('Mutasi_masuk'); ?>" class="btn btn-info btn-xs"><i class="fas fa-arrow-left"></i> Kembali</a>
     <div class="row">
       <div class="col-sm-6">
         <div class="card mt" style="height: auto;">
        <div class="card-header" style="padding: 1px 10px; color: white; background-color: #f5cf53;height: auto;align-items: center;">
              <h4 class=""><?= $title; ?></h4>
        </div>
          <div class="card-body" style="padding: 10px;height: auto;align-items: center;">
            <form method="post">
                <div class="form-group">
                  <label for="no_surat">Nomor Surat</label>
                  <input type="number" class="form-control" id="no_surat" name="no_surat">
                  <?= form_error('no_surat','<small class="text-danger text-error">','</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" class="form-control" id="nama" name="nama">
                  <?= form_error('nama','<small class="text-danger text-error">','</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="tanggal_masuk">Tanggal Masuk</label>
                  <input type="date" class="form-control" id="tanggal_masuk" name="tanggal_masuk" value="<?= date('Y-m-d'); ?>">
                  <?= form_error('tanggal_masuk','<small class="text-danger text-error">','</small>'); ?>
                </div>
                <div class="form-group">
                  <label for="perihal">Perihal</label>
                    <textarea class="form-control" id="perihal" name="perihal"></textarea>
                  <?= form_error('perihal','<small class="text-danger text-error">','</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary">Tambahkan</button>
              </form>
          </div>
      </div>
       </div>
     </div>

</section>