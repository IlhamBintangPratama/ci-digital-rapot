<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kepsek extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('M_Nilai');
    $this->load->model('SaveModel');
    $this->load->library('form_validation');


   
  } 
  
  public function index()
  {
    $data['content'] = $this->db->get('tb_nilai');
    $data['tahun_ajaran'] = $this->M_Nilai->group_tahun();
    $data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
    $data['semester'] = $this->M_Nilai->get_data('tb_semester')->result();



    $this->load->view('halutamakepsek',$data);
  } 

  public function cetak()
  {
  	$data['content'] = $this->db->get('tb_rombel');
    $data['tahun_ajaran'] = $this->M_Nilai->group_tahun();
    $data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
    $data['semester'] = $this->M_Nilai->get_data('tb_semester')->result();



    $this->load->view('halutamakepsek',$data);
  }

 
  public function datasiswa()
  {
    $rules = [
      [
        'field' => 'tahun_ajaran',
        'rules' => 'required'
      ],
      [
        'field' => 'rombel',
        'rules' => 'required'
      ],
      [
        'field' => 'semester',
        'rules' => 'required'
      ]
    ];
    $tahun_ajaran = $this->input->post('tahun_ajaran');
    $rombel = $this->input->post('rombel');
    $semester = $this->input->post('semester');

    $data['content'] = $this->db->get('tb_rombel');
    $data['tahun_ajaran'] = $this->M_Nilai->group_tahun();
    $data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
    $data['semester'] = $this->M_Nilai->get_data('tb_semester')->result();
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run()==FALSE){
      return $this->load->view('halutamakepsek',$data);
    }
    
    
    $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa_kelas,tb_siswa,tb_rombel WHERE tb_siswa_kelas.tahun_ajaran = '$tahun_ajaran' and tb_siswa_kelas.id_rombel = tb_rombel.id_rombel and tb_siswa.nis = tb_siswa_kelas.nis and tb_rombel.id_rombel = $rombel")->result();
    // var_dump($data['siswa']);
    // die;
    $this->load->view('kepsek/datasiswa', $data);

  }


public function datarapotdetail()
  {
    $nis = $this->uri->segment(4);
    $sem = $this->uri->segment(3);
    // var_dump($sem);
    

    $data['content'] = $this->db->query("SELECT * FROM tb_siswa_kelas,tb_siswa,tb_rombel WHERE tb_siswa_kelas.id_rombel = tb_rombel.id_rombel and tb_siswa_kelas.id_siswa_kelas = $nis and tb_siswa.nis = tb_siswa_kelas.nis");
    $data['sem'] = $this->db->query("SELECT * FROM tb_semester,tb_absensi,tb_siswa,tb_siswa_kelas where tb_absensi.id_semester = tb_semester.id_semester and tb_absensi.id_siswa_kelas = tb_siswa_kelas.id_siswa_kelas and tb_semester.id_semester = $sem and tb_siswa.nis = tb_siswa_kelas.nis and tb_siswa_kelas.id_siswa_kelas = $nis");    
    $data['upd'] = $this->db->query("SELECT * FROM tb_semester,tb_upd,tb_siswa_kelas WHERE tb_siswa_kelas.id_siswa_kelas = tb_upd.id_siswa_kelas and tb_semester.id_semester = tb_upd.semester and tb_semester.id_semester = $sem and tb_upd.id_siswa_kelas = $nis");  
    $data['prestasi'] = $this->db->query("SELECT * FROM tb_semester,tb_siswa_kelas,tb_prestasi WHERE tb_siswa_kelas.id_siswa_kelas = tb_prestasi.id_siswa_kelas and tb_semester.id_semester = tb_prestasi.semester and tb_semester.id_semester = $sem and tb_siswa_kelas.id_siswa_kelas = $nis");  

    $sintakjenis = "SELECT * FROM tb_mapel,tb_siswa_kelas,tb_siswa,tb_rombel,tb_nilai WHERE tb_siswa.nis = tb_siswa_kelas.nis and tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa_kelas.id_siswa_kelas = tb_nilai.id_siswa_kelas and tb_siswa_kelas.id_rombel = tb_rombel.id_rombel AND tb_nilai.id_jenis";
    $sintakkategori = "and tb_siswa_kelas.id_siswa_kelas = $nis and tb_nilai.id_kategori";

    

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



        $this->load->view('kepsek/datarapotdetail', $data);
  }


public function cetakrapot()
  {
    $nis = $this->uri->segment(4);
    $sem = $this->uri->segment(3);


    $data['content'] = $this->db->query("SELECT * FROM tb_siswa,tb_siswa_kelas,tb_rombel WHERE tb_siswa_kelas.id_rombel = tb_rombel.id_rombel and tb_siswa.nis = tb_siswa_kelas.nis and tb_siswa_kelas.id_siswa_kelas = $nis");
    $data['sem'] = $this->db->query("SELECT * FROM tb_semester,tb_absensi,tb_siswa,tb_siswa_kelas where tb_absensi.id_semester = tb_semester.id_semester and tb_absensi.id_siswa_kelas = tb_siswa_kelas.id_siswa_kelas and tb_semester.id_semester = $sem and tb_siswa.nis = tb_siswa_kelas.nis and tb_siswa_kelas.id_siswa_kelas = $nis");    
    $data['upd'] = $this->db->query("SELECT * FROM tb_semester,tb_upd,tb_siswa_kelas WHERE tb_siswa_kelas.id_siswa_kelas = tb_upd.id_siswa_kelas and tb_semester.id_semester = tb_upd.semester and tb_semester.id_semester = $sem and tb_upd.id_siswa_kelas = $nis");  
    $data['prestasi'] = $this->db->query("SELECT * FROM tb_semester,tb_siswa_kelas,tb_prestasi WHERE tb_siswa_kelas.id_siswa_kelas = tb_prestasi.id_siswa_kelas and tb_semester.id_semester = tb_prestasi.semester and tb_semester.id_semester = $sem and tb_siswa_kelas.id_siswa_kelas = $nis");  
    
    $sintakjenis = "SELECT * FROM tb_mapel,tb_siswa_kelas,tb_siswa,tb_rombel,tb_nilai WHERE tb_siswa.nis = tb_siswa_kelas.nis and tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa_kelas.id_siswa_kelas = tb_nilai.id_siswa_kelas and tb_siswa_kelas.id_rombel = tb_rombel.id_rombel AND tb_nilai.id_jenis";
    $sintakkategori = "and tb_siswa_kelas.id_siswa_kelas = $nis and tb_nilai.id_kategori";

    

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



        $this->load->view('kepsek/cetakrapot', $data);
  }


}