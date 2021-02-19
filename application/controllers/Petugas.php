<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Petugas_model');
    }

    // MULAI INDEX DATA PETUGAS
    public function index()
    {
        $data['title'] = 'Data PETUGAS | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['users'] = $this->Petugas_model->getDataUsers();
        $data['petugas'] = $this->Petugas_model->getDataPetugas();

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('petugas/index', $data);
        $this->load->view('templates/footer-datatables');
    }
    // SELESAI INDEX DATA PETUGAS


    // MULAI CREATE DATA PETUGAS
    public function createDataPetugas()
    {
        $data = [
            'nama_ibu' => $this->input->post('nama_ibu'),
            'tempat_lahir' => $this->input->post('tempat-lhr-ibu'),
            'tgl_lahir' => $this->input->post('tgl-lahir-ibu'),
            'gol_dar' => $this->input->post('gol-dar'),
            'pendidikan' => $this->input->post('pendidikan-ibu'),
            'pekerjaan' => $this->input->post('pekerjaan-ibu'),
            'nama_suami' => $this->input->post('nama-suami'),
            'tempat_lahir_suami' => $this->input->post('tempat-lhr-suami'),
            'tgl_lahir_suami' => $this->input->post('tgl_lahir_suami'),
            'pendidikan_suami' => $this->input->post('pendidikan-suami'),
            'pekerjaan_suami' => $this->input->post('pekerjaan-suami'),
            'alamat' => $this->input->post('alamat'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kota' => $this->input->post('kota'),
            'no_tlp' => $this->input->post('no-tlp'),
        ];

        $this->db->insert('petugas', $data);
        $this->session->set_flashdata('msg', 'Berhasil Ditambahkan');

        redirect('petugas');
    }
    // SELESAI CREATE DATA PETUGAS

    //     // MULAI READ DATA IBU
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
    //     // SELESAI READ DATA IBU

    // MULAI UPDATE DATA PETUGAS
    public function updateDataPetugas($id)
    {
        $data = [
            'nama_ibu' => $this->input->post('nama_ibu'),
            'tempat_lahir' => $this->input->post('tempat-lhr-ibu'),
            'tgl_lahir' => $this->input->post('tgl-lahir-ibu'),
            'gol_dar' => $this->input->post('gol-dar'),
            'pendidikan' => $this->input->post('pendidikan-ibu'),
            'pekerjaan' => $this->input->post('pekerjaan-ibu'),
            'nama_suami' => $this->input->post('nama-suami'),
            'tempat_lahir_suami' => $this->input->post('tempat-lhr-suami'),
            'tgl_lahir_suami' => $this->input->post('tgl_lahir_suami'),
            'pendidikan_suami' => $this->input->post('pendidikan-suami'),
            'pekerjaan_suami' => $this->input->post('pekerjaan-suami'),
            'alamat' => $this->input->post('alamat'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kota' => $this->input->post('kota'),
            'no_tlp' => $this->input->post('no-tlp'),

        ];

        $this->Petugas_model->updDataPetugas($id, $data);
        $this->session->set_flashdata('msg', 'Berhasil Diubah');

        redirect('petugas/index');
    }
    // SELESAI UPDATE DATA PETUGAS

    // MULAI DELETE DATA PETUGAS
    public function deleteDataPetugas($id)
    {
        $this->Petugas_model->delDataPetugas($id);
        $this->session->set_flashdata('msg', 'Berhasil Dihapus');

        redirect('petugas/index');
    }
    // SELESAI DELETE DATA PETUGAS
}
