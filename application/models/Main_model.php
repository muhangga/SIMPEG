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

}