<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Tambah anggota</h2>

<div class="card shadow">
<div class="card-body">

<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>

<form method="post" action="<?= site_url('anggota/simpan'); ?>">

<div class="form-group">
    <label>Nomor Anggota</label>
    <input type="text" name="nomor_anggota" class="form-control" required>
</div>

<div class="form-group">
    <label>Nama anggota</label>
    <input type="text" name="nama" class="form-control" required>
</div>

<div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" required>
</div>

<div class="form-group">
    <label>Telepon</label>
    <input type="text" name="telepon" class="form-control" required>
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" required>
</div>

<div class="form-group">
    <label>Tanggal Daftar</label>
    <input type="date" name="tanggal_daftar" class="form-control" required>
</div>
<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control" required>
        <option value="">-- Pilih Status --</option>
        <option value="Aktif">Aktif</option>
        <option value="Nonaktif">Nonaktif</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= site_url('anggota');?>" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>
</div>