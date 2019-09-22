<section class="wrapper site-min-height" style="margin-top: 7rem;">

<?php if ($user['role'] != "User"): ?>
    <a href="<?= base_url('Pegawai/tambah');  ?>" class="btn btn-primary btn-xs"><i class="fas fa-plus"></i> Tambah Pegawai</a>
<?php endif ?>
	<div class="card mt" style="height: auto;">
        <div class="card-header" style="padding: 1px 10px; color: white; background-color: #f5cf53;height: auto;align-items: center;">
              <h4 class=""><?= $title; ?></h4>
        </div>
        <div class="card-body" style="padding: 10px;height: auto;align-items: center;">
        	<table class="datatables">
        		<thead>
        			<tr>
        				<th width="10%">No</th>
        				<th width="20%"></th>
        				<th width="30%">Nama</th>
        				<th width="40%">NIK</th>
        				<th width="30%">Jabatan</th>
        				<?php if ($user['role'] != "User"): ?>
                        <th width="20%">Aksi</th>
                        <?php endif ?>
        			</tr>
        		</thead>
        		<tbody>
        			<?php $i=1; ?>
        			<?php foreach ($pegawai as $key): ?>
	        			<tr style="height: 5rem">
	        				<td><?= $i;$i++; ?></td>
	        				<td><img src="<?= base_url('assets/img/user/').$key['foto']; ?>" style="width: 40px;height: 40px;"></td>
	        				<td><?= $key['nama_user']; ?></td>
	        				<td><?= $key['nik']; ?></td>
	        				<td><?= $key['nama_jabatan']; ?></td>
	        				<?php if ($user['role'] != "User"): ?>
                                <td>
                                    <a href="#" class="text-warning" style="margin: 0 5px;"><i class="fas fa-edit" title="Ubah Akun Pegawai"></i></a>
                                    <a href="<?= base_url('Pegawai/hapus/').$key['id_user']; ?>" onclick="return confirm('Apakah Anda Yakin');" class="text-danger" style="margin: 0 5px;"><i class="fas fa-trash" title="Hapus Akun Pegawai"></i></a>
                                </td>
                            <?php endif ?>
	        			</tr>
        			<?php endforeach ?>
        		</tbody>
        	</table>
        </div>
    </div>
</section>