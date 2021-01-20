<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['id_users' => '1'])->row_array();
        // print_r($data);

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile');
        $this->load->view('templates/footer');
    }
}
