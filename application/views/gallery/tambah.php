<section class="wrapper site-min-height" style="margin-top:10rem;">
	 <?= $this->session->flashdata('message'); ?>
 	<a href="" class="btn btn-warning btn-xs"><i class="fas fa-sync"></i> Refrash</a>


<form method="post" enctype="multipart/form-data">
	  		<div class="row">
	  			<div class="col-lg-6">
	<div class="card mt" style="height: auto;">
	  <div class="card-header" style="background-color: #ffd387;padding:10px;">
	   <?= $title; ?>
	  </div>
	  <div class="card-body" style="padding:10px;">
	  				<div class="row">
					 	 <div class="form-group col-lg-12">
						    <label for="title">Title</label>
						    <input type="text" class="form-control" id="title" name="title" >
						    <?= form_error('title','<small class="text-error text-danger">','</small>') ?>
						  </div>

					 	 <div class="form-group col-lg-12">
						    <label for="jenis">Jenis</label>
						    <select class="form-control" id="jenis" name="jenis">
						    	<option value="">- Pilih -</option>
						    	<option value="Pengelolaan Dana">Pengelolaan Dana</option>
						    	<option value="Laporan">Laporan</option>
						    	<option value="Album Foto">Album Foto</option>
						    </select>
						    <?= form_error('jenis','<small class="text-error text-danger">','</small>') ?>
						  </div>

					 	 <div class="form-group col-lg-12">
						    <label for="foto">Foto</label>
						    <input type="file" class="form-control" id="foto" name="foto" >
						    <?= form_error('foto','<small class="text-error text-danger">','</small>') ?>
						  </div>
					 </div>
				  <button class="btn btn-primary">Buat</button>
				</form>
	  		</div>
		</div>
	</div>
</div>

</section>