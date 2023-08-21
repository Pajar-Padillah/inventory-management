<?= $this->session->flashdata('pesan'); ?>
<?php if ($this->session->flashdata('terima_brg_keluar')) { ?>
    <script>
        swal.fire({
            title: "Success!",
            text: "Terima Data Barang Keluar Berhasil!",
            icon: "success"
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('tolak_brg_keluar')) { ?>
    <script>
        swal.fire({
            title: "Success!",
            text: "Tolak Data Barang Keluar Berhasil!",
            icon: "success"
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('ubah_brg_keluar')) { ?>
    <script>
        swal.fire({
            title: "Success!",
            text: "Ubah Kondisi Barang Keluar Ke Rusak Berhasil!",
            icon: "success"
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('gagal_ubah_brg_keluar')) { ?>
    <script>
        swal.fire({
            title: "Gagal!",
            text: "Ubah Kondisi Barang Keluar Ke Rusak Gagal!",
            icon: "error"
        });
    </script>
<?php } ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Riwayat Data Barang Keluar
                </h4>
            </div>
            <!-- <div class="col-auto">
                <a href="<?= base_url('barangkeluar/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Input Barang Keluar
                    </span>
                </a>
            </div> -->
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Bukti Kuitansi</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Satuan</th>
                    <th>Nilai Lelang</th>
                    <th>Tanggal Keluar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    <!-- <?php if (is_gudang() or is_admin()) : ?>
                        <th>Aksi</th>
                    <?php endif ?> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($barangkeluar) :
                    foreach ($barangkeluar as $bk) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><a href="<?= base_url('assets/img/keluar/') . $bk['kuitansi']; ?>" id="check_enlarge_photo" class="enlarge">
                                    <img style="width: 100px; height: 80px" src="<?= base_url() ?>assets/img/keluar/<?= $bk['kuitansi']; ?>" class="shadow-sm img-thumbnail"></a>
                            </td>
                            <td><?= $bk['id_barang']; ?></td>
                            <td><?= $bk['nama_barang']; ?></td>
                            <td><?= $bk['nama_jenis']; ?></td>
                            <td><?= $bk['nama_satuan']; ?></td>
                            <td>
                                <?php $angka = $bk['nilai_lelang'];
                                $angka_format = number_format($angka);
                                if ($angka_format == null) {
                                    echo 0;
                                } else {
                                    echo $angka_format;
                                } ?>
                            </td>
                            <td><?= $bk['tanggal_keluar']; ?></td>
                            <td>
                                <?php if ($bk['approved_keluar'] == 'pending') : ?>
                                    <span class="badge badge-warning"><i class="fas fa-fw fa-clock"></i> Pending</span>
                                <?php elseif ($bk['approved_keluar'] == 'ya') : ?>
                                    <span class="badge badge-success"><i class="fas fa-fw fa-check"></i> Approved</span>
                                <?php else : ?>
                                    <?php if (is_umum() or is_admin()) : ?>
                                        <a class="badge badge-danger" href="#" data-toggle="modal" data-target="#keterangan<?= $bk['id_barang'] ?>">
                                            <i class="fas fa-fw fa-times"></i>
                                            Ditolak
                                        </a>
                                    <?php else : ?>
                                        <a class="badge badge-danger" href="#" data-toggle="modal" data-target="#ket_tolak_gudang<?= $bk['id_barang'] ?>">
                                            <i class="fas fa-fw fa-times"></i>
                                            Ditolak
                                        </a>
                                    <?php endif ?>
                                <?php endif ?>
                            </td>
                            <?php if (is_gudang() or is_admin()) : ?>
                                <td>
                                    <?php if ($bk['approved_keluar'] == 'pending' or $bk['approved_keluar'] == 'tidak') : ?>
                                        <a href="<?= base_url('barangkeluar/edit/') . $bk['id_barang'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="#delbrg<?= $bk['id_barang'] ?>" data-toggle="modal" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                    <?php else : ?>
                                        <a href="#delbrg<?= $bk['id_barang'] ?>" data-toggle="modal" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                    <?php endif ?>
                                </td>
                            <?php else : ?>
                                <td>
                                    <?php if ($bk['approved_keluar'] == 'tidak') { ?>
                                        <span class="badge badge-primary">No Action </span>
                                    <?php } elseif ($bk['approved_keluar'] == 'pending') { ?>
                                        <div class="form-button-action">
                                            <button data-target="#terima-barang-keluar<?= $bk['id_barang'] ?>" type="button" data-toggle="modal" title="Terima Data" class="btn btn-link btn-success btn-sm">
                                                <i class="fa fa-check" style="color: #fff;"></i>
                                            </button>
                                            <button data-target="#tolak-barang-keluar<?= $bk['id_barang']  ?>" type="button" data-toggle="modal" title="Tolak Data" class="btn btn-link btn-danger btn-sm">
                                                <i class="fa fa-times" style="color: #fff;"></i>
                                            </button>
                                        </div>
                                    <?php } elseif ($bk['approved_keluar'] == 'ya') { ?>
                                        <span class="badge badge-primary">No Action </span>
                                    <?php  } ?>
                                </td>
                            <?php endif ?>
                        </tr>
                        <div class="modal fade" id="delbrg<?= $bk['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addNewDonaturLabel">Hapus Barang Keluar</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Anda yakin ingin menghapus barang <b><?= $bk['nama_barang'] ?></b></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <a href="<?= base_url('barang/delete/') . $bk['id_barang'] ?>" class="btn btn-primary">Hapus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="ket_tolak_gudang<?= $bk['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header  no-bd">
                                        <h5 class="modal-title">Keterangan Ditolak</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label><b>Alasan Ditolak</b> </label>
                                                    <p><?= ucfirst($bk['keterangan_tolak']) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="<?= base_url('barangkeluar/ubah_keluar_ke_rusak'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <input hidden type="text" class="form-control" name="id_barang" value="<?= $bk['id_barang'] ?>">
                                                <input type="hidden" name="foto_old" value="<?= $bk['kuitansi']  ?>">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <hr>
                                                        <label><b>Ubah kondisi Barang Keluar ke Kondisi Rusak?</b></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <button type="submit" id="addRowButton" class="btn btn-primary">Simpan</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="keterangan<?= $bk['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header  no-bd">
                                        <h5 class="modal-title">Keterangan Ditolak</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label><b>Alasan Ditolak</b> </label>
                                                    <p><?= ucfirst($bk['keterangan_tolak']) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer no-bd">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="terima-barang-keluar<?= $bk['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title" id="exampleModalLabel">Terima Barang Keluar</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body no-bd">
                                        <form action="<?= base_url('barangkeluar/terima_barang_keluar'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <input hidden type="text" class="form-control" name="id_barang" value="<?= $bk['id_barang'] ?>">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <p>Setujui Data Barang Keluar?</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <button type="submit" id="addRowButton" class="btn btn-primary">Terima</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="tolak-barang-keluar<?= $bk['id_barang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Tolak Data Barang Keluar</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('barangkeluar/tolak_barang_keluar'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <input hidden type="text" class="form-control" name="id_barang" value="<?= $bk['id_barang'] ?>">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Alasan Tolak Data Barang Keluar</label>
                                                        <textarea name="keterangan_tolak" rows="2" class="form-control" required="required"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <button type="submit" id="addRowButton" class="btn btn-primary">Tolak</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="9" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>