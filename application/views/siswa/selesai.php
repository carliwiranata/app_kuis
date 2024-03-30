<div class="container mt-5 text-center ">
    <div class="alert alert-success" role="alert">
        Selamat <?= $this->session->userdata('nama') ?> anda telah menyelesaykan ujian dengan sungguh-sungguh 😉
    </div>
    <?php
    $hasil = $this->db->get_where('tb_jawaban', ['id_user' => $this->session->userdata('id_user'), 'hasil' => ''])->result_array();
    $pertanyaan = $this->db->get('tb_pertanyaan')->result_array();
    $benar = $this->soal->benar($this->session->userdata('id_user'))->result_array();
    $salah = $this->soal->salah($this->session->userdata('id_user'))->result_array();
    $benaresai = $this->soal->benaresai($this->session->userdata('id_user'))->result_array();
    $salahesai = $this->soal->salahesai($this->session->userdata('id_user'))->result_array();
    ?>
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <table class="table">
                <tr>
                    <th>Soal</th>
                    <th>Benar</th>
                    <th>Salah</th>
                </tr>
                <tr>
                    <td>Pilgan</td>
                    <td><?= count($benar) ?></td>
                    <td><?= count($salah) ?></td>
                </tr>
                <?php if (count($hasil) != 0) : ?>
                    <tr>
                        <td>Esay</td>
                        <td colspan="2">Jawaban esay akan di nilai instruktur</td>
                    </tr>
                <?php else : ?>
                    <tr>
                        <td>Esay</td>
                        <td><?= count($benaresai) ?></td>
                        <td><?= count($salahesai) ?></td>
                    </tr>
                <?php endif ?>
            </table>
            <?php if (count($hasil) == 0) : ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    $pertanyaan = 100 /  count($pertanyaan);
                    $hitungbenar = count($benar) + count($benaresai);
                    $nilai = $hitungbenar * $pertanyaan;
                    ?>

                    <h2><?= $nilai ?></h2>
                </div>
            <?php endif  ?>
        </div>
    </div>
</div>