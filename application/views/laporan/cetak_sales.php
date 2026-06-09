<!DOCTYPE html>
<html>
<head>
    <title>Laporan Sales</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            font-size:12px;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table, th, td{
            border:1px solid #000;
        }

        th, td{
            padding:8px;
        }

        h2,h3{
            text-align:center;
            margin:0;
        }
    </style>
</head>
<body>

<h2>PT MAJU JAYA</h2>
<h3>LAPORAN PENJUALAN PER SALES</h3>

<hr>

<table>

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Sales</th>
            <th>Jumlah Order</th>
            <th>Total Penjualan</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $no=1;
        foreach($laporan as $l):
        ?>

        <tr>

            <td><?= $no++; ?></td>

            <td><?= $l->nama; ?></td>

            <td><?= $l->jumlah_order; ?></td>

            <td>
                Rp <?= number_format($l->total_penjualan,0,',','.'); ?>
            </td>

        </tr>

        <?php endforeach; ?>

    </tbody>

</table>

<script>
window.print();
</script>

</body>
</html>