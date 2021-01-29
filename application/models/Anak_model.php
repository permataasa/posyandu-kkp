<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak_model extends CI_Model
{
    // MULAI CRUD DATA ANAK
    public function getDataAnak()
    {
        $query = "SELECT anak.*, ibu.nama_ibu
                    From anak JOIN ibu
                    ON anak.ibu_id = ibu.id_ibu
                    ";

        return $this->db->query($query)->result_array();
    }

    public function delDataAnak($id)
    {
        $this->db->where('id_anak', $id);
        $this->db->delete('anak');
    }

    public function updDataAnak($id, $data)
    {
        $this->db->where('id_anak', $id);
        $this->db->update('anak', $data);
    }
    // SELESAI CRUD DATA ANAK
}
