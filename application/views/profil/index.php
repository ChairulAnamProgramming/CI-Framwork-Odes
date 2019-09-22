<section class="wrapper site-min-height" style="margin-top:10rem;">
	 <?= $this->session->flashdata('message'); ?>


	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 mb">


			<div class="card" style="width: 100%;height: auto;">
			  <div class="bg-header">

                    <p class="centered"><a href="<?= base_url('Profil'); ?>"><img src="<?=base_url('assets/img/user/').$user['foto']; ?>" class="img-circle" width="60" style="height: 100px;width: 100px;"></a></p>
			  	<h1 class="text-dark"><?= $user['nama_user']; ?></h1>
			  	<h3 class="text-light"><?= $user['nama_jabatan']; ?></h3>
			  </div>
			  <div class="card-body" style="padding: 10px;">
			    	
  			<form method="post" enctype="multipart/form-data">
			  	<div class="row mt">
			  		<div class="col-lg-6">
						  <div class="form-group">
						    <label for="nama_user">Nama User</label>
						    <input type="text" class="form-control" name="nama_user" value="<?= $user['nama_user']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="nik">NIK</label>
						    <input type="text" class="form-control" name="nik" value="<?= $user['nik']; ?>" readonly>
						    <?= form_error('nik','<small class="text-error text-danger>','</small>') ?>
						  </div>
						  <div class="form-group">
						    <label for="jk">Jenis Kelamin</label><br>
						    <label><input type="radio" name="jk" <?php if ($user['jk'] == "Laki-Laki"): ?> checked <?php endif ?> value="Laki-Laki"> Laki-Laki</label>
						    <label><input type="radio" name="jk" <?php if ($user['jk'] == "Perempuan"): ?> checked <?php endif ?> value="Perempuan"> Perempuan</label>
						  </div>
						  <div class="form-group">
						    <label for="tmpt_lhr">Tempat Lahir</label>
						    <input type="text" class="form-control" name="tmpt_lhr" value="<?= $user['tmpt_lhr']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="tgl_lhr">Tanggal Lahir</label>
						    <input type="date" class="form-control" name="tgl_lhr" value="<?= date('Y-m-d',strtotime($user['tgl_lhr'])); ?>">
						  </div>
						  <div class="form-group">
						    <label for="tmpt_lhr">Jabatan</label>
						    <select class="form-control" name="id_jabatan">
						    	<?php foreach ($jabatan as $key): ?>
						    		<option <?php if ($user['id_jabatan'] == $key['id_jabatan']): ?>selected<?php endif ?> value="<?= $key['id_jabatan'] ?>"> <?= $key['nama_jabatan'] ?> </option>
						    	<?php endforeach ?>
						    </select>
						  </div>
			  		</div>
			  		<div class="col-lg-6">
			  			<div class="form-group">
						    <label for="foto">Foto</label>
						    <input type="file" class="form-control" name="foto">
						    <br><br>
						</div>
			  		</div>
			  	</div>
				  <button class="btn btn-primary">Ubah Profil</button>
				</form>

			  </div>
			</div>

		</div>
	</div>



</section>