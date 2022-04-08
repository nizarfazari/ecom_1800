<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Member</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">Member</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Data Member</h2>
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header justify-content-between">
                            <h4>Data Member</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Nama Konsumen</th>
                                        <th>Alamat</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php if (empty($member)) { ?>
                                        <tr>
                                            <td colspan="7" class="text-center">Data Kosong</td>
                                        </tr>
                                    <?php } else $no = 0;
                                    foreach ($member as $item) : $no++ ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $item->username ?></td>
                                            <td><?= $item->namaKonsumen ?></td>
                                            <td><?= $item->alamat ?></td>
                                            <td><?= $item->email ?></td>
                                            <td><?= $item->tlpn ?></td>
                                            <?php if ($item->statusAktif == "Y") { ?>
                                                <td><button class="btn btn-success">Aktif</button></td>
                                                <td>
                                                    <form action="<?= site_url('member/update/' . $item->idKonsumen);  ?>" method="post">
                                                        <input type="hidden" name="status" value="N">
                                                        <button type="submit" class="btn btn-danger">Tidak Aktif</button>
                                                    </form>
                                                </td>
                                            <?php } else if ($item->statusAktif == "N") {   ?>
                                                <td><button class="btn btn-danger">Tidak Aktif</button></td>
                                                <td>
                                                    <form action="<?= site_url('member/update/' . $item->idKonsumen);  ?>" method="post">
                                                        <input type="hidden" name="status" value="Y">
                                                        <button type="submit" class="btn btn-success">Aktif</button>
                                                    </form>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <nav class="d-inline-block">
                                <ul class="pagination mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>