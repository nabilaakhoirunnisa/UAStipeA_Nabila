<!-- application/views/laporan/buku.php -->

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Laporan Buku</h1>

    <div class="card shadow mb-4">

        <div class="card-header py-3 d-flex justify-content-between align-items-center">

            <form action="<?= base_url('laporan/buku') ?>" method="GET" class="form-inline">

                <input 
                    type="text" 
                    name="keyword" 
                    class="form-control mr-2"
                    placeholder="Cari judul buku..."
                    value="<?= $keyword; ?>"
                >

                <button type="submit" class="btn btn-primary">
                    Cari
                </button>

            </form>

            <a href="<?= base_url('laporan/cetak_buku') ?>" 
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
                            <th>Kode Buku</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Lokasi Rak</th>
                        </tr>

                    </thead>

                    <tbody>

                        <?php if(empty($buku)) : ?>

                            <tr>
                                <td colspan="8" class="text-center">
                                    Data buku tidak ditemukan
                                </td>
                            </tr>

                        <?php endif; ?>

                        <?php 
                        $no = 1;
                        foreach($buku as $b) :
                        ?>

                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $b->kode_buku; ?></td>
                            <td><?= $b->judul_buku; ?></td>
                            <td><?= $b->penulis; ?></td>
                            <td><?= $b->penerbit; ?></td>
                            <td><?= $b->tahun; ?></td>
                            <td><?= $b->stok; ?></td>
                            <td><?= $b->lokasi_rak; ?></td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>