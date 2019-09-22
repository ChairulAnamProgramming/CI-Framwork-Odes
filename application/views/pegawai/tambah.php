<section class="wrapper site-min-height" style="margin-top: 7rem;">

<a href="<?= base_url('Pegawai');  ?>" class="btn btn-primary btn-xs"><i class="fas fa-arrow-left"></i> Kembali</a>
	<div class="card mt" style="height: auto;">
        <div class="card-header" style="padding: 1px 10px; color: white; background-color: #f5cf53;height: auto;align-items: center;">
              <h4 class=""><?= $title; ?></h4>
        </div>
        <div class="card-body" style="padding: 10px;height: auto;align-items: center;">
        	   <form method="post" enctype="multipart/form-data">
                <div class="row mt">
                    <div class="col-lg-6">
                          <div class="form-group">
                            <label for="nama_user">Nama User</label>
                            <input type="text" class="form-control" name="nama_user" >
                            <?= form_error('nama_user','<small class="text-error text-danger">','</small>'); ?>
                          </div>
                          <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" name="nik">
                            <?= form_error('nik','<small class="text-error text-danger">','</small>') ?>
                          </div>
                          <div class="form-group">
                            <label for="jk">Jenis Kelamin</label><br>
                            <label><input type="radio" name="jk"  value="Laki-Laki"> Laki-Laki</label>
                            <label><input type="radio" name="jk"  value="Perempuan"> Perempuan</label>
                          </div>
                          <div class="form-group">
                            <label for="tmpt_lhr">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tmpt_lhr">
                          </div>
                          <div class="form-group">
                            <label for="tgl_lhr">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lhr">
                          </div>
                          <div class="form-group">
                            <label for="tmpt_lhr">Jabatan</label>
                            <select class="form-control" name="id_jabatan">
                                <option >- Pilih -</option>
                                <?php foreach ($jabatan as $key): ?>
                                    <option value="<?= $key['id_jabatan'] ?>"> <?= $key['nama_jabatan'] ?> </option>
                                <?php endforeach ?>
                            </select> 
                          </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                             <?= form_error('password','<small class="text-error text-danger">','</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                                <select  class="form-control" name="role">

                                    <?php if ($user['role'] == "Super Admin"): ?>
                                        <option value="">- Pilih -</option>
                                        <option value="Super Admin">Super Admin</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    <?php else: ?>
                                        <option value="">- Pilih -</option>
                                        <option value="Admin">Admin</option>
                                        <option value="User">User</option>
                                    <?php endif ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                    </div>
                </div>
                  <button class="btn btn-primary">Buat Akun</button>
            </form> 
        </div>
    </div>
</section>