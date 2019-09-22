 <section class="wrapper site-min-height" style="margin-top:10rem;">
             <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url('Gallery/tambah'); ?>" class="btn btn-primary btn-xs"><i class="fas fa-plus"></i> Tambak Foto</a>
<div class="row" style="margin: 30px;">
            <a href="<?= base_url('Gallery/jenis/1'); ?>" style="margin-right: 200px;">
    			<div class="text-center" style="background-color: #fff;height: auto;width: auto;padding: 40px;border-radius: 10px;">
    				<i class="fas fa-folder-open fa-7x"></i>
                    <p>Pengelolaan Dana</p>
    			</div>
            </a>

            <a href="<?= base_url('Gallery/jenis/2'); ?>" style="margin-right: 200px;">
                <div class="text-center" style="background-color: #fff;height: auto;width: auto;padding: 40px;border-radius: 10px;">
                    <i class="fas fa-folder-open fa-7x"></i>
                    <p>Album Foto</p>
                </div>
            </a>

            <a href="<?= base_url('Gallery/jenis/3'); ?>" style="margin-right: 200px;">
                <div class="text-center" style="background-color: #fff;height: auto;width: auto;padding: 40px;border-radius: 10px;">
                    <i class="fas fa-folder-open fa-7x"></i>
                    <p>Laporan</p>
                </div>
            </a>

</div>
	</section>