<h1 class="h3 mb-4 text-gray-800">
    Laporan per Produk
</h1>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
        Filter Periode
    </h6>
</div>

<div class="card-body">
    <form method="get">
        <div class="row">
            <div class="col-md-4">
                <label>Tanggal Awal</label>
                <input type="date"
                       name="tanggal_awal"
                       value="<?= $this->input->get('tanggal_awal'); ?>"
                       class="form-control">
            </div>

            <div class="col-md-4">
                <label>Tanggal Akhir</label>
                <input type="date"
                       name="tanggal_akhir"
                       value="<?= $this->input->get('tanggal_akhir'); ?>"
                       class="form-control">
            </div>

            <div class="col-md-4">
                <label>&nbsp;</label>
                <br>
                <button type="submit"
                        class="btn btn-primary">
                    Tampilkan
                </button>
                <a href="<?= base_url('laporan/cetak_produk'); ?>"
                   target="_blank"
                   class="btn btn-danger">
                    Cetak PDF
                </a>
            </div>
        </div>
    </form>
</div>
</div>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
        Data Penjualan Produk
    </h6>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered">
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
                $no = 1;
                $grand_total = 0;
                foreach($laporan as $l):
                $grand_total += $l->total_penjualan;
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

            <tfoot>
                <tr>
                    <th colspan="3" class="text-right">
                        Total Penjualan
                    </th>
                    <th>
                        Rp <?= number_format($grand_total,0,',','.'); ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
</div>
    </div>
</div>