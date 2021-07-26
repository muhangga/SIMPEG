<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['title'] = "SIMPEG BPATP - Beranda";

		$this->load->view('component/sidebar');
        $this->load->view('component/header', $data);
		$this->load->view('pegawai/beranda');
		$this->load->view('component/footer');
	}

}
