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
        <?php $a = 1 ?>
        <?php foreach ($pilgan as $p) : ?>
            <li class="nav-item" role="presentation">
                <?php if ($p['jawaban'] == null) : ?>
                    <a class="btn <?= $nomor == $a ? 'btn-warning' : 'btn-primary' ?> mx-2 my-2" href="<?= base_url('siswa/soal/' . $p['id_jawaban'] . '/' . $a) ?>"><?= $a ?></a>
                <?php else : ?>
                    <a class=" btn <?= $nomor == $a ? 'btn-warning' : 'btn-success' ?> mx-2 my-2" href="<?= base_url('siswa/soal/' . $p['id_jawaban'] . '/' . $a) ?>"><?= $a ?></a>
                <?php endif ?>

            </li>
            <?php $a++; ?>
        <?php endforeach ?>
    </ul>
    <?= "$nomor.    " .  $soalpilgan['pertanyaan']  ?>
    <form action="<?= base_url('siswa/jawab/' . $soalpilgan['id_jawaban'] . '/' . $nomor) ?>" method="post">
        <input type="hidden" name="id_pertanyaan" value="<?= $soalpilgan['id_pertanyaan'] ?>">
        <div class="form-check">
            <button type="submit" class="btn btn-white border-0">
                <input required value="<?= $soalpilgan['nilai_a'] ?>" class="form-check-input" type="radio" name="jawaban<?= $soalpilgan['id_jawaban'] ?>" id="jawaban<?= $a ?>_1" <?= $soalpilgan['jawaban'] == $soalpilgan['nilai_a'] ? 'checked' : '' ?>>
                <label class="form-check-label" for="jawaban<?= $a ?>_1">
                    A. <?= $soalpilgan['nilai_a'] ?>
                </label>
            </button>
        </div>
        <div class="form-check">
            <button type="submit" class="btn btn-white border-0">
                <input required value="<?= $soalpilgan['nilai_b'] ?>" class="form-check-input" type="radio" name="jawaban<?= $soalpilgan['id_jawaban'] ?>" id="jawaban<?= $a ?>_2" <?= $soalpilgan['jawaban'] == $soalpilgan['nilai_b'] ? 'checked' : '' ?>>
                <label class="form-check-label" for="jawaban<?= $a ?>_2">
                    B. <?= $soalpilgan['nilai_b'] ?>
                </label>
            </button>

        </div>
        <div class="form-check">
            <button type="submit" class="btn btn-white border-0">
                <input required value="<?= $soalpilgan['nilai_c'] ?>" class="form-check-input" type="radio" name="jawaban<?= $soalpilgan['id_jawaban'] ?>" id="jawaban<?= $a ?>_3" <?= $soalpilgan['jawaban'] == $soalpilgan['nilai_c'] ? 'checked' : '' ?>>
                <label class="form-check-label" for="jawaban<?= $a ?>_3">
                    C. <?= $soalpilgan['nilai_c'] ?>
                </label>
            </button>

        </div>
        <div class="form-check">
            <button type="submit" class="btn btn-white border-0">
                <input required value="<?= $soalpilgan['nilai_d'] ?>" class="form-check-input" type="radio" name="jawaban<?= $soalpilgan['id_jawaban'] ?>" id="jawaban<?= $a ?>_4" <?= $soalpilgan['jawaban'] == $soalpilgan['nilai_d'] ? 'checked' : '' ?>>
                <label class="form-check-label" for="jawaban<?= $a ?>_4">
                    D. <?= $soalpilgan['nilai_d'] ?>
                </label>
            </button>
        </div>
        <div class="form-check">
            <button type="submit" class="btn btn-white border-0">
                <input required value="<?= $soalpilgan['nilai_e'] ?>" class="form-check-input" type="radio" name="jawaban<?= $soalpilgan['id_jawaban'] ?>" id="jawaban<?= $a ?>_5" <?= $soalpilgan['jawaban'] == $soalpilgan['nilai_e'] ? 'checked' : '' ?>>
                <label class="form-check-label" for="jawaban<?= $a ?>_5">
                    E. <?= $soalpilgan['nilai_e'] ?>
                </label>
            </button>
        </div>

    </form>

</div>