<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anak_model');
        $this->load->model('Ibu_model');
    }

    // MULAI INDEX DATA ANAK
    public function index()
    {
        $data['title'] = 'Data Anak | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['anak'] = $this->Anak_model->getDataAnak();
        $data['ibu'] = $this->Ibu_model->getDataIbu();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('anak/index', $data);
        $this->load->view('templates/footer-datatables');
    }
    // SELESAI INDEX DATA ANAK

    // MULAI CREATE DATA ANAK
    public function createDataAnak()
    {
        $data = [
            'nik_anak' => $this->input->post('nik-anak'),
            'nama_anak' => $this->input->post('nama-anak'),
            'tempat_lahir' => $this->input->post('tmt-lahir'),
            'tgl_lahir' => $this->input->post('tgl-lahir'),
            'jenis_kelamin' => $this->input->post('jenis-kelamin'),
            'ibu_id' => $this->input->post('ibu_id'),
        ];

        $this->db->insert('anak', $data);
        $this->session->set_flashdata('msg', 'Berhasil Ditambahkan');

        redirect('anak');
    }
    // SELESAI CREATE DATA ANAK

    //     // MULAI READ DATA ANAK
    //     public function viewData()
    //     {
    //         $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //         // print_r($data);

    //         $this->load->view('templates/header-datatables');
    //         $this->load->view('templates/sidebar');
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('ibu/index', $data);
    //         $this->load->view('templates/footer-datatables');
    //     }
    //     // SELESAI READ DATA ANAK

    // MULAI UPDATE DATA ANAK
    public function updateDataAnak($id)
    {
        $data = [
            'nik_anak' => $this->input->post('nik-anak'),
            'nama_anak' => $this->input->post('nama-anak'),
            'tempat_lahir' => $this->input->post('tmt-lahir'),
            'tgl_lahir' => $this->input->post('tgl-lahir'),
            'jenis_kelamin' => $this->input->post('jenis-kelamin'),
            'ibu_id' => $this->input->post('ibu_id'),
        ];

        $this->Anak_model->updDataAnak($id, $data);
        $this->session->set_flashdata('msg', 'Berhasil Diubah');

        redirect('anak/index');
    }
    // SELESAI UPDATE DATA ANAK

    // MULAI DELETE DATA ANAK
    public function deleteDataAnak($id)
    {
        $this->Anak_model->delDataAnak($id);
        $this->session->set_flashdata('msg', 'Berhasil Dihapus');

        redirect('anak/index');
    }
    // SELESAI DELETE DATA ANAK
}
