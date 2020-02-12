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
    $username = htmlspecialchars($this->input->post('username'));
    $password = $this->input->post('password');
    $password_confirmation = $this->input->post('password_confirmation');
    $level = $this->input->post('level');

    if ($password != $password_confirmation)
    {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">Password tidak valid!</div>');
      redirect('admin/user');
    }

    $this->user->create([
      'username' => $username,
      'level'    => $level,
      'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    $this->session->set_flashdata('message', '<div class="alert alert-success">User berhasil ditambah!</div>');
    redirect('admin/user');
  }

  public function edit($id)
  {
    $data = $this->user->where('id', $id)->get()->row();
    if ($data)
    {
      $userLogin = $this->user->getSingle($this->session->userdata('user_data'));

      $this->load->view('templates/header', ['user' => $userLogin]);
      $this->load->view('user/edit', ['data' => $data]);
      $this->load->view('templates/footer');
    } else {
      show_404();
    }
  }

  public function update($id)
  {
    $data = $this->user->where('id', $id)->get()->row();
    $username = htmlspecialchars($this->input->post('username'));
    $password = $this->input->post('password');
    $level = $this->input->post('level');

    if ($data)
    {
      if ($password != '')
      {
        $this->user->update([
          'username' => $username,
          'password' => password_hash($password, PASSWORD_BCRYPT),
          'level'    => $level
        ], $id);
      } else {
        $this->user->update([
          'username' => $username,
          'level'    => $level
        ], $id);
      }
      $this->session->set_flashdata('message', '<div class="alert alert-success">User berhasil diedit!</div>');
      redirect('admin/user');
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger">User id tidak ditemukan!</div>');
      redirect('admin/user/edit/'.$id);
    }
  }

  public function delete($id)
  {
    $findById = $this->user->where('id', $id)->get()->row();

    if ($findById)
    {
      $this->user->delete($id);
      $this->session->set_flashdata('message', '<div class="alert alert-success">User berhasil dihapus!</div>');
      redirect('admin/user');
    } else {
      show_404();
    }
  }
}