<?php

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Auth_model', 'auth');
  }

  public function index()
  {
    redirect('auth/login');
  }

  public function login()
  {
    $this->load->view('templates/header');
    $this->load->view('login');
    $this->load->view('templates/footer');
  }

  public function authenticate()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $data = $this->auth->where('username', $username)->get()->row();

    if ($data)
    {
      if (password_verify($password, $data['password']))
      {
        $this->session->set_userdata([
          'user_data' => $data['id']
        ]);
        redirect('admin');
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Password salah!</div>');
        redirect('auth/login');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Username tidak ditemukan!</div>');
      redirect('auth/login');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('user_data');
    redirect('auth/login');
  }
}