<?php
if ($siswa == null) {
    $username = date('Y') . sprintf('%03d', 1);
} else {
    $tahun = substr($siswa['username'], 0, 4);
    if ($tahun == date(('Y'))) {
        $username = $siswa['username'] + 1;
    } else {
        $username = date('Y') . sprintf('%03d', 1);
    }
}




?>


<div class="section-header">
    <h1>Siswa</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-lg-7 col-md-6 col-lg-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h4>Tambah Siswa</h4>
                </div>
                <form action="<?= base_url('admin/tambahsiswa') ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Username <span class="text-danger">*</span></label>
                            <input readonly type="text" name="username" value="<?= $username ?>" class="form-control">
                            <small class="text-danger"><?= form_error('username')  ?></small>
                        </div>
                        <div class="form-group">
                            <label>Nama <span class="text-danger">*</span></label>
                            <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control">
                            <small class="text-danger"><?= form_error('nama')  ?></small>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin <span class="text-danger">*</span></label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki" <?= set_value('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                <option value="Perempuan" <?= set_value('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                            <small class="text-danger"><?= form_error('jenis_kelamin')  ?></small>
                        </div>
                        <div class="form-group">
                            <label>Sekolah <span class="text-danger">*</span></label>
                            <input type="text" name="sekolah" value="<?= set_value('sekolah') ?>" class="form-control">
                            <small class="text-danger"><?= form_error('sekolah')  ?></small>
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