<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Kurir</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Jasa Perjalanan</div>
                <div class="breadcrumb-item">Kurir</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Kurir</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Kurir</h4>
                            <a href="<?= site_url('kurir/add') ?>" class="btn btn-primary">Tambah Kurir</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kurir</th>
                                        <th>Action At</th>
                                    </tr>
                                    <?php if (empty($kurir)) { ?>
                                        <tr>
                                            <td colspan="3" class="text-center">Data Kosong</td>
                                        </tr>
                                    <?php } else $no = 0;
                                    foreach ($kurir as $item) : $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $item->namaKurir ?></td>
                                            <td>
                                                <a href="<?= site_url('kurir/edit/' . $item->idKurir);  ?>" class="btn btn-warning">Edit</a>
                                                <a href="<?= site_url('kurir/delete/' . $item->idKurir);  ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>