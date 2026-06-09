<h1 class="h3 mb-4 text-gray-800">Tambah Pelanggan</h1>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Tambah Pelanggan
        </h6>
    </div>

    <div class="card-body">

        <form method="post">

            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input type="text"
                       name="nama_pelanggan"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat"
                          class="form-control"
                          rows="3"
                          required></textarea>
            </div>

            <div class="form-group">
                <label>Telepon</label>
                <input type="text"
                       name="telepon"
                       class="form-control"
                       required>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="<?= base_url('pelanggan'); ?>"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>