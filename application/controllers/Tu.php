<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tu extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('M_Nilai');
    $this->load->model('SaveModel');
    $this->load->model('TuModel');

   
  } 

  public function index()
  {
    $data['content'] = $this->db->get('tb_nilai');
    $data['rayon'] = $this->M_Nilai->get_data('tb_rayon')->result();
    $data['semester'] = $this->M_Nilai->get_data('tb_semester')->result();



    $this->load->view('halutamatu',$data);
  } 

  public function cetak()
  {
  	$data['content'] = $this->db->get('tb_rayon');
    $data['rayon'] = $this->M_Nilai->get_data('tb_rayon')->result();
    $data['semester'] = $this->M_Nilai->get_data('tb_semester')->result();



    $this->load->view('halutamatu',$data);
  }

 
  public function datasiswa()
  {
    $data['content'] = $this->db->get('tb_rayon');
    $data['rayon'] = $this->M_Nilai->get_data('tb_rayon')->result();
    $data['semester'] = $this->M_Nilai->get_data('tb_semester')->result();

    $rayon = $this->input->get('rayon');
    $semester = $this->input->get('semester');
    $data['siswa'] = $this->db->query("SELECT * FROM tb_rayon,tb_siswa,tb_rombel WHERE tb_siswa.id_rombel = tb_rombel.id_rombel and tb_siswa.id_rayon = tb_rayon.id_rayon and tb_rayon.id_rayon = $rayon  ")->result();

    $this->load->view('tu/datasiswa', $data);

  }

