<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Data anggota</h2>

<a href="<?=site_url('anggota/tambah'); ?>" class="btn btn-primary mb-3">
    <i class="fas fa-plus"></i> Tambah
</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

<thead class="thead-dark">
<tr>
    <th>No</th>
    <th>Nomor anggota</th>
    <th>Nama</th>
    <th>Telepon</th>
    <th>Email</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php $no=1; foreach($anggota as $a): ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $a->nomor_anggota; ?></td>
    <td><?= $a->nama; ?></td>
    <td><?= $a->telepon; ?></td>
    <td><?= $a->email; ?></td>
    <td><?= isset($a->status) ? $a->status : '-'; ?></td>

    <td>
        <a href="<?= site_url('anggota/edit/'.$a->nomor_anggota); ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="<?= site_url('anggota/hapus/'.$a->nomor_anggota); ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('yakin?')">Hapus</a>
    </td>
</tr>
<?php endforeach; ?>
</tbody>

</table>

</div>
</div>
</div>
</div>