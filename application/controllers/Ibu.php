<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ibu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Ibu_model');
    }

    public function index()
    {
        $data['title'] = 'Data Ibu | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['ibu'] = $this->Ibu_model->getDataIbu();

        // $this->form_validation->set_rules('nama-ibu', 'Nama Ibu', 'required');
        // $this->form_validation->set_rules('nama-suami', 'Nama Suami', 'required');
        // $this->form_validation->set_rules('tgl-lahir-ibu', 'Tgl Lahir Ibu', 'required');

        if ($this->form_validation->run() == false) {
            // $this->load->view('templates/header-datatables', $data);
            // $this->load->view('templates/sidebar', $data);
            // $this->load->view('templates/topbar', $data);
            // $this->load->view('ibu/index', $data);
            // $this->load->view('templates/footer-datatables');
        } else {

            $data = [
                'nama-ibu' => $this->input->post('nama_ibu'),
                'tempat-lhr-ibu' => $this->input->post('tempat_lahir'),
                'tgl-lahir-ibu' => $this->input->post('tgl_lahir'),
                'gol-dar' => $this->input->post('gol_dar'),
                'pendidikan-ibu' => $this->input->post('pendidikan'),
                'pekerjaan-ibu' => $this->input->post('pekerjaan'),
                'nama-suami' => $this->input->post('nama_suami'),
                'tempat-lhr-suami' => $this->input->post('tempat_lahir_suami'),
                'tgl_lahir_suami' => $this->input->post('tgl_lahir_suami'),
                'pendidikan-suami' => $this->input->post('pendidikan_suami'),
                'pekerjaan-suami' => $this->input->post('pekerjaan_suami'),
                'alamat' => $this->input->post('alamat'),
                'kecamatan' => $this->input->post('kecamatan'),
                'kota' => $this->input->post('kota'),
                'no-tlp' => $this->input->post('no_tlp'),
            ];

            $this->db->insert('ibu', $data);
            $this->session->set_flashdata('msg', 'Berhasil Ditambahkan');

            redirect('ibu');
        }
        // print_r($data);

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('ibu/index', $data);
        $this->load->view('templates/footer-datatables');
    }

    // MULAI CREATE DATA IBU
    public function createDataIbu()
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

        $this->db->insert('ibu', $data);
        $this->session->set_flashdata('msg', 'Berhasil Ditambahkan');

        redirect('ibu');
    }
    // SELESAI CREATE DATA IBU

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

    // MULAI UPDATE DATA IBU
    public function updateDataIbu($id)
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

        $this->Ibu_model->updDataIbu($id, $data);
        $this->session->set_flashdata('msg', 'Berhasil Diubah');

        redirect('ibu/index');
    }
    // SELESAI UPDATE DATA IBU

    // MULAI DELETE DATA IBU
    public function deleteDataIbu($id)
    {
        $this->Ibu_model->delDataIbu($id);
        $this->session->set_flashdata('msg', 'Berhasil Dihapus');

        redirect('ibu/index');
    }
    // SELESAI DELETE DATA IBU
}
