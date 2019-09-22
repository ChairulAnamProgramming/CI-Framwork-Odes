<section class="wrapper site-min-height" style="margin-top:10rem;">
	 <?= $this->session->flashdata('message'); ?>
 	<a href="" class="btn btn-warning btn-xs"><i class="fas fa-sync"></i> Refrash</a>


<form method="post">
	  		<div class="row">
	  			<div class="col-lg-6">
	<div class="card mt" style="height: auto;">
	  <div class="card-header" style="background-color: #ffd387;padding:10px;">
	   Pengaturan Profil Desa
	  </div>
	  <div class="card-body" style="padding:10px;">
	  				<div class="row">
					 	 <div class="form-group col-lg-12">
						    <label for="desa">Desa</label>
						    <input type="text" class="form-control" id="desa" value="<?= $profil_desa['nama_desa']; ?>" name="desa" >
						    <?= form_error('desa','<small class="text-error text-danger>','</small>') ?>
						  </div>
						  <div class="col-lg-12"></div>
					 	 <div class="form-group col-lg-6">
						    <label for="telpon">Telpon</label>
						    <input type="number" class="form-control" id="telpon" value="<?= $profil_desa['telpon']; ?>" name="telpon" >
						    <?= form_error('telpon','<small class="text-error text-danger>','</small>') ?>
						  </div>
						  <div class="col-lg-12"></div>
					 	 <div class="form-group col-lg-4">
						    <label for="kode_post">Kode Post</label>
						    <input type="number" class="form-control" id="kode_post" value="<?= $profil_desa['kode_pos']; ?>" name="kode_post" >
						    <?= form_error('kode_post','<small class="text-error text-danger>','</small>') ?>
						  </div>
					 	 <div class="form-group col-lg-12">
						    <label for="alamat">Alamat</label>
						    <textarea class="form-control" id="alamat" name="alamat" rows="4"><?= $profil_desa['alamat']; ?></textarea>
						    <?= form_error('alamat','<small class="text-error text-danger>','</small>') ?>
						  </div>
					 	 <div class="form-group col-lg-6">
						    <label for="kecamatan">Kecamatan</label>
						    <input type="text" class="form-control" id="kecamatan" value="<?= $profil_desa['nama_kecamatan']; ?>" name="kecamatan" >
						    <?= form_error('kecamatan','<small class="text-error text-danger>','</small>') ?>
						  </div>
					 	 <div class="form-group col-lg-6">
						    <label for="kabupaten">Kabupaten</label>
						    <input type="text" class="form-control" id="kabupaten" value="<?= $profil_desa['nama_kabupaten']; ?>" name="kabupaten" >
						    <?= form_error('kabupaten','<small class="text-error text-danger>','</small>') ?>
						  </div>
					 	 <div class="form-group col-lg-4">
						    <label for="klasifikasi">Klasifikasi</label>
						    <select class="form-control" id="klasifikasi"name="klasifikasi">
						    	<option value="">-Pilih-</option>
						    	<option value="Desa" <?php if ($profil_desa['klasifikasi'] == "Desa"): ?>selected<?php endif ?> >Desa</option>
						    	<option value="Kelurahan" <?php if ($profil_desa['klasifikasi'] == "Kelurahan"): ?>selected<?php endif ?> >Kelurahan</option>
						    </select>
						  </div>
					 </div>
				  <button class="btn btn-primary">Perbarui</button>
				</form>
	  		</div>
		</div>
	</div>
</div>

</section>