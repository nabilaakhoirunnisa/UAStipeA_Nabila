<h1 class="h3 mb-4 text-gray-800">Data Pelanggan</h1>

<?php if($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            Daftar Pelanggan
        </h6>

        <a href="<?= base_url('pelanggan/tambah'); ?>"
           class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Pelanggan
        </a>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 1;
                    foreach($pelanggan as $p):
                    ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $p->nama_pelanggan; ?></td>
                        <td><?= $p->alamat; ?></td>
                        <td><?= $p->telepon; ?></td>

                        <td>

                            <a href="<?= base_url('pelanggan/edit/'.$p->id_pelanggan); ?>"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <a href="<?= base_url('pelanggan/hapus/'.$p->id_pelanggan); ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
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