<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_soal extends CI_Model
{
    public function getsoalpilgan($id)
    {
        $query = "SELECT * FROM tb_jawaban JOIN tb_pertanyaan ON tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan WHERE tb_pertanyaan.status = 'pilgan' AND tb_jawaban.id_user = '$id'";
        return $this->db->query($query);
    }

    public function getsoalesai($id)
    {
        $query = "SELECT * FROM tb_jawaban JOIN tb_pertanyaan ON tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan WHERE tb_pertanyaan.status = 'esai' AND tb_jawaban.id_user = '$id'";
        return $this->db->query($query);
    }

    public function soalpilgan($id_jawaban, $id)
    {
        $query = "SELECT * FROM tb_jawaban JOIN tb_pertanyaan ON tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan WHERE tb_pertanyaan.status = 'pilgan' AND tb_jawaban.id_user = '$id' AND tb_jawaban.id_jawaban = '$id_jawaban'";
        return $this->db->query($query);
    }
    public function soalesai($id_jawaban, $id)
    {
        $query = "SELECT * FROM tb_jawaban JOIN tb_pertanyaan ON tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan WHERE tb_pertanyaan.status = 'esai' AND tb_jawaban.id_user = '$id' AND tb_jawaban.id_jawaban = '$id_jawaban'";
        return $this->db->query($query);
    }

    public function benar($id)
    {
        $query = "SELECT * FROM tb_jawaban JOIN tb_pertanyaan ON tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan WHERE tb_pertanyaan.status = 'pilgan' AND tb_jawaban.id_user = '$id' AND tb_jawaban.hasil = 'Benar'";
        return $this->db->query($query);
    }
    public function salah($id)
    {
        $query = "SELECT * FROM tb_jawaban JOIN tb_pertanyaan ON tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan WHERE tb_pertanyaan.status = 'pilgan' AND tb_jawaban.id_user = '$id' AND tb_jawaban.hasil = 'Salah'";
        return $this->db->query($query);
    }
    public function benaresai($id)
    {
        $query = "SELECT * FROM tb_jawaban JOIN tb_pertanyaan ON tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan WHERE tb_pertanyaan.status = 'esai' AND tb_jawaban.id_user = '$id' AND tb_jawaban.hasil = 'Benar'";
        return $this->db->query($query);
    }
    public function salahesai($id)
    {
        $query = "SELECT * FROM tb_jawaban JOIN tb_pertanyaan ON tb_pertanyaan.id_pertanyaan = tb_jawaban.id_pertanyaan WHERE tb_pertanyaan.status = 'esai' AND tb_jawaban.id_user = '$id' AND tb_jawaban.hasil = 'Salah'";
        return $this->db->query($query);
    }
}

/* End of file Model_soal.php */
