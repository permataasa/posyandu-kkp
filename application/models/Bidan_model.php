<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidan_model extends CI_Model
{
    // MULAI CRUD DATA BIDAN
    public function getDataBidan()
    {
        $query = "SELECT * from bidan";

        return $this->db->query($query)->result_array();
    }

    public function getDataUsers()
    {
        $query = "SELECT * From user";

        return $this->db->query($query)->result_array();
    }

    public function delDataBidan($id)
    {
        $this->db->where('id_bidan', $id);
        $this->db->delete('bidan');
    }

    public function updDataBidan($id, $data)
    {
        $this->db->where('id_bidan', $id);
        $this->db->update('bidan', $data);
    }
    // SELESAI CRUD DATA BIDAN
}
