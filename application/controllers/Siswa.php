<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'siswa') {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $id = $this->session->userdata('id_user');
        $user = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
        if ($user['status'] == 'mulai') {
            $this->load->view('templates/siswa/header', $data);
            $this->load->view('templates/siswa/navbar', $data);
            $this->load->view('siswa/index', $data);
            $this->load->view('templates/siswa/footer', $data);
        } else {
            $data['pilgan'] = $this->soal->getsoalpilgan($id)->result_array();
            redirect('siswa/soal/' . $data['pilgan'][0]['id_jawaban'] . '/');
        }
    }

    public function mulai()
    {
        $pilgan = $this->db->order_by('RAND()')->get_where('tb_pertanyaan', ['status' => 'pilgan'])->result_array();
        $esai = $this->db->order_by('RAND()')->get_where('tb_pertanyaan', ['status' => 'esai'])->result_array();
        $id = $this->session->userdata('id_user');
        $user = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
        if ($user['status'] == 'selesai') {
            redirect('siswa/selesai');
        } elseif ($user['status'] == 'belum selesai') {
            redirect('siswa/soal');
        }
        foreach ($pilgan as $p) {
            $data = [
                'id_user' => $id,
                'id_pertanyaan' => $p['id_pertanyaan']
            ];
            $this->db->insert('tb_jawaban', $data);
        }
        foreach ($esai as $p) {
            $data = [
                'id_user' => $id,
                'id_pertanyaan' => $p['id_pertanyaan']
            ];
            $this->db->insert('tb_jawaban', $data);
        }
        $data = ['status' => 'belum selesai'];
        $this->db->update('tb_user', $data, ['id_user' => $id]);
        $data['pilgan'] = $this->soal->getsoalpilgan($id)->result_array();
        $this->session->set_flashdata('berhasil', 'Selamat mengerjakan.');
        redirect('siswa/soal/' . $data['pilgan'][0]['id_jawaban']);
    }

    public function soal($id_jawaban = 0, $nomor = 1)
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $id = $this->session->userdata('id_user');
        $user = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
        $data['selesai'] = $this->db->get_where('tb_jawaban', ['id_user' => $id, 'jawaban' => ''])->result_array();
        $data['soalpilgan'] = $this->soal->soalpilgan($id_jawaban, $id)->row_array();
        if ($data['soalpilgan'] == null) {
            redirect('siswa');
        }
        $data['nomor'] = $nomor;
        $data['pilgan'] = $this->soal->getsoalpilgan($id)->result_array();
        $data['esai'] = $this->soal->getsoalesai($id)->result_array();
        if ($user['status'] == 'mulai') {
            redirect('siswa');
        } elseif ($user['status'] == 'belum selesai') {
            $this->load->view('templates/siswa/header', $data);
            $this->load->view('templates/siswa/navbar', $data);
            $this->load->view('siswa/soal', $data);
            $this->load->view('templates/siswa/footer', $data);
        } else {
            redirect('siswa/selesai');
        }
    }

    public function jawab($id = 0, $nomor = 1)
    {
        $data['pilgan'] = $this->db->get_where('tb_jawaban', ['id_jawaban' => $id])->row_array();
        if ($data['pilgan'] == null) {
            redirect('siswa/soal');
        }

        $jawaban = $this->input->post('jawaban' . $id);
        // var_dump($jawaban);
        // die;
        $id_pertanyaan = htmlspecialchars($this->input->post('id_pertanyaan'));
        $pertanyaan = $this->db->get_where('tb_pertanyaan', ['id_pertanyaan' => $id_pertanyaan])->row_array();
        if ($pertanyaan['nilai_benar'] == $jawaban) {
            $hasil = "Benar";
        } else {
            $hasil = "Salah";
        }


        $data = ['jawaban' => $jawaban, 'hasil' => $hasil];
        $this->db->update('tb_jawaban', $data, ['id_jawaban' => $id]);
        redirect('siswa/soal/' .  $id . '/' . $nomor);
    }

    public function esai($id_jawaban = 0, $nomor = 1)
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $id = $this->session->userdata('id_user');
        $user = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
        $data['selesai'] = $this->db->get_where('tb_jawaban', ['id_user' => $id, 'jawaban' => ''])->result_array();
        $data['soalesai'] = $this->soal->soalesai($id_jawaban, $id)->row_array();
        if ($data['soalesai'] == null) {
            redirect('siswa');
        }
        $data['nomor'] = $nomor;
        $data['esai'] = $this->soal->getsoalesai($id)->result_array();
        $data['pilgan'] = $this->soal->getsoalpilgan($id)->result_array();
        if ($user['status'] == 'mulai') {
            redirect('siswa');
        } elseif ($user['status'] == 'belum selesai') {
            $this->load->view('templates/siswa/header', $data);
            $this->load->view('templates/siswa/navbar', $data);
            $this->load->view('siswa/esai', $data);
            $this->load->view('templates/siswa/footer', $data);
        } else {
            redirect('siswa/selesai');
        }
    }

    public function jawabesai($id = 0, $nomor = 1)
    {
        $data['esai'] = $this->db->get_where('tb_jawaban', ['id_jawaban' => $id])->row_array();
        if ($data['esai'] == null) {
            redirect('siswa/esai');
        }

        // $id_jawaban = $this->input->post('id_jawaban');
        $jawaban = $this->input->post('jawaban' . $id);

        // $this->session->set_flashdata('id_jawaban', $id_jawaban);
        $data = ['jawaban' => $jawaban];
        $this->db->update('tb_jawaban', $data, ['id_jawaban' => $id]);
        redirect('siswa/esai/' . $id . '/' . $nomor);
    }

    public function selesai()
    {
        $id = $this->session->userdata('id_user');
        $user = $this->db->get_where('tb_user', ['id_user' => $id])->row_array();
        $data = ['status' => 'selesai'];
        $this->db->update('tb_user', $data, ['id_user' => $id]);
        if ($user['status'] == 'mulai') {
            redirect('siswa');
        } elseif ($user['status'] == 'belum selesai') {
            redirect('siswa/soal');
        } else {
            $data['title'] = 'Ujian LKP UTAMA JAYA';
            $data['benar'] = $this->soal->benar($id)->result_array();
            $data['salah'] = $this->soal->salah($id)->result_array();
            $this->load->view('templates/siswa/header', $data);
            $this->load->view('templates/siswa/navbar', $data);
            $this->load->view('siswa/selesai', $data);
            $this->load->view('templates/siswa/footer', $data);
        }
    }
}

/* End of file Siswa.php */
