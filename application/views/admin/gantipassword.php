<div class="section-header">
    <h1>Ganti Password</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Ganti Password</h4>
                </div>
                <form action="<?= base_url('admin/gantipassword') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control">
                            <small class="text-danger"><?= form_error('password')  ?></small>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password <span class="text-danger">*</span></label>
                            <input type="password" name="konfirmasi_password" class="form-control">
                            <small class="text-danger"><?= form_error('konfirmasi_password')  ?></small>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary float-right mb-3">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
</section>
</div>