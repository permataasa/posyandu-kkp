<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Laporan_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Laporan Anak | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['d_anak'] = $this->Laporan_model->getDataAnakIbu();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('laporan/daftar_data', $data);
        $this->load->view('templates/footer-datatables');
    }
    // SELESAI MENAMPILKAN

    function getList()
    {
        $this->load->model('Laporan_model');
        $idanak = $this->input->post('id_anak');
        $idibu = $this->input->post('ibu_id');
        $namaayah = $this->input->post('nama_ayah');
        $tgllahir = $this->input->post('tgl_lahir');
        $filter = array();

        if ($idanak != '0')
            $filter['h.anak_id'] = $idanak;
        $filter['p.nama_suami'] = $namaayah;


        $data['laporan'] = $this->Laporan_model->get($filter);

        if ($this->input->is_ajax_request())
            $this->load->view('laporan/daftar_data_table', $data);
        else {
            $html = $this->load->view('laporan/daftar_data_table', $data, true);
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($html);
            $mpdf->Output();
        }
    }
}
