<div class="container">
    <div class="container-fluid mt-5">
        <!-- form info -->
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="card">
                    <div class="bg-primary text-white card-header">
                        <span>Jumlah Motor</span>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center"><?= $motor ?> unit</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="bg-primary card-header text-white">
                        <span>Jumlah Mobil</span>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center"><?= $mobil ?> unit</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- end form info -->

        <hr>

        <!-- form input data kendaraan parkir -->
        <div class="row">
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('ok')) { ?>

                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Berhasil</strong> <?= $this->session->flashdata('ok') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php  } ?>
                <div class="card">
                    <div class="card-header bg-primary text-white w-20">
                        <span>Daftar Parkir Kendaraan</span>
                    </div>
                    <div class="card-body">
                        <form method="post" action="<?= base_url('Home/input') ?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">No Ticket</label>
                                        <input type="hidden" name="ticket" value="<?= $ticket ?>">
                                        <input type="text" value="<?= $no_ticket ?>" readonly name="no_ticket" class="form-control" id="no_ticket">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Jenis</label>
                                        <select name="jenis" id="jenis" class="form-control">
                                            <option value="Mobil">Mobil</option>
                                            <option value="Motor">Motor</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">No Polisi</label>
                                        <input type="text" value="<?= set_value('no_polisi') ?>" class="form-control" name="no_polisi" id="no_polisi">
                                        <span class="text-danger small"><?= form_error('no_polisi') ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Tarif / Jam</label>
                                        <input type="text" class="form-control" name="tarif" id="tarif">
                                        <span class="text-danger small"><?= form_error('tarif') ?></span>
                                    </div>
                                </div>
                                <div class="form-group ml-3">
                                    <button class="btn btn-danger" style="width: 15rem;">Daftar</button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- end of kendaraan parkir -->

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
                        <span>Daftar Parkir Kendaraan</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No Ticket</th>
                                        <th>No Polisi</th>
                                        <th>Tanggal & Jam Masuk</th>
                                        <th>Pay</th>
                                        <th>Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($kendaraan as $p) : ?>
                                        <tr>
                                            <td><?= $p->no_ticket ?></td>
                                            <td><?= $p->no_polisi ?></td>
                                            <td><?= $p->tanggal_masuk . " / " . $p->jam_masuk ?></td>
                                            <td><?php
                                                $masuk   = strtotime($p->tanggal_masuk . " " . $p->jam_masuk);
                                                $keluar  = strtotime(date('y-m-d H:i:s'));
                                                $diff   = $keluar  - $masuk;
                                                $jam   = floor($diff / (60 * 60));
                                                $bayar =  $jam * (int) $p->bayar;
                                                if ($jam <= 1) {
                                                    $bayar =  $p->bayar;
                                                } else {
                                                    $bayar =  $jam * (int) $p->bayar;
                                                }
                                                //echo $jam;
                                                echo number_format($bayar, 0);
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('Home/keluar/' . $p->no_ticket) ?>" class="btn btn-danger btn-sm">Keluar</a>
                                            </td>
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
            "pageLength": 5,
            "ordering": true,
            "info": true
        });
    })
</script>