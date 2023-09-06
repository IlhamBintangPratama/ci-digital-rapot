<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OrtuModel extends CI_Model {
    
    public function get($username){
        // $this->db->select('*');
        $this->db->where('username', $username);
         // Untuk menambahkan Where Clause : username='$username'
        // $this->db->from('');
        // $this->db->join(); // Untuk mengeksekusi dan mengambil data hasil query
        $result = $this->db->get('tb_ortu');

        return $result->row();
    }
    public function insertToken($username,$data) {
        $this->db->where('username', $username);
        $this->db->update('tb_ortu', $data);
    }

    public function insertPassword($token,$data) {
        $this->db->where('token', $token);
        $this->db->update('tb_ortu', $data);
    }
}
