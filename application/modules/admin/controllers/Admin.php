<?php

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    if (!$this->session->has_userdata('user_data'))
    {
      redirect('auth/login');
    }
    $this->load->model('Auth_model', 'auth');
  }

  public function index()
  {
    $userLogin = $this->auth->getSingle($this->session->userdata('user_data'));
    $this->load->view('templates/header', ['user' => $userLogin]);
    $this->load->view('index', ['user_login' => $userLogin]);
    $this->load->view('templates/footer');
  }
}