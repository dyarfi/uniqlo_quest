<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function Home() {
        parent::__construct();
    }
    
    public function index() {
        if ($this->session->userdata('who')) {
            redirect(base_url() . "admin/participant");
        }
        $this->load->view('admin/login.php');
    }

    public function do_login() {
        $username = $this->input->get_post('username', true);
        $password = $this->input->get_post('password', true);
        if ($username == '') {
            $this->session->set_flashdata('error', 'Username tidak boleh kosong');
        } else if ($password == '') {
            $this->session->set_flashdata('error', 'Password tidak boleh kosong');
        } else {
            $this->load->model('user_model');
            $user = $this->user_model->auth($username, sha1($password));
            if ($user) {
                $this->session->set_userdata('who', $user->username);
                redirect(base_url() . 'admin/home');
                die();
            } else {
                $this->session->set_flashdata('error', 'Username atau Password salah');
            }
        }
        redirect(base_url().'admin/');
    }

    public function logout() {
        $this->session->unset_userdata('who');
        $this->session->sess_destroy();
        redirect(base_url().'admin/');
    }

}

?>