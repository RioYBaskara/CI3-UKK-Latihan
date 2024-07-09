<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Kategori
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                                value="<?= set_value('deskripsi'); ?>">
                            <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                        </div>

                        <div class="form-group">
                            <input type="hidden" id="base" value="<?php echo base_url(); ?>">
                            <label class="font-weight-bold">KATEGORI</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="kategori1" value="M"
                                    <?= set_radio('kategori', 'M'); ?>>
                                <label class="form-check-label" for="kategori1">
                                    M - Modal
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="kategori2" value="A"
                                    <?= set_radio('kategori', 'A'); ?>>
                                <label class="form-check-label" for="kategori2">
                                    A - Aset
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="kategori3" value="BHP"
                                    <?= set_radio('kategori', 'BHP'); ?>>
                                <label class="form-check-label" for="kategori3">
                                    BHP - Barang Habis Pakai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="kategori4" value="BTHP"
                                    <?= set_radio('kategori', 'BTHP'); ?>>
                                <label class="form-check-label" for="kategori4">
                                    BTHP - Barang Tidak Habis Pakai
                                </label>
                            </div>
                            <small class="form-text text-danger"><?= form_error('kategori'); ?></small>
                        </div>
                        <button name="tambah" type="submit"
                            class="btn btn-md btn-primary tombol-tambah-yakin">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>