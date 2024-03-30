<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Ujian LKP UTAMA JAYA';

        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'Username wajib diisi'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Password wajib diisi'
        ]);


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login', $data);
        } else {
            $username = htmlspecialchars($this->input->post('username', true));
            $password = htmlspecialchars($this->input->post('password', true));

            $user = $this->db->get_where('tb_user', ['username' => $username])->row_array();

            // cek username
            if ($user) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata('level', $user['level']);
                    $this->session->set_userdata('nama', $user['nama']);
                    $this->session->set_userdata('id_user', $user['id_user']);
                    $this->session->set_flashdata('berhasil', 'Anda berhasil login');
                    if ($user['level'] == 'admin') {
                        redirect('admin');
                    } else {
                        redirect('siswa');
                    }
                } else {
                    $this->session->set_flashdata('gagal', 'Password anda salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('gagal', 'Username anda belum terdaftar');
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('id_user');
        $this->session->set_flashdata('berhasil', 'Anda berhasil  logout');
        redirect('auth');
    }
}

/* End of file Auth.php */
