<!-- <?php var_dump($barang); ?> -->
<div class="container">
    <div class="flash-data-barang" data-flashdata="<?= $this->session->flashdata('flash') ?>"></div>
    <h3 class="mt-3">Daftar Barang</h3>
    <div class="row mt-3">
        <div class="col-md-12">
            <a href="<?= base_url(); ?>barang/tambah" class="btn btn-primary">Tambah Data Barang</a>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Merk</th>
                        <th>Seri</th>
                        <th>Spesifikasi</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($barang)): ?>
                        <tr>
                            <td colspan="4">
                                <div class="alert alert-danger" role="alert">
                                    Data Tidak Ditemukan!
                                </div>
                            </td>
                        </tr>
                    <?php endif; ?>
                    <?php $i = 1;
                    foreach ($barang as $ktg): ?>
                        <tr>
                            <th><?= $i++; ?></th>
                            <td><?= $ktg['id']; ?></td>
                            <td><?= $ktg['merk']; ?></td>
                            <td><?= $ktg['seri']; ?></td>
                            <td><?= $ktg['spesifikasi']; ?></td>
                            <td><?= $ktg['kategori']; ?></td>
                            <td><?= $ktg['stok']; ?></td>
                            <td>
                                <a href="<?= base_url(); ?>barang/detail/<?= $ktg['id']; ?>" class="btn btn-primary "><i
                                        class="fa fa-eye"></i></a>
                                <a href="<?= base_url(); ?>barang/ubah/<?= $ktg['id']; ?>" class="btn btn-success  "><i
                                        class="fa fa-pencil-alt"></i></a>
                                <a href="<?= base_url(); ?>barang/hapus/<?= $ktg['id']; ?>"
                                    class="btn btn-danger tombol-hapus"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>