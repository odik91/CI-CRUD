<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MahasiswaModel extends CI_Model {
  public function insertData($tableName, $data) {
    $this->db->insert($tableName, $data);
  }

  public function getData() {
    $query = $this->db->get('mahasiswa');
    return $query->result();
  }
}