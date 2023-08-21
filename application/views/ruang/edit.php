<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Ruangan
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('ruang') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('', [], ['id_ruang' => $ruang['id_ruang']]); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_ruang">Nama Ruangan</label>
                    <div class="col-md-9">
                        <input value="<?= set_value('nama_ruang', $ruang['nama_ruang']); ?>" name="nama_ruang" id="nama_ruang" type="text" class="form-control" placeholder="Nama Ruangan...">
                        <?= form_error('nama_ruang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>