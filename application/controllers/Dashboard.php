<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Dashboard_model');
    }

    // MULAI MENAMPILKAN DASHBOARD PETUGAS
    public function petugas()
    {
        $data['title'] = 'Dashboard | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $users = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);
        $a = $this->Dashboard_model->dataIbu();
        $b = $this->Dashboard_model->dataAnak();
        $c = $this->Dashboard_model->dataPetugas();

        $id = $users['id_users'];
        $d = $this->Dashboard_model->dataLog($id);

        $data['count_ibu'] = $a;
        $data['count_anak'] = $b;
        $data['count_petugas'] = $c;
        $data['count_log'] = $d;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/petugas', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN DASHBOARD PETUGAS

    // MULAI MENAMPILKAN DASHBOARD BIDAN
    public function bidan()
    {
        $data['title'] = 'Dashboard | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $users = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        // print_r($data);

        $a = $this->Dashboard_model->dataIbu();
        $b = $this->Dashboard_model->dataAnak();
        $c = $this->Dashboard_model->dataBidan();

        $id = $users['id_users'];
        $d = $this->Dashboard_model->dataLog($id);

        $data['count_ibu'] = $a;
        $data['count_anak'] = $b;
        $data['count_bidan'] = $c;
        $data['count_log'] = $d;


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar-bidan');
        $this->load->view('templates/topbar-bidan', $data);
        $this->load->view('dashboard/bidan', $data);
        $this->load->view('templates/footer');
    }
    // SELESAI MENAMPILKAN DASHBOARD BIDAN
}
