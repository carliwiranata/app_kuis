<div class="container mt-5 text-center ">
    <div class="alert alert-success" role="alert">
        Selamat datang <?= $this->session->userdata('nama') ?> dan selamat ujian
    </div>
    <a href="<?= base_url('siswa/mulai') ?>" class="btn btn-primary">Mulai Ujian</a>
</div>