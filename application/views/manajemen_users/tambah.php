<h1 class="h3 mb-4 text-gray-800">Tambah User</h1>

<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Form Tambah User
        </h6>
    </div>

    <div class="card-body">

        <form method="post">

            <div class="form-group">
                <label>Nama</label>
                <input type="text"
                       name="nama"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text"
                       name="username"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="text"
                       name="password"
                       class="form-control"
                       required>
            </div>

            <div class="form-group">
                <label>Role</label>

                <select name="role" class="form-control" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="sales">Sales</option>
                    <option value="manager">Manager</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Simpan
            </button>

            <a href="<?= base_url('manajemen_users'); ?>"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>