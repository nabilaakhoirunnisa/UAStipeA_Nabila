<h1 class="h3 mb-4 text-gray-800">
    Dashboard Sales
</h1>

<div class="row">

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <h6 class="font-weight-bold text-primary">
                    Total Sales Order Saya
                </h6>
                <h3><?= $order_saya; ?></h3>
            </div>
        </div>
    </div>

    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <h6 class="font-weight-bold text-success">
                    Order Selesai
                </h6>
                <h3><?= $selesai; ?></h3>
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
            Selamat datang,
            <strong><?= $this->session->userdata('username'); ?></strong>.
        </p>

        <p>
            Anda dapat membuat Sales Order baru dan melihat Sales Order
            yang menjadi tanggung jawab Anda.
        </p>

        <a href="<?= base_url('sales_order/tambah'); ?>"
           class="btn btn-success">
            <i class="fas fa-plus"></i> Buat Sales Order
        </a>

        <a href="<?= base_url('sales_order'); ?>"
           class="btn btn-primary">
            <i class="fas fa-list"></i> Lihat Sales Order
        </a>

    </div>

</div>

<div class="card shadow">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Panduan Singkat
        </h6>
    </div>

    <div class="card-body">

        <ol>
            <li>Buat Sales Order baru.</li>
            <li>Pilih pelanggan.</li>
            <li>Tambahkan produk ke transaksi.</li>
            <li>Masukkan jumlah (qty).</li>
            <li>Simpan transaksi.</li>
            <li>Pantau status Sales Order.</li>
        </ol>

    </div>

</div>