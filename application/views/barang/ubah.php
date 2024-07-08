<!-- <?php var_dump($kategori); ?> -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Form Ubah Data Kategori
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $kategori['id']; ?>">
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                                value="<?= $kategori["deskripsi"]; ?>">
                            <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">KATEGORI</label>

                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="kategoriM" value="M"
                                    <?= $kategori["kategori"] == 'M' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="kategoriM">
                                    M - Modal
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="kategoriA" value="A"
                                    <?= $kategori["kategori"] == 'A' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="kategoriA">
                                    A - Aset
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="kategoriBHP"
                                    value="BHP" <?= $kategori["kategori"] == 'BHP' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="kategoriBHP">
                                    BHP - Barang Habis Pakai
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="kategori" id="kategoriBTHP"
                                    value="BTHP" <?= $kategori["kategori"] == 'BTHP' ? 'checked' : '' ?>>
                                <label class="form-check-label" for="kategoriBTHP">
                                    BTHP - Barang Tidak Habis Pakai
                                </label>
                            </div>
                            <small class="form-text text-danger"><?= form_error('kategori'); ?></small>
                        </div>
                        <button name="tambah" type="submit"
                            class="btn btn-md btn-primary tombol-ubah-yakin">SIMPAN</button>
                        <button type="reset" class="btn btn-md btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>