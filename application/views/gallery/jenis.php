 <section class="wrapper site-min-height" style="margin-top:10rem;">
    <a href="<?= base_url('Gallery');  ?>" class="btn btn-primary btn-xs"><i class="fas fa-arrow-left"></i> Kembali</a>
             <?= $this->session->flashdata('message'); ?>
<div class="row mt">
	<?php foreach ($gallery_foto as $gallery): ?>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc text-center">
				<div class="project-wrapper">
                    <div class="project">
                        <div class="photo-wrapper">
                            <div class="photo">
                            	<a class="fancybox" href="<?= base_url(); ?>assets/img/gallery/<?= $gallery['gallery']; ?>"><img class="img-responsive text-center" style="height: 300px;" src="<?= base_url(); ?>assets/img/gallery/<?= $gallery['gallery']; ?>" alt=""></a>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('Gallery/hapus/').$gallery['id_gallery'] ?>" class="text-danger" onclick="return confirm('Apakah Anda Yakin?');" style="margin-top: 10rem;"><i class="fas fa-trash fa-2x"></i></a>
			</div>
	<?php endforeach ?>

				</div>
	</section>