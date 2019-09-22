<section class="wrapper site-min-height" style="margin-top:10rem;">
	 <?= $this->session->flashdata('message'); ?>
 	<a href="" class="btn btn-warning btn-xs"><i class="fas fa-sync"></i> Refrash</a>


<form method="post">
	  		<div class="row">
	  			<div class="col-lg-6">
	<div class="card mt" style="height: auto;">
	  <div class="card-header" style="background-color: #ffd387;padding:10px;">
	   <?= $title; ?>
	  </div>
	  <div class="card-body" style="padding:10px;">
	  				<div class="row">
					 	 <div class="form-group col-lg-12">
						    <label for="jabatan">Jabatan</label>
						    <input type="text" class="form-control" id="jabatan" name="jabatan" >
						    <?= form_error('jabatan','<small class="text-error text-danger>','</small>') ?>
						  </div>

					 	 <div class="form-group col-lg-12">
						    <label for="status">Status</label>
						    <select class="form-control" id="status" name="status">
						    	<option value="">- Pilih -</option>
						    	<option value="Lurah">Lurah</option>
						    	<option value="Wakil Lurah">Wakil Lurah</option>
						    	<option value="PNS">PNS</option>
						    	<option value="Honor">Honorer</option>
						    	<option value="Kontrak">Kontrak</option>
						    	<option value="Warga">Warga</option>
						    </select>
						    <?= form_error('status','<small class="text-error text-danger>','</small>') ?>
						  </div>
					 </div>
				  <button class="btn btn-primary">Buat</button>
				</form>
	  		</div>
		</div>
	</div>
</div>

</section>