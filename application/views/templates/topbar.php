<nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">

    <!-- Sidebar Toggle -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars" style="color:#555"></i>
    </button>

    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- User Dropdown -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline small" style="font-size:12px;color:#555;letter-spacing:.04em">
                    <?= $this->session->userdata('username') ?>
                    &nbsp;<span style="font-size:10px;color:#aaa;letter-spacing:.1em;text-transform:uppercase">
                        <?= $this->session->userdata('role') ?>
                    </span>
                </span>
                <img class="img-profile rounded-circle"
                     src="<?= base_url('assets/img/undraw_profile_2.svg') ?>" width="36">
            </a>

            <div class="dropdown-menu dropdown-menu-right shadow-sm animated--grow-in"
                 aria-labelledby="userDropdown"
                 style="border:1px solid rgba(13,13,13,0.10);border-radius:0;min-width:180px">
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