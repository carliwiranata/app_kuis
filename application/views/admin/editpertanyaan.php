<div class="section-header">
    <h1>Pertanyaan</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Pertanyaan</h4>
                </div>
                <form action="<?= base_url('admin/editpertanyaan/' . $pertanyaan['id_pertanyaan']) ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pertanyaan <span class="text-danger">*</span></label>
                            <textarea type="text" name="pertanyaan" class="form-control"><?= $pertanyaan['pertanyaan'] ?></textarea>
                            <small class="text-danger"><?= form_error('pertanyaan')  ?></small>
                        </div>
                        <div class="form-group">
                            <label>Jawaban <span class="text-danger">*</span></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        A
                                    </div>
                                </div>
                                <input type="text" name="nilai_a" value="<?= $pertanyaan['nilai_a'] ?>" class="form-control">
                            </div>
                            <small class="text-danger"><?= form_error('nilai_a')  ?></small>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        B
                                    </div>
                                </div>
                                <input type="text" name="nilai_b" value="<?= $pertanyaan['nilai_b'] ?>" class="form-control">
                            </div>
                            <small class="text-danger"><?= form_error('nilai_b')  ?></small>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        C
                                    </div>
                                </div>
                                <input type="text" name="nilai_c" value="<?= $pertanyaan['nilai_c'] ?>" class="form-control">
                            </div>
                            <small class="text-danger"><?= form_error('nilai_c')  ?></small>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        D
                                    </div>
                                </div>
                                <input type="text" name="nilai_d" value="<?= $pertanyaan['nilai_d'] ?>" class="form-control">
                            </div>
                            <small class="text-danger"><?= form_error('nilai_d')  ?></small>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        E
                                    </div>
                                </div>
                                <input type="text" name="nilai_e" value="<?= $pertanyaan['nilai_e'] ?>" class="form-control">
                            </div>
                            <small class="text-danger"><?= form_error('nilai_e')  ?></small>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Benar
                                    </div>
                                </div>
                                <input type="text" name="nilai_benar" value="<?= $pertanyaan['nilai_benar'] ?>" class="form-control">
                            </div>
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