<div class="main-content">
    <section class="section">
        <div class="section-header">
            <a href="" class="btn btn-icon"><i class="fas fa-arrow"></i></a>
            <h1>Menu Utama Dashboard Toko "<?= $toko->namaToko ?>"</h1>
        </div>
    </section>

    <div class="section-body">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4>Menu Toko</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="" class="nav-link">Beranda</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Produk</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Pesanan</a></li>
                            <li class="nav-item"><a href="" class="nav-link">Laporan</a></li>
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>