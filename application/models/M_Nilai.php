<?php 

// WWW.MALASNGODING.COM === Author : Diki Alfarabi Hadi
// Model yang terstruktur. agar bisa digunakan berulang kali untuk membuat CRUD. 
// Sehingga proses pembuatan CRUD menjadi lebih cepat dan efisien.

class M_Nilai extends CI_Model{

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function get_data($table){
		return $this->db->get($table);
	}
	function group_tahun()
	{
		$this->db->select('tahun_ajaran');
		$this->db->from('tb_siswa_kelas');
		$this->db->group_by('tahun_ajaran');
		$this->db->order_by('tahun_ajaran', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}	

	function checkEditableNullOrNot($nis, $id_mapel, $id_jenis, $id_kategori){
		$this->db->where('id_siswa_kelas', $nis);
		$this->db->where('id_mapel', $id_mapel);
		$this->db->where('id_jenis', $id_jenis);
		$this->db->where('id_kategori', $id_kategori);
		return $this->db->get('tb_nilai')->row();
	}
	
}
?>
