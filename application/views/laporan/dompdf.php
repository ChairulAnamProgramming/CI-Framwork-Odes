<!DOCTYPE html>
<html><head>
	<title></title>
	<style type="text/css">
		body{
			font-family: arial;
		}
	</style>
</head><body>
				<div style="text-align: center;">
					<h3 style="margin: 0;">PEMERINTAHAN KABUPATEN HULU SUNGAI TENGAH</h3>
					<h3 style="margin: 0;">KECAMATAN <?= $kelurahan['nama_kecamatan'] ;?></h3>
					<h3 style="margin: 0;"><?= $kelurahan['klasifikasi'] ?> <?= $kelurahan['nama_desa'] ;?></h3>
					<p style="margin: 0;"><?= $kelurahan['alamat'] ?></p>
				</div>
		<table class="table" width="100%" border="1">
			<tr>
				<th>No Surat</th>
				<th>Nama</th>
				<th>NIK</th>
				<th>Yang Mengesahkan</th>
			</tr>
			<?php foreach ($laporan_surat as $laporan): ?>
				<tr>
					<td style="text-align: center;"><?= $laporan['no_urut_surat'] ?></td>
					<td style="text-align: center;"><?= $laporan['nama_lengkap'] ?></td>
					<td style="text-align: center;"><?= $laporan['nik'] ?></td>
					<td style="text-align: center;"><?= $laporan['nama_user'] ?></td>
				</tr>
			<?php endforeach ?>
		</table>
</body></html>