<div id="login-page">
    <div class="container">

        <form class="form-login" action="" method="post">
            <h2 class="form-login-heading">Daftar Sekarang</h2>
            <div class="login-wrap">
                <input type="text" class="form-control" placeholder="Nama Lengkap" autofocus value="<?= set_value('nama'); ?>" name="nama">
                <?= form_error('nama', '<small class="text-error text-danger">', '</small>'); ?>
                <br>
                <label>
                    <input type="radio" name="jk" id="jk1" value="Laki-Laki" checked="">
                    Laki-Laki
                </label>
                <label>
                    <input type="radio" name="jk" id="jk2" value="Perempuan">
                    Perempuan
                </label>
                <br>
                <br>
                <input type="text" class="form-control" placeholder="NIK Penduduk" autofocus value="<?= set_value('nik_pddk'); ?>" name="nik_pddk">
                <?= form_error('nik_pddk', '<small class="text-error text-danger">', '</small>'); ?>
                <br>
                <input type="password" class="form-control" placeholder="Password" value="<?= set_value('password'); ?>" name="password">
                <?= form_error('password', '<small class="text-error text-danger">', '</small>'); ?>
                <br>
                <button class="btn btn-theme btn-block " href="index.html" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
                <hr>

                <div class="registration">
                    Belum punya akun?
                    <a class="" href="<?= base_url('Auth/registrasi'); ?>">
                        Sign Up
                    </a>
                </div>

            </div>
        </form>

    </div>
</div>