<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Imunisasi_model extends CI_Model
{
    public $table = "imunisasi";

    // MULAI GET, ADD DATA ANAK IBU
    public function getDataAnakIbu()
    {
        $query = "SELECT anak.*, ibu.nama_ibu
                    From anak JOIN ibu
                    ON anak.ibu_id = ibu.id_ibu
                    ";

        return $this->db->query($query)->result_array();
    }

    function add($data)
    {
        $this->db->insert($this->table, $data);
    }
    // SELESAI GET, ADD DATA ANAK IBU
}
