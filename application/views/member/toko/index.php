<div class="main-content">
    <section class="section">
        <div class="section-header">
            <a href="" class="btn btn-icon"><i class="fas fa-arrow"></i></a>
            <h1>Menu Utama Dashboard Member</h1>
        </div>
    </section>

    <div class="section-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Menu Member</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="" class="nav-link">Beranda</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Transaksi</a></li>
                            <li class="nav-item"><a href="<?= site_url('user/home/toko') ?>" class="nav-link">Toko</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Ubah Profil</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <div class="card-body">
                                <a href="<?= site_url('user/home/create_toko') ?>" class="btn btn-primary ">Silahkan Membuat Toko</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Simple</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Toko</th>
                                            <th scope="col">Deskripsi</th>
                                            <th scope="col">Logo</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($toko)) { ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Data Kosong</td>
                                            </tr>
                                        <?php } else
                                            foreach ($toko as $item) : ?>
                                            <tr>
                                                <td><?= $item->namaToko ?></td>
                                                <td><?= $item->deskripsi ?></td>
                                                <td><?= $item->logo ?></td>
                                                <td>
                                                    <?php if ($item->statusAktif == 'Y') { ?>
                                                        <a href="" class="badge badge-success">Aktif</a>
                                                    <?php } else { ?>
                                                        <a href="" class="badge badge-danger">Tidak Aktif</a>
                                                    <?php } ?>
                                                </td>
                                                <td>
                                                    <a href="<?= site_url('user/home/detail_toko/' . $item->idToko);  ?>" class="btn btn-warning">Details</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>