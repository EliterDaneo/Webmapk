<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login {

    protected $ci;

    public function __construct()
    {
        $this->ci = get_instance();
        $this->ci->load->model('login_model');
    }
    
    public function login($username, $password)
    {
        
        $cek=$this->ci->login_model->login($username);
        if ($cek) {
            $id_user =$cek->id_user;
            $username =$cek->username;
            $nama =$cek->nama_user;
            $level =$cek->level;

            $this->ci->session->set_userdata('id_user', $id_user);
            $this->ci->session->set_userdata('username', $username);
            $this->ci->session->set_userdata('nama', $nama);
            $this->ci->session->set_userdata('level', $level);


			if(password_verify($password, $cek->password)){

                switch ($level){
                    case 'Administrator':
                        redirect('admin');
                    break;
                    case 'Guru':
                        redirect('guru');
                    break;
                    case 'Siswa':
                        redirect('siswa');
                    break;
                    case 'Wali':
                        redirect('wali');
                    break;
                    default :
                    $this->ci->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Username Not EEE</div>');
                    redirect('login');
                }

            }else{

                $this->ci->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Wrong Password!</div>');
                redirect('login');

            }

        }else{
            $this->ci->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Username Not Found!</div>');
            redirect('login');
        }
    }

    // public function cek_login()
    // {
    //     if ($this->ci->session->userdata('username')=="") {
    //         $this->ci->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Please Login First!</div>');
    //         redirect('login');
    //     }
    // }
    
    public function logout()
    {
        $this->ci->session->unset_userdata('id_user');
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('nama');
        $this->ci->session->unset_userdata('level');
        $this->ci->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">You have been logged out!!</div>');
        redirect('login');
    }
    
}
