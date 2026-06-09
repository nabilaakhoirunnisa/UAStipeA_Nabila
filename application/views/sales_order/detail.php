<h1 class="h3 mb-4 text-gray-800">
    Detail Sales Order
</h1>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
        Informasi Order
    </h6>
</div>

<div class="card-body">

    <table class="table table-bordered">

        <tr>
            <th width="250">ID Order</th>
            <td><?= $order->id_order; ?></td>
        </tr>

        <tr>
            <th>Pelanggan</th>
            <td><?= $order->nama_pelanggan; ?></td>
        </tr>

        <tr>
            <th>Tanggal</th>
            <td><?= $order->tanggal; ?></td>
        </tr>

        <tr>
    <th>Status</th>

    <td>

        <form method="post"
              action="<?= base_url('sales_order/ubah_status/'.$order->id_order); ?>">

            <div class="row">

                <div class="col-md-6">

                    <select name="status"
                            class="form-control">

                        <option value="draft"
                            <?= ($order->status == 'draft') ? 'selected' : ''; ?>>
                            Draft
                        </option>

                        <option value="dikirim"
                            <?= ($order->status == 'dikirim') ? 'selected' : ''; ?>>
                            Dikirim
                        </option>

                        <option value="selesai"
                            <?= ($order->status == 'selesai') ? 'selected' : ''; ?>>
                            Selesai
                        </option>

                        <option value="dibatalkan"
                            <?= ($order->status == 'dibatalkan') ? 'selected' : ''; ?>>
                            Dibatalkan
                        </option>

                    </select>

                </div>

                <div class="col-md-3">

                    <button type="submit"
                            class="btn btn-success">

                        Update

                    </button>

                </div>

            </div>

        </form>

    </td>
</tr>

        <tr>
            <th>Total Harga</th>
            <td>

                <strong>
                    Rp <?= number_format($order->total_harga,0,',','.'); ?>
                </strong>

            </td>
        </tr>

    </table>

</div>

</div>

<div class="card shadow mb-4">
<div class="card-header py-3 d-flex justify-content-between">

    <h6 class="m-0 font-weight-bold text-primary">
        Detail Produk Order
    </h6>

<h6 class="m-0 font-weight-bold text-primary">
    Detail Produk Order
</h6>

</div>

<div class="card-body">

    <form method="post"
      action="<?= base_url('sales_order/tambah_produk/'.$order->id_order); ?>">

    <div class="row">

        <div class="col-md-5">
            <label>Produk</label>

            <select name="id_produk"
                    class="form-control"
                    required>

                <option value="">
                    -- Pilih Produk --
                </option>

                <?php foreach($produk as $p): ?>

                    <option value="<?= $p->id_produk; ?>">
                        <?= $p->nama_produk; ?>
                    </option>

                <?php endforeach; ?>

            </select>
        </div>

        <div class="col-md-3">
            <label>Qty</label>

            <input type="number"
                   name="qty"
                   min="1"
                   class="form-control"
                   required>
        </div>

        <div class="col-md-2">
            <label>&nbsp;</label>

            <button type="submit"
                    class="btn btn-primary btn-block">
                Tambah
            </button>
        </div>

    </div>

</form>

<hr>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>No</th>
            <th>Produk</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        <?php
        $no = 1;
        foreach($detail_produk as $d):
        ?>

        <tr>

            <td><?= $no++; ?></td>

            <td><?= $d->nama_produk; ?></td>

            <td>
                Rp <?= number_format($d->harga,0,',','.'); ?>
            </td>

            <td><?= $d->qty; ?></td>

            <td>
                Rp <?= number_format($d->subtotal,0,',','.'); ?>
            </td>

            <td>

                <a href="<?= base_url('sales_order/hapus_produk/'.$d->id_detail); ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Hapus produk?')">

                    Hapus

                </a>

            </td>

        </tr>

        <?php endforeach; ?>

    </tbody>

</table>

</div>

</div>

<a href="<?= base_url('sales_order'); ?>"
class="btn btn-secondary">
Kembali
</a>