<?php

class Content extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Content_model', 'content');
    if (!$this->session->has_userdata('user_data'))
    {
      redirect('auth');
    }
  }

  public function index()
  {
    $data['data'] = $this->content->getAll();

    $this->load->view('templates/header');
    $this->load->view('content/index', $data);
    $this->load->view('templates/footer');
  }

  public function create()
  {
    $title = htmlspecialchars($this->input->post('title'));
    $slug  = strtolower(str_replace(' ', '-', $title));
    $text  = htmlspecialchars($this->input->post('text'));
    $link  = htmlspecialchars($this->input->post('link'));
    $description = $this->input->post('description');
    $category    = $this->input->post('category');
    $icon        = $this->input->post('icon');
    $image       = '-';
    $dir         = './uploads/contents/';

    if (isset($_FILES['image']))
    {
      $fileName    = $_FILES['image']['name'];
      $fileDir     = $_FILES['image']['tmp_name'];
      $eksFile     = explode('.', $fileName)[1];
      $fileNewName = $slug.'.'.$eksFile;
      $image       = $dir.$fileNewName;

      if (!in_array($eksFile, ['jpg', 'png', 'gif']))
      {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">Maaf ekstensi file '.$eksFile.' tidak diperbolehkan!</div>');
        redirect('admin/content');
      }

      chmod($dir, 0755);
      chmod($image, 0755);
      move_uploaded_file($fileDir, $image);
    }

    $this->content->create([
      'title'       => $title,
      'slug'        => $slug,
      'description' => $description,
      'category'    => $category,
      'text'        => $text,
      'link'        => $link,
      'icon'        => $icon,
      'image'       => $image
    ]);

    $this->session->set_flashdata('message', '<div class="alert alert-success">Content berhasil ditambah!</div>');
    redirect('admin/content');
  }

  public function search()
  {
    $key    = $this->input->get('s');
    $result = $this->content->like('title', $key)->get()->all();

    $this->load->view('templates/header');
    $this->load->view('content/index', ['data' => $result]);
    $this->load->view('templates/footer');
  }
}