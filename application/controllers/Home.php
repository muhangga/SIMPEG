<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Main_model');

        $data['user'] =  $this->db->get_where("tbl_user", ['email' => $this->session->userdata('email')])->row_array();
    }

	public function index()
	{
        // Data Arsip Pegawai
        $this->form_validation->set_rules('jenis_file', 'Jenis File', 'required', [
            'required'  => 'Jenis File harus di isi!',
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required', [
            'required'  => 'Keterangan harus di isi!',
        ]);

        $data = [
            "title" => "SIMPEG BPATP - Beranda",
            "user"  =>$this->db->get_where("tbl_user", ['email' => $this->session->userdata('email')])->row_array(),
            "jabatan"  => $this->db->get_where("tbl_jabatan", ['id_user' => $this->session->userdata('id_user')])->row_array(),
            "data_arsip"  => $this->db->get_where("tbl_arsip_pegawai", ['id_user' => $this->session->userdata('id_user')])->result_array(),
        ];

        if ($this->form_validation->run() == FALSE ) {
            $this->load->view('component/sidebar', $data);
            $this->load->view('component/header', $data);
            $this->load->view('pegawai/beranda');
            $this->load->view('component/footer');
        } else {

            if (!empty($_FILES['deksripsi']['name'])) {
                $file = str_replace(" ", "_", $_FILES['deksripsi']['name']);
                $config['allowed_types'] = 'pdf';
                $config['max_size']      = '4096';
                $config['upload_path'] = './assets/file/';
                $config['file_name']  = $file;

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('deksripsi')) {
                    $id_user = $this->input->post('id_user');
                    $jenis_file = $this->input->post('jenis_file');
                    $keterangan = $this->input->post('keterangan');

                    $kirim_data['id_user'] = $id_user;
                    $kirim_data['jenis_file'] = $jenis_file;
                    $kirim_data['tgl_upload'] = date("Y-m-d H:i:s");
                    $kirim_data['keterangan'] = $keterangan;
                    $kirim_data['deksripsi'] = $this->upload->data('file_name');

                    $success = $this->db->insert('tbl_arsip_pegawai', $kirim_data);

                    if ($success) {
                        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
                        redirect('beranda');
                    } else {
                        $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
                    }
                }
                } else {
                    $id_user = $this->input->post('id_user');
                    $jenis_file = $this->input->post('jenis_file');
                    $keterangan = $this->input->post('keterangan');

                    $kirim_data['id_user'] = $id_user;
                    $kirim_data['jenis_file'] = $jenis_file;
                    $kirim_data['tgl_upload'] = date("Y-m-d H:i:s");
                    $kirim_data['keterangan'] = $keterangan;

                    $success = $this->db->insert('tbl_arsip_pegawai', $kirim_data);

                    if ($success) {
                        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
                        redirect('beranda');
                    } else {
                        $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
                    }
                }
        }
	}

    public function hapus_file($id_arsip)
    {
        $success = $this->Main_model->hapus_file($id_arsip);

        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
        redirect('beranda');
    }

    // EDIT PROFILE
    public function edit_profile($id_user) 
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', [
            'required'  => 'Nama Lengkap harus di isi!',
        ]);
        $this->form_validation->set_rules('tempat', 'Tempat', 'required', [
            'required'  => 'Tempat harus di isi!',
        ]);
        $this->form_validation->set_rules('ttl', 'Tanggal Lahir', 'required', [
            'required'  => 'Tanggal Lahir harus di isi!',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required'  => 'Alamat harus di isi!',
        ]);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|integer|trim', [
            'integer'   => 'No Telepon harus berupa Angka!',
            'required'  => 'No Telepon harus di isi!',
        ]);
        

        $data = [
            "title" => "SIMPEG BPATP - Edit Profile",
            "user"  => $this->db->get_where("tbl_user", ['email' => $this->session->userdata('email')])->row_array(),
            "jabatan"  => $this->db->get_where("tbl_jabatan", ['id_user' => $this->session->userdata('id_user')])->row_array(),
            "get_user" => $this->Main_model->get_user($id_user)->result()
        ];
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('component/sidebar', $data);
            $this->load->view('component/header', $data);
            $this->load->view('pegawai/edit_profile', $data);
            $this->load->view('component/footer');

            $this->session->set_flashdata('gagal', 'Gagal menambahkan Data!');
        } else {
            
            $id_user      = $this->input->post('id_user');
            $email        = $this->input->post('email');
            $nama_lengkap = $this->input->post('nama_lengkap');
            $nik          = $this->input->post('nik');
            $tempat       = $this->input->post('tempat');
            $ttl          = $this->input->post('ttl');
            $alamat       = $this->input->post('alamat');
            $no_telp      = $this->input->post('no_telp');

            $upload_image = $_FILES['gambar']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '4096';
                $config['upload_path'] = './assets/images/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['user']['gambar'];

                    if ($old_image != 'user.png') {
                        unlink(FCPATH . './assets/images/user/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('gambar', $new_image);
                } else {
                    $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
                }
            }
            
            $data = [
                "email"        => $email,
                "nama_lengkap" => $nama_lengkap,
                "nik"          => $nik,
                "tempat"       => $tempat,
                "ttl"          => $ttl,
                "alamat"       => $alamat,
                "no_telp"      => $no_telp
            ];
            $success = $this->Main_model->update_profile($id_user, $data);

            if ($success) {
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
                redirect('beranda');
            } else {
                $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
            }
        }
    }

    // JABATAN
    public function edit_jabatan($id_user) 
    {
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', [
            'required'  => 'Jabatan harus di isi!',
        ]);
        $this->form_validation->set_rules('tahun', 'Tahun', 'required', [
            'required'  => 'Tahun harus di isi!',
        ]);
        
        $data = [
            "title" => "SIMPEG BPATP - Edit Jabatan",
            "user"  => $this->db->get_where("tbl_user", ['email' => $this->session->userdata('email')])->row_array(),
            "jabatan"  => $this->db->get_where("tbl_jabatan", ['id_user' => $this->session->userdata('id_user')])->row_array(),
            "get_user" => $this->Main_model->get_user($id_user)->result()
        ];
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('component/sidebar', $data);
            $this->load->view('component/header', $data);
            $this->load->view('pegawai/edit_jabatan', $data);
            $this->load->view('component/footer');

            $this->session->set_flashdata('gagal', 'Gagal menambahkan Data!');
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
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
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

        $data = [
            "user"  => $this->db->get_where("tbl_user", ['email' => $this->session->userdata('email')])->row_array(),
            "jabatan"  => $this->db->get_where("tbl_jabatan", ['id_user' => $this->session->userdata('id_user')])->row_array(),
        ];

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal menambahkan Data!');
            redirect('beranda');
        } else {
            $id_user = $this->input->post('id_user');
            $jabatan = $this->input->post('jabatan');
            $tahun = $this->input->post('tahun');

            $data = [
                "jabatan" => $jabatan,
                "tahun"   => $tahun
            ];

            $this->db->where('id_user', $id_user);
            $success = $this->db->update('tbl_jabatan', $data);

            if ($success) {
                $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
                redirect('beranda');
             } else {
                $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
             }
        }
    }
}
