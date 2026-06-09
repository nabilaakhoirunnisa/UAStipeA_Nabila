<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('dashboard') ?>">
        <div class="sidebar-brand-text mx-3">
            PT Maju Jaya
            <small>Sales Order System</small>
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= site_url('dashboard') ?>">
            <i class="fas fa-fw fa-th-large"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Master Data</div>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('produk') ?>">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Produk</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('pelanggan') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Pelanggan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('manajemen_users') ?>">
            <i class="fas fa-fw fa-user-shield"></i>
            <span>Manajemen User</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Transaksi</div>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('sales_order') ?>">
            <i class="fas fa-fw fa-file-invoice"></i>
            <span>Sales Order</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Laporan</div>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('laporan/penjualan') ?>">
            <i class="fas fa-fw fa-chart-bar"></i>
            <span>Laporan Penjualan</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('laporan/produk') ?>">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Laporan per Produk</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('laporan/sales') ?>">
            <i class="fas fa-fw fa-user-chart"></i>
            <span>Laporan per Sales</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

</ul>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">