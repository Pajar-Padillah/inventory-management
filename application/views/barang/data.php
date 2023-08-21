<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Barang
                </h4>
            </div>
            <?php if (is_gudang()) : ?>
                <div class="col-auto">
                    <a href="<?= base_url('barang/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                        <span class="icon">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">
                            Tambah Barang
                        </span>
                    </a>
                </div>
            <?php endif ?>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
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
                    <?php if (is_gudang() or is_admin()) : ?>
                        <th>Aksi</th>
                    <?php endif ?>
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
                                    <?php if (is_gudang()) : ?>
                                        <a href="<?= base_url('barang/formbarangrusak/') . $b['id_barang'] ?>" class="badge badge-primary btn-status"><i class="fas fa-fw fa-sync"></i> <?= ucwords(strtolower($b['kondisi'])); ?></a>
                                    <?php else : ?>
                                        <span class="badge badge-primary btn-status"><i class="fas fa-fw fa-sync"></i> <?= ucwords(strtolower($b['kondisi'])); ?></span>
                                    <?php endif ?>
                                <?php elseif ($b['kondisi'] == 'rusak') : ?>
                                    <?php if ($b['approved_rusak'] == 'pending' or $b['approved_rusak'] == 'tidak') : ?>
                                        <?php if (is_gudang()) : ?>
                                            <a href="<?= base_url('barang/formbarangrusak/') . $b['id_barang'] ?>" class="badge badge-primary btn-status"><i class="fas fa-fw fa-sync"></i> Baik</a>
                                        <?php else : ?>
                                            <span class="badge badge-primary btn-status"><i class="fas fa-fw fa-sync"></i> <?= ucwords(strtolower($b['kondisi'])); ?></span>
                                        <?php endif ?>
                                    <?php else : ?>
                                        <span class="badge badge-danger btn-status"><i class="fas fa-fw fa-sync"></i> <?= ucwords(strtolower($b['kondisi'])); ?></span>
                                    <?php endif ?>
                                <?php endif ?>

                            </td>
                            <?php if (is_gudang() or is_admin()) : ?>
                                <td>
                                    <a href="<?= base_url('barang/edit/') . $b['id_barang'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                    <a href="#delbrg<?= $b['id_barang'] ?>" data-toggle="modal" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                </td>
                            <?php endif ?>
                        </tr>
                        <div class="modal fade" id="delbrg<?= $b['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addNewDonaturLabel">Hapus Barang</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Anda yakin ingin menghapus barang <b><?= $b['nama_barang'] ?></b></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('barang/delete/') . $b['id_barang'] ?>" class="btn btn-primary">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="kondisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik "Logout" dibawah ini jika anda yakin ingin logout.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batalkan</button>
                <a class="btn btn-primary" href="<?= base_url('logout'); ?>">Logout</a>
            </div>
        </div>
    </div>
</div>