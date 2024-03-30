<div class="section-header">
    <h1>Pertanyaan</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4>Data Pertanyaan</h4>
                    <div>
                        <a href="<?= base_url('admin/tambahpertanyaan') ?>" class="btn btn-primary "><i class="fas fa-plus"></i> Tambah pertanyaan pilgan</a>
                        <a href="<?= base_url('admin/tambahpertanyaanesai') ?>" class="btn btn-primary mx-2"><i class="fas fa-plus"></i> Tambah pertanyaan esai</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Pertanyaan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($pertanyaan as $p) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $no++ ?>
                                        </td>
                                        <td><?= $p['pertanyaan'] ?></td>
                                        <td>
                                            <div class="badge badge-success"><?= $p['status'] ?></div>
                                        </td>
                                        <td>
                                            <?php if ($p['status'] == 'pilgan') : ?>
                                                <a href="<?= base_url('admin/editpertanyaan/' . $p['id_pertanyaan']) ?>" class="btn btn-primary btn-sm mb-2"><i class="fas fa-edit"></i></a>
                                            <?php else : ?>
                                                <a href="<?= base_url('admin/editpertanyaanesai/' . $p['id_pertanyaan']) ?>" class="btn btn-primary btn-sm mb-2"><i class="fas fa-edit"></i></a>
                                            <?php endif ?>
                                            <button class="btn btn-danger btn-sm mb-2" data-toggle="modal" data-target="#hapus<?= $p['id_pertanyaan'] ?>"><i class="fas fa-trash-alt"></i></button>
                                            <button class="btn btn-info btn-sm mb-2" data-toggle="modal" data-target="#detail<?= $p['id_pertanyaan'] ?>"><i class="fas fa-info-circle"></i></button>
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
<?php foreach ($pertanyaan as $p) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="hapus<?= $p['id_pertanyaan'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('admin/hapuspertanyaan/' . $p['id_pertanyaan']) ?>" method="post">
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin hapus pertanyaan <b><?= $p['pertanyaan'] ?></b> ?</p>
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
<?php foreach ($pertanyaan as $p) : ?>
    <div class="modal fade" tabindex="-1" role="dialog" id="detail<?= $p['id_pertanyaan'] ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?= $p['pertanyaan'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if ($p['status'] == 'pilgan') : ?>
                        <ol type="a">
                            <li><?= $p['nilai_a'] ?></li>
                            <li><?= $p['nilai_b'] ?></li>
                            <li><?= $p['nilai_c'] ?></li>
                            <li><?= $p['nilai_d'] ?></li>
                            <li><?= $p['nilai_e'] ?></li>
                        </ol>
                    <?php endif ?>
                    <b>Jawaban : <?= $p['nilai_benar'] ?></b>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>