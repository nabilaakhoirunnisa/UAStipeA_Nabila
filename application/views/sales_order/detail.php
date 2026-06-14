<h1 class="h3 mb-4 text-gray-800">Detail Sales Order</h1>

<?php if($this->session->flashdata('success')) : ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>
<?php if($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Order</h6>
        <span class="font-weight-bold text-muted">
            #SO-<?= str_pad($order->id_order, 4, '0', STR_PAD_LEFT) ?>
        </span>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="200">No Order</th>
                <td>#SO-<?= str_pad($order->id_order, 4, '0', STR_PAD_LEFT) ?></td>
            </tr>
            <tr>
                <th>Pelanggan</th>
                <td><?= $order->nama_pelanggan; ?></td>
            </tr>
            <tr>
                <th>Sales</th>
                <td><?= $order->nama_sales; ?></td>
            </tr>
            <tr>
                <th>Tanggal</th>
                <td><?= date('d M Y', strtotime($order->tanggal)) ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    <?php
                    $badge = [
                        'draft'      => 'secondary',
                        'dikirim'    => 'primary',
                        'selesai'    => 'success',
                        'dibatalkan' => 'danger',
                    ];
                    $b = $badge[$order->status] ?? 'secondary';
                    ?>
                    <span class="badge badge-<?= $b ?> p-2">
                        <?= ucfirst($order->status) ?>
                    </span>
                </td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td><strong>Rp <?= number_format($order->total_harga,0,',','.'); ?></strong></td>
            </tr>
        </table>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Produk</h6>
    </div>
    <div class="card-body">

        <?php if($this->session->userdata('role') == 'sales' && $order->status == 'draft'): ?>
        <form method="post" action="<?= base_url('sales_order/tambah_produk/'.$order->id_order); ?>">
            <div class="row align-items-end mb-3">
                <div class="col-md-5">
                    <label>Produk</label>
                    <select name="id_produk" class="form-control" required>
                        <option value="">-- Pilih Produk --</option>
                        <?php foreach($produk as $p): ?>
                            <option value="<?= $p->id_produk; ?>">
                                <?= $p->nama_produk; ?> — Rp <?= number_format($p->harga,0,',','.') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label>Qty</label>
                    <input type="number" name="qty" min="1" class="form-control" required>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-plus"></i> Tambah
                    </button>
                </div>
            </div>
        </form>
        <hr>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                    <?php if($this->session->userdata('role') == 'sales' && $order->status == 'draft'): ?>
                    <th>Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
            <?php if($detail_produk): ?>
                <?php $no = 1; foreach($detail_produk as $d): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d->nama_produk; ?></td>
                    <td>Rp <?= number_format($d->harga,0,',','.'); ?></td>
                    <td><?= $d->qty; ?></td>
                    <td>Rp <?= number_format($d->subtotal,0,',','.'); ?></td>
                    <?php if($this->session->userdata('role') == 'sales' && $order->status == 'draft'): ?>
                    <td>
                        <a href="<?= base_url('sales_order/hapus_produk/'.$d->id_detail); ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Hapus produk ini dari order?')">
                            <i class="fas fa-trash"></i> Hapus
                        </a>
                    </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="<?= ($this->session->userdata('role') == 'sales' && $order->status == 'draft') ? 6 : 5 ?>"
                        class="text-center text-muted">
                        Belum ada produk ditambahkan
                    </td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>

    </div>
</div>

<!-- TOMBOL AKSI -->
<div class="mb-4 d-flex" style="gap:8px;">

    <a href="<?= base_url('sales_order'); ?>" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <?php if($this->session->userdata('role') == 'sales' && $order->status == 'draft'): ?>
        <?php if($detail_produk): ?>
            <a href="<?= base_url('sales_order/kirim/'.$order->id_order); ?>"
               class="btn btn-primary"
               onclick="return confirm('Kirim order ini? Setelah dikirim tidak bisa diedit lagi.')">
                <i class="fas fa-paper-plane"></i> Kirim Order
            </a>
        <?php endif; ?>

        <a href="<?= base_url('sales_order/batalkan/'.$order->id_order); ?>"
           class="btn btn-danger"
           onclick="return confirm('Batalkan order ini?')">
            <i class="fas fa-times"></i> Batalkan
        </a>
    <?php endif; ?>

    <?php if($this->session->userdata('role') == 'admin'): ?>
    <?php if($order->status == 'dikirim'): ?>
        <a href="<?= base_url('sales_order/selesaikan/'.$order->id_order); ?>"
           class="btn btn-success"
           onclick="return confirm('Tandai order ini sebagai selesai?')">
            <i class="fas fa-check"></i> Selesaikan Order
        </a>
    <?php endif; ?>

    <?php if($order->status == 'draft'): ?>
        <a href="<?= base_url('sales_order/batalkan/'.$order->id_order); ?>"
           class="btn btn-danger"
           onclick="return confirm('Batalkan order ini?')">
            <i class="fas fa-times"></i> Batalkan
        </a>
    <?php endif; ?>
<?php endif; ?>

</div>