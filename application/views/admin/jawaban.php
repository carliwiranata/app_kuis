<div class="section-header">
    <h1>Siswa</h1>
</div>
<?php
$hasil = $this->db->get_where('tb_jawaban', ['id_user' => $siswa['id_user'], 'hasil' => ''])->result_array();
$pertanyaan = $this->db->get('tb_pertanyaan')->result_array();
$benar = $this->soal->benar($siswa['id_user'])->result_array();
$salah = $this->soal->salah($siswa['id_user'])->result_array();
$benaresai = $this->soal->benaresai($siswa['id_user'])->result_array();
$salahesai = $this->soal->salahesai($siswa['id_user'])->result_array();
?>
<div class="section-body">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Siswa</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Sekolah</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?= $siswa['nama'] ?>
                                    </td>
                                    <td>
                                        <?= $siswa['jk'] ?>
                                    </td>
                                    <td>
                                        <?= $siswa['sekolah'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (count($hasil) != 0) {
                                            echo "-";
                                        } else {
                                            $pertanyaan = 100 /  count($pertanyaan);
                                            $hitungbenar = count($benar) + count($benaresai);
                                            echo  $nilai = $hitungbenar * $pertanyaan;
                                        }


                                        ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4>Pilihan Ganda</h4>
                    <div>
                        <p>Benar : <?= count($benar) ?> | Salah : <?= count($salah) ?></p>
                    </div>
                </div>
                <div class="card-body">
                    <ol>
                        <?php foreach ($pilgan as $p) : ?>
                            <li class="<?= $p['jawaban'] == $p['nilai_benar'] ? '' : 'text-danger' ?>"><?= $p['pertanyaan'] ?> </li>
                            <ol type="a">
                                <?php if ($p['nilai_a'] == $p['jawaban']) : ?>
                                    <b>
                                        <li><?= $p['nilai_a'] ?></li>
                                    </b>
                                <?php else : ?>
                                    <li><?= $p['nilai_a'] ?></li>
                                <?php endif ?>
                                <?php if ($p['nilai_b'] == $p['jawaban']) : ?>
                                    <b>
                                        <li><?= $p['nilai_b'] ?></li>
                                    </b>
                                <?php else : ?>
                                    <li><?= $p['nilai_b'] ?></li>
                                <?php endif ?>
                                <?php if ($p['nilai_c'] == $p['jawaban']) : ?>
                                    <b>
                                        <li><?= $p['nilai_c'] ?></li>
                                    </b>
                                <?php else : ?>
                                    <li><?= $p['nilai_c'] ?></li>
                                <?php endif ?>
                                <?php if ($p['nilai_d'] == $p['jawaban']) : ?>
                                    <b>
                                        <li><?= $p['nilai_d'] ?></li>
                                    </b>
                                <?php else : ?>
                                    <li><?= $p['nilai_d'] ?></li>
                                <?php endif ?>
                                <?php if ($p['nilai_e'] == $p['jawaban']) : ?>
                                    <b>
                                        <li><?= $p['nilai_e'] ?></li>
                                    </b>
                                <?php else : ?>
                                    <li><?= $p['nilai_e'] ?></li>
                                <?php endif ?>
                            </ol><br>
                            <ul style="list-style-type: none;">
                                <li>Kunci Jawaban <span class="text-danger">*</span></li>
                            </ul>
                            <ol type="a" <?= $p['nilai_a'] == $p['nilai_benar'] ? 'start="1"' : ($p['nilai_b'] == $p['nilai_benar'] ? 'start="2"' : ($p['nilai_c'] == $p['nilai_benar'] ? 'start="3"' : ($p['nilai_d'] == $p['nilai_benar'] ? 'start="4"' : 'start="5"'))) ?>>

                                <b>
                                    <li><?= $p['nilai_benar'] ?></li>
                                </b>
                            </ol>
                        <?php endforeach ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header justify-content-between">
                    <h4>Esay</h4>
                    <div>
                        <p>Benar : <?= count($benaresai) ?> | Salah : <?= count($salahesai) ?></p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form action="<?= base_url('admin/nilaiesai') ?>" method="post">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pertanyaan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <input type="hidden" name="id_user" value="<?= $siswa['id_user'] ?>">
                                    <?php
                                    $no = 1;
                                    foreach ($esai as $e) :
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="py-3 text-justify" style="width: 800px;">
                                                <?= $e['pertanyaan'] ?> <br>
                                                <p class="text-dark">Jawaban = <b><?= $e['jawaban'] ?></b></p>
                                                Kunci Jawaban =
                                                <?= $e['nilai_benar'] ?>
                                            </td>
                                            <td>
                                                <input type="hidden" name="id_jawaban[]" value="<?= $e['id_jawaban'] ?>">
                                                <select required name="hasil[]" class="form-control">
                                                    <option value=""></option>
                                                    <option value="Benar" <?= $e['hasil'] == 'Benar' ? 'selected' : '' ?>>✔</option>
                                                    <option value="Salah" <?= $e['hasil'] == 'Salah' ? 'selected' : '' ?>>❌</option>
                                                </select>
                                                <small class="text-danger"><?= form_error('jenis_kelamin')  ?></small>
                                            </td>
                                        </tr>

                                    <?php endforeach ?>

                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mt-3 float-right">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>
</section>
</div>