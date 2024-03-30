<div class="section-header">
    <h1>Pertanyaan</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Pertanyaan Esay</h4>
                </div>
                <form action="<?= base_url('admin/tambahpertanyaanesai') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pertanyaan <span class="text-danger">*</span></label>
                            <textarea type="text" name="pertanyaan" class="form-control"><?= set_value('pertanyaan') ?></textarea>
                            <small class="text-danger"><?= form_error('pertanyaan')  ?></small>
                        </div>
                        <div class="form-group">
                            <label>Jawaban <span class="text-danger">*</span></label>
                            <textarea type="text" name="nilai_benar" class="form-control"><?= set_value('nilai_benar') ?></textarea>
                            <small class="text-danger"><?= form_error('nilai_benar')  ?></small>
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