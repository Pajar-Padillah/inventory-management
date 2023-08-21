<?= $this->session->flashdata('pesan') ?>
<?php if ($this->session->flashdata('terima_brg_rusak')) { ?>
    <script>
        swal.fire({
            title: "Success!",
            text: "Terima Data Barang Rusak Berhasil!",
            icon: "success"
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('tolak_brg_rusak')) { ?>
    <script>
        swal.fire({
            title: "Success!",
            text: "Tolak Data Barang Rusak Berhasil!",
            icon: "success"
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('ubah_brg_rusak')) { ?>
    <script>
        swal.fire({
            title: "Success!",
            text: "Ubah Kondisi Barang Rusak Ke Baik Berhasil!",
            icon: "success"
        });
    </script>
<?php } ?>
<?php if ($this->session->flashdata('gagal_ubah_brg_rusak')) { ?>
    <script>
        swal.fire({
            title: "Gagal!",
            text: "Ubah Kondisi Barang Rusak Ke Baik Gagal!",
            icon: "error"
        });
    </script>
<?php } ?>
<div class="card shadow-sm border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Barang Rusak
                </h4>
            </div>
            <!-- <div class="col-auto">
                <a href="<?= base_url('barangrusak/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Input Barang Rusak
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
                    <th>Gambar Kerusakan</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Kerusakan</th>
                    <th>Keterangan Kerusakan</th>
                    <th>Kondisi</th>
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
                if ($barang) :
                    foreach ($barang as $b) :
                ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <center><a href="<?= base_url('assets/img/rusak/') . $b['foto']; ?>" id="check_enlarge_photo" class="enlarge">
                                        <img style="width: 100px; height: 80px" src="<?= base_url() ?>assets/img/rusak/<?= $b['foto']; ?>" class="shadow-sm img-thumbnail"></a></center>
                            </td>
                            <td><?= $b['id_barang']; ?></td>
                            <td><?= $b['nama_barang']; ?></td>
                            <td><?= $b['tanggal_rusak']; ?></td>
                            <td><?= $b['keterangan_rusak']; ?></td>
                            <td>
                                <?php if (is_gudang()) : ?>
                                    <?php if ($b['approved_rusak'] == 'ya') : ?>
                                        <a href="<?= base_url('barang/formbarangkeluar/') . $b['id_barang'] ?>" class="badge badge-danger btn-status"><i class="fas fa-fw fa-times-circle"></i> <?= ucwords(strtolower($b['kondisi'])); ?></a>
                                    <?php else : ?>
                                        <a href="#" data-toggle="modal" data-target="#ket_blm_approve<?= $b['id_barang'] ?>" class="badge badge-danger btn-status"><i class="fas fa-fw fa-times-circle"></i> <?= ucwords(strtolower($b['kondisi'])); ?></a>
                                    <?php endif ?>
                                <?php else : ?>
                                    <span class="badge badge-danger btn-status"><i class="fas fa-fw fa-times-circle"></i> <?= ucwords(strtolower($b['kondisi'])); ?></span>
                                <?php endif ?>
                            </td>
                            <td>
                                <?php if ($b['approved_rusak'] == 'pending') : ?>
                                    <span class="badge badge-warning"><i class="fas fa-fw fa-clock"></i> Pending</span>
                                <?php elseif ($b['approved_rusak'] == 'ya') : ?>
                                    <span class="badge badge-success"><i class="fas fa-fw fa-check"></i> Approved</span>
                                <?php else : ?>
                                    <?php if (is_umum() or is_admin()) : ?>
                                        <a class="badge badge-danger" href="#" data-toggle="modal" data-target="#keterangan<?= $b['id_barang'] ?>">
                                            <i class="fas fa-fw fa-times"></i>
                                            Ditolak
                                        </a>
                                    <?php else : ?>
                                        <a class="badge badge-danger" href="#" data-toggle="modal" data-target="#ket_tolak_gudang<?= $b['id_barang'] ?>">
                                            <i class="fas fa-fw fa-times"></i>
                                            Ditolak
                                        </a>
                                    <?php endif ?>
                                <?php endif ?>
                            </td>
                            <?php if (is_gudang() or is_admin()) : ?>
                                <td>
                                    <?php if ($b['approved_rusak'] == 'pending' or $b['approved_rusak'] == 'tidak') : ?>
                                        <a href="<?= base_url('barangrusak/edit/') . $b['id_barang'] ?>" class="btn btn-warning btn-circle btn-sm"><i class="fa fa-edit"></i></a>
                                        <a href="#delbrg<?= $b['id_barang'] ?>" data-toggle="modal" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                    <?php else : ?>
                                        <a href="#delbrg<?= $b['id_barang'] ?>" data-toggle="modal" class="btn btn-danger btn-circle btn-sm"><i class="fa fa-trash"></i></a>
                                    <?php endif ?>
                                </td>
                            <?php else : ?>
                                <td>
                                    <?php if ($b['approved_rusak'] == 'tidak') { ?>
                                        <span class="badge badge-primary">No Action </span>
                                    <?php } elseif ($b['approved_rusak'] == 'pending') { ?>
                                        <div class="form-button-action">
                                            <button data-target="#terima-barang-rusak<?= $b['id_barang'] ?>" type="button" data-toggle="modal" title="Terima Data" class="btn btn-link btn-success btn-sm">
                                                <i class="fa fa-check" style="color: #fff;"></i>
                                            </button>
                                            <button data-target="#tolak-barang-rusak<?= $b['id_barang']  ?>" type="button" data-toggle="modal" title="Tolak Data" class="btn btn-link btn-danger btn-sm">
                                                <i class="fa fa-times" style="color: #fff;"></i>
                                            </button>
                                        </div>
                                    <?php } elseif ($b['approved_rusak'] == 'ya') { ?>
                                        <span class="badge badge-primary">No Action </span>
                                    <?php  } ?>
                                </td>
                            <?php endif ?>
                        </tr>
                        <div class="modal fade" id="delbrg<?= $b['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="addNewDonaturLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addNewDonaturLabel">Hapus Barang Rusak</h5>
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
                        <div class="modal fade" id="ket_tolak_gudang<?= $b['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <p><?= ucfirst($b['keterangan_tolak']) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <form action="<?= base_url('barangrusak/ubah_rusak_ke_baik'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <input hidden type="text" class="form-control" name="id_barang" value="<?= $b['id_barang'] ?>">
                                                <input type="hidden" name="foto_old" value="<?= $b['foto']  ?>">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <hr>
                                                        <label><b>Ubah kondisi Barang Rusak ke Kondisi Baik?</b></label>
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
                        <div class="modal fade" id="keterangan<?= $b['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                    <p><?= ucfirst($b['keterangan_tolak']) ?></p>
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
                        <div class="modal fade" id="ket_blm_approve<?= $b['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header  no-bd">
                                        <h5 class="modal-title">Data Barang Rusak Belum Divalidasi</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <p>Barang rusak dengan ID <b><?= ucfirst($b['id_barang']) ?></b> dan Nama Barang <b><?= ucfirst($b['nama_barang']) ?></b>
                                                        belum dapat dijadikan barang keluar, Silahkan menunggu Subbag memvalidasi data terlebih dahulu!</p>
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
                        <div class="modal fade" id="terima-barang-rusak<?= $b['id_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title" id="exampleModalLabel">Terima Barang Rusak</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body no-bd">
                                        <form action="<?= base_url('barangrusak/terima_barang_rusak'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <input hidden type="text" class="form-control" name="id_barang" value="<?= $b['id_barang'] ?>">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <p>Setujui Data Barang Rusak?</p>
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
                        <div class="modal fade" id="tolak-barang-rusak<?= $b['id_barang'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header no-bd">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">
                                                Tolak Data Barang Rusak</span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('barangrusak/tolak_barang_rusak'); ?>" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <input hidden type="text" class="form-control" name="id_barang" value="<?= $b['id_barang'] ?>">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Alasan Tolak Data Barang Rusak</label>
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