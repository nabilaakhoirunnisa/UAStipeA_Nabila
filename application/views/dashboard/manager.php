<h1 class="h3 mb-4 text-gray-800">
    Dashboard Manager
</h1>

<div class="row">

```
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <h6 class="font-weight-bold text-primary">
                Total Sales Order
            </h6>
            <h3><?= $total_order; ?></h3>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <h6 class="font-weight-bold text-success">
                Total Produk
            </h6>
            <h3><?= $total_produk; ?></h3>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <h6 class="font-weight-bold text-warning">
                Total Pelanggan
            </h6>
            <h3><?= $total_pelanggan; ?></h3>
        </div>
    </div>
</div>

<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <h6 class="font-weight-bold text-info">
                Total User
            </h6>
            <h3><?= $total_user; ?></h3>
        </div>
    </div>
</div>
```

</div>

<div class="card shadow mb-4">

```
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">
        Ringkasan Manager
    </h6>
</div>

<div class="card-body">

    <p>
        Selamat datang
        <strong><?= $this->session->userdata('username'); ?></strong>.
    </p>

    <p>
        Dashboard Manager digunakan untuk memantau aktivitas penjualan,
        jumlah pelanggan, produk yang tersedia, serta laporan transaksi
        yang dilakukan oleh Sales.
    </p>

    <p>
        Gunakan menu Laporan Penjualan untuk melihat performa transaksi
        dan perkembangan penjualan secara keseluruhan.
    </p>

    <a href="<?= base_url('sales_order'); ?>"
       class="btn btn-primary">
        Lihat Data Penjualan
    </a>

</div>
```

</div>