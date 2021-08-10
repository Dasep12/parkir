<div class="container">
    <div class="container-fluid mt-5">

        <hr>
        <!-- form input data kendaraan parkir -->
        <div class="row">
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('pulang')) { ?>

                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Berhasil</strong> <?= $this->session->flashdata('pulang') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  } ?>
                <div class="card">
                    <div class="card-header bg-primary text-white w-20">
                        <span>Histori Daftar Parkir Kendaraan</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No Ticket</th>
                                        <th>No Polisi</th>
                                        <th>Tanggal & Jam Masuk</th>
                                        <th>Tanggal & Jam Keluar</th>
                                        <th>Total (Jam)</th>
                                        <th>Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($histori as $p) : ?>
                                        <tr>
                                            <td><?= $p->no_ticket ?></td>
                                            <td><?= $p->no_polisi ?></td>
                                            <td><?= $p->tanggal_masuk . " / " . $p->jam_masuk ?></td>
                                            <td><?= $p->tanggal_keluar . " / " . $p->jam_keluar ?></td>
                                            <td><?php
                                                $masuk   = strtotime($p->tanggal_masuk . " " . $p->jam_masuk);
                                                $keluar  = strtotime($p->tanggal_keluar . " " . $p->jam_keluar);
                                                $diff   = $keluar  - $masuk;
                                                $jam   = floor($diff / (60 * 60));
                                                echo $jam . " Jam";
                                                //echo number_format($bayar, 0);
                                                ?>
                                            </td>
                                            <td><?= number_format($p->bayar, 0) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of kendaraan parkir -->
    </div>
</div>
</div>

<script>
    $(function() {
        $("#dataTable").DataTable({
            "ordering": true,
            "info": true
        });
    })
</script>