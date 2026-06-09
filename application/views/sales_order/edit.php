<h1 class="h3 mb-4 text-gray-800">
    Detail Sales Order
</h1>

<div class="card shadow mb-4">

    <div class="card-body">

        <h5>
            Order #<?= $order->id_order; ?>
        </h5>

        <hr>

        <p>
            Pelanggan :
            <strong><?= $order->nama_pelanggan; ?></strong>
        </p>

        <p>
            Status :
            <strong><?= ucfirst($order->status); ?></strong>
        </p>

        <p>
            Total :
            <strong>
                Rp <?= number_format($order->total_harga,0,',','.'); ?>
            </strong>
        </p>

    </div>

</div>