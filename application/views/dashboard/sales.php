<h1 class="h3 mb-4 text-gray-800">
    Dashboard Sales
</h1>

<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <h6 class="font-weight-bold text-primary">
                    Order Saya
                </h6>
                <h3><?= $order_saya; ?></h3>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <h6 class="font-weight-bold text-warning">
                    Draft
                </h6>
                <h3><?= $draft; ?></h3>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <h6 class="font-weight-bold text-info">
                    Dikirim
                </h6>
                <h3><?= $dikirim; ?></h3>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <h6 class="font-weight-bold text-success">
                    Selesai
                </h6>
                <h3><?= $selesai; ?></h3>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <h6 class="font-weight-bold text-primary">
                    Total Produk
                </h6>
                <h3><?= $total_produk; ?></h3>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <h6 class="font-weight-bold text-success">
                    Total Pelanggan
                </h6>
                <h3><?= $total_pelanggan; ?></h3>
            </div>
        </div>
    </div>

</div>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Informasi Sales
        </h6>
    </div>

    <div class="card-body">

        <p>
            Selamat datang
            <strong><?= $this->session->userdata('username'); ?></strong>.
        </p>

        <p>
            Anda dapat membuat Sales Order baru, melihat status order,
            serta memantau transaksi pelanggan melalui menu Sales Order.
        </p>

        <a href="<?= base_url('sales_order'); ?>"
           class="btn btn-primary">
            Kelola Sales Order
        </a>

    </div>

</div>