<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Kota</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Ongkir</div>
                <div class="breadcrumb-item">Kota</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Kota</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Kota</h4>
                            <a href="<?= site_url('kota/add') ?>" class="btn btn-primary">Tambah Kota</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kota</th>
                                        <th>Action At</th>
                                    </tr>
                                    <?php if (empty($kota)) { ?>
                                        <tr>
                                            <td colspan="3" class="text-center">Data Kosong</td>
                                        </tr>
                                    <?php } else $no = 0;
                                    foreach ($kota as $item) : $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $item->namaKota ?></td>
                                            <td>
                                                <a href="<?= site_url('kota/edit/' . $item->idKota);  ?>" class="btn btn-warning">Edit</a>
                                                <a href="<?= site_url('kota/delete/' . $item->idKota);  ?>" class="btn btn-danger">Hapus</a>
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