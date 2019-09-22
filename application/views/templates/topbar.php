 <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>ONLINE DESA</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- inbox dropdown start-->
                    <?php if ($user['role'] != "User"): ?>
                        <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                            <i class="fas fa-envelope"></i>
                            <span class="badge bg-theme">1</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Kamu Mempunyai 1 Pesan</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="photo"><img alt="avatar" src="<?= base_url(); ?>assets/img/ui-zac.jpg"></span>
                                    <span class="subject">
                                        <span class="from">Akang Koding</span>
                                        <span class="time">Just now</span>
                                    </span>
                                    <span class="message">
                                        Hi Chairul Anam, how is everything?
                                    </span>
                                </a>
                            </li>
                            
                            <li>
                                <a href="#">Liat Semua Pesan</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif ?>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?=base_url('Auth/logout');?>">Logout</a></li>
                </ul>
            </div>
        </header>