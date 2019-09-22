<div id="login-page">
    <div class="container">
        <div style="width:30rem;margin:0 auto 0;position:absolute;top:5%;left:0;right:0;">
            <?= $this->session->flashdata('message'); ?>
        </div>
        <form class="form-login" action="" method="post">
            <h2 class="form-login-heading">Masuk Sekarang</h2>
            <div class="login-wrap">
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