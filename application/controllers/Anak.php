<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anak extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Anak_model');
    }

    public function index()
    {
        $data['title'] = 'Data Anak | Posyandu EH Indah';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['anak'] = $this->Anak_model->getDataAnak();

        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('guru_id', 'Pengajar', 'required');
        $this->form_validation->set_rules('kkm', 'KKM', 'required');
        $this->form_validation->set_rules('jp', 'Jam Pelajaran', 'required');

        if ($this->form_validation->run() == false) {
            // $this->load->view('templates/header-datatables', $data);
            // $this->load->view('templates/sidebar', $data);
            // $this->load->view('templates/topbar', $data);
            // $this->load->view('anak/index', $data);
            // $this->load->view('templates/footer-datatables');
        } else {

            $data = [
                'mata_pelajaran' => $this->input->post('mapel'),
                'guru_id' => $this->input->post('guru_id'),
                'kkm' => $this->input->post('kkm'),
                'jam_pelajaran' => $this->input->post('jp'),
            ];

            $this->db->insert('mapel', $data);
            $this->session->set_flashdata('msg', 'Berhasil Ditambahkan');

            redirect('anak');
        }
        // print_r($data);

        $this->load->view('templates/header-datatables', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $data);
        $this->load->view('anak/index', $data);
        $this->load->view('templates/footer-datatables');
    }

    // MULAI INDEX DATA IBU

    // SELESAI INDEX DATA IBU

    //     // MULAI CREATE DATA IBU
    //     public function createData()
    //     {
    //         $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //         // print_r($data);

    //         $this->load->view('templates/header-datatables');
    //         $this->load->view('templates/sidebar');
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('ibu/index', $data);
    //         $this->load->view('templates/footer-datatables');
    //     }
    //     // SELESAI CREATE DATA IBU

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

    //     // MULAI UPDATE DATA IBU
    //     public function editData()
    //     {
    //         $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
    //         // print_r($data);

    //         $this->load->view('templates/header-datatables');
    //         $this->load->view('templates/sidebar');
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('ibu/index', $data);
    //         $this->load->view('templates/footer-datatables');
    //     }
    //     // SELESAI UPDATE DATA IBU

    // MULAI DELETE DATA ANAK
    public function deleteData($id)
    {
        $this->Anak_model->delDataAnak($id);
        $this->session->set_flashdata('msg', 'Berhasil Dihapus');

        redirect('Anak/index');
    }
    // SELESAI DELETE DATA ANAK
}
