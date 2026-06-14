<h1 class="h3 mb-4 text-gray-800">Sales Order</h1>

<?php if($this->session->flashdata('success')) : ?>
    <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Sales Order</h6>

        <?php if($this->session->userdata('role') == 'sales') : ?>
            <a href="<?= base_url('sales_order/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Buat Sales Order
            </a>
        <?php endif; ?>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Order</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <?php if($this->session->userdata('role') == 'admin'): ?>
                        <th>Sales</th>
                        <?php endif; ?>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach($order as $o): ?>
                    <?php
                    $badge = [
                        'draft'      => 'secondary',
                        'dikirim'    => 'primary',
                        'selesai'    => 'success',
                        'dibatalkan' => 'danger',
                    ];
                    $b = $badge[$o->status] ?? 'secondary';
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td>#SO-<?= str_pad($o->id_order, 4, '0', STR_PAD_LEFT) ?></td>
                        <td><?= date('d M Y', strtotime($o->tanggal)) ?></td>
                        <td><?= $o->nama_pelanggan; ?></td>
                        <?php if($this->session->userdata('role') == 'admin'): ?>
                        <td><?= $o->nama_sales; ?></td>
                        <?php endif; ?>
                        <td>Rp <?= number_format($o->total_harga,0,',','.'); ?></td>
                        <td>
                            <span class="badge badge-<?= $b ?>">
                                <?= ucfirst($o->status) ?>
                            </span>
                        </td>
                        <td>
                            <a href="<?= base_url('sales_order/detail/'.$o->id_order); ?>"
                               class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> Detail
                            </a>

                            <?php if($this->session->userdata('role') == 'admin'): ?>
                                <a href="<?= base_url('sales_order/hapus/'.$o->id_order); ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Yakin hapus order ini? Semua detail produk ikut terhapus.')">
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>