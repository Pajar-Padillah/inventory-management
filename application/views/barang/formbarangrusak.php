<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Barang Rusak
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <form action="<?php echo base_url('barang/setbarangrusak'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $barang->id_barang; ?>" name="id_barang">
                    <!-- <input type="hidden" value="<?= $barang->approved_rusak; ?>" name="approved_rusak"> -->
                    <div class="row form-group">
                        <label class="col-md-2 text-md-left" for="nama_barang">Nama Barang</label>
                        <div class="col-md-10">
                            <input readonly value="<?= $barang->nama_barang; ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                            <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 text-md-left" for="tanggal_rusak">Tanggal Kerusakan</label>
                        <div class="col-md-4">
                            <input value="<?= set_value('tanggal_perolehan', date('Y-m-d')); ?>" name="tanggal_rusak" id="tanggal_rusak" class="form-control date" placeholder="Tanggal Kerusakan...">
                            <?= form_error('tanggal_rusak', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <label class="col-md-2 text-md-left" for="kondisi">Kondisi</label>
                        <div class="col-md-4">
                            <input readonly value="<?= set_value('kondisi'); ?>" name="kondisi" id="kondisi" type="text" class="form-control" placeholder="Rusak">
                            <?= form_error('kondisi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <input value="<?= set_value('approved_rusak'); ?>" name="approved_rusak" id="approved_rusak" type="hidden" class="form-control" placeholder="pending">
                    <?= form_error('approved_rusak', '<small class="text-danger">', '</small>'); ?>
                    <div class="row form-group">
                        <label class="col-md-2 text-md-left" for="foto">Foto Kerusakan</label>
                        <div class="col-10">
                            <input type="file" name="foto" id="foto">
                            <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 text-md-left" for="keterangan_rusak">Keterangan Rusak</label>
                        <div class="col-md-10">
                            <textarea name="keterangan_rusak" id="keterangan_rusak" type="text" class="form-control" placeholder="keterangan rusak..."></textarea>
                            <?= form_error('keterangan_rusak', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-9 offset-md-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <button type="reset" class="btn btn-secondary">Reset</bu>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>