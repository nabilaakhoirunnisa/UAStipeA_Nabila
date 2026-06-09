<!DOCTYPE html>
<html>
<head>

    <title>Laporan Penjualan</title>

    <style>

        body{
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid #000;
        }

        th, td{
            padding:8px;
        }

        h2, h3{
            text-align:center;
            margin:0;
        }

        hr{
            margin-top:10px;
            margin-bottom:20px;
        }

    </style>

</head>
<body>

    <h2>PT MAJU JAYA</h2>
    <h3>LAPORAN PENJUALAN</h3>

    <hr>

    <?php if(
        $this->input->get('tanggal_awal')
        &&
        $this->input->get('tanggal_akhir')
    ): ?>

    <p>
        <strong>Periode :</strong>
        <?= $this->input->get('tanggal_awal'); ?>
        s/d
        <?= $this->input->get('tanggal_akhir'); ?>
    </p>

    <?php endif; ?>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Total Harga</th>
                <th>Status</th>
            </tr>

        </thead>

        <tbody>

            <?php
            $no = 1;
            $grand_total = 0;

            foreach($laporan as $l):

            $grand_total += $l->total_harga;
            ?>

            <tr>

                <td><?= $no++; ?></td>

                <td><?= $l->tanggal; ?></td>

                <td><?= $l->nama_pelanggan; ?></td>

                <td>
                    Rp <?= number_format($l->total_harga,0,',','.'); ?>
                </td>

                <td>
                    <?= ucfirst($l->status); ?>
                </td>

            </tr>

            <?php endforeach; ?>

        </tbody>

        <tfoot>

            <tr>

                <th colspan="3">
                    Total Penjualan
                </th>

                <th colspan="2">
                    Rp <?= number_format($grand_total,0,',','.'); ?>
                </th>

            </tr>

        </tfoot>

    </table>

    <br><br>

    <table style="width:100%; border:none;">
        <tr>
            <td style="border:none; text-align:right;">
                <br><br><br>
                Manager
                <br><br><br><br>
                ____________________
            </td>
        </tr>
    </table>

    <script>
        window.print();
    </script>

</body>
</html>