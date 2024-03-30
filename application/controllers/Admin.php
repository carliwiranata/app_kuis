<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            $this->session->set_flashdata('gagal', 'Anda harus login terlebih dahulu');
            redirect('auth');
        }
    }


    public function index()
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $data['siswa'] = $this->db->get_where('tb_user', ['level' => 'siswa'])->result_array();
        $data['kuis'] = $this->db->get_where('tb_user', ['status' => 'selesai', 'level' => 'siswa'])->result_array();
        $data['pertanyaan'] = $this->db->get('tb_pertanyaan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function siswa()
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $data['siswa'] = $this->db->get_where('tb_user', ['level' => 'siswa'])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahsiswa()
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $data['siswa'] = $this->db->order_by('username', 'DESC')->get_where('tb_user', ['level' => 'siswa'])->row_array();

        $this->form_validation->set_rules('username', 'Usernam', 'trim|required|is_unique[tb_user.username]');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('sekolah', 'Sekolah', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambahsiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
            $sekolah = htmlspecialchars($this->input->post('sekolah'));
            $password = "LkpRpl#";
            $password = password_hash($password, PASSWORD_DEFAULT);

            $data = [
                'username' => $username,
                'nama' => $nama,
                'jk' => $jenis_kelamin,
                'sekolah' => $sekolah,
                'password' => $password,
                'level' => 'siswa'
            ];
            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('berhasil', 'Data berhasil ditambah');
            redirect('admin/siswa');
        }
    }
    public function editsiswa($id = 0)
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $data['siswa'] = $this->db->get_where('tb_user', ['level' => 'siswa', 'id_user' => $id])->row_array();
        if ($data['siswa'] == null) {
            redirect('admin/siswa');
        }

        $this->form_validation->set_rules('username', 'Usernam', 'trim|required');
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('sekolah', 'Sekolah', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/editsiswa', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $username = htmlspecialchars($this->input->post('username'));
            $nama = htmlspecialchars($this->input->post('nama'));
            $jenis_kelamin = htmlspecialchars($this->input->post('jenis_kelamin'));
            $sekolah = htmlspecialchars($this->input->post('sekolah'));
            $password = "LkpRpl#";
            $password = password_hash($password, PASSWORD_DEFAULT);

            $data = [
                'username' => $username,
                'nama' => $nama,
                'jk' => $jenis_kelamin,
                'sekolah' => $sekolah,
                'password' => $password,
                'level' => 'siswa'
            ];
            $this->db->update('tb_user', $data, ['id_user' => $id]);
            $this->session->set_flashdata('berhasil', 'Data berhasil diedit');
            redirect('admin/siswa');
        }
    }

    public function hapussiswa($id = 0)
    {
        $data['siswa'] = $this->db->get_where('tb_user', ['level' => 'siswa', 'id_user' => $id])->row_array();
        if ($data['siswa'] == null) {
            redirect('admin/siswa');
        }

        $this->db->delete('tb_user', ['id_user' => $id]);
        $this->session->set_flashdata('berhasil', 'Data berhasil dihapus');
        redirect('admin/siswa');
    }

    public function pertanyaan()
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $data['pertanyaan'] = $this->db->order_by('status', 'ASC')->get('tb_pertanyaan')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/pertanyaan', $data);
        $this->load->view('templates/footer', $data);
    }

    public function tambahpertanyaan()
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required|is_unique[tb_pertanyaan.pertanyaan]');
        $this->form_validation->set_rules('nilai_a', 'nilai a', 'trim|required');
        $this->form_validation->set_rules('nilai_b', 'nilai b', 'trim|required');
        $this->form_validation->set_rules('nilai_c', 'nilai c', 'trim|required');
        $this->form_validation->set_rules('nilai_d', 'nilai d', 'trim|required');
        $this->form_validation->set_rules('nilai_e', 'nilai e', 'trim|required');
        $this->form_validation->set_rules('nilai_benar', 'nilai benar', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambahpertanyaan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $pertanyaan = $this->input->post('pertanyaan');
            $nilai_a = $this->input->post('nilai_a');
            $nilai_b = $this->input->post('nilai_b');
            $nilai_c = $this->input->post('nilai_c');
            $nilai_d = $this->input->post('nilai_d');
            $nilai_e = $this->input->post('nilai_e');
            $nilai_benar = $this->input->post('nilai_benar');

            $data = [
                'pertanyaan' => $pertanyaan,
                'nilai_a' => $nilai_a,
                'nilai_b' => $nilai_b,
                'nilai_c' => $nilai_c,
                'nilai_d' => $nilai_d,
                'nilai_e' => $nilai_e,
                'nilai_benar' => $nilai_benar,
                'status' => 'pilgan'
            ];

            $this->db->insert('tb_pertanyaan', $data);
            $this->session->set_flashdata('berhasil', 'Data berhasil ditambah');
            redirect('admin/pertanyaan');
        }
    }
    public function editpertanyaan($id = 0)
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $data['pertanyaan'] = $this->db->get_where('tb_pertanyaan', ['id_pertanyaan' => $id])->row_array();
        if ($data['pertanyaan'] == null) {
            redirect('admin/pertanyaan');
        }
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
        $this->form_validation->set_rules('nilai_a', 'nilai a', 'trim|required');
        $this->form_validation->set_rules('nilai_b', 'nilai b', 'trim|required');
        $this->form_validation->set_rules('nilai_c', 'nilai c', 'trim|required');
        $this->form_validation->set_rules('nilai_d', 'nilai d', 'trim|required');
        $this->form_validation->set_rules('nilai_e', 'nilai e', 'trim|required');
        $this->form_validation->set_rules('nilai_benar', 'nilai benar', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/editpertanyaan', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $pertanyaan = $this->input->post('pertanyaan');
            $nilai_a = $this->input->post('nilai_a');
            $nilai_b = $this->input->post('nilai_b');
            $nilai_c = $this->input->post('nilai_c');
            $nilai_d = $this->input->post('nilai_d');
            $nilai_e = $this->input->post('nilai_e');
            $nilai_benar = $this->input->post('nilai_benar');

            $data = [
                'pertanyaan' => $pertanyaan,
                'nilai_a' => $nilai_a,
                'nilai_b' => $nilai_b,
                'nilai_c' => $nilai_c,
                'nilai_d' => $nilai_d,
                'nilai_e' => $nilai_e,
                'nilai_benar' => $nilai_benar,
                'status' => 'pilgan'
            ];

            $this->db->update('tb_pertanyaan', $data, ['id_pertanyaan' => $id]);
            $this->session->set_flashdata('berhasil', 'Data berhasil diedit');
            redirect('admin/pertanyaan');
        }
    }

    public function tambahpertanyaanesai()
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';

        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required|is_unique[tb_pertanyaan.pertanyaan]');
        $this->form_validation->set_rules('nilai_benar', 'nilai benar', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambahpertanyaanesai', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $pertanyaan = htmlspecialchars($this->input->post('pertanyaan'));
            $nilai_benar = htmlspecialchars($this->input->post('nilai_benar'));

            $data = [
                'pertanyaan' => $pertanyaan,
                'nilai_benar' => $nilai_benar,
                'status' => 'esai'
            ];

            $this->db->insert('tb_pertanyaan', $data);
            $this->session->set_flashdata('berhasil', 'Data berhasil ditambah');
            redirect('admin/pertanyaan');
        }
    }
    public function editpertanyaanesai($id = 0)
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $data['pertanyaan'] = $this->db->get_where('tb_pertanyaan', ['id_pertanyaan' => $id])->row_array();
        if ($data['pertanyaan'] == null) {
            redirect('admin/pertanyaan');
        }
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'trim|required');
        $this->form_validation->set_rules('nilai_benar', 'nilai benar', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/editpertanyaanesai', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $pertanyaan = htmlspecialchars($this->input->post('pertanyaan'));
            $nilai_benar = htmlspecialchars($this->input->post('nilai_benar'));

            $data = [
                'pertanyaan' => $pertanyaan,
                'nilai_benar' => $nilai_benar,
                'status' => 'esai'
            ];

            $this->db->update('tb_pertanyaan', $data, ['id_pertanyaan' => $id]);
            $this->session->set_flashdata('berhasil', 'Data berhasil diedit');
            redirect('admin/pertanyaan');
        }
    }

    public function hapuspertanyaan($id = 0)
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $data['pertanyaan'] = $this->db->get_where('tb_pertanyaan', ['id_pertanyaan' => $id])->row_array();
        if ($data['pertanyaan'] == null) {
            redirect('admin/pertanyaan');
        }

        $this->db->delete('tb_pertanyaan', ['id_pertanyaan' => $id]);
        $this->session->set_flashdata('berhasil', 'Data berhasil dihapus');
        redirect('admin/pertanyaan');
    }

    public function gantipassword()
    {

        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $this->form_validation->set_rules('password', 'Password', 'trim|required|matches[konfirmasi_password]');
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/gantipassword', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $password = htmlspecialchars($this->input->post('password'));
            $id = $this->session->userdata('id_user');
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data = ['password' => $password];
            $this->db->update('tb_user', $data, ['id_user' => $id]);
            $this->session->set_flashdata('berhasil', 'Password berhasil diganti');
            redirect('admin/gantipassword');
        }
    }

    public function kuis()
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $data['siswa'] = $this->db->get_where('tb_user', ['level' => 'siswa', 'status' => 'selesai'])->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/kuis', $data);
        $this->load->view('templates/footer', $data);
    }

    public function jawaban($id = 0)
    {
        $data['pilgan'] = $this->soal->getsoalpilgan($id)->result_array();
        $data['esai'] = $this->soal->getsoalesai($id)->result_array();
        if ($data['pilgan'] == null and $data['esai'] == null) {
            redirect('admin/kuis');
        }
        $data['title'] = 'Ujian LKP UTAMA JAYA';
        $data['siswa'] = $this->db->get_where('tb_user', ['level' => 'siswa', 'status' => 'selesai', 'id_user' => $id])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/jawaban', $data);
        $this->load->view('templates/footer', $data);
    }
    
    public function nilaiesai()
    {
        $id_user = $this->input->post('id_user');
        $id_jawaban = $this->input->post('id_jawaban');
        for ($i = 0; $i < count($id_jawaban); $i++) {
            $data[$i] = ['hasil' => $this->input->post('hasil[' . $i . ']')];
            $this->db->update('tb_jawaban', $data[$i], ['id_jawaban' => $id_jawaban[$i]]);
        }
        $this->session->set_flashdata('berhasil', 'Hasil berhasil disimpan');
        redirect('admin/jawaban/' . $id_user);
    }
}

/* End of file Admin.php */
