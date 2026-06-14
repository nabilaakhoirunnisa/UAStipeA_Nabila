<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<p class="page-sub">Administrator &nbsp;/&nbsp; PT Maju Jaya</p>
<h1 class="page-title mb-4">Dashboard</h1>

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
            <p class="stat-number" style="font-size:22px;padding-top:8px;">
                Rp <?= number_format($total_penjualan_selesai,0,',','.') ?>
            </p>
            <p class="stat-sub">Order selesai</p>
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
                            <td>#SO-<?= str_pad($o->id_order,4,'0',STR_PAD_LEFT) ?></td>
                            <td><?= $o->nama_pelanggan ?></td>
                            <td><?= $o->nama_sales ?></td>
                            <td><?= date('d M Y',strtotime($o->tanggal)) ?></td>
                            <td>Rp <?= number_format($o->total_harga,0,',','.') ?></td>
                            <td><?= ucfirst($o->status) ?></td>
                        </tr>
                    <?php
                        endforeach;
                    else:
                    ?>
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data sales order</td>
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
            <div class="card-header">Ringkasan Status Order</div>
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
                    $jumlah = $this->db->where('status',$key)->count_all_results('sales_order');
                ?>
                <div class="d-flex justify-content-between mb-2">
                    <span><?= $label ?></span>
                    <strong><?= $jumlah ?></strong>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

</div>

<!-- GRAFIK PENJUALAN -->
<div class="row mt-2">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Grafik Penjualan 7 Hari Terakhir</span>
                <span style="font-size:11px;color:rgba(13,13,13,0.35)">Tidak termasuk order dibatalkan</span>
            </div>
            <div class="card-body" style="padding:20px 24px;">
                <canvas id="grafikPenjualan" height="80"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
// Tunggu sampai semua script (termasuk Chart.js di footer) selesai diload
window.addEventListener('load', function(){
    var labels = <?= $grafik_labels ?>;
    var values = <?= $grafik_data ?>;

    var ctx = document.getElementById('grafikPenjualan').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Total Penjualan (Rp)',
                data: values,
                backgroundColor: 'rgba(13,13,13,0.08)',
                borderColor: 'rgba(13,13,13,0.55)',
                borderWidth: 1.5,
                hoverBackgroundColor: 'rgba(13,13,13,0.18)'
            }]
        },
        options: {
            responsive: true,
            legend: { display: false },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function(v){
                            if(v === 0) return 'Rp 0';
                            return 'Rp ' + v.toLocaleString('id-ID');
                        },
                        fontColor: 'rgba(13,13,13,0.40)',
                        fontSize: 11
                    },
                    gridLines: {
                        color: 'rgba(13,13,13,0.06)',
                        zeroLineColor: 'rgba(13,13,13,0.15)'
                    }
                }],
                xAxes: [{
                    ticks: { fontColor: 'rgba(13,13,13,0.40)', fontSize: 11 },
                    gridLines: { display: false }
                }]
            },
            tooltips: {
                callbacks: {
                    label: function(item){
                        return 'Rp ' + parseInt(item.yLabel).toLocaleString('id-ID');
                    }
                },
                backgroundColor: '#0d0d0d',
                titleFontSize: 11,
                bodyFontSize: 12
            }
        }
    });
});
</script>