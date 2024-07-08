<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Barang
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td><?= $barang['id'] ?></td>
                        </tr>
                        <tr>
                            <td>MERK</td>
                            <td><?= $barang['merk'] ?></td>
                        </tr>
                        <tr>
                            <td>SERI</td>
                            <td><?= $barang['seri'] ?></td>
                        </tr>
                        <tr>
                            <td>SPESIFIKASI</td>
                            <td><?= $barang['spesifikasi'] ?></td>
                        </tr>
                        <tr>
                            <td>KATEGORI</td>
                            <td><?= $barang['kategori_id'] ?></td>
                        </tr>
                        <tr>
                            <td>STOK</td>
                            <td><?= $barang['stok'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-6 text-end">
            <a href="<?= base_url(); ?>barang" class="btn btn-md btn-primary">Kembali</a>
        </div>
    </div>
</div>