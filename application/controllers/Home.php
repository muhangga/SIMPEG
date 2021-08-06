<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Main_model');

        if ($this->session->userdata('masuk') != TRUE) {
            $this->session->set_flashdata('gagal', 'Anda tidak boleh masuk, Silahkan login terlebih dahulu!');
            redirect('login');
        }
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
            "jenis_file" => $this->Main_model->get_jenis_file()->result_array()
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
                    $kirim_data['tgl_upload'] = date("d-m-Y H:i:s");
                    $kirim_data['keterangan'] = $keterangan;
                    $kirim_data['deksripsi'] = $this->upload->data('file_name');

                    $success = $this->db->insert('tbl_arsip_pegawai', $kirim_data);

                    if ($success) {
                        $this->session->set_flashdata('sukses', 'Data berhasil ditambahkan!');
                        redirect('beranda');
                    } else {
                        $this->session->set_flashdata('gagal', 'Data gagal ditambahkan!');
                    }
                } else {
                    $this->session->set_flashdata('gagal', 'File harus berupa PDF!');
                    redirect('beranda');
                }
            } else {
                $id_user = $this->input->post('id_user');
                $jenis_file = $this->input->post('jenis_file');
                $keterangan = $this->input->post('keterangan');

                $kirim_data['id_user'] = $id_user;
                $kirim_data['jenis_file'] = $jenis_file;
                $kirim_data['tgl_upload'] = date("d-m-Y H:i:s");
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

        $this->session->set_flashdata('sukses', 'File berhasil dihapus!');
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
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|is_natural|trim|min_length[10]', [
            'is_natural'   => 'No Telepon harus berupa Angka!',
            'required'  => 'No Telepon harus di isi!',
        ]);
        

        $data = [
            "title" => "SIMPEG BPATP - Edit Profile",
            "user"  => $this->db->get_where("tbl_user", ['id_user' => $id_user])->row_array(),
            "jabatan"  => $this->db->get_where("tbl_jabatan", ['id_user' => $this->session->userdata('id_user')])->row_array(),
        ];
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('component/sidebar', $data);
            $this->load->view('component/header', $data);
            $this->load->view('pegawai/edit_profile', $data);
            $this->load->view('component/footer');
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
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '4096';
                $config['upload_path'] = './assets/images/user/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $old_image = $data['user']['gambar'];

                    if ($old_image != 'user.png') {
                        unlink(FCPATH . './assets/images/user/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');

                    $kirim_data['email'] = $email;
                    $kirim_data['nama_lengkap'] = $nama_lengkap;
                    $kirim_data['nik'] = $nik;
                    $kirim_data['tempat'] = $tempat;
                    $kirim_data['ttl'] = $ttl;
                    $kirim_data['alamat'] = $alamat;
                    $kirim_data['no_telp'] = $no_telp;
                    $kirim_data['gambar'] = $new_image;

                    $success = $this->Main_model->update_profile($id_user, $kirim_data);

                    if ($success) {
                        $this->session->set_flashdata('sukses', 'Profile berhasil di Update!');
                        redirect('beranda');
                    } else {
                        $this->session->set_flashdata('gagal', 'Profile gagal di Update!');
                        redirect('beranda');
                    }
                } else {
                    $this->session->set_flashdata('gagal', 'Foto harus berfomat jpg/png!');
                    redirect('beranda');
                }
            } else {
                $kirim_data['email'] = $email;
                $kirim_data['nama_lengkap'] = $nama_lengkap;
                $kirim_data['nik'] = $nik;
                $kirim_data['tempat'] = $tempat;
                $kirim_data['ttl'] = $ttl;
                $kirim_data['alamat'] = $alamat;
                $kirim_data['no_telp'] = $no_telp;

                $success = $this->Main_model->update_profile($id_user, $kirim_data);

                if ($success) {
                    $this->session->set_flashdata('sukses', 'Profile berhasil di Update!');
                    redirect('beranda');
                } else {
                    $this->session->set_flashdata('gagal', 'Profile gagal di Update!');
                    redirect('beranda');
                }
            }
        }
    }

    // JABATAN
    public function edit_jabatan($id_user) 
    {
        $this->form_validation->set_rules('jabatan1', 'Jabatan1', 'required');
        $this->form_validation->set_rules('tahun1', 'Tahun1', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $data = [
                "title" => "SIMPEG BPATP - Edit Jabatan",
                "user"  => $this->db->get_where("tbl_user", ['email' => $this->session->userdata('email')])->row_array(),
                "jabatan"  => $this->db->get_where("tbl_jabatan", ['id_user' => $this->session->userdata('id_user')])->row_array(),
                "get_user" => $this->Main_model->get_user($id_user)->result()
            ];
            $this->load->view('component/sidebar', $data);
            $this->load->view('component/header', $data);
            $this->load->view('pegawai/edit_jabatan', $data);
            $this->load->view('component/footer');
        } else {
            $id_user = $this->input->post('id_user');
            $jabatan1 = $this->input->post('jabatan1', true);
            $jabatan2 = $this->input->post('jabatan2', true);
            $jabatan3 = $this->input->post('jabatan3', true);
            $tahun1 = $this->input->post('tahun1', true);
            $tahun2 = $this->input->post('tahun2', true);
            $tahun3 = $this->input->post('tahun3', true);

            $kirim_data = [
                "id_user"  => $id_user,
                "jabatan1" => $jabatan1,
                "jabatan2" => (!$jabatan2) ?  "-" :  $jabatan2,
                "jabatan3" => (!$jabatan3) ?  "-" :  $jabatan3,
                "tahun1"   => $tahun1,
                "tahun2"   => (!$tahun2) ?  "-" :  $tahun2,
                "tahun3"   => (!$tahun3) ?  "-" :  $tahun3,
            ];
            $success = $this->db->insert('tbl_jabatan', $kirim_data);

            if ($success) {
                $this->session->set_flashdata('sukses', 'Berhasil menambahkan Jabatan!');
                redirect('beranda');
            } else {
                $this->session->set_flashdata('gagal', 'Gagal menambahkan Jabatan!');
                redirect('beranda');
            }
          }
        }

    public function update_jabatan() 
    {
        $this->form_validation->set_rules('jabatan1', 'Jabatan', 'required', [
            'required'  => 'Jabatan harus di isi!',
        ]);
        $this->form_validation->set_rules('tahun1', 'Tahun', 'required', [
            'required'  => 'Tahun harus di isi!',
        ]);
        
        if ($this->form_validation->run() == FALSE) {
            $data = [
                "user"  => $this->db->get_where("tbl_user", ['email' => $this->session->userdata('email')])->row_array(),
                "jabatan"  => $this->db->get_where("tbl_jabatan", ['id_user' => $this->session->userdata('id_user')])->row_array(),
            ];
            $this->session->set_flashdata('gagal', 'Gagal mengupdate Jabatan!');
            redirect('beranda');
        } else {
            $id_user  = $this->input->post('id_user');
            $jabatan1 = $this->input->post('jabatan1', true);
            $jabatan2 = $this->input->post('jabatan2', true);
            $jabatan3 = $this->input->post('jabatan3', true);
            $tahun1   = $this->input->post('tahun1', true);
            $tahun2   = $this->input->post('tahun2', true);
            $tahun3   = $this->input->post('tahun3', true);

            $kirim_data['jabatan1'] = (!$jabatan1) ?  "-" :  $jabatan1;
            $kirim_data['jabatan2'] = (!$jabatan2) ?  "-" :  $jabatan2;
            $kirim_data['jabatan3'] = (!$jabatan3) ?  "-" :  $jabatan3;
            $kirim_data['tahun1']   = (!$tahun1) ?  "-" :  $tahun1;
            $kirim_data['tahun2']   = (!$tahun2) ?  "-" :  $tahun2;
            $kirim_data['tahun3']   = (!$tahun3) ?  "-" :  $tahun3;

            $this->db->where('id_user', $id_user);
            $success = $this->db->update('tbl_jabatan', $kirim_data);

            if ($success) {
                $this->session->set_flashdata('sukses', 'Jabatan berhasil di Update!');
                redirect('beranda');
             } else {
                $this->session->set_flashdata('gagal', 'Jabatan gagal di Update!');
                redirect('beranda');
             }
        }
    }

    // ADMIN AREA
    public function data_user() 
    {
        $data = [
            "title" => "SIMPEG BPATP - Data Pegawai",
            "user"  => $this->db->get_where("tbl_user", ['id_user' => $this->session->userdata('id_user')])->row_array(),
            "get_user" => $this->Main_model->get_user()->result_array()
        ];

        $this->load->view('component/sidebar', $data);
        $this->load->view('component/header', $data);
        $this->load->view('admin/data_pegawai', $data);
        $this->load->view('component/footer');
    }
    
    public function data_arsip_pegawai() 
    {
        $data = [
            "title" => "SIMPEG BPATP - Data Arsip Pegawai",
            "user"  => $this->db->get_where("tbl_user", ['id_user' => $this->session->userdata('id_user')])->row_array(),
            "get_arsip_pegawai" => $this->Main_model->arsip_pegawai()->result_array()
        ];

        $this->load->view('component/sidebar', $data);
        $this->load->view('component/header', $data);
        $this->load->view('admin/data_arsip_pegawai', $data);
        $this->load->view('component/footer');
    }

    public function delete_user($id_user) 
    {
        $this->Main_model->delete_user($id_user);
        $this->session->set_flashdata('sukses', 'Data Pegawai berhasil dihapus!');
        redirect('beranda');
    }


    // JENIS FILE
    public function insert_jenis_file() 
    {
        $this->form_validation->set_rules('jenis_file', 'Jenis File', 'required', [
            'required'  => 'Jenis File harus di isi!',
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('gagal', 'Gagal menambahkan Data');
            redirect('beranda');
        } else {
            $data = array(
                 "jenis_file" => $this->input->post('jenis_file')
            );

            $success = $this->db->insert('tbl_jenis_file', $data);
            if ($success) {
                $this->session->set_flashdata('sukses', 'Jenis File berhasil di tambahkan');
                redirect('home#data-arsip-pegawai');
             } else {
                $this->session->set_flashdata('gagal', 'Jenis File gagal di tambahkan');
                redirect('beranda');
             }
        }
    }

    public function delete_jenis_file()
    {
        $jenis_file = $this->input->post('jenis_file');
        $count = count($jenis_file);
        for ($i = 0; $i < $count; $i++) {
            $this->Main_model->delete_jenis_file($jenis_file[$i]);
        }
        $this->session->set_flashdata('sukses', 'Jenis File berhasil di hapus');
        redirect('home#data-arsip-pegawai');
    }
}
