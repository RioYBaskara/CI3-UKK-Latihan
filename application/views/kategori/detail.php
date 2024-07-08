<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Kategori
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>ID</td>
                            <td><?= $kategori['id'] ?></td>
                        </tr>
                        <tr>
                            <td>DESKRIPSI</td>
                            <td><?= $kategori['deskripsi'] ?></td>
                        </tr>
                        <tr>
                            <td>KATEGORI</td>
                            <td><?= $kategori['kategori'] ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-6 text-end">
            <a href="<?= base_url(); ?>kategori" class="btn btn-md btn-primary">Kembali</a>
        </div>
    </div>
</div>