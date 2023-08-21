<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form Edit Barang
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
                <?= form_open('', [], ['id_barang' => $barang['id_barang']]); ?>
                <div class="row form-group">
                    <label class="col-md-2 text-md-left" for="nama_barang">Nama Barang</label>
                    <div class="col-md-10">
                        <input value="<?= set_value('nama_barang', $barang['nama_barang']); ?>" name="nama_barang" id="nama_barang" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-left" for="ruang_id">Ruangan</label>
                    <div class="col-md-10">
                        <div class="input-group">
                            <select name="ruang_id" id="ruang_id" class="custom-select">
                                <option value="" selected disabled>Pilih Ruangan</option>
                                <?php foreach ($ruang as $r) : ?>
                                    <option <?= $barang['ruang_id'] == $r['id_ruang'] ? 'selected' : ''; ?> <?= set_select('ruang_id', $r['id_ruang']) ?> value="<?= $r['id_ruang'] ?>"><?= $r['nama_ruang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('ruang/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('ruang_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-left" for="jenis_id">Jenis Barang</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="jenis_id" id="jenis_id" class="custom-select">
                                <option value="" selected disabled>Pilih Jenis Barang</option>
                                <?php foreach ($jenis as $j) : ?>
                                    <option <?= $barang['jenis_id'] == $j['id_jenis'] ? 'selected' : ''; ?> <?= set_select('jenis_id', $j['id_jenis']) ?> value="<?= $j['id_jenis'] ?>"><?= $j['nama_jenis'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('jenis/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('jenis_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <label class="col-md-2 text-md-left" for="satuan_id">Satuan Barang</label>
                    <div class="col-md-4">
                        <div class="input-group">
                            <select name="satuan_id" id="satuan_id" class="custom-select">
                                <option value="" selected disabled>Pilih Satuan Barang</option>
                                <?php foreach ($satuan as $s) : ?>
                                    <option <?= $barang['satuan_id'] == $s['id_satuan'] ? 'selected' : ''; ?> <?= set_select('satuan_id', $s['id_satuan']) ?> value="<?= $s['id_satuan'] ?>"><?= $s['nama_satuan'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('satuan/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('satuan_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-left" for="nilai_perolehan">Nilai Perolehan</label>
                    <div class="col-md-10">
                        <input value="<?= set_value('nilai_perolehan', $barang['nilai_perolehan']); ?>" name="nilai_perolehan" id="nilai_perolehan" type="text" class="form-control" placeholder="Nama Barang...">
                        <?= form_error('nilai_perolehan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-2 text-md-left" for="tahun_perolehan">Tanggal Perolehan</label>
                    <div class="col-md-10">
                        <input value="<?= set_value('tanggal_perolehan', $barang['tanggal_perolehan']); ?>" name="tanggal_perolehan" id="tanggal_perolehan" type="text" class="form-control date" placeholder="Tanggal Diperoleh...">
                        <?= form_error('tanggal_perolehan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-md-9 offset-md-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</bu>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>
    </div>