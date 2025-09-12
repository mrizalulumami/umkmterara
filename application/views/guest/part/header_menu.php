<!-- =========================
         NAVBAR (GANTI PLACEHOLDER DENGAN DATA)
         ========================= -->
    <div class="navbar navbar-custom navbar-fixed-top" role="navigation" style="background:yellow;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button>

                <!-- GANTI src LOGO DENGAN LOGO ASLI -->
                <a class="navbar-brand" href="index.html">
                    <img src="<?= base_url("assets/")?>admin/assets/images/icon/logo-typo.png" alt="Logo" style="height:42px;">
                </a>
            </div>

            <div class="navbar-collapse collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li><a href="#services" class="nav-link">Service</a></li>
                    <li><a href="#store" class="nav-link">Store</a></li>
                    <!-- Jika clients hidden set style="display:none" -->
                    <li style="display:block"><a href="#clients" class="nav-link">Clients</a></li>

                    <!-- Profil dropdown (sesuaikan link) -->
                    <li class="nav-item dropdown notification-list" style="display:block">
                        <a class="nav-link dropdown-toggle arrow-none btn btn-login-bordered navbar-btn" data-toggle="dropdown" href="#">Profil</a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-lg">
                            <div class="dropdown-item noti-title cursor"><small><a href="#">Profil</a></small></div>
                            <div class="dropdown-item noti-title cursor"><small><a href="#">Artikel</a></small></div>
                            <div class="dropdown-item noti-title cursor"><small><a href="#">Pasen</a></small></div>
                            <div class="dropdown-item noti-title cursor"><small><a href="#">Posyandu</a></small></div>
                            <div class="dropdown-item noti-title cursor"><small><a href="#">Transaksi</a></small></div>
                        </div>
                    </li>

                    <!-- Login / Register button -->
                    <li style="display:block">
                        <a href="login.html" class="btn btn-login-bordered navbar-btn">Login | Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- =========================
         FLOATING BUTTONS (GANTI data-badge DENGAN JUMLAH NYA)
         ========================= -->
    <div class="button-float" style="margin-top: 175px;">
        <ul>
            <li><button class="btn btn-sm btn-floating badge bg-btn-love" data-badge="✓" onclick="location.href='user/my_wallet'"><i class="fa fa-money"></i></button></li>
            <li><button class="btn btn-sm btn-floating badge bg-btn-success" data-badge="2" onclick="location.href='user/my_transaksi'"><i class="fa fa-shopping-basket"></i></button></li>
            <li><button class="btn btn-sm btn-floating badge bg-btn-love" data-badge="1" onclick="location.href='user/my_jobs'"><i class="fa fa-calendar-plus-o"></i></button></li>
        </ul>
    </div>
