<h1 class="h3 mb-4 text-gray-800">Tambah Sales Order</h1>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Pilih Pelanggan
        </h6>
    </div>

    <div class="card-body">

        <form method="post">

            <div class="form-group">

                <label>Pelanggan</label>

                <select name="id_pelanggan"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih Pelanggan --
                    </option>

                    <?php foreach($pelanggan as $p): ?>

                        <option value="<?= $p->id_pelanggan; ?>">
                            <?= $p->nama_pelanggan; ?>
                        </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <button type="submit"
                    class="btn btn-primary">
                Lanjut
            </button>

            <a href="<?= base_url('sales_order'); ?>"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>