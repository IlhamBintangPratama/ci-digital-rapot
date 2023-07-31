<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class GuruModel extends CI_Model {
    
    public function get($nip){
        $this->db->where('nip', $nip); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('tb_guru')->row(); // Untuk mengeksekusi dan mengambil data hasil query

        return $result;
    }
}
