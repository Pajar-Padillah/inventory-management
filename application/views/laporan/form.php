<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Form Laporan
                </h4>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <form method="post" action="<?php echo base_url('laporan/laporan_barang') ?>">
                    <div class="laporan">
                        <div class="row form-group">
                            <label class="col-lg-2 text-lg-left" for="tanggal">Periode Tanggal </label>
                            <div class="col-lg-5">
                                <div class="input-group">
                                    <div class="row mb-3">
                                        <div class="col-sm-6">
                                            <p class="mx-3">Dari tanggal</p>
                                            <?php if (isset($_POST['filter'])) : ?>
                                                <input type="date" class="form-control" name="tanggal_awal" value="<?= $tgl_awal; ?>">
                                            <?php else : ?>
                                                <input type="date" class="form-control" name="tanggal_awal" value="<?= date('Y-m-01'); ?>">
                                            <?php endif ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="mx-3">Sampai tanggal</p>
                                            <?php if (isset($_POST['filter'])) : ?>
                                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= $tgl_akhir; ?>">
                                            <?php else : ?>
                                                <input type="date" class="form-control" name="tanggal_akhir" value="<?= date('Y-m-d'); ?>">
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-lg-9 offset-lg-2">
                                <button type="submit" name="filter" class="btn btn-primary btn-icon-split">
                                    <span class="icon">
                                        <i class="fa fa-filter"></i>
                                    </span>
                                    <span class="text">
                                        Filter
                                    </span>
                                </button>
                                <a href="<?= base_url('laporan'); ?>" class="btn btn-danger btn-icon-split">
                                    <span class="icon">
                                        <i class="fa fa-undo"></i>
                                    </span>
                                    <span class="text">
                                        Reset
                                    </span></a>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="tabel_barang">
                    <?php if (isset($_POST['filter'])) : ?>

                        <?php
                        $tanggal_awal_heading = date('d-m-Y', strtotime($tgl_awal));
                        $tanggal_akhir_heading = date('d-m-Y', strtotime($tgl_akhir));
                        ?>
                        <hr>
                        <h5 class="text-center"> Daftar Barang Periode Tanggal <?= $tanggal_awal_heading; ?> s/d <?= $tanggal_akhir_heading; ?></h5>
                        <div class="table-responsive">
                            <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable1">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Ruangan</th>
                                        <th>Jenis Barang</th>
                                        <th>Satuan</th>
                                        <th>Nilai Perolehan</th>
                                        <th>Tanggal Perolehan</th>
                                        <th>Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    if ($barang) :
                                        foreach ($barang as $b) :
                                    ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $b['id_barang']; ?></td>
                                                <td><?= $b['nama_barang']; ?></td>
                                                <td><?= $b['nama_ruang']; ?></td>
                                                <td><?= $b['nama_jenis']; ?></td>
                                                <td><?= $b['nama_satuan']; ?></td>
                                                <td>
                                                    <?php $angka = $b['nilai_perolehan'];
                                                    $angka_format = number_format($angka);
                                                    if ($angka_format == null) {
                                                        echo 0;
                                                    } else {
                                                        echo $angka_format;
                                                    } ?>
                                                </td>
                                                <td><?= $b['tanggal_perolehan']; ?></td>
                                                <td>
                                                    <?php if ($b['kondisi'] == 'baik') : ?>
                                                        <span class="badge badge-success btn-status"><i class="fas fa-fw fa-sync"></i> <?= ucwords(strtolower($b['kondisi'])); ?></span>
                                                    <?php elseif ($b['kondisi'] == 'rusak') : ?>
                                                        <span class="badge badge-primary btn-status"><i class="fas fa-fw fa-sync"></i> <?= ucwords(strtolower($b['kondisi'])); ?></span>
                                                    <?php elseif ($b['kondisi'] == 'keluar') : ?>
                                                        <span class="badge badge-danger btn-status"><i class="fas fa-fw fa-sync"></i> <?= ucwords(strtolower($b['kondisi'])); ?></span>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="10" class="text-center">
                                                Data Kosong
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                            <div class="my-3" style="float: right;">
                                <?php if (!empty($barang)) { ?>
                                    <a target="_blank" href="<?= base_url('laporan/barangPDF/' . $tgl_awal . '/' . $tgl_akhir); ?>" class="btn btn-success"><i class="fa fa-print"></i> Cetak Barang</a>
                                <?php } ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        <?php if (isset($_POST['filter'])) { ?>
            $("#tabel_barang").show();
        <?php }  ?>
    });
</script>