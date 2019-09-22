
    
            <section class="wrapper site-min-height" style="margin-top:10rem;">
             <?= $this->session->flashdata('message'); ?>
                
                <?php if ($user['role'] != "User"): ?>
                    <a href="<?= base_url('Warga/tambah'); ?>" class="btn btn-primary btn-xs"><i class="fas fa-plus"></i> Tambah Warga</a>
                <?php endif ?>
                <a href="" class="btn btn-warning btn-xs"><i class="fas fa-sync"></i> Refrash</a>

                    <div class="showback mt">
                        
                      <table class="datatables ">
                            <thead style="background-color: #b8b8b8;">
                                <tr>
                                    <th width="20%" style="padding: 10px;">Nama Lengkap</th>
                                    <th width="20%" style="padding: 10px;">NIK</th>
                                    <th width="20%" style="padding: 10px;">KK</th>
                                    <th width="20%" style="padding: 10px;">Gender</th>
                                    <th width="20%" style="padding: 10px;">Status</th>
                                    <th width="20%" style="padding: 10px;">
                                        <?php if ($user['role'] != "User"): ?>
                                            Opsi
                                        <?php endif ?>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($warga_desa as $warga): ?>
                                    <tr>
                                        <th style=" padding:10px;"><?= $warga['nama_lengkap'] ?></th>
                                        <th style=" padding:10px;"><?= $warga['nik'] ?></th>
                                        <th style=" padding:10px;"><?= $warga['no_kk'] ?></th>
                                        <th style=" padding:10px;"><?= $warga['jk'] ?></th>
                                        <th style=" padding:10px;"><?= $warga['status_kawin'] ?></th>
                                            <th style=" padding:10px;">
                                        <?php if ($user['role'] != "User"): ?>
                                            <a href="<?= base_url('Warga/hapus/').$warga['id_warga']; ?>" onclick="return confirm('Apakah anda yakin?')"><i class="fas fa-trash text-danger"></i></a>
                                        <?php endif ?>
                                            </th>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        </div>
                      
              

            </section>
       