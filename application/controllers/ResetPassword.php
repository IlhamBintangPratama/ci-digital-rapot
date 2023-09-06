<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('string');

        $this->load->model('TuModel');
        $this->load->model('KepsekModel');
        $this->load->model('GuruModel');
        $this->load->model('OrtuModel');
        $this->load->model('PsModel');
        $this->load->model('SiswaModel');
        $this->load->model('TuModel');
    }

    public function index () {
        $this->load->view('reset_password.php');
    }

    public function request() {
        $username = $this->input->post('username');
        $type = $this->input->post('type');

        $user = null;

        $token = random_string('alnum', 13);

        $data = [
            'token' => $token
        ];

        
        if($type == "tu"){
            $user = $this->TuModel->get($username);
            if($user){
                $this->TuModel->insertToken($username, $data);

            }

            

        }else if($type == 'kepsek'){
            $user = $this->KepsekModel->get($username);
            if($user){
                $this->KepsekModel->insertToken($username, $data);

            }
        }else if($type == 'guru'){
            $user = $this->GuruModel->get($username);
            if($user){
                $this->GuruModel->insertToken($username, $data);

            }
        }else if($type == 'Ortu'){
            $user = $this->OrtuModel->get($username);
            if($user){
                $this->OrtuModel->insertToken($username, $data);

            }
        }else if($type == 'ps'){
            $user = $this->PsModel->get($username);
            if($user){
                $this->PsModel->insertToken($username, $data);

            }
        }else if($type == 'siswa'){
            $user = $this->SiswaModel->get($username);
            if($user){
                $this->SiswaModel->insertToken($username, $data);

            }
        }else if($type == 'tu'){
            $user = $this->TuModel->get($username);
            if($user){
                $this->TuModel->insertToken($username, $data);

            }
        }

        if($user){
            return redirect('resetPassword/gantiPassword?token='.$token."&type=".$type);
        }else{
            redirect('/resetPassword?type='.$type);
        }
    }

    public function gantiPassword(){
        $this->load->view('ganti_password.php');
    }

    public function updatePassword() {
        $type = $this->input->post('type');
        $token = $this -> input->post('token');

        $password = $this->input->post('password');
        $password_confirm = $this->input->post('password_confirm');

        if($password === $password_confirm){
            if($type == 'tu'){
                $this->TuModel->insertPassword($token, ['password' => md5($password)]);
                redirect('/loginTu');
            }
            if($type == 'kepsek'){
                $this->KepsekModel->insertPassword($token, ['password' => md5($password)]);
                redirect('/loginKepsek');
            }
            if($type == 'guru'){
                $this->GuruModel->insertPassword($token, ['password' => md5($password)]);
                redirect('/loginGuru');
            }
            if($type == 'ortu'){
                $this->OrtuModel->insertPassword($token, ['password' => md5($password)]);
                redirect('/loginOrtu');
            }
            if($type == 'ps'){
                $this->PsModel->insertPassword($token, ['password' => md5($password)]);
                redirect('/loginPs');
            }
            if($type == 'siswa'){
                $this->SiswaModel->insertPassword($token, ['password' => md5($password)]);
                redirect('/loginSiswa');
            }
            if($type == 'tu'){
                $this->TuModel->insertPassword($token, ['password' => md5($password)]);
                redirect('/loginTu');
            }
        }


    }
}
