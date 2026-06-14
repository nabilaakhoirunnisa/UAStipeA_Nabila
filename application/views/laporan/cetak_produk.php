<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan per Produk</title>
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
<h3>LAPORAN PENJUALAN PER PRODUK</h3>
<p class="sub">Dicetak pada: <?= date('d F Y, H:i') ?> WIB</p>

<hr>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Total Qty Terjual</th>
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
            <td><?= $l->nama_produk; ?></td>
            <td><?= number_format($l->total_qty, 0, ',', '.') ?></td>
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