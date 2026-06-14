<h1 class="h3 mb-4 text-gray-800">Laporan per Produk</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Penjualan per Produk</h6>
        <a href="<?= base_url('laporan/cetak_produk'); ?>"
           target="_blank"
           class="btn btn-danger btn-sm">
            <i class="fas fa-print"></i> Cetak PDF
        </a>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
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
        </div>
    </div>
</div>