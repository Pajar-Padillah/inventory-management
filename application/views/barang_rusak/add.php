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
                        <a href="<?= base_url('barangrusak') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [],); ?>
                <div class="row form-group">
                    <label class="col-md-2 text-md-left" for="barang_id">Barang</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <select name="barang_id" id="barang_id" class="custom-select">
                                <option value="" selected disabled>Pilih Barang</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option value="<?= $b['id_barang'] ?>"><?= $b['id_barang'] . ' | ' . $b['nama_barang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-left" for="tanggal_masuk">Tanggal Kerusakan</label>
                    <div class="col-md-4">
                        <input value="<?= set_value('tanggal_masuk', date('Y-m-d')); ?>" name="tanggal_masuk" id="tanggal_masuk" type="text" class="form-control date" placeholder="Tanggal Kerusakan...">
                        <?= form_error('tanggal_masuk', '<small class="text-danger">', '</small>'); ?>
                    </div>

                    <label class="col-md-2 text-md-left" for="kondisi">Kondisi Barang</label>
                    <div class="col-md-4">
                        <input disabled value="<?= set_value('kondisi'); ?>" name="kondisi" id="kondisi" type="text" class="form-control" placeholder="Rusak">
                        <?= form_error('kondisi', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-left" for="foto">Foto Kerusakan</label>
                    <div class="col-md-10">
                        <input type="file" name="foto" id="foto">
                        <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-left" for="barang_id">Keterangan Rusak</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <textarea value="<?= set_value('kondisi'); ?>" name="kondisi" id="kondisi" type="text" class="form-control" placeholder="keterangan..."></textarea>
                        </div>
                        <?= form_error('barang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 offset-md-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</bu>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>