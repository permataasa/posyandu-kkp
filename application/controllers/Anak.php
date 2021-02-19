<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anak_model');
    }

    // MULAI INDEX DATA ANAK
    public function index()
    {
        $data['title'] = 'Data Anak | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['anak'] = $this->Anak_model->getDataAnak();

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

        $this->Anak_model->updDataPetugas($id, $data);
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
