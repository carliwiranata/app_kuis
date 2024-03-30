<div class="section-header">
    <h1>Siswa</h1>
</div>

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4>Data Siswa Selesai Ujian</h4>
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
                                            <a href="<?= base_url('admin/jawaban/' . $s['id_user']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Cek Jawaban</a>
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