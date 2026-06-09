<h1 class="h3 mb-4 text-gray-800">Data Produk</h1>

<?php if($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Produk</h6>

        <a href="<?= base_url('produk/tambah'); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 1;
                    foreach($produk as $p) :
                    ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $p->kode_produk; ?></td>
                        <td><?= $p->nama_produk; ?></td>
                        <td>Rp <?= number_format($p->harga, 0, ',', '.'); ?></td>
                        <td><?= $p->stok; ?></td>

                        <td>

                            <a href="<?= base_url('produk/edit/'.$p->id_produk); ?>"
                                class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <a href="<?= base_url('produk/hapus/'.$p->id_produk); ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </a>

                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>