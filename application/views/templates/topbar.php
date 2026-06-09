<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">

    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars" style="color:#555"></i>
    </button>

    <ul class="navbar-nav ml-auto align-items-center">

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
               id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <div class="d-none d-lg-block mr-3 text-right">
                    <div style="font-size:13px;font-weight:500;color:#0d0d0d;line-height:1.2">
                        <?= $this->session->userdata('nama') ?>
                    </div>
                    <div style="font-size:9.5px;color:rgba(13,13,13,0.38);letter-spacing:.12em;text-transform:uppercase">
                        <?= $this->session->userdata('role') ?>
                    </div>
                </div>
                <img class="img-profile rounded-circle"
                     src="<?= base_url('assets/img/undraw_profile_2.svg') ?>" width="34" height="34">
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil Saya
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="<?= site_url('auth/logout') ?>"
                   style="color:#7a1a1a">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2" style="color:#7a1a1a;opacity:.7"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>
</nav>