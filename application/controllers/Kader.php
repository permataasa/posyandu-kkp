<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kader extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function datakader()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);

        $this->load->view('templates/header-datatables');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('kader/index', $data);
        $this->load->view('templates/footer-datatables');
    }
}
