<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Barang
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" name="merk" class="form-control" id="merk">
                            <small class="form-text text-danger"><?= form_error('merk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="seri">Seri</label>
                            <input type="text" name="seri" class="form-control" id="seri">
                            <small class="form-text text-danger"><?= form_error('seri'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi</label>
                            <input type="text" name="spesifikasi" class="form-control" id="spesifikasi">
                            <small class="form-text text-danger"><?= form_error('spesifikasi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" class="form-control" id="kategori_id">
                                <option value="">Pilih Kategori</option>
                                <?php foreach ($kategori as $kat): ?>
                                    <option value="<?= $kat['id']; ?>">
                                        <?= $kat['id']; ?> - <?= $kat['deskripsi']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="form-text text-danger"><?= form_error('kategori_id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" name="stok" class="form-control" id="stok">
                            <small class="form-text text-danger"><?= form_error('stok'); ?></small>
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