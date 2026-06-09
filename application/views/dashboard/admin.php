<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<p class="page-sub">Administrator &nbsp;/&nbsp; PT Maju Jaya</p>
<h1 class="page-title mb-4">Dashboard</h1>

<?php
$total_penjualan = $this->db
    ->select_sum('total_harga')
    ->get('sales_order')
    ->row()
    ->total_harga;
?>

<!-- STAT CARD -->
<div class="row mb-4">

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card h-100">
            <div class="stat-icon">
                <i class="fas fa-box-open"></i>
            </div>
            <p class="stat-label">Total Produk</p>
            <p class="stat-number"><?= $total_produk ?></p>
            <p class="stat-sub">Produk tersedia</p>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card h-100">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <p class="stat-label">Total Pelanggan</p>
            <p class="stat-number"><?= $total_pelanggan ?></p>
            <p class="stat-sub">Pelanggan terdaftar</p>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card h-100">
            <div class="stat-icon">
                <i class="fas fa-file-invoice"></i>
            </div>
            <p class="stat-label">Total Sales Order</p>
            <p class="stat-number"><?= $total_order ?></p>
            <p class="stat-sub">Order yang tercatat</p>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-3">
        <div class="card stat-card h-100">
            <div class="stat-icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>
            <p class="stat-label">Total Penjualan</p>
            <p class="stat-number">
                Rp <?= number_format($total_penjualan,0,',','.') ?>
            </p>
            <p class="stat-sub">Akumulasi transaksi</p>
        </div>
    </div>

</div>

<div class="row">

    <!-- ORDER TERBARU -->
    <div class="col-xl-8 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Sales Order Terbaru</span>

                <a href="<?= site_url('sales_order') ?>"
                   style="font-size:12px;text-decoration:none">
                    Lihat Semua →
                </a>
            </div>

            <div class="card-body p-0">

                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>No Order</th>
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
                        ->select('so.id_order,p.nama_pelanggan,u.nama as nama_sales,so.tanggal,so.total_harga,so.status')
                        ->from('sales_order so')
                        ->join('pelanggan p','p.id_pelanggan=so.id_pelanggan','left')
                        ->join('users u','u.id=so.id_sales','left')
                        ->order_by('so.id_order','DESC')
                        ->limit(7)
                        ->get()
                        ->result();

                    if($orders):
                        foreach($orders as $o):
                    ?>

                        <tr>
                            <td>
                                #SO-<?= str_pad($o->id_order,4,'0',STR_PAD_LEFT) ?>
                            </td>

                            <td><?= $o->nama_pelanggan ?></td>

                            <td><?= $o->nama_sales ?></td>

                            <td>
                                <?= date('d M Y',strtotime($o->tanggal)) ?>
                            </td>

                            <td>
                                Rp <?= number_format($o->total_harga,0,',','.') ?>
                            </td>

                            <td>
                                <?= ucfirst($o->status) ?>
                            </td>
                        </tr>

                    <?php
                        endforeach;
                    else:
                    ?>

                        <tr>
                            <td colspan="6" class="text-center">
                                Belum ada data sales order
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>
        </div>
    </div>

    <!-- SIDEBAR KANAN -->
    <div class="col-xl-4">

        <div class="card mb-3">

            <div class="card-header">
                Ringkasan Status Order
            </div>

            <div class="card-body">

                <?php

                $statuses = [
                    'draft'      => 'Draft',
                    'diproses'   => 'Diproses',
                    'dikirim'    => 'Dikirim',
                    'selesai'    => 'Selesai',
                    'dibatalkan' => 'Dibatalkan'
                ];

                foreach($statuses as $key => $label):

                    $jumlah = $this->db
                        ->where('status',$key)
                        ->count_all_results('sales_order');
                ?>

                <div class="d-flex justify-content-between mb-2">
                    <span><?= $label ?></span>
                    <strong><?= $jumlah ?></strong>
                </div>

                <?php endforeach; ?>

            </div>
        </div>

        <div class="card">

            <div class="card-header">
                Informasi Sistem
            </div>

            <div class="card-body">

                <p>
                    <strong>Nama Sistem</strong><br>
                    Sales Order System
                </p>

                <p>
                    <strong>Perusahaan</strong><br>
                    PT Maju Jaya
                </p>

                <p>
                    <strong>Total Produk</strong><br>
                    <?= $total_produk ?>
                </p>

                <p>
                    <strong>Total Pelanggan</strong><br>
                    <?= $total_pelanggan ?>
                </p>

                <p>
                    <strong>Total Order</strong><br>
                    <?= $total_order ?>
                </p>

            </div>

        </div>

    </div>

</div>