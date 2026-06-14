<h1 class="h3 mb-4 text-gray-800">Laporan per Sales</h1>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Filter Periode</h6>
    </div>
    <div class="card-body">
        <form method="get">
            <div class="row">
                <div class="col-md-4">
                    <label>Tanggal Awal</label>
                    <input type="date"
                           name="tanggal_awal"
                           value="<?= $tanggal_awal; ?>"
                           class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Tanggal Akhir</label>
                    <input type="date"
                           name="tanggal_akhir"
                           value="<?= $tanggal_akhir; ?>"
                           class="form-control">
                </div>
                <div class="col-md-4">
                    <label>&nbsp;</label><br>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i> Tampilkan
                    </button>
                    <?php
                    $param_cetak = http_build_query([
                        'tanggal_awal'  => $tanggal_awal,
                        'tanggal_akhir' => $tanggal_akhir
                    ]);
                    ?>
                    <a href="<?= base_url('laporan/cetak_sales?'.$param_cetak); ?>"
                       target="_blank"
                       class="btn btn-danger">
                        <i class="fas fa-print"></i> Cetak PDF
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Data Penjualan per Sales
            <?php if(!empty($tanggal_awal) && !empty($tanggal_akhir)): ?>
                <small class="text-muted font-weight-normal">
                    — <?= date('d M Y', strtotime($tanggal_awal)) ?>
                    s/d <?= date('d M Y', strtotime($tanggal_akhir)) ?>
                </small>
            <?php endif; ?>
        </h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
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
        </div>
    </div>
</div>