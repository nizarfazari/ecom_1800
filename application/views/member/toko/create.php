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
                            <div class="card-header">
                                <h4>Form Membuat Toko Baru</h4>
                            </div>
                            <form action="<?= site_url('user/home/store_toko') ?>" method="POST" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row ml-4">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Toko</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="inputEmail3" name="namaToko">
                                        </div>
                                    </div>
                                    <div class="form-group row ml-4">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="deskripsi"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row ml-4">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Logo Toko</label>
                                        <div class="col-sm-9">
                                            <input type="file" name="gambar" id="">
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