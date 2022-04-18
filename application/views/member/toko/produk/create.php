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
                        <h4>Menu Toko</h4>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="" class="nav-link">Beranda</a></li>
                            <li class="nav-item"><a href="<?= site_url('user/produk/index') ?>" class="nav-link">Produk</a></li>
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
                            <div class="card-header">
                                <h4>Form Membuat Toko Baru</h4>
                            </div>

                            <form action="<?= site_url('user/produk/store_produk') ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <input type="hidden" name="idToko" value="<?= $idToko ?>">
                                    <div class="form-group row ml-4">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Kategori</label>
                                        <div class="col-sm-9">
                                            <select id="inputState" class="form-control" name="idKategori">
                                                <?php if (empty($kategori)) { ?>
                                                    <option>Data Kosong</option>
                                                <?php } else
                                                    foreach ($kategori as $item) : ?>
                                                    <option value="<?= $item->idkat ?>"><?= $item->namakat ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ml-4">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Produk</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" name="namaProduk">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-4">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Foto Produk</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="gambar" id="">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-4">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Harga Produk</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" name="harga">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-4">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Stok</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" name="stok">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-4">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Berat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" name="berat">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-4">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="deskripsi"></textarea>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mr-5 mt-5">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>