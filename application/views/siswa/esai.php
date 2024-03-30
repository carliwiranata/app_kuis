<div class="container mt-5">
    <?php $id_jawaban = $pilgan[0]['id_jawaban'] ?>
    <?php $id_jawabanesai = $esai[0]['id_jawaban'] ?>
    <a href="<?= base_url('siswa/soal/' . $id_jawaban . '/') ?>" class="btn btn-primary mb-3">Soal Pilgan</a>
    <a href="<?= base_url('siswa/esai/' . $id_jawabanesai . '/') ?>" class="btn btn-primary mb-3">Soal Esai</a>
    <?php if (count($selesai) == 0) : ?>
        <button type="button" class="btn btn-danger mb-3" data-bs-toggle="modal" data-bs-target="#selesai">
            Selesai
        </button>
    <?php endif ?>
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <?php $a = 1; ?>
        <?php foreach ($esai as  $e) : ?>
            <li class="nav-item" role="presentation">
                <?php if ($e['jawaban'] == null) : ?>
                    <a class="btn <?= $nomor == $a ? 'btn-warning' : 'btn-primary' ?> mx-2 my-2" href="<?= base_url('siswa/esai/' . $e['id_jawaban'] . '/' . $a) ?>"><?= $a ?></a>
                <?php else : ?>
                    <a class=" btn <?= $nomor == $a ? 'btn-warning' : 'btn-success' ?> mx-2 my-2" href="<?= base_url('siswa/esai/' . $e['id_jawaban'] . '/' . $a) ?>"><?= $a ?></a>
                <?php endif ?>

            </li>
            <?php $a++; ?>
        <?php endforeach ?>
    </ul>
    <?= "$nomor.    " .  $soalesai['pertanyaan']  ?>
    <form action="<?= base_url('siswa/jawabesai/' . $soalesai['id_jawaban'] . '/' . $nomor) ?>" method="post">
        <!-- <input type="hidden" name="nomor_soal" value="<?= $a ?>"> -->
        <input type="hidden" name="id_pertanyaan" value="<?= $soalesai['id_pertanyaan'] ?>">
        <div class="my-3">
            <textarea class="form-control" required name="jawaban<?= $soalesai['id_jawaban'] ?>" id="exampleFormControlTextarea1" rows="3"><?= $soalesai['jawaban'] == null ? '' : $soalesai['jawaban'] ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary my-3">Simpan</button>
    </form>
</div>