<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Page Title -->
<p class="page-sub">Administrator &nbsp;/&nbsp; PT Maju Jaya</p>
<h1 class="page-title mb-4">Dashboard</h1>

<!-- STAT CARDS -->
<div class="row mb-4">

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card h-100">
            <div class="stat-icon stat-icon-blue"><i class="fas fa-box-open"></i></div>
            <p class="stat-label">Total Produk</p>
            <p class="stat-number"><?= $total_produk ?></p>
            <p class="stat-sub">Katalog alat elektronik</p>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card h-100">
            <div class="stat-icon stat-icon-teal"><i class="fas fa-users"></i></div>
            <p class="stat-label">Total Pelanggan</p>
            <p class="stat-number"><?= $total_pelanggan ?></p>
            <p class="stat-sub">Pelanggan terdaftar</p>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card h-100">
            <div class="stat-icon stat-icon-amber"><i class="fas fa-file-invoice"></i></div>
            <p class="stat-label">Total Sales Order</p>
            <p class="stat-number"><?= $total_order ?></p>
            <p class="stat-sub">Semua order masuk</p>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card h-100">
            <div class="stat-icon stat-icon-purple"><i class="fas fa-user-shield"></i></div>
            <p class="stat-label">Total User</p>
            <p class="stat-number"><?= $total_user ?></p>
            <p class="stat-sub">Admin · Sales · Manager</p>
        </div>
    </div>

</div>

<!-- BOTTOM ROW -->
<div class="row">

    <!-- Order Terbaru -->
    <div class="col-xl-8 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Sales Order Terbaru</span>
                <a href="<?= site_url('sales_order') ?>"
                   style="font-size:10.5px;font-weight:600;color:#2563eb;text-decoration:none;letter-spacing:.04em">
                    Lihat Semua →
                </a>
            </div>
            <div class="card-body p-0">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>No. Order</th>
                            <th>Pelanggan</th>
                            <th>Sales</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $orders = $this->db
                        ->select('so.id_order, p.nama_pelanggan, u.nama as nama_sales, so.tanggal, so.total_harga, so.status')
                        ->from('sales_order so')
                        ->join('pelanggan p', 'p.id_pelanggan = so.id_pelanggan', 'left')
                        ->join('users u',     'u.id = so.id_sales', 'left')
                        ->order_by('so.id_order', 'DESC')
                        ->limit(7)
                        ->get()->result();

                    if ($orders):
                        foreach ($orders as $o):
                            $no   = '#SO-' . str_pad($o->id_order, 4, '0', STR_PAD_LEFT);
                            $pill = 'pill-' . ($o->status == 'dibatalkan' ? 'batal' : strtolower($o->status));
                    ?>
                    <tr>
                        <td style="font-weight:600;color:#1a3a6b;font-size:12px"><?= $no ?></td>
                        <td><?= $o->nama_pelanggan ?? '-' ?></td>
                        <td><?= $o->nama_sales ?? '-' ?></td>
                        <td style="font-size:11.5px;color:#8fa3c4"><?= date('d M Y', strtotime($o->tanggal)) ?></td>
                        <td style="font-weight:600;color:#1a3a6b;white-space:nowrap;font-size:13px">
                            Rp <?= number_format($o->total_harga, 0, ',', '.') ?>
                        </td>
                        <td><span class="pill <?= $pill ?>"><?= ucfirst($o->status) ?></span></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="6" class="text-center py-4"
                            style="font-size:12px;color:#8fa3c4;letter-spacing:.06em">
                            Belum ada sales order
                        </td>
                    </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Right Column -->
    <div class="col-xl-4 mb-4">

        <!-- Status Order -->
        <div class="card mb-3">
            <div class="card-header">Ringkasan Status Order</div>
            <div class="card-body">
                <?php
                $statuses  = ['draft' => 'Draft', 'dikirim' => 'Dikirim', 'selesai' => 'Selesai', 'dibatalkan' => 'Dibatalkan'];
                $total_all = max((int)$total_order, 1);
                foreach ($statuses as $key => $label):
                    $count = $this->db->where('status', $key)->count_all_results('sales_order');
                    $pct   = round($count / $total_all * 100);
                ?>
                <div class="status-bar-item">
                    <div class="status-bar-header">
                        <span><?= $label ?></span>
                        <strong><?= $count ?></strong>
                    </div>
                    <div class="status-bar-track">
                        <div class="status-bar-fill" style="width:<?= $pct ?>%"></div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Akses Cepat -->
        <div class="card">
            <div class="card-header">Akses Cepat</div>
            <div class="card-body pb-2">
                <a href="<?= site_url('produk/create') ?>" class="quick-btn">
                    <div class="quick-icon"><i class="fas fa-plus"></i></div>
                    <div class="quick-texts">
                        <span class="quick-title">Tambah Produk</span>
                        <p class="quick-desc">Input produk baru ke katalog</p>
                    </div>
                </a>
                <a href="<?= site_url('pelanggan/create') ?>" class="quick-btn">
                    <div class="quick-icon"><i class="fas fa-user-plus"></i></div>
                    <div class="quick-texts">
                        <span class="quick-title">Tambah Pelanggan</span>
                        <p class="quick-desc">Daftarkan pelanggan baru</p>
                    </div>
                </a>
                <a href="<?= site_url('sales_order/create') ?>" class="quick-btn">
                    <div class="quick-icon"><i class="fas fa-file-invoice"></i></div>
                    <div class="quick-texts">
                        <span class="quick-title">Buat Sales Order</span>
                        <p class="quick-desc">Catat pesanan pelanggan</p>
                    </div>
                </a>
                <a href="<?= site_url('laporan/penjualan') ?>" class="quick-btn">
                    <div class="quick-icon"><i class="fas fa-chart-bar"></i></div>
                    <div class="quick-texts">
                        <span class="quick-title">Lihat Laporan</span>
                        <p class="quick-desc">Ekspor laporan penjualan PDF</p>
                    </div>
                </a>
            </div>
        </div>

    </div>
</div>