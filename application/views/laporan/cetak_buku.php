<!-- application/views/laporan/cetak_buku.php -->

<!DOCTYPE html>
<html>
<head>

    <title>Cetak Laporan Buku</title>

    <style>

        body{
            font-family: Arial;
        }

        h2{
            text-align: center;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td{
            border: 1px solid black;
        }

        th, td{
            padding: 8px;
            text-align: center;
        }

    </style>

</head>

<body onload="window.print()">

    <h2>Laporan Data Buku</h2>

    <table>

        <tr>
            <th>No</th>
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Stok</th>
            <th>Lokasi Rak</th>
        </tr>

        <?php 
        $no = 1;
        foreach($buku as $b) :
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $b->kode_buku; ?></td>
            <td><?= $b->judul_buku; ?></td>
            <td><?= $b->penulis; ?></td>
            <td><?= $b->penerbit; ?></td>
            <td><?= $b->tahun; ?></td>
            <td><?= $b->stok; ?></td>
            <td><?= $b->lokasi_rak; ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</body>
</html>