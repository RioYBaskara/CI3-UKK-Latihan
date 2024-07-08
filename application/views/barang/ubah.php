<!-- <?php var_dump($kategori); ?> -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Form Ubah Data Barang
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?= $barang['id']; ?>">
                        <div class="form-group">
                            <label for="merk">Merk</label>
                            <input type="text" name="merk" class="form-control" id="merk"
                                value="<?= $barang["merk"]; ?>">
                            <small class="form-text text-danger"><?= form_error('merk'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="seri">Seri</label>
                            <input type="text" name="seri" class="form-control" id="seri"
                                value="<?= $barang["seri"]; ?>">
                            <small class="form-text text-danger"><?= form_error('seri'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="spesifikasi">Spesifikasi</label>
                            <input type="text" name="spesifikasi" class="form-control" id="spesifikasi"
                                value="<?= $barang["spesifikasi"]; ?>">
                            <small class="form-text text-danger"><?= form_error('spesifikasi'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kategori_id">ID Kategori</label>
                            <input type="text" name="kategori_id" class="form-control" id="kategori_id"
                                value="<?= $barang["kategori_id"]; ?>">
                            <small class="form-text text-danger"><?= form_error('kategori_id'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" name="stok" class="form-control" id="stok"
                                value="<?= $barang["stok"]; ?>">
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