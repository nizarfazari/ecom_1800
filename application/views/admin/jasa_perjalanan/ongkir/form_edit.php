<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">Jasa Perjalanan</div>
                <div class="breadcrumb-item">Ongkir</div>
                <div class="breadcrumb-item">Form edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <form action="<?= site_url('ongkir/update') ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Edit Ongkir</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 form-label">Nama Kurir</label>
                                    <div class="col-sm-9">
                                        <select id="inputState" class="form-control" name="idKurir">
                                            <option value="<?= $ongkir->idKurir ?>"><?= $ongkir->namaKurir  ?></option>
                                            <?php foreach ($kurir as $item) : ?>
                                                <option value="<?= $item->idKurir ?>"><?= $item->namaKurir ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?= $ongkir->idBiayaKirim ?>">
                                <div class="form-group row">
                                    <label class="col-sm-3 form-label">Kota Asal</label>
                                    <div class="col-sm-9">
                                        <select id="inputState" class="form-control" name="idKotaAsal">
                                            <option value="<?= $ongkir->idKotaAsal ?>"><?= $ongkir->asal ?></option>
                                            <?php foreach ($kota as $item) : ?>
                                                <option value="<?= $item->idKota ?>"><?= $item->namaKota ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-label">Kota Tujuan</label>
                                    <div class="col-sm-9">
                                        <select id="inputState" class="form-control" name="idKotaTujuan">
                                            <option value="<?= $ongkir->idKotaTujuan ?>"><?= $ongkir->tujuan ?></option>
                                            <?php foreach ($kota as $item) : ?>
                                                <option value="<?= $item->idKota ?>"><?= $item->namaKota ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 form-label">Biaya</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="biaya" placeholder="Nama ongkir" value="<?= $ongkir->biaya ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                                <button class="btn btn-secondary" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>