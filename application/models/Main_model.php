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

    public function update_jabatan($id_user) {
        $this->db->where('id_user', $id_user);
        $query = $this->db->update('tbl_jabatan');
        return query;
    }

}

// $this->db->select('*');
// $this->db->from('blogs');
// $this->db->join('comments', 'comments.id = blogs.id');
// $query = $this->db->get();