<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="<?= site_url('user/auth/act_login') ?>" class="needs-validation" novalidate="">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" id="" class="form-control">
                                <div class="invalid-feedback">
                                    Plese fill ur username
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" name="password" id="" class="form-control">
                                <div class="invalid-feedback">
                                    Plese fill ur username
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>