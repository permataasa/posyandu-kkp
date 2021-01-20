<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tamu extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_users' => '1'])->row_array();
        // print_r($data);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('tamu');
        $this->load->view('templates/footer');
    }
}
