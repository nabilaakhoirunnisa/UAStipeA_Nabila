<h1 class="h3 mb-4 text-gray-800">Tambah Produk</h1>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Tambah Produk
        </h6>
    </div>

    <div class="card-body">

        <form action="" method="post">

            <div class="form-group">
                <label>Kode Produk</label>
                <input type="text"
                       name="kode_produk"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Nama Produk</label>
                <input type="text"
                       name="nama_produk"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Harga</label>
                <input type="number"
                       name="harga"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Stok</label>
                <input type="number"
                       name="stok"
                       class="form-control"
                       required>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="<?= base_url('produk'); ?>"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>