public function siswa()
{
  $data['dtsiswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_rombel,tb_rayon where tb_siswa.id_rombel = tb_rombel.id_rombel and tb_siswa.id_rayon = tb_rayon.id_rayon")->result();

  $this->load->view('tu/siswa', $data);
}

public function addsiswa()
{
  $data['rayon'] = $this->M_Nilai->get_data('tb_rayon')->result();
  $data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();

  
  $this->load->view('tu/addsiswa', $data);
}

public function fungsiadd()
{
  $nis = $this->input->post('nis');
  $nama = $this->input->post('nama');
  $rayon = $this->input->post('rayon');
  $rombel = $this->input->post('rombel');
  $username = $this->input->post('username');
  $password = $this->input->post('password');

  $ArrInsert = array(
    'nis' => $nis,
    'nama' => $nama,
    'id_rayon' => $rayon,
    'id_rombel' => $rombel,
    'username' => $username,
    'password' => md5($password)
  );
  $ArrInsertUPD1 = array(
    'nis' => $nis,
    'semester' => 1,
    'upd1' => "-",
    'upd2' => "-",
    'nilai1' => "-",
    'nilai2' => "-"
  );
  $ArrInsertUPD2 = array(
    'nis' => $nis,
    'semester' => 2,
    'upd1' => "-",
    'upd2' => "-",
    'nilai1' => "-",
    'nilai2' => "-"
  );
  $ArrInsertAbs1 = array(
    'nis' => $nis,
    'id_semester' => 1,
    's' => "0",
    'i' => "0",
    'a' => "0"
  );
  $ArrInsertAbs2 = array(
    'nis' => $nis,
    'id_semester' => 2,
    's' => "0",
    'i' => "0",
    'a' => "0"
  );
  $ArrInsertPrestasi1 = array(
    'nis' => $nis,
    'semester' => 1,
    'prestasi1' => "-",
    'prestasi2' => "-",
    'prestasi3' => "-",
    'keterangan1' => "-",
    'keterangan2' => "-",
    'keterangan3' => "-"
  );
  $ArrInsertPrestasi2 = array(
    'nis' => $nis,
    'semester' => 2,
    'prestasi1' => "-",
    'prestasi2' => "-",
    'prestasi3' => "-",
    'keterangan1' => "-",
    'keterangan2' => "-",
    'keterangan3' => "-"
  );


  $arraNilai = [];

  for ($i = 1; $i <= 3 ; $i++){
    for($j = 1; $j <= 12; $j++){
      for($k = 1; $k <= 2; $k++ ){
        $arraNilai[] = [
          "nis" => $nis,
          "id_mapel" => $i,
          "id_jenis" => $j,
          "id_kategori" => $k,
          "nilai" => '0'
        ];
        array_push($arraNilai);
      }
    }
  }


  // var_dump(json_encode($ArrInsertNilai));
  // die();


  // echo "<pre>";
  // print_r($ArrInsert);
  // echo "</pre>";
  $this->TuModel->insertDataSiswa($ArrInsert);
  $this->TuModel->insertDataNilai($arraNilai);
  $this->TuModel->insertDataUPD($ArrInsertUPD1);
  $this->TuModel->insertDataUPD($ArrInsertUPD2);
  $this->TuModel->insertDataAbs($ArrInsertAbs1);
  $this->TuModel->insertDataAbs($ArrInsertAbs2);
  $this->TuModel->insertDataPrestasi($ArrInsertPrestasi1);
  $this->TuModel->insertDataPrestasi($ArrInsertPrestasi2);
  redirect('Tu/siswa');
}

public function ps()
{
  $data['dtps'] = $this->db->query("SELECT * FROM tb_ps,tb_rayon where tb_ps.id_rayon = tb_rayon.id_rayon")->result();

  $this->load->view('tu/ps', $data);
}

public function addps()
{
  $data['rayon'] = $this->M_Nilai->get_data('tb_rayon')->result();

  
  $this->load->view('tu/addps', $data);
}
public function fungsiaddps()
{
  $nama = $this->input->post('nama');
  $rayon = $this->input->post('rayon');
  $username = $this->input->post('username');
  $password = $this->input->post('password');

  $ArrInsert = array(
    'nama_ps' => $nama,
    'id_rayon' => $rayon,
    'username' => $username,
    'password' => md5($password)
  );
  $this->TuModel->insertDataPs($ArrInsert);
  redirect('Tu/ps');
}

public function editps($id_ps){
  $queryPsDetail = $this->TuModel->getDataPsDetail($id_ps);
  $DATA = array('queryPsDetail' => $queryPsDetail);
  $DATA['rayon'] = $this->M_Nilai->get_data('tb_rayon')->result();
  // echo "<pre>";
  // print_r($queryPsDetail);
  // echo "</pre>";
  $this->load->view('tu/editps', $DATA);
}

public function editsiswa($nis){
  $querySiswaDetail = $this->TuModel->getDataSiswaDetail($nis);
  $DATA = array('querySiswaDetail' => $querySiswaDetail);
  $DATA['rayon'] = $this->M_Nilai->get_data('tb_rayon')->result();
  $DATA['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
  // echo "<pre>";
  // print_r($queryPsDetail);
  // echo "</pre>";
  $this->load->view('tu/editsiswa', $DATA);
}

public function fungsieditps(){
  $id_ps = $this->input->post('id_ps');
  $nama = $this->input->post('nama');
  $rayon = $this->input->post('rayon');
  $username = $this->input->post('username');

  $ArrUpdate = array(
    'id_rayon' => $rayon,
    'nama_ps' => $nama,
    'username' => $username
  );
  // echo "<pre>";
  // print_r($ArrUpdate);
  // echo "</pre>";
  $this->TuModel->updateDataPs($id_ps, $ArrUpdate);
  redirect('Tu/ps');
}

public function fungsieditsiswa(){
  $nis = $this->input->post('nis');
  $rayon = $this->input->post('rayon');
  $rombel = $this->input->post('rombel');
  $nama = $this->input->post('nama');
  $username = $this->input->post('username');

  $ArrUpdate = array(
    'id_rayon' => $rayon,
    'id_rombel' => $rombel,
    'nis' => $nis,
    'nama' => $nama,
    'username' => $username
  );
  // echo "<pre>";
  // print_r($ArrUpdate);
  // echo "</pre>";
  $this->TuModel->updateDataSiswa($nis, $ArrUpdate);
  redirect('Tu/siswa');
}

public function datarapotdetail()
  {
        $nis = $this->uri->segment(4);
        $sem = $this->uri->segment(3);


        $data['content'] = $this->db->query("SELECT * FROM tb_siswa,tb_rombel WHERE tb_siswa.id_rombel = tb_rombel.id_rombel  and tb_siswa.nis = $nis");
        $data['sem'] = $this->db->query("SELECT * FROM tb_semester,tb_absensi,tb_siswa where tb_absensi.id_semester = tb_semester.id_semester and tb_absensi.nis = tb_siswa.nis and tb_semester.id_semester = $sem and tb_siswa.nis = $nis");    
        $data['upd'] = $this->db->query("SELECT * FROM tb_semester,tb_siswa,tb_upd WHERE tb_siswa.nis = tb_upd.nis and tb_semester.id_semester = tb_upd.semester and tb_semester.id_semester = $sem and tb_upd.nis = $nis");  
        $data['prestasi'] = $this->db->query("SELECT * FROM tb_semester,tb_siswa,tb_prestasi WHERE tb_siswa.nis = tb_prestasi.nis and tb_semester.id_semester = tb_prestasi.semester and tb_semester.id_semester = $sem and tb_siswa.nis = $nis");  

        $sintakjenis = "SELECT * FROM tb_mapel,tb_siswa,tb_rombel,tb_nilai WHERE tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa.nis = tb_nilai.nis and tb_siswa.id_rombel = tb_rombel.id_rombel AND tb_nilai.id_jenis";
        $sintakkategori = "and tb_siswa.nis = $nis and tb_nilai.id_kategori";

        

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


        $this->load->view('tu/datarapotdetail', $data);
  }


public function cetakrapot()
  {
        $nis = $this->uri->segment(4);
        $sem = $this->uri->segment(3);


        $data['content'] = $this->db->query("SELECT * FROM tb_siswa,tb_rombel WHERE tb_siswa.id_rombel = tb_rombel.id_rombel  and tb_siswa.nis = $nis");
        $data['sem'] = $this->db->query("SELECT * FROM tb_semester,tb_absensi,tb_siswa where tb_absensi.id_semester = tb_semester.id_semester and tb_absensi.nis = tb_siswa.nis and tb_semester.id_semester = $sem and tb_siswa.nis = $nis");    
        $data['upd'] = $this->db->query("SELECT * FROM tb_semester,tb_siswa,tb_upd WHERE tb_siswa.nis = tb_upd.nis and tb_semester.id_semester = tb_upd.semester and tb_semester.id_semester = $sem and tb_upd.nis = $nis");  
        $data['prestasi'] = $this->db->query("SELECT * FROM tb_semester,tb_siswa,tb_prestasi WHERE tb_siswa.nis = tb_prestasi.nis and tb_semester.id_semester = tb_prestasi.semester and tb_semester.id_semester = $sem and tb_siswa.nis = $nis");  

        $sintakjenis = "SELECT * FROM tb_mapel,tb_siswa,tb_rombel,tb_nilai WHERE tb_mapel.id_mapel = tb_nilai.id_mapel and tb_siswa.nis = tb_nilai.nis and tb_siswa.id_rombel = tb_rombel.id_rombel AND tb_nilai.id_jenis";
        $sintakkategori = "and tb_siswa.nis = $nis and tb_nilai.id_kategori";

        

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


        $this->load->view('tu/cetakrapot', $data);
  }

  public function ortu()
  {
    $data['dtortu'] = $this->db->get('tb_ortu')->result();

    $this->load->view('tu/ortu', $data);
  }

  public function editortu($nis){
    $data['dtortu'] = $this->TuModel->getDataOrtuDetail($nis);

    $this->load->view('tu/editortu', $data);
  }

  public function fungsieditortu(){
    $nis = $this->input->post('nis');
    $nama = $this->input->post('nama');
    $username = $this->input->post('username');
  
    $ArrUpdate = array(
      'nis' => $nis,
      'nama' => $nama,
      'username' => $username
    );
    $this->TuModel->updateDataOrtu($nis, $ArrUpdate);
    redirect('Tu/ortu');
  }

  public function addortu()
  {
    $data['nis'] = $this->db->get('tb_siswa')->result();
    $this->load->view('tu/addortu', $data);
  }
  
  public function fungsiaddortu()
  {
    $nis = $this->input->post('nis');
    $nama = $this->input->post('nama');
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $ArrInsert = array(
      'nis' => $nis,
      'nama' => $nama,
      'username' => $username,
      'password' => md5($password)
    );
    $this->TuModel->insertDataOrtu($ArrInsert);
    redirect('Tu/ortu');
  }


}