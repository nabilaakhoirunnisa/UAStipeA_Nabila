<h1 class="h3 mb-4 text-gray-800">Sales Order</h1>

<div class="card shadow mb-4">

    <div class="card-header py-3 d-flex justify-content-between align-items-center">

        <h6 class="m-0 font-weight-bold text-primary">
            Data Sales Order
        </h6>

        <?php if($this->session->userdata('role') == 'sales') : ?>

            <a href="<?= base_url('sales_order/tambah'); ?>"
               class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i>
                Buat Sales Order
            </a>

        <?php endif; ?>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered" id="dataTable">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    $no = 1;
                    foreach($order as $o):
                    ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $o->tanggal; ?></td>

                        <td><?= $o->nama_pelanggan; ?></td>

                        <td>
                            Rp <?= number_format($o->total_harga,0,',','.'); ?>
                        </td>

                        <td>
                            <span class="badge badge-info">
                                <?= ucfirst($o->status); ?>
                            </span>
                        </td>

                        <td>

                            <a href="<?= base_url('sales_order/detail/'.$o->id_order); ?>"
                               class="btn btn-success btn-sm">
                                Detail
                            </a>

                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>