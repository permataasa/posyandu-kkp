<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_model extends CI_Model
{
    // MULAI CRUD DATA ANAK IBU
    public function getDataAnakIbu()
    {
        $query = "SELECT anak.*, ibu.nama_ibu, ibu.nama_suami
                    From anak JOIN ibu
                    ON anak.ibu_id = ibu.id_ibu
                    ";

        return $this->db->query($query)->result_array();
    }
    // SELESAI CRUD DATA ANAK IBU

    function get($where = array())
    {

        $this->db->select('h.*, p.nama_ibu, p.nama_suami, p.alamat')
            ->from('penimbangan h')
            ->join('ibu p', 'p.id_ibu = h.ibu_id')
            ->join('anak i', 'i.id_anak = h.anak_id');
        if (count($where) > 0)
            $this->db->where($where);

        // $this->db->group_by('h.idPesanan');

        $res = $this->db->get();

        echo $this->db->last_query();
        return $res->result();
    }
}
