<!-- <?php var_dump($kategori); ?> -->
<div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <h3 class="mt-3">Daftar Kategori</h3>
    <div class="row mt-3">
        <div class="col-md-12">
            <a href="<?= base_url(); ?>kategori/tambah" class="btn btn-primary">Tambah Data Kategori</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($kategori)): ?>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ditemukan!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $i = 1;
                    foreach ($kategori as $ktg): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $ktg['id']; ?></td>
                            <td><?= $ktg['deskripsi']; ?></td>
                            <td><?= $ktg['kategori']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>kategori/detail/<?= $ktg['id']; ?>"
                                    class="badge badge-primary ">Detail</a>
                                <a href="<?= base_url(); ?>kategori/ubah/<?= $ktg['id']; ?>"
                                    class="badge badge-success  ">Ubah</a>
                                <a href="<?= base_url(); ?>kategori/hapus/<?= $ktg['id']; ?>"
                                    class="badge badge-danger tombol-hapus">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>