<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan per Sales</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 8px; }
        th { background: #f0f0f0; }
        h2, h3, p.sub { text-align: center; margin: 0; }
        p.sub { font-size: 11px; color: #555; margin-bottom: 10px; }
        .text-right { text-align: right; }
        hr { margin: 10px 0; }
    </style>
</head>
<body>

<h2>PT MAJU JAYA</h2>
<h3>LAPORAN PENJUALAN PER SALES</h3>

<?php if(!empty($tanggal_awal) && !empty($tanggal_akhir)): ?>
    <p class="sub">
        Periode: <?= date('d F Y', strtotime($tanggal_awal)) ?>
        s/d <?= date('d F Y', strtotime($tanggal_akhir)) ?>
    </p>
<?php else: ?>
    <p class="sub">Periode: Semua</p>
<?php endif; ?>

<p class="sub">Dicetak pada: <?= date('d F Y, H:i') ?> WIB</p>

<hr>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Sales</th>
            <th>Jumlah Order Selesai</th>
            <th>Total Penjualan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $grand_total = 0;
        foreach($laporan as $l):
            $grand_total += $l->total_penjualan;
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $l->nama; ?></td>
            <td><?= $l->jumlah_order; ?></td>
            <td>Rp <?= number_format($l->total_penjualan, 0, ',', '.'); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3" class="text-right">Grand Total</th>
            <th>Rp <?= number_format($grand_total, 0, ',', '.'); ?></th>
        </tr>
    </tfoot>
</table>

<script>window.print();</script>
</body>
</html>