<?php

class Auth_model extends CI_Model
{
  private $table = 'users';
  public $data;

  public function __contruct()
  {
    parent::__contruct();
  }

  public function getAll()
  {
    $data = $this->db->get($this->table)->result_array();
    return $data;
  }

  public function getSingle($id)
  {
    $data = $this->db->get_where($this->table, ['id' => $id])->row_array();
    return $data;
  }

  public function like($key, $val)
  {
    $this->db->like($key, $val);
    return $this;
  }

  public function get()
  {
    $this->data = $this->db->get($this->table);
    return $this;
  }

  public function where($key, $val)
  {
    $this->db->where($key, $val);
    return $this;
  }

  public function row()
  {
    return $this->data->row_array();
  }

  public function result()
  {
    return $this->data->resutl_array();
  }
}