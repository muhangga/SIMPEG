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

    public function get_user() {
        $query = $this->db->get('tbl_user');
        return $query;
    }

    public function update_jabatan($id_jabatan, $data) {
        $this->db->where('id_jabatan', $id_jabatan);
        $query = $this->db->update('tbl_jabatan', $data);
        return $query;
    }

    public function update_profile($id_user, $data) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_user', $data);
        return $query;
    }
}