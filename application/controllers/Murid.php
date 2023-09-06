<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Murid extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_Nilai');
	}	
	function group(){
		$nis = $this->session->userdata('nis');
		$this->db->select('tahun_ajaran');
		$this->db->from('tb_siswa_kelas');
		$this->db->where('nis', $nis);
		$this->db->group_by('tahun_ajaran');
		$this->db->order_by('tahun_ajaran', 'asc');
		$query = $this->db->get();
		return $query->result();

	}
	public function index()
	{
	$data['content'] = $this->db->get('tb_nilai');
	$data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
    $data['jenis'] = $this->M_Nilai->get_data('tb_jenis')->result();
    $data['kategori'] = $this->M_Nilai->get_data('tb_kategori')->result();


		$this->load->view('page/halutamasiswa',$data);
	} 

	public function nilai()
	{
		$data['tahun_ajaran'] = $this->group();
		$this->load->view('siswa/nilai', $data);
	}

	public function jenis()
	{
		$this->load->view('siswa/jenis');
	}
	public function hasil()
	{
		$jenis = $this->uri->segment(3);
		$tahun = $this->uri->segment(4);
		$nis = $this->session->userdata('username');
		$data['hasil'] = $this->db->query("SELECT * FROM tb_siswa,tb_siswa_kelas,tb_nilai,tb_mapel WHERE tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa.nis = tb_siswa_kelas.nis and tb_siswa_kelas.id_siswa_kelas = tb_nilai.id_siswa_kelas and tb_siswa_kelas.nis = $nis and tb_nilai.id_jenis = $jenis and tb_nilai.id_kategori = 1 and tb_siswa_kelas.tahun_ajaran = '$tahun'")->result();
		$data['hasil2'] = $this->db->query("SELECT * FROM tb_siswa,tb_siswa_kelas,tb_nilai,tb_mapel WHERE tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa.nis = tb_siswa_kelas.nis and tb_siswa_kelas.id_siswa_kelas = tb_nilai.id_siswa_kelas and tb_siswa_kelas.nis = $nis and tb_nilai.id_jenis = $jenis and tb_nilai.id_kategori = 2 and tb_siswa_kelas.tahun_ajaran = '$tahun'")->result();


		$this->load->view('siswa/hasil',$data);
	}

	public function absensi()
	{
		$data['tahun_ajaran'] = $this->group();
		$this->load->view('siswa/absensi', $data);
	}

	public function hasilabsen()
	{
		$sem = $this->uri->segment(3);
		$tahun = $this->uri->segment(4);
		$nis = $this->session->userdata('username');
		$data['hasil'] = $this->db->query("SELECT * FROM tb_siswa,tb_siswa_kelas,tb_absensi,tb_rombel WHERE tb_siswa_kelas.id_rombel = tb_rombel.id_rombel and tb_siswa_kelas.id_siswa_kelas = tb_absensi.id_siswa_kelas and tb_siswa_kelas.nis = $nis and tb_siswa_kelas.nis = tb_siswa.nis and tb_absensi.id_semester = $sem and tb_siswa_kelas.tahun_ajaran = '$tahun'")->result();

		$this->load->view('siswa/hasilabsen',$data);
	}
	
	public function raport()
	{
		$data['tahun_ajaran'] = $this->group();
		
		$this->load->view('siswa/raport', $data);
	}

	public function hasilraport()
	{
		$nis = $this->session->userdata('username');
        $sem = $this->uri->segment(3);
		$thn = $this->uri->segment(4);


		// $sk = $this->db->query("SELECT * FROM tb_siswa, tb_siswa_kelas WHERE tb_siswa.nis = tb_siswa_kelas.nis AND tb_siswa_kelas.nis = $nis AND tb_siswa_kelas.tahun_ajaran = '$thn'")->result();
        // foreach($sk as $s){
		// 	$tes = $s->tahun_ajaran;
		
		// }
		// // var_dump($tes);
		// // die;

        $data['content'] = $this->db->query("SELECT * FROM tb_siswa_kelas,tb_siswa,tb_rombel WHERE tb_siswa_kelas.id_rombel = tb_rombel.id_rombel and tb_siswa_kelas.tahun_ajaran = '$thn' and tb_siswa_kelas.nis = $nis and tb_siswa_kelas.nis = tb_siswa.nis");
        $data['sem'] = $this->db->query("SELECT * FROM tb_semester,tb_absensi,tb_siswa_kelas where tb_absensi.id_semester = tb_semester.id_semester and tb_absensi.id_siswa_kelas = tb_siswa_kelas.id_siswa_kelas and tb_semester.id_semester = $sem and tb_siswa_kelas.nis = $nis and tb_siswa_kelas.tahun_ajaran = '$thn'");    
        $data['upd'] = $this->db->query("SELECT * FROM tb_semester,tb_siswa_kelas,tb_upd WHERE tb_siswa_kelas.id_siswa_kelas = tb_upd.id_siswa_kelas and tb_semester.id_semester = tb_upd.semester and tb_semester.id_semester = $sem and tb_siswa_kelas.nis = $nis and tb_upd.id_siswa_kelas = tb_siswa_kelas.id_siswa_kelas and tb_siswa_kelas.tahun_ajaran = '$thn'");  
        $data['prestasi'] = $this->db->query("SELECT * FROM tb_semester,tb_siswa_kelas,tb_prestasi WHERE tb_siswa_kelas.id_siswa_kelas = tb_prestasi.id_siswa_kelas and tb_semester.id_semester = tb_prestasi.semester and tb_semester.id_semester = $sem and tb_siswa_kelas.nis = $nis and tb_siswa_kelas.tahun_ajaran = '$thn'");  

        // $sintakjenis = "SELECT * FROM tb_mapel,tb_siswa,tb_rombel,tb_nilai WHERE tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa.nis = tb_nilai.nis and tb_siswa.id_rombel = tb_rombel.id_rombel AND tb_nilai.id_jenis";
        // $sintakkategori = "and tb_siswa.nis = $nis and tb_nilai.id_kategori";
		$sintakjenis = "SELECT * FROM tb_mapel,tb_siswa_kelas,tb_siswa,tb_rombel,tb_nilai WHERE tb_siswa.nis = tb_siswa_kelas.nis and tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa_kelas.id_siswa_kelas = tb_nilai.id_siswa_kelas and tb_siswa_kelas.id_rombel = tb_rombel.id_rombel AND tb_nilai.id_jenis";
        $sintakkategori = "and tb_siswa_kelas.nis = $nis and tb_nilai.id_kategori";
		
        

        // SEMESTER 1
        $data['uh1p'] = $this->db->query("$sintakjenis = 1 $sintakkategori = 1")->result();
        $data['uh2p'] = $this->db->query("$sintakjenis = 2 $sintakkategori = 1")->result();
        $data['uh3p'] = $this->db->query("$sintakjenis = 3 $sintakkategori = 1")->result();
        $data['uh4p'] = $this->db->query("$sintakjenis = 4 $sintakkategori = 1")->result();
        $data['utsp'] = $this->db->query("$sintakjenis = 9 $sintakkategori = 1")->result();
        $data['uasp'] = $this->db->query("$sintakjenis = 10 $sintakkategori = 1")->result();
        $data['uh1k'] = $this->db->query("$sintakjenis = 1 $sintakkategori = 2")->result();
        $data['uh2k'] = $this->db->query("$sintakjenis = 2 $sintakkategori = 2")->result();
        $data['uh3k'] = $this->db->query("$sintakjenis = 3 $sintakkategori = 2")->result();
        $data['uh4k'] = $this->db->query("$sintakjenis = 4 $sintakkategori = 2")->result();
        $data['utsk'] = $this->db->query("$sintakjenis = 9 $sintakkategori = 2")->result();
        $data['uask'] = $this->db->query("$sintakjenis = 10 $sintakkategori = 2")->result();
		// var_dump($data['uh2p']);
		// die;
        // SEMESTER 2

        $data['uh5p'] = $this->db->query("$sintakjenis = 5 $sintakkategori = 1")->result();
        $data['uh6p'] = $this->db->query("$sintakjenis = 6 $sintakkategori = 1")->result();
        $data['uh7p'] = $this->db->query("$sintakjenis = 7 $sintakkategori = 1")->result();
        $data['uh8p'] = $this->db->query("$sintakjenis = 8 $sintakkategori = 1")->result();
        $data['utspg'] = $this->db->query("$sintakjenis = 11 $sintakkategori = 1")->result();
        $data['ukkp'] = $this->db->query("$sintakjenis = 12 $sintakkategori = 1")->result();
        $data['uh5k'] = $this->db->query("$sintakjenis = 5 $sintakkategori = 2")->result();
        $data['uh6k'] = $this->db->query("$sintakjenis = 6 $sintakkategori = 2")->result();
        $data['uh7k'] = $this->db->query("$sintakjenis = 7 $sintakkategori = 2")->result();
        $data['uh8k'] = $this->db->query("$sintakjenis = 8 $sintakkategori = 2")->result();
        $data['utskg'] = $this->db->query("$sintakjenis = 11 $sintakkategori = 2")->result();
        $data['ukkk'] = $this->db->query("$sintakjenis = 12 $sintakkategori = 2")->result();


        $this->load->view('siswa/hasilraport', $data);
	}

}