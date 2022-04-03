<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Ongkir</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Jasa Perjalanan</div>
                <div class="breadcrumb-item">Ongkir</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Ongkir</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Ongkir</h4>
                            <a href="<?= site_url('ongkir/add') ?>" class="btn btn-primary">Tambah Ongkir</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kurir</th>
                                        <th>Kota Asal</th>
                                        <th>Kota Tujuan</th>
                                        <th>Ongkos Kirim</th>
                                        <th>Action At</th>
                                    </tr>
                                    <?php if (empty($ongkir)) { ?>
                                        <tr>
                                            <td colspan="6" class="text-center">Data Kosong</td>
                                        </tr>
                                    <?php } else $no = 0;
                                    foreach ($ongkir as $item) : $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $item->namaKurir ?></td>
                                            <td><?= $item->asal ?></td>
                                            <td><?= $item->tujuan ?></td>
                                            <td><?= $item->biaya ?></td>
                                            <td>
                                                <a href="<?= site_url('ongkir/edit/' . $item->idBiayaKirim);  ?>" class="btn btn-warning">Edit</a>
                                                <a href="<?= site_url('ongkir/delete/' . $item->idBiayaKirim);  ?>" class="btn btn-danger">Hapus</a>
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