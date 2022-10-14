<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class TuModel extends CI_Model {
    
    public function get($username){
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('tb_tu')->row(); // Untuk mengeksekusi dan mengambil data hasil query

        return $result;
    }
    function insertDataSiswa($data){
        $this->db->insert('tb_siswa', $data);
    }
    function insertDataPrestasi($data){
        $this->db->insert('tb_prestasi', $data);
    }
    function insertDataUPD($data){
        $this->db->insert('tb_upd', $data);
    }
    function insertDataAbs($data){
        $this->db->insert('tb_absensi', $data);
    }
    function insertDataNilai($data){
        $this->db->insert_batch('tb_nilai', $data);
    }
    function insertDataPs($data){
        $this->db->insert('tb_ps', $data);
    }
    function getDataPsDetail($id_ps){
        $this->db->where('id_ps', $id_ps);
        $query = $this->db->get('tb_ps');
        return $query->row();
    }
    function updateDataPs($id_ps, $data){
        $this->db->where('id_ps', $id_ps);
        $this->db->update('tb_ps', $data);
    }
    function getDataSiswaDetail($nis){
        $this->db->where('nis', $nis);
        $query = $this->db->get('tb_siswa');
        return $query->row();
    }
    function updateDataSiswa($nis, $data){
        $this->db->where('nis', $nis);
        $this->db->update('tb_siswa', $data);
    }
    function getDataOrtuDetail($nis){
        $this->db->where('nis', $nis);
        $query = $this->db->get('tb_ortu');
        return $query->row();
    }
    function updateDataOrtu($nis, $data){
        $this->db->where('nis', $nis);
        $this->db->update('tb_ortu', $data);
    }
    function insertDataOrtu($data){
        $this->db->insert('tb_ortu', $data);
    }
}
