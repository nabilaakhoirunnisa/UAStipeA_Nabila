<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Perpustakaan</div>
</a>
<hr class="sidebar-divider my-0">

<li class="nav-item active">
    <a class="nav-link" href="<?= site_url('dashboard') ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>

<hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('kategori'); ?>">
            <i class="fas fa-fw fa-folder"></i>
            <span>Kategori</span>
        </a>
    </li>

<hr class="sidebar-divider my-0">

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('anggota'); ?>">
        <i class="fas fa-fw fa-users"></i>
        <span>anggota</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('buku'); ?>">
        <i class="fas fa-fw fa-book"></i>
        <span>buku</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('peminjaman'); ?>">
        <i class="fas fa-fw fa-box"></i>
        <span>peminjaman</span>
    </a>
</li>

<hr class="sidebar-divider d-none d-md-block">
<li class="nav-item">
    <a class="nav-link" href="<?= site_url('laporan/peminjaman'); ?>">
        <i class="fas fa-fw fa-folder"></i>
        <span>Laporan Peminjaman</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('laporan/anggota'); ?>">
        <i class="fas fa-fw fa-folder"></i>
        <span>Laporan Anggota</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="<?= site_url('laporan/buku'); ?>">
        <i class="fas fa-fw fa-folder"></i>
        <span>Laporan Buku</span>
    </a>
</li>

</ul>
<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">