<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Main_model');
    }

	public function index()
	{
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required'  => 'Email tidak boleh kosong!',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required'  => 'Password tidak boleh kosong!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Halaman Login";
    
            $this->load->view('component/header', $data);
            $this->load->view('login');
            $this->load->view('component/footer');
        } else {
            $email    = $this->input->post('email', true);
            $password = $this->input->post('password', true);

            $user = $this->db->get_where('tbl_user', ['email' => $email])->row_array();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'email'   => $user['email'],
                        'role'    => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    redirect('home');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
                redirect('auth');
            }
        }

	}

    public function register() 
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tbl_user.email]' , [
            'required'  => 'Email harus di isi!',
            'is_unique' => 'Email ini sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim|integer|is_unique[tbl_user.NIK]' , [
            'required'  => 'NIK harus di isi!',
            'integer'   => 'NIK tidak boleh berupa huruf!',
            'is_unique' => 'Nomer NIK sudah terdaftar!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required'  => 'Password harus di isi!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', [
            'required'  => 'Nama Lengkap harus di isi!',
        ]);
        $this->form_validation->set_rules('ttl', 'Tempat, Tanggal Lahir', 'required', [
            'required'  => 'Tempat, Tanggal Lahir harus di isi!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required'  => 'Alamat harus di isi!',
        ]);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|integer|trim', [
            'integer'   => 'NIK tidak boleh berupa huruf!',
            'required'  => 'No Telepon harus di isi!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Halaman Daftar Akun";
            $this->load->view('component/header', $data);
            $this->load->view('register');
            $this->load->view('component/footer');
        } else {
            $email        = $this->input->post('email', true);
            $password     = $this->input->post('password', true);
            $nama_lengkap = $this->input->post('nama_lengkap', true);
            $nik          = $this->input->post('nik', true);
            $ttl          = $this->input->post('ttl', true);
            $alamat       = $this->input->post('alamat', true);
            $no_telp      = $this->input->post('no_telp', true);

            $data = [
                "email"        => htmlspecialchars($email),
                "password"     => password_hash($password, PASSWORD_DEFAULT),
                "nama_lengkap" => htmlspecialchars($nama_lengkap),
                "nik"          => htmlspecialchars($nik),
                "ttl"          => htmlspecialchars($ttl),
                "alamat"       => htmlspecialchars($alamat),
                "no_telp"      => htmlspecialchars($no_telp),
                "gambar"       => "user.png",
                "role"         => "user"
            ];

            $success = $this->Main_model->insert_pegawai($data);
            if ($success) {
                $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                redirect('auth');
             } else {
                $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
                redirect('register');
             }
        }

    }
}
