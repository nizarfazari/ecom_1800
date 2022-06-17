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
                            <li class="nav-item"><a href="<?= site_url('user/home/') ?>" class="nav-link">Beranda</a></li>
                            <li class="nav-item"><a href="<?= site_url('user/home/transaksi') ?>" class="nav-link">Transaksi</a></li>
                            <li class="nav-item"><a href="<?= site_url('user/home/toko') ?>" class="nav-link">Toko</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Ubah Profil</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Simple</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Produk</th>
                                            <th scope="col">Jumlah</th>
                                            <th scope="col">Harga</th>
                                            <th scope="col">Tgl Order</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($transaksi)) { ?>
                                            <tr>
                                                <td colspan="5" class="text-center">Data Kosong</td>
                                            </tr>
                                        <?php } else
                                            foreach ($transaksi as $item) : ?>
                                            <tr>
                                                <td><?= $item->namaProduk ?></td>
                                                <td><?= $item->jumlah ?></td>
                                                <td><?= $item->harga ?></td>
                                                <td><?= $item->tglOrder ?></td>
                                                <td><?= $item->statusOrder ?></td>
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