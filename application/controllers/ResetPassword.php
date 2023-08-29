<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ResetPassword extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        $this->load->helper('string');

        $this->load->model('TuModel');
        $this->load->model('KepsekModel');
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
        }


    }
}
