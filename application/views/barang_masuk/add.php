<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Input Barang Masuk
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('barangmasuk') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['id_barang_masuk' => $id_barang_masuk, 'user_id' => $this->session->userdata('login_session')['user']]); ?>
                <div class="row form-group">
                    <div class="col-lg-3">
                        <div class="text-center">
                            <a href="<?= base_url('assets/img/rusak.png'); ?>" id="check_enlarge_photo" class="enlarge">
                                <img style="width: 75%" src="<?= base_url('assets/img/rusak.png'); ?>" id="check_photo" class="img-thumbnail rounded img_fluid" alt="Photo">
                            </a>
                        </div>
                        <div><small><center>Click image to zoom</center></small></div>
                        <div class="custom-file my-3 mb- col-lg-12">
                            <input type="file" class="custom-file-input" id="photo" name="foto">
                            <label for="photo" class="custom-file-label">Pilih Foto</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 text-md-right" for="tanggal_masuk">Tanggal Rusak</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal_masuk', date('Y-m-d')); ?>" name="tanggal_masuk" id="tanggal_masuk" type="text" class="form-control date" placeholder="Tanggal Masuk...">
                        <?= form_error('tanggal_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="barang_id">Barang</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="barang_id" id="barang_id" class="custom-select">
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option <?= $this->uri->segment(3) == $b['id_barang'] ? 'selected' : '';  ?> <?= set_select('barang_id', $b['id_barang']) ?> value="<?= $b['id_barang'] ?>"><?= $b['id_barang'] . ' | ' . $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('barang/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                
                <div class="col-9">
                    <input class="form-control" type="file" name="foto" id="foto">
                    <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row form-group">
        <label class="col-md-4 text-md-right" for="keterangan">Keterangan Kerusakan</label>
        <div class="col-md-5">
            <textarea id="keterangan" value="<?= set_value('keterangan'); ?>" name="keterangan" type="text" class="form-control">
            </div>
        </div>
        <div class="row form-group">
            <div class="col offset-md-4">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>
</div>
</div>