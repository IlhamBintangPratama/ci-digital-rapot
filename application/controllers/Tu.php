<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tu extends CI_Controller {

  public function __construct()
  {
    parent::__construct();

    $this->load->model('M_Nilai');
    $this->load->model('SaveModel');
    $this->load->model('TuModel');
    // $this->load->model('SiswaModel');
    $this->load->library('form_validation');

   
  } 

  public function index()
  {
    $data['content'] = $this->db->get('tb_nilai');
    $data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
    $data['semester'] = $this->M_Nilai->get_data('tb_semester')->result();



    $this->load->view('halutamatu',$data);
  } 

  public function cetak()
  {
  	$data['content'] = $this->db->get('tb_rombel');
    $data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
    $data['semester'] = $this->M_Nilai->get_data('tb_semester')->result();



    $this->load->view('halutamatu',$data);
  }

 
  public function datasiswa()
  {
    $rules = [
      [
        'field' => 'rombel',
        'rules' => 'required'
      ],
      [
        'field' => 'semester',
        'rules' => 'required'
      ]
    ];

    $rombel = $this->input->post('rombel');
    $semester = $this->input->post('semester');

    $data['content'] = $this->db->get('tb_rombel');

    $data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
    $data['semester'] = $this->M_Nilai->get_data('tb_semester')->result();
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run()==FALSE){
      return $this->load->view('halutamatu',$data);
    }
    
    
    $data['siswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_rombel WHERE tb_siswa.id_rombel = tb_rombel.id_rombel and tb_rombel.id_rombel = $rombel  ")->result();

    $this->load->view('tu/datasiswa', $data);

  }

public function siswa()
{
  $data['dtsiswa'] = $this->db->query("SELECT * FROM tb_siswa,tb_rombel where tb_siswa.id_rombel = tb_rombel.id_rombel")->result();

  $this->load->view('tu/siswa', $data);
}

public function mapel()
{
  $data['dtmapel'] = $this->db->query("SELECT * FROM tb_mapel,tb_jenpel where tb_mapel.id_jenpel = tb_jenpel.id_jenpel")->result();

  $this->load->view('tu/mapel', $data);
}

public function addsiswa()
{
  // $data['rayon'] = $this->M_Nilai->get_data('tb_rayon')->result();
  $data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();

  
  $this->load->view('tu/addsiswa', $data);
}

public function fungsiadd()
{
  $rules = [
    [
      'field' => 'nis',
      'rules' => 'required'
    ],
    [
      'field' => 'nama',
      'rules' => 'required'
    ],
    [
      'field' => 'rombel',
      'rules' => 'required'
    ],
    [
      'field' => 'password',
      'rules' => 'required'
    ],
  ];
  $nis = $this->input->post('nis');
  $nama = $this->input->post('nama');
  $rombel = $this->input->post('rombel');
  $password = $this->input->post('password');
  $this->form_validation->set_rules($rules);
  if($this->form_validation->run()==FALSE){
    return $this->load->view('tu/addsiswa');
  }
  $ArrInsert = array(
    'nis' => $nis,
    'nama' => $nama,
    'id_rombel' => $rombel,
    'username' => $nis,
    'password' => md5($password)
  );
  // $ArrInsertMapel = array(
  //   'mapel' => $mapel,
  //   'nama' => $nama,
  //   'id_rombel' => $rombel,
  //   'username' => $username,
  //   'password' => md5($password)
  // );
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
  $q = $this->M_Nilai->get_data('tb_mapel')->num_rows();
  $cnt = $q;
  for ($i = 1; $i <= $cnt ; $i++){
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

  $this->session->set_flashdata('simpan','Berhasil Ditambah');
  redirect('Tu/siswa');
}
public function hapussiswa($nis)
  {   
      
      $data = $this->TuModel->delete_siswa($nis);
      $data = $this->TuModel->delete_nilai($nis);
      $this->session->set_flashdata('hapus', 'Data berhasil Dihapus');
      redirect('Tu/siswa');
  }

public function ps()
{
  $data['dtps'] = $this->db->query("SELECT * FROM tb_ps,tb_rombel where tb_ps.id_rombel = tb_rombel.id_rombel")->result();

  $this->load->view('tu/ps', $data);
}

public function addps()
{
  $data['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();

  
  $this->load->view('tu/addps', $data);
}
public function fungsiaddps()
{
  $rules = [
    [
      'field' => 'rombel',
      'rules' => 'required'
    ],
    [
      'field' => 'nama',
      'rules' => 'required'
    ],
    [
      'field' => 'username',
      'rules' => 'required'
    ],
    [
      'field' => 'password',
      'rules' => 'required'
    ]
    ];
  $nama = $this->input->post('nama');
  $rombel = $this->input->post('rombel');
  $username = $this->input->post('username');
  $password = $this->input->post('password');
  $this->form_validation->set_rules($rules);
  if($this->form_validation->run()==FALSE){
    return $this->load->view('tu/addps');
  }
  $ArrInsert = array(
    'nama_ps' => $nama,
    'id_rombel' => $rombel,
    'username' => $username,
    'password' => md5($password)
  );
  $this->TuModel->insertDataPs($ArrInsert);
  $this->session->set_flashdata('simpan','Berhasil Ditambah');
  redirect('Tu/ps');
}

public function editmapel($id_mapel){
  $queryMapelDetail = $this->TuModel->getDataMapelDetail($id_mapel);
  $DATA = array('queryMapelDetail' => $queryMapelDetail);
  $DATA['jenpel'] = $this->M_Nilai->get_data('tb_jenpel')->result();

  $this->load->view('tu/editmapel', $DATA);
}

public function fungsieditmapel(){
  $rules = [
    [
      'field' => 'mapel',
      'rules' => 'required'
    ],
    [
      'field' => 'jenpel',
      'rules' => 'required'
    ]
  ];
  $id_mapel = $this->input->post('id_mapel');
  $mapel = $this->input->post('mapel');
  $jenpel = $this->input->post('jenpel');
  // $username = $this->input->post('username');
  $this->form_validation->set_rules($rules);
  if($this->form_validation->run()==FALSE){
    return $this->load->view('tu/editmapel');
  }
  $ArrUpdate = array(
    'id_jenpel' => $jenpel,
    'mapel' => $mapel
  );
  // echo "<pre>";
  // print_r($ArrUpdate);
  // echo "</pre>";
  $this->TuModel->updateDataMapel($id_mapel, $ArrUpdate);
  $this->session->set_flashdata('update','Berhasil Diubah');
  redirect('Tu/mapel');
}

public function addmapel()
{
  $data['jenpel'] = $this->M_Nilai->get_data('tb_jenpel')->result();

  
  $this->load->view('tu/addmapel', $data);
}

public function fungsiaddmapel()
{
  $rules = [
    [
      'field' => 'mapel',
      'rules' => 'required'
    ],
    [
      'field' => 'jenpel',
      'rules' => 'required'
    ]
    ];
  $mapel = $this->input->post('mapel');
  $jenpel = $this->input->post('jenpel');
  // $id = $this->TuModel-> add_post();
  $this->form_validation->set_rules($rules);
  if($this->form_validation->run()==FALSE){
    return $this->load->view('tu/addmapel');
  }
  $ArrInsert = array(
    'mapel' => $mapel,
    'id_jenpel' => $jenpel,
    // 'id' => $id
  );

  

  $mapel = $this->TuModel->insertDataMapel($ArrInsert);

  
  // $nilaimapel = $this->db->query('SELECT * FROM tb_nilai')->rows();

  $arraNilai = [];
  // $q = $this->M_Nilai->get_data('tb_mapel')->num_rows();
  $siswa = $this->db->get('tb_siswa')->num_rows();
  $kategori = $this->db->get("tb_kategori")->num_rows();
  $jenis = $this->db->get("tb_jenis")->num_rows();

  for($k = 1; $k <= $kategori; $k++ ){
    for($j = 1; $j <= $jenis; $j++){
      for ($i = 1; $i <= $siswa ; $i++){
        $sis = '236401'.sprintf('%03d', $i);
    // for($l = 1; $l <= 8; $l++){
          $arraNilai[] = [
            "nis" => $sis,
            "id_mapel" => $mapel,
            "id_jenis" => $j,
            "id_kategori" => $k,
            "nilai" => '0'
          ];
          array_push($arraNilai);
          
        }
      }
      // $this->db->query("INSERT INTO tb_nilai
      //       (id_mapel, id_jenis, id_kategori, nis, nilai) VALUE ('{$id_mapel}','{$id_jenis}','{$id_kategori}','{$nissiswa}','{$nilai}')");
  }

  $this->TuModel->insertDataNilai($arraNilai);
  
  
  $this->session->set_flashdata('simpan','Berhasil Ditambah');
  redirect('Tu/mapel');
}
public function hapusmapel($id_mapel)
{   
    
    $data = $this->TuModel->delete_mapel($id_mapel);
    $this->session->set_flashdata('hapus', 'Data berhasil Dihapus');
    redirect('Tu/mapel');
}

public function editps($id_ps){
  $queryPsDetail = $this->TuModel->getDataPsDetail($id_ps);
  $DATA = array('queryPsDetail' => $queryPsDetail);
  $DATA['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
  // echo "<pre>";
  // print_r($queryPsDetail);
  // echo "</pre>";
  $this->load->view('tu/editps', $DATA);
}

public function editsiswa($nis){
  $querySiswaDetail = $this->TuModel->getDataSiswaDetail($nis);
  $DATA = array('querySiswaDetail' => $querySiswaDetail);
  // $DATA['rayon'] = $this->M_Nilai->get_data('tb_rayon')->result();
  $DATA['rombel'] = $this->M_Nilai->get_data('tb_rombel')->result();
  // echo "<pre>";
  // print_r($queryPsDetail);
  // echo "</pre>";
  $this->load->view('tu/editsiswa', $DATA);
}

public function fungsieditps(){
  $rules = [
    [
      'field' => 'nama',
      'rules' => 'required'
    ],
    [
      'field' => 'rombel',
      'rules' => 'required'
    ],
    [
      'field' => 'username',
      'rules' => 'required'
    ]
  ];
  $id_ps = $this->input->post('id_ps');
  $nama = $this->input->post('nama');
  $rombel = $this->input->post('rombel');
  $username = $this->input->post('username');
  $this->form_validation->set_rules($rules);
  if($this->form_validation->run()==FALSE){
    return $this->load->view('tu/editps');
  }
  $ArrUpdate = array(
    'id_rombel' => $rombel,
    'nama_ps' => $nama,
    'username' => $username
  );
  // echo "<pre>";
  // print_r($ArrUpdate);
  // echo "</pre>";
  $this->TuModel->updateDataPs($id_ps, $ArrUpdate);
  $this->session->set_flashdata('update','Berhasil Diubah');
  redirect('Tu/ps');
}

public function fungsieditsiswa(){
  $rules = [
    [
      'field' => 'nis',
      'rules' => 'required'
    ],
    [
      'field' => 'rombel',
      'rules' => 'required'
    ],
    [
      'field' => 'nama',
      'rules' => 'required'
    ],
    [
      'field' => 'username',
      'rules' => 'required'
    ]
  ];
  $nis = $this->input->post('nis');
  $rombel = $this->input->post('rombel');
  $nama = $this->input->post('nama');
  $username = $this->input->post('username');
  $this->form_validation->set_rules($rules);
  if($this->form_validation->run()==FALSE){
    return $this->load->view('tu/editsiswa');
  }
  $ArrUpdate = array(
    'id_rombel' => $rombel,
    'nis' => $nis,
    'nama' => $nama,
    'username' => $username
  );
  // echo "<pre>";
  // print_r($ArrUpdate);
  // echo "</pre>";
  $this->TuModel->updateDataSiswa($nis, $ArrUpdate);
  $this->session->set_flashdata('update','Berhasil Diubah');
  redirect('Tu/siswa');
}

public function datarapotdetail()
  {
        $nis = $this->uri->segment(4);
        $sem = $this->uri->segment(3);
        // var_dump($sem);
        

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
    $this->session->set_flashdata('update','Berhasil Diubah');
    redirect('Tu/ortu');
  }

  public function addortu()
  {
    $data['nis'] = $this->db->get('tb_siswa')->result();
    $this->load->view('tu/addortu', $data);
  }
  
  public function fungsiaddortu()
  {
    $rules = [
      [
        'field' => 'nis',
        'rules' => 'required'
      ],
      [
        'field' => 'nama',
        'rules' => 'required'
      ],
      [
        'field' => 'username',
        'rules' => 'required'
      ],
      [
        'field' => 'password',
        'rules' => 'required'
      ]
      ];
    $nis = $this->input->post('nis');
    $nama = $this->input->post('nama');
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $this->form_validation->set_rules($rules);
    if($this->form_validation->run()==FALSE){
      return $this->load->view('tu/addortu');
    }
    $ArrInsert = array(
      'nis' => $nis,
      'nama' => $nama,
      'username' => $username,
      'password' => md5($password)
    );
    $this->TuModel->insertDataOrtu($ArrInsert);
    $this->session->set_flashdata('simpan','Berhasil Ditambah');
    redirect('Tu/ortu');
  }
  public function hapusortu($nis)
  {   
      
      $data = $this->TuModel->delete_ortu($nis);
      $this->session->set_flashdata('hapus', 'Data berhasil Dihapus');
      redirect('Tu/ortu');
  }

  public function guru()
    {
      $data['dtguru'] = $this->db->query("SELECT * FROM tb_guru,tb_mapel,tb_guru_mapel WHERE tb_guru_mapel.nip = tb_guru.nip AND tb_guru_mapel.id_mapel = tb_mapel.id_mapel")->result();

      $this->load->view('tu/guru', $data);
    }

  public function addguru()
    {
      $data['mapel'] = $this->db->get('tb_mapel')->result();
      $this->load->view('tu/addguru', $data);
    }
  
  // public function mapel_checkout()
  // {
  //   $id_mapel = $this->input->post("id_mapel");

  //     $mapel = $this->db->get_where('tb_mapel',array('id_mapel'=>$id_mapel))->row_array();
          
  //           $MapelData = "<label>Test</label>";
  //             foreach($mapel as $bill)
  //             {
  //               $MapelData.='<input type="checkbox" name="id_mapel" value="'.$bill.'">';
  //             }
  //             echo $MapelData;
  // }

  public function fungsiaddguru()
  {
    $rules = [
      [
        'field' => 'nip',
        'rules' => 'trim|required|is_unique[tb_guru.nip]'
      ],
      // [
      //   'field' => 'id_mapel',
      //   'rules' => 'required'
      // ],
      [
        'field' => 'username',
        'rules' => 'required'
      ],
      [
        'field' => 'password',
        'rules' => 'required'
      ],
      [
        'field' => 'nama_guru',
        'rules' => 'required'
      ]
      ];

    $ArrInsertMapel = [];
    $nip = $this->input->post('nip');
    $id_mapel = $this->input->post('id_mapel');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $nama_guru = $this->input->post('nama_guru');
    // var_dump($id_mapel);
    // die;
    $this->form_validation->set_rules($rules);
    if($this->form_validation->run()==FALSE){
      return $this->load->view('tu/addguru');
    }
    $ArrInsert = array(
      'nip' => $nip,
      'username' => $username,
      'password' => md5($password),
      'nama_guru' => $nama_guru
    );
    foreach($id_mapel as $data) {
      $ArrInsertMapel[] = [
        'nip' => $nip,
        'id_mapel' => $data
      ];
      array_push($ArrInsertMapel);
    }
    $this->TuModel->insertDataGuru($ArrInsert);
    $this->TuModel->insertDataGuruMapel($ArrInsertMapel);
    $this->session->set_flashdata('simpan','Berhasil Ditambah');
    // echo "gagal";
    redirect('Tu/guru');
  }
  public function editguru($id_mapel){
    $data['dtguru'] = $this->TuModel->getDataGuruDetail($id_mapel);
    // var_dump($data['dtguru']);
    // die;
    $data['mapel'] = $this->db->get('tb_mapel')->result();

    $this->load->view('tu/editguru', $data);
  }
  public function hapusguru($id_mapel)
  {   
      
      $data = $this->TuModel->delete_guru($id_mapel);
      $this->session->set_flashdata('hapus', 'Data berhasil Dihapus');
      redirect('Tu/guru');
  }

  public function fungsieditguru(){
    $nip = $this->input->post('nip');
    $id = $this->input->post('id');
    $id_mapel = $this->input->post('id_mapel');
    $username = $this->input->post('username');
    // $password = $this->input->post('password');
    $nama_guru = $this->input->post('nama_guru');

    $ArrUpdate = array(
      'nip' => $nip,
      // 'id_mapel' => $id_mapel,
      'username' => $username,
      'nama_guru' => $nama_guru
    );
    $ArrUpdateGuru = array(
      'nip' => $nip,
      'id_mapel' => $id_mapel
    );
    $this->TuModel->updateDataGuru($nip, $ArrUpdate);
    $this->TuModel->updateDataGuruMapel($id, $ArrUpdateGuru);
    $this->session->set_flashdata('update','Berhasil Diubah');
    redirect('Tu/guru');
  }

}