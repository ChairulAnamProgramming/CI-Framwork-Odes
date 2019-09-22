<section class="wrapper site-min-height" style="margin-top: 7rem;">
     <?= $this->session->flashdata('message'); ?>

	<div class="card mt" style="height: auto;">
        <div class="card-header" style="padding: 1px 10px; color: white; background-color: #f5cf53;height: auto;align-items: center;">
              <h4 class=""><?= $title; ?></h4>
        </div>
        <div class="card-body" style="padding: 10px;height: auto;align-items: center;">
        	<form method="post">
              <div class="form-group">
                <label for="password_lama">Password Lama</label>
                <input type="password" class="form-control" id="password_lama" name="password_lama">
                <?= form_error('password_lama','<small class="text-danger text-error">','</small>'); ?>
              </div>
              <div class="form-group">
                <label for="password_baru">Password Baru</label>
                <input type="password" class="form-control" id="password_baru" name="password_baru">
                <?= form_error('password_baru','<small class="text-danger text-error">','</small>'); ?>
              </div>
              <button type="submit" class="btn btn-primary"><i class="fas fa-lock"></i> Ubah Password</button>
            </form>
        </div>
    </div>
</section>