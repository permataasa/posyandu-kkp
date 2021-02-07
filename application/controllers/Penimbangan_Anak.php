<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penimbangan_Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Penimbangan_model');
    }

    // MULAI MENAMPILKAN
    public function index()
    {
        $data['title'] = 'Penimbangan Anak | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header-form', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('layanan/penimbangan-form', $data);
        $this->load->view('templates/footer-form');
    }
    // SELESAI MENAMPILKAN
}
