<div class="container-fluid">
<h2 class="h3 mb-4 text-gray-800">Edit anggota</h2>

<div class="card shadow">
<div class="card-body">

<form method="post" action="<?= site_url('anggota/update/'.$anggota->nomor_anggota); ?>">

<input type="hidden" name="nomor_anggota" value="<?= $anggota->nomor_anggota; ?>">

<div class="form-group">
    <label>Nama anggota</label>
    <input type="text" name="nama" class="form-control" value="<?= $anggota->nama; ?>" required>
</div>

<div class="form-group">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control" value="<?= $anggota->alamat; ?>">
</div>

<div class="form-group">
    <label>Telepon</label>
    <input type="text" name="telepon" class="form-control" value="<?= $anggota->telepon; ?>">
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="<?= $anggota->email; ?>">
</div>

<div class="form-group">
    <label>Tanggal Daftar</label>
    <input type="date" name="tanggal_daftar" class="form-control" value="<?= $anggota->tanggal_daftar; ?>">
</div>
<div class="form-group">
    <label>Status</label>
    <select name="status" class="form-control">
        <option value="Aktif" <?= ($anggota->status == 'Aktif') ? 'selected' : '' ?>>Aktif</option>
        <option value="Nonaktif" <?= ($anggota->status == 'Nonaktif') ? 'selected' : '' ?>>Nonaktif</option>
    </select>
</div>
<button type="submit" class="btn btn-primary">Simpan</button>
<a href="<?= site_url('anggota');?>" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>
</div>