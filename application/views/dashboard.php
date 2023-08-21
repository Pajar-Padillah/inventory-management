<div class="row">
    <?php if ($this->session->flashdata('sukses_login')) { ?>
        <script>
            swal.fire({
                title: "Success!",
                text: "Anda Berhasil Login!",
                icon: "success",
                timer: 1500
            });
        </script>
    <?php } ?>
    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data Barang</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barang; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-folder fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Barang Kondisi Baik</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barang_baik; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Barang Kondisi Rusak</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barang_rusak; ?></div>
                            </div>
                            <div class="col-auto">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Barang Keluar</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $getbarang_keluar; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-upload fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row">
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">Total Transaksi Barang Perbulan pada Tahun <?= date('Y'); ?></h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myAreaChart" width="669" height="320" class="chartjs-render-monitor" style="display: block; width: 669px; height: 320px;"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-white">Transaksi Barang</h6>
            </div>
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="myPieChart" width="302" height="245" class="chartjs-render-monitor" style="display: block; width: 302px; height: 245px;"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> Barang Masuk
                    </span>
                    <span class="mr-2">
                        <i class="fas fa-circle text-danger"></i> Barang Keluar
                    </span>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-primary py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">5 Perolehan Barang Terakhir</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 text-center table-striped table-sm">
                    <thead>
                        <tr>
                            <th>Tanggal Perolehan</th>
                            <th>Barang</th>
                            <th>Nilai Perolehan</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($getbarang as $b) :
                        ?>
                            <tr>
                                <td><?= $b['tanggal_perolehan']; ?>
                                <td><?= $b['nama_barang']; ?></td>
                                <td><span class="badge badge-primary"> <?php $angka = $b['nilai_perolehan'];
                                                                        $angka_format = number_format($angka);
                                                                        if ($angka_format == null) {
                                                                            echo 0;
                                                                        } else {
                                                                            echo $angka_format;
                                                                        } ?></span></td>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-danger py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">5 Barang Rusak Terakhir</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th>Tanggal Rusak</th>
                            <th>Barang</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barang_rusakk as $du) : ?>
                            <tr>
                                <td><strong><?= $du['tanggal_rusak']; ?></strong></td>
                                <td><?= $du['nama_barang']; ?></td>
                                <td><span class="badge badge-danger"><?= $du['keterangan_rusak']; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header bg-warning py-3">
                <h6 class="m-0 font-weight-bold text-white text-center">5 Barang Keluar terakhir</h6>
            </div>
            <div class="table-responsive">
                <table class="table mb-0 table-sm table-striped text-center">
                    <thead>
                        <tr>
                            <th>Tanggal Keluar</th>
                            <th>Barang</th>
                            <th>Nilai Lelang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barang_keluar as $tbk) : ?>
                            <tr>
                                <td><strong><?= $tbk['tanggal_keluar']; ?></strong></td>
                                <td><?= $tbk['nama_barang']; ?></td>
                                <td><span class="badge badge-warning"> <?php $angka = $tbk['nilai_lelang'];
                                                                        $angka_format = number_format($angka);
                                                                        if ($angka_format == null) {
                                                                            echo 0;
                                                                        } else {
                                                                            echo $angka_format;
                                                                        } ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>