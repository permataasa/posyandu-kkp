<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kader_model extends CI_Model
{
    // MULAI CRUD DATA KADER
    public function getDataKader()
    {
        $query = "SELECT kader.*, user.username
                    From kader JOIN user
                    ON kader.user_id = user.id_user
                    ";

        return $this->db->query($query)->result_array();
    }

    public function delDataKader($id)
    {
        $this->db->where('id_kader', $id);
        $this->db->delete('kader');
    }

    public function updDataKader($id, $data)
    {
        $this->db->where('id_kader', $id);
        $this->db->update('kader', $data);
    }
    // SELESAI CRUD DATA KADER
}
