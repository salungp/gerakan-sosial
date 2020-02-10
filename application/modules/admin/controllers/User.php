<?php

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->has_userdata('user_data'))
    {
      redirect('auth/login');
    }
    $this->load->model('AdminUser_model', 'user');
  }

  public function index()
  {
    $data = $this->user->orderBy('id', 'desc')->getAll();
    $userLogin = $this->user->getSingle($this->session->userdata('user_data'));

    $this->load->view('templates/header', ['user' => $userLogin]);
    $this->load->view('user/index', ['data' => $data]);
    $this->load->view('templates/footer');
  }

  public function search()
  {
    $s = $this->input->get('s');
    $data = $this->user->orderBy('id', 'desc')->like('username', $s)->getAll();
    $userLogin = $this->user->getSingle($this->session->userdata('user_data'));

    $this->load->view('templates/header', ['user' => $userLogin]);
    $this->load->view('user/index', ['data' => $data]);
    $this->load->view('templates/footer'); 
  }

  public function create()
  {
    $username = htmlspecialchar($this->input->post('username'));
    $password = $this->input->post('password');
    $password_confirmation = $this->input->post('password_confirmation');
    $level = $this->input->post('level');
  }
}