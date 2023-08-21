<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Barang Keluar
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
                <form action="<?php echo base_url('barang/setbarangkeluar'); ?>" method="POST" enctype="multipart/form-data">
                    <input type="hidden" value="<?= $barang->id_barang; ?>" name="id_barang">
                    <div class="row form-group">
                        <label class="col-md-2 text-md-left" for="nama_barang">Nama Barang</label>
                        <div class="col-md-4">
                            <input readonly value="<?= $barang->nama_barang; ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                            <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <label class="col-md-2 text-md-left" for="tanggal_keluar">Tanggal Keluar</label>
                        <div class="col-md-4">
                            <input value="<?= set_value('tanggal_keluar', date('Y-m-d')); ?>" name="tanggal_keluar" id="tanggal_keluar" class="form-control date" placeholder="Tanggal Keluar...">
                            <?= form_error('tanggal_keluar', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>

                    <input value="<?= set_value('kondisi'); ?>" name="kondisi" id="kondisi" type="hidden" class="form-control" placeholder="Keluar">
                    <?= form_error('kondisi', '<small class="text-danger">', '</small>'); ?>
                    <input value="<?= set_value('approved_keluar'); ?>" name="approved_keluar" id="approved_keluar" type="hidden" class="form-control" placeholder="pending">
                    <?= form_error('approved_keluar', '<small class="text-danger">', '</small>'); ?>

                    <div class="row form-group">
                        <label class="col-md-2 text-md-left" for="Kuitansi">Bukti Kuitansi Lelang</label>
                        <div class="col-10">
                            <input type="file" name="kuitansi" id="kuitansi">
                            <?= form_error('kuitansi', '<small class="text-danger">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-md-2 text-md-left" for="nilai_lelang">Nilai Lelang</label>
                        <div class="col-md-10">
                           <input value="<?= set_value('nilai_lelang'); ?>" name="nilai_lelang" id="nilai_lelang" type="number" class="form-control" placeholder="Nilai lelang... ">
                           <?= form_error('nilai_lelang', '<small class="text-danger">', '</small>'); ?>
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