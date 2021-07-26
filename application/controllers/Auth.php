<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
        $data['title'] = "Halaman Login";

		$this->load->view('component/header', $data);
		$this->load->view('login');
		$this->load->view('component/footer');
	}

    public function register() 
    {
        $data['title'] = "Halaman Daftar Akun";

        $this->load->view('component/header', $data);
		$this->load->view('register');
		$this->load->view('component/footer');
    }
}
