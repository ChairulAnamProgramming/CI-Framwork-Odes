
	<section class="wrapper site-min-height" style="margin-top:2rem;">
		<div class="row" style="display: flex;justify-content: center;">
			<div class="col-xs-2 text-right" style="margin-top: 0;">
				<img src="<?= base_url('assets/img/logo.png'); ?>" style="width: 70px;height: 80px;">
				
			</div>
			<div class="col-xs-10 text-center"  style="">
				<h3 style="margin: 0;">PEMERINTAHAN KABUPATEN HULU SUNGAI TENGAH</h3>
				<h3 style="margin: 0;">KECAMATAN <?= $kelurahan['nama_kecamatan'] ;?></h3>
				<h3 style="margin: 0;"><?= $kelurahan['klasifikasi'] ?> <?= $kelurahan['nama_desa'] ;?></h3>
				<p><?= $kelurahan['alamat'] ?></p>
			</div style="margin: 0;">
		</div>
		<table class="table">
			<tr>
				<th>No Surat</th>
				<th>Nama</th>
				<th>NIK</th>
				<th>Yang Mengesahkan</th>
			</tr>
			<?php foreach ($laporan_surat as $laporan): ?>
				<tr>
					<td><?= $laporan['no_urut_surat'] ?></td>
					<td><?= $laporan['nama_lengkap'] ?></td>
					<td><?= $laporan['nik'] ?></td>
					<td><?= $laporan['nama_user'] ?></td>
				</tr>
			<?php endforeach ?>
		</table>

		<div class="row"style="display: flex;justify-content: flex-end;" >
			<div class="col-xs-3 text-center">
				<img src="<?= base_url('assets/img/ttd/1.png'); ?>"  style="width: 70px;height: 80px;">
				<p style="border-bottom: 1px solid #444;"><?= $user['nama_user'] ?></p>
				NIP. <?= $user['nik'] ?>
			</div>	
		</div>
	</section>

<script type="text/javascript">
	window.print();
</script>