 <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered"><a href="<?= base_url('Profil'); ?>"><img src="<?=base_url('assets/img/user/').$user['foto']; ?>" class="img-circle" width="60" style="height: 100px;width: 100px;"></a></p>
                    <h5 class="centered"><?= $user['nama_user'] ?></h5>

                    <li class="mt">
                        <?php if ($nav == "User"): ?>
                            <a href="<?= base_url('User'); ?>" class="active">
                                <?php else: ?>
                            <a href="<?= base_url('User'); ?>">
                        <?php endif ?>
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    
                    <?php if ($user['role'] != "User"): ?>
                        <li class="sub-menu ">
                        <?php if ($nav == "Surat"): ?>
                            <a href="javascript:;" class="active">
                                <?php else: ?>
                            <a href="javascript:;">
                        <?php endif ?>

                             <i class="fa fa-envelope"></i>
                            <span>Layanan Surat</span>
                        </a>
                        <ul class="sub">
                            <?php 
                                           $this->db->order_by('nama_surat','ASC');
                            $jenis_surat = $this->db->get('tb_surat')->result_array(); ?>
                            <?php foreach ($jenis_surat as $surat): ?>


                                <?php if ($navitems == $surat['kode_surat']): ?>
                                    <li class="active">
                                        <?php else: ?>
                                    <li>
                                <?php endif ?>
                                    <a href="<?= base_url(). $surat['url']; ?>"><i class="fa fa-caret-right"></i><?= $surat['nama_surat']; ?></a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                    <?php endif ?>


                    <li>
                    <?php if ($nav == "Pegawai"): ?>
                            <a href="<?= base_url('Pegawai'); ?>" class="active">
                                <?php else: ?>
                            <a href="<?= base_url('Pegawai'); ?>">
                    <?php endif ?>                    
                            <i class="fa-fw fa fa-user-tie"></i>
                            <span>Pegawai</span>
                        </a>
                    </li>
                    <li>
                    <?php if ($nav == "Warga"): ?>
                            <a href="<?= base_url('Warga'); ?>" class="active">
                                <?php else: ?>
                            <a href="<?= base_url('Warga'); ?>">
                    <?php endif ?>                    
                            <i class="fa-fw fa fa-database"></i>
                            <span>Warga Desa</span>
                        </a>
                    </li>
                    <li>
                    <?php if ($nav == "Gallery"): ?>
                            <a href="<?= base_url('Gallery'); ?>" class="active">
                                <?php else: ?>
                            <a href="<?= base_url('Gallery'); ?>">
                    <?php endif ?>                    
                            <i class="fa-fw fa fa-images"></i>
                            <span>Gallery</span>
                        </a>
                    </li>
                    
                    <?php if ($user['role'] != "User"): ?>
                        <li>
                    <?php if ($nav == "Mutasi Masuk"): ?>
                            <a href="<?= base_url('Mutasi_masuk'); ?>" class="active">
                                <?php else: ?>
                            <a href="<?= base_url('Mutasi_masuk'); ?>">
                    <?php endif ?>   
                            <i class=" fa-fw fa fa-arrow-circle-right"></i>
                            <span>Mutasi Masuk</span>
                        </a>
                    </li>
                    <?php endif ?>

                    <?php if ($user['role'] != "User"): ?>
                        <li>
                    <?php if ($nav == "Mutasi Keluar"): ?>
                            <a href="<?= base_url('Mutasi_keluar'); ?>" class="active">
                                <?php else: ?>
                            <a href="<?= base_url('Mutasi_keluar'); ?>">
                    <?php endif ?>   
                           <i class="fa fa-arrow-circle-left fa-fw"></i>
                            <span>Mutasi Keluar</span>
                        </a>
                    </li>
                    <?php endif ?>

                    <?php if ($user['role'] != "User"): ?>
                        <li>
                            <a href="<?= base_url('Laporan'); ?>">
                               <i class="fa fa-file fa-fw"></i>
                                <span>Laporan</span>
                            </a>
                        </li>
                    <?php endif ?>

                    <li>
                        <?php if ($nav == "Ubah Password"): ?>
                            <a href="<?= base_url('User/ubah_password'); ?>" class="active">
                                <?php else: ?>
                            <a href="<?= base_url('User/ubah_password'); ?>">
                        <?php endif ?>   
                           <i class="fas fa-key fa-fw"></i>
                            <span>Ubah Password</span>
                        </a>
                    </li>


                    <?php if ($user['role'] != "User"): ?>
                        <li>
                        <?php if ($nav == "Jabatan"): ?>
                                <a href="<?= base_url('Jabatan'); ?>" class="active">
                                    <?php else: ?>
                                <a href="<?= base_url('Jabatan'); ?>">
                        <?php endif ?>   
                               <i class="fas fa-address-card fa-fw"></i>
                                <span>Jabatan</span>
                            </a>
                        </li>
                    <?php endif ?>

                    <?php if ($user['role'] != "User"): ?>
                        <li>
                        <?php if ($nav == "Pengaturan"): ?>
                                <a href="<?= base_url('Pengaturan'); ?>" class="active">
                                    <?php else: ?>
                                <a href="<?= base_url('Pengaturan'); ?>">
                        <?php endif ?>   
                               <i class="fa fa-cogs fa-fw"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                    <?php endif ?>

                </ul>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->

        
        <!--main content start-->
        <section id="main-content" >