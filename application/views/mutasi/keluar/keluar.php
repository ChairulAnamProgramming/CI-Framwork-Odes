<section class="wrapper site-min-height" style="margin-top: 7rem;">
     <?= $this->session->flashdata('message'); ?>

     <a href="<?= base_url('Mutasi_keluar/tambah'); ?>" class="btn btn-primary btn-xs"><i class="fas fa-plus"></i> Tambah Mutasi</a>

	<div class="card mt" style="height: auto;">
        <div class="card-header" style="padding: 1px 10px; color: white; background-color: #f5cf53;height: auto;align-items: center;">
              <h4 class=""><?= $title; ?></h4>
        </div>
        <div class="card-body" style="padding: 10px;height: auto;align-items: center;">
        	<table class="datatables">
            <thead>
              <tr>
                <th width="20%">Nomor Surat</th>
                <th width="30%">Nama</th>
                <th width="10%">Tanggal Masuk</th>
                <th width="30%">Perihal</th>
                <th width="20%">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $i=1; ?>
              <?php foreach ($mutasi_keluar as $keluar): ?>
                <tr>
                  <td><?= $keluar['no_surat'] ?></td>
                  <td><?= $keluar['nama'] ?></td>
                  <td><?= date('d-m-Y',strtotime($keluar['tanggal_masuk'])) ?></td>
                  <td><?= $keluar['perihal'] ?></td>
                  <td>
                    <a href="<?= base_url('Mutasi_keluar/ubah/').$keluar['id_mutasi'];?>" class="text-warning" style="margin: 0 2px;"><i class="fas fa-edit"></i></a>
                    <a href="<?= base_url('Mutasi_keluar/hapus/').$keluar['id_mutasi'];?>" onclick="return confirm('Apakah anda yakin');" class="text-danger" style="margin: 0 2px;"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
    </div>
</section>