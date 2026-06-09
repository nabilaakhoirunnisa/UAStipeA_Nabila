<h1 class="h3 mb-4 text-gray-800">Manajemen User</h1>

<?php if($this->session->flashdata('success')) : ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('success'); ?>
    </div>
<?php endif; ?>

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            Data User
        </h6>

        <a href="<?= base_url('manajemen_users/tambah'); ?>"
           class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah User
        </a>
    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 1;
                    foreach($users as $u):
                    ?>

                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u->nama; ?></td>
                        <td><?= $u->username; ?></td>
                        <td>
                            <span class="badge badge-info">
                                <?= ucfirst($u->role); ?>
                            </span>
                        </td>

                        <td>

                            <a href="<?= base_url('manajemen_users/edit/'.$u->id); ?>"
                               class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <a href="<?= base_url('manajemen_users/hapus/'.$u->id); ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus user ini?')">
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