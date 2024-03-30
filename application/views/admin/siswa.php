<div class="section-header">
    <h1>Siswa</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4>Data Siswa</h4>
                    <a href="<?= base_url('admin/tambahsiswa') ?>" class="btn btn-primary "><i class="fas fa-user-plus"></i> Tambah siswa</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Sekolah</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($siswa as $s) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td><?= $s['nama'] ?></td>
                                        <td><?= $s['jk'] ?></td>
                                        <td><?= $s['sekolah'] ?></td>
                                        <td>
                                            <?php if ($s['status'] == 'selesai') : ?>
                                                <div class="badge badge-success"><?= $s['status'] ?></div>
                                            <?php else :  ?>
                                                <div class="badge badge-warning"><?= $s['status'] ?></div>
                                            <?php endif ?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url('admin/editsiswa/' . $s['id_user']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $s['id_user'] ?>"><i class="fas fa-trash-alt"></i></button>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#detail<?= $s['id_user'] ?>"><i class="fas fa-info-circle"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
</section>
</div>




<!-- modal hapus -->
<?php foreach ($siswa as $s) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus<?= $s['id_user'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/hapussiswa/' . $s['id_user']) ?>" method="post">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin hapus siswa <b><?= $s['nama'] ?></b> ?</p>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!-- modal detail -->
<?php foreach ($siswa as $s) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="detail<?= $s['id_user'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $s['nama'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><?= $s['username'] ?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td>LkpRpl#</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>