<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Main_model');
    }

	public function index()
	{
        $data = [
            "title" => "SIMPEG BPATP - Beranda",
            "user"  =>$this->db->get_where("tbl_user", ['email' => $this->session->userdata('email')])->row_array()
        ];
		$this->load->view('component/sidebar', $data);
        $this->load->view('component/header', $data);
		$this->load->view('pegawai/beranda');
		$this->load->view('component/footer');
	}

    // EDIT PROFILE

    public function edit_profile($id_user) 
    {
        $data = [
            "title" => "SIMPEG BPATP - Edit Profile",
            "user"  => $this->db->get_where("tbl_user", ['email' => $this->session->userdata('email')])->row_array(),
            "jabatan"  => $this->db->get_where("tbl_jabatan", ['id_user' => $this->session->userdata('id_user')])->row_array(),
            "get_user" => $this->Main_model->get_user($id_user)->result()
        ];
        $this->load->view('component/sidebar', $data);
        $this->load->view('component/header', $data);
        $this->load->view('pegawai/edit_profile', $data);
        $this->load->view('component/footer');
    }

    // JABATAN
    public function insert_jabatan() 
    {
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', [
            'required'  => 'Jabatan harus di isi!',
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
            'required'  => 'Tahun harus di isi!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal menambahkan Data!');
            redirect('beranda');
        } else {
            $id_user = $this->input->post('id_user');
            $jabatan = $this->input->post('jabatan', true);
            $tahun = $this->input->post('tahun', true);

            $data = [
                "id_user" => $id_user,
                "jabatan" => $jabatan,
                "tahun"   => $tahun
            ];
            $success = $this->db->insert('tbl_jabatan', $data);

            if ($success) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                redirect('beranda');
             } else {
                $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
             }
        }
    }

    public function update_jabatan() 
    {
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', [
            'required'  => 'Jabatan harus di isi!',
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
            'required'  => 'Tahun harus di isi!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal menambahkan Data!');
            redirect('beranda');
        } else {
            $jabatan = $this->input->post('jabatan', true);
            $tahun = $this->input->post('tahun', true);

            $this->db->set('jabatan', $jabatan);
            $this->db->set('tahun', $tahun);
            $success = $this->db->update('tbl_jabatan');

            if ($success) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                redirect('beranda');
             } else {
                $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
             }
        }
    }
}
