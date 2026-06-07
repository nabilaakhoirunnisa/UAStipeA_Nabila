<!-- application/views/laporan/cetak_anggota.php -->

<!DOCTYPE html>
<html>
<head>

    <title>Cetak Laporan Anggota</title>

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

    <h2>Laporan Data Anggota</h2>

    <table>

        <tr>
            <th>No</th>
            <th>No Anggota</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Tanggal Daftar</th>
            <th>Status</th>
        </tr>

        <?php 
        $no = 1;
        foreach($anggota as $a) :
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $a->nomor_anggota; ?></td>
            <td><?= $a->nama; ?></td>
            <td><?= $a->alamat; ?></td>
            <td><?= $a->telepon; ?></td>
            <td><?= $a->email; ?></td>
            <td><?= $a->tanggal_daftar; ?></td>
            <td><?= $a->status; ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</body>
</html>