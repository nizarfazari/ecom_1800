<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">Jasa Perjalanan</div>
                <div class="breadcrumb-item">Kurir</div>
                <div class="breadcrumb-item">Form edit</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Forms</h2>
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <form action="<?= site_url('kurir/update') ?>" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Edit Kurir</h4>
                            </div>
                            <div class="card-body">
                                <input type="hidden" name="id" value="<?= $kurir->idKurir ?>">
                                <div class="form-group row">
                                    <label class="col-sm-3 form-label">Nama Kurir</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="namaKurir" placeholder="Nama kurir" value="<?= $kurir->namaKurir ?>">
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