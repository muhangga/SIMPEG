<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

class Main_model extends CI_Model {

    public function insert_pegawai($data)
    {
        $query = $this->db->insert('tbl_user', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_user() 
    {
        $query = $this->db->get('tbl_user');
        return $query;
    }

    public function update_jabatan($id_jabatan, $data) 
    {
        $this->db->where('id_jabatan', $id_jabatan);
        $query = $this->db->update('tbl_jabatan', $data);
        return $query;
    }

    public function update_profile($id_user, $data) 
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_user', $data);
        return $query;
    }

    public function hapus_file($id_arsip) 
    {
        $this->db->where('id_arsip', $id_arsip);
        $this->db->delete('tbl_arsip_pegawai');
    }

    public function all_user()
    {
        $query = $this->db->query('SELECT * FROM tbl_user');
        return $query;
    }

    public function delete_user($id_user) 
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tbl_user');
    }

    public function arsip_pegawai()
    {
        $this->db->select('*');
        $this->db->from('tbl_arsip_pegawai');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_arsip_pegawai.id_user');
        $query = $this->db->get();
        return $query;
    }

    public function get_jenis_file() 
    {
        $query = $this->db->get('tbl_jenis_file');
        return $query;
    }

    public function delete_jenis_file($data)
    {
        $this->db->where('jenis_file', $data);
        $this->db->delete('tbl_jenis_file');
    }
}