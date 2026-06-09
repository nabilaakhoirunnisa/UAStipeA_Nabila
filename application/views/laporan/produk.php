<h1 class="h3 mb-4 text-gray-800">
    Laporan per Produk
</h1>

<div class="card shadow">

    <div class="card-body">

        <table class="table table-bordered">
<a href="<?= base_url('laporan/cetak_produk'); ?>"
   target="_blank"
   class="btn btn-danger mb-3">

    Cetak PDF

</a>
            <thead>

                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Total Qty</th>
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

                    <td><?= $l->nama_produk; ?></td>

                    <td><?= $l->total_qty; ?></td>

                    <td>
                        Rp <?= number_format($l->total_penjualan,0,',','.'); ?>
                    </td>

                </tr>

                <?php endforeach; ?>

            </tbody>

        </table>

    </div>

</div>