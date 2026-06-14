<h1 class="h3 mb-4 text-gray-800">Edit Pelanggan</h1>

<div class="row">

    <!-- FORM EDIT -->
    <div class="col-xl-6 mb-4">
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Pelanggan</h6>
            </div>
            <div class="card-body">
                <form method="post">

                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input type="text"
                               name="nama_pelanggan"
                               class="form-control"
                               value="<?= $pelanggan->nama_pelanggan; ?>"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat"
                                  class="form-control"
                                  rows="3"
                                  required><?= $pelanggan->alamat; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="text"
                               name="telepon"
                               class="form-control"
                               value="<?= $pelanggan->telepon; ?>"
                               required>
                    </div>

                    <button type="submit" class="btn btn-warning">Update</button>
                    <a href="<?= base_url('pelanggan'); ?>" class="btn btn-secondary">Kembali</a>

                </form>
            </div>
        </div>
    </div>

    <!-- RINGKASAN & RIWAYAT ORDER -->
    <div class="col-xl-6 mb-4">

        <!-- Ringkasan -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Ringkasan Pembelian</h6>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-6">
                        <p class="text-xs text-uppercase text-muted mb-1">Jumlah Order</p>
                        <p class="h4 font-weight-bold"><?= count($riwayat_order) ?></p>
                    </div>
                    <div class="col-6">
                        <p class="text-xs text-uppercase text-muted mb-1">Total Pembelian</p>
                        <p class="h5 font-weight-bold">Rp <?= number_format($total_pembelian, 0, ',', '.') ?></p>
                        <small class="text-muted">Diluar order dibatalkan</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Riwayat Order -->
        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Riwayat Order</h6>
            </div>
            <div class="card-body p-0">
                <?php if($riwayat_order): ?>
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>No Order</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($riwayat_order as $o): ?>
                        <tr>
                            <td>#SO-<?= str_pad($o->id_order, 4, '0', STR_PAD_LEFT) ?></td>
                            <td><?= date('d M Y', strtotime($o->tanggal)) ?></td>
                            <td>Rp <?= number_format($o->total_harga, 0, ',', '.') ?></td>
                            <td>
                                <?php
                                $badge = [
                                    'draft'      => 'secondary',
                                    'dikirim'    => 'primary',
                                    'selesai'    => 'success',
                                    'dibatalkan' => 'danger',
                                    'diproses'   => 'warning',
                                ];
                                $b = $badge[$o->status] ?? 'secondary';
                                ?>
                                <span class="badge badge-<?= $b ?>">
                                    <?= ucfirst($o->status) ?>
                                </span>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <div class="p-3 text-center text-muted">
                    Pelanggan ini belum memiliki order
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>