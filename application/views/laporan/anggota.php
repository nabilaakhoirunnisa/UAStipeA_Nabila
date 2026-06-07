<!-- application/views/laporan/anggota.php -->

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Laporan Anggota</h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">

            <form action="<?= base_url('laporan/anggota') ?>" method="GET" class="form-inline">

                <input 
                    type="text" 
                    name="keyword" 
                    class="form-control mr-2"
                    placeholder="Cari nama anggota..."
                    value="<?= $keyword; ?>"
                >

                <button type="submit" class="btn btn-primary">
                    Cari
                </button>

            </form>

            <a href="<?= base_url('laporan/cetak_anggota') ?>" 
               target="_blank"
               class="btn btn-success">

                <i class="fas fa-print"></i> Cetak

            </a>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="thead-dark">

                        <tr>
                            <th>No</th>
                            <th>No Anggota</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Email</th>
                            <th>Tanggal Daftar</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php if(empty($anggota)) : ?>

                            <tr>
                                <td colspan="8" class="text-center">
                                    Data anggota tidak ditemukan
                                </td>
                            </tr>

                        <?php endif; ?>

                        <?php 
                        $no = 1;
                        foreach($anggota as $a) :
                        ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $a->nomor_anggota; ?></td>
                            <td><?= $a->nama; ?></td>
                            <td><?= $a->alamat; ?></td>
                            <td><?= $a->telepon; ?></td>
                            <td><?= $a->email; ?></td>
                            <td><?= $a->tanggal_daftar; ?></td>
                            <td><?= $a->status; ?></td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>